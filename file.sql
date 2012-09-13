-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 13, 2012 at 11:41 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `file_id`, `CourseNo`, `topic`, `description`, `uploader`, `senderType`, `time`, `filename`, `status`) VALUES
(25, 1, 'CSE310', 'ques', '', '0805048', 'student', '2012-09-13 04:11:11', 'Untitled.png', 1),
(26, 3, 'CSE310', 'ques', '', '0805048', 'student', '2012-09-13 04:28:49', 'Untitled1.png', 1),
(28, 2, 'CSE300', 'queshfghdhdfhdfghdfg', '', '05001', 'teacher', '2012-09-13 11:33:43', 'Koala.jpg', 1),
(30, 57, 'CSE309', 'b', '', '0805049', 'student', '2012-09-13 04:54:20', 'Lighthouse.jpg', 1),
(31, 58, 'CSE309', 'dfg', '', '0805049', 'student', '2012-09-13 04:56:45', 'Untitled1.png', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`CourseNo`) REFERENCES `course` (`CourseNo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
