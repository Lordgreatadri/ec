<?php
// include_once "data_file.php";
include_once 'config.php';

if($_SERVER['REQUEST_METHOD'] == 'GET') 
{
    // $data_Obj = new cn_data_handler();

    $startDate = $_GET['districtstartDate'];
    $endDate   = $_GET['districtendDate'];
    $region    = $_GET['districtcriteria'];
    $regiongender = $_GET['districtgender'];

    $district  = "";
    $polling_station_name = "";
    $output = "";


    if (($startDate != "" || $endDate != "") && $region != "") 
    {
        $output .= '"Fisrt Name", "Last Name", "Age", "Gender", "Phone Number", "Polling Station", "Region", "District", "Date"'."\n";

        $statement =  $connect->query("SELECT * FROM voter_response WHERE district = '$region' AND gender = '$regiongender' AND (DATE(updated_at) BETWEEN '$startDate' AND '$endDate' ) ORDER BY updated_at DESC");
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
            $filename = "$region-$regiongender.csv";

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
    } else if (($startDate == "" && $endDate == "") && $region != "") 
    {
        $output .= '"Fisrt Name", "Last Name", "Age", "Gender", "Phone Number", "Polling Station", "Region", "District", "Date"'."\n";

        $statement =  $connect->query("SELECT * FROM voter_response WHERE district = '$region' AND gender = '$regiongender' ORDER BY updated_at DESC");
        $statement->execute();
        $results = $statement->fetchAll();


        if ($results) 
        {
            foreach ($results as $region2) 
            {
                $output .= '"'.$region2['first_name'].'",'.'"'.$region2['last_name'].'",'.'"'.$region2['age'].'",'.'"'.$region2['gender'].'",'.'"'.$region2['msisdn'].'",'.'"'.$region2['polling_station_name'].'",'.'"'.$region2['region'].'",'.'"'.$region2['district'].'",'.'"'.$region2['updated_at'].'"'."\n";
            }

            $filename = $region."-$regiongender.csv";

            header('Content-Type: application/csv');
            header('Content-Disposition: attachment, filename='.$filename);
            echo $output;
        } else {
            echo "<script>
                alert('no data found for this region');
                window.history.back();
            </script>";
        }
    } elseif(($startDate != "" && $endDate != "") && $region == "") 
    {
        $output .= '"Fisrt Name", "Last Name", "Age", "Gender", "Phone Number", "Polling Station", "Region", "District", "Date"'."\n";

        $statement =  $connect->query("SELECT * FROM voter_response WHERE gender = '$regiongender' AND (DATE(updated_at) BETWEEN '$startDate' AND '$endDate' ) ORDER BY updated_at DESC");
        $statement->execute();
        $results = $statement->fetchAll();


        if($results) 
        {
            foreach ($results as $regions) 
            {
                $output .= '"'.$regions['first_name'].'",'.'"'.$regions['last_name'].'",'.'"'.$regions['age'].'",'.'"'.$regions['gender'].'",'.'"'.$regions['msisdn'].'",'.'"'.$regions['polling_station_name'].'",'.'"'.$regions['region'].'",'.'"'.$regions['district'].'",'.'"'.$regions['updated_at'].'"'."\n";
            }

            $filename = "$regiongender-RecordOf-$startDate-To-$endDate.csv";

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
    } else {
        $output .= '"Fisrt Name", "Last Name", "Age", "Gender", "Phone Number", "Polling Station", "Region", "District", "Date"'."\n";

        $statement =  $connect->query("SELECT * FROM voter_response WHERE gender = '$regiongender' ORDER BY updated_at DESC");
        $statement->execute();
        $results = $statement->fetchAll();


        if ($results) 
        {
            foreach ($results as $regions) 
            {
                $output .= '"'.$regions['first_name'].'",'.'"'.$regions['last_name'].'",'.'"'.$regions['age'].'",'.'"'.$regions['gender'].'",'.'"'.$regions['msisdn'].'",'.'"'.$regions['polling_station_name'].'",'.'"'.$regions['region'].'",'.'"'.$regions['district'].'",'.'"'.$regions['updated_at'].'"'."\n";
            }

            $filename = "allregionRecord-$regiongender.csv";

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