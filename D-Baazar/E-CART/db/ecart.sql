-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2020 at 09:10 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `fullname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `username`, `pass`, `email`, `contact`, `fullname`) VALUES
(1, 'shanee_ali', '7854', 'shanii0802@gmail.com', '03236517781', 'Zeeshan Ashraf'),
(2, 'sadee', '125', 'shanii0802@gmail.com', '03015112166', 'Sadia Atif');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catId` int(11) NOT NULL,
  `catname` varchar(50) NOT NULL,
  `sellerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catId`, `catname`, `sellerId`) VALUES
(8, 'KITCHEN APPLIANCES', 1),
(10, 'COOKING ACCESSORIES', 1),
(11, 'DINNING TABLE ACCESSORIES', 1),
(13, 'COOKWARE AND BAKEWARE', 1),
(14, 'KITCHEN TEXTILES', 1),
(15, 'KITCHEN APPLIANCES', 2),
(16, 'COOKING ACCESSORIES', 2),
(17, 'DINNING TABLE ACCESSORIES', 2),
(18, 'COOKWARE AND BAKEWARE', 2),
(20, 'OTHER KITCHEN ESSENTIALS', 2),
(21, 'KITCHEN APPLIANCES', 3),
(22, 'COOKING ACCESSORIES', 3),
(23, 'DINNING TABLE ACCESSORIES', 3),
(24, 'PREPARATION TOOLS & ESSENTIALS', 3),
(25, 'COOKWARE AND BAKEWARE', 3),
(26, 'KITCHEN APPLIANCES', 4),
(27, 'COOKING ACCESSORIES', 4),
(28, 'DINNING TABLE ACCESSORIES', 4),
(29, 'PREPARATION TOOLS & ESSENTIALS', 4),
(31, 'FRUITS', 4),
(32, 'COOKING ACCESSORIES', 5),
(33, 'DINNING TABLE ACCESSORIES', 5),
(34, 'PREPARATION TOOLS & ESSENTIALS', 5),
(35, 'FRUITS', 5),
(36, 'VEGETABLES', 5);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contactId` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactId`, `name`, `message`, `email`) VALUES
(1, 'WAQAR', 'AAP KI DUKAN BHT ACHI HAI THORA MALL R DALO', 'shanii0802@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `custId` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fullname` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`custId`, `username`, `pass`, `email`, `phone`, `fullname`) VALUES
(1, 'jamal_ahmad', '1254', 'umraoali650@gmail.com', '03005112166', 'JAMAL'),
(2, 'daniyal', '125', 'dani@gmail.com', '030303030', 'Daniyal'),
(3, 'ramesha', '457', 'umraoali650@gmail.com', '03236517784646', 'RAMSHA JALEEL');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `custId` int(11) NOT NULL,
  `pId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `feedback`, `custId`, `pId`) VALUES
(1, 'product is very good', 2, 14),
(2, 'it is very poor experiedve', 1, 32),
(3, 'it is good', 1, 38);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ordId` int(11) NOT NULL,
  `items` varchar(300) NOT NULL,
  `bill` int(11) NOT NULL,
  `custId` int(11) NOT NULL,
  `orderon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ordId`, `items`, `bill`, `custId`, `orderon`) VALUES
