-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2021 at 03:41 PM
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
  `admin_Password` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_ID`, `admin_Name`, `admin_Surname`, `admin_Address`, `admin_Phone`, `admin_Image`, `admin_Email`, `admin_Password`) VALUES
(1, 'สุภาวดี', 'จันทร์โม้', 'msu', '0945530050', 'สุภาวดี28174476.jpg', 'admin@center.com', 'c9a342f2aa18c83495bb913801c9d229');

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

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_ID`, `article_NameTitle`, `article_Details`, `article_Image`, `article_Date`) VALUES
(1, 'ดื่มน้ำอย่างไรให้สุขภาพดี', '<p><strong>ดื่มน้ำอย่างไร ให้<a href=\"https://www.sanook.com/health/\" target=\"_blank\">สุขภาพ</a>ดี</strong></p>\r\n\r\n<p>- ตื่นนอนตอนเช้าควรจะดื่มน้ำอุ่น เพราะน้ำอุ่นดื่มง่ายกว่าน้ำธรรมดา และอุณหภูมิของน้ำที่ดื่มไม่ต่ำกว่าอุณหภูมิของร่างกาย จึงไม่เป็นการไปดึงอุณหภูมิร่างกายให้เย็นลง หรืออาจเป็นน้ำที่อุณหภูมิห้องก็ได้ ควรดื่ม 1-3 แก้วให้ได้อย่างต่ำ 500-750 มิลลิลิตร ช่วงเวลาหลังตื่นนอนเป็นช่วงที่มีความเข้มข้นของเลือดสูง ร่างกายและเลือดจะมีลักษณะขาดน้ำ และเพื่อกระตุ้นระบบขับถ่าย</p>\r\n\r\n<p>- 15 นาทีก่อนอาหาร ระหว่างทานอาหาร และหลังทานอาหาร 30 นาที ทั้ง 3 เวลานี้ ดื่มน้ำรวมกันทั้งหมดไม่ควรเกินครึ่งแก้ว เพราะหากดื่มน้ำมากเกินไประหว่างทานอาหารจะทำให้น้ำย่อยในกระเพาะเจือจางลง ส่งผลต่อระบบการย่อยอาหารร่างกายย่อยอาหารได้ไม่ดี</p>\r\n\r\n<p>- ช่วงเวลาประมาณ 9 โมงถึง 10 โมงเช้า ควรดื่มน้ำให้ได้ 2 แก้ว ช่วงนี้เป็นช่วงที่มีของเสียเกิดขึ้น เพราะร่างกายได้ทํางานไประยะหนึ่งแล้ว ควรดื่มน้ำเพื่อมาชําระของเสียเหล่านั้นออกไป</p>\r\n\r\n<p>- ตลอดทั้งวัน ดื่มน้ำทีละนิด แบบจิบทีละ 2 &ndash; 3 อึก จิบบ่อยๆ ดีกว่าการดื่มน้ำครั้งละมากๆ เพราะเป็นการเพิ่มภาระให้กับระบบย่อยอาหาร และระบบขับถ่าย</p>\r\n\r\n<p>- ก่อนนอนให้ดื่มน้ำอีก 1-2 แก้ว&nbsp;ให้มากกว่า 250 มิลลิลิตร เพื่อให้น้ำที่ดื่มไหลเวียนชะล้างสิ่งตกค้างในลําไส้และกระเพาะอาหาร ถ้าเป็นน้ำอุ่นจะยิ่งช่วยให้หลับสบายยิ่งขึ้น</p>\r\n\r\n<p><strong>ประโยชน์ของการดื่มน้ำ</strong></p>\r\n\r\n<p>1. ช่วยบำรุงสุขภาพผิวให้ดีขึ้น เพิ่มความชุ่มชื้น ป้องกันเรื่องริ้วรอยและผิวแห้งกร้าน</p>\r\n\r\n<p>2. ช่วยเพิ่มความสดชื่นให้แก่ร่างกาย</p>\r\n\r\n<p>3. ปรับสมดุลให้แก่ร่างกาย</p>\r\n\r\n<p>4. ช่วยให้ระบบการหมุนเวียนของเลือดทำงานได้ดีขึ้น</p>\r\n\r\n<p>5. ควบคุมอุณหภูมิของร่างกายให้คงที่</p>\r\n\r\n<p>6. ข้อต่อต่างๆ ในร่างกายทำงานได้ดียิ่งขึ้น</p>\r\n\r\n<p>7. ระบบการย่อยอาหารทำงานได้ดีขึ้น</p>\r\n\r\n<p>8. ช่วยให้อวัยวะภายในร่างกายต่างๆ ทำงานได้อย่างมีประสิทธิภาพ เช่น หัวใจ ไต เป็นต้น</p>\r\n\r\n<p>9. ระบบขับถ่ายทำงานได้อย่างมีประสิทธิภาพ</p>\r\n\r\n<p>น้ำคือสิ่งที่ร่างกายมนุษย์ต้องการมากที่สุด เป็น<a href=\"https://www.sanook.com/health/medicine/\" target=\"_blank\">ยารักษาโรค</a>ที่ดีที่สุด เพื่อสุขภาพที่ดียิ่งขึ้น และป้องกันโรคภัยต่างๆ เราจึงควรหันมาใส่ใจกับการดื่มน้ำให้มากยิ่งขึ้น ควบคู่ไปกับการพักผ่อน การทานอาหาร และการ<a href=\"https://www.sanook.com/health/tag/%E0%B8%AD%E0%B8%AD%E0%B8%81%E0%B8%81%E0%B8%B3%E0%B8%A5%E0%B8%B1%E0%B8%87%E0%B8%81%E0%B8%B2%E0%B8%A2/\" target=\"_blank\">ออกกำลังกาย</a>อย่างสม่ำเสมอนะคะ</p>\r\n', 'ดื่มน้ำอย่างไรให้สุขภาพดี1053420208.jpg', '2021-03-03 16:44:35'),
(4, 'สวย', '<p>asasasasa</p>\r\n', 'สวย468642647.jpg', '2021-03-03 18:19:11'),
(5, 'ดื่มน้ำอย่างไรให้สุขภาพดีa', '<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'ดื่มน้ำอย่างไรให้สุขภาพดีa750547618.jpg', '2021-03-17 20:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_ID` int(11) NOT NULL,
  `booking_Date` timestamp NULL DEFAULT NULL,
  `booking_Time` time DEFAULT NULL,
  `booking_Note` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `booking_Statu` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_ID` int(11) DEFAULT NULL,
  `clinic_ID` int(11) DEFAULT NULL,
  `service_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `clinic_ID` int(11) NOT NULL,
  `clinic_Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clinic_Detail` text COLLATE utf8_unicode_ci DEFAULT NULL,
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
  `Status_Note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `clinic_Email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clinic_Password` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`clinic_ID`, `clinic_Name`, `clinic_Detail`, `clinic_Phone`, `clinic_Image`, `clinic_NumAddress`, `clinic_Address_GPS`, `clinic_Address_Detil`, `clinic_NumberPermit`, `clinic_ImagePermit`, `latitude`, `longitude`, `Status`, `Status_Note`, `clinic_Email`, `clinic_Password`) VALUES
