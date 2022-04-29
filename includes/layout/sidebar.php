<?php 
    /** Absolute path to the WordPress directory. */
    if ( ! defined( 'ROOT_PATH' ) ) {
        define( 'ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . '/ccclms/' );
    }
    include_once(ROOT_PATH . '/config.php');
    if (!isset($_SESSION['user']))
    {
        header("Location: login.php");
        die();
    } 
    
?>

    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.html"><img class="main-logo" src="img/logo/CCC-logo.png" alt="" /></a>
                <strong><a href="index.html"><img src="img/logo/CCC-logo.png" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">

                        <!-- Dashboard Section start -->
                        <li class="active">
                            <a title="Landing Page" href="dashboard.php" aria-expanded="false">
                                <span class="fa fa-tachometer icon-wrap" aria-hidden="true"></span>
                                <span class="mini-click-non">Dashboard</span>
                            </a>
                        </li>
                        <!-- Dashboard Section end -->
                        
                        <!-- Transaction Section start -->
                        <li>
                            <a class="has-arrow" href="malbox.html" aria-expanded="false">
                                <i class="fa fa-exchange icon-wrap" aria-hidden="true"></i>
                                <span class="mini-click-non">Transaction</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Inbox" href="available-books.php"><span class="mini-sub-pro">Available Books</span></a></li>
                              <!--  <li><a title="View Mail" href="pending-reservation.php"><span class="mini-sub-pro">Pending</span></a></li> -->
                                <li><a title="View Mail" href="to-release.php"><span class="mini-sub-pro">To Release</span></a></li>
                                <li><a title="View Mail" href="borrowed.php"><span class="mini-sub-pro">Borrowed</span></a></li>
                                <li><a title="View Mail" href="returned.php"><span class="mini-sub-pro">Returned</span></a></li>
                            </ul>
                        </li>
                        <!-- Library Assets Section end -->

                        <!-- Library Assets Section start -->
                        <li>
                            <a class="has-arrow" href="all-courses.html" aria-expanded="false">
                                <i class="fa fa-book icon-wrap" aria-hidden="true"></i>
                                <span class="mini-click-non">Library Resources</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Library" href="books.php"><span class="mini-sub-pro">Books</span></a></li>
                                <li><a title="Add Library" href="audio-visual.php"><span class="mini-sub-pro">Audio-Visual Materials</span></a></li>
                                <li><a title="All Library" href="manuscript.php"><span class="mini-sub-pro">Manuscript/Narrative</span></a></li>
                                <li><a title="Add Library" href="gov-publication.php"><span class="mini-sub-pro">Government Publications</span></a></li>
                                <li><a title="All Library" href="thesis.php"><span class="mini-sub-pro">Thesis and Dissertation</span></a></li>
                                <li><a title="Add Library" href="journals.php"><span class="mini-sub-pro">Journals</span></a></li>
                            </ul>
                        </li>
                        <!-- Library Assets Section end -->

                        <!-- Users Section start -->
                        <?php if($_SESSION['user']['user_type'] == 'Admin') { ?>
                        <li>
                            <a class="has-arrow" href="all-students.html" aria-expanded="false">
                                <i class="fa fa-user icon-wrap" aria-hidden="true"></i>
                                <span class="mini-click-non">Users</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Students" href="users.php"><span class="mini-sub-pro">All Users</span></a></li>
                                <li><a title="Add Students" href="add-user.php"><span class="mini-sub-pro">Add User</span></a></li>
                            </ul>
                        </li>
                        <?php } ?>
                        <!-- Users Section end -->
                        
                        <li class="active">
                            <a title="Landing Page" href="calendar.php" aria-expanded="false">
                                <i class="fa fa-calendar icon-wrap" aria-hidden="true"></i>
                                <span class="mini-click-non">Calendar</span>
                            </a>
                        </li>


                        <?php if($_SESSION['user']['user_type'] == 'Admin') { ?>
                        <li>
                            <a class="has-arrow" href="" aria-expanded="false">
                                <i class="fa fa-file icon-wrap" aria-hidden="true"></i>
                                <span class="mini-click-non">Reports</span>
                            </a>
                            <ul class="submenu-angle chart-mini-nb-dp" aria-expanded="false">
                                <li><a title="Bar Charts" href="bar-charts.html"><span class="mini-sub-pro">Bar Charts</span></a></li>
                                <li><a title="Line Charts" href="line-charts.html"><span class="mini-sub-pro">Line Charts</span></a></li>
                                <li><a title="Area Charts" href="area-charts.html"><span class="mini-sub-pro">Area Charts</span></a></li>
                                <li><a title="Rounded Charts" href="rounded-chart.html"><span class="mini-sub-pro">Rounded Charts</span></a></li>
                                <li><a title="C3 Charts" href="c3.html"><span class="mini-sub-pro">C3 Charts</span></a></li>
                                <li><a title="Sparkline Charts" href="sparkline.html"><span class="mini-sub-pro">Sparkline Charts</span></a></li>
                                <li><a title="Peity Charts" href="peity.html"><span class="mini-sub-pro">Peity Charts</span></a></li>
                            </ul>
                        </li>
                        <?php } ?>

                        <?php if($_SESSION['user']['user_type'] == 'Admin') { ?>
                        <li class="active">
                            <a title="Landing Page" href="#" aria-expanded="false">
                                <i class="fa fa-cogs icon-wrap" aria-hidden="true"></i>
                                <span class="mini-click-non">Settings</span>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
													<i class="educate-icon educate-nav"></i>
												</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-bell" aria-hidden="true"></i><span class="indicator-nt"></span></a>
                                                    <div role="menu" class="notification-author dropdown-menu animated zoomIn">
                                                        <div class="notification-single-top">
                                                            <h1>Notifications</h1>
                                                        </div>
                                                        <ul class="notification-menu">
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="educate-icon educate-checked edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Advanda Cro</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="fa fa-cloud edu-cloud-computing-down" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Sulaiman din</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="fa fa-eraser edu-shield" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="fa fa-line-chart edu-analytics-arrow" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <div class="notification-view">
                                                            <a href="#">View All Notification</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
															<img src="img/profile/<?php echo $_SESSION['user']['profile_img']; ?>" alt="" />
															<span class="admin-name"><?php echo $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name']; ?></span>
															<i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
														</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="#"><span class="edu-icon edu-home-admin author-log-ic"></span>My Account</a>
                                                        </li>
                                                        <li><a href="logout.php"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <!-- -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a data-toggle="collapse" data-target="#Charts" href="#">Dashboard <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="dashboard.php">Dashboard v.1</a></li>
                                                <li><a href="#">Dashboard v.2</a></li>
                                                <li><a href="#">Dashboard v.3</a></li>
                                                <li><a href="#">Analytics</a></li>
                                                <li><a href="#">Widgets</a></li>
                                            </ul>
                                        </li>
                                        
                                        <li><a data-toggle="collapse" data-target="#demoevent" href="#">Users <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demoevent" class="collapse dropdown-header-top">
                                                <li><a href="all-professors.html">All Users</a></li>
                                                </li><a href="add-professor.html">Add User</a></li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demolibra" href="#">Library Resources <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demolibra" class="collapse dropdown-header-top">
                                                <li><a href="books.php">Books</a>
                                                </li>
                                                <li><a href="audio-visual.php">Audio-Visual Materials</a>
                                                </li>
                                                <li><a href="manuscript.php">Manuscript/Narrative</a>
                                                </li>
                                                <li><a href="gov-publication.php">Government Publications</a>
                                                </li>
                                                <li><a href="thesis.php">Thesis and Dissertation</a>
                                                </li>
                                                <li><a href="journals.php">Journals</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demodepart" href="#">Transactions <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demodepart" class="collapse dropdown-header-top">
                                                <li><a href="available-books.php">Available</a></li>
                                               <!-- <li><a href="pending-reservation.php">Pending</a></li> -->
                                                <li><a href="to-release.php">To Release</a></li>
                                                <li><a href="borrowed.php">Borrowed</a></li>
                                                <li><a href="returned.php">Returned</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="calendar.php">Calendar</a></li>
                                        <li><a data-toggle="collapse" data-target="#Tablesmob" href="#">Reports <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Tablesmob" class="collapse dropdown-header-top">
                                                <li><a href="static-table.html">Static Table</a>
                                                </li>
                                                <li><a href="data-table.html">Data Table</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a data-toggle="collapse" data-target="#Pagemob" href="#">Settings <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
        </div>
        