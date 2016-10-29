<?php
    $num = array(1 , 2 , 3 , 4 , 5);
    function name($numbers , $action ) {
        if (typeof($numbers != 'array')) {
            echo "<p>Можно использовать только с массивами!</p>";
            return;
        }
        if (typeof($action) != 'string') {
            echo "<p>Действие должно быть строкой</p>";
            return;
        }
        switch ($action) {
            case '':
                break;
            default:
                echo "<p>неизвестное действие</p>";
                break;
        }
    }