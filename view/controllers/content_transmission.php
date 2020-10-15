<?php 
ob_start();

if (isset($_POST['keyword']) && isset($_POST['contents'])) 
{
	// $data = ob_get_clean();
	$data = "key: $_POST['keyword'], conte: $_POST['contents']";
	$createdTime = date("Y-m-d");
	$file = fopen("aabibahneto-$createdTime.log",'a');
	$values = "$data\n";
	fwrite($file, "$values");
	fclose($file);
}