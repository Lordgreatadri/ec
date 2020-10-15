<?php 
session_start();
// require_once 'controllers/prg_data_sync.php';
// $data_Obj = new prg_data_sync();
// $sent_prg   = 0;
// $delivered_prg = 0;
// $sent_srh   = 0;
// $delivered_srh = 0;
// $sent_nb    = 0;
// $delivered_nb = 0;
// $sent_lsn   = 0;
// $delivered_lsn = 0;

//$prg_sent   = $data_Obj->get_prg_sent_today();
// foreach ($prg_sent as $prg_s) 
// {
//     $sent_prg = $prg_s['sent_prg'];
// }
// $prg_delivery  = $data_Obj->get_prg_delivery();
// foreach ($prg_delivery as $prgdeli) 
// {
//     $delivered_prg = $prgdeli['delivery_prg'];
// }

if (!isset($_SESSION['UserLoggedIn']) &&  $_SESSION['UserLoggedIn'] == "") 
{
    echo "<script>window.location.href='index.php';</script>";
}


require_once 'includes/header.inc.php';
?>






        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->



            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-success color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong greater-accra-total">0</h2>
                                <div class="m-b-5 font-strong"><u>Greater Accra</u></div>
                                <p class="m-b-5 font-strong"><small> Male <span class="greater-accra-male">0 </span></small></p>
                                <p class="m-b-5 font-strong"><small> Female <span class="greater-accra-female">0 </span></small></p>
                                <i class="ti-book widget-stat-icon"></i>
                                <!-- ti-shopping-cart -->
                                <div><i class="fa fa-level-up m-r-5"></i><small> Today <span class="today-greater-accra">0 </span></small></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-info color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong eastern-total">0</h2>
                                <div class="m-b-5 font-strong"><u>Eastern</u></div><i class="ti-book widget-stat-icon"></i>
                                <div class="m-b-5 font-strong"><small> Male <span class="eastern-male">0 </span></small></div>
                                <div class="m-b-5 font-strong"><small> Female <span class="eastern-female">0 </span></small></div>
                                <!-- ti-bar-chart -->
                                <div><i class="fa fa-level-up m-r-5"></i><small> Today <span class="today-eastern">0 </span></small></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-warning color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong ashanti-total">0</h2>
                                <div class="m-b-5 font-strong"><u>Ashanti</u></div><i class="ti-book widget-stat-icon"></i>
                                <div class="m-b-5 font-strong"><small> Male <span class="ashanti-male">0 </span></small></div>
                                <div class="m-b-5 font-strong"><small> Female <span class="ashanti-female">0 </span></small></div>
                                <!-- fa fa-money -->
                                <div><i class="fa fa-level-up m-r-5"></i><small> Today <span class="today-ashanti">0 </span></small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-danger color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong brong-ahafo-total">0</h2>
                                <div class="m-b-5 font-strong"> <u>Brong Ahafo</u></div><i class="ti-book widget-stat-icon"></i>
                                <div class="m-b-5 font-strong"><small> Male <span class="brong-ahafo-male">0 </span></small></div>
                                <div class="m-b-5 font-strong"><small> Female <span class="brong-ahafo-female">0 </span></small></div>

                                <div><i class="fa fa-level-up m-r-5"></i><small> Today <span class="today-brong-ahafo">0 </span></small></div>
                            </div>
                        </div>
                    </div>
                </div>




                <hr><br>


                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-success color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong bono-east-total">0<?php //echo $sent_prg; ?></h2>
                                <div class="m-b-5 font-strong"><u>Bono-East</u></div><i class="ti-book widget-stat-icon"></i>
                                <div class="m-b-5 font-strong"><small> Male <span class="bono-east-male">0 </span></small></div>
                                <div class="m-b-5 font-strong"><small> Female <span class="bono-east-female">0 </span></small></div>
                                <!-- ti-shopping-cart -->
                                <div><i class="fa fa-level-up m-r-5"></i><small> Today <span class="bono-east-today">0 </span></small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-info color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong ahafo-total">0</h2>
                                <div class="m-b-5 font-strong"><u>Ahafo</u></div><i class="ti-book widget-stat-icon"></i>
                                <div class="m-b-5 font-strong"><small> Male <span class="ahafo-male">0 </span></small></div>
                                <div class="m-b-5 font-strong"><small> Female <span class="ahafo-female">0 </span></small></div>
                                <!-- ti-bar-chart -->
                                <div><i class="fa fa-level-up m-r-5"></i><small> Today <span class="today-ahafo">0 </span></small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-warning color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong central-total">0</h2>
                                <div class="m-b-5 font-strong"><u>Central</u></div><i class="ti-book widget-stat-icon"></i>
                                <div class="m-b-5 font-strong"><small> Male <span class="central-male">0 </span></small></div>
                                <div class="m-b-5 font-strong"><small> Female <span class="central-female">0 </span></small></div>
                                <!-- fa fa-money -->
                                <div><i class="fa fa-level-up m-r-5"></i><small> Today <span class="today-central">0 </span></small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-danger color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong northern-total">0</h2>
                                <div class="m-b-5 font-strong"> <u>Northern</u></div><i class="ti-book widget-stat-icon"></i>
                                <div class="m-b-5 font-strong"><small> Male <span class="northern-male">0 </span></small></div>
                                <div class="m-b-5 font-strong"><small> Female <span class="northern-female">0 </span></small></div>

                                <div><i class="fa fa-level-up m-r-5"></i><small> Today <span class="stoday-northern">0 </span></small></div>
                            </div>
                        </div>
                    </div>
                </div>



                <hr><br>


                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-success color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong savannah-total">0<?php //echo $sent_prg; ?></h2>
                                <div class="m-b-5 font-strong"><u>Savannah</u></div><i class="ti-book widget-stat-icon"></i>
                                <div class="m-b-5 font-strong"><small> Male <span class="savannah-male">0 </span></small></div>
                                <div class="m-b-5 font-strong"><small> Female <span class="savannah-female">0 </span></small></div>
                                <!-- ti-shopping-cart -->
                                <div><i class="fa fa-level-up m-r-5"></i><small> Today <span class="today-savannah">0 </span></small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-info color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong north-east-total">0</h2>
                                <div class="m-b-5 font-strong"><u>North East</u></div><i class="ti-book widget-stat-icon"></i>
                                <div class="m-b-5 font-strong"><small> Male <span class="north-east-male">0 </span></small></div>
                                <div class="m-b-5 font-strong"><small> Female <span class="north-east-female">0 </span></small></div>
                                <!-- ti-bar-chart -->
                                <div><i class="fa fa-level-up m-r-5"></i><small> Today <span class="today-north-east">0 </span></small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-warning color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong upper-east-total">0</h2>
                                <div class="m-b-5 font-strong"><u>Upper East</u></div><i class="ti-book widget-stat-icon"></i>
                                <div class="m-b-5 font-strong"><small> Male <span class="upper-east-male">0 </span></small></div>
                                <div class="m-b-5 font-strong"><small> Female <span class="upper-east-female">0 </span></small></div>
                                <!-- fa fa-money -->
                                <div><i class="fa fa-level-up m-r-5"></i><small> Today <span class="today-upper-east">0 </span></small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-danger color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong upper-west-total">0</h2>
                                <div class="m-b-5 font-strong"> <u>Upper West</u></div><i class="ti-book widget-stat-icon"></i>
                                <div class="m-b-5 font-strong"><small> Male <span class="upper-west-male">0 </span></small></div>
                                <div class="m-b-5 font-strong"><small> Female <span class="upper-west-female">0 </span></small></div>

                                <div><i class="fa fa-level-up m-r-5"></i><small> Today <span class="today-upper-west">0 </span></small></div>
                            </div>
                        </div>
                    </div>
                </div>




                <hr><br>


                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-success color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong volta-total">0<?php //echo $sent_prg; ?></h2>
                                <div class="m-b-5 font-strong"><u>Volta</u></div><i class="ti-book widget-stat-icon"></i>
                                <div class="m-b-5 font-strong"><small> Male <span class="volta-male">0 </span></small></div>
                                <div class="m-b-5 font-strong"><small> Female <span class="volta-female">0 </span></small></div>
                                <!-- ti-shopping-cart -->
                                <div><i class="fa fa-level-up m-r-5"></i><small> Today <span class="today-volta">0 </span></small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-info color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong oti-region-total">0</h2>
                                <div class="m-b-5 font-strong"><u>Oti Region</u></div><i class="ti-book widget-stat-icon"></i>
                                <div class="m-b-5 font-strong"><small> Male <span class="oti-region-male">0 </span></small></div>
                                <div class="m-b-5 font-strong"><small> Female <span class="oti-region-female">0 </span></small></div>
                                <!-- ti-bar-chart -->
                                <div><i class="fa fa-level-up m-r-5"></i><small> Today <span class="today-oti-region">0 </span></small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-warning color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong western-total">0</h2>
                                <div class="m-b-5 font-strong"><u>Western</u></div><i class="ti-book widget-stat-icon"></i>
                                <div class="m-b-5 font-strong"><small> Male <span class="western-male">0 </span></small></div>
                                <div class="m-b-5 font-strong"><small> Female <span class="western-female">0 </span></small></div>
                                <!-- fa fa-money -->
                                <div><i class="fa fa-level-up m-r-5"></i><small> Today <span class="today-wersten">0 </span></small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-danger color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong western-north-total">0</h2>
                                <div class="m-b-5 font-strong"><u> Western-North</u></div><i class="ti-book widget-stat-icon"></i>
                                <div class="m-b-5 font-strong"><small> Male <span class="western-north-male">0 </span></small></div>
                                <div class="m-b-5 font-strong"><small> Female <span class="western-north-female">0 </span></small></div>

                                <div><i class="fa fa-level-up m-r-5"></i><small> Today <span class="today-western-north">0 </span></small></div>
                            </div>
                        </div>
                    </div>
                </div>
















               <div class="col-md-6"></div>
               <hr>
               <!-- <div class="col-md-6"></div> -->

               <!-- <div class="pull-left justify-content-right align-items-right" >
                   <a href="content.php" style="text-decoration: none;"><span class="pull-left btn btn-lg btn-danger" id="messagepage" style="">PUSH CONTENT</span></a>
                   
               </div> -->
               <!-- <br><br> -->
               <div class="col-md-6"></div>
               <hr>
               <div class="col-md-6"></div>

                <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Today's Users Record</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard"><i class="la la-home font-20"></i></a>
                    </li>
                    <!-- <li class="breadcrumb-item">DataTables</li> -->
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Record of users who access the system today</div>
                    </div>
                    <div class="ibox-body today-user-data">
                        
                    </div>
                </div>
            </div>



            <!-- END PAGE CONTENT-->




