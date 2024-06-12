<?php 
    session_start(); // Memulai sesi
    include '../koneksi.php'; // Menyertakan file koneksi ke database
    include 'protect.php'; // Menyertakan file untuk melindungi halaman (misalnya otentikasi)
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MnCo : Admin</title>
    <!-- BOOTSTRAP STYLES -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLES -->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- ADDITIONAL STYLES -->
    <link href="../asset/css/animate.min.css" rel="stylesheet">
    <link href="../asset/css/owl.carousel.css" rel="stylesheet">
    <link href="../asset/css/owl.theme.css" rel="stylesheet">
    <link rel="shortcut icon" href="../logo.png">
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <!-- Tombol untuk mengubah tampilan sidebar pada perangkat kecil -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">MnCo Admin</a> 
            </div>
            <!-- Tombol logout di bagian kanan atas -->
            <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
                <a href="index.php?halaman=logout" class="btn btn-danger square-btn-adjust">Logout</a> 
            </div>
        </nav>   
        <!-- /. NAV TOP -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <!-- Menu navigasi di sidebar -->
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="logo.png" class="user-image img-responsive"/>
                    </li>
                    <!-- Item menu untuk navigasi -->
                    <li><a href="index.php"><i class="fa fa-home fa-3x"></i> Home</a></li>
                    <li><a href="index.php?halaman=warung"><i class="fa fa-home fa-3x"></i> Warung</a></li>
                    <li><a href="index.php?halaman=produk"><i class="fa fa-gift fa-3x"></i> Produk</a></li>
                    <li><a href="index.php?halaman=pelanggan"><i class="fa fa-users fa-3x"></i> Pelanggan</a></li> 
                </ul>
            </div>
        </nav>  
        <!-- /. NAV SIDE -->
        <div id="page-wrapper">
            <div id="page-inner">
                <?php 
                // Mengecek apakah parameter 'halaman' ada
                if (isset($_GET['halaman'])) {
                    // Memuat halaman sesuai dengan nilai dari parameter 'halaman'
                    if ($_GET['halaman'] == "produk") {
                        include 'produk.php';
                    } elseif ($_GET['halaman'] == "pembelian") {
                        include 'pembelian.php';
                    } elseif ($_GET['halaman'] == "pelanggan") {
                        include 'pelanggan.php';
                    } elseif ($_GET['halaman'] == "hapuspelanggan") {
                        include 'hapuspelanggan.php';
                    } elseif ($_GET['halaman'] == "detail") {
                        include 'detail.php';
                    } elseif ($_GET['halaman'] == "tambahproduk") {
                        include 'tambahproduk.php';
                    } elseif ($_GET['halaman'] == "hapusproduk") {
                        include 'hapusproduk.php';
                    } elseif ($_GET['halaman'] == "ubahproduk") {
                        include 'ubahproduk.php';
                    } elseif ($_GET['halaman'] == "warung") {
                        include 'warung.php';
                    } elseif ($_GET['halaman'] == "ubahwarung") {
                        include 'ubahwarung.php';
                    } elseif ($_GET['halaman'] == "logout") {
                        include 'logout.php';
                    }
                } else {
                    // Memuat halaman default (home.php) jika tidak ada parameter 'halaman'
                    include 'home.php';
                }
                ?>
            </div>
            <!-- /. PAGE INNER -->
        </div>
        <!-- /. PAGE WRAPPER -->
    </div>
    <!-- /. WRAPPER -->
    
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
