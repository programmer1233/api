-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 31, 2019 at 06:50 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `factory`
--

CREATE TABLE `factory` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `factory`
--

INSERT INTO `factory` (`id`, `name`, `description`, `created`, `modified`) VALUES
(1, 'Fashion', 'Factory for anything related to fashion.', '2014-06-01 00:35:07', '2019-05-30 15:34:33'),
(2, 'Electronics', 'Factory for creating gadgets, drones and more.', '2014-06-01 00:35:07', '2019-05-30 15:34:33'),
(3, 'Motors', 'Factory for creating motors and more', '2014-06-01 00:35:07', '2019-05-30 15:34:54'),
(4, 'Movies', 'Factory for creating movie products.', '0000-00-00 00:00:00', '2019-01-08 12:27:26'),
(5, 'Books', 'Factory for creating kindle books, audio books and more.', '0000-00-00 00:00:00', '2019-01-08 12:27:47'),
(6, 'Sports', 'Factory for creating sport clothes and accessories', '2016-01-09 02:24:24', '2019-01-09 00:24:24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `factory_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `factory_id`, `created`, `modified`) VALUES
(1, 'LG P880 4X HD', 'My first awesome phone!', 336, 2, '2019-06-01 01:12:26', '2019-05-31 15:12:26'),
(3, 'Samsung Galaxy S4', 'Samsung I9500 Galaxy S4', 600, 2, '2019-06-01 01:12:26', '2019-05-31 15:12:26'),
(6, 'Bench Shirt', 'The best shirt!', 29, 1, '2019-06-01 01:12:26', '2019-05-31 00:12:21'),
(7, 'Lenovo Laptop', 'My business partner.', 399, 2, '2019-06-01 01:13:45', '2019-05-31 00:13:39'),
(8, 'Samsung Galaxy Tab 10.1', 'Good tablet.', 259, 2, '2019-06-01 01:14:13', '2019-05-31 00:14:08'),
(9, 'Spalding Watch', 'My sports watch.', 199, 1, '2019-06-01 01:18:36', '2019-05-31 00:18:31'),
(10, 'Sony Smart Watch', 'The coolest smart watch!', 300, 2, '2019-06-06 17:10:01', '2019-06-05 16:09:51'),
(11, 'Huawei Y300', 'For testing purposes.', 100, 2, '2019-06-06 17:11:04', '2019-06-05 16:10:54'),
(12, 'Abercrombie Lake Arnold Shirt', 'Perfect as gift!', 60, 1, '2019-06-06 17:12:21', '2019-06-05 16:12:11'),
(13, 'Abercrombie Allen Brook Shirt', 'Cool red shirt!', 70, 1, '2019-06-06 17:12:59', '2019-06-05 16:12:49'),
(28, 'Wallet', 'You can absolutely use this one!', 799, 1, '2019-12-04 21:12:03', '2019-12-03 21:12:03'),
(31, 'Amanda Waller Shirt', 'New awesome shirt!', 333, 1, '2019-12-13 00:52:54', '2019-12-12 00:52:54'),
(42, 'Nike Shoes for Men', 'Nike Shoes', 12999, 6, '2019-12-12 06:47:08', '2019-12-12 04:47:08'),
(48, 'Bristol Shoes', 'Awesome shoes.', 999, 1, '2019-01-08 06:36:37', '2019-01-08 04:36:37'),
(65, 'Xbox', 'Xbox is a video gaming brand ', 500, 2, '2019-10-28 10:24:48', '2019-10-28 10:24:48'),
(66, 'Armani Shirt', 'New Armani shirt 2019', 500, 1, '2019-10-28 13:06:36', '2019-10-28 13:06:36'),
(77, '', '', 0, 1, '2019-10-30 19:54:32', '2019-10-30 19:54:32'),
(78, '', '', 0, 1, '2019-10-30 19:54:32', '2019-10-30 19:54:32'),
(79, '', '', 0, 1, '2019-10-30 19:54:33', '2019-10-30 19:54:33'),
(80, '', '', 0, 1, '2019-10-30 19:54:33', '2019-10-30 19:54:33'),
(81, '', '', 0, 1, '2019-10-30 19:56:03', '2019-10-30 19:56:03'),
(82, '', '', 0, 1, '2019-10-30 19:56:03', '2019-10-30 19:56:03'),
(83, '', '', 0, 1, '2019-10-30 19:56:03', '2019-10-30 19:56:03'),
(84, '', '', 0, 1, '2019-10-30 19:56:03', '2019-10-30 19:56:03'),
(85, '', '', 0, 1, '2019-10-30 19:56:03', '2019-10-30 19:56:03'),
(86, '', '', 0, 1, '2019-10-31 17:26:42', '2019-10-31 17:26:42'),
(87, '', '', 0, 1, '2019-10-31 17:26:43', '2019-10-31 17:26:43'),
(88, '', '', 0, 1, '2019-10-31 17:26:52', '2019-10-31 17:26:52'),
(89, '', '', 0, 1, '2019-10-31 17:26:52', '2019-10-31 17:26:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `factory`
--
ALTER TABLE `factory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `factory`
--
ALTER TABLE `factory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
