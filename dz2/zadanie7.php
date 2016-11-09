<?php
// Принято
    $string = "Карл у Клары украл Коллары";
    $string = preg_replace('/К+/', '', $string);
    echo $string . "<br>";

    $lim = "Две бутылки лимонада";
    $lim = preg_replace('[Две]', 'Три', $lim);
    echo $lim;