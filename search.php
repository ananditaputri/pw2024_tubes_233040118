<?php 
// Menyertakan file koneksi ke database
include 'koneksi.php';

// Mengambil parameter judul dari URL dan membersihkan tag HTML
$judul = strip_tags($_GET['judul']);

// Memeriksa apakah judul kosong
if ($judul == "") {
    // Jika kosong, tidak melakukan apa-apa
    echo "";
} else {
    // Jika tidak kosong, melakukan query untuk mencari produk yang cocok dengan judul
    $query = "SELECT * FROM produk WHERE nama_produk LIKE '%$judul%'";
    $result = $conn->query($query) or die($conn->error.__LINE__);

    // Memeriksa apakah ada hasil dari query
    if ($result->num_rows > 0) {
        // Jika ada hasil, menampilkan setiap produk dalam loop
        while ($rows = $result->fetch_assoc()) {
            // Mengekstrak variabel dari array asosiatif
            extract($rows);
?>
            <!-- Bagian untuk menampilkan produk -->
            <div class="col-md-3 col-sm-4">
                <div class="product">
                    <div class="flip-container">
                        <div class="flipper">
                            <div class="front">
                                <!-- Tautan ke detail produk dengan gambar produk -->
                                <a href="detail_produk.php?id=<?php echo $rows['id_produk']; ?>">
                                    <img src="foto_produk/<?php echo $rows['foto_produk'];?>" alt="" class="img-responsive">
                                </a>
                            </div>
                            <div class="back">
                                <!-- Tautan ke detail produk dengan gambar produk -->
                                <a href="detail_produk.php?id=<?php echo $rows['id_produk']; ?>">
                                    <img src="foto_produk/<?php echo $rows['foto_produk'];?>" alt="" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="detail_produk.php?id=<?php echo $rows['id_produk']; ?>" class="invisible">
                        <img src="foto_produk/<?php echo $rows['foto_produk'];?>" alt="" class="img-responsive">
                    </a>
                    <div class="text">
                        <!-- Menampilkan nama produk -->
                        <h3><a href="detail_produk.php?id=<?php echo $rows['id_produk']; ?>"><?php echo $rows['nama_produk']; ?></a></h3>
                        <!-- Menampilkan stok produk -->
                        <p class="price">Stok: <?php echo $rows['stok']; ?></p>
                        <!-- Menampilkan harga produk dengan format rupiah -->
                        <p class="price">Rp.<?php echo number_format($rows['harga_produk']); ?></p>
                        <p class="buttons">
                            <!-- Tombol untuk melihat detail produk -->
                            <a href="detail_produk.php?id=<?php echo $rows['id_produk']; ?>" class="btn btn-default">View detail</a>
                            <!-- Tombol untuk menambahkan produk ke keranjang belanja -->
                            <a href="buy.php?id=<?php echo $rows['id_produk']; ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </p>
                    </div>
                    <!-- /.text -->
                </div>
                <!-- /.product -->
            </div>
<?php
        }
    } else {
        // Jika tidak ada hasil, menampilkan pesan 'NOT FOUND!'
?>
        <center><h1>NOT FOUND!</h1></center>
<?php
    } 
}
?>