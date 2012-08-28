-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 28, 2012 at 07:26 AM
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
  `msg_no` int(11) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

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
(14, 11, 'CSE309', '2012-08-27 16:24:30', 'Tanzir Ul Islam', 'hig yu fy', 1, 'student'),
(15, 11, 'CSE309', '2012-08-27 16:24:36', 'Tanzir Ul Islam', 'fhgfv c', 1, 'student'),
(16, 11, 'CSE309', '2012-08-27 16:26:48', 'Md. Arafat Imtiaz', 'dd t', 1, 'student'),
(17, 4, 'CSE310', '2012-08-27 16:28:08', 'Md. Arafat Imtiaz', 'he ehe eh', 1, 'student'),
(18, 5, 'CSE310', '2012-08-27 16:29:08', 'Md. Arafat Imtiaz', '??', 1, 'student'),
(19, 3, 'CSE309', '2012-08-27 17:50:52', 'Md. Arafat Imtiaz', 'he he he', 1, 'student'),
(20, 3, 'CSE309', '2012-08-27 23:55:51', 'Tanzir Ul Islam', 'asf', 0, 'student'),
(21, 8, 'CSE309', '2012-08-28 01:22:43', 'Tanzir Ul Islam', 'hello everybody', 1, 'student');

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
  `Upload_Time` timestamp NULL DEFAULT NULL,
  `File_Path` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CourseNo`,`ID`),
  KEY `CourseNo` (`CourseNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`CourseNo`, `ID`, `Topic`, `Description`, `Uploader`, `Upload_Time`, `File_Path`) VALUES
('CSE300', '1', 'arafat', 'something somethingsomethingsomethingsomething\r\nsomethingsomethingsomething\\\r\nsomethingsomething', 'Sumaiya Iqbal', '2012-07-31 18:00:00', 'Router_Settings.txt'),
('CSE300', '2', 'll', 'lkk', 'Sumaiya Iqbal', '2012-07-31 18:00:00', '8C736EAE00613.txt'),
('CSE300', '3', 'asd', 'asds', 'Sumaiya Iqbal', '2012-07-31 18:00:00', 'Router_Settings1.txt'),
('CSE300', '4', 'asd', 'asds', 'Sumaiya Iqbal', '2012-07-31 18:00:00', 'Router_Settings2.txt'),
('CSE300', '5', 'asd', 'asds', 'Sumaiya Iqbal', '2012-07-31 18:00:00', 'Router_Settings3.txt'),
('CSE309', '3', 'vb', '', 'Rajkumar Das', '2012-08-15 18:00:00', 'vlcsnap-2012-08-16-21h071.png'),
('CSE309', '5', 'dasd', '', 'Rajkumar Das', '2012-08-16 16:08:36', 'vlcsnap-2012-05-05-16h08.png');

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
('CSE311', 'Data Communication', 'CSE', 3, 1, 'TT', 2005, 3.00);

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
  `Sec` varchar(2) NOT NULL DEFAULT '',
  `eDate` date DEFAULT NULL,
  `eTime` varchar(10) DEFAULT NULL,
  `Duration` varchar(5) DEFAULT NULL,
  `Location` varchar(15) DEFAULT NULL,
  `eType` varchar(10) NOT NULL DEFAULT '',
  `Topic` varchar(30) DEFAULT NULL,
  `FileLocation` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`CourseNo`,`Sec`,`eType`),
  KEY `CourseNo` (`CourseNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('CSE304', 1, '2012-08-18 16:06:39', 'Tanzir Ul Islam', 'student', 'cfg', 'gfh', 1),
('CSE308', 1, '2012-08-27 17:55:03', 'Md. Arafat Imtiaz', 'student', 'fsd', 'gggg gg g g g', 1),
('CSE309', 3, '2012-08-18 16:07:08', 'Md. Arafat Imtiaz', 'student', 'dfg', 'df gdg dfg j<br />\r\nhukj b<br />\r\nik.p[/ fjhfg', 1),
('CSE309', 4, '2012-08-18 16:21:43', 'Md. Arafat Imtiaz', 'student', 'gfggggggggwswwwww', 'sf fds', 0),
('CSE309', 5, '2012-08-19 02:19:53', 'Tanzir Ul Islam', 'student', 'hello', 'lkjasd sd;fsdfsfj ;sdfjoaksjdghls<br />\r\nsdfkljhkljfdg', 1),
('CSE309', 6, '2012-08-19 02:36:04', 'Tanzir Ul Islam', 'student', 'c', 'c', 0),
('CSE309', 7, '2012-08-19 02:36:18', 'Tanzir Ul Islam', 'student', 'xx', 'cx', 1),
('CSE309', 8, '2012-08-19 02:37:05', 'Tanzir Ul Islam', 'student', 'SOFT', 'ss', 1),
('CSE309', 9, '2012-08-19 03:27:49', 'Md. Arafat Imtiaz', 'student', 'sd', '???? ??? ????', 0),
('CSE309', 10, '2012-08-19 03:40:16', 'Md. Arafat Imtiaz', 'student', 'asd', 'adkjh a;o \\<br />\r\ndfkljhdf a a<br />\r\ndsfuygfd afdhl<br />\r\nsdakljfhdfsdkjhf ;sdf<br />\r\nsidf', 0),
('CSE309', 11, '2012-08-22 11:46:39', 'Tanzir Ul Islam', 'student', 'cxc', 'cvc vcb hthcvb bcfb ', 1),
('CSE309', 12, '2012-08-27 15:18:21', 'Tanzir Ul Islam', 'student', 'd', 'd', 0),
('CSE309', 13, '2012-08-27 16:07:40', 'Md. Arafat Imtiaz', 'student', 'wer', 'werewrwerwer', 0),
('CSE310', 4, '2012-08-18 16:05:13', 'Tanzir Ul Islam', 'student', 'dfg', 'dfhg ', 1),
('CSE310', 5, '2012-08-27 16:28:52', 'Md. Arafat Imtiaz', 'student', '1254', 'were', 1);

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
  KEY `Dept_id` (`Dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`S_Id`, `Name`, `Dept_id`, `sLevel`, `Term`, `Sec`, `Advisor`, `Curriculam`, `Password`, `father_name`, `email`, `address`, `phone`) VALUES
