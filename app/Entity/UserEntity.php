<?php


namespace App\Entity;


class UserEntity extends Entity
{
    public function getUrl()
    {
        return 'index.php?p=user.show&id=' . $this->id;
    }
}