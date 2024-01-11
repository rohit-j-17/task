-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:4306
-- Generation Time: Jan 11, 2024 at 10:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nec_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `authtoken`
--

CREATE TABLE `authtoken` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authtoken`
--

INSERT INTO `authtoken` (`id`, `user_id`, `token`) VALUES
(1, 7, '2541e997737c15d19390ab10f82a82'),
(2, 7, 'd6d5953d1d3340d862049f59045c4e'),
(3, 7, 'dd70e701f40c72fd730fcee023a436'),
(4, 7, '78df8a7b59eb248ae6f319d4f55914'),
(5, 8, '43cbc261f7ba75fea2f28534228834'),
(6, 8, 'adceace60f9901432c295a9197bfeb'),
(7, 8, '97f0238e03adcef8ca84c0211ecf2f'),
(8, 8, '8e77728ae8136f40b0f09128d9e3da'),
(9, 8, '18c2fd58b9e96b005607f96ffd7c6a'),
(10, 8, 'b1f9a5c041fc10edd7a735ca705c01'),
(11, 8, 'd68898b0e3f9aec4ce71ec7d7d2c11'),
(12, 8, 'c4042df99d7311802ebd7e2bffbf1e'),
(13, 8, '7f9243eb32e4a3b4d13f792b44d635'),
(14, 8, '250c7d11af4f5162c995a654b89bde'),
(15, 8, '1e5d9b70e7a15fffbcdd926a424361');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `user_id`, `file`) VALUES
(1, 1, 'Consent Terms 040124_ Print out -1setA4 (1) (1).pdf'),
(2, 1, 'Final CT VGM 5Jan 2024 PDF.pdf'),
(3, 1, 'Final CT VGM 5Jan 2024 PDF.pdf'),
(4, 1, 'Final CT VGM 5Jan 2024 PDF.pdf'),
(5, 1, 'Final CT VGM 5Jan 2024 PDF.pdf'),
(6, 1, 'Final CT VGM 5Jan 2024 PDF.pdf'),
(7, 1, 'Final CT VGM 5Jan 2024 PDF.pdf'),
(8, 1, 'Final CT VGM 5Jan 2024 PDF.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `file` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `password`, `file`) VALUES
(8, 'Rohit', 'Jadhav', 'rohitrjadhav19@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authtoken`
--
ALTER TABLE `authtoken`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authtoken`
--
ALTER TABLE `authtoken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
