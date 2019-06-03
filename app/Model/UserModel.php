<?php

namespace App\Model;

class UserModel extends Model
{

    protected $table = 'users';

    public function verifMail($mail)
    {
        return $this->query('SELECT 1 FROM users WHERE email = ? LIMIT 1', [$mail]);
    }

    public function verifUsername($username){
        return $this->query('SELECT 1 FROM users WHERE username = ? LIMIT 1', [$username]);
    }
}