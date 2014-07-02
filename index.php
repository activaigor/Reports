<?php

    require('includes/setup.php');
    require('includes/libs/mysqlTools.php');
    require('includes/libs/login.php');

	$CITIES = array(
		"kiev" => "киев",
		"ifrankovsk" => "ивано-франковск",
		"ternopol" => "тернополь",
		"kamenec" => "каменец-подольский",
		"qtnet" => "QTnet",
		"sdonetsk" => "северо-донецк",
		"bc" => "белая церковь"
	);
	
	$FEATURES = array(
		"cdr" => "журнал звонков",
		"table" => "графики смен"
	);
	
	$QUEUES = array(
		"tech" => "тех-поддержка",
		"experts" => "специалисты",
		"proposals" => "подключения",
		"test" => "тестовая очередь"
	);
	
	$queue = (array_key_exists("queue" , $_GET)) ? $_GET["queue"] : "tech";

	
	if (array_key_exists('detail',$_GET)) {
		$detail = (is_numeric($_GET["detail"])) 
			? $_GET["detail"] 
			: null;
	} else {
		$detail = null;
	}
    
	$sql = new mysqlTools($MYSQL["host"],$MYSQL["user"],$MYSQL["password"],$MYSQL["db"]);
    $sql->connect();
	
	$login = new Login($sql,'agents_reports');
	if (array_key_exists("name",$_POST) and array_key_exists("password",$_POST)) {
		$login->signIn($_POST["name"],$_POST["password"]);
	}
	if (array_key_exists("signout",$_GET)) {
		$login->signOut();	
	}
	
	$city_get = (array_key_exists("city" , $_GET)) ? $_GET["city"] : Null;
	$feature_get = (array_key_exists("feature" , $_GET)) ? $_GET["feature"] : Null;

	if ($city_get != Null) {
		if (count($login->city) > 0) {
			if (array_search($city_get,$login->city) != FALSE) {
				$city = $city_get;
			} else {
				$city = $login->city[0];
			}
		} else {
			$city = "none";
		}
	} else {
		$city = (count($login->city) > 0) ? $login->city[0] : "none";
	}
	
	if ($feature_get != Null) {
		if (count($login->features) > 0) {
			if (array_search($feature_get,$login->features) != FALSE) {
				$feature = $feature_get;
			} else {
				$feature = $login->features[0];
			}
		} else {
			$feature = "none";
		}
	} else {
		$feature = (count($login->features) > 0) ? $login->features[0] : "none";
	}
	
	$windows = array();
	
	array_push($windows , array(
			"id" => "commentDiv",
			"title" => "Комментарий",
			"body" => "commentAgent.tpl",
			"height" => "100",
			"width" => "350",
			"display" => "none"
		),array(
			"id" => "loggingDiv",
			"title" => "логирование",
			"body" => "logging.tpl",
			"height" => "600",
			"width" => "800",
			"display" => "none"
		)
	);

	$smarty = new Smarty_reports();
	$smarty->assign('CITIES' , $CITIES);
	$smarty->assign('FEATURES' , $FEATURES);
	$smarty->assign('QUEUES' , $QUEUES);
	$smarty->assign('log_text' , $login->log_text);
	$smarty->assign('city' , $city);
	$smarty->assign('queue' , $queue);
	$smarty->assign('detail' , $detail);
	$smarty->assign('user' , $login->user);
	$smarty->assign('sip' , $login->sip);
	$smarty->assign('login_city' , $login->city);
	$smarty->assign('login_features' , $login->features);
	$smarty->assign('WINDOWS' , $windows);
	$smarty->assign('loginStatus' , $login->status);
	$smarty->assign('loginRule' , $login->rule);
    $smarty->display('index.tpl');

?>
