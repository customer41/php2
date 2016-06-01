<?php

require __DIR__ . '/autoload.php';

$view = new View();

if (empty($_POST)) {
    $view->display('add.php');
} else {
    $title = $_POST['title'];
    $lead = $_POST['lead'];
    $author = $_POST['author'];
    if ('' == $title || '' == $lead || '' == $author) {
        $view->title = $title;
        $view->lead = $lead;
        $view->author = $author;
        $view->error = 'Заполните все поля!';
        $view->display('add.php');
    } else {
        $article = new Article();
        $article->title = $title;
        $article->lead = $lead;

        $authors = Author::findByColumn('name', $author);
        if (!empty($authors)) {
            $article->author_id = $authors[0]->id;
        } else {
            $a = new Author();
            $a->name = $author;
            $a->save();
            $article->author_id = $a->id;
        }
        $article->save();
        header('Location: /index.php');
    }
}