<?php
//Серверная часть авторизации
require_once 'config.php';

if (!empty($_POST)) {
    if ((isset($_POST['auto_login']) && isset($_POST['auto_pwd'])) && (!empty($_POST['auto_login']) || !empty($_POST['auto_pwd']))) {

        //$login = mysqli_real_escape_string ($connection,$_POST["auto_login"]);
        //$pwd = mysqli_real_escape_string ($connection,$_POST["auto_pwd"]);
        $login = $_POST['auto_login'];
        $pwd = $_POST['auto_pwd'];
        try {
        //echo $login . "  " . $pwd . "<br>";
        $sql = "SELECT id, pwd FROM users WHERE (login=:login)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['login'=>$login]);

        while($a = $stmt->fetch(PDO::FETCH_LAZY)) {
//            echo "<pre>";
//            var_dump($a);
//            echo "<pre>";
            if ($a->pwd == $pwd) {
                userSession($login, $a->id);
                if ($_SESSION['authorized']<>1) {
                    header('Location:' . SITE_PATH . 'dashboard.php', true, 303);
                }

            } else {
                die("Пароль неверный1");
            }
        }
    } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
    }

    }
}
if (!empty($_POST) && !empty($_POST['logout'])) {
    if (isset($_SESSION['login'])) {
        session_destroy();
    }
    header('Location:' . SITE_PATH . 'index.php');
}