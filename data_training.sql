-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2020 at 01:29 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_training`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `pelanggan` varchar(30) NOT NULL,
  `kartu` enum('prabayar','pascabayar') NOT NULL,
  `panggilan` enum('sedikit','banyak','cukup') NOT NULL,
  `blok` enum('rendah','sedang','tinggi') NOT NULL,
  `bonus` enum('ya','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `pelanggan`, `kartu`, `panggilan`, `blok`, `bonus`) VALUES
(1, 'Andi', 'prabayar', 'sedikit', 'sedang', 'tidak'),
(2, 'Budi', 'pascabayar', 'banyak', 'sedang', 'ya'),
(3, 'Citra', 'prabayar', 'banyak', 'sedang', 'ya'),
(4, 'Dedi', 'prabayar', 'banyak', 'rendah', 'tidak'),
(5, 'Evan', 'pascabayar', 'cukup', 'tinggi', 'ya'),
(6, 'Feni', 'pascabayar', 'cukup', 'sedang', 'ya'),
(7, 'Gito', 'prabayar', 'cukup', 'sedang', 'ya'),
(8, 'Hani', 'prabayar', 'cukup', 'rendah', 'tidak'),
(9, 'Jodi', 'pascabayar', 'sedikit', 'tinggi', 'ya'),
(10, 'Kafi', 'pascabayar', 'banyak', 'tinggi', 'ya'),
(11, 'Linda', 'pascabayar', 'sedikit', 'rendah', 'ya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
