<?php
//Задание8
// Задание выполнено частично !--исправил!--
$str = "slovo1 slovo2 slovo3";
echo "Строка: " . $str . "<br>";
$arr = explode(" ", $str);
print_r($arr);
$new_arr = implode(",", $arr);
echo "Новая сторка " . $new_arr . "<br>";
?>