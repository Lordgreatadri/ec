<?php 
session_start();

if (!isset($_SESSION['UserLoggedIn']) &&  $_SESSION['UserLoggedIn'] == "") 
{
    echo "<script>window.location.href='index.php';</script>";
}


require_once 'includes/header.inc.php';
?>









<div class="content-wrapper">
            <!-- START PAGE CONTENT-->

            <div class="page-heading">
                <h1 class="page-title text-center">New System User Record Entry</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                <!--     <li class="breadcrumb-item">Care247 Content </li> -->
                </ol>
            </div>

               <!--  echo '<div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="width=100px;">'.$_GET['description_response'].' <span aria-hidden="true">&times</span></button>                      
                    </div>'; -->

            <div class="page-content fade-in-up">
                <div class="row justify-content-center align-items-center">
                    <div class="col-sm-6 col-md-6 col-lg-6 off-set-6">
                        <div class="ibox">
                            <form class="content-form">
                            <div class="ibox-head">
                                <div class="ibox-title">Fill in the required fields and submit
                                    
                                </div>
                            </div>
                            <div class="ibox-body">
                                
                                    <div class="form-group">
                                        <label class="form-control-label">Select Company</label>
                                        <select class="form-control company" id="company" name="company" required >
                                            <optgroup label="User's Company">
                                                <option value="">Select Company</option>
                                                <option value="MCC">MCC</option>
                                                <option value="EC">EC</option>
                                            </optgroup>                                            
                                       </select>
                                    </div>

                                    

                                    <div class="form-group" id="username">
                                        <label class="form-control-label">Username</label>
                                        <input class="form-control username" type="email" id="username" name="username" placeholder="">
                                    </div>

                                    <div class="form-group" id="Password">
                                        <label class="form-control-label">Password</label>
                                        <input class="form-control password" type="password" id="Password" name="Password" placeholder="">
                                    </div>

                                    <div class="form-group" id="cfpassword">
                                        <label class="form-control-label">Confirm Password</label>
                                        <input class="form-control cfpassword" type="password" id="cfpassword" name="cfpassword" placeholder="">
                                    </div>

                                    <div class="">
                                        <input type="submit" name="submit" class="btn btn-success btn-md" value="Send Message">
                                        <input type="reset" name="" class="btn btn-dm btn-warning">
                                    </div>
                            </div>
                            <div class="ibox-footer">
                                
                            </div>
                            </form>
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
</div>


    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->





<?php require_once 'includes/footer.inc.php'; ?>


<script >
    //window.oncontextmenu = function () {
        // console.log("Right Click Disabled");
        // return false;
   // }

    // document.onkeydown = function(e) {
    //     if (e.ctrlKey && 
    //         (e.keyCode === 67 || 
    //          e.keyCode === 86 || 
    //          e.keyCode === 85 || 
    //          e.keyCode === 117)) {
    //         alert('not allowed');
    //         return false;
    //         //ctrl+u Alt+c, Alt+v will also be disabled sadly.
    //     } else {
    //         return true;
    //     }
    // };


        $(document).ready(function(){

            $('.content-form').submit(function(event) 
            {
                event.preventDefault();
                var company    = $('.company').val();
                var username   = $('.username').val();
                var password   = $('.password').val();
                var cfpassword = $('.cfpassword').val();
                

                if (company == "") 
                {
                    alert("Please select this user's company name");
                    return false;
                }else if (username == "") 
                {                   
                    alert("Please enter user's email or username");
                    return false;
                }else if (password == "") 
                {
                    alert("Please enter user password");
                    return false;
                }else if (cfpassword == "")
                {
                    alert("Please confirm user password");
                    return false;
                }
                if(password === cfpassword) 
                {
                    $.ajax({
                        url: "controllers/user_signup.php",
                        type: "POST",
                        data: {
                            company:company,
                            username:username,
                            password:password,
                            cfpassword:cfpassword
                        },
                        beforeSend: function() {
                            // $("#testModal").modal('hide');
                             alert("Sending data....");
                            $('.content-form').trigger('reset');
                        },
                        success:function(response){
                            // if (response.success == true) 
                            // {
                                alert(response.message);
                            // }
                            // else
                            // {
                            //     alert(response.message);
                            // }
                        },
                        error:function(response){
                            if (response.success == false) 
                            {
                                alert(response.message);
                            }
                            else
                            {
                                alert(response.message);
                            }
                        }
                    });
                }else
                {
                    alert("Please user passwords do not match");
                    return false;//
                }
            });
        });

</script>