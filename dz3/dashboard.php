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
        <ul class="right-menu">
            <li>
                <form method="post" action="engine/auto.php">
                    <input type="hidden" name="act" value="logout">
                    <div>
                        <button type="submit">Выйти</button>
                    </div>
                </form>
            </li>
        </ul>
    </header>
    <div class="wrapper">
        <div class="container"><?php print_r($_SESSION); ?></div>
    </div>
</body>
</html>