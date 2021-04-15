-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 10:08 PM
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
(8, 'เสริมหน้าอก', '<p>&nbsp; &nbsp; &nbsp; คนที่มีหน้าอกใหญ่ก็ดีไป แต่หน้าอกเล็กนี่สิ คิดหนัก! แต่สมัยนี้การเสริมหน้าอกให้อวบอิ่มสมส่วน ไม่ใช่ปัญหาอีกต่อไป ไม่ว่าจะอกเล็ก อกไข่ดาวขนาดไหนก็ช่วยได้ ปัจจุบันการเสริมหน้าอกมีหลากหลายวิธี เช่น การเสริมด้วยซิลิโคน การเสริมด้วยการฉีดไขมันตัวเอง เป็นต้น</p>\r\n\r\n<p><strong>รู้มั้ยซิลิโคนเสริม &ldquo;น้องนม&rdquo; มีกี่แบบ</strong></p>\r\n\r\n<p>ซิลิโคนเสริมหน้าอกมี 2 แบบ คือ&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ซิลิโคนทรงกลม เหมาะกับคนที่ต้องการเสริมหน้าอกโดยทั่วไป เสริมขนาดใหญ่ หรือเสริมให้เนื้อหน้าอกบริเวณด้านบนดูอวบอิ่ม ซึ่งซิลิโคนทรงกลมมีขนาดหลากหลายทั้งทรงพุ่งมากและทรงพุ่งน้อย อีกทั้งยังมีความนุ่มและขอบที่โค้งมนเข้ารูป เมื่อเสริมแล้วความรู้สึกสัมผัสบริเวณเต้านมจะนิ่มเป็นธรรมชาติ</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ซิลิโคนทรงหยดน้ำ เหมาะกับคนที่ไม่ต้องการทำหน้าอกที่ใหญ่มาก แค่อยากให้ดูเป็นธรรมชาติ หรือคนที่หน้าอกหย่อนคล้อยเล็กน้อยหรือปานกลางจะช่วยให้เต้านมเชิดขึ้นได้ เนื่องจากซิลิโคนทรงหยดน้ำเป็นทรงที่ถูกออกแบบมาให้เลียนแบบเต้านมตามธรรมชาติที่มีลักษณะคล้ายหยดน้ำ บริเวณส่วนล่างจะใหญ่กว่าส่วนบน หลังเสริมจึงทำให้ดูเป็นธรรมชาติ</p>\r\n', '424063493.jpg', '2021-03-30 14:27:01'),
(9, 'การร้อยไหม THREAD LIFT คืออะไร?', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&ldquo;การร้อยไหม&rdquo; เป็นอีกหนึ่งวิธีที่ใช้ในการยกกระชับผิว และก็ยังเป็นที่นิยมอยู่ในปัจจุบัน ส่วนใหญ่การร้อยไหม จะแก้ปัญหาในเรื่องการหย่อนคล้อย ยกกระชับให้ใบหน้าดูเด็กลง เนื่องจากความหย่อนคล้อยเป็นสาเหตุให้ใบหน้าดูมีอายุ</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;เราสามารถร้อยได้ทุกส่วนของใบหน้าของเรา อาทิ ร่องแก้ม ร่องน้ำหมาก แก้มที่หย่อนคล้อย หน้าผาก เป็นต้น แต่ว่าตำแหน่งของหน้าผากจะร้อยน้อยกว่า เนื่องจากว่าจะมีผลในเรื่องการบวมเขียวช้ำ ฟกช้ำ ซึ่งการร้อยไหม เมื่อไหมถูกร้อยเข้าไปที่บริเวณใบหน้า การทำเช่นนี้จะส่งผลให้เกิดการอักเสบของเนื้อเยื่อใต้ผิวและมีการสร้างคอลลาเจนขึ้นมาใหม่บริเวณรอบเส้นไหม ทำให้ผิวหน้าถูกดึงรั้งจนเต่งตึง ทั้งยังช่วยให้เลือดไหลเวียนมาเลี้ยงผิวหนังบริเวณดังกล่าวมากขึ้น ทำให้เราดูอ่อนเยาว์มากขึ้น เนื่องจากมีการยกกระชับบริเวณใบหน้า</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ไหมที่นิยมใช้กันมาก และมีส่วนช่วยในการฟื้นฟูผิวให้ดูเปล่งปลั่ง รวมถึงมีคอลลาเจน คือไหมละลาย PDO ทำจากโพลีไดออกซาโนน (Polydioxanone) ซึ่งใช้ในการเย็บแผลผ่าตัดเส้นเลือดหัวใจ มักไม่ก่อให้เกิดอาการแพ้ และได้รับการรับรองความปลอดภัยจากสำนักงานคณะกรรมการอาหารและยา (อย.) และไม่ต้องเป็นกังวลว่าเส้นไหมเหล่านี้จะติดอยู่ใต้ผิวหนัง เพราะไหมจะค่อยๆ สลายตัวไปเองภายใน 8เดือน</p>\r\n', '359451325.jpg', '2021-03-30 14:31:25');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_ID` int(11) NOT NULL,
  `booking_Date` date DEFAULT NULL,
  `booking_Time` time DEFAULT NULL,
  `booking_Note` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `booking_Statu` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_ID` int(11) DEFAULT NULL,
  `service_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_ID`, `booking_Date`, `booking_Time`, `booking_Note`, `booking_Statu`, `member_ID`, `service_ID`) VALUES
(1, '2021-04-05', '08:00:00', '', '0', 3, 17),
(2, '2021-04-23', '12:00:00', ' การจองของคุณได้รับการอนุมัติค่ะ  Update: 2021-04-06 01:27:00', '1', 3, 15),
(3, '2021-04-23', '14:00:00', 'เต็มค่ะ  Update: 2021-04-06 01:28:38', '2', 3, 15),
(4, '2021-04-12', '08:00:00', NULL, '0', 3, 17),
(5, '2021-04-05', '09:30:00', ' การจองของคุณได้รับการอนุมัติค่ะ  Update: 2021-04-07 12:47:42', '1', 3, 15),
(6, '2021-04-09', '09:15:00', NULL, '2', 3, 14),
(7, '2021-04-09', '10:00:00', '   Update: 2021-04-08 12:25:41', '2', 3, 14);

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
  `clinic_Password` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clinic_Views` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`clinic_ID`, `clinic_Name`, `clinic_Detail`, `clinic_Phone`, `clinic_Image`, `clinic_NumAddress`, `clinic_Address_GPS`, `clinic_Address_Detil`, `clinic_NumberPermit`, `clinic_ImagePermit`, `latitude`, `longitude`, `Status`, `Status_Note`, `clinic_Email`, `clinic_Password`, `clinic_Views`) VALUES
