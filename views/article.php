<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Просмотр новости</title>
</head>
<body>
<?php if (false == $article): ?>
    <p>Запрашиваемая новость не существует</p>
<?php else: ?>
    <h1><?php echo $article->title; ?></h1>
    <p><?php echo $article->lead; ?></p>
<?php endif; ?>
</body>
</html>