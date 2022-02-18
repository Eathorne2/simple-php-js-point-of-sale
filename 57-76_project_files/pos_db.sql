-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2022 at 12:39 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `barcode` varchar(15) NOT NULL,
  `description` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `image` varchar(500) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `date` datetime NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `barcode`, `description`, `qty`, `amount`, `image`, `user_id`, `date`, `views`) VALUES
(1, '2222472108593', 'Biscuits', 100, '10.95', 'uploads/019111ea60f176a07807d9be878b7b0ff5d4c52b_5812.jpg', '1', '2022-01-03 18:33:44', 2),
(3, '2222947895764', 'Crisps', 100, '4.95', 'uploads/a376a3a3f34dc21971ca40ac6dd6664585c197a6_4817.jpg', '1', '2022-01-09 08:46:29', 0),
(4, '2222881344444', 'Burger', 100, '10.00', 'uploads/c322c54a3249e75ca46347a2c4ec9385672cb8e3_5698.jpg', '1', '2022-01-09 08:47:02', 0),
(5, '1234', 'So good milk', 100, '20.00', 'uploads/e149b8702ddb43e5cda3c10803c563203b27cfc0_6896.jpg', '1', '2022-01-09 08:47:54', 3),
(6, '2222925913231', 'OMO SOFTENER', 100, '50.00', 'uploads/e80200cc753ea342725ba080f668144fe4c763b9_7977.jpg', 'Unknown', '2022-01-16 08:35:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `barcode` varchar(15) NOT NULL,
  `receipt_no` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `barcode`, `receipt_no`, `description`, `qty`, `amount`, `total`, `date`, `user_id`) VALUES
(1, '1234', 1, 'So good milk', 2, '20.00', '40.00', '2022-02-11 10:06:12', 'Unknown'),
(2, '2222947895764', 1, 'Crisps', 1, '4.95', '4.95', '2022-02-11 10:06:12', 'Unknown'),
(3, '2222881344444', 1, 'Burger', 1, '10.00', '10.00', '2022-02-11 10:06:12', 'Unknown'),
(4, '2222925913231', 2, 'OMO SOFTENER', 2, '50.00', '100.00', '2022-02-11 10:07:27', 'Unknown'),
(5, '1234', 2, 'So good milk', 1, '20.00', '20.00', '2022-02-11 10:07:27', 'Unknown'),
(6, '2222472108593', 2, 'Biscuits', 1, '10.95', '10.95', '2022-02-11 10:07:27', 'Unknown'),
(7, '1234', 3, 'So good milk', 1, '20.00', '20.00', '2022-02-17 19:42:00', '1'),
(8, '2222472108593', 4, 'Biscuits', 2, '10.95', '21.90', '2022-02-17 19:50:49', '1'),
(9, '2222472108593', 5, 'Biscuits', 2, '10.95', '21.90', '2022-02-17 19:52:19', '1'),
(10, '2222472108593', 6, 'Biscuits', 1, '10.95', '10.95', '2022-02-17 19:52:40', '1'),
(11, '2222925913231', 7, 'OMO SOFTENER', 1, '50.00', '50.00', '2022-02-17 19:56:02', '1'),
(12, '1234', 8, 'So good milk', 2, '20.00', '40.00', '2022-02-17 19:57:31', '1'),
(13, '1234', 9, 'So good milk', 1, '20.00', '20.00', '2022-02-17 19:57:44', '1'),
(14, '1234', 10, 'So good milk', 1, '20.00', '20.00', '2022-02-17 19:57:53', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `role` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL DEFAULT 'male',
  `deletable` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `date`, `image`, `role`, `gender`, `deletable`) VALUES
(1, 'Eathorne', 'email@email.com', '$2y$10$mIRwGavpKoOCWu62PLDMlOOCA1a.CwnqLqtIICKO2.X9ew.lKXXH2', '2021-12-28 09:33:15', NULL, 'admin', 'male', 0),
(2, 'Mary', 'mary@email.com', '$2y$10$kxoJW56qGmYO56EILS8CpeINaR0XP09DroQGpwveniunL6dsdhl6G', '2021-12-28 10:39:58', NULL, 'user', 'female', 1),
(5, 'some user', 'mail@mail.com', '$2y$10$ooQK6400JBosHjglFRfP4uiuj6ZoMgs2aQlU4.vcbDlnXVsmKd/4i', '2022-02-17 19:13:49', NULL, 'user', 'male', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barcode` (`barcode`),
  ADD KEY `description` (`description`),
  ADD KEY `qty` (`qty`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `date` (`date`),
  ADD KEY `views` (`views`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barcode` (`barcode`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `date` (`date`),
  ADD KEY `description` (`description`),
  ADD KEY `receipt_no` (`receipt_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `date` (`date`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
