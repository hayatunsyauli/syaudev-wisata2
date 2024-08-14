-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2024 at 07:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paket_wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `pemesan`
--

CREATE TABLE `pemesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` int(15) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `jumlah_hari` int(11) NOT NULL,
  `akomodasi` varchar(1) NOT NULL,
  `transportasi` varchar(1) NOT NULL,
  `servis` varchar(1) NOT NULL,
  `jumlah_peserta` int(11) NOT NULL,
  `harga_paket` int(50) NOT NULL,
  `total_tagihan` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesan`
--

INSERT INTO `pemesan` (`id`, `nama`, `no_hp`, `tanggal_pesan`, `jumlah_hari`, `akomodasi`, `transportasi`, `servis`, `jumlah_peserta`, `harga_paket`, `total_tagihan`) VALUES
(1, 'sauli', 192, '2024-08-14', 2, 'N', 'Y', 'Y', 3, 1700000, 10200000),
(4, 'hayatun syauli', 85222222, '2024-08-14', 3, 'N', 'Y', 'Y', 2, 1700000, 10200000),
(5, 'putra', 22222, '2024-08-14', 3, 'Y', 'N', 'Y', 5, 1500000, 22500000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pemesan`
--
ALTER TABLE `pemesan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemesan`
--
ALTER TABLE `pemesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
