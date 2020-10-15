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
                <h1 class="page-title">REGIONAL DATA EXPORT</h1>
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
                                        <input class="form-control form-control-sm date-input regionstartdate" name="regionstartdate">                              
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>End date</label>
                                        <input class="form-control form-control-sm date-input regionenddate" name="regionenddate">                              
                                    </div>
                                </div>
                                
                                 <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Criteria (Optional <b>Region</b>)</label>
                                        <input class="form-control form-control-sm input  rawcriteria" name="rawcriteria">                              
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Criteria (<b>Age-Group</b>)</label>
                                        <!-- <input class="form-control form-control-sm input  ussdcriteria" name="ussdcriteria" required> -->
                                        <select class="form-control form-control-sm input  regionage" name="regionage" required>
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

                                <!-- col-md-4 -->
                                <div class="">
                                    <div class="form-group">
                                        <br>
                                        <button class="btn btn-md btn-success" onclick="filterAndDownloadVotes()">Filter</button>                           
                                    </div>
                                </div>
                            </div>


                            <hr>
                            <p class="text-center">Select the age group with date range to fillter</p>


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Start date</label>
                                        <input class="form-control form-control-sm date-input agestartDate" name="agestartDate">                              
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>End date</label>
                                        <input class="form-control form-control-sm date-input ageendDate" name="ageendDate">              
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Criteria (<b>Age-Group</b>)</label>
                                        <!-- <input class="form-control form-control-sm input  ussdcriteria" name="ussdcriteria" required> -->
                                        <select class="form-control form-control-sm input  agecriteria" name="agecriteria" required>
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
                            </div>




                            <br><hr>
                            <p class="text-center">Filter for a given districts accross the nation. Enter the district you wish to filter for</p>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Start date</label>
                                        <input class="form-control form-control-sm date-input  districtstartDate" name="districtstartDate">                              
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>End date</label>
                                        <input class="form-control form-control-sm date-input  districtendDate" name="districtendDate">                              
                                    </div>
                                </div>

                                 <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Criteria (<b>District</b>)</label>
                                        <input class="form-control form-control-sm input  districtcriteria" name="districtcriteria" required>                              
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Criteria (Age-Group)</label>
                                        <!-- <input class="" name="criteria" required> -->
                                        <select class="form-control form-control-sm input districtages" name="districtages" required>
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
        var startDate   = jQuery(".regionstartdate").val().trim(),
            endDate     = jQuery(".regionenddate").val().trim(),
            rawcriteria = jQuery(".rawcriteria").val().trim(),
            regionage   = jQuery(".regionage").val().trim();
            //filterKey = jQuery(".dataTables_filter input.form-control-sm").val().trim();

        if (rawcriteria != null || rawcriteria != undefined) {
            window.location.href = "controllers/filter-and-download-regionagegroups.php?startDate="+startDate+"&endDate="+endDate+"&rawcriteria="+rawcriteria+"&regionage="+regionage;
        } else {
            alert("No Data Available")
        }
    }
 

    function filterAndDownloadVotesussd() {
        var agestartDate = jQuery(".agestartDate").val().trim(),
            ageendDate = jQuery(".ageendDate").val().trim(),
            agecriteria = jQuery(".agecriteria").val().trim();
            //filterKey = jQuery(".dataTables_filter input.form-control-sm").val().trim();

        if (agecriteria != null || agecriteria != undefined) {
            window.location.href = "controllers/filter-and-download-agedates.php?agestartDate="+agestartDate+"&ageendDate="+ageendDate+"&agecriteria="+agecriteria;
        } else {
            alert("No Data Available")
        }
    }




    function filterAndDownloadVotesonline() {
        var districtstartDate = jQuery(".districtstartDate").val().trim(),
            districtendDate = jQuery(".districtendDate").val().trim(),
            districtcriteria = jQuery(".districtcriteria").val().trim(),
            districtages     = jQuery(".districtages").val().trim();
            // filterKey = jQuery(".dataTables_filter input.form-control-sm").val().trim();

        if(districtcriteria != null || districtcriteria != undefined) 
        {
            window.location.href = "controllers/filter-and-download-districages.php?districtstartDate="+districtstartDate+"&districtendDate="+districtendDate+"&districtcriteria="+districtcriteria+"&districtages="+districtages;
        } else {
            alert("No Data Available")
        }
    }



    // function filterAndDownloadAppVotes() {
    //     var appstartDate = jQuery(".appstartDate").val().trim(),
    //         appendDate = jQuery(".appendDate").val().trim(),
    //         appcriteria = jQuery(".appcriteria").val().trim();
    //         //filterKey = jQuery(".dataTables_filter input.form-control-sm").val().trim();

    //     if (appcriteria != null || appcriteria != undefined) {
    //         window.location.href = "controllers/filter-and-download-appvotes.php?appstartDate="+appstartDate+"&appendDate="+appendDate+"&appcriteria="+appcriteria;
    //     } else {
    //         alert("No Data Available")
    //     }
    // }
</script>