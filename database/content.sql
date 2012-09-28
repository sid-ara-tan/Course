-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 28, 2012 at 05:43 PM
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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`CourseNo`) REFERENCES `course` (`CourseNo`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
