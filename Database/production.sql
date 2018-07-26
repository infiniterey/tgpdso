-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2018 at 10:58 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tgpdso_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `prodID` int(11) NOT NULL,
  `transDate` date NOT NULL,
  `prodclientID` int(50) NOT NULL,
  `policyNo` varchar(20) NOT NULL,
  `plan` varchar(50) NOT NULL,
  `premium` varchar(20) NOT NULL,
  `receiptNo` varchar(20) DEFAULT NULL,
  `faceAmount` varchar(20) NOT NULL,
  `rate` varchar(10) NOT NULL,
  `FYC` varchar(20) NOT NULL,
  `modeOfPayment` varchar(20) NOT NULL,
  `issuedDate` date DEFAULT NULL,
  `SOAdate` date DEFAULT NULL,
  `agent` int(11) NOT NULL,
  `remarks` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`prodID`, `transDate`, `prodclientID`, `policyNo`, `plan`, `premium`, `receiptNo`, `faceAmount`, `rate`, `FYC`, `modeOfPayment`, `issuedDate`, `SOAdate`, `agent`, `remarks`) VALUES
(232, '2018-07-28', 85860, '678678', 'w120', '6786', '67876', '67', '678678', '', 'Monthly', NULL, NULL, 567, 'New'),
(229, '2018-07-31', 0, '21213', 'W100', '234234', '324234', '234234', '234234', '', 'Monthly', NULL, NULL, 567, 'New');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`prodID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `prodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
