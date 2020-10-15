<?php
    $serverName = "localhost";
    $databaseName = "ec_gh";   //database name             # mcc_ec
    $databaseUser = "root";   //database user              # postgres
    $databasePassword = '';   #"#4kLxMzGurQ7Z~";           # EcsDp@E&(W@PR3aPc   Mccg8(3P^tJVnBDsF
    $databasedriver = "mysql"; //database driver           # pgsql
    $charset        = "utf8mb4";

    $connect = new PDO($databasedriver.":host=".$serverName.";dbname=".$databaseName.";charset=utf8",$databaseUser, $databasePassword);
 	$connect->setAttribute(PDO::ATTR_AUTOCOMMIT,FALSE);
    if (!$connect) {
        die("unable to connect to database");
    }else{
    	// echo "Connected to database";
    }