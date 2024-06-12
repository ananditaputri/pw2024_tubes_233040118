<?php
    // Menghancurkan semua data session, yang berarti pengguna akan logout
    session_destroy();
    
    // Menampilkan pesan alert bahwa logout berhasil
    echo "<script>alert('Berhasil Logout');</script>";
    
    // Mengarahkan pengguna kembali ke halaman login
    echo "<script>location='login.php';</script>";
?>
