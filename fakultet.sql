-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2019 at 12:28 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fakultet`
--
CREATE DATABASE IF NOT EXISTS `fakultet` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fakultet`;

-- --------------------------------------------------------

--
-- Table structure for table `predmeti`
--

CREATE TABLE `predmeti` (
  `id` int(11) NOT NULL,
  `naziv` varchar(20) NOT NULL,
  `semestar` int(11) NOT NULL,
  `vrsta` varchar(20) NOT NULL,
  `brojPrijavljenih` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `predmeti`
--

INSERT INTO `predmeti` (`id`, `naziv`, `semestar`, `vrsta`, `brojPrijavljenih`) VALUES
(1, 'Matematika 1', 1, 'obavezni', 500),
(2, 'Matematika 2', 2, 'obavezni', 400),
(3, 'Matematika 3', 3, 'obavezni', 300),
(4, 'Programiranje 1', 2, 'obavezni', 500),
(5, 'Ekonomija', 1, 'obavezni', 400),
(6, 'Engleski 1', 1, 'obavezni', 400);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `predmeti`
--
ALTER TABLE `predmeti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `predmeti`
--
ALTER TABLE `predmeti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
