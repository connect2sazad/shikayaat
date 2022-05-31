-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2022 at 09:46 PM
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
('prafulla_barik', 'Prafulla Barik', 'transport_dept', 'sazadahemad899@gmail.com', 'Sa@127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `refno` int(255) NOT NULL,
  `title` mediumtext NOT NULL,
  `authid` varchar(255) NOT NULL,
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

INSERT INTO `complaints` (`refno`, `title`, `authid`, `userid`, `priority`, `description`, `suggestions`, `attachments`, `responses`, `reminders`, `date`, `status`, `resolve_date`) VALUES
(3412, 'Unable to avail bus card though paid for it', 'prafulla_barik', 'connect2sazad', 'high', 'Low blood pressure (less than 90/60) is referred to as hypotension. A blood pressure reading is represented by two digits. The first and more important of the two measures systolic pressure, or the pressure in the arteries as the heart beats and fills them with blood. The second number represents diastolic pressure, or the pressure…\r\n', 'Low blood pressure (less than 90/60) is referred to as hypotension. A blood pressure reading is represented by two digits. The first and more important of the two measures systolic pressure, or the pressure in the arteries as the heart beats and fills them with blood. The second number represents diastolic pressure, or the pressure…\r\n', '[]', '[]', '[]', '2022-05-31 12:06:49', 'pending', '2022-05-31 12:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `priorities`
--

CREATE TABLE `priorities` (
  `priorityid` varchar(20) NOT NULL,
  `prioririty_name` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `priorities`
--

INSERT INTO `priorities` (`priorityid`, `prioririty_name`, `color`) VALUES
('high', 'High', 'red'),
('low', 'Low', 'white'),
('medium', 'Medium', 'yellow'),
('solved', 'Solved', '#dddddd');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `typeid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`typeid`, `name`) VALUES
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
  ADD KEY `priority` (`priority`);

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
  MODIFY `refno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3413;

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
  ADD CONSTRAINT `complaints_ibfk_3` FOREIGN KEY (`priority`) REFERENCES `priorities` (`priorityid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
