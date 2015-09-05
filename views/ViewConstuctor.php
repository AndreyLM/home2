<?php

/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 05.09.2015
 * Time: 13:34
 */
class ViewConstuctor
{
    public $data;

    public function Data($items)
    {
        $this->data=$items;
    }

    public function Display($viewName)
    {
        if (file_exists(__DIR__.'/'.$viewName.'.php')) {
            include __DIR__.'/'.$viewName.'.php';
        } else {
            echo 'Coud not find the page '.$viewName.'.php';
        }
    }

}