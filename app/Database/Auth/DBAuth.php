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
                $_SESSION['auth']['id'] = $user->id;
                $_SESSION['auth']['firstname'] = $user->firstname;
                $_SESSION['auth']['imgProfile'] = $user->imgProfil;
                $_SESSION['auth']['name'] = $user->name;
                $_SESSION['auth']['username'] = $user->username;
                $_SESSION['auth']['email'] = $user->email;
                $_SESSION['auth']['key'] = $user->controlKey;
                $_SESSION['auth']['role'] = $user->role;
                $_SESSION['cart'] = [];
                $_SESSION['cart']['quantity'] = [];
                return true;
            }
        }
        return false;

    }

    public function loggedUser()
    {
        return $_SESSION['auth']['role'] == 0;
    }

    public function loggedAdmin()
    {
        return $_SESSION['auth']['role'] == 1;
    }

    public function getUserId()
    {
        if ($this->loggedUser()) {
            return $_SESSION['auth']['role'] == 0;
        }
        return false;
    }

    public function getAdminId()
    {
        if ($this->loggedUser()) {
            return $_SESSION['auth']['role'] == 1;
        }
        return false;
    }

};