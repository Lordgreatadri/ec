<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type='image/x-icon'/>
    <title>Admin | Dashboard</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./asset/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./asset/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./asset/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->

     <!-- PLUGINS STYLES-->
    <link href="./assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="./asset/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="asset/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->

    <style type="text/css">
        #messagepage {
            border: 1px solid black;
            width: 300px;
            height: 50px;
            animation: mymove 5s infinite;
        }
        @keyframes mymove {
            50% {font-weight: bold;color: green; background-color: gray;}
        }
    </style>
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        <header class="header">
            <div class="page-brand">
                <a class="link" href="dashboard.php">
                    <span class="brand">MCC
                        <span class="brand-tip">.COM</span>
                    </span>
                    <span class="brand-mini">MCC</span>
                </a>
            </div>
            <div class="flexbox flex-1">


                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                    </li>
                    <li>
                        <form class="navbar-search" action="javascript:;">
                            <div class="rel">
                                <span class="search-icon"><i class="ti-search"></i></span>
                                <input class="form-control" placeholder="Search here...">
                            </div>
                        </form>
                    </li>
                </ul>
                <!-- END TOP-LEFT TOOLBAR-->

                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li class="dropdown dropdown-inbox">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope-o"></i>
                            <span class="badge badge-primary envelope-badge"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                            
                        </ul>
                    </li>
                    <li class="dropdown dropdown-notification">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o rel"><span class="notify-signal"></span></i></a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                           
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            <img src="ec.png" />
                            <span></span><?php echo $_SESSION['username']; ?><i class="fa fa-angle-down m-l-5"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <!-- <a class="dropdown-item" href="profile.html"><i class="fa fa-user"></i>Profile</a> -->
                            <!-- <a class="dropdown-item" href="profile.html"><i class="fa fa-cog"></i>Settings</a> -->
                            <!-- <a class="dropdown-item" href="javascript:;"><i class="fa fa-support"></i>Support</a> -->
                            <li class="dropdown-divider"></li>
                            <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                        </ul>
                    </li>
                </ul>
                <!-- END TOP-RIGHT TOOLBAR-->

            </div>
        </header>
        <!-- END HEADER-->





        <!-- START SIDEBAR-->
        <nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <!-- <img src="ec.png" width="45px" /> -->
                    </div>
                    <div class="admin-info">
                        <div class="font-strong">
                            <?php //echo $_SESSION['username']; ?></div><small><?php// echo $_SESSION['department'] ." Department" ;?>
                                
                            </small></div>
                </div>


                <ul class="side-menu metismenu">
                    <li>
                        <a class="active" href="dashboard.php"><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>

                    <li class="heading">FEATURES</li>

                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                            <span class="nav-label">REGIONS</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="greater-accra.php">Greater Accra</a>
                            </li>
                            <li>
                                <a href="eastern.php">Eastern</a>
                            </li>

                            <li>
                                <a href="ashanti.php">Ashanti</a>
                            </li>
                            <li>
                                <a href="brong-ahafo.php">Brong Ahafo</a>
                            </li>
                            <li>
                                <a href="bono-east.php">Bono-East</a>
                            </li>
                            <li>
                                <a href="ahafo.php">Ahafo</a>
                            </li>
                            <li>
                                <a href="central.php">Central</a>
                            </li>
                            <li>
                                <a href="northern.php">Northern</a>
                            </li>

                            <li>
                                <a href="savannah.php">Savannah</a>
                            </li>
                            <li>
                                <a href="north-east.php">North East</a>
                            </li>
                            <li>
                                <a href="upper-east.php">Upper East</a>
                            </li>
                            <li>
                                <a href="upper-west.php">Upper West</a>
                            </li>
                            
                            <li>
                                <a href="volta.php">Volta</a>
                            </li>
                            <li>
                                <a href="oti-region.php">Oti Region</a>
                            </li>
                            <li>
                                <a href="western.php">Western</a>
                            </li>
                            <li>
                                <a href="western-north.php">Western-North</a>
                            </li>
                            
                        </ul>
                    </li>

                  
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-table"></i>
                            <span class="nav-label">EXPORT DATA</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                           <!--  <li>
                                <a href="export-raw-data.php">Raw Data</a>
                            </li> -->
                            <li>
                                <a href="export-region-districts.php">Regions & Districts</a>
                            </li>
                            <li>
                                <a href="export-ages.php">Age & Age-Groups</a>
                            </li>
                            <li>
                                <a href="export-gender.php">Gender</a>
                            </li>
                        </ul>
                    </li>

                    <li class="heading">OTHER PAGES</li>
                    
                    <li>
                        <a href="register.php"><i class="sidebar-item-icon fa fa-calendar"></i>
                            <span class="nav-label">New User</span>
                        </a>
                    </li>
                    

 
                </ul>
            </div>
        </nav>
        <!-- END SIDEBAR-->
