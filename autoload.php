<?php


function my_loader($class)
{

    if (file_exists(__DIR__.'/controllers/'.$class.'.php')) {
        require_once __DIR__.'/controllers/'.$class.'.php';
    } elseif (file_exists(__DIR__.'/models/'.$class.'.php')) {
        require_once __DIR__.'/models/'.$class.'.php';
    } elseif (file_exists(__DIR__.'/views/'.$class.'.php')) {
        require_once __DIR__.'/views/'.$class.'.php';
    } elseif (file_exists(__DIR__.'/'.$class.'.php')) {
        require_once __DIR__ . '/' . $class . '.php';
    } else {
        $classParts=explode('\\', $class);
        $classParts[0]= __DIR__;

        $path=implode(DIRECTORY_SEPARATOR, $classParts).'.php';
        if(file_exists($path)) {
            require $path;
        }
    }
}

spl_autoload_register('my_loader');
require __DIR__ . '/vendor/autoload.php';

