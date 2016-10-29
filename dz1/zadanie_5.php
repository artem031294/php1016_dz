<?php
//Задание5
$day = 3;
switch ($day) {
    case ($day == 1 || $day == 2 || $day == 3 || $day == 4 || $day == 5):
        echo 'Это рабочий день<br>';
        break;
    case 6:
    case 7:
        echo 'Это выходной день<br>';
        break;
    default:
        echo "Неизвестный день";
        break;
}
?>