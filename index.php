<?php
require_once __DIR__.'/content/autoload.php';


$contr=isset($_GET['Contr']) ? $_GET['Contr'] : 'News';
$meth=isset($_GET['Action']) ? $_GET['Action'] : 'GetAll';

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
}