(1, 'ลาเดอมา คลินิก Art & Surgery', '<p>ความงามคือ ศิลปะ + ความรู้ทางการแพทย์</p>\r\n', '0854511242', 'ลาเดอมา คลินิก Art & Surgery-0.jpg,ลาเดอมา คลินิก Art & Surgery-1.jpg,ลาเดอมา คลินิก Art & Surgery-2.jpg,ลาเดอมา คลินิก Art & Surgery-3.jpg', '571/5', 'ตำบลท่าขอนยาง อำเภอกันทรวิชัย มหาสารคาม ประเทศไทย 44150', '', '44101000555', 'ลาเดอมา คลินิก Art & Surgery.jpg', 16.236319328312625, 103.26254189014435, '1', 'ไม่มีแพทย์ประจำคลินิก', 'LE-DERMA-CLINIC@gmail.com', '6da9327a5c082edfd3957c073733b7b1'),
(2, 'Metro Bangkok Clinic', '<p>เมโทรบางกอกคลินิกเป็นหนึ่งในศูนย์ออกแบบความงามชั้นนำในประเทศไทยศูนย์นี้มีพนักงานและดูแลโดยแพทย์ผู้เชี่ยวชาญด้านวิทยาศาสตร์และความงามขั้นสูงเราเชี่ยวชาญในการเสริมความงามแบบครบวงจรโดยใช้อุปกรณ์ทางการแพทย์ขั้นสูงเทคโนโลยีที่ทันสมัย และรักษามาตรฐานสูงสุดในการดูแลเรานำเสนอเทคโนโลยีที่ปลอดภัยและล้ำสมัยที่สุดจากอเมริกาซึ่งได้รับการรับรองจากองค์การอาหารและยา (FDA USA KDFA KGPM) เราให้ความสำคัญกับลูกค้าของเราและทำงานอย่างใกล้ชิดกับพวกเขาเพื่อปรับแต่งการรักษาตาม ตามความต้องการของพวกเขา<br />\r\n&nbsp;</p>\r\n', '0850399997', 'Metro Bangkok Clinic465-0.png,Metro Bangkok Clinic465-1.png,Metro Bangkok Clinic465-2.png,Metro Bangkok Clinic465-3.png', ' ห้อง 8230 ', ' 8 ซอย สุขุมวิท 63 แขวง พระโขนงเหนือ เขตวัฒนา กรุงเทพมหานคร 10110', 'The Horizon building, 2nd floor8', '10101024256', 'Metro Bangkok Clinic393295896.jpg', 13.721140611511268, 100.58507067340666, '1', 'เรียบร้อยดี', 'metrobangkokclinic@gmail.com', '3c4fc43abfe0acb4dea0a7512b71d6c4'),
(3, 'Home Developer', '<p>หอพักของผู้พัฒนา</p>\r\n', '0945530050', 'Home Developer-0.jpg,Home Developer-1.jpg,Home Developer-2.jpg', '528', 'ตำบล ขามเรียง อำเภอกันทรวิชัย มหาสารคาม 44150 ประเทศไทย', 'หอพักรุ่งนภา ซอยอิสระเฮ้าส์', '12345678877', 'Home Developer.jpg', 16.2509413, 103.2536445, '0', NULL, 'Home-Developer@gmail.com', 'e2bf7586bc7321c26dd3ca00bd6c90f9'),
(4, 'ISS Aesthetic & Wellness', '<p>สุขภาพความงาม ใน กรุงเทพมหานคร ประเทศไทย</p>\r\n', '0990975000', 'ISS Aesthetic & Wellness-0.png,ISS Aesthetic & Wellness-1.png,ISS Aesthetic & Wellness-2.png,ISS Aesthetic & Wellness-3.png', '388 ', 'แขวง ปทุมวัน เขตปทุมวัน กรุงเทพมหานคร 10330 ประเทศไทย', 'ซอย 3 , 6th Floor Siam Square One', '65101000459', 'ISS Aesthetic & Wellness.jpg', 13.745252348524675, 100.53390785843692, '2', 'ไม่มีแพทย์ประจำคลินิก', 'Aesthetic@gmail.com', '115982cd05ec24f26e2537471bdada46'),
(5, 'test021', '<p>testtesttest85</p>\r\n', '0945530050', 'test-0.png,test-1.png,test-2.png', '71278', 'Unnamed Road, Kham Riang อำเภอกันทรวิชัย มหาสารคาม 44150 ประเทศไทย', 'testtesttest', '12345678877', 'test.png', 16.24895499482531, 103.23920933451876, '2', 'ไม่มีแพทย์ประจำคลินิก', 'testtest@ggg.com', '05a671c66aefea124cc08b76ea6d30bb');

