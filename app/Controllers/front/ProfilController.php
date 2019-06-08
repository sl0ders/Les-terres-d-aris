<?php


namespace App\Controllers\Front;


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

    public function show()
    {
        $this->render('Front.Users.show');
    }
    public function editProfil(){
        $avatars = $this->Avatar->all();
        $form = new BootstrapForm;
        $this->render('users.editProfile', compact('form', "avatars"));
    }


}