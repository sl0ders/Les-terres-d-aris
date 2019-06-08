<?php

namespace App\Controllers\Admin;

use \App;
use App\Database\Auth\DBAuth;

class AppController extends \App\Controllers\Front\AppController
{

    public function __construct()
    {
        parent::__construct();
        //Auth
        $app = App::getInstance();
        $auth = new DBAuth($app->getDb());
        if (!$auth->loggedAdmin()) {
            $this->forbidden();
        }
    }
}