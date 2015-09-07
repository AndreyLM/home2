<?php

/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 05.09.2015
 * Time: 13:34
 */
class ViewConstuctor
{
    protected $data;

    public function __set($k, $v)
    {
        $this->data[$k]=$v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public function Display($viewName)
    {

        foreach ($this->data as $key=>$val) {
            $$key=$val;
        }

        if (file_exists(__DIR__.'/'.$viewName.'.php')) {
            include __DIR__.'/'.$viewName.'.php';
        } else {
            echo 'Could not find the page '.$viewName.'.php';
        }

    }

}