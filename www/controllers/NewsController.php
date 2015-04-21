<?php
class NewsController {
    public function actionAll()
    {

        $db = new DB();
        $res = $db->query('SELECT * FROM news');
        var_dump($res);
        die;
//        $news = News::getAll();
//        $view = new View();
//        $view->items = $news;
//
////        foreach ($view as $item) {
////            var_dump($view->key(), $item);
////        }
//
//        $view->display('news/all.php');
    }
    public function actionOne()
    {
        $id = $_GET['id'];
        $item = News::getOne($id);
        $view = new View();
        $view->item = $item;
        $view->display('news/one.php');
    }
}
?>

