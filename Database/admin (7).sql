-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2025 at 06:17 AM
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
  `budget` varchar(255) NOT NULL,
  `free_email` varchar(255) NOT NULL
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
(4, 'dhairya', 'dhairya@gmail.com', '9173588345', '12'),
(1, 'Dhairya', 'dhairyamakwana1208@gmail.com', '9773244867', '1208'),
(16, 'Dhrumil', 'dhrumil@gmail.com', '9773244867', '12'),
(22, 'Het', 'hetkhatri22@gmail.com', '9173588345', '1243'),
(15, 'Kalpesh', 'kalpesh@gmail.com', '9773244867', '12'),
(14, 'Het', 'ki@gmail.com', '9173588345', '81dc9bdb52d04dc20036dbd8313ed055'),
(18, 'mukund', 'mukund@gmail.com', '9773244867', '12'),
(19, '23504111', 'mukundk@gmail.com', '9173588345', '12'),
(3, 'vishal', 'nxzgaming577@gmail.com', '9979874742', 'Het'),
(17, 'om', 'omranpariya@gmail.com', '41168', '1234'),
(20, 'SamkitJain', 'Samkit@gmail.com', '9773244867', '12'),
(23, 'Your', 'your@gmail.com', '9173588345', '12');

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
  `budget` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
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
(9, 'Dhairya', 'dhairya@gmail.com', '+919173588345', '12', NULL, NULL),
(2, 'Dhairya', 'dhairyamakwana1208@gmail.com', '9773244867', '120808', '614fbef4d77ab83201038613bf464924', '2025-01-28'),
(16, 'Dhrumil', 'dhrumil@gmail.com', '9773244867', '12', NULL, NULL),
(18, 'fenil', 'fenilbhanderi206@gmail.com', '7862058432', 'Fenil1234', NULL, NULL),
(21, 'Het', 'hetkhatri22@gmail.com', '9173588345', '1234', NULL, NULL),
(10, 'Kalpesh', 'kalpesh@gmail.com', '9173588345', '12', NULL, NULL),
(19, 'mukund', 'mukund@gmail.com', '9773244867', '12', NULL, NULL),
(4, 'Vishal', 'nxzgaming577@gmail.com', '9979874742', 'Het', 'e474c1c49c022fc8186d5ccebc4af3d5', '2025-02-04'),
(17, 'om', 'omranpariya@gmail.com', '9662690409', '1234', NULL, NULL),
(13, 'Parth', 'parth@gmail.com', '9773244867', '12', NULL, NULL),
(6, 'Sujal', 'sujal@gmail.com', '9173588345', '12', NULL, NULL),
(24, 'Dhairya', 'your@gmail.com', '9173588345', '12', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accepted_projects`
--
ALTER TABLE `accepted_projects`
  ADD KEY `id` (`id`) USING BTREE;
ALTER TABLE `accepted_projects` ADD FULLTEXT KEY `email` (`email`);

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_project`
--
ALTER TABLE `user_project`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user_signup`
--
ALTER TABLE `user_signup`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
