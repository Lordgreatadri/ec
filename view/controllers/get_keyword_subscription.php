<?php 
	// get_keyword_subscription.php
error_reporting();
	include_once "prg_data_sync.php";

    if($_SERVER['REQUEST_METHOD'] == 'GET') {

    	$data_Obj   = new prg_data_sync();
    	$response   = array();
    	$active_prg = "";
        $unsub_prg  = "";
        $sent_prg   = 0;
        $delivered_prg = 0;


        $active_srh = "";
        $unsub_srh  = "";
        $sent_srh   = 0;
        $delivered_srh = 0;

        $active_nb  = "";
        $unsub_nb   = "";
        $sent_nb    = 0;
        $delivered_nb = 0;

        $active_lsn = "";
        $unsub_lsn  = "";
        $sent_lsn   = 0;
        $delivered_lsn = 0;

    	$prg_subs   = $data_Obj->get_active_keyword_subs_count("PRG");
    	foreach ($prg_subs as $prg) 
    	{
    		$active_prg = $prg['key_count'];
    	}

    	$prg_unsub  = $data_Obj->get_inactive_keyword_subscription_count("PRG");
    	foreach ($prg_unsub as $prgvalue) 
    	{
    		$unsub_prg = $prgvalue['inactive_count'];
    	}


    	$srh_subs   = $data_Obj->get_active_keyword_subs_count("SRH");
    	foreach ($srh_subs as $srh) 
    	{
    		$active_srh = $srh['key_count'];
    	}

    	$srh_unsub  = $data_Obj->get_inactive_keyword_subscription_count("SRH");
    	foreach ($srh_unsub as $srhvalue) 
    	{
    		$unsub_srh = $srhvalue['inactive_count'];
    	}



    	$nb_subs = $data_Obj->get_active_keyword_subs_count("NB");
    	foreach ($nb_subs as $nb) 
    	{
    		$active_nb = $nb['key_count'];
    	}

    	$nb_unsub   = $data_Obj->get_inactive_keyword_subscription_count("NB");
    	foreach ($nb_unsub as $nbvalue) 
    	{
    		$unsub_nb = $nbvalue['inactive_count'];
    	}


    	$lsn_subs   = $data_Obj->get_active_keyword_subs_count("LSN");
    	foreach ($lsn_subs as $lsn) 
    	{
    		$active_lsn = $lsn['key_count'];
    	}

    	$lsn_unsub  = $data_Obj->get_inactive_keyword_subscription_count("LSN");
    	foreach ($lsn_unsub as $lsnvalue) 
    	{
    		$unsub_lsn = $lsnvalue['inactive_count'];
    	}









        ########################################################
        // content transmission and delivery....................
        $prg_sent   = $data_Obj->get_prg_sent_today();
        foreach ($prg_sent as $prg_s) 
        {
            $sent_prg = $prg_s['sent_prg'];
        }

        $prg_delivery  = $data_Obj->get_prg_delivery();
        foreach ($prg_delivery as $prgdeli) 
        {
            $delivered_prg = $prgdeli['delivery_prg'];
        }



        $srh_sent   = $data_Obj->get_srh_sent_today();
        foreach ($srh_sent as $srh_s) 
        {
            $sent_srh = $srh_s['sent_srh'];
        }

        $srh_delivery  = $data_Obj->get_srh_delivery();
        foreach ($srh_delivery as $srhdeli) 
        {
            $delivered_srh = $srhdeli['delivery_srh'];
        }





        $nb_sent   = $data_Obj->get_nb_sent_today();
        foreach ($nb_sent as $bn_s) 
        {
            $sent_nb = $bn_s['sent_nb'];
        }

        $nb_delivery  = $data_Obj->get_nb_delivery();
        foreach ($nb_delivery as $nbdeli) 
        {
            $delivered_nb = $nbdeli['delivery_nb'];
        }



        $lsn_sent   = $data_Obj->get_lsn_sent_today();
        foreach ($lsn_sent as $lsnsent) 
        {
            $sent_lsn = $lsnsent['sent_lsn'];
        }

        $lsn_delivery  = $data_Obj->get_lsn_delivery();
        foreach ($lsn_delivery as $lsndeli) 
        {
            $delivered_lsn = $lsndeli['delivery_lsn'];
        }








    	$response['active_prg'] = $active_prg | 0;
    	$response['unsub_prg']  = $unsub_prg | 0;
        $response['sent_prg']   = $sent_prg | 0;
        $response['delivered_prg'] = $delivered_prg | 0;

    	$response['active_srh'] = $active_srh | 0;
    	$response['unsub_srh']  = $unsub_srh | 0;
        $response['sent_srh']   = $sent_srh | 0;
        $response['delivered_srh'] = $delivered_srh | 0;

    	$response['active_nb']  = $active_nb | 0;
    	$response['unsub_nb']   = $unsub_nb | 0;
        $response['sent_nb']    = $sent_nb | 0;
        $response['delivered_nb']  = $delivered_nb | 0;

    	$response['active_lsn'] = $active_lsn | 0;
    	$response['unsub_lsn']  = $unsub_lsn | 0;
        $response['sent_lsn']   = $sent_lsn | 0;
        $response['delivered_lsn'] = $delivered_lsn | 0;
    	header('Content-Type: application/json');
		echo json_encode($response);



        $data_Obj->process_prg_data_flow();
    }