<!-- 
            <div class="col-md-6"></div>
               <hr>
            <div class="col-md-6"></div>

            <div class="page-heading">
                <h1 class="page-title">Today's Contents</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard"><i class="la la-home font-20"></i></a>
                    </li>
                    
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Care247 Content sent today</div>
                    </div>
                    <div class="ibox-body messages-content">
                        
                    </div>
                </div>
            </div>
 -->






















            <!-- END PAGE CONTENT-->
            <footer class="page-footer">
                <div class="font-13"><?php echo '2020 - '. date('Y'); ?> © <b>MobileContent.Com</b> - All rights reserved.</div>
                <a class="px-4" href="http://mobilecontent.com.gh" target="_blank">MOBILE CONTENT LTD</a>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>
    </div>
</div>






<?php require_once 'includes/footer.inc.php'; ?>

    <script >

        // window.oncontextmenu = function () {
        //     console.log("Right Click Disabled");
        //     return false;
        // }

        // document.onkeydown = function(e) {
        //     if (e.ctrlKey && 
        //         (e.keyCode === 67 || 
        //          e.keyCode === 86 || 
        //          e.keyCode === 85 || 
        //          e.keyCode === 117)) {
        //         // alert('not allowed');
        //         return false;
        //         //ctrl+u Alt+c, Alt+v will also be disabled sadly.
        //     } else {
        //         return true;
        //     }
        // };
