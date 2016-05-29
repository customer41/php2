<?php

require __DIR__ . '/models/Article.php';

$id = $_GET['id'];
$article = Article::findById($id);

if (false != $article) {
    $article->delete();
}

header('Location: /index.php');