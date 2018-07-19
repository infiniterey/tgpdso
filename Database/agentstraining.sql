-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2018 at 08:39 AM
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
-- Table structure for table `agentstraining`
--

CREATE TABLE `agentstraining` (
  `ATagentTrainingID` int(50) NOT NULL,
  `ATagentID` varchar(50) NOT NULL,
  `ATagentName` varchar(20) NOT NULL,
  `ATtrainingName` varchar(20) NOT NULL,
  `ATrequiredPosition` varchar(20) NOT NULL,
  `ATdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agentstraining`
--

INSERT INTO `agentstraining` (`ATagentTrainingID`, `ATagentID`, `ATagentName`, `ATtrainingName`, `ATrequiredPosition`, `ATdate`) VALUES
(2, 'gagu, puta ', '123', 'A2', '7', '0000-00-00'),
(3, 'Gropo, Haime', '9884', 'A3', 'NCA', '0000-00-00'),
(4, 'Gropo, Haime', '9884', 'A3', 'NCA', '0000-00-00'),
(5, 'Gropo, Haime', '9884', 'A3', 'NCA', '0000-00-00'),
(6, 'Gropo, Haime', '9884', 'A3', 'NCA', '2018-07-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agentstraining`
--
ALTER TABLE `agentstraining`
  ADD PRIMARY KEY (`ATagentTrainingID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agentstraining`
--
ALTER TABLE `agentstraining`
  MODIFY `ATagentTrainingID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
