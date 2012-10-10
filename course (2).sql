-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 10, 2012 at 07:13 PM
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
-- Table structure for table `assignedcourse`
--

CREATE TABLE IF NOT EXISTS `assignedcourse` (
  `T_Id` varchar(10) NOT NULL DEFAULT '',
  `CourseNo` varchar(10) NOT NULL DEFAULT '',
  `Sec` varchar(2) NOT NULL DEFAULT '',
  PRIMARY KEY (`T_Id`,`CourseNo`,`Sec`),
  KEY `T_Id` (`T_Id`),
  KEY `CourseNo` (`CourseNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignedcourse`
--

INSERT INTO `assignedcourse` (`T_Id`, `CourseNo`, `Sec`) VALUES
('05001', 'CSE309', 'A'),
('05001', 'CSE309', 'B'),
('05002', 'CSE303', 'A'),
('05002', 'CSE303', 'B'),
('05002', 'CSE304', 'A1'),
('05002', 'CSE304', 'A2'),
('05002', 'CSE304', 'B1'),
('05002', 'CSE304', 'B2'),
('05003', 'CSE304', 'A2'),
('05003', 'CSE304', 'B1'),
('05003', 'CSE305', 'A'),
('05003', 'CSE305', 'B'),
('05004', 'CSE304', 'A2'),
('05004', 'CSE304', 'B1'),
('05005', 'CSE307', 'A'),
('05005', 'CSE307', 'B'),
('05005', 'CSE308', 'A1'),
('05005', 'CSE308', 'A2'),
('05005', 'CSE308', 'B2'),
('05006', 'CSE311', 'A'),
('05006', 'CSE311', 'B'),
('05007', 'CSE304', 'B2'),
('05007', 'CSE307', 'A'),
('05007', 'CSE307', 'B'),
('05007', 'CSE310', 'A1'),
('05007', 'CSE310', 'A2'),
('05007', 'CSE310', 'B1'),
('05007', 'CSE310', 'B2'),
('05008', 'CSE300', 'A1'),
('05008', 'CSE300', 'A2'),
('05008', 'CSE300', 'B1'),
('05008', 'CSE300', 'B2'),
('05008', 'CSE305', 'A'),
('05008', 'CSE305', 'B'),
('05009', 'CSE310', 'A1'),
('05009', 'CSE310', 'A2'),
('05009', 'CSE310', 'B1'),
('05009', 'CSE310', 'B2'),
('05010', 'CSE304', 'A1'),
('05011', 'CSE304', 'A1'),
('05011', 'CSE304', 'B2'),
('05012', 'CSE303', 'A'),
('05012', 'CSE303', 'B'),
('05013', 'CSE308', 'A2'),
('05013', 'CSE308', 'B1'),
('05013', 'CSE308', 'B2'),
('05014', 'CSE308', 'A1'),
('05014', 'CSE308', 'B1'),
('05015', 'CSE309', 'A'),
('05015', 'CSE309', 'B'),
('05015', 'CSE310', 'A1'),
('05015', 'CSE310', 'A2'),
('05015', 'CSE310', 'B1'),
('05015', 'CSE310', 'B2');

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE IF NOT EXISTS `authentication` (
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(64) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`username`, `password`, `email`) VALUES
('admin', '12345', 'siddhartha047@gmail.com'),
('secret', '79968d2c9d82846be166c47caa80fc75', 'tanzir.b@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(255) NOT NULL DEFAULT '',
  `to` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `from`, `to`, `message`, `sent`, `recd`) VALUES
(2, '', 'robert', 'hey robert this is sid the secret', '2012-09-18 15:03:51', 1),
(3, 'secret', 'robert', 'hey robert', '2012-09-18 15:06:49', 1),
(4, 'robert', 'secret', 'hey secret', '2012-09-18 15:08:32', 1),
(5, 'secret', 'robert', 'how you doin', '2012-09-18 15:08:40', 1),
(6, 'robert', 'secret', 'good how about you', '2012-09-18 15:08:49', 1),
(7, 'secret', 'robert', 'what''s wrong with you', '2012-09-18 15:13:05', 1),
(8, 'secret', 'robert', 'what''s wrong with me? what''s is wrong with you?', '2012-09-18 15:14:32', 1),
(9, 'robert', 'secret', 'ok bad luck', '2012-09-18 15:14:47', 1),
(10, 'secret', 'robert', 'hey robert', '2012-09-18 16:19:54', 1),
(11, 'secret', 'secret', 'hey secret', '2012-09-18 16:20:05', 1),
(12, 'secret', 'robert', 'hey secre', '2012-09-18 16:20:13', 1),
(13, 'robert', 'secret', 'hey sid', '2012-09-18 16:20:57', 1),
(14, 'secret', 'robert', 'hey secret', '2012-09-18 16:21:06', 1),
(15, 'robert', 'secret', 'hey what''s up', '2012-09-18 17:00:06', 1),
(16, 'secret', 'admin', 'hello', '2012-09-19 22:32:11', 0),
(17, 'secret', 'admin', 'ol;', '2012-09-19 22:35:40', 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_no` int(11) NOT NULL DEFAULT '0',
  `CourseNo` varchar(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `commentBy` varchar(50) NOT NULL,
  `body` text,
  `status` tinyint(4) NOT NULL,
  `senderType` varchar(25) NOT NULL,
  PRIMARY KEY (`id`,`msg_no`,`CourseNo`),
  KEY `msg_no` (`msg_no`),
  KEY `CourseNo` (`CourseNo`),
  KEY `commentBy` (`commentBy`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `msg_no`, `CourseNo`, `time`, `commentBy`, `body`, `status`, `senderType`) VALUES
(64, 52, 'CSE309', '2012-09-13 02:52:47', '0805049', 'hi', 1, 'student'),
(65, 52, 'CSE309', '2012-09-13 09:28:37', '0805048', 'kjh', 0, 'student'),
(66, 52, 'CSE309', '2012-09-13 09:30:20', '05008', 'gh', 1, 'teacher'),
(69, 2, 'CSE310', '2012-09-13 04:28:27', '0805048', 'dsfdsf', 1, 'student'),
(70, 3, 'CSE310', '2012-09-13 10:30:59', '0805048', 'dhdf', 0, 'student'),
(71, 3, 'CSE310', '2012-09-13 04:31:24', '0805048', 'vhmjgh', 1, 'student'),
(74, 1, 'CSE300', '2012-09-13 04:35:03', '0805048', 'zdf', 1, 'student'),
(75, 2, 'CSE300', '2012-09-13 10:40:40', '0805048', 'zxcvz', 0, 'student'),
(76, 2, 'CSE300', '2012-09-13 04:40:45', '0805048', 'cbc', 1, 'student'),
(77, 2, 'CSE300', '2012-09-13 11:37:28', '0805049', 'zcfzs', 0, 'student'),
(78, 56, 'CSE309', '2012-09-13 05:28:41', '0805049', 'eryter', 1, 'student'),
(79, 2, 'CSE300', '2012-09-13 05:37:24', '0805049', 'ghjfjfg', 1, 'student'),
(80, 58, 'CSE309', '2012-09-28 03:36:47', '0805049', 'ami uploadaisi :p', 1, 'student'),
(81, 58, 'CSE309', '2012-10-04 04:54:22', '0805049', 'hgj', 0, 'student'),
(82, 51, 'CSE309', '2012-09-28 05:37:06', '0805049', 'nb', 1, 'student'),
(83, 58, 'CSE309', '2012-10-10 13:12:35', '0705049', 'ho ho', 1, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `CourseNo` varchar(10) NOT NULL DEFAULT '',
  `ID` varchar(12) NOT NULL DEFAULT '',
  `Topic` varchar(30) DEFAULT NULL,
  `Description` text,
  `Uploader` varchar(50) DEFAULT NULL,
  `Uploader_ID` varchar(50) NOT NULL,
  `Upload_Time` timestamp NULL DEFAULT NULL,
  `File_Path` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`CourseNo`,`ID`),
  KEY `CourseNo` (`CourseNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`CourseNo`, `ID`, `Topic`, `Description`, `Uploader`, `Uploader_ID`, `Upload_Time`, `File_Path`, `status`) VALUES
('CSE300', '10', 'Distributed Database', '', 'Sumaiya Iqbal', '05008', '2012-09-12 09:38:01', 'Server_list_of_LAN2.txt', 0),
('CSE300', '6', 'test', '', 'Sumaiya Iqbal', '05008', '2012-09-11 14:10:09', 'httpsgithub.comsid-ara-t.txt', 0),
('CSE300', '7', 'aaa', '', 'Sumaiya Iqbal', '05008', '2012-09-12 01:13:42', 'Server_list_of_LAN.txt', 0),
('CSE300', '8', 'with_ID', 'check this out\r\n:)', 'Sumaiya Iqbal', '05008', '2012-09-12 09:30:05', 'httpsgithub.comsid-ara-t1.txt', 0),
('CSE305', '1', 'arafat imtiaz', 'its me', 'Mahfuza Sarmin', '05003', '2012-09-12 09:35:41', '8C736EAE0061.txt', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `CourseNo` varchar(10) NOT NULL,
  `CourseName` varchar(50) DEFAULT NULL,
  `Dept_ID` varchar(6) DEFAULT NULL,
  `sLevel` int(11) DEFAULT NULL,
  `Term` int(11) DEFAULT NULL,
  `Type` varchar(2) DEFAULT NULL,
  `Curriculam` int(11) DEFAULT NULL,
  `Credit` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`CourseNo`),
  KEY `Dept_ID` (`Dept_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseNo`, `CourseName`, `Dept_ID`, `sLevel`, `Term`, `Type`, `Curriculam`, `Credit`) VALUES
('CSE300', 'Technical Writing', 'CSE', 3, 1, 'S', 2005, 0.75),
('CSE303', 'Database', 'CSE', 3, 1, 'TT', 2005, 3.00),
('CSE304', 'Database Sessional', 'CSE', 3, 1, 'S', 2005, 1.50),
('CSE305', 'Computer Architecture', 'CSE', 3, 1, 'TT', 2005, 3.00),
('CSE307', 'Software Engineering', 'CSE', 3, 1, 'TT', 2005, 3.00),
('CSE308', 'Software Engineering Sessional', 'CSE', 3, 1, 'S', 2005, 1.50),
('CSE309', 'Compiler', 'CSE', 3, 1, 'TT', 2005, 3.00),
('CSE310', 'Compiler Sessional', 'CSE', 3, 1, 'S', 2005, 0.75),
('CSE311', 'Data Communication', 'CSE', 3, 1, 'TT', 2005, 3.00),
('CSE321', 'Image Processing', 'CSE', 3, 2, 'TT', 2005, 3.00),
('CSE322', 'Image Processing Sessional', 'CSE', 3, 2, 'S', 2005, 1.50),
('CSE401', 'Simulation', 'CSE', 4, 1, 'TT', NULL, 3.00),
('CSE402', 'Pattern', 'CSE', 4, 1, 'TT', 2005, 3.00);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `Dept_id` varchar(6) NOT NULL,
  `Head_of_dept_id` varchar(6) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Dept_id`, `Head_of_dept_id`, `Password`, `Name`) VALUES
('CHE', '09001', '1234', 'Chemical Engineering.'),
('CSE', '05001', '1234', 'Computer Science and Engineering.'),
('EEE', '04001', '1234', 'Electrical and Electronics Engineering.'),
('IPE', '07001', '1234', 'Industrial Production Engineering.'),
('MME', '06001', '1234', 'Material Engineering.'),
('URP', '08001', '1234', 'Urban and Regional Production.');

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
('CSE305', 'A', 3, '2012-09-18', '01:00AM', '12', 'qwe', 'ct', 'A ct', 'a', '05008', 0, 0, 0),
('CSE309', 'A', 1, '2012-09-18', '01:00AM', '5', 'gg', 'ct', 'dsfs', 'bkhgkghkjhk', '05001', 0, 0, 0),
('CSE309', 'A', 2, '2012-09-17', '01:00AM', '3', 'sad', 'ct', 'gyigyiyuighui', 'ghkhjkhjkjh', '05001', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `exam_type`
--

CREATE TABLE IF NOT EXISTS `exam_type` (
  `CourseNo` varchar(10) NOT NULL,
  `etype` varchar(20) NOT NULL,
  `Description` text NOT NULL,
  `Marks_Type` varchar(10) NOT NULL,
  `Percentage` double NOT NULL,
  PRIMARY KEY (`CourseNo`,`etype`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_type`
--

INSERT INTO `exam_type` (`CourseNo`, `etype`, `Description`, `Marks_Type`, `Percentage`) VALUES
('CSE300', 'assignment', 'four assignment will be taken', 'Best', 10),
('CSE300', 'offline', 'wow\r\noffline\r\n', 'Percentage', 0),
('CSE300', 'presentation', 'one presentation will be taken', 'Percentage', 20),
('CSE300', 'quiz', '1 quiz will be taken', 'Percentage', 20),
('CSE300', 'viva', '', 'Percentage', 25),
('CSE305', 'ct', 'Four ct will be taken best 3 will be counted', 'Best', 0),
('CSE309', 'ct', '3 ct will be counted', 'Best', 0),
('CSE309', 'xc', '', 'Percentage', 0);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) NOT NULL,
  `CourseNo` varchar(10) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `description` text,
  `uploader` varchar(50) NOT NULL,
  `senderType` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `filename` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`,`CourseNo`),
  KEY `CourseNo` (`CourseNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `file_id`, `CourseNo`, `topic`, `description`, `uploader`, `senderType`, `time`, `filename`, `status`) VALUES
