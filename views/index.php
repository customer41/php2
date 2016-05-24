<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Новостной сайт</title>
</head>
<body>
<?php foreach ($articles as $article): ?>
    <h1><?php echo $article->title; ?></h1>
    <p><?php echo $article->lead; ?></p>
    <a href="article.php?id=<?php echo $article->id; ?>">читать новость</a>
<?php endforeach; ?>
</body>
</html>