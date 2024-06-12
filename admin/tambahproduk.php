<?php include 'protect.php'; // Mengimpor skrip untuk melindungi halaman ini ?>
<h2>Tambah Produk</h2>

<!-- Form untuk menambahkan produk baru -->
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>ID Warung</label>
		<!-- Input untuk mengisi ID Warung -->
		<input type="text" class="form-control" name="idwarung">
	</div>
	<div class="form-group">
		<label>Nama Produk</label>
		<!-- Input untuk mengisi Nama Produk -->
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Harga(Rp)</label>
		<!-- Input untuk mengisi Harga Produk -->
		<input type="number" class="form-control" name="harga">
	</div>
	<div class="form-group">
		<label>Stok</label>
		<!-- Input untuk mengisi Stok Produk -->
		<input type="number" class="form-control" name="stok">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<!-- Textarea untuk mengisi Deskripsi Produk -->
		<textarea class="form-control" name="deskripsi" rows="5"></textarea>
	</div>
	<div class="form-group">
		<label>Foto Produk</label>
		<!-- Input untuk mengunggah Foto Produk -->
		<input type="file" class="form-control" name="foto">
	</div>
	<!-- Tombol untuk menyimpan data produk baru -->
	<button class="btn btn-primary" name="submit">Simpan</button>
</form>

<?php
if (isset($_POST['submit'])) { // Mengecek apakah tombol submit telah ditekan
	// Mengambil data dari form
	$idwarung = $_POST['idwarung'];
	$namafoto = $_FILES['foto']['name']; // Mengambil nama file foto yang diunggah
	$lokasi = $_FILES['foto']['tmp_name']; // Mengambil lokasi sementara file foto yang diunggah
	// Memindahkan file foto ke direktori tujuan
	move_uploaded_file($lokasi, "../foto_produk/" . $namafoto);
	$nama = $_POST['nama'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];
	$deskripsi = $_POST['deskripsi'];

	// Set nilai default untuk kolom 'likes'
	$likes = 0;

	// Query untuk menambahkan produk ke database
	$query = "INSERT INTO produk (nama_produk, harga_produk, stok, foto_produk, deskripsi_produk, id_warung, likes) 
	          VALUES ('$nama', '$harga', '$stok', '$namafoto', '$deskripsi', '$idwarung', '$likes')";
	
	// Mengeksekusi query dan mengecek apakah berhasil
	if ($conn->query($query)) {
		// Menampilkan pesan sukses dan mengarahkan kembali ke halaman produk
		echo "<div class='alert alert-info'>Data Tersimpan</div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
	} else {
		// Menampilkan pesan error jika gagal menyimpan data
		echo "<div class='alert alert-danger'>Data Gagal Tersimpan: " . $conn->error . "</div>";
	}
}
?>
