<?php
    $arr = array("stroka1" , "stroka2" , "stroka3" , "stroka4");
    function first ($array, $b = false) {
        if ($b === true) {
            $string = implode(", ",$array);
            echo $string;
        } else {
            foreach ($array as $v) {
                echo "<p>" . $v . "</p>";
            }
        }
    }
    first($arr);
    first($arr, true);