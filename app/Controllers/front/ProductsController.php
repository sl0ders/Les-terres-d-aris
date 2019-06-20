<?php


namespace App\Controllers\Front;


use App\View\HTML\BootstrapForm;

class
ProductsController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Product');
        $this->loadModel('Stock');
    }

    public function index()
    {
        $products = $this->Product->productWidthStock();
        $stocks = $this->Stock->All();
        $this->render('Front.index', compact('products', 'stocks'));
    }


    public function show()
    {
        if ($this->Product->find($_GET['id']) === false) {
            die($this->notFound());
        }
        $product = $this->Product->find(htmlspecialchars($_GET['id']));
        $this->render('Front.Products.show', compact('product'));


    }

    public function search()
    {
        if (isset($_POST['search'])) {
            $_POST['terme'] = htmlspecialchars($_POST['terme']);
            $terme = $_POST['terme'];
            $terme = trim($terme);
            $terme = strip_tags($terme);

        }
        if (isset($terme)) {

            $terme = strtolower($terme);
            $select_terme = $this->Product->finds($terme);
            $select_terme->execute(["%" . $terme . "%", "%" . $terme . "%"]);
        }
    }
}