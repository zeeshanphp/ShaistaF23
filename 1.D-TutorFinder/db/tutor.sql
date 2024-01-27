-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2024 at 11:59 AM
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
-- Database: `tutor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `fullname`, `username`, `password`, `email`, `phone`, `city`, `created_at`) VALUES
(1, 'zeeshan', 'admin', 'admin', 'admin@gmail.com', '032323232326', 'Lahore', '2024-01-25 16:36:22');

-- --------------------------------------------------------

--
-- Table structure for table `hiering`
--

CREATE TABLE `hiering` (
  `hId` int(11) NOT NULL,
  `book_date` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `tutorId` varchar(20) NOT NULL,
  `studentId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hiering`
--

INSERT INTO `hiering` (`hId`, `book_date`, `description`, `status`, `tutorId`, `studentId`) VALUES
(1, '2024-01-26', 'Sunt in nihil vero e', 'Pending', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `ratingId` int(11) NOT NULL,
  `rating` varchar(10) NOT NULL,
  `studentId` int(11) NOT NULL,
  `tutorId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`ratingId`, `rating`, `studentId`, `tutorId`) VALUES
(1, '4.7', 0, 2),
(2, '4.4', 1, 2),
(3, '', 1, 1),
(4, '4.9', 1, 1),
(5, '3.8', 1, 1),
(6, '0.7', 1, 2),
(7, '0.3', 1, 2),
(8, '4.7', 1, 1),
(9, '4.8', 1, 1),
(10, '4.9', 1, 1),
(11, '4.9', 1, 1),
(12, '4.5', 1, 2),
(13, '4.7', 1, 2),
(14, '0.4', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewId` int(11) NOT NULL,
  `review` text NOT NULL,
  `studentId` int(11) NOT NULL,
  `tutorId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewId`, `review`, `studentId`, `tutorId`) VALUES
(1, 'He is very professional professor', 1, 2),
(2, 'A very nice professor ', 1, 2);

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
(1, 'Rae Amir', 'abc', '123', 'lakija@mailinator.com', '+1 (673) 457-2769', 'Incidunt eos et vo', '2024-01-25 12:53:58'),
(2, 'Carolyn Cantu', 'Guinevere Hughes', 'Pa$$w0rd!', 'jyka@mailinator.com', '+1 (618) 908-3369', 'Aut qui ab maxime la', '2024-01-25 12:55:20'),
(3, 'Penelope White', 'Lysandra Acosta', 'Pa$$w0rd!', 'tirifejylo@mailinator.com', '+1 (765) 996-1886', 'Quas est voluptas re', '2024-01-25 16:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `tutorId` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `speciality` varchar(400) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `skills` varchar(150) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`tutorId`, `username`, `pass`, `email`, `phone`, `fullname`, `image`, `speciality`, `Description`, `skills`, `price`) VALUES
(1, 'tutor', '123', 'qeva@mailinator.com', '+1 (157) 268-92', 'Michael Mullins', 'room.jpg', 'English', 'Fuga Iusto expedita', 'Quo ratione dolor re', ''),
(2, 'abc', '123', 'zonyge@mailinator.com', '+1 (232) 504-52', 'Dr Pervez Hoodbhoy', 'hb.jpg\n', 'Physics', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `hiering`
--
ALTER TABLE `hiering`
  ADD PRIMARY KEY (`hId`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`ratingId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewId`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentId`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`tutorId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hiering`
--
ALTER TABLE `hiering`
  MODIFY `hId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `ratingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `tutorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
