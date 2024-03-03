-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2024 at 02:25 PM
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
-- Database: `web_bloger`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blogId` int(10) NOT NULL,
  `btitle` longtext NOT NULL,
  `bpic` varchar(255) NOT NULL,
  `blog` longtext NOT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  `writer` int(10) DEFAULT NULL,
  `bcat` varchar(255) DEFAULT NULL,
  `date_posted` timestamp NOT NULL DEFAULT current_timestamp(),
  `likes` int(11) NOT NULL,
  `dislikes` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `privacy` varchar(100) NOT NULL DEFAULT 'Public'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blogId`, `btitle`, `bpic`, `blog`, `status`, `writer`, `bcat`, `date_posted`, `likes`, `dislikes`, `views`, `privacy`) VALUES
(1, 'Blogs , Vlogs', 'blog-1.png', 'A Pakistani food vlogger, Mubashir Siddiq, recently crossed a million followers on his YouTube channel, ‘Village Food Secrets’. This is a unique achievement and one that should be celebrated.\r\n\r\nIn this era of information and social media, what better way to promote a country than to highlight its cuisine online. If people like your cuisine, they will visit Pakistani restaurants abroad and come to Pakistan to savour what we have to offer. It’s a win-win situation.\r\n', 'Pending', 1, 'Technology', '2024-02-24 19:00:10', 2, 1, 37, 'Public'),
(2, 'Navigating Pakistan\'s IT odyssey: The Quest for unprecedented heights', 'blog-2.jpg', 'Despite the fanfare surrounding the 60-day achievement shouted by the caretaker government, the harsh reality is that Pakistan\'s IT exports plummeted by 0.5% in the initial nine months of FY23, amounting to a meagre $1.94 billion. This decline starkly highlights the formidable hurdles in achieving the ambitious $5 billion annual target, exacerbated by cutbacks in global capital investment within the tech sector driven by escalating interest rates.\r\n\r\nPakistan did experience a notable surge in its IT exports, reaching a record high of $303 million in December 2023, but achieving the government\'s ambitious target of $5 billion for the fiscal year remains a challenge.\r\n\r\nProjections for FY24 indicate that exports may range between $3-4 billion, showing an increase from the previous year\'s $2.6 billion. The telecommunication sector, especially call centre services, played a key role in driving this growth with an 11.11% increase.                                    ', 'Pending', 7, 'IT, Computer , Business', '2024-02-24 19:00:10', 2, 1, 24, 'Public'),
(3, 'Architecto id possi', 'logo.jpg', 'la ja jpaj akfjasdlkfj aklfsklfjasklfj alfjasklfjs ajklasfjasklj askl ', 'Pending', 1, 'Fashion', '2024-03-02 07:21:44', 0, 0, 3, 'Public'),
(4, 'Voluptatem Voluptat', 'accept.png', 'Esse est irure sit ', 'Pending', 1, 'Quaerat dolores null', '2024-03-02 07:22:38', 0, 0, 0, 'Public');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentId` int(11) NOT NULL,
  `comment` text NOT NULL,
  `userId` int(11) NOT NULL,
  `blogId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentId`, `comment`, `userId`, `blogId`) VALUES
(1, 'Perfect Blog about desi food', 1, 1),
(2, 'perfect for IT students', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notificationId` int(11) NOT NULL,
  `notification` text DEFAULT NULL,
  `bloggerId` int(11) DEFAULT NULL,
  `notify_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notificationId`, `notification`, `bloggerId`, `notify_date`) VALUES
(1, 'Your Blog title xxxxxx containg a malicious content please correct', 7, '2024-03-03 13:07:09');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `reportId` int(10) NOT NULL,
  `bloggerId` int(10) DEFAULT NULL,
  `userId` int(10) DEFAULT NULL,
  `report` text DEFAULT NULL,
  `blogId` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`reportId`, `bloggerId`, `userId`, `report`, `blogId`) VALUES
(1, 7, 1, 'Consequatur Consequ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `subscriberId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `bloggerId` int(11) NOT NULL,
  `subscribed_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`subscriberId`, `userId`, `bloggerId`, `subscribed_on`) VALUES
(1, 1, 7, '2024-03-02 06:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(240) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `profile_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `username`, `password`, `email`, `phone`, `city`, `user_type`, `status`, `created_at`, `profile_pic`) VALUES
(1, 'Muhammad Umer Naeem', 'username', '202cb962ac59075b964b07152d234b70', 'abc@abc.com', '0323232565', 'Lahore', 'User', 'Approved', '2024-01-24 13:07:07', 'accept.pngbills.png'),
(6, 'Nerea Adkins', 'user1', '202cb962ac59075b964b07152d234b70', 'admin@gmail.com', '+1 (623) 907-3241', 'Rem quia vel sit id ', 'Administrator', 'Approved', '2024-01-24 13:22:30', 'reply.png'),
(7, 'Mia Henson', 'blogger1', '8f8619caef87ebe19f25f5ba3df3f24e', 'user@gmail.com', '+1 (481) 835-6542', 'Laborum Est cupidat', 'User', 'Approved', '2024-02-24 18:19:40', 'reply.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blogId`),
  ADD KEY `writer` (`writer`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `blogId` (`blogId`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notificationId`),
  ADD KEY `bloggerId` (`bloggerId`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`reportId`),
  ADD KEY `bloggerId` (`bloggerId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `blogs_FK` (`blogId`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`subscriberId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `bloggerId` (`bloggerId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blogId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notificationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `reportId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `subscriberId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`writer`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`blogId`) REFERENCES `blogs` (`blogId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`bloggerId`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `blogs_FK` FOREIGN KEY (`blogId`) REFERENCES `blogs` (`blogId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`bloggerId`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD CONSTRAINT `subscribers_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subscribers_ibfk_2` FOREIGN KEY (`bloggerId`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
