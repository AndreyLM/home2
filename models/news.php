<?php
require_once __DIR__.'/../content/sql_db.php';
require_once __DIR__.'/AbstractModel.php';

class News
    extends AbstractModel
{
    public $id;
    public $title;
    public $text;
    public $created_date;
    protected  static $tableName="News";


/*
    public  static  function GetOne($id)
    {
        $db=new mysql_db();
        return $db->GetById(self::TABLE, $id);
    }
*/
    public static function AddNews($title, $text)
    {
        $table['title']=$title;
        $table['text']=$text;

        return self::AddRecord($table);
    }


}