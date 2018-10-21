-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2018 at 01:46 PM
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
-- Database: `ekspedisi_pusat`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `id` int(11) NOT NULL,
  `kode` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id`, `kode`, `nama`, `kota`, `alamat`) VALUES
(2, '092', 'Ekspedisi-malang', 'Malang', 'Malang Kota'),
(3, '082', 'Ekspedisi-surabaya', 'Surabaya', 'Surabaya Kota');

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
(2, 'operator'),
(3, 'pengirim');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `fk_cabang` int(11) NOT NULL,
  `resi` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pengirim` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pengirim` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat` int(11) NOT NULL,
  `deskripsi` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_tujuan` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penerima` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_penerima` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `deskripsi_status` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_posisi` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id`, `tanggal`, `fk_cabang`, `resi`, `nama_pengirim`, `alamat_pengirim`, `jenis`, `berat`, `deskripsi`, `kota_tujuan`, `nama_penerima`, `alamat_penerima`, `status`, `deskripsi_status`, `kota_posisi`) VALUES
(1, '2018-10-21 11:56:00', 2, '09220181021858000001', 'Jelita', 'Magetan', 'Pecah Belah', 1, '123', 'Surabaya', 'Aldhan', 'Surabaya', 2, 'Diterima di cabang Surabaya', 'Surabaya'),
(2, '2018-10-21 11:56:00', 2, '09220181021762900002', 'Jelita', 'Magetan', 'Pecah Belah', 1, '1', 'Surabaya', '1', '1', 2, 'Diterima di cabang Surabaya', 'Surabaya');

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
(1, 'admin', 'admin', '123', 'admin@admin.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'Jelita', 'Magetan', '08999', 'jelitasm@gmail.com', 'jelita', '222609554b94fcf8a0befd7c3ce47b03', 3),
(3, 'reksa', 'reksa', '123', 'reksa@reksa.reksa', 'reksa', '81ac3d0ba6272b1e34628238951aa188', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id` int(11) NOT NULL,
  `kode` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_berangkat` datetime DEFAULT NULL,
  `tgl_sampai` datetime DEFAULT NULL,
  `fk_pengirim` int(11) NOT NULL,
  `fk_cabang_dari` int(11) NOT NULL,
  `fk_cabang_ke` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `deskripsi_status` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id`, `kode`, `tgl_berangkat`, `tgl_sampai`, `fk_pengirim`, `fk_cabang_dari`, `fk_cabang_ke`, `status`, `deskripsi_status`) VALUES
(1, 'EKSP2469', '2018-10-21 12:44:00', '2018-10-21 12:55:00', 2, 2, 3, 1, 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman_detail`
--

CREATE TABLE `pengiriman_detail` (
  `id` int(11) NOT NULL,
  `fk_pengiriman` int(11) NOT NULL,
  `fk_paket` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengiriman_detail`
--

INSERT INTO `pengiriman_detail` (`id`, `fk_pengiriman`, `fk_paket`, `status`) VALUES
(1, 1, 1, 3),
(2, 1, 2, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cabang` (`fk_cabang`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_level` (`fk_level`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cabang_dari` (`fk_cabang_dari`),
  ADD KEY `fk_cabang_ke` (`fk_cabang_ke`),
  ADD KEY `fk_pengirim` (`fk_pengirim`);

--
-- Indexes for table `pengiriman_detail`
--
ALTER TABLE `pengiriman_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pengiriman` (`fk_pengiriman`),
  ADD KEY `fk_paket` (`fk_paket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengiriman_detail`
--
ALTER TABLE `pengiriman_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
