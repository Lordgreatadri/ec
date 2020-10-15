
<?php 
//<!-- user_signup.php -->
	require_once 'login_function.php';

	$data_Obj = new cn_data_handler();
	   

    if($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        $response     = array();
        $databaseName = "";
        $databasePassword = "";

        $username     = htmlentities(htmlspecialchars(trim($_POST['username'])) );
        $company      = htmlentities(trim($_POST['company']));
        $password     = htmlentities(trim($_POST['password']));
        $cfpassword   = htmlentities(trim($_POST['cfpassword']));
        $hashedPassword = md5($password);

        if (trim($password) == trim($cfpassword)) 
        {
        	// check for duplicate entry.............
        	$duplicate_user = $data_Obj->duplicate_entry($username, $company);
        	if($duplicate_user > 0) 
        	{
        		$response['success'] = false;
                $response["message"] = 'Please this user already exist!';

                header('Content-Type: application/json');
                echo json_encode($response);
        	}else
        	{	
        		$saved_data = $data_Obj->signup_users($username, $hashedPassword, $company);
        		if (trim($saved_data) > 0) 
        		{
        			$response['success'] = true;
			        $response["message"] = 'User entry was succeful!';

			        header('Content-Type: application/json');
			        echo json_encode($response);
        		} else {
        			$response['success'] = false;
			        $response["message"] = 'New usser data entry failed!';

			        header('Content-Type: application/json');
			        echo json_encode($response);
        		}
        		
        		
        	}

        } else {
        	$response['success'] = true;
            $response["message"] = 'Please the passwords doest not match!';

            header('Content-Type: application/json');
            echo json_encode($response);
        }
        

    }