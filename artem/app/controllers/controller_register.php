<?php
require_once 'app/models/model_user.php';
require_once 'C:/xampp/htdocs/git/php1016_dz/dz6/vendor/autoload.php';
class Controller_Register extends Controller
{
    public $user;
    function action_index()
    {
        
        if(isset($_POST['reg_login']) && !empty($_POST['reg_login']) && isset($_POST['reg_pwd']) && !empty($_POST['reg_pwd']))
        {
            $login = strip_tags($_POST['reg_login']);
            $pwd = strip_tags($_POST['reg_pwd']);

            $q = 'SELECT login FROM users WHERE login="'.  $login .'"';
            $r = Model_Db::getInstance()->querySql($q);

            if(!empty($r[0]['login'])) {
                print_r("Такой пользователь уже есть.");
                header( "refresh:1.5;url=main" );
            }
            else {
                $query = 'INSERT INTO users (login,pwd) VALUES (' . $login . ',' . $pwd . ')';
                $res = Model_Db::getInstance()->querySql($query, true);

                $q = 'SELECT id FROM users WHERE login="' . $login . '"';
                $r = Model_Db::getInstance()->querySql($q);

                if (is_array($r)) {
                    $id = $r[0]['id'];
                    $this->user = new Model_User($login, $id);
                    $this->user->log_in();
                    //header('Location:/dash/');
                    echo $this->register_mail($login, $pwd);
                    $this->view->generate('login_view.php', 'template_view.php', $this->user->log_in());
                    return true;
                } else {
                    Route::ErrorPage404();
                }
            }
        }

        if(isset($_POST['logout']))
        {
            session_start();
            session_destroy();
            header('Location:/main');
        }

    }

    function register_mail($login, $pwd)
    {
        $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

//ПО СУТИ АУТЕНТИФИКАЦИЯ ЧЕРЕЗ МОЙ ЯНДЕКС
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.yandex.ru';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'artem.pomiluyko@yandex.ru';                 // SMTP username
        $mail->Password = 'fdbfr1638699497';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to


        $mail->setFrom('artem.pomiluyko@yandex.ru', 'PAS');
        $mail->addAddress('artone_2011@mail.ru', 'ASP_ART');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//перенаправление
//$mail->addReplyTo('info@example.com', 'Information');
//копии
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

        $mail->addAttachment('images/predelriska_game_logo.png');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Here is the subject';
        $mail->Body = 'New user on your site.<br>
                        <p>Login: ' . $login .'<br>Password: ' . $pwd . '</p>';
        $mail->AltBody = 'PHPLS1016';

        if (!$mail->send()) {
            return 'ВНИМАНИЕ';
            return 'Ошибка отправки: ' . $mail->ErrorInfo;
        } else {
            return 'Сообщение о регистрации отправлено администратору.';
        }
    }

}