<?php
	 
	class db_connect
	{
		private $db_host = ' '; //server IP here later
		private $db_name = ' ';
		private $db_username = 'postgres';
		private $pass_word = ' f';// (3P  %F  // (3P^    @E W @ 
		private $charset = 'utf8mb4';

		//access to server/database connection
		public $db_conn;
		
		public function  __construct()
		{			
			 //test connection is null
			if($this->db_conn == null)
			{

				try 
				{
				//	$server_path = "pgsql:host=".$this->getHostName().";port=5432;dbname=".";charset=".$this->getCharacterSet();
					$myPDO = new PDO('pgsql:host=localhost;dbname=$db_name', 'postgres', '1234');
					$pdo_features = array(
							    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
							    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
							    PDO::ATTR_EMULATE_PREPARES   => false,
							);
							//making an instance of pdo
					$this->db_conn = new PDO($myPDO);

					//close connection
				    return $this->db_conn;
				    var_dump($this->db_conn);
				} 
				//if error throw exception
				catch (PDOException $e) {
					print_r($e);
					return $e->getMessage();
				}  
		   }
			
		}

		//creating out getters method
		private function getHostName()
		{
			return $this->db_host;
		}

		private function getDatabaseName()
		{
			return $this->db_name;
		}

		private function getUserName()
		{
			return $this->db_username;
		}
		private function getPassword()
		{
			return $this->pass_word;
		}

		private function getCharacterSet()
		{
			return $this->charset;
		}

		//destroy connection when class is not needed
		public function __destruct(){
			$this->db_conn = null;
		}

	}

$db = new db_connect();
var_export($db);
