<?php


namespace App\Controllers\Admin;


use App\View\HTML\BootstrapForm;

class ContactController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Contact');
    }

    public function index(){
        $contacts = $this->Contact->All();
        $form = new BootstrapForm($_POST);
        $this->render('Admin.Contact.index',compact('contacts','form'));
    }

    public function show(){
        if ($this->Contact->find($_GET['id']) === false) {
            die($this->notFound());
        }
        $contact = $this->Contact->find(htmlspecialchars($_GET['id']));
        $form = new BootstrapForm($_POST);
        $this->render('Admin.Contact.show',compact('contact','form'));
    }
}