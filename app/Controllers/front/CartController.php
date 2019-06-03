<?php


namespace App\Controllers\front;


class CartController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Product');
        $this->loadModel('Cart');
    }

    public function index()
    {
        $carts = $this->Cart->countQuantity();
        $this->render('front.cart',compact('carts'));
    }

    public function add(){
        if (!empty($_POST)){
            
            if ($_POST["cartQuantity"] > 0 ){
                $result = $this->Cart->create([
                   'quantity' => htmlspecialchars($_POST["cartQuantity"])
                ]);
                if ($result){
                    echo '<script>window.location="index.php?p=front.cart.index";</script>';
                }
            }
        }
    }
}