$(document).ready(function(){

    setInterval(function(){	
        getDashboardSummary();
    },1000);

        // document.getElementById("messagepage").style.fontWeight = "bold";

		
		getDailySubcriptionSummary();
		// getMessagesSummary();

    	function getDashboardSummary() 
    	{
		    $.get('controllers/get-dashboard-summary.php', function(response) 
		    {
		        $('.greater-accra-total').html(response.accra_total);
		        $('.greater-accra-male').html(response.accra_male);
                $('.greater-accra-female').html(response.accra_female);
                $('.today-greater-accra').html(response.accra_today);

		        $('.eastern-total').html(response.Eastern_total);
		        $('.eastern-male').html(response.Eastern_male);
                $('.eastern-female').html(response.Eastern_female);
                $('.today-eastern').html(response.Eastern_today);

		        $('.ashanti-total').html(response.Ashanti_total);
		        $('.ashanti-male').html(response.Ashanti_male);
                $('.ashanti-female').html(response.Ashanti_female);
                $('.today-ashanti').html(response.Ashanti_today);

		        $('.brong-ahafo-total').html(response.BrongAhafo_total);
		        $('.brong-ahafo-male').html(response.BrongAhafo_male);
                $('.brong-ahafo-female').html(response.BrongAhafo_female);
                $('.today-brong-ahafo').html(response.BrongAhafo_today);

                $('.bono-east-total').html(response.BonoEast_total);
                $('.bono-east-male').html(response.BonoEast_male);
                $('.bono-east-female').html(response.BonoEast_female);
                $('.bono-east-today').html(response.BonoEast_today);

                $('.ahafo-total').html(response.Ahafo_total);
                $('.ahafo-male').html(response.Ahafo_male);
                $('.ahafo-female').html(response.Ahafo_female);
                $('.today-ahafo').html(response.Ahafo_today);

                $('.central-total').html(response.Central_total);
                $('.central-male').html(response.Central_male);
                $('.central-female').html(response.Central_female);
                $('.today-central').html(response.Central_today);

                $('.northern-total').html(response.Northern_total);
                $('.northern-male').html(response.Northern_male);
                $('.northern-female').html(response.Northern_female);
                $('.stoday-northern').html(response.Northern_today);

                $('.savannah-total').html(response.Savannah_total);
                $('.savannah-male').html(response.Savannah_male);
                $('.savannah-female').html(response.Savannah_female);
                $('.today-savannah').html(response.Savannah_today);

                $('.north-east-total').html(response.NorthEast_total);
                $('.north-east-male').html(response.NorthEast_male);
                $('.north-east-female').html(response.NorthEast_female);
                $('.today-north-east').html(response.NorthEast_today);

                $('.upper-east-total').html(response.UpperEast_total);
                $('.upper-east-male').html(response.UpperEast_male);
                $('.upper-east-female').html(response.UpperEast_female);
                $('.today-upper-east').html(response.UpperEast_today);

                $('.upper-west-total').html(response.UpperWest_total);
                $('.upper-west-male').html(response.UpperWest_male);
                $('.upper-west-female').html(response.UpperWest_female);
                $('.today-upper-west').html(response.UpperWest_today);

                $('.volta-total').html(response.Volta_total);
                $('.volta-male').html(response.Volta_male);
                $('.volta-female').html(response.Volta_female);
                $('.today-volta').html(response.Volta_today);

                $('.oti-region-total').html(response.Oti_total);
                $('.oti-region-male').html(response.Oti_male);
                $('.oti-region-female').html(response.Oti_female);
                $('.today-oti-region').html(response.Oti_today);

                $('.western-total').html(response.Western_total);
                $('.western-male').html(response.Western_male);
                $('.western-female').html(response.Western_female);
                $('.today-wersten').html(response.Western_today);

                $('.western-north-total').html(response.WesternNorth_total);
                $('.western-north-male').html(response.WesternNorth_male);
                $('.western-north-female').html(response.WesternNorth_female);
                $('.today-western-north').html(response.WesternNorth_today);
		    });
		}








        function getDailySubcriptionSummary() 
        {
            $.get("controllers/get-dashboardDaily-summary.php", function(response) 
            {
                if (response.success) 
                {
                    var template = ``;
                    var counter = 1;
                    var anim_counter = 0.2;

                    if (response.dailySubResponse) 
                    {

                        template += `
                            <table class="table table-striped table-bordered table-hover table-responsive" id="example-table" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Msisdn</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Nname</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Polling Station</th>
                                        <th scope="col">District</th>
                                        <th scope="col">Region</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                        `;
                        response.dailySubResponse.forEach(function(item) 
                        {
                            var itemObj = JSON.stringify(item);

                            template += `
                                <tr class='wow zoomIn' data-wow-duration='0.8s' data-wow-delay='${anim_counter}s'>
                                    <th scope="row">${counter}</th>
                                    <td>${item.msisdn}</td>
                                    <td>${item.first_name}</td>
                                    <td>${item.last_name}</td>
                                    <td>${item.age}</td>
                                    <td>${item.gender}</td>
                                    <td>${item.polling_station_name}</td>
                                    <td>${item.district}</td>
                                    <td>${item.region}</td>
                                    <td>${item.updated_at}</td>
                                </tr>
                            `;

                            counter += 1;
                            anim_counter += 0.1;
                        });

                        template += `
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Msisdn</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Nname</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Polling Station</th>
                                        <th scope="col">District</th>
                                        <th scope="col">Region</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </tfoot>

                            </table>
                        `;
                    } else {
                        template += `
                             <div class='text-center jumbotron col-md-12 col-sm-6 col-lg-12'>There is no entries for today at the moment! </div>
                        `;
                    }

                    $('.today-user-data').html(template);
                    $('#example-table').DataTable();
                } else {
                    
                }
            });
        }








        function getMessagesSummary() 
        {
            $.get("controllers/get-today-content-messages.php", function(response) 
            {
                if (response.success) 
                {
                    var template = ``;
                    var counter = 1;
                    var anim_counter = 0.2;

                    if (response.data.length > 0) 
                    {
                    	template += `
                                <table class="table table-striped table-bordered table-hover table-responsive" id="message-table" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Keyword</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Sent By</th>
                                        <th scope="col">Date Stamp</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                            `;

                        response.data.forEach(function(item) 
                        {
                            var itemObj = JSON.stringify(item);

                            template += `
                                <tr class='wow zoomIn' data-wow-duration='0.8s' data-wow-delay='${anim_counter}s'>
                                    <th scope="row">${counter}</th>
                                    <td>${item.message}</td>
                                    <td>${item.keyword}</td>
                                    <td>${item.entry_level}</td>
                                    <td>${item.department}</td>
                                    <td>${item.date_stamp}</td>
                                </tr>
                            `;

                            counter += 1;
                            anim_counter += 0.1;
                        });


                        template += `
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Keyword</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Sent By</th>
                                        <th scope="col">Date Stamp</th>
                                    </tr>
                                </tfoot>

                            </table>
                        `;

                        
                    } else {
                        template += `
                             <div class='text-center jumbotron col-md-12 col-sm-6 col-lg-12'>No message was sent today! </div>
                        `;
                    }

                    $('.messages-content').html(template);
                    $('#message-table').DataTable();
                } else {
                    
                }
            });
        }
    // },10000);     
});
    </script>
</body>

</html>