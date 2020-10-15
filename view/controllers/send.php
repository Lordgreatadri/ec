<?php 
		$message = "Testing for CARRE 247 NB now";
		$sender_address = "233543645688";
		$service_id = "233012000013036";
		$contents = urlencode($message);

		$correlator  = "2334".substr(time(), 0, 15);
		$data = array(
            'st' => 'sendsms',
            'sender_address' => $sender_address,
            'service' => $service_id,
            'message' => $contents,
            'correlator' => $correlator,           
        );


        $request_url = 'http://139.162.199.213:8799/snotify.php?channel=sms';
         // $request_url = "http://196.201.33.108:8310/SendSmsService/services/SendSms";
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

echo $data;
var_dump($params);
        $token_suffix  = "2334".substr(time(), 0, 15);
		$date_stamp  = date("Y-m-d H:i:s");
        $createdTime = date("Y-m-d");
        $file = fopen("response-$createdTime.log",'a');
        $current = "$params ,\n";
        fwrite($file, "$current");
        fclose($file);

        // echo $params;

        var_dump($result);

        $resp = fopen("result-$createdTime.log",'a');
        $val = "$result ,\n";
        fwrite($resp, "$val");
        fclose($resp);

//https://mycloud.com.gh/client/care247/mtnendpoint/view/controllers/send.php
        //API Keys
        //$url = "http://54.163.215.114:2788/Receiver?User=mycloudhttp&Pass=M1C2T3&From=1413&To=$sender_address&Text=$message";



        //string(466) "SoapFault exception: [SVC0901] SPID is null! in /opt/mtn_sdp/classes/SMSLibrary.php:464 Stack trace: #0 /opt/mtn_sdp/classes/SMSLibrary.php(464): SoapClient->__call() #1 /opt/mtn_sdp/classes/SMSAPI.php(105): SMSLibrary->sendSubscriberSMSWithCorrelatorID() #2 /opt/mtn_sdp/routes/sms.php(52): SMSAPI->sendPushOutSMS() #3 /opt/mtn_sdp/routes/routes.php(21): include('/opt/mtn_sdp/ro...') #4 /opt/mtn_sdp/snotify.php(8): include_once('/opt/mtn_sdp/ro...') #5 {main}null"

        // string(466) "SoapFault exception: [SVC0901] SPID is null! in /opt/mtn_sdp/classes/SMSLibrary.php:464 Stack trace: #0 /opt/mtn_sdp/classes/SMSLibrary.php(464): SoapClient->__call() #1 /opt/mtn_sdp/classes/SMSAPI.php(105): SMSLibrary->sendSubscriberSMSWithCorrelatorID() #2 /opt/mtn_sdp/routes/sms.php(52): SMSAPI->sendPushOutSMS() #3 /opt/mtn_sdp/routes/routes.php(21): include('/opt/mtn_sdp/ro...') #4 /opt/mtn_sdp/snotify.php(8): include_once('/opt/mtn_sdp/ro...') #5 {main}null"





        // ID 233543645688 User Type: 0 SpID: 2330110000889 ProductID: 23301220000014374 ServiceID: SericeList: 233012000013036 UpdateType: 1 UpdateTime: 20200715120807 UpdateDesc: Addition ExtensionInfo: 1