<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $master['title'] ?? 'Dashboard' }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon.png">
    <!-- Pignose Calender -->
    <link rel="stylesheet" href="/assets/plugins/pg-calendar/css/pignose.calendar.min.css">
    <!-- Chartist -->
    <link rel="stylesheet" href="/assets/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="/assets/plugins/chartist-plugin-tooltips/css/chartist-plugintooltip.css">
    <!-- Datatable -->
    <link rel="stylesheet" href="/assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>

    <!--=======Preloader start=======-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" strokemiterlimit="10" />
            </svg>
        </div>
    </div>
    <!--=======Preloader End=======-->

    <!--=======Main wrapper start=======-->
    <div id="main-wrapper">
        <!--=======Nav header start=======-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="/assets/images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="/assets/images/logo-compact.png"
                            alt=""></span>
                    <span class="brand-title">
                        <img src="/assets/images/logo-text.png" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--=======Nav header end=======-->

        <!--=======Header end=======-->
        <div class="header">
            <div class="header-content clearfix">
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="/assets/images/user/1.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="/profil"><i class="icon-user"></i>
                                                <span>Profile</span></a>
                                        </li>
                                        <li><a href="/logout"><i class="icon-key"></i>
                                                <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--=======Header end ti-comment-alt=======-->

        <!--=======Sidebar start=======-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">

                    <li>
                        <a href="/dashboard">
                            <i class="icon-speedometer menu-icon"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="/jobs">
                            <i class="icon-briefcase menu-icon"></i>
                            <span class="nav-text">Lowongan</span>
                        </a>
                    </li>

                    <li>
                        <a href="/categories">
                            <i class="icon-tag menu-icon"></i>
                            <span class="nav-text">Kategori</span>
                        </a>
                    </li>

                    <li>
                        <a href="/users">
                            <i class="icon-people menu-icon"></i>
                            <span class="nav-text">User</span>
                        </a>
                    </li>

                    <li>
                        <a href="/settings">
                            <i class="icon-settings menu-icon"></i>
                            <span class="nav-text">Setting</span>
                        </a>
                    </li>

                    <li>
                        <a href="/logout">
                            <i class="icon-logout menu-icon"></i>
                            <span class="nav-text">Logout</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <!--=======Sidebar end=======-->

        <!--=======Content body start=======-->
        @yield('content')
        <!--=======Content body end=======-->

        <!--=======Footer start=======-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a
                    href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
            </div>
        </div>
        <!--=======Footer end=======-->
    
    </div>
    <!--=======Main wrapper end=======-->
    
    <!--=======Scripts JS=======-->
    <script src="/assets/plugins/common/common.min.js"></script>
    <script src="/assets/js/custom.min.js"></script>
    <script src="/assets/js/settings.js"></script>
    <script src="/assets/js/gleek.js"></script>
    <script src="/assets/js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="/assets/plugins/chart.js/Chart.bundle.min.js"></script>

    <!-- Circle progress -->
    <script src="/assets/plugins/circle-progress/circle-progress.min.js"></script>

    <!-- Datamap -->
    <script src="/assets/plugins/d3v3/index.js"></script>
    <script src="/assets/plugins/topojson/topojson.min.js"></script>
    <script src="/assets/plugins/datamaps/datamaps.world.min.js"></script>

    <!-- Morrisjs -->
    <script src="/assets/plugins/raphael/raphael.min.js"></script>
    <script src="/assets/plugins/morris/morris.min.js"></script>

    <!-- Calendar -->
    <script src="/assets/plugins/moment/moment.min.js"></script>
    <script src="/assets/plugins/pg-calendar/js/pignose.calendar.min.js"></script>

    <!-- Chartist -->
    <script src="/assets/plugins/chartist/js/chartist.min.js"></script>
    <script src="/assets/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>

    <!-- Datatable -->
    <script src="/assets/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
</body>

</html>