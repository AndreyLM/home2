<?php


abstract class AbstractModel
{
    protected static $tableName = 'sdtClass';
    protected $db;

    public function __construct()
    {
        $this->db = new db(get_called_class(), static::$tableName);
    }


    public static function GetAll()
    {
        $db = new db(get_called_class(), static::$tableName);

        return $db->GetAll();
    }


    public static function GetOne($id)
    {
        $db = new db(get_called_class(), static::$tableName);

        return $db->GetOne($id);
    }


    public static function findByColumn($column, $value)
    {
        $data[$column]=$value;
        $db=new db(get_called_class(), static::$tableName);

        return $db->FindByColumn($data);

    }

}