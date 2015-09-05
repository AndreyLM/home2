<?php


class AdminController
{
    private function actionAddNews()
    {

        if (empty($_POST['title']) || empty($_POST['text'])) {
            echo 'Please enter title and text.';
            echo '<a href="/home2/admin.php?Contr=Admin&Action=Index">Back</a>';
            exit;
        }

        $title=$_POST['title'];
        $text=$_POST['text'];

        if (true===News::AddNews($title, $text)) {
            echo 'News are successfuly added. <a href="/home2/index.php">Back to main page</a>';
            exit;
        }

        echo 'News was not added. <a href="/home2/admin.php?Contr=Admin&Action=AddNewsForm">Please try again</a>';
        exit;
    }

    public function actionIndex()
    {
        if(isset($_POST['submit'])) {
          $this->actionAddNews();
        } else {
            include __DIR__.'/../views/Admin/AddNews.php';
        }
    }
}