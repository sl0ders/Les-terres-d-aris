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

    public function orderWithUser($id)
    {
        return $this->query('
        SELECT * FROM orders
        LEFT JOIN users ON user_id = users.id
        WHERE user_id = ?
        ', [$id]);
    }


    public function orderWithProducts($id)
    {
        return $this->query('
        SELECT * FROM orders
        LEFT JOIN users  ON user_id = users.id
        LEFT JOIN products ON product_id = products.id
        WHERE user_id = ?
        ORDER BY orders.id
        ', [$id]);
    }

    public function orderWithProductAndUser()
    {
        return $this->query('
        SELECT users.email, products.name,products.price,orders.nCmd,products.unity,orders.quantity,orders.id,DATE_FORMAT(orders.date,\'%d/%m/%Y à %Hh%imin%ss\') AS datefr ,orders.total, orders.validation FROM orders
        LEFT JOIN users ON user_id = users.id
        LEFT JOIN products ON product_id = products.id
        ORDER BY orders.id');
    }

    public function selectId()
    {
        return $this->query('SELECT id FROM orders o');
    }

    public function updateOrder($id, $fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $k => $v) {
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $attributes[] = $id;
        $sql_parts = implode(', ', $sql_parts);
        return $this->query("UPDATE {$this->table} SET $sql_parts WHERE orders.id = ? ", $attributes, true);
    }


    public function keyExist($id)
    {
        $this->query('SELECT 1 FROM orders WHERE nCmd = ? LIMIT 1', [$id]);
    }
}