-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: 127.5.37.130:3306
-- Generation Time: Nov 24, 2013 at 10:28 PM
-- Server version: 5.1.69
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `snagaflight`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `admin_rights` enum('0','1') NOT NULL DEFAULT '0',
  `flight_booked` int(11) DEFAULT NULL,
  `seating_class` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`user_id`, `username`, `password`, `firstname`, `lastname`, `admin_rights`, `flight_booked`, `seating_class`) VALUES
(1, 'admin@admin.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Admin', 'istrator', '1', 5, '0'),
(7, 'Admin@admin.com', '200ceb26807d6bf99fd6f4f0d1ca54d4', 'Admin', 'admin', '1', NULL, '0'),
(6, 'Gates@gmail.com', '6dbd0fe19c9a301c4708287780df41a2', 'Bill', 'Gates', '0', NULL, '0'),
(5, 'j@jj', 'bf2bc2545a4a5f5683d9ef3ed0d977e0', 'j', 'j', '1', 5, '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
