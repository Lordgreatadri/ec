<?php 
	require_once 'cn.php';
	/**
	 * 
	 */
	class cn_data_handler extends db_links
	{
		public function user_login($username, $password)
		{
			try 
			{
				$query =  $this->db_conn->query("SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password' ");
				$query->execute();

				// set the resulting array to associative
				$result = $query->setFetchMode(PDO::FETCH_ASSOC);
				return $query->fetchAll();
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}


		// check duplicate entry..........
		public function duplicate_entry($username, $company)
		{
			try 
			{
				$query =  $this->db_conn->query("SELECT * FROM `users` WHERE `username` = '$username' AND `company` = '$company' ");
				$query->execute();

				// set the resulting array to associative
				$row_counts = $query->rowCount();
				return $row_counts;
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}




		public function signup_users($username, $password, $company)
		{
			try 
			{	
				$stmnt = "INSERT INTO users(username, password, company) VALUES(?,?,?)";
				$values = array($username, $password, $company);

				$query = $this->db_conn->prepare($stmnt);
				$query->execute($values);
				$counts = $query->rowCount();

				return $counts;	
			} catch (Exception $exc) 
			{
				echo __LINE__ . $exc->getMessage();
			}
		}



		public function loging_history($username, $company)
		{
			try 
			{	
				$stmnt = "INSERT INTO login_hist(username, company) VALUES(?,?)";
				$values = array($username, $company);

				$query = $this->db_conn->prepare($stmnt);
				$query->execute($values);
				$x = $query->rowCount();

				return $x;	
			} catch (Exception $exc) 
			{
				echo __LINE__ . $exc->getMessage();
			}
		}



	}