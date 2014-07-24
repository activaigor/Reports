<?php
	class mysqlTools {
		private $host;
		private $user;
		private $pass;
		private $db;
		private $charset;
		private $link;
		private $queryItem;
		private $queryResult;
		private $resultArray = array();
		
		
        public function mysqlTools($HOST,$USER,$PASS,$DB, $CHARSET = null) {
			$this->charset = $CHARSET;
			$this->host = $HOST;
			$this->user = $USER;
			$this->pass = $PASS;
			$this->db = $DB;
        }

        public function connect() {
			$this->link = mysql_pconnect($this->host,$this->user,$this->pass);
			if ($this->link) {
				if (mysql_select_db($this->db,$this->link)) {
					if ($this->charset) mysql_set_charset($this->charset,$this->link);
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		}

		public function query($QUERYITEM) {
			$i=0;
			$this->queryItem=$QUERYITEM;
			#return $this->queryItem;
			$this->queryResult=mysql_query($this->queryItem,$this->link);
			$this->resultArray=array();
			if ((int)($this->queryResult)!=1) {
				while ($row=mysql_fetch_assoc($this->queryResult)) {
					$this->resultArray[$i]=$row;
					$i++;
				}
				return $this->resultArray;
			} elseif ((int)($this->queryResult)==1) {
				return true;
			} else {
				return false;
			}
		}
		
		public function numrows($QUERYITEM) {
			$this->queryItem=$QUERYITEM;
			$this->queryResult=mysql_query($this->queryItem);
			if ($this->queryResult) {
				return mysql_num_rows($this->queryResult);
			} else {
				return false;
			}
		}

		/*

		public function disconnect() {
			if (isset($this->link) && is_resource($this->link)) {
				mysql_close($dbh);
			} else {
				mysql_close();
			}
			return true;
		}
		
		public function __destruct() {
			$this->disconnect();	
		}

		*/


	}
?>
