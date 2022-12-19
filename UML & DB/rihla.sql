-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 04:30 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rihla`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `ID_booking` int(11) NOT NULL,
  `croisere` varchar(255) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_price` float NOT NULL,
  `ID_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cruise`
--

CREATE TABLE `cruise` (
  `ID_croisere` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `nights_number` int(11) NOT NULL,
  `departure_port_ID` int(11) NOT NULL,
  `cruise_itinerary` varchar(255) NOT NULL,
  `departure_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `port`
--

CREATE TABLE `port` (
  `ID_port` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reserved_features`
--

CREATE TABLE `reserved_features` (
  `ID_booking` int(11) NOT NULL,
  `ID_room` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `ID_room` int(11) NOT NULL,
  `ID_ship` int(255) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `ID_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `ID_type` int(11) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `room_price` float NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ship`
--

CREATE TABLE `ship` (
  `ID_ship` int(11) NOT NULL,
  `ship_name` varchar(255) NOT NULL,
  `rooms_number` int(11) NOT NULL,
  `spots_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_user` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`ID_booking`),
  ADD KEY `ID_client` (`ID_user`);

--
-- Indexes for table `cruise`
--
ALTER TABLE `cruise`
  ADD PRIMARY KEY (`ID_croisere`),
  ADD KEY `daparture_port` (`departure_port_ID`);

--
-- Indexes for table `port`
--
ALTER TABLE `port`
  ADD PRIMARY KEY (`ID_port`);

--
-- Indexes for table `reserved_features`
--
ALTER TABLE `reserved_features`
  ADD KEY `ID_booking` (`ID_booking`),
  ADD KEY `ID_room` (`ID_room`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`ID_room`),
  ADD KEY `ID_type` (`ID_type`),
  ADD KEY `ID_ship` (`ID_ship`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`ID_type`);

--
-- Indexes for table `ship`
--
ALTER TABLE `ship`
  ADD PRIMARY KEY (`ID_ship`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `ID_booking` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cruise`
--
ALTER TABLE `cruise`
  MODIFY `ID_croisere` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `port`
--
ALTER TABLE `port`
  MODIFY `ID_port` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `ID_room` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `ID_type` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ship`
--
ALTER TABLE `ship`
  MODIFY `ID_ship` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `ID_client` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cruise`
--
ALTER TABLE `cruise`
  ADD CONSTRAINT `daparture_port` FOREIGN KEY (`departure_port_ID`) REFERENCES `port` (`ID_port`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reserved_features`
--
ALTER TABLE `reserved_features`
  ADD CONSTRAINT `ID_booking` FOREIGN KEY (`ID_booking`) REFERENCES `booking` (`ID_booking`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ID_room` FOREIGN KEY (`ID_room`) REFERENCES `room` (`ID_room`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `ID_ship` FOREIGN KEY (`ID_ship`) REFERENCES `ship` (`ID_ship`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ID_type` FOREIGN KEY (`ID_type`) REFERENCES `room_types` (`ID_type`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
