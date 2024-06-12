<!-- untuk menghapus item dari keranjang belanja di sebuah aplikasi web. -->
<?php 
session_start();   // Memulai sesi untuk dapat mengakses dan mengubah variabel sesi
$id_produk = $_GET['id'];    // Mengambil ID produk yang akan dihapus dari keranjang belanja
unset($_SESSION["keranjang"][$id_produk]);   // Menghapus produk dengan ID yang sesuai dari variabel sesi keranjang belanja
echo "<script>alert('Item terhapus dari keranjang');</script>";    // Menampilkan pesan notifikasi bahwa item telah dihapus dari keranjang
echo "<script>location='cart.php';</script>";    // Mengarahkan pengguna kembali ke halaman keranjang belanja
?>
