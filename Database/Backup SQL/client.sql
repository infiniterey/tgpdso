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
(85858, 'asdsa123ddd', 'asd23ddd', 'asdsadsda1ddd', '2018-07-03', 'dxcvvxc', '21231231'),
(85860, 'Marvelr', 'Bartar', 'Ar', '2018-08-13', 'Sitio Atis Baniladr', '87364587643'),
(85864, 'xzczx', 'zxcxc', 'zxcxc', '2018-07-07', 'zxcxc', 'zxcxc'),
(85865, 'asdsad', 'sdasd', 'sadsd', '2018-07-25', 'asdsda', 'asdsd'),
(85866, 'asssss', 'ffffff', 'ddddd', '2018-07-19', 'zcxvzx', '67858'),
(85867, 'nmvbmbv', 'fdgf', 'xcvcv', '2018-07-29', 'zxcxcz', 'ccc333'),
(85868, 'dfdf', 'dfd', 'dfd', '2018-08-02', 'sdfdsf', '4323423'),
(85869, 'here', 'here', 'here', '2018-08-04', 'here', 'herer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85870;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
