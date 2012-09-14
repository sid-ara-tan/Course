-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 14, 2012 at 11:55 AM
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
-- Table structure for table `marks`
--

CREATE TABLE IF NOT EXISTS `marks` (
  `CourseNo` varchar(10) NOT NULL,
  `Sec` varchar(3) NOT NULL,
  `Exam_ID` int(11) NOT NULL,
  `S_ID` varchar(10) NOT NULL,
  `Total` double NOT NULL,
  `Marks` double NOT NULL,
  `Percentage` double NOT NULL,
  PRIMARY KEY (`CourseNo`,`Sec`,`Exam_ID`,`S_ID`),
  KEY `S_ID` (`S_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`CourseNo`, `Sec`, `Exam_ID`, `S_ID`, `Total`, `Marks`, `Percentage`) VALUES
('CSE300', 'A1', 1, '0805001', 10, 7, 0),
('CSE300', 'A1', 1, '0805002', 10, 6, 0),
('CSE300', 'A1', 2, '0805001', 5, 2, 0),
('CSE300', 'A1', 2, '0805002', 5, 2, 0),
('CSE300', 'A1', 3, '0805001', 10, 2, 0),
('CSE300', 'A1', 3, '0805002', 10, 8, 0),
('CSE300', 'A1', 8, '0805001', 12, 1, 0),
('CSE300', 'A1', 8, '0805002', 12, 2, 0),
('CSE300', 'B2', 5, '0805102', 20, 20, 0),
('CSE300', 'B2', 5, '0805114', 20, 9, 0),
('CSE300', 'B2', 6, '0805102', 10, 2, 0),
('CSE300', 'B2', 6, '0805114', 10, 2, 0),
('CSE300', 'B2', 7, '0805102', 10, 10, 0),
('CSE300', 'B2', 7, '0805114', 10, 9, 0),
('CSE305', 'A', 1, '0805001', 10, 3, 0),
('CSE305', 'A', 1, '0805002', 10, 2, 0),
('CSE305', 'A', 1, '0805048', 10, 3, 0),
('CSE305', 'A', 1, '0805049', 10, 4, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
