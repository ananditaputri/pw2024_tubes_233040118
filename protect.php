<!-- untuk memeriksa apakah pengguna sudah login atau belum. 
Jika pengguna belum login, maka pengguna akan diarahkan ke halaman login -->
<?php 
    if (!isset($_SESSION['login'])) {
        echo "<script>location='login.php';</script>";
        exit();
    }
?>