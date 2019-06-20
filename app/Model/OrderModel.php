<?php


namespace App\Model;


class OrderModel extends Model
{
    protected $table = 'orders';

    public function findByUser($id)
    {
        return $this->query('
            SELECT * FROM orders WHERE user_id = ?
            ', [$id]);
    }
}