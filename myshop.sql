-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2020 at 05:30 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` varchar(15) NOT NULL,
  `brand_title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_title`) VALUES
('b-555', 'Beximco'),
('b-556', 'Incepta'),
('b-557', 'Square'),
('b-558', 'ACI limited'),
('b-559', 'Bengal drugs');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` int(12) NOT NULL,
  `qty` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`) VALUES
(7, 0, 0),
(3, 4, 8),
(11, 0, 0),
(12, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(15) NOT NULL,
  `cat_title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`) VALUES
(101, 'Gestrical'),
(102, 'Neuro'),
(105, 'surgical'),
(109, 'pain management'),
(113, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(15) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` int(10) NOT NULL,
  `customer_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `drug_title` text NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `brand_id` text DEFAULT NULL,
  `drug_image1` text NOT NULL,
  `drug_image2` text NOT NULL,
  `price` int(10) NOT NULL,
  `drug_des` text NOT NULL,
  `status` text NOT NULL,
  `drug_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`drug_title`, `cat_id`, `brand_id`, `drug_image1`, `drug_image2`, `price`, `drug_des`, `status`, `drug_id`) VALUES
('Nexum', 101, 'Square limited', 'images.jpg', '', 40, 'Decrease acid in stomach', 'status', 7),
('Melphin', 113, 'Beximco', 'melpin.jpg', '', 70, ' This medication is used to treat intestinal worm infections ', 'status', 11),
('Vemdisivir', 113, 'Beximco', 'vemdisivir.jpg', '', 3000, ' Remdesivir has an FDA Emergency Use Authorization for use in covid 19', 'status', 6),
('napa', 109, 'Square limited', 'Napa-Beximco-Oushode.com_.jpg', '', 20, 'Treat for Headache,toothache, earache, bodyache, myalgia, dysmenorrhoea, neuralgia and sprain', 'status', 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
