-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 29, 2018 at 02:48 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiztest`
--
CREATE Database `quizmania`;
-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(3) NOT NULL,
  `categoryTitle` varchar(25) NOT NULL,
  `categoryLevel` varchar(20) DEFAULT NULL,
  `dateUpdated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryTitle`, `categoryLevel`, `dateUpdated`) VALUES
(1, 'Sports', 'Low', '2018-03-22'),
(2, 'Biology', 'Intermediate', '2018-03-23'),
(3, 'Maths', 'Low', '2018-03-26'),
(4, 'Music', 'Low', '2018-03-27'),
(5, 'History', 'High', '2018-03-12'),
(6, 'Networking', 'Low', '2018-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `optionID` int(3) NOT NULL,
  `questionID` int(3) NOT NULL,
  `option_one` varchar(50) NOT NULL,
  `option_two` varchar(50) NOT NULL,
  `option_three` varchar(50) NOT NULL,
  `option_four` varchar(50) NOT NULL,
  `correct_option` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`optionID`, `questionID`, `option_one`, `option_two`, `option_three`, `option_four`, `correct_option`) VALUES
(1, 1, '28', '50', '60', '15', '15'),
(2, 2, '10', '11', '8', '7', '11'),
(3, 3, '3', '4', '5', '8', '5'),
(4, 4, '1', '5', '4', '6', '5'),
(5, 5, 'Liberia','Norway','New Zealand','Burma','Liberia'),
(6, 6,'1806','1866','1896','1836','1896'),
(7,7,'Napoleonic Wars','World War I','Mongol invasions of Japan','Bosnian War','World War I'),
(8,8, 'Thirty Years War','Spanish conquest of the Aztec Empire','Franco-Dutch War','French Wars of Religion','French Wars of Religion'),
(9,8,'1533-1603','1808-1873','1633-1703','1769-1849','1633-1703'),
(10,9,'Invasion of Tibet','Algerian War','Romanian Revolution','Turkish War of Independence','Invasion of Tibet'),
(11,10,'Alexander Hamilton','Pancho Villa','Francis Drake','John Cabot','Alexander Hamilton'),
(12,11,'St. John','St. Bartholomew','St. Andrew','St. Peter','St. Peter'),
(13,12,'Athens criteria','Valencia criteria','Copenhagen criteria','Bristol criteria','Valencia criteria'),
(14, 13, 'Spain','Portugal','United Kingdom','France','Spain'),
(15,15,'30','15','30','22','28'),
(16,16,'England','Italy','Ireland','France','Ireland'),
(17,17,'6','3','1','5','6'),
(18,18,'9.40s','9.90s','9.58s','10.00s','9.58s'),
(19,19,'Beijing','Tokyo','Barcelona','Warsaw','Tokyo'),
(20,20,'10ft','8ft','7.5ft','11ft','10ft'),
(21,21,'Dame Jessica Ennis-Hall','Sir Mo Farrah','Sir Rodger Bannister','Sir Chris Hoy','Sir Rodger Bannister'),
(22,22,'Spain','France','Romania','Norway','France'),
(23, 23, '32 bits','128 bytes','64 bits','128 bits','128 bits'),
(24, 24,'NAT','Static','Dynamic','PAT','PAT'),
(25,25,'copy running backup','copy running-config startup-config','config mem','wr mem','copy running-config startup-config'),
(26,26,'100 kbps','1 Mbps','2 Mbps','10 Mbps','10 Mbps'),
(27, 27, 'NCP','ISDN','HDLC','LCP','NCP'),
(28, 28, 'line telnet 0 4','line aux 0 4','line vty 0 4','line con 0','line vty 0 4'),
(29,29,'IP','TCP','UDP','ARP','UDP'),
(30,30,'show access-lists','show interface','show ip interface','show interface access-lists','show ip interface'),
(31,31,'Session layer','Physical layer','Data Link layer','Application layer','Physical layer'),
(32,32,'TCP','ARP','ICMP','BootP','ICMP');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questionID` int(3) NOT NULL,
  `categoryID` int(3) NOT NULL,
  `questionOutput` longtext NOT NULL,
  `questionHint` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionID`, `categoryID`, `questionOutput`, `questionHint`) VALUES
(1, 1, 'How many sports were included in the Pyeong Chang 2018 Winter Olympic Games?', 'Almost half the number of sports in the Rio 2016 Summer Olympic Games.'),
(2, 1, 'HOW MANY PLAYERS IN A FOOTBALL TEAM?', 'MORE THAN FIVE'),
(3, 1, 'Futsal Team player count?', 'Less then 11'),
(4, 2, 'How many Plants if you have 5 pots?', 'Think'),
(5, 5, 'President William Tubman is or was a leader in which country?', 'Within Africa'),
(6, 5, 'When did the Anglo-Zanzibar War happen?', ''),
(7, 5, 'Brusilov Offensive occurred in which war or conflict?', 'It began in 1914'),
(8, 5, 'Which conflict occurred in the years 1562-1598?', ''),
(9, 5, 'When did Samuel Pepys live? ', ''),
(10, 5, 'Which conflict occurred in the years 1950-1951?', 'Involved the Peoples Republic of China'),
(11, 5, 'Which historical figure lived between the years ~1755/1757-1804?', 'They were American'),
(12, 5, 'According to the Roman Catholic Church, who was their first pope?', ''),
(13, 5, 'Since 1993, the criteria that define whether a country is eligible to join the European Union, is named after which city?', 'In Spain'),
(14, 5, 'Peru (1821) gained its independence from which country?', ''),
(15, 1, 'How many sports were included in the Rio 2016 Summer Olympic Games?', 'Less than 30'),
(16, 1, 'What country won the 2018 Six Nations Rugby Championship', 'Within British Isles'),
(17, 1, 'In American and Canadian Football how many points does a team earn with a touch down?', ''),
(18, 1, 'What is the current Mens 100m world record?','within 9.5 and 10 seconds'),
(19, 1, 'Where will the 2020 Summer Olympic Games take place?', 'In Asia'),
(20,1, 'How high off the ground does the Basketball rim in the unit of measurement of feet?', 'around 3 metres'),
(21,1,'Who was the first British person to run 1 mile in under 4 minutes?', ''),
(22, 1, 'What country won the IHF World Womens Handball Championship in 2017?', ''),
(23, 6, 'How long is an IPv6 address?', ''),
(24, 6, 'What flavor of Network Address Translation can be used to have one IP address allow many users to connect to the global Internet?',''),
(25, 6, 'What command is used to create a backup configuration?',''),
(26, 6, 'You have 10 users plugged into a hub running 10Mbps half-duplex. There is a server connected to the switch running 10Mbps half-duplex as well. How much bandwidth does each host have to the server?', ''),
(27, 6, 'What protocol does PPP use to identify the Network layer protocol?',''),
(28, 6, 'Which of the following commands will allow you to set your Telnet password on a Cisco router?', ''),
(29,6, 'Which protocol does DHCP use at the Transport layer?', ''),
(30, 6, 'Which command is used to determine if an IP access list is enabled on a particular interface?', ''),
(31,6, 'Where is a hub specified in the OSI model?', ''),
(32, 6, 'Which protocol is used to send a destination network unknown message back to originating hosts?', '');
-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `resultID` int(3) NOT NULL,
  `userID` int(5) NOT NULL,
  `questionID` int(3) NOT NULL,
  `categoryID` int(3) NOT NULL,
  `option_chosen` varchar(50) NOT NULL,
  `correct_option` varchar(50) NOT NULL,
  `isCorrect` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`resultID`, `userID`, `questionID`, `categoryID`, `option_chosen`, `correct_option`, `isCorrect`) VALUES
(1, 5, 1, 1, '70', '70', 1),
(2, 5, 2, 1, '10', '11', 0),
(3, 5, 3, 1, '5', '5', 1),
(4, 6, 3, 1, '5', '5', 1),
(5, 6, 2, 1, '11', '11', 1),
(6, 6, 1, 1, '30', '70', 0),
(7, 5, 4, 2, '5', '5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `scoreID` int(3) NOT NULL,
  `userID` int(5) NOT NULL,
  `categoryID` int(3) NOT NULL,
  `score` int(3) NOT NULL,
  `lastModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`scoreID`, `userID`, `categoryID`, `score`, `lastModified`) VALUES
