<?php
    session_start(); 
    include 'koneksi.php';
    include 'protect.php';
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

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>
    <link href="asset/css/font-awesome.css" rel="stylesheet">
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/css/animate.min.css" rel="stylesheet">
    <link href="asset/css/owl.carousel.css" rel="stylesheet">
    <link href="asset/css/style.default.css" rel="stylesheet" id="theme-stylesheet">

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
    <!-- END OF TOPBAR -->

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
                        <i class="fa fa-shopping-cart"></i> <span class="hidden-xs">Keranjang Belanja</span>
                    </a>
                </div>
            </div>

            <div class="navbar-collapse collapse" id="navigation">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="all-menu.php">Menu</a></li>
                    <li class="active"><a href="contact.php">Our partner</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>

            <div class="navbar-buttons">
                <?php if (!$_SESSION['keranjang']): ?>
                    <div class="navbar-collapse collapse right" id="basket-overview">
                        <a href="cart.php" class="btn btn-primary navbar-btn">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="hidden-sm">Keranjang Belanja</span>
                        </a>
                    </div>
                <?php else: ?>
                    <div class="navbar-collapse collapse right" id="basket-overview">
                        <a href="cart.php" class="btn btn-primary navbar-btn">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="hidden-sm">Keranjang Belanja (<?php echo count($_SESSION['keranjang']); ?>)</span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- END OF NAVBAR -->

    <div id="all">
        
    <div id="content">
    <div class="container">
        <!-- Sidebar menu untuk daftar warung -->
        <div class="col-md-3">
            <!-- Panel untuk sidebar menu -->
            <div class="panel panel-default sidebar-menu">
                <div class="panel-heading">
                    <h3 class="panel-title">Daftar Warung</h3>
                </div>
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked category-menu">
                        <?php 
                        // Mengambil daftar warung dari database
                        $query = $conn->query("SELECT * FROM warung");
                        while ($data = $query->fetch_assoc()): ?>
                            <li>
                                <!-- Menampilkan nama warung dan link ke halaman detail warung -->
                                <a href="warung.php?id=<?php echo $data['id_warung']; ?>"><?php echo $data['nama_warung']; ?></a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Bagian konten utama untuk menampilkan detail warung dan produk-produk -->
        <div class="col-md-9">
            <div class="box">
                <h2>Warung Pilihan :</h2>
                <?php 
                // Mengambil id warung dari URL
                $id_warung = $_GET['id'];
                // Mengambil detail warung berdasarkan id warung dari database
                $query2 = $conn->query("SELECT * FROM warung WHERE id_warung=$id_warung");
                $data2 = $query2->fetch_assoc();
                ?>
                <!-- Menampilkan nama dan detail warung -->
                <h1><?php echo $data2['nama_warung']; ?></h1>
                <p><?php echo $data2['alamat_warung']; ?> <br>
                    <?php echo $data2['telepon_warung']; ?>
                </p>
            </div>

            <!-- Menampilkan produk-produk yang ada di warung -->
            <div class="row products">
                <?php
                // Mengambil daftar produk berdasarkan id warung dari database
                $query3 = $conn->query("SELECT * FROM produk WHERE id_warung=$id_warung");
                while ($data3 = $query3->fetch_assoc()): ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="product">
                            <!-- Menampilkan gambar produk dengan efek flip -->
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <a href="detail_produk.php?id=<?php echo $data3['id_produk']; ?>">
                                            <img src="foto_produk/<?php echo $data3['foto_produk']; ?>" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="detail_produk.php?id=<?php echo $data3['id_produk']; ?>">
                                            <img src="foto_produk/<?php echo $data3['foto_produk']; ?>" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="detail_produk.php?id=<?php echo $data3['id_produk']; ?>" class="invisible">
                                <img src="foto_produk/<?php echo $data3['foto_produk']; ?>" alt="" class="img-responsive">
                            </a>
                            <div class="text">
                                <!-- Menampilkan nama produk dan detail lainnya -->
                                <h3><a href="detail_produk.php?id=<?php echo $data3['id_produk']; ?>"><?php echo $data3['nama_produk']; ?></a></h3>
                                <p class="price">Stok : <?php echo $data3['stok']; ?></p>
                                <p class="price">Rp.<?php echo number_format($data3['harga_produk']); ?></p>
                                <p class="buttons">
                                    <!-- Tombol untuk melihat detail produk -->
                                    <a href="detail_produk.php?id=<?php echo $data3['id_produk']; ?>" class="btn btn-default">View detail</a>
                                    <!-- Tombol untuk menambahkan produk ke keranjang belanja -->
                                    <a href="buy.php?id=<?php echo $data3['id_produk']; ?>" class="btn btn-primary">
                                        <i class="fa fa-shopping-cart"></i>Add to cart
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>

        <!-- COPYRIGHT -->
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
        <!-- END OF COPYRIGHT -->
    </div>

    <!-- SCRIPTS -->
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
