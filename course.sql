-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 12, 2012 at 05:32 PM
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
('secret', '827ccb0eea8a706c4c34a16891f84e7b', 'siddhartha047@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `classinfo`
--

CREATE TABLE IF NOT EXISTS `classinfo` (
  `CourseNo` varchar(10) NOT NULL DEFAULT '',
  `cDay` varchar(12) NOT NULL DEFAULT '',
  `Period` int(11) DEFAULT NULL,
  `Sec` varchar(2) NOT NULL DEFAULT '',
  `cTime` varchar(10) DEFAULT NULL,
  `Location` varchar(15) DEFAULT NULL,
  `Duration` varchar(5) DEFAULT NULL,
  `by_teacher` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`CourseNo`,`cDay`,`Sec`),
  KEY `CourseNo` (`CourseNo`),
  KEY `by_teacher` (`by_teacher`),
  KEY `by_teacher_2` (`by_teacher`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classinfo`
--

INSERT INTO `classinfo` (`CourseNo`, `cDay`, `Period`, `Sec`, `cTime`, `Location`, `Duration`, `by_teacher`) VALUES
('CSE303', 'Sunday', 3, 'A', '10:00 am', 'CSE102', '50', '05001'),
('CSE303', 'Sunday', 2, 'B', '09:00 am', 'CSE102', '50', '05001'),
('CSE303', 'Tuesday', 2, 'A', '09:00 am', 'CSE102', '50', '05001'),
('CSE303', 'Tuesday', 3, 'B', '10:00 am', 'CSE102', '50', '05001'),
('CSE303', 'Wednesday', 2, 'A', '09:00 am', 'CSE102', '50', '05002'),
('CSE303', 'Wednesday', 1, 'B', '08:00 am', 'CSE102', '50', '05002'),
('CSE304', 'Monday', 7, 'A2', '02:30 pm', 'CSE109', '150', '05001'),
('CSE304', 'Saturday', 7, 'B1', '02:30 pm', 'CSE109', '150', '05002'),
('CSE304', 'Sunday', 7, 'A1', '02:30 pm', 'CSE109', '150', '05001'),
('CSE305', 'Monday', 1, 'A', '08:00 am', 'CSE102', '50', '05003'),
('CSE305', 'Saturday', 5, 'B', '12:00 pm', 'CSE109', '50', '05003'),
('CSE305', 'Sunday', 1, 'A', '08:00 am', 'CSE102', '50', '05003'),
('CSE305', 'Sunday', 4, 'B', '11:00 am', 'CSE102', '50', '05003'),
('CSE305', 'Tuesday', 3, 'A', '10:00 am', 'CSE102', '50', '05003'),
('CSE305', 'Tuesday', 1, 'B', '08:00 am', 'CSE102', '50', '05003'),
('CSE307', 'Monday', 4, 'A', '11:00 am', 'CSE102', '50', '05004'),
('CSE307', 'Monday', 5, 'B', '12:00 pm', 'CSE102', '50', '05004'),
('CSE307', 'Saturday', 1, 'A', '08:00 am', 'CSE109', '50', '05004'),
('CSE307', 'Saturday', 4, 'B', '11:00 pm', 'CSE109', '50', '05004'),
('CSE307', 'Sunday', 4, 'A', '11:00 am', 'CSE102', '50', '05004'),
('CSE307', 'Sunday', 5, 'B', '12:00 pm', 'CSE102', '50', '05004'),
('CSE307', 'Wednesday', 1, 'A', '08:00 am', 'CSE102', '50', '05004'),
('CSE307', 'Wednesday', 3, 'B', '10:00 am', 'CSE102', '50', '05004'),
('CSE308', 'Tuesday', 4, 'A1', '11:00 am', 'CSE102', '150', '05004'),
('CSE308', 'Wednesday', 7, 'A2', '02:30 pm', 'CSE109', '150', '05005'),
('CSE308', 'Wednesday', 4, 'B1', '11:00 am', 'CSE109', '150', '05004'),
('CSE309', 'Monday', 2, 'A', '09:00 am', 'CSE102', '50', '05006'),
('CSE309', 'Monday', 3, 'B', '10:00 am', 'CSE102', '50', '05006'),
('CSE309', 'Saturday', 2, 'A', '09:00 am', 'CSE109', '50', '05006'),
('CSE309', 'Saturday', 3, 'B', '10:00 am', 'CSE109', '50', '05006'),
('CSE309', 'Sunday', 2, 'A', '09:00 am', 'CSE102', '50', '05007'),
('CSE309', 'Sunday', 3, 'B', '10:00 am', 'CSE102', '50', '05007'),
('CSE310', 'Saturday', 7, 'A1', '02:30 pm', 'CSE109', '50', '05007'),
('CSE310', 'Saturday', 7, 'A2', '02:30 pm', 'CSE109', '150', '05008'),
('CSE310', 'Tuesday', 4, 'B1', '11:00 am', 'CSE102', '150', '05007'),
('CSE311', 'Monday', 3, 'A', '10:00 am', 'CSE102', '50', '05009'),
('CSE311', 'Monday', 2, 'B', '09:00 am', 'CSE102', '50', '05009'),
('CSE311', 'Saturday', 3, 'A', '10:00 am', 'CSE109', '50', '05010'),
('CSE311', 'Saturday', 2, 'B', '09:00 am', 'CSE109', '50', '05010'),
('CSE311', 'Wednesday', 3, 'A', '10:00 am', 'CSE102', '50', '05009'),
('CSE311', 'Wednesday', 2, 'B', '09:00 am', 'CSE102', '50', '05009');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `msg_no`, `CourseNo`, `time`, `commentBy`, `body`, `status`, `senderType`) VALUES
(1, 8, 'CSE309', '2012-08-27 21:39:31', 'Tanzir Ul Islam', 'gh', 1, 'student'),
(2, 10, 'CSE309', '2012-08-27 15:41:08', 'Tanzir Ul Islam', 'tai naki ?<br />\r\nvaloi', 1, 'student'),
(3, 10, 'CSE309', '2012-08-27 15:41:19', 'Tanzir Ul Islam', 'tai naki ?<br />\r\nvaloi', 1, 'student'),
(4, 10, 'CSE309', '2012-08-27 15:42:08', 'Tanzir Ul Islam', 'tgh', 1, 'student'),
(5, 10, 'CSE309', '2012-08-27 15:47:12', 'Tanzir Ul Islam', 'good', 1, 'student'),
(6, 10, 'CSE309', '2012-08-27 15:50:26', 'Md. Arafat Imtiaz', 'hd', 1, 'student'),
(7, 11, 'CSE309', '2012-08-27 15:54:28', 'Md. Arafat Imtiaz', 'cuyk', 1, 'student'),
(8, 11, 'CSE309', '2012-08-27 15:54:51', 'Md. Arafat Imtiaz', 'dfgdfgdf dfg', 1, 'student'),
(9, 11, 'CSE309', '2012-08-27 15:54:56', 'Md. Arafat Imtiaz', 'dfg ddfg dfg ', 1, 'student'),
(10, 11, 'CSE309', '2012-08-27 22:26:22', 'Md. Arafat Imtiaz', '55345aaaaaaaaaaaaaa asddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 0, 'student'),
(11, 11, 'CSE309', '2012-08-27 15:55:14', 'Md. Arafat Imtiaz', 'fgggggggggggggggggg', 1, 'student'),
(12, 11, 'CSE309', '2012-08-27 15:55:21', 'Md. Arafat Imtiaz', 'dghggggggggggggggggggggggg', 1, 'student'),
(13, 11, 'CSE309', '2012-08-27 22:24:43', 'Tanzir Ul Islam', 'sdf sdf ??? ???? ?', 0, 'student'),
(14, 11, 'CSE309', '2012-08-28 20:57:13', 'Tanzir Ul Islam', 'hig yu fy', 0, 'student'),
(15, 11, 'CSE309', '2012-08-27 16:24:36', 'Tanzir Ul Islam', 'fhgfv c', 1, 'student'),
(16, 11, 'CSE309', '2012-08-27 16:26:48', 'Md. Arafat Imtiaz', 'dd t', 1, 'student'),
(17, 4, 'CSE310', '2012-08-27 16:28:08', 'Md. Arafat Imtiaz', 'he ehe eh', 1, 'student'),
(18, 5, 'CSE310', '2012-08-27 16:29:08', 'Md. Arafat Imtiaz', '??', 1, 'student'),
(19, 3, 'CSE309', '2012-08-27 17:50:52', 'Md. Arafat Imtiaz', 'he he he', 1, 'student'),
(20, 3, 'CSE309', '2012-08-27 23:55:51', 'Tanzir Ul Islam', 'asf', 0, 'student'),
(21, 8, 'CSE309', '2012-08-28 01:22:43', 'Tanzir Ul Islam', 'hello everybody', 1, 'student'),
(22, 2, 'CSE304', '2012-08-28 16:36:45', 'Ishat-E-Rabban', 'urgent reply needed :(', 0, 'student'),
(23, 2, 'CSE304', '2012-08-28 10:36:54', 'Ishat-E-Rabban', 'reply needed', 1, 'student'),
(24, 11, 'CSE309', '2012-08-28 10:39:25', 'Ishat-E-Rabban', 'hmm', 1, 'student'),
(25, 11, 'CSE309', '2012-08-28 14:35:44', 'Tanzir Ul Islam', '4err ', 1, 'student'),
(26, 11, 'CSE309', '2012-08-28 14:35:49', 'Tanzir Ul Islam', 'rt reg er g edrre', 1, 'student'),
(27, 11, 'CSE309', '2012-08-28 14:46:55', 'Tanzir Ul Islam', 'sdf', 1, 'student'),
(28, 11, 'CSE309', '2012-08-28 14:47:43', 'Tanzir Ul Islam', 'sdf', 1, 'student'),
(29, 11, 'CSE309', '2012-09-06 18:51:13', 'Tanzir Ul Islam', 'asd guag uaul;kjhsli l', 0, 'student'),
(30, 11, 'CSE309', '2012-08-28 14:57:44', 'Tanzir Ul Islam', 'ase', 1, 'student'),
(31, 20, 'CSE309', '2012-08-28 15:01:13', 'Tanzir Ul Islam', 'ser', 1, 'student'),
(32, 11, 'CSE309', '2012-08-30 17:50:06', 'Ishat-E-Rabban', 'df', 0, 'student'),
(33, 23, 'CSE309', '2012-08-30 11:50:39', 'Ishat-E-Rabban', 'fdjuujjjj', 1, 'student'),
(34, 26, 'CSE309', '2012-08-30 15:18:32', 'Tanzir Ul Islam', 'df', 1, 'student'),
(35, 28, 'CSE309', '2012-08-30 21:19:03', 'Tanzir Ul Islam', 'fg', 0, 'student'),
(36, 28, 'CSE309', '2012-08-30 15:19:11', 'Tanzir Ul Islam', 'rttrrt', 1, 'student'),
(37, 28, 'CSE309', '2012-08-31 10:31:36', 'Md. Arafat Imtiaz', ' ', 1, 'student'),
(38, 28, 'CSE309', '2012-08-31 10:32:00', 'Md. Arafat Imtiaz', 're', 1, 'student'),
(39, 28, 'CSE309', '2012-08-31 10:32:03', 'Md. Arafat Imtiaz', 'et', 1, 'student'),
(40, 28, 'CSE309', '2012-08-31 10:32:06', 'Md. Arafat Imtiaz', 'ete', 1, 'student'),
(41, 28, 'CSE309', '2012-08-31 10:32:10', 'Md. Arafat Imtiaz', 'eeeeeeeeeeee', 1, 'student'),
(42, 28, 'CSE309', '2012-08-31 10:32:14', 'Md. Arafat Imtiaz', 'eeeettttttttttttt', 1, 'student'),
(43, 28, 'CSE309', '2012-08-31 10:32:18', 'Md. Arafat Imtiaz', 'ttttttttttttttttttttttttttttttt', 1, 'student'),
(44, 28, 'CSE309', '2012-08-31 10:32:23', 'Md. Arafat Imtiaz', 'ttttttttttttttttttttttttttttttttttttt', 1, 'student'),
(45, 28, 'CSE309', '2012-08-31 16:33:13', 'Md. Arafat Imtiaz', 't', 0, 'student'),
(46, 28, 'CSE309', '2012-08-31 10:32:29', 'Md. Arafat Imtiaz', 'tty', 1, 'student'),
(47, 26, 'CSE309', '2012-08-31 10:33:02', 'Md. Arafat Imtiaz', 'jk', 1, 'student'),
(48, 8, 'CSE310', '2012-08-31 10:56:44', 'Md. Arafat Imtiaz', 'nb', 1, 'student'),
(49, 8, 'CSE310', '2012-08-31 10:56:50', 'Md. Arafat Imtiaz', 'bh', 1, 'student'),
(50, 35, 'CSE309', '2012-09-02 07:40:17', 'Tanzir Ul Islam', 'd', 1, 'student'),
(51, 26, 'CSE309', '2012-09-02 15:46:50', 'Md. Arafat Imtiaz', 'l', 0, 'student'),
(52, 26, 'CSE309', '2012-09-02 09:47:00', 'Tanzir Ul Islam', 'hello world', 1, 'student'),
(53, 26, 'CSE309', '2012-09-02 09:47:14', 'Md. Arafat Imtiaz', 'comment', 1, 'student'),
(54, 4, 'CSE310', '2012-09-06 10:39:08', 'Tanzir Ul Islam Senior', 'hu', 1, 'student'),
(55, 1, 'CSE321', '2012-09-06 10:43:44', 'Tanzir Ul Islam Senior', 'cc', 1, 'student'),
(56, 11, 'CSE309', '2012-09-06 12:47:10', 'Tanzir Ul Islam', 'ty', 1, 'student'),
(57, 11, 'CSE309', '2012-09-06 12:50:39', 'Tanzir Ul Islam', 'now using flash', 1, 'student'),
(58, 12, 'CSE310', '2012-09-06 14:20:28', 'Tanzir Ul Islam', 'gjh', 1, 'student'),
(59, 46, 'CSE309', '2012-09-12 01:35:30', 'Md. Arafat Imtiaz', 'asjfhjsdafdsfa', 1, 'student');

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
('CSE300', '9', 'try', 'df', 'Sumaiya Iqbal', '05008', '2012-09-12 09:37:46', 'Server_list_of_LAN1.txt', 0),
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
  PRIMARY KEY (`CourseNo`,`Sec`,`ID`),
  KEY `CourseNo` (`CourseNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`CourseNo`, `Sec`, `ID`, `eDate`, `eTime`, `Duration`, `Location`, `eType`, `Topic`, `Syllabus`, `Scheduler_ID`) VALUES
('CSE300', 'A1', 1, '2012-08-21', '11:0AM', '60', 'classroom', 'quiz', 'quiz1', 'arafat', '05008'),
('CSE300', 'A1', 2, '2012-08-29', '11:0AM', '60', 'classroom', 'presentation', 'presentation 1', 'arafat', '05008'),
('CSE300', 'A1', 3, '2012-08-20', '12:0AM', '2', 'sd', 'assignment', 'asd', 'sad', '05008'),
('CSE300', 'A1', 8, '2012-09-25', '01:00AM', '14', 'kk', 'quiz', 'fsd', 'df', '05008'),
('CSE300', 'all', 4, '2012-08-30', '12:0AM', '12', 's', 'assignment', 'Ass1', 'sad', '05008'),
('CSE300', 'B2', 5, '2012-08-29', '1:0AM', '12', 'classroom', 'assignment', 'aas', 'as', '05008'),
('CSE300', 'B2', 6, '2012-08-29', '1:0AM', '12', 'classroom', 'assignment', 'aas', 'as', '05008'),
('CSE300', 'B2', 7, '2012-08-29', '1:0AM', '12', 'classroom', 'assignment', 'aas', 'as', '05008'),
('CSE305', 'A', 1, '2012-08-28', '1:50AM', '50', 'sd', 'ct', 'CT1', 'ads', '05008'),
('CSE305', 'all', 2, '2012-08-20', '1:1AM', '12', '307', 'ct', 'ct2', '', '05008');

-- --------------------------------------------------------

--
-- Table structure for table `exam_type`
--

CREATE TABLE IF NOT EXISTS `exam_type` (
  `CourseNo` varchar(10) NOT NULL,
  `etype` varchar(20) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`CourseNo`,`etype`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_type`
--

INSERT INTO `exam_type` (`CourseNo`, `etype`, `Description`) VALUES
('CSE300', 'assignment', 'four assignment will be taken'),
('CSE300', 'Online', 'Online problem solving'),
('CSE300', 'presentation', 'one presentation will be taken'),
('CSE300', 'quiz', '1 quiz will be taken'),
('CSE300', 'viva', 'one viva'),
('CSE305', 'ct', 'Four ct will be taken best 3 will be counted'),
('CSE309', 'ct', '3 ct will be counted');

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
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `filename` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`,`CourseNo`),
  KEY `CourseNo` (`CourseNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `file_id`, `CourseNo`, `topic`, `description`, `uploader`, `time`, `filename`, `status`) VALUES
(7, 25, 'CSE309', 'ffffffffffffffffff', ' mmmmmmmmmmmmmmmmmm', 'Tanzir Ul Islam', '2012-08-30 14:45:10', 'JQuery-DataTables-Editable-Samples.1_.3_1.zip', 1),
(10, 7, 'CSE310', 'cv', 'bbbbbbbbbbbxdcv zxc dgdfg df', 'Md. Arafat Imtiaz', '2012-08-31 10:35:31', 'Koala.jpg', 1),
(11, 29, 'CSE309', 'j', '', 'Md. Arafat Imtiaz', '2012-08-31 10:41:12', 'Lighthouse.jpg', 1),
(12, 32, 'CSE309', ',.k', '', 'Md. Arafat Imtiaz', '2012-08-31 10:51:48', 'RESUME.doc', 1),
(13, 33, 'CSE309', 'b', '', 'Md. Arafat Imtiaz', '2012-08-31 10:53:28', 'RESUME1.doc', 1),
(14, 35, 'CSE309', 'kj', '', 'Md. Arafat Imtiaz', '2012-08-31 10:55:35', 'RESUME2.doc', 1),
(15, 8, 'CSE310', 'ki', '', 'Md. Arafat Imtiaz', '2012-08-31 10:56:26', 'PeaceMaker.doc', 1),
(16, 1, 'CSE305', 'cookie fuiel', '', 'Tanzir Ul Islam', '2012-09-04 07:58:28', 'syllabus01670292377mathsphysicsoptional_.zip', 1),
(17, 3, 'CSE305', 'ques', '', 'Tanzir Ul Islam', '2012-09-04 08:00:25', 'Physics_w10_qp_21.pdf', 1),
(18, 39, 'CSE309', 'cookie chrome', '', 'Md. Arafat Imtiaz', '2012-09-04 08:02:27', 'Physics_w10_qp_22.pdf', 1),
(19, 1, 'CSE300', 'b', '', 'Tanzir Ul Islam', '2012-09-04 08:07:51', 'Physics_w10_qp_22.pdf', 1),
(20, 9, 'CSE310', 'ques', '', 'Tanzir Ul Islam', '2012-09-04 08:17:35', 'Physics_w10_qp_22.pdf', 1),
(21, 13, 'CSE310', 'ques', '', 'Tanzir Ul Islam', '2012-09-06 12:20:01', 'Untitled.jpg', 1),
(22, 14, 'CSE310', 'mmmm', '', 'Tanzir Ul Islam', '2012-09-06 12:20:39', 'Untitled1.jpg', 1);

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
  PRIMARY KEY (`CourseNo`,`Sec`,`Exam_ID`,`S_ID`),
  KEY `S_ID` (`S_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`CourseNo`, `Sec`, `Exam_ID`, `S_ID`, `Total`, `Marks`) VALUES
('CSE300', 'A1', 1, '0805001', 10, 7),
('CSE300', 'A1', 1, '0805002', 10, 6),
('CSE300', 'A1', 2, '0805001', 5, 2),
('CSE300', 'A1', 2, '0805002', 5, 2),
('CSE300', 'A1', 3, '0805001', 10, 2),
('CSE300', 'A1', 3, '0805002', 10, 8),
('CSE300', 'A1', 8, '0805001', 12, 1),
('CSE300', 'A1', 8, '0805002', 12, 2),
('CSE300', 'all', 4, '0805001', 10, 5),
('CSE300', 'all', 4, '0805002', 10, 5),
('CSE300', 'all', 4, '0805048', 10, 10),
('CSE300', 'all', 4, '0805049', 10, 9),
('CSE300', 'all', 4, '0805067', 10, 10),
('CSE300', 'all', 4, '0805086', 10, 9),
('CSE300', 'all', 4, '0805102', 10, 8.5),
('CSE300', 'all', 4, '0805114', 10, 8),
('CSE300', 'B2', 5, '0805102', 20, 12),
('CSE300', 'B2', 5, '0805114', 20, 9),
('CSE300', 'B2', 6, '0805102', 10.2, 10),
('CSE300', 'B2', 6, '0805114', 10.2, 2),
('CSE300', 'B2', 7, '0805102', 10, 10),
('CSE300', 'B2', 7, '0805114', 10, 9),
('CSE305', 'A', 1, '0805001', 10, 1),
('CSE305', 'A', 1, '0805002', 10, 2),
('CSE305', 'A', 1, '0805048', 10, 3),
('CSE305', 'A', 1, '0805049', 10, 4),
('CSE305', 'all', 2, '0805001', 20, 10),
('CSE305', 'all', 2, '0805002', 20, 10),
('CSE305', 'all', 2, '0805048', 20, 10),
('CSE305', 'all', 2, '0805049', 20, 10),
('CSE305', 'all', 2, '0805067', 20, 10),
('CSE305', 'all', 2, '0805086', 20, 10),
('CSE305', 'all', 2, '0805102', 20, 10),
('CSE305', 'all', 2, '0805114', 20, 10);

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
('CSE300', 2, '2012-09-04 08:09:12', 'Tanzir Ul Islam', 'student', 'mk', 'm,', 1),
('CSE304', 1, '2012-08-18 16:06:39', 'Tanzir Ul Islam', 'student', 'cfg', 'gfh', 1),
('CSE304', 2, '2012-08-28 10:35:14', 'Ishat-E-Rabban', 'student', 'About Next Online', 'online 2 kobe hobe ?', 1),
('CSE305', 2, '2012-09-04 07:58:48', 'Tanzir Ul Islam', 'student', 'cfg', 'fc', 1),
('CSE305', 4, '2012-09-04 08:15:11', 'Tanzir Ul Islam', 'student', 'vb', 'v', 1),
('CSE307', 1, '2012-09-04 08:13:56', 'Tanzir Ul Islam', 'student', 'h', 'gh', 1),
('CSE308', 1, '2012-08-27 17:55:03', 'Md. Arafat Imtiaz', 'student', 'fsd', 'gggg gg g g g', 1),
('CSE309', 3, '2012-08-18 16:07:08', 'Md. Arafat Imtiaz', 'student', 'dfg', 'df gdg dfg j<br />\r\nhukj b<br />\r\nik.p[/ fjhfg', 1),
('CSE309', 4, '2012-08-18 16:21:43', 'Md. Arafat Imtiaz', 'student', 'gfggggggggwswwwww', 'sf fds', 0),
('CSE309', 5, '2012-08-19 02:19:53', 'Tanzir Ul Islam', 'student', 'hello', 'lkjasd sd;fsdfsfj ;sdfjoaksjdghls<br />\r\nsdfkljhkljfdg', 0),
('CSE309', 6, '2012-08-19 02:36:04', 'Tanzir Ul Islam', 'student', 'c', 'c', 0),
('CSE309', 7, '2012-08-19 02:36:18', 'Tanzir Ul Islam', 'student', 'xx', 'cx', 1),
('CSE309', 8, '2012-08-19 02:37:05', 'Tanzir Ul Islam', 'student', 'SOFT', 'ss', 1),
('CSE309', 9, '2012-08-19 03:27:49', 'Md. Arafat Imtiaz', 'student', 'sd', '???? ??? ????', 0),
('CSE309', 10, '2012-08-19 03:40:16', 'Md. Arafat Imtiaz', 'student', 'asd', 'adkjh a;o \\<br />\r\ndfkljhdf a a<br />\r\ndsfuygfd afdhl<br />\r\nsdakljfhdfsdkjhf ;sdf<br />\r\nsidf', 0),
('CSE309', 11, '2012-08-22 11:46:39', 'Tanzir Ul Islam', 'student', 'cxc', 'cvc vcb hthcvb bcfb ', 1),
('CSE309', 12, '2012-08-27 15:18:21', 'Tanzir Ul Islam', 'student', 'd', 'd', 0),
('CSE309', 13, '2012-08-27 16:07:40', 'Md. Arafat Imtiaz', 'student', 'wer', 'werewrwerwer', 0),
('CSE309', 14, '2012-08-28 14:15:08', 'Tanzir Ul Islam', 'student', 'hello', 'we ffrffewr fsd ', 1),
('CSE309', 15, '2012-08-28 14:17:19', 'Tanzir Ul Islam', 'student', 'dfgdfg', 'g', 1),
('CSE309', 16, '2012-08-28 14:18:56', 'Tanzir Ul Islam', 'student', 'dfgdfg', 'g', 1),
('CSE309', 17, '2012-08-28 14:20:49', 'Tanzir Ul Islam', 'student', 'sfdg', 'fgdfgvx dfg fgfdg ', 1),
('CSE309', 18, '2012-08-28 14:21:19', 'Tanzir Ul Islam', 'student', 'dfg', 'dfg dfg', 1),
('CSE309', 19, '2012-08-28 14:21:33', 'Tanzir Ul Islam', 'student', 'dfg45', '45455445', 1),
('CSE309', 20, '2012-08-28 15:00:53', 'Tanzir Ul Islam', 'student', 'sfgsdgfdg ', 'fsdg121111111111111', 0),
('CSE309', 21, '2012-08-30 11:22:09', 'Ishat-E-Rabban', 'student', 'f', 'ff', 0),
('CSE309', 22, '2012-08-30 11:48:27', 'Ishat-E-Rabban', 'student', 'wer', 'wer', 0),
('CSE309', 23, '2012-08-30 11:50:28', 'Ishat-E-Rabban', 'student', 'dfgdfg', 'g', 1),
('CSE309', 24, '2012-08-30 11:51:01', 'Ishat-E-Rabban', 'student', 'df', 'df', 1),
('CSE309', 26, '2012-08-30 14:54:59', 'Tanzir Ul Islam', 'student', 'g', 'tyee', 1),
('CSE309', 30, '2012-08-31 10:41:28', 'Md. Arafat Imtiaz', 'student', 'g', 'g', 1),
('CSE309', 31, '2012-08-31 10:48:15', 'Md. Arafat Imtiaz', 'student', 'xcfv', 'xcv', 1),
('CSE309', 34, '2012-08-31 10:54:45', 'Md. Arafat Imtiaz', 'student', 'n', 'n', 1),
('CSE309', 36, '2012-09-04 07:52:41', 'Tanzir Ul Islam', 'student', 'fff', 'f', 1),
('CSE309', 37, '2012-09-04 07:54:37', 'Tanzir Ul Islam', 'student', 'z', 'z', 1),
('CSE309', 38, '2012-09-04 08:00:02', 'Tanzir Ul Islam', 'student', 'ddnew', 'sd', 1),
('CSE309', 40, '2012-09-04 08:02:42', 'Md. Arafat Imtiaz', 'student', 'b', 'v', 1),
('CSE309', 41, '2012-09-06 12:22:43', 'Tanzir Ul Islam', 'student', 'ff', 'ff', 1),
('CSE309', 43, '2012-09-06 12:37:33', 'Tanzir Ul Islam', 'student', 'flash', 'posted noti saved in flash', 1),
('CSE309', 44, '2012-09-06 12:42:18', 'Tanzir Ul Islam', 'student', 'exam', 'j', 1),
('CSE309', 45, '2012-09-07 06:57:15', 'Tanzir Ul Islam', 'student', 'fggggg', 'hello world', 1),
('CSE309', 46, '2012-09-12 01:34:52', 'Md. Arafat Imtiaz', 'student', '8', 'jj', 1),
('CSE309', 47, '2012-09-12 01:37:26', 'Md. Arafat Imtiaz', 'student', 'llll', 'lllll', 1),
('CSE310', 4, '2012-08-18 16:05:13', 'Tanzir Ul Islam', 'student', 'dfg', 'dfhg ', 1),
('CSE310', 5, '2012-08-27 16:28:52', 'Md. Arafat Imtiaz', 'student', '1254', 'were', 1),
('CSE310', 6, '2012-08-30 13:20:02', 'Tanzir Ul Islam', 'student', 'wer', 'werewrwerwv cwer sdf swfew', 1),
('CSE310', 10, '2012-09-04 08:18:00', 'Tanzir Ul Islam', 'student', 'dfgdfg', ' nj', 1),
('CSE310', 11, '2012-09-04 08:18:17', 'Tanzir Ul Islam', 'student', 'g', ' ', 1),
('CSE310', 12, '2012-09-06 12:18:21', 'Tanzir Ul Islam', 'student', 'ya hello', 'sdf', 1),
('CSE310', 15, '2012-09-06 12:21:11', 'Tanzir Ul Islam', 'student', 'kkkk', 'j', 1),
('CSE310', 16, '2012-09-06 14:19:47', 'Tanzir Ul Islam', 'student', 'fgh', 'gtfh', 1),
('CSE321', 1, '2012-09-06 10:43:38', 'Tanzir Ul Islam Senior', 'student', 'fd', 'fd', 1),
('CSE321', 2, '2012-09-06 11:15:59', 'Tanzir Ul Islam Senior', 'student', 'v', 'vvb', 1),
('CSE321', 3, '2012-09-06 11:18:44', 'Tanzir Ul Islam Senior', 'student', 'cfg', ' b', 1),
('CSE321', 4, '2012-09-06 11:19:13', 'Tanzir Ul Islam Senior', 'student', 'ggg', 'g', 1),
('CSE321', 5, '2012-09-06 11:46:15', 'Tanzir Ul Islam Senior', 'student', ',', ',l', 1),
('CSE321', 6, '2012-09-06 11:47:28', 'Tanzir Ul Islam Senior', 'student', 'gnhjg', 'jgg ', 1),
('CSE321', 7, '2012-09-06 12:05:39', 'Tanzir Ul Islam Senior', 'student', 'by variable', 'pass by private variable', 1);

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
  `phone` int(50) NOT NULL,
  PRIMARY KEY (`S_Id`),
  KEY `Dept_id` (`Dept_id`),
  KEY `Advisor` (`Advisor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`S_Id`, `Name`, `Dept_id`, `sLevel`, `Term`, `Sec`, `Advisor`, `Curriculam`, `Password`, `father_name`, `email`, `address`, `phone`) VALUES
('0705049', 'Tanzir Ul Islam Senior', 'CSE', 3, 2, 'A2', '05002', 2005, '1234', '', '', '', 0),
('0706049', 'Tanzir EEE', 'EEE', 3, 2, 'A2', NULL, 2005, '1234', '', '', '', 0),
('0805001', 'Ishat-E-Rabban', 'CSE', 3, 1, 'A1', '05001', 2005, '1234', '', '', '', 0),
('0805002', 'Radi Moahammad Reza', 'CSE', 3, 1, 'A1', '05001', 2005, '1234', '', '', '', 0),
('0805007', 'kausar ahmed', 'CSE', 3, 2, 'A1', '05001', 2008, '1234', '', '', '', 0),
('0805038', 'saikar chakraborty', 'CHE', 1, 1, 'A1', '05001', 1990, '1234', '', '', '', 0),
('0805039', 'Madhududan bashak', 'CHE', 1, 1, 'A1', '05001', 1990, '1234', '', '', '', 0),
('0805040', 'Mir Tazbinur sharif', 'CSE', 3, 2, 'A2', '05004', 2008, '1234', 'Abul Hosain', 'tashjg@yy.cc', '', 1674123456),
('0805047', 'Siddhartha Shankar Das', 'CSE', 3, 1, 'A2', '05001', 2005, '1234', '', '', '', 0),
('0805048', 'Md. Arafat Imtiaz', 'CSE', 3, 1, 'A2', '05001', 2005, '1234', '', '', '', 0),
('0805049', 'Tanzir Ul Islam', 'CSE', 3, 1, 'A2', '05001', 2005, '1234', 'Tazul Islam', 'tanzir.b@gmail.com', 'titumir hall 3008 buet dhaka,bangladesh', 1674894025),
('0805067', 'Jahangir Alam', 'CSE', 3, 1, 'B1', '05002', 2005, '1234', '', '', '', 0),
('0805086', 'Faruk Hossen', 'CSE', 3, 1, 'B1', '05002', 2005, '1234', '', '', '', 0),
('0805102', 'Ovi', 'CSE', 3, 1, 'B2', '05002', 2005, '1234', '', '', '', 0),
('0805114', 'Sakib', 'CSE', 3, 1, 'B2', '05002', 2005, '1234', '', '', '', 0);

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
('failed', 0.00, 'CSE309', '0705049'),
('passed', 2.75, 'CSE310', '0705049'),
('Running', NULL, 'CSE300', '0805001'),
('Running', NULL, 'CSE303', '0805001'),
('Running', NULL, 'CSE304', '0805001'),
('Running', NULL, 'CSE305', '0805001'),
('Running', NULL, 'CSE307', '0805001'),
('Running', NULL, 'CSE308', '0805001'),
('Running', NULL, 'CSE309', '0805001'),
('Running', NULL, 'CSE310', '0805001'),
('Running', NULL, 'CSE311', '0805001'),
('Running', NULL, 'CSE300', '0805002'),
('Running', NULL, 'CSE303', '0805002'),
('Running', NULL, 'CSE304', '0805002'),
('Running', NULL, 'CSE305', '0805002'),
('Running', NULL, 'CSE307', '0805002'),
('Running', NULL, 'CSE308', '0805002'),
('Running', NULL, 'CSE309', '0805002'),
('Running', NULL, 'CSE310', '0805002'),
('Running', NULL, 'CSE311', '0805002'),
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
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`CourseNo`) REFERENCES `message_group_student` (`CourseNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`CourseNo`) REFERENCES `course` (`CourseNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`Dept_ID`) REFERENCES `department` (`Dept_id`) ON DELETE SET NULL ON UPDATE CASCADE;

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
