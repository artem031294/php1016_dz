<?php
define("DB_HOST","localhost");
define("DB_DATABASE","phpls1016");
define("DB_USER","root");
define("DB_PWD","");

$connection = new mysqli(DB_HOST,DB_USER,DB_PWD, DB_DATABASE);
if ($connection->connect_errno) {
	die('Ошибка подключения к БД. ' . $connection->connect_error);
}
$connection->query(" SET NAMES 'utf8' ");

define("SITE_PATH","/git/php1016_dz/dz3/");