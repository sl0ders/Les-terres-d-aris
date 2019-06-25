<?php


namespace App\Controllers\Front;


class OrderController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Order');
        $this->loadModel('Stock');
        $this->loadModel('Cart');
    }

    public function index()
    {
        $orders = $this->Order->orderWithProducts($_SESSION['auth']['id']);
        $this->render('Front.Order.index', compact( 'orders'));
    }

    public function show()
    {
        $this->render('Front.Order.show');
    }

    public function add()
    {
        if ($_SESSION['cart'] == null || empty($_SESSION['cart'])) {
            echo $this->cartEmpty;
            echo '<script type="text/javascript">window.location="index.php";</script>';
            die();
        }
        $nCmd = date('d-m-Y-s');
        if ($_POST['order']) {
            $resultStockId = $this->Stock->findQuantity($_SESSION['cart']);
            $resultStockId = $resultStockId->quantity - $_GET['quantity'];
            $this->Stock->update($_SESSION['cart'], [
                'quantity' => $resultStockId
            ]);
            $products = $this->Cart->recupCart();
            foreach ($products as $product) {
                $return = $this->Order->create([
                    'user_id' => $_SESSION['auth']['id'],
                    'product_id' => $product->id,
                    'nCmd' => $nCmd,
                    'Quantity' => htmlspecialchars($_GET['quantity']),
                    'total' => $product->price * $_SESSION['cart'][$product->id],
                ]);
            }
            if ($return) {
                unset($_SESSION['cart']);
                unset($_SESSION['order']);
                echo '<script type="text/javascript">window.location="index.php?p=order.index";</script>';
            }
        }
    }
}