-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2022 at 02:23 PM
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
-- Database: `sls`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2022-01-01 02:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `matName` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `dateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `matName`, `type`, `description`, `qty`, `dateCreated`) VALUES
(1, 'Microscope ', 'Apparatus', 'A microscope is a very basic and needed equipment in the biology laboratory. A simple light microscope (compound microscope) is one, which is mostly used in schools and colleges and it uses natural or artificial light and a series of magnifying lenses to ', 15, '2022-08-08 19:26:12'),
(2, 'Test Tube', 'Apparatus', 'They are usually cylindrical pipes made up of glass, with a circular opening on one side and a rounded bottom on the other side. They come in different sizes but the most common standard size is 18*150 mm. Test tubes are one of the most important apparatu', 50, '2022-08-08 19:27:00'),
(3, 'Beaker', 'Apparatus', 'Beakers are another cylindrical utensil made up of glass, with a flat bottom and an upper opening, which may or may not have a spout. They are of varying sizes and are used to hold, heat, or mix substances with the proper measure. Beakers come in every si', 20, '2022-08-08 19:27:24'),
(4, 'Magnifying Glass', 'Equipment', 'A magnifying glass is one of the first introduced lab equipment among the students. As the name suggests, it is used to view enlarged or magnified images of objects or read the small calibrations marked on many equipments. It has a convex lens for object ', 15, '2022-08-08 19:27:59'),
(5, 'Vulumetric Flask', 'Equipment', 'This is made up of glass and is calibrated to hold a precise volume of liquids at any precise temperature. Different sizes of volumetric flasks are available, each calibrated for the exact measurement of liquids and solutions. In chemistry labs, it is mos', 15, '2022-08-08 19:28:53'),
(6, 'Thermometer', 'Equipment', 'A basic thermometer as many times, certain chemical or biological reactions can be carried out in any particular temperature range only and so to proceed, the thermometer becomes very necessary to measure the temperature of the required solution before mo', 18, '2022-08-08 19:30:38');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_type`
--

CREATE TABLE `inventory_type` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `dateCreated` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory_type`
--

INSERT INTO `inventory_type` (`id`, `type`, `dateCreated`) VALUES
(1, 'Chemicals/Supplies', '2022-08-08 19:12:58.413308'),
(2, 'Apparatus', '2022-08-08 19:13:06.107595'),
(3, 'Equipment', '2022-08-08 19:13:16.156004'),
(4, 'Models/Charts', '2022-08-08 19:13:24.642322'),
(5, 'Speciment', '2022-08-08 19:13:29.619770');

-- --------------------------------------------------------

--
-- Table structure for table `item_request`
--

CREATE TABLE `item_request` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `referenceNo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_request`
--

INSERT INTO `item_request` (`id`, `item`, `quantity`, `referenceNo`) VALUES
(1, 'Microscope ', 2, '694162'),
(2, 'Magnifying Glass', 1, '694162'),
(3, 'Thermometer', 2, '757975'),
(4, 'Beaker', 2, '728491'),
(5, 'Microscope ', 1, '940595');

-- --------------------------------------------------------

--
-- Table structure for table `student_req_form`
--

CREATE TABLE `student_req_form` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `dateOfUse` varchar(11) NOT NULL,
  `time` time(6) NOT NULL,
  `days` varchar(255) NOT NULL,
  `instructorName` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `referenceNo` varchar(255) DEFAULT NULL,
  `req_status` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `dateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_req_form`
--

INSERT INTO `student_req_form` (`id`, `firstName`, `middleName`, `lastName`, `room`, `section`, `subject`, `dateOfUse`, `time`, `days`, `instructorName`, `type`, `referenceNo`, `req_status`, `remarks`, `dateCreated`) VALUES
(1, 'Mary Jane', 'Mendoza', 'Ariola', 'RM101', 'CR4', 'Chemistry', '2022-08-08', '20:20:00.000000', '1', 'Mr. Leonardo M. Macatangay', 'Equipment', '694162', 'RETURN', 'All item are in good condition', '2022-08-08 20:12:48'),
(2, 'Martin Luther', 'Agon', 'Martinez', 'RM301', 'DA3', 'Physics 3', '2022-08-08', '09:30:00.000000', '1', 'Mr. Gregorio A. Lucas', 'Equipment', '757975', 'APPROVED', NULL, '2022-08-08 20:14:30'),
(3, 'George', 'Hermez', 'Del Mundo', 'RM305', 'DU5', 'Physics 2', '2022-08-08', '20:15:00.000000', '1', 'Miss Daisy K. Fermin', 'Apparatus', '728491', 'DECLINED', NULL, '2022-08-08 20:15:57'),
(4, 'Jay Fernandez', 'Denso', 'Segundo', 'RM202', 'CU3', 'Physics 2', '2022-08-08', '20:20:00.000000', '1', 'Mr. Alicer F. Kenya', 'Apparatus', '940595', NULL, NULL, '2022-08-08 20:18:39');

-- --------------------------------------------------------

--
-- Table structure for table `tblnotice`
--

CREATE TABLE `tblnotice` (
  `id` int(11) NOT NULL,
  `noticeTitle` varchar(255) DEFAULT NULL,
  `noticeDetails` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblnotice`
--

INSERT INTO `tblnotice` (`id`, `noticeTitle`, `noticeDetails`, `postingDate`) VALUES
(2, 'Notice regarding result Delearation', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Adipiscing elit ut aliquam purus. Vel risus commodo viverra maecenas. Et netus et malesuada fames ac turpis egestas sed. Cursus eget nunc scelerisque viverra mauris in aliquam sem fringilla. Ornare arcu odio ut sem nulla pharetra diam. Vel pharetra vel turpis nunc eget lorem dolor sed. Velit ut tortor pretium viverra suspendisse. In ornare quam viverra orci sagittis eu. Viverra tellus in hac habitasse. Donec massa sapien faucibus et molestie. Libero justo laoreet sit amet cursus sit amet dictum. Dignissim diam quis enim lobortis scelerisque fermentum dui.\r\n\r\nEget nulla facilisi etiam dignissim. Quisque non tellus orci ac. Amet cursus sit amet dictum sit amet justo donec. Interdum velit euismod in pellentesque massa. Condimentum lacinia quis vel eros donec ac odio. Magna eget est lorem ipsum dolor. Bibendum at varius vel pharetra vel turpis nunc eget lorem. Pellentesque adipiscing commodo elit at imperdiet dui accumsan sit amet. Maecenas accumsan lacus vel facilisis volutpat est velit egestas dui. Massa tincidunt dui ut ornare lectus sit amet est placerat. Nisi quis eleifend quam adipiscing vitae.', '2022-01-01 06:34:58'),
(3, 'Test Notice', 'This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  ', '2022-01-01 06:48:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_type`
--
ALTER TABLE `inventory_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_request`
--
ALTER TABLE `item_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_req_form`
--
ALTER TABLE `student_req_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblnotice`
--
ALTER TABLE `tblnotice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inventory_type`
--
ALTER TABLE `inventory_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `item_request`
--
ALTER TABLE `item_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_req_form`
--
ALTER TABLE `student_req_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblnotice`
--
ALTER TABLE `tblnotice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
