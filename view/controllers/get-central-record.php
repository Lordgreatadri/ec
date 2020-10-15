<?php 

	include_once "data_file.php";

	if($_SERVER['REQUEST_METHOD'] == 'GET') 
	{
		$data_Obj = new cn_data_handler();

		$region   = "Central";

    	$response        = array();
    	$regional_results= array();
    	$allSubsResponse = array();
    	
    	$district_results    = array();
    	$allDistrictResponse = array();

    	$regional_data   = $data_Obj->loadRegionsData($region);
    	foreach ($regional_data as $key) 
    	{
    		$regional_results['full_name'] = $key['first_name']." ".$key['first_name'];
    		$regional_results['voter_id']  = $key['voter_id'];
    		$regional_results['age']       = $key['age'];
    		$regional_results['gender']    = $key['gender'];
    		$regional_results['polling_station_name'] = $key['polling_station_name'];
    		$regional_results['district']  = $key['district'];
    		$regional_results['region']    = $key['region'];
    		$regional_results['msisdn']     = $key['msisdn'];
    		$regional_results['updated_at'] = $key['updated_at'];

    		array_push($allSubsResponse, $regional_results);
    	}



    	$dist_data   = $data_Obj->loadDistrictValueCount($region);
    	foreach ($dist_data as $district) 
    	{
    		$district_results['district'] = $district['district'];
    		$district_results['msisdn']   = $district['msisdn'];

    		array_push($allDistrictResponse, $district_results);
    	}



    	$response['success']       = true;
    	$response["region_data"]   = $allSubsResponse;
    	$response["district_data"] = $allDistrictResponse;
    	header('Content-Type: application/json');
		echo json_encode($response);
	}
 ?>