-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2024 at 07:41 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw2024_tubes_233040118`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'Administator');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id_likes` int NOT NULL,
  `id_pelanggan` int NOT NULL,
  `id_produk` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int NOT NULL,
  `email_pelanggan` varchar(100) DEFAULT NULL,
  `password_pelanggan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nama_pelanggan` varchar(100) DEFAULT NULL,
  `telepon_pelanggan` varchar(15) DEFAULT NULL,
  `alamat_pelanggan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `foto_profil` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`, `foto_profil`) VALUES
(1, 'ananditaputri1307@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Anandita Putri Salsabila Athaya', '083222222222', 'Asrama Putri UNPAS, Bandung, Jawa Barat', 'profile.jpg'),
(7, 'anandiraqueen@gmail.com', '6531401f9a6807306651b87e44c05751', 'anandira shaqueena athaya', '083748911139', 'Rusunawa UNPAS, Bandung, Jawa Barat', NULL),
(8, 'maelani@gmail.com', '202cb962ac59075b964b07152d234b70', 'maelani', '083827999', 'bandung', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int NOT NULL,
  `tanggal_pembelian` date DEFAULT NULL,
  `jumlah_pembelian` int DEFAULT NULL,
  `ongkir` int DEFAULT NULL,
  `total_pembelian` int DEFAULT NULL,
  `id_pelanggan` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int NOT NULL,
  `jumlah` int DEFAULT NULL,
  `id_pembelian` int DEFAULT NULL,
  `id_produk` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int NOT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `harga_produk` int DEFAULT NULL,
  `stok` int DEFAULT NULL,
  `foto_produk` varchar(100) DEFAULT NULL,
  `deskripsi_produk` text,
  `likes` int NOT NULL,
  `id_warung` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `stok`, `foto_produk`, `deskripsi_produk`, `likes`, `id_warung`) VALUES
