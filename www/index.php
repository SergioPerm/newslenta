<?php

require __DIR__ . '/models/news.php';

if (!empty($_POST)) {
    $data = [];
    if (!empty($_POST['title'])) {
        $data['title'] = $_POST['title'];
    }
    if (!empty($_POST['content'])) {
        $data['content'] = $_POST['content'];
    }

    if (isset($data['title']) && isset($data['content'])) {
        //определим текущую дату и добавим к новости
        $tek_data = date("d.m.Y") . " " .date("H:i:s");
        $data['datetime'] = $tek_data;

        if (false === News::insert_news($data)) {
            echo 'Ошибка отправки новой новости!';
            die;
        }
    }
}

$items = News::getAll();

include __DIR__ . '/views/index.php';
include __DIR__ . '/views/add.php';

?>