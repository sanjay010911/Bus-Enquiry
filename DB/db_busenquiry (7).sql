-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2022 at 06:13 AM
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
-- Database: `db_busenquiry`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_mail` varchar(30) NOT NULL,
  `admin_pass` varchar(50) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_mail`, `admin_pass`, `admin_id`, `admin_name`) VALUES
('admin@gmail.com', 'admin', 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_busdetails`
--

CREATE TABLE `tbl_busdetails` (
  `bus_id` int(11) NOT NULL,
  `bus_name` varchar(30) NOT NULL,
  `bus_regno` varchar(40) NOT NULL,
  `bus_photo` varchar(100) NOT NULL,
  `bus_status` int(11) NOT NULL,
  `bus_insno` int(11) NOT NULL,
  `bus_capacity` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `bustype_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_busdetails`
--

INSERT INTO `tbl_busdetails` (`bus_id`, `bus_name`, `bus_regno`, `bus_photo`, `bus_status`, `bus_insno`, `bus_capacity`, `owner_id`, `route_id`, `bustype_id`) VALUES
(10, 'Grace', '2235353453', 'bus.jfif', 1, 2147483647, 60, 8, 8, 4),
(11, 'NMS', '568485', 'bus.jfif', 1, 38495349, 40, 13, 9, 4),
(13, 'OMS', '934587935923', 'bus.jfif', 1, 2147483647, 50, 15, 10, 3),
(14, 'Jesus', '534535346343', 'bus1.jpg', 1, 345353433, 30, 8, 8, 4),
(15, 'ABS', '6456246436234', 'bus1.jpg', 1, 2147483647, 50, 9, 17, 2),
(16, 'TVS', '6436436346', 'bus.jfif', 1, 25353453, 40, 9, 16, 4),
(17, 'GVS', '867867', 'bus.jfif', 1, 3423423, 60, 9, 18, 4),
(18, 'BBS', '4345345', 'bus.jfif', 1, 4534534, 40, 9, 19, 3),
(19, 'ABC', '4645735473', 'bus.jfif', 1, 2147483647, 33, 13, 14, 4),
(20, 'Komban', '987654', 'bus.jfif', 1, 456556, 56, 13, 15, 4),
(22, 'Lexus', '75463464', 'bus.jfif', 1, 685745745, 45, 14, 15, 4),
(23, 'Peter', '67456563', 'bus.jfif', 1, 5646346, 55, 14, 11, 4),
(24, 'KVG', '8765', 'bus.jfif', 1, 3553463, 50, 15, 12, 2),
(25, 'DDS', '564634634', 'bus.jfif', 1, 453453463, 50, 15, 13, 2),
(26, 'BMS', '5754745', 'bus.jfif', 1, 46456454, 45, 15, 20, 4),
(27, 'Rojan', '564575477', 'bus.jfif', 1, 567865745, 45, 8, 21, 4),
(28, 'Alvin', '77564363', 'bus.jfif', 1, 2147483647, 50, 8, 22, 4),
(29, 'Sajan', '7545675', 'bus.jfif', 1, 4364574, 45, 13, 23, 2),
(30, 'Johnson', '685747', 'bus.jfif', 1, 4534645, 44, 14, 24, 4),
(31, 'KMS', '7575685', 'bus.jfif', 1, 46364754, 50, 14, 25, 4),
(32, 'KMP', '546456456', 'bus.jfif', 1, 4634634, 50, 15, 26, 4),
(33, 'MBMS', '675457', 'bus.jfif', 1, 457457474, 30, 8, 14, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_busowner`
--

CREATE TABLE `tbl_busowner` (
  `owner_id` int(11) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `owner_gender` varchar(8) NOT NULL,
  `owner_mail` varchar(40) NOT NULL,
  `owner_pass` varchar(50) NOT NULL,
  `owner_licenseno` varchar(50) NOT NULL,
  `owner_contact` varchar(50) NOT NULL,
  `owner_aadharno` varchar(20) NOT NULL,
  `owner_photo` varchar(100) NOT NULL,
  `owner_status` int(11) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_busowner`
--

INSERT INTO `tbl_busowner` (`owner_id`, `owner_name`, `owner_gender`, `owner_mail`, `owner_pass`, `owner_licenseno`, `owner_contact`, `owner_aadharno`, `owner_photo`, `owner_status`, `place_id`) VALUES
(8, 'Sanjay Benoy', 'MALE', 'sanjaybenoy123@gmail.com', 'Sanjay123', '3453464', '4385783829', '143243240987', 'james.jpg', 1, 32),
(9, 'Nirmal Niketh', 'MALE', 'nirmalniketh1234@gmail.com', '1234', '87326643', '255724676', '443253443', 'nirmal.jpg', 1, 36),
(13, 'Basil Reji', 'MALE', 'basilpattullil@gmail.com', '1234', '438946349', '4534634342', '956954745459', 'basil.jpg', 1, 52),
(14, 'Anandhu Anilkumar', 'MALE', 'kuttuanandhu610@gmail.com', '1234', '234234235646', '8281855976', '4375347538457', 'anandhu.jpg', 1, 52),
(15, 'Jithin Thomas', 'MALE', 'jithinthomasakm@gmail.com', '1234', '95435782733', '4587465832', '84934658325764', '1.jpg', 1, 50),
(16, 'Varghese ', 'MALE', 'vargheseproy254@gmail.com', '1234', '46366346', '7559012043', '5678658', 'varghese.jpg', 0, 52);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_busrate`
--

CREATE TABLE `tbl_busrate` (
  `busrate_id` int(11) NOT NULL,
  `bustype_id` int(11) NOT NULL,
  `busrate_minrate` int(11) NOT NULL,
  `busrate_minkm` int(11) NOT NULL,
  `busrate_addrate` int(11) NOT NULL,
  `busrate_addkm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_busrate`
--

INSERT INTO `tbl_busrate` (`busrate_id`, `bustype_id`, `busrate_minrate`, `busrate_minkm`, `busrate_addrate`, `busrate_addkm`) VALUES
(2, 2, 15, 10, 10, 5),
(3, 3, 20, 10, 15, 10),
(4, 4, 8, 2, 8, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bustiming`
--

CREATE TABLE `tbl_bustiming` (
  `bustime_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `routestop_id` int(11) NOT NULL,
  `bus_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bustiming`
--

INSERT INTO `tbl_bustiming` (`bustime_id`, `bus_id`, `routestop_id`, `bus_time`) VALUES
(2, 4, 19, '14:00:00'),
(3, 5, 21, '08:30:00'),
(4, 7, 25, '09:00:00'),
(5, 7, 27, '10:00:00'),
(6, 4, 19, '10:32:00'),
(7, 10, 40, '06:05:00'),
(8, 10, 41, '06:30:00'),
(9, 10, 42, '06:45:00'),
(10, 10, 43, '07:00:00'),
(11, 10, 44, '07:15:00'),
(12, 10, 45, '07:30:00'),
(13, 10, 46, '07:40:00'),
(14, 10, 47, '08:10:00'),
(15, 10, 48, '08:15:00'),
(16, 10, 49, '08:20:00'),
(31, 14, 40, '08:30:00'),
(32, 14, 41, '08:41:00'),
(33, 14, 42, '08:50:00'),
(34, 14, 43, '09:00:00'),
(35, 14, 44, '09:05:00'),
(36, 14, 45, '09:10:00'),
(37, 14, 46, '09:16:00'),
(38, 14, 47, '09:30:00'),
(39, 14, 48, '09:40:00'),
(40, 14, 49, '09:50:00'),
(41, 11, 50, '13:00:00'),
(43, 11, 51, '13:10:00'),
(44, 11, 53, '13:15:00'),
(45, 11, 54, '13:30:00'),
(46, 11, 55, '13:35:00'),
(47, 11, 56, '13:40:00'),
(49, 11, 57, '13:45:00'),
(51, 11, 58, '13:50:00'),
(52, 11, 59, '13:55:00'),
(53, 11, 60, '14:00:00'),
(54, 13, 90, '07:30:00'),
(55, 13, 100, '07:40:00'),
(56, 13, 101, '08:00:00'),
(57, 13, 102, '08:15:00'),
(58, 13, 103, '08:30:00'),
(59, 13, 107, '08:35:00'),
(60, 13, 104, '08:45:00'),
(61, 13, 105, '08:55:00'),
(62, 13, 106, '09:00:00'),
(64, 23, 0, '07:40:00'),
(66, 23, 77, '08:00:00'),
(67, 23, 78, '08:15:00'),
(68, 23, 81, '08:40:00'),
(69, 23, 82, '09:00:00'),
(70, 23, 83, '09:10:00'),
(71, 23, 84, '09:30:00'),
(72, 23, 85, '09:35:00'),
(73, 23, 86, '09:45:00'),
(74, 23, 87, '09:55:00'),
(75, 23, 89, '10:05:00'),
(76, 24, 116, '13:00:00'),
(77, 24, 117, '13:15:00'),
(78, 24, 118, '13:30:00'),
(79, 24, 119, '13:35:00'),
(80, 24, 120, '13:50:00'),
(81, 24, 121, '14:20:00'),
(82, 24, 122, '14:35:00'),
(83, 24, 123, '14:40:00'),
(84, 25, 188, '08:00:00'),
(85, 25, 124, '08:10:00'),
(86, 25, 125, '08:20:00'),
(87, 25, 126, '08:30:00'),
(88, 25, 127, '08:40:00'),
(89, 25, 128, '09:00:00'),
(90, 25, 129, '09:15:00'),
(91, 25, 130, '09:30:00'),
(92, 19, 91, '07:00:00'),
(93, 19, 92, '07:15:00'),
(94, 19, 93, '07:30:00'),
(95, 19, 94, '07:40:00'),
(96, 19, 95, '07:45:00'),
(97, 19, 97, '07:55:00'),
(98, 19, 96, '08:10:00'),
(99, 19, 98, '08:25:00'),
(100, 19, 99, '08:35:00'),
(101, 33, 91, '13:00:00'),
(102, 33, 92, '13:15:00'),
(103, 33, 93, '13:30:00'),
(104, 33, 94, '13:40:00'),
(105, 33, 95, '13:45:00'),
(106, 33, 97, '13:55:00'),
(107, 33, 96, '14:10:00'),
(108, 33, 98, '14:25:00'),
(109, 33, 99, '14:35:00'),
(110, 20, 108, '15:00:00'),
(111, 20, 109, '15:10:00'),
(112, 20, 110, '15:16:00'),
(113, 20, 111, '15:30:00'),
(114, 20, 112, '15:35:00'),
(115, 20, 113, '15:51:00'),
(116, 20, 114, '16:00:00'),
(117, 20, 115, '16:10:00'),
(118, 22, 108, '10:00:00'),
(119, 22, 109, '10:10:00'),
(120, 22, 110, '10:16:00'),
(121, 22, 111, '10:30:00'),
(122, 22, 112, '10:35:00'),
(123, 22, 113, '10:51:00'),
(124, 22, 114, '11:00:00'),
(125, 22, 115, '11:10:00'),
(126, 16, 189, '08:00:00'),
(127, 16, 131, '08:06:00'),
(128, 16, 132, '08:19:00'),
(129, 16, 133, '08:30:00'),
(130, 16, 134, '08:36:00'),
(131, 16, 135, '08:45:00'),
(132, 15, 136, '09:00:00'),
(133, 15, 137, '09:11:00'),
(134, 15, 138, '09:15:00'),
(135, 15, 139, '09:20:00'),
(136, 17, 140, '10:00:00'),
(137, 17, 141, '10:10:00'),
(138, 17, 142, '10:24:00'),
(139, 17, 143, '10:35:00'),
(140, 17, 144, '10:45:00'),
(141, 18, 145, '14:00:00'),
(142, 18, 190, '14:10:00'),
(143, 18, 146, '14:35:00'),
(144, 18, 147, '14:40:00'),
(145, 18, 148, '14:50:00'),
(146, 18, 149, '15:00:00'),
(147, 26, 150, '08:00:00'),
(148, 26, 151, '08:10:00'),
(149, 26, 152, '08:20:00'),
(150, 26, 153, '08:30:00'),
(153, 27, 156, '10:20:00'),
(154, 27, 191, '09:00:00'),
(155, 27, 192, '09:05:00'),
(156, 27, 193, '09:15:00'),
(157, 27, 195, '09:20:00'),
(158, 27, 194, '09:25:00'),
(159, 28, 160, '13:00:00'),
(160, 28, 161, '13:05:00'),
(161, 28, 162, '13:15:00'),
(164, 28, 163, '13:20:00'),
(165, 28, 165, '13:25:00'),
(166, 29, 166, '12:00:00'),
(167, 29, 167, '12:10:00'),
(168, 29, 168, '12:20:00'),
(169, 29, 169, '12:25:00'),
(170, 29, 170, '12:40:00'),
(171, 30, 172, '15:00:00'),
(172, 30, 173, '15:05:00'),
(173, 30, 174, '15:15:00'),
(174, 30, 175, '15:25:00'),
(175, 31, 177, '08:00:00'),
(176, 31, 178, '08:05:00'),
(177, 31, 179, '08:10:00'),
(178, 31, 180, '08:15:00'),
(179, 31, 181, '08:30:00'),
(180, 32, 182, '09:00:00'),
(181, 32, 183, '09:05:00'),
(182, 32, 184, '09:15:00'),
(183, 32, 185, '09:25:00'),
(184, 32, 186, '09:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bustype`
--

CREATE TABLE `tbl_bustype` (
  `bustype_id` int(11) NOT NULL,
  `bustype_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bustype`
--

INSERT INTO `tbl_bustype` (`bustype_id`, `bustype_name`) VALUES
(2, 'SUPER FAST PASSENGER'),
(3, 'LIMITED STOP'),
(4, 'FAST PASSENGER');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'electronics');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cnclbus`
--

CREATE TABLE `tbl_cnclbus` (
  `cncl_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `cncl_reason` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cnclbus`
--

INSERT INTO `tbl_cnclbus` (`cncl_id`, `bus_id`, `cncl_reason`) VALUES
(8, 12, 'low profit');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_content` varchar(5000) NOT NULL,
  `ctype_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `complaint_date` date NOT NULL DEFAULT current_timestamp(),
  `complaint_reply` varchar(5020) NOT NULL,
  `complaint_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `complaint_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_content`, `ctype_id`, `user_id`, `complaint_date`, `complaint_reply`, `complaint_id`, `bus_id`, `complaint_status`) VALUES
('The seats of this bus is very worse and are completely damaged', 1, 23, '2022-10-30', 'The seats have been changed....', 2, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaintype`
--

CREATE TABLE `tbl_complaintype` (
  `ctype_id` int(11) NOT NULL,
  `ctype_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaintype`
--

INSERT INTO `tbl_complaintype` (`ctype_id`, `ctype_name`) VALUES
(1, 'Less Comfort'),
(2, 'Bad Seats'),
(3, 'Irregular Timings');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dailycollection`
--

CREATE TABLE `tbl_dailycollection` (
  `collec_id` int(11) NOT NULL,
  `collec_date` date NOT NULL,
  `bus_id` int(11) NOT NULL,
  `collec_amt` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dailycollection`
--

INSERT INTO `tbl_dailycollection` (`collec_id`, `collec_date`, `bus_id`, `collec_amt`) VALUES
(10, '2022-10-01', 4, '5000'),
(11, '2022-10-01', 5, '4500'),
(12, '2022-10-01', 6, '5000'),
(13, '2022-10-01', 7, '5006'),
(14, '2022-10-01', 10, '6006'),
(15, '2022-10-02', 4, '4500'),
(16, '2022-10-02', 5, '4500'),
(17, '2022-10-02', 6, '5000'),
(18, '2022-10-02', 7, '5006'),
(19, '2022-10-02', 10, '6006'),
(20, '2022-10-03', 4, '4500'),
(21, '2022-10-03', 5, '4500'),
(22, '2022-10-03', 6, '5000'),
(23, '2022-10-03', 7, '5006'),
(24, '2022-10-03', 10, '6006'),
(25, '2022-10-04', 4, '4500'),
(26, '2022-10-04', 5, '4500'),
(27, '2022-10-04', 6, '5000'),
(28, '2022-10-04', 7, '5006'),
(29, '2022-10-04', 10, '6006'),
(30, '2022-10-05', 4, '4500'),
(31, '2022-10-05', 5, '4500'),
(32, '2022-10-05', 6, '5000'),
(33, '2022-10-05', 7, '5006'),
(34, '2022-10-05', 10, '6006'),
(35, '2022-10-06', 4, '4500'),
(36, '2022-10-06', 5, '4500'),
(37, '2022-10-06', 6, '5000'),
(38, '2022-10-06', 7, '5006'),
(39, '2022-10-06', 10, '6006'),
(40, '2022-10-07', 4, '4500'),
(41, '2022-10-07', 5, '4500'),
(42, '2022-10-07', 6, '5000'),
(43, '2022-10-07', 7, '5006'),
(44, '2022-10-07', 10, '6006'),
(45, '2022-10-08', 4, '4500'),
(46, '2022-10-08', 5, '4500'),
(47, '2022-10-08', 6, '5000'),
(48, '2022-10-08', 7, '5006'),
(49, '2022-10-08', 10, '6006'),
(50, '2022-10-09', 4, '4500'),
(51, '2022-10-09', 5, '4500'),
(52, '2022-10-09', 6, '5000'),
(53, '2022-10-09', 7, '5006'),
(54, '2022-10-09', 10, '6006'),
(55, '2022-10-10', 4, '4500'),
(56, '2022-10-10', 5, '4500'),
(57, '2022-10-10', 6, '5000'),
(58, '2022-10-10', 7, '5006'),
(59, '2022-10-10', 10, '6006'),
(60, '2022-10-11', 4, '4500'),
(61, '2022-10-11', 5, '4500'),
(62, '2022-10-11', 6, '5000'),
(63, '2022-10-11', 7, '5006'),
(64, '2022-10-11', 10, '6006'),
(65, '2022-10-12', 4, '4500'),
(66, '2022-10-12', 5, '4500'),
(67, '2022-10-12', 6, '5000'),
(68, '2022-10-12', 7, '5006'),
(69, '2022-10-12', 10, '6006'),
(70, '2022-10-13', 4, '4500'),
(71, '2022-10-13', 5, '4500'),
(72, '2022-10-13', 6, '5000'),
(73, '2022-10-13', 7, '5006'),
(74, '2022-10-13', 10, '6006'),
(75, '2022-10-14', 4, '4500'),
(76, '2022-10-14', 5, '4500'),
(77, '2022-10-14', 6, '5000'),
(78, '2022-10-14', 7, '5006'),
(79, '2022-10-14', 10, '6006'),
(80, '2022-10-15', 4, '4500'),
(81, '2022-10-15', 5, '4500'),
(82, '2022-10-15', 6, '5000'),
(83, '2022-10-15', 7, '5006'),
(84, '2022-10-15', 10, '6006'),
(85, '2022-10-16', 4, '4500'),
(86, '2022-10-16', 5, '4500'),
(87, '2022-10-16', 6, '5000'),
(88, '2022-10-16', 7, '5006'),
(89, '2022-10-16', 10, '6006'),
(90, '2022-10-17', 4, '4500'),
(91, '2022-10-17', 5, '4500'),
(92, '2022-10-17', 6, '5000'),
(93, '2022-10-17', 7, '5006'),
(94, '2022-10-17', 10, '6006'),
(95, '2022-10-18', 4, '4500'),
(96, '2022-10-18', 5, '4500'),
(97, '2022-10-18', 6, '5000'),
(98, '2022-10-18', 7, '5006'),
(99, '2022-10-18', 10, '6006'),
(100, '2022-10-19', 4, '4500'),
(101, '2022-10-19', 5, '4500'),
(102, '2022-10-19', 6, '5000'),
(103, '2022-10-19', 7, '5006'),
(104, '2022-10-19', 10, '6006'),
(105, '2022-10-20', 4, '4500'),
(106, '2022-10-20', 5, '4500'),
(107, '2022-10-20', 6, '5000'),
(108, '2022-10-20', 7, '5006'),
(109, '2022-10-20', 10, '6006'),
(110, '2022-10-21', 4, '4500'),
(111, '2022-10-21', 5, '4500'),
(112, '2022-10-21', 6, '5000'),
(113, '2022-10-21', 7, '5006'),
(114, '2022-10-21', 10, '6006'),
(115, '2022-10-22', 4, '4500'),
(116, '2022-10-22', 5, '4500'),
(117, '2022-10-22', 6, '5000'),
(118, '2022-10-22', 7, '5006'),
(119, '2022-10-22', 10, '6006'),
(120, '2022-10-23', 4, '4500'),
(121, '2022-10-23', 5, '4500'),
(122, '2022-10-23', 6, '5000'),
(123, '2022-10-23', 7, '5006'),
(124, '2022-10-23', 10, '6006'),
(125, '2022-10-24', 4, '4500'),
(126, '2022-10-24', 5, '4500'),
(127, '2022-10-24', 6, '5000'),
(128, '2022-10-24', 7, '5006'),
(129, '2022-10-24', 10, '6006'),
(130, '2022-10-25', 4, '4500'),
(131, '2022-10-25', 5, '4500'),
(132, '2022-10-25', 6, '5000'),
(133, '2022-10-25', 7, '5006'),
(134, '2022-10-25', 10, '6006'),
(135, '2022-10-26', 4, '4500'),
(136, '2022-10-26', 5, '4500'),
(137, '2022-10-26', 6, '5000'),
(138, '2022-10-26', 7, '5006'),
(139, '2022-10-26', 10, '6006'),
(140, '2022-10-27', 4, '4500'),
(141, '2022-10-27', 5, '4500'),
(142, '2022-10-27', 6, '5000'),
(143, '2022-10-27', 7, '5006'),
(144, '2022-10-27', 10, '6006'),
(145, '2022-10-28', 4, '4500'),
(146, '2022-10-28', 5, '4500'),
(147, '2022-10-28', 6, '5000'),
(148, '2022-10-28', 7, '5006'),
(149, '2022-10-28', 10, '6006'),
(150, '2022-10-29', 4, '4500'),
(151, '2022-10-29', 5, '4500'),
(152, '2022-10-29', 6, '5000'),
(153, '2022-10-29', 7, '5006'),
(154, '2022-10-29', 10, '6006'),
(155, '2022-10-30', 4, '4500'),
(156, '2022-10-30', 5, '4500'),
(157, '2022-10-30', 6, '5000'),
(158, '2022-10-30', 7, '5006'),
(159, '2022-10-30', 10, '6006'),
(160, '2022-10-31', 4, '4500'),
(161, '2022-10-31', 5, '4500'),
(162, '2022-10-31', 6, '5000'),
(163, '2022-10-31', 7, '5006'),
(164, '2022-10-31', 10, '6006');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(20, 'ERNAKULAM'),
(22, 'Alappuzha'),
(25, 'Idukki'),
(27, 'Trivandrum'),
(28, 'Kollam'),
(29, 'Kottayam'),
(30, 'Thrissur');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expense`
--

CREATE TABLE `tbl_expense` (
  `exp_id` int(11) NOT NULL,
  `exp_date` date NOT NULL,
  `exp_amt` varchar(20) NOT NULL,
  `exptype_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_expense`
--

INSERT INTO `tbl_expense` (`exp_id`, `exp_date`, `exp_amt`, `exptype_id`, `bus_id`) VALUES
(5, '2022-10-01', '3000', 2, 4),
(6, '2022-10-01', '4000', 2, 5),
(7, '2022-10-01', '3500', 2, 6),
(8, '2022-10-01', '3000', 2, 7),
(9, '2022-10-01', '3100', 2, 10),
(10, '2022-10-02', '3000', 2, 4),
(11, '2022-10-02', '4000', 2, 5),
(12, '2022-10-02', '3500', 2, 6),
(13, '2022-10-02', '3000', 2, 7),
(14, '2022-10-02', '3100', 2, 10),
(15, '2022-10-03', '3000', 2, 4),
(16, '2022-10-03', '4000', 2, 5),
(17, '2022-10-03', '3500', 2, 6),
(18, '2022-10-03', '3000', 2, 7),
(19, '2022-10-03', '3100', 2, 10),
(20, '2022-10-04', '3000', 2, 4),
(21, '2022-10-04', '4000', 2, 5),
(22, '2022-10-04', '3500', 2, 6),
(23, '2022-10-04', '3000', 2, 7),
(24, '2022-10-04', '3100', 2, 10),
(25, '2022-10-05', '3000', 2, 4),
(26, '2022-10-05', '4000', 2, 5),
(27, '2022-10-05', '3500', 2, 6),
(28, '2022-10-05', '3000', 2, 7),
(29, '2022-10-05', '3100', 2, 10),
(30, '2022-10-06', '3000', 2, 4),
(31, '2022-10-06', '4000', 2, 5),
(32, '2022-10-06', '3500', 2, 6),
(33, '2022-10-06', '3000', 2, 7),
(34, '2022-10-06', '3100', 2, 10),
(35, '2022-10-07', '3000', 2, 4),
(36, '2022-10-07', '4000', 2, 5),
(37, '2022-10-07', '3500', 2, 6),
(38, '2022-10-07', '3000', 2, 7),
(39, '2022-10-07', '3100', 2, 10),
(40, '2022-10-08', '3000', 2, 4),
(41, '2022-10-08', '4000', 2, 5),
(42, '2022-10-08', '3500', 2, 6),
(43, '2022-10-08', '3000', 2, 7),
(44, '2022-10-08', '3100', 2, 10),
(45, '2022-10-09', '3000', 2, 4),
(46, '2022-10-09', '4000', 2, 5),
(47, '2022-10-09', '3500', 2, 6),
(48, '2022-10-09', '3000', 2, 7),
(49, '2022-10-09', '3100', 2, 10),
(50, '2022-10-10', '3000', 2, 4),
(51, '2022-10-10', '4000', 2, 5),
(52, '2022-10-10', '3500', 2, 6),
(53, '2022-10-10', '3000', 2, 7),
(54, '2022-10-10', '3100', 2, 10),
(55, '2022-10-11', '3000', 2, 4),
(56, '2022-10-11', '4000', 2, 5),
(57, '2022-10-11', '3500', 2, 6),
(58, '2022-10-11', '3000', 2, 7),
(59, '2022-10-11', '3100', 2, 10),
(60, '2022-10-12', '3000', 2, 4),
(61, '2022-10-12', '4000', 2, 5),
(62, '2022-10-12', '3500', 2, 6),
(63, '2022-10-12', '3000', 2, 7),
(64, '2022-10-12', '3100', 2, 10),
(65, '2022-10-13', '3000', 2, 4),
(66, '2022-10-13', '4000', 2, 5),
(67, '2022-10-13', '3500', 2, 6),
(68, '2022-10-13', '3000', 2, 7),
(69, '2022-10-13', '3100', 2, 10),
(70, '2022-10-14', '3000', 2, 4),
(71, '2022-10-14', '4000', 2, 5),
(72, '2022-10-14', '3500', 2, 6),
(73, '2022-10-14', '3000', 2, 7),
(74, '2022-10-14', '3100', 2, 10),
(75, '2022-10-15', '3000', 2, 4),
(76, '2022-10-15', '4000', 2, 5),
(77, '2022-10-15', '3500', 2, 6),
(78, '2022-10-15', '3000', 2, 7),
(79, '2022-10-15', '3100', 2, 10),
(80, '2022-10-16', '3000', 2, 4),
(81, '2022-10-16', '4000', 2, 5),
(82, '2022-10-16', '3500', 2, 6),
(83, '2022-10-16', '3000', 2, 7),
(84, '2022-10-16', '3100', 2, 10),
(85, '2022-10-17', '3000', 2, 4),
(86, '2022-10-17', '4000', 2, 5),
(87, '2022-10-17', '3500', 2, 6),
(88, '2022-10-17', '3000', 2, 7),
(89, '2022-10-17', '3100', 2, 10),
(90, '2022-10-18', '3000', 2, 4),
(91, '2022-10-18', '4000', 2, 5),
(92, '2022-10-18', '3500', 2, 6),
(93, '2022-10-18', '3000', 2, 7),
(94, '2022-10-18', '3100', 2, 10),
(95, '2022-10-19', '3000', 2, 4),
(96, '2022-10-19', '4000', 2, 5),
(97, '2022-10-19', '3500', 2, 6),
(98, '2022-10-19', '3000', 2, 7),
(99, '2022-10-19', '3100', 2, 10),
(100, '2022-10-20', '3000', 2, 4),
(101, '2022-10-20', '4000', 2, 5),
(102, '2022-10-20', '3500', 2, 6),
(103, '2022-10-20', '3000', 2, 7),
(104, '2022-10-20', '3100', 2, 10),
(105, '2022-10-21', '3000', 2, 4),
(106, '2022-10-21', '4000', 2, 5),
(107, '2022-10-21', '3500', 2, 6),
(108, '2022-10-21', '3000', 2, 7),
(109, '2022-10-21', '3100', 2, 10),
(110, '2022-10-22', '3000', 2, 4),
(111, '2022-10-22', '4000', 2, 5),
(112, '2022-10-22', '3500', 2, 6),
(113, '2022-10-22', '3000', 2, 7),
(114, '2022-10-22', '3100', 2, 10),
(115, '2022-10-23', '3000', 2, 4),
(116, '2022-10-23', '4000', 2, 5),
(117, '2022-10-23', '3500', 2, 6),
(118, '2022-10-23', '3000', 2, 7),
(119, '2022-10-23', '3100', 2, 10),
(120, '2022-10-24', '3000', 2, 4),
(121, '2022-10-24', '4000', 2, 5),
(122, '2022-10-24', '3500', 2, 6),
(123, '2022-10-24', '3000', 2, 7),
(124, '2022-10-24', '3100', 2, 10),
(125, '2022-10-25', '3000', 2, 4),
(126, '2022-10-25', '4000', 2, 5),
(127, '2022-10-25', '3500', 2, 6),
(128, '2022-10-25', '3000', 2, 7),
(129, '2022-10-25', '3100', 2, 10),
(130, '2022-10-26', '3000', 2, 4),
(131, '2022-10-26', '4000', 2, 5),
(132, '2022-10-26', '3500', 2, 6),
(133, '2022-10-26', '3000', 2, 7),
(134, '2022-10-26', '3100', 2, 10),
(135, '2022-10-27', '3000', 2, 4),
(136, '2022-10-27', '4000', 2, 5),
(137, '2022-10-27', '3500', 2, 6),
(138, '2022-10-27', '3000', 2, 7),
(139, '2022-10-27', '3100', 2, 10),
(140, '2022-10-28', '3000', 2, 4),
(141, '2022-10-28', '4000', 2, 5),
(142, '2022-10-28', '3500', 2, 6),
(143, '2022-10-28', '3000', 2, 7),
(144, '2022-10-28', '3100', 2, 10),
(145, '2022-10-29', '3000', 2, 4),
(146, '2022-10-29', '4000', 2, 5),
(147, '2022-10-29', '3500', 2, 6),
(148, '2022-10-29', '3000', 2, 7),
(149, '2022-10-29', '3100', 2, 10),
(150, '2022-10-30', '3000', 2, 4),
(151, '2022-10-30', '4000', 2, 5),
(152, '2022-10-30', '3500', 2, 6),
(153, '2022-10-30', '3000', 2, 7),
(154, '2022-10-30', '3100', 2, 10),
(155, '2022-10-31', '3590', 4, 4),
(156, '2022-10-31', '4000', 2, 5),
(157, '2022-10-31', '6000', 4, 6),
(158, '2022-10-31', '5000', 4, 7),
(159, '2022-10-31', '3100', 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expensetype`
--

CREATE TABLE `tbl_expensetype` (
  `exptype_id` int(11) NOT NULL,
  `exptype_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_expensetype`
--

INSERT INTO `tbl_expensetype` (`exptype_id`, `exptype_name`) VALUES
(2, 'Diesel'),
(3, 'Tyres'),
(4, 'Maintenance');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `not_id` int(11) NOT NULL,
  `not_date` date NOT NULL DEFAULT current_timestamp(),
  `bus_id` int(11) NOT NULL,
  `not_msg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`not_id`, `not_date`, `bus_id`, `not_msg`) VALUES
(1, '2022-10-07', 5, 'breakdown at velloor junction'),
(4, '2022-10-08', 11, 'breakdown at anchalpetty'),
(5, '2022-10-21', 4, 'Not run in noon trip');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `district_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `place_name` varchar(50) NOT NULL,
  `place_pin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`district_id`, `place_id`, `place_name`, `place_pin`) VALUES
(20, 32, 'Muvattupuzha', '686661'),
(22, 33, 'Ambalappuzha', '688561'),
(22, 34, 'Punnapra', '688003'),
(22, 36, 'Mararikkulam', '688523'),
(22, 37, 'Pathirappally', '688008'),
(25, 38, 'Idukki Dam Park', '685602'),
(25, 39, 'Painavu', '685603'),
(27, 40, 'Kesavadasapuram', '695004'),
(27, 41, 'Kunnukuzhy', '695034'),
(28, 42, 'Pallimukku', '682016'),
(28, 43, 'RP Mall', '691001'),
(29, 44, 'Peruva', '686610'),
(29, 46, 'Mulakkulam', '686664'),
(29, 47, 'Thalayolapparambu', '686146'),
(30, 48, 'Puththussery', '680553'),
(30, 49, 'Koorkencherry', '680007'),
(20, 50, 'Piravom', '686664'),
(20, 52, 'Chottanikkara', '682312'),
(20, 53, 'Kolencherry', '682310'),
(29, 54, 'Kanjiramattom', '682315'),
(20, 55, 'Thammanam', '682032'),
(29, 56, 'Nagampadam', '686001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_rate` float NOT NULL,
  `product_desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_rate`, `product_desc`) VALUES
(1, 'laptop', 50000, 'well maintained');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_route`
--

CREATE TABLE `tbl_route` (
  `route_id` int(11) NOT NULL,
  `route_name` varchar(40) NOT NULL,
  `route_frmplace` int(11) NOT NULL,
  `route_toplace` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_route`
--

INSERT INTO `tbl_route` (`route_id`, `route_name`, `route_frmplace`, `route_toplace`) VALUES
(8, 'Muvattupuzha-Kakkad-Piravom', 32, 50),
(9, 'Muvattupuzha-Kollikkal-Piravom', 32, 50),
(10, 'Muvattupuzha-Puthencruz-Ernakulam', 32, 55),
(11, 'Muvattupuzha-Thiruvaniyoor-Ernakulam', 32, 55),
(12, 'Piravom-Kaduthuruthy-Kottayam', 50, 56),
(13, 'Piravom-Kuravilangad-Kottayam', 50, 56),
(14, 'Piravom-Thiruvaniyoor-Ernakulam', 50, 55),
(15, 'Piravom-Mulanthuruthy-Ernakulam', 50, 55),
(16, 'Punnapra-Beach-Pathirappally', 37, 34),
(17, 'Mararikkulam-Kalavoor-Pathirappally', 36, 37),
(18, 'Pathirappally-Kanjiramchira-Ambalappuzha', 37, 33),
(19, 'Pathirappally-Aryad South-Ambalappuzha', 37, 33),
(20, 'Piravom-Mulakkulam-Peruva', 50, 44),
(21, 'Peruva-Moorkattipady-Thalayolapparambu', 44, 47),
(22, 'Peruva-Kunnappilly-Thalayolapparambu', 44, 47),
(23, 'Idukki Dam park-Cheruthoni-Painavu', 38, 39),
(24, 'Pallimukku-Andamukkam-RP Mall', 42, 43),
(25, 'Koorkencherry-Punkunnam-Puththussery', 49, 48),
(26, 'Kesavadasapuram-Pottakkuzhi-Kunnukuzhyk', 40, 41);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_routestop`
--

CREATE TABLE `tbl_routestop` (
  `routestop_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `routestop_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_routestop`
--

INSERT INTO `tbl_routestop` (`routestop_id`, `route_id`, `routestop_name`) VALUES
(40, 8, 'Muvattupuzha Bus Stand'),
(42, 8, 'Kayanad Bus Stop'),
(43, 8, 'Piramadom Bus Stop'),
(44, 8, 'Pampakuda Bus Stand'),
(45, 8, 'Anchalpetty Bus Stop'),
(46, 8, 'Onakkoor Bus Stop'),
(47, 8, 'Kakkad Stop'),
(48, 8, 'JMP Hospital Junction'),
(49, 8, 'Piravom Bus Stand'),
(50, 9, 'Muvattupuzha Bus Stand'),
(51, 9, 'Maradi Bus Stop'),
(52, 9, 'Maradi Bus Stop'),
(53, 9, 'Kayanad Bus Stop'),
(54, 9, 'Piramadom Bus Stop'),
(55, 9, 'Pampakuda Bus Stand'),
(56, 9, 'Anchalpetty Bus Stop'),
(57, 9, 'Onakkoor Bus Stop'),
(58, 9, 'Kollikkal Bus Stop'),
(59, 9, 'Piravom Govt Hospital Junction'),
(60, 9, 'Piravom Bus Stand'),
(77, 11, 'Muvattupuzha Bus Stand'),
(78, 11, 'Mekkadambu Bus Stop'),
(81, 11, 'Kolencherry Bus Stand'),
(82, 11, 'Poothrika Bus Stop'),
(83, 11, 'Thiruvaaniyoor Bus Stop'),
(84, 11, 'Mamala Bus Stop'),
(85, 11, 'Thiruvankulam Bus Stop'),
(86, 11, 'Irumpanam Bus Stop'),
(87, 11, 'Petta Bus Stop'),
(88, 10, 'Vyttila Bus Stand'),
(89, 11, 'Thammanam Bus Stop'),
(90, 10, 'Muvattupuzha Bus Stand'),
(91, 14, 'Piravom Bus Stand'),
(92, 14, 'Maneed Bus Stop'),
(93, 14, 'Thiruvaaniyoor Bus Stop'),
(94, 14, 'Mamala Bus Stop'),
(95, 14, 'Thiruvankulam Bus Stop'),
(96, 14, 'Petta Bus Stop'),
(97, 14, 'Irumpanam Bus Stop'),
(98, 14, 'Vyttila Bus Stand'),
(99, 14, 'Thammanam Bus Stop'),
(100, 10, 'Mekkadambu Bus Stop'),
(101, 10, 'Kolencherry Bus Stand'),
(102, 10, 'Puthencruz Bus Stop'),
(103, 10, 'Mamala Bus Stop'),
(104, 10, 'Irumpanam Bus Stop'),
(105, 10, 'Petta Bus Stop'),
(106, 10, 'Thammanam Bus Stop'),
(107, 10, 'Thiruvankulam Bus Stop'),
(108, 15, 'Piravom Bus Stand'),
(109, 15, 'Peppathy Bus Stop'),
(110, 15, 'Arakkunnam Bus Stop'),
(111, 15, 'Mulanthuruthy Bus Stop'),
(112, 15, 'Manakunnam Bus Stop'),
(113, 15, 'Petta Bus Stop'),
(114, 15, 'Vyttila Bus Stand'),
(115, 15, 'Thammanam Bus Stop'),
(116, 12, 'Piravom Bus Stand'),
(117, 12, 'Mulakkulam Bus Stop'),
(118, 12, 'Peruva Bus Stop'),
(119, 12, 'Moorkattilppady Bus Stop'),
(120, 12, 'Kaduthuruthy Bus Stop'),
(121, 12, 'Ettumanoor Bus Stop'),
(122, 12, 'Perumbaikad Bus Stop'),
(123, 12, 'Nagampadam Bus Stop'),
(124, 13, 'Namakkuzhy Bus Stop'),
(125, 13, 'Elanji Bus Stop'),
(126, 13, 'Monippally Bus Stop'),
(127, 13, 'Kuravilangad Bus Stop'),
(128, 13, 'Ettumanoor Bus Stop'),
(129, 13, 'Perumbaikad Bus Stop'),
(130, 13, 'Nagampadam Bus Stop'),
(131, 16, 'Paravur Bus Stop'),
(132, 16, 'Alappuzha Beach'),
(133, 16, 'Aryad South Bus Stop'),
(134, 16, 'ESI Junction'),
(135, 16, 'Pathirappally Bus Stop'),
(136, 17, 'Mararikkulam Bus Stop'),
(137, 17, 'Kalavoor Bus Stop'),
(138, 17, 'Bernard Junction'),
(139, 17, 'Pathirappally Bus Stop'),
(140, 18, 'Pathirappally Bus Stop'),
(141, 18, 'Kanjiramchira Bus Stop'),
(142, 18, 'Punnapra Bus Stop'),
(143, 18, 'Vandanam Bus Stop'),
(144, 18, 'Ambalappuzha Bus Stop'),
(145, 19, 'Pathirappally Bus Stop'),
(146, 19, 'Paravur Bus Stop'),
(147, 19, 'Punnapra Bus Stop'),
(148, 19, 'Vandanam Bus Stop'),
(149, 19, 'Ambalappuzha Bus Stop'),
(150, 20, 'Piravom Bus Stand'),
(151, 20, 'Mulakkulam Bus Stop'),
(152, 20, 'Vadakunnapuzha Bus Stop'),
(153, 20, 'Peruva Bus Stop'),
(160, 22, 'Peruva Bus Stop'),
(161, 22, 'Kunnapilly Bus Stop'),
(162, 22, 'Keezhoor Bus Stop'),
(163, 22, 'Thalappara Bus Stop'),
(165, 22, 'Thalayolapparambu Bus Stop'),
(166, 23, 'Idukki Dam Park'),
(167, 23, 'Cheruthoni Bus Stop'),
(168, 23, 'Govt Medical college'),
(169, 23, 'Idukki Dam Boating Ticket Counter'),
(170, 23, 'Painavu Bus Stop'),
(172, 24, 'Pallimukku Bus Stop'),
(173, 24, 'Kappalandimukku Junction'),
(174, 24, 'Cantonment Railway Junction'),
(175, 24, 'RP mall'),
(177, 25, 'Koorkencherry Bus Stop'),
(178, 25, 'Kokkala Bus Stop'),
(179, 25, 'Poothole Bus Stop'),
(180, 25, 'Punkunnam Bus Stop'),
(181, 25, 'Puththussery Bus Stop'),
(182, 26, 'Kesavadasapuram Bus Stop'),
(183, 26, 'Pattom Bus Stop'),
(184, 26, 'Pottakkuzhi Bus Stop'),
(185, 26, 'Vadayakkadu Bus Stop'),
(186, 26, 'Kunnukuzhy Bus Stop'),
(187, 11, 'Vyttila Bus Stand'),
(188, 13, 'Piravom Bus Stand'),
(189, 16, 'Punnapra Bus Stop'),
(190, 19, 'Aryad South Bus Stop'),
(191, 21, 'Peruva Bus Stop'),
(192, 21, 'Moorkattilppady Bus Stop'),
(193, 21, 'Keezhoor Bus Stop'),
(194, 21, 'Thalayolapparambu Bus Stop'),
(195, 21, 'Thalappara Bus Stop');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(50) NOT NULL,
  `subcategory_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `subcategory_name`, `subcategory_desc`) VALUES
(1, 'electronics', 'hair dryer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_gender` varchar(5) NOT NULL,
  `user_contact` varchar(15) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_pass` varchar(20) NOT NULL,
  `user_proof` varchar(100) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `user_address` varchar(200) NOT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_gender`, `user_contact`, `user_email`, `place_id`, `user_pass`, `user_proof`, `user_photo`, `user_address`, `reg_date`) VALUES
(23, 'Geethu Suresh', 'FEMAL', '4385783829', 'geethusureshcs@gmail.com', 39, 'Geethu123', 'New Text Document.txt', 'shalini.jpg', 'Geethu Suresh,\n Kizhakkekkotel (H),\n Painavu,685603,\n Idukki', '2022-11-04'),
(30, 'Abhishek Mukund', 'MALE', '7558988590', 'abhishek.mukund12@gmail.com', 50, '1234', 'New Text Document.txt', 'abhishek.jpg', 'Abhishek Mukund,\r\nPiravom', '2022-11-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_busdetails`
--
ALTER TABLE `tbl_busdetails`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indexes for table `tbl_busowner`
--
ALTER TABLE `tbl_busowner`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `tbl_busrate`
--
ALTER TABLE `tbl_busrate`
  ADD PRIMARY KEY (`busrate_id`);

--
-- Indexes for table `tbl_bustiming`
--
ALTER TABLE `tbl_bustiming`
  ADD PRIMARY KEY (`bustime_id`);

--
-- Indexes for table `tbl_bustype`
--
ALTER TABLE `tbl_bustype`
  ADD PRIMARY KEY (`bustype_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_cnclbus`
--
ALTER TABLE `tbl_cnclbus`
  ADD PRIMARY KEY (`cncl_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_complaintype`
--
ALTER TABLE `tbl_complaintype`
  ADD PRIMARY KEY (`ctype_id`);

--
-- Indexes for table `tbl_dailycollection`
--
ALTER TABLE `tbl_dailycollection`
  ADD PRIMARY KEY (`collec_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_expense`
--
ALTER TABLE `tbl_expense`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `tbl_expensetype`
--
ALTER TABLE `tbl_expensetype`
  ADD PRIMARY KEY (`exptype_id`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`not_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_route`
--
ALTER TABLE `tbl_route`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `tbl_routestop`
--
ALTER TABLE `tbl_routestop`
  ADD PRIMARY KEY (`routestop_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_busdetails`
--
ALTER TABLE `tbl_busdetails`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_busowner`
--
ALTER TABLE `tbl_busowner`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_busrate`
--
ALTER TABLE `tbl_busrate`
  MODIFY `busrate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_bustiming`
--
ALTER TABLE `tbl_bustiming`
  MODIFY `bustime_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `tbl_bustype`
--
ALTER TABLE `tbl_bustype`
  MODIFY `bustype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_cnclbus`
--
ALTER TABLE `tbl_cnclbus`
  MODIFY `cncl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_complaintype`
--
ALTER TABLE `tbl_complaintype`
  MODIFY `ctype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_dailycollection`
--
ALTER TABLE `tbl_dailycollection`
  MODIFY `collec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=320;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_expense`
--
ALTER TABLE `tbl_expense`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `tbl_expensetype`
--
ALTER TABLE `tbl_expensetype`
  MODIFY `exptype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_route`
--
ALTER TABLE `tbl_route`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_routestop`
--
ALTER TABLE `tbl_routestop`
  MODIFY `routestop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
