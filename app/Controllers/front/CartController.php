<?php


namespace App\Controllers\Front;


class CartController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Cart');
    }

    public function index()
    {
        if (empty(array_keys($_SESSION['cart']))) {
            $products = [];
            $error = "Votre panier est vide";
        } else {
            $products = $this->Cart->recupCart();
        }

        $this->render('Front.Cart.index', compact('products', "error"));
    }

    public function addCart()
    {
        $json = ['error' => true];
        if (isset($_GET['id'])) {
            if (($_POST['much'])) {
                $nbCmd = $_POST['much'];
                $return = $_SESSION['cart'][$_GET['id']] = +$nbCmd;
                if ($return) {
                    $json['error'] = false;
                    echo '<script type="text/javascript">' . 'alert("Le produit a bien eté ajouté au votre panier");' . '</script>';
                    echo '<script>window.location="index.php";</script>';
                    exit;
                }
            } else {
                echo 'Vous n\'avez pas selectionné de produit a ajouter au panier';
            }
        }
    }

    public function del()
    {
        unset($_SESSION['cart'][$_GET['id']]);
        echo '<script type="text/javascript">window.location="index.php";</script>';
    }


}