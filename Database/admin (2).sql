-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2025 at 07:04 AM
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
-- Table structure for table `admin_signup`
--

CREATE TABLE `admin_signup` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_signup`
--

INSERT INTO `admin_signup` (`username`, `email`, `contactno`, `password`) VALUES
('Het', 'hetkhatri22@gmail.com', '9173588345', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_contactus`
--

CREATE TABLE `freelancer_contactus` (
  `Name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `project` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `freelancer_contactus`
--

INSERT INTO `freelancer_contactus` (`Name`, `email`, `project`, `message`) VALUES
('VISHAL KHATRI', 'hetkhatri22@gmail.com', 'IT_Consulting', 'Just testing');

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_signup`
--

CREATE TABLE `freelancer_signup` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `freelancer_signup`
--

INSERT INTO `freelancer_signup` (`username`, `email`, `contactno`, `password`) VALUES
('Het', 'hetkhatri22@gmail.com', '9173588345', '1243'),
('vishal', 'nxzgaming577@gmail.com', '9979874742', 'Het');

-- --------------------------------------------------------

--
-- Table structure for table `user_project`
--

CREATE TABLE `user_project` (
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `budget` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_project`
--

INSERT INTO `user_project` (`title`, `type`, `details`, `email`, `contactno`, `budget`) VALUES
('twinder spot', 'website', 'want to create website for freelancer', 'hetkhatri22@gmail.com', '9173588345', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `user_signup`
--

CREATE TABLE `user_signup` (
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

INSERT INTO `user_signup` (`username`, `email`, `contactno`, `password`, `resettoken`, `resettokenexpire`) VALUES
('Dhairya', 'dhairyamakwana1208@gmail.com', '9773244867', '120808', '614fbef4d77ab83201038613bf464924', '2025-01-28'),
('Het', 'hetkhatri22@gmail.com', '9173588345', '1234', '6def2a207224da3f63155360ee7a3409', '2025-01-28'),
('Vishal', 'nxzgaming577@gmail.com', '9979874742', 'Het', 'e474c1c49c022fc8186d5ccebc4af3d5', '2025-02-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_signup`
--
ALTER TABLE `admin_signup`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `freelancer_contactus`
--
ALTER TABLE `freelancer_contactus`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `freelancer_signup`
--
ALTER TABLE `freelancer_signup`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `user_project`
--
ALTER TABLE `user_project`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `user_signup`
--
ALTER TABLE `user_signup`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
