<?php

abstract class AbstractModel {

    protected static $table;
    protected static $class;

    public static function getAll()
    {
        $db = new DB;
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY datetime DESC';
        return $db->queryAll($sql, static::$class);
    }

    public static function insert_news($data)
    {
        $sqltext =
            "INSERT INTO " . static::$table . "
        (datetime,title,content)
        VALUES
        (NOW(),'" . $data['title'] . "','" . $data['content'] . "')";

        $db = new DB;
        return $db->execQuery($sqltext);
    }

    public static function getOne($id)
    {
        $db = new DB();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=' . $id;
        return $db->queryOne($sql, static::$class);
    }
} 