<?php 
	ob_start();

	//http://ec2-52-214-1-251.eu-west-1.compute.amazonaws.com/client/care247/mtnendpoint/view/controllers/data_sync_endpoint.php
	//http://52.214.1.251/client/care247/mtnendpoint/view/controllers/data_sync_endpoint.php
	require_once 'prg_data_sync.php';
	$data_Obj = new prg_data_sync();


	// var_dump($GLOBALS['request']);
	$data = ob_get_clean();

	$createdTime = date("Y-m-d");
	$file = fopen("logs/data_sync-$createdTime.log",'a');
	$values = "$data\n";
	fwrite($file, "$values");
	fclose($file);


	$sender_address = $_REQUEST['sender_address'];
	$service        = $_REQUEST['service'];
	$product        = $_REQUEST['array_product(array)'];
	$keyword        = $_REQUEST['keyword'];
	$shortcode      = $_REQUEST['shortcode'];
	$service_list   = $_REQUEST['service_list'];
	$user_type      = $_REQUEST['user_type'];
	$update_type    = $_REQUEST['update_type'];
	$update_desc    = $_REQUEST['update_desc'];
	$update_time    = $_REQUEST['update_time'];
	$effective_time = $_REQUEST['effective_time'];
	$expiry_time    = $_REQUEST['expiry_time'];


	if($update_type == 2) 
	{
		foreach ($data_Obj->check_user_subscriptions($sender_address, $service) as $k) {
			$user_exist = $k['user_exist'];
		}

		// if user exist, then do update for deletion.......
		if (trim($user_exist) > 0) {
			$data_Obj->update_data_sync_unsubscription($sender_address, $service, $update_type, $update_desc, $update_time, $expiry_time, $effective_time);
		}
	}elseif($update_type == 3 ) {
		// here the user is doing modification to existing service, do update.................

		foreach ($data_Obj->check_user_subscriptions($sender_address, $service) as $key) {
			$user_exist = $key['user_exist'];
		}

		// if user exist, then do update for deletion.......
		if (trim($user_exist) > 0) {
			$data_Obj->update_data_sync_unsubscription($sender_address, $service, $update_type, $update_desc, $update_time, $expiry_time, $effective_time);
		}

	}elseif($update_type == 1) 
	{
		foreach ($data_Obj->check_user_subscriptions($sender_address, $service) as $k) {
			$user_exist = $k['user_exist'];
		}
		// here the user want to subscribe to the service, do insertion.......................
		// you know, anything can happen, still check if user exist before insertion   .......
		if (trim($user_exist) > 0) 
		{
			// do nothing...............
		}else
		{
			// if not then do insertion.......................................................
			$data_Obj->insert_subscriber_datasync($sender_address, $service, $product, $keyword, $shortcode, $user_type, $update_type, $update_desc, $update_time, $expiry_time, $effective_time);

		}

	}