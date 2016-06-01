<?php

require __DIR__ . '/autoload.php';

$articles = Article::findLast(3);

$view = new View();
$view['articles'] = $articles;
$view->display('index.php');