<?php


namespace App\Controllers\Front;


use App\View\HTML\BootstrapForm;

class ProductsController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Product');
    }

    public function index()
    {
        $products = $this->Product->All();
        $this->render('Front.index', compact('products'));
    }


    public function show()
    {
        $product = $this->Product->find($_GET['id']);
        $this->render('Front.Products.show',compact('product'));
    }
}