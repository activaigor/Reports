<?php

    ini_set('display_errors',1);
	require('setup.php');
    require('libs/mysqlTools.php');
    require('libs/agents.php');
	
	function mySort($f1,$f2) {
		if(count($f1) > count($f2)) return -1;
		elseif(count($f1) < count($f2)) return 1;
		else return 0;
	}
	
	// CHECK FOR GET DATA
	
	$queue = (array_key_exists("queue" , $_GET)) ? $_GET["queue"] : "shared";

	if (!array_key_exists('show',$_GET) or $_GET['show'] != '1') {
		die("no data");
	}
	
	if (array_key_exists('city',$_GET)) {
		$city = $_GET["city"];
	} else {
		$city = "kiev";
	}

	$FILTER = array(
		"from" => (array_key_exists("from",$_GET)) ? $_GET["from"] : date("Y-m-d"),
		"to" => (array_key_exists("to",$_GET)) ? $_GET["to"] : date("Y-m-d")
	);
	
	// END OF HEAD-CHECKING

	$disturbs = array(
		"time" => "временное",
		"order" => "порядковое"
	);

	$sql = new mysqlTools($MYSQL["host"],$MYSQL["user"],$MYSQL["password"],$MYSQL["db"]);
    $sql->connect();
	
	$sqlBill = new mysqlTools($MYSQL_BILL["host"],$MYSQL_BILL["user"],$MYSQL_BILL["password"],$MYSQL_BILL["db"],'utf8');
    $sqlBill->connect();

	$agents = new Agents($sql,$city,$queue,$sqlBill);
	$agents->getNames();
	$agentsLate = $agents->agentsDist($FILTER["from"],$FILTER["to"]);

	uasort($agentsLate,"mySort");

	$smarty = new Smarty_reports();
	$smarty->assign('agents',$agentsLate);
	$smarty->assign('city',$city);
	$smarty->assign('disturbs',$disturbs);
	$smarty->assign('FILTER',$FILTER);
    $smarty->display('agentsDisturb.tpl');

?>
