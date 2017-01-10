<?php
//<html lang="ru">
//    <head>
//        <meta charset="UTF-8">
//        <title>Домашнее задание 6</title>
//    </head>
//    <body>
//    <form action="mail.php" method="post">
//        <input type="text" name="name">
//        <input type="text" name="email">
//        <textarea name="text" id="" cols="30" rows="10"></textarea>
//        <button type="submit">Отправить</button>
//    </form>
//
//    </body>
//</html>

require_once "simple_html_dom.php";

$html = new simple_html_dom();

$html = file_get_html('http://photodoska.ru/tomsk/');

if ($html->innertext != '') {
    foreach ($html->find('div.w1088px') as $a) {
        echo($a);
    }
}
//print_r($html);
$html->clear();
unset($html);