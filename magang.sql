-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2022 at 12:34 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magang`
--

-- --------------------------------------------------------

--
-- Table structure for table `kartu_barang`
--

CREATE TABLE `kartu_barang` (
  `no` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `masuk` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kartu_barang`
--

INSERT INTO `kartu_barang` (`no`, `tanggal`, `masuk`, `keluar`, `sisa`, `keterangan`) VALUES
(1, '2022-11-15', 7000, 5000, 2000, 'Test 1'),
(2, '2022-11-22', 3750, 750, 3000, 'test 2');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `firstname` text DEFAULT NULL,
  `lastname` text DEFAULT NULL,
  `nohp` text DEFAULT NULL,
  `jabatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `username`, `pass`, `firstname`, `lastname`, `nohp`, `jabatan`) VALUES
(1, 'agus', 'akutampan', 'agus', 'samsudin', '081970654362', 'ketua'),
(2, 'nadya', 'luwak', 'nadya', 'nurul', '085847362139', 'anggota');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kartu_barang`
--
ALTER TABLE `kartu_barang`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kartu_barang`
--
ALTER TABLE `kartu_barang`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
