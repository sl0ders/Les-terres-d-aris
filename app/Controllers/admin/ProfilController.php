<?php


namespace App\Controllers\Admin;


class ProfilController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Product');
        $this->loadModel('Users');
        $this->loadmodel('Comment');

    }

    public function index()
    {
        $this->render('users.profil');
    }

    public function order()
    {
        $this->render('admin.order');
    }

    public function information()
    {
        $this->render('admin.information');
    }
}