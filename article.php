<?php

require __DIR__ . '/models/Article.php';

$id = $_GET['id'];

$article = Article::findById($id);

include __DIR__ . '/views/article.php';