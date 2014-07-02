<?php

	class Agents {

		private $mysqlLocal;
		private $mysqlBilling;
		private $agentsOnline;
		public $agentsNames;
		public $totalOnline;
		public $totalOffline;
		public $city;
		public $queue;
		private $whereClause;
		public $offlineNum;
		public $logText;
		public $agentsIP;
		public $my_agent;

		public function Agents($SQL,$CITY=null,$QUEUE="shared",$SQL_BILL=null,$my_agent = Null) {
			$this->mysqlLocal = $SQL;
			$this->mysqlBilling = $SQL_BILL;
			$this->queue = ($QUEUE != "None") ? $QUEUE : Null;
			$this->city = ($CITY != "None") ? $CITY : Null;
			$this->totalOnline = 0;
			$this->totalOffline = 0;
			$this->logText = "";
			$this->whereClause = $this->checkCityQueue($CITY,$QUEUE,$my_agent);
			$this->agentsIP = array();
			$this->my_agent = $my_agent;
		}

		public function updateHistory($item,$id) {
			if (!empty($id) && !empty($item)) {
				if (is_array($item)) {
					$queryItem = "";
					$k = 1;
					foreach ($item as $key => $value) {
						$queryItem .= ($k == count($item))
							? $key . "='" . $value . "' "
							: $key . "='" . $value . "', ";
						$k++;
					}
					$this->mysqlLocal->query("UPDATE work_stat SET " . $queryItem . " WHERE id=" . $id);
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		}
		
		public function updateOnline($item,$name) {
			if (!empty($name) && !empty($item)) {
				if (is_array($item)) {
					$queryItem = "";
					$k = 1;
					foreach ($item as $key => $value) {
						$queryItem .= ($k == count($item))
							? $key . "='" . $value . "' "
							: $key . "='" . $value . "', ";
						$k++;
					}
					$this->mysqlLocal->query("UPDATE agents_stat SET " . $queryItem . " WHERE name = '$name'");
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		}

		public function HRtoSEC($time) {
			list($hours,$minutes)=split(":",$time);
			$seconds=(int)(($hours*60+$minutes)*60);
			return $seconds;
		}


		private function checkCityQueue($CITY,$QUEUE,$MY_AGENT=Null) {
			 if ($CITY == Null and $QUEUE == Null and $MY_AGENT != Null) {
	                 	return "WHERE name = '$MY_AGENT'";
			 } else {
	                         if ($CITY != Null) {
	                                 return ($MY_AGENT == Null) ? "WHERE queue = '" . $CITY . "_" . $QUEUE . "'" : "WHERE queue = '" . $CITY . "_" . $QUEUE . "' or name = '$MY_AGENT'";
	                         } else {
	                                 return ($MY_AGENT == Null) ? "WHERE queue = 'kiev_" . $QUEUE . "'" : "WHERE queue = 'kiev_" . $QUEUE . "' or name = '$MY_AGENT'";
	                         }
			 }
                }


		public function moveHistory($name) {
			$array=$this->mysqlLocal->query("select * from agents_stat where name='" . $name  . "'");
            		// If the agent we are trying to delete from online-list isn't offline yet
			if ($array[0]["leaveTime"] == 0) $array[0]["leaveTime"] = time();
			
			$values = array("name","onlineTime","offlineTime","pauseTime","callTime","loginTime","leaveTime","note","shift_start","shift_end","shift_attr","duration","queue");
			$k=1;
			foreach ($values as $value) {
				$insertKeys .= ($k == count($values)) 
					? $value
					: $value . " , ";
				$insertVals .= ($k == count($values)) 
					? "'" . $array[0][$value] . "'"
					: "'" . $array[0][$value] . "' , ";
				$k++;
			}
			$insertQuery = "INSERT INTO work_stat (" . $insertKeys  . " , workDay) VALUES (" . $insertVals  . " , loginTime)";
			$this->mysqlLocal->query($insertQuery);
			$this->mysqlLocal->query("DELETE FROM agents_stat WHERE name='" . $name . "'");
			return true;
		}
		
		public function historySum($id1 , $id2) {
			$dropped = $this->mysqlLocal->query("select * from work_stat where id='" . $id2  . "'");
			$values = array("onlineTime","offlineTime","pauseTime","callTime","drops");
			$updateVals = "";
			foreach ($values as $value) {
				$updateVals .= $value . " = " . $value . " + " . $dropped[0][$value] . " , ";
			}
			$updateQuery = "UPDATE work_stat SET " . $updateVals . "leaveTime = '" . $dropped[0]["leaveTime"] .  "' WHERE id='" . $id1 .  "'";
			$this->mysqlLocal->query($updateQuery);
			$this->mysqlLocal->query("DELETE FROM work_stat WHERE id='" . $id2 . "'");
			return true;	
		}

		public function offlineOrder() {
			$offlineOrder = array();
			$array=$this->mysqlLocal->query("select name from agents_stat ".$this->whereClause." and leaveTime!='0' order by leaveTime;");
			$i = 1;
			foreach ($array as $value) {
				$offlineOrder[$value["name"]] = $i;
				$i++;
			}
			$this->offlineNum = $offlineOrder;
		}
		
		public function agentsDist($FROM , $TO , $INCL=true) {
			if (!$this->checkDateFormat($FROM) or !$this->checkDateFormat($TO)) {
				$FROM=date("Y-m") . "-01";
				$TO=date("Y-m-d");
			}
			$FROM = strtotime($FROM);
			$TO = strtotime($TO);
			$TO = ($INCL)
				? $TO + 86400
				: $TO;
			$array = $this->mysqlLocal->query("select * from offline_disturbers " . $this->whereClause . " and leaveTime>='".$FROM."' and leaveTime<='".$TO."'");
			$sortedArr = array();
			foreach ($array as $agent) {
				$lastName = (array_key_exists($agent["name"] , $this->agentsNames)) 
					? $this->agentsNames[$agent["name"]] . " | " . $agent["name"] 
					: "Неизвестен";
				$index = (array_key_exists($lastName,$sortedArr))
					? count($sortedArr[$lastName])
					: 0;

				// It is not a late if we have some note written
				
				$sortedArr[$lastName][$index]["start_date"] = date("Y-m-d" , $agent["leaveTime"]);
				$sortedArr[$lastName][$index]["start"] = date("H:i:s" , $agent["leaveTime"]);
				$sortedArr[$lastName][$index]["end"] = date("H:i:s" , $agent["backTime"]);
				$sortedArr[$lastName][$index]["duration"] = gmdate("i:s" , (int)($agent["backTime"]) - (int)($agent["leaveTime"]));
				
				$sortedArr[$lastName][$index]["dist_type"] = $agent["type"];
			}
			return $sortedArr;
		}

		public function agentsLate($FROM , $TO , $INCL=true) {
			if (!$this->checkDateFormat($FROM) or !$this->checkDateFormat($TO)) {
				$FROM=date("Y-m") . "-01";
				$TO=date("Y-m-d");
			}
			$FROM = strtotime($FROM);
			$TO = strtotime($TO);
			$TO = ($INCL)
				? $TO + 86400
				: $TO;

			$array = $this->mysqlLocal->query("select * from work_stat ".$this->whereClause." and unLate=0 and (((loginTime - shift_start > 600 and loginTime - shift_start <= 2940) or loginTime - shift_start > 3600 and shift_attr = 'default') or (loginTime - shift_start > 600 and shift_attr = 'associated')) and workDay>='".$FROM."' and workDay<='".$TO."'");
			#$array = $this->mysqlLocal->query("select * from work_stat ".$this->whereClause." and unLate=0 and (loginTime - shift_start > 600) and workDay>='".$FROM."' and workDay<='".$TO."'");
			$sortedArr = array();
			foreach ($array as $agent) {
				$lastName = (array_key_exists($agent["name"] , $this->agentsNames)) 
					? $this->agentsNames[$agent["name"]] . " | " . $agent["name"] 
					: "Неизвестен" . " | " . $agent["name"];
				$index = (array_key_exists($lastName,$sortedArr))
					? count($sortedArr[$lastName])
					: 0;
				$sortedArr[$lastName][$index] = $agent;

				// It is not a late if we have some note written
				if (empty($agent["note"])) {
					$sortedArr[$lastName][$index]["lateTime"] = (int)($agent["loginTime"]) - (int)($agent["shift_start"]);
					$sortedArr[$lastName][$index]["late"] = $this->format_time((int)($agent["loginTime"]) - (int)($agent["shift_start"]));
				} else {
					$sortedArr[$lastName][$index]["lateTime"] = 0;
					$sortedArr[$lastName][$index]["late"] = $this->format_time($agent["lateTime"]);
				}
				
				$sortedArr[$lastName][$index]["workDay"] = date("Y-m-d" , $agent["loginTime"]) . " [ " . date("H:i:s" , $agent["loginTime"]) . " - " . date("H:i:s" , $agent["leaveTime"]) . " ] ";
				$sortedArr[$lastName][$index]["offline"] = $this->format_time($agent["offlineTime"]);
				$sortedArr[$lastName][$index]["online"] = $this->format_time($agent["onlineTime"]);
				$sortedArr[$lastName][$index]["pause"] = $this->format_time($agent["pauseTime"]);
				$sortedArr[$lastName][$index]["call"] = $this->format_time($agent["callTime"]);
				$sortedArr[$lastName][$index]["login"] = date("Y-m-d H:i:s" , $agent["loginTime"]);
				$sortedArr[$lastName][$index]["leave"] = date("Y-m-d H:i:s" , $agent["leaveTime"]);
			}
			return $sortedArr;
		}
		
		public function onlineAgents($AGENT_DETAIL) {
			if ($AGENT_DETAIL != null) {
				$this->whereClause = " where name='Agent/".$AGENT_DETAIL."'";
				$this->logText = $this->getLog();
			}
			
			#$array = $this->mysqlLocal->query("select * from agents_online ".$this->whereClause);
			$array = $this->mysqlLocal->query("select * from agents_online");
			
			foreach ($array as $row) {
				$this->agentsIP[$row["name"]] = $row;
			}
			
			$array = $this->mysqlLocal->query("select * from agents_stat ".$this->whereClause." order by offlineTime+onlineTime+pauseTime");
			#$query = "select * from agents_stat ".$this->whereClause." order by offlineTime+onlineTime+pauseTime";
			$i=0;

			foreach ($array as $agent) {
				if ($agent["status"]<>"away" and $agent["status"]<>"offline") {
					$this->totalOnline++;
				} elseif ($agent["status"]=="offline") {
					$this->totalOffline++;
				}
				
				/*
				$array[$i]["duration"] = (($agent["onlineTime"] + $agent["offlineTime"] + $agent["pauseTime"]) > 8.3*60*60)
					? 12
					: 8;
				*/
				$array[$i]["duration"] = (int)($agent["duration"] / 3600);
				
				$factor = 100/(($array[$i]["duration"]+0.3)*60*60);
				
				$agentID = explode("/",$agent["name"]);
				$array[$i]["id"] = $agentID[1];
				if (array_key_exists($agent["name"] , $this->agentsIP)) {
					$array[$i]["ip"] = $this->agentsIP[$agent["name"]]["address"];
				} else {
					$array[$i]["ip"] = "unknown";
				}
				$array[$i]["online_perc"] = $agent["onlineTime"]*$factor;
				$array[$i]["offline_perc"] = $agent["offlineTime"]*$factor;
				$array[$i]["pause_perc"] = $agent["pauseTime"]*$factor;
				$array[$i]["online"] = $this->format_time($agent["onlineTime"]);
				$array[$i]["offline"] = $this->format_time($agent["offlineTime"]);
				$array[$i]["pause"] = $this->format_time($agent["pauseTime"]);
				$array[$i]["call"] = $this->format_time($agent["callTime"]);
				
				$array[$i]["last_name"] = array_key_exists($agent["name"] , $this->agentsNames) ? $this->agentsNames[$agent["name"]] : "unknown";
				
				$array[$i]["login"] = date("Y-m-d H:i:s",$agent["loginTime"]);
				if ($agent["leaveTime"]!=0) $array[$i]["logout"] = date("Y-m-d H:i:s",$agent["leaveTime"]);
				else $array[$i]["logout"] = "пусто";
				$array[$i]["note"] = (!empty($agent["note"])) ? $agent["note"] : "пусто";
				if ($agent["status"]=="offline" && $agent["lunch"]==1) $array[$i]["status"] = "lunch";
				if ($agent["status"]!="online" && $agent["status"]!="busy") {
					$array[$i]["offlineNum"] = $this->offlineNum[$agent["name"]];
				} else {
					$array[$i]["offlineNum"] = 0;
				}
				$i++;
			}
			#return $query;
			return $array;
		}
		
		public function tableCDR($FILTERS,$FROM,$TO,$INCL=true) {
			if (!$this->checkDateFormat($FROM) or !$this->checkDateFormat($TO)) {
				$FROM=date("Y-m") . "-01";
				$TO=date("Y-m-d");
			}
			$FROM = strtotime($FROM);
			$TO = strtotime($TO);
			$TO = ($INCL)
				? $TO + 86400
				: $TO;
			
			foreach($FILTERS as $param_name => $param) {
				$clause_query .= "( ";
				$i = 1;
				foreach($param as $value) {
					if ($i < count($param)) $clause_query .= $param_name . " = '" . $value . "' or ";
					else $clause_query .= $param_name . " = '" . $value . "' ";
					$i++;
				}
				if ($k < count($filters_sorted)) $clause_query .= ") and ";
				else $clause_query .= ")";
				$k++;
			}
			echo $clause_query;

		}

		public function makeReport($FROM,$TO,$INCL=true) {
			if (!$this->checkDateFormat($FROM) or !$this->checkDateFormat($TO)) {
				$FROM=date("Y-m") . "-01";
				$TO=date("Y-m-d");
			}
			$FROM = strtotime($FROM);
			$TO = strtotime($TO);
			$TO = ($INCL)
				? $TO + 86400
				: $TO;
			$array = $this->mysqlLocal->query("select * from work_stat ".$this->whereClause." and workDay>='".$FROM."' and workDay<='".$TO."'");
			$i=0;
			$sortedArr = array();
			foreach ($array as $agent) {
			$lastName = (array_key_exists($agent["name"] , $this->agentsNames)) ? $this->agentsNames[$agent["name"]] : "Неизвестен";
        		if (array_key_exists($lastName,$sortedArr)){
            			$sortedArr[$lastName]["onlineTime"]+=$agent["onlineTime"];
            			$sortedArr[$lastName]["offlineTime"]+=$agent["offlineTime"];
            			$sortedArr[$lastName]["pauseTime"]+=$agent["pauseTime"];
            			$sortedArr[$lastName]["callTime"]+=$agent["callTime"];
            			$sortedArr[$lastName]["totalTime"]+=$agent["onlineTime"]+$agent["offlineTime"]+$agent["pauseTime"];
            			$sortedArr[$lastName]["workDays"]+=1;
				$lateTime = (int)($agent["loginTime"]) - (int)($agent["shift_start"]);
            			
				if (((int)($agent["unLate"]) == 0) and (empty($agent["note"])) and (($lateTime > 10*60 and $lateTime <= 49*60) or ($lateTime > 60*60))) {
                			$sortedArr[$lastName]["lateTime"] += $lateTime;
            			}
			
			} else {
            			$sortedArr[$lastName]["onlineTime"]=$agent["onlineTime"];
            			$sortedArr[$lastName]["offlineTime"]=$agent["offlineTime"];
            			$sortedArr[$lastName]["pauseTime"]=$agent["pauseTime"];
            			$sortedArr[$lastName]["callTime"]=$agent["callTime"];
            			$sortedArr[$lastName]["totalTime"]=$agent["onlineTime"]+$agent["offlineTime"]+$agent["pauseTime"];
            			$sortedArr[$lastName]["workDays"]=1;
				$lateTime = (int)($agent["loginTime"]) - (int)($agent["shift_start"]);
            			
				if (((int)($agent["unLate"]) == 0) and (empty($agent["note"])) and (($lateTime > 10*60 and $lateTime <= 49*60) or ($lateTime > 60*60))) {
                			$sortedArr[$lastName]["lateTime"] = $lateTime;
            			} else {
                			$sortedArr[$lastName]["lateTime"] = 0;
				}
			}
			}
			foreach ($sortedArr as $name => $data) {
				$sortedArr[$name]["offline"] = $this->format_time($data["offlineTime"]);
				$sortedArr[$name]["online"] = $this->format_time($data["onlineTime"]);
				$sortedArr[$name]["pause"] = $this->format_time($data["pauseTime"]);
				$sortedArr[$name]["call"] = $this->format_time($data["callTime"]);
				$sortedArr[$name]["total"] = $this->format_time($data["totalTime"]);
				$sortedArr[$name]["late"] = $this->format_time($data["lateTime"]);

				// PERCENTS
				
				$sortedArr[$name]["offlinePerc"] = round(($data["offlineTime"]/$data["totalTime"])*100 , 1);
				$sortedArr[$name]["onlinePerc"] = round(($data["onlineTime"]/$data["totalTime"])*100 , 1);
				$sortedArr[$name]["callPerc"] = round(($data["callTime"]/$data["onlineTime"])*100 , 1);
				$sortedArr[$name]["pausePerc"] = round(($data["pauseTime"]/$data["totalTime"])*100 , 1);
				$sortedArr[$name]["latePerc"] = round(($data["lateTime"]/$data["totalTime"])*100 , 1);
				$sortedArr[$name]["totalPerc"] = 100;
			}

			return $sortedArr;

		}
		
		public function historyAgents($FROM,$TO,$INCL=true) {
			// The range includes the boundary conditions if INCL=true
			if (!$this->checkDateFormat($FROM) or !$this->checkDateFormat($TO)) {
				$FROM=date("Y-m") . "-01";
				$TO=date("Y-m-d");
			}
			$FROM = strtotime($FROM);
			$TO = strtotime($TO);
			$TO = ($INCL)
				? $TO + 86400
				: $TO;
			$array = $this->mysqlLocal->query("select * from work_stat ".$this->whereClause." and workDay>='".$FROM."' and workDay<='".$TO."'");
			$i=0;
			$sortedArr = array();
			foreach ($array as $agent) {
				$lastName = (array_key_exists($agent["name"] , $this->agentsNames)) 
					? $this->agentsNames[$agent["name"]] . " | " . $agent["name"] 
					: $agent["name"];
				$month = date("Y-m" , $agent["workDay"]);
				if (array_key_exists($lastName,$sortedArr)) {
					$index = (array_key_exists($month,$sortedArr[$lastName]))
						? count($sortedArr[$lastName][$month])
						: 0;
				} else {
					$index = 0;
				}
				
				$sortedArr[$lastName][$month][$index] = $agent;
				
				if (empty($agent["note"])) {
					$sortedArr[$lastName][$month][$index]["late"] = $this->format_time((int)($agent["loginTime"]) - (int)($agent["shift_start"]));
				} else {
					#$sortedArr[$lastName][$month][$index]["lateTime"] = 0;
					$sortedArr[$lastName][$month][$index]["late"] = $this->format_time(0);
				}
				$sortedArr[$lastName][$month][$index]["day"] = date("Y-m-d", $agent["workDay"]);
				$sortedArr[$lastName][$month][$index]["offline"] = $this->format_time($agent["offlineTime"]);
				$sortedArr[$lastName][$month][$index]["online"] = $this->format_time($agent["onlineTime"]);
				$sortedArr[$lastName][$month][$index]["pause"] = $this->format_time($agent["pauseTime"]);
				$sortedArr[$lastName][$month][$index]["call"] = $this->format_time($agent["callTime"]);
				$sortedArr[$lastName][$month][$index]["login"] = date("Y-m-d H:i:s" , $agent["loginTime"]);
				$sortedArr[$lastName][$month][$index]["leave"] = date("Y-m-d H:i:s" , $agent["leaveTime"]);
			}
			ksort($sortedArr);
			return $sortedArr;
		}
		
		public function offencesList($name , $FROM , $TO) {
			$year = date("Y-m-d");
			
			$time1_edge = strtotime($year . " 13:30:00");
			$time2_edge = strtotime($year . " 15:30:00");

			$array = $this->mysqlLocal->query("select * from offline_disturbers where name='" . $name . "' and leaveTime>='".$FROM."' and leaveTime<='".$TO."'");
			$i = 0;
			foreach ($array as $row) {
				$array[$i]["start"] = date("H:i:s" , $row["leaveTime"]);
				$array[$i]["end"] = date("H:i:s" , $row["backTime"]);
				$array[$i]["duration"] = gmdate("i:s" , (int)($row["backTime"]) - (int)($row["leaveTime"]));
				// Lets check what type of offence it was
				// Type 1 - more then 10 min offline or not allowed time
				// Type 2 - restriction on the number of retired
				// $array[$i]["type"] = ((int)($array[$i]["duration"])>10*60 or ((int)($array[$i]["leaveTime"]) > $time1_edge and (int)($array[$i]["leaveTime"]) < $time2_edge)) ? 1 : 2;
				$i++;
			}
			return $array;	
		}

		public function getNamesOnline() {
			$agent_names = array();
			$agents = $this->mysqlLocal->query("SELECT name,loginTime FROM agents_stat");
			foreach ($agents as $agent) {
				$agent_names[$agent["name"]] = $agent["loginTime"];
			}
			return $agent_names;
		}

		public function agentOnlineExist($name) {
			$result = $this->mysqlLocal->query("SELECT * FROM agents_stat WHERE name = '$name'");
			if (count($result) > 0) {
				return 1;
			} else {
				return 0;
			}
		}


		private function getLog() {
			$result = $this->mysqlLocal->query("SELECT * FROM agents_log ".$this->whereClause." and DATE(FROM_UNIXTIME(eventTime))='".date('Y-m-d')."' order by eventTime desc limit 100;");
			$logText="";
			foreach ($result as $row) {
        		$logText .= date('Y-m-d H:i:s',$row["eventTime"])." ".$row["data"]."<br>";
			}
			return $logText;
		}

		private function format_time($t,$f=':') { // t = seconds, f = separator 
		  return sprintf("%02d%s%02d", floor($t/3600), $f, ($t/60)%60);
		}

		public function getNames() {
			if ($this->mysqlBilling != null) {
				$result = $this->mysqlBilling->query("SELECT name,asterisk_agent FROM staff where asterisk_agent!=''");
				$names = array();
				foreach ($result as $value) {
					$staffName=explode(" ",$value["name"]);
					$names[$value["asterisk_agent"]] = $staffName[0];
				}
				$this->agentsNames = $names;
				return true;
			} else {
				return false;
			}
		}

		private function secondsToHours($time) {
			$hours=(int)($time/3600);
			$minutes=(int)(($time%3600)/60);
			if ($minutes>=10) {
				return $hours.":".$minutes;
			} else {
				return $hours.":0".$minutes;
			}
		}

		private function checkDateFormat($date){
			//match the format of the date
			if (preg_match ("/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/", $date, $parts)){
				if(checkdate($parts[2],$parts[3],$parts[1]))
					return true;
				else
					return false;
				} 
			else return false;
		}
		

	}

?>
