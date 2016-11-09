<?php
// Принято
//
// Замечания:
// 1, break; после return; совершенно бесполезен
// 2. return; внутри switch является плохим тоном из-за разбиения структуры функции
    $num = array(1 , 2 , 3 , 4 , 5);
    function name($numbers , $action ) {
        if (gettype($numbers) != 'array') {
            echo "<p>Можно использовать только с массивами!</p>";
            return;
        }
        if (gettype($action) != 'string') {
            echo "<p>Действие должно быть строкой</p>";
            return;
        }
        switch ($action) {
            case '+':
                $sum = 0;
                for ($i = 0; $i < count($numbers); $i++) {
                    $sum += $numbers[$i];
                }
                return $sum;
                break;
            case '-':
                $sum = $numbers[0];
                for ($i = 1; $i < count($numbers); $i++) {
                    $sum -= $numbers[$i];
                }
                return $sum;
                break;
            case '*':
                $sum = 1;
                for ($i = 0; $i < count($numbers); $i++) {
                    $sum *= $numbers[$i];
                }
                return $sum;
                break;
            case '/':
                $sum = $numbers[0];
                for ($i = 1; $i < count($numbers); $i++) {
                    $sum /= $numbers[$i];
                }
                return $sum;
                break;
            default:
                return "неизвестное действие";
                break;
        }
    }
    $test = name($num, 'art');
    echo "<p>Результат выполнения функции: " . $test . "</p>";