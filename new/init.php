<?php
require 'vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'new',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => ''
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

class User extends Illuminate\Database\Eloquent\Model {

}
class Post extends Illuminate\Database\Eloquent\Model {

}