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

    public static function findByColumn($column,$value)
    {
        $class = get_called_class();

        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . '=:' . $column;

        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql,[':' . $column => $value]);
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
            //тут надо что либо придумать чтобы правильно прочитать id только что записавшейся новости
//            $sql = 'SELECT id FROM ' . static::$table . ' WHERE '

        }

    }

} 