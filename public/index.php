<?php
define('ROOT', dirname(__DIR__));
require ROOT . '/App/App.php';
App::load();

if (isset($_GET['p'])) {
    $page = htmlspecialchars($_GET['p']);
} else {
    $page = 'Products.index';
}
$page = explode('.', $page);
    if ($page[0] == 'Admin') {
        $controller = '\App\Controllers\Admin\\' . ucfirst($page[1]) . 'Controller';
        $action = $page[2];
    } elseif ('Front') {
        $controller = '\App\Controllers\Front\\' . ucfirst($page[0]) . 'Controller';
        $action = $page[1];
    }
$controller = new $controller();
$controller->$action();






