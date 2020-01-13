-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 10, 2020 at 03:14 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_invoice`
--
CREATE DATABASE IF NOT EXISTS `hotel_invoice` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `hotel_invoice`;

-- --------------------------------------------------------

--
-- Table structure for table `emp_master`
--

CREATE TABLE `emp_master` (
  `id` int(11) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `designation` varchar(250) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `address` varchar(250) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emp_master`
--

INSERT INTO `emp_master` (`id`, `emp_name`, `designation`, `mobile`, `address`, `hotel_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ajaz', 'sdd', 99999, 'scsdfc', 2, 1, '2020-01-10 18:56:49', '2020-01-10 13:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_master`
--

CREATE TABLE `hotel_master` (
  `id` int(11) NOT NULL,
  `hotel_name` varchar(50) DEFAULT NULL,
  `mobile1` bigint(20) DEFAULT NULL,
  `mobile2` bigint(20) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `gst_no` varchar(50) DEFAULT NULL,
  `note` varchar(250) DEFAULT NULL,
  `logo` varchar(250) DEFAULT NULL,
  `printer` varchar(50) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotel_master`
--

INSERT INTO `hotel_master` (`id`, `hotel_name`, `mobile1`, `mobile2`, `address`, `gst_no`, `note`, `logo`, `printer`, `from_date`, `to_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ABC', 9904760745, 9999888877, 'RAJKOT', 'GST7748', 'SDKSD', '16.jpg', 'Thermal', '0000-00-00', '0000-00-00', 0, '2020-01-10 16:29:06', '2020-01-10 10:59:06'),
(2, 'ZZZZ', 9904760745, 9998887776, 'Rajkot', 'sdsd5965', 'dsds', '17.jpg', 'Normal', '2020-01-10', '2020-01-10', 1, '2020-01-10 16:54:56', '2020-01-10 11:44:45');

-- --------------------------------------------------------

--
-- Table structure for table `item_master`
--

CREATE TABLE `item_master` (
  `id` int(11) NOT NULL,
  `curse` varchar(50) DEFAULT NULL,
  `amount_half` decimal(10,2) DEFAULT NULL,
  `amount_full` decimal(10,2) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `hotel_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_master`
--

INSERT INTO `item_master` (`id`, `curse`, `amount_half`, `amount_full`, `description`, `hotel_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sdsbyh', '34.00', '343.00', 'sdfs555xc', 2, 1, '2020-01-10 18:13:59', '2020-01-10 12:55:41'),
(2, 'xcvbc', '23.00', '233.00', 'ds', 2, 1, '2020-01-10 18:24:18', '2020-01-10 12:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `login_master`
--

CREATE TABLE `login_master` (
  `id` int(11) NOT NULL,
  `ref_id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `role` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` date NOT NULL,
  `modify_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_master`
--

INSERT INTO `login_master` (`id`, `ref_id`, `user_id`, `password`, `role`, `status`, `add_date`, `modify_date`) VALUES
(2, 2, 'ajaz', '1111', 'Admin', 1, '2020-01-10', '2020-01-10'),
(3, 0, 'admin', 'admin', 'Superadmin', 1, '2020-01-10', '2020-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `table_master`
--

CREATE TABLE `table_master` (
  `id` int(11) NOT NULL,
  `table_name` varchar(50) NOT NULL,
  `capacity` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_master`
--

INSERT INTO `table_master` (`id`, `table_name`, `capacity`, `location`, `hotel_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ggg', '566', 'uhyui', 2, 1, '2020-01-10 19:24:13', '2020-01-10 13:54:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp_master`
--
ALTER TABLE `emp_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_master`
--
ALTER TABLE `hotel_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_master`
--
ALTER TABLE `item_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_master`
--
ALTER TABLE `login_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_master`
--
ALTER TABLE `table_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp_master`
--
ALTER TABLE `emp_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotel_master`
--
ALTER TABLE `hotel_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item_master`
--
ALTER TABLE `item_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_master`
--
ALTER TABLE `login_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_master`
--
ALTER TABLE `table_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
