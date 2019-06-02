<?php


namespace App\Entity;


class ProductEntity extends Entity
{
    public function getUrl()
    {
        return 'index.php?p=products.show&id=' . $this->id;
    }
}