-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 05:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(3, 'Finished Goods'),
(4, 'Packing Materials'),
(2, 'Raw Materials'),
(6, 'Work in Progress');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `latitude` decimal(10,6) NOT NULL,
  `longitude` decimal(10,6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `latitude`, `longitude`, `username`, `link`, `timestamp`) VALUES
(2, 19.110298, 72.925184, 'Shubham', 'https://www.google.com/maps?q=19.1102976,72.925184', '2024-04-20 08:39:33'),
(3, 19.110298, 72.925184, 'Manav', 'https://www.google.com/maps?q=19.1102976,72.925184', '2024-04-20 08:54:04'),
(4, 19.107555, 72.837579, 'Jeet', 'https://www.google.com/maps?q=19.1075553,72.8375792', '2024-04-20 09:01:11'),
(5, 19.120128, 72.889139, 'Test', 'https://www.google.com/maps?q=19.120128,72.8891392', '2024-04-20 10:19:34'),
(6, 19.120128, 72.889139, 'Test', 'https://www.google.com/maps?q=19.120128,72.8891392', '2024-04-20 10:19:34'),
(7, 19.120128, 72.889139, 'Test', 'https://www.google.com/maps?q=19.120128,72.8891392', '2024-04-20 10:19:34'),
(8, 19.120128, 72.889139, 'Test', 'https://www.google.com/maps?q=19.120128,72.8891392', '2024-04-20 10:19:34'),
(9, 19.120128, 72.889139, 'Test', 'https://www.google.com/maps?q=19.120128,72.8891392', '2024-04-20 10:19:34'),
(10, 19.120128, 72.889139, 'Test', 'https://www.google.com/maps?q=19.120128,72.8891392', '2024-04-20 10:19:34'),
(11, 19.120128, 72.889139, 'Test', 'https://www.google.com/maps?q=19.120128,72.8891392', '2024-04-20 10:19:34'),
(12, 19.120128, 72.889139, 'Test', 'https://www.google.com/maps?q=19.120128,72.8891392', '2024-04-20 10:19:34'),
(13, 19.120128, 72.889139, 'Test', 'https://www.google.com/maps?q=19.120128,72.8891392', '2024-04-20 10:19:34'),
(14, 19.120128, 72.889139, 'Test', 'https://www.google.com/maps?q=19.120128,72.8891392', '2024-04-20 10:19:34'),
(15, 19.120128, 72.889139, 'Test1', 'https://www.google.com/maps?q=19.120128,72.8891392', '2024-04-20 10:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `file_name`, `file_type`) VALUES
(2, 'abc.jpg', 'image/jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `buy_price` decimal(25,2) DEFAULT NULL,
  `sale_price` decimal(25,2) NOT NULL,
  `categorie_id` int(11) UNSIGNED NOT NULL,
  `media_id` int(11) DEFAULT 0,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `buy_price`, `sale_price`, `categorie_id`, `media_id`, `date`) VALUES
(2, 'Chilli Powder', '120', 20.00, 40.00, 3, 0, '2021-04-04 18:44:52'),
(3, 'Coriander Powder', '950', 20.00, 40.00, 3, 0, '2021-04-04 18:48:53'),
(4, 'Cumin Powder', '100', 30.00, 50.00, 3, 0, '2021-04-04 19:03:23'),
(5, 'Tea Masala', '30', 10.00, 20.00, 6, 0, '2021-04-04 19:11:30'),
(6, 'Rasam Powder', '200', 60.00, 100.00, 3, 0, '2021-04-04 19:13:35'),
(7, 'Raw Turmeric ', '100', 30.00, 40.00, 2, 0, '2024-03-16 14:25:23'),
(8, 'Biriyani Masala', '200', 20.00, 40.00, 6, 0, '2021-04-04 19:17:11'),
(9, 'Chaat Masala', '100', 20.00, 60.00, 6, 0, '2021-04-04 19:19:20'),
(10, 'Sabji Masala', '599', 40.00, 80.00, 3, 0, '2021-04-04 19:20:28'),
(11, 'Pepper Powder', '80', 21.00, 31.00, 4, 0, '2021-04-04 19:25:22');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product_id`, `qty`, `price`, `date`) VALUES
(2, 3, 1000, 40000.00, '2021-04-04'),
(3, 10, 6, 1932.00, '2021-04-04'),
(4, 6, 2, 830.00, '2021-04-04'),
(7, 7, 5, 35.00, '2021-04-04'),
(8, 9, 2, 120.00, '2021-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `status` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `user_level`, `image`, `status`, `last_login`) VALUES
(1, 'HR', 'Admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'xozsa4ji1.jpg', 1, '2024-04-20 07:07:18'),
(8, 'Manav', 'Manav', '9ca30cc2d5800a624454f956a69ee0096742f232', 3, 'ocubbpgj8.jpg', 1, '2024-04-20 06:51:56'),
(9, 'Jeet', 'Jeet', 'e4033884ed8015e2e89e8d812008accae56d08a4', 2, '59i8s6v29.jpg', 1, '2024-04-20 06:50:40'),
(10, 'Ramesh', 'Ramesh', '82d70b2b3b3cfaa10d6c86b28ae358bdc7b96c26', 4, '59i8s6v29.jpg', 1, '2024-04-20 06:48:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(150) NOT NULL,
  `group_level` int(11) NOT NULL,
  `group_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `group_level`, `group_status`) VALUES
(1, 'Admin', 1, 1),
(3, 'User', 3, 1),
(4, 'Special', 2, 1),
(5, 'Driver', 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `categorie_id` (`categorie_id`),
  ADD KEY `media_id` (`media_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_level` (`user_level`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_level` (`group_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `SK` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`group_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
