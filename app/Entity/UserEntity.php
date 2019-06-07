<?php


namespace App\Entity;


class UserEntity extends Entity
{
    public function getUrl()
    {
        return 'index.php?p=admin.management.show&id=' . $this->id;
    }
}