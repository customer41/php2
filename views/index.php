<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Новостной сайт</title>
</head>
<body>
    <h1 style="text-align: center">Новостной сайт</h1>
    <a href="/add.php">Добавить новость</a>
    <hr>
<?php foreach ($articles as $article): ?>
    <h2><?php echo $article->title; ?></h2>
    <p><?php echo $article->lead; ?></p>
    <p><small>Автор: <?php echo $article->author->name; ?></small></p>
    <a href="/article.php?id=<?php echo $article->id; ?>">Читать новость</a> |
    <a href="/edit.php?id=<?php echo $article->id; ?>">Редактировать</a> |
    <a href="/delete.php?id=<?php echo $article->id; ?>">Удалить</a>
    <hr>
<?php endforeach; ?>
</body>
</html>