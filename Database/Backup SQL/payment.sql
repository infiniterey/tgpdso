-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2018 at 11:00 AM
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
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_policyNo` text NOT NULL,
  `payment_Amount` text NOT NULL,
  `payment_issueDate` date NOT NULL,
  `payment_MOP` text NOT NULL,
  `payment_transDate` date NOT NULL,
  `payment_OR` text NOT NULL,
  `payment_APR` text NOT NULL,
  `payment_nextDue` date NOT NULL,
  `payment_remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_policyNo`, `payment_Amount`, `payment_issueDate`, `payment_MOP`, `payment_transDate`, `payment_OR`, `payment_APR`, `payment_nextDue`, `payment_remarks`) VALUES
('', '', '0000-00-00', 'Monthly', '0000-00-00', '', '', '0000-00-00', 'New'),
('2324323', '2323', '0000-00-00', 'Monthly', '2018-07-21', '232323', '353q5', '0000-00-00', 'New');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
