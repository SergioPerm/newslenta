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
        return $db->queryAll('SELECT * FROM news ORDER BY datetime DESC', 'News');
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

    public static function getOne($id)
    {
        $db = new DB();
        return $db->queryOne('SELECT * FROM news WHERE id=' . $id, 'News');
    }
}
?>