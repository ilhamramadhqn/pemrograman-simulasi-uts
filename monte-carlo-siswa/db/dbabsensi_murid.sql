-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2019 at 01:33 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbabsensi_murid`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen2016_2017`
--

CREATE TABLE `absen2016_2017` (
  `kd_bulan` varchar(10) NOT NULL,
  `kehadiran` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen2016_2017`
--

INSERT INTO `absen2016_2017` (`kd_bulan`, `kehadiran`) VALUES
('01', 147),
('02', 320),
('03', 322),
('04', 335),
('05', 337),
('06', 272),
('07', 273),
('08', 302),
('09', 342),
('10', 287);

-- --------------------------------------------------------

--
-- Table structure for table `absen2017_2018`
--

CREATE TABLE `absen2017_2018` (
  `kd_bulan` varchar(10) NOT NULL,
  `kehadiran` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen2017_2018`
--

INSERT INTO `absen2017_2018` (`kd_bulan`, `kehadiran`) VALUES
('01', 273),
('02', 301),
('03', 173),
('04', 323),
('05', 332),
('06', 247),
('07', 334),
('08', 337),
('09', 338),
('10', 299);

-- --------------------------------------------------------

--
-- Table structure for table `acak2016_2017`
--

CREATE TABLE `acak2016_2017` (
  `kd_bulan` varchar(10) NOT NULL,
  `bilangan_acak` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acak2016_2017`
--

INSERT INTO `acak2016_2017` (`kd_bulan`, `bilangan_acak`) VALUES
('01', 8),
('02', 77),
('03', 2),
('04', 62),
('05', 14),
('06', 92),
('07', 89),
('08', 32),
('09', 38),
('10', 53);

-- --------------------------------------------------------

--
-- Table structure for table `acak2017_2018`
--

CREATE TABLE `acak2017_2018` (
  `no` int(3) NOT NULL,
  `kd_bulan` varchar(10) NOT NULL,
  `bilangan_acak` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acak2017_2018`
--

INSERT INTO `acak2017_2018` (`no`, `kd_bulan`, `bilangan_acak`) VALUES
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
('01', 'Juli'),
('02', 'Agustus'),
('03', 'September'),
('04', 'Oktober'),
('05', 'November'),
('06', 'Desember'),
('07', 'Januari'),
('08', 'Februari'),
('09', 'Maret'),
('10', 'April'),
('11', 'Mei'),
('12', 'Juni');

-- --------------------------------------------------------

--
-- Table structure for table `range2016_2017`
--

CREATE TABLE `range2016_2017` (
  `kehadiran` int(5) NOT NULL,
  `awal` int(5) NOT NULL,
  `akhir` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `range2016_2017`
--

INSERT INTO `range2016_2017` (`kehadiran`, `awal`, `akhir`) VALUES
(147, 1, 5),
(320, 6, 16),
(322, 17, 27),
(335, 28, 38),
(337, 39, 49),
(272, 50, 58),
(273, 59, 67),
(302, 68, 77),
(342, 78, 89),
(287, 90, 99);

-- --------------------------------------------------------

--
-- Table structure for table `range2017_2018`
--

CREATE TABLE `range2017_2018` (
  `kehadiran` int(5) NOT NULL,
  `awal` int(5) NOT NULL,
  `akhir` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `range2017_2018`
--

INSERT INTO `range2017_2018` (`kehadiran`, `awal`, `akhir`) VALUES
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
-- Indexes for table `absen2016_2017`
--
ALTER TABLE `absen2016_2017`
  ADD PRIMARY KEY (`kd_bulan`);

--
-- Indexes for table `absen2017_2018`
--
ALTER TABLE `absen2017_2018`
  ADD PRIMARY KEY (`kd_bulan`);

--
-- Indexes for table `acak2016_2017`
--
ALTER TABLE `acak2016_2017`
  ADD PRIMARY KEY (`kd_bulan`);

--
-- Indexes for table `acak2017_2018`
--
ALTER TABLE `acak2017_2018`
  ADD PRIMARY KEY (`kd_bulan`);

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`kd_bulan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen2016_2017`
--
ALTER TABLE `absen2016_2017`
  ADD CONSTRAINT `absen2016_2017_ibfk_1` FOREIGN KEY (`kd_bulan`) REFERENCES `bulan` (`kd_bulan`);

--
-- Constraints for table `absen2017_2018`
--
ALTER TABLE `absen2017_2018`
  ADD CONSTRAINT `absen2017_2018_ibfk_1` FOREIGN KEY (`kd_bulan`) REFERENCES `bulan` (`kd_bulan`);

--
-- Constraints for table `acak2016_2017`
--
ALTER TABLE `acak2016_2017`
  ADD CONSTRAINT `acak2016_2017_ibfk_1` FOREIGN KEY (`kd_bulan`) REFERENCES `bulan` (`kd_bulan`);

--
-- Constraints for table `acak2017_2018`
--
ALTER TABLE `acak2017_2018`
  ADD CONSTRAINT `acak2017_2018_ibfk_1` FOREIGN KEY (`kd_bulan`) REFERENCES `bulan` (`kd_bulan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
