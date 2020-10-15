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


		// foreach ($data_Obj->load_today_contents() as $all_day) 
		// {
		// 	$dailySubResponse['first_name'] = $all_day['first_name'];
		// 	$dailySubResponse['last_name']  = $all_day['last_name'];
		// 	$dailySubResponse['age']        = $all_day['age'];
		// 	$dailySubResponse['gender']     = $all_day['gender'];
		// 	$dailySubResponse['polling_station_name'] = $all_day['polling_station_name'];
		// 	$dailySubResponse['district']   = $all_day['district'];
		// 	$dailySubResponse['region']     = $all_day['region'];
		// 	$dailySubResponse['msisdn']     = $all_day['msisdn'];


		// 	array_push($dailyResponse, $dailySubResponse);
		// }


		$accra_total = $data_Obj->get_regional_count("Greater Accra");
		$accra_male  = $data_Obj->get_regional_maleCount("Greater Accra");
		$accra_female= $data_Obj->get_regional_femaleCount("Greater Accra");
		$accra_today = $data_Obj->get_regional_dailyCount("Greater Accra");

		$Eastern_total = $data_Obj->get_regional_count("Eastern");
		$Eastern_male  = $data_Obj->get_regional_maleCount("Eastern");
		$Eastern_female= $data_Obj->get_regional_femaleCount("Eastern");
		$Eastern_today = $data_Obj->get_regional_dailyCount("Eastern");

		$Ashanti_total = $data_Obj->get_regional_count("Ashanti");
		$Ashanti_male  = $data_Obj->get_regional_maleCount("Ashanti");
		$Ashanti_female= $data_Obj->get_regional_femaleCount("Ashanti");
		$Ashanti_today = $data_Obj->get_regional_dailyCount("Ashanti");

		$BrongAhafo_total = $data_Obj->get_regional_count("Brong Ahafo");
		$BrongAhafo_male  = $data_Obj->get_regional_maleCount("Brong Ahafo");
		$BrongAhafo_female= $data_Obj->get_regional_femaleCount("Brong Ahafo");
		$BrongAhafo_today = $data_Obj->get_regional_dailyCount("Brong Ahafo");

		$BonoEast_total = $data_Obj->get_regional_count("Bono-East");
		$BonoEast_male  = $data_Obj->get_regional_maleCount("Bono-East");
		$BonoEast_female= $data_Obj->get_regional_femaleCount("Bono-East");
		$BonoEast_today = $data_Obj->get_regional_dailyCount("Bono-East");

		$Ahafo_total = $data_Obj->get_regional_count("Ahafo");
		$Ahafo_male  = $data_Obj->get_regional_maleCount("Ahafo");
		$Ahafo_female= $data_Obj->get_regional_femaleCount("Ahafo");
		$Ahafo_today = $data_Obj->get_regional_dailyCount("Ahafo");

		$Central_total = $data_Obj->get_regional_count("Central");
		$Central_male  = $data_Obj->get_regional_maleCount("Central");
		$Central_female= $data_Obj->get_regional_femaleCount("Central");
		$Central_today = $data_Obj->get_regional_dailyCount("Central");

		$Northern_total = $data_Obj->get_regional_count("Northern");
		$Northern_male  = $data_Obj->get_regional_maleCount("Northern");
		$Northern_female= $data_Obj->get_regional_femaleCount("Northern");
		$Northern_today = $data_Obj->get_regional_dailyCount("Northern");

		$Savannah_total = $data_Obj->get_regional_count("Savannah");
		$Savannah_male  = $data_Obj->get_regional_maleCount("Savannah");
		$Savannah_female= $data_Obj->get_regional_femaleCount("Savannah");
		$Savannah_today = $data_Obj->get_regional_dailyCount("Savannah");

		$NorthEast_total = $data_Obj->get_regional_count("North East");
		$NorthEast_male  = $data_Obj->get_regional_maleCount("North East");
		$NorthEast_female= $data_Obj->get_regional_femaleCount("North East");
		$NorthEast_today = $data_Obj->get_regional_dailyCount("North East");

		$UpperEast_total = $data_Obj->get_regional_count("Upper East");
		$UpperEast_male  = $data_Obj->get_regional_maleCount("Upper East");
		$UpperEast_female= $data_Obj->get_regional_femaleCount("Upper East");
		$UpperEast_today = $data_Obj->get_regional_dailyCount("Upper East");

		$UpperWest_total = $data_Obj->get_regional_count("Upper West");
		$UpperWest_male  = $data_Obj->get_regional_maleCount("Upper West");
		$UpperWest_female= $data_Obj->get_regional_femaleCount("Upper West");
		$UpperWest_today = $data_Obj->get_regional_dailyCount("Upper West");

		$Volta_total = $data_Obj->get_regional_count("Volta");
		$Volta_male  = $data_Obj->get_regional_maleCount("Volta");
		$Volta_female= $data_Obj->get_regional_femaleCount("Volta");
		$Volta_today = $data_Obj->get_regional_dailyCount("Volta");

		$Oti_total = $data_Obj->get_regional_count("Oti");
		$Oti_male  = $data_Obj->get_regional_maleCount("Oti");
		$Oti_female= $data_Obj->get_regional_femaleCount("Oti");
		$Oti_today = $data_Obj->get_regional_dailyCount("Oti");

		$Western_total = $data_Obj->get_regional_count("Western");
		$Western_male  = $data_Obj->get_regional_maleCount("Western");
		$Western_female= $data_Obj->get_regional_femaleCount("Western");
		$Western_today = $data_Obj->get_regional_dailyCount("Western");


		$WesternNorth_total = $data_Obj->get_regional_count("Western-North");
		$WesternNorth_male  = $data_Obj->get_regional_maleCount("Western-North");
		$WesternNorth_female= $data_Obj->get_regional_femaleCount("Western-North");
		$WesternNorth_today = $data_Obj->get_regional_dailyCount("Western-North");




		$response['success'] = true;
		$response['accra_total']  = $accra_total;
		$response['accra_male']   = $accra_male;
		$response['accra_female'] = $accra_female;
		$response['accra_today']  = $accra_today;

		$response['Eastern_total']  = $Eastern_total;
		$response['Eastern_male']   = $Eastern_male;
		$response['Eastern_female'] = $Eastern_female;
		$response['Eastern_today']  = $Eastern_today;

		$response['Ashanti_total']  = $Ashanti_total;
		$response['Ashanti_male']   = $Ashanti_male;
		$response['Ashanti_female'] = $Ashanti_female;
		$response['Ashanti_today']  = $Ashanti_today;

		$response['BrongAhafo_total']  = $BrongAhafo_total;
		$response['BrongAhafo_male']   = $BrongAhafo_male;
		$response['BrongAhafo_female'] = $BrongAhafo_female;
		$response['BrongAhafo_today']  = $BrongAhafo_today;

		$response['BonoEast_total']  = $BonoEast_total;
		$response['BonoEast_male']   = $BonoEast_male;
		$response['BonoEast_female'] = $BonoEast_female;
		$response['BonoEast_today']  = $BonoEast_today;

		$response['Ahafo_total']  = $Ahafo_total;
		$response['Ahafo_male']   = $Ahafo_male;
		$response['Ahafo_female'] = $Ahafo_female;
		$response['Ahafo_today']  = $Ahafo_today;

		$response['Central_total']  = $Central_total;
		$response['Central_male']   = $Central_male;
		$response['Central_female'] = $Central_female;
		$response['Central_today']  = $Central_today;

		$response['Northern_total']  = $Northern_total;
		$response['Northern_male']   = $Northern_male;
		$response['Northern_female'] = $Northern_female;
		$response['Northern_today']  = $Northern_today;

		$response['Savannah_total']  = $Savannah_total;
		$response['Savannah_male']   = $Savannah_male;
		$response['Savannah_female'] = $Savannah_female;
		$response['Savannah_today']  = $Savannah_today;

		$response['NorthEast_total']  = $NorthEast_total;
		$response['NorthEast_male']   = $NorthEast_male;
		$response['NorthEast_female'] = $NorthEast_female;
		$response['NorthEast_today']  = $NorthEast_today;

		$response['UpperEast_total']  = $UpperEast_total;
		$response['UpperEast_male']   = $UpperEast_male;
		$response['UpperEast_female'] = $UpperEast_female;
		$response['UpperEast_today']  = $UpperEast_today;

		$response['UpperWest_total']  = $UpperWest_total;
		$response['UpperWest_male']   = $UpperWest_male;
		$response['UpperWest_female'] = $UpperWest_female;
		$response['UpperWest_today']  = $UpperWest_today;

		$response['Volta_total']  = $Volta_total;
		$response['Volta_male']   = $Volta_male;
		$response['Volta_female'] = $Volta_female;
		$response['Volta_today']  = $Volta_today;

		$response['Oti_total']  = $Oti_total;
		$response['Oti_male']   = $Oti_male;
		$response['Oti_female'] = $Oti_female;
		$response['Oti_today']  = $Oti_today;

		$response['Western_total']  = $Western_total;
		$response['Western_male']   = $Western_male;
		$response['Western_female'] = $Western_female;
		$response['Western_today']  = $Western_today;

		$response['WesternNorth_total']  = $WesternNorth_total;
		$response['WesternNorth_male']   = $WesternNorth_male;
		$response['WesternNorth_female'] = $WesternNorth_female;
		$response['WesternNorth_today']  = $WesternNorth_today;


		// $response['dailySubResponse'] = $dailyResponse;

        header('Content-Type: application/json');
        echo json_encode($response);
	}