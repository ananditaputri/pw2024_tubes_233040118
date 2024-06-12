<?php include 'protect.php'; ?> <!-- Mengikutsertakan file protect.php untuk otentikasi atau kontrol akses -->
<h2>Data Warung</h2> <!-- Judul untuk tabel -->

<div class="table-responsive"> <!-- Membuat wadah tabel yang responsif -->
	<table class="table table-bordered"> <!-- Membuat tabel dengan garis tepi -->
		<thead>
			<tr>
				<th>No</th> <!-- Header tabel untuk nomor urut -->
				<th>ID Warung</th> <!-- Header tabel untuk ID Warung -->
				<th>Nama Warung</th> <!-- Header tabel untuk Nama Warung -->
				<th>Alamat</th> <!-- Header tabel untuk Alamat Warung -->
				<th>Telepon</th> <!-- Header tabel untuk Nomor Telepon Warung -->
				<th>Action</th> <!-- Header tabel untuk aksi (misalnya, tombol ubah) -->
			</tr>
		</thead>
		<tbody>
			<?php $no=1; ?> <!-- Inisialisasi nomor urut -->
			<?php $ambil=$conn->query("SELECT * FROM warung"); ?> <!-- Menjalankan query untuk memilih semua data dari tabel 'warung' -->
			<?php while ($data=$ambil->fetch_assoc()) { ?> <!-- Mengambil data sebagai array asosiatif dalam loop -->
				<tr>
					<td><?php echo $no++ ?></td> <!-- Menampilkan nomor urut dan menambahkannya 1 -->
					<td><?php echo $data['id_warung']; ?></td> <!-- Menampilkan ID Warung -->
					<td><?php echo $data['nama_warung']; ?></td> <!-- Menampilkan Nama Warung -->
					<td><?php echo $data['alamat_warung']; ?></td> <!-- Menampilkan Alamat Warung -->
					<td><?php echo $data['telepon_warung']; ?></td> <!-- Menampilkan Nomor Telepon Warung -->
					<td>	
						<a href="index.php?halaman=ubahwarung&id=<?php echo $data['id_warung']; ?>" class="btn btn-warning">Ubah</a> <!-- Tautan untuk mengubah data Warung, dengan ID Warung sebagai parameter -->
					</td>
				</tr>
			<?php } ?> <!-- Akhir dari loop while -->
		</tbody>
	</table>	
</div> <!-- Akhir dari wadah tabel responsif -->
