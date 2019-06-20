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

    public function addCart()
    {
        if (isset($_GET['id'])) {
            if ($_POST['much']) {
                $stock = $this->Stock->find($_GET['id']);
                $stock = $stock->quantity;
                $sess = $_SESSION['cart'][$_GET['id']];
                $sess = $sess + $_POST['much'];
                if ($sess <= $stock) {
                    $nbCmd = $_POST['much'];
                    $return = $_SESSION['cart'][$_GET['id']] += $nbCmd;
                    if ($return) {
                        $json['error'] = false;
                        echo '<script type="text/javascript">' . 'alert("Le produit a bien eté ajouté au votre panier");' . '</script>';
                        echo '<script>window.location="index.php";</script>';
                        exit;
                    }
                } else {
                    echo '<script type="text/javascript">' . 'alert("Produit epuisé");' . '</script>';
                    echo '<script>window.location="index.php";</script>';
                    exit;
                }
            } else {
                echo 'Vous n\'avez pas selectionné de produit a ajouter au panier';
            }
        }
    }


    public
    function del()
    {
        unset($_SESSION['cart'][$_GET['id']]);
        echo '<script type="text/javascript">window.location="index.php";</script>';
    }

    public function addOrder()
    {
        if ($_POST['order']) {
            for ($i = 1; $i < $this->longueurKey; $i++) {
                $this->controlkey .= mt_rand(0, 9);
            }
            $listProduct = $_SESSION['cart'];
            for($i = 1; $i < $listProduct[$i]; $i++){
                $return = $this->Order->create([
                    'nCmd' => $this->controlkey,
                    'product_id' => $listProduct[$i],
                    'user_id' => $_SESSION['order']['user'],
                    'quantity' => $listProduct[$i]
                ]);
            }
            if ($return) {
                unset($_SESSION['order']);
                unset($_SESSION['cart']);
                echo '<script type="text/javascript">window.location="index.php?p=profil.orders";</script>';
            }
        }
    }
}