<?php

require __DIR__ . '/autoload.php';

$id = $_GET['id'];
$article = Article::findById($id);

$view = new View();
$view->article = $article;
$view->display('article.php');