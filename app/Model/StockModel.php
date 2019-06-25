<?php

namespace App\Model;

class StockModel extends Model
{
    protected $table = 'stocks';

    public function getStock()
    {
        return $this->query("
            SELECT *
            FROM stocks
            INNER JOIN products ON stocks.id = products.stock_id
        ");
    }

    public function selectQuantity()
    {
        $this->query("SELECT stocks.quantity FROM stocks");
    }

    public function findQuantity($id)
    {
        return $this->query("
        SELECT quantity from stocks s WHERE id = ?
        ",[$id],true);
    }
}