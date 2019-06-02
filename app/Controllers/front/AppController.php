<?php


namespace App\Controllers\front;


use App;
use App\Database\Auth\DBAuth;

class AppController extends Controller

{
    protected $errorSizeMax = '<script type="text/javascript">' . 'alert("Erreur : La taille maximum de caractere a etait depassé");' . '</script>';
    protected $errorSizeMin = '<script type="text/javascript">' . 'alert("Erreur : Il vous faut entrer au moin 3 caractere");' . '</script>';
    protected $missCase = '<script type="text/javascript">' . 'alert("Erreur : Un champ n\'a pas etait remplit");' . '</script>';
    protected $numberExist = '<script type="text/javascript">' . 'alert("Erreur : Le numero de l\'article existe deja")'.'</script>';
    protected $passNotMatch = '<script type="text/javascript">' . 'alert("Erreur : Les mots de passes ne correspondent pas")'.'</script>';


    protected $template = 'default';

    public function __construct()
    {
        $this->viewpath = ROOT . '/App/View/';
    }

    protected function loadModel($Model_name)
    {
        $this->$Model_name = App::getInstance()->getModel($Model_name);
    }
}
