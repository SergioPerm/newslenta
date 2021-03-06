<?php
//Фронт контроллер
//error_reporting(E_ALL);

require_once __DIR__ . '/autoload.php';

$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';

if (!empty($_POST)) {
    $ctrl = 'Admin';
    $act = 'Insert';
}

$controllerClassName = $ctrl . 'Controller';
$controllerNews = new $controllerClassName;
$method = 'action' . $act;

try {
    $controllerNews->$method();
    include __DIR__ . '/views/add.php';
} catch (Exception $e) {
    $view = new View();
    $view->error = $e->getMessage();
    $view->display('error.php');
}
?>