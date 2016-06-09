<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Просмотр новости</title>
</head>
<body>
    <h1 style="text-align: center">Новостной сайт</h1>
    <a href="/news/all">На главную</a>
    <hr>
    <h2><?php echo $article->title; ?></h2>
    <p><?php echo $article->lead; ?></p>
    <p><small>Автор: <?php echo $article->author->name; ?></small></p>
    <a href="/admin/edit?id=<?php echo $article->id; ?>">Редактировать</a> |
    <a href="/admin/delete?id=<?php echo $article->id; ?>">Удалить</a>
    <hr>
</body>
</html>