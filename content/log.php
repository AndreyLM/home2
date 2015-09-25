<?php

class log
{


    public function __construct()
    {

    }

    public function write($msg)
    {
        $f=fopen(__DIR__.'/log.txt', 'a+');
        $date=date('y/m/d H:i:s');
        fwrite($f, $date. ' '.$msg. PHP_EOL);
        fclose($f);
    }

    public function getMessage()
    {
        return file(__DIR__.'/log.txt');
    }

}