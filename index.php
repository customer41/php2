<?php

require __DIR__ . '/models/Article.php';

$articles = Article::findLast(3);

include __DIR__ . '/views/index.php';