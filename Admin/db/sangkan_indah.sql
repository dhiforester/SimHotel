-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 28, 2025 at 09:23 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sangkan_indah`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

DROP TABLE IF EXISTS `akses`;
CREATE TABLE IF NOT EXISTS `akses` (
  `id_akses` int(10) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `foto` text,
  `akses` varchar(20) NOT NULL COMMENT 'Admin, Customer Service, Pemilik',
  PRIMARY KEY (`id_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id_akses`, `nama`, `kontak`, `email`, `password`, `foto`, `akses`) VALUES
(1, 'Ismail Priyanto', '62819013', 'ismailpriyanto@gmail.com', '2cc213bea7902f31b81e7a2c967ccb98', NULL, 'Admin'),
(4, 'Windy Yanuariska', '089601154721', 'windygiga@gmail.com', 'd748c957a0018bfe3d974f8c44e4f3b7', 'd56c31752fc7327b76c957b59d69e8.jpg', 'Customer Service'),
(5, 'Firli Apriani', '089601154726', 'firliapriani@gmail.com', '0989dfac7199e74519bd8f22b547c736', '2e6de61e4efffc1b08fb1e3c4ad4d6.miui', 'Customer Service'),
(6, 'Dedeh Delawati', '0896011547212', 'dedehdelawati@gmail.com', '8885062356a1a3cf45211ef8d47a1586', '736cbb3470bfd7156233c0e7affcbf.45', 'Customer Service'),
(7, 'Bayu Anugerah', '0895001823', 'bayuanugerah@gmail.com', 'cfd111106dc95e430bf5eff5f2d71b87', 'bfaddb744d31fc7c2805905ac0deeb.jpg', 'Manajer'),
(8, 'Windy Yanuariska', '08936378484', 'windy123@gmail.com', 'f2f430a3707fa8bebb26037cb5c6bf02', 'f691ebe4b152bc28cdaa4c607e0391.jpg', 'Customer Service'),
(9, 'Solihul Hadi', '0896011547262', 'dhiforester@gmail.com', 'f4a3229c9c5f1bdd9c6a6791080791b7', '48de215d7d9c92b820060d15d9c4ec.jpg', 'Customer Service');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
CREATE TABLE IF NOT EXISTS `bank` (
  `id_bank` int(10) NOT NULL AUTO_INCREMENT,
  `nama_bank` text NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `nama_akun` text NOT NULL,
  `logo_bank` text NOT NULL COMMENT 'base64',
  PRIMARY KEY (`id_bank`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `no_rekening`, `nama_akun`, `logo_bank`) VALUES
(4, 'Bank Central Asia (BCA)', '428101028495538', 'PT.Sangkan Indah Hotel', '10f32076ab40f8240344e9d0f2a97d.png'),
(5, 'Bank Mandiri', '100928488492', 'PT.Sangkan Indah Hotel', '4c23bd51e99e477e3ec35a02082c56.jpg'),
(6, 'Bank Rakyat Indonesia (BRI)', '1009284884923', 'PT.Sangkan Indah Hotel', 'ce440034830b7e88b51bf0e401afd0.png');

-- --------------------------------------------------------

--
-- Table structure for table `chating`
--

DROP TABLE IF EXISTS `chating`;
CREATE TABLE IF NOT EXISTS `chating` (
  `id_chating` int(10) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(20) NOT NULL COMMENT 'AdminToPelanggan, PelangganToAdmin',
  `id_akses` int(10) NOT NULL,
  `id_pelanggan` int(10) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `pesan` text NOT NULL,
  `status` varchar(20) NOT NULL COMMENT 'Pending, Dibaca',
  PRIMARY KEY (`id_chating`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

DROP TABLE IF EXISTS `diskon`;
CREATE TABLE IF NOT EXISTS `diskon` (
  `id_diskon` int(10) NOT NULL AUTO_INCREMENT,
  `id_kamar` int(10) NOT NULL,
  `tanggal_mulai` varchar(30) NOT NULL,
  `tanggal_selesai` varchar(30) NOT NULL,
  `diskon` int(10) NOT NULL,
  PRIMARY KEY (`id_diskon`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `id_kamar`, `tanggal_mulai`, `tanggal_selesai`, `diskon`) VALUES
(1, 5, '2023-06-12', '2023-06-16', 20),
(2, 4, '2023-06-12', '2023-06-16', 10),
(4, 2, '2023-06-01', '2023-06-30', 40);

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

DROP TABLE IF EXISTS `kamar`;
CREATE TABLE IF NOT EXISTS `kamar` (
  `id_kamar` int(10) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(10) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `nama_kamar` text NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(10) NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`id_kamar`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `id_kategori`, `kategori`, `nama_kamar`, `deskripsi`, `harga`, `foto`) VALUES
(2, 6, 'Suit', 'Suit Single Room', 'Kamar Hotel Suite Single adalah pilihan mewah bagi tamu yang menginginkan pengalaman menginap yang eksklusif dan pribadi. Dengan desain yang elegan dan perabotan yang mewah, kamar ini menawarkan ruang yang luas dan fasilitas kelas atas. Kamar dilengkapi dengan tempat tidur king-size yang mewah, area duduk terpisah untuk relaksasi, meja kerja yang nyaman, dan TV layar datar. Kamar mandi mewah dengan bathtub terpisah dan perlengkapan mandi berkualitas tinggi memberikan kemewahan ekstra. Tamu juga dapat menikmati akses Wi-Fi gratis, minibar, dan layanan kamar 24 jam. Kamar Hotel Suite Single memberikan pengalaman menginap yang tak terlupakan bagi para tamu yang menginginkan kemewahan dan privasi.', 600000, 'b37810388d655d5d26b2551424c609.jpg'),
(3, 9, 'Standard', 'Standard Single', 'Kamar Hotel Standard Single adalah pilihan yang sempurna bagi tamu yang mencari penginapan yang nyaman dan terjangkau dalam perjalanan mereka sendirian. Kamar ini dirancang dengan tata letak fungsional dan desain sederhana yang memberikan kenyamanan maksimal dalam ruang yang kompak. Dilengkapi dengan tempat tidur tunggal yang nyaman dan perlengkapan berkualitas, kamar ini menawarkan tempat yang ideal untuk beristirahat setelah hari yang panjang. Fasilitas lainnya termasuk meja kerja kecil, televisi, akses Wi-Fi gratis, dan kamar mandi pribadi dengan perlengkapan mandi dasar. Kamar Hotel Standard Single menyediakan pengalaman menginap yang nyaman dan praktis bagi para wisatawan solo dengan harga yang terjangkau.', 300000, 'f31ca037b68f555cd659143a7f0282.jpg'),
(4, 9, 'Standard', 'Standard Twin Room', 'Kamar Hotel Standard adalah pilihan ideal bagi tamu yang menginginkan akomodasi yang nyaman dan terjangkau. Dengan desain sederhana namun fungsional, kamar ini menawarkan tempat yang nyaman untuk beristirahat setelah hari yang sibuk. Kamar ini dilengkapi dengan tempat tidur yang nyaman, meja kerja, dan area duduk kecil untuk relaksasi. Dekorasi yang sederhana dan nuansa warna netral menciptakan suasana yang tenang dan santai. Fasilitas termasuk televisi, akses Wi-Fi gratis, dan kamar mandi pribadi dengan perlengkapan mandi dasar. Kamar Hotel Standard adalah pilihan yang ideal untuk penginapan yang nyaman dengan harga yang terjangkau.', 200000, '71d529c88f36f8f017de599fa36086.jpg'),
(5, 10, 'Delux', 'Delux Twin Room', 'Kamar Hotel Deluxe adalah pilihan akomodasi yang mewah dan nyaman bagi tamu yang mencari pengalaman menginap yang istimewa. Dengan desain yang elegan dan perabotan berkualitas tinggi, kamar ini menawarkan suasana yang menyenangkan dan layanan yang luar biasa.\r\n\r\nKetika Anda memasuki kamar Hotel Deluxe, Anda akan disambut dengan atmosfer yang tenang dan rileks. Dinding berwarna netral yang dipadukan dengan sentuhan aksen yang indah menciptakan ruang yang hangat dan menyambut. Pencahayaan yang lembut dan terukur menambah suasana santai yang sempurna.', 300000, 'd49d418ec4ea15c8b510f1acfc1e22.jpg'),
(6, 8, 'Transit', 'Transit Single Room', 'Kamar Hotel Transit Single adalah pilihan ideal bagi tamu yang sedang melakukan perjalanan singkat atau transit. Dengan desain yang praktis dan fungsional, kamar ini menawarkan kenyamanan yang sesuai dengan kebutuhan tamu yang sedang dalam perjalanan. Kamar ini dilengkapi dengan tempat tidur yang nyaman, meja kerja kecil, dan kamar mandi pribadi dengan perlengkapan mandi dasar. Meskipun ukurannya lebih kecil, kamar ini tetap memberikan suasana yang nyaman dan tenang. Tamu juga dapat menikmati akses Wi-Fi gratis dan layanan kamar yang cepat. Kamar Hotel Transit Single adalah pilihan yang praktis dan terjangkau untuk penginapan singkat dalam perjalanan Anda.', 150000, '04d95a155c94696d2531daefb8e3dd.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `kamar_foto`
--

DROP TABLE IF EXISTS `kamar_foto`;
CREATE TABLE IF NOT EXISTS `kamar_foto` (
  `id_kamar_foto` int(10) NOT NULL AUTO_INCREMENT,
  `id_kamar` int(10) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`id_kamar_foto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(10) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(50) NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `foto`) VALUES
