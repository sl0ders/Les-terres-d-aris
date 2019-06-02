<?php
define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';
App::load();

if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'products.index';
}
$page = explode('.', $page);
if($page[0] == 'admin'){
    $controller = '\App\Controllers\admin\\' . ucfirst($page[1]) . 'Controller';
    $action = $page[2];
} elseif ('front') {
    $controller = '\App\Controllers\front\\' . ucfirst($page[0]) . 'Controller';
    $action = $page[1];
}

$controller = new $controller();
$controller->$action();



