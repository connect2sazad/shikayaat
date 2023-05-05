-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 07:42 AM
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
-- Database: `news_and_events`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_id`, `password`, `email`) VALUES
(1, 'connect2sazad', '$2y$10$cFUr27zAqNnyS9Y7WjEjYOuC4NFwGIjQSMWlgXTySZUnwSvSCt/Me', 'mail2sazad@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `admin_id` varchar(255) NOT NULL,
  `is_deleted` int(10) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `description`, `admin_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'China May Soon Deploy Supersonic Spy Drones, Show US Intel Leaks', 'Washington, United States: A leaked U.S. military assessment says the Chinese military may soon deploy a high-altitude spy drone that travels at least three times the speed of sound, the Washington Post reported late on Tuesday.\r\nThe newspaper cited a secret document from the National Geospatial-Intelligence Agency.\r\n\r\nThe document, which Reuters could not confirm or verify independently, features satellite imagery dated Aug 9 that shows two WZ-8 rocket-propelled reconnaissance drones at an air base in eastern China, about 350 miles (560km) inland from Shanghai, according to the newspaper.\r\n\r\nThe U.S. assessment said China\'s People\'s Liberation Army (PLA) had \"almost certainly\" established its first unmanned aerial vehicle unit at the base, which falls under the Eastern Theater Command, the branch of the Chinese military responsible for enforcing Chinese sovereignty claims over Taiwan, the newspaper reported.\r\n\r\nThe U.S. Defense Department did not immediately respond to a request for comment. The Chinese government could not immediately be reached for comment.', 'connect2sazad', 0, '2023-04-19 04:26:21', '2023-04-19 06:25:39'),
