-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2017 at 02:45 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ordermyfood`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_detail`
--

CREATE TABLE `customer_detail` (
  `cid` int(10) NOT NULL,
  `csid` varchar(50) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `mob` bigint(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `cpass` varchar(20) NOT NULL,
  `addr` varchar(40) NOT NULL,
  `country` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` bigint(6) NOT NULL,
  `verify_code` varchar(100) NOT NULL,
  `isVerify` varchar(100) NOT NULL,
  `isActive` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_detail`
--

INSERT INTO `customer_detail` (`cid`, `csid`, `fname`, `lname`, `mob`, `email`, `pass`, `cpass`, `addr`, `country`, `state`, `pincode`, `verify_code`, `isVerify`, `isActive`) VALUES
(31, '201707131257h', 'bachhan', 'honey', 9844323539, 'bachhanhoney@gmail.com', '1', '1', '1', '1', '1', 562106, 'a28650ad3141da1d75d3f5099640db27', 'Y', 'Y'),
(32, '201707131311h', 'honey', 'bachhan', 9731063350, 'honey.bachhan@gmail.com', 'honey', 'honey', '1', '1', '1', 562106, '2f54bc4ec401514e5bf874d07e2045c2', 'Y', 'Y'),
(33, '201707131317h', 'h', 'b', 1234567890, 'h@gmail.com', '1', '1', '1', '1', '1', 562106, 'b238b97895cbf1d2d9ccccea70f826e3', 'N', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `menu_detail`
--

CREATE TABLE `menu_detail` (
  `menu_id` int(10) NOT NULL,
  `hid` varchar(200) NOT NULL,
  `item_name` varchar(40) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(400) NOT NULL,
  `type` varchar(20) NOT NULL,
  `action` int(10) NOT NULL,
  `food_detail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_detail`
--

INSERT INTO `menu_detail` (`menu_id`, `hid`, `item_name`, `price`, `image`, `type`, `action`, `food_detail`) VALUES
(28, 'JWMarriot201707200735', 'Ham Burger', 180, 'food/hamburger.jpg', 'nonveg', 1, ''),
(29, 'JWMarriot201707200735', 'Stuffed Bread', 120, 'food/tablesetting.jpg', 'veg', 1, ''),
(33, 'TheTaj201707200726', 'Jeera Rice', 55, 'food/arice.jpg', 'veg', 1, 'Rice mixed with spicy and enriched jeera'),
(34, 'TheTaj201707200726', 'Chicken Curry', 360, 'food/chicken.jpg', 'nonveg', 1, 'Chicken blended with spicy chicken masala and the taste of indian spices'),
(35, 'TheTaj201707200726', 'Naan', 35, 'food/naan.jpg', 'veg', 1, 'Garnished with melted butter and green leaves'),
(36, 'TheTaj201707200726', 'Tandoori Chicken ', 599, 'food/tandoori.jpg', 'nonveg', 1, 'Chicken blended with curd and tandoori masala'),
(37, 'TheTaj201707200726', 'Paneer Butter masala', 220, 'food/pannerbutter.jpg', 'veg', 1, 'Paneer enriched with butter and some indian spices'),
(38, 'TheTaj201707200726', 'Chicken Burger', 180, 'food/hamburger.jpg', 'nonveg', 1, 'Bun packed with chicken with fresh vegetables'),
(40, 'TheTaj201707200726', 'rasmalai', 60, 'food/rasmalai.jpg', 'veg', 1, 'dessert ');

-- --------------------------------------------------------

--
-- Table structure for table `owner_detail`
--

CREATE TABLE `owner_detail` (
  `oid` int(100) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `cpass` varchar(20) NOT NULL,
  `mob` bigint(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `hname` varchar(40) NOT NULL,
  `hid` varchar(200) NOT NULL,
  `addr` varchar(50) NOT NULL,
  `city` varchar(40) NOT NULL,
  `state` varchar(40) NOT NULL,
  `pincode` bigint(6) NOT NULL,
  `country` varchar(40) NOT NULL,
  `website` varchar(40) NOT NULL,
  `telephone` bigint(20) NOT NULL,
  `abouthotel` varchar(500) NOT NULL,
  `image` varchar(400) NOT NULL,
  `verify_code` varchar(40) NOT NULL,
  `is_verify` varchar(10) NOT NULL,
  `is_active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner_detail`
--

INSERT INTO `owner_detail` (`oid`, `fname`, `lname`, `pass`, `cpass`, `mob`, `email`, `hname`, `hid`, `addr`, `city`, `state`, `pincode`, `country`, `website`, `telephone`, `abouthotel`, `image`, `verify_code`, `is_verify`, `is_active`) VALUES
(34, 'honey', 'bachhan', 'honey', 'honey', 1234567890, 'honey.bachhan@gmail.com', 'The Taj', 'TheTaj201707200726', 'Near Gateway Of India', 'Mumbai', 'Maharastra', 400016, 'India', 'www.thetaj.in', 1234567890, '5 star', 'food/taj.jpg', '6c920261e0a05fa414f7b94f09225205', 'Y', 'Y'),
(35, 'Honey', 'B', 'honey', 'honey', 9844323539, 'bachhanhoney@gmail.com', 'J W Marriot', 'JWMarriot201707200735', 'Mallya Road', 'Bangalore', 'Karnataka', 562107, 'India', 'www.jwmarriot.in', 1234567890, 'beautiful', 'food/jwmarriot.jpg', 'f22a79125ff765ab2606c58b2bc8d9e6', 'Y', 'Y'),
(64, 'h', 'h', 'h', 'h', 9731063350, 'h@gmail.com', 'h', '', 'h', 'h', 'h', 562106, 'h', 'h', 0, 'h', 'food/oberoi.jpg', '745157', 'Y', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_detail`
--
ALTER TABLE `customer_detail`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `csid` (`csid`);

--
-- Indexes for table `menu_detail`
--
ALTER TABLE `menu_detail`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `owner_detail`
--
ALTER TABLE `owner_detail`
  ADD PRIMARY KEY (`oid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_detail`
--
ALTER TABLE `customer_detail`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `menu_detail`
--
ALTER TABLE `menu_detail`
  MODIFY `menu_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `owner_detail`
--
ALTER TABLE `owner_detail`
  MODIFY `oid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
