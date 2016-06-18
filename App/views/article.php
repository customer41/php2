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
    <hr>
</body>
</html>