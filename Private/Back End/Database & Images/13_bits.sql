-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 19, 2023 at 11:51 PM
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `user_id` int(5) NOT NULL,
  `total` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
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
(6, 'Apple Wireless Magic Keyboard', 'Apple\'s Flagship branded wireless keyboard, designed for MAC OS products', '200', 25, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261469613301870/keyboard1-1PNG.png', '200', 22),
(7, 'Logitech Gaming Headset (Red)', '5.1 Surround Sound, over 30 hours of Battery with RGB capabilities', '60', 0, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261026023706744/headset2-1PNG.png', '200', 33),
(9, '13 Bits Arcade Headset (Dark)', 'Designed with the serious gamer in mind, this headset delivers an immersive and exhilarating gaming experience like no other. Featuring high-quality sound and noise-cancelling technology, you\'ll be able to hear every detail of your favorite games with crystal-clear clarity.', '90', 0, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261025801412628/headset1-2PNG.png', '50', 33),
(10, '13 Bits Arcade Headset (Blue) ', 'Designed with the serious gamer in mind, this headset delivers an immersive and exhilarating gaming experience like no other. Featuring high-quality sound and noise-cancelling technology, you\'ll be able to hear every detail of your favorite games with crystal-clear clarity.', '90', 25, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261025277124679/headset3-2PNG.png', '200', 33),
(11, '13 Bits Retro Keyboard ', 'Introducing our Retro Keyboard, the perfect blend of vintage style and modern functionality. With its sleek, classic design and durable construction, this keyboard is perfect for anyone looking for a touch of nostalgia.', '160', 20, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261470271807498/keyboard4-1PNG.png', '100', 22),
(12, 'MacBook Pro M2 1TB', 'Powered by the next-generation M2 chip, the redesigned MacBook Air packs incredible performance and up to 18 hours of battery life into an incredibly thin aluminum body.', '1260', 0, 'https://cdn.discordapp.com/attachments/1073347102559703130/1075794599307649095/laptop2-1.png', '200', 11),
(13, 'Acer Zenbook Gaming Laptop 1TB', 'Gaming Laptop created by Acer with 1TB SSD ', '990', 12, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261430795026462/laptop1-1PNG.png', '300', 11),
(14, 'HyperX Wired Mic (Black)', '7.1 Virtual Surround Sound, consisting of a dark black around the cups of the headset', '75', 55, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261381973311488/mic1-1PNG.png', '500', 33),
(15, 'ProSound Audio Microphone with Stand', 'ntroducing the ProSound USB Condenser Cardioid Microphone with Boom Arm & Pop Filter, the ultimate solution for streamers, podcasters, gamers, vocalists, and voice-over artists who demand professional-grade sound quality.', '150', 20, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261382380167178/mic2-2PNG.png', '200', 33),
(16, 'SandStrom Wireless Mouse', ' We are proud to present our smooth and effective wireless mouse! Its dependable wireless connection enables you to effortlessly manage your computer from afar, eliminating the inconvenience of tangled cables and restricted movement.', '80', 123, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261336695820368/mice1-2PNG.png', '500', 22),
(17, 'Ergonomic Mouse', 'The design of this mouse is aimed at minimizing discomfort and strain on your hand and fingers during use. Its shape is intended to provide comfort, and the buttons are easily accessible.', '59', 200, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261336444145715/mice2-1PNG.png', '500', 22),
(18, '13 Bits Tower PC (Mini)', 'Introducing the 13 bits Tower PC.A compact gaming PC that offers high-performance gaming capabilities in a small form factor. This mini PC is designed to handle demanding games with ease and features powerful components such as a fast processor, a dedicated graphics card, and ample storage. Its small size makes it ideal for gamers who want a powerful gaming setup without taking up too much space.', '700', 5, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261277652594858/pc1-1PNG.png', '10', 11),
(19, '13 Bits Ultra Gaming PC', 'the 13 Bits Ultra Gaming PC is a powerful computer system that is designed specifically for playing video games at the highest level of performance. It is equipped with advanced components such as a fast processor, high-end graphics card, large amount of RAM, and high-speed storage. This type of PC is capable of handling the most demanding games with ease, delivering smooth and immersive gameplay experiences.', '7500', 0, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261278768283718/pc2-1PNG.png', '10', 11),
(20, '13 Bits Mid Range PC', 'This computer is designed for gamers who want a balance between price and performance. It has hardware that can handle most games smoothly, with a powerful processor, graphics card, and enough memory to keep up with the demands of modern games', '500', 22, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261277988143114/pc3-1PNG.png', '200', 11),
(21, 'Logitech PC Speakers (Black)', 'Rich stereo sound, deep bass for any living space. With 10 W of peak power and two drivers per satellite, these multimedia speakers pump out enough volume to fill any room with rich, balanced stereo sound plus added deep bass. You can adjust the bass to your taste thanks to a dedicated bass control wheel. Two audio inputs make it a snap to plug in your smartphone, tablet or laptop - or even two at the same time. ', '35', 233, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261233729839184/speaker1-1PNG.png', '100', 44),
(22, '13 Bits RGB System', 'A Gaming 5.1 Surround Sound system, consisting of RGB monitors and one 600W RGB Subwoofer', '99', 44, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261235306909796/speaker2-1PNG.png', '223', 44),
(23, 'Logitech PC Sound System (Black)', 'This 2.1 speaker system has a maximum loudness of 80 Watts Peak/40 Watts RMS power and features a front-facing subwoofer that produces a rich bass. You can connect two compatible devices to the system using the 3.5 mm and RCA inputs, allowing for easy switching between different audio sources.', '99', 233, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261234409316362/speaker4-1PNG.png', '43', 44),
(24, 'Logitech Theatre PC Speakers', 'Enjoy a high-end audio experience that rivals that of a professional theater in the comfort of your own home with this 5.1 speaker system. Featuring a powerful 1000 Watts Peak/500 Watts RMS power output, this system is THX Certified and delivers rich, immersive surround sound.', '350', 0, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261234602266744/speaker3-1PNG.png', '33', 44),
(26, 'Wired HD Webcam', ' A high-quality camera that connects to your computer via a USB cable, allowing you to capture clear and detailed video and images. This type of webcam is an excellent option for anyone who needs to communicate with others remotely, whether for work, school, or personal use.', '45', 233, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261164481892382/webcam1-1PNG.png', '100', 55),
(27, 'Dual HD Webcam', ' the perfect solution for high-quality video conferencing, live streaming, or content creation. With dual lenses, you can switch between a wide-angle view or a close-up shot with ease. Enjoy stunning 1080p resolution and crystal-clear audio thanks to built-in noise reduction technology. ', '60', 545, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261166268653659/webcam2-1PNG.png', '222', 55),
(28, '13 Bits Retro Webcam', 'Introducing our Retro Webcam - a stylish and functional addition to your computer setup! With its vintage-inspired design, this webcam brings a touch of nostalgia to your video calls and online meetings. Equipped with high-quality optics and advanced imaging technology, it captures clear and vibrant footage in up to 1080p Full HD resolution. The adjustable clip allows for easy mounting on your laptop or desktop monitor, and the plug-and-play USB connection ensures hassle-free setup. ', '25', 233, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261165555621979/webcam3-1PNG.png', '202', 55),
(31, 'Wireless 4K Webcam', 'a High-end 4K webcam designed by 13 bits to provide the best resolution towards recording. Also optimised for streaming', '75', 1, 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261165777932379/webcam2-3PNG.png', '20', 55),
(32, 'Hama HD Webcam', '1080p Streaming camera providing a constant high resolution feed', '25', 0, 'https://media.discordapp.net/attachments/1073347102559703130/1077261164918087810/webcam5-1PNG.png', '40', 55);

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
(5, '13', 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261430795026462/laptop1-1PNG.png', 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261432313348156/laptop1-2PNG.png', 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261432057503784/laptop1-3PNG.png'),
(6, '16', 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261335907291147/mice1-1PNG.png', 'https://cdn.discordapp.com/attachments/1073347102559703130/1077261336695820368/mice1-2PNG.png', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
