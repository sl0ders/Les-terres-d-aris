<?php

namespace App\Entity;

class StockEntity extends Entity
{
    public function getUrlFront()
    {
        return 'index.php?p=stocks.show&id=' . $this->id;
    }
    public function getUrlAdmin()
    {
        return 'index.php?p=Admin.stocks.show&id=' . $this->id;
    }
    public function getUrlAdminIndex()
    {
        return 'index.php?p=Admin.stocks.index&id=' . $this->id;
    }

}