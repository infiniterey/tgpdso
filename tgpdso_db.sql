-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2018 at 05:53 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `agents`
--

CREATE TABLE IF NOT EXISTS `agents` (
  `agentCode` int(11) NOT NULL,
  `agentLastname` varchar(100) NOT NULL,
  `agentFirstname` varchar(100) NOT NULL,
  `agentMiddlename` varchar(100) NOT NULL,
  `agentBirthdate` date NOT NULL,
  `agentApptDate` date NOT NULL,
  `agentUnit` varchar(100) NOT NULL,
  `agentPosition` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE IF NOT EXISTS `plans` (
  `planID` int(11) NOT NULL,
  `planCode` varchar(20) NOT NULL,
  `planDesc` varchar(150) NOT NULL,
  `planRate` varchar(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`planID`, `planCode`, `planDesc`, `planRate`) VALUES
(1, '123', 'test', '400');

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE IF NOT EXISTS `production` (
  `prodID` int(11) NOT NULL,
  `transDate` date NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
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
  `agent` varchar(200) NOT NULL,
  `remarks` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`prodID`, `transDate`, `lastName`, `firstName`, `policyNo`, `plan`, `premium`, `receiptNo`, `faceAmount`, `rate`, `FYC`, `modeOfPayment`, `issuedDate`, `SOAdate`, `agent`, `remarks`) VALUES
(1, '2018-06-26', 'Centos', 'Ubuntu', '1234567', '', '13000', 'OR12345', '13000', '2300', '', 'Monthly', NULL, NULL, 'Marvel', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE IF NOT EXISTS `units` (
  `unitID` int(11) NOT NULL,
  `unitName` varchar(100) NOT NULL,
  `unitManager` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`agentCode`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`planID`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`prodID`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unitID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `planID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `prodID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unitID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
