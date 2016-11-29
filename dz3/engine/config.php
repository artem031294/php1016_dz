<?php
session_start();

//define("DB_HOST","localhost");
//define("DB_DATABASE","phpls1016");
define("DB_DSN", "mysql:host=localhost; dbname=phpls1016");
define("DB_USER","root");
define("DB_PWD","");
try {
    $conn = new PDO(DB_DSN, DB_USER, DB_PWD);
} catch(PDOException $e) {
    echo $e->getMessage();
}

define("SITE_PATH","git/php1016_dz/dz3/");

$conn->query(" SET NAMES 'utf8' ");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function userSession ($login, $id) {
    $_SESSION['login'] = $login;
    $_SESSION['id'] = $id;
}

function get_photo ($conn) {
    $sql = 'SELECT photo FROM users WHERE login="' . $_SESSION['login'] . '"';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $path ='';
    while ($a = $stmt->fetch(PDO::FETCH_LAZY)) {
        $path = $a['photo'];
    }
    if ($path == '') return "error";
    return $path;
}