(1, 'ลาเดอมา คลินิก Art & Surgery', '<p>ความงามคือ ศิลปะ + ความรู้ทางการแพทย์</p>\r\n', '0854511242', 'ลาเดอมา คลินิก Art & Surgery-0.jpg,ลาเดอมา คลินิก Art & Surgery-1.jpg,ลาเดอมา คลินิก Art & Surgery-2.jpg,ลาเดอมา คลินิก Art & Surgery-3.jpg', '571/5', 'ตำบลท่าขอนยาง อำเภอกันทรวิชัย มหาสารคาม ประเทศไทย 44150', '', '44101000555', 'ลาเดอมา คลินิก Art & Surgery.jpg', 16.236319328312625, 103.26254189014435, '1', 'ไม่มีแพทย์ประจำคลินิก', 'LE-DERMA-CLINIC@gmail.com', '6da9327a5c082edfd3957c073733b7b1', 4),
(2, 'Metro Bangkok Clinic', '<p>เมโทรบางกอกคลินิกเป็นหนึ่งในศูนย์ออกแบบความงามชั้นนำในประเทศไทยศูนย์นี้มีพนักงานและดูแลโดยแพทย์ผู้เชี่ยวชาญด้านวิทยาศาสตร์และความงามขั้นสูงเราเชี่ยวชาญในการเสริมความงามแบบครบวงจรโดยใช้อุปกรณ์ทางการแพทย์ขั้นสูงเทคโนโลยีที่ทันสมัย และรักษามาตรฐานสูงสุดในการดูแลเรานำเสนอเทคโนโลยีที่ปลอดภัยและล้ำสมัยที่สุดจากอเมริกาซึ่งได้รับการรับรองจากองค์การอาหารและยา (FDA USA KDFA KGPM) เราให้ความสำคัญกับลูกค้าของเราและทำงานอย่างใกล้ชิดกับพวกเขาเพื่อปรับแต่งการรักษาตาม ตามความต้องการของพวกเขา<br />\r\n&nbsp;</p>\r\n', '0945530050', 'Metro Bangkok Clinic465-0.png,Metro Bangkok Clinic465-1.png,Metro Bangkok Clinic465-2.png,Metro Bangkok Clinic465-3.png', ' ห้อง 8230 ', ' 8 ซอย สุขุมวิท 63 แขวง พระโขนงเหนือ เขตวัฒนา กรุงเทพมหานคร 10110', 'The Horizon building, 2nd floor8', '10101024256', 'Metro Bangkok Clinic393295896.jpg', 13.721140611511268, 100.58507067340666, '1', 'เรียบร้อยดี', 'metrobangkokclinic@gmail.com', '3c4fc43abfe0acb4dea0a7512b71d6c4', 56),
(3, 'Home Developer', '<p>หอพักของผู้พัฒนา</p>\r\n', '0945530050', 'Home Developer-0.jpg,Home Developer-1.jpg,Home Developer-2.jpg', '528', 'ตำบล ขามเรียง อำเภอกันทรวิชัย มหาสารคาม 44150 ประเทศไทย', 'หอพักรุ่งนภา ซอยอิสระเฮ้าส์', '12345678877', 'Home Developer.jpg', 16.2509413, 103.2536445, '0', NULL, 'Home-Developer@gmail.com', 'e2bf7586bc7321c26dd3ca00bd6c90f9', NULL),
(4, 'ISS Aesthetic & Wellness', '<p>สุขภาพความงาม ใน กรุงเทพมหานคร ประเทศไทย</p>\r\n', '0945530050', 'ISS Aesthetic & Wellness-0.png,ISS Aesthetic & Wellness-1.png,ISS Aesthetic & Wellness-2.png,ISS Aesthetic & Wellness-3.png', '388 ', 'แขวง ปทุมวัน เขตปทุมวัน กรุงเทพมหานคร 10330 ประเทศไทย', 'ซอย 3 , 6th Floor Siam Square One', '65101000459', 'ISS Aesthetic & Wellness.jpg', 13.745252348524675, 100.53390785843692, '1', 'ไม่มีแพทย์ประจำคลินิก', 'Aesthetic@gmail.com', '115982cd05ec24f26e2537471bdada46', 136),
(5, 'test021', '<p>testtesttest85</p>\r\n', '0945530050', 'test-0.png,test-1.png,test-2.png', '71278', 'Unnamed Road, Kham Riang อำเภอกันทรวิชัย มหาสารคาม 44150 ประเทศไทย', 'testtesttest', '12345678877', 'test.png', 16.24895499482531, 103.23920933451876, '2', 'ไม่มีแพทย์ประจำคลินิก', 'testtest@ggg.com', '05a671c66aefea124cc08b76ea6d30bb', NULL),
(8, '11', '<p>11</p>\r\n', '1111111111', '', '11', 'ตำบล ขามเรียง อำเภอกันทรวิชัย มหาสารคาม 44150 ประเทศไทย', '', '11111111111', '11.jpg', 16.2509646, 103.2536522, '0', NULL, '11@ddd.com', '6512bd43d9caa6e02c990b0a82652dca', NULL),
(9, '11', '<p>11</p>\r\n', '1111111111', '11-0.jpg,11-1.jpg', '11', 'ตำบล ขามเรียง อำเภอกันทรวิชัย มหาสารคาม 44150 ประเทศไทย', '', '11111111111', '11.jpg', 16.2509646, 103.2536522, '0', NULL, '1111@ddd.com', 'b0baee9d279d34fa1dfd71aadb908c3f', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clinicday`
--

CREATE TABLE `clinicday` (
  `clinicDay_ID` int(1) NOT NULL,
  `clinicDay_Name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clinicDay_Start` time DEFAULT NULL,
  `clinicDay_End` time DEFAULT NULL,
  `clinic_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clinicday`
--

INSERT INTO `clinicday` (`clinicDay_ID`, `clinicDay_Name`, `clinicDay_Start`, `clinicDay_End`, `clinic_ID`) VALUES
(4, 'Mon', '09:00:00', '19:00:00', 2),
(5, 'Tue', '07:00:00', '19:00:00', 2),
(7, 'Fri', '09:00:00', '12:00:00', 2),
(8, 'Wed', '09:00:00', '20:00:00', 2),
(9, 'Thu', '09:00:00', '19:00:00', 2),
(10, 'Sat', '09:00:00', '12:00:00', 2),
(14, 'Mon', '08:30:00', '19:00:00', 5),
(15, 'Mon', '08:30:00', '18:30:00', 1),
(16, 'Mon', '08:00:00', '19:00:00', 4),
(17, 'Tue', '09:00:00', '19:00:00', 4),
(18, 'Thu', '09:00:00', '19:00:00', 4),
(19, 'Fri', '09:00:00', '19:00:00', 4),
(20, 'Sat', '09:00:00', '20:00:00', 4),
(21, 'Sun', '08:00:00', '20:00:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_ID` int(11) NOT NULL,
  `ref_clinic_ID` int(11) DEFAULT NULL,
  `comment_Details` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment_Date` timestamp NULL DEFAULT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `user_Status` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_ID`, `ref_clinic_ID`, `comment_Details`, `comment_Date`, `user_ID`, `user_Status`) VALUES
