<?php


class NewsController
{
    public function actionGetAll()
    {

        $view=new ViewConstuctor();
        $view->items=News::GetAll();
        $view->Display('News/news');
        
    }

    public function actionGetOne()
    {
        if(empty($_GET['id'])) {
           throw new E404Exception('Could not find the page');
        }


        $view=new ViewConstuctor();
        $view->article=News::GetOne($_GET['id']);
        $view->Display('News/DisplayArticle');


    }

    public function __construct()
    {

    }
}