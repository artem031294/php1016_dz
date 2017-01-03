<?php
class Controller_Register extends Controller
{
    public $user;
    function action_index()
    {


        if(isset($_POST['reg_login']) && isset($_POST['reg_pwd']))
        {
            $login = strip_tags($_POST['reg_login']);
            $pwd = strip_tags($_POST['reg_pwd']);

            $q = 'SELECT login FROM users WHERE login="'.  $login .'"';
            $r = Model_Db::getInstance()->querySql($q);

            if(!empty($r['login'])) return "Такой пользователь уже есть.";

            $query = 'INSERT INTO users (login,pwd) VALUES ({$login}, {$pwd})';
            $res = Model_Db::getInstance()->querySql($query);

            $q = 'SELECT id FROM users WHERE login="'.  $login .'"';
            $r = Model_Db::getInstance()->querySql($q);

            if (is_array($r)) {
                $id = $r['id'];
                $this->user = new Model_User($login, $id);
                $this->user->log_in();
                header('Location:/dash/');

                $this->view->generate('login_view.php', 'template_view.php', $this->user->log_in());
                return true;
            } else {
                Route::ErrorPage404();
            }
        }

        if(isset($_POST['logout']))
        {
            session_start();
            session_destroy();
            header('Location:/main');
        }

    }

}