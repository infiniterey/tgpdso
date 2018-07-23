-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2018 at 06:36 AM
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
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientID` int(50) NOT NULL,
  `cFirstname` varchar(50) NOT NULL,
  `cLastname` varchar(50) NOT NULL,
  `cMiddlename` varchar(50) NOT NULL,
  `cBirthdate` date NOT NULL,
  `cAddress` varchar(50) NOT NULL,
  `cCellno` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientID`, `cFirstname`, `cLastname`, `cMiddlename`, `cBirthdate`, `cAddress`, `cCellno`) VALUES
(0, 'asdas1', 'SADAGD', 'sad1', '2018-07-26', 'SDARJAG', 'WEIR'),
(35043, 'sdfsd', 'asghds', 'agdad', '2018-07-18', 'ahgsdasj', '38462384'),
(85855, 'asdas', 'SADAGD', 'sad', '2018-07-26', 'SDARJAG', 'WEIR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
