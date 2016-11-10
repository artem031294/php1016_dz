<?php
//Предложенная вами строка вывела смайлик, не смог понять в чем некорректность.
//Перечитал задание добавил вывод смайла в функцию

// В соответствии с заданием, для такой строки вообще ничего не должно выводиться


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
            smile();
        } else if ($value > 1000) {
            echo "Сеть есть";
        }
    }
	
	function smile () {
		echo "&#9786;";
	}
    checkRegular("RX packets: errors:150 d:)ropped:0 overruns:0 frame:0.");