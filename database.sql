CREATE TABLE UserType (
    typeId int NOT NULL PRIMARY KEY,
    Description varchar(100)
);

CREATE TABLE Users (
ID int AUTO_INCREMENT,
firstname varchar(200),
lastname varchar(200),
username varchar(200),
password varchar(200),
email varchar(200),
dob varchar(200), 
phonenumber varchar(200), 
userType int NOT NULL,
education varchar(255), 
degree varchar(200), 
professions varchar(255), 
status varchar(200) DEFAULT ('Pending Review'), 
companyName varchar(200), 
jobTitle varchar(200), 
jobResponisibility varchar(200),
interest int DEFAULT (0),
matchStatus int DEFAULT (0),
resource int, 
tcAffiliation int, 
yearsProfession varchar(255),
numCandidate varchar(255),
prevJobs varchar(255),
pursuingDegree varchar(255),
otherInfo varchar(255),
companyAddress varchar(255),
employmentType varchar(255),
otherDegree varchar(255),
PRIMARY KEY (ID),
FOREIGN KEY (userType) REFERENCES `UserType` (`typeId`),
FOREIGN KEY (interest) REFERENCES `Interests` (`interest_id`),
FOREIGN KEY (resource) REFERENCES `Resources` (`resourcesId`),
FOREIGN KEY (tcAffiliation) REFERENCES `TCAffiliation` (`tcaffiliationId`),
);

CREATE TABLE Connections (
    connectionId INT AUTO_INCREMENT,
    mentorId INT NOT NULL,
    menteeId INT NOT NULL,
    createdDate varchar(200),
    lastConnected varchar(200),
    PRIMARY KEY (connectionid), 
    FOREIGN KEY (mentorId) REFERENCES `Users` (`ID`),
    FOREIGN KEY (menteeId) REFERENCES `Users` (`ID`)
);

CREATE TABLE Interests (
interest_id int PRIMARY KEY, 
Description varchar(255)
);


CREATE TABLE PotentialConnections (
	PotentialConnectionsId int PRIMARY KEY AUTO_INCREMENT,
	mentorId INT NOT NULL,
	menteeId INT NOT NULL, 
	matchScore INT NOT NULL
);

CREATE TABLE TCAffiliation (
	tcaffiliationId int PRIMARY KEY,
	Description varchar(300)
);

CREATE TABLE Resources (
	resourcesId int PRIMARY KEY,
	Description varchar(300)
);

CREATE TABLE Feedbacks (
    feedbackId int PRIMARY KEY,
    SenderId int NOT NULL,
    ReceiverId int NOT NULL,
    Rating int,
    Description varchar(500),
    DateCommendted varchar(255)
);



INSERT INTO `Resources` (`resourcesId`, `Description`) VALUES ('0', 'Resume Writing'), ('1', 'Networking'),('2', 'Career Advancement'),('3', 'Career Change'),('4', 'General Professional Help'),('5', 'Other');

INSERT INTO `TCAffiliation` (`tcaffiliationId`, `Description`) VALUES 
('0', '9/11 Family Member'), ('1', 'First Responder/First Responder Family Member'),
('2', 'Military'), ('3', 'Volunteer'),('4', 'Prefer not to answer'),('5', 'Other');

INSERT INTO `Interests` (`interest_id`, `Description`) VALUES ('0', 'Finance'), 
('1', 'Non Profit'), ('2', 'Human Resources'), ('3', 'Retail'), ('4', 'Law'), ('5', 'Media'), 
('6', 'Education'), ('7', 'Publishing'), ('8', 'Journaling'), ('9', 'Advertising'), 
('10', 'Marketing'), ('11', 'PR'), ('12', 'Technology'), ('13', 'Other');



INSERT INTO `Users` (`ID`, `firstname`, `lastname`, `username`, `password`, `email`, `dob`, `phonenumber`, `userType`, `employmentField`, `education`, `degree`, `professions`, `affiliation`, `status`, `companyName`, `jobTitle`, `jobResponisibility`, `interest`) VALUES (NULL, 'Frank', 'Guo', 'qwerjkl112', 'abc123', 'qwerjkl112@gmail.com', '11/04/1994', '1234567890', '1', 'Software Engineer', 'School of Hard Knocks', 'PHD', 'Computer', NULL, NULL, 'JP Morgan & Chase', NULL, NULL, NULL);

SELECT `ID`, `firstname`, `lastname`, `username`, `password`, `email`, `dob`, `phonenumber`, `userType`, `employmentField`, `education`, `degree`, `professions`, `affiliation`, `status`, `companyName`, `jobTitle`, `jobResponisibility`, `interest` FROM `Users` WHERE 1

SELECT `connectionid`, `mentorId`, `menteeId`, `createdDate`, `lastConnected` FROM `Connections` 