-- --------------------------------------------------------

--
-- Table structure for table `clinicday`
--

CREATE TABLE `clinicday` (
  `clinicDay_ID` int(1) NOT NULL,
  `clinicDay_Name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clinicDay_Time` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clinic_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clinicday`
--

INSERT INTO `clinicday` (`clinicDay_ID`, `clinicDay_Name`, `clinicDay_Time`, `clinic_ID`) VALUES
(1, 'วันจันทร์', '08.30 - 16.00 ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_ID` int(11) NOT NULL,
  `comment_Details` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment_Date` timestamp NULL DEFAULT NULL,
  `clinic_ID` int(11) DEFAULT NULL,
  `member_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_ID` int(11) NOT NULL,
  `doctor_License` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doctor_Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doctor_Surname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doctor_Image` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `doctor_Details` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `doctor_ImagePermit` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `clinic_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_ID`, `doctor_License`, `doctor_Name`, `doctor_Surname`, `doctor_Image`, `doctor_Details`, `doctor_ImagePermit`, `clinic_ID`) VALUES
(6, '14521', 'เรืองฤทธิ์', 'ศิริพานิช', 'เรืองฤทธิ์61229991999.jpg', '<p>ระดับปริญญาตรีจากคณะแพทยศาสตร์<br />\r\nมหาวิทยาลัยขอนแก่น</p>\r\n', 'เรืองฤทธิ์1483615602.jpg', 2),
(7, '45257', 'ทอแสง', 'ชโยวรรณ', 'ทอแสง7113734208.jpg', '<p>สาขา รังสีวิทยาวินิจฉัย ( Diagnostic Radiology )</p>\r\n', 'ทอแสง845239318.jpg', 2),
(15, '45251', 'เรืองฤทธิ์', 'asasasa', 'เรืองฤทธิ์-2-79.png', '<p>xdx</p>\r\n', 'asasasa1715875071.png', 2);

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
  `member_Password` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_ID`, `member_Name`, `member_Surname`, `member_Address`, `member_Phone`, `member_Image`, `member_Email`, `member_Password`) VALUES
(3, 'สุภาวดี', 'จันทร์โม้', 'หอพักรุ่งนภา', '0945530050', 'สุภาวดี1620212809.jpg', 'noon.supavadee@gmail.com', '560eacb965ec429bec49838b1d436d7d'),
(6, 'อนิตญา', 'จันทร์โม้', 'หอพักรุ่งนภา', '0945530050', 'อนิตญา1472670453.png', 'anittaya@gmail.com', '1e8ad1367ac575ac09312f09833d2880');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_ID` int(11) NOT NULL,
  `payment_Date` timestamp NULL DEFAULT NULL,
  `payment_Month` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_Year` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_Receipt` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_Note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clinic_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviews_ID` int(11) NOT NULL,
  `reviews_Name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reviews_ Description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `reviews_Image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reviews_Note` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reviews_Date` timestamp NULL DEFAULT NULL,
  `clinic_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_ID` int(11) NOT NULL,
  `service_Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_Description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_Image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_Price` float(10,2) DEFAULT NULL,
  `serviceType_ID` int(11) DEFAULT NULL,
  `clinic_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_ID`, `service_Name`, `service_Description`, `service_Image`, `service_Price`, `serviceType_ID`, `clinic_ID`) VALUES
(14, 'ร้อยไหม ', '<p>ร้อยไหมกระชับผิว</p>\r\n', '2ร้อยไหม166932973-0.png,2ร้อยไหม166932973-1.png', 1250.00, 3, 2),
(15, 'ร้อย555', '<p>aaa</p>\r\n', '2ร้อย5551667348827-0.png,2ร้อย5551667348827-1.png', 500.00, 3, 2),
(16, 'ร้อยไหมaaaaaaa', '<p>aaaaaaaaaaaaaaa</p>\r\n', '5ร้อยไหมaaaaaaa1101672686-0.png,5ร้อยไหมaaaaaaa1101672686-1.png,5ร้อยไหมaaaaaaa1101672686-2.png,5ร้อยไหมaaaaaaa1101672686-3.png', 2500.00, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `servicetype`
--

CREATE TABLE `servicetype` (
  `serviceType_ID` int(5) NOT NULL,
  `serviceType_Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `servicetype`
