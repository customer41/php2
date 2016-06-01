<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1 style="text-align: center">Новостной сайт</h1>
    <a href="/index.php">На главную</a>
    <hr>
    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="/edit.php?id=<?php echo $article->id; ?>" method="post">
        <label for="title">Заголовок новости: </label><br>
        <input type="text" id="title" name="title" style="width: 400px" value="<?php echo $article->title; ?>"><br>
        <label for="lead">Содержание новости: </label><br>
        <textarea id="lead" name="lead" cols="50" rows="10"><?php echo $article->lead; ?></textarea><br>
        <input type="submit" value="Редактировать новость">
        <small>Автор: <?php echo $article->author->name; ?></small>
    </form>
</body>
</html>