<?php
if (isset($_REQUEST['datefrom'])) {
	$d1 = $_REQUEST['datefrom'];
	echo $d1;
	echo "<br>";
	$d5 = substr($d1, 14);
	$d2 = str_split($d1, 11);
	print_r($d2);
	echo "<br>";
	$d3 = $d2[0];
	echo $d3;
	echo "<br>";
	$d4 = strtotime($d3);
	echo $d4;
	echo "<br>";
	$dat=date_create();
	echo date_format($d4,"Y-m-d");
	$d6 = strtotime($d5);
	echo $d6;
	echo "<br>";
	$dat2=date_create();
	echo date_format($dat2,"Y-m-d");
	//echo $dat;
	
	//echo date_format($d4,"Y/m/d");
}
?>