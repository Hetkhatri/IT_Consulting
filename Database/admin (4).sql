-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2025 at 05:17 PM
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
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `accepted_projects`
--

CREATE TABLE `accepted_projects` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `budget` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_signup`
--

CREATE TABLE `admin_signup` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_signup`
--

INSERT INTO `admin_signup` (`id`, `username`, `email`, `contactno`, `password`) VALUES
(1, 'Het', 'hetkhatri22@gmail.com', '9173588345', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_contactus`
--

CREATE TABLE `freelancer_contactus` (
  `id` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `project` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `freelancer_contactus`
--

INSERT INTO `freelancer_contactus` (`id`, `Name`, `email`, `project`, `message`) VALUES
(1, 'VISHAL KHATRI', 'hetkhatri22@gmail.com', 'IT_Consulting', 'Just testing'),
(2, 'Het', 'nxzgaming577@gmail.com', 'IT_Consulting', 'dgdg');

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_signup`
--

CREATE TABLE `freelancer_signup` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `freelancer_signup`
--

INSERT INTO `freelancer_signup` (`id`, `username`, `email`, `contactno`, `password`) VALUES
(1, 'Dhairya', 'dhairyamakwana1208@gmail.com', '9773244867', '1208'),
(2, 'Het', 'hetkhatri22@gmail.com', '9173588345', '1243'),
(3, 'vishal', 'nxzgaming577@gmail.com', '9979874742', 'Het');

-- --------------------------------------------------------

--
-- Table structure for table `user_project`
--

CREATE TABLE `user_project` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `budget` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_signup`
--

CREATE TABLE `user_signup` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `resettoken` varchar(255) DEFAULT NULL,
  `resettokenexpire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_signup`
--

INSERT INTO `user_signup` (`id`, `username`, `email`, `contactno`, `password`, `resettoken`, `resettokenexpire`) VALUES
(1, 'admin', 'admin@gmail.com', '9999999999', '134', NULL, NULL),
(2, 'Dhairya', 'dhairyamakwana1208@gmail.com', '9773244867', '120808', '614fbef4d77ab83201038613bf464924', '2025-01-28'),
(3, 'Het', 'hetkhatri22@gmail.com', '9173588345', '1234', '6def2a207224da3f63155360ee7a3409', '2025-01-28'),
(4, 'Vishal', 'nxzgaming577@gmail.com', '9979874742', 'Het', 'e474c1c49c022fc8186d5ccebc4af3d5', '2025-02-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accepted_projects`
--
ALTER TABLE `accepted_projects`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `admin_signup`
--
ALTER TABLE `admin_signup`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `freelancer_contactus`
--
ALTER TABLE `freelancer_contactus`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `freelancer_signup`
--
ALTER TABLE `freelancer_signup`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_project`
--
ALTER TABLE `user_project`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_signup`
--
ALTER TABLE `user_signup`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accepted_projects`
--
ALTER TABLE `accepted_projects`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_signup`
--
ALTER TABLE `admin_signup`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `freelancer_contactus`
--
ALTER TABLE `freelancer_contactus`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `freelancer_signup`
--
ALTER TABLE `freelancer_signup`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_project`
--
ALTER TABLE `user_project`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_signup`
--
ALTER TABLE `user_signup`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
