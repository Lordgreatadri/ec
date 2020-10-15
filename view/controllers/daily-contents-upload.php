<?php 
	// daily-contents-upload.php
	require_once 'prg_data_sync.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
    	session_start();
    	$data_Obj     = new prg_data_sync();
        $response     = array();
        $contents     = $_POST['content'];
        $entry_level  = $_POST['entry_level'];
        $keyword      = $_POST['keyword'];

        $username     = $_SESSION['username'];
        $department   = $_SESSION['department'];

        if (trim($keyword) == "PRG") 
        {
            $save_content = $data_Obj->insert_prg_content_sent($username, $department,  $keyword,  $entry_level, $contents);

            if (trim($save_content) == true) 
            {              
                $response['save']    = "Contents saved and sent successfully!";
                $response['success'] = true;
                $response['message'] = "Contents saved and sent successfully!";
                header('Content-Type: application/json');
                echo json_encode($response);

                // $data_Obj->send_daily_message($keyword, $entry_level, $contents);
            }else
            {
                $response['success'] = false;
                $response['message'] = "Contents upload failed!";
                header('Content-Type: application/json');
                echo json_encode($response);
            }
        }
        else
        {
            $save_content = $data_Obj->insert_other_content_sent($username, $department,  $keyword, $contents);
            if (trim($save_content) == true) 
            {
                $response['save']    = "Contents saved and sent successfully!";
                $response['success'] = true;
                $response['message'] = "Contents saved and sent successfully!";
                header('Content-Type: application/json');
                echo json_encode($response);

                // $data_Obj->send_daily_message($keyword, $entry_level, $contents);
            }else
            {
                $response['success'] = false;
                $response['message'] = "Contents upload failed!";
                header('Content-Type: application/json');
                echo json_encode($response);
            }
        }
        
        $data_Obj->send_daily_message($keyword, $entry_level, $contents);
        // $save_content = $data_Obj->insert_prg_content_sent($username, $department,  $keyword,  $entry_level, $contents);
        $data_Obj->process_prg_data_flow();

        // $data_values = array("keyword" => $keyword, "entry_level" => $entry_level, "contents" => $contents);
        // $ch =  curl_init('http://52.214.1.251/client/care247/mtnendpoint/view/controllers/content_transmission.php');  
        //         curl_setopt( $ch, CURLOPT_POST, true );  
        //         curl_setopt( $ch, CURLOPT_POSTFIELDS, $data_values);  
        //         curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        // $result = curl_exec($ch); 
        // $err = curl_error($ch);
        // curl_close($ch);
    }







