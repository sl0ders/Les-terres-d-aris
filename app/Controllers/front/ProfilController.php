<?php


namespace App\Controllers\Front;


use App\View\HTML\BootstrapForm;

class ProfilController extends AppController
{

    private $longueurKey = 15;
    private $controlkey = "";


    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Product');
        $this->loadModel('User');
        $this->loadModel('Avatar');
        $this->loadModel('Order');


    }

    public function index()
    {
        $this->render('users.profil');
    }

    public function show()
    {
        if ($this->User->find(htmlspecialchars($_GET['id'])) === false) {
            die($this->notFound());
        }
        $this->render('Front.Users.show');
    }

    public function edit()
    {
        if (!empty($_POST)) {
            if (empty($_POST['email']) || empty($_POST['name']) || empty($_POST['firstname']) || empty($_POST['username']) || empty($_POST['imgProfil'])) {
                echo $this->missCase;
                echo '<script>window.location="index.php?p=profil.edit";</script>';
                exit;
            }

            if ($this->User->verifMail($_POST['email'])) {
                echo $this->mailExist;
                echo '<script>window.location="index.php?p=profil.edit";</script>';
                exit;
            }

            if ($this->User->verifUsername($_POST['username'])) {
                echo $this->usernameExist;
                echo '<script>window.location="index.php?p=profil.edit";</script>';
                exit;
            }

            if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,7}$#i", $_POST['email'])) {
                echo $this->emailFormat;
                echo '<script>window.location="index.php?p=profil.edit";</script>';
                exit;
            }
            for ($i = 1; $i < $this->longueurKey; $i++) {
                $this->controlkey .= mt_rand(0, 9);
            }
            // Préparation du mail contenant le lien d'activation
            $destinataire = htmlspecialchars($_POST['email']);
            $sujet = "Modification de votre email";
            $entete = "From: www.lesterresdaris.fr\n";
            $entete .= "Reply-To: lesterresdaris.fr\n";
            $entete .= "Content-Type: text/html; charset='utf-8\n'";
// Le lien d'activation est composé du login(log) et de la clé(controlkey)
            $message = '
            <div class="text-center">
            <h3>Bienvenue sur Les terres d\'Aris</h3>
             <p>
             Pour confirmer la modification de profil, veuillez cliquer sur le lien ci dessous <br>
             ou copier/coller dans votre navigateur internet.
             <a href="http://lesterresdaris.fr/index.php?p=profil.validate&username=' . urlencode($_POST['username']) . '&controlkey=' . $this->controlkey . '">Confirmer mon adresse mail</a>             
             Ceci est un mail automatique, Merci de ne pas y répondre.
             </p>
             </div>';
            $result = $this->User->updateEmail($_POST['email'], [
                'email' => htmlspecialchars($_POST['email']),
                'name' => htmlspecialchars($_POST['name']),
                'firstname' => htmlspecialchars($_POST['firstname']),
                'username' => htmlspecialchars($_POST['username']),
                'imgProfil' => htmlspecialchars($_POST['imgProfil']),
            ]);
            if ($result) {
                mail($destinataire, $sujet, $message, $entete);
                echo '<div class="alert alert-danger">Un mail vient de vous etre envoyer afin de confirmer votre adresse email</div>
                <meta http-equiv="refresh" content="3; URL=http://www.lesterresdaris.fr/index.php?p=users.login" />';

            }
        }

        $this->User->updateEmail($_POST['email'], [
            'mailvalidation' => 0,
            'controlkey' => $this->controlkey
        ]);
        $avatars = $this->Avatar->all();
        $form = new BootstrapForm;
        $this->render('users.editProfile', compact('form', "avatars"));
    }

    public function validate()
    {
        if (isset($_GET['username'], $_GET['controlkey']) && !empty($_GET['username']) && !empty($_GET['controlkey'])) {
            $username = htmlspecialchars(urlencode($_GET['username']));
            $controlkey = htmlspecialchars($_GET['controlkey']);
            $requser = $this->User->reqUser($username, $controlkey);
            if ($requser[0]->nbUser != 0) {
                $result = $this->User->updateUser($username, $controlkey);
                if ($result) {
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
    }
}