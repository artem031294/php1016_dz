<?php
	//Здадание3
	define("CONST1", 10);
	if(defined('CONST1'))
	{
		echo 'Константа CONST1 существует<br>';
	}
	else {
		echo 'Константа CONST1 НЕ существует<br>';
	}
	echo 'Const1= ', CONST1, '<br>';

	$val2=20;

	define("CONST1", $val2);
	if (CONST1 != $val2)
	{	
		echo 'константа не изменила своего значения:&nbsp;-&nbsp;-&nbsp;';
		echo 'Const1= ', CONST1, '<br>';
	}
	else {
			echo "Suddenly constant's value has been changed:&nbsp;-&nbsp;-&nbsp;";
			echo 'Const1= ', CONST1, '<br>';
	}
?>
