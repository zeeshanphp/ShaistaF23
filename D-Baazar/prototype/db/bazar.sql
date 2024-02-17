-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2024 at 09:19 AM
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
-- Database: `bazar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catId` int(11) NOT NULL,
  `catname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catId`, `catname`) VALUES
(1, 'Electronics'),
(3, 'Watches'),
(4, 'Bars');

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `complainId` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `complain` text NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complains`
--

INSERT INTO `complains` (`complainId`, `fullname`, `complain`, `email`) VALUES
(1, 'Uta Blackburn', 'Obcaecati tempora se', 'waxac@mailinator.com');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackId` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `custId` int(11) NOT NULL,
  `pId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackId`, `feedback`, `custId`, `pId`) VALUES
(1, 'this product is very good', 1, 1),
(2, 'Very Good Quality', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ordId` int(11) NOT NULL,
  `items` varchar(300) NOT NULL,
  `bill` int(11) NOT NULL,
  `custId` int(11) NOT NULL,
  `orderon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adress` text NOT NULL,
  `payment_method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ordId`, `items`, `bill`, `custId`, `orderon`, `fullname`, `phone`, `email`, `adress`, `payment_method`) VALUES
(7, 'Rado,Rado', 4600, 0, '2024-02-17 07:46:48', 'Channing Hill', '+1 (324) 305-4556', 'zuqulyvebu@mailinator.com', 'Non repellendus Occ', 'Paid Through Credit Card'),
(8, 'Rado,Rado,Rado', 6900, 1, '2024-02-17 07:46:52', 'Genevieve May', '+1 (672) 742-8936', 'cymonu@mailinator.com', 'asdk jaklsjdk akljafsdkl', 'Paid Through Credit Card'),
(9, 'Harriet Gray,LED TV', 13030, 0, '2024-02-17 07:46:55', 'Maxine Little', '+1 (626) 842-9348', 'gapypomo@mailinator.com', 'Et aute sit dolor el', 'Paid Through Credit Card'),
(11, 'Harriet Gray,Cain Wall', 8100, 0, '2024-02-17 07:46:57', 'Glenna Mcmillan', '+1 (285) 775-8071', 'zuwe@mailinator.com', 'Fuga Vel enim dolor', 'Paid Through Credit Card'),
(12, 'Harriet Gray,Cain Wall,Rado', 10400, 0, '2024-02-17 07:43:42', 'Chester Wallace', '+1 (523) 664-5176', 'jezi@mailinator.com', 'Voluptate ut ipsa c', 'Paid Through Credit Card');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `product` varchar(300) NOT NULL,
  `order_id` int(11) NOT NULL,
  `price` varchar(50) NOT NULL,
  `sellerId` int(11) NOT NULL,
  `custId` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `product`, `order_id`, `price`, `sellerId`, `custId`, `status`) VALUES
(1, 'Rado', 1, '2300', 0, 1, 'PENDING'),
(2, 'Rado', 1, '2300', 0, 1, 'PENDING'),
(3, 'Rado', 1, '2300', 0, 1, 'PENDING'),
(4, 'Rado', 1, '2300', 0, 1, 'PENDING'),
(5, 'LED TV', 1, '5500', 0, 1, 'PENDING'),
(6, 'Rado', 1, '2300', 0, 1, 'PENDING'),
(7, 'Rado', 2, '2300', 0, 1, 'PENDING'),
(8, 'Rado', 2, '2300', 0, 1, 'PENDING'),
(9, 'Rado', 2, '2300', 0, 1, 'PENDING'),
(10, 'Rado', 2, '2300', 0, 1, 'PENDING'),
(11, 'LED TV', 2, '5500', 0, 1, 'PENDING'),
(12, 'Rado', 2, '2300', 0, 1, 'PENDING'),
(13, 'Rado', 3, '2300', 0, 1, 'PENDING'),
(14, 'Cain Wall', 4, '570', 4, 1, 'Order Is Released'),
(15, 'Rado', 5, '2300', 0, 1, 'PENDING'),
(16, 'Rado', 6, '2300', 0, 1, 'PENDING'),
(17, 'Rado', 7, '2300', 0, 1, 'PENDING'),
(18, 'Rado', 8, '2300', 0, 1, 'PENDING'),
(19, 'Harriet Gray', 9, '7530', 4, 1, 'PENDING'),
(20, 'Harriet Gray', 11, '7530', 4, 1, 'PENDING'),
(21, 'Cain Wall', 11, '570', 4, 1, 'PENDING'),
(22, 'Harriet Gray', 12, '7530', 4, 1, 'Order Is Released'),
(23, 'Cain Wall', 12, '570', 4, 1, 'PENDING'),
(24, 'Rado', 12, '2300', 0, 1, 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pId` int(11) NOT NULL,
  `pname` varchar(150) NOT NULL,
  `pprice` varchar(150) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `pcat` varchar(150) NOT NULL,
  `sellerId` int(11) NOT NULL,
  `total_stock` int(11) NOT NULL,
  `sold_stock` int(11) NOT NULL,
  `remaining_stock` int(11) GENERATED ALWAYS AS (ifnull(`total_stock`,0) - ifnull(`sold_stock`,0)) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pId`, `pname`, `pprice`, `photo`, `pcat`, `sellerId`, `total_stock`, `sold_stock`) VALUES
(1, 'LED TV', '5500', 'img-1.jpg', 'Electronics', 0, 5, 0),
(2, 'Rado', '2300', 'watch.jpg', 'Watches', 0, 15, 1),
(5, 'Harriet Gray', '7530', 'banner.jpg', 'Watches', 4, 20, 1),
(6, 'Cain Wall', '570', 'login-icon.png', 'Watches', 4, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `fullname`, `username`, `password`, `email`, `phone`, `city`, `type`, `status`, `created_at`) VALUES
(1, 'Genevieve May', 'abc', '123', 'cymonu@mailinator.com', '+1 (672) 742-8936', 'Voluptatem Cupidita', 'Customer', 'Rejected', '2024-01-23 12:56:37'),
(2, 'Jeanette Cantu', 'admin', 'admin', 'bimebupely@mailinator.com', '+1 (891) 418-5921', 'Ut labore corporis u', 'Admin', 'Pending', '2024-02-15 14:04:44'),
(3, 'Kieran Grimes', 'cust', 'cust', 'pudon@mailinator.com', '+1 (583) 849-1569', 'Ea officia quas adip', 'Customer', 'Pending', '2024-02-15 14:04:58'),
(4, 'Oleg Keith', 'seller', 'seller', 'cika@mailinator.com', '+1 (255) 917-5318', 'Sequi sit aspernatu', 'Seller', 'Rejected', '2024-02-15 14:05:20'),
(5, 'Louis Higgins', 'cust', 'cust', 'xolahahah@mailinator.com', '+1 (575) 217-3945', 'Dolore error eum ven', 'Customer', 'Pending', '2024-02-17 05:01:25');

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
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`complainId`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ordId`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pId`);

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
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `complainId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ordId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
