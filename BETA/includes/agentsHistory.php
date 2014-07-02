<?php

    ini_set('display_errors',1);
	require('setup.php');
    require('libs/mysqlTools.php');
    require('libs/agents.php');
	
	// CHECK FOR GET DATA	
	
	$queue = (array_key_exists("queue" , $_GET)) ? $_GET["queue"] : "tech-support";

	if (array_key_exists('city',$_GET)) {
		$city = $_GET["city"];
	} else {
		$city = "kiev";
	}
	
	if (array_key_exists('detail',$_GET)) {
		$detail = (is_numeric($_GET["detail"])) 
			? $_GET["detail"] 
			: null;
	} else {
		$detail = null;
	}

	$FILTER = array(
		"from" => (array_key_exists("from",$_GET)) ? $_GET["from"] : date("Y-m") . "-01",
		"to" => (array_key_exists("to",$_GET)) ? $_GET["to"] : date("Y-m-d")
	);

	// END OF HEAD-CHECKING
	
	$windows = array();
	
	array_push($windows , array(
			"id" => "recDiv",
			"title" => "Записи разговоров",
			"body" => "agentRecs.tpl",
			"height" => "500",
			"width" => "400",
			"display" => "none"
		), array(
			"id" => "offenceDiv",
			"title" => "Нарушения выходов",
			"body" => "offences.tpl",
			"height" => "500",
			"width" => "400",
			"display" => "none"
		)
	);

	$sql = new mysqlTools($MYSQL["host"],$MYSQL["user"],$MYSQL["password"],$MYSQL["db"]);
    $sql->connect();
	
	$sqlBill = new mysqlTools($MYSQL_BILL["host"],$MYSQL_BILL["user"],$MYSQL_BILL["password"],$MYSQL_BILL["db"],'utf8');
    $sqlBill->connect();
	$agents = new Agents($sql,$city,$queue,$sqlBill);
	$agents->getNames();
	$agentsHistory=$agents->historyAgents($FILTER["from"],$FILTER["to"]);

	$smarty = new Smarty_reports();
	$smarty->assign('agents',$agentsHistory);
	$smarty->assign('city',$city);
	$smarty->assign('queue',$queue);
	$smarty->assign('FILTER',$FILTER);
	$smarty->assign('WINDOWS',$windows);
    $smarty->display('agentsHistory.tpl');

?>
