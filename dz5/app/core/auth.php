<?php
class User {
    private $id, $username, $is_authorized=false, $db;

    private $db_host = "localhost";
    private $db_name = "phpls1016";
    private $db_user = "root";
    private $db_pass = "";

    public function __construct($username = null) {
        $this->$username = $username;
        $this->connectDb($this->db_name, $this->db_user, $this->db_pass, $this->db_host);
    }
    public function __destruct() {
        $this->db = null;
    }

    public function authorize($username, $pwd) {
        $query = 'SELECt id, username FROM users WHERE login= :username AND pwd= :pwd LIMIT 1';
        $stmt = $this=>db->prepare($query);
        $stmt->execute(
            array(
                ":username" => $username,
                ":password" =>$pwd
            )
        );
        $this->user = $stmt->fetch();
        if (!$this->user) {
            $this->is_authorized = false;
        } else {
            $this->is_authorized = true;
        }
    }

    public static function isAuthorized() {
        if(!empty($_SESSION["id"]) {
            return (bool) $_SESSION["id"];
        }
        return false;
    }

    public function logout() {
        if (!empty($_SESSION["id"])) {
            unset($_SESSION["id"];
            unset($_SESSION["login"];
        }
    }

    public function existUser($username) {
        $query = "select logn from users where login = :username limit 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute(
            array(
                ":username" => $username
            )
        );
        $row = $stmt->fetch();
        if (!$row) {
            return false;
        }
        return $row["login"];
    }

    public function SaveSession() {
        $_SESSION["login"] = $this->username;
        $_SESSION["id"]  =$this->id;
    }

    public function createUser ($username, $pwd) {
        if($this->existUser($username)) {
            throw new \Exception("Пользователь с таким логином уже существует: ", $username, 1);
        }
        $query = "INSERT INTO users (login, pwd) VALUES (:username, :pwd)";
        $stmt = $this->db->prepare($query);

        try {
            $this->db->beginTransaction();
            $result = $stmt->execute(
                array(
                    ':username' => $username,
                    ':pwd' => $pwd
                )
            );
            $this->db->commit();
        } catch (\PDOException $e) {
            $this->db->rollback();
            echo "Ошибка БД %d %s" .$e->getMessage();
            die();
        }
        if (!$result) {
            $info = $this->db->errorInfo();
            printf("Ошибка БД %d %s", $info[1] ,$info[2]);
            die();
        }
        return $result;
    }

    public function connectDb($db_name, $db_user, $db_pass, $db_host = "localhost") {
        try {
            $this->db = new \PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        } catch (\PDOexception $e) {
            echo "database error: " . $e->getmessage();
            die();
        }
        $this->db->query('set names utf8');

        return $this;
    }


}