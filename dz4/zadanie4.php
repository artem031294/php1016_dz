<?php
$ch = curl_init();  
$url = "https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json";

curl_setopt($ch, CURLOPT_URL, $url);  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
curl_setopt($ch, CURLOPT_HEADER, 0); 

$output = curl_exec($ch); 
if ($output === FALSE) {  
    echo "cURL Error: " . curl_error($ch);  
    return;  
}
curl_close($ch);

echo $output;