<?php

require_once __DIR__ . '/../functions/sql.php';

function sortByDateTime($a,$b)
{
    if ($a['datetime'] < $b['datetime']) {
        return 1;
    } else {
        return 0;
    }

}

abstract class NewsArticle {
    public $title;
    public $content;

    public function newsGetAll() {
        $sqltext = 'SELECT * FROM news';

        $BDNews = new BDNews('localhost','root','','newslenta');
        $news = $BDNews->receiveData($sqltext);

        usort($news,'sortByDateTime');

        return $news;
    }

    public function newsInsert($data) {
        $sqltext =
            "INSERT INTO news
        (datetime,title,content)
        VALUES
        (NOW(),'" . $data['title'] . "','" . $data['content'] . "')";

        $BDNews = new BDNews('localhost','root','','newslenta');
        $BDNews->execData($sqltext);
    }
}

class NewsLenta extends NewsArticle {

}
//function news_getall()
//{
//    $sqltext = 'SELECT * FROM news';
//
//    $BDNews = new BDNews('localhost','root','','newslenta');
//    $news = $BDNews->receiveData($sqltext);
//
////    $news = sql_query($sqltext);
//
//    usort($news,'sortByDateTime');
//
//    return $news;
//}
//
//function news_insert($data)
//{
//    $sqltext =
//        "INSERT INTO news
//        (datetime,title,content)
//        VALUES
//        (NOW(),'" . $data['title'] . "','" . $data['content'] . "')";
//
//    $BDNews = new BDNews('localhost','root','','newslenta');
//    $BDNews->execData($sqltext);
////    sql_exec($sqltext);
//}



?>