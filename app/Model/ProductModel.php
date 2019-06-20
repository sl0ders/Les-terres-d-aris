<?php

namespace App\Model;

class ProductModel extends Model
{
    protected $table = 'products';

    public function getInfoProduct($id)
    {
        return $this->query("SELECT * FROM users WHERE id = ?", [$id], true);
    }

    public function updates($id, $fields)
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



    public function verifName($name)
    {
        $this->query('SELECT 1 FROM products WHERE name = ? LIMIT 1', [$name]);
    }

    public function verifImg($img)
    {
        $this->query('SELECT 1 FROM products WHERE name = ? LIMIT 1', [$img]);
    }

    public function verifStockId($id)
    {
        $this->query('SELECT 1 FROM products WHERE stock_id = ? LIMIT 1', [$id]);
    }

    public function finds($terme)
    {
        return $this->query("SELECT products.name FROM products WHERE $terme LIKE ?");
    }

    public function productWidthStock(){
        return $this->query("
        SELECT *
        FROM products
        LEFT JOIN stocks on products.stock_id = stocks.id
        WHERE quantity
        ");
    }
}