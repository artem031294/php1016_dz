<?php
    function checkRegular($string) {
        echo gettype($string);
        if (gettype($string) != 'string') {
            return "Передаваемое значение должно быть строкой.";
        }

        $pattern = '/:\d+?/';
        return preg_split($pattern, $string);
    }
    print_r (checkRegular("RX packets:950381 errors:0 dropped:0 overruns:0 frame:0."));