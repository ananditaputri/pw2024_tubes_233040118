<?php 
include 'koneksi.php';   // Menghubungkan ke file koneksi.php untuk mengakses database
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login MnCo</title>
    <link rel="stylesheet" type="text/css" href="asset/login/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="asset/login/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="asset/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="asset/login/css/main.css">
</head>
<body>
    <div class="limiter">
        <div class="container-login100 pt-2">
            <div class="wrap-login100">
                <!-- Form login dengan class khusus untuk validasi -->
                <form class="login100-form validate-form" method="POST">
                    <!-- Judul form login -->
                    <span class="login100-form-title p-b-26">
                        MnCo : User Login
                    </span>

                    <!-- Input untuk email dengan validasi -->
                    <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                        <!-- Input email -->
                        <input class="input100" type="text" name="email">
                        <!-- Placeholder untuk input email -->
                        <span class="focus-input100" data-placeholder="Insert Your Email"></span>
                    </div>

                    <!-- Input untuk password dengan validasi -->
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <!-- Tombol untuk menampilkan/menghilangkan password -->
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <!-- Input password -->
                        <input class="input100" type="password" name="password">
                        <!-- Placeholder untuk input password -->
                        <span class="focus-input100" data-placeholder="Insert Your Password"></span>
                    </div>

                    <!-- Tombol untuk submit form login -->
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" name="submit">
                                Login
                            </button>
                        </div>
                    </div>

                    <!-- Teks dan link untuk pengguna yang belum memiliki akun dan login admin -->
                    <div class="text-center pt-4">
                        <span class="txt1">
                            Don’t have an account?
                        </span>
                        <!-- Link untuk halaman pendaftaran -->
                        <a class="txt2" href="register.php">
                            Sign Up
                        </a><br>
                        <span class="txt1">
                            Login as Admin?
                        </span>
                        <!-- Link untuk halaman login admin -->
                        <a class="txt2" href="admin/login.php">
                            Click here
                        </a>
                    </div>
                </form>

                <?php 
                if (isset($_POST['submit'])) { // Mengecek jika tombol submit ditekan
                    // Mengamankan data dari injeksi SQL
                    $email = mysqli_real_escape_string($conn, $_POST['email']);
                    $password = mysqli_real_escape_string($conn, $_POST['password']);
                    // Enkripsi password dengan MD5 
                    $password = md5($password);
                    // Mengecek keberadaan user di database
                    $query = $conn->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");
                    $result = $query->num_rows;
                    if ($result == 1) { // Jika user ditemukan
                        session_start();
                        $_SESSION['login'] = $query->fetch_assoc();
                        echo "<br>";
                        echo "<div class='alert alert-info'><center>Login Succeeded</center></div>";
                        echo "<meta http-equiv='refresh' content='1;url=index.php'>"; // Mengarahkan ke halaman index.php
                    } else { // Jika user tidak ditemukan
                        echo "<br>";
                        echo "<div class='alert alert-danger'><center>Login Failed</center></div>";
                        echo "<meta http-equiv='refresh' content='1;url=login.php'>"; // Mengarahkan kembali ke halaman login.php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
    <script src="asset/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="asset/login/js/main.js"></script>
</body>
</html>