(1, 4, 'ร้านสวยมากๆ', '2021-04-08 19:06:27', 3, 'Member'),
(2, 4, 'ขอบคุณค่ะ', '2021-04-08 18:24:59', 4, 'Clinic'),
(10, 2, 'คือดีมากกกก', '2021-04-08 20:00:26', 3, 'Member'),
(11, 4, 'ดเดเกดเกดเหก', '2021-04-08 20:03:34', 4, 'Clinic');

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
(19, '45251', 'เรืองฤทธิ์', 'กิจพานิช', 'เรืองฤทธิ์-2-69.png', '<p>aa</p>\r\n', 'กิจพานิช1234574368.png', 2);

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
(6, 'อนิตญา', 'จันทร์โม้', 'หอพักรุ่งนภา', '0945530050', 'อนิตญา1472670453.png', 'anittaya@gmail.com', '1e8ad1367ac575ac09312f09833d2880'),
(7, 'ทิฟฟานี่ ', 'จันทร์โม้', 'หอพักรุ่งนภา', '0945530050', 'ทิฟฟานี่ จันทร์โม้862723044.png', 'noon@gmail.com', '630196c27ae023d0c2377afad332e13b');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_ID` int(11) NOT NULL,
  `payment_Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_Date` date DEFAULT NULL,
  `payment_Time` time DEFAULT NULL,
  `payment_Receipt` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_Note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_Status` int(2) DEFAULT NULL,
  `clinic_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_ID`, `payment_Name`, `payment_Date`, `payment_Time`, `payment_Receipt`, `payment_Note`, `payment_Status`, `clinic_ID`) VALUES
