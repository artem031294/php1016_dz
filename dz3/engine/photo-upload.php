<?php
require_once 'config.php';

$allowed =  array('gif','png' ,'jpg', 'jpeg');

if (!empty($_POST) && isset($_FILES['photo'])) {
    $filename = $_FILES['photo']['name'];

    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if(!in_array(strtolower($ext),$allowed) ) {
        echo 'Запрещенный тип файлов.';
        header( "refresh:1.5;url=../dashboard.php" );
    } else {

        $upload_dir = '../photos/';
        $upload_file = $upload_dir . basename($filename);

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $upload_file)) {
            echo "Файл корректен и был успешно загружен.\n";
            if (!isset($_POST['db_ignore'])) {
                $s = SITE_PATH . 'photos/' . $filename;
                $result = writeAvatar($s, $conn);
                header("refresh:1.5;url=../dashboard.php");
            } else {
                header("refresh:1.5;url=../photos/");
            }
        } else {
            echo "ALARM!!\n Ограничение 3МБ";
        }
    }

}

if (!empty($_GET) && isset($_GET['change_photo'])) {
    $image_path = $_GET['change_photo'];
    $sql = 'UPDATE users SET photo= ? WHERE login="' .  $_SESSION['login'] . '"';
    $stmt = $conn->prepare($sql);
    if (!empty($image_path)) {
        $stmt->execute(array($image_path));
        header('Location:/' . SITE_PATH . 'dashboard.php');
    } else {
        echo "Empty filepath";
    }
}


function writeAvatar ($path, $conn) {

    $sql = 'UPDATE users SET photo="' . $path . '" WHERE login="' . $_SESSION['login'] . '"';

    $stmt = $conn->prepare($sql);
    if($stmt->execute()) {
        $result = $path;
    }

    return $result;
}