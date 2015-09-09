<?php
require_once __DIR__.'/../content/sql_db.php';

class News
{
    public $id;
    public $title;
    public $text;
    public $created_date;
    const TABLE="News";

    public static function GetAll()
    {
        $bd=new mysql_db();
        return $bd->GetAll('news', self::TABLE);
    }

    public  static  function GetOne($id)
    {
        $db=new mysql_db();
        return $db->GetById(self::TABLE, $id);
    }

    public static function AddNews($title, $text)
    {
        $db=new mysql_db();
        return $db->AddNews($title, $text, self::TABLE);
    }


}