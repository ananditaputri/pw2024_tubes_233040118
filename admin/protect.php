<?php 
    // Mengecek apakah session 'admin' sudah diset atau belum
    if (!isset($_SESSION['admin'])) {
        // Jika session 'admin' belum diset, redirect ke halaman login
        echo "<script>location='login.php';</script>";
        // Menghentikan eksekusi script untuk memastikan tidak ada kode lain yang dieksekusi
        exit();
    }
?>
