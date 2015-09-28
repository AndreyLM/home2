<?php

//var_dump($_SERVER['REQUEST_URI']);
require_once __DIR__.'/content/autoload.php';

$path=parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathData=explode('/', $path);


$contr=(isset($pathData[2]) && !empty($pathData[2])) ? $pathData[2] : 'News';
$meth=(isset($pathData[3]) && !empty($pathData[3])) ? ucfirst($pathData[3]) : 'GetAll';

$controllerClassName=$contr.'Controller';
$action='action'.$meth;
try {
    $controller= new $controllerClassName;
    $controller->$action();
} catch (E404Exception $e) {
    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
    include("content/NotFound.php");
} catch (E403Exception $e) {
    header('HTTP/1.1 403 Forbidden');
    include('content/Forbidden.php');
} catch (Exception $e) {
    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
    include("content/NotFound.php");
}




