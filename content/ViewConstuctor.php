<?php

/**
 * Created by PhpStorm.
 * User: ������
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

        if (!empty($this->data)) {
            foreach ($this->data as $key=>$val) {
                $$key=$val;
            }
        }


        if (file_exists(__DIR__.'/../views/'.$viewName.'.php')) {
            include __DIR__.'/../views/'.$viewName.'.php';
        }  else {
            echo 'Could not find the page '.$viewName.'.php';
        }

    }

}