(1, 'PLATE,CUP,TABLE RUNNER,STEAM OVEN,COOKER HOOD', 85500, 2, '2020-10-28 14:10:49'),
(2, 'LID,CUTLERY SET,CABBAGE,MINI FRIDGE', 15500, 1, '2020-10-28 14:17:29'),
(3, 'OVEN,OVEN,OVEN,BOTTLE STOPPER', 120100, 1, '2020-10-30 05:03:46'),
(4, 'OVEN,OVEN,OVEN,BOTTLE STOPPER,NAPKIN HOLDER', 120350, 1, '2020-10-30 05:07:40');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `product`, `order_id`, `price`, `sellerId`, `custId`, `status`) VALUES
(1, 'PLATE', 1, '200', 1, 2, 'PENDING'),
(2, 'CUP', 1, '200', 1, 2, 'Delivered'),
(3, 'TABLE RUNNER', 1, '200', 1, 2, 'PENDING'),
(4, 'STEAM OVEN', 1, '200', 1, 2, 'Delivered'),
(5, 'COOKER HOOD', 1, '200', 1, 2, 'PENDING'),
(6, 'LID', 2, '200', 1, 1, 'Delivered'),
(7, 'CUTLERY SET', 2, '200', 1, 1, 'PENDING'),
(8, 'CABBAGE', 2, '200', 5, 1, 'Delivered'),
(9, 'MINI FRIDGE', 2, '200', 3, 1, 'PENDING'),
(10, 'OVEN', 3, '200', 1, 1, 'PENDING'),
(11, 'OVEN', 3, '200', 1, 1, 'PENDING'),
(12, 'OVEN', 3, '200', 1, 1, 'PENDING'),
(13, 'BOTTLE STOPPER', 3, '200', 5, 1, 'PENDING'),
(14, 'OVEN', 4, '200', 1, 1, 'PENDING'),
(15, 'OVEN', 4, '200', 1, 1, 'PENDING'),
(16, 'OVEN', 4, '200', 1, 1, 'PENDING'),
(17, 'BOTTLE STOPPER', 4, '200', 5, 1, 'PENDING'),
(18, 'NAPKIN HOLDER', 4, '200', 2, 1, 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payId` int(11) NOT NULL,
  `bill` int(11) NOT NULL,
  `cardno` varchar(30) NOT NULL,
  `cvno` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `custId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payId`, `bill`, `cardno`, `cvno`, `date`, `custId`) VALUES
(1, 45350, '03236517784646', '9798', '2020-10-29', 2),
(2, 500, '03015112166', '9798', '2020-10-27', 1),
(3, 85500, '03015112166', '9798', '2020-11-03', 2),
(4, 15500, '03236517784646', '9798', '2020-10-26', 1),
(5, 120100, '03015112166', '125', '2020-10-27', 1),
(6, 120350, '13364641661113313', '9798', '2020-10-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pId` int(11) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pprice` varchar(20) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `sellerId` int(11) NOT NULL,
  `pcat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pId`, `pname`, `pprice`, `photo`, `sellerId`, `pcat`) VALUES
(11, 'COOKER HOOD', '35000', 'cooker hood.jpg', 1, 'KITCHEN APPLIANCES'),
(12, 'OVEN', '40000', 'oven.jpg', 1, 'KITCHEN APPLIANCES'),
(13, 'STEAM OVEN', '50000', 'steam oven.jpg', 1, 'KITCHEN APPLIANCES'),
(14, 'MICROWAVE OVEN', '45000', 'microwave oven.jpg', 1, 'KITCHEN APPLIANCES'),
(15, 'COOKER', '60000', 'cooker.jpg', 1, 'KITCHEN APPLIANCES'),
(16, 'SALT AND PEPPER SHAKER', '200', 'SALT AND PEPPER SHAKERS.jpg', 1, 'COOKING ACCESSORIES'),
(17, 'OIL VINEGAR SET', '400', 'OIL VINEGAR SETS.jpg', 1, 'COOKING ACCESSORIES'),
(18, 'FOOD-STORAGE BOX', '500', 'FOOD-STORAGE BOXES.jpg', 1, 'COOKING ACCESSORIES'),
(19, 'BOTTLE RACK', '600', 'BOTTLE RACKS.jpg', 1, 'COOKING ACCESSORIES'),
(20, 'CHOPPING BOARD', '300', 'CHOPPING BOARDS.jpg', 1, 'COOKING ACCESSORIES'),
(31, 'PLATE', '150', 'plates.jpg', 1, 'DINNING TABLE ACCESSORIES'),
(32, 'CUTLERY SET', '200', 'cutlery sets.jpg', 1, 'DINNING TABLE ACCESSORIES'),
(33, 'GLASS', '150', 'glass.jpg', 1, 'DINNING TABLE ACCESSORIES'),
(34, 'CUP', '150', 'cup.jpg', 1, 'DINNING TABLE ACCESSORIES'),
(35, 'TRAY', '150', 'tray.jpg', 1, 'DINNING TABLE ACCESSORIES'),
(36, 'POT', '200', 'pot.jpg', 1, 'COOKWARE AND BAKEWARE'),
(37, 'PAN', '300', 'pan.jpg', 1, 'COOKWARE AND BAKEWARE'),
(38, 'LID', '200', 'lid.jpg', 1, 'COOKWARE AND BAKEWARE'),
(39, 'SMALL SAUCEPAN', '300', 'small saucepan.jpg', 1, 'COOKWARE AND BAKEWARE'),
(40, 'WOK', '350', 'wok.jpg', 1, 'COOKWARE AND BAKEWARE'),
(41, 'TABLECLOTH', '250', 'TABLECLOTHS.jpg', 1, 'KITCHEN TEXTILES'),
(42, 'PLACEMAT', '200', 'placemat.jpg', 1, 'KITCHEN TEXTILES'),
(43, 'TABLE RUNNER', '200', 'table runner.jpg', 1, 'KITCHEN TEXTILES'),
(44, 'NAPKIN', '100', 'napkin.jpg', 1, 'KITCHEN TEXTILES'),
(45, 'DISHCLOTH', '200', 'dishcloth.jpg', 1, 'KITCHEN TEXTILES'),
(46, 'HOB', '4000', 'hobs.jpg', 2, 'KITCHEN APPLIANCES'),
(47, 'BURNER', '2000', 'burner.jpg', 2, 'KITCHEN APPLIANCES'),
(48, 'REFRIGERATOR', '40000', 'refrigerator.jpg', 2, 'KITCHEN APPLIANCES'),
(49, 'FREEZER', '60000', 'freezer.jpg', 2, 'KITCHEN APPLIANCES'),
(50, 'WINE COOLER', '30000', 'wine cooler.jpg', 2, 'KITCHEN APPLIANCES'),
(51, 'PAPER TOWEL HOLDER', '500', 'paper towel holder.jpg', 2, 'COOKING ACCESSORIES'),
(52, 'DISH DRAINER', '2500', 'dish drainer.jpg', 2, 'COOKING ACCESSORIES'),
(53, 'COFFEE MAKER', '3000', 'coffee maker.jpg', 2, 'COOKING ACCESSORIES'),
(54, 'VACUUM FLASK', '1000', 'vacuum flask.jpg', 2, 'COOKING ACCESSORIES'),
(55, 'TIMER', '1500', 'timer.jpg', 2, 'COOKING ACCESSORIES'),
(56, 'NAPKIN HOLDER', '250', 'napkin holder.jpg', 2, 'DINNING TABLE ACCESSORIES'),
(57, 'DRINK COASTER', '300', 'drink coaster.jpg', 2, 'DINNING TABLE ACCESSORIES'),
(58, 'SUGAR BOWL', '250', 'sugar bowl.jpg', 2, 'DINNING TABLE ACCESSORIES'),
(59, 'COOKIE JAR', '500', 'cookie jar.jpg', 2, 'DINNING TABLE ACCESSORIES'),
(60, 'TEAPOT', '500', 'teapot.jpg', 2, 'DINNING TABLE ACCESSORIES'),
(61, 'STEWPAN', '2000', 'stewpan.jpg', 2, 'COOKWARE AND BAKEWARE'),
(62, 'STEAMER INSERT', '1500', 'steamer insert.jpg', 2, 'COOKWARE AND BAKEWARE'),
(63, 'GRILL PAN', '900', 'grill pan.jpg', 2, 'COOKWARE AND BAKEWARE'),
(64, 'PASTA STRAINER', '1500', 'pasta strainer.jpg', 2, 'COOKWARE AND BAKEWARE'),
(65, 'BAKING TRAY', '500', 'baking tray.jpg', 2, 'COOKWARE AND BAKEWARE'),
(66, 'ALUMINUM FOIL', '300', 'aluminum foil.jpg', 2, 'OTHER KITCHEN ESSENTIALS'),
(67, 'SPONGE', '50', 'sponge.jpeg', 2, 'OTHER KITCHEN ESSENTIALS'),
(68, 'ICE CUBE TRAY', '100', 'ice tray.jpg', 2, 'OTHER KITCHEN ESSENTIALS'),
(69, 'SMALL TRASH BIN', '250', 'small trash bin.jpg', 2, 'OTHER KITCHEN ESSENTIALS'),
(70, 'SMALL TRASH BAG', '100', 'small trash bag.jpg', 2, 'OTHER KITCHEN ESSENTIALS'),
(71, 'BLAST CHILLER', '8000', 'blast chiller.jpg', 3, 'KITCHEN APPLIANCES'),
(72, 'MINI FRIDGE', '15000', 'mini fridge.jpg', 3, 'KITCHEN APPLIANCES'),
(73, 'VACUUM SEALER', '500', 'vacuum sealer.jpg', 3, 'KITCHEN APPLIANCES'),
(74, 'WARMING DRAWER', '1500', 'warming drawer.jpg', 3, 'KITCHEN APPLIANCES'),
(75, 'DISH WASHER', '1500', 'dishwasher.jpg', 3, 'KITCHEN APPLIANCES'),
(76, 'NUTCRACKER', '150', 'nutcracker.jpg', 3, 'COOKING ACCESSORIES'),
(77, 'KITCHEN KNIVES', '200', 'kitchen knives.jpg', 3, 'COOKING ACCESSORIES'),
(78, 'KNIFE BLOCK', '200', 'knife block.jpg', 3, 'COOKING ACCESSORIES'),
(79, 'GRATER', '250', 'grater.jpg', 3, 'COOKING ACCESSORIES'),
(80, 'TURNER', '200', 'turners.jpg', 3, 'COOKING ACCESSORIES'),
(81, 'TEA SET', '1000', 'tea set.jpg', 3, 'DINNING TABLE ACCESSORIES'),
(82, 'SERVING BOWL', '250', 'serving bowls.jpg', 3, 'DINNING TABLE ACCESSORIES'),
(83, 'BOWL', '200', 'bowls.jpg', 3, 'DINNING TABLE ACCESSORIES'),
(84, 'SALAD BOWL', '250', 'salad bowl.jpg', 3, 'DINNING TABLE ACCESSORIES'),
(85, 'BASKET', '300', 'basket.jpg', 3, 'DINNING TABLE ACCESSORIES'),
(86, 'MEASURING CUPS', '300', 'measuring cups.jpg', 3, 'PREPARATION TOOLS & ESSENTIALS'),
(87, 'MEASURING SPOONS', '250', 'measuring spoons.jpg', 3, 'PREPARATION TOOLS & ESSENTIALS'),
(88, 'CUTTING BOARD', '200', 'Cutting Board.jpg', 3, 'PREPARATION TOOLS & ESSENTIALS'),
(89, 'MIXING BOWL', '700', 'mixing bowls.jpg', 3, 'PREPARATION TOOLS & ESSENTIALS'),
(90, 'COLANDER', '200', 'colander.jpg', 3, 'PREPARATION TOOLS & ESSENTIALS'),
(91, 'STAINLESS STEEL SKILLET', '500', 'Stainless Steel Skillet.jpg', 3, 'COOKWARE AND BAKEWARE'),
(92, 'SAUTE PAN', '300', 'Saute Pan.jpg', 3, 'COOKWARE AND BAKEWARE'),
(93, 'LARGE POT', '500', 'Large Pot.jpg', 3, 'COOKWARE AND BAKEWARE'),
(94, 'MUFFIN PAN', '400', 'Muffin Pan.jpg', 3, 'COOKWARE AND BAKEWARE'),
(95, 'BROILER PAN', '300', 'Broiler Pan.jpg', 3, 'COOKWARE AND BAKEWARE'),
(96, 'COFFEE MACHINE', '3000', 'coffee machine.jpg', 4, 'KITCHEN APPLIANCES'),
(97, 'GARBAGE DISPOSAL', '350', 'garbage disposal.jpg', 4, 'KITCHEN APPLIANCES'),
(98, 'HYDROPONIC KITCHEN UNIT', '2000', 'hydroponic kitchen unit.jpg', 4, 'KITCHEN APPLIANCES'),
(99, 'SMALL KITCHEN APPLIANCES', '200', 'small kitchen appliances.jpg', 4, 'KITCHEN APPLIANCES'),
(100, 'WATER DISPENSER', '4000', 'water dispenser.jpg', 4, 'KITCHEN APPLIANCES'),
(101, 'ICE-CREAM SCOOP', '500', 'ice-cream scoop.jpg', 4, 'COOKING ACCESSORIES'),
(102, 'MORTAR AND PESTLE', '300', 'mortar and pestle.jpg', 4, 'COOKING ACCESSORIES'),
(103, 'LADLE', '400', 'ladle.jpg', 4, 'COOKING ACCESSORIES'),
(104, 'COCKTAIL SHAKER', '300', 'cocktail shaker.jpg', 4, 'COOKING ACCESSORIES'),
(105, 'ICE BUCKET', '300', 'ice bucket.jpg', 4, 'COOKING ACCESSORIES'),
(107, 'BREAD BINS', '300', 'bread bins.jpg', 4, 'DINNING TABLE ACCESSORIES'),
(108, 'FRUIT BOWL', '200', 'fruit bowl.jpg', 4, 'DINNING TABLE ACCESSORIES'),
(109, 'EGG CUPS', '300', 'egg cups.jpg', 4, 'DINNING TABLE ACCESSORIES'),
(110, 'JUG', '250', 'jug.jpg', 4, 'DINNING TABLE ACCESSORIES'),
(111, 'DECANTER', '300', 'decanter.jpg', 4, 'DINNING TABLE ACCESSORIES'),
(113, 'POTATO MASHER', '200', 'potato masher.jpg', 4, 'PREPARATION TOOLS & ESSENTIALS'),
(114, 'WHISK', '200', 'whisk.jpg', 4, 'PREPARATION TOOLS & ESSENTIALS'),
(115, 'SALAD SPINNER', '500', 'salad spinner.jpg', 4, 'PREPARATION TOOLS & ESSENTIALS'),
(116, 'SHEARS', '250', 'shears.jpg', 4, 'PREPARATION TOOLS & ESSENTIALS'),
(117, 'CITRUS JUICER', '800', 'citrus juicer.jpg', 4, 'PREPARATION TOOLS & ESSENTIALS'),
(118, 'MANGO', '250', 'mango.jpg', 4, 'FRUITS'),
(119, 'WATERMELON', '200', 'watermelon.jpg', 4, 'FRUITS'),
(120, 'APPLE', '300', 'apple.jpg', 4, 'FRUITS'),
(121, 'BANANA', '100', 'banana.jpg', 4, 'FRUITS'),
(122, 'ORANGE', '3050', 'orange.jpg', 4, 'FRUITS'),
(123, 'SQUEEZER', '200', 'squeezer.jpg', 5, 'COOKING ACCESSORIES'),
(124, 'FUNNEL', '150', 'funnel.jpg', 5, 'COOKING ACCESSORIES'),
(125, 'VEGETABLE PEELER', '300', 'vegetable peeler.jpg', 5, 'COOKING ACCESSORIES'),
(126, 'UTENSIL HOLDER', '1000', 'utensil holder.jpg', 5, 'COOKING ACCESSORIES'),
(127, 'SPICE JAR', '300', 'spice jar.jpg', 5, 'COOKING ACCESSORIES'),
(128, 'CORKSCREW', '250', 'corkscrew.jpg', 5, 'DINNING TABLE ACCESSORIES'),
(129, 'FOOD COVER', '250', 'food cover.jpg', 5, 'DINNING TABLE ACCESSORIES'),
(130, 'PIZZA CUTTER', '300', 'pizza cutter.jpg', 5, 'DINNING TABLE ACCESSORIES'),
(131, 'BOTTLE STOPPER', '100', 'bottle stopper.jpg', 5, 'DINNING TABLE ACCESSORIES'),
(132, 'BOTTLE', '100', 'bottle.jpg', 5, 'DINNING TABLE ACCESSORIES'),
(133, 'GARLIC PRESS', '300', 'garlic press.jpg', 5, 'PREPARATION TOOLS & ESSENTIALS'),
(134, 'PARING KNIFE', '150', 'paring knife.jpg', 5, 'PREPARATION TOOLS & ESSENTIALS'),
(135, 'BREAD KNIFE', '150', 'bread knife.jpg', 5, 'PREPARATION TOOLS & ESSENTIALS'),
(136, 'HONING SHARPENING CERAMANIC STEEL', '200', 'Honing-Sharpening-Ceramic-Steel.jpg', 5, 'PREPARATION TOOLS & ESSENTIALS'),
(137, 'KNIFE SHARPENER', '300', 'knife sharpener.jpg', 5, 'PREPARATION TOOLS & ESSENTIALS'),
(138, 'PINEAPPLE', '500', 'pineapple.jpg', 5, 'FRUITS'),
(139, 'STRABERRY', '250', 'strawberry.jpg', 5, 'FRUITS'),
(140, 'PAPAYA', '250', 'papaya.jpg', 5, 'FRUITS'),
(141, 'GUAVA', '200', 'guava.jpg', 5, 'FRUITS'),
(142, 'CHERRY', '300', 'cherry.jpg', 5, 'FRUITS'),
(143, 'CABBAGE', '100', 'cabbage.jpg', 5, 'VEGETABLES'),
(144, 'CARROT', '100', 'carrot.jpg', 5, 'VEGETABLES'),
(145, 'BRINJAL', '200', 'brinjal.jpg', 5, 'VEGETABLES'),
(146, 'RADDISH', '150', 'raddish.jpg', 5, 'VEGETABLES'),
(147, 'TOMATO', '200', 'tomato.jpg', 5, 'VEGETABLES');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `sellId` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `email` varchar(110) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `fullname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`sellId`, `username`, `pass`, `email`, `phone`, `fullname`) VALUES
(1, 'shazi', '7854', 'alpo@gmail.com', '03005112166', 'Shazmina Nadeem'),
(2, 'ram_123', '1254', 'maniwaqas.mani@gmail.com', '03015112166', 'RAMSHA JALEEL'),
(3, 'ramsha', '1234', 'ramshajaleel123@gmail.com', '0312543123', 'ramsha jalil'),
(4, 'shabab', '13456', 'shabab123@gmail.com', '5678943', 'shababzehra'),
(5, 'hamza', '19020', 'hamza134@gmail.com', '03214567890', 'hamzarehman'),
(6, 'ali_543', '125', 'maniwaqas.mani@gmail.com', '909090', 'Ashraf Ali');

-- --------------------------------------------------------

--
-- Table structure for table `warning`
--

CREATE TABLE `warning` (
  `Id` int(11) NOT NULL,
  `warning` text NOT NULL,
  `sellId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warning`
--

INSERT INTO `warning` (`Id`, `warning`, `sellId`) VALUES
(1, 'Your products are not upto standard as per some of the feedbacks from customers please take care next time', 3);

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
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactId`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`custId`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pId`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`sellId`);

--
-- Indexes for table `warning`
--
ALTER TABLE `warning`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `custId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ordId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `sellId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `warning`
--
ALTER TABLE `warning`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
