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
(4, 'Music', 'Low', '2018-03-27');

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
(1, 1, '30', '50', '60', '70', '70'),
(2, 2, '10', '11', '8', '7', '11'),
(3, 3, '3', '4', '5', '8', '5'),
(4, 4, '1', '5', '4', '6', '5');

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
(1, 1, 'How many sports were included in the Pyeong Chang 2018 Winter Olympic Games?', 'Less than half the number of sports in the Rio 2016 Summer Olympic Games.'),
(2, 1, 'HOW MANY PLAYERS IN A FOOTBALL TEAM?', 'MORE THAN FIVE'),
(3, 1, 'Futsal Team player count?', 'Less then 11'),
(4, 2, 'How many Plants if you have 5 pots?', 'Think');

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
  ADD CONSTRAINT `OPTIONS_FK` FOREIGN KEY (`questionID`) REFERENCES `questions` (`questionID`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `REULTS_CATEGORY_FK` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`),
  ADD CONSTRAINT `REULTS_FK` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `REULTS_QUESTIONS_FK` FOREIGN KEY (`questionID`) REFERENCES `questions` (`questionID`);

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `SCORES_CATEGORY_FK` FOREIGN KEY (`categoryID`) REFERENCES `results` (`categoryID`),
  ADD CONSTRAINT `SCORES_USER_FK` FOREIGN KEY (`userID`) REFERENCES `results` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
