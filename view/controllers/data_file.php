<?php 
	require_once 'cn.php';
	/**
	 * 
	 */
	class cn_data_handler extends db_connect
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
				$query =  $this->db_conn->query("SELECT * FROM users WHERE username = '$username' AND company = '$company' ");
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









		######################################################################################################
		#######################################    DASHBOARD DATA VALUES    ###################################

		public function get_regional_count($region)
		{
			try 
			{
				$query =  $this->db_conn->query("SELECT * FROM voter_response WHERE region = '$region'  ");//AND `status` = 'Delivered'
				$query->execute();
				// set the resulting array to associative
				$row_counts = $query->rowCount();
				return $row_counts;
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}



		// count male at region level.............
		public function get_regional_maleCount($region)
		{
			try 
			{
				$query =  $this->db_conn->query("SELECT * FROM voter_response WHERE region = '$region' AND gender = 'Male'  ");//AND `status` = 'Delivered'
				$query->execute();
				// set the resulting array to associative
				$row_counts = $query->rowCount();
				return $row_counts;
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}



		// count female at region level.............
		public function get_regional_femaleCount($region)
		{
			try 
			{
				$query =  $this->db_conn->query("SELECT * FROM voter_response WHERE region = '$region' AND gender = 'Female'  ");//AND `status` = 'Delivered'
				$query->execute();
				// set the resulting array to associative
				$row_counts = $query->rowCount();
				return $row_counts;
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}



		// count total for today at region level.............
		public function get_regional_dailyCount($region)
		{
			try 
			{
				$query =  $this->db_conn->query("SELECT * FROM voter_response WHERE region = '$region' AND  year(updated_at) = year(now()) AND month(updated_at) = month(now()) AND day(updated_at) = day(now())");//`status` = 'Delivered' AND
				$query->execute();
				// set the resulting array to associative
				$row_counts = $query->rowCount();
				return $row_counts;
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}


		// get all user details for today..............
		public function load_today_contents()
		{
			try 
			{
				$query =  $this->db_conn->query("SELECT * FROM voter_response WHERE year(updated_at) = year(now()) AND month(updated_at) = month(now()) AND day(updated_at) = day(now()) LIMIT 1500");// `status` = 'Delivered'
				$query->execute();
				// set the resulting array to associative
				$result = $query->setFetchMode(PDO::FETCH_ASSOC);
				return $query->fetchAll();
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}



		######################################       DATA FOR EACH REGION AND DISTRICT     ##############################
		// get and load data region by region.................
		public function loadRegionsData($region)
	    {
	     	try 
			{
				$query =  $this->db_conn->query("SELECT * FROM voter_response WHERE region = '$region' ORDER BY updated_at DESC LIMIT 1500");
				$query->execute();
				// set the resulting array to associative
				$result = $query->setFetchMode(PDO::FETCH_ASSOC);
				return $query->fetchAll();
			} catch (Exception $e) 
			{
				echo $e->getMessage();
			}
	    }



	    // get all district value count for each region..........
	    public function loadDistrictValueCount($region)
	    {
	    	try 
			{
				$query =  $this->db_conn->query("SELECT DISTINCT(district) AS district, COUNT(msisdn) AS msisdn FROM voter_response WHERE region = '$region' GROUP BY district ORDER BY msisdn DESC");//`status` = 'Delivered' AND 
				$query->execute();
				// set the resulting array to associative
				$result = $query->setFetchMode(PDO::FETCH_ASSOC);
				return $query->fetchAll();
			} catch (Exception $e)
			{
				echo $e->getMessage();
			}
	    }







	    ######################################################################################################################
	    #########################################      DATA REPORTING SCRIPT BEGINS     ######################################
	    public function filter_agegroup_date($region, $agefrom, $ageto, $startDate, $endDate)
	    {
	     	try 
			{
				$query =  $this->db_conn->query("SELECT * FROM voter_response WHERE region = '$region' AND (age BETWEEN '$agefrom' AND '$ageto') AND (DATE(updated_at) BETWEEN '$startDate' AND '$endDate' ) ORDER BY updated_at DESC");
				$query->execute();
				// set the resulting array to associative
				$result = $query->setFetchMode(PDO::FETCH_ASSOC);
				return $query->fetchAll();
			} catch (Exception $e) 
			{
				echo $e->getMessage();
			}
	    }

	}