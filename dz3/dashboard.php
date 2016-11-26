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
            <p><b>Имя:&nbsp;</b><a href="engine/out.php?out_names=name"></a></p>
            <p><b>Возраст:&nbsp;</b><a href="engine/out.php?out_names=age"></a></p>
            <p><b>О себе:&nbsp;</b><a href="engine/out.php?out_names=about"></a></p>
        </div>
    </div>
</body>
</html>