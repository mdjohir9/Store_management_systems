-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Jul 21, 2023 at 10:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `catagory_id` int(11) NOT NULL,
  `catagory_name` varchar(20) NOT NULL,
  `catagory_entry_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`catagory_id`, `catagory_name`, `catagory_entry_date`) VALUES
(6, 'stationary', '2023-06-25'),
(11, 'Instumant', '2023-06-13'),
(19, 'Electrical ', '2023-06-26'),
(21, 'Froots', '2023-06-05'),
(23, 'Phone', '2023-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_catagory` int(3) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  `product_entry_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_catagory`, `product_code`, `product_entry_date`) VALUES
(28, 'Bannana1', 19, 'elc-101', '2023-07-10'),
(29, 'Samsung A31', 23, 'samsung-55', '2023-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `spend_product`
--

CREATE TABLE `spend_product` (
  `spand_product_id` int(11) NOT NULL,
  `spand_product_name` int(11) NOT NULL,
  `spand_product_quentity` int(11) NOT NULL,
  `spand_product_entry_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spend_product`
--

INSERT INTO `spend_product` (`spand_product_id`, `spand_product_name`, `spand_product_quentity`, `spand_product_entry_date`) VALUES
(5, 14, 180, '2023-07-18'),
(6, 15, 600, '2023-07-18'),
(7, 16, 100, '2023-07-03'),
(8, 16, 100, '2023-07-03'),
(9, 15, 500, '2023-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `store_product`
--

CREATE TABLE `store_product` (
  `store_product_id` int(11) NOT NULL,
  `store_product_name` int(10) NOT NULL,
  `store_product_quentity` int(11) NOT NULL,
  `store_product_entry_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store_product`
--

INSERT INTO `store_product` (`store_product_id`, `store_product_name`, `store_product_quentity`, `store_product_entry_date`) VALUES
(1, 15, 1000, '2023-07-10'),
(4, 16, 600, '2023-07-18'),
(5, 14, 900, '2023-07-24'),
(6, 16, 100, '2023-07-11'),
(7, 26, 900, '2023-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first_name` varchar(20) NOT NULL,
  `user_last_name` varchar(20) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first_name`, `user_last_name`, `user_email`, `user_password`) VALUES
(1, 'Md Johir', 'Ull islam', 'mdjohirullislam728@gmail.com', '481826'),
(2, 'Johir', 'Raihan', 'freelancerjohirraihan@gmail.co', '481826');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`catagory_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spend_product`
--
ALTER TABLE `spend_product`
  ADD PRIMARY KEY (`spand_product_id`);

--
-- Indexes for table `store_product`
--
ALTER TABLE `store_product`
  ADD PRIMARY KEY (`store_product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `catagory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `spend_product`
--
ALTER TABLE `spend_product`
  MODIFY `spand_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `store_product`
--
ALTER TABLE `store_product`
  MODIFY `store_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
