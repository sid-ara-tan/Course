-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 12, 2012 at 08:12 PM
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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`Dept_id`) REFERENCES `department` (`Dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
