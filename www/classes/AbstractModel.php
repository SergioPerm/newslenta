<?php

abstract class AbstractModel
{
    static protected $table;

    protected $data = [];

    public function __set($k,$v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public function __isset($k)
    {
        return isset($this->data[$k]);
    }

    public static function findAll()
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table;
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql);
    }

    public static function findOneByPK($id)
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql,[':id' => $id])[0];
    }

    public static function findOneByColumn($column,$value)
    {
        $db = new DB();

        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . '=:value';

        $db->setClassName(get_called_class());
        $res = $db->query($sql,[':value' => $value]);

        if (!empty($res)) {
            return $res[0];
        }
        return false;
    }

    public function insert()
    {
        $cols = array_keys($this->data);
        $data = [];
        foreach ($cols as $col) {
            $data[':' . $col] = $this->data[$col];
        }

        $sql = 'INSERT INTO ' . static::$table . ' (' . implode(', ',$cols) . ') VALUES (' . implode(', ',array_keys($data)) . ')';

        $db = new DB();
        if ($db->execute($sql,$data)) {
            $this->id = $db->lastInsertId();
        }

    }

} 