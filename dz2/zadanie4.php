<?php
    function intonly ($int1, $int2) {
        if (gettype($int1) != 'integer' || gettype($int2) != 'integer') {
            echo "Переданы параметры неверного типа!";
            return;
        }
        if ($int1 == 0 || $int2 == 0) {
            echo "Параметры должны быть больше единицы";
            return;
        }
        for ($i = 1; $i <= $int1; $i++ ) {
            for ($j = 1; $j <= $int2; $j++) {
                echo "\t" . $i*$j . "\t";
            }
            echo "<br>";
        }
    }
    intonly(10, 10);