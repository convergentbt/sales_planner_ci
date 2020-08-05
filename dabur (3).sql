-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2020 at 01:53 PM
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
(2, 'Conditioner', 1, 'Enable', 'no'),
(3, 'Regular Shampoo', 1, 'Enable', 'no'),
(4, 'Hair Oils', 0, 'Enable', 'no'),
(5, 'Amla Hair Oils', 4, 'Enable', 'no'),
(6, 'Styling', 0, 'Enable', 'no'),
(7, '41', 2232121, '', 'no'),
(8, '', 0, 'Enable', 'no'),
(9, '', 8, 'Enable', 'no'),
(10, '', 9, 'Enable', 'no'),
(11, '', 10, 'Enable', 'no'),
(12, '', 11, 'Enable', 'no'),
(13, '', 12, 'Enable', 'no'),
(14, '', 13, 'Enable', 'no'),
(15, '', 14, 'Enable', 'no'),
(16, '', 15, 'Enable', 'no'),
(17, '', 16, 'Enable', 'no'),
(18, '', 17, 'Enable', 'no'),
(19, '', 18, 'Enable', 'no'),
(20, 'FY17', 0, 'Enable', 'no'),
(21, 'FY18', 20, 'Enable', 'no'),
(22, '* 847,637', 0, 'Enable', 'no'),
(23, '* 867,088', 22, 'Enable', 'no'),
(24, '* 343,906', 0, 'Enable', 'no'),
(25, '* 355,877', 24, 'Enable', 'no'),
(26, '* 41,445', 0, 'Enable', 'no'),
(27, '* 36,403', 26, 'Enable', 'no'),
(28, '* 68,609', 0, 'Enable', 'no'),
(29, '* 80,178', 28, 'Enable', 'no'),
(30, '* 79,004', 0, 'Enable', 'no'),
(31, '* 68,777', 30, 'Enable', 'no'),
(32, '* 55,497', 0, 'Enable', 'no'),
(33, '* 62,158', 32, 'Enable', 'no'),
(34, '* 1,250,000', 0, 'Enable', 'no'),
(35, '* 1,000,000', 34, 'Enable', 'no'),
(36, '* 400,000', 0, 'Enable', 'no'),
(37, '* 380,159', 36, 'Enable', 'no'),
(38, '* 45,000', 0, 'Enable', 'no'),
(39, '* 40,966', 38, 'Enable', 'no'),
(40, '* 101,000', 0, 'Enable', 'no'),
(41, '* 119,559', 40, 'Enable', 'no'),
(42, '* 80,000', 0, 'Enable', 'no'),
(43, '* 63,394', 42, 'Enable', 'no'),
(44, '* 60,000', 0, 'Enable', 'no'),
(45, '* 78,820', 44, 'Enable', 'no'),
(46, '', 19, 'Enable', 'no'),
(47, '', 46, 'Enable', 'no'),
(48, '', 47, 'Enable', 'no'),
(49, '', 48, 'Enable', 'no'),
(50, '', 49, 'Enable', 'no'),
(51, '', 50, 'Enable', 'no'),
(52, '', 51, 'Enable', 'no'),
(53, '', 52, 'Enable', 'no'),
(54, '', 53, 'Enable', 'no'),
(55, '', 54, 'Enable', 'no'),
(56, '', 55, 'Enable', 'no'),
(57, 'Hair Cream', 6, 'Enable', 'no'),
(58, '', 56, 'Enable', 'no'),
(59, '', 58, 'Enable', 'no'),
(60, '', 59, 'Enable', 'no'),
(61, '', 60, 'Enable', 'no'),
(62, '', 61, 'Enable', 'no'),
(63, '', 62, 'Enable', 'no'),
(64, '', 63, 'Enable', 'no'),
(65, '', 64, 'Enable', 'no'),
(66, '', 65, 'Enable', 'no'),
(67, '', 66, 'Enable', 'no'),
(68, '', 67, 'Enable', 'no'),
(69, '', 68, 'Enable', 'no'),
(70, '', 69, 'Enable', 'no'),
(71, '', 70, 'Enable', 'no'),
(72, '', 71, 'Enable', 'no'),
(73, '', 72, 'Enable', 'no'),
(74, '', 73, 'Enable', 'no'),
(75, '', 74, 'Enable', 'no'),
(76, '', 75, 'Enable', 'no'),
(77, '', 76, 'Enable', 'no'),
(78, '', 77, 'Enable', 'no'),
(79, '', 78, 'Enable', 'no'),
(80, '', 79, 'Enable', 'no'),
(81, '', 80, 'Enable', 'no'),
(82, '', 81, 'Enable', 'no'),
(83, '', 82, 'Enable', 'no'),
(84, '', 83, 'Enable', 'no'),
(85, '', 84, 'Enable', 'no'),
(86, '', 85, 'Enable', 'no'),
(87, '', 86, 'Enable', 'no'),
(88, '', 87, 'Enable', 'no'),
(89, '', 88, 'Enable', 'no'),
(90, '', 89, 'Enable', 'no'),
(91, '', 90, 'Enable', 'no'),
(92, '', 91, 'Enable', 'no'),
(93, '', 92, 'Enable', 'no'),
(94, '', 93, 'Enable', 'no'),
(95, '', 94, 'Enable', 'no'),
(96, '', 95, 'Enable', 'no'),
(97, '', 96, 'Enable', 'no'),
(98, '', 97, 'Enable', 'no'),
(99, '', 98, 'Enable', 'no'),
(100, '', 99, 'Enable', 'no'),
(101, '', 100, 'Enable', 'no'),
(102, '', 101, 'Enable', 'no'),
(103, '', 102, 'Enable', 'no'),
(104, '', 103, 'Enable', 'no'),
(105, '', 104, 'Enable', 'no'),
(106, '', 105, 'Enable', 'no'),
(107, '', 106, 'Enable', 'no'),
(108, '', 107, 'Enable', 'no'),
(109, '', 108, 'Enable', 'no'),
(110, '', 109, 'Enable', 'no'),
(111, '', 110, 'Enable', 'no'),
(112, '', 111, 'Enable', 'no'),
(113, '', 112, 'Enable', 'no'),
(114, '', 113, 'Enable', 'no'),
(115, '', 114, 'Enable', 'no'),
(116, '', 115, 'Enable', 'no'),
(117, '', 116, 'Enable', 'no'),
(118, '', 117, 'Enable', 'no'),
(119, '', 118, 'Enable', 'no'),
(120, '', 119, 'Enable', 'no'),
(121, '', 120, 'Enable', 'no'),
(122, '', 121, 'Enable', 'no'),
(123, '', 122, 'Enable', 'no');

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
(6, 'Algeria', 1, 'Algerian Dinar', 12, 'no'),
(9, 'UAE', 0, '', 0, 'no'),
(10, 'Oman', 0, '', 0, 'no'),
(11, 'KSA', 0, '', 0, 'no'),
(12, 'Bahrain', 0, '', 0, 'no'),
(15, '', 0, '', 0, 'no');

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
(26, 5, 'dabur_products', '2020-07-27 09:41:47', 1),
(27, 8, 'dabur_regions', '2020-07-30 10:01:42', 1),
(28, 7, 'dabur_countries', '2020-07-30 10:03:37', 1),
(29, 1, 'dabur_sales_planing', '2020-08-03 20:13:05', 1),
(30, 2, 'dabur_sales_planing', '2020-08-04 00:10:31', 1),
(31, 3, 'dabur_sales_planing', '2020-08-04 00:19:54', 1),
(32, 4, 'dabur_sales_planing', '2020-08-04 00:20:27', 1),
(33, 1, 'dabur_pricestructure', '2020-08-04 00:38:09', 1),
(34, 5, 'dabur_sales_planing', '2020-08-04 01:04:40', 1),
(35, 6, 'dabur_sales_planing', '2020-08-04 01:18:53', 1),
(36, 7, 'dabur_sales_planing', '2020-08-04 01:24:11', 1),
(37, 8, 'dabur_sales_planing', '2020-08-04 13:01:26', 1),
(38, 9, 'dabur_sales_planing', '2020-08-05 11:33:36', 1),
(39, 10, 'dabur_sales_planing', '2020-08-05 13:06:46', 1);

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
(3, 3, 'dabur_products', '2020-07-27 09:31:56', 1),
(4, 59, 'dabur_products', '2020-07-31 00:16:59', 1),
(5, 2, 'dabur_sales_planing', '2020-08-04 00:33:36', 1),
(6, 1, 'dabur_sales_planing', '2020-08-04 00:33:41', 1),
(7, 4, 'dabur_sales_planing', '2020-08-04 01:04:21', 1),
(8, 6, 'dabur_sales_planing', '2020-08-04 01:19:07', 1),
(9, 7, 'dabur_sales_planing', '2020-08-04 13:01:34', 1);

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
(4, 3, 'dabur_products', '2020-07-26 14:42:50', 1),
(5, 7, 'dabur_categories', '2020-08-04 09:15:19', 1),
(6, 7, 'dabur_categories', '2020-08-04 09:15:45', 1),
(7, 7, 'dabur_sales_planing', '2020-08-04 09:36:15', 1),
(8, 7, 'dabur_sales_planing', '2020-08-04 09:36:44', 1),
(9, 8, 'dabur_sales_planing', '2020-08-04 13:07:19', 1),
(10, 9, 'dabur_sales_planing', '2020-08-05 11:42:54', 1),
(11, 10, 'dabur_sales_planing', '2020-08-05 13:07:05', 1);

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

