<?php
// Принято
$file = simplexml_load_file('data.xml');
$out = "";

$header = $file->attributes();
echo "<h4>" . "Номер заказа: " . $header["PurchaseOrderNumber"] . "<br>Дата: " . $header["OrderDate"] . "</h4>";

foreach($file->Address as $address) {

    $out .= "<div style=\"background-color: aliceblue;\">";
    $out .=  "<p>Детали заказа: " . $address->attributes() . "</p>";
    $out .=  "<p>Имя Заказчика: " . $address->Name . "</p>";
    $out .=  "<p>Адрес: " . $address->Street . " / " . $address->City . " / " . $address->State . " / " . $address->Zip . " / " . $address->Country . "</p>";
    $out .= "</div>";
}
echo $out;

$out1 = "";

$subHeader = $file->DeliveryNotes;
echo "<h4>" . "Дополнительная информация: " . $subHeader . "</h4>";

foreach($file->Items->Item as $item) {

    $out1 .= "<div style=\"background-color: azure\">";
    $out1 .=  "<p>Номер заказа: " . $item->attributes() . "</p>";
    $out1 .=  "<p>Наименование товара: " . $item->ProductName . "</p>";
    $out1 .=  "<p>Количество: " . $item->Quantity . " </p> ";
    $out1 .=  "<p>Цена в USD: " . $item->USPrice . " </p> ";
    if ($item->Comment) $out1 .=  "<p>Комментарий к заказу: " . $item->Comment . " </p> ";
    if ($item->ShipDate) $out1 .=  "<p>Дата отправки: " . $item->ShipDate . " </p> ";
    $out1 .= "</div>";

}
echo $out1;