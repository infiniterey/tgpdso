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
-- Table structure for table `insuredpolicy`
--

CREATE TABLE `insuredpolicy` (
  `insured_policyNo` text NOT NULL,
  `insured_lastName` text NOT NULL,
  `insured_firstName` text NOT NULL,
  `insured_middleName` text NOT NULL,
  `insured_birthdate` date NOT NULL,
  `insured_address` text NOT NULL,
  `insured_contactNo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insuredpolicy`
--

INSERT INTO `insuredpolicy` (`insured_policyNo`, `insured_lastName`, `insured_firstName`, `insured_middleName`, `insured_birthdate`, `insured_address`, `insured_contactNo`) VALUES
('2324323', 'Bartar', 'Marvelr', 'Ar', '2018-08-13', 'Sitio Atis Baniladr', '87364587643');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
