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

    }

    public function __construct()
    {

    }
}