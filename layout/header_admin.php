<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 2.3.2
Version: 1.4
Author: KeenThemes
Website: http://www.keenthemes.com/preview/?theme=metronic
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>Metronic</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="../css/css/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../css/css/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
    <link href="../css/css/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="../css/css/style-metro.css" rel="stylesheet" type="text/css"/>
    <link href="../css/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="../css/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="../css/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="../css/css/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
    <link href="../css/css/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
    <link href="../css/css/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
    <link href="../css/css/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
    <link href="../css/css/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="../css/css/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- END PAGE LEVEL PLUGIN STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="../css/css/pages/tasks.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="../icon/fontawesome-free-5.15.3-web/css/all.min.css">
    <!-- END PAGE LEVEL STYLES -->
    <link rel="shortcut icon" href="../page_admin/favicon.ico" />
    <?php
    session_start();
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="doanphp";
    $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    if($conn)
    {
        mysqli_query($conn,"SET NAMES 'utf8'");
    }
    else{
        echo "Bạn đã kết nối thất bại".mysqli_connect_error();
    }

    if(isset($_GET["dx_admin"]))
        unset($_SESSION["admin"]);

    ?>


</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
        <div class="container-fluid">
            <!-- BEGIN LOGO -->
            <a class="brand" href="../page_admin/index.php">
                <img src="../images/logo/logo1.png" width="100px" alt="">
            </a>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
                <img src="../images/img/menu-toggler.png" alt="" />
            </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <ul class="nav pull-right">
                <!-- BEGIN NOTIFICATION DROPDOWN -->
                <li class="dropdown" id="header_notification_bar">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-warning-sign"></i>
                        <span class="badge">6</span>
                    </a>
                    <ul class="dropdown-menu extended notification">
                        <li>
                            <p>You have 14 new notifications</p>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height:250px">
                                <li>
                                    <a href="#">
                                        <span class="label label-success"><i class="icon-plus"></i></span>
                                        New user registered.
                                        <span class="time">Just now</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="label label-important"><i class="icon-bolt"></i></span>
                                        Server #12 overloaded.
                                        <span class="time">15 mins</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="label label-warning"><i class="icon-bell"></i></span>
                                        Server #2 not responding.
                                        <span class="time">22 mins</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="label label-info"><i class="icon-bullhorn"></i></span>
                                        Application error.
                                        <span class="time">40 mins</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="label label-important"><i class="icon-bolt"></i></span>
                                        Database overloaded 68%.
                                        <span class="time">2 hrs</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="label label-important"><i class="icon-bolt"></i></span>
                                        2 user IP blocked.
                                        <span class="time">5 hrs</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="label label-warning"><i class="icon-bell"></i></span>
                                        Storage Server #4 not responding.
                                        <span class="time">45 mins</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="label label-info"><i class="icon-bullhorn"></i></span>
                                        System Error.
                                        <span class="time">55 mins</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="label label-important"><i class="icon-bolt"></i></span>
                                        Database overloaded 68%.
                                        <span class="time">2 hrs</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="external">
                            <a href="#">See all notifications <i class="m-icon-swapright"></i></a>
                        </li>
                    </ul>
                </li>
                <!-- END NOTIFICATION DROPDOWN -->
                <!-- BEGIN INBOX DROPDOWN -->
                <li class="dropdown" id="header_inbox_bar">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-envelope"></i>
                        <span class="badge">5</span>
                    </a>
                    <ul class="dropdown-menu extended inbox">
                        <li>
                            <p>You have 12 new messages</p>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height:250px">
                                <li>
                                    <a href="../page/inbox.php?a=view">
                                        <span class="photo"><img src="../images/img/avatar2.jpg" alt="" /></span>
                                        <span class="subject">
										<span class="from">Lisa Wong</span>
										<span class="time">Just Now</span>
										</span>
                                        <span class="message">
										Vivamus sed auctor nibh congue nibh. auctor nibh
										auctor nibh...
										</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../page/inbox.php?a=view">
                                        <span class="photo"><img src="../images/img/avatar3.jpg" alt="" /></span>
                                        <span class="subject">
										<span class="from">Richard Doe</span>
										<span class="time">16 mins</span>
										</span>
                                        <span class="message">
										Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh
										auctor nibh...
										</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../page/inbox.php?a=view">
                                        <span class="photo"><img src="../images/img/avatar1.jpg" alt="" /></span>
                                        <span class="subject">
										<span class="from"></span>
										<span class="time">2 hrs</span>
										</span>
                                        <span class="message">
										Vivamus sed nibh auctor nibh congue nibh. auctor nibh
										auctor nibh...
										</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../page/inbox.php?a=view">
                                        <span class="photo"><img src="../img/avatar2.jpg" alt="" /></span>
                                        <span class="subject">
										<span class="from">Lisa Wong</span>
										<span class="time">40 mins</span>
										</span>
                                        <span class="message">
										Vivamus sed auctor 40% nibh congue nibh...
										</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../page/inbox.php?a=view">
                                        <span class="photo"><img src="../img/avatar3.jpg" alt="" /></span>
                                        <span class="subject">
										<span class="from">Richard Doe</span>
										<span class="time">46 mins</span>
										</span>
                                        <span class="message">
										Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh
										auctor nibh...
										</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="external">
                            <a href="../page/inbox.php">See all messages <i class="m-icon-swapright"></i></a>
                        </li>
                    </ul>
                </li>
                <!-- END INBOX DROPDOWN -->
                <!-- BEGIN TODO DROPDOWN -->
                <li class="dropdown" id="header_task_bar">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-tasks"></i>
                        <span class="badge">5</span>
                    </a>
                    <ul class="dropdown-menu extended tasks">
                        <li>
                            <p>You have 12 pending tasks</p>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller"  style="height:250px">
                                <li>
                                    <a href="#">
										<span class="task">
										<span class="desc">New release v1.2</span>
										<span class="percent">30%</span>
										</span>
                                        <span class="progress progress-success ">
										<span style="width: 30%;" class="bar"></span>
										</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="task">
										<span class="desc">Application deployment</span>
										<span class="percent">65%</span>
										</span>
                                        <span class="progress progress-danger progress-striped active">
										<span style="width: 65%;" class="bar"></span>
										</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="task">
										<span class="desc">Mobile app release</span>
										<span class="percent">98%</span>
										</span>
                                        <span class="progress progress-success">
										<span style="width: 98%;" class="bar"></span>
										</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="task">
										<span class="desc">Database migration</span>
										<span class="percent">10%</span>
										</span>
                                        <span class="progress progress-warning progress-striped">
										<span style="width: 10%;" class="bar"></span>
										</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="task">
										<span class="desc">Web server upgrade</span>
										<span class="percent">58%</span>
										</span>
                                        <span class="progress progress-info">
										<span style="width: 58%;" class="bar"></span>
										</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="task">
										<span class="desc">Mobile development</span>
										<span class="percent">85%</span>
										</span>
                                        <span class="progress progress-success">
										<span style="width: 85%;" class="bar"></span>
										</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="task">
										<span class="desc">New UI release</span>
										<span class="percent">18%</span>
										</span>
                                        <span class="progress progress-important">
										<span style="width: 18%;" class="bar"></span>
										</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="external">
                            <a href="#">See all tasks <i class="m-icon-swapright"></i></a>
                        </li>
                    </ul>
                </li>
                <!-- END TODO DROPDOWN -->
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <li class="dropdown user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" width="25px" height="25px" src="../images/img/hinhsen.jpg" />
                        <span class="username">Hello <?php echo $_SESSION["admin"];?></span>
                        <i class="icon-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="../page_admin/nhanvienadmin.php"><i class="icon-user"></i>Nhân viên</a></li>

                        <li><a href="<?php echo $_SERVER["PHP_SELF"];?>?dx_admin=0"><i class="icon-key"></i> Log Out</a></li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
                <!-- END USER LOGIN DROPDOWN -->
            </ul>
            <!-- END TOP NAVIGATION MENU -->
        </div>
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar nav-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu">
            <li>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler hidden-phone"></div>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            </li>
            <li>
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <form class="sidebar-search">
                    <div class="input-box">
                        <a href="javascript:;" class="remove"></a>
                        <input type="text" placeholder="Search..." />
                        <input type="button" class="submit" value=" " />
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li class="start active">
                <a href="../page_admin/index.php">
                    <i class="icon-home"></i>
                    <span class="title">Tổng quan</span>
                    <span class="selected"></span>
                </a>
            </li>
            <!--
            <li >
                <a href="javascript:;">
                <i class="icon-cogs"></i>
                <span class="title">Layouts</span>
                <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li >
                        <a href="layout_language_bar.php">
                        <span class="badge badge-roundless badge-important">new</span>Language Switch Bar</a>
                    </li>
                    <li >
                        <a href="layout_horizontal_sidebar_menu.php">
                        Horizontal & Sidebar Menu</a>
                    </li>
                    <li >
                        <a href="layout_horizontal_menu1.php">
                        Horizontal Menu 1</a>
                    </li>
                    <li >
                        <a href="layout_horizontal_menu2.php">
                        Horizontal Menu 2</a>
                    </li>
                    <li >
                        <a href="layout_promo.php">
                        Promo Page</a>
                    </li>
                    <li >
                        <a href="layout_email.php">
                        Email Templates</a>
                    </li>
                    <li >
                        <a href="layout_ajax.php">
                        Content Loading via Ajax</a>
                    </li>
                    <li >
                        <a href="layout_sidebar_closed.php">
                        Sidebar Closed Page</a>
                    </li>
                    <li >
                        <a href="layout_blank_page.php">
                        Blank Page</a>
                    </li>
                    <li >
                        <a href="layout_boxed_page.php">
                        Boxed Page</a>
                    </li>
                    <li >
                        <a href="layout_boxed_not_responsive.php">
                        Non-Responsive Boxed Layout</a>
                    </li>
                </ul>
            </li>
            -->
            <!-- BEGIN FRONT DEMO --
            <li class="tooltips" data-placement="right" data-original-title="Frontend&nbsp;Theme&nbsp;For&nbsp;Metronic&nbsp;Admin">
                <a href="http://keenthemes.com/preview/index.php?theme=metronic_frontend" target="_blank">
                <i class="icon-gift"></i>
                <span class="title">Frontend Theme</span>
                </a>
            </li>
            END FRONT DEMO --
            <li >
                <a href="javascript:;">
                <i class="icon-bookmark-empty"></i>
                <span class="title">UI Features</span>
                <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li >
                        <a href="ui_general.php">
                        General</a>
                    </li>
                    <li >
                        <a href="ui_buttons.php">
                        Buttons</a>
                    </li>
                    <li >
                        <a href="ui_modals.php">
                        Enhanced Modals</a>
                    </li>
                    <li >
                        <a href="ui_tabs_accordions.php">
                        Tabs & Accordions</a>
                    </li>
                    <li >
                        <a href="ui_jqueryui.php">
                        jQuery UI Components</a>
                    </li>
                    <li >
                        <a href="ui_sliders.php">
                        Sliders</a>
                    </li>
                    <li >
                        <a href="ui_tiles.php">
                        Tiles</a>
                    </li>
                    <li >
                        <a href="ui_typography.php">
                        Typography</a>
                    </li>
                    <li >
                        <a href="ui_tree.php">
                        Tree View</a>
                    </li>
                    <li >
                        <a href="ui_nestable.php">
                        Nestable List</a>
                    </li>
                </ul>
            </li>
            <li >
                <a href="javascript:;">
                <i class="icon-table"></i>
                <span class="title">Form Stuff</span>
                <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li >
                        <a href="form_layout.php">
                        Form Layouts</a>
                    </li>
                    <li >
                        <a href="form_samples.php">
                        Advance Form Samples</a>
                    </li>
                    <li >
                        <a href="form_component.php">
                        Form Components</a>
                    </li>
                    <li >
                        <a href="form_editable.php">
                        <span class="badge badge-roundless badge-warning">new</span>Form X-editable</a>
                    </li>
                    <li >
                        <a href="form_wizard.php">
                        Form Wizard</a>
                    </li>
                    <li >
                        <a href="form_validation.php">
                        Form Validation</a>
                    </li>
                    <li >
                        <a href="form_image_crop.php">
                        <span class="badge badge-roundless badge-important">new</span>Image Cropping</a>
                    </li>
                    <li >
                        <a href="form_fileupload.php">
                        Multiple File Upload</a>
                    </li>
                    <li >
                        <a href="form_dropzone.php">
                        Dropzone File Upload</a>
                    </li>
                </ul>
            </li>
            <li >
                <a href="javascript:;">
                <i class="icon-briefcase"></i>
                <span class="title">Pages</span>
                <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li >
                        <a href="page_timeline.php">
                        <i class="icon-time"></i>
                        <span class="badge badge-info">4</span>Timeline</a>
                    </li>
                    <li >
                        <a href="page_coming_soon.php">
                        <i class="icon-cogs"></i>
                        Coming Soon</a>
                    </li>
                    <li >
                        <a href="page_blog.php">
                        <i class="icon-comments"></i>
                        Blog</a>
                    </li>
                    <li >
                        <a href="page_blog_item.php">
                        <i class="icon-font"></i>
                        Blog Post</a>
                    </li>
                    <li >
                        <a href="page_news.php">
                        <i class="icon-coffee"></i>
                        <span class="badge badge-success">9</span>News</a>
                    </li>
                    <li >
                        <a href="page_news_item.php">
                        <i class="icon-bell"></i>
                        News View</a>
                    </li>
                    <li >
                        <a href="page_about.php">
                        <i class="icon-group"></i>
                        About Us</a>
                    </li>
                    <li >
                        <a href="page_contact.php">
                        <i class="icon-envelope-alt"></i>
                        Contact Us</a>
                    </li>
                    <li >
                        <a href="page_calendar.php">
                        <i class="icon-calendar"></i>
                        <span class="badge badge-important">14</span>Calendar</a>
                    </li>
                </ul>
            </li>
            <li >
                <a href="javascript:;">
                <i class="icon-gift"></i>
                <span class="title">Extra</span>
                <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li >
                        <a href="extra_profile.php">
                        User Profile</a>
                    </li>
                    <li >
                        <a href="extra_lock.php">
                        Lock Screen</a>
                    </li>
                    <li >
                        <a href="extra_faq.php">
                        FAQ</a>
                    </li>
                    <li >
                        <a href="inbox.php">
                        <span class="badge badge-important">4</span>Inbox</a>
                    </li>
                    <li >
                        <a href="extra_search.php">
                        Search Results</a>
                    </li>
                    <li >
                        <a href="extra_invoice.php">
                        Invoice</a>
                    </li>
                    <li >
                        <a href="extra_pricing_table.php">
                        Pricing Tables</a>
                    </li>
                    <li >
                        <a href="extra_image_manager.php">
                        Image Manager</a>
                    </li>
                    <li >
                        <a href="extra_404_option1.php">
                        404 Page Option 1</a>
                    </li>
                    <li >
                        <a href="extra_404_option2.php">
                        404 Page Option 2</a>
                    </li>
                    <li >
                        <a href="extra_404_option3.php">
                        404 Page Option 3</a>
                    </li>
                    <li >
                        <a href="extra_500_option1.php">
                        500 Page Option 1</a>
                    </li>
                    <li >
                        <a href="extra_500_option2.php">
                        500 Page Option 2</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="active" href="javascript:;">
                <i class="icon-sitemap"></i>
                <span class="title">3 Level Menu</span>
                <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="javascript:;">
                        Item 1
                        <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="#">Sample Link 1</a></li>
                            <li><a href="#">Sample Link 2</a></li>
                            <li><a href="#">Sample Link 3</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                        Item 1
                        <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="#">Sample Link 1</a></li>
                            <li><a href="#">Sample Link 1</a></li>
                            <li><a href="#">Sample Link 1</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                        Item 3
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                <i class="icon-folder-open"></i>
                <span class="title">4 Level Menu</span>
                <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="javascript:;">
                        <i class="icon-cogs"></i>
                        Item 1
                        <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="javascript:;">
                                <i class="icon-user"></i>
                                Sample Link 1
                                <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="#"><i class="icon-remove"></i> Sample Link 1</a></li>
                                    <li><a href="#"><i class="icon-pencil"></i> Sample Link 1</a></li>
                                    <li><a href="#"><i class="icon-edit"></i> Sample Link 1</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="icon-user"></i>  Sample Link 1</a></li>
                            <li><a href="#"><i class="icon-external-link"></i>  Sample Link 2</a></li>
                            <li><a href="#"><i class="icon-bell"></i>  Sample Link 3</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                        <i class="icon-globe"></i>
                        Item 2
                        <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="#"><i class="icon-user"></i>  Sample Link 1</a></li>
                            <li><a href="#"><i class="icon-external-link"></i>  Sample Link 1</a></li>
                            <li><a href="#"><i class="icon-bell"></i>  Sample Link 1</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                        <i class="icon-folder-open"></i>
                        Item 3
                        </a>
                    </li>
                </ul>
            </li>-->

            <li >
                <a href="javascript:;">
                    <i class="icon-th"></i>
                    <span class="title">Quản lý</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li >
                        <a href="../page/table_basic.php">
                            Basic Tables</a>
                    </li>
                    <li >
                        <a href="../page_admin/dondatadmin.php">
                            Đơn hàng</a>
                    </li>
                    <li >
                        <a href="../page_admin/table_managed.php">
                            Khách hàng</a>
                    </li>
                    <li >
                        <a href="../page_admin/table_editable.php">
                            Sản phẩm</a>
                    </li>
                    <li >
                        <a href="../page/table_advanced.php">
                            Advanced Tables</a>
                    </li>
                </ul>
            </li>
            <li >
                <a href="javascript:;">
                    <i class="icon-file-text"></i>
                    <span class="title">Portlets</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li >
                        <a href="../page/portlet_general.php">
                            General Portlets</a>
                    </li>
                    <li >
                        <a href="../page/portlet_draggable.php">
                            Draggable Portlets</a>
                    </li>
                </ul>
            </li>
            <li >
                <a href="javascript:;">
                    <i class="icon-map-marker"></i>
                    <span class="title">Maps</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li >
                        <a href="../page/maps_google.php">
                            Google Maps</a>
                    </li>
                    <li >
                        <a href="../page/maps_vector.php">
                            Vector Maps</a>
                    </li>
                </ul>
            </li>
            <li class="last ">
                <a href="../page/charts.php">
                    <i class="icon-bar-chart"></i>
                    <span class="title">Visual Charts</span>
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>