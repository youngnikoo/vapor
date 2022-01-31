-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2022 at 05:35 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kongkow`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `pass_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `pass_admin`) VALUES
(4, 'admin', '$2y$10$IF0Tzca348dHKtbNKVvwV.dl/wjK72m6wyVbdhXlULVWemmG7dUxy'),
(5, 'admin2', '$2y$10$IF0Tzca348dHKtbNKVvwV.dl/wjK72m6wyVbdhXlULVWemmG7dUxy');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `id_kurir` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` varchar(15) NOT NULL,
  `subtotal` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `id_kurir`, `id_pelanggan`, `id_produk`, `jumlah`, `subtotal`) VALUES
(10, 4, 12, 11, '2', '900000'),
(11, 3, 12, 59, '2', '330000'),
(15, 2, 20, 60, '2', '330000'),
(16, 4, 21, 1, '1', '1200000'),
(17, 2, 21, 11, '2', '900000'),
(18, 3, 20, 58, '2', '330000');

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` int(11) NOT NULL,
  `nama_kurir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `nama_kurir`) VALUES
(2, 'JNT'),
(3, 'JNE'),
(4, 'Si Cepat');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kode_pos` varchar(7) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `alamat`, `kota`, `kode_pos`, `no_hp`) VALUES
(12, 'isal', 'kosan', 'Yogyakarta', '12345', '08123456789'),
(20, 'alip', 'dikene', 'Yogyakarta', '12378', '0811111111111'),
(21, 'apis', 'disitu', 'Yogyakarta', '54321', '08112233445');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `img_produk` varchar(255) NOT NULL,
  `jenis_produk` varchar(50) NOT NULL,
  `desc_produk` varchar(100) NOT NULL,
  `harga_produk` varchar(20) NOT NULL,
  `stok` varchar(20) NOT NULL,
  `kategori` enum('vape','liquid','aksesoris') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `img_produk`, `jenis_produk`, `desc_produk`, `harga_produk`, `stok`, `kategori`) VALUES
(1, '1.jpg', 'Banaspati', 'Sebuah Mahakarya Mechanical Vaporizer Yang Dibuat Sedemikian Rupa', '1200000', '4', 'vape'),
(11, 'htcg_(1).jpg', 'Hotcig R233', 'Semi Mechanical Mod With 2 Battery Inside ', '450000', '2', 'vape'),
(54, 'mech_(1)6.png', 'Mechman', 'Mod elektrikal yang mengguanakan 2 slot baterai ', '400000', '1', 'vape'),
(58, 'crf5.jpg', 'Croffle Trouble', 'Liquid dengan rasa croffle yang dibaluti dengan krim dan buah strawberry', '165000', '2', 'liquid'),
(59, 'xes1.jpg', 'Muffin & Xes', 'Liquid dengan rasa kue muffin dengan krim rasa buah strawberry ', '165000', '3', 'liquid'),
(60, 'oat_(1)3.jpg', 'Oat Drips V1', 'Liquid dengan rasa oat dan susu creamy yang nikmat untuk bersantai', '165000', '3', 'liquid'),
(61, 'kit_(1)2.jpg', 'Coil Master', 'Coil Master kit adalah tools untuk membantu para pengguna vape ', '250000', '3', 'aksesoris'),
(62, 'vtc2.jpg', 'VTC 4', 'Baterai sony vtc 4 versi murata yang mumpuni di kelasnya', '50000', '3', 'aksesoris'),
(63, 'prime1.jpg', 'Bacon Prime', 'Kapas cotton bacon prime terbaik di versinya dengan lebih banyak serat ', '65000', '3', 'aksesoris');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `id_transaksi` (`id_kurir`),
  ADD KEY `id_user` (`id_pelanggan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id_kurir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_3` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `detail_transaksi_ibfk_4` FOREIGN KEY (`id_kurir`) REFERENCES `kurir` (`id_kurir`),
  ADD CONSTRAINT `detail_transaksi_ibfk_5` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
