-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 30, 2019 at 12:45 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ReadaDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `AddressID` int(11) NOT NULL,
  `City` varchar(30) DEFAULT 'none',
  `Postcode` int(5) NOT NULL,
  `ApartmentNumber` int(3) NOT NULL,
  `Street` varchar(40) NOT NULL,
  `Nighborhood` varchar(40) NOT NULL,
  `EmailId` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`AddressID`, `City`, `Postcode`, `ApartmentNumber`, `Street`, `Nighborhood`, `EmailId`) VALUES
(24, 'Demo City', 10001, 1, 'Demo Street', 'none', 'student1@example.com'),
(25, 'Demo City', 10002, 2, 'Sample Street', '-', 'student2@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `AdminEmail` varchar(120) DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `FullName`, `AdminEmail`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'Admin', 'admin@admin.com', 'admin', '0192023a7bbd73250516f069df18b500', '2019-12-29 19:46:07');

-- --------------------------------------------------------

--
-- Table structure for table `ordertbl`
--

CREATE TABLE `ordertbl` (
  `orderID` int(11) NOT NULL,
  `orderplaced` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `DateOfReseved` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `DateOfDelivered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `BookID` int(11) NOT NULL,
  `EmailId` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertbl`
--

INSERT INTO `ordertbl` (`orderID`, `orderplaced`, `status`, `DateOfReseved`, `DateOfDelivered`, `BookID`, `EmailId`) VALUES
(1, '2019-12-29 21:03:05', 'Delivered', '2019-12-29 21:04:40', '2019-12-29 21:04:40', 1, 'student2@example.com'),
(2, '2019-12-29 22:32:34', 'On Way', '2019-12-30 00:28:58', '0000-00-00 00:00:00', 2, 'student1@example.com'),
(3, '2019-12-29 22:37:42', 'Delivered', '2019-12-30 11:22:09', '2019-12-30 11:22:09', 2, 'student1@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentid` int(10) NOT NULL,
  `useremail` varchar(50) NOT NULL,
  `info` varchar(100) NOT NULL,
  `bankacc` int(24) NOT NULL,
  `amount` int(10) NOT NULL,
  `typeoftras` varchar(50) NOT NULL,
  `trantime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approved` int(10) NOT NULL,
  `bookid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentid`, `useremail`, `info`, `bankacc`, `amount`, `typeoftras`, `trantime`, `approved`, `bookid`) VALUES
(1, 'student1@example.com', '', 1000000001, 300, 'Transfer money to Reada', '2019-12-29 20:43:32', 1, 0),
(2, 'student2@example.com', '', 1000000002, 500, 'Transfer money to Reada', '2019-12-29 20:58:54', 1, 0),
(3, 'student2@example.com', '', 0, -251, 'Buy', '2019-12-29 21:03:05', 1, 1),
(4, 'student1@example.com', '', 0, 251, 'Sell', '2019-12-29 21:03:05', 1, 1),
(6, 'student1@example.com', '', 123456, -123, 'Transfer money From Reada', '2019-12-29 22:09:26', 1, 0),
(7, 'student1@example.com', '', 0, -301, 'Buy', '2019-12-29 22:32:34', 1, 2),
(8, 'student2@example.com', '', 0, 301, 'Sell', '2019-12-29 22:32:34', 1, 2),
(9, 'student1@example.com', '', 12345678, 1000, 'Transfer money to Reada', '2019-12-29 22:36:23', 1, 0),
(10, 'student1@example.com', '', 0, -301, 'Buy', '2019-12-29 22:37:42', 1, 2),
(11, 'student2@example.com', '', 0, 301, 'Sell', '2019-12-29 22:37:42', 1, 2),
(12, 'student1@example.com', '', 1234, 100, 'Transfer money to Reada', '2019-12-29 22:39:08', 1, 0),
(13, 'student1@example.com', '', 1234, -900, 'Transfer money From Reada', '2019-12-29 22:39:39', 1, 0),
(14, 'student1@example.com', '', 1234567890, 12, 'Transfer money to Reada', '2019-12-30 00:11:59', 1, 0),
(15, 'student1@example.com', '', 234567899, 38, 'Transfer money From Reada', '2019-12-30 10:54:20', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shippingco`
--

CREATE TABLE `shippingco` (
  `ShippingID` int(10) NOT NULL,
  `ShipUserName` varchar(30) NOT NULL,
  `ShipPassword` varchar(100) NOT NULL,
  `shipStatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shippingco`
--

INSERT INTO `shippingco` (`ShippingID`, `ShipUserName`, `ShipPassword`, `shipStatus`) VALUES
(1, 'DHL', '81dc9bdb52d04dc20036dbd8313ed055', 1);

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `supportid` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `time` timestamp(4) NOT NULL DEFAULT '0000-00-00 00:00:00.0000' ON UPDATE CURRENT_TIMESTAMP(4),
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`supportid`, `email`, `msg`, `time`, `status`) VALUES
(1, 'student1@example.com', 'hi', '2019-12-29 22:22:52.2081', 'Viewed'),
(2, 'student1@example.com', ' Hello', '2019-12-29 22:22:52.0000', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooks`
--

CREATE TABLE `tblbooks` (
  `id` int(11) NOT NULL,
  `BookName` varchar(255) DEFAULT NULL,
  `Author` varchar(100) DEFAULT NULL,
  `BookLanguage` varchar(60) DEFAULT NULL,
  `Description` text,
  `ConditionRate` varchar(60) DEFAULT NULL,
  `CatId` int(11) DEFAULT NULL,
  `CollegeId` int(11) DEFAULT NULL,
  `ISBNNumber` int(11) DEFAULT NULL,
  `BookPrice` int(11) DEFAULT NULL,
  `com` int(11) NOT NULL,
  `EmailId` varchar(50) NOT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbooks`
--

INSERT INTO `tblbooks` (`id`, `BookName`, `Author`, `BookLanguage`, `Description`, `ConditionRate`, `CatId`, `CollegeId`, `ISBNNumber`, `BookPrice`, `com`, `EmailId`, `RegDate`, `UpdationDate`) VALUES
(1, 'Java: A Beginner\'s Guide', 'Herbert Schildt', 'English', '  MIS LEVEL 6 and 7 ', 'As New', 2, 1, 978, 251, 1, 'student1@example.com', '2019-12-29 20:41:40', '2019-12-30 00:35:07'),
(2, 'Business Intelligence and Analytics: Systems for Decision Support', 'Efraim Turban? Dursun Delen', 'English', '  MIS level 7 for DSS course.', 'Fine', 2, 1, 978, 301, 2, 'student2@example.com', '2019-12-29 20:58:28', '2019-12-29 22:37:42'),
(3, 'Programing Language', 'Ahmad', 'English', 'MIS  Level 7 ', 'Fair', 2, 3, 123456789, 100, 0, 'student2@example.com', '2019-12-30 10:48:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(150) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Status`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Romantic', 1, '2019-12-29 20:06:58', '2019-12-29 20:07:32'),
(2, 'Technology', 1, '2019-12-29 20:06:58', '2019-12-29 20:09:02'),
(3, 'Science', 1, '2019-12-29 20:06:58', '2019-12-29 20:09:06'),
(4, 'Management', 1, '2019-12-29 20:06:58', '2019-12-29 20:09:09');

-- --------------------------------------------------------

--
-- Table structure for table `tblcollege`
--

CREATE TABLE `tblcollege` (
  `id` int(11) NOT NULL,
  `College` varchar(100) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcollege`
--

INSERT INTO `tblcollege` (`id`, `College`, `creationDate`, `UpdationDate`) VALUES
(1, 'Business School', '2019-12-29 20:10:59', '2019-12-29 20:11:35'),
(2, 'Engineering College ', '2019-12-29 20:11:24', '2019-12-29 20:11:38'),
(3, 'Computer Science', '2019-12-30 00:21:44', NULL),
(4, 'Art', '2019-12-30 00:22:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `MobileNumber` char(11) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `bfriend` varchar(25) NOT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`id`, `FullName`, `EmailId`, `MobileNumber`, `Password`, `Status`, `bfriend`, `RegDate`, `UpdationDate`) VALUES
(1, 'Student One', 'student1@example.com', '0500000001', 'ad6a280417a0f533d8b670c61667e1a0', 1, 'Demo', '2019-12-29 20:27:09', '2019-12-30 10:55:35'),
(2, 'Student Two', 'student2@example.com', '0500000002', 'ad6a280417a0f533d8b670c61667e1a0', 1, 'Demo', '2019-12-29 20:56:01', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`AddressID`),
  ADD UNIQUE KEY `EmailId` (`EmailId`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertbl`
--
ALTER TABLE `ordertbl`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentid`);

--
-- Indexes for table `shippingco`
--
ALTER TABLE `shippingco`
  ADD PRIMARY KEY (`ShippingID`),
  ADD UNIQUE KEY `ShipUserName` (`ShipUserName`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`supportid`);

--
-- Indexes for table `tblbooks`
--
ALTER TABLE `tblbooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcollege`
--
ALTER TABLE `tblcollege`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `EmailId` (`EmailId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `AddressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ordertbl`
--
ALTER TABLE `ordertbl`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `shippingco`
--
ALTER TABLE `shippingco`
  MODIFY `ShippingID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `supportid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblbooks`
--
ALTER TABLE `tblbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcollege`
--
ALTER TABLE `tblcollege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
