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
    } else {
        $path=explode('\\', $class);
        var_dump($path); die;

        unset($path[0]);
        unset($path[1]);
        $rightPath=implode(DIRECTORY_SEPARATOR, $path);
        var_dump($rightPath);
        die;
    }
}