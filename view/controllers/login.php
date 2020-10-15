<?php

    include_once "login_function.php";
    $data_Obj = new cn_data_handler();
   

    if($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        $response = array();
        $databaseName = "";
        $databasePassword = "";

        $username = htmlentities(htmlspecialchars(trim($_POST['username'])) );
        $password = htmlentities(trim($_POST['password']));
        $hashedPassword = md5($password);
        // query to check the existence of username
        
        $checkUsernameQuery = $data_Obj->user_login($username, $hashedPassword);

        //var_dump($checkUsernameQuery);
        foreach ($checkUsernameQuery as $value) 
        {
           $databasePassword = $value['password'];
           $databaseName     = $value['username'];
        }

        if($databaseName === $username) 
        {
            //$hashedPassword = md5($password);
            // var_dump($hashedPassword);die();
            if($databasePassword === $hashedPassword) //$hashedPassword login_hist
            {
                session_start();
                //$data = array("username" =>$username, "company" => $value['company']);
                $data_Obj->loging_history($username, $value['company']);

                $_SESSION['username']     = $username;
                $_SESSION['company']      = $value['company'];
                $_SESSION['UserId']       = $value['uid'];
                $_SESSION['UserLoggedIn'] = true;

                $response['success'] = true;
                $response["message"] = 'Login successful!';

                header('Content-Type: application/json');
                echo json_encode($response);
            } else {
                $response['success'] = false;
                $response["message"] = "Wrong password entered!";
//'<div class="alert alert-danger alert-dismissible" role="alert">
        //     <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="width=100px;"> Wrong password entered! <span aria-hidden="true">&times</span></button>                      
        // </div>'
                header('Content-Type: application/json');
                echo json_encode($response);
            }         
        } else {
            $response['success'] = false;
            $response["message"] = 'Wrong username';

            header('Content-Type: application/json');
            echo json_encode($response);
        } 
    }