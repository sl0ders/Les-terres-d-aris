<?php


namespace App\Controllers\front;


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
        $this->render('front.index', compact('products'));
    }

    public function show()
    {
        $product = $this->Product->find($_GET['id']);
        $this->render('front.show',compact('product'));
    }
}