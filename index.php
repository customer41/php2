<?php

require __DIR__ . '/classes/Db.php';
require __DIR__ . '/classes/Model.php';
require __DIR__ . '/models/Article.php';

$articles = Article::findAll();

var_dump($articles);