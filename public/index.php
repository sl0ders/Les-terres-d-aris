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

/*if ($page[0] == 'Contact' ||
    $page[0] == 'Orders' ||
    $page[0] == 'Products' ||
    $page[0] == 'Stocks' ||
    $page[0] == 'Users' ||
    $page[0] == 'index' ||
    $page[0] == 'show' ||
    $page[0] == 'Cart' ||
    $page[0] == 'Contact' ||
    $page[0] == 'Order' ||
    $page[0] == 'Products' ||
    $page[0] == 'Profil' ||
    $page[0] == 'Users' ||
    $page[0] == 'Admin' ||
    $page[1] == 'index' ||
    $page[1] == 'show') {*/
    if ($page[0] == 'Admin') {
        $controller = '\App\Controllers\Admin\\' . ucfirst($page[1]) . 'Controller';
        $action = $page[2];
    } elseif ('Front') {
        $controller = '\App\Controllers\Front\\' . ucfirst($page[0]) . 'Controller';
        $action = $page[1];
    }
/*} else {
    header('HTTP/1.0 404 Not Found');
    die('<img src="img/erreur-404.jpg" style="width: 100%;">');
}*/


$controller = new $controller();
$controller->$action();




