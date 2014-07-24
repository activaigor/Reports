<?php
    require('libs/mysqlTools.php');
    require('libs/agents.php');
    require('libs/login.php');
    include_once('config.php');
	$sql = new mysqlTools($MYSQL["host"],$MYSQL["user"],$MYSQL["password"],$MYSQL["db"]);
    $sql->connect();
	$sqlBill = new mysqlTools($MYSQL_BILL["host"],$MYSQL_BILL["user"],$MYSQL_BILL["password"],$MYSQL_BILL["db"],'utf8');
    	$sqlBill->connect();
	$login = new Login($sql,$sqlBill,'agents_reports');

	if (array_key_exists("ajax" , $_POST)) {
		if (array_key_exists("save" , $_POST)) {
			$agents = new Agents($sql);
			$id = $_POST["id"];
			$items = array(
				"offlineTime" => $agents->HRtoSEC($_POST["offline"]),
				"onlineTime" => $agents->HRtoSEC($_POST["online"]),
				"pauseTime" => $agents->HRtoSEC($_POST["pause"]),
				"callTime" => $agents->HRtoSEC($_POST["call"]),
				"lateTime" => $agents->HRtoSEC($_POST["late"]),
				"loginTime" => strtotime($_POST["login"]),
				"leaveTime" => strtotime($_POST["leave"]),
				"note" => $_POST["note"]
			);
			$agents->updateHistory($items , $id);
			$log_message = "";
			foreach ($items as $item => $value) {
				$log_message .= "$item - $value\n";
			}
			$log_message = "history data change on $id. new values:\n$log_message";
			$login->write_log($log_message);
		} elseif (array_key_exists("remove" , $_POST)) {
			$agents = new Agents($sql);
			if (array_key_exists("late" , $_POST)) {
				$id = $_POST["id"];
				$items = array(
					"unLate" => "1"
				);
				$agents->updateHistory($items , $id);
				$login->write_log("remove late flag on $id");
			} elseif (array_key_exists("history" , $_POST)) {
				$id = $_POST["id"];
				$sql->query("delete from work_stat where id=" . $id);
				$login->write_log("remove $id data from history");
			} elseif (array_key_exists("online" , $_POST)) {
				$name = "Agent/" . $_POST["id"];
				$agents->moveHistory($name);
				$login->write_log("drop $name from agents_online to history table");
			}
		} elseif (array_key_exists("group" , $_POST)) {
			$agents = new Agents($sql);
			$id1 = $_POST["id1"];
			$id2 = $_POST["id2"];
			$agents->historySum($id1 , $id2);
			$login->write_log("history group: $id1 with $id2");
		} elseif (array_key_exists("get" , $_POST)) {
			
			$detail = (empty($_POST["detail"])) ? $detail = null : $_POST["detail"];
			$my_agent = ($_POST["my_agent"] != "None") ? $_POST["my_agent"] : Null;
			$city = $_POST["city"];
			
			$queue = array_key_exists("queue" , $_POST) ? $_POST["queue"] : "tech";

			if (!$detail) $sql = new mysqlTools($MYSQL["host"],$MYSQL["user"],$MYSQL["password"],$MYSQL["db"]);
			else $sql = new mysqlTools($MYSQL["host"],$MYSQL["user"],$MYSQL["password"],$MYSQL["db"],"utf8");
    		$sql->connect();
			$agents = new Agents($sql,$city,$queue,$sqlBill,$my_agent);
			$agents->getNames();
			$agents->offlineOrder();
			$data = array(
				"agents" => $agents->onlineAgents($detail),
				"totalOnline" => $agents->totalOnline,
				"totalOffline" => $agents->totalOffline,
				"logText" => $agents->logText
			);
			echo json_encode($data);
		} elseif (array_key_exists("get_callers" , $_POST)) {
			$queue = $_POST["queue"];
			$city = $_POST["city"];
			$callers = $sql->query("SELECT * FROM callers_stat WHERE queue = '" . $city . "_" . $queue . "' ORDER BY time");
			echo json_encode($callers);
		} elseif (array_key_exists("spy" , $_POST)) {
			$num = $_POST["num"];
			$victim = $_POST["victim"];
			system("/usr/bin/python python/spy.py " . $victim . " " . $num);
			$login->write_log("spy-application execute on Agent/$victim");
		} elseif (array_key_exists("comment" , $_POST)) {
			$agent = $_POST["agent"];
			$sql->query("update agents_stat set note='" . $_POST["comment"] . "' where name='Agent/" . $agent . "'");
			$login->write_log("leave a comment on Agent/$agent");
		} elseif (array_key_exists("showRec" , $_POST)) {
			$id = $_POST["id"];
			$workDay = $sql->query("select name,loginTime,leaveTime from work_stat where id=" . $id);
			$workDay[0]["login"] = date("Y-m-d H:i:s" , $workDay[0]["loginTime"]);
			$workDay[0]["leave"] = date("Y-m-d H:i:s" , $workDay[0]["leaveTime"]);
			$records = $sqlBill->query("select record,start,end,duration,caller from cdr where dstchannel='" . $workDay[0]["name"] . "' and start>='" . $workDay[0]["login"] . "' and start<='" . $workDay[0]["leave"] . "' and duration>0");
			$login->write_log("listen to the records on $id");
			echo json_encode($records);
		} elseif (array_key_exists("showOffence" , $_POST)) {
			$id = $_POST["id"];
			$workDay = $sql->query("select name,loginTime,leaveTime from work_stat where id=" . $id . " limit 1");
			$agents = new Agents($sql);
			$offencesList=$agents->offencesList($workDay[0]["name"],$workDay[0]["loginTime"],$workDay[0]["leaveTime"]);
			$login->write_log("requested a list of offences");
			echo json_encode($offencesList);
		}
	} else {
		die("error");
	}
?>
