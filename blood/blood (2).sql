-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2023 at 07:47 PM
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
-- Database: `blood`
--

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `donation_id` int(11) NOT NULL,
  `donor_id` int(11) DEFAULT NULL,
  `help_seeker_id` int(11) DEFAULT NULL,
  `donation_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`donation_id`, `donor_id`, `help_seeker_id`, `donation_date`) VALUES
(1, 1, 3, '2023-12-28 00:00:00'),
(2, 1, 3, '2023-12-21 00:00:00'),
(3, 1, 3, '2023-12-30 00:00:00'),
(4, 1, 3, '0000-00-00 00:00:00'),
(5, 3, 3, '2023-12-27 00:00:00'),
(6, 4, 4, '2023-12-24 00:00:00'),
(7, 6, 3, '2023-12-20 00:00:00'),
(8, 5, 3, '2023-12-22 00:00:00'),
(9, 7, 3, '2023-12-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `donor_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `second_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `blood_type` varchar(10) NOT NULL,
  `height` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `history_heart_problem` text DEFAULT NULL,
  `blood_pressure_history` text DEFAULT NULL,
  `location_wilaya` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`donor_id`, `name`, `second_name`, `email`, `phone_number`, `blood_type`, `height`, `weight`, `history_heart_problem`, `blood_pressure_history`, `location_wilaya`) VALUES
(1, 'omar ', 'embarki', 'embarki24@gmail.com', '0956856', 'A+', 120, 12121, 'no', 'no', '16'),
(2, 'hakima', 'chougi', 'hakima24@gmail.com', '123123', 'A+', 120, 123, 'testme', 'tesst', 'testt'),
(3, 'omar', 'embarki', 'embarki24@gmail.com', '123123123', 'A+', 123, 123, 'test', 'test', 'test'),
(4, 'Asma', 'Khoudour', 'asma.khoudour@univ-bba.dz', '06', 'A+', 0, 0, '', '', ''),
(5, 'Asma', 'Khoudour', 'Khoudoura2003@gmail.com', '06', 'A+', 0, 0, '', '', ''),
(6, 'Morad', 'Embarki', 'embarki333@gmail.com', '0697065857', 'A+', 150, 150, 'Test', 'Test', 'Alg'),
(7, 'Asma', 'Khoudour', 'Khoudoura2003@gmail.com', '06', 'A+', 0, 0, '', '', ''),
(8, 'Asma', 'Khoudour', 'asma.khoudour@univ-bba.dz', '06', 'B-', 0, 0, '', '', ''),
(9, 'Asma', 'Khoudour', 'asma.khoudour@univ-bba.dz', '06', 'A+', 0, 0, '', '', ''),
(10, 'Meryem ', 'Mery', 'guimeriem913@gmail.com', '0699223196', 'B+', 163, 57, '', '', 'Bba'),
(11, 'Meryem ', 'Mery', 'guimeriem913@gmail.com', '0699223196', 'B+', 163, 57, 'No problem ', 'No history\r\n', 'Sétif ');

-- --------------------------------------------------------

--
-- Table structure for table `help_seekers`
--

CREATE TABLE `help_seekers` (
  `seeker_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `second_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `blood_type` varchar(10) NOT NULL,
  `description` text DEFAULT NULL,
  `emergency_status` varchar(255) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `history_heart_problem` text DEFAULT NULL,
  `blood_pressure_history` text DEFAULT NULL,
  `location_wilaya` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `help_seekers`
--

INSERT INTO `help_seekers` (`seeker_id`, `name`, `second_name`, `email`, `phone_number`, `blood_type`, `description`, `emergency_status`, `height`, `weight`, `history_heart_problem`, `blood_pressure_history`, `location_wilaya`) VALUES
(3, 'omar', 'embarki', 'embarki24@gmail.com', '0769586956', 'A+', 'عاونو خوكم خاصو دم', 'Urgent', 0, 0, '', '', ''),
(4, 'omar', 'embarki', 'embarki24@gmail.com', '0697069787', 'A+', 'عاونو خوكم خاصو دم', 'Urgent', 120, 120, 'yes ', '10/20', '16'),
(5, 'zitouni', 'taha', 'alonzozitout@gmail.com', '0696099256', 'AB-', 'good to give some of my blood -_-', 'Normal', 185, 82, 'NO ', 'NO ', 'Bordj Bou Arreridj'),
(6, 'zitouni', 'taha', 'alonzozitout@gmail.com', '0696099256', 'AB-', 'good to give some of my blood -_-', 'Normal', 185, 82, 'NO ', 'NO ', 'Bordj Bou Arreridj'),
(7, 'Nasima', 'Allawi', 'test@email.com', '0697065857', 'A+', 'Need blood', 'Urgent', 12, 12, 'No', 'No', '34'),
(8, 'Asma', 'Khoudour', 'asma.khoudour@univ-bba.dz', '06', 'A+', 'I need blood please', 'Urgent', 1, 2, 'No', 'No', '34'),
(9, 'Mery', 'Meryem ', 'guimeriem913@gmail.com', '0699223196', 'B+', ' I need it urgent\r\n', 'Urgent', 163, 57, 'No problem ', 'No history ', 'Sétif ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`donation_id`),
  ADD KEY `donor_id` (`donor_id`),
  ADD KEY `help_seeker_id` (`help_seeker_id`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indexes for table `help_seekers`
--
ALTER TABLE `help_seekers`
  ADD PRIMARY KEY (`seeker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `help_seekers`
--
ALTER TABLE `help_seekers`
  MODIFY `seeker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `donors` (`donor_id`),
  ADD CONSTRAINT `donations_ibfk_2` FOREIGN KEY (`help_seeker_id`) REFERENCES `help_seekers` (`seeker_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
