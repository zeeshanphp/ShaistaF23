-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2024 at 03:12 PM
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
-- Database: `autoparts`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer_queries`
--

CREATE TABLE `buyer_queries` (
  `qId` int(11) NOT NULL,
  `question` text NOT NULL,
  `sellerId` int(11) NOT NULL,
  `custId` int(11) NOT NULL,
  `reply` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buyer_queries`
--

INSERT INTO `buyer_queries` (`qId`, `question`, `sellerId`, `custId`, `reply`) VALUES
(1, 'I am confused about buying swift and witz kindly suggest me what to do ?', 2, 5, 'You Should go for Alto VXL'),
(2, 'Hi ', 8, 5, 'How may I help you'),
(3, 'hey', 6, 5, 'Not Answered Yet');

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
(2, 'Toyota'),
(3, 'Honda'),
(4, 'Suzuki');

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
(13, 'Mirriors,Windscreen', '12500', 5, '2024-02-19 13:30:02', 'Credit Card Payment', 'PENDING'),
(14, 'Mirriors,Bumper Light', '2200', 5, '2024-02-19 13:33:12', 'Credit Card Payment', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_items_id` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `pprice` varchar(50) NOT NULL,
  `seller` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Pending',
  `custId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_items_id`, `pname`, `pprice`, `seller`, `orderId`, `status`, `custId`) VALUES
(1, 'Mirriors', '1500', 6, 13, 'Order Released', 0),
(2, 'Windscreen', '11000', 6, 13, 'Pending', 0),
(3, 'Mirriors', '1500', 6, 14, 'Pending', 5),
(4, 'Bumper Light', '700', 6, 14, 'Pending', 5);

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `pId` int(11) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pprice` varchar(20) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `pcat` varchar(255) NOT NULL,
  `vehname` varchar(120) NOT NULL,
  `vehmodel` varchar(255) NOT NULL,
  `sellerId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`pId`, `pname`, `pprice`, `photo`, `pcat`, `vehname`, `vehmodel`, `sellerId`) VALUES
(5, 'Windscreen', '11000', 'windscreen.jpg', 'Toyota', 'Corolla', '2009', 6),
(6, 'Trunk Lamps', '4500', 'trunk-lamps.jpg', 'Toyota', 'Corolla', '2011', 6),
(7, 'Rear Break Shoe', '1400', 'breakshoe.jpg', 'Honda', 'City', '2019', 6),
(8, 'Mirriors', '1500', 'miriors.jpg', 'Honda', 'Civic', '2019', 6),
(9, 'Baring', '2200', 'baring.jpg', 'Suzuki', 'Mehran', '2017', 6),
(10, 'Bumper Light', '700', 'suzuki-mehran-front-bumper-light-pair-56585075.jpg', 'Suzuki', 'Mehran', '2015', 6),
(11, 'Kirk Adams', '477', 'banner.jpg', 'Suzuki', 'Lyle Gamble', 'Eligendi quaerat exp', 8);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `ratingId` int(11) NOT NULL,
  `rating` varchar(22) NOT NULL,
  `custId` int(11) NOT NULL,
  `sellerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`ratingId`, `rating`, `custId`, `sellerId`) VALUES
(2, '4.4', 5, 8),
(3, '0.8', 5, 8),
(4, '3.8', 5, 8),
(5, '3.6', 5, 8),
(6, '1', 5, 8),
(7, '2.3', 5, 8),
(8, '4.8', 5, 8),
(9, '0.8', 5, 8),
(10, '0.5', 5, 8),
(11, '5', 5, 8),
(12, '4.9', 5, 8),
(13, '', 5, 6),
(14, '2.5', 5, 6),
(15, '2.9', 5, 6),
(16, '4.6', 5, 6),
(17, '3.5', 5, 6),
(18, '4.9', 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `f_id` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `custId` int(11) NOT NULL,
  `pId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`f_id`, `feedback`, `custId`, `pId`) VALUES
(5, 'This is original genuine product', 2, 8),
(6, 'Very Good Product', 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `custId` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fullname` varchar(25) NOT NULL,
  `city` varchar(20) NOT NULL,
  `cstatus` varchar(20) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`custId`, `username`, `pass`, `email`, `phone`, `fullname`, `city`, `cstatus`, `type`) VALUES
