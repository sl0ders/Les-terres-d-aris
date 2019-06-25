<?php

namespace App\Controllers\Front;

use App;
use App\Database\Auth\DBAuth;
use App\View\HTML\BootstrapForm;
use App\Model\model;

class UsersController extends AppController
{
    private $longueurKey = 15;
    private $controlkey = "";


    public function __construct()
    {
        parent::__construct();
        $this->loadModel('User');
        $this->loadModel('Avatar');
        $this->loadModel('Order');
    }

    public function index()
    {
        if ($_GET)
        $orders = $this->Order->orderWithProducts(htmlspecialchars($_GET['id']));
        $this->render('Front.Users.order', compact('form', 'orders'));
    }
    public function show()
    {
        $infoUser = $this->User->getInfoUser(htmlspecialchars($_GET['id']));
        $form = new bootstrapForm();
        $this->render('users.profil.showUser', compact('form', 'infoUser'));
    }

    public function add()
    {
        if (!empty($_POST)) {
            $error = true;
            if (empty($_POST['email']) || empty($_POST['name']) || empty($_POST['firstname']) || empty($_POST['username']) || empty($_POST['pass']) || empty($_POST['repass']) || empty($_POST['imgProfil'])) {
                echo $this->missCase;
                echo '<script>window.location="index.php?p=users.add.php";</script>';
                exit;
            }

            if ($this->User->verifMail($_POST['email'])) {
                echo $this->mailExist;
                echo '<script>window.location="index.php?p=users.add.php";</script>';
                exit;
            }

            if ($this->User->verifUsername($_POST['username'])) {
                echo $this->usernameExist;
                echo '<script>window.location="index.php?p=users.add.php";</script>';
                exit;
            }

            if ($_POST['pass'] !== $_POST['repass']) {
                echo $this->passNotMatch;
                echo '<script>window.location="index.php?p=users.add.php";</script>';
                exit;
            }

            if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,7}$#i", $_POST['email'])) {
                echo $this->emailFormat;
                echo '<script>window.location="index.php?p=users.add.php";</script>';
                exit;
            }
            for ($i = 1; $i < $this->longueurKey; $i++) {
                $this->controlkey .= mt_rand(0, 9);
            }
            // Préparation du mail contenant le lien d'activation
            $destinataire = htmlspecialchars($_POST['email']);
            $sujet = "Activer votre compte";
            $entete = "From:  no-reply@lesterresdaris.fr \n";
            $entete .= "Reply-To:  no-reply@lesterresdaris.fr \n";
            $entete .= "Content-Type: text/html; charset='utf-8\n";
// Le lien d'activation est composé du login(log) et de la clé(controlkey)
            $message = '
            <div class="text-center">
            <h3>Bienvenue sur Les terres d\'Aris</h3>
             <p>
             Pour activer votre compte, veuillez cliquer sur le lien ci dessous <br>
             ou copier/coller dans votre navigateur internet.
             <a href="http://lesterresdaris.fr/index.php?p=users.validate&username=' . urlencode($_POST['username']) . '&controlkey=' . $this->controlkey . '">Confirmer mon adresse mail</a>             
             Ceci est un mail automatique, Merci de ne pas y répondre.
             </p>
             </div>';
            $result = $this->User->create([
                'email' => htmlspecialchars($_POST['email']),
                'name' => htmlspecialchars($_POST['name']),
                'firstname' => htmlspecialchars($_POST['firstname']),
                'username' => htmlspecialchars($_POST['username']),
                'imgProfil' => htmlspecialchars($_POST['imgProfil']),
                'hash' => htmlspecialchars(password_hash($_POST['pass'], PASSWORD_DEFAULT)),
                'controlkey' => $this->controlkey,
                'actif' => 0,
            ]);
            if ($result) {
                $error = false;
                mail($destinataire, $sujet, $message, $entete);
                echo '<div class="alert alert-danger">Un mail vient de vous etre envoyer afin de confirmer votre adresse email</div>
                <meta http-equiv="refresh" content="3; URL=http://www.lesterresdaris.fr/index.php?p=users.login" />';
            }
        }
        $avatars = $this->Avatar->all();
        $form = new BootstrapForm($_POST);
        $this->render('users.signUp', compact('form', 'avatars', "valid", 'error'));
    }


    public function validate()
    {
        if (isset($_GET['username'], $_GET['controlkey']) && !empty($_GET['username']) && !empty($_GET['controlkey'])) {
            $username = htmlspecialchars(urlencode($_GET['username']));
            $controlkey = htmlspecialchars($_GET['controlkey']);
            $requser = $this->User->reqUser($username, $controlkey);
            if ($requser[0]->nbUser != 0) {
                $this->User->updateUser($username, $controlkey);
                echo '<div class="alert alert-danger">Votre compte a bien été confirmé</div>
                <meta http-equiv="refresh" content="3; URL=http://www.lesterresdaris.fr/"/>';
            } else {
                echo "<div class='alert alert-danger'>Une erreur est survenue lors de l'activation</div>
                <meta http-equiv='refresh' content='3; URL=http://www.lesterresdaris.fr/'/>";
            }
        } else {
            header("Location: index.php");
        }
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

    public function editMdp()
    {
        if (!empty($_POST)) {
            if (!$this->User->emailexist($_POST['email'])) {
                echo $this->emailNotExist;
                echo '<script>window.location="index.php?p=users.editMdp.php";</script>';
                exit;
            } else {
                for ($i = 1; $i < $this->longueurKey; $i++) {
                    $this->controlkey .= mt_rand(0, 9);
                }
                $this->User->updateEmail($_POST['email'], [
                    'mailvalidation' => 0,
                    'controlkey' => $this->controlkey
                ]);
                $destinataire = $_POST['email'];
                $sujet = "Récuperation de votre mot de passe";
                $entete = "From: no-reply@lesterresdaris.fr \n";
                $entete .= "Reply-To:  no-reply@lesterresdaris.fr \n";
                $entete .= "Content-Type: text/html; charset='utf-8\n";
                $message = '
            <div class="text-center">
                <h3>Bienvenue sur Les terres d\'Aris</h3>
                <p>
                    Pour modifier votre mot de passe, veuillez cliquer sur le lien ci dessous
                    ou copier/coller dans votre navigateur internet.
                    <a href="http://lesterresdaris.fr/index.php?p=users.validateEditMdp&email=' . urlencode($_POST['email']) . '&controlkey=' . $this->controlkey . '">Confirmer mon adresse mail</a>
                    <br>
                    Ceci est un mail automatique, Merci de ne pas y répondre.
                </p>
            </div>';
                mail($destinataire, $sujet, $message, $entete);
                $valid = '<div class="alert alert-danger">Un email de confirmation vient de vous etre envoyé</div>
                <meta http-equiv="refresh" content="3; URL=http://www.lesterresdaris.fr/" />';
            }
        }

        $form = new bootstrapForm($_SESSION);
        $this->render('users.retrievemdp', compact('form', 'valid'));
    }

    public function validateEditMdp()
    {
        $this->User->updateEmail($_GET['email'], [
            'controlkey' => null,
            'mailvalidation' => 1,
        ]);
        if ($_POST) {
            if ($_POST['pass'] !== $_POST['repass']) {
                echo $this->passNotMatch;
                echo '<script>window.location="index.php?p=users.validateEditMdp.php";</script>';
                exit;
            } else {
                $this->User->updateEmail(htmlspecialchars($_GET['email']), [
                    'hash' => password_hash($_POST['pass'], PASSWORD_DEFAULT),
                ]);
                $destinataire = $_POST['email'];
                $sujet = "Mot de passe modifié";
                $entete = "From: no-reply@lesterresdaris.fr \n";
                $entete .= "Reply-To: no-reply@lesterresdaris.fr \n";
                $entete .= "Content-Type: text/html; charset='utf-8\n";
                $message = '<div class="text-center">
                    <h3>Bienvenue sur Les terres d\'Aris</h3>
                    <p>
                        Votre mot de passe a bien etait modifier
                        http://www.lesterresdaris.fr/index.php?p=users.login
                    <br>
                        Ceci est un mail automatique, Merci de ne pas y répondre.
                    </p>
                </div>';
                mail($destinataire, $sujet, $message, $entete);
                $valid = '<div class="alert alert-danger">Votre compte a bien été confirmé</div>
                <meta http-equiv="refresh" content="3; URL=http://www.lesterresdaris.fr/" />';
            }
        }
        $form = new bootstrapForm($_POST);
        $this->render('users.passchange', compact('form', 'valid'));
    }

    public function disconnect()
    {
        session_destroy();
        echo '<script type="text/javascript">window.location="index.php";</script>';
        exit;
    }


}