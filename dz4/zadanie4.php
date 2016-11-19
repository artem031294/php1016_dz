<?php
// Принято
// Обязательное задание: переделать на использование рекурсии
$ch = curl_init();  
$url = "https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json";

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Accept: application/json'
));


$output = curl_exec($ch);
$result = explode('; ', $output);
$result = $result[0];

$pattern_id = "/\"pageid\":[0-9]+/"; 
$pattern_title = "/\"title\":\".*?\"/";

$res_id = preg_match($pattern_id , $result, $m_id);
$res_title = preg_match($pattern_title , $result, $m_title);

if ($output === FALSE) {  
    echo "cURL Error: " . curl_error($ch) . "<br>";  
 }
curl_close($ch);

$m_id = implode(":",$m_id);
$m_title = implode(":",$m_title);

echo $m_title . "<br>" . $m_id . "<br>";