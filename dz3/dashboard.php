<?php require_once 'engine/config.php';?>
<?php
if(!empty($_GET) && isset($_GET['ref'])) {
    header('Location:/' . SITE_PATH . 'photos/');
}
?>
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
    <?php } else {?>
    <div class="wrapper">
        <div class="container">
            <img src="<?php echo ("/". get_photo($conn)); ?>" alt="avatar" id="u_avatar" height="150px" width="150px">
            <div class="clear"></div>

            <h4>Новая аватарка:</h4>

            <form enctype="multipart/form-data" action="./engine/photo-upload.php" method="post">
                <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
                Загрузить аватар: <input name="photo" type="file" />
                <input type="submit" value="Загрузить" />
            </form>
            <div class="clear"></div>
            <hr>

            <h4 style="float: left">Выбрать из существующих</h4>

            <form action="dashboard.php?ref" method="get" style="margin-top: 15px; margin-left: 15px;">
                <input type="submit" value="Выбрать" name="ref"/>
            </form>
            <div class="clear"></div>
            <hr>

            <p><b>Имя:&nbsp;</b><span class="data" id="u_name" data-send="name"></span></p>
            <p><b>Возраст:&nbsp;</b><span class="data" id="u_age" data-send="age"></span></p>
            <p><b>О себе:&nbsp;</b><span class="data" id="u_about" data-send="about"></span></p>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="js/script.js"></script>
<?php } ?>
</body>
</html>