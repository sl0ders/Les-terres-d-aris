<?php

namespace App\Database\Auth;

use App\Database\MysqlDatabase;

class DBAuth
{
    private $db;

    public function __construct(MysqlDatabase $db)
    {
        $this->db = $db;

    }

    /**
     * @param $email
     * @param $pass
     * @return boolean
     */
    public function login($email, $pass)
    {
        $user = $this->db->prepare('SELECT users.id, users.role,users.username,users.email, users.hash,users.controlkey, users.firstname,users.imgProfil, users.name FROM users WHERE email = ?', [$email], null, true);
        if ($user) {
            if (password_verify($pass, $user->hash)) {
                $_SESSION['auth'] = $user->id;
                $_SESSION['firstname'] = $user->firstname;
                $_SESSION['imgProfile'] = $user->imgProfil;
                $_SESSION['name'] = $user->name;
                $_SESSION['username'] = $user->username;
                $_SESSION['email'] = $user->email;
                $_SESSION['key'] = $user->controlKey;
                $_SESSION['role'] = $user->role;
                $_SESSION['cart'] = [];
                return true;
            }
        }
        return false;
    }

    public function loggedUser()
    {
            return $_SESSION['role'] == 0;
    }
    public function loggedAdmin()
    {
            return $_SESSION['role'] == 1;
    }

    public function getUserId()
    {
        if ($this->loggedUser()) {
            return $_SESSION['role'] == 0;
        }
        return false;
    }
    public function getAdminId()
    {
        if ($this->loggedUser()) {
            return $_SESSION['role'] == 1;
        }
        return false;
    }

};