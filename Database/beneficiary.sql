-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2018 at 11:02 AM
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
  `bene_lastName` text NOT NULL,
  `bene_firstName` text NOT NULL,
  `bene_middleName` text NOT NULL,
  `bene_birthDate` date NOT NULL,
  `bene_address` text NOT NULL,
  `bene_contactNo` text NOT NULL,
  `bene_relationShip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beneficiary`
--

INSERT INTO `beneficiary` (`bene_policyNo`, `bene_lastName`, `bene_firstName`, `bene_middleName`, `bene_birthDate`, `bene_address`, `bene_contactNo`, `bene_relationShip`) VALUES
('0', 'Bando', 'Cory', 'G', '2018-07-31', 'Pit-Os Cebu City', '09299188811', 'Mother'),
('0', 'Banek', 'Panek', 'Anek', '2018-07-31', 'Bacayan CEbu', '09237432723', 'Father'),
('2324323', 'Bonny', 'Vanny', 'Kanny', '2018-08-15', 'Daalan CEbu', '0935023850', 'Cousin'),
('2324323', '', '', '', '0000-00-00', '', '', ''),
('2324323', 'lklk', '', 'iuyiuy', '0000-00-00', 'jgjhghj', 'opipi', 'hgfhgf'),
('2324323', 'ksdf;lksd', '', 'a;slkd;las', '0000-00-00', 'as;lkd', 'as;ldk', 'as;ldk'),
('2324323', 'opo', '', 'popo', '2018-08-21', 'sdsd', '4234234', 'sdfsdf'),
('2324323', 'Famador', '', 'S', '2018-08-27', 'Pit-os Cebu City', '092358208', 'Mother'),
('2324323', 'ioeoo', 'wppww', 'ruwurwww', '2018-08-13', 'wwuwuuw', 'wuwurww', 'mather'),
('324234', 'Hasadro', 'John', 'K', '2018-08-13', 'Sitio Baca Banilad Cebu City', '09237277111', 'Father'),
('324234', 'ewrwe', 'werwe', 'werwer', '2018-08-20', 'werwer', 'wer', 'rewrw');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
