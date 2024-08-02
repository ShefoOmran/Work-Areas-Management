-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql309.infinityfree.com
-- Generation Time: Sep 20, 2023 at 01:09 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_35028557_map`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `Equipment_Id` int(11) NOT NULL,
  `Equipment_Name` varchar(255) NOT NULL,
  `Equipment_type` varchar(255) NOT NULL,
  `Substation_ID` int(11) NOT NULL,
  `Slot_1` varchar(255) DEFAULT NULL,
  `Slot_2` varchar(255) DEFAULT NULL,
  `Slot_3` varchar(255) DEFAULT NULL,
  `Slot_4` varchar(255) DEFAULT NULL,
  `Slot_5` varchar(255) DEFAULT NULL,
  `Slot_6` varchar(255) DEFAULT NULL,
  `Slot_7` varchar(255) DEFAULT NULL,
  `Slot_8` varchar(255) DEFAULT NULL,
  `Slot_9` varchar(255) DEFAULT NULL,
  `Slot_10` varchar(255) DEFAULT NULL,
  `Slot_11` varchar(255) DEFAULT NULL,
  `Slot_12` varchar(255) DEFAULT NULL,
  `Slot_13` varchar(255) DEFAULT NULL,
  `Slot_14` varchar(255) DEFAULT NULL,
  `Slot_15` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`Equipment_Id`, `Equipment_Name`, `Equipment_type`, `Substation_ID`, `Slot_1`, `Slot_2`, `Slot_3`, `Slot_4`, `Slot_5`, `Slot_6`, `Slot_7`, `Slot_8`, `Slot_9`, `Slot_10`, `Slot_11`, `Slot_12`, `Slot_13`, `Slot_14`, `Slot_15`) VALUES
(1, 'node', 'XT-2210', 1, '6-GE-L', '2-C37.94', '4-CODIR', '4-CODIR', '4-10G-LW', '6-GE-L', '4-10G-LW', '4-CODIR', '1-10G-LW', '8-FXS', '', '', '', '', ''),
(2, 'node2', 'XT-2210', 1, '4-2/4WEM', '4-CODIR', '7-SERIAL', '2-C37.94', '4-CODIR', '2-C37.94', '4-CODIR', '6-GE-L', '6-GE-L', '4-CODIR', '', '', '', '', ''),
(3, '12456', 'XT-2210', 1, '7-SERIAL', '4-GC-LW', '16-E1-L', '4-GO-LW', '1-10G-LW', '6-GE-L', 'Dummy Slot', 'Dummy Slot', 'Dummy Slot', 'Dummy Slot', '', '', '', '', ''),
(4, '45698', 'XT-2210', 4, '4-CODIR', '8-FXS', '16-E1-L', '4-2/4WEM', '4-GC-LW', '6-GE-L', 'Dummy Slot', 'Dummy Slot', 'Dummy Slot', 'Dummy Slot', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Username`, `Password`, `Type`) VALUES
('Admin', 'AdminAdmin', 'Admin'),
('ali', '12345678', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `marker`
--

CREATE TABLE `marker` (
  `Marker_Id` int(11) NOT NULL,
  `Marker_Name` varchar(255) NOT NULL,
  `Latitude` float NOT NULL,
  `Longitude` float NOT NULL,
  `Installation_Date` date DEFAULT NULL,
  `Comissioning_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marker`
--

INSERT INTO `marker` (`Marker_Id`, `Marker_Name`, `Latitude`, `Longitude`, `Installation_Date`, `Comissioning_Date`) VALUES
(1, 'mm', 25.56, 50.67, '2023-09-28', '2023-09-07'),
(4, 'DAMMAM PP', 26.3456, 50.0565, '2023-08-01', '2023-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `pathes`
--

CREATE TABLE `pathes` (
  `Path_Id` int(11) NOT NULL,
  `Path_Name` varchar(255) NOT NULL,
  `Path_type` varchar(255) NOT NULL,
  `Latitude_A` float NOT NULL,
  `Longitude_A` float NOT NULL,
  `Latitude_B` float NOT NULL,
  `Longitude_B` float NOT NULL,
  `Substation_A` varchar(255) NOT NULL,
  `Substation_B` varchar(255) NOT NULL,
  `Additional_Information` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pathes`
--

INSERT INTO `pathes` (`Path_Id`, `Path_Name`, `Path_type`, `Latitude_A`, `Longitude_A`, `Latitude_B`, `Longitude_B`, `Substation_A`, `Substation_B`, `Additional_Information`) VALUES
(1, 'Damm to MM', 'Yellow', 25.56, 50.67, 26.3456, 50.0565, 'mm', 'DAMMAM PP', '');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `Service_ID` int(11) NOT NULL,
  `Substation_ID` int(11) NOT NULL,
  `Equipment_ID` int(11) NOT NULL,
  `Slot_Name` varchar(255) NOT NULL,
  `Port_1` varchar(255) NOT NULL DEFAULT 'Nill',
  `Port_2` varchar(255) NOT NULL DEFAULT 'Nill',
  `Port_3` varchar(255) NOT NULL DEFAULT 'Nill',
  `Port_4` varchar(255) NOT NULL DEFAULT 'Nill',
  `Port_5` varchar(255) NOT NULL DEFAULT 'Nill',
  `Port_6` varchar(255) NOT NULL DEFAULT 'Nill',
  `Port_7` varchar(255) NOT NULL DEFAULT 'Nill',
  `Port_8` varchar(255) NOT NULL DEFAULT 'Nill',
  `Port_9` varchar(255) NOT NULL DEFAULT 'Nill',
  `Port_10` varchar(255) NOT NULL DEFAULT 'Nill',
  `Port_11` varchar(255) NOT NULL DEFAULT 'Nill',
  `Port_12` varchar(255) NOT NULL DEFAULT 'Nill',
  `Port_13` varchar(255) NOT NULL DEFAULT 'Nill',
  `Port_14` varchar(255) NOT NULL DEFAULT 'Nill',
  `Port_15` varchar(255) NOT NULL DEFAULT 'Nill',
  `Port_16` varchar(255) NOT NULL DEFAULT 'Nill'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`Service_ID`, `Substation_ID`, `Equipment_ID`, `Slot_Name`, `Port_1`, `Port_2`, `Port_3`, `Port_4`, `Port_5`, `Port_6`, `Port_7`, `Port_8`, `Port_9`, `Port_10`, `Port_11`, `Port_12`, `Port_13`, `Port_14`, `Port_15`, `Port_16`) VALUES
(1, 1, 1, '1-10G-LW', 'test', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill'),
(2, 1, 2, '4-CODIR', 'test', 'test2', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill'),
(4, 1, 3, '7-SERIAL', 'SCADA to TNCC', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill'),
(5, 4, 4, '4-2/4WEM', 'HOT TELEPHONE', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill'),
(7, 4, 4, '6-GE-L', 'LAN/WAN', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill', 'Nill');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`Equipment_Id`),
  ADD KEY `marker_id` (`Substation_ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `marker`
--
ALTER TABLE `marker`
  ADD PRIMARY KEY (`Marker_Id`);

--
-- Indexes for table `pathes`
--
ALTER TABLE `pathes`
  ADD PRIMARY KEY (`Path_Id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`Service_ID`),
  ADD KEY `M_ID` (`Substation_ID`),
  ADD KEY `E_ID` (`Equipment_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `Equipment_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `marker`
--
ALTER TABLE `marker`
  MODIFY `Marker_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pathes`
--
ALTER TABLE `pathes`
  MODIFY `Path_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `Service_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `marker_id` FOREIGN KEY (`Substation_ID`) REFERENCES `marker` (`Marker_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `E_ID` FOREIGN KEY (`Equipment_ID`) REFERENCES `equipment` (`Equipment_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `M_ID` FOREIGN KEY (`Substation_ID`) REFERENCES `marker` (`Marker_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
