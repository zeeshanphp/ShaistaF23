-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2024 at 12:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faculity`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `username`, `password`, `created_at`) VALUES
(1, 'admin', 'admin', '2024-01-28 09:00:42');

-- --------------------------------------------------------

--
-- Table structure for table `faculities`
--

CREATE TABLE `faculities` (
  `faculityId` int(11) NOT NULL,
  `faculity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculities`
--

INSERT INTO `faculities` (`faculityId`, `faculity`) VALUES
(1, 'Faculity of Computer Science'),
(2, 'Faculity Of Fine Arts'),
(3, 'Faculity Of Business Studies');

-- --------------------------------------------------------

--
-- Table structure for table `faculity_member`
--

CREATE TABLE `faculity_member` (
  `memberId` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculity_member`
--

INSERT INTO `faculity_member` (`memberId`, `fullname`, `username`, `password`, `email`, `phone`, `city`, `created_at`) VALUES
(7, 'Ramona Mcclure', 'fac', '123', 'bifyhile@mailinator.com', '+1 (705) 411-5636', 'Quis illo mollit rep', '2024-01-29 09:09:12'),
(8, 'Jacob Tran', 'member', '123', 'cewonolep@mailinator.com', '+1 (167) 627-8961', 'Sed inventore deleni', '2024-01-29 09:15:56'),
(9, 'Pascale Odonnell', 'mem', '000', 'josejeha@mailinator.com', '+1 (157) 514-8769', 'Commodo velit eos u', '2024-01-29 10:47:08'),
(10, 'David Dean', 'abc', '123', 'hopuwam@mailinator.com', '+1 (454) 274-7693', 'Saepe nihil porro mi', '2024-01-29 10:49:12'),
(11, 'Susan Simmons', 'xyz', '000', 'wewubebe@mailinator.com', '+1 (924) 389-3295', 'Quis reprehenderit ', '2024-01-29 11:04:30');

-- --------------------------------------------------------

--
-- Table structure for table `faculity_profile`
--

CREATE TABLE `faculity_profile` (
  `profile_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `faculity` int(11) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `experience` varchar(150) NOT NULL,
  `speciality` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `memberId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculity_profile`
--

INSERT INTO `faculity_profile` (`profile_id`, `photo`, `faculity`, `qualification`, `experience`, `speciality`, `cv`, `memberId`) VALUES
(2, 'r1.jpg', 1, 'PHD', '6 Years', 'Operating Systems', 'prototype(Faculty Portal for Higher).docx', 8),
(3, 'carousel-1.jpg', 1, 'Nulla vero qui commo', 'Sit labore pariatur', 'A quisquam et proide', 'prototype(Faculty Portal for Higher).docx', 9),
(4, 's3.png', 2, 'Eum fugit odio mini', 'Consequat Repudiand', 'Amet libero necessi', 'prototypr(Residential Automation System).docx', 10),
(5, 'user.jpg', 3, 'Quia in vel reiciend', 'Accusamus voluptate ', 'Repudiandae eligendi', 'prototypr(Residential Automation System).docx', 11);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentId` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentId`, `fullname`, `username`, `password`, `email`, `phone`, `city`, `created_at`) VALUES
(2, 'Ursa Britt', 'student', '123', 'jipe@mailinator.com', '+1 (428) 139-1903', 'Reprehenderit non pa', '2024-01-28 08:55:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `faculities`
--
ALTER TABLE `faculities`
  ADD PRIMARY KEY (`faculityId`);

--
-- Indexes for table `faculity_member`
--
ALTER TABLE `faculity_member`
  ADD PRIMARY KEY (`memberId`);

--
-- Indexes for table `faculity_profile`
--
ALTER TABLE `faculity_profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `faculity_profile_ibfk_1` (`memberId`),
  ADD KEY `faculity` (`faculity`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculities`
--
ALTER TABLE `faculities`
  MODIFY `faculityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faculity_member`
--
ALTER TABLE `faculity_member`
  MODIFY `memberId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `faculity_profile`
--
ALTER TABLE `faculity_profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faculity_profile`
--
ALTER TABLE `faculity_profile`
  ADD CONSTRAINT `faculity_profile_ibfk_1` FOREIGN KEY (`memberId`) REFERENCES `faculity_member` (`memberId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `faculity_profile_ibfk_2` FOREIGN KEY (`faculity`) REFERENCES `faculities` (`faculityId`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
