<?php

class mysql_db
{
    public function __construct()
    {
        mysql_connect('localhost', 'root', '') or die ('Error connecting to database');
        mysql_select_db('home2');
    }

    private function query($query, $class='stdClass')
    {
        $news=[];

        $res=mysql_query($query) or die ('Error querying database');


        while ($row=mysql_fetch_object($res, $class)) {
            $news[]=$row;
        }
        return $news;

    }

    private function exec($query)
    {
        return mysql_query($query);
    }

    public function GetAll($table, $class)
    {
        $query='SELECT * FROM '. $table;
        return $this->query($query, $class);
    }
}