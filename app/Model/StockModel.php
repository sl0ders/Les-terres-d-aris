<?php


namespace App\Model;


class StockModel extends Model
{
    public function getStock()
    {
        return $this->query("
            SELECT *
            FROM stock
            LEFT JOIN productS ON stock.id = products.stock_id
            ORDER BY product_id
        ");
    }
}