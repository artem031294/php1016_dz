<?php


//�������1
$name = "�����";
$age="21";
echo ('���� �����: '.$name.'<br>');
echo ('��� '.$age.' ���<br>');
echo ('"<br>!<br>|<br>\<br>/<br>\'<br>"<br>\<br>');


//�������2
$total_ammount = 80;
$flom = 23;
$karan = 40;
$krask = $total_ammount - ($flom + $karan);
echo "��������, ����������� ��������: ".$krask."<br>";


//��������3
define("CONST1", 10);
if(defined('CONST1'))
{
	echo '��������� CONST1 ����������<br>';
}
else {
	echo '��������� CONST1 �� ����������<br>';
}
echo 'Const1= ', CONST1, '<br>';

$val2=20;

define("CONST1", $val2);
if (CONST1 != $val2)
{	
	echo '��������� �� �������� ������ ��������:&nbsp;-&nbsp;-&nbsp;';
	echo 'Const1= ', CONST1, '<br>';
}
else {
		echo "Suddenly constant's value has been changed:&nbsp;-&nbsp;-&nbsp;";
		echo 'Const1= ', CONST1, '<br>';
}

//�������4
$age = 20;
if (($age>18) && ($age<=65))
{
		echo "��� ��� �������� � ��������<br>";
} 
elseif ($age>65)
{
	echo "��� ���� �� ������";
}
elseif (($age>=1) && ($age<=17))
{
	echo "��� ��� ���� ��������";
}
else
{
	echo "����������� �������";
}

//�������5
$day = 3;
switch ($day) {
	case ($day == 1 || $day == 2 || $day == 3 || $day == 4 || $day == 5):
		echo '��� ������� ����<br>';
		break;
	case 6:
	case 7:
		echo '��� �������� ����<br>';
		break;
	default:
		echo "����������� ����";
		break;
}
//�������6
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

<?php
//�������7
for ($i = 1; $i < 10; $i++)
{
	for ($j=1; $j <= 10; $j++)
	{
		if(($i%2 == 0) && ($j%2 == 0))
		{
			echo "&nbsp;&nbsp;(".($i*$j).")&nbsp;&nbsp;";
		} 
		else 
		{
			echo "&nbsp;&nbsp;".($i*$j)."&nbsp;&nbsp;";
		}
	}
	echo "<br>";
}

//�������8
$str ="slovo1 slovo2 slovo3";
echo "������: ".$str."<br>";
$arr = explode(" ", $str);
print_r ($arr);
?>