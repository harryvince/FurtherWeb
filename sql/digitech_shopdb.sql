-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 21, 2021 at 08:33 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitech_shopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `userId` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(256) NOT NULL,
  `userType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`userId`, `username`, `password`, `userType`) VALUES
(1, 'harry', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_table`
--

CREATE TABLE `product_table` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(32) NOT NULL,
  `ProductDescription` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_table`
--

INSERT INTO `product_table` (`ProductID`, `ProductName`, `ProductDescription`, `image`, `cost`) VALUES
(1, 'Golf Bag', 'This one of a kind golf bag is great, store all your clubs and balls in once place!', 'golfbag.jpg', 112.99),
(2, 'Golf Club', 'This one of a kind golf club is only for sale here!', 'golfclub.jpg', 71.98),
(3, 'Titleist Golf Ball', 'Get your golf balls today! Receive a stacked discount when buying 10+ balls at checkout', 'ball.png', 3.99),
(4, 'Cobra Driver', 'The only premium driver on sale for a cheap price! Purchase yours today', 'cobraClub.jfif', 217.98),
(5, 'Ping Putter', 'This ping putter is a high quality tool for the job. You\'ll be getting a par easily', 'pingPutter.jpeg', 76.78),
(6, 'Standard golf ball', 'Just a standard golf ball at a cheap price, Buy 10+ balls for a discount at checkout', 'standardBall.jpg', 0.99),
(7, 'Golf Cart', 'This limited edition item is only on sale for a short time! Buy your golf cart today!', 'gCart.jpg', 2727.99),
(8, 'Football', 'Our brand new Adidas collection, available today! Buy your football today and qualify for a pump free of charge', 'football.jpeg', 14.99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`ProductID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_table`
--
ALTER TABLE `login_table`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_table`
--
ALTER TABLE `product_table`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
