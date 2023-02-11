-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2023 at 03:19 AM
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
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `refno` varchar(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `to_userid` varchar(255) NOT NULL,
  `priorityid` varchar(20) NOT NULL,
  `description` longtext NOT NULL,
  `suggestions` mediumtext NOT NULL,
  `attachments` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`attachments`)),
  `responses` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responses`)),
  `reminders` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`reminders`)),
  `status` varchar(20) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `refno`, `title`, `userid`, `to_userid`, `priorityid`, `description`, `suggestions`, `attachments`, `responses`, `reminders`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(22, '7MS123NEZUC', 'fsdf', 'connect2sazad', 'trans_dept', 'high', 'dsfsd', 'fsdf', '[\"7MS123NEZUC_1.xls\"]', '[]', '[]', 'pending', 0, '2023-01-20 08:28:21', '2023-01-20 08:28:21'),
(23, '0GLKI6WTOQ8', 'werftds', 'connect2sazad', 'acad_dept', 'low', 'gdf', 'dfgdfg', '[\"0GLKI6WTOQ8_1.png\"]', '[]', '[]', 'pending', 0, '2023-01-20 08:47:29', '2023-01-20 08:47:29'),
(24, '3H8REGCMVOP', 'Test', 'connect2sazad', 'trans_dept', 'low', 'test desc', 'test sugg', '[\"3H8REGCMVOP_1.pdf\"]', '[]', '[]', 'pending', 0, '2023-02-11 02:14:06', '2023-02-11 02:14:06');

-- --------------------------------------------------------

--
-- Table structure for table `priorities`
--

CREATE TABLE `priorities` (
  `priorityid` varchar(20) NOT NULL,
  `priority_name` varchar(20) NOT NULL,
  `is_priority` tinyint(1) NOT NULL,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `priorities`
--

INSERT INTO `priorities` (`priorityid`, `priority_name`, `is_priority`, `color`) VALUES
('high', 'High', 1, 'red'),
('low', 'Low', 1, 'white'),
('medium', 'Medium', 1, 'yellow'),
('pending', 'Pending', 0, 'c04848'),
('solved', 'Solved', 0, 'dddddd');

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `userid`, `email`, `password`, `user_type`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Sazad', 'Ahemad', 'connect2sazad', 'mail2sazad@gmail.com', '$2y$10$cFUr27zAqNnyS9Y7WjEjYOuC4NFwGIjQSMWlgXTySZUnwSvSCt/Me', 2, 1, 0, '2022-12-31 05:00:47', '2023-01-02 08:49:40'),
(2, 'Transport', 'Department', 'trans_dept', 'vfsdgv', 'dvcsdxv', 5, 1, 0, '2023-01-02 07:27:29', '2023-01-02 08:49:50'),
(3, 'Admin', '', 'admin', '', '', 6, 1, 0, '2023-01-02 07:27:29', '2023-01-02 08:49:54'),
(4, 'Academic', 'Department', 'acad_dept', 'vfsdgv', 'dvcsdxv', 5, 1, 0, '2023-01-02 07:27:29', '2023-01-02 08:49:50');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `type`) VALUES
(2, 'student'),
(3, 'staff'),
(4, 'hod'),
(5, 'department'),
(6, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `refno` (`refno`);

--
-- Indexes for table `priorities`
--
ALTER TABLE `priorities`
  ADD PRIMARY KEY (`priorityid`);

--
-- Indexes for table `systemv`
--
ALTER TABLE `systemv`
  ADD PRIMARY KEY (`variable_id`),
  ADD UNIQUE KEY `variable` (`variable`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `systemv`
--
ALTER TABLE `systemv`
  MODIFY `variable_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
