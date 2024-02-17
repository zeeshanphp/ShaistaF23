-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2024 at 11:07 AM
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
-- Database: `residence_allotment`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bookingId` int(11) NOT NULL,
  `roomId` int(11) NOT NULL DEFAULT 0,
  `custId` int(11) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `booking_status` varchar(255) NOT NULL DEFAULT 'Pending',
  `room_no` varchar(255) NOT NULL DEFAULT 'Not Assigned',
  `room_type` varchar(100) NOT NULL DEFAULT 'Room'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookingId`, `roomId`, `custId`, `booking_date`, `booking_status`, `room_no`, `room_type`) VALUES
(1, 0, 2, '2024-02-11 13:29:39', 'Room Assigned', '6 ', 'Room'),
(2, 0, 2, '2024-02-11 13:29:58', 'Room Assigned', '8 ', 'Flat'),
(3, 0, 1, '2024-02-12 08:52:19', 'Room Assigned', '6 ', 'Flat');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `custId` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`custId`, `fullname`, `username`, `password`, `email`, `phone`, `city`, `created_at`) VALUES
(1, 'Kirby Perry', 'abc', '123', 'puminenisi@mailinator.com', '+1 (813) 764-2561', 'Enim deleniti doloru', '2024-01-23 09:45:28'),
(2, 'Heather Mcguire', 'zeeshan', '123', 'fuvocidy@mailinator.com', '+1 (837) 937-5554', 'Ea eum ab natus quo ', '2024-02-11 13:21:17');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `empId` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`empId`, `fullname`, `email`, `phone`, `adress`, `occupation`, `salary`, `created_at`) VALUES
(1, 'Erasmus Evans', 'puse@mailinator.com', '+1 (969) 813-3567', 'Officia ratione ad u', 'Consequuntur omnis v', '4400', '2024-02-11 08:04:43'),
(2, 'Maile Warner', 'wudu@mailinator.com', '+1 (111) 322-1164', 'Recusandae Ut aliqu', 'Ut dolorem incidunt', '5000', '2024-02-12 10:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `managerId` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`managerId`, `fullname`, `username`, `password`, `email`, `phone`, `city`, `created_at`) VALUES
(1, 'Quamar Craft', 'manager', '123', 'subyredilo@mailinator.com', '+1 (893) 458-2706', 'Mollit fuga Dolor e', '2024-01-23 08:44:09'),
(2, 'Carl Flowers', 'xyz', '000', 'qefal@mailinator.com', '+1 (788) 718-6084', 'Qui laboris eveniet', '2024-01-23 08:44:39'),
(3, 'Wyatt Burns', 'Aline Wolfe', 'Pa$$w0rd!', 'jexevikybu@mailinator.com', '+1 (834) 811-8448', 'Eligendi sunt adipis', '2024-01-23 08:45:05'),
(4, 'Hope Willis', 'Vivian York', 'Pa$$w0rd!', 'cevuwezihe@mailinator.com', '+1 (593) 281-3292', 'Voluptatem et velit ', '2024-01-23 08:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `paymentId` int(11) NOT NULL,
  `custId` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `booked_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`paymentId`, `custId`, `amount`, `room_id`, `booked_date`) VALUES
(1, 2, 20000, 16, '2024-02-11 13:29:39'),
(2, 2, 2000, 8, '2024-02-11 13:29:58'),
(3, 1, 2000, 6, '2024-02-12 08:52:20');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `roomId` int(11) NOT NULL,
  `rent` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `available_rooms` int(11) NOT NULL DEFAULT 0,
  `remaining_rooms` int(11) NOT NULL DEFAULT 0,
  `booked_room` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomId`, `rent`, `type`, `image`, `available_rooms`, `remaining_rooms`, `booked_room`, `created_at`) VALUES
(4, '20000', 'Room', 's2.png', 10, 9, 1, '2024-02-10 14:55:40'),
(5, '2000', 'Flat', 'r3.jpg', 20, 18, 2, '2024-02-10 17:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `room_details`
--

CREATE TABLE `room_details` (
  `room_detail_id` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `book_status` varchar(255) NOT NULL DEFAULT 'Available',
  `room_type` varchar(255) NOT NULL,
  `booked_by` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_details`
--

INSERT INTO `room_details` (`room_detail_id`, `room_no`, `book_status`, `room_type`, `booked_by`) VALUES
(1, 1, 'Available', 'Flat', 0),
(2, 2, 'Available', 'Flat', 0),
(3, 3, 'Available', 'Flat', 0),
(4, 4, 'Available', 'Flat', 0),
(5, 5, 'Available', 'Flat', 0),
(6, 6, 'Room Booked', 'Flat', 1),
(7, 7, 'Available', 'Flat', 0),
(8, 8, 'Room Booked', 'Flat', 2),
(9, 9, 'Available', 'Flat', 0),
(10, 10, 'Available', 'Flat', 0),
(11, 1, 'Available', 'Room', 0),
(12, 2, 'Available', 'Room', 0),
(13, 3, 'Available', 'Room', 0),
(14, 4, 'Available', 'Room', 0),
(15, 5, 'Available', 'Room', 0),
(16, 6, 'Room Booked', 'Room', 2),
(17, 7, 'Available', 'Room', 0),
(18, 8, 'Available', 'Room', 0),
(19, 9, 'Available', 'Room', 0),
(20, 10, 'Available', 'Room', 0),
(21, 11, 'Available', 'Room', 0),
(22, 12, 'Available', 'Room', 0),
(23, 13, 'Available', 'Room', 0),
(24, 14, 'Available', 'Room', 0),
(25, 15, 'Available', 'Room', 0),
(26, 16, 'Available', 'Room', 0),
(27, 17, 'Available', 'Room', 0),
(28, 18, 'Available', 'Room', 0),
(29, 19, 'Available', 'Room', 0),
(30, 20, 'Available', 'Room', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookingId`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`custId`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`empId`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`managerId`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`roomId`);

--
-- Indexes for table `room_details`
--
ALTER TABLE `room_details`
  ADD PRIMARY KEY (`room_detail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `custId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `empId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `managerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `paymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `roomId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `room_details`
--
ALTER TABLE `room_details`
  MODIFY `room_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