(1, NULL, '2021-04-08', '09:55:06', '4.JPG', '', 1, 4),
(2, NULL, '2021-04-08', '09:57:37', 'ID-4-ISS Aesthetic & Wellness-793.JPG', '', 1, 4),
(3, 'สุภาวดี จันทร์โม้', '2021-04-08', '10:58:47', 'ID-2-Metro Bangkok Clinic-809.JPG', '', 1, 2),
(4, 'สุภาวดี', '2021-04-08', '16:10:15', 'clinicID-4-454.JPG', '', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviews_ID` int(11) NOT NULL,
  `reviews_Name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reviews_Description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `reviews_Image` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `reviews_Note` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reviews_Date` timestamp NULL DEFAULT NULL,
  `clinic_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviews_ID`, `reviews_Name`, `reviews_Description`, `reviews_Image`, `reviews_Note`, `reviews_Date`, `clinic_ID`) VALUES
(4, 'ร้อยไหมก้างปลา', '<p><strong>ร้อยไหมก้างปลา&nbsp;</strong>(Aptos Threads) ซึ่งลักษณะของไหมก้างปลาก็จะคล้าย ๆ กับชื่อ มีเงี่ยงโผล่ออกมาเหมือนก้างปลาทั้งสองข้าง เป็นไหมชนิดที่ไม่ละลาย เวลาร้อยเข้าไปบริเวณใต้ผิวหนัง เงี่ยงของไหมก้างปลาก็จะเกี่ยวพยุงเนื้อเยื่อของใบหน้าเอาไว้เพื่อยกกระชับผิวหน้าไม่ให้ย้อยตกลงมา ซึ่งการร้อยไหมก้างปลานั้นสามารถทำได้ทั้งหญิงและชาย&nbsp;</p>\r\n', '2ร้อยไหมก้างปลา-0.jpg,2ร้อยไหมก้างปลา-1.jpg,2ร้อยไหมก้างปลา-2.jpg', '-', '2021-03-30 14:18:49', 2);

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
(14, 'ร้อยไหม ', '<p>ร้อยไหมกระชับผิว</p>\r\n', '2-ร้อยไหม 319-0.png,2-ร้อยไหม 319-1.png', 1250.00, 3, 2),
(15, 'ร้อย555', '<p>aaa</p>\r\n', '2ร้อย5551667348827-0.png,2ร้อย5551667348827-1.png', 500.00, 3, 2),
(16, 'ร้อยไหมaaaaaaa', '<p>aaaaaaaaaaaaaaa</p>\r\n', '5ร้อยไหมaaaaaaa1101672686-0.png,5ร้อยไหมaaaaaaa1101672686-1.png,5ร้อยไหมaaaaaaa1101672686-2.png,5ร้อยไหมaaaaaaa1101672686-3.png', 2500.00, 3, 5),
(17, 'Bio Light Therapy', '<p>การอบแสงบริเวณใบหน้าเพื่อลดการอักเสบที่เกิดจากสิว ฆ่าเชื้อสิวด้วยแสงบลูไลท์และการบำบัดผิวด้วยแสงเพื่อให้หน้ากระจ่างใส</p>\r\n', '1-Bio Light Therapy853-0.png,1-Bio Light Therapy853-1.png', 500.00, 2, 1);

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
  ADD KEY `service_ID` (`service_ID`);

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
  ADD KEY `ref_clinic_ID` (`ref_clinic_ID`);

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
  MODIFY `article_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clinic`
--
ALTER TABLE `clinic`
  MODIFY `clinic_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `clinicday`
--
ALTER TABLE `clinicday`
  MODIFY `clinicDay_ID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviews_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`service_ID`) REFERENCES `service` (`service_ID`);

--
-- Constraints for table `clinicday`
--
ALTER TABLE `clinicday`
  ADD CONSTRAINT `clinicday_ibfk_1` FOREIGN KEY (`clinic_ID`) REFERENCES `clinic` (`clinic_ID`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`ref_clinic_ID`) REFERENCES `clinic` (`clinic_ID`);

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
