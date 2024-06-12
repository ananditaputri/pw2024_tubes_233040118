<?php include 'protect.php'; // Mengimpor skrip untuk melindungi halaman ini ?>
<h2>Ubah Warung</h2>

<?php 
	// Mengambil data warung dari database berdasarkan id_warung yang diterima melalui URL
	$query = $conn->query("SELECT * FROM warung WHERE id_warung='$_GET[id]'");
	$data = $query->fetch_assoc(); // Menyimpan data hasil query ke dalam variabel $data
?>

<!-- Form untuk mengubah data warung -->
<form role="form" method="POST">
	<div class="form-group">
		<label>Nama Warung</label>
		<!-- Input untuk mengubah nama warung, nilai default diisi dengan nama_warung dari database -->
		<input type="text" class="form-control" name="nama" value="<?php echo $data['nama_warung']; ?>">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<!-- Input untuk mengubah alamat warung, nilai default diisi dengan alamat_warung dari database -->
		<input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat_warung']; ?>">
	</div>
	<div class="form-group">
		<label>Telepon</label>
		<!-- Input untuk mengubah telepon warung, nilai default diisi dengan telepon_warung dari database -->
		<input type="number" class="form-control" name="telepon" value="<?php echo $data['telepon_warung']; ?>">
	</div>
	<button class="btn btn-primary" name="submit">Ubah</button> <!-- Tombol submit untuk mengirimkan form -->
</form>

<?php 
	if (isset($_POST['submit'])) { // Mengecek apakah tombol submit telah ditekan
		// Melakukan update data warung di database berdasarkan data yang diinputkan di form
		$query = $conn->query("UPDATE warung SET nama_warung='$_POST[nama]', alamat_warung='$_POST[alamat]', telepon_warung='$_POST[telepon]' WHERE id_warung='$_GET[id]'");
		// Menampilkan pesan alert bahwa data berhasil diubah
		echo "<script>alert('Data Berhasil Diubah');</script>";
		// Mengarahkan user kembali ke halaman warung setelah data diubah
		echo "<script>location='index.php?halaman=warung';</script>";
	}
?>
