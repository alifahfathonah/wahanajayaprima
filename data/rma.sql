-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2016 at 04:14 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rma`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip`
--

CREATE TABLE IF NOT EXISTS `arsip` (
`arsip_id` int(11) NOT NULL,
  `no_tanda_terima` varchar(100) NOT NULL,
  `rma_id` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE IF NOT EXISTS `distributor` (
`distributor_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `edited_by` varchar(100) NOT NULL,
  `edited_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `follow_up`
--

CREATE TABLE IF NOT EXISTS `follow_up` (
`follow_up_id` int(11) NOT NULL,
  `rma_id` int(11) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `tgl_followup` date NOT NULL,
  `keterangan` text NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history_rma`
--

CREATE TABLE IF NOT EXISTS `history_rma` (
`history_id` int(11) NOT NULL,
  `rma_id` int(11) NOT NULL,
  `tgl_history` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rma`
--

CREATE TABLE IF NOT EXISTS `rma` (
`rma_id` int(11) NOT NULL,
  `rma_no` varchar(100) NOT NULL,
  `rma_date` date NOT NULL,
  `distributor_id` int(11) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `barang` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL,
  `keluhan` text NOT NULL,
  `sn` varchar(100) NOT NULL,
  `no_nota` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `no_resi` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `tgl_followup` date NOT NULL,
  `notifikasi_sms` int(11) NOT NULL,
  `notifikasi_email` int(11) NOT NULL,
  `notifikasi_telp` int(11) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edited_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `created_by`, `created_date`, `edited_by`, `edited_date`) VALUES
(1, 'rma', '9dd4e461268c8034f5c8564e155c67a6', 'system', '2016-02-12 00:00:00', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsip`
--
ALTER TABLE `arsip`
 ADD PRIMARY KEY (`arsip_id`);

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
 ADD PRIMARY KEY (`distributor_id`);

--
-- Indexes for table `follow_up`
--
ALTER TABLE `follow_up`
 ADD PRIMARY KEY (`follow_up_id`);

--
-- Indexes for table `history_rma`
--
ALTER TABLE `history_rma`
 ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `rma`
--
ALTER TABLE `rma`
 ADD PRIMARY KEY (`rma_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arsip`
--
ALTER TABLE `arsip`
MODIFY `arsip_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `distributor`
--
ALTER TABLE `distributor`
MODIFY `distributor_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `follow_up`
--
ALTER TABLE `follow_up`
MODIFY `follow_up_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `history_rma`
--
ALTER TABLE `history_rma`
MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rma`
--
ALTER TABLE `rma`
MODIFY `rma_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