--
-- Dumping data for table `dabur_pricestructure`
--

INSERT INTO `dabur_pricestructure` (`id`, `product_id`, `case_config`, `rsp_aed`, `rsp_pc`, `ptr_aed`, `ptw_aed`, `dplc_aed`, `billing_price_aed`, `is_deleted`) VALUES
(1, 3, 45.9, 21.32, 11.21, 21.21, 32.31, 32.34, 42.21, 'no');

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
(1, 9, 1, 2, 'Vatika Conditioner', 'Vatika Dandruff Guard Conditioner', 200, 2, 'FC248200GC', 'Vatika conditioner Dandr. Guard 200ml-RL', 'no'),
(2, 9, 1, 2, 'Vatika Conditioner', 'Vatika Moisture Conditioner', 200, 2, 'FC113200', 'Vatika Moisture Treat Conditioner 200ml', 'no'),
(3, 9, 1, 3, 'Vatika Conditioner', 'Vatika Garlic Shampoo', 400, 2, 'FC954400GC', 'Vatika Shampoo - Garlic 400ml', 'no'),
(4, 9, 1, 3, 'Vatika Conditioner', 'Vatika Argan Shampoo', 400, 2, 'FC955400GC', 'Vatika Shampoo - Argan 400ml', 'no'),
(5, 9, 1, 3, 'Vatika Conditioner', 'Vatika Black Seed Shampoo', 400, 2, 'FC956400GC', 'Vatika Shampoo - Black Seed 400ml', 'no'),
(6, 9, 4, 5, 'Dabur Amla Hair Oil', 'Dabur Amla Hair Oil', 300, 2, 'FC011300', 'Dabur Amla Hair Oil 300ml', 'no'),
(7, 9, 4, 5, 'Dabur Amla Hair Oil', 'Dabur Amla Hair Oil', 100, 2, 'FC011100', 'Dabur Amla Hair Oil 100ml', 'no'),
(8, 9, 4, 5, 'Dabur Amla Hair Oil', 'Dabur Amla Hair Oil', 200, 2, 'FC011200', 'Dabur Amla Hair Oil 200ml', 'no'),
(9, 9, 6, 57, 'Dabur Amla Hair Oil', 'Vatika Volume Hair Cream', 140, 2, 'FC689140', 'Vatika H. Cream Volume & Thickness 140ml', 'no'),
(10, 9, 6, 57, 'Dabur Amla Hair Oil', 'Vatika HFC Hair Cream', 140, 2, 'FC692140', 'Vatika Hair Cream H.F. Control 140ml - New', 'no'),
(11, 3, 1, 2, 'Vatika Conditioner', 'Vatika Dandruff Guard Conditioner', 200, 2, 'FC248200GC', 'Vatika conditioner Dandr. Guard 200ml-RL', 'no'),
(12, 3, 1, 2, 'Vatika Conditioner', 'Vatika Moisture Conditioner', 200, 2, 'FC113200', 'Vatika Moisture Treat Conditioner 200ml', 'no'),
(13, 3, 1, 3, 'Vatika Conditioner', 'Vatika Garlic Shampoo', 400, 2, 'FC954400GC', 'Vatika Shampoo - Garlic 400ml', 'no'),
(14, 3, 1, 3, 'Vatika Conditioner', 'Vatika Argan Shampoo', 400, 2, 'FC955400GC', 'Vatika Shampoo - Argan 400ml', 'no'),
(15, 3, 1, 3, 'Vatika Conditioner', 'Vatika Black Seed Shampoo', 400, 2, 'FC956400GC', 'Vatika Shampoo - Black Seed 400ml', 'no'),
(16, 3, 4, 5, 'Dabur Amla Hair Oil', 'Dabur Amla Hair Oil', 300, 2, 'FC011300', 'Dabur Amla Hair Oil 300ml', 'no'),
(17, 3, 4, 5, 'Dabur Amla Hair Oil', 'Dabur Amla Hair Oil', 100, 2, 'FC011100', 'Dabur Amla Hair Oil 100ml', 'no'),
(18, 3, 4, 5, 'Dabur Amla Hair Oil', 'Dabur Amla Hair Oil', 200, 2, 'FC011200', 'Dabur Amla Hair Oil 200ml', 'no'),
(19, 3, 6, 57, 'Dabur Amla Hair Oil', 'Vatika Volume Hair Cream', 140, 2, 'FC689140', 'Vatika H. Cream Volume & Thickness 140ml', 'no'),
(20, 3, 6, 57, 'Dabur Amla Hair Oil', 'Vatika HFC Hair Cream', 140, 2, 'FC692140', 'Vatika Hair Cream H.F. Control 140ml - New', 'no'),
(21, 10, 1, 2, 'Vatika Conditioner', 'Vatika Dandruff Guard Conditioner', 200, 2, 'FC248200GC', 'Vatika conditioner Dandr. Guard 200ml-RL', 'no'),
(22, 10, 1, 2, 'Vatika Conditioner', 'Vatika Moisture Conditioner', 200, 2, 'FC113200', 'Vatika Moisture Treat Conditioner 200ml', 'no'),
(23, 10, 1, 3, 'Vatika Conditioner', 'Vatika Garlic Shampoo', 400, 2, 'FC954400GC', 'Vatika Shampoo - Garlic 400ml', 'no'),
(24, 10, 1, 3, 'Vatika Conditioner', 'Vatika Black Seed Shampoo', 400, 2, 'FC956400GC', 'Vatika Shampoo - Black Seed 400ml', 'no'),
(25, 10, 4, 5, 'Dabur Amla Hair Oil', 'Dabur Amla Hair Oil', 300, 2, 'FC011300', 'Dabur Amla Hair Oil 300ml', 'no'),
(26, 10, 4, 5, 'Dabur Amla Hair Oil', 'Dabur Amla Hair Oil', 100, 2, 'FC011100', 'Dabur Amla Hair Oil 100ml', 'no'),
(27, 10, 4, 5, 'Dabur Amla Hair Oil', 'Dabur Amla Hair Oil', 200, 2, 'FC011200', 'Dabur Amla Hair Oil 200ml', 'no'),
(28, 10, 6, 57, 'Dabur Amla Hair Oil', 'Vatika Volume Hair Cream', 140, 2, 'FC689140', 'Vatika H. Cream Volume & Thickness 140ml', 'no'),
(29, 10, 6, 57, 'Dabur Amla Hair Oil', 'Vatika HFC Hair Cream', 140, 2, 'FC692140', 'Vatika Hair Cream H.F. Control 140ml - New', 'no'),
(30, 11, 1, 2, 'Vatika Conditioner', 'Vatika Dandruff Guard Conditioner', 200, 2, 'FC248200GC', 'Vatika conditioner Dandr. Guard 200ml-RL', 'no'),
(31, 11, 1, 2, 'Vatika Conditioner', 'Vatika Moisture Conditioner', 200, 2, 'FC113200', 'Vatika Moisture Treat Conditioner 200ml', 'no'),
(32, 11, 1, 3, 'Vatika Conditioner', 'Vatika Argan Shampoo', 400, 2, 'FC955400GC', 'Vatika Shampoo - Argan 400ml', 'no'),
(33, 11, 1, 3, 'Vatika Conditioner', 'Vatika Black Seed Shampoo', 400, 2, 'FC956400GC', 'Vatika Shampoo - Black Seed 400ml', 'no'),
(34, 11, 4, 5, 'Dabur Amla Hair Oil', 'Dabur Amla Hair Oil', 300, 2, 'FC011300', 'Dabur Amla Hair Oil 300ml', 'no'),
(35, 11, 4, 5, 'Dabur Amla Hair Oil', 'Dabur Amla Hair Oil', 100, 2, 'FC011100', 'Dabur Amla Hair Oil 100ml', 'no'),
(36, 11, 4, 5, 'Dabur Amla Hair Oil', 'Dabur Amla Hair Oil', 200, 2, 'FC011200', 'Dabur Amla Hair Oil 200ml', 'no'),
(37, 11, 6, 57, 'Dabur Amla Hair Oil', 'Vatika Volume Hair Cream', 140, 2, 'FC689140', 'Vatika H. Cream Volume & Thickness 140ml', 'no'),
(38, 11, 6, 57, 'Dabur Amla Hair Oil', 'Vatika HFC Hair Cream', 140, 2, 'FC692140', 'Vatika Hair Cream H.F. Control 140ml - New', 'no'),
(39, 4, 1, 2, 'Vatika Conditioner', 'Vatika Dandruff Guard Conditioner', 200, 2, 'FC248200GC', 'Vatika conditioner Dandr. Guard 200ml-RL', 'no'),
(40, 4, 1, 2, 'Vatika Conditioner', 'Vatika Moisture Conditioner', 200, 2, 'FC113200', 'Vatika Moisture Treat Conditioner 200ml', 'no'),
(41, 4, 1, 3, 'Vatika Conditioner', 'Vatika Garlic Shampoo', 400, 2, 'FC954400GC', 'Vatika Shampoo - Garlic 400ml', 'no'),
(42, 4, 1, 3, 'Vatika Conditioner', 'Vatika Argan Shampoo', 400, 2, 'FC955400GC', 'Vatika Shampoo - Argan 400ml', 'no'),
(43, 4, 1, 3, 'Vatika Conditioner', 'Vatika Black Seed Shampoo', 400, 2, 'FC956400GC', 'Vatika Shampoo - Black Seed 400ml', 'no'),
(44, 4, 4, 5, 'Dabur Amla Hair Oil', 'Dabur Amla Hair Oil', 300, 2, 'FC011300', 'Dabur Amla Hair Oil 300ml', 'no'),
(45, 4, 4, 5, 'Dabur Amla Hair Oil', 'Dabur Amla Hair Oil', 100, 2, 'FC011100', 'Dabur Amla Hair Oil 100ml', 'no'),
(46, 4, 4, 5, 'Dabur Amla Hair Oil', 'Dabur Amla Hair Oil', 200, 2, 'FC011200', 'Dabur Amla Hair Oil 200ml', 'no'),
(47, 4, 6, 57, 'Dabur Amla Hair Oil', 'Vatika Volume Hair Cream', 140, 2, 'FC689140', 'Vatika H. Cream Volume & Thickness 140ml', 'no'),
(48, 4, 6, 57, 'Dabur Amla Hair Oil', 'Vatika HFC Hair Cream', 140, 2, 'FC692140', 'Vatika Hair Cream H.F. Control 140ml - New', 'no'),
(49, 12, 1, 2, 'Vatika Conditioner', 'Vatika Dandruff Guard Conditioner', 200, 2, 'FC248200GC', 'Vatika conditioner Dandr. Guard 200ml-RL', 'no'),
(50, 12, 1, 2, 'Vatika Conditioner', 'Vatika Moisture Conditioner', 200, 2, 'FC113200', 'Vatika Moisture Treat Conditioner 200ml', 'no'),
(51, 12, 1, 3, 'Vatika Conditioner', 'Vatika Garlic Shampoo', 400, 2, 'FC954400GC', 'Vatika Shampoo - Garlic 400ml', 'no'),
(52, 12, 1, 3, 'Vatika Conditioner', 'Vatika Argan Shampoo', 400, 2, 'FC955400GC', 'Vatika Shampoo - Argan 400ml', 'no'),
(53, 12, 1, 3, 'Vatika Conditioner', 'Vatika Black Seed Shampoo', 400, 2, 'FC956400GC', 'Vatika Shampoo - Black Seed 400ml', 'no'),
(54, 12, 4, 5, 'Dabur Amla Hair Oil', 'Dabur Amla Hair Oil', 300, 2, 'FC011300', 'Dabur Amla Hair Oil 300ml', 'no'),
(55, 12, 4, 5, 'Dabur Amla Hair Oil', 'Dabur Amla Hair Oil', 100, 2, 'FC011100', 'Dabur Amla Hair Oil 100ml', 'no'),
(56, 12, 4, 5, 'Dabur Amla Hair Oil', 'Dabur Amla Hair Oil', 200, 2, 'FC011200', 'Dabur Amla Hair Oil 200ml', 'no'),
(57, 12, 6, 57, 'Dabur Amla Hair Oil', 'Vatika Volume Hair Cream', 140, 2, 'FC689140', 'Vatika H. Cream Volume & Thickness 140ml', 'no'),
(58, 12, 6, 57, 'Dabur Amla Hair Oil', 'Vatika HFC Hair Cream', 140, 2, 'FC692140', 'Vatika Hair Cream H.F. Control 140ml - New', 'no');

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
(7, 'SSA', 'no'),
(8, 'Middle East', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `dabur_sales_planing`
--

CREATE TABLE `dabur_sales_planing` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sales` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dabur_sales_planing`
--

INSERT INTO `dabur_sales_planing` (`id`, `product_id`, `sales`, `start_date`, `end_date`, `is_deleted`) VALUES
(1, 13, 2232121, '0000-00-00', '2020-08-12', 'yes'),
(2, 1, 2232121, '0000-00-00', '0000-00-00', 'yes'),
(3, 13, 2232121, '2020-08-04', '2020-08-10', 'no'),
(4, 15, 2232121, '2020-09-01', '2020-09-30', 'yes'),
(5, 3, 2232121, '2020-08-04', '2020-08-31', 'no'),
(6, 0, 0, '2020-08-04', '2020-08-26', 'yes'),
(7, 30, 2232121, '2020-04-08', '2020-08-31', 'yes'),
(8, 3, 10000, '2020-05-14', '2020-08-31', 'no'),
(9, 22, 10000, '2020-12-01', '2020-12-31', 'no'),
(10, 3, 10000, '2020-11-01', '2020-11-30', 'no');

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
(2, 'ml', 'no'),
(3, 'UOM', 'no'),
(4, '', 'no');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `country_name` (`country_name`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `dabur_countries`
--
ALTER TABLE `dabur_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dabur_create_log`
--
ALTER TABLE `dabur_create_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `dabur_delete_log`
--
ALTER TABLE `dabur_delete_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dabur_distributor`
--
ALTER TABLE `dabur_distributor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dabur_edit_log`
--
ALTER TABLE `dabur_edit_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `dabur_pricestructure`
--
ALTER TABLE `dabur_pricestructure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dabur_products`
--
ALTER TABLE `dabur_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `dabur_product_size`
--
ALTER TABLE `dabur_product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dabur_regions`
--
ALTER TABLE `dabur_regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dabur_sales_planing`
--
ALTER TABLE `dabur_sales_planing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dabur_unit_of_measure`
--
ALTER TABLE `dabur_unit_of_measure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
