<?php
// Принято
    function some() {
        $all = func_get_args();
        if (gettype($all[0]) != 'string') {
            echo "<p>Первый аргумент должен быть строкой, обозначающей действие</p>";
            return;
        }
        switch ($all[0]) {
            case '+':
                $sum = 0;
                for ($i = 1; $i < count($all); $i++) {
                    $sum += $all[$i];
                }
                return $sum;
                break;
            case '-':
                $sum = $all[1];
                for ($i = 2; $i < count($all); $i++) {
                    $sum -= $all[$i];
                }
                return $sum;
                break;
            case '*':
                $sum = 1;
                for ($i = 1; $i < count($all); $i++) {
                    $sum *= $all[$i];
                }
                return $sum;
                break;
            case '/':
                $sum = $all[1];
                for ($i = 2; $i < count($all); $i++) {
                    $sum /= $all[$i];
                }
                return $sum;
                break;
            default:
                echo "<p>Неизвестное действие</p>";
                break;
        }
    }

    echo some('+', 1,2,3,5.2,7,8);