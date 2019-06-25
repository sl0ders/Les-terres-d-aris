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
        $product = $this->Product->findWidthStock(htmlspecialchars($_GET['id']));
        $this->render('Front.Products.show', compact('product'));


    }
}