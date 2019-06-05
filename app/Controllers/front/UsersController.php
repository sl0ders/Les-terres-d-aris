<?php

namespace App\Controllers\front;

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

            if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $_POST['email'])) {
                echo $this->emailFormat;
                echo '<script>window.location="index.php?p=users.signUp.php";</script>';
                exit;
            }

            for ($i = 1; $i < $this->longueurKey; $i++) {
                $this->controlkey .= mt_rand(0, 9);
            }
            $result = $this->User->create([
                'email' => htmlspecialchars($_POST['email']),
                'name' => htmlspecialchars($_POST['name']),
                'firstname' => htmlspecialchars($_POST['firstname']),
                'username' => htmlspecialchars($_POST['username']),
                'imgProfil' => htmlspecialchars($_POST['imgProfil']),
                'controlkey' => $this->controlkey,
                'hash' => htmlspecialchars(password_hash($_POST['pass'], PASSWORD_DEFAULT))
            ]);
            // Préparation du mail contenant le lien d'activation
            $destinataire = $_POST['email'];
            $sujet = "Activer votre compte";
            $entete = "From: inscription@www.lesterresdaris.com";
            $entete .= "Reply-To: moi@domaine.com\n";
            $entete .= "Content-Type: text/html; charset=\"iso-8859-1\"";
// Le lien d'activation est composé du login(log) et de la clé(controlkey)
            $message = '
            <div class="text-center">
            <h3>Bienvenue sur Les terres d\'Aris</h3>
             <p>
             Pour activer votre compte, veuillez cliquer sur le lien ci dessous
             ou copier/coller dans votre navigateur internet.
             <a href="http://lesterresdaris.fr/index.php?p=users.confirmation&username=' . urlencode($_POST['username']) . '&controlkey=' . $this->controlkey . '">Confirmer mon adresse mail</a>             
             Ceci est un mail automatique, Merci de ne pas y répondre.
             </p>
             </div>';

            if ($result) {
                mail($destinataire, $sujet, $message, $entete);
                $confirm = true;
            }
        }
        $avatars = $this->Avatar->all();
        $form = new BootstrapForm($_POST);
        $this->render('users.signUp', compact('form', 'avatars', 'confirm'));
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

    public function confirmation()
    {
        if (isset($_GET['username'], $_GET['controlkey']) && !empty($_GET['username']) && !empty($_GET['controlkey'])) {
            $username = htmlspecialchars(urlencode($_GET['username']));
            $controlkey = htmlspecialchars($_GET['controlkey']);
            $requser = $this->User->reqUser($username, $controlkey);
            if ($requser["nbUser"] == null) {
                $this->User->updateUser($username, $controlkey);
                echo 'Votre compte a bien été confirmé';
            } else {
                echo "Une erreur est survenu";
            }
        } else {
            header("Location: index.php");
        }
    }

    public function retrieveMdp()
    {
        if (!empty($_POST)) {
            if (!$this->User->emailexist($_POST['email'])) {
                echo $this->emailNotExist;
                echo '<script>window.location="index.php?p=users.retrieveMdp.php";</script>';
                exit;
            } else {
                for ($i = 1; $i < $this->longueurKey; $i++) {
                    $this->controlkey .= mt_rand(0, 9);
                }
                $this->User->update($_POST['email'], [
                    'mailvalidation' => 0,
                    'controlkey' => $this->controlkey
                ]);
                $destinataire = $_POST['email'];
                $sujet = "Récuperation de votre mot de passe";
                $entete = "From: inscription@www.lesterresdaris.com";
                $entete .= "Reply-To: moi@domaine.com\n";
                $entete .= "Content-Type: text/html; charset=\"iso-8859-1\"";
// Le lien d'activation est composé du login(log) et de la clé(controlkey)
                $message = '
        <div class="text-center">
            <h3>Bienvenue sur Les terres d\'Aris</h3>
            <p>
                Pour modifier votre mot de passe, veuillez cliquer sur le lien ci dessous
                ou copier/coller dans votre navigateur internet.
                <a href="http://lesterresdaris.fr/index.php?p=users.confimRetrieve&email=' . urlencode($_POST['email']) . '&controlkey=' . $this->controlkey . '">Confirmer mon adresse mail</a>
            <br>
                Ceci est un mail automatique, Merci de ne pas y répondre.
            </p>
        </div>';
                mail($destinataire, $sujet, $message, $entete);
            }
        }

        $form = new bootstrapForm($_POST);
        $this->render('users.retrievemdp', compact('form'));
    }

    public function confimRetrieve()
    {
        $this->User->update($_GET['email'], [
            'controlkey' => null,
            'mailvalidation' => 1,
        ]);
        if ($_POST) {
            if ($_POST['pass'] !== $_POST['repass']) {
                echo $this->passNotMatch;
                echo '<script>window.location="index.php?p=users.confimRetrieve.php";</script>';
                exit;
            }
            $this->User->update($_POST['email'], [
                'hash' => password_hash($_POST['pass'], PASSWORD_DEFAULT),
            ]);
        }

        $form = new bootstrapForm($_POST);
        $this->render('users.passchange', compact('form'));
    }


    public
    function disconnect()
    {
        session_destroy();
        echo '<script type="text/javascript">window.location="index.php";</script>';
        exit;
    }

}