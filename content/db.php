<?php

class db
{
    const DSN='mysql:dbname=home2;host=localhost;';
    private $className;
    private $tableName;


    public function __construct($className='stdClass', $tableName)
    {
        try {
            $this->dbh=new PDO(self::DSN, 'root', '');
        } catch (PDOException $e) {

            $log=new log();
            $log->write($e->getMessage());

            throw new E403Exception();
        }

        $this->className=$className;
        $this->tableName=$tableName;
    }


    private function query($query, $param=[])
    {
        try {
            $stm=$this->dbh->prepare($query);
            $stm->execute($param);
            return $stm->fetchAll(PDO::FETCH_CLASS, $this->className);
        } catch (PDOException $e) {
            $log=new log();
            $log->write($e->getMessage());

            throw new E403Exception();
        }



    }


    private function exec($query, $param=[])
    {
        try {
            $stm=$this->dbh->prepare($query);
            return $stm->execute($param);
        } catch (PDOException $e) {
            $log=new log();
            $log->write($e->getMessage());

            throw new E403Exception();
        }



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

        $res=$this->query($query, $param);

        if(empty($res)) {
            $log=new log();
            $log->write('Trying to get unexisting article');

            throw new E404Exception('The article with id='.$id.' was not found');
        }

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