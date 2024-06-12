<!-- untuk mengakhiri sesi pengguna, atau dengan kata lain, 
untuk melakukan proses logout pengguna dari aplikasi web. -->

<?php
	session_start();
	session_unset(); 
	session_destroy();

	echo "<script>alert('Berhasil Logout');</script>";
	echo "<script>location='login.php';</script>";
?>