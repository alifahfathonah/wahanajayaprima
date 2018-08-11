-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 11, 2018 at 10:18 AM
-- Server version: 10.0.36-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wahanaja_wahanajayaprima`
--

-- --------------------------------------------------------

--
-- Table structure for table `basecamp`
--

CREATE TABLE `basecamp` (
  `id` int(11) NOT NULL,
  `nama_basecamp` varchar(100) NOT NULL,
  `pemilik` varchar(100) DEFAULT NULL,
  `nama_lokasi` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kepala_basecamp` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basecamp`
--

INSERT INTO `basecamp` (`id`, `nama_basecamp`, `pemilik`, `nama_lokasi`, `provinsi`, `kepala_basecamp`, `created_by`, `created_date`, `edited_by`, `edited_date`) VALUES
(1, 'BASECAMP 1', 'tes', 'asd', 'asd', 'asd', '', '0000-00-00 00:00:00', 'admin', '2017-10-07 07:29:46'),
(2, 'BASECAMP 2', NULL, '', '', '', '', '0000-00-00 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jam_lembur` int(11) NOT NULL,
  `uang_lembur` int(11) NOT NULL,
  `gaji_lembur` int(11) NOT NULL,
  `uang_makan` int(11) NOT NULL,
  `gaji_harian` int(11) NOT NULL,
  `total_gaji` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`id_gaji`, `id_proyek`, `nama`, `jam_lembur`, `uang_lembur`, `gaji_lembur`, `uang_makan`, `gaji_harian`, `total_gaji`, `status`, `created_by`, `created_date`, `edited_by`, `edited_date`) VALUES
