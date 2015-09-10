<?php

/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 09.09.2015
 * Time: 15:17
 */
abstract class AbstractModel
{
    protected static $tableName;


    public function __construct()
    {

    }

    private function query($query, $param=[])
    {
        $dsn='mysql:dbname=home2;host=localhost';
        $dbh=new PDO($dsn, 'root', '');

        $className=get_called_class();
        $sth=$dbh->prepare($query);
        $sth->execute($param);
        return $sth->fetchAll(PDO::FETCH_CLASS, $className );
    }

    public static function newsGetAll()
    {
        $query="SELECT * FROM ".static::$tableName;
        return self::query($query);
    }

    public  static  function GetOne($id)
    {
        $query="SELECT * FROM ".static::$tableName.' WHERE id=:id';
        $param=['id'=>$id];
        return self::query($query, $param);
    }


}