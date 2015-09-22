<?php

class db
{
    const DSN='myslq:dbname=home2,host=localhost';
    private $className;
    private $tableName;


    public function __construct($className='stdClass', $tableName)
    {
        $this->dbh=new PDO('mysql:dbname=home2;host=localhost', 'root', '');
        $this->className=$className;
        $this->tableName=$tableName;
    }


    private function query($query, $param=[])
    {

        $stm=$this->dbh->prepare($query);
        $stm->execute($param);
        return $stm->fetchAll(PDO::FETCH_CLASS, $this->className);

    }


    private function exec($query, $param=[])
    {

        $stm=$this->dbh->prepare($query);
        return $stm->execute($param);

    }


    private function makeQuery($data=[])
    {
        $columns=[];
        $values=[];
        $pars=[];
        $stm=[];
        $query='';


        foreach ($data as $key => $value) {
            $columns[]=':'.$key;
            $values[]=$key;
            $pars[':'.$key]=$value;
            $stm[]=$key.'=:'.$key;
        }

        if(isset($data['id'])) {

            return $query='UPDATE '.$this->tableName
                    .' SET '.implode(', ', $stm)
                    .' WHERE id=:id';
        } else {
            return $query='INSERT INTO '.$this->tableName
                    .' ('.implode(', ', $values).') '
                    .'VALUES ('.implode(', ', $columns).')';
        }

    }





    public function GetAll()
    {
        $query='SELECT * FROM '.$this->tableName;
        return $this->query($query);
    }


    public function GetOne($id)
    {
        $query='SELECT * FROM '.$this->tableName.
            ' WHERE id=:id';
        $param[':id']=$id;

        return $this->query($query, $param)[0];
    }


    public function Remove($id)
    {
        $query='DELETE FROM '.$this->tableName.
            ' WHERE id=:id';
        $param[':id']=$id;

        return $this->exec($query, $param);
    }


    public function Update($data=[])
    {
        return $this->exec($this->makeQuery($data), $data);
    }


    public function FindByColumn($data=[])
    {
        $key=array_keys($data)[0];

        $query='SELECT * FROM '.$this->tableName
                .' WHERE '.$key.'=:'.$key;


        return $this->query($query, $data)[0];
    }
}