<?php

    require('setup.php');
    require('libs/mysqlTools.php');
    require('libs/login.php');
    require('libs/cdr.php');
    require('libs/agents.php');
	
	$CITIES = array(
		"kiev" => "киев",
		"ifrankovsk" => "ивано-франковск",
		"ternopol" => "тернополь",
		"bc" => "белая церковь"
	);
	
	$FILTERS = array();
	foreach ($_GET as $get_key => $get_val) {
		if ($get_key != "from" && $get_key != "to" && $get_key != "order" && $get_key != "city") {
			$FILTERS[$get_key] = $get_val;
		}
	}

	$DATE_FILTERS = array(
		"from" => (array_key_exists("from",$_GET)) ? $_GET["from"] : date("Y-m-d 00:00:00"),
		"to" => (array_key_exists("to",$_GET)) ? $_GET["to"] : date("Y-m-d H:i:s"),
	);
		
	$PAGE = (array_key_exists("page",$_GET)) ? $_GET["page"] : 1;

	$sql = new mysqlTools($MYSQL["host"],$MYSQL["user"],$MYSQL["password"],$MYSQL["db"]);
	$sql->connect();
	$sqlBill = new mysqlTools($MYSQL_BILL["host"],$MYSQL_BILL["user"],$MYSQL_BILL["password"],$MYSQL_BILL["db"],'utf8');
    	$sqlBill->connect();
	
	$login = new Login($sql,'agents_reports');
	if (array_key_exists("name",$_POST) and array_key_exists("password",$_POST)) {
		$login->signIn($_POST["name"],$_POST["password"]);
	}
	if (array_key_exists("signout",$_GET)) {
		$login->signOut();	
	}
	
	$agents = new Agents($sql,null,"shared",$sqlBill);
	$agents->getNames();
	
	$cdr = new CDR($sql,$agents->agentsNames);
	$cdr_table = $cdr->getTable($FILTERS,$DATE_FILTERS["from"],$DATE_FILTERS["to"]);
	$pages_url = $cdr->pages_url($_GET,$cdr->pages_count);

	$queues = $cdr->getQueues();
	$cdr_stat = $cdr->CDRstat($DATE_FILTERS["from"],$DATE_FILTERS["to"]);
	#print_r($cdr_table[0]);
	
	$smarty = new Smarty_reports();
	$smarty->assign('user' , $login->user);
	$smarty->assign('loginStatus' , $login->status);
	$smarty->assign('loginRule' , $login->rule);
	$smarty->assign('cdr_table',$cdr_table);
	$smarty->assign('CITIES',$CITIES);
	$smarty->assign('PAGE',$PAGE);
	$smarty->assign('pages_count',$cdr->pages_count);
	$smarty->assign('queues',$queues);
	$smarty->assign('total_calls',$cdr->total_calls);
	$smarty->assign('avg_holdtime',$cdr->avg_holdtime);
	$smarty->assign('missed_calls',$cdr->missed_calls);
	$smarty->assign('cdr_stat',$cdr_stat);
	$smarty->assign('repeat_calls',$cdr->repeat_calls);
	$smarty->assign('pages_url',$pages_url);
	$smarty->assign('cdr',$cdr);
	$smarty->assign('agentsNames',$agents->agentsNames);
    $smarty->display('queueCDR.tpl');

?>
