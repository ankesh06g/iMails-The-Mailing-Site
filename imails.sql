-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2019 at 04:57 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imails`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `C_id` varchar(50) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `B_date` date DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_activity`
--

CREATE TABLE `log_activity` (
  `C_id` varchar(50) NOT NULL,
  `Message` varchar(50) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_recovery`
--

CREATE TABLE `log_recovery` (
  `C_id` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE `mails` (
  `M_id` int(11) NOT NULL,
  `c_1` varchar(50) NOT NULL,
  `c_2` varchar(50) DEFAULT NULL,
  `sub` varchar(300) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `star` tinyint(1) NOT NULL DEFAULT '0',
  `trash` tinyint(1) NOT NULL DEFAULT '0',
  `draft` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recovery`
--

CREATE TABLE `recovery` (
  `C_id` varchar(50) NOT NULL,
  `Mail` varchar(50) DEFAULT NULL,
  `verified` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `C_id` varchar(50) NOT NULL,
  `theme` varchar(20) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`C_id`);

--
-- Indexes for table `log_activity`
--
ALTER TABLE `log_activity`
  ADD KEY `C_id` (`C_id`);

--
-- Indexes for table `log_recovery`
--
ALTER TABLE `log_recovery`
  ADD KEY `C_id` (`C_id`);

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`M_id`),
  ADD KEY `c_1` (`c_1`),
  ADD KEY `c_2` (`c_2`);

--
-- Indexes for table `recovery`
--
ALTER TABLE `recovery`
  ADD KEY `C_id` (`C_id`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD KEY `C_id` (`C_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
  MODIFY `M_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log_activity`
--
ALTER TABLE `log_activity`
  ADD CONSTRAINT `log_activity_ibfk_1` FOREIGN KEY (`C_id`) REFERENCES `customers` (`C_id`);

--
-- Constraints for table `log_recovery`
--
ALTER TABLE `log_recovery`
  ADD CONSTRAINT `log_recovery_ibfk_1` FOREIGN KEY (`C_id`) REFERENCES `customers` (`C_id`);

--
-- Constraints for table `mails`
--
ALTER TABLE `mails`
  ADD CONSTRAINT `mails_ibfk_1` FOREIGN KEY (`c_1`) REFERENCES `customers` (`C_id`),
  ADD CONSTRAINT `mails_ibfk_2` FOREIGN KEY (`c_2`) REFERENCES `customers` (`C_id`);

--
-- Constraints for table `recovery`
--
ALTER TABLE `recovery`
  ADD CONSTRAINT `recovery_ibfk_1` FOREIGN KEY (`C_id`) REFERENCES `customers` (`C_id`);

--
-- Constraints for table `theme`
--
ALTER TABLE `theme`
  ADD CONSTRAINT `theme_ibfk_1` FOREIGN KEY (`C_id`) REFERENCES `customers` (`C_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
