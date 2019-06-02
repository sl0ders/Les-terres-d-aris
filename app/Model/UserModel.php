<?php

namespace App\Model;

class UserModel extends Model
{

    protected $table = 'users';

    public function verifLogin($username, $mail){
        return $this->query('
        SELECT '
        );
    }
}