<?php

    class Login { 
 		
		public $status;
		private $mysql;
		private $mysql_bill;
		private $cookie_name;
		private $session;
		public $user = "unknown";
		public $sip = 0;
		public $city = array();
		public $queue = array();
		public $features = array();
		public $agent_name;
		public $photo_file;
		public $rule = 1;
		private $log_dir;
		public $log_text;
		private $queues;
		private $queues_aliases;
		private $bill_cities;

    	public function Login($MYSQL,$MYSQL_BILL,$COOKIE_NAME) {
			$this->log_dir = $_SERVER["DOCUMENT_ROOT"] . "/log/debug.log";
			$log = file($this->log_dir);
			$this->log_text = array_reverse($log);
			$this->mysql = $MYSQL;
			$this->mysql_bill= $MYSQL_BILL;
			$this->cookie_name = $COOKIE_NAME;
			$this->queues = array();
			
			$this->bill_cities = array(
				"1" => "kiev",
				"2" => "sdonetsk",
				"3" => "chgrad",
				"4" => "ifrankovsk",
				"5" => "kalush",
				"6" => "ternopol",
				"7" => "kamenec",
				"8" => "bc",
				"9" => "vinnica"
			);

			foreach ($this->mysql->query("SELECT * FROM queue_ranges") as $row) {
				$this->queues[$row["range"]] = $row["queue"];
			}
			$this->queues_aliases = array();
			foreach ($this->mysql->query("SELECT * FROM queue_aliases") as $row) {
				$this->queues_aliases[$row["queue"]] = $row["alias"];
			}
			$this->status = $this->checkStatus();
		}

		private function checkStatus() {
			$STATUS=0;
			if (array_key_exists($this->cookie_name, $_COOKIE)) {
				$this->session=$_COOKIE[$this->cookie_name];
				# CHECK IF HE HAS SESSION ID IN MYSQL
				$result=$this->mysql->query("SELECT * FROM logging WHERE sessionID = '".$this->session."' LIMIT 1");
				if (count($result) == 1) {
					$adv_info = $this->get_adv_info($result[0]["user"]);
					$adv_feat = $this->get_adv_feat($result[0]["user"]);
		            		$STATUS=1;
					$this->user = $result[0]["user"];
					
					if ($adv_feat != Null) {
						$this->sip = ($adv_feat["sip"] != Null) ? $adv_feat["sip"] : $adv_info["sip_id"];
						$this->city = explode(",",$adv_feat["city"]);
						$this->queue = explode(",",$adv_feat["queue"]);
						$this->features = explode(",",$adv_feat["features"]);
						$this->rule = $adv_feat["rule"];
						$this->agent_name = ($adv_feat["agent_name"] != Null) ? $adv_feat["agent_name"] : $adv_info["asterisk_agent"];
					} else {
						$this->agent_name = $adv_info["asterisk_agent"];
						if ($this->agent_name != Null) {
							$cur_queue = $this->get_agent_queue($this->agent_name);
							$city_queue = $this->queues_aliases[$cur_queue];
							list($city, $queue) = explode("_", $city_queue);
							array_push($this->city, $city);
							array_push($this->queue, $queue);
						} else {
							array_push($this->city, $this->bill_cities[$adv_info["city"]]);
							array_push($this->queue, "tech","experts","test","proposals");
						}
						array_push($this->features, "queue");
						$this->sip = $adv_info["sip_id"];
						$this->rule = "1";
					}
					$this->photo = $adv_info["photo_file"];

	        		} else {
        				# NO HE HAVE NOT. MAYBE HE HAS AN OLD SESSION ID WITH HIS IP? LET'S REMOVE THEM
            				$result=$this->mysql->query("SELECT * FROM logging WHERE sessionIP = '".$_SERVER['REMOTE_ADDR']."' LIMIT 1");
            				if (count($result) == 1) {
                				$this->mysql->query("DELETE FROM logging WHERE sessionIP = '".$_SERVER['REMOTE_ADDR']."'");
	            			}
        			}
    			} else {
				# IF USER HAVE NOT COOKIES
	        		# REMOVE ALL OLD NOTES
	        		$result=$this->mysql->query("SELECT * FROM logging WHERE sessionIP = '".$_SERVER['REMOTE_ADDR']."' LIMIT 1");
	        		if (count($result) == 1) {
		            		$this->mysql->query("DELETE FROM logging WHERE sessionIP = '".$_SERVER['REMOTE_ADDR']."'");
	        		}
	    		}

			return $STATUS;

		}

		private function get_adv_info($user) {
			$result=$this->mysql_bill->query("SELECT id,asterisk_agent,photo_file,sip_id,city FROM staff WHERE email = '" . $user . "' LIMIT 1");
			return (count($result) > 0) ? $result[0] : Null;
		}
		
		private function get_adv_feat($user) {
			$result=$this->mysql->query("SELECT sip,rule,city,queue,features,agent_name FROM users WHERE user = '" . $user . "' LIMIT 1");
			return (count($result) > 0) ? $result[0] : Null;
		}

		private function cookieID_gen($len) {
        	static $arr = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','0','1','2','3','4','5','6','7','8','9');
        	$str="";
        	for ($i=0;$i<$len;$i++) {
            	$str .= $arr[mt_rand(0,count($arr)-1)];
        	}
        	return $str;
		}

		public function signIn($email,$password) {
			if ($this->status == 0) {
				if (preg_match ("/^([^\@]+)\@([^\@]+)$/", $email, $parts)) {
					$user = $parts[1];
					$data=$this->mysql_bill->query("SELECT password FROM client_mailboxes WHERE login = '$user' LIMIT 1");
		    			if (count($data)==1) {
						#if (True) {
						if (crypt($password , $data[0]["password"]) == $data[0]["password"]) {
							# CREATE NEW SESSION
	        					$this->session=$this->cookieID_gen(15);
		        				setcookie($this->cookie_name, $this->session);
	        					$this->mysql->query("INSERT INTO logging VALUES ('".$this->session."','".$_SERVER['REMOTE_ADDR']."','$email');");
							$this->status = 1;
							$this->user = $email;

							$adv_info = $this->get_adv_info($this->user);
							$adv_feat = $this->get_adv_feat($this->user);
					
							if ($adv_feat != Null) {
								$this->sip = ($adv_feat["sip"] != Null) ? $adv_feat["sip"] : $adv_info["sip_id"];
								$this->city = explode(",",$adv_feat["city"]);
								$this->queue = explode(",",$adv_feat["queue"]);
								$this->features = explode(",",$adv_feat["features"]);
								$this->rule = $adv_feat["rule"];
								$this->agent_name = ($adv_feat["agent_name"] != Null) ? $adv_feat["agent_name"] : $adv_info["asterisk_agent"];
							} else {
								$this->agent_name = $adv_info["asterisk_agent"];
								if ($this->agent_name != Null) {
									$cur_queue = $this->get_agent_queue($this->agent_name);
									$city_queue = $this->queues_aliases[$cur_queue];
									list($city, $queue) = explode("_", $city_queue);
									array_push($this->city, $city);
									array_push($this->queue, $queue);
								} else {
									array_push($this->city, $this->bill_cities[$adv_info["city"]]);
									array_push($this->queue, "tech","experts","test","proposals");
								}
								array_push($this->features, "queue");
								$this->sip = $adv_info["sip_id"];
								$this->rule = "1";
							}

							$this->photo = $adv_info["photo_file"];

							return 1;

						} else {
							return 0;
						}
					} else {
						return 0;
					}
				} else {
					return 0;
				}
			} else {
				return 1;
			}
		}

		public function signOut() {
			if ($this->status == 1) {
            	$this->mysql->query("DELETE FROM logging WHERE sessionIP = '".$_SERVER['REMOTE_ADDR']."' and sessionID = '".$this->session."';");
				$this->status = 0;
				$this->user = "unknown";
				$this->sip = 0;
				$this->city = array();
				$this->queue = array();
				$this->features = array();
				return 1;
			} else {
				return 1;
			}
		}

		public function write_log($data) {
			$log_text = date("Y-m-d H:i:s") . " USER $this->user: $data\n";
			if (is_writable($this->log_dir)) {
    				if (!$handle = fopen($this->log_dir, 'a')) {
					return 0;
				}
    				if (fwrite($handle, $log_text) === FALSE) {
					return 0;
				}
    				fclose($handle);
				return 1;
			} else {
				return 0;
			}
		}
		
		private function get_agent_queue($name) {
			$agent_num = explode("/" , $name);
			if (count($agent_num) > 0) {
				foreach ($this->queues as $range => $queue) {
						list($range_fr,$range_to) = explode("-",$range);
						if(in_array((int)($agent_num[1]), range((int)($range_fr), (int)($range_to)))) {
							return $this->queues[$range];
						}
				}
			}
		}

	}

?>
