-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 14, 2012 at 11:54 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `course`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
  `CourseNo` varchar(10) NOT NULL DEFAULT '',
  `Sec` varchar(3) NOT NULL DEFAULT '',
  `ID` int(11) NOT NULL,
  `eDate` date DEFAULT NULL,
  `eTime` varchar(7) DEFAULT NULL,
  `Duration` varchar(5) DEFAULT NULL,
  `Location` varchar(15) DEFAULT NULL,
  `eType` varchar(20) NOT NULL DEFAULT '',
  `Topic` varchar(30) DEFAULT NULL,
  `Syllabus` text NOT NULL,
  `Scheduler_ID` varchar(30) DEFAULT NULL,
  `Percentage` double NOT NULL,
  `Best` int(11) NOT NULL,
  `Total` double NOT NULL,
  PRIMARY KEY (`CourseNo`,`Sec`,`ID`),
  KEY `CourseNo` (`CourseNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`CourseNo`, `Sec`, `ID`, `eDate`, `eTime`, `Duration`, `Location`, `eType`, `Topic`, `Syllabus`, `Scheduler_ID`, `Percentage`, `Best`, `Total`) VALUES
('CSE300', 'A1', 1, '2012-08-21', '11:0AM', '60', 'classroom', 'quiz', 'quiz1', 'arafat', '05008', 45.5, 0, 10),
('CSE300', 'A1', 2, '2012-08-29', '11:0AM', '60', 'classroom', 'presentation', 'presentation 1', 'arafat', '05008', 0, 0, 5),
('CSE300', 'A1', 3, '2012-08-20', '12:0AM', '2', 'sd', 'assignment', 'asd', 'sad', '05008', 0, 0, 10),
('CSE300', 'A1', 8, '2012-09-25', '01:00AM', '14', 'kk', 'quiz', 'fsd', 'df', '05008', 54.5, 0, 12),
('CSE300', 'B2', 5, '2012-08-29', '1:0AM', '12', 'classroom', 'assignment', 'aas', 'as', '05008', 0, 2, 20),
('CSE300', 'B2', 6, '2012-08-29', '1:0AM', '12', 'classroom', 'assignment', 'aas', 'as', '05008', 0, 2, 10),
('CSE300', 'B2', 7, '2012-08-29', '1:0AM', '12', 'classroom', 'assignment', 'aas', 'as', '05008', 0, 2, 10),
('CSE305', 'A', 1, '2012-08-28', '1:50AM', '50', 'sd', 'ct', 'CT1', 'ads', '05008', 0, 0, 10),
('CSE305', 'A', 3, '2012-09-18', '01:00AM', '12', 'qwe', 'ct', 'A ct', 'a', '05008', 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
