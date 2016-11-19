<?php
require_once 'config.php';

if (!empty($_POST)) {
	$login = $_POST["login"];
	$pwd = $_POST["pwd"];
	$sql = 'UPDATE users SET login = "' . $login .'", pwd ="' . $pwd . '"';
	$connection->query($sql) or die($connection->connection_error);
}