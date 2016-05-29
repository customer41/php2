<?php

require __DIR__ . '/models/Article.php';

$id = $_GET['id'];
$article = Article::findById($id);

if (empty($_POST)) {
    if ($article != false) {
        include __DIR__ . '/views/edit.php';
    } else {
        header('Location: /index.php');
    }
} else {
    $title = $_POST['title'];
    $lead = $_POST['lead'];
    if ('' == $title || '' == $lead) {
        $error = 'Заполните все поля!';
        include __DIR__ . '/views/edit.php';
    } else {
        $article->title = $title;
        $article->lead = $lead;
        $article->save();
        header('Location: /index.php');
    }
}
