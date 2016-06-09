<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Ошибка</title>
</head>
<body>
    <h1 style="text-align: center">Новостной сайт</h1>
    <a href="/news/all">На главную</a>
    <hr>
    <p>К сожалению, произошла ошибка.</p>
    <p>Сообщение ошибки: <?php echo $error->getMessage(); ?></p>
</body>
</html>