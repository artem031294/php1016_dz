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

    if($result = array_diff(array_map('serialize',$data1), array_map('serialize',$data2))) {
        //$result =  array_diff_assoc($data1, $data2);
        $pattern = '~"(.*?)(?:"|$)|([^"]+)~';
        $result = $result["users"];
       // preg_match_all($pattern, $result, $m, PREG_SET_ORDER);
        $em = explode('"', $result);
        $m = array();
        for ($i = 0; $i < sizeof($em); $i++) {
            if ($em[$i] === '') {continue;}
            if ($i % 2 != 0) {
                $m[] = array('elem' => $em[$i]);
            }
        }
        $new_m = array();
        $text = "";
        $newText = "";
        for ($i = 0; $i < sizeof($m); $i++) {
            foreach ($m[$i] as $k => $v) {
                if($i % 2 == 0) {
                    $text= $v;
                }
                else {
                    $newText = $v;
                }
                $new_m[$text] = $newText;
            }
        }

        echo "<pre>";
        print_r($m);
        echo "<pre>";
    } else {
        echo "Файлы одинаковые";
    }
}