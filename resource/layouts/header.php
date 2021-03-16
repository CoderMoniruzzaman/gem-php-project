<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEMS</title>
    <link rel="stylesheet" href="public/dashboard_assets/css/bootstrap.css">
    <link rel="stylesheet" href="public/dashboard_assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/dashboard_assets/css/animate.css">
    <link rel="stylesheet" href="public/dashboard_assets/css/slick.css">
    <link rel="stylesheet" href="public/dashboard_assets/css/themify-icons.css">
    <link rel="stylesheet" href="public/dashboard_assets/css/metisMenu.css">
    <link rel="stylesheet" href="public/dashboard_assets/css/slicknav.min.css">
    <link rel="stylesheet" href="public/dashboard_assets/css/responsive.css">
    <link rel="stylesheet" href="public/dashboard_assets/css/sass/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    <div class="page-container">
        <?php
        require_once 'sidebar.php';
        ?>
        <div class="main-content">

            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix ">
                        <div class="header-left">
                            <div class="nav-btn pull-left">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <div class="search-box pull-left">
                                <form action="#">
                                    <input type="text" name="search" placeholder="Search here" required>
                                    <i class="ti-search"></i>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                            <li class="dropdown">
                                <div class="profile">
                                    <img src="public/dashboard_assets/images/admin.png" alt="">
                                    <span class="user-name dropdown-toggle" data-toggle="dropdown">
                                        <?php  echo $_SESSION['name']; ?><i class="ti-angle-down pl-1"></i></span>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Message</a>
                                        <a class="dropdown-item" href="#">Profile Settings</a>
                                        <a class="dropdown-item" href="resource/auth/logout.php">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <!-- header area end -->

            <!-- main content area inner end -->
            <div class="main-content-inner mt-30 pt-3">