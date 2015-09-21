<?php


class NewsController
{
    public function actionGetAll()
    {

        $article=News::newsGetAll();
        //$article=News::findByColumn('title', 'Title 1');
        $view=new ViewConstuctor();
        $view->items=$article;
        $view->Display('News/news');

    }

    public function actionGetOne()
    {

        if(isset($_GET['id'])) {
            $article=News::GetOne($_GET['id']);
            $view=new ViewConstuctor();
            $view->article=$article;
            $view->Display('News/DisplayArticle');

        } else {
            echo 'The article you are searching is not available';
        }

    }

    public function __construct()
    {

    }
}