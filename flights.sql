-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: 127.5.37.130:3306
-- Generation Time: Nov 22, 2013 at 08:37 PM
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
-- Table structure for table `flights`
--

CREATE TABLE IF NOT EXISTS `flights` (
  `flight_num` int(11) NOT NULL AUTO_INCREMENT,
  `depart_city` varchar(30) NOT NULL,
  `depart_st` varchar(2) DEFAULT NULL,
  `depart_country` varchar(30) NOT NULL,
  `depart_airport` varchar(30) DEFAULT NULL,
  `depart_time` time NOT NULL,
  `arrival_city` varchar(30) NOT NULL,
  `arrival_st` varchar(2) DEFAULT NULL,
  `arrival_country` varchar(30) NOT NULL,
  `arrival_airport` varchar(30) DEFAULT NULL,
  `arrival_time` time NOT NULL,
  `flight_duration` time DEFAULT NULL,
  `coach_seats` int(11) NOT NULL DEFAULT '100',
  `fc_seats` int(11) NOT NULL DEFAULT '15',
  `coach_price` int(11) NOT NULL DEFAULT '225',
  `fc_price` int(11) NOT NULL DEFAULT '400',
  `international` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`flight_num`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`flight_num`, `depart_city`, `depart_st`, `depart_country`, `depart_airport`, `depart_time`, `arrival_city`, `arrival_st`, `arrival_country`, `arrival_airport`, `arrival_time`, `flight_duration`, `bus_seats`, `fc_seats`, `bus_price`, `fc_price`, `international`) VALUES
(1, 'Phoenix', 'AZ', '', '', '00:00:00', '', '', '', '', '00:00:00', '00:00:00', 0, 15, 225, 400, '0'),
(2, 'Scottsdale', 'AZ', '', 'Scottsdale Airport', '06:45:00', '', '', '', '', '00:00:00', '00:00:00', 0, 15, 225, 400, '0'),
(3, 'Phoenix', 'AZ', '', 'Sky Harbor', '12:00:00', 'Chicago', 'IL', '', 'O''Hare Intl.', '13:30:00', '02:30:00', 14, 15, 225, 400, '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
