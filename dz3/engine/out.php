<?php
require_once 'config.php';

$sql = 'SELECT ? FROM users WHERE login="' . $_SESSION['login'] . '"';
$stmt->prepare($sql);

if (!empty($_GET) && isset($_GET['out_names'])) {

}
//dsfsdfsdfsdfsdfsf
function qu($value) {
    $_GLOBAL[$stmt]->execute($value);
}