-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 27, 2023 at 09:01 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `13_bits`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `adminkey` int(9) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `adminkey`, `password`) VALUES
(1, 'dievan', 1, '13bits1'),
(2, 'hassan', 2, '13bits2'),
(3, 'danial', 3, '13bits3'),
(4, 'arshdeep', 4, '13bits4'),
(5, 'natasha', 5, '13bits5'),
(6, 'zain', 6, '13bits6'),
(7, 'anakh', 7, '13bits7');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `keyvalue` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `keyvalue`) VALUES
(1, 'Computers', 11),
(2, 'Keyboards/Mice', 22),
(3, 'Headsets/Mics', 33),
(4, 'Speakers', 44),
(5, 'Webcams', 55);

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `birth` date NOT NULL,
  `housenumber` int(2) NOT NULL,
  `streetname` varchar(100) NOT NULL,
  `townname` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `postcode` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`id`, `name`, `email`, `password`, `birth`, `housenumber`, `streetname`, `townname`, `postcode`) VALUES
(1, 'Clive Wright', 'cwright@email.org', 'test13', '1983-09-16', 23, 'Brown Lande', 'Tolde', 'TL3 9HG'),
(2, 'Matthew Allen', 'mall32@gmail.com', 'meatball23', '2002-10-11', 2, 'Merry Way', 'Derby', 'DR3 JG2');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `id` int(11) NOT NULL,
  `order_number` int(5) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `product` varchar(30) DEFAULT NULL,
  `quantity` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`id`, `order_number`, `name`, `product`, `quantity`) VALUES
(1, 4729192, 'Clive Wright', '13 Bits 4K Monitor', 2);

-- --------------------------------------------------------

--
-- Table structure for table `login_info`
--

CREATE TABLE `login_info` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`id`, `username`, `email`, `password`) VALUES
(1, 'clive45', 'cwright@mail.org', 'test13'),
(2, 'mallen', 'mall32@gmail.com', 'meatball23');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `fName` varchar(300) DEFAULT NULL,
  `lName` varchar(300) DEFAULT NULL,
  `phone` int(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(30) DEFAULT NULL,
  `message` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(3000) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int(5) DEFAULT NULL,
  `image_file` varchar(3000) NOT NULL,
  `total` varchar(1000) DEFAULT NULL,
  `key_value` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `quantity`, `image_file`, `total`, `key_value`) VALUES
