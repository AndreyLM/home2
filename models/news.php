<?php
require_once __DIR__.'/../content/sql_db.php';

class News
{
    public $id;
    public $title;
    public $text;
    public $created_date;

    public static function GetAll()
    {
        $bd=new mysql_db();
        return $bd->GetAll('news', 'News');
    }
}