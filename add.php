<?php

require __DIR__ . '/models/Article.php';

if (empty($_POST)) {
    include __DIR__ . '/views/add.php';
} else {
    $title = $_POST['title'];
    $lead = $_POST['lead'];
    if ('' == $title || '' == $lead) {
        $error = 'Заполните все поля!';
        include __DIR__ . '/views/add.php';
    } else {
        $article = new Article();
        $article->title = $title;
        $article->lead = $lead;
        $article->save();
        header('Location: /index.php');
    }
}
