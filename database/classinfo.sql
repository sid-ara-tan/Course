-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 18, 2012 at 05:44 PM
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
-- Table structure for table `classinfo`
--

CREATE TABLE IF NOT EXISTS `classinfo` (
  `Dept_id` varchar(10) NOT NULL,
  `CourseNo` varchar(10) NOT NULL DEFAULT '',
  `cDay` varchar(12) NOT NULL DEFAULT '',
  `Period` int(11) NOT NULL DEFAULT '0',
  `Sec` varchar(2) NOT NULL DEFAULT '',
  `cTime` varchar(10) NOT NULL DEFAULT '',
  `Location` varchar(15) DEFAULT NULL,
  `Duration` varchar(5) DEFAULT NULL,
  `by_teacher` varchar(10) NOT NULL DEFAULT '',
  `sLevel` varchar(10) NOT NULL,
  `Term` varchar(10) NOT NULL,
  PRIMARY KEY (`Dept_id`,`sLevel`,`Term`,`Sec`,`cDay`,`by_teacher`,`Period`),
  KEY `CourseNo` (`CourseNo`),
  KEY `by_teacher` (`by_teacher`),
  KEY `by_teacher_2` (`by_teacher`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classinfo`
--

INSERT INTO `classinfo` (`Dept_id`, `CourseNo`, `cDay`, `Period`, `Sec`, `cTime`, `Location`, `Duration`, `by_teacher`, `sLevel`, `Term`) VALUES
('CSE', 'CSE305', 'Monday', 1, 'A', '08:00 am', 'CSE102', '50', '05003', '3', '1'),
('CSE', 'CSE307', 'Monday', 4, 'A', '11:00 am', 'CSE102', '50', '05004', '3', '1'),
('CSE', 'CSE309', 'Monday', 2, 'A', '09:00 am', 'CSE102', '50', '05006', '3', '1'),
('CSE', 'CSE311', 'Monday', 3, 'A', '10:00 am', 'CSE102', '50', '05009', '3', '1'),
('CSE', 'CSE307', 'Saturday', 1, 'A', '08:00 am', 'CSE109', '50', '05004', '3', '1'),
('CSE', 'CSE309', 'Saturday', 2, 'A', '09:00 am', 'CSE109', '50', '05006', '3', '1'),
('CSE', 'CSE311', 'Saturday', 3, 'A', '10:00 am', 'CSE109', '50', '05010', '3', '1'),
('CSE', 'CSE303', 'Sunday', 3, 'A', '10:00 am', 'CSE102', '50', '05001', '3', '1'),
('CSE', 'CSE305', 'Sunday', 1, 'A', '08:00 am', 'CSE102', '50', '05003', '3', '1'),
('CSE', 'CSE307', 'Sunday', 4, 'A', '11:00 am', 'CSE102', '50', '05004', '3', '1'),
('CSE', 'CSE309', 'Sunday', 2, 'A', '09:00 am', 'CSE102', '50', '05007', '3', '1'),
('CSE', 'CSE303', 'Tuesday', 2, 'A', '09:00 am', 'CSE102', '50', '05001', '3', '1'),
('CSE', 'CSE305', 'Tuesday', 3, 'A', '10:00 am', 'CSE102', '50', '05003', '3', '1'),
('CSE', 'CSE303', 'Wednesday', 2, 'A', '09:00 am', 'CSE102', '50', '05002', '3', '1'),
('CSE', 'CSE307', 'Wednesday', 1, 'A', '08:00 am', 'CSE102', '50', '05004', '3', '1'),
('CSE', 'CSE300', 'Wednesday', 3, 'A', '11:00 PM', 'CSE102', '50', '05008', '3', '1'),
('CSE', 'CSE310', 'Saturday', 7, 'A1', '02:30 pm', 'CSE109', '50', '05007', '3', '1'),
('CSE', 'CSE304', 'Sunday', 7, 'A1', '02:30 pm', 'CSE109', '150', '05001', '3', '1'),
('CSE', 'CSE308', 'Tuesday', 4, 'A1', '11:00 am', 'CSE102', '150', '05004', '3', '1'),
('CSE', 'CSE304', 'Monday', 7, 'A2', '02:30 pm', 'CSE109', '150', '05001', '3', '1'),
('CSE', 'CSE310', 'Saturday', 7, 'A2', '02:30 pm', 'CSE109', '150', '05008', '3', '1'),
('CSE', 'CSE308', 'Wednesday', 7, 'A2', '02:30 pm', 'CSE109', '150', '05005', '3', '1'),
('CSE', 'CSE307', 'Monday', 5, 'B', '12:00 pm', 'CSE102', '50', '05004', '3', '1'),
('CSE', 'CSE309', 'Monday', 3, 'B', '10:00 am', 'CSE102', '50', '05006', '3', '1'),
('CSE', 'CSE311', 'Monday', 2, 'B', '09:00 am', 'CSE102', '50', '05009', '3', '1'),
('CSE', 'CSE305', 'Saturday', 5, 'B', '12:00 pm', 'CSE109', '50', '05003', '3', '1'),
('CSE', 'CSE307', 'Saturday', 4, 'B', '11:00 pm', 'CSE109', '50', '05004', '3', '1'),
('CSE', 'CSE309', 'Saturday', 3, 'B', '10:00 am', 'CSE109', '50', '05006', '3', '1'),
('CSE', 'CSE311', 'Saturday', 2, 'B', '09:00 am', 'CSE109', '50', '05010', '3', '1'),
('CSE', 'CSE303', 'Sunday', 2, 'B', '09:00 am', 'CSE102', '50', '05001', '3', '1'),
('CSE', 'CSE305', 'Sunday', 4, 'B', '11:00 am', 'CSE102', '50', '05003', '3', '1'),
('CSE', 'CSE307', 'Sunday', 5, 'B', '12:00 pm', 'CSE102', '50', '05004', '3', '1'),
('CSE', 'CSE309', 'Sunday', 3, 'B', '10:00 am', 'CSE102', '50', '05007', '3', '1'),
('CSE', 'CSE303', 'Tuesday', 3, 'B', '10:00 am', 'CSE102', '50', '05001', '3', '1'),
('CSE', 'CSE305', 'Tuesday', 1, 'B', '08:00 am', 'CSE102', '50', '05003', '3', '1'),
('CSE', 'CSE303', 'Wednesday', 1, 'B', '08:00 am', 'CSE102', '50', '05002', '3', '1'),
('CSE', 'CSE307', 'Wednesday', 3, 'B', '10:00 am', 'CSE102', '50', '05004', '3', '1'),
('CSE', 'CSE311', 'Wednesday', 2, 'B', '09:00 am', 'CSE102', '50', '05009', '3', '1'),
('CSE', 'CSE304', 'Saturday', 7, 'B1', '02:30 pm', 'CSE109', '150', '05002', '3', '1'),
('CSE', 'CSE310', 'Tuesday', 4, 'B1', '11:00 am', 'CSE102', '150', '05007', '3', '1'),
('CSE', 'CSE308', 'Wednesday', 4, 'B1', '11:00 am', 'CSE109', '150', '05004', '3', '1');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classinfo`
--
ALTER TABLE `classinfo`
  ADD CONSTRAINT `classinfo_ibfk_1` FOREIGN KEY (`CourseNo`) REFERENCES `course` (`CourseNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `classinfo_ibfk_2` FOREIGN KEY (`by_teacher`) REFERENCES `assignedcourse` (`T_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
