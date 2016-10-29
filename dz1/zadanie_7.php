<?php
//Задание7
for ($i = 1; $i < 10; $i++) {
    for ($j = 1; $j <= 10; $j++) {
        if (($i % 2 == 0) && ($j % 2 == 0)) {
            echo "&nbsp;&nbsp;(" . ($i * $j) . ")&nbsp;&nbsp;";
        } else {
            echo "&nbsp;&nbsp;" . ($i * $j) . "&nbsp;&nbsp;";
        }
    }
    echo "<br>";
}
?>