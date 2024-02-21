-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2024 at 08:44 AM
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
-- Database: `foodies`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catId` int(9) UNSIGNED NOT NULL,
  `catname` varchar(130) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catId`, `catname`) VALUES
(1, 'Breakfast');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `pId` int(6) UNSIGNED NOT NULL,
  `pname` varchar(100) NOT NULL,
  `pprice` varchar(30) NOT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `pcat` varchar(150) DEFAULT NULL,
  `dprice` varchar(50) DEFAULT NULL,
  `ownerId` int(11) DEFAULT NULL,
  `restaurantId` int(11) DEFAULT NULL,
  `discount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`pId`, `pname`, `pprice`, `photo`, `pcat`, `dprice`, `ownerId`, `restaurantId`, `discount`) VALUES
(1, 'Murgh Channy', '300', 'channay.jpg', 'Breakfast', '285', 1, 1, 5),
(2, 'Bong Paye', '300', 'bong.jpg', 'Breakfast', '300', 1, 1, 0),
(3, 'Pulao', '639', 'rice.jpg', NULL, '639', 1, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `qId` int(11) NOT NULL,
  `question` text NOT NULL,
  `owner` int(11) NOT NULL,
  `custId` int(11) NOT NULL,
  `reply` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`qId`, `question`, `owner`, `custId`, `reply`) VALUES
(1, 'Hi sir', 1, 3, 'Not Answered Yet');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ordId` int(11) NOT NULL,
  `items` varchar(300) NOT NULL,
  `bill` varchar(50) NOT NULL,
  `custId` int(11) NOT NULL,
  `orderon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ordId`, `items`, `bill`, `custId`, `orderon`, `status`, `order_status`) VALUES
(1, 'Bong Paye,Murgh Channy,Bong Paye', '900', 3, '2024-02-20 07:00:22', 'CASH ON DELIVERY', 'Pending'),
(3, 'Bong Paye,Murgh Channy', '600', 3, '2024-02-20 07:25:59', 'CASH ON DELIVERY', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_items_id` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `pprice` varchar(50) NOT NULL,
  `owner` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Pending',
  `custId` int(11) NOT NULL,
  `restaurantId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_items_id`, `pname`, `pprice`, `owner`, `orderId`, `status`, `custId`, `restaurantId`) VALUES
(1, 'Bong Paye', '300', 1, 1, 'Order Sent', 3, 1),
(2, 'Murgh Channy', '300', 1, 1, 'Pending', 3, 1),
(3, 'Bong Paye', '300', 1, 1, 'Pending', 3, 1),
(6, 'Bong Paye', '300', 1, 3, 'Pending', 3, 1),
(7, 'Murgh Channy', '300', 1, 3, 'Pending', 3, 1);

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
(1, 'owner', 'Dawn Lambert', '123', 'jazepe@mailinator.com', '+1 (167) 176-2456', '2024-02-01 10:42:44');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `ratingId` int(11) NOT NULL,
  `rating` varchar(22) NOT NULL,
  `custId` int(11) NOT NULL,
  `restaurantId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`ratingId`, `rating`, `custId`, `restaurantId`) VALUES
(1, '4.5', 0, 1),
(2, '4.8', 0, 1),
(3, '2.2', 0, 1),
(4, '', 0, 3),
(5, '3.6', 0, 3),
(6, '4', 0, 3),
(7, '4.7', 0, 1),
(8, '5', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `restaurantId` int(10) NOT NULL,
  `dname` varchar(130) NOT NULL,
  `dphone` varchar(130) NOT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `location` varchar(250) DEFAULT NULL,
  `owner` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`restaurantId`, `dname`, `dphone`, `photo`, `location`, `owner`) VALUES
(1, 'Mian Nasir Jee Murgh Channy', '032323225', 'shop-1.jpg', 'Gulberg, Lahore', 1),
(3, 'Kasur Restaurant', '0323234545', 'banner.jpg', 'Akbar Chowk Township Lahore', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(6) UNSIGNED NOT NULL,
  `username` varchar(230) NOT NULL,
  `fullname` varchar(230) NOT NULL,
  `pass` varchar(230) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `adress` text DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `fullname`, `pass`, `email`, `phone`, `adress`, `reg_date`) VALUES
(1, 'Miranda Mayo', 'Cameron Fitzpatrick', 'Pa$$w0rd!', 'sycaquxyda@mailinator.com', '+1 (913) 465-6916', 'Incidunt molestiae ', '2022-11-30 10:32:22'),
(3, 'abc', 'Hall Wyatt', '123', 'subiky@mailinator.com', '0323232323', 'Beatae iure inventor', '2024-02-21 06:50:32'),
(4, 'Oliver Malone', 'Azalia Shepard', 'Pa$$w0rd!', 'bymojo@mailinator.com', '+1 (422) 946-1185', 'Ut in voluptas nulla', '2024-02-01 11:44:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`pId`),
  ADD KEY `restaurantId` (`restaurantId`),
  ADD KEY `ownerId` (`ownerId`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`qId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ordId`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_items_id`),
  ADD KEY `order_items_ibfk_1` (`orderId`);

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
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`restaurantId`),
  ADD KEY `owner` (`owner`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catId` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `pId` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `qId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ordId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_items_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `ownerId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `ratingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `restaurantId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`restaurantId`) REFERENCES `restaurants` (`restaurantId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `food_ibfk_2` FOREIGN KEY (`ownerId`) REFERENCES `owner` (`ownerId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `orders` (`ordId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `owner` (`ownerId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
