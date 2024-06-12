<?php 
session_start();
include 'protect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">

    <title>MnCo</title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="asset/css/font-awesome.css" rel="stylesheet">
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/css/animate.min.css" rel="stylesheet">
    <link href="asset/css/owl.carousel.css" rel="stylesheet">
    <link href="asset/css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="asset/css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="asset/css/custom.css" rel="stylesheet">

    <script src="asset/js/respond.min.js"></script>
</head>

<body>
    <!-- TOPBAR -->
    <div id="top">
        <div class="container">
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu">
                    <li><a href="profile.php">Welcome, <?php echo $_SESSION['login']['nama_pelanggan']; ?></a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END TOPBAR -->

    <!-- NAVBAR -->
    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <a class="btn btn-default navbar-toggle" href="cart.php">
                        <i class="fa fa-shopping-cart"></i><span class="hidden-xs">Keranjang Belanja</span>
                    </a>
                </div>
            </div>

            <div class="navbar-collapse collapse" id="navigation">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="all-menu.php">Menu</a></li>
                    <li><a href="warung.php">Our partner</a></li>
                    <li class="active"><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>

            <div class="navbar-buttons">
                <?php
                error_reporting(0);                     
                if (!$_SESSION['keranjang']) {
                ?>
                    <div class="navbar-collapse collapse right" id="basket-overview">
                        <a href="cart.php" class="btn btn-primary navbar-btn">
                            <i class="fa fa-shopping-cart"></i><span class="hidden-sm">Keranjang Belanja</span>
                        </a>
                    </div>
                <?php        
                } else {
                    $item = count($_SESSION['keranjang']);
                ?>
                    <div class="navbar-collapse collapse right" id="basket-overview">
                        <a href="cart.php" class="btn btn-primary navbar-btn">
                            <i class="fa fa-shopping-cart"></i><span class="hidden-sm">Keranjang Belanja (<?php echo $item; ?>)</span>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!-- END NAVBAR -->

    <div id="all">
        <div id="content">
            <div class="container">
                <div class="col-md-13">
                    <div class="box" id="contact">
                        <h1>Hubungi Kami</h1>
                        <p class="lead">Untuk keluhan dan saran silahkan hubungi kami melalui kontak berikut :</p>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h3><i class="fa fa-map-marker"></i> Alamat</h3>
                                <p>
                                    KP.Cikopak<br>
                                    RT/RW.029/001<br>
                                    Ds.Mulyamekar<br>
                                    Kec.Babakan Cikoa<br>
                                    <strong>Purwakarta</strong>
                                </p>
                            </div>
                            <div class="col-sm-4">
                                <h3><i class="fa fa-phone"></i> Call center</h3>
                                <p class="text-muted">Untuk fast respon silahkan hubungi nomer berikut.</p>
                                <p><strong>081228683585</strong></p>
                            </div>
                            <div class="col-sm-4">
                                <h3><i class="fa fa-envelope"></i> Email</h3>
                                <p class="text-muted">Gunakan email untuk memberikan saran dan keluhan.</p>
                                <ul>
                                    <li><strong><a href="mailto:mncodrink@mail.com">mncodrink@mail.com</a></strong></li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTENT -->

        <!-- COPYRIGHT -->
        <div id="copyright">
            <div class="container">
                <div class="col-md-6">
                    <p class="pull-left">© MnCo Drink 2022</p>
                </div>
                <div class="col-md-6">
                    <p class="pull-right">All rights reserved by Anandita</p>
                </div>
            </div>
        </div>
        <!-- END COPYRIGHT -->
    </div>
    <!-- END #all -->

    <!-- SCRIPTS TO INCLUDE -->
    <script src="asset/js/jquery-1.11.0.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/jquery.cookie.js"></script>
    <script src="asset/js/waypoints.min.js"></script>
    <script src="asset/js/modernizr.js"></script>
    <script src="asset/js/bootstrap-hover-dropdown.js"></script>
    <script src="asset/js/owl.carousel.min.js"></script>
    <script src="asset/js/front.js"></script>
</body>
</html>
