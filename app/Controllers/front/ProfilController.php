<?php


namespace App\Controllers\Front;


use App\View\HTML\BootstrapForm;

class ProfilController extends AppController
{
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
        $this->render('Front.Users.show');
    }
    public function editProfil(){
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

            if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,7}$#i", $_POST['email'])) {
                echo $this->emailFormat;
                echo '<script>window.location="index.php?p=users.signUp.php";</script>';
                exit;
            }

            $result = $this->User->update($_POST['email'],[
                'email' => htmlspecialchars($_POST['email']),
                'name' => htmlspecialchars($_POST['name']),
                'firstname' => htmlspecialchars($_POST['firstname']),
                'username' => htmlspecialchars($_POST['username']),
                'imgProfil' => htmlspecialchars($_POST['imgProfil']),
                'hash' => htmlspecialchars(password_hash($_POST['pass'], PASSWORD_DEFAULT))
            ]);

            // Préparation du mail contenant le lien d'activation
            $destinataire = $_POST['email'];
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
             <a href="http://lesterresdaris.fr/index.php?p=users.confirmation&username=' . urlencode($_POST['username']) . '&controlkey=' . $this->controlkey . '">Confirmer mon adresse mail</a>             
             Ceci est un mail automatique, Merci de ne pas y répondre.
             </p>
             </div>';

            if ($result) {
                $error = false;
                mail($destinataire, $sujet, $message, $entete);
                echo '<div class="alert alert-danger">Un mail vient de vous etre envoyer afin de confirmer votre adresse email</div>
                <meta http-equiv="refresh" content="3; URL=http://www.lesterresdaris.fr/index.php?p=users.login" />';
            }
        }
        $avatars = $this->Avatar->all();
        $form = new BootstrapForm;
        $this->render('users.editProfile', compact('form', "avatars"));
    }

    public function orders(){
        $orders = $this->Order->findByUser($_SESSION['auth']);
        $this->render('Front.Users.orders', compact('orders'));
    }
}