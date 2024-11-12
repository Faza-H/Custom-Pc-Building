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
-- Database: `pc_builder`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `card_number` varchar(20) DEFAULT NULL,
  `expiry_date` varchar(5) DEFAULT NULL,
  `cvv` varchar(3) DEFAULT NULL,
  `jazzcash_number` varchar(20) DEFAULT NULL,
  `easypaisa_number` varchar(20) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `address`, `payment_method`, `card_number`, `expiry_date`, `cvv`, `jazzcash_number`, `easypaisa_number`, `total`, `created_at`) VALUES
(6, 'Faizan Ahmad ', 'Baghgulbegum Samanabad Lahore', 'jazzcash', NULL, NULL, NULL, '03124108369', NULL, '572000.00', '2024-11-04 09:51:57'),
(7, 'Faizan Ahmad ', 'Baghgulbegum Samanabad Lahore', 'Cod', NULL, NULL, NULL, NULL, NULL, '741000.00', '2024-11-05 08:24:15'),
(8, 'Faizan Ahmad ', 'Baghgulbegum Samanabad Lahore', 'jazzcash', NULL, NULL, NULL, '3424234324', NULL, '426000.00', '2024-11-06 05:23:36'),
(9, 'umer', 'Baghgulbegum Samanabad Lahore', 'jazzcash', NULL, NULL, NULL, '32131231231', NULL, '415000.00', '2024-11-06 08:48:59'),
(10, 'Faizan Ahmad ', 'Baghgulbegum Samanabad Lahore', 'credit_card', '213424535', '9078', '878', NULL, NULL, '333000.00', '2024-11-07 04:56:47'),
(11, 'Faizan Ahmad ', 'Baghgulbegum Samanabad Lahore', 'Cod', NULL, NULL, NULL, NULL, NULL, '602000.00', '2024-11-07 06:20:54'),
(12, 'Faizan Ahmad ', 'Baghgulbegum Samanabad Lahore', 'Cod', NULL, NULL, NULL, NULL, NULL, '531000.00', '2024-11-11 08:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_name`, `product_price`) VALUES
(14, 6, 'AMD Ryzen 9 9900X', '115000.00'),
(15, 6, 'Nvidia RTX™ 4070 Ti 16G', '170000.00'),
(16, 6, 'DESIGNARE Memory 64GB (2x32GB) RAM', '85000.00'),
(17, 6, 'NVMe SSD 1TB', '35000.00'),
(18, 6, 'C400 GLASS Casing', '22000.00'),
(19, 6, 'MSI X870E AORUS MASTER Motherboard', '70000.00'),
(20, 6, 'ASUS ROG Thor 1600W Titanium', '75000.00'),
(21, 7, 'AMD Ryzen 9 9900X', '115000.00'),
(22, 7, 'Nvidia RTX™ 3090 Ti 24G', '360000.00'),
(23, 7, 'DESIGNARE Memory 64GB (2x32GB) RAM', '85000.00'),
(24, 7, 'Gen5 14000 SSD 1TB', '65000.00'),
(25, 7, 'C500 GLASS Casing', '28000.00'),
(26, 7, 'MSI X870E AORUS MASTER Motherboard', '70000.00'),
(27, 7, 'CORSAIR CX Series CX650 80-PLUS', '18000.00'),
(28, 8, 'Intel Core i9 14th Gen', '95000.00'),
(29, 8, 'Nvidia RTX™ 2080 Ti 16G', '195000.00'),
(30, 8, 'GIGABYTE Memory 16GB (2x8GB) 2666MHz RAM', '18000.00'),
(31, 8, 'NVMe SSD 1TB', '35000.00'),
(32, 8, 'XC700W Casing', '20000.00'),
(33, 8, 'Intel B760M D3HP Motherboard', '28000.00'),
(34, 8, 'ASUS TUF GAMING 850W 80+ Gold', '35000.00'),
(35, 9, 'Intel Core i7 12820X 12th Gen', '75000.00'),
(36, 9, 'Nvidia RTX™ 2080 Ti 16G', '195000.00'),
(37, 9, 'GIGABYTE Memory 16GB (2x8GB) 2666MHz RAM', '18000.00'),
(38, 9, 'M.2 SSD 500GB', '20000.00'),
(39, 9, 'C400 GLASS Casing', '22000.00'),
(40, 9, 'Intel X299 AORUS Gaming 7 Motherboard', '65000.00'),
(41, 9, 'SilverStone SST-AT650R', '20000.00'),
(42, 10, 'Intel Core i9 14th Gen', '95000.00'),
(43, 10, 'Nvidia GTX 1660 Ti 6G', '65000.00'),
(44, 10, 'GIGABYTE Memory 16GB (2x8GB) 2666MHz RAM', '18000.00'),
(45, 10, 'UD PRO SSD 1TB', '30000.00'),
(46, 10, 'XC700W Casing', '20000.00'),
(47, 10, 'MSI X870E AORUS MASTER Motherboard', '70000.00'),
(48, 10, 'ASUS TUF GAMING 850W 80+ Gold', '35000.00'),
(49, 11, 'AMD Ryzen 7 7800X', '75000.00'),
(50, 11, 'AMD RX 7900 24G', '340000.00'),
(51, 11, 'RGB Memory DDR5 32GB (2x16GB) RAM', '32000.00'),
(52, 11, 'UD PRO SSD 1TB', '30000.00'),
(53, 11, 'XC700W Casing', '20000.00'),
(54, 11, 'MSI X870E AORUS MASTER Motherboard', '70000.00'),
(55, 11, 'ASUS TUF GAMING 850W 80+ Gold', '35000.00'),
(56, 12, 'Intel Core i7 12820X 12th Gen', '75000.00'),
(57, 12, 'AMD RX 7900 24G', '340000.00'),
(58, 12, 'GIGABYTE Memory 16GB (2x8GB) 2666MHz RAM', '18000.00'),
(59, 12, 'UD PRO SSD 1TB', '30000.00'),
(60, 12, 'C400 GLASS Casing', '22000.00'),
(61, 12, 'Intel B760M D3HP Motherboard', '28000.00'),
(62, 12, 'CORSAIR CX Series CX650 80-PLUS', '18000.00');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

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
