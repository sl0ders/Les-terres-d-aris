<?php

namespace App\Controllers\front;

use App;
use App\Database\Auth\DBAuth;
use App\View\HTML\BootstrapForm;

class UsersController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('User');
        $this->loadModel('Avatar');
    }

    public function signUp()
    {
        if (!empty($_POST)) {
            if (empty($_POST['email']) || empty($_POST['name']) || empty($_POST['firstname']) || empty($_POST['username']) || empty($_POST['pass']) || empty($_POST['repass']) || empty($_POST['imgProfil'])) {
                echo $this->missCase;
                echo '<script>window.location="index.php?p=users.signUp.php";</script>';
                exit;
            }

            if ($this->User->verifMail($_POST['email'])) {
                echo $this->mailExist;
                echo '<script>window.location="index.php?p=users.signUp.php";</script>';
                exit;
            }

            if ($this->User->verifUsername($_POST['username'])) {
                echo $this->usernameExist;
                echo '<script>window.location="index.php?p=users.signUp.php";</script>';
                exit;
            }

            if ($_POST['pass'] !== $_POST['repass']) {
                echo $this->passNotMatch;
                echo '<script>window.location="index.php?p=users.signUp.php";</script>';
                exit;
            }

            if(!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $_POST['email'])){
                echo $this->emailFormat;
                echo '<script>window.location="index.php?p=users.signUp.php";</script>';
                exit;
            }

            $result = $this->User->create([
                'email' => htmlspecialchars($_POST['email']),
                'name' => htmlspecialchars($_POST['name']),
                'firstname' => htmlspecialchars($_POST['firstname']),
                'username' => htmlspecialchars($_POST['username']),
                'imgProfil' => htmlspecialchars($_POST['imgProfil']),
                'hash' => htmlspecialchars(password_hash($_POST['pass'], PASSWORD_DEFAULT))
            ]);
            if ($result) {
                echo '<script>window.location="index.php";</script>';
                exit;
            }
        }

        $avatars = $this->Avatar->all();
        $form = new BootstrapForm($_POST);
        $this->render('users.signUp', compact('form', 'avatars'));
    }


    public function login()
    {
        $errors = false;
        if (!empty($_POST)) {
            $auth = new DBAuth(App::getInstance()->getDb());
            if ($auth->login(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['pass']))) {
                echo '<script>window.location="index.php";</script>';
                exit;
            } else {
                $errors = true;
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('users.login', compact('form', 'errors'));
    }

    public function disconnect()
    {
        session_destroy();
        echo '<script type="text/javascript">window.location="index.php";</script>';
        exit;
    }
}