(6, 'Suit', '179c251b3ad863981af91bc42efb09.jpg'),
(7, 'Family', '776d0960f80fdf53d0c7c5b82b296c.jpg'),
(8, 'Transit', 'c31bc3fc72344ec7b4622002e03cb7.jpg'),
(9, 'Standard', '24614e791b9d7768166267ba949e8d.jpg'),
(10, 'Delux', 'afbf3aacc6932d567efbd8cd714cd0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT,
  `tanggal_daftar` varchar(30) NOT NULL,
  `nama` text NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `no_identitas` varchar(30) NOT NULL COMMENT 'KTP, SIM, Passport',
  `alamat` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `foto` text,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `tanggal_daftar`, `nama`, `kontak`, `no_identitas`, `alamat`, `email`, `password`, `foto`) VALUES
(2, '2023-06-09 02:14:25', 'Solihul Hadi', '089601154721', '1231222', '', 'dhiforester@gmail.com', 'f4a3229c9c5f1bdd9c6a6791080791b7', ''),
(3, '2023-06-13 08:05:47', 'Dewi Widiastuti', '089600012301', '3200918299281', '', 'dewiwidiastuti@gmail.com', '35bbd42323b0a6f4693aadf671260ef5', '1cd2faefd72cd2de5a5db9fd6be105.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reting`
--

DROP TABLE IF EXISTS `reting`;
CREATE TABLE IF NOT EXISTS `reting` (
  `id_reting` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(10) NOT NULL,
  `id_kamar` int(10) NOT NULL,
  `id_transaksi` int(10) NOT NULL,
  `reting` int(10) NOT NULL COMMENT '1-5',
  PRIMARY KEY (`id_reting`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reting`
--

INSERT INTO `reting` (`id_reting`, `id_pelanggan`, `id_kamar`, `id_transaksi`, `reting`) VALUES
(1, 3, 5, 2, 4),
(2, 3, 3, 3, 3),
(3, 3, 3, 3, 3),
(4, 3, 3, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

DROP TABLE IF EXISTS `testimoni`;
CREATE TABLE IF NOT EXISTS `testimoni` (
  `id_testimoni` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(10) NOT NULL,
  `id_transaksi` int(10) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `testimoni` text NOT NULL,
  `status` varchar(20) NOT NULL COMMENT 'Pending, Publish, Draft',
  PRIMARY KEY (`id_testimoni`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `id_pelanggan`, `id_transaksi`, `tanggal`, `testimoni`, `status`) VALUES
(1, 3, 2, '2023-06-13 08:58:21', 'sangat memuaskan, pelayanan sangat bagus', 'Publish'),
(2, 3, 3, '2023-06-13 09:36:01', 'terima kasih', 'Draft'),
(4, 3, 4, '2023-06-13 09:38:07', 'test', 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(10) NOT NULL,
  `id_bank` int(10) NOT NULL,
  `id_kamar` int(10) NOT NULL,
  `tanggal` varchar(30) NOT NULL COMMENT 'tanggal transaksi',
  `checkin` varchar(30) NOT NULL COMMENT 'YYYY/mm/dd',
  `checkout` varchar(30) NOT NULL COMMENT 'YYYY/mm/dd',
  `harga` int(10) NOT NULL,
  `jumlah_hari` int(10) NOT NULL,
  `diskon` int(10) DEFAULT NULL COMMENT 'Rp',
  `jumlah` int(10) DEFAULT NULL,
  `status_pembayaran` varchar(20) NOT NULL COMMENT 'Lunas, Pending, Batal',
  `status_kamar` varchar(20) NOT NULL COMMENT 'Batal, Booked, Checkin, Checkout',
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `id_bank`, `id_kamar`, `tanggal`, `checkin`, `checkout`, `harga`, `jumlah_hari`, `diskon`, `jumlah`, `status_pembayaran`, `status_kamar`) VALUES
(1, 2, 4, 6, '2023-06-09 02:15', '2023-06-12', '2023-06-13', 150000, 1, 0, 150000, 'Lunas', 'Booked'),
(2, 3, 4, 5, '2023-06-13 08:06', '2023-06-14', '2023-06-15', 300000, 1, 60000, 240000, 'Lunas', 'Checkout'),
(3, 3, 5, 3, '2023-06-13 09:31', '2023-06-19', '2023-06-20', 300000, 1, 0, 300000, 'Lunas', 'Checkout'),
(4, 3, 4, 3, '2023-06-13 09:36', '2023-06-14', '2023-06-16', 300000, 2, 0, 600000, 'Lunas', 'Checkout');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
