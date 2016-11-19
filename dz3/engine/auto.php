<?php
//Серверная часть авторизации
require_once 'config.php';

if (!empty($_POST)) {
    if ((isset($_POST['auto_login']) && isset($_POST['auto_pwd'])) && (!empty($_POST['auto_login']) || !empty($_POST['auto_pwd']))) {

        $login = mysqli_real_escape_string ($connection,$_POST["auto_login"]);
        $pwd = mysqli_real_escape_string ($connection,$_POST["auto_pwd"]);
        echo gettype($login) . "  " . $pwd . "<br>";
        $sql = "SELECT id FROM nodes WHERE (login= ? AND pwd= ?)";

        $stmt = $connection->prepare($sql);
        $stmt->bind_param('ss', $login, $pwd);
        $stmt->execute();
        $stmt->bind_result($res);
        while($stmt->fetch()) {
            echo $res . "<br>";
        }

        //header('Location:' . SITE_PATH . 'dashboard.php', true, 303);

    } else {
        echo "В чем-то ошибка при авторизации, сами думайте в чем";
    }
}