<?php

	function mySort($f1,$f2) {
		if(count($f1) > count($f2)) return -1;
		elseif(count($f1) < count($f2)) return 1;
		else return 0;
	}
	
	$FILTER = array(
		"from" => (array_key_exists("from",$_GET)) ? $_GET["from"] : date("Y-m") . "-01",
		"to" => (array_key_exists("to",$_GET)) ? $_GET["to"] : date("Y-m-d")
	);
	
	$sqlBill = new mysqlTools($MYSQL_BILL["host"],$MYSQL_BILL["user"],$MYSQL_BILL["password"],$MYSQL_BILL["db"],'utf8');
	$sqlBill->connect();

	$agents = new Agents($sql,$city,$queue,$sqlBill);
	$agents->getNames();
	$agentsLate = $agents->agentsLate($FILTER["from"],$FILTER["to"]);

	uasort($agentsLate,"mySort");

	$smarty->assign('agents',$agentsLate);
	$smarty->assign('FILTER',$FILTER);

?>
