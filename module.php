<?php

include "config/config.php";
include "config/helper.php";
include "config/library.php";

$session = session_get($config);

// print_r($session);

if (!$session) {
    header('location:index.php');
}
$module = $_GET['module'] ? $_GET['module'] : NULL;
$action = $_GET['action'] ? $_GET['action'] : NULL;

$module_name = isset($_GET['module']) ? str_replace('_', ' ', ucwords($_GET['module'])) : 'Module';
$action_name = isset($_GET['action']) ? str_replace('_', ' ', ucwords($_GET['action'])) : NULL;

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> <?= $module_name ?> | Oprekan Module </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Oprekan Module FIST Punya" name="description" />
    <meta content="nsmajid" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
</head>

<body data-topbar="colored" data-layout="horizontal" data-layout-size="boxed">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="container-fluid">
                    <div class="float-right">




                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                                <span class="d-none d-sm-inline-block ml-1"><?= $session['username'] ?></span>
                                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">

                                <a class="dropdown-item" href="logout.php"><i class="mdi mdi-logout font-size-16 align-middle mr-1"></i> Logout</a>
                            </div>
                        </div>
                    </div>

                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="module.php?module=home" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm-dark.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-dark.png" alt="" height="20">
                            </span>
                        </a>

                        <a href="module.php?module=home" class="logo logo-light">
                            <!-- <span class="logo-sm">
                                <img src="assets/images/logo-sm-light.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-light.png" alt="" height="20">
                            </span> -->
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm mr-2 font-size-16 d-lg-none header-item waves-effect waves-light" data-toggle="collapse" data-target="#topnav-menu-content">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <div class="topnav">
                        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                            <div class="collapse navbar-collapse" id="topnav-menu-content">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="module.php?module=home">
                                            Home
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="module.php?module=komoditas">
                                            Komoditas
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="module.php?module=provinsi">
                                            Provinsi
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="module.php?module=rekap_harga_komoditas">
                                            Rekap Harga Komoditas
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Peramalan <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-mega-menu-xl px-2" aria-labelledby="topnav-uielement">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="dropdown-item-text font-weight-semibold font-size-16">
                                                        <div class="d-inline-block icons-sm mr-1"><i class="uim uim-box"></i></div> Peramalan
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-5">
                                                            <a href="module.php?module=peramalan_des" class="dropdown-item">DES <div class="badge badge-info">Double Exponential Smoothing </div> </a>
                                                            <a href="module.php?module=peramalan_dma" class="dropdown-item">DMA <div class="badge badge-info">Double Moving Average </div></a>
                                                            <!-- <a href="#" class="dropdown-item">Grafik Perbandingan</a> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </li>




                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>


        </header>
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">

                <!-- Page-Title -->
                <div class="page-title-box">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h4 class="page-title mb-1"><?= $module_name ?></h4>
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="?module=home">Peramalan Komoditas Bawang</a></li>

                                    <?php
                                    if ($action_name) {
                                    ?>
                                        <li class="breadcrumb-item"><a href="?module=<?= $module ?>"> <?= $module_name ?></a></li>
                                        <li class="breadcrumb-item active"><?= $action_name ?></li>

                                    <?php
                                    } else {
                                    ?>
                                        <li class="breadcrumb-item active"><?= $module_name ?></li>
                                    <?php
                                    }

                                    ?>
                                </ol>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="page-content-wrapper">
                    <div class="container-fluid">
                        <?php session_flash("notif"); ?>

                        <div class="row">
                            <?php include "content.php"; ?>


                        </div>
                        <!-- end row -->

                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end page-content-wrapper -->
            </div>
            <!-- End Page-content -->


            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            2020 © Xoric.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-right d-none d-sm-block">
                                Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->


    <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>

    <!-- Required datatable js -->
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/libs/jszip/jszip.min.js"></script>
    <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="assets/js/pages/datatables.init.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>