<?php session_start();?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="style.css">
    <script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <header>
        <?php require_once('template/header.php'); ?>
    </header>
    <div class="clear"></div>
    <?php if (empty($_SESSION)) { ?>
    <h4>Вы не авторизованы на сайте!</h4>
    <?php } ?>
    <div class="wrapper">
        <div class="container">
            <p><b>Имя:&nbsp;</b><span class="data"></span></p>
            <p><b>Возраст:&nbsp;</b><span class="data"></span></p>
            <p><b>О себе:&nbsp;</b><span class="data"></span></p>
        </div>
    </div>
</body>
</html>