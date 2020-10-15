<?php
	require_once 'data_file.php';

	if($_SERVER['REQUEST_METHOD'] == 'GET') 
	{
		$data_Obj = new cn_data_handler();

		$response        = array();
		$sub_results     = array();
    	$allSubsResponse = array();
		$dailyResponse   = array();
		$dailySubResponse= array();


		foreach ($data_Obj->load_today_contents() as $all_day) 
		{
			$dailySubResponse['first_name'] = $all_day['first_name'];
			$dailySubResponse['last_name']  = $all_day['last_name'];
			$dailySubResponse['age']        = $all_day['age'];
			$dailySubResponse['gender']     = $all_day['gender'];
			$dailySubResponse['polling_station_name'] = $all_day['polling_station_name'];
			$dailySubResponse['district']   = $all_day['district'];
			$dailySubResponse['region']     = $all_day['region'];
			$dailySubResponse['msisdn']     = $all_day['msisdn'];
			$dailySubResponse['updated_at']     = $all_day['updated_at'];


			array_push($dailyResponse, $dailySubResponse);
		}


		$response['success'] = true;
		$response['dailySubResponse'] = $dailyResponse;
        header('Content-Type: application/json');
        echo json_encode($response);
	}