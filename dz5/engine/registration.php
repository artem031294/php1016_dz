<?php
require_once 'config.php';

if (!empty($_POST)) {
    if ((isset($_POST['reg_login']) && isset($_POST['reg_pwd'])) && (!empty($_POST['reg_login']) || !empty($_POST['reg_pwd']))) {

        //$login = mysqli_real_escape_string ($conn,$_POST["reg_login"]);
        //$pwd = mysqli_real_escape_string ($conn,$_POST["reg_pwd"]);

        $login = $_POST['reg_login'];
        $pwd = $_POST['reg_pwd'];

        $check = "SELECT login FROM users";
        $stmt_check = $conn->query($check);
        while ($a = $stmt_check->fetch(PDO::FETCH_LAZY)) {
            if ($a->login == $login) {
                die ("Пользователь с такмим ником уже существует");
            }
        }

        $sql = "INSERT INTO users (login,pwd) VALUES (?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$login, $pwd]);

        header('Location:' . SITE_PATH. 'success.php', true, 303);

    } else {
        echo "В чем-то ошибка, сами думайте в чем";
    }
}