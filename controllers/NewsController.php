<?php


class NewsController
{
    public function actionGetAll()
    {
        $article=News::GetAll();
        $view=new ViewConstuctor();
        $view->Data($article);
        $view->Display('news');
        //include_once __DIR__.'/../views/news.php';
    }

    public function actionGetOne()
    {
        if(isset($_GET['id'])) {
            $article=News::GetOne($_GET['id']);
            $view=new ViewConstuctor();
            $view->Data($article);
            $view->Display('DisplayArticle');

//            include __DIR__.'/../views/DisplayArticle.php';
        } else {
            echo 'The article you are searching is not available';
        }

    }

    public function __construct()
    {

    }
}