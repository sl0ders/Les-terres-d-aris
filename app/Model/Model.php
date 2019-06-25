<?php

namespace App\Model;

use App\Database\MysqlDatabase;

class Model
{
    protected $table;
    protected $db;
    // Tableaux de donnees
    private $tabExt = ['jpg', 'gif', 'png', 'jpeg', 'JPG', 'PNG'];    // Extensions autorisees
    private $infosImg = [];

    // Variables
    private $extension = '';
    private $message = '';
    public $nomImage = '';

    public function __construct(MysqlDatabase $db)
    {
        $this->db = $db;
        if (is_null($this->table)) {
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);// place le pointeur a la fin du explode
            $this->table = strtolower(str_replace('Model', '', $class_name)) . 's';
        }
    }

    protected function notFound()
    {
        header('HTTP/1.0 404 Not Found');
        die('<img src="img/erreur-404.jpg" style="width: 100%;">');
    }

    public function all()
    {
        return $this->query('SELECT * FROM ' . $this->table);
    }

    public function find($id)
    {
        return $this->query("
            SELECT * 
            FROM {$this->table} 
            WHERE id = ?", [$id], true);
    }

    public function delete($id)
    {

        return $this->query("DELETE FROM {$this->table} WHERE id = ? ", [$id], true);
    }


    public function create($fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $k => $v) {
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $sql_parts = implode(', ', $sql_parts);
        return $this->query("INSERT INTO {$this->table} SET $sql_parts", $attributes, true);
    }

    /**
     * update elements from different tables
     * @param $id
     * @param $fields
     * @return array|bool|false|mixed|\PDOStatement
     */
    public function update($id, $fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $k => $v) {
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $attributes[] = $id;
        $sql_parts = implode(', ', $sql_parts);
        return $this->query("UPDATE {$this->table} SET $sql_parts WHERE id = ? ", $attributes, true);
    }

    public function extract($key, $value)
    {
        $records = $this->all();
        foreach ($records as $v) {
            $return[$v->$key] = $v->$value;
        }
        if (isset($return)) {
            return $return;
        }

    }

    public function query($statement, $attributes = null, $one = false)
    {
        if ($attributes) {
            return $this->db->prepare(
                $statement,
                $attributes,
                str_replace('Model', 'Entity', get_class($this)),
                $one
            );
        } else {
            return $this->db->query(
                $statement,
                str_replace('Model',
                    'Entity', get_class($this)),
                $one
            );
        }
    }

    public function addImage()
    {
        define('TARGET', 'img/');    // Repertoire cible
        define('MAX_SIZE', 1000000);    // Taille max en octets du fichier
        define('WIDTH_MAX', 8000);    // Largeur max de l'image en pixels
        define('HEIGHT_MAX', 8000);    // Hauteur max de l'image en pixels

        // Recuperation de l'extension du fichier
        $this->extension = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);
        // On verifie l'extension du fichier
        if (in_array(strtolower($this->extension), $this->tabExt)) {
            // On recupere les dimensions du fichier
            $this->infosImg = getimagesize($_FILES['fichier']['tmp_name']);
            // On verifie le type de l'image
            if ($this->infosImg[2] >= 1 && $this->infosImg[2] <= 14) {
                // On verifie les dimensions et taille de l'image
                if (($this->infosImg[0] <= WIDTH_MAX) && ($this->infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['fichier']['tmp_name']) <= MAX_SIZE)) {
                    // Parcours du tableau d'erreurs
                    if (isset($_FILES['fichier']['error'])
                        && UPLOAD_ERR_OK === $_FILES['fichier']['error']) {
                        // On renomme le fichier
                        $this->nomImage = $_FILES['fichier']['name'];
                        // Si c'est OK, on teste l'upload
                        if (move_uploaded_file($_FILES['fichier']['tmp_name'], TARGET . $this->nomImage)) {
                            $this->message = 'Upload réussi !';
                        } else {
                            // Sinon on affiche une erreur systeme
                            $this->message = 'Problème lors de l\'upload !';
                        }
                    } else {
                        $this->message = 'Une erreur interne a empêché l\'uplaod de l\'image';
                    }
                } else {
                    // Sinon erreur sur les dimensions et taille de l'image
                    $this->message = 'Erreur dans les dimensions de l\'image !';
                }
            } else {
                // Sinon erreur sur le type de l'image
                $this->message = 'Le fichier à uploader n\'est pas une image !';
            }
        } else {
            // Sinon on affiche une erreur pour l'extension
            $this->message = 'L\'extension du fichier est incorrecte !';
        }
        if (!is_dir(TARGET)) {
            if (!mkdir(TARGET, 0755)) {
                exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
            }
        }
    }

    public function exist()
    {

    }
}