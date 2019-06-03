<?php


namespace App\Controllers\Admin;


use App\View\HTML\BootstrapForm;

class ProfilController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Product');
        $this->loadModel('User');
        $this->loadModel('Avatar');


    }

    public function index()
    {
        $this->render('admin.profil');
    }

    public function order()
    {
        $this->render('admin.order');
    }

    public function information()
    {
        $this->render('admin.information');
    }

    public function editProfil(){
        $avatars = $this->Avatar->all();
        $form = new BootstrapForm;
        $this->render('admin.editProfile', compact('form', "avatars"));
    }
}