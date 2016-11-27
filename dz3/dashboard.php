<?php session_start();?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="style.css">
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
            <p><b>Имя:&nbsp;</b><span class="data" id="u_name" data-send="name"></span></p>
            <p><b>Возраст:&nbsp;</b><span class="data" id="u_age" data-send="age"></span></p>
            <p><b>О себе:&nbsp;</b><span class="data" id="u_about" data-send="about"></span></p>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>