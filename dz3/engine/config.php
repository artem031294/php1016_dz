<?php
//define("DB_HOST","localhost");
//define("DB_DATABASE","phpls1016");
define("DB_DSN", "mysql:host=localhost; dbname=phpls1016");
define("DB_USER","root");
define("DB_PWD","");

$conn = new PDO(DB_DSN,DB_USER,DB_PWD);

$conn->query(" SET NAMES 'utf8' ");

define("SITE_PATH","/git/php1016_dz/dz3/");