<?php
require_once 'config.php';

if (isset($_SESSION['id'])) {

    if (!empty($_POST) && isset($_POST['send_user_info'])) {

        if (!empty($_POST['user_name']) || !empty($_POST['user_agr']) || !empty($_POST['user_info'])) {

            $name = htmlentities(strip_tags ($_POST['user_name']));
            $age = (int) (htmlentities(strip_tags ($_POST['user_age'])));
            $info = htmlentities(strip_tags ($_POST['user_info']));
            $login = $_SESSION['login'];

            $sql = 'UPDATE users SET name = ?, age = ?, about = ? WHERE login=\'' . $login  . '\'';
            $stmt = $conn->prepare($sql);
            try {
                $stmt->execute(array($name, $age, $info));
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
            header('Location:' . SITE_PATH . 'data.php?res=OK');

        } else {
            die("Вы указали не все данные");
        }
    }

} else {
    echo "Сначала авторизуйтесь на сайте";
}

