-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2021 at 02:11 PM
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
(1, 'harry', '$2y$10$3H2Z4eSd6.wAgIUu7dCdLOD0aAXfC08dbl5ST/Li5gmqBlkfLWi4i', 1),
(2, 'matt', '$2y$10$3H2Z4eSd6.wAgIUu7dCdLOD0aAXfC08dbl5ST/Li5gmqBlkfLWi4i', 0),
(4, 'neil', '$2y$10$3H2Z4eSd6.wAgIUu7dCdLOD0aAXfC08dbl5ST/Li5gmqBlkfLWi4i', 0),
(5, 'test', '$2y$10$3H2Z4eSd6.wAgIUu7dCdLOD0aAXfC08dbl5ST/Li5gmqBlkfLWi4i', 0),
(6, 'admin', '$2y$10$3H2Z4eSd6.wAgIUu7dCdLOD0aAXfC08dbl5ST/Li5gmqBlkfLWi4i', 1),
(7, 'dave', '$2y$10$3H2Z4eSd6.wAgIUu7dCdLOD0aAXfC08dbl5ST/Li5gmqBlkfLWi4i', 0),
(8, 'shopUser', '$2y$10$3H2Z4eSd6.wAgIUu7dCdLOD0aAXfC08dbl5ST/Li5gmqBlkfLWi4i', 0),
(9, 'golfLegend', '$2y$10$3H2Z4eSd6.wAgIUu7dCdLOD0aAXfC08dbl5ST/Li5gmqBlkfLWi4i', 0),
(10, 'TestUser', '$2y$10$ZLdMGnWkWMlIiPwZ6EgWs.iw2Pyv5IRrXbRDtBmjgbSfxVRHPbcou', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderproducts_table`
--

CREATE TABLE `orderproducts_table` (
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderproducts_table`
--

INSERT INTO `orderproducts_table` (`OrderID`, `ProductID`, `Quantity`) VALUES
(2, 4, 4),
(2, 7, 1),
(2, 1, 1),
(2, 8, 15),
(1, 6, 1),
(3, 4, 1),
(3, 2, 1),
(3, 5, 1),
(3, 1, 1),
(3, 3, 10),
(4, 7, 5),
(5, 7, 1),
(5, 5, 1),
(5, 6, 71),
(5, 2, 1),
(5, 3, 4),
(6, 5, 2),
(6, 3, 50),
(6, 7, 1),
(6, 1, 1),
(7, 4, 1),
(7, 1, 3),
(7, 7, 2),
(8, 5, 1),
(9, 1, 1),
(9, 3, 10),
(9, 4, 1),
(9, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `OrderID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`OrderID`, `UserID`, `Total`) VALUES
(1, 5, 0.99),
(2, 1, 3937.75),
(3, 1, 519.63),
(4, 1, 13640),
(5, 1, 2963),
(6, 9, 3194.04),
(7, 1, 6012.93),
(8, 1, 76.78),
(9, 1, 3098.86);

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
(1, 'Chocolate Frosted Donuts', 'Here are our chocolate frosted donuts with sprinkles! Only Available at dipping donuts', 'chocFrost.jpg', 3.99),
(2, 'LGBTQ+ Donuts', 'Our LGBTQ+ Donuts are here in support of pride month, Only available until Janurary 31st', 'lgbt.jpg', 4.99),
(3, 'Reflective Donuts', 'Here are our reflective donuts! With our special recipe the donuts shine under light showing different shades', 'reflective.jpg', 6.99),
(4, 'Rainbow Donuts', 'Our luxury rainbow donuts offered courtesy of Dipping Donuts', 'rainbow.jpg', 2.99),
(5, 'Chocolate Donuts', 'Our standard Chocolate donuts, with a chocolate filling. Courtesy of Dipping Donuts', 'choc.jpg', 3.99),
(6, 'Custard Donut', 'Our widely available Custard donuts, yes you\'ve seen them in your local supermarket. But they ain\'t no \"Dipping Donuts\"', 'custard.jpg', 0.99),
(7, 'Jam Donuts', 'Our widely available Jam donuts, yes you\'ve seen them in your local supermarket. But they ain\'t no \"Dipping Donuts\"', 'jam.jfif', 0.99),
(8, 'Classic Donut', 'Our widely available Classic donuts, yes you\'ve seen them in your local supermarket. But they ain\'t no \"Dipping Donuts\"', 'classic.jpg', 1.99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `orderproducts_table`
--
ALTER TABLE `orderproducts_table`
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `UserID` (`UserID`);

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
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_table`
--
ALTER TABLE `product_table`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderproducts_table`
--
ALTER TABLE `orderproducts_table`
  ADD CONSTRAINT `OrderID` FOREIGN KEY (`OrderID`) REFERENCES `order_table` (`OrderID`),
  ADD CONSTRAINT `ProductID` FOREIGN KEY (`ProductID`) REFERENCES `product_table` (`ProductID`);

--
-- Constraints for table `order_table`
--
ALTER TABLE `order_table`
  ADD CONSTRAINT `UserID` FOREIGN KEY (`UserID`) REFERENCES `login_table` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
