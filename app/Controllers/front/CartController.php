<?php


namespace App\Controllers\Front;


class CartController extends AppController
{
    private $longueurKey = 12;
    private $controlkey = "";

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Cart');
        $this->loadModel('Product');
        $this->loadModel('Stock');
        $this->loadModel('Order');
        $this->loadModel('User');
    }

    public function index()
    {
        if (empty(array_keys($_SESSION['cart']))) {
            $products = [];
            $error = "Votre panier est vide";
        } else {
            $products = $this->Cart->recupCart();
            $users = $this->User->find($_SESSION['auth']['username']);
        }
        $this->render('Front.Cart.index', compact('products', "error", 'users'));
    }

    public function add()
    {
        if (isset($_GET['id'])) {
            if ($_POST['much']) {
                $stock = $this->Stock->find(htmlspecialchars($_GET['id']));
                $stock = $stock->quantity;
                $sess = $_SESSION['cart'][htmlspecialchars($_GET['id'])];
                $result = $sess + htmlspecialchars($_POST['much']);
                if ($result <= $stock) {
                    $nbCmd = htmlspecialchars($_POST['much']);
                    $return = $_SESSION['cart'][htmlspecialchars($_GET['id'])] += $nbCmd;
                    if ($return) {
                        $_SESSION['error'] = false;
                        echo '<script type="text/javascript">' . 'alert("Le produit a bien eté ajouté au votre panier");' . '</script>';
                        echo '<script>window.location="index.php";</script>';
                        exit;
                    }
                } else {
                    $_SESSION['error'] = TRUE;
                    echo '<script type="text/javascript">' . 'alert("Produit epuisé");' . '</script>';
                    echo '<script>window.location="index.php";</script>';
                    exit;
                }
            } else {
                echo 'Vous n\'avez pas selectionné de produit a ajouter au panier';
            }
        }
    }


    public function delete()
    {
        unset($_SESSION['cart'][htmlspecialchars($_GET['id'])]);
        echo '<script type="text/javascript">window.location="index.php";</script>';
    }
}