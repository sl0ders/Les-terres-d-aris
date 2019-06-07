<?php


namespace App\Entity;


class StockEntity extends Entity
{
    public function getUrl()
    {
        return 'index.php?p=stock.show&id=' . $this->id;
    }
}