<?php

	$rand_ = rand(25, 9999999);
	$token = "2334".substr(time(), 0, 20);
	$correlator  = $token.$rand_;

	var_dump($correlator);

	var_dump($rand_);
	var_dump($token);

	$clientId = '123456';
		$clientSecret = '78901234567';

	$basic_auth_key =  'Basic ' . base64_encode($clientId . ':' . $clientSecret);

	var_dump($basic_auth_key);


	$randomize = rand(10000000000000,100);

	var_dump('2334'.$randomize);


	$date = date("Y-m-d H:i:s");
	$val = date_diff( $date) + 5 ;

	$startTime = date("Y-m-d H:i:s");
        $cenvertedTime = date('Y-m-d H:i:s',strtotime('+15 minutes',strtotime($startTime)));
	var_dump($startTime);
	var_dump($cenvertedTime);