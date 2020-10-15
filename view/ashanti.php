<!-- greater-accra.php -->
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
                <h3 class="page-title">RECORDS FOR ASHANTI REGION</h3>
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
                        <div class="ibox-title">Regional Records</div>
                    </div>
                    <div class="ibox-body all-records-accra">
                        
                    </div>
                </div>


               
            </div>
            <!-- END PAGE CONTENT-->








            <!-- START UNSUBSRIPTION PAGE CONTENT-->
            <div class="page-heading">
                <h3 class="page-title">RECORDS BY DISTRICTS WITHIN ASHANTI REGION</h3>
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
                        <div class="ibox-title">All Districts Within Ashanti</div>
                    </div>
                    <div class="ibox-body districts-records">
                        
                    </div>
                </div>


               
            </div>
            <!-- END PAGE CONTENT-->
            <footer class="page-footer">
                <div class="font-13"><?php echo '2020 - '. date('Y'); ?> © <b>MobileContent.Com</b> - All rights reserved.</div>
                <a class="px-4" href="http://mobilecontent.com.gh" target="_blank">MOBILE CONTENT LTD</a>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>
    </div>




 






<?php require_once 'includes/footer.inc.php'; ?>


<script >
    // window.oncontextmenu = function () {
 //        console.log("Right Click Disabled");
 //        return false;
 //    }

    document.onkeydown = function(e) {
        if (e.ctrlKey && 
            (e.keyCode === 67 || 
             e.keyCode === 86 || 
             e.keyCode === 85 || 
             e.keyCode === 117)) {
            // alert('not allowed');
            return false;
            //ctrl+u Alt+c, Alt+v will also be disabled sadly.
        } else {
            return true;
        }
    };


    $(document).ready(function(){
        // setInterval(function()
        // {

            getRegionalSubcriptionSummary();
            getDistrictSummary()


            function getRegionalSubcriptionSummary() 
            {
                $.get("controllers/get-ashanti-record.php", function(response) 
                {
                    if (response.success) {
                        var template = ``;
                        var counter = 1;
                        var anim_counter = 0.2;

                        if (response.region_data.length > 0) 
                        {

                            template += `
                                <table class="table table-striped table-bordered table-hover table-responsive" id="example-table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Client Name</th>
                                            <th scope="col">Msisdn</th>
                                            <th scope="col">Voter Id</th>
                                            <th scope="col">Age</th>
                                            <th scope="col">Gender</th>                                         
                                            <th scope="col">Polling Station</th>
                                            <th scope="col">District</th>
                                            <th scope="col">region</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                            `;
                            response.region_data.forEach(function(item) 
                            {
                                var itemObj = JSON.stringify(item);

                                template += `
                                    <tr class='wow zoomIn' data-wow-duration='0.8s' data-wow-delay='${anim_counter}s'>
                                        <th scope="row">${counter}</th>
                                        <td>${item.full_name}</td>
                                        <td>${item.msisdn}</td>
                                        <td>${item.voter_id}</td>
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
                                            <th scope="col">Client Name</th>
                                            <th scope="col">Msisdn</th>
                                            <th scope="col">Voter Id</th>
                                            <th scope="col">Age</th>
                                            <th scope="col">Gender</th>                                         
                                            <th scope="col">Polling Station</th>
                                            <th scope="col">District</th>
                                            <th scope="col">region</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </tfoot>

                                </table>
                            `;
                        } else {
                            template += `
                                 <div class='text-center jumbotron col-md-12 col-sm-6 col-lg-12'>There is no subscription for today! </div>
                            `;
                        }

                        $('.all-records-accra').html(template);
                        $('#example-table').DataTable();
                    } else {
                        
                    }
                });
            }








            function getDistrictSummary() 
            {
                $.get("controllers/get-ashanti-record.php", function(response) 
                {
                    if (response.success) 
                    {
                        var template = ``;
                        var counter = 1;
                        var anim_counter = 0.2;

                        if (response.district_data.length > 0) 
                        {
                            template += `
                                    <table class="table table-striped table-bordered table-hover table-responsive" id="district-table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">District</th>
                                            <th scope="col">Msisdn</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                `;

                            response.district_data.forEach(function(item) 
                            {
                                var itemObj = JSON.stringify(item);

                                template += `
                                    <tr class='wow zoomIn' data-wow-duration='0.8s' data-wow-delay='${anim_counter}s'>
                                        <th scope="row">${counter}</th>
                                        <td>${item.district}</td>
                                        <td>${item.msisdn}</td>
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
                                            <th scope="col">District</th>
                                            <th scope="col">msisdn</th>                                         
                                        </tr>
                                    </tfoot>

                                </table>
                            `;

                            
                        } else {
                            template += `
                                 <div class='text-center jumbotron col-md-12 col-sm-6 col-lg-12'>No District Record Available Now! </div>
                            `;
                        }

                        $('.districts-records').html(template);
                        $('#district-table').DataTable();
                    } else {
                        
                    }
                });
            }
        // },25000);    
});
</script>