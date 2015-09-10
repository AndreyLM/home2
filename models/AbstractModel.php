<?php

/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 09.09.2015
 * Time: 15:17
 */
abstract class AbstractModel
{
    protected static $tableName='sdtClass';


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

    private function exec($query)
    {
        $dsn='mysql:dbname=home2;host=localhost';
        $dbh=new PDO($dsn, 'root', '');

        $sth=$dbh->prepare($query, $param=[]);

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

    public static function AddRecord($colums=[], $values=[])
    {
        $col=implode(',  ', $colums);
        echo $col;
        die;
        $query='INSERT INTO '.self::$tableName;
    }



}