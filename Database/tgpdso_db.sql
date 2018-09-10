-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2018 at 09:17 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary`
--

CREATE TABLE `beneficiary` (
  `bene_ID` int(50) NOT NULL,
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

INSERT INTO `beneficiary` (`bene_ID`, `bene_policyNo`, `bene_lastName`, `bene_firstName`, `bene_middleName`, `bene_birthDate`, `bene_address`, `bene_contactNo`, `bene_relationShip`) VALUES
(20, '3421', 'asas', 'asas', 'asas', '0000-00-00', 'asas', 'asas', 'asas'),
(21, '353533', 'fred', 'ca', 'mm', '2018-09-17', 'bbb', '9090', 'mother');

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
(85860, 'Marvelrb', 'Bartar', 'Ar', '2018-08-13', 'Sitio Atis Baniladr', '87364587643'),
(85864, 'xzczx', 'zxcxc', 'zxcxc', '2018-07-07', 'zxcxc', '00002222'),
(85865, 'asdsad', 'sdasd', 'sadsd', '2018-07-25', 'asdsda', 'asdsd'),
(85866, 'asssssqqq', 'ffffffqqq', 'ddddd', '2018-07-19', 'zcxvzx', '67858'),
(85867, 'nmvbmbv', 'fdgf', 'xcvcv', '2018-07-29', 'zxcxcz', 'ccc333'),
(85868, 'dfdf', 'dfd', 'dfd', '2018-08-02', 'sdfdsf', '4323423'),
(85869, 'here', 'here', 'here', '2018-08-04', 'here', 'herer'),
(85870, 'hellop12', 'hello12', 'hello12', '2018-08-23', 'hello12', '34534512'),
(85871, 'as', 'ss', 'sa', '2018-08-11', 'ss', '1414'),
(85872, 'mm12', 'mm12', 'mm', '2018-08-20', 'Sitio12', '2222');

-- --------------------------------------------------------

--
-- Table structure for table `fund`
--

CREATE TABLE `fund` (
  `fundID` int(11) NOT NULL,
  `fundName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fund`
--

INSERT INTO `fund` (`fundID`, `fundName`) VALUES
(123, 'yaya'),
(321, 'pipi'),
(322, 'sdfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `insuredpolicy`
--

CREATE TABLE `insuredpolicy` (
  `pol` int(11) NOT NULL,
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

INSERT INTO `insuredpolicy` (`pol`, `insured_policyNo`, `insured_lastName`, `insured_firstName`, `insured_middleName`, `insured_birthdate`, `insured_address`, `insured_contactNo`) VALUES
(3, '3421', 'ffffffqqq', 'asssssqqq', 'ddddd', '2018-07-19', 'zcxvzx', '67858'),
(4, 'W100411', 'mm12', 'mm12', 'mm', '2018-08-20', 'Sitio12', '2222'),
(5, '353533', 'Bartar', 'Marvelrb', 'Ar', '2018-08-13', 'Sitio Atis Baniladr', '87364587643'),
(6, '60013', 'Bartar', 'Marvelrb', 'Araa', '2018-08-13', 'Sitio Atis Baniladr', '87364587643');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_ID` int(50) NOT NULL,
  `payment_policyNo` text NOT NULL,
  `payment_Amount` text NOT NULL,
  `payment_issueDate` date NOT NULL,
  `payment_MOP` text NOT NULL,
  `payment_transDate` date NOT NULL,
  `payment_OR` text NOT NULL,
  `payment_APR` text NOT NULL,
  `payment_dueDate` text NOT NULL,
  `payment_nextDue` date NOT NULL,
  `payment_soaDate` text NOT NULL,
  `payment_remarks` text NOT NULL,
  `payment_remarks_year` text NOT NULL,
  `payment_remarks_month` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_ID`, `payment_policyNo`, `payment_Amount`, `payment_issueDate`, `payment_MOP`, `payment_transDate`, `payment_OR`, `payment_APR`, `payment_dueDate`, `payment_nextDue`, `payment_soaDate`, `payment_remarks`, `payment_remarks_year`, `payment_remarks_month`) VALUES
(82, '60013', '80000', '2018-09-18', 'Monthly', '2018-09-05', '', '', '2018-09-18', '2018-10-18', '2018-11', 'New', '', ''),
(83, '60013', '80000', '2018-09-18', 'Monthly', '2018-09-25', '4155515', '', '2018-10-18', '2018-11-18', '', 'New', '', ''),
(84, '60013', '80000', '2018-09-18', 'Monthly', '2018-09-25', '4155515', '', '2018-11-18', '2018-12-18', '', 'New', '', ''),
(85, '60013', '80000', '2018-09-18', 'Quarterly', '2018-09-25', '4155515', '', '2018-12-18', '2019-04-18', '', 'New', '', ''),
(86, '60013', '80000', '2018-09-18', 'Monthly', '2018-09-25', '4155515', '', '2019-04-18', '2019-05-18', '2019-01', 'New', '', ''),
(87, '60013', '90000', '2018-09-18', 'Monthly', '2019-03-21', '4155515', '', '2019-05-18', '2019-06-18', '2018-09', 'New', '', ''),
(88, '60013', '12000', '2018-09-18', 'Monthly', '2019-03-21', '4155515', '', '2019-06-18', '2019-07-18', '', 'New', '', ''),
(89, '60013', '12000', '2018-09-18', 'Monthly', '2019-03-21', '4155515', '', '2019-07-18', '2019-08-18', '', 'New', '', ''),
(90, '60013', '12000', '2018-09-18', 'Monthly', '2019-03-21', '4155515', '', '2019-08-18', '2019-09-18', '', 'New', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `planID` int(11) NOT NULL,
  `planCode` varchar(20) NOT NULL,
  `planDesc` varchar(150) NOT NULL,
  `planRate` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`planID`, `planCode`, `planDesc`, `planRate`) VALUES
(84, 'B100', 'Holder', '80%'),
(85, 'Y200', 'Insurance', '90%'),
(86, 'K100', 'Money', '60%'),
(83, 'W100', 'Financing', '90%');

-- --------------------------------------------------------

--
-- Table structure for table `policyfund`
--

CREATE TABLE `policyfund` (
  `polFund_policyNo` text NOT NULL,
  `polFund_fund` text NOT NULL,
  `polFund_rate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policyfund`
--

INSERT INTO `policyfund` (`polFund_policyNo`, `polFund_fund`, `polFund_rate`) VALUES
('9000', 'uweyriu', '73'),
('2324323', 'ui', '23'),
('2324323', '322', '78'),
('2324323', '123', '65'),
('9000', '321', '90'),
('1515111', '321', '90'),
('1515111', '123', '10'),
('1344', '321', '89'),
('9000', '322', 'sd'),
('', '', ''),
('9000', '123', '20'),
('9995455', '322', '90'),
('352525', '321', '10'),
('352525', '123', '50'),
('6999666444', '123', '60'),
('6999666444', '322', '40'),
('352525', '322', '90'),
('3421', '322', '100'),
('W100411', '321', '90'),
('3421', '123', '100'),
('353533', '322', '90'),
('353533', '321', '10'),
('60013', '322', '80'),
('60013', '123', '10');

-- --------------------------------------------------------

--
-- Table structure for table `policystatus`
--

CREATE TABLE `policystatus` (
  `policyID` int(11) NOT NULL,
  `policyStatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policystatus`
--

INSERT INTO `policystatus` (`policyID`, `policyStatus`) VALUES
(1, 'Unissued'),
(2, 'Active'),
(3, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `positionID` int(11) NOT NULL,
  `positionName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`positionID`, `positionName`) VALUES
