<?php

	ini_set('display_errors',1);

	require('includes/setup.php');
	require('includes/libs/mysqlTools.php');
	require('includes/libs/login.php');
	require('includes/libs/agents.php');
	require('includes/functions.php');

	$sql = new mysqlTools($MYSQL["host"],$MYSQL["user"],$MYSQL["password"],$MYSQL["db"]);
	$sql->connect();
	$sqlBill = new mysqlTools($MYSQL_BILL["host"],$MYSQL_BILL["user"],$MYSQL_BILL["password"],$MYSQL_BILL["db"],'utf8');
	$sqlBill->connect();
	$smarty = new Smarty_reports();

	$login = new Login($sql,$sqlBill,'agents_reports');
	if (array_key_exists("name",$_POST) and array_key_exists("password",$_POST)) {
		$login->signIn($_POST["name"],$_POST["password"]);
	}
	if (array_key_exists("signout",$_GET)) {
		$login->signOut();	
	}

	if ($login->status != 1) {
		$smarty->assign('loginStatus' , $login->status);
	} else {
	
		$queue_get = (array_key_exists("queue" , $_GET)) ? $_GET["queue"] : Null;
		$city_get = (array_key_exists("city" , $_GET)) ? $_GET["city"] : Null;
		$feature_get = (array_key_exists("feature" , $_GET)) ? $_GET["feature"] : Null;

		if ($city_get != Null) {
			if (count($login->city) > 0) {
				$city = (array_search($city_get,$login->city) != FALSE) ? $city_get : $login->city[0];
			} else {
				$city = "none";
			}
		} else {
			$city = (count($login->city) > 0) ? $login->city[0] : "none";
		}
	
		if ($queue_get != Null) {
			if (count($login->queue) > 0) {
				$queue = (array_search($queue_get,$login->queue) != FALSE) ? $queue_get : $login->queue[0];
			} else {
				$queue = "tech";
			}
		} else {
			$queue = (count($login->queue) > 0) ? $login->queue[0] : "tech";
		}
	
		if ($feature_get != Null) {
			if (count($login->features) > 0) {
				$feature = (array_search($feature_get,$login->features) != FALSE) ? $feature_get : $login->features[0];
			} else {
				$feature = "queue";
			}
		} else {
			$feature = (count($login->features) > 0) ? $login->features[0] : "queue";
		}
			
		if (array_key_exists('detail',$_GET)) {
			$detail = (is_numeric($_GET["detail"])) 
				? $_GET["detail"] 
				: null;
		} else {
			$detail = null;
		}

		$windows = array();
	
		$smarty->assign('CITIES' , $CITIES);
		$smarty->assign('FEATURES' , $FEATURES);
		$smarty->assign('QUEUES' , $QUEUES);
		$smarty->assign('ICONS' , $ICONS);
		$smarty->assign('city' , $city);
		$smarty->assign('feature' , $feature);
		$smarty->assign('queue' , $queue);
		$smarty->assign('user' , $login->user);
		$smarty->assign('sip' , $login->sip);
		$smarty->assign('login_city' , $login->city);
		$smarty->assign('login_queue' , $login->queue);
		$smarty->assign('login_features' , $login->features);
		$smarty->assign('loginStatus' , $login->status);
		$smarty->assign('loginRule' , $login->rule);
		$smarty->assign('userPhoto' , $login->photo);
		$smarty->assign('agent_name' , $login->agent_name);
		$smarty->assign('detail' , $detail);

		if ($feature == "queue") {
			array_push($windows , array(
				"id" => "commentDiv",
				"title" => "Комментарий",
				"body" => "commentAgent.tpl",
				"height" => "100",
				"width" => "350",
				"display" => "none"
				)
			);
			$smarty->assign('WINDOWS' , $windows);
		} else if ($feature == "history") {
	
			if (count($_POST) > 0) {
				$new_url = "";
				foreach ($_POST as $post_key => $post_val) {
					$new_url .= "&$post_key=$post_val";
				}
				redirect($_SERVER["REQUEST_URI"] . $new_url);
			}
	
			$FILTER = array(
				"from" => (array_key_exists("from",$_GET)) ? $_GET["from"] : date("Y-m") . "-01",
				"to" => (array_key_exists("to",$_GET)) ? $_GET["to"] : date("Y-m-d")
			);

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
	
			$agents = new Agents($sql,$city,$queue,$sqlBill);
			$agents->getNames();
			$agentsHistory=$agents->historyAgents($FILTER["from"],$FILTER["to"]);
	
			$smarty->assign('agents',$agentsHistory);
			$smarty->assign('FILTER',$FILTER);
			$smarty->assign('WINDOWS',$windows);

		
		} else if ($feature == "cdr") {
		
			require('includes/libs/cdr.php');
		
			if (count($_POST) > 0) {
				$new_url = "";
				foreach ($_POST as $post_key => $post_val) {
					$new_url .= "&$post_key=$post_val";
				}
				#redirect($_SERVER["REQUEST_URI"] . $new_url);
				redirect("/$city/cdr" . $new_url);
			}

			$input_filters = array(
				"dstchannel" => "",
				"callie" => "",
				"queue_alias" => "",
				"caller" => "",
				"holdtime" => "",
				"speaktime" => ""
			);
		
			$FILTERS = array();
			foreach ($_GET as $get_key => $get_val) {
				if ($get_key != "from" && $get_key != "to" && $get_key != "order" && $get_key != "city" && $get_key != "feature") {
					$FILTERS[$get_key] = $get_val;
					if (array_key_exists($get_val,$input_filters)) {
						$input_filters[$get_key] = $get_val;
					}
				}
			}
	
			$DATE_FILTERS = array(
				"from" => (array_key_exists("from",$_GET)) ? $_GET["from"] : date("Y-m-d 00:00:00"),
				"to" => (array_key_exists("to",$_GET)) ? $_GET["to"] : date("Y-m-d H:i:s"),
			);

		
			$PAGE = (array_key_exists("page",$_GET)) ? $_GET["page"] : 1;
		
			$agents = new Agents($sql,null,"shared",$sqlBill);
			$agents->getNames();
	
			$cdr = new CDR($sql,$agents->agentsNames);
			$cdr_table = $cdr->getTable($FILTERS,$DATE_FILTERS["from"],$DATE_FILTERS["to"]);
			$pages_url = $cdr->pages_url($_GET,$cdr->pages_count);
	
			$queues = $cdr->getQueues();
			#$cdr_stat = $cdr->CDRstat($DATE_FILTERS["from"],$DATE_FILTERS["to"]);
			$cdr_stat = Null;
	
			$smarty->assign('cdr_table',$cdr_table);
			$smarty->assign('PAGE',$PAGE);
			$smarty->assign('DATE_FILTERS',$DATE_FILTERS);
			$smarty->assign('pages_count',$cdr->pages_count);
			$smarty->assign('queues',$queues);
			$smarty->assign('total_calls',$cdr->total_calls);
			$smarty->assign('avg_holdtime',$cdr->avg_holdtime);
			$smarty->assign('missed_calls',$cdr->missed_calls);
			$smarty->assign('cdr_stat',$cdr_stat);
			$smarty->assign('repeat_calls',$cdr->repeat_calls);
			$smarty->assign('pages_url',$pages_url);
			$smarty->assign('cdr',$cdr);
			$smarty->assign('input_filters',$input_filters);
			$smarty->assign('agentsNames',$agents->agentsNames);
	
		} else if ($feature == "shifts") {
			include_once("includes/feat_shifts.php");
		} else if ($feature == "lateness") {
			include_once("includes/feat_lateness.php");
		} else if ($feature == "account") {
			if (count($_POST) > 0) {
				$new_url = "";
				foreach ($_POST as $post_key => $post_val) {
					$new_url .= "&$post_key=$post_val";
				}
				redirect($_SERVER["REQUEST_URI"] . $new_url);
			}
			include_once("includes/feat_account.php");
		} else if ($feature == "logging") {
			$smarty->assign('log_text' , $login->log_text);
		} else if ($feature == "chanstat") {
			include_once("includes/feat_chanstat.php");
		}
	}

	$smarty->display('index.tpl');

?>
