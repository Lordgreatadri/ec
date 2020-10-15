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
                <h1 class="page-title">GENDER DATA EXPORT</h1>
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
                        <div class="ibox-title">Export data by preferred criteria or click filter to export data</div>
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
                                        <input class="form-control form-control-sm input  rawcriteria" name="rawcriteria">                              
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Criteria (Gender)</label>
                                        <!-- <input class="" name="criteria" required> -->
                                        <select class="form-control form-control-sm input regiongender" name="regiongender" required>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>                              
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


                           <!--  <hr>
                            <p class="text-center">Select the age group with date range to fillter</p> -->


                            <!-- <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Start date</label>
                                        <input class="form-control form-control-sm date-input ussdstartDate" name="ussdstartDate">                              
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>End date</label>
                                        <input class="form-control form-control-sm date-input ussdendDate" name="ussdendDate">                              
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Criteria (<b>Age-Group</b>)</label>
                                       
                                        <select class="form-control form-control-sm input  ussdcriteria" name="ussdcriteria" required>
                                            <option value="18-20">18-20</option>
                                            <option value="21-30">21-30</option>
                                            <option value="31-40">31-40</option>
                                            <option value="41-50">41-50</option>
                                            <option value="51-60">51-60</option>
                                            <option value="61-70">61-70</option>
                                            <option value="71-80">71-80</option>
                                            <option value="81-90">81-90</option>
                                            <option value="91-100">91-100</option>
                                        </select>                                 
                                    </div>
                                </div>
                                <div >
                                    <div class="form-group">
                                        <br>
                                        <button class="btn btn-md btn-success" onclick="filterAndDownloadVotesussd()">Filter</button>


                                    </div>
                                </div>
                            </div> -->



                            <br><hr>
                            <p class="text-center">Filter for a given districts accross the nation. Enter the district you wish to filter for</p>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Start date</label>
                                        <input class="form-control form-control-sm date-input districtstartDate" name="districtstartDate">                              
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>End date</label>
                                        <input class="form-control form-control-sm date-input districtendDate" name="districtendDate">                              
                                    </div>
                                </div>

                                 <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Criteria (District)</label>
                                        <input class="form-control form-control-sm input districtcriteria" name="criteria" required>                              
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Criteria (Gender)</label>
                                        <select class="form-control form-control-sm input districtgender" name="districtgender" required>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>                              
                                    </div>
                                </div>
                                <!-- col-md-4 -->
                                <div class="">
                                    <div class="form-group">
                                        <br>
                                        <button class="btn btn-md btn-success" onclick="filterAndDownloadVotesonline()">Filter</button>                           
                                    </div>
                                </div>
                            </div>


                            <br><hr>
                            

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

    function filterAndDownloadVotes() {
        var startDate = jQuery(".start-date").val().trim(),
            endDate = jQuery(".end-date").val().trim(),
            rawcriteria = jQuery(".rawcriteria").val().trim(),
            regiongender = jQuery(".regiongender").val().trim();
            //filterKey = jQuery(".dataTables_filter input.form-control-sm").val().trim();

        if (rawcriteria != null || rawcriteria != undefined) {
            window.location.href = "controllers/filter-and-download-regiongender.php?startDate="+startDate+"&endDate="+endDate+"&rawcriteria="+rawcriteria+"&regiongender="+regiongender;
        } else {
            alert("No Data Available")
        }
    }
 

    function filterAndDownloadVotesussd() {
        var ussdstartDate = jQuery(".ussdstartDate").val().trim(),
            ussdendDate = jQuery(".ussdendDate").val().trim(),
            ussdcriteria = jQuery(".ussdcriteria").val().trim();
            //filterKey = jQuery(".dataTables_filter input.form-control-sm").val().trim();

        if (ussdcriteria != null || ussdcriteria != undefined) {
            window.location.href = "controllers/filter-and-download-ussdvotes.php?ussdstartDate="+ussdstartDate+"&ussdendDate="+ussdendDate+"&ussdcriteria="+ussdcriteria;
        } else {
            alert("No Data Available")
        }
    }




    function filterAndDownloadVotesonline() {
        var districtstartDate = jQuery(".districtstartDate").val().trim(),
            districtendDate = jQuery(".districtendDate").val().trim(),
            districtcriteria = jQuery(".districtcriteria").val().trim(),
            districtgender     = jQuery(".districtgender").val().trim();
            // filterKey = jQuery(".dataTables_filter input.form-control-sm").val().trim();

        if(districtcriteria != null || districtcriteria != undefined) 
        {
            window.location.href = "controllers/filter-and-download-districtgender.php?districtstartDate="+districtstartDate+"&districtendDate="+districtendDate+"&districtcriteria="+districtcriteria+"&districtgender"+districtgender;
        } else {
            alert("No Data Available")
        }
    }

</script>