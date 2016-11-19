<?php
// Принято
$myArray = [];
$fcsv = fopen("numbers.csv", "w");
for ($i = 1; $i <= 100; $i++) {
	$a = rand(1,100);
	$myArray[$i] = $a;
	fwrite($fcsv, $myArray[$i].",");
}
fclose($fcsv);

if (($handle = fopen("numbers.csv", "r")) !== FALSE) {
	// Если в файле заведомо только 1 строка, while не нцжен
	// Если в файле много строк, каждый круг цикла перетирает содержимое предыдущего круга
	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		$csvArray = $data;
	}
}
$sum = 0;
for ($i = 0; $i < count($csvArray); $i++) {
	if ($csvArray[$i] % 2 == 0) {
		$sum += $csvArray[$i];
	}
}
echo $sum;