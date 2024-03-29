<?php


namespace App\Controllers\Front;


use App;
use App\Database\Auth\DBAuth;

class AppController extends Controller

{
    protected $errorSizeMax = '<script type="text/javascript">' . 'alert("Erreur : La taille maximum de caractere a etait depassé");' . '</script>';
    protected $mailExist = '<script type="text/javascript">' . 'alert("Erreur : Cette adresse de mail est déjà utilisée.");' . '</script>';
    protected $usernameExist = '<script type="text/javascript">' . 'alert("Erreur : Ce pseudo est déjà utilisée.");' . '</script>';
    protected $productExist = '<script type="text/javascript">' . 'alert("Erreur : Ce Produit est déjà repertorié.");' . '</script>';
    protected $stockIdExist = '<script type="text/javascript">' . 'alert("Erreur : Cette Id est déjà repertorié.");' . '</script>';
    protected $errorSizeMin = '<script type="text/javascript">' . 'alert("Erreur : Il vous faut entrer au moin 3 caractere");' . '</script>';
    protected $missCase = '<script type="text/javascript">' . 'alert("Erreur : Un champ n\'a pas etait remplit");' . '</script>';
    protected $numberExist = '<script type="text/javascript">' . 'alert("Erreur : Le numero de l\'article existe deja")'.'</script>';
    protected $passNotMatch = '<script type="text/javascript">' . 'alert("Erreur : Les mots de passes ne correspondent pas")'.'</script>';
    protected $emailFormat = '<script type="text/javascript">' . 'alert("Erreur : l\'adresse email n\'est pas au bon format")'.'</script>';
    protected $emailNotExist = '<script type="text/javascript">' . 'alert("Erreur : l\'adresse email n\'existe pas")'.'</script>';
    protected $cartEmpty = '<script type="text/javascript">' . 'alert("Votre panier est vide, selectionnez tout dabord des produit pour valider")'.'</script>';
    protected $template = 'default';

    public function __construct()
    {
        $this->viewpath = ROOT . '/App/View/';
    }

    protected function loadModel($Model_name)
    {
        $this->$Model_name = App::getInstance()->getModel($Model_name);
    }
}
