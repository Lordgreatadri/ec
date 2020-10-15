<?php 
session_start();
require_once 'controllers/prg_data_sync.php';
$prg_Obj = new prg_data_sync();
$username     = $_SESSION['username'];
$department   = $_SESSION['department'];
$message ="Ok man test this ormat too and let us see";
// $ok = $prg_Obj->insert_prg_content_sent($username, $department, "prg", "3", $message);

// var_dump($ok);
$keyword = "PRG";
$entry_level = "17";

echo "string" . $keyword;

if(trim($keyword) == "PRG") 
		{
			echo "string" . $keyword;
			echo $entry_level ;
			$prg_data = $prg_Obj->get_prg_subs_to_push_content($keyword, $entry_level);// set subscriber_status ="Active"
			foreach ($prg_data as $prg)
			{
				// $this->send_sms_content($prg_service, $prg['subscriber_msisdn'], $contents);
				var_dump($prg['subscriber_msisdn']) ;
			}
		}elseif(trim($keyword) == "NB")
		{
			$prg_Obj->fetch_keyword_subs($keyword);// set subscriber_status ="Active"
			foreach ($prg_Obj->fetch_keyword_subs($keyword) as $value) 
			{
				// $this->send_sms_content($bn_service, $value['subscriber_msisdn'], $contents);
				var_dump($value['subscriber_msisdn']) ;
			}
		}elseif(trim($keyword) == "SRH") 
		{
			foreach ($prg_Obj->fetch_keyword_subs($keyword) as $values) 
			{
				// $this->send_sms_content($srh_service, $values['subscriber_msisdn'], $contents);
				var_dump($values['subscriber_msisdn']) ;
			}
		}elseif(trim($keyword) == "LSN") 
		{
			foreach ($prg_Obj->fetch_keyword_subs($keyword) as $val) 
			{
				// $this->send_sms_content($lsn_service, $val['subscriber_msisdn'], $contents);
				var_dump($val['subscriber_msisdn']) ;
			}
		}

		die();
// $prg_Obj->process_prg_data_flow();


// $data = $prg_Obj->get_prg_subscribers();
// // var_dump($data);

// $today       = date('D');
// echo "string ".$today;
// 		$today_date  = date("Y-m-d");
// 		echo $today_date;
// $day = $prg_Obj->get_data_sync($today, $today_date);
// var_dump($day);

// $keyword = "srh";
// $val = $prg_Obj->get_active_keyword_subs_count($keyword);
// var_dump($val);

// $ina = $prg_Obj->get_inactive_keyword_subscription_count($keyword);
// var_dump($ina);

// $token_suffix  = "2334".substr(time(), 0, 15);
// echo $token_suffix;

ob_start();
// var_dump($GLOBALS);
$datas = ob_get_clean();
var_dump($datas);

$message = "Ut et amet deserunt lorem ea proident sit voluptate eiusmod non labore commodo est ut dolore";
$sender_address = "233543645688";
	$contents = urlencode($message);
		// $correlator = "otwqwe35e3";
		$correlator  = "2334".substr(time(), 0, 15);
		$data = array(
            'st' => "sendsms",
            'service' => "233012000013034",//"233012000016214",
            'correlator' => $correlator,
            'message' => $contents,//'mtn-gh',
            'sender_address' => $sender_address
        );

        //API Keys
        //$url = "http://54.163.215.114:2788/Receiver?User=mycloudhttp&Pass=M1C2T3&From=1413&To=$sender_address&Text=$message";

        $request_url = 'http://139.162.199.213:8799/snotify.php?channel=sms';
        $params = json_encode($data);

        $ch = curl_init($request_url);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Cache-Control: no-cache',
            'Content-Type: application/json',
        ));

        $result = curl_exec($ch);
        $err    = curl_error($ch);
        curl_close($ch);

        // file_put_contents(filename, data)



        $token_suffix  = "2334".substr(time(), 0, 15);
		$date_stamp  = date("Y-m-d H:i:s");
        $createdTime = date("Y-m-d");
        $file = fopen("controllers/logs/response-$createdTime.log",'a');
        $current = "$params ,\n";
        fwrite($file, "$current");
        fclose($file);

        var_dump($params);