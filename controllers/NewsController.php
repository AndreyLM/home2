<?php

class NewsController
{
    public function GetAllAction()
    {
        $news=new News();
        $article=$news->GetAll();
        include_once __DIR__.'/../views/news.php';
    }

    public function __construct()
    {

    }
}