-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 13, 2020 at 08:49 AM
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
-- Database: `news_management`
--
CREATE DATABASE IF NOT EXISTS `news_management` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `news_management`;

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
(1, 1, 'admin', 'admin', 'Admin', 1, '2020-01-11', '2020-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `master_table`
--

CREATE TABLE `master_table` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `newspaper_name` varchar(250) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_table`
--

INSERT INTO `master_table` (`id`, `code`, `newspaper_name`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '55', 'ajaz96', 0, 1, '2020-01-11 18:40:06', '2020-01-13 07:48:05'),
(9, 'sdc', 'cx', 0, 1, '2020-01-11 19:10:21', '2020-01-11 13:40:21');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_master`
--

CREATE TABLE `transaction_master` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `newspaper_name` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `impact_of_news` int(11) NOT NULL,
  `heading` varchar(1000) NOT NULL,
  `size` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction_master`
--

INSERT INTO `transaction_master` (`id`, `code`, `newspaper_name`, `type`, `impact_of_news`, `heading`, `size`, `date`, `image`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '55', 1, 2, 2, 'hsdsdjh', '56', '2020-01-13', 'Screenshot_from_2019-04-26_18-18-16.png', 1, 0, '2020-01-13 10:37:11', '2020-01-13 07:48:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_master`
--
ALTER TABLE `login_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_table`
--
ALTER TABLE `master_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_master`
--
ALTER TABLE `transaction_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_master`
--
ALTER TABLE `login_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_table`
--
ALTER TABLE `master_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaction_master`
--
ALTER TABLE `transaction_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
