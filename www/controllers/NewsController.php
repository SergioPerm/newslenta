<?php
class NewsController {
    public function actionAll()
    {

        var_dump(NewsModel::findAll());die;

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