(1, 'NCA'),
(3, 'Janitor'),
(4, 'Junior'),
(5, 'Senior');

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `prodID` int(11) NOT NULL,
  `transDate` text NOT NULL,
  `prodclientID` text NOT NULL,
  `policyNo` text NOT NULL,
  `plan` text NOT NULL,
  `premium` text NOT NULL,
  `receiptNo` text,
  `faceAmount` text NOT NULL,
  `rate` text NOT NULL,
  `FYC` text NOT NULL,
  `modeOfPayment` text NOT NULL,
  `issuedDate` text,
  `SOAdate` text,
  `agent` text NOT NULL,
  `remarks` text NOT NULL,
  `policyStat` text NOT NULL,
  `dueDate` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`prodID`, `transDate`, `prodclientID`, `policyNo`, `plan`, `premium`, `receiptNo`, `faceAmount`, `rate`, `FYC`, `modeOfPayment`, `issuedDate`, `SOAdate`, `agent`, `remarks`, `policyStat`, `dueDate`) VALUES
(260, '2019-03-21', '85860', '60013', '86', '12000', '4155515', '12000', '60%', '54000', 'Monthly', '2018-09-18', '2018-12', '567', 'New', '2', '2019-09-18');

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `RequirementsNo` int(11) NOT NULL,
  `RagentCode` int(11) NOT NULL,
  `Rrequirements` varchar(50) NOT NULL,
  `RProdID` int(11) NOT NULL,
  `RtransDate` date NOT NULL,
  `SubmitDate` date NOT NULL,
  `Status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`RequirementsNo`, `RagentCode`, `Rrequirements`, `RProdID`, `RtransDate`, `SubmitDate`, `Status`) VALUES
(0, 2, 'NSO', 90, '2018-08-09', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `soa`
--

CREATE TABLE `soa` (
  `SOA_ID` int(50) NOT NULL,
  `SOA_transDate` text NOT NULL,
  `SOA_policyOwner` text NOT NULL,
  `SOA_policyNo` text NOT NULL,
  `SOA_paymentMode` text NOT NULL,
  `SOA_premium` text NOT NULL,
  `SOA_rate` text NOT NULL,
  `SOA_commission` text NOT NULL,
  `SOA_agent` text NOT NULL,
  `SOA_date` text NOT NULL,
  `SOA_dueDate` text NOT NULL,
  `SOA_selectMonth` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soa`
