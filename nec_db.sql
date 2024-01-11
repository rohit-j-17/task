-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 04, 2024 at 01:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
(3, 7, 'dd70e701f40c72fd730fcee023a436');

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
(1, 'Swapnil', 'Chowkekar', 'swapnil123', '1e3rfdesdv', NULL),
(2, 'Swapnil', 'Chowkekar', 'swapnil876', '$2y$10$J/5R6V2Vs1/bY8FMSCq99uf.YP2fV7VJgC6rvrPHRvoLRPDBT4HnC', NULL),
(3, 'Swapnil', 'CHowkekar', '213Swa', '$2y$10$sdo9S2Q2Eun0wMWrd6flZuaTpF6yyB3x.dlHnhg2fw.tpj.BP8LOi', NULL),
(4, 'Swapnil', 'Chowkekar', 'swaobil1', '$2y$10$vAdSkGglW5vW1Jd62IPho.hFcUF.kvG8Ifa.tTFb5kS582x4hJkwa', NULL),
(5, 'Swapnil', 'Chowkekar', 'swapnil65678', '$2y$10$xqe1sVXO9pG0lm.LeGrLoOGqP5kAcKKNsPN8FSGv13OjzEYmvRKQC', NULL),
(6, 'Swapnil', 'Chowkekar', 'swapnil567876', '$2y$10$66ctwO3aq60psiRXyO9yEu9L3EPYGM5Oqj9x8aUNQVKotrL6Vs0xW', NULL),
(7, 'Swapnil', 'Chowkekar', 'swapnil786', 'e10adc3949ba59abbe56e057f20f883e', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authtoken`
--
ALTER TABLE `authtoken`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
