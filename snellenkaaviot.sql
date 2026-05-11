-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2026 at 10:53 AM
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
-- Database: `snellenkaaviot`
--

-- --------------------------------------------------------

--
-- Table structure for table `kaaviot`
--

CREATE TABLE `kaaviot` (
  `id` int(11) NOT NULL,
  `nimi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kirjautuminen`
--

CREATE TABLE `kirjautuminen` (
  `id` int(11) NOT NULL,
  `nimi` varchar(255) NOT NULL,
  `sahkoposti` varchar(255) NOT NULL,
  `salasana` varchar(255) NOT NULL,
  `rooli` set('ADMIN','NORMI','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kirjautuminen`
--

INSERT INTO `kirjautuminen` (`id`, `nimi`, `sahkoposti`, `salasana`, `rooli`) VALUES
(1, 'kasper', 'kasper@gmail.com', '111', 'ADMIN'),
(2, 'elias', 'elias@gmail.com', '222', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kaaviot`
--
ALTER TABLE `kaaviot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kirjautuminen`
--
ALTER TABLE `kirjautuminen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kaaviot`
--
ALTER TABLE `kaaviot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kirjautuminen`
--
ALTER TABLE `kirjautuminen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