--

INSERT INTO `soa` (`SOA_ID`, `SOA_transDate`, `SOA_policyOwner`, `SOA_policyNo`, `SOA_paymentMode`, `SOA_premium`, `SOA_rate`, `SOA_commission`, `SOA_agent`, `SOA_date`, `SOA_dueDate`, `SOA_selectMonth`) VALUES
(8, '2018-09-25', '85860', '60013', 'Quarterly', '90000', '60%', '54000', '567', '2018-09', '2018-10-18', 'Mid Month'),
(9, '2019-03-21', '85860', '60013', 'Monthly', '90000', '60%', '54000', '567', '2018-09', '2019-05-18', 'Mid Month'),
(10, '2018-09-05', '85860', '60013', 'Monthly', '90000', '60%', '54000', '567', '2018-11', '2018-09-18', 'Mid Month'),
(11, '2018-09-25', '85860', '60013', 'Monthly', '90000', '60%', '54000', '567', '2019-01', '2019-04-18', 'Month End'),
(12, '2019-03-21', '85860', '60013', 'Monthly', '90000', '60%', '54000', '567', '2018-12', '2019-05-18', 'Month End');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `teamID` int(11) NOT NULL,
  `teamName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`teamID`, `teamName`) VALUES
(2, 'Kauswagan'),
(3, 'Kamatayon'),
(4, 'Kabigti-on'),
(5, 'Biga-on'),
(6, 'Luspad'),
(7, 'Bayot');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `trainingNo` int(50) NOT NULL,
  `trainingName` varchar(20) NOT NULL,
  `trainingRequired` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`trainingNo`, `trainingName`, `trainingRequired`) VALUES
(5, 'A1', 'Junior'),
(7, 'A2', 'Senior'),
(8, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unitID` int(11) NOT NULL,
  `unitName` varchar(100) NOT NULL,
  `unitManager` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
