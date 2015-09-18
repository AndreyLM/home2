<?php


class AdminController
{

    public function actionIndex()
    {

        $view=new ViewConstuctor();
        $view->titles=News::newsGetAll();
        $view->Display('Admin/Index');

    }


    public function actionAdd()
    {
        if (isset($_POST['submit'])) {
            if (empty($_POST['title']) || empty($_POST['text'])) {
                echo 'Please enter title or text.';
            } else {

                $title=$_POST['title'];
                $text=$_POST['text'];

                if(true===News::AddNews($title, $text)) {
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
            echo 'Cannot delete this article';
            echo '<br><a href="/home2/admin.php">Back to admin page.</a> ';
            exit;
        }

        $id=$_GET['id'];

        if (true===News::newsRemove($id)) {
            echo 'The article was successfuly removed';
            echo '<br><a href="/home2/admin.php">Back to admin page.</a> ';
            exit;
        }

        echo 'Cannot delete this record';
        echo '<br><a href="/home2/admin.php">Back to admin page.</a> ';
    }

    public function actionUpdate()
    {
        
    }


}