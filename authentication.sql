-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 29, 2012 at 12:29 PM
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
('admin', '827ccb0eea8a706c4c34a16891f84e7b', 'siddhartha047@gmail.com'),
('robert', '827ccb0eea8a706c4c34a16891f84e7b', 'siddhartha047@gmail.com'),
('secret', '827ccb0eea8a706c4c34a16891f84e7b', 'siddhartha047@gmail.com'),
('superuser', '827ccb0eea8a706c4c34a16891f84e7b', 'siddhartha047@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
