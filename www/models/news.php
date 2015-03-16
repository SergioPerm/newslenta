<?php

require_once __DIR__ . '/../classes/DB.php';

function sortByDateTime($a,$b)
{
    if ($a['datetime'] < $b['datetime']) {
        return 1;
    } else {
        return 0;
    }

}

class News {
    public $id;
    public $title;
    public $content;

    public static function getAll()
    {
        $db = new DB;
        return $db->query('SELECT * FROM news ORDER BY datetime DESC', 'News');
    }

    public static function insert_news($data)
    {
        $sqltext =
        "INSERT INTO news
        (datetime,title,content)
        VALUES
        (NOW(),'" . $data['title'] . "','" . $data['content'] . "')";

        $db = new DB;
        return $db->execQuery($sqltext);
    }
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