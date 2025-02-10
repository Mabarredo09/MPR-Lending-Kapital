-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2025 at 06:24 AM
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
(36, 'maranatha', 'Gapac', 'Barredo', 'III', 'male', '2025-01-29', 'widowed', '09953838730', '1213', 'Purok 7', 'poblacion west 3', 'Cabanatuan/Aliaga/Nueva Ecija', 'nueva ecija', '4', 'Driver\'s License', '22232', '2025-02-20', 'uploads/maranatha_Barredo/ID_driverlincense.jpg', 'mj', 23, 'manager', '09953838730', 2132321.00, '1213', 'Purok 7', 'poblacion west 3', 'Cabanatuan/Aliaga/Nueva Ecija', 'nueva ecija', '4', 'Single Premium', '2025-02-19', '2025-02-20', 'uploads/maranatha_Barredo/Insurance_pxfuel.jpg', 'Michael Seva', '09123456789', 'uploads/maranatha_Barredo/Collateral_1_WIN_20241210_22_22_10_Pro - Copy.jpg,uploads/maranatha_Barredo/Collateral_2_WIN_20241210_22_22_10_Pro.jpg,uploads/maranatha_Barredo/Collateral_3_WIN_20241210_22_22_15_Pro - Copy.jpg,uploads/maranatha_Barredo/Collateral_4_WIN_20241210_22_22_15_Pro.jpg,uploads/maranatha_Barredo/Collateral_5_WIN_20250119_00_07_21_Pro.jpg'),
(38, 'lokzkie', 'serrano', 'bustos', 'II', 'female', '2025-01-29', 'widowed', '09953838723', '12133232', 'Purok 732', 'poblacion west 43232', 'Cabanatuan/Aliaga/Nueva Ecija', 'nueva ecija', '332', 'Voter\'s ID', '222323232', '2025-02-20', 'uploads/_bustos/ID_driverlincense.jpg', 'tado olpot', 112345, 'gmmmmm', '09953831111', 99999999.99, '12133232', 'Purok 732', 'poblacion west 43232', 'Cabanatuan/Aliaga/Nueva Ecija', 'nueva ecija', '332', 'Family Premium', '2025-02-21', '2025-02-20', 'uploads/_bustos/Insurance_id2.jpg', 'Taka', '09123456321', 'uploads/_bustos/Collateral_1_driverlincense.jpg,uploads/_bustos/Collateral_2_id.jpg,uploads/_bustos/Collateral_3_id2.jpg'),
(39, 'sun', 'Gapac', 'Barredo', 'III', 'male', '2025-01-29', 'widowed', '09953838730', '1213', 'Purok 7', 'poblacion west 3', 'Cabanatuan/Aliaga/Nueva Ecija', 'nueva ecija', '4', 'Driver\'s License', '22232', '2025-02-20', 'uploads/maranatha_Barredo/ID_driverlincense.jpg', 'mj', 23, 'manager', '09953838730', 2132321.00, '1213', 'Purok 7', 'poblacion west 3', 'Cabanatuan/Aliaga/Nueva Ecija', 'nueva ecija', '4', 'Single Premium', '2025-02-19', '2025-02-20', 'uploads/maranatha_Barredo/Insurance_pxfuel.jpg', 'Michael Seva', '09123456789', 'uploads/maranatha_Barredo/Collateral_1_WIN_20241210_22_22_10_Pro - Copy.jpg,uploads/maranatha_Barredo/Collateral_2_WIN_20241210_22_22_10_Pro.jpg,uploads/maranatha_Barredo/Collateral_3_WIN_20241210_22_22_15_Pro - Copy.jpg,uploads/maranatha_Barredo/Collateral_4_WIN_20241210_22_22_15_Pro.jpg,uploads/maranatha_Barredo/Collateral_5_WIN_20250119_00_07_21_Pro.jpg'),
(40, 'jayson', 'serrano', 'bustos', 'II', 'female', '2025-01-29', 'widowed', '09953838723', '12133232', 'Purok 732', 'poblacion west 43232', 'Cabanatuan/Aliaga/Nueva Ecija', 'nueva ecija', '332', 'Voter\'s ID', '222323232', '2025-02-20', 'uploads/_bustos/ID_driverlincense.jpg', 'tado olpot', 112345, 'gmmmmm', '09953831111', 99999999.99, '12133232', 'Purok 732', 'poblacion west 43232', 'Cabanatuan/Aliaga/Nueva Ecija', 'nueva ecija', '332', 'Family Premium', '2025-02-21', '2025-02-20', 'uploads/_bustos/Insurance_id2.jpg', 'Taka', '09123456321', 'uploads/_bustos/Collateral_1_driverlincense.jpg,uploads/_bustos/Collateral_2_id.jpg,uploads/_bustos/Collateral_3_id2.jpg'),
(41, 'takahiro', 'sta maria', 'inoue', 'Jr.', 'male', '2025-01-16', 'married', '123456789011', '33333', 'Purok 1', 'pantoc', 'Cabanatuan City', 'nueva ecija', '3', 'Birth Certificate', '11111111', '2025-02-18', 'uploads/takahiro_inoue/ID_id.jpg', 'Mark Lozano', 5, 'general manager', '09953812345', 99999999.99, '33333', 'Purok 1', 'pantoc', 'Cabanatuan City', 'nueva ecija', '3', 'Single Premium', '2025-01-29', '2025-02-18', 'uploads/takahiro_inoue/Insurance_id2.jpg', 'Anthony Francisco', '091231234567', 'uploads/takahiro_inoue/Collateral_1_lendmoney-removebg-preview.png,uploads/takahiro_inoue/Collateral_2_lendmoney.jpg,uploads/takahiro_inoue/Collateral_3_moneylend.webp');

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
(17, 'Mark Nathaniel D. Olpot', 'olpottado@gmail.com', '$2y$10$JaaMJLdXYaRJQW/b0POjGuL/svWpup33MuyUEtv.RGKwpuV3Lkw3i', '2025-02-06 08:05:00', 'uploads/mark_nathaniel_d._olpot_jr/profile/pxfuel.jpg'),
(18, '3232', 'olpottad23o@gmail.com', '$2y$10$vFJhu4SJYSgUaY4XCpht9eDC9Bl3MM7vdHJQkvEe3eJ2IZIT0nPuu', '2025-02-06 08:34:15', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
