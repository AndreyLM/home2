<?php


class AdminController extends E404Exception
{

    public function actionIndex()
    {

        $view=new ViewConstuctor();
        $view->titles=News::GetAll();
        $view->Display('Admin/Index');

    }


    public function actionAdd()
    {
        if (isset($_POST['submit'])) {
            if (empty($_POST['title']) || empty($_POST['text'])) {
                echo 'Please enter title or text.';
            } else {

                $article=new News();
                $article->title=$_POST['title'];
                $article->text=$_POST['text'];

                if(true===$article->Save()) {
                    echo 'New article was succefully added. ';
                } else {
                    echo 'Error adding news';
                }

            }

            echo '<a href="/home2/admin.php">Back to admit panel.</a>';
            exit;

        }

        $view=new ViewConstuctor();
        $view->Display('Admin/AddNews');
    }


    public function actionRemove()
    {
        if (false===isset($_GET['id'])) {
            echo 'The article was not found';
            echo '<br><a href="/home2/admin.php">Back to admin page.</a> ';
            exit;
        }

        $article=News::GetOne($_GET['id']);
        $res=$article->Remove();

        if (false===$res) {
            echo 'Cannnot delete this article';
        } else {
            echo 'The article with id='.$res.' was delete';
        }

        echo '<br><a href="/home2/admin.php">Back to admin page.</a> ';
    }


    public function actionUpdate()
    {

        if(isset($_POST['submit'])) {
            if (empty($_POST['title']) || empty($_POST['text'])) {
                echo 'Title or text could not be empty';
                echo '<br><a href="/home2/admin.php">Back to admin panel</a>';
                exit;
            }

            $article=News::GetOne($_POST['id']);
            $article->title=$_POST['title'];
            $article->text=$_POST['text'];

            if (true===$article->Save()) {
                echo 'Article was updated';
                echo '<br><a href="/home2/admin.php">Back to admin panel</a>';
                exit;
            } else {
                echo 'Error updateing database';
                echo '<br><a href="/home2/admin.php">Back to admin panel</a>';
                exit;
            }
        }


        if(!isset($_GET['id'])) {
            echo 'Could not found the article';
            echo '<br><a href="/home2/admin.php">Back to admin panel</a>';
            exit;
        }


        $view=new ViewConstuctor();
        $view->article=News::GetOne($_GET['id']);
        $view->Display('Admin/Update');
    }


}