<?php
// Принято
    $name = "test.txt";
    $f = fopen($name , "w");
    $text = "Hello World";
    fwrite($f, $text);
    fclose($f);

    function showContent($file) {
        echo file_get_contents($file);
    }
    showContent($name);