--

INSERT INTO `servicetype` (`serviceType_ID`, `serviceType_Name`) VALUES
(1, 'เลเซอร์กำจัดขน'),
(2, 'บริการดูแลผิวหน้า'),
(3, 'บริการร้อยไหม'),
(4, 'บริการดูแลผิว'),
(5, 'บริการฉีดโบท็อกซ์'),
(6, 'ศัลยกรรม');

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
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_ID`),
  ADD KEY `member_ID` (`member_ID`),
  ADD KEY `service_ID` (`service_ID`),
  ADD KEY `clinic_ID` (`clinic_ID`);

--
-- Indexes for table `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`clinic_ID`);

--
-- Indexes for table `clinicday`
--
ALTER TABLE `clinicday`
  ADD PRIMARY KEY (`clinicDay_ID`),
  ADD KEY `clinic_ID` (`clinic_ID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `clinic_ID` (`clinic_ID`),
  ADD KEY `member_ID` (`member_ID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_ID`),
  ADD KEY `clinic_ID` (`clinic_ID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_ID`),
  ADD KEY `clinic_ID` (`clinic_ID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviews_ID`),
  ADD KEY `clinic_ID` (`clinic_ID`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_ID`),
  ADD KEY `clinic_ID` (`clinic_ID`),
  ADD KEY `serviceType_ID` (`serviceType_ID`);

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
  MODIFY `admin_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clinic`
--
ALTER TABLE `clinic`
  MODIFY `clinic_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clinicday`
--
ALTER TABLE `clinicday`
  MODIFY `clinicDay_ID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `service_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `servicetype`
--
ALTER TABLE `servicetype`
  MODIFY `serviceType_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`member_ID`) REFERENCES `member` (`member_ID`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`service_ID`) REFERENCES `service` (`service_ID`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`clinic_ID`) REFERENCES `clinic` (`clinic_ID`);

--
-- Constraints for table `clinicday`
--
ALTER TABLE `clinicday`
  ADD CONSTRAINT `clinicday_ibfk_1` FOREIGN KEY (`clinic_ID`) REFERENCES `clinic` (`clinic_ID`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`clinic_ID`) REFERENCES `clinic` (`clinic_ID`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`member_ID`) REFERENCES `member` (`member_ID`);

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`clinic_ID`) REFERENCES `clinic` (`clinic_ID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`clinic_ID`) REFERENCES `clinic` (`clinic_ID`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`clinic_ID`) REFERENCES `clinic` (`clinic_ID`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`clinic_ID`) REFERENCES `clinic` (`clinic_ID`),
  ADD CONSTRAINT `service_ibfk_2` FOREIGN KEY (`serviceType_ID`) REFERENCES `servicetype` (`serviceType_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
