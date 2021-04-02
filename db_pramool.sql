-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 02, 2021 at 06:59 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pramool`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_ID` smallint(6) NOT NULL,
  `admin_Name` varchar(255) NOT NULL,
  `admin_Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_ID`, `admin_Name`, `admin_Password`) VALUES
(1, 'admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `bid_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `item_ID` int(11) NOT NULL,
  `user_Name` varchar(255) NOT NULL,
  `item_Name` varchar(255) NOT NULL,
  `bid_Date` varchar(255) NOT NULL,
  `bid_Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`bid_ID`, `user_ID`, `item_ID`, `user_Name`, `item_Name`, `bid_Date`, `bid_Price`) VALUES
(15, 1, 2, 'surakiat', 'ทดสอบ1', '2020-03-13 23:15:15', '2500.00'),
(16, 2, 2, 'user1', 'ทดสอบ1', '2020-03-13 23:15:34', '3000.00'),
(17, 2, 2, 'user1', 'ทดสอบ1', '2020-03-13 23:15:36', '3500.00'),
(18, 2, 2, 'user1', 'ทดสอบ1', '2020-03-13 23:18:38', '4000.00'),
(19, 1, 2, 'surakiat', 'ทดสอบ1', '2020-03-13 23:32:19', '4500.00');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_ID` int(11) NOT NULL,
  `item_Name` varchar(255) NOT NULL,
  `item_Description` longtext NOT NULL,
  `item_Close_Date` datetime DEFAULT NULL,
  `item_Increment_Price` decimal(10,2) NOT NULL,
  `item_Actual_Price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `item_Status` int(1) NOT NULL DEFAULT '0',
  `item_Role` int(11) NOT NULL DEFAULT '0',
  `item_Comments` varchar(255) DEFAULT NULL,
  `item_Path` varchar(255) DEFAULT NULL,
  `users_ID` smallint(6) NOT NULL,
  `user_Name` varchar(11) DEFAULT 'None'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_ID`, `item_Name`, `item_Description`, `item_Close_Date`, `item_Increment_Price`, `item_Actual_Price`, `item_Status`, `item_Role`, `item_Comments`, `item_Path`, `users_ID`, `user_Name`) VALUES
(2, 'ทดสอบ1', 'ทดสอบ1', '2020-09-15 06:06:06', '500.00', '4500.00', 1, 0, NULL, '1583775717.jpg', 1, 'surakiat'),
(3, 'ทดสอบ2', 'ทดสอบ2', '2020-09-15 06:06:06', '200.00', '0.00', 1, 0, NULL, '1583775887.jpg', 1, 'None'),
(9, 'ทดสอบ3', 'ทดสอบ3', '2020-03-14 01:45:08', '12.00', '0.00', 1, 0, NULL, '1584123908.jpg', 1, 'None'),
(10, 'ทดสอบ4', 'ทดสอบ4', '2020-03-14 12:40:18', '100.00', '0.00', 1, 0, NULL, '1584124038.jpg', 1, 'None'),
(15, 'ทดสอบ5', 'ทดสอบ5', '2020-09-16 01:33:55', '100.00', '0.00', 1, 0, NULL, '1584125492.jpg', 2, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `user_Name` varchar(255) NOT NULL,
  `user_RealName` varchar(255) DEFAULT NULL,
  `user_Password` varchar(255) NOT NULL,
  `user_Address` varchar(255) DEFAULT NULL,
  `user_Postal` varchar(255) DEFAULT NULL,
  `user_Email` varchar(255) NOT NULL,
  `user_Phone` varchar(50) NOT NULL,
  `user_Date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `user_Name`, `user_RealName`, `user_Password`, `user_Address`, `user_Postal`, `user_Email`, `user_Phone`, `user_Date`) VALUES
(1, 'surakiat', NULL, 'password', NULL, NULL, 'ubonlrta@gmail.com', '0958397716', NULL),
(2, 'user1', NULL, 'password', NULL, NULL, 'test@gmail.com', '0958397711', NULL),
(10, 'user4', 'ทดสอบ ทดสอบ', 'password', 'ทดสอบ', '34000', 'testetsr@test.com', '1234567654', '2020-03-15 17:45:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_ID`),
  ADD UNIQUE KEY `Unique_Name` (`admin_Name`);

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`bid_ID`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `item_ID` (`item_ID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_ID`),
  ADD KEY `admin_ID` (`users_ID`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `Unique_Email` (`user_Email`),
  ADD UNIQUE KEY `Unique_Phone` (`user_Phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_ID` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bid`
--
ALTER TABLE `bid`
  MODIFY `bid_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `item_ID` FOREIGN KEY (`item_ID`) REFERENCES `items` (`item_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ID` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
