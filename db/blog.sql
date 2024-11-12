-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2024 at 11:36 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_description` mediumtext DEFAULT NULL,
  `meta_keyword` mediumtext DEFAULT NULL,
  `navbar_status` tinyint(1) DEFAULT 0,
  `status` tinyint(1) DEFAULT 0 COMMENT '0=visible,1=hidden,2=deleted',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `meta_title`, `meta_description`, `meta_keyword`, `navbar_status`, `status`, `created_at`) VALUES
(1, 'Laptops', 'laptops1', 'laptops are portable computers designed for ease of use', 'Laptops', 'laptops are portable ', 'laptops,portable', 0, 0, '2024-08-23 09:45:41'),
(2, 'PC Components', 'ID-02', 'PC components are individual parts that make up a personal computer based on user needs are preferences', 'Components', 'PC components make up personal computers', 'PC,components', 0, 0, '2024-08-23 09:47:59');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `card_number` varchar(20) DEFAULT NULL,
  `expiry_date` varchar(5) DEFAULT NULL,
  `cvv` varchar(3) DEFAULT NULL,
  `JazzCashno` varchar(255) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `address`, `payment_method`, `card_number`, `expiry_date`, `cvv`, `JazzCashno`, `total`, `order_date`) VALUES
(25, 'Faizan Ahmad ', 'Baghgulbegum Samanabad Lahore', 'JazzCash', NULL, NULL, NULL, '12312314', '950000.00', '2024-11-04 09:48:22'),
(26, 'Faizan Ahmad ', 'Baghgulbegum Samanabad Lahore', 'credit_card', '2142353456346', '23423', '243', NULL, '60000.00', '2024-11-04 09:54:37'),
(27, 'Faizan Ahmad ', 'Baghgulbegum Samanabad Lahore', 'Cod', NULL, NULL, NULL, NULL, '70000.00', '2024-11-07 04:51:39'),
(28, 'Faizan Ahmad ', 'Baghgulbegum Samanabad Lahore', 'Cod', NULL, NULL, NULL, NULL, '70000.00', '2024-11-07 06:04:16'),
(29, 'amd lap', 'Baghgulbegum Samanabad Lahore', 'Cod', NULL, NULL, NULL, NULL, '115000.00', '2024-11-11 08:16:10');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_name`, `product_price`) VALUES
(49, 25, 'Nvidia RTX™ 3090 Ti 24G', '360000.00'),
(50, 25, 'AMD RX 7900 24G', '340000.00'),
(51, 25, 'Nvidia RTX™ 3080', '250000.00'),
(52, 26, 'Dell Inspiron 15', '60000.00'),
(53, 27, 'HP Pavilion 14', '70000.00'),
(54, 28, 'HP Pavilion 14', '70000.00'),
(55, 29, 'AMD Ryzen 9 9900X', '115000.00');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `brand` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(50,0) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keyword` mediumtext NOT NULL,
  `status` tinyint(1) DEFAULT 0 COMMENT '0=visible,1=hidden,2=deleted',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `brand_id`, `name`, `brand`, `slug`, `description`, `price`, `image`, `meta_title`, `meta_description`, `meta_keyword`, `status`, `created_at`) VALUES
(1, 1, 1, 'dummy', 'Nvidia', 'L-02', '<p>113</p>', '15000', '1724830105.jpg', 'dummy', 'dumm', 'dumm', 0, '2024-08-25 14:42:49'),
(2, 1, 1, 'nvidia  lap', 'intel', 'L-03', '<p>123</p>', '15000', '1724680170.png', '12345', '123', '123', 0, '2024-08-25 14:45:01'),
(3, 1, 2, 'amd lap', 'amd', 'L-04', '<p>123</p>', '15000', '1724680185.png', '123', '123411231', '121233', 0, '2024-08-25 15:00:50'),
(11, 1, 0, 'dumn3', 'asus', 'L-04', '<p>12345</p>', '16000', '1724679925.png', '123', '123', '134', 0, '2024-08-26 13:45:25'),
(12, 1, 0, 'laptop1', 'zotac', 'L-05', '<p>this is a laptop</p>', '17000', '1724766358.jpg', '123', '123', '123', 0, '2024-08-27 13:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(191) NOT NULL,
  `lname` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `address` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `age` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `role_as`, `status`, `created_at`, `address`, `picture`, `gender`, `age`) VALUES
(29, 'Waqar Ahmad', 'boy', 'faza1@gmail.com', '12345678', 0, 0, '2024-11-06 09:11:03', '', 'dune-movie-2021-hd-wallpaper-1920x1080-uhdpaper.com-100.0_c.jpg', '', 0),
(30, 'Hafiz Faizan', 'Ahmad', 'hfaizan@gmail.com', '12345678', 1, 0, '2024-11-07 04:58:58', 'Baghgulbegum Samanabad Lahore', 'dune-2021-movie-poster-hd-wallpaper-970d.jpg', 'Male', 24);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
