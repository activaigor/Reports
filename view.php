<?php
<<<<<<< HEAD
=======
<<<<<<< HEAD
	
$xlsx = new SimpleXLSX('new_03.2014_21.xlsx');
#foreach ($xlsx->rows() as $row) {
#	echo "<br>";
#	print_r($row);
#}

$agentsShifts = array();
#echo $xlsx->sheetsCount();
$arr_unsorted = $xlsx->rows(15);

		$YEAR_MONTH = "2014-03";
			foreach ($arr_unsorted as $row) {
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
						#} else if (preg_match('/(.+\s.\.*)$/', $cell)){
						} else if (preg_match('/.+\s.+\.$/', $cell)){
							list($last_name , $name) = explode(" " , $cell);
								
								$str_shift_start = "$YEAR_MONTH-$cur_day $shift_start:00:00";
								$str_shift_end = "$YEAR_MONTH-$cur_day $shift_end:00:00";

							#if (array_search($this->lowercase($last_name) , $this->lowercase($this->agentsNames))) {
								#$agent_num = array_search($this->lowercase($last_name) , $this->lowercase($this->agentsNames));
								$agent_num = $last_name;
								$shift_start = strtotime("$YEAR_MONTH-$cur_day $shift_start:00:00");
								$shift_end = strtotime("$YEAR_MONTH-$cur_day $shift_end:00:00");
								if ($shift_end < $shift_start) {
									$shift_end += 86400;
									
								}
								
								$duration = $shift_end - $shift_start;
								$new_shift = array(
									"start" => $shift_start,
									"end" => $shift_end,
									"duration" => $duration,
									"start-end" => "$str_shift_start - $str_shift_end"
								);
								if (!array_key_exists($agent_num , $agentsShifts)) {
									$agentsShifts[$agent_num] = array();
								}
								array_push($agentsShifts[$agent_num] , $new_shift);
							#}
						}
					}
				}
			}

			foreach ($agentsShifts as $key => $row) {
				echo "<br>";
				echo $key;
				print_r($row);
			}


?>    
=======
    
    require('includes/setup.php');
    require('includes/libs/mysqlTools.php');
    require('includes/libs/login.php');
    require('includes/libs/shifts.php');
    require('includes/libs/agents.php');
>>>>>>> origin/devel
	
$xlsx = new SimpleXLSX('new_03.2014_21.xlsx');
#foreach ($xlsx->rows() as $row) {
#	echo "<br>";
#	print_r($row);
#}

$agentsShifts = array();
#echo $xlsx->sheetsCount();
$arr_unsorted = $xlsx->rows(15);

		$YEAR_MONTH = "2014-03";
			foreach ($arr_unsorted as $row) {
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
						#} else if (preg_match('/(.+\s.\.*)$/', $cell)){
						} else if (preg_match('/.+\s.+\.$/', $cell)){
							list($last_name , $name) = explode(" " , $cell);
								
								$str_shift_start = "$YEAR_MONTH-$cur_day $shift_start:00:00";
								$str_shift_end = "$YEAR_MONTH-$cur_day $shift_end:00:00";

							#if (array_search($this->lowercase($last_name) , $this->lowercase($this->agentsNames))) {
								#$agent_num = array_search($this->lowercase($last_name) , $this->lowercase($this->agentsNames));
								$agent_num = $last_name;
								$shift_start = strtotime("$YEAR_MONTH-$cur_day $shift_start:00:00");
								$shift_end = strtotime("$YEAR_MONTH-$cur_day $shift_end:00:00");
								if ($shift_end < $shift_start) {
									$shift_end += 86400;
									
								}
								
								$duration = $shift_end - $shift_start;
								$new_shift = array(
									"start" => $shift_start,
									"end" => $shift_end,
									"duration" => $duration,
									"start-end" => "$str_shift_start - $str_shift_end"
								);
								if (!array_key_exists($agent_num , $agentsShifts)) {
									$agentsShifts[$agent_num] = array();
								}
								array_push($agentsShifts[$agent_num] , $new_shift);
							#}
						}
					}
				}
			}

			foreach ($agentsShifts as $key => $row) {
				echo "<br>";
				echo $key;
				print_r($row);
			}


<<<<<<< HEAD
?>    
=======
?>
>>>>>>> 3aca116d1fe9118a8e2021133640a317630b9b8a
>>>>>>> origin/devel
