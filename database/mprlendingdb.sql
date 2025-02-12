-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2025 at 07:20 AM
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
-- Database: `mprlendingdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrowers`
--

CREATE TABLE `borrowers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `sex` enum('male','female') DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `marital_status` enum('single','married','divorced','widowed') DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `home_no` varchar(100) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `baranggay` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  `id_type` enum('SSS','TIN','PAGIBIG','PhilHealth','PAN','GSIS','National ID','Birth Certificate','Voter''s ID','Driver''s License','Passport') DEFAULT NULL,
  `id_no` varchar(50) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `id_photo` varchar(255) DEFAULT NULL,
  `employer_name` varchar(255) DEFAULT NULL,
  `years_with_employer` int(11) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `phone_no_employer` varchar(50) DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `employer_home_no` varchar(255) DEFAULT NULL,
  `employer_street` varchar(255) DEFAULT NULL,
  `employer_baranggay` varchar(100) DEFAULT NULL,
  `employer_city` varchar(100) DEFAULT NULL,
  `employer_province` varchar(100) DEFAULT NULL,
  `employer_region` varchar(100) DEFAULT NULL,
  `insurance_type` varchar(100) DEFAULT NULL,
  `insurance_issued_date` date DEFAULT NULL,
  `insurance_expiry_date` date DEFAULT NULL,
  `insurance_file` varchar(255) DEFAULT NULL,
  `dependent_name` varchar(255) DEFAULT NULL,
  `dependent_contact_no` varchar(50) DEFAULT NULL,
  `collateral_files` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrowers`
--

INSERT INTO `borrowers` (`id`, `first_name`, `middle_name`, `surname`, `suffix`, `sex`, `dob`, `marital_status`, `contact_number`, `home_no`, `street`, `baranggay`, `city`, `province`, `region`, `id_type`, `id_no`, `expiry_date`, `id_photo`, `employer_name`, `years_with_employer`, `position`, `phone_no_employer`, `salary`, `employer_home_no`, `employer_street`, `employer_baranggay`, `employer_city`, `employer_province`, `employer_region`, `insurance_type`, `insurance_issued_date`, `insurance_expiry_date`, `insurance_file`, `dependent_name`, `dependent_contact_no`, `collateral_files`) VALUES
(41, 'qwe', 'qwe', 'qwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'Maranatha', 'Gapac', 'Barredo', 'Jr.', 'male', '2003-05-09', 'single', '09060319625', '123', 'Gulod', 'San Pedro', 'General Tinio', 'Nueva Ecija', '3', 'National ID', '212332121', '2025-02-20', 'id_photos/67ac0cf2a613b.png', 'tado olpot', 2, 'manager', '09953838730', 2000.00, 'hgf', 'ljk', 'hgf', ';l', 'lkj', 'qwe', 'Health Insurance', '2025-03-06', '2025-03-11', 'insurance_files/67ac0cf2a6378.png', 'asd', '9018230123', 'collateral_files/67ac0cf2a654c.png,collateral_files/67ac0cf2a66d2.png,collateral_files/67ac0cf2a683d.png,collateral_files/67ac0cf2a69d6.png,collateral_files/67ac0cf2a7296.avif,collateral_files/67ac0cf2a8055.jpeg,collateral_files/67ac0cf2a8797.jpeg'),
(45, 'tado', 'barredo', 'olpot', 'III', 'female', '2025-02-14', 'married', '123123123', '1213', 'ljk', 'poblacion west 3', ';ll', 'lkj', 'e', 'Voter\'s ID', '2223212', '2025-01-30', 'id_photos/67ac3d100fb7f.jpg', 'tado olpot', 7, 'hg', '786', 87.00, 'lkj', 'ljk', 'lkj', 'asd', 'lkj', 'e', 'Health Insurance', '2025-02-19', '2025-02-19', 'insurance_files/67ac3991be80f.png', 'tado olpot', 'hf', 'collateral_files/67ac3ade3027e.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `created_at`, `profile_picture`) VALUES
(1, 'Mark Nathaniel D. Olpot', 'olpottado@gmail.com', '$2y$10$N9DZk72RnQK/GdVV0AQSwuFjO6lGNUaPvyZEB9K1D0gMJbB8CSNV6', '2025-01-22 03:44:49', 'uploads/pxfuel.jpg'),
(8, 'Mark Nathaniel D. Olpot', 'olpottado123@gmail.com', '$2y$10$0rchu2gUD1KStK4pXDlAx.g6ReTxGgeGZTB2VTzecI9B62if1oYw2', '2025-02-04 08:42:35', NULL),
(9, 'Leopoldo Servana s', 'leo@gmail.com', '$2y$10$zvDFnVl1o4tRJvpuzKB50eL7gpXg4BMzwTsQffFT2JFXBwvN9PKCa', '2025-02-04 08:45:24', NULL),
(10, 'Mark Nathaniel D. Olpot jr', 'tadoolpot@yahoo.com', '$2y$10$.GoeKJKtlHPtOz9Ew2iil.FZJ0c8DT3zYYrJoltOvt7VBnef8Eol.', '2025-02-04 08:49:42', NULL),
(11, 'mj pogi', 'mj@yahoo.com', '$2y$10$Uso7g3mllkPvcLPc5T0vpuRfUiHK.TsRs.lsMrJH9F0n2vkGbOlxG', '2025-02-04 08:51:49', NULL),
(12, 'asd', 'asd@gmail.com', '$2y$10$f48RBv0GtIC1dg4D2LQUR.q7WgBuROvOo5hSArBYQv15FfD2HxOaO', '2025-02-04 08:57:10', NULL),
(14, 'lolzkie', 'lol@gmail.com', '$2y$10$pxD/c5JbuugOZglV2ghhxOgHMmKvr8ugD09Zk7j54KNzWhDWFk8wO', '2025-02-06 03:38:25', 'uploads/WIN_20241007_17_39_00_Pro.jpg'),
(15, 'Leopoldo', 'leo123@gmail.com', '$2y$10$YCB8KRMLFCynzCjEds8dm.oJMuLH6Vx7odJRQbSKy5EMqbdB4GPoG', '2025-02-06 03:43:48', 'uploads/driverlincense.jpg'),
(16, 'Leopoldo', 'olpottado321321@gmail.com', '$2y$10$muf69Ine7U5FmkkxZmyUiuGvzwZ1n663RxDTaS3YLwlfnfu8Ap0Wy', '2025-02-06 03:56:04', 'uploads/leopoldo/profile/id2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrowers`
--
ALTER TABLE `borrowers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrowers`
--
ALTER TABLE `borrowers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
