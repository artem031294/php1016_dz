<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'phpls1016',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

class User extends Illuminate\Database\Eloquent\Model {

}

class Post extends Illuminate\Database\Eloquent\Model {

}

$users = User::all();

class Model_Db extends Model {
    private $host= 'localhost';
    private $user = 'root';
    private $pwd = '';
    private $db_name = 'phpls1016';
    private $conn;
    private static $instance;

    private function __construct() {
        try {
            $this->conn = new pdo("mysql:host=".$this->host.";dbname=".$this->db_name.";charset=utf8", $this->user, $this->pwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    private function __clone(){
    }
    private function __wakeup(){
    }

    public static function getInstance() {
        if(empty(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function querySql($query, $ret=false) {
        try {
            $result = $this->conn->query($query);
            if ($ret == false) return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function __destruct()
    {
        $this->conn = null;
    }
}