<?php

class NewsController
{
    public function GetAllAction()
    {
        $var=new News();
        return $var->GetAll();
    }

    public function __construct()
    {

    }
}