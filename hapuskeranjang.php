<!-- untuk menghapus item dari keranjang belanja di sebuah aplikasi web. -->
<?php 
session_start(); // Memulai sesi untuk dapat mengakses dan mengubah variabel sesi

// Mengambil ID produk yang akan dihapus dari keranjang belanja
$id_produk = $_GET['id'];

// Menghapus produk dengan ID yang sesuai dari variabel sesi keranjang belanja
unset($_SESSION["keranjang"][$id_produk]);

// Menampilkan pesan notifikasi bahwa item telah dihapus dari keranjang
echo "<script>alert('Item terhapus dari keranjang');</script>";

// Mengarahkan pengguna kembali ke halaman keranjang belanja
echo "<script>location='cart.php';</script>";
?>
