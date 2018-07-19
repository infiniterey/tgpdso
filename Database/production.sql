-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2018 at 08:41 AM
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
  `agent` int(11) NOT NULL,
  `remarks` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`prodID`, `transDate`, `lastName`, `firstName`, `policyNo`, `plan`, `premium`, `receiptNo`, `faceAmount`, `rate`, `FYC`, `modeOfPayment`, `issuedDate`, `SOAdate`, `agent`, `remarks`) VALUES
(215, '2018-07-24', 'Jonnhy', 'Bravo', '123456', 'w120', '12345', '123456', '12345', '12345', '', 'Monthly', NULL, NULL, 6, 'New'),
(214, '2018-07-31', 'Kolly', 'Holly', '932782734', 'w120', '324', '324732', '324', '56', '', 'Monthly', NULL, NULL, 3, 'New'),
(210, '2018-07-20', 'asdad', 'asdasd', '1213aasas', 'aa', '435asas', '765', '765asas', '34asa', '', 'Monthly', NULL, NULL, 3, 'New'),
(211, '2018-07-27', '1234567', '234567', '234567', '12as', '2345678', '2345678', '1234567', '234567', '', 'Monthly', NULL, NULL, 3, 'New'),
(212, '2018-07-27', 'Barte', 'Noel', '14815481', '', '12345678', '3456723', '456', '45', '', 'Monthly', NULL, NULL, 3, 'New'),
(213, '2018-07-28', 'Hello', 'World', '3582358', 'W100', '2342', '234737', '324', '56%', '', 'Monthly', NULL, NULL, 6, 'New'),
(208, '2018-07-25', 'qwerty', 'qwertyu', '1234567', '12as', '12345678911', '12345678', '1234567811', '1234567811', '', 'Monthly', NULL, NULL, 6, 'New'),
(216, '2018-07-26', 'HiOS', 'Guyss', 'ME', '12as', '152636', '12141541', '14151', '151', '', 'Monthly', NULL, NULL, 98, 'New'),
(217, '2018-07-31', 'TT', 'BB', '13414', '', '262', '1151', '23526', '135', '', 'Monthly', NULL, NULL, 111, 'New');

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
  MODIFY `prodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
