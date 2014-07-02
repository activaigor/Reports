<?php

    ini_set('display_errors',1);
	require('setup.php');
    require('libs/mysqlTools.php');
    require('libs/agents.php');
    
	function pauseOrder($v1, $v2) {
        if ($v1['pausePerc'] == $v2['pausePerc']) return 0;
        return ($v1['pausePerc'] > $v2['pausePerc']) ? -1 : 1;
    }
    
    function onlineOrder($v1, $v2) {
        if ($v1['onlinePerc'] == $v2['onlinePerc']) return 0;
        return ($v1['onlinePerc'] > $v2['onlinePerc']) ? -1 : 1;
    }
    
    function offlineOrder($v1, $v2) {
        if ($v1['offlinePerc'] == $v2['offlinePerc']) return 0;
        return ($v1['offlinePerc'] > $v2['offlinePerc']) ? -1 : 1;
    }
    
    function callOrder($v1, $v2) {
        if ($v1['callPerc'] == $v2['callPerc']) return 0;
        return ($v1['callPerc'] > $v2['callPerc']) ? -1 : 1;
    }
    
    function totalOrder($v1, $v2) {
        if ($v1['totalTime'] == $v2['totalTime']) return 0;
        return ($v1['totalTime'] > $v2['totalTime']) ? -1 : 1;
    }
    
    function lateOrder($v1, $v2) {
        if ($v1['latePerc'] == $v2['latePerc']) return 0;
        return ($v1['latePerc'] > $v2['latePerc']) ? -1 : 1;
    }
    
    function workOrder($v1, $v2) {
        if ($v1['workDays'] == $v2['workDays']) return 0;
        return ($v1['workDays'] > $v2['workDays']) ? -1 : 1;
    }
	
	// CHECK FOR GET DATA	
	
	$queue = (array_key_exists("queue" , $_GET)) ? $_GET["queue"] : "tech-support";

	if (array_key_exists('city',$_GET)) {
		$city = $_GET["city"];
	} else {
		$city = "kiev";
	}
	
	$FILTER = array(
		"from" => (array_key_exists("from",$_GET)) ? $_GET["from"] : date("Y-m") . "-01",
		"to" => (array_key_exists("to",$_GET)) ? $_GET["to"] : date("Y-m-d"),
		"city" => (array_key_exists("city",$_GET)) ? $_GET["city"] : "kiev"
	);

	$COLUMNS = array(
		"СОТРУДНИК" => "name",
		"КОЛ-ВО СМЕН" => "work",
		"ВРЕМЕНИ ОТРАБОТАНО" => "total",
		"ВРЕМЯ ОНЛАЙН" => "online",
		"ВРЕМЯ РАЗГОВОРА" => "call",
		"ВРЕМЯ ОФЛАЙНА" => "offline",
		"ВРЕМЯ ПАУЗЫ" => "pause",
		"ВРЕМЯ ОПОЗДАНИЯ" => "late"
	);
	
	$ORDER = (array_key_exists("order",$_GET)) ? $COLUMNS[$_GET["order"]] : "total";

	$CITIES = array(
		"kiev" => "киев",
		"ifrankovsk" => "ивано-франковск",
		"ternopol" => "тернополь",
		"bc" => "белая церковь"
	);

	// END OF HEAD-CHECKING

	$smarty = new Smarty_reports();
    
	$sql = new mysqlTools($MYSQL["host"],$MYSQL["user"],$MYSQL["password"],$MYSQL["db"]);
    $sql->connect();
	
	$sqlBill = new mysqlTools($MYSQL_BILL["host"],$MYSQL_BILL["user"],$MYSQL_BILL["password"],$MYSQL_BILL["db"],'utf8');
    $sqlBill->connect();

	$agents = new Agents($sql,$city,$queue,$sqlBill);
	$agents->getNames();
	$report = $agents->makeReport($FILTER["from"],$FILTER["to"]);
	
	if ($ORDER == "name") ksort($report);
	else uasort($report , $ORDER . "Order");

	$smarty->assign('report',$report);
	$smarty->assign('COLUMNS',$COLUMNS);
	$smarty->assign('FILTER',$FILTER);
	$smarty->assign('CITIES',$CITIES);
	$smarty->assign('queue',$queue);
	$smarty->assign('ORDER',array_search($ORDER , $COLUMNS));
    $smarty->display('makeReport.tpl');

?>
