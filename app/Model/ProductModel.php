<?php

namespace App\Model;

class ProductModel extends Model
{
    protected $table = 'products';

    public function getInfoProduct($id)
    {
        return $this->query("SELECT * FROM users WHERE id = ?", [$id], true);
    }

    public function verifName($name)
    {
        $this->query('SELECT 1 FROM products WHERE name = ? LIMIT 1', [$name]);
    }

    public function verifStockId($id)
    {
        $this->query('SELECT 1 FROM products WHERE stock_id = ? LIMIT 1', [$id]);
    }

    public function productWidthStock()
    {
        return $this->query("
        SELECT *
        FROM products
        LEFT JOIN stocks on products.stock_id = stocks.id
        WHERE quantity
        ");
    }

    public function findWidthStock($id)
    {
        return $this->query("
            SELECT * 
            FROM products 
            LEFT JOIN stocks on products.stock_id = stocks.id
            WHERE product_id = ?", [$id], true);
    }
}