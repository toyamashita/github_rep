<?php
	//test comment2
	$time1 = "2013/11/04";
	$time2 = date("Y/m/d");
	
	//日付をstrtotime()で変換して比較します。
	if (strtotime($time1) > strtotime($time2)) {
		echo $time1."is newer than ".$time2;
	} else {
		echo $time1."is older than".$time2;
	}
?>

