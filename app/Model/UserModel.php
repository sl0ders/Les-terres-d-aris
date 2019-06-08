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
        return $this->query("UPDATE users SET users.mailvalidation = 1, users.actif = 1, users.controlkey = null WHERE username = ? AND controlkey = ?", [$username, $controlkey]);
    }

    public function changePass($email, $controlKey)
    {
        return $this->query("UPDATE users SET users.mailvalidation = 0, users.controlkey = ? WHERE email = ? AND controlkey = ?", [$email, $controlKey]);
    }


    public function emailexist($email)
    {
        return $this->query("SELECT users.email FROM users WHERE email = ?", [$email],true);
    }

    public function getInfoUser($id){
        return $this->query("SELECT * FROM users WHERE id = ?",[$id],true);
    }

    public function updateUserBan($id)
    {
        return $this->query("UPDATE users SET users.mailvalidation = 0, users.actif = 2, users.controlkey = 0 WHERE id = ?", [$id], true);
    }

    public function updateUserdBan($id)
    {
        return $this->query("UPDATE users SET users.mailvalidation = 1, users.actif = 1, users.controlkey = 0 WHERE id = ?", [$id], true);
    }

}