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
        $str=explode(DIRECTORY_SEPARATOR, __DIR__);

        array_pop($str);
        unset($path[0]);

        $real_path=array_merge($str, $path);
        $path_str=implode(DIRECTORY_SEPARATOR, $real_path);


        require_once $path_str.'.php';
    }
}