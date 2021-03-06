-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2018 at 03:58 PM
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

CREATE TABLE `Connections` (
  `connectionId` int(11) NOT NULL,
  `mentorId` int(11) NOT NULL,
  `menteeId` int(11) NOT NULL,
  `createdDate` varchar(200) DEFAULT NULL,
  `lastConnected` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Connections`
--

INSERT INTO `Connections` (`connectionId`, `mentorId`, `menteeId`, `createdDate`, `lastConnected`) VALUES
(43, 26, 25, '05/03/2018', '05/09/2018'),
(49, 26, 19, '05/16/2018', '05/16/2018'),
(50, 26, 16, '05/16/2018', '05/24/2018');

-- --------------------------------------------------------

--
-- Table structure for table `Feedbacks`
--

CREATE TABLE `Feedbacks` (
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

INSERT INTO `Feedbacks` (`feedbackId`, `SenderId`, `ReceiverId`, `Rating`, `Description`, `dateCommented`, `connectionId`) VALUES
(28, 26, 25, 5, 'sdf', '05/09/2018', 43),
(30, 26, 19, 5, 'dsaf', '05/16/2018', 49),
(31, 16, 26, 5, 'Great experience', '05/24/2018', 50),
(32, 16, 26, 4, 'I lied', '05/24/2018', 50);

-- --------------------------------------------------------

--
-- Table structure for table `Interests`
--

CREATE TABLE `Interests` (
  `interest_id` int(11) NOT NULL,
  `Description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Interests`
--

INSERT INTO `Interests` (`interest_id`, `Description`) VALUES
(0, 'Finance'),
(1, 'Non Profit'),
(2, 'Human Resources'),
(3, 'Retail'),
(4, 'Law'),
(5, 'Media'),
(6, 'Education'),
(7, 'Publishing'),
(8, 'Journaling'),
(9, 'Advertising'),
(10, 'Marketing'),
(11, 'PR'),
(12, 'Technology'),
(13, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `PotentialConnections`
--

CREATE TABLE `PotentialConnections` (
  `PotentialConnectionsId` int(11) NOT NULL,
  `mentorId` int(11) NOT NULL,
  `menteeId` int(11) NOT NULL,
  `matchScore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PotentialConnections`
--

INSERT INTO `PotentialConnections` (`PotentialConnectionsId`, `mentorId`, `menteeId`, `matchScore`) VALUES
(26, 33, 32, 108),
(27, 26, 32, 90),
(28, 33, 30, 85),
(29, 33, 27, 78),
(30, 33, 25, 76),
(31, 33, 19, 56),
(32, 33, 18, 40),
(33, 26, 18, 36),
(34, 33, 16, 33);

-- --------------------------------------------------------

--
-- Table structure for table `Resources`
--

CREATE TABLE `Resources` (
  `resourcesId` int(11) NOT NULL,
  `Description` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Resources`
--

INSERT INTO `Resources` (`resourcesId`, `Description`) VALUES
(0, 'Resume Writing'),
(1, 'Networking'),
(2, 'Career Advancement'),
(3, 'Career Change'),
(4, 'General Professional Help'),
(5, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `TCAffiliation`
--

CREATE TABLE `TCAffiliation` (
  `tcaffiliationId` int(11) NOT NULL,
  `Description` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TCAffiliation`
--

INSERT INTO `TCAffiliation` (`tcaffiliationId`, `Description`) VALUES
(0, '9/11 Family Member'),
(1, 'First Responder/First Responder Family Member'),
(2, 'Military'),
(3, 'Volunteer'),
(4, 'Prefer not to answer'),
(5, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `TC_Feedbacks`
--

CREATE TABLE `TC_Feedbacks` (
  `feedbackId` int(11) NOT NULL,
  `profileId` int(11) NOT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `createdDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TC_Feedbacks`
--

INSERT INTO `TC_Feedbacks` (`feedbackId`, `profileId`, `Description`, `createdDate`) VALUES
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
  `interest` int(11) DEFAULT '0',
  `matchStatus` int(11) NOT NULL DEFAULT '0',
  `resource` int(11) DEFAULT NULL,
  `yearsProfession` varchar(255) DEFAULT NULL,
  `numCandidate` varchar(255) DEFAULT NULL,
  `prevJobs` varchar(255) DEFAULT NULL,
  `pursuingDegree` varchar(255) DEFAULT NULL,
  `otherInfo` varchar(255) DEFAULT NULL,
  `companyAddress` varchar(255) DEFAULT NULL,
  `employmentType` varchar(255) DEFAULT NULL,
  `otherDegree` varchar(255) DEFAULT NULL,
  `tcAffiliation` int(11) DEFAULT '4',
  `TCAffiliationBitMask` int(11) DEFAULT '0',
  `InterestsBitMask` int(11) DEFAULT '0',
  `ResourcesBitMask` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `firstname`, `lastname`, `username`, `password`, `email`, `dob`, `phonenumber`, `userType`, `education`, `degree`, `professions`, `status`, `companyName`, `jobTitle`, `jobResponisibility`, `interest`, `matchStatus`, `resource`, `yearsProfession`, `numCandidate`, `prevJobs`, `pursuingDegree`, `otherInfo`, `companyAddress`, `employmentType`, `otherDegree`, `tcAffiliation`, `TCAffiliationBitMask`, `InterestsBitMask`, `ResourcesBitMask`) VALUES
(16, 'frank', 'guo', 'frankguo112', '123', 'frankguo1123@gmail.com', '1994-11-04', '1231123122', 0, 'Penn State', 'Did not graduate High School', 'Computer Dude', 'Approved Member', 'JP Morgan', 'Software Engineer', 'Test this web', 1, 1, 1, '1 - 3 years', '1 - 2', 'ah', 'NO', '', '277 Park Ave', 'Looking for employment', 'PHD', 2, 2, 302, 12),
(18, 'Frank', 'Guo', 'frankguo', '123', 'frankguo11@Gmail.com', '1884-11-11', '1234567890', 0, 'sdaf', 'Did not graduate High School', 'adsf', 'Pending Review', 'JP MORGAN', 'Web Dev', 'Code', 3, 1, 3, '3 - 5 years', '1 - 2', 'adsf', 'as', 'a', '277 Park Ave', 'Currently employed, looking to make a change', 'asd', 1, 3, 928, 13),
(19, 'John', 'Doe', 'johndoe', '123', 'JohnDoe@gmail.com', '1994-11-04', '71822222222', 0, 'Harvard', 'Did not graduate High School', 'Writer', 'Approved Member', 'JP', 'Engineer', 'Code', 1, 0, 1, '3 - 5 years', '1 - 2', 'Morgan Stanley', 'PHD', 'NO', '277', 'Looking for employment', 'PHD', 0, 13, 400, 14),
(25, 'Sohom', 'Bhattacharya', 'sohomyo', '123', 'sohom@jpmchase.com', '1990-04-24', '1119991111', 0, '', 'Bachelors Degree', '', 'Approved Member', '', '', '', 0, 1, 1, '<1 year', '1 - 2', '', '', '', '', 'Looking for employment', '', 3, 12, 32, 14),
(26, 'Zach', 'Zbranak', 'zzbranak', '123', 'zzbranak@me.com', '1000-01-01', '8675309', 1, 'The University of South Carolina', 'Did not graduate High School', '', 'Approved Member', 'JPMorgan Chase & Co.', 'Analyst', 'Threat Intelligence ', 0, 1, 1, '<1 year', '1 - 2', 'Intern', 'No', 'No', '270 Park Avenue', 'Looking for employment', 'No', 3, NULL, 515, 12),
(27, 'Steve', 'Steves', 'steve', 'abc12345', 'steves@gmail.com', '1111-11-11', '1231231232', 0, '', 'Associates Degree', '', 'Pending Review', '', '', '', 7, 0, 3, '<1 year', '1 - 2', '', '', '', '', 'Looking for employment', '', 3, 3, 532, 10),
(30, 'John', 'John', 'john123', 'abc123456', 'john@a.com', '1990-04-04', '1232138238', 0, '', 'Did not graduate High School', '', 'Pending Review', '', '', '', 4, 0, 1, '<1 year', '1 - 2', '', '', '', '', 'Looking for employment', '', 0, 4, 1029, 8),
(32, 'John', 'Doe', 'adfdfdf', '12321313213', 'j@a.com', '1997-02-05', '7180239999', 0, '', 'Did not graduate High School', '', 'Pending Review', '', '', '', NULL, 0, NULL, '<1 year', '1 - 2', '', '', '', '', 'Looking for employment', '', NULL, 14, 2730, 15),
(33, 'stcy', 'sz', 'asdfads', '123456789', 'sz@a.com', '0080-02-02', '2131231232', 1, 'sadfdsfasdf', 'Did not graduate High School', 'Student', 'Pending Review', 'abc dfsdf', 'stuff', 'Skfjsadlfsdl', 5, 0, 1, '3 - 5 years', '1 - 2', 'dsafdsfasdf', 'sdafdsf', 'sdafasdfsdf', '239021n', 'Looking for employment', 'asdfsdf', 1, 14, 928, 14);

-- --------------------------------------------------------

--
-- Table structure for table `UserType`
--

CREATE TABLE `UserType` (
  `typeId` int(11) NOT NULL,
  `Description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `UserType`
--

INSERT INTO `UserType` (`typeId`, `Description`) VALUES
(0, 'Mentee'),
(1, 'Mentor'),
(2, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Connections`
--
ALTER TABLE `Connections`
  ADD PRIMARY KEY (`connectionId`),
  ADD KEY `mentorId` (`mentorId`),
  ADD KEY `menteeId` (`menteeId`);

--
-- Indexes for table `Feedbacks`
--
ALTER TABLE `Feedbacks`
  ADD PRIMARY KEY (`feedbackId`);

--
-- Indexes for table `Interests`
--
ALTER TABLE `Interests`
  ADD PRIMARY KEY (`interest_id`);

--
-- Indexes for table `PotentialConnections`
--
ALTER TABLE `PotentialConnections`
  ADD PRIMARY KEY (`PotentialConnectionsId`);

--
-- Indexes for table `Resources`
--
ALTER TABLE `Resources`
  ADD PRIMARY KEY (`resourcesId`);

--
-- Indexes for table `TCAffiliation`
--
ALTER TABLE `TCAffiliation`
  ADD PRIMARY KEY (`tcaffiliationId`);

--
-- Indexes for table `TC_Feedbacks`
--
ALTER TABLE `TC_Feedbacks`
  ADD PRIMARY KEY (`feedbackId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userType` (`userType`),
  ADD KEY `interest` (`interest`),
  ADD KEY `resource` (`resource`),
  ADD KEY `tcAffiliation` (`tcAffiliation`);

--
-- Indexes for table `UserType`
--
ALTER TABLE `UserType`
  ADD PRIMARY KEY (`typeId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Connections`
--
ALTER TABLE `Connections`
  MODIFY `connectionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `Feedbacks`
--
ALTER TABLE `Feedbacks`
  MODIFY `feedbackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `PotentialConnections`
--
ALTER TABLE `PotentialConnections`
  MODIFY `PotentialConnectionsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `TC_Feedbacks`
--
ALTER TABLE `TC_Feedbacks`
  MODIFY `feedbackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Connections`
--
ALTER TABLE `Connections`
  ADD CONSTRAINT `connections_ibfk_1` FOREIGN KEY (`mentorId`) REFERENCES `Users` (`ID`),
  ADD CONSTRAINT `connections_ibfk_2` FOREIGN KEY (`menteeId`) REFERENCES `Users` (`ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`userType`) REFERENCES `UserType` (`typeId`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`interest`) REFERENCES `Interests` (`interest_id`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`interest`) REFERENCES `Interests` (`interest_id`),
  ADD CONSTRAINT `users_ibfk_4` FOREIGN KEY (`resource`) REFERENCES `Resources` (`resourcesId`),
  ADD CONSTRAINT `users_ibfk_5` FOREIGN KEY (`tcAffiliation`) REFERENCES `TCAffiliation` (`tcaffiliationId`);
