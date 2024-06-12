<?php
    session_start();
    include 'koneksi.php';
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

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>
    
    <!-- Stylesheets -->
    <link href="asset/css/font-awesome.css" rel="stylesheet">
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/css/animate.min.css" rel="stylesheet">
    <link href="asset/css/owl.carousel.css" rel="stylesheet">
    <link href="asset/css/owl.theme.css" rel="stylesheet">
    <link href="asset/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
    <link href="asset/css/custom.css" rel="stylesheet">
    
    <script src="asset/js/respond.min.js"></script>
    
    <!-- JQuery -->
    <script src="asset/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#button_find").click(function(event) {
                event.preventDefault();
                ajax_search();
            });
            $("#search_query").keyup(function(event) {
                event.preventDefault();
                ajax_search();
            });
        });

        function ajax_search() {
            var judul = $("#search_query").val();
            $.ajax({
                url: "search.php",
                data: "judul=" + judul,
                success: function(data) {
                    $("#display_results").html(data);
                }
            });
        }
    </script>
</head>

<body>
    <!-- Top Bar -->
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
    
    <!-- Navbar -->
    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                    <a class="btn btn-default navbar-toggle" href="cart.php">
                        <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">Keranjang Belanja</span>
                    </a>
                </div>
            </div>
            
            <div class="navbar-collapse collapse" id="navigation">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><a href="all-menu.php">Menu</a></li>
                    <li><a href="warung.php">Our partner</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>

            <div class="navbar-buttons">
                <?php
                error_reporting(0);                     
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
                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>

            <div class="collapse clearfix" id="search">
                <form class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" name="search_query" id="search_query" class="form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button type="submit" id="button_find" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div id="all">
        <div id="content">
            <div class="container">
                <div id="display_results"></div>
            </div>
            <div class="container">
                <div class="col-md-12">
                    <div class="row products">
                        <?php
                        $halaman = 8;
                        $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                        $mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;
                        $query = $conn->query("SELECT*FROM produk LIMIT $mulai, $halaman") OR die($conn->error);
                        $sql = $conn->query("SELECT*FROM produk");
                        $total = $sql->num_rows;
                        $pages = ceil($total / $halaman);    
                        while ($data = $query->fetch_assoc()) {   
                        ?>
                            <div class="col-md-3 col-sm-4">
                                <div class="product">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front">
                                                <a href="detail_produk.php?id=<?php echo $data['id_produk']; ?>">
                                                    <img src="foto_produk/<?php echo $data['foto_produk'];?>" alt="" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="back">
                                                <a href="detail_produk.php?id=<?php echo $data['id_produk']; ?>">
                                                    <img src="foto_produk/<?php echo $data['foto_produk'];?>" alt="" class="img-responsive">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="detail_produk.php?id=<?php echo $data['id_produk']; ?>" class="invisible">
                                        <img src="foto_produk/<?php echo $data['foto_produk'];?>" alt="" class="img-responsive">
                                    </a>
                                    <div class="text">
                                        <h3><a href="detail_produk.php?id=<?php echo $data['id_produk']; ?>"><?php echo $data['nama_produk']; ?></a></h3>
                                        <p class="price">Stok: <?php echo $data['stok']; ?></p>
                                        <p class="price">Rp.<?php echo number_format($data['harga_produk']); ?></p>
                                        <p class="buttons">
                                            <a href="detail_produk.php?id=<?php echo $data['id_produk']; ?>" class="btn btn-default">View detail</a>
                                            <a href="buy.php?id=<?php echo $data['id_produk']; ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                    <!-- Pagination -->
                    <div class="pages">
                        <ul class="pagination">
                            <?php for($i = 1; $i <= $pages; $i++) { ?>
                                <li><a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
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
    </div>

    <!-- Scripts to include -->
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
