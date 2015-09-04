<?php
require_once __DIR__ . '/models/news.php';

$var=new News();
var_dump($var->GetAll());


