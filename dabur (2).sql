-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2020 at 01:17 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dabur`
--

-- --------------------------------------------------------

--
-- Table structure for table `dabur_categories`
--

CREATE TABLE `dabur_categories` (
  `id` int(11) NOT NULL,
  `category_title` varchar(50) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` enum('Enable','Disable') NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dabur_categories`
--

INSERT INTO `dabur_categories` (`id`, `category_title`, `parent_id`, `status`, `is_deleted`) VALUES
(1, 'Shampoo\'s & Post', 0, 'Enable', 'no'),
(2, 'Hair Oils', 0, 'Enable', 'no'),
(3, 'Styling', 0, 'Enable', 'no'),
(4, 'Conditioner', 1, 'Enable', 'no'),
(5, 'Regular Shampoo', 1, 'Enable', 'no'),
(6, 'Amla Hair Oils', 2, 'Enable', 'no'),
(7, 'Hair Cream', 3, 'Enable', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `dabur_countries`
--

CREATE TABLE `dabur_countries` (
  `id` int(11) NOT NULL,
  `country_name` varchar(30) NOT NULL,
  `region_id` int(11) NOT NULL,
  `currency_name` varchar(25) NOT NULL,
  `currency_code` int(11) NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dabur_countries`
--

INSERT INTO `dabur_countries` (`id`, `country_name`, `region_id`, `currency_name`, `currency_code`, `is_deleted`) VALUES
(1, 'Portugal', 6, 'Euro', 978, 'no'),
(2, 'Latvia', 6, 'Euro', 978, 'no'),
(3, 'Qatar', 2, 'Qatari Rial', 634, 'no'),
(4, 'Kuwait', 2, 'Kuwaiti Dinar', 414, 'no'),
(5, 'Libya', 1, 'Libyan Dinar', 434, 'no'),
(6, 'Algeria', 1, 'Algerian Dinar', 12, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `dabur_create_log`
--

CREATE TABLE `dabur_create_log` (
  `id` int(11) NOT NULL,
  `concerning_id` int(11) NOT NULL,
  `table_name` varchar(30) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dabur_create_log`
--

INSERT INTO `dabur_create_log` (`id`, `concerning_id`, `table_name`, `created`, `created_by`) VALUES
(1, 1, 'dabur_categories', '2020-07-24 18:51:55', 1),
(2, 2, 'dabur_categories', '2020-07-24 21:34:53', 1),
(3, 3, 'dabur_categories', '2020-07-24 21:35:25', 1),
(4, 4, 'dabur_categories', '2020-07-24 21:35:53', 1),
(5, 5, 'dabur_categories', '2020-07-24 21:36:29', 1),
(6, 6, 'dabur_categories', '2020-07-24 21:36:46', 1),
(7, 7, 'dabur_categories', '2020-07-24 21:37:10', 1),
(8, 1, 'dabur_regions', '2020-07-24 21:39:45', 1),
(9, 2, 'dabur_regions', '2020-07-24 21:39:58', 1),
(10, 3, 'dabur_regions', '2020-07-24 21:40:09', 1),
(11, 4, 'dabur_regions', '2020-07-24 21:40:16', 1),
(12, 5, 'dabur_regions', '2020-07-24 21:40:24', 1),
(13, 6, 'dabur_regions', '2020-07-24 21:40:31', 1),
(14, 7, 'dabur_regions', '2020-07-24 21:40:43', 1),
(15, 1, 'dabur_countries', '2020-07-24 21:43:31', 1),
(16, 2, 'dabur_countries', '2020-07-24 21:44:30', 1),
(17, 3, 'dabur_countries', '2020-07-24 21:48:15', 1),
(18, 4, 'dabur_countries', '2020-07-24 21:49:54', 1),
(19, 5, 'dabur_countries', '2020-07-24 21:52:15', 1),
(20, 6, 'dabur_countries', '2020-07-24 21:53:04', 1),
(21, 1, 'dabur_unit_of_measure', '2020-07-24 21:56:29', 1),
(22, 1, 'dabur_products', '2020-07-24 21:57:53', 1),
(23, 2, 'dabur_products', '2020-07-26 14:21:14', 1),
(24, 3, 'dabur_products', '2020-07-26 14:30:32', 1),
(25, 4, 'dabur_products', '2020-07-27 09:40:02', 1),
(26, 5, 'dabur_products', '2020-07-27 09:41:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dabur_delete_log`
--

CREATE TABLE `dabur_delete_log` (
  `id` int(11) NOT NULL,
  `concerning_id` int(11) NOT NULL,
  `table_name` varchar(30) NOT NULL,
  `deleted` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dabur_delete_log`
--

INSERT INTO `dabur_delete_log` (`id`, `concerning_id`, `table_name`, `deleted`, `deleted_by`) VALUES
(1, 1, 'dabur_products', '2020-07-26 14:21:28', 1),
(2, 2, 'dabur_products', '2020-07-26 14:30:54', 1),
(3, 3, 'dabur_products', '2020-07-27 09:31:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dabur_distributor`
--

CREATE TABLE `dabur_distributor` (
  `id` int(11) NOT NULL,
  `distributor_name` varchar(30) NOT NULL,
  `region_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `exchange_rate` double NOT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dabur_edit_log`
--

CREATE TABLE `dabur_edit_log` (
  `id` int(11) NOT NULL,
  `concerning_id` int(11) NOT NULL,
  `table_name` varchar(30) NOT NULL,
  `edited` datetime NOT NULL DEFAULT current_timestamp(),
  `edited_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dabur_edit_log`
--

INSERT INTO `dabur_edit_log` (`id`, `concerning_id`, `table_name`, `edited`, `edited_by`) VALUES
(1, 2, 'dabur_products', '2020-07-26 14:21:37', 1),
(2, 3, 'dabur_products', '2020-07-26 14:40:19', 1),
(3, 3, 'dabur_products', '2020-07-26 14:42:14', 1),
(4, 3, 'dabur_products', '2020-07-26 14:42:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dabur_pricestructure`
--

CREATE TABLE `dabur_pricestructure` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `case_config` double NOT NULL,
  `rsp_aed` double NOT NULL,
  `rsp_pc` double NOT NULL,
  `ptr_aed` double NOT NULL,
  `ptw_aed` double NOT NULL,
  `dplc_aed` double NOT NULL,
  `billing_price_aed` double NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dabur_products`
--

CREATE TABLE `dabur_products` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `variant` varchar(100) NOT NULL,
  `size` int(11) NOT NULL,
  `uom_id` int(11) NOT NULL,
  `fgcode` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dabur_products`
--

INSERT INTO `dabur_products` (`id`, `country_id`, `category_id`, `sub_category_id`, `brand`, `variant`, `size`, `uom_id`, `fgcode`, `description`, `is_deleted`) VALUES
(1, 0, 3, 1, '4', 'Vatika Conditioner', 0, 200, '1', 'FC248200GC', 'yes'),
(2, 4, 1, 3, 'VATIKA HAIR OIL', 'Dabur Amla Hair Oil', 200, 1, 'FC248200GC', 'Dabur Amla Hair Oil 200ml', 'yes'),
(3, 4, 1, 5, 'Dabur Amla Hair Oil', 'Dabur Amla Hair Oil', 200, 1, 'FC011200', 'Dabur Amla Hair Oil 200ml', 'yes'),
(4, 4, 2, 6, 'Dabur Amla Hair Oil ', ' Cooling', 200, 1, 'FC014200GC', 'Dabur Amla Hair Oil Cooling 200ml', 'no'),
(5, 4, 2, 6, 'Dabur Amla Hair Oil', 'Anti Dandruff ', 200, 1, 'FC015200GC', 'Dabur Amla Hair Oil Anti Dandruff 200ml', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `dabur_product_size`
--

CREATE TABLE `dabur_product_size` (
  `id` int(11) NOT NULL,
  `product_size` int(11) NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dabur_regions`
--

CREATE TABLE `dabur_regions` (
  `id` int(11) NOT NULL,
  `region_title` varchar(30) NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dabur_regions`
--

INSERT INTO `dabur_regions` (`id`, `region_title`, `is_deleted`) VALUES
(1, 'North Africa', 'no'),
(2, 'GCC', 'no'),
(3, 'Levant	', 'no'),
(4, 'Iraq', 'no'),
(5, 'South East Asia', 'no'),
(6, 'Emerging Markets', 'no'),
(7, 'SSA', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `dabur_sales_planing`
--

CREATE TABLE `dabur_sales_planing` (
  `id` int(11) NOT NULL,
  `sales` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `sales_type` enum('monthly','yearly') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dabur_unit_of_measure`
--

CREATE TABLE `dabur_unit_of_measure` (
  `id` int(11) NOT NULL,
  `unit_of_measure` varchar(30) NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dabur_unit_of_measure`
--

INSERT INTO `dabur_unit_of_measure` (`id`, `unit_of_measure`, `is_deleted`) VALUES
(1, 'ml', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `dabur_users`
--

CREATE TABLE `dabur_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `status` enum('Enable','Disable') NOT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no',
  `distributor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dabur_users`
--

INSERT INTO `dabur_users` (`user_id`, `username`, `email`, `password`, `first_name`, `last_name`, `phone`, `user_type_id`, `status`, `is_deleted`, `distributor_id`) VALUES
(1, 'admin', 'admin@gmail.com', '12345', 'admin', '', '0513453232', 1, 'Enable', 'no', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dabur_usertype`
--

CREATE TABLE `dabur_usertype` (
  `user_type_id` int(11) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dabur_usertype`
--

INSERT INTO `dabur_usertype` (`user_type_id`, `user_type`, `description`, `is_deleted`) VALUES
(1, 'admin', 'Admin', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dabur_categories`
--
ALTER TABLE `dabur_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dabur_countries`
--
ALTER TABLE `dabur_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dabur_create_log`
--
ALTER TABLE `dabur_create_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dabur_delete_log`
--
ALTER TABLE `dabur_delete_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dabur_distributor`
--
ALTER TABLE `dabur_distributor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dabur_edit_log`
--
ALTER TABLE `dabur_edit_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dabur_pricestructure`
--
ALTER TABLE `dabur_pricestructure`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `dabur_products`
--
ALTER TABLE `dabur_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dabur_product_size`
--
ALTER TABLE `dabur_product_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dabur_regions`
--
ALTER TABLE `dabur_regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dabur_sales_planing`
--
ALTER TABLE `dabur_sales_planing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dabur_unit_of_measure`
--
ALTER TABLE `dabur_unit_of_measure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dabur_users`
--
ALTER TABLE `dabur_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `dabur_usertype`
--
ALTER TABLE `dabur_usertype`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dabur_categories`
--
ALTER TABLE `dabur_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dabur_countries`
--
ALTER TABLE `dabur_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dabur_create_log`
--
ALTER TABLE `dabur_create_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `dabur_delete_log`
--
ALTER TABLE `dabur_delete_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dabur_distributor`
--
ALTER TABLE `dabur_distributor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dabur_edit_log`
--
ALTER TABLE `dabur_edit_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dabur_pricestructure`
--
ALTER TABLE `dabur_pricestructure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dabur_products`
--
ALTER TABLE `dabur_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dabur_product_size`
--
ALTER TABLE `dabur_product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dabur_regions`
--
ALTER TABLE `dabur_regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dabur_sales_planing`
--
ALTER TABLE `dabur_sales_planing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dabur_unit_of_measure`
--
ALTER TABLE `dabur_unit_of_measure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dabur_users`
--
ALTER TABLE `dabur_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dabur_usertype`
--
ALTER TABLE `dabur_usertype`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
