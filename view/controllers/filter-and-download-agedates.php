<?php
include_once "data_file.php";
include_once 'config.php';

if($_SERVER['REQUEST_METHOD'] == 'GET') 
{
    $data_Obj = new cn_data_handler();

    $startDate = $_GET['agestartDate'];
    $endDate   = $_GET['ageendDate'];
    // $region    = $_GET['rawcriteria'];
    $regionage = $_GET['agecriteria'];
    $district  = "";
    $polling_station_name = "";
    $output = "";

    $agefrom = 0;
    $ageto = 0;
    if(trim($regionage) == "18-20") {
        $agefrom = 18;
        $ageto = 20;
    }elseif(trim($regionage) == "21-30") {
        $agefrom = 21;
        $ageto = 30;
    }elseif(trim($regionage) == "31-40") {
        $agefrom = 31;
        $ageto = 40;
    }elseif(trim($regionage) == "41-50") {
        $agefrom = 41;
        $ageto = 50;
    }elseif(trim($regionage) == "51-60") {
        $agefrom = 51;
        $ageto = 60;
    }elseif(trim($regionage) == "61-70") {
        $agefrom = 61;
        $ageto = 70;
    }elseif(trim($regionage) == "71-80") {
        $agefrom = 71;
        $ageto = 80;
    }elseif(trim($regionage) == "81-90") {
        $agefrom = 81;
        $ageto = 90;
    }elseif(trim($regionage) == "91-100") {
        $agefrom = 91;
        $ageto = 100;
    }
    



    if ($startDate != "" || $endDate != "") 
    {
        $output .= '"Fisrt Name", "Last Name", "Age", "Gender", "Phone Number", "Polling Station", "Region", "District", "Date"'."\n";

        $statement =  $connect->query("SELECT * FROM voter_response WHERE (age BETWEEN '$agefrom' AND '$ageto') AND (DATE(updated_at) BETWEEN '$startDate' AND '$endDate' ) ORDER BY updated_at DESC");
        $statement->execute();
        $results = $statement->fetchAll();

        
        // $results = $data_Obj->filter_agegroup_date($agefrom, $ageto, $startDate, $endDate, $region);
        // var_dump($results);
        // die();
        foreach ($results as $region1) 
        {
            
            // $output .= '"'.$first_name.'",'.'"'.$last_name.'",'.'"'.$age.'",'.'"'.$gender.'",'.'"'.$msisdn.'",'.'"'.$polling_station_name.'",'.'"'.$region.'",'.'"'.$district.'",'.'"'.$updated_at.'"'."\n";

            $output .= '"'.$region1['first_name'].'",'.'"'.$region1['last_name'].'",'.'"'.$region1['age'].'",'.'"'.$region1['gender'].'",'.'"'.$region1['msisdn'].'",'.'"'.$region1['polling_station_name'].'",'.'"'.$region1['region'].'",'.'"'.$region1['district'].'",'.'"'.$region1['updated_at'].'"'."\n";
        }

        if ($results) 
        {
            $filename = "AgegroupsOf-$startDate-to-$endDate.csv";

            header('Content-Type: application/csv');
            header('Content-Disposition: attachment, filename='.$filename);
            echo $output;
        }else 
        {
            echo "<script>
                alert('no data found for date range');
                window.history.back();
            </script>";
        }
    } else if ($startDate == "" && $endDate == "") 
    {
        $output .= '"Fisrt Name", "Last Name", "Age", "Gender", "Phone Number", "Polling Station", "Region", "District", "Date"'."\n";

        $statement =  $connect->query("SELECT * FROM voter_response WHERE age BETWEEN '$agefrom' AND '$ageto' ORDER BY updated_at DESC");
        $statement->execute();
        $results = $statement->fetchAll();


        if ($results) 
        {
            foreach ($results as $region2) 
            {
                $output .= '"'.$region2['first_name'].'",'.'"'.$region2['last_name'].'",'.'"'.$region2['age'].'",'.'"'.$region2['gender'].'",'.'"'.$region2['msisdn'].'",'.'"'.$region2['polling_station_name'].'",'.'"'.$region2['region'].'",'.'"'.$region2['district'].'",'.'"'.$region2['updated_at'].'"'."\n";
            }

            $filename = $regionage."-agegroups.csv";

            header('Content-Type: application/csv');
            header('Content-Disposition: attachment, filename='.$filename);
            echo $output;
        } else {
            echo "<script>
                alert('no data found for this region');
                window.history.back();
            </script>";
        }
    }else 
    {
        $output .= '"Fisrt Name", "Last Name", "Age", "Gender", "Phone Number", "Polling Station", "Region", "District", "Date"'."\n";

        $statement =  $connect->query("SELECT * FROM voter_response WHERE age BETWEEN '$agefrom' AND '$ageto' ORDER BY updated_at DESC");
        $statement->execute();
        $results = $statement->fetchAll();


        if ($results) 
        {
            foreach ($results as $regions) 
            {
                $output .= '"'.$regions['first_name'].'",'.'"'.$regions['last_name'].'",'.'"'.$regions['age'].'",'.'"'.$regions['gender'].'",'.'"'.$regions['msisdn'].'",'.'"'.$regions['polling_station_name'].'",'.'"'.$regions['region'].'",'.'"'.$regions['district'].'",'.'"'.$regions['updated_at'].'"'."\n";
            }

            $filename = "allagegroupRecord-$regionage.csv";

            header('Content-Type: application/csv');
            header('Content-Disposition: attachment, filename='.$filename);
            echo $output;
        }
        else 
        {
            echo "<script>
                alert('no data found for date range');
                window.history.back();
            </script>";
        }
    }
}


?>