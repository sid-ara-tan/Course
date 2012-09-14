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
('CSE309', 'ct', '3 ct will be counted', 'Best', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
