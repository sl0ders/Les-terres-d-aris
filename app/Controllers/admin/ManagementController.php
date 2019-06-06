<?php


namespace App\Controllers\Admin;

use \App\Controllers\front\AppController;

class ManagementController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Product');
        $this->loadModel('User');
        $this->loadModel('Stock');
    }

    public function users()
    {
        $this->render('admin.manageUsers');
    }

    public function stock(){
        $this->render('admin.manageStocks');
    }

    public function product(){
        $this->render('admin.manageProducts');
    }
}