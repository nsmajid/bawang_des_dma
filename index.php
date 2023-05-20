<?php
include "config/config.php";
include "config/helper.php";

$session = session_get($config);

if ($session) {
    header('location:module.php?module=home');
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | Oprekan Module</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Oprekan Module" name="description" />
    <meta content="nsmajid" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="bg-primary bg-pattern">
    <div class="home-btn d-none d-sm-block">
        <a href="#" data-toggle="modal" data-target=".bs-example-modal-center"><i class="mdi mdi-alert-octagon h2 text-white"></i></a>
    </div>
    <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Login Info!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Administrator => admin:123123</p>
                   
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <a href="#" class="logo"><img src="assets/images/logo-light.png" height="24" alt="logo"></a>
                        <h5 class="font-size-16 text-white-50 mb-4">Oprekan Module</h5>
                    </div>
                </div>
            </div>
            <!-- end row -->



            <div class="row justify-content-center">
                <div class="col-xl-5 col-sm-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="p-2">
                                <h5 class="mb-5 text-center">Sign in to continue to Oprekan Module.</h5>
                                <?php session_flash("auth"); ?>
                                <form class="form-horizontal" action="auth.php" method="POST">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-custom mb-4">
                                                <input type="text" class="form-control" id="username" name="username" required>
                                                <label for="username">User Name</label>
                                            </div>

                                            <div class="form-group form-group-custom mb-4">
                                                <input type="password" class="form-control" id="userpassword" name="password" required>
                                                <label for="userpassword">Password</label>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                        <label class="custom-control-label" for="customControlInline">Remember me</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="text-md-right mt-3 mt-md-0">
                                                        <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Log In</button>
                                            </div>
                                            <div class="mt-4 text-center">
                                                <a href="auth-register.html" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i> Create an account</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    <!-- end Account pages -->

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>