(1, 'HP Wireless Black Keyboard', 'Black Wireless Keyboard by HP, using a USB connection to provide the link between your PC and the keyboard', '160', 10, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261488336687245/keyboard2-1PNG.png', '500', 22),
(2, 'Logitech Gaming Headset (Black)', '5.1 Surround Sound, over 30 hours of Battery with RGB capabilities', '60', 4, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261025507807303/headset1-1PNG.png', '25', 33),
(4, '13 Bits Mouse', 'A wireless mouse with an ergonomic design and fast responses to clicks', '8', 20, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261335907291147/mice1-1PNG.png', '500', 22),
(5, 'Patrick Cat Arcade Machine', 'One of the greatest pieces of machinery to ever grace Planet Earth. High-end Arcade machine containing cross-platform access of video games', '10000', 0, 'https://cdn.discordapp.com/attachments/1073347102559703130/1078034168732209262/arcade1-1.jpeg', '20', 11),
(6, 'Apple Wireless Magic Keyboard', '', '200', 25, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261469613301870/keyboard1-1PNG.png', '200', 22),
(7, 'Logitech Gaming Headset (Red)', '', '60', 0, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261026023706744/headset2-1PNG.png', '200', 33),
(9, '13 Bits Arcade Headset (Dark)', '', '90', 10, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261025801412628/headset1-2PNG.png', '50', 33),
(10, '13 Bits Arcade Headset (Blue) ', '', '90', 25, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261025277124679/headset3-2PNG.png', '200', 33),
(11, '13 Bits Retro Keyboard ', '', '160', 20, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261470271807498/keyboard4-1PNG.png', '100', 22),
(12, 'MacBook Pro M2 1TB', 'Powered by the next-generation M2 chip, the redesigned MacBook Air packs incredible performance and up to 18 hours of battery life into an incredibly thin aluminum body.', '1260', 0, 'https://cdn.discordapp.com/attachments/1073347102559703130/1075794599307649095/laptop2-1.png', '200', 11),
(13, 'Acer Zenbook Gaming Laptop 1TB', 'Gaming Laptop created by Acer with 1TB SSD ', '990', 12, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261430795026462/laptop1-1PNG.png', '300', 11),
(14, 'HyperX Wired Mic (Black)', '', '75', 55, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261381973311488/mic1-1PNG.png', '500', 33),
(15, 'ProSound Audio Microphone with Stand', '', '150', 20, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261382380167178/mic2-2PNG.png', '200', 33),
(16, 'SandStrom Wireless Mouse', '', '80', 123, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261336695820368/mice1-2PNG.png', '500', 22),
(17, 'Ergonomic Mouse', '', '59', 200, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261336444145715/mice2-1PNG.png', '500', 22),
(18, '13 Bits Tower PC (Mini)', '', '700', 5, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261277652594858/pc1-1PNG.png', '10', 11),
(19, '13 Bits Ultra Gaming PC', '', '7500', 0, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261278768283718/pc2-1PNG.png', '10', 11),
(20, '13 Bits Mid Range PC', '', '500', 22, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261277988143114/pc3-1PNG.png', '200', 11),
(21, 'Logitech PC Speakers (Black)', '', '35', 233, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261233729839184/speaker1-1PNG.png', '100', 44),
(22, '13 Bits RGB System', '', '99', 44, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261235306909796/speaker2-1PNG.png', '223', 44),
(23, 'Logitech PC Sound System (Black)', '', '250', 233, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261234409316362/speaker4-1PNG.png', '43', 44),
(24, 'Logitech Theatre PC Speakers', '', '99', 0, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261234602266744/speaker3-1PNG.png', '33', 44),
(26, 'Wired HD Webcam', '', '45', 233, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261164481892382/webcam1-1PNG.png', '100', 55),
(27, 'Dual HD Webcam', '', '60', 545, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261166268653659/webcam2-1PNG.png', '222', 55),
(28, '13 Bits Retro Webcam', '', '25', 233, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261165555621979/webcam3-1PNG.png', '202', 55),
(31, 'Wireless 4K Webcam', 'a High-end 4K webcam designed by 13 bits to provide the best resolution towards recording. Also optimised for streaming', '75', 1, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261165777932379/webcam2-3PNG.png', '20', '55'),
(32, 'Hama HD Webcam', '1080p Streaming camera providing a constant high resolution feed', '25', 0, 'https://media.discordapp.net/attachments/1073347102559703130/1077261164918087810/webcam5-1PNG.png', '40', '55');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` varchar(30) DEFAULT NULL,
  `image_1` varchar(3000) DEFAULT NULL,
  `image_2` varchar(3000) DEFAULT NULL,
  `image_3` varchar(3000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_1`, `image_2`, `image_3`) VALUES
(1, '1', 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261488336687245/keyboard2-1PNG.png        ', 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261471949533214/keyboard2-2PNG.png', 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261488336687245/keyboard2-1PNG.png        '),
(2, '2', 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261025507807303/headset1-1PNG.png', 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261026514448434/headset2-2PNG.png', 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261025801412628/headset1-2PNG.png'),
(3, '16', 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261335907291147/mice1-1PNG.png', 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261336695820368/mice1-2PNG.png', ''),
(4, '12', 'https://cdn.discordapp.com/attachments/1073347102559703130/1075794599307649095/laptop2-1.png', 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261431566762087/laptop2-2PNG.png', 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261431105396736/laptop2-3PNG.png'),
(5, '13', 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261430795026462/laptop1-1PNG.png', 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261432313348156/laptop1-2PNG.png', 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261432057503784/laptop1-3PNG.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keyvalue` (`keyvalue`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product` (`product`);

--
-- Indexes for table `login_info`
--
ALTER TABLE `login_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keyvalue` (`key_value`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_info`
--
ALTER TABLE `login_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
