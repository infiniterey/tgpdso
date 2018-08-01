-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2018 at 11:59 AM
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
-- Table structure for table `beneficiary`
--

CREATE TABLE `beneficiary` (
  `bene_policyNo` text NOT NULL,
  `bene_lastName` varchar(50) NOT NULL,
  `bene_firstName` varchar(50) NOT NULL,
  `bene_middleName` varchar(50) NOT NULL,
  `bene_birthDate` date NOT NULL,
  `bene_address` varchar(50) NOT NULL,
  `bene_contactNo` varchar(50) NOT NULL,
  `bene_relationShip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beneficiary`
--

INSERT INTO `beneficiary` (`bene_policyNo`, `bene_lastName`, `bene_firstName`, `bene_middleName`, `bene_birthDate`, `bene_address`, `bene_contactNo`, `bene_relationShip`) VALUES
('0', 'Bando', 'Cory', 'G', '2018-07-31', 'Pit-Os Cebu City', '09299188811', 'Mother');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
