-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2024 at 11:12 AM
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
-- Database: `dispute`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `memberid` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberid`, `fullname`, `username`, `password`, `email`, `phone`, `city`, `created_at`) VALUES
(1, 'Brenda Glover', 'Lunea Orr', 'Pa$$w0rd!', 'mivigimit@mailinator.com', '+1 (471) 748-7362', 'Est omnis tempora no', '2024-01-24 18:09:24'),
(2, 'Kyle Medina', 'Virginia Workman', 'Pa$$w0rd!', 'kigijugedu@mailinator.com', '+1 (727) 703-7758', 'Incididunt incididun', '2024-01-25 09:26:59'),
(3, 'Aaron Peterson', 'Damian Whitfield', 'Pa$$w0rd!', 'sife@mailinator.com', '+1 (507) 181-3975', 'Debitis minima est ', '2024-01-25 10:05:39'),
(4, 'Victor Carpenter', 'Martina Barton', 'Pa$$w0rd!', 'galudo@mailinator.com', '+1 (356) 131-6953', 'Qui non asperiores q', '2024-01-25 10:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cnic` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `dname` varchar(50) NOT NULL,
  `dfname` varchar(50) NOT NULL,
  `dphone` varchar(50) NOT NULL,
  `dtype` varchar(100) NOT NULL,
  `dadress` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `name`, `father_name`, `email`, `cnic`, `phone`, `adress`, `dname`, `dfname`, `dphone`, `dtype`, `dadress`, `created_at`) VALUES
(1, 'Barrett ', 'Tanek Maddox', 'pawameko@mailinator.com', '0003', 'Incididunt repudiand', 'Consequatur nihil qu', 'Architecto eu except', 'Autumn Rasmussen', 'Sint rerum dolores ', 'Money/Loan', 'Qui in laboris labor', '2024-01-24 17:54:57'),
(2, 'Laith Knight', 'Bethany Noble', 'tilola@mailinator.com', 'Soluta totam accusan', 'Ipsum omnis quos opt', 'Magna assumenda corr', 'Sapiente ad voluptat', 'Duncan Holland', 'Qui est iste qui sun', 'Vehicle', 'Velit odio aut et n', '2024-01-25 10:08:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `memberid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
