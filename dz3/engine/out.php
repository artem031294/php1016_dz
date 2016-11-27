<?php
require_once 'config.php';

$sql = 'SELECT ? FROM users WHERE login="' . $_SESSION['login'] . '"';
$stmt = $conn->prepare($sql);

if (!empty($_GET) && isset($_GET['out_names'])) {
    try {
        $v = $_GET['out_names'];
        $stmt->execute(array($v));
        while ($a = $stmt->fetch(PDO::FETCH_LAZY)) {
            //echo $a['"'. $v .'"'];
            print_r($a);
        }
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}