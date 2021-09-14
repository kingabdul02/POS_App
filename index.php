<?php require_once("includes/session.php") ?>
<?php require_once("includes/db_connection.php") ?>
<?php require_once("includes/functions.php") ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Golden Grill</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="./assets/frontend/cover/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/frontend/cover/css/bootstrap-submenu.css">
    <link rel="stylesheet" type="text/css" href="./assets/frontend/cover/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/frontend/cover/css/slider.css">
    <link rel="stylesheet" type="text/css" href="./assets/frontend/cover/css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="./assets/frontend/cover/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/frontend/cover/fonts/linearicons/style.css">
    <link rel="stylesheet" type="text/css" href="./assets/frontend/cover/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" type="text/css" href="./assets/frontend/cover/css/bootstrap-select.min.css">
    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="./assets/frontend/cover/css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="./assets/frontend/cover/css/colors/default.css">
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="./assets/frontend/img/favicon.ico" type="image/x-icon" >
    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./assets/frontend/cover/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script type="text/javascript" src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./assets/frontend/cover/js/ie-emulation-modes-warning.js"></script>

  </head>
  <body>
    <!-- Preloader -->
    <div class="page_loader"><img src="./assets/frontend/cover/img/loader.gif" alt="Loader"></div>
    <!-- Top Header start -->
    <header class="top-header hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
                    <div class="list-inline">
                        <a href="tel:08066726254"><i class="fa fa-phone"></i>Need Support? 08066789669</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-5 col-xs-12">
                    <ul class="social-list clearfix pull-right">
                        <li>
                            <a href="#" class="facebook-c">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="twitter-c">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <?php
                          if(!isset($_SESSION['username'])){?>
                        <li>
                            <a href="login.php" class="sign-in"><i class="fa fa-user"></i> Log In</a>
                        </li>
                      <?php }else { ?>
                      <li>
                          <a href="logout.php" class="sign-in"><i class="fa fa-user"></i> Logout</a>
                      </li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- Top Header end -->

    <!-- Banner start -->
    <div class="banner">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item banner-max-height active">
                    <img src="./assets/frontend/cover/img/my1.jpg" alt="banner-slider-1">
                    <div class="carousel-caption banner-slider-inner">
                        <div class="banner-content">
                            <h1 data-animation="animated fadeInDown delay-05s"><span>WELCOME TO GOLDEN Grill</span></h1>
                            <a href="login.php" class="btn button-md button-theme" data-animation="animated fadeInUp delay-15s">Login</a>
                        </div>
                    </div>
                </div>
                <div class="item banner-max-height">
                    <img src="./assets/frontend/cover/img/my2.jpg" alt="banner-slider-2">
                    <div class="carousel-caption banner-slider-inner">
                        <div class="banner-content">
                            <h1 data-animation="animated fadeInDown delay-1s"><span>WELCOME TO Golden Grill</span></h1>
                            <a href="login.php" class="btn button-md button-theme" data-animation="animated fadeInUp delay-15s">Login</a>
                        </div>
                    </div>
                </div>
                <div class="item banner-max-height">
                    <img src="./assets/frontend/cover/img/my3.jpg" alt="banner-slider-3">
                    <div class="carousel-caption banner-slider-inner">
                        <div class="banner-content">
                            <h1 data-animation="animated fadeInLeft delay-05s"><span>WELCOME TO Golden Grill</span></h1>
                            <a href="login.php" class="btn button-md button-theme" data-animation="animated fadeInLeft delay-15s">Login</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="slider-mover-left" aria-hidden="true">
                    <i class="fa fa-angle-left"></i>
                </span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="slider-mover-right" aria-hidden="true">
                    <i class="fa fa-angle-right"></i>
                </span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- Banner end -->

    <script src="./assets/frontend/cover/js/jquery-2.2.0.min.js"></script>
    <script src="./assets/frontend/cover/js/bootstrap.min.js"></script>
    <script src="./assets/frontend/cover/js/bootstrap-slider.js"></script>
    <script src="./assets/frontend/cover/js/wow.min.js"></script>
    <script src="./assets/frontend/cover/js/jquery.scrollUp.js"></script>
    <script src="./assets/frontend/cover/js/bootstrap-select.min.js"></script>
    <script src="./assets/frontend/cover/js/jquery.magnific-popup.min.js"></script>
    <script src="./assets/frontend/cover/js/bootstrap-submenu.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./assets/frontend/cover/js/ie10-viewport-bug-workaround.js"></script>

    <!-- Custom javascript -->
    <script src="./assets/frontend/cover/js/app.js"></script>
  </body>
</html>
