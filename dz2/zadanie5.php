<?php
// Не принято
// 1) Строка 23455432 не является палиндромом?
// 2) Слишком много return; в рамках такой маленькой и простой функции
// 3) Проверить работу на строке "ААА"
    function one($string) {
        if (gettype($string) != 'string') {
            echo "Паарметр должен быть строкой";
            return;
        }
        if (strlen($string) == 0) {
            echo "Переданная строка не может быть пустой";
            return;
        } else {
            $string = preg_replace('/\s+/', '', $string);
            $string = strtolower($string);
            $parse = str_split($string);
            $n = count($parse);
            for ($i = 0; $i < $n; $i++) {
                if ($parse[$i] != $parse[$n - 1 - $i]) {
                    return false;
                }
            }
            return true;
        }
    }

    function two($string) {
        if (one($string)) {
            echo "Введенная строка: " . $string . " является ПАЛИНДРОМОМ";
        } else {
            echo "Введенная строка: " . $string . " - не ПАЛИНДРОМ";
        }

    }

    two("aaafdf");