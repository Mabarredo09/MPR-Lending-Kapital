-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2025 at 07:52 AM
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
-- Database: `wewz`
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
(33, 'Mark', 'Gapac', 'olpot', 'Sr.', 'female', '2025-02-28', 'single', '09953838730', '1213', 'Purok 7', 'poblacion west 4', 'Cabanatuan/Aliaga/Nueva Ecija', 'nueva ecija', '3', 'Birth Certificate', '22232', '2025-03-05', 'uploads/Mark_olpot/ID_id2.jpg', 'tado olpot', 3213213, 'gm', '09953838730', 99999999.99, '1213', 'Purok 7', 'poblacion west 4', 'Cabanatuan/Aliaga/Nueva Ecija', 'nueva ecija', '3', 'Single Premium', '2025-02-18', '2025-03-05', 'uploads/Mark_olpot/Insurance_id.jpg', 'Michael Seva', '09123456789', 'uploads/Mark_olpot/Collateral_1_driverlincense.jpg,uploads/Mark_olpot/Collateral_2_Untitled design (1)_processed.png,uploads/Mark_olpot/Collateral_3_Untitled design (1).png,uploads/Mark_olpot/Collateral_4_id.jpg,uploads/Mark_olpot/Collateral_5_id2.jpg'),
(34, 'mj', 'barredo', 'olpot', 'Sr.', 'male', '2025-02-05', 'single', '09953838730', '1213', 'Purok 7', 'poblacion west 3', 'Cabanatuan/Aliaga/Nueva Ecija', 'nueva ecija', '4', 'Driver\'s License', '22232', '2025-02-18', 'uploads/mj_olpot/ID_id.jpg', 'tado olpot', 12, 'manager', '09953838730', 321.00, '1213', 'Purok 7', 'poblacion west 3', 'Cabanatuan/Aliaga/Nueva Ecija', 'nueva ecija', '4', 'Life Insurance', '2025-03-04', '2025-02-18', 'uploads/mj_olpot/Insurance_driverlincense.jpg', 'Michael Seva', '09123456789', 'uploads/mj_olpot/Collateral_1_Untitled design (1)_processed.png'),
(35, 'maranatha', 'Gapac', 'Barredo', 'III', 'female', '2025-02-26', 'widowed', '09953838730', '1213', 'Purok 7', 'poblacion west 3', 'Cabanatuan/Aliaga/Nueva Ecija', 'nueva ecija', '4', 'Passport', '22232', '2025-02-14', 'uploads/maranatha_Barredo/ID_pxfuel.jpg', 'tado olpot', 2, 'manager', '09953838730', 312312.00, '1213', 'Purok 7', 'poblacion west 3', 'Cabanatuan/Aliaga/Nueva Ecija', 'nueva ecija', '4', 'None', '2025-02-20', '2025-02-14', 'uploads/maranatha_Barredo/Insurance_pxfuel.jpg', 'Michael Seva', '09123456789', 'uploads/maranatha_Barredo/Collateral_1_pxfuel.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
