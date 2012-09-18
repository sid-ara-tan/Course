-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 18, 2012 at 01:28 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

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
(15, 'robert', 'secret', 'hey what''s up', '2012-09-18 17:00:06', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
