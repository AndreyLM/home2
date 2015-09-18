<?php


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

    private function exec($query, $param=[])
    {
        $dsn='mysql:dbname=home2;host=localhost';
        $dbh=new PDO($dsn, 'root', '');



        $sth=$dbh->prepare($query);
        return $sth->execute($param);

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
        return self::query($query, $param)[0];
    }

    protected function AddRecord($table=[])
    {
        $cols=[];
        $pars=[];

        foreach ($table as $key=>$value) {
            $pars[]=':'.$key;
            $cols[]=$key;
        }

        $columns=implode(', ', $cols);
        $params=implode(', ', $pars);

        $query='INSERT INTO '.static::$tableName.' ('.$columns.') VALUES ('.$params.')';

        return self::exec($query, $table);
    }

    public static  function newsRemove($id)
    {
        $query='DELETE FROM '.static::$tableName.' WHERE id=:id';
        $param=['id'=>$id];

        return self::exec($query, $param);
    }

    protected function Update($id, $table=[])
    {
        $statement='';

        foreach ($table as $key=>$value) {
            $statement=$statement.', '.$key.'=:'.$key;
        }

        $stm=substr($statement, 1);

        $query='UPDATE '.static::$tableName.' SET '.$stm.' WHERE id=:id';
        $table['id']=$id;

        return self::exec($query, $table);
    }

    public static function findByColumn($column, $value)
    {
        $query='SELECT * FROM '.static::$tableName.' WHERE '.$column.'=:'.$column;
        $param=[$column=>$value];

        return self::query($query, $param);
    }

}