<?php

	require('setup.php');
	require('libs/mysqlTools.php');
	require('libs/login.php');

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
		$smarty->assign('loginStatus' , $login->status);
	}

	$smarty->display('admin.tpl');

?>