(25, 1, 'CSE310', 'ques', '', '0805048', 'student', '2012-09-13 04:11:11', 'Untitled.png', 1),
(26, 3, 'CSE310', 'ques', '', '0805048', 'student', '2012-09-13 04:28:49', 'Untitled1.png', 1),
(28, 2, 'CSE300', 'queshfghdhdfhdfghdfg', '', '05001', 'teacher', '2012-09-13 11:33:43', 'Koala.jpg', 1),
(30, 57, 'CSE309', 'b', '', '0805049', 'student', '2012-09-13 04:54:20', 'Lighthouse.jpg', 1),
(31, 58, 'CSE309', 'dfg', '', '0805049', 'student', '2012-09-13 04:56:45', 'Untitled1.png', 1),
(32, 2, 'CSE305', 'cookie chrome', '', '0805049', 'student', '2012-10-10 13:09:49', 'WarHawk.doc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hascourse`
--

CREATE TABLE IF NOT EXISTS `hascourse` (
  `Dept_Id` varchar(6) NOT NULL,
  `course_no` varchar(11) NOT NULL,
  PRIMARY KEY (`Dept_Id`,`course_no`),
  KEY `Dept_Id` (`Dept_Id`,`course_no`),
  KEY `course_no` (`course_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hascourse`
--

INSERT INTO `hascourse` (`Dept_Id`, `course_no`) VALUES
('CSE', 'CSE300'),
('CSE', 'CSE303'),
('CSE', 'CSE305'),
('CSE', 'CSE307');

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

-- --------------------------------------------------------

--
-- Table structure for table `message_group_student`
--

CREATE TABLE IF NOT EXISTS `message_group_student` (
  `CourseNo` varchar(10) NOT NULL DEFAULT '',
  `MessageNo` int(11) NOT NULL DEFAULT '0',
  `mTime` timestamp NULL DEFAULT NULL,
  `SenderInfo` varchar(50) DEFAULT NULL,
  `senderType` varchar(25) DEFAULT NULL,
  `Subject` varchar(20) DEFAULT NULL,
  `mBody` text,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`CourseNo`,`MessageNo`),
  KEY `CourseNo` (`CourseNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_group_student`
--

INSERT INTO `message_group_student` (`CourseNo`, `MessageNo`, `mTime`, `SenderInfo`, `senderType`, `Subject`, `mBody`, `status`) VALUES
('CSE300', 1, '2012-09-13 04:35:37', '0805048', 'student', 'hkjkhk', 'hjk', 1),
('CSE300', 3, '2012-09-19 10:48:21', '05008', 'teacher', 'iugy', '98u', 1),
('CSE305', 1, '2012-10-10 13:07:14', '05008', 'teacher', 'h', 'hi all', 1),
('CSE309', 50, '2012-09-13 02:23:30', '0805049', 'student', 'fggggg', 'dfgdfgdf', 1),
('CSE309', 51, '2012-09-13 02:35:34', '0805049', 'student', 'wer', 'fs', 1),
('CSE309', 52, '2012-09-13 08:37:32', '05001', 'teacher', 'ase', 'aer', 1),
('CSE309', 53, '2012-09-13 03:26:05', '0805048', 'student', 'k[', '[k]i][', 0),
('CSE309', 54, '2012-09-13 03:30:39', '0805048', 'student', 'sdg', 'dfgd', 1),
('CSE309', 55, '2012-09-13 03:30:47', '0805048', 'student', 'dgfdg', 'gdggdfgdfgjdmu,krjythn', 1),
('CSE309', 56, '2012-09-13 03:30:53', '0805048', 'student', 'ya hello', 'dfg', 1),
('CSE309', 59, '2012-09-17 09:36:41', '0805049', 'student', 'fghgfhfghfg', 'fh', 0),
('CSE309', 60, '2012-09-29 01:37:59', '0705049', 'student', 'dsfsdfsdfsdf', 'sdf', 1),
('CSE309', 61, '2012-10-03 22:45:43', '0805049', 'student', 'About new theme', 'page theme is nice.but it loads from internet.how it can be solved :(', 1),
('CSE309', 62, '2012-10-03 22:57:22', '0805049', 'student', 'theme is not ok with', ':(', 1),
('CSE310', 2, '2012-09-13 04:28:23', '0805048', 'student', 'aedaw', 'ewqeqweqwe', 0);

-- --------------------------------------------------------

--
-- Table structure for table `prerequisite`
--

CREATE TABLE IF NOT EXISTS `prerequisite` (
  `course_no_1` varchar(10) NOT NULL,
  `course_no_2` varchar(10) NOT NULL,
  PRIMARY KEY (`course_no_1`,`course_no_2`),
  KEY `course_no_1` (`course_no_1`,`course_no_2`),
  KEY `course_no_2` (`course_no_2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prerequisite`
--

INSERT INTO `prerequisite` (`course_no_1`, `course_no_2`) VALUES
('CSE303', 'CSE300'),
('CSE305', 'CSE304');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Dept_id` varchar(10) NOT NULL,
  `sLevel` varchar(10) NOT NULL,
  `Term` varchar(10) NOT NULL,
  `period` varchar(200) NOT NULL DEFAULT 'idle',
  PRIMARY KEY (`id`,`Dept_id`,`sLevel`,`Term`),
  KEY `Dept_id` (`Dept_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `Dept_id`, `sLevel`, `Term`, `period`) VALUES
(2, 'CSE', '3', '2', 'term_final_period'),
(3, 'CSE', '1', '1', 'registration_request'),
(4, 'CSE', '1', '2', 'result_show_period'),
(5, 'CSE', '2', '1', 'idle'),
(10, 'CSE', '3', '1', 'registration_request');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `S_Id` varchar(10) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Dept_id` varchar(6) DEFAULT NULL,
  `sLevel` int(11) DEFAULT NULL,
  `Term` int(11) DEFAULT NULL,
  `Sec` varchar(2) DEFAULT NULL,
  `Advisor` varchar(10) DEFAULT NULL,
  `Curriculam` int(11) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL,
  `father_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  PRIMARY KEY (`S_Id`),
  KEY `Dept_id` (`Dept_id`),
  KEY `Advisor` (`Advisor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`S_Id`, `Name`, `Dept_id`, `sLevel`, `Term`, `Sec`, `Advisor`, `Curriculam`, `Password`, `father_name`, `email`, `address`, `phone`) VALUES
('0705049', 'Tanzir Ul Islam Senior', 'CSE', 3, 2, 'A2', '05002', 2005, '1234', 'asd', 'tanzir@yahoo.com', '', '0'),
('0706049', 'Tanzir EEE', 'EEE', 3, 2, 'A2', NULL, 2005, '1234', '', '', '', '0'),
('0805001', 'Ishat-E-Rabban', 'CSE', 3, 1, 'A1', '05001', 2005, '1234', '', '', '', '0'),
('0805002', 'Radi Moahammad Reza', 'CSE', 3, 1, 'A1', '05001', 2005, '1234', '', '', '', '0'),
('0805003', NULL, 'CSE', 3, 1, 'A', NULL, NULL, '9TNi2kgVjD', '', '', '', '0'),
('0805004', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'pxNUQ9Ip1d', '', '', '', '0'),
('0805005', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'mVh0aGDGq9', '', '', '', '0'),
('0805006', NULL, 'CSE', 3, 1, 'A', NULL, NULL, '6Lc8eqWEyc', '', '', '', '0'),
('0805007', 'kausar ahmed', 'CSE', 3, 2, 'A1', '05001', 2008, '1234', '', '', '', '0'),
('0805008', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'RfYf5QQoO4', '', '', '', '0'),
('0805009', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'yxce90aQZo', '', '', '', '0'),
('0805010', NULL, 'CSE', 3, 1, 'A', NULL, NULL, '0dmnqHMvvv', '', '', '', '0'),
('0805011', NULL, 'CSE', 3, 1, 'A', NULL, NULL, '4INuvdBuV2', '', '', '', '0'),
('0805012', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'Qmt4mW2aX4', '', '', '', '0'),
('0805013', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'MuHdAz0kpZ', '', '', '', '0'),
('0805014', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'fdBj3KWXGw', '', '', '', '0'),
('0805015', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'pZhaKj1ijy', '', '', '', '0'),
('0805016', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'o5HjgoxOBV', '', '', '', '0'),
('0805017', NULL, 'CSE', 3, 1, 'A', NULL, NULL, '8ptjeHmAZm', '', '', '', '0'),
('0805018', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'Tlr4TXf3ku', '', '', '', '0'),
('0805019', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'jwElUNyVm3', '', '', '', '0'),
('0805020', NULL, 'CSE', 3, 1, 'A', NULL, NULL, '3qy1I8kI8v', '', '', '', '0'),
('0805021', NULL, 'CSE', 3, 1, 'A', NULL, NULL, '0B7StglKpk', '', '', '', '0'),
('0805022', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'sjOi6GoY6G', '', '', '', '0'),
('0805023', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'Zu3koX8XVv', '', '', '', '0'),
('0805024', NULL, 'CSE', 3, 1, 'A', NULL, NULL, '7GCl4jpLz0', '', '', '', '0'),
('0805025', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'yWHyC8FUOt', '', '', '', '0'),
('0805026', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'oHbwRI602A', '', '', '', '0'),
('0805027', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'Nr0zMFthFE', '', '', '', '0'),
('0805028', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'feDWbDapBe', '', '', '', '0'),
('0805029', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'zL0z5uT308', '', '', '', '0'),
('0805030', NULL, 'CSE', 3, 1, 'A', NULL, NULL, '6dWr64qykk', '', '', '', '0'),
('0805031', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'oBmSfUF77w', '', '', '', '0'),
('0805032', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'DlCZT1QzWM', '', '', '', '0'),
('0805033', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'iNbCvloLdt', '', '', '', '0'),
('0805034', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'LXlX4Pje5T', '', '', '', '0'),
('0805035', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'ViDnbkLoqq', '', '', '', '0'),
('0805036', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'zkhQoxiWEz', '', '', '', '0'),
('0805037', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'nP2suGzVAP', '', '', '', '0'),
('0805038', 'saikar chakraborty', 'CHE', 1, 1, 'A1', '05001', 1990, '1234', '', '', '', '0'),
('0805039', 'Madhududan bashak', 'CHE', 1, 1, 'A1', '05001', 1990, '1234', '', '', '', '0'),
('0805040', 'Mir Tazbinur sharif', 'CSE', 3, 2, 'A2', '05004', 2008, '1234', 'Abul Hosain', 'tashjg@yy.cc', '', '1674123456'),
('0805041', NULL, 'CSE', 3, 1, 'A', NULL, NULL, '8p9q5iJlLq', '', '', '', '0'),
('0805042', 'Ratul Sarkar', 'CSE', 3, 1, 'A', NULL, NULL, '1234', 'SS Sarkar', 'tanzir@yahoo.com', '', '+8801674225566'),
('0805043', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'wfr91TRq72', '', '', '', '0'),
('0805044', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'ugL8grNikZ', '', '', '', '0'),
('0805045', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'Z6SYRwO5xn', '', '', '', '0'),
('0805046', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'CQnxHTyIs7', '', '', '', '0'),
('0805047', 'Siddhartha Shankar Das', 'CSE', 3, 1, 'A2', '05001', 2005, '1234', '', '', '', '0'),
('0805048', 'Md. Arafat Imtiaz Sagor H', 'CSE', 3, 1, 'A2', '05001', 2005, '1234', '', 'tanzir@yahoo.com', '', '0'),
('0805049', 'Tanzir Ul Islam', 'CSE', 3, 1, 'A2', '05001', 2005, '1234', 'Tazul Islam Sarkar', 'tanzir.b@gmail.com', 'titumir hall 3008 buet dhaka,bangladesh', '01674894024'),
('0805050', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'ztlZaX7Vrz', '', '', '', '0'),
('0805051', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'yDBFI1qcXD', '', '', '', '0'),
('0805052', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'welFGoBXJZ', '', '', '', '0'),
('0805053', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'stTclpwMEU', '', '', '', '0'),
('0805054', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'YPs0lDTqja', '', '', '', '0'),
('0805055', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'Q18Rpoh9Cd', '', '', '', '0'),
('0805056', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'sjCORvj3YV', '', '', '', '0'),
('0805057', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'kGsbnsFJyL', '', '', '', '0'),
('0805058', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'LwzcTuaWvm', '', '', '', '0'),
('0805059', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'Z1bTITtOOk', '', '', '', '0'),
('0805060', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'TZUfOlBObU', '', '', '', '0'),
('0805061', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'z3XErXHoT1', '', '', '', '0'),
('0805062', NULL, 'CSE', 3, 1, 'A', NULL, NULL, '7fz31oespT', '', '', '', '0'),
('0805063', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'xSt1SNhxa1', '', '', '', '0'),
('0805064', NULL, 'CSE', 3, 1, 'A', NULL, NULL, '2dXIXOUDHe', '', '', '', '0'),
('0805065', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'UW7G3VgskG', '', '', '', '0'),
('0805066', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'gldPmVWnSF', '', '', '', '0'),
('0805067', 'Jahangir Alam', 'CSE', 3, 1, 'B1', '05002', 2005, '1234', '', '', '', '0'),
('0805068', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'BAMRqYCcPm', '', '', '', '0'),
('0805069', NULL, 'CSE', 3, 1, 'A', NULL, NULL, '9lYnY9AKt1', '', '', '', '0'),
('0805070', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'VLTZFMb4C1', '', '', '', '0'),
('0805071', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'kRVI7SRZDi', '', '', '', '0'),
('0805072', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'd5mtBNmj9h', '', '', '', '0'),
('0805073', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'telCZqWQRM', '', '', '', '0'),
('0805074', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'zPXCHB6Sht', '', '', '', '0'),
('0805075', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'cvPIL36OyE', '', '', '', '0'),
('0805076', NULL, 'CSE', 3, 1, 'A', NULL, NULL, '6uvVKYb3OP', '', '', '', '0'),
('0805077', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'V91H49Cb41', '', '', '', '0'),
('0805078', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'oOt0yFNpA4', '', '', '', '0'),
('0805079', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'LL63WgHdlJ', '', '', '', '0'),
('0805080', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'IGIMUyi8Dj', '', '', '', '0'),
('0805081', NULL, 'CSE', 3, 1, 'A', NULL, NULL, '14nMIyklnZ', '', '', '', '0'),
('0805082', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'drHiEtdyVg', '', '', '', '0'),
('0805083', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'ho7h2PSsCX', '', '', '', '0'),
('0805084', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'izwef6nF5f', '', '', '', '0'),
('0805085', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'NQtn4gH6W7', '', '', '', '0'),
('0805086', 'Faruk Hossen', 'CSE', 3, 1, 'B1', '05002', 2005, '1234', '', '', '', '0'),
('0805087', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'eAbErFg9mY', '', '', '', '0'),
('0805088', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'fj1L0K9wae', '', '', '', '0'),
('0805089', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'nFK6qUVqdj', '', '', '', '0'),
('0805090', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'imjDTp7Mt1', '', '', '', '0'),
('0805091', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'bE0TJveVKJ', '', '', '', '0'),
('0805092', NULL, 'CSE', 3, 1, 'A', NULL, NULL, '7JvhfX6SbE', '', '', '', '0'),
('0805093', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'aCtxNYx8Td', '', '', '', '0'),
('0805094', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'n5UNkw7mXO', '', '', '', '0'),
('0805095', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'XkAJhBzBup', '', '', '', '0'),
('0805096', NULL, 'CSE', 3, 1, 'A', NULL, NULL, '3CM42WiiHZ', '', '', '', '0'),
('0805097', NULL, 'CSE', 3, 1, 'A', NULL, NULL, '0nfPjschph', '', '', '', '0'),
('0805098', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'o380ga95uC', '', '', '', '0'),
('0805099', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'YGhL13AWCF', '', '', '', '0'),
('0805100', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'TNrX7HvFO8', '', '', '', '0'),
('0805101', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'vKP7rqU7oO', '', '', '', '0'),
('0805102', 'Ovi', 'CSE', 3, 1, 'B2', '05002', 2005, '1234', '', '', '', '0'),
('0805103', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'gbPiwN3q0A', '', '', '', '0'),
('0805104', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'hM2nN3oAOX', '', '', '', '0'),
('0805105', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'ikGPAJ9jpM', '', '', '', '0'),
('0805106', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'Epc1F8xwmP', '', '', '', '0'),
('0805107', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'wA1ANAsedF', '', '', '', '0'),
('0805108', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'bnePwdSdRQ', '', '', '', '0'),
('0805109', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'QbKJilXVru', '', '', '', '0'),
('0805110', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'pAiwW205Vo', '', '', '', '0'),
('0805111', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'SO1ZpVzAQf', '', '', '', '0'),
('0805112', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'sZBx75xYoE', '', '', '', '0'),
('0805113', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'sRXnQOq9aj', '', '', '', '0'),
('0805114', 'Sakib', 'CSE', 3, 1, 'B2', '05002', 2005, '1234', '', '', '', '0'),
('0805115', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'Xa41XQYJu6', '', '', '', '0'),
('0805116', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'z0ena8LKEk', '', '', '', '0'),
('0805117', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'zx5ljHXe3B', '', '', '', '0'),
('0805118', NULL, 'CSE', 3, 1, 'A', NULL, NULL, '4ULKQJHHBe', '', '', '', '0'),
('0805119', NULL, 'CSE', 3, 1, 'A', NULL, NULL, 'VLPC9wr4qZ', '', '', '', '0'),
('0805120', NULL, 'CSE', 3, 1, 'A', NULL, NULL, '4pPnF4uMSE', '', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `takencourse`
--

CREATE TABLE IF NOT EXISTS `takencourse` (
  `Status` varchar(50) DEFAULT NULL,
  `GPA` decimal(4,2) DEFAULT NULL,
  `CourseNo` varchar(10) NOT NULL DEFAULT '',
  `S_Id` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`S_Id`,`CourseNo`),
  KEY `CourseNo` (`CourseNo`,`S_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `takencourse`
--

INSERT INTO `takencourse` (`Status`, `GPA`, `CourseNo`, `S_Id`) VALUES
('Running', 0.00, 'CSE309', '0705049'),
('Passed', 2.75, 'CSE310', '0705049'),
('Passed', 4.00, 'CSE321', '0705049'),
('Passed', 3.75, 'CSE322', '0705049'),
('Passed', 3.50, 'CSE300', '0805001'),
('Passed', 3.25, 'CSE303', '0805001'),
('Passed', 3.00, 'CSE304', '0805001'),
('Passed', 3.50, 'CSE305', '0805001'),
('Passed', 3.75, 'CSE307', '0805001'),
('Passed', 4.00, 'CSE308', '0805001'),
('Passed', 2.75, 'CSE309', '0805001'),
('Passed', 2.50, 'CSE310', '0805001'),
('Passed', 2.50, 'CSE311', '0805001'),
('Running', NULL, 'CSE300', '0805002'),
('Running', NULL, 'CSE303', '0805002'),
('Running', NULL, 'CSE304', '0805002'),
('Running', NULL, 'CSE305', '0805002'),
('Running', NULL, 'CSE307', '0805002'),
('Running', NULL, 'CSE308', '0805002'),
('Running', NULL, 'CSE309', '0805002'),
('Running', NULL, 'CSE310', '0805002'),
('Running', NULL, 'CSE311', '0805002'),
('Running', NULL, 'CSE311', '0805042'),
('Running', NULL, 'CSE401', '0805042'),
('Running', NULL, 'CSE402', '0805042'),
('Running', NULL, 'CSE300', '0805048'),
('Running', NULL, 'CSE303', '0805048'),
('Running', NULL, 'CSE304', '0805048'),
('Running', NULL, 'CSE305', '0805048'),
('Running', NULL, 'CSE307', '0805048'),
('Running', NULL, 'CSE308', '0805048'),
('Running', NULL, 'CSE309', '0805048'),
('Running', NULL, 'CSE310', '0805048'),
('Running', NULL, 'CSE311', '0805048'),
('Running', NULL, 'CSE300', '0805049'),
('Running', NULL, 'CSE303', '0805049'),
('Running', NULL, 'CSE304', '0805049'),
('Running', NULL, 'CSE305', '0805049'),
('Running', NULL, 'CSE307', '0805049'),
('Running', NULL, 'CSE308', '0805049'),
('Running', NULL, 'CSE309', '0805049'),
('Running', NULL, 'CSE310', '0805049'),
('Running', NULL, 'CSE311', '0805049'),
('Running', NULL, 'CSE300', '0805067'),
('Running', NULL, 'CSE303', '0805067'),
('Running', NULL, 'CSE304', '0805067'),
('Running', NULL, 'CSE305', '0805067'),
('Running', NULL, 'CSE307', '0805067'),
('Running', NULL, 'CSE308', '0805067'),
('Running', NULL, 'CSE309', '0805067'),
('Running', NULL, 'CSE310', '0805067'),
('Running', NULL, 'CSE311', '0805067'),
('Running', NULL, 'CSE300', '0805086'),
('Running', NULL, 'CSE303', '0805086'),
('Running', NULL, 'CSE304', '0805086'),
('Running', NULL, 'CSE305', '0805086'),
('Running', NULL, 'CSE307', '0805086'),
('Running', NULL, 'CSE308', '0805086'),
('Running', NULL, 'CSE309', '0805086'),
('Running', NULL, 'CSE310', '0805086'),
('Running', NULL, 'CSE311', '0805086'),
('Running', NULL, 'CSE300', '0805102'),
('Running', NULL, 'CSE303', '0805102'),
('Running', NULL, 'CSE304', '0805102'),
('Running', NULL, 'CSE305', '0805102'),
('Running', NULL, 'CSE307', '0805102'),
('Running', NULL, 'CSE308', '0805102'),
('Running', NULL, 'CSE309', '0805102'),
('Running', NULL, 'CSE310', '0805102'),
('Running', NULL, 'CSE311', '0805102'),
('Running', NULL, 'CSE300', '0805114'),
('Running', NULL, 'CSE303', '0805114'),
('Running', NULL, 'CSE304', '0805114'),
('Running', NULL, 'CSE305', '0805114'),
('Running', NULL, 'CSE307', '0805114'),
('Running', NULL, 'CSE308', '0805114'),
('Running', NULL, 'CSE309', '0805114'),
('Running', NULL, 'CSE310', '0805114'),
('Running', NULL, 'CSE311', '0805114');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `Name` varchar(50) DEFAULT NULL,
  `T_Id` varchar(10) NOT NULL,
  `Password` varchar(30) DEFAULT NULL,
  `Dept_Id` varchar(6) DEFAULT NULL,
  `Designation` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`T_Id`),
  KEY `Dept_Id` (`Dept_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`Name`, `T_Id`, `Password`, `Dept_Id`, `Designation`) VALUES
('Rajkumar Das', '05001', '1234', 'CSE', 'Assistant Professor'),
('Dr. A.S.M. Latiful Haque', '05002', '1234', 'CSE', 'Associate Professor'),
('Mahfuza Sarmin', '05003', '1234', 'CSE', 'Lecturer'),
('Rezwana Riaz', '05004', '1234', 'CSE', 'Lecturer'),
('Hasan Shahid Ferdous', '05005', '1234', 'CSE', 'Assistant Professor'),
('Khaled Mahmud Sahriar', '05006', '1234', 'CSE', 'Assistant Professor'),
('Mostafijur Rahman', '05007', '1234', 'CSE', 'Lecturer'),
('Sumaiya Iqbal', '05008', '1234', 'CSE', 'Lecturer'),
('Sumaiya Nazneen', '05009', '1234', 'CSE', 'Lecturer'),
('Shahriar Rouf', '05010', '1234', 'CSE', 'Lecturer'),
('Shaifur Rahman', '05011', '1234', 'CSE', 'Lecturer'),
('Dr. Eunus Ali', '05012', '1234', 'CSE', 'Assistant Professor'),
('Shahrear Iqbal', '05013', '1234', 'CSE', 'Assistant Professor'),
('Nashid Shahrear', '05014', '1234', 'CSE', 'Lecture'),
('Dr. Masroor Ali', '05015', '1234', 'CSE', 'Professor'),
('Abdus salam azad', '05550', '1234', 'CSE', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `termfinalexam`
--

CREATE TABLE IF NOT EXISTS `termfinalexam` (
  `CourseNo` varchar(10) NOT NULL DEFAULT '',
  `Sec` varchar(2) NOT NULL DEFAULT '',
  `eDate` date NOT NULL DEFAULT '0000-00-00',
  `eTime` varchar(10) NOT NULL DEFAULT '',
  `Duration` varchar(5) DEFAULT NULL,
  `Location` varchar(15) DEFAULT NULL,
  `eType` varchar(10) DEFAULT NULL,
  `Topic` varchar(30) DEFAULT NULL,
  `FileLocation` varchar(30) DEFAULT NULL,
  `S_Id` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`CourseNo`,`Sec`,`eDate`,`eTime`,`S_Id`),
  KEY `CourseNo` (`CourseNo`,`S_Id`),
  KEY `S_Id` (`S_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignedcourse`
--
ALTER TABLE `assignedcourse`
  ADD CONSTRAINT `assignedcourse_ibfk_1` FOREIGN KEY (`T_Id`) REFERENCES `teacher` (`T_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignedcourse_ibfk_2` FOREIGN KEY (`CourseNo`) REFERENCES `course` (`CourseNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `classinfo`
--
ALTER TABLE `classinfo`
  ADD CONSTRAINT `classinfo_ibfk_1` FOREIGN KEY (`CourseNo`) REFERENCES `course` (`CourseNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `classinfo_ibfk_2` FOREIGN KEY (`by_teacher`) REFERENCES `assignedcourse` (`T_Id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`CourseNo`) REFERENCES `course` (`CourseNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`CourseNo`) REFERENCES `course` (`CourseNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`Dept_ID`) REFERENCES `department` (`Dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`CourseNo`) REFERENCES `course` (`CourseNo`);

--
-- Constraints for table `hascourse`
--
ALTER TABLE `hascourse`
  ADD CONSTRAINT `hascourse_ibfk_1` FOREIGN KEY (`Dept_Id`) REFERENCES `department` (`Dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hascourse_ibfk_2` FOREIGN KEY (`course_no`) REFERENCES `course` (`CourseNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message_group_student`
--
ALTER TABLE `message_group_student`
  ADD CONSTRAINT `message_group_student_ibfk_1` FOREIGN KEY (`CourseNo`) REFERENCES `course` (`CourseNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prerequisite`
--
ALTER TABLE `prerequisite`
  ADD CONSTRAINT `prerequisite_ibfk_1` FOREIGN KEY (`course_no_1`) REFERENCES `course` (`CourseNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prerequisite_ibfk_2` FOREIGN KEY (`course_no_2`) REFERENCES `course` (`CourseNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`Dept_id`) REFERENCES `department` (`Dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Dept_id`) REFERENCES `department` (`Dept_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`Advisor`) REFERENCES `teacher` (`T_Id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `takencourse`
--
ALTER TABLE `takencourse`
  ADD CONSTRAINT `takencourse_ibfk_1` FOREIGN KEY (`CourseNo`) REFERENCES `course` (`CourseNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `takencourse_ibfk_2` FOREIGN KEY (`S_Id`) REFERENCES `student` (`S_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`Dept_Id`) REFERENCES `department` (`Dept_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `termfinalexam`
--
ALTER TABLE `termfinalexam`
  ADD CONSTRAINT `termfinalexam_ibfk_1` FOREIGN KEY (`CourseNo`) REFERENCES `course` (`CourseNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `termfinalexam_ibfk_2` FOREIGN KEY (`S_Id`) REFERENCES `student` (`S_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
