-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2021 at 02:57 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idbarang` varchar(5) NOT NULL,
  `idcustomer` varchar(5) NOT NULL,
  `namabarang` varchar(50) NOT NULL,
  `jumlahbarang` int(11) DEFAULT NULL,
  `beratbarang` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idbarang`, `idcustomer`, `namabarang`, `jumlahbarang`, `beratbarang`) VALUES
('B0145', '17534', 'celana dalam', 1, 0.3),
('B0255', '17649', 'jaket', 1, 0.2),
('B0347', '17649', 'jas,celana,kaos,rok', 4, 1.2),
('B0423', '17556', 'celana jean', 2, 0.5),
('B0589', '17894', 'kaos,celana', 2, 0.5),
('B0746', '17556', 'kaos,kemeja,jaket', 3, 0.8),
('B0872', '17894', 'kemeja,dasi,kaos,rok,topi', 5, 1.4);

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `idcabang` varchar(5) NOT NULL,
  `alamatcabang` varchar(55) NOT NULL,
  `notelpcabang` varchar(15) NOT NULL,
  `jamoperasional` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`idcabang`, `alamatcabang`, `notelpcabang`, `jamoperasional`) VALUES
('078', 'jl.mekar sempurna no.33A', '08216692455', '08.00 - 20.00'),
('C45', 'apartemen aston marina ancol ruko 20c', '085214958297', '08.00 - 20.00'),
('D22', 'jl.sudirman no.45', '085787942134', '08.00 - 20.00'),
('H93', 'jl.buah mekar No.12A', '088864581973', '08.00 - 20.00'),
('L12', 'jl.Suka bunga no.4/c', '089328492357', '08.00 - 20.00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `idcustomer` varchar(5) NOT NULL,
  `namacustomer` varchar(35) NOT NULL,
  `alamat` varchar(55) NOT NULL,
  `notelp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`idcustomer`, `namacustomer`, `alamat`, `notelp`) VALUES
('12345', 'ridhwan', 'bandung', '09789689987'),
('12346', 'megi', 'bandung', '0897986768'),
('12347', 'dean', 'bandung', '8987687989'),
('17534', 'Angga Smit', 'Cicahem', '083394405896'),
('17556', 'a.hendra', 'jl dipatiukur no 3', '08940589456'),
('17649', 'Asep Supriatna', 'rancabuaya', '085983475090'),
('17894', 'John Takor', 'Rancakalong', '081895479835');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `idpegawai` char(2) NOT NULL,
  `idcabang` varchar(5) NOT NULL,
  `namapegawai` varchar(35) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`idpegawai`, `idcabang`, `namapegawai`, `username`, `password`) VALUES
('10', 'C45', 'Rahmat', 'Rahmat', 'd3d9446802a44259755d38e6d163e820'),
('12', 'C45', 'Lusi', 'Lusi', 'c20ad4d76fe97759aa27a0c99bff6710'),
('13', 'C45', 'Nanda', 'Nanda', 'c51ce410c124a10e0db5e4b97fc2af39'),
('14', 'C45', 'Susan', 'Susan', 'aab3238922bcc25a6f606eb525ffdc56'),
('16', 'D22', 'Yogi', 'Yogi', 'c74d97b01eae257e44aa9d5bade97baf');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idpembayaran` varchar(5) NOT NULL,
  `idbarang` varchar(5) NOT NULL,
  `idpegawai` char(2) NOT NULL,
  `tglterima` date DEFAULT NULL,
  `totalharga` int(11) DEFAULT NULL,
  `uangmuka` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`idpembayaran`, `idbarang`, `idpegawai`, `tglterima`, `totalharga`, `uangmuka`) VALUES
('40215', 'B0145', '10', '2021-05-15', 5000, 5000),
('41348', 'B0746', '12', '2021-04-04', 59000, 25000),
('41560', 'B0872', '14', '2021-04-02', 92000, 45000),
('42162', 'B0423', '12', '2021-04-13', 51000, 30000),
('42502', 'B0347', '13', '2021-04-21', 75000, 35000),
('46457', 'B0589', '14', '2021-04-29', 37000, 15000),
('47785', 'B0255', '13', '2021-04-16', 15000, 10000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`),
  ADD KEY `idcustomer` (`idcustomer`);

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`idcabang`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idcustomer`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`idpegawai`),
  ADD KEY `idcabang` (`idcabang`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idpembayaran`),
  ADD KEY `idbarang` (`idbarang`),
  ADD KEY `idpegawai` (`idpegawai`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`idcustomer`) REFERENCES `customer` (`idcustomer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`idcabang`) REFERENCES `cabang` (`idcabang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`idpegawai`) REFERENCES `pegawai` (`idpegawai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
