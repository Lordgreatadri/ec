<?php 
require_once 'prg_data_sync.php';

$data_Obj     = new prg_data_sync();

ob_start();
$datav = ob_get_clean();

$createdTime = date("Y-m-d");
$file = fopen("logs/delivery_status-$createdTime.log",'a');
$value = "$datav\n";
fwrite($file, "$value");
fclose($file);

// $callback_obj = file_get_contents("php://input");
// $json         = json_decode($callback_obj, true);
// $sender_address = $json['sender_address'];
// $service      = $json['service'];
// $delivery_status = $json['delivery_status'];
// $operator     = $json['operator'];
// $correlator   = $json['correlator'];
// $error_code   = $json['error_code'];
// $error_source = $json['error_source'];
// $update_time  = $json['update_time'];

$sender_address  = $_REQUEST["sender_address"];
$service         = $_REQUEST["service"];
$delivery_status = $_REQUEST["delivery_status"];
$update_time     = $_REQUEST["update_time"];
$operator        = $_REQUEST["operator"];
$correlator      = $_REQUEST["correlator"];
$error_code      = $_REQUEST["error_code"];
$error_source    = $_REQUEST["error_source"];


$senderAddress = $data_Obj->_format_msisdn($sender_address);


$data_Obj->update_content_delivery_report($senderAddress, $service, $delivery_status, $correlator, $error_code, $error_source, $update_time);

//sftp://adri@ec2-52-214-1-251.eu-west-1.compute.amazonaws.com/var/www/html/client/care247/mtnendpoint/view/controllers/content_delivery_endpoint.php
// http://52.214.1.251/client/care247/mtnendpoint/view/controllers/content_delivery_endpoint.php

// Array
// (
//     [sender_address] => 0552559040
//     [service] => 233012000003749
//     [delivery_status] => DeliveredToTerminal
//     [update_time] => 2020-05-02 11:45:01
//     [operator] => 23301
//     [correlator] => 323r3re2bre3r2
//     [error_code] => 
//     [error_source] => 
// )



$date_stamp  = date("Y-m-d H:i:s");
$createdTime = date("Y-m-d");
$file = fopen("logs/delivery-$createdTime.log",'a');
$data = "{sender_address: $sender_address,  service: $service, delivery_status: $delivery_status, correlator: $correlator, error_code: $error_code, error_source: $error_source, update_time: $update_time } ,\n";
fwrite($file, "$data");
fclose($file);
	
