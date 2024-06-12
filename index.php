<?php
    // Memulai sesi
    session_start();    
    
    // Menyertakan file koneksi dan protect untuk memastikan hanya pengguna yang sah yang dapat mengakses halaman ini
    include 'koneksi.php';
    include 'protect.php';

    // Menonaktifkan laporan kesalahan
    error_reporting(0);
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
    <meta name="keywords" content="">

    <!-- Menggunakan font dari Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- Menyertakan berbagai stylesheet untuk tampilan website -->
    <link href="asset/css/font-awesome.css" rel="stylesheet">
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/css/animate.min.css" rel="stylesheet">
    <link href="asset/css/owl.carousel.css" rel="stylesheet">
    <link href="asset/css/owl.theme.css" rel="stylesheet">

    <!-- Stylesheet tema utama -->
    <link href="asset/css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- Stylesheet khusus untuk modifikasi -->
    <link href="asset/css/custom.css" rel="stylesheet">

    <!-- Menyertakan script JavaScript -->
    <script src="asset/js/respond.min.js"></script>

    <!-- <link rel="shortcut icon" href="logo.png"> -->
</head>

<body>

    <!-- *** TOPBAR ***
 _________________________________________________________ -->
 <div id="top">
    <div class="container">
        <div class="col-md-6" data-animate="fadeInDown">
            <ul class="menu">
                <!-- Menampilkan nama pelanggan yang login dan link logout -->
                <li><a href="profile.php">Welcome, <?php echo $_SESSION['login']['nama_pelanggan']; ?></a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</div>

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

 <div class="navbar navbar-default yamm" role="navigation" id="navbar">
    <div class="container">
        <div class="navbar-header">

                <!-- Tombol untuk membuka navigasi pada tampilan mobile -->
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                </div>
            </div>
            <!--/.navbar-header -->

            <!-- Bagian navigasi -->
            <div class="navbar-collapse collapse" id="navigation">
                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="all-menu.php">Menu</a></li>
                    <li><a href="warung.php">Our partner</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->

            <!-- Menampilkan jumlah item dalam keranjang belanja -->
            <div class="navbar-buttons">
                <?php                     
                    if (!$_SESSION['keranjang']) {
                    ?>
                        <div class="navbar-collapse collapse right" id="basket-overview">
                            <a href="cart.php" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">Keranjang Belanja</span></a>
                        </div>
                    <?php        
                    } else {
                        $item = count($_SESSION['keranjang']);
                    ?>
                        <div class="navbar-collapse collapse right" id="basket-overview">
                            <a href="cart.php" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">Keranjang Belanja (<?php echo $item;?>)</span></a>
                        </div>
                    <?php
                    }
                ?>
            </div>
            
     </div>
     <!-- /.container -->
 </div>
 <!-- /#navbar -->

 <!-- *** NAVBAR END *** -->

 <div id="all">
    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <div id="main-slider">
                    <?php 
                    // Menampilkan slider dengan produk acak
                    $q_slider = $conn->query("SELECT * FROM produk ORDER BY RAND() LIMIT 5");
                    while ($slider = $q_slider->fetch_assoc()) {
                        ?>
                        <div class="item">
                            <img src="foto_produk/<?php echo $slider['foto_produk']; ?>" style="height:753px;width:1400px;" class="img-responsive">
                        </div>
                        <?php
                    }
                    ?>  
                </div>
                <!-- /#main-slider -->
            </div>
        </div>

<!-- *** ADVANTAGES HOMEPAGE ***
_________________________________________________________ -->
<div id="advantages">
    <div class="container">
        <div class="same-height-row">
            <div class="col-sm-4">
                <div class="box same-height">
                    <div class="icon"><i class="fa fa-star"></i></div>
                    <h3>Rating</h3>
                    <p>Berikan bintang kepada minuman yang kamu sukai</p>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="box same-height">
                    <div class="icon"><i class="fa fa-map-marker"></i></div>
                    <h3>Special for MnCo Drink</h3>
                    <p>Aplikasi ini di khususkan untuk informasi delivery minuman.</p>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="box same-height">
                    <div class="icon"><i class="fa fa-thumbs-up"></i></div>
                    <h3>Informasi Lengkap</h3>
                    <p>Aplikasi ini akan memberikan informasi lengkap mengenai menu minuman di warung-warung tertentu</p>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
<!-- /#advantages -->

<!-- *** ADVANTAGES END *** -->

<!-- *** HOT PRODUCT SLIDESHOW ***
_________________________________________________________ -->
<div id="hot">
    <div class="box">
        <div class="container">
            <div class="col-md-12">
                <h2>Menu Favorit</h2>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="product-slider">
            <?php  
            // Menampilkan produk berdasarkan jumlah likes
            $query = $conn->query("SELECT * FROM produk ORDER BY likes DESC");
            while ($data = $query->fetch_assoc()) {
                ?>
                <div class="item">
                    <div class="product">
                        <div class="flip-container">
                            <div class="flipper">
                                <div class="front">
                                    <a href="detail_produk.php?id=<?php echo $data['id_produk']; ?>">
                                        <img src="foto_produk/<?php echo $data['foto_produk'];?>" alt="" class="img-responsive img-fluid">
                                    </a>
                                </div>
                                <div class="back">
                                    <a href="detail_produk.php?id=<?php echo $data['id_produk']; ?>">
                                        <img src="foto_produk/<?php echo $data['foto_produk'];?>" alt="" class="img-responsive img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <a href="detail_produk.php?id=<?php echo $data['id_produk']; ?>" class="invisible">
                            <img src="foto_produk/<?php echo $data['foto_produk'];?>" alt="" class="img-responsive">
                        </a>
                        <div class="text">
                            <h3><a href="detail_produk.php?id=<?php echo $data['id_produk']; ?>"><?php echo $data['nama_produk']; ?></a></h3>
                            <p class="price">Rp.<?php echo number_format($data['harga_produk']); ?></p>
                        </div>
                        <!-- /.text -->
                    </div>
                    <!-- /.product -->
                </div>
                <?php
            }
            ?>
        </div>
        <!-- /.product-slider -->
    </div>
    <!-- /.container -->
</div>
<!-- /#hot -->

<!-- *** HOT END *** -->

<div class="box text-center" data-animate="fadeInUp">
    <div class="container">
        <div class="col-md-12">
            <h3 class="text-uppercase"> MnCo bekerja sama dengan banyak warung. </h3>
            <p class="lead">Penasaran dengan warung-warung kami? <a href="warung.php">Check our Store!</a></p>
        </div>
    </div>
</div>

<div class="container">
    <div class="col-md-12" data-animate="fadeInUp">
    </div>
</div>

<!-- /#blog-homepage -->
</div>
</div>
<!-- /.container -->

<!-- *** BLOG HOMEPAGE END *** -->

</div>
<!-- /#content -->

<!-- *** COPYRIGHT / FOOTER ***
_________________________________________________________ -->
<div id="copyright">
    <div class="container">
        <div class="col-md-6">
            <p class="pull-left">© MnCo Drink 2022</p>
        </div>
        <div class="col-md-6">
            <p class="pull-right">Alright Reserved by anandita</p>
        </div>
    </div>
</div>
<!-- *** COPYRIGHT END / FOOTER END *** -->

</div>
<!-- /#all -->

<!-- Menyertakan berbagai script JavaScript -->
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
