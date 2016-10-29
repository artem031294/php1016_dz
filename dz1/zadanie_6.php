<?php
$bmw = array(
	"model"=>"X5",
	"speed"=>"120",
	"doors"=>"5",
	"year"=>"2015"
);
$opel = array(
	"model"=>"Rekord",
	"speed"=>"190",
	"doors"=>"4",
	"year"=>"1986"
);
$toyota = array(
	"model"=>"Avensis",
	"speed"=>"160",
	"doors"=>"4",
	"year"=>"2012"
);
$new_array = array("BMW"=>$bmw, "Opel"=>$opel, "Toyota"=>$toyota);
?>
<div style="border:1px solid black; width:150px; padding: 5px;">	
<?php
foreach ($new_array as $key=>$val)
{
	$str = "";
	foreach ($val as $k=>$v)
	{
		$str .= $v."&nbsp;";
	}
	echo "CAR&nbsp;", $key,"<br>", $str, "<br>";
}?>
</div>