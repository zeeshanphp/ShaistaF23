-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2024 at 01:07 PM
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
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `foodId` int(11) NOT NULL,
  `dishname` varchar(50) NOT NULL,
  `itemcode` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`foodId`, `dishname`, `itemcode`, `category`, `type`, `created_at`) VALUES
(1, 'Chicken Soup', '020', 'Desi', 'Dinner', '2024-01-31 16:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `food_ingredients`
--

CREATE TABLE `food_ingredients` (
  `food_ingredient_id` int(11) NOT NULL,
  `ingredientId` int(11) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `foodId` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_ingredients`
--

INSERT INTO `food_ingredients` (`food_ingredient_id`, `ingredientId`, `quantity`, `price`, `foodId`, `created_at`) VALUES
(3, 1, '2', '6', 1, '2024-01-31 18:28:03'),
(4, 1, '1', '3', 1, '2024-01-31 18:36:41'),
(5, 2, '2', '40', 1, '2024-01-31 18:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `ingcategory`
--

CREATE TABLE `ingcategory` (
  `catIng` int(11) NOT NULL,
  `categoryIng` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingcategory`
--

INSERT INTO `ingcategory` (`catIng`, `categoryIng`) VALUES
(1, 'Sweetner'),
(2, 'Spices');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `ingId` int(11) NOT NULL,
  `ingredient` varchar(50) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `ingcat` varchar(255) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`ingId`, `ingredient`, `unit`, `qty`, `ingcat`, `price`, `created_at`) VALUES
(1, 'Salt', 'Gram', 357, 'Spices', 3, '2024-01-31 09:39:58'),
(2, 'Red Chillies', 'Gram', 892, 'Spices', 20, '2024-01-31 09:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `ingunits`
--

CREATE TABLE `ingunits` (
  `unitId` int(11) NOT NULL,
  `unit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingunits`
--

INSERT INTO `ingunits` (`unitId`, `unit`) VALUES
(1, 'TSP'),
(2, 'As Required'),
(3, 'Kilo Gram'),
(4, 'Gram');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchaseId` int(11) NOT NULL,
  `supplierId` int(11) NOT NULL,
  `ingredientId` int(11) NOT NULL,
  `date_purchase` date NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchaseId`, `supplierId`, `ingredientId`, `date_purchase`, `quantity`) VALUES
(6, 4, 2, '1992-08-18', 892),
(7, 3, 1, '2022-09-25', 357);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleId` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleId`, `role`) VALUES
(1, 'Admin'),
(2, 'Cashier'),
(3, 'Customer'),
(4, 'Visitor'),
(5, 'Supplier');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `username`, `password`, `email`, `phone`, `city`, `role`, `created_at`) VALUES
(1, 'Tanya ', 'Carl Greene', '123', 'diguxoz@mailinator.com', '+1 (505) 133-4244', 'Sed illum qui ipsa', 'Customer', '2024-01-30 18:40:08'),
(2, 'Levi Collins', 'admin', 'admin', 'mukolabo@mailinator.com', '+1 (243) 946-6961', 'Odio ut quas dolorem', 'Admin', '2024-01-30 18:41:29'),
(3, 'Evan Gonzales', 'Luke Coleman', 'Pa$$w0rd!', 'dunuburo@mailinator.com', '+1 (258) 124-4548', 'Necessitatibus eum e', 'Supplier', '2024-01-30 19:08:44'),
(4, 'Cheryl Estes', 'Madison Gamble', 'Pa$$w0rd!', 'zavuh@mailinator.com', '+1 (935) 125-4338', 'Pariatur Sunt porr', 'Supplier', '2024-01-30 19:10:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`foodId`);

--
-- Indexes for table `food_ingredients`
--
ALTER TABLE `food_ingredients`
  ADD PRIMARY KEY (`food_ingredient_id`),
  ADD KEY `foodId` (`foodId`),
  ADD KEY `ingredientId` (`ingredientId`);

--
-- Indexes for table `ingcategory`
--
ALTER TABLE `ingcategory`
  ADD PRIMARY KEY (`catIng`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ingId`);

--
-- Indexes for table `ingunits`
--
ALTER TABLE `ingunits`
  ADD PRIMARY KEY (`unitId`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchaseId`),
  ADD KEY `ingredientId` (`ingredientId`),
  ADD KEY `supplierId` (`supplierId`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `foodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food_ingredients`
--
ALTER TABLE `food_ingredients`
  MODIFY `food_ingredient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ingcategory`
--
ALTER TABLE `ingcategory`
  MODIFY `catIng` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `ingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ingunits`
--
ALTER TABLE `ingunits`
  MODIFY `unitId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchaseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food_ingredients`
--
ALTER TABLE `food_ingredients`
  ADD CONSTRAINT `food_ingredients_ibfk_1` FOREIGN KEY (`foodId`) REFERENCES `food` (`foodId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `food_ingredients_ibfk_2` FOREIGN KEY (`ingredientId`) REFERENCES `ingredients` (`ingId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`ingredientId`) REFERENCES `ingredients` (`ingId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`supplierId`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
