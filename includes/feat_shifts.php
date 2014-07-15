<?php
    
    require('libs/shifts.php');
	
	$FILTER = array(
		"from" => (array_key_exists("from",$_GET)) ? $_GET["from"] : date("Y-m") . "-01",
		"to" => (array_key_exists("to",$_GET)) ? $_GET["to"] : date("Y-m") . "-30"
	);
	
	$shifts_limits = array(
		"8" => 15,
		"12" => 15
	);

	$action_text = Null;

	$sqlBill = new mysqlTools($MYSQL_BILL["host"],$MYSQL_BILL["user"],$MYSQL_BILL["password"],$MYSQL_BILL["db"],'utf8');
	$sqlBill->connect();
	
	$agents = new Agents($sql,$city,$queue,$sqlBill);
	$agentsNamesOnline = $agents->getNamesOnline();
	$agents->getNames();
	$shifts = new Shifts($sql , $agents->agentsNames , $city , $queue);
	
	if (array_key_exists("export" , $_POST)) {
		if(is_uploaded_file($_FILES["shift"]["tmp_name"])){
			$pi = pathinfo($_FILES["shift"]["name"]);
			$filename = $pi['filename'];
			$fileext = $pi['extension'];
			if ($fileext == "xlsx") {
				move_uploaded_file($_FILES["shift"]["tmp_name"], $shifts->csv_dir . "/".$_FILES["shift"]["name"]);
				$shifts->csv_to_array($_FILES["shift"]["name"] , $_POST["year_month"]);
				#print_r($shifts->agentsShifts);
				$shifts->mysql_export($type);
			} else {
				die("File is not a csv-document");
			}
		}
	} else {
		if (array_key_exists("add" , $_POST)) {
			$add_shift = $shifts->add_shift($_POST["last_name"] , $_POST["cur_day"] , $_POST["start"] , $_POST["end"]);
			if (!$add_shift) {
				$action_text = '<p class="error">error</p>';
			} else {
				$agent_num = array_search($_POST["last_name"] , $agents->agentsNames);
				if ($agents->agentOnlineExist($agent_num)) {
					$agents->updateOnline($add_shift , $agent_num);	
				}
				$action_text = '<p class="success">success</p>';
			}
		} else if (array_key_exists("edit" , $_POST)){
			$edit_shift = $shifts->edit_shift($_POST["last_name"] , $_POST["cur_day"] , $_POST["start"] , $_POST["end"] , $_POST["id"]);
			if (!$edit_shift) {
				$action_text = '<p class="error">error</p>';
			} else {
				$agent_num = array_search($_POST["last_name"] , $agents->agentsNames);
				if ($agents->agentOnlineExist($agent_num)) {
					$agents->updateOnline($edit_shift , $agent_num);
				}
				$action_text = '<p class="success">success</p>';
			}
		} else if (array_key_exists("delete" , $_POST)){
			if ($shifts->delete_shift($_POST["id"])) {
				$action_text = '<p class="success">success</p>';
			} else {
				$action_text = '<p class="error">error</p>';
			}
		}
	}
	
	$windows = array();
	
	array_push($windows , array(
			"id" => "shift_add",
			"title" => "добавить смену",
			"body" => "shiftAdd.tpl",
			"height" => "200",
			"width" => "250",
			"display" => "none"
		) , array(
			"id" => "shift_edit",
			"title" => "редактировать смену",
			"body" => "shiftEdit.tpl",
			"height" => "200",
			"width" => "250",
			"display" => "none"
		) , array(
			"id" => "shift_delete",
			"title" => "редактировать смену",
			"body" => "shiftDel.tpl",
			"height" => "200",
			"width" => "250",
			"display" => "none"
		)
	);
	$mysql_shifts = $shifts->get_shifts($FILTER["from"] , $FILTER["to"] , $duration);
	$smarty->assign('WINDOWS' , $windows);
	$smarty->assign('FILTER' , $FILTER);
	$smarty->assign('duration' , $duration);
	$smarty->assign('type' , $type);
	$smarty->assign('mysql_shifts' , $mysql_shifts);
	$smarty->assign('shifts_limits' , $shifts_limits);
	$smarty->assign('agentsNamesOnline' , $agentsNamesOnline);
	$smarty->assign('agentsNames' , $agents->agentsNames);
	$smarty->assign('action_text' , $action_text);

?>
