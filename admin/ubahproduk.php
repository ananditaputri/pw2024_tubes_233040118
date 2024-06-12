<?php include 'protect.php'; // Mengimpor skrip untuk melindungi halaman ini ?>
<h2>Ubah Produk</h2>
<?php 
	// Mengambil data produk dari database berdasarkan id_produk yang diterima melalui URL
	$query = $conn->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
	$data = $query->fetch_assoc(); // Menyimpan data hasil query ke dalam variabel $data
?>

<!-- Form untuk mengubah data produk -->
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<!-- Input untuk mengubah nama produk, nilai default diisi dengan nama_produk dari database -->
		<input type="text" class="form-control" name="nama" value="<?php echo $data['nama_produk']; ?>">
	</div>
	<div class="form-group">
		<label>Harga(Rp)</label>
		<!-- Input untuk mengubah harga produk, nilai default diisi dengan harga_produk dari database -->
		<input type="number" class="form-control" name="harga" value="<?php echo $data['harga_produk']; ?>">
	</div>
	<div class="form-group">
		<label>Stok</label>
		<!-- Input untuk mengubah stok produk, nilai default diisi dengan stok dari database -->
		<input type="number" class="form-control" name="stok" value="<?php echo $data['stok']; ?>">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<!-- Textarea untuk mengubah deskripsi produk, nilai default diisi dengan deskripsi_produk dari database -->
		<textarea class="form-control" name="deskripsi" rows="5"><?php echo $data['deskripsi_produk']; ?></textarea>
	</div>
	<div class="form-group">
		<label>Foto Produk &nbsp</label>
		<!-- Menampilkan foto produk saat ini -->
		<img src="../foto_produk/<?php echo $data['foto_produk']; ?>" width="100">
	</div>
	<div class="form-group">
		<label>Ubah Produk</label>
		<!-- Input untuk mengubah foto produk -->
		<input type="file" name="foto" class="form-control">
	</div>
	<button class="btn btn-primary" name="submit">Ubah</button> <!-- Tombol submit untuk mengirimkan form -->
</form>

<?php 
if (isset($_POST['submit'])) { // Mengecek apakah tombol submit telah ditekan
	$namafoto = $_FILES['foto']['name']; // Mengambil nama file foto baru
	$lokasifoto = $_FILES['foto']['tmp_name']; // Mengambil lokasi sementara file foto baru
	if (!empty($lokasifoto)) { // Mengecek apakah ada foto baru yang diupload
		move_uploaded_file($lokasifoto, "../foto_produk/$namafoto"); // Memindahkan foto baru ke direktori yang diinginkan

		// Menyimpan data yang diinputkan user ke dalam variabel
		$namaproduk = $_POST['nama'];
		$harga = $_POST['harga'];
		$stok = $_POST['stok'];
		$deskripsi = $_POST['deskripsi'];

		// Melakukan update data produk di database termasuk foto baru
		$conn->query("UPDATE produk SET nama_produk='$_POST[nama]', harga_produk='$_POST[harga]', stok='$_POST[stok]', foto_produk='$namafoto', deskripsi_produk='$_POST[deskripsi]' WHERE id_produk='$_GET[id]'");
	}
	else {
		// Melakukan update data produk di database tanpa mengubah foto
		$conn->query("UPDATE produk SET nama_produk='$_POST[nama]', harga_produk='$_POST[harga]', stok='$_POST[stok]', deskripsi_produk='$_POST[deskripsi]' WHERE id_produk='$_GET[id]'");
	}
	// Menampilkan pesan alert bahwa data berhasil diubah
	echo "<script>alert('Data Berhasil Diubah');</script>";
	// Mengarahkan user kembali ke halaman daftar produk setelah data diubah
	echo "<script>location='index.php?halaman=produk';</script>";
}
?>
