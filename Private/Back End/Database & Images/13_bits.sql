-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 15, 2023 at 12:44 PM
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
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`id`, `username`, `email`, `password`) VALUES
(1, 'clive45', 'cwright@mail.org', 'test13'),
(2, 'mallen', 'mall32@gmail.com', 'meatball23');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_code` int(10) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int(5) DEFAULT NULL,
  `image_file` varchar(30) NOT NULL,
  `total` varchar(1000) DEFAULT NULL,
  `key_value` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `name`, `price`, `quantity`, `image_file`, `total`, `key_value`) VALUES
(1, 7372, '13 Bits Black Keyboard', '160', 10, 'keyboard2-1.jpeg', '500', 22),
(2, 2828, 'Logitech Gaming Headset (Black)', '60', 4, 'headset1-1.jpeg', '25', 33),
(4, 1112, '13 Bits Mouse', '8', 20, 'mice1-1.jpeg', '500', 22),
(5, 4543, 'Patrick Cat Arcade Machine', '10000', 5, 'arcade1-1.jpeg', '20', 11),
(6, 5622, 'Apple Wireless Magic Keyboard', '200', 25, 'keyboard1-1.jpeg', '200', 22),
(7, 7373, 'Logitech Gaming Headset (Red)', '60', 25, 'headset2-1.jpeg', '200', 33),
(9, 7370, '13 Bits Arcade Headset (Dark)', '90', 10, 'headset2-1.jpeg', '50', 33),
(10, 7372, '13 Bits Arcade Headset (Blue) ', '60', 25, 'headset3-2.jpeg', '200', 22),
(11, 7373, '13 Bits Retro Keyboard ', '160', 20, 'keyboard4-1.jpeg', '100', 22),
(12, 6262, 'MacBook Pro M2 1TB', '1260', 25, 'laptop2-1.jpeg', '200', 11),
(13, 1221, 'Acer Zenbook Gaming Laptop 1TB', '990', 12, 'laptop1-1.jpeg', '300', 11),
(14, 1221, 'HyperX Wired Mic (Black)', '75', 55, 'mic1-1.jpeg', '500', 33),
(15, 9445, 'ProSound Audio Microphone with Stand', '150', 20, 'mic2-1.jpeg', '200', 33),
(16, 8577, 'SandStrom Wireless Mouse', '80', 123, 'mic1-2.jpeg', '500', 22),
(17, 8324, 'Ergonomic Mouse', '59', 200, 'mic2-1.jpeg', '500', 22),
(18, 1221, '13 Bits Tower PC (Mini)', '700', 5, 'pc1-1.jpeg', '10', 11),
(19, 1221, '13 Bits Ultra Gaming PC', '7500', 5, 'pc2-1.jpeg', '10', 22),
(20, 1254, '13 Bits Mid Range PC', '500', 22, 'pc3-1.jpeg', '200', 11),
(21, 4628, 'Logitech PC Speakers (Black)', '35', 233, 'speaker1-1.jpeg', '100', 44),
(22, 2038, '13 Bits RGB System', '99', 44, 'speaker2-1.jpeg', '223', 44),
(23, 5456, 'Logitech PC Sound System (Black)', '250', 233, 'speaker3-1.jpeg', '43', 44),
(24, 1221, '13 Bits Theatre PC Speakers', '99', 553, 'speaker4-2.jpeg', '33', 44),
(25, 1221, '13 Bits Home Sound Bar', '125', 100, 'speaker5-1.jpeg', '22', 44),
(26, 7272, 'Wired HD Webcam', '45', 233, 'webcam1-1.jpeg', '100', 55),
(27, 6273, 'Dual HD Webcam', '60', 545, 'webcam2-1.jpeg', '222', 55),
(28, 3681, '13 Bits Retro Webcam', '25', 233, 'webcam3-1.jpeg', '202', 55),
(29, 1090, 'Wireless 4K Webcam', '75', 233, 'webcam4-1.jpeg', '100', 55),
(30, 7765, 'Hama HD Webcam', '25', 111, 'webcam5-1.jpeg', '93', 55);

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
  ADD KEY `product` (`product`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `login_info`
--
ALTER TABLE `login_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keyvalue` (`key_value`);

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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
