-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2018 at 11:01 AM
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
  `policyNo` text NOT NULL,
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
(236, '2018-07-25', 85867, '324234', '84', '12412', '12314', '12412', '80%', '', 'Monthly', NULL, NULL, 567, ''),
(240, '2018-07-21', 85860, '2324323', '84', '2323', '232323', '2323', '2323', '', 'Monthly', NULL, NULL, 567, '');

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
  MODIFY `prodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
