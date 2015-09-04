<?php

class NewsController
{
    public function actionGetAll()
    {
        $article=News::GetAll();
        include_once __DIR__.'/../views/news.php';
    }

    public function actionGetOne()
    {
        if(isset($_GET['id'])) {
            $article=News::GetOne($_GET['id']);
            include __DIR__.'/../views/DisplayArticle.php';
        } else {
            echo 'The article you are searching is not available';
        }

    }

    public function __construct()
    {

    }
}