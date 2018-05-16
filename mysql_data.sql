-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 16, 2018 at 03:07 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `local`
--

--
-- Dumping data for table `Connections`
--

INSERT INTO `Connections` (`connectionId`, `mentorId`, `menteeId`, `createdDate`, `lastConnected`) VALUES
(43, 26, 25, '05/03/2018', '05/09/2018'),
(48, 26, 16, '05/14/2018', '05/14/2018');

--
-- Dumping data for table `Feedbacks`
--

INSERT INTO `Feedbacks` (`feedbackId`, `SenderId`, `ReceiverId`, `Rating`, `Description`, `dateCommented`, `connectionId`) VALUES
(28, 26, 25, 5, 'sdf', '05/09/2018', 43);

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

--
-- Dumping data for table `PotentialConnections`
--

INSERT INTO `PotentialConnections` (`PotentialConnectionsId`, `mentorId`, `menteeId`, `matchScore`) VALUES
(121, 26, 19, 60);

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

--
-- Dumping data for table `TC_Feedbacks`
--

INSERT INTO `TC_Feedbacks` (`feedbackId`, `profileId`, `Description`, `createdDate`) VALUES
(1, 21, 'as', '05/01/2018'),
(2, 20, 'Please Review Us with Feedback\r\n', '05/01/2018'),
(3, 21, 'Hey Please Email Us', '05/01/2018'),
(5, 26, 'hey update your feedback', '05/01/2018');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `firstname`, `lastname`, `username`, `password`, `email`, `dob`, `phonenumber`, `userType`, `education`, `degree`, `professions`, `status`, `companyName`, `jobTitle`, `jobResponisibility`, `interest`, `matchStatus`, `resource`, `yearsProfession`, `numCandidate`, `prevJobs`, `pursuingDegree`, `otherInfo`, `companyAddress`, `employmentType`, `otherDegree`, `tcAffiliation`) VALUES
(16, 'frank', 'guo', 'frankguo112', '123', 'frankguo1123@gmail.com', '1994-11-04', '1231123122', 0, 'Penn State', 'Did not graduate High School', 'Computer Dude', 'Approved Member', 'JP Morgan', 'Software Engineer', 'Test this web', 1, 1, 1, '1 - 3 years', '1 - 2', 'ah', 'NO', '', '277 Park Ave', 'Looking for employment', 'PHD', 2),
(18, 'Frank', 'Guo', 'frankguo', '123', 'frankguo11@Gmail.com', '1884-11-11', '1234567890', 0, 'sdaf', 'Did not graduate High School', 'adsf', 'Approved Member', 'JP MORGAN', 'Web Dev', 'Code', 3, 1, 3, '3 - 5 years', '1 - 2', 'adsf', 'as', 'a', '277 Park Ave', 'Currently employed, looking to make a change', 'asd', 1),
(19, 'John', 'Doe', 'johndoe', '123', 'JohnDoe@gmail.com', '1994-11-04', '71822222222', 0, 'Harvard', 'Did not graduate High School', 'Writer', 'Pending Review', 'JP', 'Engineer', 'Code', 1, 0, 1, '3 - 5 years', '1 - 2', 'Morgan Stanley', 'PHD', 'NO', '277', 'Looking for employment', 'PHD', 0),
(25, 'Sohom', 'Bhattacharya', 'sohomyo', '123', 'sohom@jpmchase.com', '1990-04-24', '1119991111', 0, '', 'Bachelors Degree', '', 'Approved Member', '', '', '', 0, 1, 1, '<1 year', '1 - 2', '', '', '', '', 'Looking for employment', '', 3),
(26, 'Zach', 'Zbranak', 'zzbranak', '123', 'zzbranak@me.com', '1000-01-01', '8675309', 1, 'The University of South Carolina', 'Did not graduate High School', '', 'Approved Member', 'JPMorgan Chase & Co.', 'Analyst', 'Threat Intelligence ', 0, 1, 1, '<1 year', '1 - 2', 'Intern', 'No', 'No', '270 Park Avenue', 'Looking for employment', 'No', 3),
(27, 'asdfasd', '', '', '', '', '', '', 1, '', 'Did not graduate High School', '', 'Pending Review', '', '', '', NULL, 0, NULL, '<1 year', '1 - 2', '', '', '', '', 'Looking for employment', '', NULL);

--
-- Dumping data for table `UserType`
--

INSERT INTO `UserType` (`typeId`, `Description`) VALUES
(0, 'Mentee'),
(1, 'Mentor'),
(2, 'Admin');
