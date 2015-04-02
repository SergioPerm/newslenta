<?php
//Фронт контроллер
require_once __DIR__ . '/autoload.php';

$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';

$controllerClassName = $ctrl . 'Controller';

<<<<<<< HEAD
//require_once __DIR__ . '/controllers/' . $controllerClassName . '.php';

=======
>>>>>>> f376708dddf2b2339154e5ec3c7a14a8c6c5be0a
$controllerNews = new $controllerClassName;
$method = 'action' . $act;

if (!empty($_POST)) {
    $controllerNews->receivePostData($_POST);
}

$controllerNews->$method();

<<<<<<< HEAD
//include __DIR__ . '/views/add.php';
=======
include __DIR__ . '/views/add.php';
>>>>>>> f376708dddf2b2339154e5ec3c7a14a8c6c5be0a

?>