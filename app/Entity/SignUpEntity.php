<?php


namespace App\Entity;


class SignUpEntity extends Entity
{
    public function getUrl()
    {
        return 'index.php?p=signUp.show&id=' . $this->id;
    }
}