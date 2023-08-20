-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2022 at 11:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

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
(4, 'rojan', '7876567', 'bus.jfif', 2, 9786867, 30, 8, 2, 3),
(5, 'alvin', '2234234', 'bus.jfif', 1, 23423423, 40, 8, 3, 3),
(6, 'jesus', '2235353453', 'bus.jfif', 1, 5685675, 30, 8, 2, 3),
(7, 'KRS', '342352352', 'bus.jfif', 1, 2147483647, 40, 8, 4, 4);

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
(8, 'james', 'MALE', 'james@gmail.com', '1234', '3453464', '2342343253', '8798687', 'AKHIL SIG.jpg', 1, 21),
(9, 'joseph', 'MALE', 'joseph@gmail.com', '123', '87326643', '255724676', '443253443', 'SONU SING-9999 (1).jpg', 2, 22);

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
(21, 'kollam'),
(22, 'Alappuzha'),
(23, 'kottayam'),
(25, 'Idukki'),
(26, 'thrissur'),
(27, 'Trivandrum');

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
(20, 21, 'muvattupuzha', '633574'),
(22, 22, 'aroor', '670789'),
(23, 23, 'peruva', '45634'),
(20, 25, 'elanji', '686662'),
(23, 26, 'mulakkulam', '342343'),
(20, 27, 'kolenchery', '876878'),
(20, 28, 'Piravom', '353534'),
(23, 29, 'Thalayolapparambu', '342353'),
(20, 30, 'Ernakulam', '682423'),
(20, 31, 'Kolencherry', '354542');

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
(2, 'muvattupuzha-ernakulam', 21, 27),
(3, 'Kottayam-Piravom', 29, 28),
(4, 'Piravom-Ernakulam', 28, 30);

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
(2, 2, 'velloorkunnam'),
(3, 3, 'Velloor junction'),
(4, 4, 'Arakkunnam'),
(5, 4, 'Thiruvaaniyoor'),
(6, 4, 'Mulanthuruthy'),
(7, 2, 'Kolencherry Bus Stand');

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
  `user_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_gender`, `user_contact`, `user_email`, `place_id`, `user_pass`, `user_proof`, `user_photo`, `user_address`) VALUES
(21, 'Bilin baby', 'MALE', '123456875', 'bilin@gmail.com', 21, '1234', 'EAadhaar_2003370360687320121204164803_0101202212371.pdf', 'Capture.PNG', 'hddkjdjbd'),
(22, 'Sanjay Benoy', 'MALE', '8281855976', 'sanjaybenoy123@gmail.com', 22, '1234', 'Capture.PNG', 'Capture.PNG', 'ytgygbyu'),
(23, 'SHALINI', 'FEMAL', '21212432', 'shalini@gmail.com', 22, '1234', 'EAadhaar_2003370360687320121204164803_0101202212371.pdf', 'Capture.PNG', 'fgfghgfh');

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
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

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
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_busowner`
--
ALTER TABLE `tbl_busowner`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_bustiming`
--
ALTER TABLE `tbl_bustiming`
  MODIFY `bustime_id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_route`
--
ALTER TABLE `tbl_route`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_routestop`
--
ALTER TABLE `tbl_routestop`
  MODIFY `routestop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
