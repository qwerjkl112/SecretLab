-- Marina, udpate users database

-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 30, 2018 at 10:52 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `local`
--

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

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`userType`) REFERENCES `UserType` (`typeId`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`interest`) REFERENCES `Interests` (`interest_id`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`interest`) REFERENCES `Interests` (`interest_id`),
  ADD CONSTRAINT `users_ibfk_4` FOREIGN KEY (`resource`) REFERENCES `Resources` (`resourcesId`),
  ADD CONSTRAINT `users_ibfk_5` FOREIGN KEY (`tcAffiliation`) REFERENCES `TCAffiliation` (`tcaffiliationId`);