(1, 'Choco Malt', 20000, 1000, 'Choco Malt.jpg', 'Choco Malt adalah pilihan yang sempurna bagi mereka yang mencari minuman cokelat dengan rasa yang lebih kompleks dan mendalam. Kombinasi cokelat dan malt memberikan pengalaman rasa yang lezat dan memuaskan, baik disajikan panas maupun dingin.', 1000, 3),
(2, 'Cheese Cream', 10000, 1000, 'Cheese Cream.jpg', 'Minuman cheese cream adalah minuman yang menggabungkan rasa manis dan gurih dalam satu sajian. Biasanya terdiri dari dua bagian utama: bagian bawah yang bisa berupa kopi susu, dan lapisan atas berupa krim keju yang lembut dan sedikit asin.', 100, 3),
(3, 'Dark Choco Cheese', 13000, 1000, 'Dark Choco Cheese.jpg', '									Dark Choco Cheese adalah minuman yang menggabungkan cokelat manis dengan lapisan parutan keju gurih di atasnya. Minuman ini disajikan dalam cup transparan, menampilkan kontras antara cokelat gelap dan parutan keju putih. Sensasi pertama adalah creamy dari keju, diikuti oleh rasa cokelat yang memanjakan. 						', 99, 3),
(4, 'Choco Whipped Cream', 999999, 500, 'Choco Whipped Cream.jpg', 'Choco Whipped Cream, atau krim kocok cokelat, adalah varian dari krim kocok yang ditambahkan cokelat untuk memberikan rasa cokelat yang kaya dan lezat. Ini sering digunakan sebagai topping untuk berbagai hidangan penutup seperti kue, pie, es krim, minuman kopi, atau bahkan sebagai elemen dekoratif pada berbagai sajian.\r\n', 50, 1),
(5, 'Chocolate Powder', 1000000, 500, 'Chocolate Powder.jpg', '			Cokelat bubuk dan gula dilarutkan dalam sedikit air panas, kemudian dicampur dengan susu dingin dan es batu. Minuman ini memberikan kesegaran sekaligus rasa cokelat yang kaya, ideal untuk dinikmati saat cuaca panas.		', 900, 2),
(6, 'Choco Cereal', 999999, 500, 'Choco Cereal.jpg', 'Choco Cereal adalah minuman yang menyegarkan dan menggugah selera dengan perpaduan antara cokelat yang kaya dan rasa gurih dari sereal. Minuman ini biasanya disajikan dingin atau dengan es batu untuk menambah kesegaran. Cokelat yang digunakan dapat bervariasi dari cokelat hitam, susu, hingga cokelat putih, sesuai dengan preferensi pengkonsumen. Sereal seperti cornflakes, atau sereal gandum bisa menjadi tambahan untuk menambahkan tekstur dan cita rasa yang khas.', 190, 2),
(7, 'Choco Crunch', 1000000, 100, 'Choco Crunch.jpg', 'Choco Crunch adalah minuman yang menggugah selera dengan perpaduan yang menggiurkan antara rasa cokelat yang kaya dan tekstur renyah dari butiran cokelat. Minuman ini biasanya disajikan dingin atau dengan tambahan es untuk memberikan sensasi kesegaran yang menyenangkan. Rasa cokelat yang dominan memberikan kesan manis yang memikat, sementara butiran cokelat yang renyah menambah dimensi tekstur yang memuaskan.', 550, 3),
(8, 'Choco Latte', 99999, 400, 'Choco Latte.jpg', 'Choco Latte adalah minuman yang menggabungkan kelezatan cokelat dan kehangatan latte, menciptakan perpaduan sempurna antara rasa manis cokelat dan kelembutan kopi susu. Minuman ini biasanya terdiri dari bahan-bahan utama seperti susu, cokelat, dan espresso.', 330, 1),
(9, 'Special Chocolate', 99999, 100, 'Special Chocolate.jpg', 'Special Chocolate adalah minuman berbasis cokelat yang dirancang untuk memberikan pengalaman rasa yang mewah dan memanjakan. Dibuat dengan bahan-bahan berkualitas tinggi dan kadang-kadang dengan tambahan unik, Special Chocolate menawarkan lebih dari sekadar secangkir cokelat panas biasa ada juga ice.', 2000, 2),
(10, 'Ice Chocolate', 99999, 100, 'Ice Chocolate.jpg', 'Ice Chocolate adalah minuman dingin yang menyegarkan dengan rasa cokelat yang kaya dan lezat, cocok untuk dinikmati di cuaca panas atau kapan saja Anda ingin menikmati minuman dingin yang manis dan memanjakan.				', 600, 2),
(11, 'Choco Dino', 1000000, 1000, 'Choco Dino.jpg', 'Choco Dino adalah minuman berbasis cokelat yang populer di kalangan anak-anak dan remaja. Choco Dino memiliki rasa cokelat yang kaya dan lezat. Aroma cokelat yang kuat langsung tercium saat minuman ini disiapkan, memberikan sensasi manis dan menggoda.', 200, 1),
(15, 'Choco Cheese', 15000, 99, 'Choco Cheese.jpg', 'Minuman Choco Cheese adalah minuman yang unik dan menggugah selera yang terdiri dari kombinasi cokelat yang kaya dengan lapisan keju yang lembut dan creamy di atasnya. Biasanya, minuman ini disajikan dalam bentuk minuman dingin, seperti minuman boba atau milkshake.', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `warung`
--

CREATE TABLE `warung` (
  `id_warung` int NOT NULL,
  `nama_warung` varchar(50) DEFAULT NULL,
  `alamat_warung` varchar(100) NOT NULL,
  `telepon_warung` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warung`
--

INSERT INTO `warung` (`id_warung`, `nama_warung`, `alamat_warung`, `telepon_warung`) VALUES
(1, 'mncodrink.id', 'Jabar, Banten & Sumatera', '081229317298'),
(2, 'Milk And Chocolate Bar', 'Jateng & Jakarta', '081228683585'),
(3, 'Milk And Chocolate Drink', 'Jatim', '081228217351');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id_likes`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`),
  ADD KEY `id_pembelian` (`id_pembelian`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_warung` (`id_warung`);

--
-- Indexes for table `warung`
--
ALTER TABLE `warung`
  ADD PRIMARY KEY (`id_warung`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id_likes` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `warung`
--
ALTER TABLE `warung`
  MODIFY `id_warung` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Constraints for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD CONSTRAINT `pembelian_produk_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`),
  ADD CONSTRAINT `pembelian_produk_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_warung`) REFERENCES `warung` (`id_warung`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
