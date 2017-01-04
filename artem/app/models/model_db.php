<?php

class Model_Db extends Model {
    private $host= 'localhost';
    private $user = 'root';
    private $pwd = '';
    private $db_name = 'phpls1016';
    private $conn;
    private static $instance;

    private function __construct() {
        try {
            $this->conn = new pdo("mysql:host=".$this->host.";dbname=".$this->db_name.";charset=utf8", $this->user, $this->pwd);
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
        $result = $this->conn->query($query);
        if($ret == false) return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}