<?php session_start();?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <title>Изменение данных</title>
    <link rel="stylesheet" href="assets/template/style.css">

</head>
<body>
<header>
    <?php require_once('template/header.php'); ?>
    <?php if (isset($_SESSION['id'])) {?>
</header>

<div class="clear"></div>
<div class="wrapper">
    <div class="container">
        <form method="post" action="engine/profile.php">
            <input type="text" name="user_name" placeholder="Имя">
            <input type="text" name="user_age" placeholder="Возраст">
            <input type="textarea" name="user_info" placeholder="О себе">
            <input type="submit" name="send_user_info" value="Изменить данные">
        </form>
        <div class="clear"></div>

        <?php if(!empty($_SESSION) && isset($_GET['res']) && $_GET['res'] == 'OK') { ?>
        <div class="result">
            <p>Данные успещно записаны.</p>
        </div>

        <?php header( "refresh:1.5;url=dashboard.php" ); } ?>
    </div>
</div>
<?php } ?>
</body>
</html>