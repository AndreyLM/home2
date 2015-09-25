<?php

function __autoload($class='NewsController')
{
    if (file_exists(__DIR__.'/../controllers/'.$class.'.php')) {
        require_once __DIR__.'/../controllers/'.$class.'.php';
    } elseif (file_exists(__DIR__.'/../models/'.$class.'.php')) {
        require_once __DIR__.'/../models/'.$class.'.php';
    } elseif (file_exists(__DIR__.'/../views/'.$class.'.php')) {
        require_once __DIR__.'/../views/'.$class.'.php';
    } elseif (file_exists(__DIR__.'/'.$class.'.php')) {
        require_once __DIR__ . '/' . $class . '.php';
    } elseif (file_exists(__DIR__.'/MyExeptions.php')) {
        require_once __DIR__.'/MyExeptions.php';
    } else {
        $log=new log();
        $log->write('Could not find the page');

        throw new Exception();
    }
}