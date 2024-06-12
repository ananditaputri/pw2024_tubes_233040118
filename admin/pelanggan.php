<?php include 'protect.php'; // Mengimpor skrip untuk melindungi halaman ini ?>
<h2>Pelanggan</h2>

<div class="table-responsive">
	<!-- Tabel untuk menampilkan data pelanggan -->
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Telepon</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$no = 1; // Inisialisasi variabel untuk nomor urut
				$query = $conn->query("SELECT * FROM pelanggan"); // Menjalankan query untuk mengambil semua data pelanggan
				while ($data = $query->fetch_assoc()) { // Mengambil setiap baris data hasil query
			?>
				<tr>
					<!-- Menampilkan nomor urut -->
					<td><?php echo $no++; ?></td>
					<!-- Menampilkan nama pelanggan -->
					<td><?php echo $data['nama_pelanggan']; ?></td>
					<!-- Menampilkan email pelanggan -->
					<td><?php echo $data['email_pelanggan']; ?></td>
					<!-- Menampilkan telepon pelanggan -->
					<td><?php echo $data['telepon_pelanggan']; ?></td>
					<!-- Menampilkan tombol untuk menghapus pelanggan, dengan mengarahkan ke halaman hapuspelanggan -->
					<td>
						<a href="index.php?halaman=hapuspelanggan&id=<?php echo $data['id_pelanggan']; ?>" class="btn btn-danger">Hapus</a>
					</td>
				</tr>
			<?php 
				} // Akhir dari while loop 
			?>
		</tbody>
	</table>
</div>
