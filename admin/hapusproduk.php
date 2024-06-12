<?php 
    // Ambil data produk berdasarkan id_produk yang diterima dari parameter GET
    $query = $conn->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
    $data = $query->fetch_assoc();
    
    // Ambil nama file foto produk
    $fotoproduk = $data['foto_produk'];
    
    // Jika file foto produk ada di direktori, hapus file tersebut
    if (file_exists("../foto_produk/$fotoproduk")) {
        unlink("../foto_produk/$fotoproduk");
    }

    // Hapus data produk dari database berdasarkan id_produk yang diterima dari parameter GET
    $conn->query("DELETE FROM produk WHERE id_produk='$_GET[id]'");

    // Tampilkan pesan bahwa produk berhasil dihapus
    echo "<script>alert('Produk Berhasil Dihapus');</script>";
    
    // Redirect ke halaman daftar produk
    echo "<script>location='index.php?halaman=produk'</script>";
?> 
