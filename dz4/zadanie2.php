<?php
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
        echo "GO!<br>";
        $fp = fopen("output.json", "r");
        $data = json_decode(file_get_contents($fname), true);
        $data["users"][1]["name"] = "andrei";
        $data["users"][1]["age"] = "22";


        $newFile = fopen($newfname, "w");
        fwrite($newFile, json_encode($data));
        fclose($newFile);
        fclose($fp);
    } else {
        echo "Anti go<br>";
        copy($fname, $newfname);
    }
}
compare($fname, $newfname);

function compare($file1, $file2) {
    $data1 = json_decode(file_get_contents($file1),true);
    $data2 = json_decode(file_get_contents($file2),true);
    echo "<pre>";
    print_r($data2);
    echo "<pre>";

    echo "<pre>";
    print_r(checkArr($data1,$data2));
    echo "<pre>";
   /* if($result = array_diff(array_map('serialize',$data1), array_map('serialize',$data2))) {
        //$result =  array_diff_assoc($data1, $data2);
        $pattern = '~"(.*?)(?:"|$)|([^"]+)~';
        $result = $result["users"];
       // preg_match_all($pattern, $result, $m, PREG_SET_ORDER);


        echo "<pre>";
        print_r($m);
        echo "<pre>";
    } else {
        echo "Файлы одинаковые";
    }*/
}

function checkArr($arr1, $arr2) {
    $arr3 = array();
    $arr4 = array();
    foreach($arr1['users'] as $data=>$k) {
        foreach ($k as $key=>$value) {
            echo $arr2['users'][$data][$k][$key][$value];/*
            if ($key[$value] != $arr2['users']['data'][$k][$key][$value]) {
                $arr3['users']['data'][$k][$key]["'".$value."'"] = $arr2['users']['data'][$k][$key]["'".$value."'"];
            }*/
        }
    }

    return $arr3;
}