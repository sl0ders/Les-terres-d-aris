<?php
define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';
App::load();

if (isset($_GET['p'])) {
    $page = htmlspecialchars($_GET['id']);
} else {
    $page = 'Products.Admin';
}

