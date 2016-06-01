<?php

require __DIR__ . '/autoload.php';

$id = $_GET['id'];
$article = Article::findById($id);

if (false != $article) {
    $article->delete();
}

header('Location: /index.php');