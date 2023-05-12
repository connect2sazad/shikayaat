-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 07:13 AM
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
  `refno` varchar(50) NOT NULL,
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
(24, '3H8REGCMVOP', 'Test', 'connect2sazad', 'trans_dept', 'low', 'test desc', 'test sugg', '[\"3H8REGCMVOP_1.pdf\"]', '[]', '[]', 'pending', 0, '2023-02-11 02:14:06', '2023-02-11 02:14:06'),
(25, 'G1HC9M7SWJY', 'xvcxc', 'connect2sazad', 'trans_dept', 'medium', 'sfsdfsdf', 'sdfsdfsdfsdf', '[\"G1HC9M7SWJY_1.png\"]', '[]', '[]', 'pending', 0, '2023-04-16 07:26:44', '2023-04-16 07:26:44'),
(26, 'R750QAN3ZH2', 'sdfsd', 'connect2sazad', 'acad_dept', 'medium', 'sdfdf', 'sdfsdf', '[]', '[]', '[]', 'pending', 0, '2023-04-16 07:59:44', '2023-04-16 07:59:44'),
(27, 'QNVT9BDLWIG', 'vgcfxbfdg', 'connect2sazad', 'sports_dept', 'low', 'gffdgfd', 'fgedgfd', '[\"QNVT9BDLWIG_1.png\"]', '[]', '[]', 'pending', 1, '2022-04-18 07:24:09', '2023-05-03 12:06:18'),
(28, '3Q8NECP6Z0F', 'fdfds', 'connect2sazad', 'sports_dept', 'low', '<p>fdgfdgdf</p>', '<p>fgdfg</p>', '[]', '[]', '[]', 'revoked', 0, '2023-04-19 10:06:13', '2023-05-12 03:21:11'),
(30, 'ENJVXTSDPH5', 'dsvsdvsd', 'connect2sazad', 'acad_dept', 'low', '<p>sdcsdv</p>', '<p>fgfdgd</p>', '[]', '[]', '[]', 'pending', 0, '2023-04-23 03:10:35', '2023-04-23 03:10:35'),
(31, 'WJ5Q8XKYZNI', 'sdsadfs', 'connect2sazad', 'acad_dept', 'low', '<p>sadsa</p>', '<p>asdasd</p>', '[]', '[]', '[]', 'pending', 0, '2023-05-03 11:10:25', '2023-05-03 11:10:25'),
(32, 'U9MBJKO2E8F', 'Delay of Sports Event', 'connect2sazad', 'sports_dept', 'medium', '<p>Please do the sports event soon</p>', '', '[]', '[]', '[]', 'revoked', 0, '2023-05-04 08:03:28', '2023-05-12 03:17:45'),
(33, 'G72CJMZ5AKR', 'Testing 123', 'connect2sazad', 'acad_dept', 'high', '<p>mysqli_real_escape_string is a function in PHP used to escape special characters in a string that is to be used in an SQL query. It is used to prevent SQL injection attacks by ensuring that the data being inserted into the query is properly formatted and does not contain any malicious code.</p>', '<p>In this example, we have input data for the name and email fields. Before using these values in the SQL query, we escape them using mysqli_real_escape_string to handle any special characters present in the data. This ensures that the data will be safely inserted into the query without causing syntax errors or security vulnerabilities.</p>', '[\"G72CJMZ5AKR_1.psd\",\"G72CJMZ5AKR_2.docx\",\"G72CJMZ5AKR_3.png\"]', '[]', '[]', 'pending', 0, '2023-05-11 04:18:26', '2023-05-12 03:36:53');

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
('high', 'High', 1, 'F2DEDE'),
('low', 'Low', 1, '999696'),
('medium', 'Medium', 1, 'DFF0D8'),
('pending', 'Pending', 0, 'c04848'),
('solved', 'Solved', 0, 'dddddd');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `reminder_id` int(11) NOT NULL,
  `refno` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`reminder_id`, `refno`, `created_at`) VALUES
(10, 'G72CJMZ5AKR', '2023-05-12 03:53:37'),
(11, 'G72CJMZ5AKR', '2023-05-12 03:53:55'),
(12, 'G72CJMZ5AKR', '2023-05-12 03:53:59'),
(13, 'G72CJMZ5AKR', '2023-05-12 03:55:31'),
(14, 'G72CJMZ5AKR', '2023-05-12 03:55:50'),
(15, 'G72CJMZ5AKR', '2023-05-12 03:57:32'),
(16, 'G72CJMZ5AKR', '2023-05-12 04:16:20'),
(17, 'G72CJMZ5AKR', '2023-05-12 04:16:30'),
(18, 'G72CJMZ5AKR', '2023-05-12 04:20:02'),
(19, 'G72CJMZ5AKR', '2023-05-12 04:33:35'),
(20, 'G72CJMZ5AKR', '2023-05-12 04:35:11'),
(21, 'WJ5Q8XKYZNI', '2023-05-12 04:36:45'),
(22, 'G72CJMZ5AKR', '2023-05-12 05:11:49');

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
(5, 'SITE_LOGO', 'assets/images/logo.png'),
(6, 'reminder_cool_down_minutes', '1'),
(7, 'reminder_cool_down_minutes_', '2880');

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
  `user_type_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `userid`, `email`, `password`, `user_type_id`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Sazad', 'Ahemad', 'connect2sazad', 'mail2sazad@gmail.com', '$2y$10$cFUr27zAqNnyS9Y7WjEjYOuC4NFwGIjQSMWlgXTySZUnwSvSCt/Me', 2, 1, 0, '2022-12-31 05:00:47', '2023-01-02 08:49:40'),
(2, 'Transport', 'Department', 'trans_dept', 'vfsdgv', '$2y$10$cFUr27zAqNnyS9Y7WjEjYOuC4NFwGIjQSMWlgXTySZUnwSvSCt/Me', 5, 1, 0, '2023-01-02 07:27:29', '2023-04-18 06:39:11'),
(3, 'Admin', '', 'admin', '', '$2y$10$cFUr27zAqNnyS9Y7WjEjYOuC4NFwGIjQSMWlgXTySZUnwSvSCt/Me', 6, 1, 0, '2023-01-02 07:27:29', '2023-04-18 06:39:16'),
(4, 'Academic', 'Department', 'acad_dept', 'vfsdgv', '$2y$10$cFUr27zAqNnyS9Y7WjEjYOuC4NFwGIjQSMWlgXTySZUnwSvSCt/Me', 5, 1, 0, '2023-01-02 07:27:29', '2023-04-18 06:39:19'),
(5, 'Sports', 'Department', 'sports_dept', 'sports_dept@shikayaat.com', '$2y$10$cFUr27zAqNnyS9Y7WjEjYOuC4NFwGIjQSMWlgXTySZUnwSvSCt/Me', 5, 1, 0, '2023-04-18 06:37:24', '2023-04-18 06:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `user_type_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`user_type_id`, `type`) VALUES
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
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`reminder_id`);

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
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `reminder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `systemv`
--
ALTER TABLE `systemv`
  MODIFY `variable_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