(5, 'abc', '125', 'shanii808@gmail.com', '03236517781', 'Zeeshan Ashraf', 'Lahore', 'Approved', 'Buyer'),
(6, 'aleena12', '1254', 'alena@gmail.com', '03236517781', 'Aleena Kausar', 'Islamabad', 'Approved', 'Seller'),
(7, 'admin', 'admin', 'lylobeg@mailinator.com', '+1 (296) 875-2108', 'Tatum Oliver', 'Quia quia labore off', 'Approved', 'Admin'),
(8, 'seller1', 'seller', 'wovu@mailinator.com', '+1 (497) 434-5337', 'Scarlett Briggs', 'Assumenda nisi aute ', 'Approved', 'Seller');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicleId` int(11) NOT NULL,
  `make` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `regcity` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `year_of_make` varchar(20) NOT NULL,
  `sellerId` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicleId`, `make`, `model`, `image`, `regcity`, `color`, `year_of_make`, `sellerId`, `status`, `description`) VALUES
(33, 'Velit in unde pariat', 'Sint praesentium te', 'ab.jpg', 'Quo sint consequatur', 'Accusantium corrupti', 'Veniam quis adipisi', 8, 'Available', 'Eos molestiae ipsam'),
(34, 'Laboriosam laborum', 'Voluptates similique', 'f.jpg', 'Quia vero est rerum', 'Dolorum aliquid reru', 'Deleniti mollit ipsu', 8, 'Available', 'Eos molestiae ipsam'),
(35, 'Laborum in cumque eu', 'Sint aliqua Consequ', 'alto 1.jpg', 'Corrupti velit dol', 'Autem eum nihil plac', 'Voluptas qui amet m', 8, 'Available', 'Eos molestiae ipsam');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_photos`
--

CREATE TABLE `vehicle_photos` (
  `vphotoId` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `vehicleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_photos`
--

INSERT INTO `vehicle_photos` (`vphotoId`, `filename`, `vehicleId`) VALUES
(1, 'c.jpg', 33),
(2, 'car.jpg', 33),
(3, 'cd.jpg', 33),
(4, 'h.jpg', 34),
(5, 'hcity.jpg', 34),
(6, 'honda acura mdx.jpg', 34),
(7, 'honda civic.jpg', 35),
(8, 'k.jpg', 35),
(9, 'KIA Stonic.jpg', 35),
(10, 'kl.jpg', 35);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer_queries`
--
ALTER TABLE `buyer_queries`
  ADD PRIMARY KEY (`qId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ordId`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_items_id`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`pId`),
  ADD KEY `parts_ibfk_1` (`sellerId`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`ratingId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`custId`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicleId`),
  ADD KEY `sellerId` (`sellerId`);

--
-- Indexes for table `vehicle_photos`
--
ALTER TABLE `vehicle_photos`
  ADD PRIMARY KEY (`vphotoId`),
  ADD KEY `vehicle_photos_ibfk_1` (`vehicleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyer_queries`
--
ALTER TABLE `buyer_queries`
  MODIFY `qId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ordId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_items_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `pId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `ratingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `custId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `vehicle_photos`
--
ALTER TABLE `vehicle_photos`
  MODIFY `vphotoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `parts`
--
ALTER TABLE `parts`
  ADD CONSTRAINT `parts_ibfk_1` FOREIGN KEY (`sellerId`) REFERENCES `users` (`custId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`sellerId`) REFERENCES `users` (`custId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicle_photos`
--
ALTER TABLE `vehicle_photos`
  ADD CONSTRAINT `vehicle_photos_ibfk_1` FOREIGN KEY (`vehicleId`) REFERENCES `vehicles` (`vehicleId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
