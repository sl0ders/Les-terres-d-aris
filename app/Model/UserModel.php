<?php

namespace App\Model;

class UserModel extends Model
{
    protected $table = 'users';

    public function verifMail($mail)
    {
        $this->query('SELECT 1 FROM users WHERE email = ? LIMIT 1', [$mail]);
    }

    public function verifUsername($username)
    {
        return $this->query('SELECT 1 FROM users WHERE username = ? LIMIT 1', [$username]);
    }

    public function reqUser($username, $controlkey)
    {
        return $this->query("SELECT COUNT(users.mailvalidation) AS nbUser FROM users WHERE username = ? AND controlkey = ?", [$username, $controlkey]);
    }

    public function updateUser($username, $controlkey)
    {
        return $this->query("UPDATE users SET users.mailvalidation = 1, users.controlkey = null WHERE username = ? AND controlkey = ?", [$username, $controlkey]);
    }

    public function changePass($email, $controlKey)
    {
        return $this->query("UPDATE users SET users.mailvalidation = 0, users.controlkey = ? WHERE email = ? AND controlkey = ?", [$email, $controlKey]);
    }

    public function emailexist($email)
    {
        return $this->query("SELECT users.email FROM users WHERE email = ?", [$email],true);
    }

}