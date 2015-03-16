<?php

require_once __DIR__ . '/../models/news.php';

class NewsController {

    public function actionAll()
    {
        $items = News::getAll();
        include __DIR__ . '/../views/index.php';
    }

    public function receivePostData($post_data)
    {
        $data = [];
        if (!empty($post_data['title'])) {
            $data['title'] = $post_data['title'];
        }
        if (!empty($post_data['content'])) {
            $data['content'] = $post_data['content'];
        }

        if (isset($data['title']) && isset($data['content'])) {
            //определим текущую дату и добавим к новости
            $tek_data = date("d.m.Y") . " " . date("H:i:s");
            $data['datetime'] = $tek_data;

            if (false === News::insert_news($data)) {
                echo 'Ошибка отправки новой новости!';
                die;
            }
        }
    }
}

?>