('marckoy', '123', 'Marc', 'Famador', 'A', 'Pit-os Cebu City', '092013443212', 'Secretary', 'Kauswagan', 'male', 4),
('asd', 'qwertyuiasdfghj', 'asd', 'assad', 'asd', 'sad', '23123123', 'Adminstrator', 'Kauswagan', 'female', 5),
('ERTYUI', '1736', 'qwerty', 'WQERTYU', 'WERTY', 'WERTYUI', 'WERTYU', 'Secretary', 'Luspad', 'male', 6),
(';lkjhgf', '00909090909', 'oiuytr', 'oiuytr', 'oiuytre', 'oiuytrfed', '123456789', 'Secretary', 'Bayot', 'female', 7),
('coroyoy', '123', 'Marvelb1', 'Barteb', 'Alesnab', 'Sitio Atis Banilad', '09201148116', 'Sales Manager', 'Kauswagan', 'male', 8),
('coroyoy2', '123', 'Noel', 'Barte', 'A', 'Sitio Atis', '092184811', 'Adminstrator', 'Kauswagan', 'male', 9),
('111', '111', 'Ako', 'Ni', 'Marvel', 'Sitio Atis', '09282841', 'Secretary', 'Luspad', 'male', 10),
('coroyoy4', '90000', 'Umpoy', 'Jolk', 'Y', 'Cebu City', '4375989888', 'Secretary', 'Biga-on', 'male', 11);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `usertypeID` int(10) NOT NULL,
  `usertypeName` varchar(50) NOT NULL,
  `usertypeStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`usertypeID`, `usertypeName`, `usertypeStatus`) VALUES
(1, 'Adminstrator', 'no'),
(2, 'Sales Manager', 'no'),
(3, 'Secretary', 'yes'),
(4, 'Temporary', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`agentCode`);

--
-- Indexes for table `agentstraining`
--
ALTER TABLE `agentstraining`
  ADD PRIMARY KEY (`ATagentTrainingID`);

--
-- Indexes for table `beneficiary`
--
ALTER TABLE `beneficiary`
  ADD PRIMARY KEY (`bene_ID`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientID`);

--
-- Indexes for table `fund`
--
ALTER TABLE `fund`
  ADD PRIMARY KEY (`fundID`);

--
-- Indexes for table `insuredpolicy`
--
ALTER TABLE `insuredpolicy`
  ADD PRIMARY KEY (`pol`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_ID`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`planID`);

--
-- Indexes for table `policystatus`
--
ALTER TABLE `policystatus`
  ADD PRIMARY KEY (`policyID`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`positionID`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`prodID`);

--
-- Indexes for table `soa`
--
ALTER TABLE `soa`
  ADD PRIMARY KEY (`SOA_ID`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`teamID`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`trainingNo`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unitID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`usertypeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agentstraining`
--
ALTER TABLE `agentstraining`
  MODIFY `ATagentTrainingID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `beneficiary`
--
ALTER TABLE `beneficiary`
  MODIFY `bene_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85873;

--
-- AUTO_INCREMENT for table `fund`
--
ALTER TABLE `fund`
  MODIFY `fundID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=323;

--
-- AUTO_INCREMENT for table `insuredpolicy`
--
ALTER TABLE `insuredpolicy`
  MODIFY `pol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `planID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=843;

--
-- AUTO_INCREMENT for table `policystatus`
--
ALTER TABLE `policystatus`
  MODIFY `policyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `positionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `prodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT for table `soa`
--
ALTER TABLE `soa`
  MODIFY `SOA_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `trainingNo` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unitID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
