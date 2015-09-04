<?php

function __autoload($class='NewsController')
{
    if (file_exists(__DIR__.'/../controllers/'.$class.'.php')) {
        require_once __DIR__.'/../controllers/'.$class.'.php';
    } elseif (file_exists(__DIR__.'/../models/'.$class.'.php')) {
        require_once __DIR__.'/../models/'.$class.'.php';
    }
}