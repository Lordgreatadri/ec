<?php 
session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Admin | Calendar</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./asset/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./asset/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./asset/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="./asset/vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
    <link href="./asset/vendors/fullcalendar/dist/fullcalendar.print.min.css" rel="stylesheet" media="print" />
    <!-- THEME STYLES-->
    <link href="asset/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
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
                            <img src="./asset/img/admin-avatar.png" />
                            <span></span><?php echo $_SESSION['username']; ?><i class="fa fa-angle-down m-l-5"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <!-- <a class="dropdown-item" href="profile.html"><i class="fa fa-user"></i>Profile</a> -->
                            <!-- <a class="dropdown-item" href="profile.html"><i class="fa fa-cog"></i>Settings</a> -->
                            <a class="dropdown-item" href="javascript:;"><i class="fa fa-support"></i>Support</a>
                            <li class="dropdown-divider"></li>
                            <a class="dropdown-item" href="logou.phpt"><i class="fa fa-power-off"></i>Logout</a>
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
                        <img src="./asset/img/admin-avatar.png" width="45px" />
                    </div>
                    <div class="admin-info">
                        <div class="font-strong"><?php echo $_SESSION['username']; ?></div><small><?php echo $_SESSION['department'] ." Department" ;?></small></div>
                </div>



                <ul class="side-menu metismenu">
                    <li>
                        <a href="dashboard.php"><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                    <li class="heading">FEATURES</li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                            <span class="nav-label">CONTENTS</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="content.php"> Push Content </a>
                            </li>
                            <li>
                                <a href="panels.php">Content Panel</a>
                            </li>

                        </ul>
                    </li>
                    
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-table"></i>
                            <span class="nav-label">Subscription</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="sub-prg.php">PRG</a>
                            </li>
                            <li>
                                <a href="sub-srh.php">SRH</a>
                            </li>
                            <li>
                                <a href="sub-lsn.php">LSN</a>
                            </li>
                            <li>
                                <a href="sub-nb.php">NB</a>
                            </li>
                        </ul>
                    </li>
                    
                    
                    <li class="heading">CONTENTS PAGES</li>
                    
                    <li>
                        <a class="active" href="calendar.php"><i class="sidebar-item-icon fa fa-calendar"></i>
                            <span class="nav-label">Calendar</span>
                        </a>
                    </li>

                    
                    
                </ul>
            </div>
        </nav>
        <!-- END SIDEBAR-->









        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Calendar</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard"><i class="la la-home font-20"></i></a>
                    </li>
                    <!-- <li class="breadcrumb-item">Calendar</li> -->
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="row">
                    <!-- <div class="col-md-3"> -->
                        <!-- <div id="external-events"> -->
                            <!-- <h5 class="m-b-10">Draggable Events</h5>
                            <div class="ex-event bg-green" data-class="bg-green">My Event 1</div>
                            <div class="ex-event bg-blue" data-class="bg-blue">My Event 2</div>
                            <div class="ex-event bg-orange" data-class="bg-orange">My Event 3</div>
                            <div class="ex-event bg-red" data-class="bg-red">My Event 4</div>
                            <div class="ex-event bg-silver" data-class="bg-silver">My Event 5</div>
                            <p class="m-l-10 m-t-20">
                                <label>
                                    <input class="m-r-5" id="drop-remove" type="checkbox">remove after drop</label>
                            </p> -->
                        <!-- </div> -->
                    <!-- </div> -->
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-body">
                                <div id="calendar"></div>
                                <!-- New Event Dialog-->
                                <div class="modal fade" id="new-event-modal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <form class="modal-content form-horizontal" action="javascript:;">
                                            <div class="modal-header bg-silver-100">
                                                <h4 class="modal-title">New Event</h4>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Title:</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" id="new-event-title" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row" id="date_1">
                                                    <label class="col-sm-2 col-form-label">Start:</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group datepicker date">
                                                            <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                                                            <input class="form-control" id="new-event-start" type="text" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">End:</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group datepicker date">
                                                            <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                                                            <input class="form-control" id="new-event-end" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Color:</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" id="new-event-color">
                                                            <option value="bg-blue">Blue</option>
                                                            <option value="bg-red">Red</option>
                                                            <option value="bg-green">Green</option>
                                                            <option value="bg-orange">Orange</option>
                                                            <option value="bg-silver">Silver</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-10 ml-sm-auto">
                                                        <label class="ui-checkbox ui-checkbox-info">
                                                            <input id="new-event-allDay" type="checkbox">
                                                            <span class="input-span"></span>All Day</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
                                                <button class="btn btn-info" id="addEventButton" type="submit">Add event</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- End New Event Dialog-->




                                <!-- Event Detail Dialog-->
                                <div class="modal fade" id="event-modal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <form class="modal-content form-horizontal" action="javascript:;">
                                            <div class="modal-header bg-silver-100">
                                                <h4 class="modal-title">Edit Event</h4>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Title:</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" id="event-title" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row" id="date_1">
                                                    <label class="col-sm-2 col-form-label">Start:</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group datepicker date">
                                                            <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                                                            <input class="form-control" id="event-start" type="text" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">End:</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group datepicker date">
                                                            <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                                                            <input class="form-control" id="event-end" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Color:</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" id="event-color">
                                                            <option value="bg-blue">Blue</option>
                                                            <option value="bg-red">Red</option>
                                                            <option value="bg-green">Green</option>
                                                            <option value="bg-orange">Orange</option>
                                                            <option value="bg-silver">Silver</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-10 ml-sm-auto">
                                                        <label class="ui-checkbox ui-checkbox-info">
                                                            <input id="event-allDay" type="checkbox">
                                                            <span class="input-span"></span>All Day</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-info" id="editEventButton" type="submit">Save</button>
                                                <button class="btn btn-danger" id="deleteEventButton" type="button" data-dismiss="modal">Delete</button>
                                                <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- End Event Detail Dialog-->


                            </div>
                        </div>
                    </div>
                </div>






                
            </div>
            <!-- END PAGE CONTENT-->
            <footer class="page-footer">
                <div class="font-13"> 
                    <?php echo '2020 - '. date('Y'); ?> © <b>MobileContent.Com</b> - All rights reserved.
                </div>
                <a class="px-4" href="http://mobilecontent.com.gh" target="_blank">MOBILE CONTENT LTD</a>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>
    </div>
    
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->
    <script src="./asset/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="./asset/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="./asset/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="./asset/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
    <script src="./asset/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="./asset/vendors/moment/min/moment.min.js" type="text/javascript"></script>
    <script src="./asset/vendors/fullcalendar/dist/fullcalendar.min.js" type="text/javascript"></script>
    <script src="./asset/vendors/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="asset/js/app.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="./asset/js/scripts/calendar-demo.js" type="text/javascript"></script>

    <script type="text/javascript">
        window.oncontextmenu = function () {
            console.log("Right Click Disabled");
            return false;
        }

        document.onkeydown = function(e) {
            if (e.ctrlKey && 
                (e.keyCode === 67 || 
                 e.keyCode === 86 || 
                 e.keyCode === 85 || 
                 e.keyCode === 117)) {
                alert('not allowed');
                return false;
                //ctrl+u Alt+c, Alt+v will also be disabled sadly.
            } else {
                return true;
            }
        };
    </script>
</body>

</html>