(1, 1, '1', 10, 4000, 40000, 30000, 60000, 130000, 1, 'admin', '2017-04-24 11:35:05', 'admin', '2017-11-28 09:36:16'),
(2, 1, 'budi', 10, 2000, 20000, 30000, 50000, 100000, 0, 'admin', '2017-04-25 05:52:10', NULL, NULL),
(3, 1, 'iswanto', 10, 20000, 200000, 10000, 10000, 220000, 0, 'admin', '2017-10-07 07:54:54', 'admin', '2017-10-07 08:08:37'),
(4, 1, 'x', 10, 2000, 20000, 10000, 5000, 35000, 0, 'admin', '2017-11-28 09:31:31', NULL, NULL),
(5, 1, 'A 1', 3, 20000, 60000, 10000, 50000, 120000, 0, 'AdminLap', '2017-12-09 06:07:59', NULL, NULL),
(6, 8, 'AA', 2, 20000, 40000, 15000, 50000, 105000, 1, 'Pandutaruna', '2018-02-28 10:48:02', 'Pandu-lap', '2018-02-28 10:56:20'),
(7, 8, 'BB', 2, 20000, 40000, 15000, 45000, 100000, 0, 'Pandutaruna', '2018-02-28 10:48:24', NULL, NULL),
(8, 8, 'CC', 2, 20000, 40000, 15000, 40000, 95000, 0, 'Pandutaruna', '2018-02-28 10:48:43', NULL, NULL),
(9, 8, 'DD', 2, 20000, 40000, 15000, 50000, 105000, 0, 'Pandutaruna', '2018-02-28 10:49:14', NULL, NULL),
(10, 8, 'EE', 2, 20000, 40000, 15000, 55000, 110000, 0, 'Pandutaruna', '2018-02-28 10:49:34', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `history_lokasi`
--

CREATE TABLE `history_lokasi` (
  `id` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `tipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan_ritasi_aspal`
--

CREATE TABLE `kendaraan_ritasi_aspal` (
  `id_kendaraan` int(11) NOT NULL,
  `no_polisi` varchar(100) NOT NULL,
  `id_basecamp` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` date NOT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendaraan_ritasi_aspal`
--

INSERT INTO `kendaraan_ritasi_aspal` (`id_kendaraan`, `no_polisi`, `id_basecamp`, `id_proyek`, `created_by`, `created_date`, `edited_by`, `edited_date`) VALUES
(1, 'BR1134', 1, 1, 'admin', '2017-04-25', NULL, NULL),
(2, 'BR1135', 1, 1, 'admin', '2017-04-25', NULL, NULL),
(3, 'BR 9999', 1, 1, 'admin', '2017-10-07', NULL, NULL),
(4, '90', 0, 1, 'admin', '2017-11-28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan_ritasi_material`
--

CREATE TABLE `kendaraan_ritasi_material` (
  `id_kendaraan` int(11) NOT NULL,
  `no_polisi` varchar(100) NOT NULL,
  `id_basecamp` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` date NOT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendaraan_ritasi_material`
--

INSERT INTO `kendaraan_ritasi_material` (`id_kendaraan`, `no_polisi`, `id_basecamp`, `id_proyek`, `created_by`, `created_date`, `edited_by`, `edited_date`) VALUES
(1, 'BR1134', 1, 1, 'admin', '2017-04-25', NULL, NULL),
(2, 'BR1135', 1, 1, 'admin', '2017-04-25', NULL, NULL),
(3, 'BR1134', 2, 1, 'admin', '2017-04-25', NULL, NULL),
(4, 'BR 0001', 1, 1, 'admin', '2017-10-07', NULL, NULL),
(5, 'BR 0001', 1, 1, 'admin', '2017-10-07', NULL, NULL),
(6, 'RRR', 6, 1, 'admin', '2017-11-28', NULL, NULL),
(7, '9121212', 0, 7, 'admin', '2017-11-28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lain`
--

CREATE TABLE `lain` (
  `id_lain` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `harga_total` int(11) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lain`
--

INSERT INTO `lain` (`id_lain`, `id_proyek`, `nama_barang`, `jumlah`, `harga_satuan`, `harga_total`, `created_by`, `created_date`, `edited_by`, `edited_date`) VALUES
(1, 1, 'kulkas', 9, 20000, 180000, 'admin', '2017-04-25 06:33:05', 'admin', '2017-04-25 06:55:59'),
(2, 1, 'meja', 1000, 100000, 100000000, 'admin', '2017-10-07 08:24:39', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `nama_lokasi` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `nama_lokasi`, `created_by`, `created_date`, `edited_by`, `edited_date`) VALUES
(1, 'BUATAN 1', '', '0000-00-00 00:00:00', NULL, NULL),
(2, 'BUATAN 2', '', '0000-00-00 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `tgl_pengumuman` date NOT NULL,
  `judul_pengumuman` varchar(100) NOT NULL,
  `isi_pengumuman` text NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` varchar(100) NOT NULL,
  `edited_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `tgl_pengumuman`, `judul_pengumuman`, `isi_pengumuman`, `created_by`, `created_date`, `edited_by`, `edited_date`) VALUES
(1, '0000-00-00', 'HATI-HATI SAAT BEKERJA', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(2, '0000-00-00', 'SEKIAN.', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(3, '2017-10-07', 'Pengumuman 1', '', 'admin', '2017-10-07 06:20:42', 'admin', '2017-10-07 06:20:42'),
(4, '2017-10-11', 'PENGUMUMAN 2', '', 'admin', '2017-10-11 12:54:43', 'admin', '2017-10-11 12:54:43'),
(5, '2018-02-28', 'TESTING IN PROGRESS 28/2/18', '', 'admin', '2018-02-28 10:31:02', 'admin', '2018-02-28 10:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `id` int(11) NOT NULL,
  `nama_proyek` varchar(100) DEFAULT NULL,
  `penawar` varchar(100) DEFAULT NULL,
  `satker` varchar(100) DEFAULT NULL,
  `paket` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `nomor_kontrak` varchar(100) DEFAULT NULL,
  `tanggal_kontrak` date DEFAULT NULL,
  `masa_pelaksanaan` varchar(100) DEFAULT NULL,
  `sisa_hari` int(11) DEFAULT NULL,
  `nama_basecamp` varchar(100) DEFAULT NULL,
  `pemilik` varchar(100) DEFAULT NULL,
  `nama_lokasi` varchar(100) DEFAULT NULL,
  `kepala_basecamp` varchar(100) DEFAULT NULL,
  `tipe` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` int(11) DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id`, `nama_proyek`, `penawar`, `satker`, `paket`, `provinsi`, `nomor_kontrak`, `tanggal_kontrak`, `masa_pelaksanaan`, `sisa_hari`, `nama_basecamp`, `pemilik`, `nama_lokasi`, `kepala_basecamp`, `tipe`, `created_by`, `created_date`, `edited_by`, `edited_date`) VALUES
(1, 'PROYEK A', 'ad', 'asd', 'asd', 'asd', 'ads', '2017-10-01', 'asd', NULL, NULL, NULL, NULL, NULL, 'Proyek', '', '0000-00-00 00:00:00', 0, '2017-11-28 09:14:43'),
(2, 'PROYEK B', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Proyek', '', '0000-00-00 00:00:00', NULL, NULL),
(3, 'Proyek 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Proyek', 'admin', '2017-08-07 07:20:59', NULL, NULL),
(4, 'Proyek 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Proyek', 'admin', '2017-10-07 06:33:59', NULL, NULL),
(5, 'Proyek X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Proyek', 'admin', '2017-11-28 09:14:53', NULL, NULL),
(8, 'Proyek Testing 01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Proyek', 'admin', '2018-02-28 10:32:08', NULL, NULL),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Basecamp Testing 01', NULL, NULL, NULL, 'Basecamp', 'admin', '2018-02-28 10:32:38', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ritasi_aspal`
--

CREATE TABLE `ritasi_aspal` (
  `id_ritasi` int(11) NOT NULL,
  `id_kendaraan` int(11) NOT NULL,
  `asal` int(11) NOT NULL,
  `tujuan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_berangkat` int(11) NOT NULL,
  `menit_berangkat` int(11) NOT NULL,
  `aspal` varchar(100) NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `keterangan_berangkat` text NOT NULL,
  `jam_tiba` int(11) DEFAULT NULL,
  `menit_tiba` int(11) DEFAULT NULL,
  `jarak` int(11) DEFAULT NULL,
  `keterangan_tiba` text,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ritasi_aspal`
--

INSERT INTO `ritasi_aspal` (`id_ritasi`, `id_kendaraan`, `asal`, `tujuan`, `tanggal`, `jam_berangkat`, `menit_berangkat`, `aspal`, `ukuran`, `satuan`, `keterangan_berangkat`, `jam_tiba`, `menit_tiba`, `jarak`, `keterangan_tiba`, `created_by`, `created_date`, `edited_by`, `edited_date`) VALUES
(1, 1, 1, 1, '2017-04-25', 1, 2, 'test', '10', 'Ton', 'yrst', 23, 59, 100, 'test', 'admin', '2017-04-25 07:45:06', 'admin', '2017-08-07 08:46:42'),
(2, 2, 2, 2, '2017-04-25', 1, 2, 'ATB', 'test', 'Ton', 'test', 2, 3, 4, '5', 'admin', '2017-04-25 08:34:06', 'admin', '2017-04-25 08:34:11'),
(3, 3, 2, 4, '2017-10-07', 2, 3, 'ATB', '4', 'Ton', 'bagius', NULL, NULL, NULL, NULL, 'admin', '2017-10-07 08:35:03', 'admin', '2017-10-07 09:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `ritasi_material`
--

CREATE TABLE `ritasi_material` (
  `id_ritasi` int(11) NOT NULL,
  `id_kendaraan` int(11) NOT NULL,
  `asal` int(11) NOT NULL,
  `tujuan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_berangkat` int(11) NOT NULL,
  `menit_berangkat` int(11) NOT NULL,
  `material` varchar(100) NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `keterangan_berangkat` text NOT NULL,
  `jam_tiba` int(11) DEFAULT NULL,
  `menit_tiba` int(11) DEFAULT NULL,
  `jarak` int(11) DEFAULT NULL,
  `keterangan_tiba` text,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ritasi_material`
--

INSERT INTO `ritasi_material` (`id_ritasi`, `id_kendaraan`, `asal`, `tujuan`, `tanggal`, `jam_berangkat`, `menit_berangkat`, `material`, `ukuran`, `satuan`, `keterangan_berangkat`, `jam_tiba`, `menit_tiba`, `jarak`, `keterangan_tiba`, `created_by`, `created_date`, `edited_by`, `edited_date`) VALUES
(1, 1, 1, 1, '2017-08-07', 1, 2, 'test2', '10', 'Ton', 'yrst', 23, 59, 100, 'test', 'admin', '2017-04-25 07:45:06', 'admin', '2017-08-07 08:44:07'),
(2, 5, 1, 3, '2017-10-07', 1, 2, '3', '4', 'Ton', 'bebek', 2, 2, 3, '4', 'admin', '2017-10-07 08:33:41', 'admin', '2017-10-07 09:00:00'),
(3, 6, 6, 3, '2017-11-28', 10, 20, 'est', 'test', 'Ton', 'test', 20, 30, 40, 'test', 'admin', '2017-11-28 09:37:05', 'admin', '2017-11-28 09:37:14'),
(4, 7, 6, 3, '2017-11-28', 1, 2, '3', '4', 'Ton', '5', NULL, NULL, NULL, NULL, 'admin', '2017-11-28 11:03:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `hp` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `hp`, `status`, `role`, `created_by`, `created_date`, `edited_by`, `edited_date`) VALUES
(1, 'admin', '9dd4e461268c8034f5c8564e155c67a6', 'Administrator', NULL, 'Aktif', 'Admin', 'SYSTEM', '2016-10-22 00:00:00', NULL, NULL),
(2, 'lapangan', '9dd4e461268c8034f5c8564e155c67a6', 'Lapangan', NULL, '', 'Lapangan', '', '0000-00-00 00:00:00', NULL, NULL),
(3, 'kantor', '9dd4e461268c8034f5c8564e155c67a6', 'Kantor', NULL, '', 'Kantor', '', '0000-00-00 00:00:00', NULL, NULL),
(4, 'proyek', '9dd4e461268c8034f5c8564e155c67a6', 'kepala proyek', NULL, '', 'Kepala Proyek', '', '0000-00-00 00:00:00', NULL, NULL),
(5, 'basecamp', '9dd4e461268c8034f5c8564e155c67a6', '', NULL, '', 'Kepala Basecamp', '', '0000-00-00 00:00:00', NULL, NULL),
(6, 'AdminLap', 'fbade9e36a3f36d3d676c1b808451dd7', '', NULL, 'Aktif', 'Admin Lapangan', 'admin', '2017-12-09 06:05:00', NULL, NULL),
(7, 'Pandutaruna', '19140234ae78483bb19c41885d4002aa', '', NULL, 'Aktif', 'Admin', 'admin', '2018-02-28 10:33:16', NULL, NULL),
(8, 'Pandu-lap', '19140234ae78483bb19c41885d4002aa', '', NULL, 'Aktif', 'Admin lapangan', 'Pandutaruna', '2018-02-28 10:51:08', NULL, NULL),
(9, 'pandu', '727ca8d27dc76f34cf01544303f57d13', '', NULL, 'Aktif', 'w4hana', 'admin', '2018-05-22 06:19:35', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_akses`
--

CREATE TABLE `user_akses` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `username`, `tanggal`) VALUES
(1, 'admin', '2017-07-25 07:00:11'),
(2, 'admin', '2017-08-07 07:09:30'),
(3, 'admin', '2017-08-19 07:18:41'),
(4, 'admin', '2017-08-21 07:50:33'),
(5, 'admin', '2017-10-07 06:11:35'),
(6, 'admin', '2017-10-07 09:03:37'),
(7, 'admin', '2017-10-11 12:53:49'),
(8, 'admin', '2017-10-27 11:24:54'),
(9, 'admin', '2017-11-05 06:22:03'),
(10, 'admin', '2017-11-19 04:13:43'),
(11, 'admin', '2017-11-28 07:02:59'),
(12, 'admin', '2017-11-28 09:00:27'),
(13, 'admin', '2017-11-28 11:06:05'),
(14, 'admin', '2017-12-07 04:42:40'),
(15, 'admin', '2017-12-09 05:57:04'),
(16, 'admin', '2017-12-09 06:03:29'),
(17, 'adminlap', '2017-12-09 06:06:35'),
(18, 'admin', '2017-12-22 11:11:58'),
(19, 'admin', '2017-12-22 12:12:46'),
(20, 'admin', '2018-02-28 10:30:23'),
(21, 'admin', '2018-02-28 10:31:19'),
(22, 'pandutaruna', '2018-02-28 10:45:38'),
(23, 'pandu-lap', '2018-02-28 10:53:06'),
(24, 'pandutaruna', '2018-02-28 11:39:45'),
(25, 'admin', '2018-05-09 10:39:33'),
(26, 'admin', '2018-05-09 03:06:09'),
(27, 'lapangan', '2018-05-09 03:06:42'),
(28, 'Admin', '2018-05-10 02:15:23'),
(29, 'Admin', '2018-05-10 03:39:27'),
(30, 'Admin', '2018-05-10 03:39:47'),
(31, 'Admin', '2018-05-10 03:40:22'),
(32, 'Admin', '2018-05-10 03:41:19'),
(33, 'Admin', '2018-05-13 12:03:42'),
(34, 'Admin', '2018-05-13 12:03:45'),
(35, 'Admin', '2018-05-13 12:03:58'),
(36, 'Admin', '2018-05-13 12:04:17'),
(37, 'Admin', '2018-05-13 12:04:29'),
(38, 'admin', '2018-05-22 06:17:44'),
(39, 'pandu', '2018-05-22 06:21:04'),
(40, 'admin', '2018-06-09 12:59:08'),
(41, 'test-pandu', '2018-06-09 01:01:06'),
(42, 'test-pandu', '2018-06-09 01:04:56'),
(43, 'admin', '2018-06-09 04:17:35'),
(44, 'admin', '2018-06-09 06:54:41'),
(45, 'admin', '2018-06-15 03:29:31'),
(46, 'admin', '2018-06-16 04:54:36'),
(47, 'admin', '2018-06-21 03:25:25'),
(48, 'admin', '2018-06-27 08:05:32'),
(49, 'admin', '2018-06-28 09:44:59'),
(50, 'pandu', '2018-06-28 09:46:36'),
(51, 'pandu', '2018-06-28 09:47:18'),
(52, 'admin', '2018-06-28 09:49:21'),
(53, 'rully', '2018-06-28 09:50:53'),
(54, 'admin', '2018-07-04 04:24:37'),
(55, 'admin', '2018-07-04 04:25:12'),
(56, 'admin', '2018-07-15 10:22:28'),
(57, 'admin', '2018-07-16 08:15:49'),
(58, 'admin', '2018-07-19 07:56:23'),
(59, 'admin', '2018-07-19 07:57:13'),
(60, 'admin', '2018-07-19 07:58:18'),
(61, 'admin', '2018-07-20 11:48:00'),
(62, 'pandu', '2018-07-20 11:49:16'),
(63, 'admin', '2018-07-31 09:29:19'),
(64, 'admin', '2018-08-01 01:07:58'),
(65, 'pandu', '2018-08-01 01:12:11'),
(66, 'pandu', '2018-08-01 01:12:30'),
(67, 'admin', '2018-08-09 01:21:42'),
(68, 'admin', '2018-08-11 08:13:54'),
(69, 'admin', '2018-08-11 08:26:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_lokasi`
--

CREATE TABLE `user_lokasi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `tipe_lokasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_lokasi`
--

INSERT INTO `user_lokasi` (`id`, `id_user`, `id_lokasi`, `tipe_lokasi`) VALUES
(13, 1, 1, 'Proyek'),
(14, 1, 2, 'Proyek'),
(15, 1, 5, 'Proyek'),
(16, 1, 6, 'Basecamp'),
(17, 1, 7, 'Basecamp'),
(18, 6, 1, 'Proyek'),
(19, 6, 3, 'Proyek'),
(20, 6, 6, 'Basecamp'),
(21, 7, 8, 'Proyek'),
(22, 7, 9, 'Basecamp'),
(23, 8, 8, 'Proyek'),
(24, 9, 1, 'Proyek'),
(25, 9, 2, 'Proyek'),
(26, 9, 3, 'Proyek'),
(27, 9, 4, 'Proyek'),
(28, 9, 5, 'Proyek'),
(29, 9, 8, 'Proyek');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basecamp`
--
ALTER TABLE `basecamp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `history_lokasi`
--
ALTER TABLE `history_lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kendaraan_ritasi_aspal`
--
ALTER TABLE `kendaraan_ritasi_aspal`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `kendaraan_ritasi_material`
--
ALTER TABLE `kendaraan_ritasi_material`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `lain`
--
ALTER TABLE `lain`
  ADD PRIMARY KEY (`id_lain`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ritasi_aspal`
--
ALTER TABLE `ritasi_aspal`
  ADD PRIMARY KEY (`id_ritasi`);

--
-- Indexes for table `ritasi_material`
--
ALTER TABLE `ritasi_material`
  ADD PRIMARY KEY (`id_ritasi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_akses`
--
ALTER TABLE `user_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_lokasi`
--
ALTER TABLE `user_lokasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basecamp`
--
ALTER TABLE `basecamp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `history_lokasi`
--
ALTER TABLE `history_lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kendaraan_ritasi_aspal`
--
ALTER TABLE `kendaraan_ritasi_aspal`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kendaraan_ritasi_material`
--
ALTER TABLE `kendaraan_ritasi_material`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lain`
--
ALTER TABLE `lain`
  MODIFY `id_lain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ritasi_aspal`
--
ALTER TABLE `ritasi_aspal`
  MODIFY `id_ritasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ritasi_material`
--
ALTER TABLE `ritasi_material`
  MODIFY `id_ritasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_akses`
--
ALTER TABLE `user_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `user_lokasi`
--
ALTER TABLE `user_lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
