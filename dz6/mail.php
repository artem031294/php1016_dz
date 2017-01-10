<?php
require 'vendor/autoload.php';

$v = new Valitron\Validator($_POST);
$v->rule('required', 'name');
$v->rule('email', 'email');

if($v->validate()) {
    echo "It's Ok! Let's send it out.";
    myMail();
} else {
    print_r($v->errors());
}


function myMail()
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
    $mail->Body = 'PHPLS1016 <b>HELLO WORLD!</b>';
    $mail->AltBody = 'PHPLS1016';

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Ура!! Message has been sent';
    }
}