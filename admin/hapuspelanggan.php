<?php 
    // Ambil data pelanggan berdasarkan ID dari parameter URL
    $query = $conn->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
    // Ambil baris hasil query sebagai array asosiatif
    $data = $query->fetch_assoc();

    // Hapus data pelanggan dari database berdasarkan ID dari parameter URL
    $conn->query("DELETE FROM pelanggan WHERE id_pelanggan='$_GET[id]'");

    // Tampilkan pesan bahwa pelanggan berhasil dihapus
    echo "<script>alert('Pelanggan Berhasil Dihapus');</script>";

    // Arahkan pengguna ke halaman daftar pelanggan
    echo "<script>location='index.php?halaman=pelanggan';</script>";
?>
