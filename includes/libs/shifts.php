<?php

	
    class Shifts { 
 		
		public $csv_dir;
		private $mysql;
		private $agentsNames;
		public $agentsShifts;
		private $UPCASE;
		private $LOCASE;
		private $shift_type;
		private $city;


    		public function Shifts($MYSQL,$AGENTS_NAMES,$CITY="kiev",$TYPE = "tech") {
			$this->UPCASE = "АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯABCDEFGHIKLMNOPQRSTUVWXYZ";
			$this->LOCASE = "абвгдеёжзийклмнопрстуфхцчшщъыьэюяabcdefghiklmnopqrstuvwxyz";
			$this->csv_dir = $_SERVER["DOCUMENT_ROOT"] . "/BETA/includes/csv";
			$this->mysql = $MYSQL;
			$this->agentsNames = $AGENTS_NAMES;
			$this->agentsShifts = array();
			$this->shift_type = $TYPE;
			$this->city = $CITY;
		}

		public function csv_to_array($FILE , $YEAR_MONTH) {
			$csv_lines  = file("$this->csv_dir/$FILE");
			if(is_array($csv_lines)) {
				$cnt = count($csv_lines);
				for($i = 0; $i < $cnt; $i++) {
					$line = $csv_lines[$i];
					$line = trim($line);
					$first_char = true;
					$col_num = 0;
					$length = strlen($line);
					for($b = 0; $b < $length; $b++) {
						if($skip_char != true) {
							$process = true;
							if($first_char == true) {
								if($line[$b] == '"') {
									$terminator = '";';
									$process = false;
								} else $terminator = ';';
								$first_char = false;
							}
							if($line[$b] == '"') {
								$next_char = $line[$b + 1];
								if($next_char == '"')
									$skip_char = true;
								elseif($next_char == ';') {
									if($terminator == '";') {
										$first_char = true;
										$process = false;
										$skip_char = true;
									}
								}
							}

							if($process == true) {
								if($line[$b] == ';') {
									if($terminator == ';') {
										$first_char = true;
										$process = false;
									}
								}
							}

							if($process == true)
								$column .= $line[$b];

							if($b == ($length - 1)) {
								$first_char = true;
							}

							if($first_char == true) {
								$values[$i][$col_num] = $column;
								$column = '';
								$col_num++;
							}
						} else
							$skip_char = false;
					}
				}
			}

			foreach ($values as $row) {
				foreach ($row as $key => $cell) {
					// The cell - the number of the current month.
					if ($key == 0 and !empty($cell)) {
						$cur_day = $cell;
						preg_match("/[0-9]+$/" , $cur_day , $cur_day_int);
						$cur_day = (int)($cur_day_int[0]);
					}
					// We are not interested in a second cell
					#if ($key > 1) {
					if ($key > 1 and !empty($cell)) {
						// We have a range of time specified in the cell
						if (preg_match('/([0-9]+-[0-9]+)$/', $cell)) {
							$time_range = $cell;
							list($shift_start , $shift_end) = explode("-" , $time_range);
						} else {
							list($last_name , $name) = explode(" " , $cell);
							if (array_search($this->lowercase($last_name) , $this->lowercase($this->agentsNames))) {
								$agent_num = array_search($this->lowercase($last_name) , $this->lowercase($this->agentsNames));
								$shift_start = strtotime("$YEAR_MONTH-$cur_day $shift_start:00:00");
								$shift_end = strtotime("$YEAR_MONTH-$cur_day $shift_end:00:00");
								if ($shift_end < $shift_start) {
									$shift_end += 86400;
									
								}

								$duration = $shift_end - $shift_start;
								$new_shift = array(
									"start" => $shift_start,
									"end" => $shift_end,
									"duration" => $duration
								);
								if (!array_key_exists($agent_num , $this->agentsShifts)) {
									$this->agentsShifts[$agent_num] = array();
								}
								array_push($this->agentsShifts[$agent_num] , $new_shift);
							}
						}
					}
				}
			}

		}
		
		public function get_shifts($FROM , $TO , $DURATION) {
			
			$mysql_shifts = array();

			if (!$this->checkDateFormat($FROM) or !$this->checkDateFormat($TO)) {
				$FROM=date("Y-m") . "-01";
				$TO=date("Y-m-d");
			}
			$FROM = strtotime($FROM);
			$TO = strtotime($TO);
			$TO = ($INCL)
				? $TO + 86400
				: $TO;
			$array = $this->mysql->query("select * from agents_shifts where start >= '".$FROM."' and start <= '".$TO."' and duration >= '" . ($DURATION - 1)  * 60 * 60 . "' and duration <= '" . ($DURATION + 1) * 60 * 60 . "' and type = '" . $this->city . "_" . $this->shift_type . "' ORDER BY start");
			foreach ($array as $shift) {
				$cur_day = date("Y-m-d" , $shift["start"]);
				if (!array_key_exists($cur_day , $mysql_shifts))
					$mysql_shifts[$cur_day] = array();
				$shift["last_name"] = $this->agentsNames[$shift["name"]];
				$mysql_shifts[$cur_day][count($mysql_shifts[$cur_day])] = $shift;
			}
			return $mysql_shifts;

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

		public function mysql_export() {
			foreach ($this->agentsShifts as $name => $shifts) {
				foreach ($shifts as $data) {
					$this->mysql->query("INSERT INTO agents_shifts (name,start,end,duration,type) VALUES ('" . $name . "','" . $data["start"] . "','" . $data["end"] . "','" . $data["duration"] . "','" . $this->city . "_" . $this->shift_type . "')");
				}
			}
			echo "success";
		}

		public function add_shift($LAST_NAME , $DATE , $START , $END) {
			if (array_search($this->lowercase($LAST_NAME) , $this->lowercase($this->agentsNames))) {
				$agent_num = array_search($this->lowercase($LAST_NAME) , $this->lowercase($this->agentsNames));
				$shift_start = strtotime("$DATE $START:00:00");
				$shift_end = strtotime("$DATE $END:00:00");
				
				if ($shift_end < $shift_start) {
					$shift_end += 86400;
				}
				$duration = $shift_end - $shift_start;

				$shift_arr = array(
					"shift_start" => $shift_start,
					"shift_end" => $shift_end,
					"duration" => $duration,
					"shift_attr" => "associated"
				);
				
				$this->mysql->query("INSERT INTO agents_shifts (name,start,end,duration,type) VALUES ('" . $agent_num . "','" . $shift_start . "','" . $shift_end . "','" . $duration . "','" . $this->city . "_" . $this->shift_type . "')");
				return $shift_arr;

			} else {
				// We have no such agent registered
				return 0;
			}
		}
		
		public function edit_shift($LAST_NAME , $DATE , $START , $END , $ID) {
			if (array_search($this->lowercase($LAST_NAME) , $this->lowercase($this->agentsNames))) {
				$agent_num = array_search($this->lowercase($LAST_NAME) , $this->lowercase($this->agentsNames));
				$shift_start = strtotime("$DATE $START:00:00");
				$shift_end = strtotime("$DATE $END:00:00");
				
				if ($shift_end < $shift_start) {
					$shift_end += 86400;
				}
				$duration = $shift_end - $shift_start;
				
				$shift_arr = array(
					"shift_start" => $shift_start,
					"shift_end" => $shift_end,
					"duration" => $duration,
					"shift_attr" => "associated"
				);
				
				$this->mysql->query("UPDATE agents_shifts SET name = '$agent_num' , start = '$shift_start' , end = '$shift_end' , duration = '$duration' WHERE id = '$ID'");
				return $shift_arr;

			} else {
				// We have no such agent registered
				return 0;
			}
		}

		public function delete_shift($ID) {
			if ($this->mysql->query("DELETE FROM agents_shifts WHERE id = '$ID'")) {
				return 1;
			} else {
				return 0;
			}
		}
	
		private function mb_str_split($str) {        
		    preg_match_all('/.{1}|[^\x00]{1}$/us', $str, $ar);
		    return $ar[0];
		}
	
		private function mb_strtr($str, $from, $to) {return str_replace($this->mb_str_split($from), $this->mb_str_split($to), $str);}

		private function lowercase($arg=''){return $this->mb_strtr($arg, $this->UPCASE, $this->LOCASE);}
		private function uppercase($arg=''){return $this->mb_strtr($arg, $this->LOCASE, $this->UPCASE);}

	}


?>
