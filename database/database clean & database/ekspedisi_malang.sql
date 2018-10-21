-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2018 at 01:45 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekspedisi_malang`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `nama`, `harga`) VALUES
(1, 'Pecah Belah', 20000),
(2, 'Baju', 15000),
(3, 'Elektronik', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id` int(11) NOT NULL,
  `kota` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `kota`, `harga`) VALUES
(1, 'Surabaya', 30000),
(10, 'Sidoarjo', 18000);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `nama`) VALUES
(1, 'admin'),
(2, 'petugas'),
(3, 'pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(96) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `alamat`, `telp`, `email`, `username`, `password`, `fk_level`) VALUES
(1, 'Dita', 'Kedungkandang', '082245414188', 'frtiarad@gmail.com', 'fransiskatd', '132cfbe739cacb218811af21ce10227e', 2),
(4, 'Aldhan', 'Lumajang', '08999', 'aldansorry@gmail.com', 'aldhan', '5ba5e84a80b832715a8152fe53918bb7', 1),
(5, 'Reksa', 'Purwodadi', '089999', 'reksaaf@gmail.com', 'reksa', '81ac3d0ba6272b1e34628238951aa188', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `penerima` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resi` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `deskripsi` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_petugas` int(11) NOT NULL,
  `fk_pelanggan` int(11) NOT NULL,
  `fk_kota` int(11) NOT NULL,
  `fk_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_level` (`fk_level`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_petugas` (`fk_petugas`),
  ADD KEY `fk_pelanggan` (`fk_pelanggan`),
  ADD KEY `fk_kota` (`fk_kota`),
  ADD KEY `fk_jenis` (`fk_jenis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
