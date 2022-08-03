-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 04, 2022 at 12:49 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `pass` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `pass`) VALUES
(8, 'ilhamramadhan', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `kd_bulan` varchar(10) NOT NULL,
  `nama_bulan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`kd_bulan`, `nama_bulan`) VALUES
('01', 'Januari'),
('02', 'Februari'),
('03', 'Maret'),
('04', 'April'),
('05', 'Mei'),
('06', 'Juni'),
('07', 'July'),
('08', 'Agustus'),
('09', 'September'),
('10', 'Oktober'),
('11', 'November'),
('12', 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `data_penjualan`
--

CREATE TABLE `data_penjualan` (
  `kd_bulan` varchar(10) NOT NULL,
  `tahun` varchar(10) DEFAULT NULL,
  `penjualan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_penjualan`
--

INSERT INTO `data_penjualan` (`kd_bulan`, `tahun`, `penjualan`) VALUES
('01', '2021', 273),
('02', '2021', 301),
('03', '2021', 173),
('04', '2021', 323),
('05', '2021', 332),
('06', '2021', 247),
('07', '2021', 334),
('08', '2021', 337),
('09', '2021', 338),
('10', '2021', 299),
('11', '2021', 241),
('12', '2021', 341);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(8) NOT NULL,
  `tahun_penjualan` varchar(10) DEFAULT NULL,
  `promosi` int(10) DEFAULT NULL,
  `jumlah_penjualan` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `tahun_penjualan`, `promosi`, `jumlah_penjualan`) VALUES
(1, '2000', 16, 1000),
(2, '2001', 32, 2109),
(3, '2002', 41, 3320),
(4, '2003', 40, 3249),
(5, '2004', 12, 1000),
(6, '2005', 51, 4032),
(7, '2006', 50, 5023),
(8, '2007', 42, 3540),
(9, '2008', 45, 3650),
(10, '2009', 51, 5124);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_acak`
--

CREATE TABLE `penjualan_acak` (
  `no` int(3) NOT NULL,
  `kd_bulan` varchar(10) NOT NULL,
  `bilangan_acak` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_acak`
--

INSERT INTO `penjualan_acak` (`no`, `kd_bulan`, `bilangan_acak`) VALUES
(0, '01', 8),
(0, '02', 77),
(0, '03', 2),
(0, '04', 62),
(0, '05', 14),
(0, '06', 92),
(0, '07', 89),
(0, '08', 32),
(0, '09', 38),
(0, '10', 53);

-- --------------------------------------------------------

--
-- Table structure for table `range_penjualan`
--

CREATE TABLE `range_penjualan` (
  `penjualan` int(5) NOT NULL,
  `awal` int(5) NOT NULL,
  `akhir` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `range_penjualan`
--

INSERT INTO `range_penjualan` (`penjualan`, `awal`, `akhir`) VALUES
(273, 1, 9),
(301, 10, 19),
(173, 20, 25),
(323, 26, 36),
(332, 37, 47),
(247, 48, 55),
(334, 56, 66),
(337, 67, 77),
(338, 78, 88),
(299, 89, 98);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`kd_bulan`);

--
-- Indexes for table `data_penjualan`
--
ALTER TABLE `data_penjualan`
  ADD PRIMARY KEY (`kd_bulan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan_acak`
--
ALTER TABLE `penjualan_acak`
  ADD PRIMARY KEY (`kd_bulan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_penjualan`
--
ALTER TABLE `data_penjualan`
  ADD CONSTRAINT `data_penjualan_ibfk_1` FOREIGN KEY (`kd_bulan`) REFERENCES `bulan` (`kd_bulan`);

--
-- Constraints for table `penjualan_acak`
--
ALTER TABLE `penjualan_acak`
  ADD CONSTRAINT `penjualan_acak_ibfk_1` FOREIGN KEY (`kd_bulan`) REFERENCES `bulan` (`kd_bulan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
