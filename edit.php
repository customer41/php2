<?php

require __DIR__ . '/autoload.php';

$id = $_GET['id'];
$article = Article::findById($id);

$view = new View();
$view->article = $article;

if (empty($_POST)) {
    if ($article != false) {
        $view->display('edit.php');
    } else {
        header('Location: /index.php');
    }
} else {
    $title = $_POST['title'];
    $lead = $_POST['lead'];
    if ('' == $title || '' == $lead) {
        $view->error = 'Заполните все поля!';
        $view->display('edit.php');
    } else {
        $article->title = $title;
        $article->lead = $lead;
        $article->save();
        header('Location: /index.php');
    }
}