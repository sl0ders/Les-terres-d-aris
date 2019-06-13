<?php


namespace App\Entity;


class OrderEntity extends Entity
{
    public function getUrlFront()
    {
        return 'index.php?p=admin.orders.index&id=' . $this->id;
    }
}