<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>





<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inventory Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <!-- Font Awesome CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
    </link>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->

    <!-- preloader area end -->

    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.php"><img src="backgrou.jpg" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li>
                                <a href="index.php" aria-expanded="true"><i
                                        class="ti-dashboard"></i><span>Home</span></a>

                            </li>



                            <li>
                                <a href="table.php" aria-expanded="true"><i class="fa fa-table"></i>
                                    <span>Item Records</span></a>

                            </li>
                            <li class="active">
                                <a href="empinfo.php" aria-expanded="true">
                                    <i class="ma"></i><span>Employee Info.</span>

                                </a>
                            </li>
                            <li>
                                <a href="report.php" aria-expanded="true">
                                    <i class="fa fa-table"></i><span>Report</span>

                                </a>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->



        <!-- main content area start -->

        <!-- header area start -->
        <div class="header-area">
            <div class="row align-items-center">
                <!-- nav and search button -->
                <div class="col-md-6 col-sm-8 clearfix">
                    <div class="nav-btn pull-left">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="breadcrumbs-area clearfix">
                        <h4 class="page-title pull-left">Dashboard</h4>
                        <ul class="breadcrumbs pull-left">
                            <li><a href="index.php">Home</a></li>
                            <li><span>Employee Info.</span></li>
                        </ul>
                    </div>

                </div>

                <!-- profile info & task notification-->
                <div class="col-sm-6 clearfix">


                    <div class="user-profile pull-right">
                        <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                        <h4 class="user-name dropdown-toggle" data-toggle="dropdown">
                            <?php echo $_SESSION['username']; ?> <i class="fa fa-angle-down"></i>
                        </h4>
                        <div class="dropdown-menu">

                            <a class="dropdown-item" href="index.php?logout='1'">Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- header area end -->
        <!-- page title area start -->

        <!-- page title area end -->
        <div class="student-profile py-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card shadow-sm">
                            <?php
                            $conn = new mysqli("localhost", "root", "", "inventorymanagement");
                            $sql = "SELECT * FROM manager";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc()


                                ?>
                            <div class="card-header bg-transparent text-center">
                                <img class="profile_img" src="manager.png" alt="manager dp">
                                <h3>
                                    <?php echo $row["first_name"] ?>
                                    <?php echo $row["last_name"] ?>
                                </h3>
                            </div>
                            <div class="card-body">


                                <p class="mb-0"><strong class="pr-1">Manager ID:</strong>
                                    <?php echo $row["m_id"] ?>
                                </p>
                                <p class="mb-0"><strong class="pr-1">Email-id:</strong>
                                    <?php echo $row["email"] ?>
                                </p>
                                <p class="mb-0"><strong class="pr-1">Phone:</strong>
                                    <?php echo $row["mobile"] ?>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-transparent border-0">
                        <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Employee Information</h3>
                    </div>
                    <div class="card-body pt-0">
                        <table class="table table-bordered">
                            <tr>
                                <th width="20%">UserName</th>
                                <th width="20%">First Name </th>
                                <th width="20%">Email</th>
                                <th width="20%">Phone</th>



                            </tr>
                            <?php

                            $conn = new mysqli("localhost", "root", "", "inventorymanagement");
                            $sql = "SELECT * FROM register";
                            $result = $conn->query($sql);
                            $count = 0;
                            if ($result->num_rows > 0) {

                                while ($row = $result->fetch_assoc()) {
                                    $count = $count + 1;


                                    ?>
                                    <tr>

                                        <td>
                                            <?php echo $row["username"] ?>
                                        </td>
                                        <td>
                                            <?php echo $row["first_name"] ?>
                                        </td>
                                        <td>
                                            <?php echo $row["email"] ?>
                                        </td>
                                        <td>
                                            <?php echo $row["mobile"] ?>
                                        </td>

                                    </tr>
                                    <?php

                                }
                            }

                            ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- page container area end -->
    <!-- offset area start -->

    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
    <link rel="stylesheet" href="css/manager.css">
</body>

</html>