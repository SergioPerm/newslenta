<?php

class View
    implements Iterator
{

    protected $_position = 0;
    protected $data = [];

    public function __construct()
    {
        $this->_position = 0;
    }

    public function __set($k,$v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        //магический метод php для автоматического чтения недоступного свойства объекта...
        return $this->data[$k];
    }

    public function display($template)
    {
        foreach ($this->data as $key => $val) {
            $$key = $val;
        }
        include __DIR__ . '/../views/' . $template;
    }

    public function current()
    {
        return $this->data[$this->_position];
    }

    public function next()
    {
        ++$this->_position;
    }

    public function key()
    {
        return $this->_position;
    }

    public function valid()
    {
        return isset($this->data[$this->_position]);
    }

    public function rewind()
    {
        $this->_position = 0;
    }
}