<?php 
	session_start();
	 // uploaded_messages
	require_once '../data_handler.php';
	$data_Obj = new data_processor();
	if($_SERVER['REQUEST_METHOD'] == 'POST') 
	{
        // print_r($_FILES["file"]);

		$data      = fopen($_FILES['file']['tmp_name'], 'rb');
        $file_type = $_FILES["file"]["type"];
        $extension = strtolower(pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION));

        if ($extension != "txt" && $extension != "csv") 
        {
        	header('Location: ../schedule_broadcast.php?qw=only-text-file-required');
			$_SESSION['notice_message'] = 'Only a text and scv files types are required!';
        } 
        elseif ($file_type != 'text/plain' && $file_type != 'application/vnd.ms-excel') 
        {
        	header('Location: ../schedule_broadcast.php?qw=bad-file-type');
			$_SESSION['notice_message'] = 'This type of file cannot be uploaded!';
        }
        else
        {
            if ($extension == "txt" && $file_type == 'text/plain') 
            {
                while (($line = fgets($data)) !== false) 
                {
                    $content = explode(';', $line);
                    error_reporting(0);
                    $message     = trim($content[0]);
                    $keyword     = trim($content[1]);
                    $dateToSend  = trim($content[2]);
                    $todays_date = date('Y-m-d');
                    $service_id  = "";
                    //get service id for the given keyword.......................
                    foreach ($data_Obj->get_keyword_details_for_sms($keyword) as $key) 
                    {
                        $service_id = $key['service'];
                    }
                        
                    // sleep(1);
                    // do data insertion now..................
                    $uploaded = $data_Obj->_do_mass_content_upload($keyword, $service_id, $message, $dateToSend);             
                    
                }


                if ($uploaded) {
                    header('Location: ../schedule_broadcast.php?success=file-upload-suceeded');
                    $_SESSION['notice_message'] = 'TXT file content uploaded successfully!';
                } else {
                    header('Location: ../schedule_broadcast.php?failed=file-upload-failed');
                    $_SESSION['notice_message'] = 'TXT file content upload failed!';
                }
            } elseif ($extension == "csv" && $file_type == 'application/vnd.ms-excel') 
            {
                $detail = fopen($_FILES['file']['tmp_name'], 'r');
                while (($content = fgetcsv($detail, 1000, ',')) !== false) 
                {
                    error_reporting(0);
                    $message     = trim($content[0]);
                    $keyword     = trim($content[1]);
                    $dateToSend  = trim($content[2]);
                    $todays_date = date('Y-m-d');
                    $service_id  = "";
                    //get service id for the given keyword.......................
                    foreach ($data_Obj->get_keyword_details_for_sms($keyword) as $key) 
                    {
                        $service_id = $key['service'];
                    }
                        
                    // sleep(1);
                    // do data insertion now..................
                    $uploaded = $data_Obj->_do_mass_content_upload($keyword, $message, $dateToSend);             
                    
                }

                if ($uploaded) {
                    header('Location: ../schedule_broadcast.php?success=file-upload-suceeded');
                    $_SESSION['notice_message'] = 'CSV file content uploaded successfully!';
                } else {
                    header('Location: ../schedule_broadcast.php?failed=file-upload-failed');
                    $_SESSION['notice_message'] = 'CSV file content upload failed!';
                }
            } 
            
        	
        }
	}


	