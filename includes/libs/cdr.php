<?php

	class CDR {

		private $mysql_cdr;
		private $whereClause;
		private $cdr_table;
		private $agentsNames;
		private $CITIES;
		private $QUEUES;
		public $avg_holdtime;
		public $total_calls;
		public $pages_count;
		public $repeat_calls;
		public $missed_calls;
		private $cdr_arr;
		private $cdr_arr_stat;

		public function CDR($SQL,$AGENTSNAMES=null) {
			$this->mysql_cdr = $SQL;
			$this->cdr_table = "queue_cdr";
			$this->agentsNames = $AGENTSNAMES;
			
			$this->CITIES = array(
				"kiev" => "киев",
				"ifrankovsk" => "ивано-франковск",
				"ternopol" => "тернополь",
				"kamenec" => "каменец",
				"qtnet" => "QTnet",
				"bc" => "бц"
			);

			$this->QUEUES = array(
				"tech" => "тех-поддержка",
				"experts" => "специалисты",
				"proposals" => "подключения",
				"test" => "тестовая очередь"
			);

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

		public function getQueues() {
			$queues = array();
			foreach ($this->CITIES as $city_en => $city_ru) {
				foreach($this->QUEUES as $queue_en => $queue_ru) {
					$queues[$city_en . "_" . $queue_en] = $city_ru . ", " . $queue_ru;
				}
			}
			return $queues;
		}

		public function getTable($FILTERS,$FROM,$TO,$PAGE=1) {

			$PREV_POS = ($PAGE - 1) * 50;
			$NEXT_POS = $PAGE * 50;


			if (!$this->checkDateFormat($FROM) or !$this->checkDateFormat($TO)) {
				$FROM=date("Y-m-d 00:00:00");
				$TO=date("Y-m-d H:i:s");
			}
			
			$FILTERS_ARR = array();
			foreach($FILTERS as $param_name => $param) {
				if ($param != "" and $param_name != "page") {
					$FILTERS_ARR[$param_name] = $param;
				}
			}

			#if (!$this->checkDateFormat($FROM) or !$this->checkDateFormat($TO)) {
			#	$FROM=date("Y-m") . "-01";
			#	$TO=date("Y-m-d");
			#}

			$FROM = strtotime($FROM);
			$TO = strtotime($TO);
			$TO = ($INCL)
				? $TO + 86400
				: $TO;

			$k = 1;
			$clause_query = "";
			foreach($FILTERS_ARR as $param_name => $param) {
				$clause_query .= "( ";
				if ($param_name != "speaktime" && $param_name != "holdtime" && $param_name != "dstchannel") {
					$clause_query .= $param_name . " LIKE '%" . $param . "%' ";
				} else if ($param_name == "dstchannel") {
					$clause_query .= $param_name . " = ('" . array_search($param , $this->agentsNames) . "') ";
				} else {
					$clause_query .= $param_name . " = TIME_TO_SEC('" . $param . "') ";
				}
				if ($k < count($FILTERS_ARR)) $clause_query .= ") and ";
				else $clause_query .= ")";
				$k++;
			}

			$cdr_table = array();
			$cdr_table_stat = array();
			$query = (empty($clause_query)) 
				?  "SELECT *,UNIX_TIMESTAMP(start) AS start_stamp FROM " . $this->cdr_table . " WHERE start >= FROM_UNIXTIME($FROM) AND start <= FROM_UNIXTIME($TO) ORDER BY start DESC"
				:  "SELECT *,UNIX_TIMESTAMP(start) AS start_stamp FROM " . $this->cdr_table . " WHERE start >= FROM_UNIXTIME($FROM) AND start <= FROM_UNIXTIME($TO) AND $clause_query ORDER BY start DESC";
			
			$this->repeat_calls = (empty($clause_query))
				? $this->mysql_cdr->query("SELECT COUNT(*) as count,caller FROM " . $this->cdr_table . " WHERE start >= FROM_UNIXTIME($FROM) AND start <= FROM_UNIXTIME($TO) AND caller != '' and caller != 0 GROUP BY caller HAVING (count > 1) ORDER BY count DESC")
				: $this->mysql_cdr->query("SELECT COUNT(*) as count,caller FROM " . $this->cdr_table . " WHERE start >= FROM_UNIXTIME($FROM) AND start <= FROM_UNIXTIME($TO) AND $clause_query AND caller != '' and caller != 0 GROUP BY caller HAVING (count > 1) ORDER BY count DESC");

			$sum_holdtime = 0;
			$missed_calls = 0;
			$i = 0;
			
			foreach ($this->mysql_cdr->query($query) as $row) {
				
				if ((int)($row["speaktime"]) == 0) {
					$missed_calls += 1;
				}
				
				$sum_holdtime += $row["holdtime"];
				
				if ($i >= $PREV_POS && $i <= $NEXT_POS) {
				
					$row["dstchannel"] = (array_key_exists($row["dstchannel"] , $this->agentsNames)) ? $this->agentsNames[$row["dstchannel"]] : $row["dstchannel"];	
					$row["holdtime_sec"] = $row["holdtime"];
					$row["holdtime"] = gmdate("H:i:s",$row["holdtime"]);
					$row["speaktime"] = gmdate("H:i:s",$row["speaktime"]);
					list($city,$queue) = explode("_" , $row["queue_alias"]);
					$row["city_queue"] = $this->CITIES[$city] . ", " . $this->QUEUES[$queue];

					$cdr_table[count($cdr_table)] = $row;
					
				}
				
				$i+=1;
					
				$cdr_table_stat[count($cdr_table_stat)] = $row;

			}

			$this->total_calls = count($cdr_table_stat);
			$this->pages_count = ($this->total_calls % 50 == 0) ? (int)($this->total_calls/50) : (int)($this->total_calls/50) + 1;
			$this->avg_holdtime = gmdate("H:i:s",round((int)($sum_holdtime)/(int)($this->total_calls))); 
			$this->cdr_arr = $cdr_table;
			$this->cdr_arr_stat = $cdr_table_stat;
			$this->missed_calls = $missed_calls;
			
			echo 1;
			return $cdr_table;

		}

		public function pages_url($GET,$PAGE_COUNT) {
			$i = 0;
			$url_arr = array();
			while ($i <= $PAGE_COUNT) {
				$i += 1;
				$url_arr["$i"] = "";
				foreach ($GET as $get_key => $get_val) {
					if ($get_key != "page" and $get_val != "") {
						$url_arr["$i"] .= ($url_arr["$i"] == "") ? "?$get_key=$get_val" : "&$get_key=$get_val";
					}
				}
				$url_arr["$i"] .= ($url_arr["$i"] == "") ? "?page=$i" : "&page=$i";
			}
			return $url_arr;
		}

		public function add_filter($GET,$PARAM,$VALUE) {
			$url = "";
			foreach ($GET as $get_key => $get_val) {
				if ($get_key != $PARAM and $get_val != "") {
					$url .= ($url == "") ? "?$get_key=$get_val" : "&$get_key=$get_val";
				}
			}
			$url .= ($url == "") ? "?$PARAM=$VALUE" : "&$PARAM=$VALUE";
			return $url;

		}

		public function CDRstat($FROM,$TO,$chunks = 50) {
			if (!$this->checkDateFormat($FROM) or !$this->checkDateFormat($TO)) {
				$FROM=date("Y-m-d 00:00:00");
				$TO=date("Y-m-d H:i:s");
			}

			$cdr_stat = array();

			$FROM = strtotime($FROM);
			$TO = strtotime($TO);
			
			$unix_range = $TO - $FROM;
			$time_step = round((int)($unix_range)/(int)($chunks));

			$check_point_from = (int)($FROM) - (int)($time_step);
			$check_point_to = $check_point_from + $time_step;
			
			while ($TO >= $check_point_to) {
			
				foreach ($this->cdr_arr_stat as $row) {
					if ((int)($row["start_stamp"]) >= $check_point_from && (int)($row["start_stamp"]) <= $check_point_to) {
						if (array_key_exists(date("Y-m-d H:i",$check_point_to) , $cdr_stat)) {
							$cdr_stat[date("Y-m-d H:i",$check_point_to)]["holdtime"] += $row["holdtime_sec"];
							$cdr_stat[date("Y-m-d H:i",$check_point_to)]["calls"] += 1;
						} else {
							$cdr_stat[date("Y-m-d H:i",$check_point_to)] = array(
								"holdtime" => $row["holdtime_sec"],
								"calls" => 1
							);
						}
					}
				}
						
				if (!array_key_exists(date("Y-m-d H:i",$check_point_to) , $cdr_stat)) {
					$cdr_stat[date("Y-m-d H:i",$check_point_to)] = array(
						"holdtime" => 0,
						"calls" => 0
					);
				}


			
				$check_point_from += (int)($time_step);
				$check_point_to = $check_point_from + $time_step;

			}

			return $cdr_stat;
		}
		
		private function checkDateFormat($date){
			//match the format of the date
			if (preg_match ("/^([0-9]{4})-([0-9]{2})-([0-9]{2}).+$/", $date, $parts)){
				if(checkdate($parts[2],$parts[3],$parts[1]))
					return true;
				else
					return false;
				} 
			else return false;
		}

	}

?>
