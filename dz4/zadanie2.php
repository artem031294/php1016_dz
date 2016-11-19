<?php
// Принято
$myArr = [];
$myArr["users"]["1"] = array("name"=>"ivan","age"=>"20","job"=>"student");
$myArr["users"]["2"] = array("name"=>"sergei","age"=>"22","job"=>"student");

$fname = "output.json";
$newfname = "output2.json";
$fp = fopen($fname, "w");
fwrite($fp, json_encode($myArr));
fclose($fp);

if(file_exists($fname)) {
    $rn = rand(0,1);
    if($rn == 1) {
        echo "Меняем<br>";
        $fp = fopen("output.json", "r");
        $data = json_decode(file_get_contents($fname), true);
        $data["users"][1]["name"] = "andrei";
        $data["users"][1]["age"] = "22";
        $newFile = fopen($newfname, "w");
        fwrite($newFile, json_encode($data));
        fclose($newFile);
        fclose($fp);
        compare($fname, $newfname);
    } else {
        echo "Без изменений<br>";
        copy($fname, $newfname);
    }
}

function compare($file1, $file2) {
    $data1 = json_decode(file_get_contents($file1),true);
    $data2 = json_decode(file_get_contents($file2),true);
    echo "<pre>";
    print_r(checkArr($data1,$data2));
    echo "<pre>";
}

function checkArr($arr1, $arr2) {
    $arr3 = array("Несовпадение" => array());
    foreach($arr1['users'] as $data => $k) {
        foreach ($arr2['users'] as $data2 => $k2) {
            if(strcmp($k['name'], $k2['name']) != 0) {
                $arr3["Несовпадение"]['name'] = $k2['name'];
            }
            if(strcmp($k['age'], $k2['age']) != 0) {
                $arr3["Несовпадение"]['age'] = $k2['age'];
            }
            if(strcmp($k['job'], $k2['job']) != 0) {
                $arr3["Несовпадение"]['job'] = $k2['job'];
            }
        }
    }
    return $arr3;
}