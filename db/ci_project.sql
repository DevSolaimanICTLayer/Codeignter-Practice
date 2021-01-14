-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2021 at 07:17 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `customer_phone` varchar(13) DEFAULT NULL,
  `order_product_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`order_product_json`)),
  `order_total_unit_price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `customer_phone`, `order_product_json`, `order_total_unit_price`) VALUES
(5, '01749017677', '[{\"product_id\":\"10\",\"product_attribute\":\"Beech\",\"cost_price\":\"70\",\"unit_price\":1000,\"quantity\":10},{\"product_id\":\"6\",\"product_attribute\":\"Black\",\"cost_price\":\"70\",\"unit_price\":300,\"quantity\":\"3\"}]', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(5, 'Food'),
(6, 'Gents Fashion'),
(7, 'Electronics'),
(8, 'Furniture');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_code` varchar(15) NOT NULL,
  `product_attribute` varchar(50) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `product_costprice` double NOT NULL,
  `product_unit_price` double NOT NULL,
  `product_created_by` varchar(255) DEFAULT NULL,
  `product_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_code`, `product_attribute`, `category_id`, `product_costprice`, `product_unit_price`, `product_created_by`, `product_created_at`) VALUES
(1, 'I Phone', '603', 'Red, Black, Silver', 7, 80, 100, NULL, '2021-01-12 08:26:46'),
(2, 'Oppo Reno5', '601', 'Black ,Silver', 7, 80, 100, NULL, '2021-01-12 10:47:12'),
(3, 'Oppo A15', '602', 'Black ,Silver, Blue', 7, 100, 150, NULL, '2021-01-12 10:47:12'),
(4, 'Oppo A5', '604', 'Black ,Silver, Dark Blue', 7, 70, 100, NULL, '2021-01-12 10:49:10'),
(5, 'Oppo A33', '605', 'Black ,Silver, Blue, White', 7, 100, 150, NULL, '2021-01-12 10:49:10'),
(6, 'Samsung Galaxy M01s', '606', 'Black ,Silver, Dark Blue', 7, 70, 100, NULL, '2021-01-12 10:52:41'),
(7, 'Samsung Galaxy M51', '607', 'Black ,Silver, Blue', 7, 100, 120, NULL, '2021-01-12 10:52:41'),
(8, 'Executive Table', '801', ' Beech , Black', 8, 50, 80, NULL, '2021-01-12 10:56:14'),
(9, 'EXECUTIVE TABLE', '802', 'Beech', 8, 100, 120, NULL, '2021-01-12 10:56:14'),
(10, 'EXECUTIVE TABLE', '805', ' Beech , Black', 8, 70, 100, NULL, '2021-01-12 10:58:20'),
(11, 'EXECUTIVE TABLE', '806', 'Beech', 8, 100, 150, NULL, '2021-01-12 10:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock_in`
--

CREATE TABLE `tbl_stock_in` (
  `perchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_cost_price` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `perchase_date` timestamp NULL DEFAULT NULL,
  `product_attribute` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_stock_in`
--

INSERT INTO `tbl_stock_in` (`perchase_id`, `product_id`, `product_cost_price`, `supplier_id`, `perchase_date`, `product_attribute`) VALUES
(160, 3072, 787, 2, '2021-01-07 06:30:05', NULL),
(161, 5118, 702, 2, '2021-01-10 03:03:44', NULL),
(162, 5166, 561, 2, '2021-01-10 03:04:34', NULL),
(163, 5116, 919, 2, '2021-01-12 02:44:01', NULL),
(164, 5119, 579, 2, '2021-01-12 02:49:21', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_code` (`product_code`);

--
-- Indexes for table `tbl_stock_in`
--
ALTER TABLE `tbl_stock_in`
  ADD PRIMARY KEY (`perchase_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_stock_in`
--
ALTER TABLE `tbl_stock_in`
  MODIFY `perchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
