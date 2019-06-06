<?php


namespace App\Controllers\front;


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
        $this->render('users.profil');
    }

    public function order()
    {
        $this->render('front.order');
    }

    public function information()
    {
        $this->render('front.information');
    }

    public function editProfil(){
        $avatars = $this->Avatar->all();
        $form = new BootstrapForm;
        $this->render('front.editProfile', compact('form', "avatars"));
    }
}