-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2022 at 12:40 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evancend_akuntansi`
--

-- --------------------------------------------------------

--
-- Table structure for table `aset_tetap`
--

CREATE TABLE `aset_tetap` (
  `id_aset_tetap` int(11) NOT NULL,
  `no_aset_tetap` varchar(15) DEFAULT NULL,
  `coa` varchar(10) DEFAULT NULL,
  `KODE_UNIT` varchar(10) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `no_voucher` varchar(25) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `satuan` varchar(15) DEFAULT NULL,
  `umur_ekonomis` int(5) DEFAULT NULL,
  `tgl` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `author` varchar(20) DEFAULT NULL,
  `set_time` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aset_tetap`
--

INSERT INTO `aset_tetap` (`id_aset_tetap`, `no_aset_tetap`, `coa`, `KODE_UNIT`, `keterangan`, `no_voucher`, `jumlah`, `satuan`, `umur_ekonomis`, `tgl`, `status`, `author`, `set_time`) VALUES
(2, '00001', '1', '60101', 'test keterangan', '938931/sh1u9/18d', 1, 'Pc', 20, '2005-01-16', 'CLOSE', 'superadmin', '17-02-2022'),
(3, '1019', '1', '70103', 'AC Split Sanyo (SPBU)', 'KP-2/0175/I/2010', 1, 'Pc', 60, '2010-01-26', 'CLOSE', 'superadmin', '17-02-2022'),
(4, '1019', '1', '70103', 'AC Split Sanyo (SPBU)', 'KP-2/0175/I/2010', 1, 'Pc', 60, '2010-01-26', 'OPEN', 'superadmin', '17-02-2022'),
(5, '1020', '1', '70101', 'AC Split Sanyo (H. Nadim)', 'KP-2/0175/I/2010', 1, 'Pc', 60, '2010-01-26', 'OPEN', 'superadmin', '17-02-2022'),
(6, '1021', '1', '40102', 'Monitor LCD LG 15 (Umum)', 'KP-2/0203/I/2010', 1, 'Pc', 60, '2010-01-29', 'OPEN', 'superadmin', '17-02-2022');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `NIP` varchar(20) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `role` varchar(5) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `author` varchar(15) DEFAULT NULL,
  `set_time` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `NIP`, `username`, `email`, `password`, `type`, `role`, `status`, `author`, `set_time`) VALUES
(14, 'superadmin', 'Evan Cendekia', 'evan.cendekia@gmail.com', '0192023a7bbd73250516f069df18b500', 'Super Admin', '1', NULL, NULL, NULL),
(17, '91020460', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', 'user', '1', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aset_tetap`
--
ALTER TABLE `aset_tetap`
  ADD PRIMARY KEY (`id_aset_tetap`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aset_tetap`
--
ALTER TABLE `aset_tetap`
  MODIFY `id_aset_tetap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
