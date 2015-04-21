<?php

class View
    implements Iterator
{
    protected $data = [];

    public function __construct()
    {
//        $this->_position = 0;
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
        $data = current($this->data);
        return $data;
    }

    public function next()
    {
        $data = next($this->data);
        return $data;
    }

    public function key()
    {
        $data = key($this->data);
        return $data;
    }

    public function valid()
    {
        $key = key($this->data);
        $data = ($key !== NULL && $key !== FALSE);
        return $data;
    }

    public function rewind()
    {
        reset($this->data);
    }
}