<?php


namespace App\Controllers\Admin;

use \App\Controllers\front\AppController;
use App\View\HTML\BootstrapForm;
use http\Client\Curl\User;

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
        $form = new bootstrapForm();
        $users = $this->User->all();
        $this->render('admin.manageUsers', compact('users', 'form'));
    }

    public function stock()
    {
        $stocks = $this->Stock->getStock();
        $this->render('admin.manageStocks',compact('stocks'));
    }

    public function product()
    {
        $this->render('admin.manageProducts');
    }

    public function show()
    {
        $infoUser = $this->User->getInfoUser($_GET['id']);
        $form = new bootstrapForm();
        $this->render('admin.show', compact('form', 'infoUser'));
    }


    public function ban()
    {
        if (!empty($_POST)) {
            $this->User->updateUserBan($_POST['id']);
        }
        return $this->users();
    }

    public function dban()
    {
        if (!empty($_POST)) {
            $this->User->updateUserdBan($_POST['id']);
        }
        return $this->users();
    }
}