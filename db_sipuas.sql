-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2016 at 11:57 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smamardi_sia`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `idAdmin` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(64) NOT NULL,
  `fullname` varchar(64) NOT NULL,
  `lastLogin` datetime DEFAULT NULL,
  `lastIp` varchar(16) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`idAdmin`, `username`, `password`, `email`, `fullname`, `lastLogin`, `lastIp`) VALUES
(1, 'administrator', '$2a$10$J.heQw8H7uFc0yPpBTs9C.TMh17IlQaewJWq3cCFcIEKOzYcFPsZ6', 'admin@sipuas.com', 'Administrator', '2016-02-29 11:39:13', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kuisioner`
--

CREATE TABLE IF NOT EXISTS `tbl_kuisioner` (
  `nomer` varchar(8) NOT NULL,
  `umur` int(11) NOT NULL,
  `jenkel` enum('Laki-Laki','Perempuan') NOT NULL,
  `pendidikan` enum('SD Kebawah','SMP','SMA','Diploma','S1','S2 Keatas') NOT NULL,
  `pekerjaan` enum('PNS/TNI/Polri','Pegawai Swasta','Wiraswasta','Pelajar/Mahasiswa','Lainnya') NOT NULL,
  `prosedur` smallint(6) NOT NULL,
  `persyaratan` smallint(6) NOT NULL,
  `kejelasan` smallint(6) NOT NULL,
  `kedisiplinan` smallint(6) NOT NULL,
  `tanggungjawab` smallint(6) NOT NULL,
  `kemampuan` smallint(6) NOT NULL,
  `kecepatan` smallint(6) NOT NULL,
  `keadilan` smallint(6) NOT NULL,
  `kesopanan` smallint(6) NOT NULL,
  `kewajaranBiaya` smallint(6) NOT NULL,
  `kepastianBiaya` smallint(6) NOT NULL,
  `kepastianJadwal` smallint(6) NOT NULL,
  `kenyamanan` smallint(6) NOT NULL,
  `keamanan` smallint(6) NOT NULL,
  `waktu_pengisian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kuisioner`
--

INSERT INTO `tbl_kuisioner` (`nomer`, `umur`, `jenkel`, `pendidikan`, `pekerjaan`, `prosedur`, `persyaratan`, `kejelasan`, `kedisiplinan`, `tanggungjawab`, `kemampuan`, `kecepatan`, `keadilan`, `kesopanan`, `kewajaranBiaya`, `kepastianBiaya`, `kepastianJadwal`, `kenyamanan`, `keamanan`, `waktu_pengisian`) VALUES
('RSP-0001', 21, 'Laki-Laki', 'S1', 'Wiraswasta', 1, 2, 2, 4, 2, 1, 2, 3, 1, 3, 1, 4, 3, 3, '2016-02-29 10:27:53'),
('RSP-0002', 21, 'Laki-Laki', 'Diploma', 'Pegawai Swasta', 1, 2, 1, 2, 1, 2, 1, 1, 3, 3, 3, 3, 3, 4, '2016-02-29 10:36:27'),
('RSP-0003', 21, 'Laki-Laki', 'Diploma', 'Pelajar/Mahasiswa', 1, 2, 3, 2, 2, 2, 2, 3, 3, 1, 3, 3, 3, 1, '2016-02-29 11:48:04'),
('RSP-0004', 21, 'Laki-Laki', 'S2 Keatas', 'Pegawai Swasta', 1, 2, 2, 1, 4, 2, 3, 3, 3, 3, 1, 3, 3, 2, '2016-02-29 11:53:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `tbl_kuisioner`
--
ALTER TABLE `tbl_kuisioner`
  ADD PRIMARY KEY (`nomer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
