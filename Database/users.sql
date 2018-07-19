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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ufirstname` varchar(50) NOT NULL,
  `ulastname` varchar(50) NOT NULL,
  `umiddlename` varchar(50) NOT NULL,
  `uaddress` varchar(50) NOT NULL,
  `ucontactno` varchar(50) NOT NULL,
  `uusertype` varchar(50) NOT NULL,
  `uteam` varchar(50) NOT NULL,
  `ugender` varchar(6) NOT NULL,
  `userID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `ufirstname`, `ulastname`, `umiddlename`, `uaddress`, `ucontactno`, `uusertype`, `uteam`, `ugender`, `userID`) VALUES
('123', '7619', '123', '123', '123', '123', '123', 'administrator', 'none', 'female', 1),
('321', '9820', '321', '321', '321', '321', '321', 'secretary', 'Revengers', 'male', 2),
('marckoy', '123', 'Marc', 'Famador', 'A', 'Pit-os Cebu City', '092013443212', 'Secretary', 'Kauswagan', 'male', 4),
('asd', 'qwertyuiasdfghj', 'asd', 'assad', 'asd', 'sad', '23123123', 'Adminstrator', 'Kauswagan', 'female', 5),
('ERTYUI', '1736', 'qwerty', 'WQERTYU', 'WERTY', 'WERTYUI', 'WERTYU', 'Secretary', 'Luspad', 'male', 6),
(';lkjhgf', '00909090909', 'oiuytr', 'oiuytr', 'oiuytre', 'oiuytrfed', '123456789', 'Secretary', 'Bayot', 'female', 7),
('coroyoy', '123', 'Marvelb1', 'Barteb', 'Alesnab', 'Sitio Atis Banilad', '09201148116', 'Sales Manager', 'Kauswagan', 'male', 8),
('coroyoy2', '123', 'Noel', 'Barte', 'A', 'Sitio Atis', '092184811', 'Adminstrator', 'Kauswagan', 'male', 9),
('111', '111', 'Ako', 'Ni', 'Marvel', 'Sitio Atis', '09282841', 'Secretary', 'Luspad', 'male', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
