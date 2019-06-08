<?php

namespace App\Entity;

class UserEntity extends Entity
{
    public function getUrlFront()
    {
        return 'index.php?p=users.show&id=' . $this->id;
    }
    public function getUrlAdmin()
    {
        return 'index.php?p=Admin.users.show&id=' . $this->id;
    }
}