<?php

    class Login { 
 		
		public $status;
		private $mysql;
		private $cookie_name;
		private $session;
		public $user = "unknown";
		public $sip = 0;
		public $city = array();
		public $features = array();
		public $rule = 1;
		private $log_dir;
		public $log_text;

    	public function Login($MYSQL,$COOKIE_NAME) {
			$this->log_dir = $_SERVER["DOCUMENT_ROOT"] . "/log/debug.log";
			$this->log_text = file($this->log_dir);
			$this->mysql = $MYSQL;
			$this->cookie_name = $COOKIE_NAME;
			$this->status = $this->checkStatus();
		}

		private function checkStatus() {
			$STATUS=0;
			if (array_key_exists($this->cookie_name, $_COOKIE)) {
				$this->session=$_COOKIE[$this->cookie_name];
				# CHECK IF HE HAS SESSION ID IN MYSQL
				$result=$this->mysql->query("SELECT * FROM logging left join users on logging.user=users.user WHERE sessionID = '".$this->session."' LIMIT 1");
				if (count($result) == 1) {
            		$STATUS=1;
					$this->user = $result[0]["user"];
					$this->sip = $result[0]["sip"];
					$this->city = explode(",",$result[0]["city"]);
					$this->features = explode(",",$result[0]["features"]);
					$this->rule = $result[0]["rule"];
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

		private function cookieID_gen($len) {
        	static $arr = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','0','1','2','3','4','5','6','7','8','9');
        	$str="";
        	for ($i=0;$i<$len;$i++) {
            	$str .= $arr[mt_rand(0,count($arr)-1)];
        	}
        	return $str;
		}

		public function signIn($user,$password) {
			if ($this->status == 0) {
				$data=$this->mysql->query("SELECT * from users where user='".$user."';");
    			if (count($data)==1) {
					if ($data[0]["password"]==md5($password)) {
						# CREATE NEW SESSION
        					$this->session=$this->cookieID_gen(15);
	        				setcookie($this->cookie_name, $this->session);
        					$this->mysql->query("INSERT INTO logging VALUES ('".$this->session."','".$_SERVER['REMOTE_ADDR']."','".$user."');");
						$this->status = 1;
						$this->user = $user;
						$this->sip = $data[0]["sip"];
						$this->city = explode(",",$data[0]["city"]);
						$this->features = explode(",",$data[0]["features"]);
						$this->rule = $data[0]["rule"];
						return 1;
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

	}

?>
