<?php include 'protect.php'; ?> <!-- Menyertakan file protect.php untuk melindungi halaman -->
<h2>Data Produk</h2> <!-- Judul halaman -->

<div class="table-responsive"> <!-- Membuat tabel menjadi responsif -->
    <table class="table table-bordered"> <!-- Membuat tabel dengan border menggunakan kelas Bootstrap -->
        <thead>
            <tr>
                <th>No</th> <!-- Kolom untuk nomor urut -->
                <th>Warung</th> <!-- Kolom untuk nama warung -->
                <th>Nama Produk</th> <!-- Kolom untuk nama produk -->
                <th>Harga</th> <!-- Kolom untuk harga produk -->
                <th>Stok</th> <!-- Kolom untuk jumlah stok produk -->
                <th>Foto</th> <!-- Kolom untuk foto produk -->
                <th>Action</th> <!-- Kolom untuk aksi (ubah dan hapus) -->
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1; // Inisialisasi nomor urut
            // Mengambil data produk dan nama warung dari database
            $ambil = $conn->query("SELECT * FROM produk JOIN warung ON produk.id_warung = warung.id_warung"); 
            while ($data = $ambil->fetch_assoc()) { // Mengiterasi setiap baris data yang diambil
            ?>
                <tr>
                    <td><?php echo $no++; ?></td> <!-- Menampilkan nomor urut -->
                    <td><?php echo $data['nama_warung']; ?></td> <!-- Menampilkan nama warung -->
                    <td><?php echo $data['nama_produk']; ?></td> <!-- Menampilkan nama produk -->
                    <td>Rp.<?php echo number_format($data['harga_produk']); ?></td> <!-- Menampilkan harga produk dengan format angka -->
                    <td><?php echo $data['stok']; ?></td> <!-- Menampilkan stok produk -->
                    <td><img src="../foto_produk/<?php echo $data['foto_produk']; ?>" width="100"></td> <!-- Menampilkan foto produk dengan lebar 100px -->
                    <td>
                        <!-- Tombol untuk mengubah produk -->
                        <a href="index.php?halaman=ubahproduk&id=<?php echo $data['id_produk']; ?>" class="btn btn-warning">Update</a>
                        <!-- Tombol untuk menghapus produk -->
                        <a href="index.php?halaman=hapusproduk&id=<?php echo $data['id_produk']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php 
            } // Akhir dari while loop
            ?>
        </tbody>    
    </table>
</div>
<!-- Tombol untuk menambah produk baru, ditempatkan di bawah tabel -->
<a href="index.php?halaman=tambahproduk" class="btn btn-primary">Tambah Produk</a>
