<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1 style="text-align: center">Новостной сайт</h1>
    <a href="/news/all">На главную</a>
    <hr>
    <?php if (isset($errors)): ?>
        <?php foreach($errors as $error): ?>
            <p><?php echo $error->getMessage(); ?></p>
        <?php endforeach; ?>
    <?php endif; ?>
    <form action="/admin/edit?id=<?php echo $article->id; ?>" method="post">
        <label for="author">Автор новости: </label><br>
        <input type="text" id="author" name="author" readonly
               style="width: 400px; background-color: lightgray" value="<?php echo $article->author->name; ?>"><br>
        <label for="title">Заголовок новости: </label><br>
        <input type="text" id="title" name="title" style="width: 400px" value="<?php echo $article->title; ?>"><br>
        <label for="lead">Содержание новости: </label><br>
        <textarea id="lead" name="lead" cols="50" rows="10"><?php echo $article->lead; ?></textarea><br>
        <input type="submit" value="Редактировать новость">
    </form>
</body>
</html>