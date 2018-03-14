-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2018 at 10:32 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(0, 'admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `code` varchar(250) NOT NULL,
  `product` varchar(250) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '1',
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `code`, `product`, `qty`, `amount`) VALUES
(12, 'iED3X', 'gutling gun version 2', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `id` int(11) NOT NULL,
  `transac_num` varchar(255) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `contact` int(11) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`id`, `transac_num`, `name`, `email`, `contact`, `address`) VALUES
(41, 'OvYa', 'Jomarie', 'Rafa@gmail.com', 2147483647, 'rafatotits'),
(42, 'aueV', 'Charles', 'awdwa@gmail', 232, 'wadawdwa');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `productname` varchar(250) NOT NULL,
  `productcode` varchar(250) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `productname`, `productcode`, `stock`, `image`, `price`) VALUES
(32, 'gutling gun version 2', 'iED3X', 5, '9951.jpg', '5.00'),
(33, 'ak', 'KoSOf', 0, '8842.jpg', '2.00'),
(34, 'Uzi', 'liWRA', 45, '27372.jpg', '4.51'),
(35, 'm4a1', 'Bmgw9', 11, '1304.jpg', '50'),
(36, 'Gatling gun', 'okZyj', 0, '2009.jpg', '3.00');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `productcode` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `quantity_output` int(11) NOT NULL DEFAULT '0',
  `price_output` varchar(250) NOT NULL DEFAULT '0',
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `productcode`, `productname`, `quantity_output`, `price_output`, `image`) VALUES
(2, 'iED3X', 'gutling gun version 2', 6, '45', '9951.jpg'),
(3, 'KoSOf', 'ak', 10, '20', '8842.jpg'),
(4, 'liWRA', 'Uzi', 0, '0', '27372.jpg'),
(5, 'Bmgw9', 'm4a1', 23, '1150', '1304.jpg'),
(6, 'okZyj', 'Gatling gun', 0, '0', '2009.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `transac_num` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `ordered_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `transac_num`, `name`, `ordered_at`) VALUES
(35, 'OvYa', 'Jomarie', '2018-03-14 07:07:48'),
(36, 'aueV', 'Charles', '2018-03-14 07:18:41');

-- --------------------------------------------------------

--
-- Table structure for table `transac_detail`
--

CREATE TABLE `transac_detail` (
  `id` int(11) NOT NULL,
  `transac_num` varchar(250) NOT NULL,
  `product` varchar(250) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transac_detail`
--

INSERT INTO `transac_detail` (`id`, `transac_num`, `product`, `qty`, `amount`) VALUES
(27, 'OvYa', 'ak', 6, 12),
(28, 'OvYa', 'gutling gun version 2', 6, 30),
(29, 'aueV', 'm4a1', 23, 1150),
(30, 'aueV', 'ak', 4, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transac_detail`
--
ALTER TABLE `transac_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `transac_detail`
--
ALTER TABLE `transac_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
