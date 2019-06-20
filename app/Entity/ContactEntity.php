<?php


namespace App\Entity;


class ContactEntity extends Entity
{
    public function getUrlFront()
    {
        return 'index.php?p=cart.index&id=' . $this->id;
    }
}