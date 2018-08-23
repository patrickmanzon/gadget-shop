-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2018 at 03:37 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gadget`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(1, 'Samsung'),
(2, 'Vivo'),
(3, 'Cherry Mobile'),
(4, 'Xiaomi'),
(5, 'Oppo');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Laptop'),
(2, 'Mobile');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_price` int(11) NOT NULL,
  `prod_stock` int(11) NOT NULL,
  `prod_image` text NOT NULL,
  `prod_desc` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `cat_id`, `brand_id`, `prod_name`, `prod_price`, `prod_stock`, `prod_image`, `prod_desc`, `date_added`) VALUES
(4, 2, 1, 'Samsung J7 PRO', 10000, 20, './assets/images/upload/products/d9829f8bed2ca8750c51aa9581f9140e.png', '<h3>Samsung Galaxy J7 PRO specs</h3>\r\n\r\n<ul>\r\n	<li>Display: 5.5&rdquo; FHD Super AMOLED</li>\r\n	<li>Processor: Octa-Core 1.6GHz</li>\r\n	<li>Memory: 3GB (RAM) + 32GB (ROM)</li>\r\n	<li>Expandable up to 256GB</li>\r\n	<li>Camera: Rear 13MP (F1.7) &nbsp;+ Front 13MP (F1.9)</li>\r\n	<li>OS: Android Nougat</li>\r\n	<li>Battery: 3,600 mAh</li>\r\n	<li>SIM Type: Dual SIM Dual Socket (dedicated microSD slot)</li>\r\n	<li>Full Metal Unibody</li>\r\n	<li>Flash Camera Rear</li>\r\n	<li>Always on Display</li>\r\n</ul>\r\n', '2018-07-22 23:18:15'),
(5, 2, 2, 'Vivo Y53', 200, 20, './assets/images/upload/products/68f9ddbfdafcb0f53a150fcfdf3b8ec7.png', '<h3>VIVO Y53 specs</h3>\r\n\r\n<ul>\r\n	<li>5.0-inch IPS LCD @ 960 x 540 pixels, 220ppi</li>\r\n	<li>1.4GHz Qualcomm Snapdragon 425 quad-core CPU</li>\r\n	<li>Adreno 308</li>\r\n	<li>2GB RAM + 16GB internal storage</li>\r\n	<li>Expandable via microSD, up to 256GB (dedicated slot)</li>\r\n	<li>8MP rear autofocus camera w/ LED flash</li>\r\n	<li>5MP front-facing camera w/ screen flash</li>\r\n	<li>Dual-SIM (Nano)</li>\r\n	<li>4G LTE</li>\r\n	<li>USB OTG</li>\r\n	<li>FunTouch OS 3.0 (Android 6.0 Marshmallow)</li>\r\n	<li>2500mAh non-removable battery</li>\r\n</ul>\r\n', '2018-07-24 14:38:13'),
(6, 2, 3, 'Flare S5 Plus', 9000, 20, './assets/images/upload/products/8c1eef2a3659158587d04b0c53b1c2c7.png', '<h3>Flare S5 Plus specs</h3>\r\n\r\n<ul>\r\n	<li>Android Marshmallow 6.0</li>\r\n	<li>5.5\" IPS LCD Screen</li>\r\n	<li>32 GB ROM | 3GB RAM</li>\r\n	<li>16 MP PDAF REAR & 8MP FRONT</li>\r\n	<li>WIFI | LTE Ready</li>\r\n	<li>Dual Sim</li>\r\n	<li>3000 mAh</li>\r\n</ul>', '2018-07-24 14:39:40'),
(8, 2, 4, 'Redmi Note 4x', 7000, 20, './assets/images/upload/products/1ab786d14d63383ec50c6cd870a9aa0a.jpg', '<h3>Redmi Note 4X specs</h3>\r\n\r\n<ul>\r\n	<li>16GB Internal Storage / 3GB RAM Memory, External Storage Micro SD Up to 256GB (Uses SIM 2 Slot)</li>\r\n	<li>Dual SIM (Micro-SIM/Nano-SIM, Dual stand-by), Micro USB v2.0 (Quick Charge / OTG capable)</li>\r\n	<li>5.5 inches 1080 x 1920 Pixels 401 PPI, IPS LCD capacitive touchscreen, 16M colors</li>\r\n	<li>Android OS, v6.0.1 Marshmallow, MIUI Global 8.2 stable 8.2.5.0 (MCFMIDL)</li>\r\n	<li>Processor: Octa-core 2.0 GHz Qualcomm Snapdragon 625 2.02GHz</li>\r\n	<li>13MP Rear Camera / 5MP Front Camera</li>\r\n	<li>Fingerprint (rear-mounted), accelerometer, gyro, proximity</li>\r\n	<li>4000 mAh Battery (Not-removable)</li>\r\n</ul>\r\n', '2018-08-03 22:08:15'),
(9, 2, 3, 'Omega Lite 2', 6000, 10, './assets/images/upload/products/a4081a5fbc1aa9ff7b02f1111b95c4fd.png', '<h3>Omega Lite 2 specs</h3>\r\n\r\n<ul>\r\n	<li>Android Lollipop 5.1</li>\r\n	<li>1GHz Quad Core</li>\r\n	<li>5&quot; HD IPS Screen</li>\r\n	<li>13MP&nbsp;&amp; 8MP</li>\r\n	<li>8GB ROM / 1GB RAM</li>\r\n	<li>Micro SD&nbsp;up to 64GB (Expansion Slot)</li>\r\n</ul>\r\n', '2018-08-03 22:08:56'),
(10, 2, 3, 'Flare XL2', 5000, 5, './assets/images/upload/products/76d9cb22384b593734c74cb87b189a48.png', '<h3>Flare S5 Plus specs</h3>\r\n\r\n<ul>\r\n	<li>Android Marshmallow 6.0</li>\r\n	<li>5.5&quot;&nbsp;IPS LCD Screen</li>\r\n	<li>32 GB ROM | 3GB RAM</li>\r\n	<li>16 MP PDAF REAR &amp; 8MP FRONT</li>\r\n	<li>WIFI | LTE Ready</li>\r\n	<li>Dual Sim</li>\r\n	<li>3000 mAh</li>\r\n</ul>\r\n', '2018-08-03 22:09:45'),
(11, 2, 4, 'Xiaomi Redmi 3x', 15000, 15, './assets/images/upload/products/de006840a384f3dc97c832f6e7eacb2e.png', '<h3>Xiaomi Redmi 3X specs</h3>\r\n\r\n<ul>\r\n	<li>RAM: 2GB</li>\r\n	<li>ROM: 32GB</li>\r\n	<li>Band Details: Unicom 4G TDD / FDD-LTE / Unicom 3G WCDMA / Unicom 2G GSM / &middot; Mobile 4G TDD-LTE / &middot; Mobile 3G TD-SCDMA / &middot; Mobile 2G GSM / &middot; Telecommunications 4G TDD / FDD-LTE / &middot; Telecom 3G EVDO / Telecom 2G CDMA 1X</li>\r\n	<li>CPU Processor: snapdragon 430 4x1.4GHz + 4x1.1GHz</li>\r\n	<li>Screen Size ( inches): 5.0</li>\r\n	<li>Camera Pixel: 13.0MP</li>\r\n	<li>Front Camera Pixels: 5 MP</li>\r\n	<li>Battery Capacity: 4100 mAh</li>\r\n</ul>\r\n', '2018-08-03 22:10:45'),
(12, 2, 5, 'OPPO A37', 13333, 7, './assets/images/upload/products/b9acdf9e067a42c89a065d21d9c20543.png', '<h3>VIVO Y53 specs</h3>\r\n\r\n<ul>\r\n	<li>5.0-inch IPS LCD @ 960 x 540 pixels, 220ppi</li>\r\n	<li>1.4GHz Qualcomm Snapdragon 425 quad-core CPU</li>\r\n	<li>Adreno 308</li>\r\n	<li>2GB RAM + 16GB internal storage</li>\r\n	<li>Expandable via microSD, up to 256GB (dedicated slot)</li>\r\n	<li>8MP rear autofocus camera w/ LED flash</li>\r\n	<li>5MP front-facing camera w/ screen flash</li>\r\n	<li>Dual-SIM (Nano)</li>\r\n	<li>4G LTE</li>\r\n	<li>USB OTG</li>\r\n	<li>FunTouch OS 3.0 (Android 6.0 Marshmallow)</li>\r\n	<li>2500mAh non-removable battery</li>\r\n</ul>\r\n', '2018-08-03 22:11:20'),
(13, 2, 3, 'Omega Lite 2', 4999, 3, './assets/images/upload/products/88bede6b108c49d5ec86f2a0f0938312.png', '<h3>Omega Lite 2 specs</h3>\r\n\r\n<ul>\r\n	<li>Android Lollipop 5.1</li>\r\n	<li>1GHz Quad Core</li>\r\n	<li>5&quot; HD IPS Screen</li>\r\n	<li>13MP&nbsp;&amp; 8MP</li>\r\n	<li>8GB ROM / 1GB RAM</li>\r\n	<li>Micro SD&nbsp;up to 64GB (Expansion Slot)</li>\r\n</ul>\r\n', '2018-08-03 22:15:22'),
(14, 2, 1, 'Samsung Galaxy J7 Pro', 11000, 30, './assets/images/upload/products/d441c63d30061c696bb7013cf8e30738.png', '<h3>Samsung Galaxy J7 PRO specs</h3>\r\n\r\n<ul>\r\n	<li>Display: 5.5&rdquo; FHD Super AMOLED</li>\r\n	<li>Processor: Octa-Core 1.6GHz</li>\r\n	<li>Memory: 3GB (RAM) + 32GB (ROM)</li>\r\n	<li>Expandable up to 256GB</li>\r\n	<li>Camera: Rear 13MP (F1.7) &nbsp;+ Front 13MP (F1.9)</li>\r\n	<li>OS: Android Nougat</li>\r\n	<li>Battery: 3,600 mAh</li>\r\n	<li>SIM Type: Dual SIM Dual Socket (dedicated microSD slot)</li>\r\n	<li>Full Metal Unibody</li>\r\n	<li>Flash Camera Rear</li>\r\n	<li>Always on Display</li>\r\n</ul>\r\n', '2018-08-03 22:16:19');

