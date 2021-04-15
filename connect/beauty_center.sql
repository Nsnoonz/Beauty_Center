-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2021 at 03:59 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beauty_center`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_ID` int(5) NOT NULL,
  `admin_Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_Surname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_Address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_Phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_Image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_Email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_Password` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `article_ID` int(11) NOT NULL,
  `article_NameTitle` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `article_Details` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `article_Image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `article_Date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_ID` int(11) NOT NULL,
  `book_Date` timestamp NULL DEFAULT NULL,
  `book_Time` time DEFAULT NULL,
  `book_Note` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_Statu` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `clinic_ID` int(11) NOT NULL,
  `clinic_Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clinic_Phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clinic_Image` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `clinic_NumAddress` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clinic_Address_GPS` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clinic_Address_Detil` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clinic_NumberPermit` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clinic_ImagePermit` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `Status` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clinic_Email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clinic_Password` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clinicday`
--

CREATE TABLE `clinicday` (
  `clinicDay_ID` int(1) NOT NULL,
  `clinicDay_Name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clinicDay_Time` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_ID` int(11) NOT NULL,
  `comment_Details` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment_Date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_ID` int(11) NOT NULL,
  `doctor_Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doctor_Surname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doctor_Image` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `doctor_Details` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `doctor_ImagePermit` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_ID` int(11) NOT NULL,
  `member_Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_Surname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_Address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_Phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_Image` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_Email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_Password` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_ID` int(11) NOT NULL,
  `payment_Date` timestamp NULL DEFAULT NULL,
  `payment_Month` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_Year` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_Yeceipt` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_Note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `statu` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviews_ID` int(11) NOT NULL,
  `clinic_ID` int(11) DEFAULT NULL,
  `reviews_Name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reviews_ Description` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reviews_Image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reviews_Details` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `reviews_Date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_ID` int(11) NOT NULL,
  `service_Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_Price` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `servicetype`
--

CREATE TABLE `servicetype` (
  `serviceType_ID` int(5) NOT NULL,
  `serviceType_Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_ID`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_ID`);

--
-- Indexes for table `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`clinic_ID`);

--
-- Indexes for table `clinicday`
--
ALTER TABLE `clinicday`
  ADD PRIMARY KEY (`clinicDay_ID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_ID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_ID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_ID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviews_ID`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_ID`);

--
-- Indexes for table `servicetype`
--
ALTER TABLE `servicetype`
  ADD PRIMARY KEY (`serviceType_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clinic`
--
ALTER TABLE `clinic`
  MODIFY `clinic_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clinicday`
--
ALTER TABLE `clinicday`
  MODIFY `clinicDay_ID` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviews_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `servicetype`
--
ALTER TABLE `servicetype`
  MODIFY `serviceType_ID` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
