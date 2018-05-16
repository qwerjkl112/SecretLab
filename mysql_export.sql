-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 16, 2018 at 03:01 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `Interests`
--

CREATE TABLE `Interests` (
  `interest_id` int(11) NOT NULL,
  `Description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `Resources`
--

CREATE TABLE `Resources` (
  `resourcesId` int(11) NOT NULL,
  `Description` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TCAffiliation`
--

CREATE TABLE `TCAffiliation` (
  `tcaffiliationId` int(11) NOT NULL,
  `Description` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `tcAffiliation` int(11) DEFAULT '4'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `UserType`
--

CREATE TABLE `UserType` (
  `typeId` int(11) NOT NULL,
  `Description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  MODIFY `connectionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `Feedbacks`
--
ALTER TABLE `Feedbacks`
  MODIFY `feedbackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `PotentialConnections`
--
ALTER TABLE `PotentialConnections`
  MODIFY `PotentialConnectionsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `TC_Feedbacks`
--
ALTER TABLE `TC_Feedbacks`
  MODIFY `feedbackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
