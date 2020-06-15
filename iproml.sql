-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 12, 2019 at 08:42 AM
-- Server version: 8.0.18-0ubuntu0.19.10.1
-- PHP Version: 7.2.24-0ubuntu0.19.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iproml`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_technician`
--

CREATE TABLE `client_technician` (
  `client_id` int(11) NOT NULL,
  `technician_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_technician`
--

INSERT INTO `client_technician` (`client_id`, `technician_id`) VALUES
(36, 38),
(40, 38),
(40, 34),
(36, 34);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ipros`
--

CREATE TABLE `ipros` (
  `id` int(11) NOT NULL,
  `ipro_name` varchar(100) DEFAULT NULL,
  `ipro_ip` varchar(100) DEFAULT NULL,
  `ipro_port` varchar(100) DEFAULT NULL,
  `ipro_unit` varchar(100) DEFAULT NULL,
  `ipro_sensors` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ipros`
--

INSERT INTO `ipros` (`id`, `ipro_name`, `ipro_ip`, `ipro_port`, `ipro_unit`, `ipro_sensors`) VALUES
(5, 'RFID', '166.254.243.215', '12345', '232', '2,101,102,105'),
(6, 'Ryan', '166.254.119.138', '12345', '232', '105'),
(7, 'Leal', '166.254.119.140', '12345', '232', '2, 101, 102, 105'),
(8, 'Brannon', '166.254.243.215', '12345', '232', '105, 111'),
(9, 'Walt', '166.254.119.143', '12345', '232', '105'),
(10, 'Tyson', '166.254.119.144', '12345', '232', '101, 102, 105'),
(11, 'Royal', '166.246.206.125', '12345', '232', '105'),
(12, 'Martine', '166.254.119.141', '12345', '232', '105');

-- --------------------------------------------------------

--
-- Table structure for table `ipros_history`
--

CREATE TABLE `ipros_history` (
  `id` int(11) NOT NULL,
  `technician_id` int(11) DEFAULT NULL,
  `ipro_name` varchar(50) DEFAULT NULL,
  `sensor` int(5) DEFAULT NULL,
  `data` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ipros_history`
--

INSERT INTO `ipros_history` (`id`, `technician_id`, `ipro_name`, `sensor`, `data`, `created_at`) VALUES
(26, 38, 'RFID', 2, 0.23877, '2019-10-30 04:29:21'),
(27, 38, 'RFID', 101, 50.6218, '2019-10-30 04:29:21'),
(28, 38, 'RFID', 102, 28.3297, '2019-10-30 04:29:21'),
(29, 38, 'RFID', 105, 0, '2019-10-30 04:29:21'),
(30, 38, 'RFID', 2, 0.255734, '2019-10-30 04:30:02'),
(31, 38, 'RFID', 101, 50.6795, '2019-10-30 04:30:02'),
(32, 38, 'RFID', 102, 28.3535, '2019-10-30 04:30:02'),
(33, 38, 'RFID', 105, 0, '2019-10-30 04:30:02'),
(34, 38, 'RFID', 101, 0.312282, '2019-10-30 04:35:30'),
(35, 38, 'RFID', 102, 50.8718, '2019-10-30 04:35:30'),
(36, 38, 'RFID', 105, 28.5463, '2019-10-30 04:35:30'),
(37, 38, 'RFID', 101, 0.380075, '2019-10-30 05:04:13'),
(38, 38, 'RFID', 102, 51.1023, '2019-10-30 05:04:13'),
(39, 38, 'RFID', 105, 29.5607, '2019-10-30 05:04:13'),
(40, 29, 'Martine', 105, 0.148148, '2019-10-30 19:22:23'),
(41, 29, 'Martine', 105, -0.330746, '2019-10-30 20:20:29'),
(42, 29, 'Martine', 105, -0.311379, '2019-10-30 20:20:42'),
(43, 29, 'Martine', 105, -0.311379, '2019-10-30 20:20:47'),
(44, 29, 'Martine', 105, -0.315951, '2019-10-30 20:20:52'),
(45, 29, 'Martine', 105, -0.315951, '2019-10-30 20:20:57'),
(46, 29, 'Martine', 105, -0.315951, '2019-10-30 20:21:02'),
(47, 29, 'Martine', 105, -0.315951, '2019-10-30 20:21:07'),
(48, 29, 'Martine', 105, -0.32694, '2019-10-30 20:21:12'),
(49, 29, 'Martine', 105, -0.32694, '2019-10-30 20:21:17'),
(50, 29, 'Martine', 105, -0.32694, '2019-10-30 20:21:23'),
(51, 29, 'Martine', 105, -0.310102, '2019-10-30 20:21:27'),
(52, 29, 'Martine', 105, -0.310102, '2019-10-30 20:21:33'),
(53, 29, 'Martine', 105, -0.310102, '2019-10-30 20:21:38'),
(54, 29, 'Martine', 105, -0.310102, '2019-10-30 20:21:43'),
(55, 29, 'Martine', 105, -0.306296, '2019-10-30 20:21:48'),
(56, 29, 'Martine', 105, -0.306296, '2019-10-30 20:21:52'),
(57, 29, 'Martine', 105, -0.306296, '2019-10-30 20:21:57'),
(58, 29, 'Martine', 105, -0.306296, '2019-10-30 20:22:02'),
(59, 29, 'Martine', 105, -0.287548, '2019-10-30 20:22:07'),
(60, 29, 'Martine', 105, -0.287548, '2019-10-30 20:22:12'),
(61, 29, 'Martine', 105, -0.287548, '2019-10-30 20:22:17'),
(62, 29, 'Martine', 105, -0.299874, '2019-10-30 20:22:22'),
(63, 29, 'Martine', 105, -0.299874, '2019-10-30 20:22:27'),
(64, 29, 'Martine', 105, -0.299874, '2019-10-30 20:22:32'),
(65, 29, 'Martine', 105, -0.299874, '2019-10-30 20:22:37'),
(66, 29, 'Martine', 105, -0.298054, '2019-10-30 20:22:42'),
(67, 29, 'Martine', 105, -0.298054, '2019-10-30 20:22:47'),
(68, 29, 'Martine', 105, -0.285385, '2019-10-30 20:23:16'),
(69, 29, 'Martine', 105, 0.066388, '2019-10-30 20:31:22'),
(70, 29, 'Martine', 105, -0.015386, '2019-10-30 20:38:38'),
(71, 29, 'Martine', 105, -0.070143, '2019-10-30 20:40:45'),
(72, 29, 'Martine', 105, -0.047155, '2019-10-30 20:41:35'),
(73, 29, 'RFID', 2, 0.072505, '2019-11-01 01:12:26'),
(74, 29, 'RFID', 101, 50.0565, '2019-11-01 01:12:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(12) UNSIGNED NOT NULL COMMENT 'techs id',
  `avatar` varchar(100) DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `ipro_id` varchar(100) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `avatar`, `first_name`, `last_name`, `email`, `phone_number`, `username`, `ipro_id`, `role`, `password`, `created_at`, `status`) VALUES
(29, 'uploads/admin.jpg', 'admin', '', 'yuriyes43@gmail.com', '2222', 'admin', '0', '1', '5f4dcc3b5aa765d61d8327deb882cf99', '2019-10-06 16:22:31', NULL),
(34, NULL, 'Pavel', 'Ezhov', 'yuriyes43@gmail.com', '89841542820', 'yuriyes43', '9', '2', '5f4dcc3b5aa765d61d8327deb882cf99', '2019-10-19 05:13:38', NULL),
(36, NULL, 'Client', 'Client', 'client@mail.com', '22222', 'client123', '0', '3', '5f4dcc3b5aa765d61d8327deb882cf99', '2019-10-19 17:42:39', NULL),
(38, NULL, 'Test', 'test', 'test@gamil.com', '1111111', 'test123', '5,8', '2', '5f4dcc3b5aa765d61d8327deb882cf99', '2019-10-19 17:54:09', NULL),
(39, NULL, 'Primoksy', 'Vodokanal', 'pri@mail.com', '12345678', 'pri123', '5', '2', '5f4dcc3b5aa765d61d8327deb882cf99', '2019-10-21 15:55:18', NULL),
(40, NULL, 'Client2', 'Client2', 'client2@mail.com', '1234567890', 'client2', NULL, '3', '5f4dcc3b5aa765d61d8327deb882cf99', '2019-10-21 15:56:50', NULL),
(41, NULL, 'Client3', 'Client333', 'client333@mail.com', '33333333', 'client333', NULL, '3', '5f4dcc3b5aa765d61d8327deb882cf99', '2019-10-21 18:27:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `type`) VALUES
(1, 'admin'),
(2, 'technician'),
(3, 'client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `ipros`
--
ALTER TABLE `ipros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipros_history`
--
ALTER TABLE `ipros_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ipros`
--
ALTER TABLE `ipros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `ipros_history`
--
ALTER TABLE `ipros_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'techs id', AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
