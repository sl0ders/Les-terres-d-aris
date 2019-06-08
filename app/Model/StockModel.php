<?php

namespace App\Model;

class StockModel extends Model
{
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

    public function updateid($id, $fields)
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