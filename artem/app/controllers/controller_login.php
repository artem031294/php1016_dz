<?php
require_once 'app/models/model_user.php';

class Controller_Login extends Controller
{
    public $user;
    function action_index()
    {


        if(isset($_POST['auto_login']) && isset($_POST['auto_pwd']))
        {
            $login = strip_tags($_POST['auto_login']);
            $pwd = strip_tags($_POST['auto_pwd']);
            $query = 'SELECT id,pwd FROM users WHERE login="'.  $login .'"';

            $res = Model_Db::getInstance()->querySql($query);

            if(is_array($res)) {
                if($pwd == $res[0]['pwd']) {
                    $id = $res[0]['id'];

                    $this->user = new Model_User($login, $id);
                    $this->user->log_in();
                    //$this->view->generate('login_view.php', 'template_view.php', $this->user->log_in());
                    header('Location:/dash/');
                } else {
                    //$this->view->generate('login_view.php', 'template_view.php');
                    print_r("Неверная пара логин и пароль.");
                    header( "refresh:1.5;url=main" );
                }
            } else {
                echo("Ошибка доступа к БД.");
                return false;
            }
            //$this->view->generate('login_view.php', 'template_view.php', $this->user->log_in());
            return true;
        }

        if(isset($_POST['logout'])) {
            session_start();
            session_destroy();
            header('Location:/main');
        }

    }

}
