<?php
class NewsController {
    public function actionAll()
    {
        $news = News::getAll();
        $view = new View();
        $view->items = $news;

//        foreach ($view as $item) {
//            var_dump($view->key(),$item);
//        };
//        die;

        $view->display('news/all.php');
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

