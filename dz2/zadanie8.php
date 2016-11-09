<?php
// Не принято
// Некорректная работа: "RX packets: errors:150 d:)ropped:0 overruns:0 frame:0."
    function checkRegular($string) {
        if (gettype($string) != 'string') {
            return "Передаваемое значение должно быть строкой.";
        }

        $pattern = '/[0-9]+/';
        preg_match($pattern, $string, $m);

        $value = intval($m[0]);
        if (preg_match("/:\)/", $string)) {
            echo "&#9786;";
        } else if ($value > 1000) {
            echo "Сеть есть";
        }
    }
    checkRegular("RX packets: errors:150 d:)ropped:0 overruns:0 frame:0.");