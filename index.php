<?php
require_once __DIR__.'/content/autoload.php';



$article=News::findByColumn('title', 'Check2!');
var_dump($article);

/*
$contr=isset($_GET['Contr']) ? $_GET['Contr'] : 'News';
$meth=isset($_GET['Action']) ? $_GET['Action'] : 'GetAll';

$controllerClassName=$contr.'Controller';
$action='action'.$meth;

$controller= new $controllerClassName;

$controller->$action();


*/
