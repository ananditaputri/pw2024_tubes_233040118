<?php 
    include '../koneksi.php'; // Menyertakan file koneksi ke database
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login MnCo</title>
    <!-- Set karakter encoding dan viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../logo.png"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../asset/login/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="../asset/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Iconic CSS -->
    <link rel="stylesheet" type="text/css" href="../asset/login/fonts/iconic/css/material-design-iconic-font.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" type="text/css" href="../asset/login/vendor/animate/animate.css">
    <!-- Hamburgers CSS -->
    <link rel="stylesheet" type="text/css" href="../asset/login/vendor/css-hamburgers/hamburgers.min.css">
    <!-- Animsition CSS -->
    <link rel="stylesheet" type="text/css" href="../asset/login/vendor/animsition/css/animsition.min.css">
    <!-- Select2 CSS -->
    <link rel="stylesheet" type="text/css" href="../asset/login/vendor/select2/select2.min.css">
    <!-- Daterangepicker CSS -->
    <link rel="stylesheet" type="text/css" href="../asset/login/vendor/daterangepicker/daterangepicker.css">
    <!-- Utility CSS -->
    <link rel="stylesheet" type="text/css" href="../asset/login/css/util.css">
    <!-- Main CSS -->
    <link rel="stylesheet" type="text/css" href="../asset/login/css/main.css">
</head>
<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST">
                    <span class="login100-form-title pb-4">
                        MnCo : Login Admin
                    </span>
                    <!-- Input untuk username -->
                    <div class="wrap-input100 validate-input" data-validate="Insert Username">
                        <input class="input100" type="text" name="username">
                        <span class="focus-input100" data-placeholder="Insert Your Username"></span>
                    </div>

                    <!-- Input untuk password -->
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100" data-placeholder="Insert Your Password"></span>
                    </div>

                    <!-- Tombol untuk login -->
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" name="submit">
                                Login
                            </button>
                        </div>
                    </div>

                    <!-- Tautan untuk login sebagai user -->
                    <div class="text-center pt-4">
                        <span class="txt1">
                            Login as User?
                        </span>
                        <a class="txt2" href="../login.php">
                            Click here
                        </a>
                    </div>
                </form>
                
                <?php 
                // Mengecek apakah tombol login ditekan
                if (isset($_POST['submit'])) {
                    // Membersihkan dan memvalidasi input pengguna
                    $username = mysqli_escape_string($conn, $_POST['username']);
                    $password = mysqli_escape_string($conn, $_POST['password']);

                    // Mengenkripsi password
                    $password = md5($password);

                    // Query untuk memeriksa kredensial admin
                    $query = $conn->query("SELECT * FROM admin WHERE username='$username' AND password='$password'");
                    $result = $query->num_rows;

                    // Jika kredensial benar, mulai sesi dan arahkan ke halaman index
                    if ($result == 1) {
                        session_start();
                        $_SESSION['admin'] = $query->fetch_assoc();
                        echo "<br>";
                        echo "<div class='alert alert-info'><center>Login Succeeded</center></div>";
                        echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                    } else {
                        // Jika kredensial salah, tampilkan pesan kesalahan
                        echo "<br>";
                        echo "<div class='alert alert-danger'><center>Login Failed</center></div>";
                        echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <div id="dropDownSelect1"></div>
    
    <!-- jQuery -->
    <script src="../asset/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!-- Animsition JS -->
    <script src="../asset/login/vendor/animsition/js/animsition.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="../asset/login/vendor/bootstrap/js/popper.js"></script>
    <script src="../asset/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 JS -->
    <script src="../asset/login/vendor/select2/select2.min.js"></script>
    <!-- Daterangepicker JS -->
    <script src="../asset/login/vendor/daterangepicker/moment.min.js"></script>
    <script src="../asset/login/vendor/daterangepicker/daterangepicker