(2, 'UN may withdraw from Afghanistan if talks fail with Taliban on this issue', 'The United Nations (UN) said that it is ready to withdraw from Afghanistan if it cannot convince the Taliban to permit local women to work for the organization, head of the UN Development Program said as per news agency Associated Press.\r\n\r\nThe decision may be taken as soon as next month as the UN is negotiating with the Taliban on the decree prohibiting local women from working.\r\n\r\nUNDP Administrator Achin Steiner said, \"It is fair to say that where we are right now is the entire United Nations system having to take a step back and re-evaluate its ability to operate there. But it is not about negotiating fundamental principles, human rights.\"\r\n\r\nExpressing \"serious concerns\", the UN has condemned Taliban\'s ban on Afghan female UN staff members from reporting to work. “The United Nations in Afghanistan expresses serious concern that female national UN staff have been prevented from reporting to work in Nangarhar province,” the UN had then said, adding that life-saving aid in the country would be at risk without female staff.', 'connect2sazad', 0, '2023-04-19 04:26:21', '2023-04-19 06:25:37'),
(3, 'Windfall tax on local crude revised to Rs 6,400, diesel sees cut in export duty', 'As a part of its efforts to rationalise tax structure in the petroleum sector and promote investments, the government has revised the windfall tax on domestic crude oil production to Rs 6,400 per tonne.\r\n\r\nA windfall tax is a higher tax levied by the government on specific industries when they experience unexpected and above-average profits.\r\n\r\nThe government has also increased the Special Additional Excise Duty (SAED) on crude petroleum from nil to Rs 6,400 per tonne. However, the SAED on petrol and Aviation Turbine Fuel (ATF) will remain unchanged at nil. The government has decided to remove the export duty on diesel, after which, the SAED on diesel will reduce from Rs 0.50 per litre to nil.\r\n\r\nThe revision of the windfall tax on crude oil production is expected to generate additional revenue for the government. The move is expected to impact oil companies, as they will now have to pay a higher tax on the sale of crude oil in the domestic market. The removal of export duty on diesel is expected to provide relief to the manufacturing sector, which relies heavily on diesel for power generation and transportation.', 'connect2sazad', 0, '2023-04-19 04:26:21', '2023-04-19 06:25:35'),
(4, 'The last frontier for financial sector reforms: Cooperative Banks', 'Highlights India’s cooperative banks have so far remained out of bounds of the multiple reforms for the financial sector taken since 1991 Cooperative banks still remain handy instruments for political parties, a channel for dispensing political patronage RBI observed a series of challenges regarding cooperative banks, including deficient corporate governance practices, and rising incidence of frauds Lines of distinction between commercial banks, and cooperative banks are fast blurring with everyone competing for the same set of clients Large-scale reforms, and not the gradualism noticed...', 'connect2sazad', 0, '2023-04-19 04:26:21', '2023-04-19 06:25:33'),
(5, 'The last frontier for financial sector reforms: Cooperative Banks', 'Highlights India’s cooperative banks have so far remained out of bounds of the multiple reforms for the financial sector taken since 1991 Cooperative banks still remain handy instruments for political parties, a channel for dispensing political patronage RBI observed a series of challenges regarding cooperative banks, including deficient corporate governance practices, and rising incidence of frauds Lines of distinction between commercial banks, and cooperative banks are fast blurring with everyone competing for the same set of clients Large-scale reforms, and not the gradualism noticed...', 'connect2sazad', 0, '2023-04-19 04:26:21', '2023-04-19 06:25:19'),
(6, 'The last frontier for financial sector reforms: Cooperative Banks', 'Highlights India’s cooperative banks have so far remained out of bounds of the multiple reforms for the financial sector taken since 1991 Cooperative banks still remain handy instruments for political parties, a channel for dispensing political patronage RBI observed a series of challenges regarding cooperative banks, including deficient corporate governance practices, and rising incidence of frauds Lines of distinction between commercial banks, and cooperative banks are fast blurring with everyone competing for the same set of clients Large-scale reforms, and not the gradualism noticed...', 'connect2sazad', 0, '2023-04-19 04:26:21', '2023-04-19 06:25:30'),
(7, 'The last frontier for financial sector reforms: Cooperative Banks', 'Highlights India’s cooperative banks have so far remained out of bounds of the multiple reforms for the financial sector taken since 1991 Cooperative banks still remain handy instruments for political parties, a channel for dispensing political patronage RBI observed a series of challenges regarding cooperative banks, including deficient corporate governance practices, and rising incidence of frauds Lines of distinction between commercial banks, and cooperative banks are fast blurring with everyone competing for the same set of clients Large-scale reforms, and not the gradualism noticed...', 'connect2sazad', 0, '2023-04-19 04:26:21', '2023-04-19 06:25:28'),
(8, 'The last frontier for financial sector reforms: Cooperative Banks', '<p>Highlights India&rsquo;s cooperative banks have so far remained out of bounds of the multiple reforms for the financial sector taken since 1991 Cooperative banks still remain handy instruments for political parties, a channel for dispensing political patronage RBI observed a series of challenges regarding cooperative banks, including deficient corporate governance practices, and rising incidence of frauds Lines of distinction between commercial banks, and cooperative banks are fast blurring with everyone competing for the same set of clients Large-scale reforms, and not the gradualism noticed.</p>', 'connect2sazad', 0, '2023-04-19 04:26:21', '2023-04-19 06:58:20'),
(9, 'The last frontier for financial sector reforms: Cooperative Banks', 'Highlights India’s cooperative banks have so far remained out of bounds of the multiple reforms for the financial sector taken since 1991 Cooperative banks still remain handy instruments for political parties, a channel for dispensing political patronage RBI observed a series of challenges regarding cooperative banks, including deficient corporate governance practices, and rising incidence of frauds Lines of distinction between commercial banks, and cooperative banks are fast blurring with everyone competing for the same set of clients Large-scale reforms, and not the gradualism noticed...', 'connect2sazad', 0, '2023-04-19 04:26:21', '2023-04-19 04:26:21'),
(10, 'SECOND last frontier for financial sector reforms: Cooperative Banks', 'the Highlights India’s cooperative banks have so far remained out of bounds of the multiple reforms for the financial sector taken since 1991 Cooperative banks still remain handy instruments for political parties, a channel for dispensing political patronage RBI observed a series of challenges regarding cooperative banks, including deficient corporate governance practices, and rising incidence of frauds Lines of distinction between commercial banks, and cooperative banks are fast blurring with everyone competing for the same set of clients Large-scale reforms, and not the gradualism noticed...', 'connect2sazad', 0, '2023-04-19 04:26:21', '2023-04-19 06:53:26'),
(13, 'Huge Shikayaat Update!!', '<p style=\"line-height: 1;\">Hello Admins! We have updated the UI/UX for better experience with Shikayaat. Kindly update the systems and please leave a feedback for the future improvements!</p>\r\n<p style=\"line-height: 1;\"><a title=\"suggest me some apps or websites \" href=\"https://www.example.com/\" target=\"_blank\" rel=\"noopener\">suggest me some apps or websites</a></p>', 'connect2sazad', 0, '2023-05-03 12:08:50', '2023-05-03 12:12:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
