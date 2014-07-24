<?php
		require('libs/cdr.php');
		
		if (count($_POST) > 0) {
			$new_url = "";
			foreach ($_POST as $post_key => $post_val) {
				$new_url .= "&$post_key=$post_val";
			}
			redirect("/$city/chanstat" . $new_url);
		}
		
		$sqlBill = new mysqlTools($MYSQL_BILL["host"],$MYSQL_BILL["user"],$MYSQL_BILL["password"],$MYSQL_BILL["db"],'utf8');
	    	$sqlBill->connect();
		
		$sqlAst = new mysqlTools($MYSQL_AST["host"],$MYSQL_AST["user"],$MYSQL_AST["password"],$MYSQL_AST["db"],'utf8');
	    	$sqlAst->connect();
	
		$FILTERS = array();
		foreach ($_GET as $get_key => $get_val) {
			if ($get_key != "from" && $get_key != "to" && $get_key != "order" && $get_key != "city" && $get_key != "feature") {
				$FILTERS[$get_key] = $get_val;
			}
		}
		
		$DATE_FILTERS = array(
			"from" => (array_key_exists("from",$_GET)) ? $_GET["from"] : date("Y-m-d 00:00:00"),
			"to" => (array_key_exists("to",$_GET)) ? $_GET["to"] : date("Y-m-d H:i:s"),
		);

		$cdr = new CDR($sqlBill,"billing");

		$mtc_chans = $sqlAst->query("SELECT * FROM gsm_channels WHERE channel = 'mtc'");
		$kyivstar_chans = $sqlAst->query("SELECT * FROM gsm_channels WHERE channel = 'kyivstar'");
		
		$FILTERS = array(
			"channel" => "SIP/mtc",
			"disposition" => "ANSWERED"
		);

		$cdr->getTable($FILTERS,$DATE_FILTERS["from"],$DATE_FILTERS["to"]);
		$cdr_stat_mtc = $cdr->CDRstat($DATE_FILTERS["from"],$DATE_FILTERS["to"]);
		
		$FILTERS = array(
			"channel" => "SIP/kyivstar",
			"disposition" => "ANSWERED"
		);
		
		$cdr->getTable($FILTERS,$DATE_FILTERS["from"],$DATE_FILTERS["to"]);
		$cdr_stat_kyivstar = $cdr->CDRstat($DATE_FILTERS["from"],$DATE_FILTERS["to"]);

		$smarty->assign('DATE_FILTERS',$DATE_FILTERS);
		$smarty->assign('total_calls',$cdr->total_calls);
		$smarty->assign('cdr_stat_mtc',$cdr_stat_mtc);
		$smarty->assign('cdr_stat_kyivstar',$cdr_stat_kyivstar);
		$smarty->assign('mtc_chans',$mtc_chans);
		$smarty->assign('kyivstar_chans',$kyivstar_chans);

?>
