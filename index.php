<?php

require_once __DIR__ . '/autoload.php';

$timer =new PhpTimer();
$timer->start('cycle');

$path=parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathData=explode('/', $path);

$contr=(isset($pathData[2]) && !empty($pathData[2])) ? $pathData[2] : 'News';
$meth=(isset($pathData[3]) && !empty($pathData[3])) ? ucfirst($pathData[3]) : 'Index';

$controllerClassName='App\\controllers\\'.$contr;

$action='action'.$meth;



try {
    $controller= new $controllerClassName;
    $controller->$action();
} catch (Exception $e) {
    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
    include("content/NotFound.php");
}



$timer->stop('cycle');

echo var_dump($timer->getAll());
