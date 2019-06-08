<?php

namespace App\Model;

class ProductModel extends Model
{
    protected $table = 'products';

    public function getInfoProduct($id){
        return $this->query("SELECT * FROM users WHERE id = ?",[$id],true);
    }

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
}