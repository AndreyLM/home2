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
    protected $dbh;

    public function __construct()
    {
        $dsn='mysql:dbname=home2;host=localhost';
        $this->dbh=new PDO($dsn, 'root', '');
    }

    private function query($query, $param=[])
    {
        $className=get_called_class();
        $sth=$this->dbh->prepare($query);
        $sth->execute($param);
        return $sth->fetchAll(PDO::FETCH_CLASS, $className );
    }

    public static function newsGetAll()
    {
        $query="SELECT * FROM ".static::$tableName;
        return self::query($query);
    }


}