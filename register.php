<?php 
    // Menyertakan file koneksi ke database
    include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login MnCo</title>

    <!-- Menyertakan file CSS bootstrap -->
    <link rel="stylesheet" type="text/css" href="asset/login/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="asset/login/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="asset/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="asset/login/css/main.css">
</head>
<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <!-- Formulir pendaftaran -->
                <form class="login100-form validate-form" method="POST">
                    <span class="login100-form-title p-b-26">
                        Create Account
                    </span>

                    <!-- Input Nama -->
                    <div class="wrap-input100 validate-input" data-validate="Enter Name">
                        <input class="input100" type="text" name="nama">
                        <span class="focus-input100" data-placeholder="Insert Your Name"></span>
                    </div>

                    <!-- Input Email -->
                    <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                        <input class="input100" type="text" name="email">
                        <span class="focus-input100" data-placeholder="Insert Your Email"></span>
                    </div>

                    <!-- Input Password -->
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100" data-placeholder="Insert Your Password"></span>
                    </div>

                    <!-- Input Nomor Telepon -->
                    <div class="wrap-input100 validate-input" data-validate="Enter Phone Number">
                        <input class="input100" type="tel" name="phone">
                        <span class="focus-input100" data-placeholder="Insert Your Phone Number"></span>
                    </div>

                    <!-- Input Alamat -->
                    <div class="wrap-input100 validate-input" data-validate="Enter Address">
                        <input class="input100" type="text" name="alamat">
                        <span class="focus-input100" data-placeholder="Insert Your Address"></span>
                    </div>

                    <!-- Tombol Sign Up -->
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" name="submit">
                                Sign Up
                            </button>
                        </div>
                    </div>
                </form>
                
                <?php 
                // Memeriksa apakah tombol submit ditekan
                if (isset($_POST['submit'])) {
                    // Mengambil nilai dari form dan mengamankan dari SQL Injection
                    $nama = mysqli_escape_string($conn, $_POST['nama']);
                    $email = mysqli_escape_string($conn, $_POST['email']);
                    $password = mysqli_escape_string($conn, $_POST['password']);
                    $phone = mysqli_escape_string($conn, $_POST['phone']);
                    $alamat = mysqli_escape_string($conn, $_POST['alamat']);

                    // Mengenkripsi password menggunakan md5
                    $password = md5($password);
                    
                    // Validasi apakah email sudah terdaftar
                    $validasi = $conn->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
                    $q_validasi = $validasi->fetch_assoc();
                    
                    // Memeriksa apakah semua data sudah diisi
                    if ($nama == '' || $email == '' || $password == '' || $phone == '' || $alamat == '') {
                        echo "<script>alert('Harap isi semua data');</script>";
                    } 
                    // Memeriksa apakah email sudah terdaftar
                    else if ($q_validasi == TRUE) {
                        echo "<script>alert('Email telah terdaftar');</script>";
                    } 
                    // Jika email belum terdaftar, melakukan pendaftaran
                    else if ($q_validasi != TRUE) {
                        // Menambahkan nilai NULL untuk foto_profil jika tidak ada gambar yang diunggah
                        $query = $conn->query("INSERT INTO pelanggan(email_pelanggan, password_pelanggan, nama_pelanggan, telepon_pelanggan, alamat_pelanggan, foto_profil) VALUES('$email', '$password', '$nama', '$phone', '$alamat', NULL)");
                        if ($query) {
                            echo "<br>";
                            echo "<div class='alert alert-info'>Sign Up Succeeded</div>";
                            echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                        } else {
                            echo "<br>";
                            echo "<div class='alert alert-danger'>Sign Up Failed</div>";
                            echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <div id="dropDownSelect1"></div>
       
    <!-- Menyertakan file JavaScript -->
    <script src="asset/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="asset/login/js/main.js"></script>
</body>
</html>
