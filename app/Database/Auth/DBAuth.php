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
        $user = $this->db->prepare('SELECT users.id, users.hash, users.firstname, users.name FROM users WHERE email = ?', [$email], null, true);
        if ($user) {
            if (password_verify($pass, $user->hash)) {
                $_SESSION['auth'] = $user->id;
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