-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2022 at 09:41 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shikayaat`
--

-- --------------------------------------------------------

--
-- Table structure for table `systemv`
--

CREATE TABLE `systemv` (
  `variable_id` int(11) NOT NULL,
  `variable` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `systemv`
--

INSERT INTO `systemv` (`variable_id`, `variable`, `value`) VALUES
(1, 'SITE_DIR', 'http://127.0.0.1/shikayaat/'),
(2, 'SITE_HOME', 'http://127.0.0.1/shikayaat/'),
(3, 'SITE_NAME', 'shikayaat'),
(4, 'SITE_ICON', 'assets/images/favicon.ico'),
(5, 'SITE_LOGO', 'assets/images/logo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `systemv`
--
ALTER TABLE `systemv`
  ADD PRIMARY KEY (`variable_id`),
  ADD UNIQUE KEY `variable` (`variable`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `systemv`
--
ALTER TABLE `systemv`
  MODIFY `variable_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
