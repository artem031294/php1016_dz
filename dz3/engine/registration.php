<?php
require_once 'config.php';

if (!empty($_POST)) {
    if ((isset($_POST['reg_login']) && isset($_POST['reg_pwd'])) && (!empty($_POST['reg_login']) || !empty($_POST['reg_pwd']))) {

        $login = mysqli_real_escape_string ($connection,$_POST["reg_login"]);
        $pwd = mysqli_real_escape_string ($connection,$_POST["reg_pwd"]);

        $sql = "INSERT INTO users (login,pwd) VALUES (?,?)";

        $stmt = $connection->prepare($sql);
        $stmt->bind_param('ss', $login, $pwd);
        $stmt->execute();
        //$connection->query($sql) or die(mysqli_error($connection));

        header('Location:' . SITE_PATH. 'success.php', true, 303);

    } else {
        echo "В чем-то ошибка, сами думайте в чем";
    }
}