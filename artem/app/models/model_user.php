<?php
class Model_User extends Model {
    public $id, $login;
    public $is_authorized = false;

    public function __construct($login, $id) {
        $this->login = $login;
        $this->id = $id;
    }

    public function log_in() {
        $this->userSession($this->login, $this->id);
        $this->is_authorized = true;

        return $_SESSION;
    }

    public function logout(){

        $this->is_authorized = false;
        if(!empty($_SESSION)) {
            foreach ($_SESSION as $s) {
                unset($s);
            }
            session_destroy();
        }
        unset($this->id, $this->login);
    }

    function userSession ($login, $id) {
        session_start();
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $id;
        return $_SESSION;
    }
}