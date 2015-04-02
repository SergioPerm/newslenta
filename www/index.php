<?php
//Фронт контроллер
require_once __DIR__ . '/autoload.php';
$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';
$controllerClassName = $ctrl . 'Controller';
$controllerNews = new $controllerClassName;
$method = 'action' . $act;
if (!empty($_POST)) {
    $controllerNews->receivePostData($_POST);
}
$controllerNews->$method();
include __DIR__ . '/views/add.php';
?>