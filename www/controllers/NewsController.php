<?php
class NewsController {
    public function actionAll()
    {

            $art = NewsModel::findOneByColumn('title','Новый заголо23232323вок123123123!');




//        $article = new NewsModel();
//
////        var_dump($article::findByColumn('title','213123123'));die;
//
//        $news = $article->findAll();
//
//        $view = new View();
//        $view->items = $news;
//        $view->display('news/all.php');
    }
    public function actionOne()
    {
        $id = $_GET['id'];
        $article = new NewsModel();
        $item = $article->findOneByPK($id);

        $view = new View();
        $view->item = $item;
        $view->display('news/one.php');
    }
}
?>