('0805001', 'Ishat-E-Rabban', 'CSE', 3, 1, 'A1', '05001', 2005, '1234', '', '', '', 0),
('0805002', 'Radi Moahammad Reza', 'CSE', 3, 1, 'A1', '05001', 2005, '1234', '', '', '', 0),
('0805007', 'kausar ahmed', 'CSE', 3, 2, 'A1', '05001', 2008, '1234', '', '', '', 0),
('0805038', 'saikar chakraborty', 'CHE', 1, 1, 'A1', '05001', 1990, '1234', '', '', '', 0),
('0805039', 'Madhududan bashak', 'CHE', 1, 1, 'A1', '05001', 1990, '1234', '', '', '', 0),
('0805040', 'Mir Tazbinur sharif', 'CSE', 3, 2, 'A2', '05004', 2008, '1234', 'Abul Hosain', 'tashjg@yy.cc', '', 1674123456),
('0805047', 'Siddhartha Shankar Das', 'CSE', 3, 1, 'A2', '05001', 2005, '1234', '', '', '', 0),
('0805048', 'Md. Arafat Imtiaz', 'CSE', 3, 1, 'A2', '05001', 2005, '1234', '', '', '', 0),
('0805049', 'Tanzir Ul Islam', 'CSE', 3, 1, 'A2', '05001', 2005, '1234', 'Tazul Islam', 'tanzir.b@gmail.com', 'titumir hall 3008 buet dhaka', 1674894025),
('0805067', 'Jahangir Alam', 'CSE', 3, 1, 'B1', '05002', 2005, '1234', '', '', '', 0),
('0805086', 'Faruk Hossen', 'CSE', 3, 1, 'B1', '05002', 2005, '1234', '', '', '', 0),
('0805102', 'Ovi', 'CSE', 3, 1, 'B2', '05002', 2005, '1234', '', '', '', 0),
('0805114', 'Sakib', 'CSE', 3, 1, 'B2', '05002', 2005, '1234', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `takencourse`
--

CREATE TABLE IF NOT EXISTS `takencourse` (
  `Status` varchar(10) DEFAULT NULL,
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
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`CourseNo`) REFERENCES `course` (`CourseNo`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Dept_id`) REFERENCES `department` (`Dept_id`) ON DELETE SET NULL ON UPDATE CASCADE;

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
