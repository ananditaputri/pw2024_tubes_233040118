<!-- untuk menambahkan item ke keranjang belanja di sebuah aplikasi web. 
Jika item tersebut sudah ada di keranjang, 
maka jumlah item tersebut akan ditambah satu. 
Jika belum ada, item tersebut akan ditambahkan ke keranjang dengan jumlah satu. -->

<?php 
session_start(); // Memulai sesi atau melanjutkan sesi yang sudah ada
$id_produk = $_GET['id'];// Mengambil ID produk dari parameter URL

if (isset($_SESSION['keranjang'][$id_produk])) { // Memeriksa apakah produk dengan ID tersebut sudah ada dalam keranjang
    $_SESSION['keranjang'][$id_produk] += 1; // Jika sudah ada, tambahkan jumlah produk tersebut dengan 1
} else {
    $_SESSION['keranjang'][$id_produk] = 1;    // Jika belum ada, set jumlah produk tersebut menjadi 1
}
echo "<script>alert('Berhasil Memasukkan ke Cart');</script>";// Menampilkan pesan alert bahwa produk berhasil dimasukkan ke keranjang
echo "<script>location='cart.php';</script>";// Mengarahkan pengguna ke halaman keranjang (cart.php)
?>
