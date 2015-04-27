<?php

class AdminController {

//    public function actionAll()
//    {
//        $view = new View();
//        $view->display('add.php');
//    }

    public function actionInsert()
    {
        if (!empty($_POST['title'])) {
            $data['title'] = $_POST['title'];
        }

        if (!empty($_POST['content'])) {
            $data['content'] = $_POST['content'];
        }

        if (isset($data['title']) && isset($data['content'])) {
            //определим текущую дату и добавим к новости
            $tek_data = date("Y-m-d") . " " . date("H:i:s");
            $data['datetime'] = $tek_data;

            $article = new NewsModel();
            $article->title = $data['title'];
            $article->content = $data['content'];
            $article->datetime = $data['datetime'];
            $article->save();

            $newsController = new NewsController();
            $newsController->actionAll();
        }
    }
} 