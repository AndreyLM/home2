<?php

namespace App\controllers;

use App\models\News as NewsModel;

class News
{
    public function actionIndex()
    {

        $view=new \ViewConstuctor();
        $view->items=NewsModel::GetAll();
        
        $view->Display('News/news');

    }

    public function actionGetOne()
    {
        if(empty($_GET['id'])) {
           throw new E404Exception('Could not find the page');
        }

        try {
            $view=new \ViewConstuctor();
            $view->article=NewsModel::GetOne($_GET['id']);
            $view->Display('News/DisplayArticle');
        } catch (E404Exception $e) {
            header('HTTP/1.0 404 Not Found');
            include(__DIR__.'/../content/NotFound.php');
        }



    }

    public function __construct()
    {

    }
}