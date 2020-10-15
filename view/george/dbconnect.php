<?php
/**
* Database Connection
**/

    class DbConnect{
    	private $server = 'localhost';
        private $dbname = 'mobipay';
        private $user = 'root';
        private $pass = 'Mccg8(3P^tJVnBDsF';

    	public function connect(){

    	   try {
    	   	
    	   	  $conn = new PDO('mysql:host='.$this->server. ';dbname=' .$this->dbname, $this->user, $this->pass);  
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              return $conn;
    	   } catch (Exception $e) {
    	   	   
    	   	   echo "Database Error: ".$e->getMessage();
    	   }
           
           
    	}
    }

    $db = new DbConnect;
    $db->connect();
?>