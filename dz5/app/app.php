<?php
require_once 'core/model.php';
require_once 'core/controller.php';
require_once 'core/view.php';
require_once 'core/route.php';
require_once 'core/db.php';

Route::start();


$result = DBase::getInstance()->querySql('SELECT * FROM users');
echo "<pre>";
print_r($result);
echo "<pre>";