-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 13, 2021 at 12:42 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pfe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `adminID` int(11) NOT NULL AUTO_INCREMENT,
  `admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timeVisite` datetime NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminID`, `admin`, `password`, `timeVisite`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-07-13 11:25:12');

-- --------------------------------------------------------

--
-- Table structure for table `collegues`
--

DROP TABLE IF EXISTS `collegues`;
CREATE TABLE IF NOT EXISTS `collegues` (
  `UserID` int(11) NOT NULL,
  `CollegueID` int(11) NOT NULL,
  KEY `UserID` (`UserID`),
  KEY `CollegueID` (`CollegueID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `collegues`
--

INSERT INTO `collegues` (`UserID`, `CollegueID`) VALUES
(33, 11),
(1, 11),
(1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

DROP TABLE IF EXISTS `conversations`;
CREATE TABLE IF NOT EXISTS `conversations` (
  `mainConvID` int(11) NOT NULL AUTO_INCREMENT,
  `user1ID` int(11) NOT NULL,
  `user2ID` int(11) NOT NULL,
  `user1Visite` datetime DEFAULT NULL,
  `user2Visite` datetime DEFAULT NULL,
  PRIMARY KEY (`mainConvID`),
  KEY `user1ID` (`user1ID`),
  KEY `user2ID` (`user2ID`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`mainConvID`, `user1ID`, `user2ID`, `user1Visite`, `user2Visite`) VALUES
(24, 33, 11, '2021-06-24 22:54:02', '2021-06-24 22:54:23'),
(25, 1, 11, '2021-06-30 13:04:23', '2021-07-03 19:41:03'),
(26, 36, 1, '2021-07-13 00:00:50', '2021-07-13 00:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `fileupload`
--

DROP TABLE IF EXISTS `fileupload`;
CREATE TABLE IF NOT EXISTS `fileupload` (
  `GroupID` int(11) DEFAULT NULL,
  `StudentID` int(11) DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Time` datetime DEFAULT NULL,
  KEY `GroupID` (`GroupID`),
  KEY `StudentID` (`StudentID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fileupload`
--

INSERT INTO `fileupload` (`GroupID`, `StudentID`, `file_name`, `Time`) VALUES
(21, 11, 'test', '2021-07-12 22:51:58'),
(21, 11, 'test', '2021-07-12 22:51:58'),
(21, 11, 'test', '2021-07-11 22:51:58'),
(21, 11, 'test', '2021-07-11 22:51:58'),
(21, 11, 'test', '2021-07-11 22:51:58'),
(21, 11, 'test', '2021-07-11 22:51:58'),
(21, 11, 'test', '2021-07-11 22:51:58'),
(21, 11, 'test', '2021-07-11 22:51:58'),
(21, 11, 'test', '2021-07-11 22:51:58'),
(21, 11, 'test', '2021-07-11 22:51:58'),
(21, 11, 'test', '2021-07-11 22:51:58'),
(21, 11, 'test', '2021-07-11 22:51:58'),
(21, 11, 'test', '2021-07-11 22:51:58'),
(21, 11, 'test', '2021-07-11 22:51:58'),
(21, 11, 'test', '2021-07-11 22:51:58'),
(17, 12, '12-Securite-controle_2015_2016.pdf', '2021-07-10 22:51:58'),
(17, 33, '33-rattrapage_2016_2017.pdf', '2021-07-10 22:51:58'),
(21, 11, 'test', '2021-07-12 22:51:58'),
(21, 11, 'test', '2021-07-12 22:51:58'),
(21, 11, 'test', '2021-07-12 22:51:58'),
(21, 11, 'test', '2021-07-12 22:51:58'),
(17, 36, '36-1.png', '2021-07-13 00:01:29');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `groupID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Fillier` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Semestre` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`groupID`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`groupID`, `Name`, `Fillier`, `Semestre`) VALUES
(2, 'Analyse2', 'SMI', 'S2'),
(3, 'Structure Donnes', 'SMI', 'S4'),
(4, 'Gestion Projet', 'SMI', 'S6'),
(5, 'Optique', 'SMI', 'S2'),
(6, 'Analyse 3', 'SMI', 'S2'),
(7, 'Algorithm1', 'SMI', 'S2'),
(8, 'ElectroStatique', 'SMI', 'S2'),
(9, 'Langue Terminol2', 'SMI', 'S2'),
(10, 'Programmation2', 'SMI', 'S4'),
(11, 'Electro Magnetique', 'SMI', 'S4'),
(12, 'Systeme exploi 2', 'SMI', 'S4'),
(13, 'Architecture D\'ordinateur', 'SMI', 'S4'),
(14, 'Analyse Numerique', 'SMI', 'S4'),
(15, 'Architecture Distribuee', 'SMI', 'S6'),
(16, 'Prog Web Avan', 'SMI', 'S6'),
(17, 'Security et Cypto', 'SMI', 'S6'),
(18, 'Optique géométrique', 'SMC', 'S2'),
(19, 'Liaisons chimiques', 'SMC', 'S2'),
(20, 'Chimie des  solutions', 'SMC', 'S2'),
(21, 'Analyse 2', 'SMC', 'S2'),
(22, 'Algèbre 2', 'SMC', 'S2'),
(23, 'Electrostatique et Electrocinétique', 'SMC', 'S2'),
(24, 'Langue Terminol2', 'SMC', 'S2'),
(25, 'Hydrocarbures et fonctions monovalentes', 'SMC', 'S4'),
(26, 'Cristallographie géométrique et cristallochimie I', 'SMC', 'S4'),
(27, 'Thermodynamique chimique', 'SMC', 'S4'),
(28, 'Mécanique  quantique', 'SMC', 'S4'),
(29, 'Informatique', 'SMC', 'S4'),
(30, 'Probabilités Statistiques', 'SMC', 'S4'),
(31, 'Les grandes classes des réactions organiques', 'SMC', 'S6'),
(32, 'Chimie descriptive II et chimie de coordination', 'SMC', 'S6'),
(33, 'Elt. Génie Chim', 'SMC', 'S6'),
(34, 'Compl. Ch. Analy.', 'SMC', 'S6');

-- --------------------------------------------------------

--
-- Table structure for table `joingroup`
--

DROP TABLE IF EXISTS `joingroup`;
CREATE TABLE IF NOT EXISTS `joingroup` (
  `GroupID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  KEY `GroupID` (`GroupID`),
  KEY `UserID` (`UserID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `joingroup`
--

INSERT INTO `joingroup` (`GroupID`, `UserID`) VALUES
(4, 15),
(15, 15),
(16, 15),
(17, 15),
(3, 36),
(17, 12),
(15, 16),
(4, 16),
(16, 16),
(17, 16),
(4, 12),
(15, 12),
(15, 17),
(15, 18),
(17, 18),
(28, 20),
(17, 19),
(17, 33),
(4, 33),
(15, 33),
(16, 33),
(4, 1),
(15, 1),
(16, 1),
(17, 1),
(3, 1),
(17, 36);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `messageID` int(11) NOT NULL AUTO_INCREMENT,
  `convID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `messagetext` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Time` datetime NOT NULL,
  PRIMARY KEY (`messageID`),
  KEY `convID` (`convID`),
  KEY `userID` (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messageID`, `convID`, `userID`, `messagetext`, `Time`) VALUES
(102, 25, 1, 'Bonjour avez vous la correction d\'examen de Programmation web?', '2021-06-30 12:46:26'),
(107, 26, 36, 'q', '2021-07-13 00:00:27'),
(108, 26, 1, 'q', '2021-07-13 00:00:28'),
(104, 25, 1, 'd\'accord\r\n', '2021-06-30 12:59:26'),
(105, 26, 36, 'tests', '2021-07-12 23:59:55'),
(106, 26, 1, 'test test', '2021-07-13 00:00:18'),
(103, 25, 11, 'Non, mais verifiez le document dans le groupe de programmation peut-etre que vous trouverez certains', '2021-06-30 12:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `questionID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `groupID` int(11) NOT NULL,
  `question` text COLLATE utf8_unicode_ci,
  `Time` datetime NOT NULL,
  `authorTimeVisite` datetime NOT NULL,
  `Deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`questionID`),
  KEY `UserID` (`UserID`),
  KEY `groupID` (`groupID`)
) ENGINE=MyISAM AUTO_INCREMENT=122 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionID`, `UserID`, `groupID`, `question`, `Time`, `authorTimeVisite`, `Deleted`) VALUES
(98, 20, 28, 'test', '2021-07-09 22:35:04', '2021-06-24 22:35:04', 0),
(96, 20, 28, 'test', '2021-07-09 22:35:00', '2021-07-01 22:35:00', 0),
(97, 20, 28, 'test', '2021-07-09 22:35:02', '2021-06-24 22:35:02', 0),
(94, 20, 28, 'test', '2021-07-09 22:34:55', '2021-06-24 22:34:55', 0),
(95, 20, 28, 'test', '2021-07-09 22:34:57', '2021-06-24 22:34:57', 0),
(99, 20, 28, 'test', '2021-07-09 22:35:06', '2021-06-24 22:35:06', 0),
(100, 20, 28, 'test', '2021-07-10 22:35:09', '2021-06-24 22:35:09', 0),
(101, 20, 28, 'test', '2021-07-10 22:35:11', '2021-06-24 22:35:11', 0),
(102, 20, 28, 'test', '2021-07-10 22:35:13', '2021-06-24 22:35:13', 0),
(103, 20, 28, 'test', '2021-07-10 22:35:16', '2021-06-24 22:35:16', 0),
(104, 20, 28, 'test', '2021-07-10 22:35:18', '2021-06-24 22:35:18', 0),
(105, 20, 28, 'test', '2021-07-10 22:35:20', '2021-06-24 22:35:20', 0),
(106, 20, 28, 'test', '2021-07-10 22:35:24', '2021-06-24 22:35:24', 0),
(107, 20, 28, 'test', '2021-07-11 22:35:27', '2021-06-24 22:35:27', 0),
(108, 20, 28, 'test', '2021-07-11 22:35:29', '2021-06-24 22:35:29', 0),
(109, 20, 28, 'test', '2021-07-11 22:35:32', '2021-06-24 22:35:32', 0),
(110, 20, 28, 'test', '2021-07-11 22:35:34', '2021-06-24 22:35:34', 0),
(111, 20, 28, 'test', '2021-07-11 22:35:37', '2021-06-24 22:35:37', 0),
(112, 20, 28, 'test', '2021-07-12 22:35:40', '2021-06-24 22:35:40', 0),
(113, 20, 28, 'test', '2021-07-12 22:35:42', '2021-06-24 22:35:42', 0),
(114, 20, 28, 'test', '2021-07-12 22:35:45', '2021-06-24 22:35:45', 0),
(115, 20, 28, 'test', '2021-07-12 22:35:48', '2021-06-24 22:35:48', 0),
(116, 20, 28, 'test', '2021-07-12 22:35:50', '2021-06-24 22:38:41', 0),
(117, 1, 17, 'quelqu\'un a des exams de securite et crypto', '2021-07-12 22:51:31', '2021-07-12 23:58:10', 0),
(118, 11, 17, 'quelqu\'un a Correction exams de securite et crypto', '2021-07-12 22:51:31', '2021-06-30 12:51:58', 0),
(119, 12, 17, 'correction de TD1?', '2021-07-13 22:51:31', '2021-07-14 12:51:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `reponseID` int(11) NOT NULL AUTO_INCREMENT,
  `reponse` text COLLATE utf8_unicode_ci,
  `groupID` int(11) DEFAULT NULL,
  `questionID` int(11) DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL,
  `Time` datetime NOT NULL,
  `Deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`reponseID`),
  KEY `groupID` (`groupID`),
  KEY `questionID` (`questionID`),
  KEY `UserId` (`UserId`)
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reponse`
--

INSERT INTO `reponse` (`reponseID`, `reponse`, `groupID`, `questionID`, `UserId`, `Time`, `Deleted`) VALUES
(89, 'oui voir les document', 17, 117, 12, '2021-07-10 22:51:52', 0),
(88, 'test', 28, 116, 20, '2021-07-10 22:36:38', 0),
(87, 'test', 28, 116, 20, '2021-07-10 22:36:34', 0),
(83, 'test', 28, 116, 20, '2021-07-10 22:36:15', 0),
(86, 'test', 28, 116, 20, '2021-07-10 22:36:31', 0),
(85, 'tset', 28, 116, 20, '2021-07-11 22:36:27', 0),
(84, 'test', 28, 116, 20, '2021-07-11 22:36:18', 0),
(82, 'test', 28, 116, 20, '2021-07-11 22:36:12', 0),
(81, 'test', 28, 116, 20, '2021-07-12 22:36:08', 0),
(79, 'test', 28, 116, 20, '2021-07-12 22:35:59', 0),
(80, 'test', 28, 116, 20, '2021-07-12 22:36:04', 0),
(77, 'test', 28, 115, 20, '2021-07-12 22:35:53', 0),
(78, 'test', 28, 116, 20, '2021-07-12 22:35:56', 0),
(91, 'test', 3, 120, 1, '2021-07-12 23:58:30', 0),
(92, 'test\r\n', 3, 120, 1, '2021-07-12 23:58:45', 0),
(93, 'test 10', 3, 120, 1, '2021-07-12 23:59:17', 0),
(94, 'reponse', 17, 121, 36, '2021-07-13 00:05:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `reportID` int(11) NOT NULL AUTO_INCREMENT,
  `reporterID` int(11) NOT NULL,
  `typeR` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `typeID` int(11) NOT NULL,
  `Fil` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Time` datetime NOT NULL,
  PRIMARY KEY (`reportID`),
  KEY `reporterID` (`reporterID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`reportID`, `reporterID`, `typeR`, `typeID`, `Fil`, `Time`) VALUES
(12, 36, 'Reponse', 89, 'SMI', '2021-07-13 00:06:25'),
(11, 36, 'Question', 117, 'SMI', '2021-07-13 00:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

DROP TABLE IF EXISTS `studentinfo`;
CREATE TABLE IF NOT EXISTS `studentinfo` (
  `StudentId` int(11) NOT NULL,
  `Filliere` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Semestre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Section` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `profile_image` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  KEY `StudentId` (`StudentId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`StudentId`, `Filliere`, `Semestre`, `Section`, `profile_image`) VALUES
(15, 'SMI', 'S6', 'A', '15-Capture.PNG'),
(11, 'SMI', 'S6', 'A', '11-1612103671707-01.jpeg'),
(12, 'SMI', 'S6', 'A', '12-WhatsApp Image 2021-06-14 at 14.47.12.jpeg'),
(16, 'SMI', 'S6', 'A', '16-Capture.PNG'),
(17, 'SMI', 'S6', 'A', '17-Capture.PNG'),
(18, 'SMI', 'S6', 'A', '18-Capture.PNG'),
(19, 'SMI', 'S4', 'A', '19-profile.png'),
(20, 'SMC', 'S4', 'A', ''),
(21, 'SMP', 'S2', 'A', ''),
(22, 'SMP', 'S4', 'A', ''),
(23, 'SMC', 'S4', 'A', ''),
(24, 'SMC', 'S6', 'A', ''),
(25, 'SMC', 'S2', 'A', ''),
(26, 'SVT', 'S6', 'A', ''),
(27, 'STU', 'S4', 'A', ''),
(28, 'STU', 'S6', 'A', ''),
(29, 'SMA', 'S6', 'A', ''),
(30, 'SMA', 'S6', 'A', ''),
(31, 'SMC', 'S4', 'B', ''),
(31, 'SMC', 'S4', 'B', ''),
(33, 'SMI', 'S6', 'A', '33-Capture.PNG'),
(1, 'SMI', 'S6', 'A', '1-Capture.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Surname` varchar(100) NOT NULL,
  `Apogee` varchar(100) NOT NULL,
  `ban` tinyint(1) NOT NULL DEFAULT '0',
  `warn` tinyint(1) NOT NULL DEFAULT '0',
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `Name`, `Surname`, `Apogee`, `ban`, `warn`, `Email`, `Password`) VALUES
(1, 'Ayoub', 'El Kadmiri', '18031221', 0, 0, 'ayoubelk.00@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(11, 'El Bouirtou ', 'Otman', '18031218', 0, 0, 'puertootman0123@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0'),
(12, 'el khader', 'Hammoudan', '18031225', 0, 1, 'elkhaderhammoudan@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(20, 'mohamed', 'bakkali', '12345678', 0, 0, 'test@test.com', 'f5bb0c8de146c67b44babbf4e6584cc0'),
(21, 'ahmed', 'khamnlichi', '22345678', 0, 0, 'test1@test.com', 'f5bb0c8de146c67b44babbf4e6584cc0'),
(22, 'sara', 'bakkali', '13345678', 0, 0, 'test3@test.com', 'f5bb0c8de146c67b44babbf4e6584cc0'),
(23, 'test', 'test', '12315678', 0, 0, 'test4@test.com', 'f5bb0c8de146c67b44babbf4e6584cc0'),
(24, 'test', 'test', '12345618', 0, 0, 'test4@test.com', 'f5bb0c8de146c67b44babbf4e6584cc0'),
(25, 'test', 'test', '12345671', 0, 0, 'test5@test.com', 'f5bb0c8de146c67b44babbf4e6584cc0'),
(26, 'test', 'test', '12341678', 0, 0, 'test6@test.com', 'f5bb0c8de146c67b44babbf4e6584cc0'),
(27, 'test', 'test', '12225678', 0, 0, 'test7@test.com', 'f5bb0c8de146c67b44babbf4e6584cc0'),
(28, 'test', 'test', '12345678', 0, 0, 'test8@test.com', 'f5bb0c8de146c67b44babbf4e6584cc0'),
(29, 'test', 'test', '12334678', 0, 0, 'test9@test.com', 'f5bb0c8de146c67b44babbf4e6584cc0'),
(30, 'test', 'test', '12345578', 0, 0, 'test10@test.com', 'f5bb0c8de146c67b44babbf4e6584cc0'),
(31, 'test', 'test', '12375678', 0, 0, 'test11@test.com', 'f5bb0c8de146c67b44babbf4e6584cc0'),
(32, 'test', 'test', '12374678', 0, 0, 'test12@test.com', 'f5bb0c8de146c67b44babbf4e6584cc0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
