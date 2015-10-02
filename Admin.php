<?php
require_once __DIR__ . '/content/autoload.php';

$act=isset($_GET['Action']) ? $_GET['Action'] : 'Index';
$action='action'.$act;

$controller=new AdminController();
$controller->$action();