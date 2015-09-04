<?php

require_once __DIR__.'/content/autoload.php';

$contr=isset($_GET['Contr']) ? $_GET['Contr'] : 'News';
$meth=isset($_GET['Action']) ? $_GET['Action'] : 'GetAll';

$controllerClassName=$contr.'Controller';
$action=$meth.'Action';

$controller= new $controllerClassName;

var_dump($controller->$action());



