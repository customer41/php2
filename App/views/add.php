<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Добавление новости</title>
</head>
<body>
    <h1 style="text-align: center">Новостной сайт</h1>
    <a href="/admin/all">Админ-панель</a>
    <hr>
    <?php if (isset($errors)): ?>
        <?php foreach($errors as $error): ?>
            <p><?php echo $error->getMessage(); ?></p>
        <?php endforeach; ?>
    <?php endif; ?>
    <form action="/admin/save" method="post">
        <label for="author">Автор новости: </label><br>
        <input type="text" id="author" name="author" style="width: 400px" value="<?php echo $author; ?>"><br>
        <label for="title">Заголовок новости: </label><br>
        <input type="text" id="title" name="title" style="width: 400px" value="<?php echo $title; ?>"><br>
        <label for="lead">Содержание новости: </label><br>
        <textarea id="lead" name="lead" cols="50" rows="10"><?php echo $lead; ?></textarea><br>
        <input type="submit" value="Добавить новость">
    </form>
</body>
</html>