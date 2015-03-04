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

function news_getall()
{
    $sqltext = 'SELECT * FROM news';
    $news = sql_query($sqltext);

    usort($news,'sortByDateTime');

    return $news;
}

function news_insert($data)
{
    $sqltext =
        "INSERT INTO news
        (datetime,title,content)
        VALUES
        (NOW(),'" . $data['title'] . "','" . $data['content'] . "')";

    sql_exec($sqltext);
}



?>