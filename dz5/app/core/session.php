<?php

class Session {
    protected $sessionID;
    public function __construct() {
        if (!isset($_SESSION)) {
            $this->start();
        }
    }

    public static function start() {
        session_start();
    }

    public function setParam($login, $id) {
        if (!isset($_SESSION)) {
            return false;
        }
        $sessionID = session_id();

        if($sessionID !== '') {
            $_SESSION['login'] = strip_tags($login);
            $_SESSION['id'] = strip_tags($id);
        }
    }

    public function destroy() {
        foreach($_SESSION as $key => $val) {
            unset($key[$val]);
        }
        return session_destroy();
    }
}