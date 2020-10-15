<!-- export-raw-data.php -->
<?php 
session_start();

if (!isset($_SESSION['UserLoggedIn']) &&  $_SESSION['UserLoggedIn'] == "") 
{
    echo "<script>window.location.href='index.php';</script>";
}


require_once 'includes/header.inc.php';
?>










<!-- END SIDEBAR-->
        <div class="content-wrapper">



            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">REGIONAL AND DISTRICT DATA EXPORT</h1>
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
                        <div class="ibox-title">Filter for a given districts accross the nation. Enter the district you wish to filter for</div>
                    </div>
                    <div class="ibox-body prg-subs">
                        <form id="data-form" class="row data-form">
                            <div class="col-md-2"></div>
                            <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Start date</label>
                                        <input class="form-control form-control-sm date-input start-date" name="startDate">                              
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>End date</label>
                                        <input class="form-control form-control-sm date-input end-date" name="endDate">                              
                                    </div>
                                </div>
                                
                                 <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Criteria (<b>Region</b>)</label>
                                        <input class="form-control form-control-sm input  regions" name="regions" required>                              
                                    </div>
                                </div>


                                 <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Criteria (<b>District</b>)</label>
                                        <input class="form-control form-control-sm input  districts" name="districts" required>                           
                                    </div>
                                </div>

                                <!-- col-md-4 -->
                                <div class="">
                                    <div class="form-group">
                                        <br>
                                        <button class="btn btn-md btn-success" onclick="filterAndDownloadVotes()">Filter</button>                           
                                    </div>
                                </div>
                            </div>







                            <hr>
                            <p class="text-center">Counts of Districts within a Chosen Regions only. Enter region to fillter</p>


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Start date</label>
                                        <input class="form-control form-control-sm date-input counttartDate" name="counttartDate">                              
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>End date</label>
                                        <input class="form-control form-control-sm date-input  countendDate" name="ussdendDate">                              
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Criteria (<b>Region</b>)</label>
                                        <input class="form-control form-control-sm input  countregions" name="countregions" required>                              
                                    </div>
                                </div>
                                <div >
                                    <div class="form-group">
                                        <br>
                                        <button class="btn btn-md btn-success" onclick="filterAndDownloadVotesussd()">Filter</button>                           
                                    </div>
                                </div>
                            </div>




                           <!--  <br><hr>
                            <p class="text-center">Filter for a given districts accross the nation. Enter the district you wish to filter for</p>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Start date</label>
                                        <input class="form-control form-control-sm date-input  onlinestartDate" name="onlinestartDate">                              
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>End date</label>
                                        <input class="form-control form-control-sm date-input  onlineendDate" name="onlineendDate">                              
                                    </div>
                                </div>

                                 <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Criteria (District)</label>
                                        <input class="form-control form-control-sm input  onlinecriteria" name="criteria" required>                              
                                    </div>
                                </div>
                               
                                <div class="">
                                    <div class="form-group">
                                        <br>
                                        <button class="btn btn-md btn-success" onclick="filterAndDownloadVotesonline()">Filter</button>                           
                                    </div>
                                </div>
                            </div>


                            <br><hr> -->
                            

                        </div>
                        <div class="col-md-2"></div>
                            
                        </form>
                    </div>
                </div>


               
            </div>
            <!-- END PAGE CONTENT-->








            <!-- START UNSUBSRIPTION PAGE CONTENT-->
            <!-- <div class="page-heading">
                <h1 class="page-title">PRG</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard"><i class="la la-home font-20"></i></a>
                    </li>

                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Inactive Subscribers</div>
                    </div>
                    <div class="ibox-body prg-unsubs">
                        
                    </div>
                </div>


               
            </div> -->
            <!-- END PAGE CONTENT-->
            <footer class="page-footer">
                <div class="font-13"><?php echo '2020 - '. date('Y'); ?> © <b>MobileContent.Com</b> - All rights reserved.</div>
                <a class="px-4" href="http://mobilecontent.com.gh" target="_blank">MOBILE CONTENT LTD</a>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>
    </div>















<?php require_once 'includes/footer.inc.php'; ?>


<script>
    // getRecentVotes();

    $('.date-input').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });

    function filterAndDownloadVotes() 
    {
        var startDate = jQuery(".start-date").val().trim(),
            endDate = jQuery(".end-date").val().trim(),
            districts = jQuery(".districts").val().trim(),
            regions = jQuery(".regions").val().trim();
            //filterKey = jQuery(".dataTables_filter input.form-control-sm").val().trim();

        if (districts != "" && regions != "") {
            window.location.href = "controllers/filter-and-download-regiondistrictdata.php?startDate="+startDate+"&endDate="+endDate+"&districts="+districts+"&regions="+regions;
        } else 
        {
            alert("Region and district parameters are required")
        }
    }
 

    function filterAndDownloadVotesussd() {
        var counttartDate = jQuery(".counttartDate").val().trim(),
            countendDate = jQuery(".countendDate").val().trim(),
            countregions = jQuery(".countregions").val().trim();
            //filterKey = jQuery(".dataTables_filter input.form-control-sm").val().trim();

        if (countregions != "")
        {
            window.location.href = "controllers/filter-and-download-regioncount.php?counttartDate="+counttartDate+"&countendDate="+countendDate+"&countregions="+countregions;
        } else {
            alert("Regions parameter is required!");
        }
    }




    function filterAndDownloadVotesonline() {
        var onlinestartDate = jQuery(".onlinestartDate").val().trim(),
            onlineendDate = jQuery(".onlineendDate").val().trim(),
            onlinecriteria = jQuery(".onlinecriteria").val().trim();
            // filterKey = jQuery(".dataTables_filter input.form-control-sm").val().trim();

        if(onlinecriteria != null || onlinecriteria != undefined) 
        {
            window.location.href = "controllers/filter-and-download-onlinevotes.php?onlinestartDate="+onlinestartDate+"&onlineendDate="+onlineendDate+"&onlinecriteria="+onlinecriteria;
        } else {
            alert("No Data Available")
        }
    }



    function filterAndDownloadAppVotes() {
        var appstartDate = jQuery(".appstartDate").val().trim(),
            appendDate = jQuery(".appendDate").val().trim(),
            appcriteria = jQuery(".appcriteria").val().trim();
            //filterKey = jQuery(".dataTables_filter input.form-control-sm").val().trim();

        if (appcriteria != null || appcriteria != undefined) {
            window.location.href = "controllers/filter-and-download-appvotes.php?appstartDate="+appstartDate+"&appendDate="+appendDate+"&appcriteria="+appcriteria;
        } else {
            alert("No Data Available")
        }
    }
</script>