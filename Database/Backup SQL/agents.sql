-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2018 at 10:58 AM
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
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `agentCode` int(11) NOT NULL,
  `agentLastname` varchar(100) NOT NULL,
  `agentFirstname` varchar(100) NOT NULL,
  `agentMiddlename` varchar(100) NOT NULL,
  `agentBirthdate` date NOT NULL,
  `agentApptDate` date NOT NULL,
  `agentTeam` int(11) NOT NULL,
  `agentPosition` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`agentCode`, `agentLastname`, `agentFirstname`, `agentMiddlename`, `agentBirthdate`, `agentApptDate`, `agentTeam`, `agentPosition`) VALUES
(32432432, 'weweqweq', 'weewwqe', 'eqwqw', '2018-07-25', '2018-07-30', 0, 'qweqw'),
(98, 'poi', 'poiu', 'poiuyt', '2018-07-31', '2018-07-31', 6, 'Mananagat'),
(567, 'erty', 'dfgh', 'sdfg', '2018-07-28', '2018-07-31', 3, 'qwertyu'),
(111, 'Loppy', 'Lumpy', 'O', '2018-07-12', '2018-07-31', 2, 'NCA'),
(9022, 'Yolly', 'Jompy', 'A', '2018-07-18', '2018-07-31', 0, 'Any');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`agentCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