-- --------------------------------------------------------

--
-- Table structure for table `users_account`
--

CREATE TABLE `users_account` (
  `ua_id` int(11) NOT NULL,
  `email` varchar(222) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_account`
--

INSERT INTO `users_account` (`ua_id`, `email`, `password`, `role`) VALUES
(3, 'tristan@gmail.com', '$2y$10$QQ2nqV/E1IS4UJnpIe9.T.73QKNqJel5.lbaRJkXkeyO8eVsBnCyW', 0),
(4, 'patrick@gmail.com', '$2y$10$kY0mUX3IuRdfkLLFnfg6q.3BlsbnNdJ27ZmwdwPUHOOFsJveDLmz.', 1),
(5, 'test@gmail.com', '$2y$10$RJWhLHIY4ba.D7eDqUI0p.LLUTm4qb8kld90.y61mB6TvMxE2JsPO', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `ui_id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `date_registered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`ui_id`, `firstname`, `lastname`, `contact`, `address`, `date_registered`) VALUES
(3, 'Tristan', 'Manzon', '09163439716', 'Bagac Bataan', '2018-08-10 00:36:43'),
(4, 'Patrick', 'Manzon', '09094306161', 'Bagac, Bataan', '2018-08-10 00:40:46'),
(5, '<b>b&lt;/>', '<b>b&lt;/>', '09094507171', 'Bagac Bataan', '2018-08-10 00:45:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `users_account`
--
ALTER TABLE `users_account`
  ADD PRIMARY KEY (`ua_id`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`ui_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users_account`
--
ALTER TABLE `users_account`
  MODIFY `ua_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `ui_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
