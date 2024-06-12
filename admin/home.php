<?php 
	include 'protect.php'; // Mengimpor skrip untuk melindungi halaman ini
?>
<!-- Menampilkan pesan selamat datang -->
<h2>Selamat Datang, <b><?php echo $_SESSION['admin']['nama_lengkap']; ?></b></h2>
