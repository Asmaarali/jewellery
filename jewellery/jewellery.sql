-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 12:30 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jewellery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `username`, `email`, `password`) VALUES
(1, 'asmaar', 'asmaar@gmail.com', '123'),
(2, 'asmaar', 'asmaar@gmail.com', '123'),
(3, 'rabeet', 'rabeet@gmail.com', '123'),
(4, 'anas', 'anas@gmail.com', '222'),
(5, 'rabia', 'rabia@gmail.com', '123'),
(6, 'Alishba', 'alishba@gmail.com', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` int(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `quantity` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `image`, `quantity`) VALUES
(33, 'neckless2', 3000, '6.png', 1),
(34, 'neckless3', 1500, '3.png', 1),
(35, 'chooriya1', 120, '2.png', 1),
(36, 'neckless1', 1200, '1.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(250) NOT NULL,
  `cat_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'chooriya'),
(2, 'Cosmetics'),
(5, 'neckless');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `cell` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `dateofbirth` varchar(250) NOT NULL,
  `method` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `cat_name` varchar(250) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `products` varchar(255) NOT NULL,
  `Total` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `name`, `cell`, `email`, `dateofbirth`, `method`, `address`, `cat_name`, `remarks`, `products`, `Total`) VALUES
(30, 'ASMAAR ALI', '03102075046', 'asmaar@gmail.com', '4-12', 'cash on delivery', 'A-47,Block 12 Gulistan-e-johar Karachi..', 'kangan', 'perfect', 'neckless2 (1) , neckless3 (3) , chooriya1 (1) ', '7620'),
(31, 'ahmed', '03102075046', 'ahmad@gmail.com', '55-12-2022', 'paypal', 'block13', 'neckless', 'amaze', 'neckless2 (1) , neckless3 (6) , chooriya1 (1) , neckless1 (1) ', '13320'),
(38, 'hunain', '02133966', 'hunain@yahoo.com', '55-12-2022', 'credit cart', 'block12', 'Cosmetics', 'perfect', 'neckless2 (1) , neckless3 (1) , chooriya1 (1) , neckless1 (1) ', '5820');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pr_id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` int(250) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pr_id`, `name`, `price`, `image`) VALUES
(26, 'neckless1', 1200, '1.png'),
(27, 'neckless2', 3000, '6.png'),
(28, 'chooriya1', 120, '2.png'),
(29, 'neckless3', 1500, '3.png'),
(30, 'kangan1', 400, '4.png'),
(31, 'ear tops1', 200, '5.png'),
(32, 'kangan2', 500, '7.png'),
(33, 'neckless4', 600, '8.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pr_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
