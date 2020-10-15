<?php
// include_once "data_file.php";
include_once 'config.php';

if($_SERVER['REQUEST_METHOD'] == 'GET') 
{
    // $data_Obj = new cn_data_handler();

    $startDate = $_GET['counttartDate'];
    $endDate   = $_GET['countendDate'];
    $region    = $_GET['countregions'];
    // $regiongender = $_GET['districts'];

    $district  = "";
    $polling_station_name = "";
    $output = "";


    if (($startDate != "" || $endDate != "") && $region != "") 
    {
        $output .= '"DISTRICTS",  "USERS"'."\n";

        $statement =  $connect->query("SELECT DISTINCT(district) AS district, COUNT(mmsisdn) AS msisdn FROM voter_response WHERE region = '$region' AND (DATE(updated_at) BETWEEN '$startDate' AND '$endDate' ) GROUP BY district ORDER BY mmsisdn DESC");
        $statement->execute();
        $results = $statement->fetchAll();

        
        // $results = $data_Obj->filter_agegroup_date($agefrom, $ageto, $startDate, $endDate, $region);
        // var_dump($results);
        // die();
        foreach ($results as $region1) 
        {
            
            // $output .= '"'.$first_name.'",'.'"'.$last_name.'",'.'"'.$age.'",'.'"'.$gender.'",'.'"'.$msisdn.'",'.'"'.$polling_station_name.'",'.'"'.$region.'",'.'"'.$district.'",'.'"'.$updated_at.'"'."\n";

            $output .= '"'.$region1['district'].'",'.'"'.$region1['msisdn'].'"'."\n";
        }

        if ($results) 
        {
            $filename = "allcount-$startDate-To-$endDate-Data.csv";

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
        $output .= '"DISTRICTS",  "USERS"'."\n";

        $statement =  $connect->query("SELECT DISTINCT(district) AS district, COUNT(msisdn) AS msisdn FROM voter_response WHERE region = '$region' GROUP BY district ORDER BY msisdn DESC");
        $statement->execute();
        $results = $statement->fetchAll();


        if ($results) 
        {
            foreach ($results as $region2) 
            {
                $output .= '"'.$region2['district'].'",'.'"'.$region2['msisdn'].'"'."\n";
            }

            $filename = "regionalCounts.csv";

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
        $output .= '"DISTRICTS",  "USERS"'."\n";

        $statement =  $connect->query("SELECT DISTINCT(district) AS district, COUNT(msisdn) AS msisdn FROM voter_response GROUP BY district ORDER BY msisdn DESC");
        $statement->execute();
        $results = $statement->fetchAll();

        
        // $results = $data_Obj->filter_agegroup_date($agefrom, $ageto, $startDate, $endDate, $region);
        // var_dump($results);
        // die();
        foreach ($results as $region1) 
        {
            
            // $output .= '"'.$first_name.'",'.'"'.$last_name.'",'.'"'.$age.'",'.'"'.$gender.'",'.'"'.$msisdn.'",'.'"'.$polling_station_name.'",'.'"'.$region.'",'.'"'.$district.'",'.'"'.$updated_at.'"'."\n";

            $output .= '"'.$region1['district'].'",'.'"'.$region1['msisdn'].'"'."\n";
        }

        if ($results) 
        {
            $filename = "allcount.csv";

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
    }
}


?>