-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2024 at 11:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `driving_school`
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
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bookingId` int(11) NOT NULL,
  `book_date` date NOT NULL,
  `class_time` time(6) NOT NULL,
  `instId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `schoolId` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookingId`, `book_date`, `class_time`, `instId`, `studentId`, `schoolId`, `status`) VALUES
(2, '2024-03-05', '16:17:00.000000', 4, 1, 1, 'Classes Scheduled');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `classId` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`classId`, `class`, `duration`) VALUES
(1, 'Basics of driving', '40 min'),
(2, 'Driving In First gear', '40 min'),
(3, 'Turning right', '30 min'),
(4, 'Turning Left', '30 min'),
(5, 'Reversing Car', '30 min'),
(6, 'Reverse Parking', '30 min'),
(7, 'Change of tyre', '30 min'),
(8, 'Vital Checks Of Car', '30 min');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `instructorId` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `qual` varchar(255) NOT NULL,
  `exp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `city` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `expertise` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT 'Pending',
  `lisence` varchar(100) NOT NULL,
  `schoolId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructorId`, `fname`, `lname`, `qual`, `exp`, `email`, `phone`, `city`, `photo`, `certificate`, `expertise`, `status`, `lisence`, `schoolId`) VALUES
(2, 'Ivory Blackburn', 'Desirae Dudley', 'Sit animi non offi', 'Vel in sed dolorem d', 'midegy@mailinator.com', '0323657895', 'Et eius mollitia odi', 'car.jpg', 'alto 1.jpg', 'Bike', 'Accepted', 'Pariatur Dolore imp', 1),
(4, 'Nevada Crane', 'Kenyon Wells', 'Exercitationem conse', 'Sed a veritatis sint', 'zytiv@mailinator.com', '+1 (108) 483-2861', 'Explicabo Aut neque', 'logo.jpg', 'banner.jpg', 'LTV', 'Accepted', 'Qui necessitatibus u', 1);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `ownerId` int(10) NOT NULL,
  `username` varchar(230) NOT NULL,
  `fullname` varchar(230) NOT NULL,
  `pass` varchar(230) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`ownerId`, `username`, `fullname`, `pass`, `email`, `phone`, `reg_date`) VALUES
(1, 'owner', 'Jared Erickson', 'owner', 'synyzolunu@mailinator.com', '+1 (789) 285-3262', '2024-02-22 05:12:02'),
(2, 'owner1', 'Galvin James', 'owner', 'limepyg@mailinator.com', '+1 (557) 235-2032', '2024-02-22 05:12:14');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `ratingId` int(11) NOT NULL,
  `rating` varchar(22) NOT NULL,
  `custId` int(11) NOT NULL,
  `instId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`ratingId`, `rating`, `custId`, `instId`) VALUES
(1, '', 1, 4),
(2, '3.6', 1, 4),
(3, '4.6', 1, 4),
(4, '5', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewsId` int(11) NOT NULL,
  `reviews` text NOT NULL,
  `studentId` int(11) NOT NULL,
  `isntId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewsId`, `reviews`, `studentId`, `isntId`) VALUES
(1, 'hey', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `schoolId` int(10) NOT NULL,
  `dname` varchar(130) NOT NULL,
  `dphone` varchar(130) NOT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `location` varchar(250) DEFAULT NULL,
  `owner` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`schoolId`, `dname`, `dphone`, `photo`, `location`, `owner`) VALUES
(1, 'Ehsan Driving School', '0323235656', 'c.jpg', 'Muslim town gulberg 3 lahore', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentId` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `city` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT 'Pending',
  `lisence` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentId`, `fname`, `lname`, `username`, `password`, `email`, `phone`, `city`, `photo`, `certificate`, `created_at`, `status`, `lisence`) VALUES
(1, 'Grady Wallace', 'Tarik Munoz', 'abc', '123', 'humi@mailinator.com', '+1 (235) 789-9857', 'Ab nulla accusamus e', 'room.jpg', 'tetst.jpeg', '2024-01-26 11:33:51', 'Approved', 'Bike'),
(2, 'Judith William', 'Gloria Valencia', 'Tarik Randolph', 'Pa$$w0rd!', 'kavagu@mailinator.com', '+1 (641) 672-4617', 'Labore et fuga Dolo', 'room.jpg', 'room.jpg', '2024-01-26 11:36:28', 'Rejected', 'HTV'),
(3, 'Mohammad Gomez', 'Maite Vazquez', 'abc', 'abc', 'wylu@mailinator.com', '+1 (988) 594-6211', 'Aliqua Autem velit ', 'accept.png', 'bills.png', '2024-02-24 10:37:25', 'Pending', 'HTV');

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `std_class_id` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `bookingId` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`std_class_id`, `class`, `studentId`, `bookingId`, `status`) VALUES
(1, 2, 1, 2, 'Class Delivered'),
(2, 3, 1, 2, 'Pending'),
(3, 4, 1, 2, 'Pending'),
(4, 5, 1, 2, 'Pending'),
(5, 6, 1, 2, 'Pending'),
(6, 7, 1, 2, 'Pending'),
(7, 8, 1, 2, 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookingId`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`classId`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructorId`),
  ADD KEY `instructor_ibfk_1` (`schoolId`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`ownerId`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`ratingId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewsId`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`schoolId`),
  ADD KEY `owner` (`owner`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentId`);

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`std_class_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `classId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `instructorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `ownerId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `ratingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `schoolId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `std_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`schoolId`) REFERENCES `schools` (`schoolId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
