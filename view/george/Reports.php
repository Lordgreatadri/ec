<?php
// include_once("PGSQLDB.php");

// class Reports extends PGSQLDB
// {

//     ////////////
//     public function exampleFunction() {

//         // $sql = "SELECT msisdn, service, correlator, response_code FROM delivery_reports WHERE response_code IS NULL AND service = ? AND inserted_at::DATE = ?";

//     	$sql = "SELECT * FROM voter_response";
        

//         //$condition = [$service, $inserted_at];

//         return $this->fetchAll($sql);//, $condition
//     }


// }


// $obj = new Reports();


// var_dump($obj->exampleFunction());




    // $myPDO = new PDO('mysql:host=localhost;dbname=ec_gh', 'root', '');

    // $result = $myPDO->query("SELECT * FROM voter_response");
    // $result->execute();
				// // set the resulting array to associative
				// // $result->setFetchMode(PDO::FETCH_ASSOC);
				// $results = $result->fetchAll();

    // var_dump($results);

$myPDO = new PDO('pgsql:host=localhost;dbname=mcc_ec', 'postgres', '1234');
$result = $myPDO->query("SELECT * FROM voter_response");
$result->execute();
$results = $result->fetchAll();

var_dump($results);
?>