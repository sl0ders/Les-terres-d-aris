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
        $user = $this->db->prepare('SELECT users.id,users.username,users.email, users.hash, users.firstname,users.imgProfil, users.name FROM users WHERE email = ?', [$email], null, true);
        if ($user) {
            if (password_verify($pass, $user->hash)) {
                $_SESSION['auth'] = $user->id;
                $_SESSION['firstname'] = $user->firstname;
                $_SESSION['imgProfile'] = $user->imgProfil;
                $_SESSION['name'] = $user->name;
                $_SESSION['username'] = $user->username;
                $_SESSION['email'] = $user->email;

                return true;
            }
        }
        return false;
    }

    public function logged()
    {
        return isset($_SESSION['auth']);
    }

    public function getUserId()
    {
        if ($this->logged()) {
            return $_SESSION['auth'];
        }
        return false;
    }

}