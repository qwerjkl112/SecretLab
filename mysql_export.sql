-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 07, 2018 at 03:49 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `local`
--

-- --------------------------------------------------------

--
-- Table structure for table `Connections`
--

CREATE TABLE `connections` (
  `connectionId` int(11) NOT NULL,
  `mentorId` int(11) NOT NULL,
  `menteeId` int(11) NOT NULL,
  `createdDate` varchar(200) DEFAULT NULL,
  `lastConnected` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Connections`
--

INSERT INTO `connections` (`connectionId`, `mentorId`, `menteeId`, `createdDate`, `lastConnected`) VALUES
(43, 26, 25, '05/03/2018', '05/09/2018'),
(49, 26, 19, '05/16/2018', '06/05/2018'),
(50, 26, 16, '05/16/2018', '05/24/2018');

-- --------------------------------------------------------

--
-- Table structure for table `Feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedbackId` int(11) NOT NULL,
  `SenderId` int(11) NOT NULL,
  `ReceiverId` int(11) NOT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `dateCommented` varchar(255) DEFAULT NULL,
  `connectionId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Feedbacks`
--

INSERT INTO `feedbacks` (`feedbackId`, `SenderId`, `ReceiverId`, `Rating`, `Description`, `dateCommented`, `connectionId`) VALUES
(28, 26, 25, 5, 'sdf', '05/09/2018', 43),
(30, 26, 19, 5, 'dsaf', '05/16/2018', 49),
(31, 16, 26, 5, 'Great experience', '05/24/2018', 50),
(32, 16, 26, 4, 'I lied', '05/24/2018', 50),
(33, 19, 26, 0, '213', '06/05/2018', 49),
(34, 19, 26, 0, '213', '06/05/2018', 49);

-- --------------------------------------------------------

--
-- Table structure for table `PotentialConnections`
--

CREATE TABLE `potentialconnections` (
  `PotentialConnectionsId` int(11) NOT NULL,
  `mentorId` int(11) NOT NULL,
  `menteeId` int(11) NOT NULL,
  `matchScore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PotentialConnections`
--

INSERT INTO `potentialconnections` (`PotentialConnectionsId`, `mentorId`, `menteeId`, `matchScore`) VALUES
(51, 33, 25, 85),
(52, 33, 19, 78);

-- --------------------------------------------------------

--
-- Table structure for table `TC_Feedbacks`
--

CREATE TABLE `tc_feedbacks` (
  `feedbackId` int(11) NOT NULL,
  `profileId` int(11) NOT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `createdDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TC_Feedbacks`
--

INSERT INTO `tc_feedbacks` (`feedbackId`, `profileId`, `Description`, `createdDate`) VALUES
(1, 21, 'as', '05/01/2018'),
(2, 20, 'Please Review Us with Feedback\r\n', '05/01/2018'),
(3, 21, 'Hey Please Email Us', '05/01/2018'),
(5, 26, 'hey update your feedback', '05/01/2018'),
(6, 19, 'asdf', '05/17/2018');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `firstname` varchar(200) DEFAULT NULL,
  `lastname` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `dob` varchar(200) DEFAULT NULL,
  `phonenumber` varchar(200) DEFAULT NULL,
  `userType` int(11) NOT NULL,
  `education` varchar(255) DEFAULT NULL,
  `degree` varchar(200) DEFAULT NULL,
  `professions` varchar(255) DEFAULT NULL,
  `status` varchar(200) DEFAULT 'Pending Review',
  `companyName` varchar(200) DEFAULT NULL,
  `jobTitle` varchar(200) DEFAULT NULL,
  `jobResponisibility` varchar(200) DEFAULT NULL,
  `interest` varchar(256) DEFAULT NULL,
  `matchStatus` int(11) NOT NULL DEFAULT '0',
  `resource` varchar(256) DEFAULT NULL,
  `yearsProfession` varchar(255) DEFAULT NULL,
  `numCandidate` varchar(255) DEFAULT NULL,
  `prevJobs` varchar(255) DEFAULT NULL,
  `pursuingDegree` varchar(255) DEFAULT NULL,
  `otherInfo` varchar(255) DEFAULT NULL,
  `companyAddress` varchar(255) DEFAULT NULL,
  `employmentType` varchar(255) DEFAULT NULL,
  `otherDegree` varchar(255) DEFAULT NULL,
  `tcAffiliation` varchar(256) DEFAULT NULL,
  `TCAffiliationBitMask` int(11) DEFAULT '0',
  `InterestsBitMask` int(11) DEFAULT '0',
  `ResourcesBitMask` int(11) DEFAULT '0',
  `yearsEmployed` varchar(30) DEFAULT NULL,
  `currentEducation` varchar(255) DEFAULT NULL,
  `college` varchar(255) DEFAULT NULL,
  `locationCollege` varchar(255) DEFAULT NULL,
  `graduationDate` varchar(255) DEFAULT NULL,
  `tcAffiliation_other` varchar(255) DEFAULT NULL,
  `interest_other` varchar(255) DEFAULT NULL,
  `resource_other` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `firstname`, `lastname`, `username`, `password`, `email`, `dob`, `phonenumber`, `userType`, `education`, `degree`, `professions`, `status`, `companyName`, `jobTitle`, `jobResponisibility`, `interest`, `matchStatus`, `resource`, `yearsProfession`, `numCandidate`, `prevJobs`, `pursuingDegree`, `otherInfo`, `companyAddress`, `employmentType`, `otherDegree`, `tcAffiliation`, `TCAffiliationBitMask`, `InterestsBitMask`, `ResourcesBitMask`, `yearsEmployed`, `currentEducation`, `college`, `locationCollege`, `graduationDate`, `tcAffiliation_other`, `interest_other`, `resource_other`) VALUES
(16, 'frank', 'guo', 'frankguo112', '123', 'frankguo1123@gmail.com', '1994-11-04', '1231123122', 0, 'Penn State', 'Did not graduate High School', 'Computer Dude', 'Deactivated User', 'JP Morgan', 'Software Engineer', 'Test this web', '1', 1, '1', '1 - 3 years', '1 - 2', 'ah', 'NO', '', '277 Park Ave', 'Looking for employment', 'PHD', '2', 2, 302, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Frank', 'Guo', 'frankguo', '123', 'frankguo11@Gmail.com', '1884-11-11', '1234567890', 0, 'sdaf', 'Did not graduate High School', 'adsf', 'Pending Review', 'JP MORGAN', 'Web Dev', 'Code', '3', 1, '3', '3 - 5 years', '1 - 2', 'adsf', 'as', 'a', '277 Park Ave', 'Currently employed, looking to make a change', 'asd', '1', 3, 928, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'John', 'Doe', 'johndoe', '123', 'JohnDoe@gmail.com', '1994-11-04', '71822222222', 0, 'Harvard', 'Did not graduate High School', 'Writer', 'Approved Member', 'JP', 'Engineer', 'Code', '1', 0, '1', '3 - 5 years', '1 - 2', 'Morgan Stanley', 'PHD', 'NO', '277', 'Looking for employment', 'PHD', '0', 13, 400, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Sohom', 'Bhattacharya', 'sohomyo', '123', 'sohom@jpmchase.com', '1990-04-24', '1119991111', 0, '', 'Bachelors Degree', '', 'Approved Member', '', '', '', '0', 1, '1', '<1 year', '1 - 2', '', '', '', '', 'Looking for employment', '', '3', 12, 32, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Zach', 'Zbranak', 'zzbranak', '123', 'zzbranak@me.com', '1000-01-01', '8675309', 1, 'The University of South Carolina', 'Did not graduate High School', '', 'Approved Member', 'JPMorgan Chase & Co.', 'Analyst', 'Threat Intelligence ', '0', 1, '1', '<1 year', '1 - 2', 'Intern', 'No', 'No', '270 Park Avenue', 'Looking for employment', 'No', '3', NULL, 515, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Steve', 'Steves', 'steve', 'abc12345', 'steves@gmail.com', '1111-11-11', '1231231232', 0, '', 'Associates Degree', '', 'Pending Review', '', '', '', '7', 0, '3', '<1 year', '1 - 2', '', '', '', '', 'Looking for employment', '', '3', 3, 532, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'John', 'John', 'john123', 'abc123456', 'john@a.com', '1990-04-04', '1232138238', 0, '', 'Did not graduate High School', '', 'Deactivated User', '', '', '', '4', 0, '1', '<1 year', '1 - 2', '', '', '', '', 'Looking for employment', '', '0', 4, 1029, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'John', 'Doe', 'adfdfdf', '12321313213', 'j@a.com', '1997-02-05', '7180239999', 0, '', 'Did not graduate High School', '', 'Pending Review', '', '', '', NULL, 0, NULL, '<1 year', '1 - 2', '', '', '', '', 'Looking for employment', '', NULL, 14, 2730, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'stcy', 'sz', 'asdfads', '123456789', 'sz@a.com', '0080-02-02', '2131231232', 1, 'sadfdsfasdf', 'Did not graduate High School', 'Student', 'Approved Member', 'abc dfsdf', 'stuff', 'Skfjsadlfsdl', '5', 0, '1', '3 - 5 years', '1 - 2', 'dsafdsfasdf', 'sdafdsf', 'sdafasdfsdf', '239021n', 'Looking for employment', 'asdfsdf', '1', 14, 928, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'sdaf', 'sdafas', 'asdfasdkl', '24121231231', 'assdafas@c.com', '1997-12-22', '1234213121', 0, '', 'Did not graduate High School', '', 'Deactivated User', '', '', '', '2', 0, '0', '<1 year', '1 - 2', '', '', '', '', 'Looking for employment', '', '2', 0, 68, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'asdfasdf', 'sdfasdf', '232121', '12411241212', 'sdf@a.com', '1998-02-28', '2183728382', 0, '', 'Did not graduate High School', '', 'Pending Review', '', '', '', '0', 0, '0', '<1 year', '1 - 2', '', '', '', '', 'Looking for employment', '', '0', 3, 3, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'asdf', 'asdf', '34234213123', '213213123', 'afdsdf@c.com', '1993-03-03', '3221321322', 0, '', 'Did not graduate High School', '', 'Pending Review', '', '', '', '0', 0, '0', '<1 year', '1 - 2', '', '', '', '', 'Looking for employment', '', '0', 3, 3, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'aasd', 'asd', 'sdafsda', 'dfsafdsf', 'd@x.com', '1993-03-03', '8237288392', 0, '', 'Masters Degree', '', 'Pending Review', '', '', '', '0', 0, '0', '<1 year', '1 - 2', '', '', '', '', 'Currently employed, looking to make a change', '', '0', 1, 1, 1, '<1 year', 'In the workforce/post college', '', '', '', NULL, NULL, NULL),
(42, 'pldof', 'pdfn', '43potjgs', '32234234', 'clbkckvlb@a.com', '1993-04-03', '3493494393', 0, '', 'Associates Degree', '', 'Pending Review', '', '', '', '1', 0, '1', '<1 year', '1 - 2', '', '', '', '', 'Looking for employment', '', '1', 2, 2, 2, '<1 year', 'In the workforce/post college', '', '', '', NULL, NULL, NULL),
(43, 'sample', 'adsf', 'kdfjsljf', 'fjdsjfdsf', 'q@a.com', '1993-03-04', '4532343434', 0, '', 'Masters Degree', '', 'Pending Review', '', '', '', '1', 0, '1', '<1 year', '1 - 2', '', '', '', '', 'Not looking but interested in networking', '', '1', 14, 14, 14, '<1 year', 'In the workforce/post college', '', '', '', NULL, NULL, NULL),
(44, 'ferrrrr', 'dfdfdf', 'efdsfa', '324234234123', 'sfg@z.com', '1993-02-23', '3424242423', 0, '', 'Bachelors Degree', '', 'Pending Review', '', '', '', '1,\n3,\n5', 0, '1,\n3', '<1 year', '1 - 2', '', '', '', '', 'Looking for employment', '', '1,\n3', 10, 42, 10, '<1 year', 'In the workforce/post college', '', '', '', NULL, NULL, NULL),
(45, 'adsf', 'dsfasdf', 'dfdfd', '323232323', 'd@a.com', '1922-03-03', '2321312321', 0, '', 'Bachelors Degree', '', 'Pending Review', '', '', '', '7,\n9', 0, '1,\n2,\n5', '<1 year', '1 - 2', '', '', '', '', 'Currently employed, looking to make a change', '', '5,\nStuff', 0, 640, 6, '<1 year', 'In the workforce/post college', '', '', '', NULL, NULL, NULL),
(46, 'adsf', 'dsfasdf', 'dfdfd', '323232323', 'd@a.com', '1922-03-03', '2321312321', 0, '', 'Bachelors Degree', '', 'Pending Review', '', '', '', '7,\n9', 0, '1,\n2,\n5', '<1 year', '1 - 2', '', '', '', '', 'Currently employed, looking to make a change', '', '5', 0, 640, 6, '<1 year', 'In the workforce/post college', '', '', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `UserType`
--

CREATE TABLE `usertype` (
  `typeId` int(11) NOT NULL,
  `Description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `UserType`
--

INSERT INTO `usertype` (`typeId`, `Description`) VALUES
(0, 'Mentee'),
(1, 'Mentor'),
(2, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Connections`
--
ALTER TABLE `connections`
  ADD PRIMARY KEY (`connectionId`),
  ADD KEY `mentorId` (`mentorId`),
  ADD KEY `menteeId` (`menteeId`);

--
-- Indexes for table `Feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedbackId`);

--
-- Indexes for table `PotentialConnections`
--
ALTER TABLE `potentialconnections`
  ADD PRIMARY KEY (`PotentialConnectionsId`);

--
-- Indexes for table `TC_Feedbacks`
--
ALTER TABLE `tc_feedbacks`
  ADD PRIMARY KEY (`feedbackId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userType` (`userType`)

--
-- Indexes for table `UserType`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`typeId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Connections`
--
ALTER TABLE `connections`
  MODIFY `connectionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `Feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedbackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `PotentialConnections`
--
ALTER TABLE `potentialconnections`
  MODIFY `PotentialConnectionsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `TC_Feedbacks`
--
ALTER TABLE `tc_feedbacks`
  MODIFY `feedbackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Connections`
--
ALTER TABLE `connections`
  ADD CONSTRAINT `connections_ibfk_1` FOREIGN KEY (`mentorId`) REFERENCES `Users` (`ID`),
  ADD CONSTRAINT `connections_ibfk_2` FOREIGN KEY (`menteeId`) REFERENCES `Users` (`ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`userType`) REFERENCES `UserType` (`typeId`);
