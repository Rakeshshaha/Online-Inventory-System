-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2019 at 01:28 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(2, 'Rice');

-- --------------------------------------------------------

--
-- Table structure for table `products_info`
--

CREATE TABLE `products_info` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `quantity` int(15) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `extension` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_info`
--

INSERT INTO `products_info` (`id`, `category_id`, `sub_category_id`, `product_name`, `quantity`, `unit_price`, `extension`) VALUES
(1, 2, 2, 'miniket rice', 40, 2000, 'Bags'),
(2, 2, 2, 'miniket rr', 40, 2000, 'Bags');

-- --------------------------------------------------------

--
-- Table structure for table `sales_info`
--

CREATE TABLE `sales_info` (
  `id` int(11) NOT NULL,
  `sale_no` varchar(100) NOT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `date` date NOT NULL,
  `time` varchar(30) NOT NULL,
  `total_bill` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_info`
--

INSERT INTO `sales_info` (`id`, `sale_no`, `customer_name`, `phone`, `date`, `time`, `total_bill`) VALUES
(1, '5cac660c3e6d3', 'Ratan Hazra', '01969344192', '2019-04-09', '03:29:48pm', 4009),
(2, '5cac6be90d7d2', 'Ratan Hazra', '01969344192', '2019-04-09', '03:54:49pm', 4009),
(3, '5cac6c31e143e', 'Ratan Hazra', '01969344192', '2019-04-09', '03:56:01pm', 4009),
(4, '5cac6c9dce833', 'new', '12345670', '2019-04-09', '03:57:49pm', 4007),
(5, '5cac6ce368e46', 'new', '12345670', '2019-04-09', '03:58:59pm', 4007),
(6, '5cac6d467ecb1', 'new', '12345670', '2019-04-09', '04:00:38pm', 4007),
(7, '5cac6d79a9963', 'new', '12345670', '2019-04-09', '04:01:29pm', 4007),
(8, '5cac6dbad8949', 'new', '12345670', '2019-04-09', '04:02:34pm', 4007),
(9, '5cac6e0a08327', 'new', '12345670', '2019-04-09', '04:03:54pm', 4007);

-- --------------------------------------------------------

--
-- Table structure for table `sales_product`
--

CREATE TABLE `sales_product` (
  `id` int(11) NOT NULL,
  `sale_no` varchar(100) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `measurement` varchar(100) DEFAULT NULL,
  `unit_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_product`
--

INSERT INTO `sales_product` (`id`, `sale_no`, `p_id`, `qty`, `measurement`, `unit_price`) VALUES
(1, '5cac660c3e6d3', 1, 5, 'Bags', 2000),
(2, '5cac660c3e6d3', 1, 4, 'Litter', 2000),
(3, '5cac6be90d7d2', 1, 5, 'Bags', 2000),
(4, '5cac6be90d7d2', 1, 4, 'Litter', 2000),
(5, '5cac6c31e143e', 1, 5, 'Bags', 2000),
(6, '5cac6c31e143e', 1, 4, 'Litter', 2000),
(7, '5cac6c9dce833', 1, 4, 'Bags', 2000),
(8, '5cac6c9dce833', 1, 3, 'Bags', 2000),
(9, '5cac6ce368e46', 1, 4, 'Bags', 2000),
(10, '5cac6ce368e46', 1, 3, 'Bags', 2000),
(11, '5cac6d467ecb1', 1, 4, 'Bags', 2000),
(12, '5cac6d467ecb1', 1, 3, 'Bags', 2000),
(13, '5cac6d79a9963', 1, 4, 'Bags', 2000),
(14, '5cac6d79a9963', 1, 3, 'Bags', 2000),
(15, '5cac6dbad8949', 1, 4, 'Bags', 2000),
(16, '5cac6dbad8949', 1, 3, 'Bags', 2000),
(17, '5cac6e0a08327', 1, 4, 'Bags', 2000),
(18, '5cac6e0a08327', 1, 3, 'Bags', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_id`, `sub_category_name`) VALUES
(1, 2, 'Nazirshail Rice'),
(2, 2, 'Miniket Rice');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `role` int(11) DEFAULT '1' COMMENT 'manager=1, admin=0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', '12345', 0),
(2, 'Manager', 'manager@gmail.com', '123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_info`
--
ALTER TABLE `products_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_info`
--
ALTER TABLE `sales_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_product`
--
ALTER TABLE `sales_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products_info`
--
ALTER TABLE `products_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sales_info`
--
ALTER TABLE `sales_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sales_product`
--
ALTER TABLE `sales_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