(41, 5, 1, 2, '2018-03-29 12:39:21'),
(42, 5, 2, 1, '2018-03-29 12:39:21'),
(43, 6, 1, 2, '2018-03-29 12:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(5) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `users_password` varchar(256) NOT NULL,
  `adminAccess` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstName`, `lastName`, `email`, `username`, `users_password`, `adminAccess`) VALUES
(5, 'first', 'last', 'email@email.com', 'username', '$2y$10$J3eR7Wevnxzj8LBYtX0QT.HGI7jZ7FI1FrVSaBFcGAEqKicYkR02O', 0),
(6, 'admin', 'password', 'adminpassword@email.com', 'admin', '$2y$10$kV1beZzhQwwjqaIFTvIq8OX3D3XHjJul7pgxiPOLXZ87mZxtJQcgW', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`optionID`),
  ADD KEY `OPTIONS_FK` (`questionID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questionID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`resultID`,`userID`,`categoryID`) USING BTREE,
  ADD KEY `REULTS_FK` (`userID`),
  ADD KEY `REULTS_QUESTIONS_FK` (`questionID`),
  ADD KEY `REULTS_CATEGORY_FK` (`categoryID`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`scoreID`),
  ADD KEY `SCORES_USER_FK` (`userID`),
  ADD KEY `SCORES_CATEGORY_FK` (`categoryID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `optionID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questionID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `resultID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `scoreID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `OPTIONS_FK` FOREIGN KEY (`questionID`) REFERENCES `questions` (`questionID`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`) ON DELETE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `REULTS_CATEGORY_FK` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`) ON DELETE CASCADE,
  ADD CONSTRAINT `REULTS_FK` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `REULTS_QUESTIONS_FK` FOREIGN KEY (`questionID`) REFERENCES `questions` (`questionID`) ON DELETE CASCADE;

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `SCORES_CATEGORY_FK` FOREIGN KEY (`categoryID`) REFERENCES `results` (`categoryID`) ON DELETE CASCADE,
  ADD CONSTRAINT `SCORES_USER_FK` FOREIGN KEY (`userID`) REFERENCES `results` (`userID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
