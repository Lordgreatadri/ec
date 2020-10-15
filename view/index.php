<?php
session_start();
if (isset($_SESSION['UserLoggedIn']) &&  $_SESSION['UserLoggedIn'] == true) 
{
	echo "<script>window.location.href='dashboard.php';</script>";
}



 include 'includes/header.php'; ?>
<style type="text/css">
	/* CSS used here will be applied after bootstrap.css */

body { 
 background: url('404.jpg') no-repeat center center fixed; /*'http://www.bootdey.com/img/Content/bg_element.jpg'*/
 -webkit-background-size: cover;
 -moz-background-size: cover;
 -o-background-size: cover;
 background-size: cover;
}

.panel-default {
 opacity: 0.9;
 margin-top:30px;
}
.form-group.last {
 margin-bottom:0px;
}
</style> 


<div class="container bootstrap snippet  wow zoomIn "  data-wow-duration='0.5s' data-wow-delay='0.3s'>
    <div class="row">
    	<div class="col-md-4 col-lg-4"></div>
        <!-- <div class="col-md-4 col-lg-4"></div> -->
        <div class="col-md-4 col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading"> 
                	<p class="text-center">
                		<!-- <strong>User Login</strong> -->


<!--                         <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close message" data-dismiss="alert" aria-label="Close" style="width=100px;">  <span aria-hidden="true">&times</span></button>                      
                        </div> -->
                        <div id="alert-danger" class="alert alert-danger alert-dismissible" role="alert">
                            <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="width=100px;"> -->
                                <!-- <strong>Error!</strong> Wrong email and password combination. -->
                                <!-- <span aria-hidden="true">&times</span> -->
                            <!-- </button>     -->
                        </div>
                        <div id="alert-success" class="alert alert-success">
                            <!-- <strong>Success!</strong> Signed in Successfully. -->
                        </div>
					</p>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal login-form" role="form">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control username" id="inputEmail3" placeholder="Email" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control password" id="inputPassword3" placeholder="Password" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <!-- <div class="checkbox">
                                    <label class="">
                                        <input type="checkbox" class="">Remember me</label>
                                </div> -->
                            </div>
                        </div>
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-warning  col-lg-12">Sign in</button>
                                <!-- <button type="reset" class="btn btn-default btn-sm">Reset</button> -->
                            </div>
                        </div>
                    </form>
                </div>
                <!-- <div class="panel-footer">Not Registered? <a href="#" class="">Register here</a> -->
                </div>
            </div>

            <div class="col-md-4 col-lg-4"></div>

        </div>
    </div>
</div>
<script src="assets/js/jquery.min/jquery-3.4.1.min.js"></script>
<?php include 'includes/footer.php';?>
<script >
    document.getElementById('alert-danger').style.display = 'none';
    document.getElementById('alert-success').style.display = 'none';
	$(document).ready(function()
	{
        document.getElementById('alert-danger').style.display = 'none';
        document.getElementById('alert-success').style.display = 'none';
		// alert('hello');
		$(".login-form").submit(function(event) 
		{
			event.preventDefault();
			$.ajax({
				url: "controllers/login.php",
				type: "POST",
				data: {
					username:$(".username").val(),
					password :$(".password").val(),
				},
				// console.log(data);
				success:function(response)
				{
					if(response.success == true) 
                    {
                        alert(response.message);
                        $('#alert-success').html(response.message);
                        document.querySelector('#alert-success').style.display = 'block';
                        $('#alert-success').fadeIn(1500).delay(2500).fadeOut(1500);
                        
                        setTimeout(() => {
                            window.location.href = 'dashboard.php';
                        }, 2000);
                    }else
                    {
                        alert(response.message);
                        $('#alert-danger').html(response.message);
                        document.querySelector('#alert-danger').style.display = 'block';
                        $('#alert-danger').fadeIn(1500).delay(2500).fadeOut(1500);
                        //$('.message').html(response.message);
                    }
				}
			});
		});
	});
</script>


