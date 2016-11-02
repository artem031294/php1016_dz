<?php
    echo date("d.m.y H:i") . "<br>";

    echo date("d.m.y H:i:s" , mktime(0, 0, 0, 2, 24, 2016));
    echo " Эта же дата в UNIX: " . mktime(0, 0, 0, 2, 24, 2016);