-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2022 at 09:16 PM
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
-- Table structure for table `authorities`
--

CREATE TABLE `authorities` (
  `authid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `typeid` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authorities`
--

INSERT INTO `authorities` (`authid`, `name`, `typeid`, `email`, `password`) VALUES
('default', 'Default', 'dean_academics', 'default', 'default'),
('prafulla_barik', 'Prafulla Barik', 'transport_dept', 'sazadahemad899@gmail.com', 'Sa@127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `refno` bigint(255) NOT NULL,
  `title` mediumtext NOT NULL,
  `authid` varchar(255) NOT NULL,
  `typeid` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `priority` varchar(20) NOT NULL,
  `description` longtext NOT NULL,
  `suggestions` longtext NOT NULL,
  `attachments` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`attachments`)),
  `responses` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responses`)),
  `reminders` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`reminders`)),
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL,
  `resolve_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`refno`, `title`, `authid`, `typeid`, `userid`, `priority`, `description`, `suggestions`, `attachments`, `responses`, `reminders`, `date`, `status`, `resolve_date`) VALUES
(3412, 'Unable to avail bus card though paid for it', '', 'transport_dept', 'connect2sazad', 'high', 'dfsdfsdfsdLow fsdfsdfblood pressure (less than 90/60) is referred to as hypotension. A blood pressure reading is represented by two digits. The first and more important of the two measures systolic pressure, or the pressure in the arteries as the heart beats and fills them with blood. The second number represents diastolic pressure, or the pressure… \n', 'Low blood pressure (less than 90/60) is referred to as hypotension. A blood pressure reading is represented by two digits. The first and more important of the two measures systolic pressure, or the pressure in the arteries as the heart beats and fills them with blood. The second number represents diastolic pressure, or the pressure…\r\n', '[]', '[]', '[]', '2022-05-31 12:06:49', 'pending', '2022-05-31 12:06:49'),
(3415, 'test-title 1', 'default', 'exam_dept', 'connect2sazad', 'low', 'desc1', 'suggestion1', '[]', '[]', '[]', '0000-00-00 00:00:00', 'pending', '0000-00-00 00:00:00'),
(2147483647, 'sdasdf', 'default', 'dean_academics', 'connect2sazad', 'high', 'dfsdf', 'dfd', '[]', '[]', '[]', '0000-00-00 00:00:00', 'solved', '0000-00-00 00:00:00'),
(5464651152, '  $title  ', 'default ', 'exam_dept', 'connect2sazad', 'low', '  $description  ', '  $suggestions  ', '[]', '[]', '[]', '0000-00-00 00:00:00', 'pending', '0000-00-00 00:00:00'),
(70622081116, 'dhgfghfdg', 'default', 'exam_dept', 'connect2sazad', 'medium', 'fdhdfhdf', 'fhfdhfdhf', '[]', '[]', '[]', '0000-00-00 00:00:00', 'pending', '0000-00-00 00:00:00'),
(70622090810, 'asdasdas', 'default', 'exam_dept', 'connect2sazad', 'low', 'fsdsdf', 'sdfsdf', '[]', '[]', '[]', '0000-00-00 00:00:00', 'pending', '0000-00-00 00:00:00'),
(70622090845, 'dasad', 'default', 'dean_academics', 'connect2sazad', 'low', 'fsdfsdf', 'dfsdf', '[]', '[]', '[]', '0000-00-00 00:00:00', 'pending', '0000-00-00 00:00:00'),
(70622091817, 'sdfsdfsd', 'default', 'transport_dept', 'connect2sazad', 'medium', 'dsfsdfsdf', 'dfsdfsd', '[]', '[]', '[]', '0000-00-00 00:00:00', 'pending', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `option_id` int(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) NOT NULL,
  `option_value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`option_id`, `option_name`, `option_value`) VALUES
(1, 'site_url', 'http://127.0.0.1/shikayaat/'),
(2, 'home', 'http://127.0.0.1/shikayaat/'),
(3, 'authority_home', 'http://127.0.0.1/shikayaat/authorities/');

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
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `typeid` varchar(255) NOT NULL,
  `authority_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`typeid`, `authority_type_name`) VALUES
('admission_dept', 'Admission Section'),
('dean_academics', 'Dean Academics'),
('exam_dept', 'Examination Department'),
('transport_dept', 'Transportation Department');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `password`, `email`) VALUES
('connect2sazad', 'Sazad Ahemad', 'Sa@127.0.0.1', 'mail2sazad@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authorities`
--
ALTER TABLE `authorities`
  ADD PRIMARY KEY (`authid`),
  ADD KEY `type` (`typeid`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`refno`),
  ADD KEY `authid` (`authid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `priority` (`priority`),
  ADD KEY `typeid` (`typeid`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`);

--
-- Indexes for table `priorities`
--
ALTER TABLE `priorities`
  ADD PRIMARY KEY (`priorityid`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`typeid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `refno` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70622091818;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `option_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authorities`
--
ALTER TABLE `authorities`
  ADD CONSTRAINT `authorities_ibfk_1` FOREIGN KEY (`typeid`) REFERENCES `types` (`typeid`);

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`authid`) REFERENCES `authorities` (`authid`),
  ADD CONSTRAINT `complaints_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `complaints_ibfk_3` FOREIGN KEY (`priority`) REFERENCES `priorities` (`priorityid`),
  ADD CONSTRAINT `complaints_ibfk_4` FOREIGN KEY (`typeid`) REFERENCES `types` (`typeid`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
