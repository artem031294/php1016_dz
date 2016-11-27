<?php
require_once 'config.php';

$sql = 'SELECT ? FROM users WHERE login="' . $_SESSION['login'] . '"';
$stmt = $conn->prepare($sql);

if (!empty($_GET) && isset($_GET['out_names'])) {
    try {
        $v = $_GET['out_names'];
        $m = array();
        $stmt->execute($v);
        while ($a = $stmt->fetch(PDO::FETCH_LAZY)) {
            $m["'" . $v . "'"] = $a["'" . $v . "'"];
        }
        echo $m["'" . $v . "'"];
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}