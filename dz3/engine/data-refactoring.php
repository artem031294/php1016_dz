<?php
require_once 'config.php';
//вывод имени возраста и био пользователя
if (!empty($_GET) && isset($_GET['out_names'])) {
    try {
        $v = strval($_GET['out_names']);
        $sql = 'SELECT ' . $v . ' FROM users WHERE login="' . $_SESSION['login'] . '"';
        $stmt = $conn->prepare($sql);
        if ($stmt->execute(array($v))) {
            while ($a = $stmt->fetch(PDO::FETCH_LAZY)) {
                echo $a[$v];
            }
        }
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}