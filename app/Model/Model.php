<?php

namespace App\Model;

use App\Database\MysqlDatabase;

class Model
{
    protected $table;
    protected $db;

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
        return $this->query("UPDATE {$this->table} SET $sql_parts WHERE email = ? ", $attributes, true);
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

}