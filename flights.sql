-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: 127.5.37.130:3306
-- Generation Time: Nov 24, 2013 at 08:39 PM
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
  `logo` varchar(255) NOT NULL DEFAULT 'http://bestclipartblog.com/clipart-pics/airplane-clip-art-8.png',
  PRIMARY KEY (`flight_num`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`flight_num`, `depart_city`, `depart_st`, `depart_country`, `depart_airport`, `depart_time`, `arrival_city`, `arrival_st`, `arrival_country`, `arrival_airport`, `arrival_time`, `flight_duration`, `coach_seats`, `fc_seats`, `coach_price`, `fc_price`, `international`, `logo`) VALUES
(5, 'Chicago', 'IL', 'USA', 'O Hare', '10:00:00', 'Boston', 'MA', 'USA', 'Boston Intl.', '12:00:00', '02:00:00', 100, 15, 225, 400, '0', 'http://bestclipartblog.com/clipart-pics/airplane-clip-art-8.png'),
(6, 'Chicago', 'IL', 'USA', 'O Hare', '15:00:00', 'San Diego', 'CA', 'USA', 'San Diego International Airpor', '17:00:00', '02:00:00', 100, 15, 225, 400, '0', 'http://bestclipartblog.com/clipart-pics/airplane-clip-art-8.png'),
(7, 'San Diego', 'CA', 'USA', 'San Diego International Airpor', '12:00:00', 'Boston', 'MA', 'USA', 'Boston Intl.', '12:00:00', '02:00:00', 100, 15, 225, 400, '0', 'http://bestclipartblog.com/clipart-pics/airplane-clip-art-8.png'),
(8, 'Miami', 'FL', 'USA', 'Miami International', '05:00:00', 'Boston', 'MA', 'USA', 'Boston Intl.', '06:00:00', '01:00:00', 150, 10, 125, 275, '0', 'http://bestclipartblog.com/clipart-pics/airplane-clip-art-8.png'),
(9, 'Miami', 'FL', 'USA', 'Miami International', '05:00:00', 'Chicago', 'IL', 'USA', 'O Hare', '10:00:00', '02:00:00', 100, 15, 225, 400, '0', 'http://bestclipartblog.com/clipart-pics/airplane-clip-art-8.png'),
(10, 'Chicago', 'IL', 'USA', 'O Hare', '10:00:00', 'Miami', 'FL', 'USA', 'Miami International', '05:00:00', '02:00:00', 100, 15, 225, 400, '0', 'http://bestclipartblog.com/clipart-pics/airplane-clip-art-8.png'),
(11, 'Boston', 'MA', 'USA', 'Boston Intl.', '12:00:00', 'Chicago', 'IL', 'USA', 'O Hare', '10:00:00', '02:00:00', 100, 15, 225, 400, '0', 'http://bestclipartblog.com/clipart-pics/airplane-clip-art-8.png'),
(12, 'London', '', 'England', 'London City Airport', '10:00:00', 'Boston', 'MA', 'USA', 'Boston Intl.', '14:00:00', '04:00:00', 100, 15, 450, 700, '1', 'http://bestclipartblog.com/clipart-pics/airplane-clip-art-8.png'),
(13, 'Boston', 'MA', 'USA', 'Boston Intl.', '14:00:00', 'London', '', 'England', 'London City Airport', '10:00:00', '04:00:00', 100, 15, 450, 700, '1', 'http://bestclipartblog.com/clipart-pics/airplane-clip-art-8.png'),
(14, 'London', '', 'England', 'London City Airport', '10:00:00', 'Chicago', 'IL', 'USA', 'O Hare', '15:00:00', '05:00:00', 100, 15, 520, 730, '1', 'http://bestclipartblog.com/clipart-pics/airplane-clip-art-8.png'),
(15, 'London', '', 'England', 'London City Airport', '11:00:00', 'Miami', 'FL', 'USA', 'Miami International', '15:00:00', '04:00:00', 100, 15, 450, 700, '1', 'http://bestclipartblog.com/clipart-pics/airplane-clip-art-8.png'),
(16, 'Miami', 'FL', 'USA', 'Miami International', '07:00:00', 'London', '', 'England', 'London City Airport', '11:00:00', '04:00:00', 100, 15, 550, 800, '1', 'http://bestclipartblog.com/clipart-pics/airplane-clip-art-8.png'),
(17, 'London', '', 'England', 'London City Airport', '05:00:00', 'San Diego', 'CA', 'USA', 'San Diego International Airpor', '11:00:00', '06:00:00', 100, 15, 650, 800, '1', 'http://bestclipartblog.com/clipart-pics/airplane-clip-art-8.png'),
(18, 'San Diego', 'CA', 'USA', 'San Diego International Airpor', '12:00:00', 'London', '', 'England', 'London City Airport', '18:00:00', '06:00:00', 110, 20, 650, 800, '1', 'http://bestclipartblog.com/clipart-pics/airplane-clip-art-8.png'),
(19, 'London', '', 'England', 'London City Airport', '10:00:00', 'Denver', 'CO', 'USA', 'Denver International Airport', '17:00:00', '04:00:00', 100, 15, 550, 800, '1', 'http://bestclipartblog.com/clipart-pics/airplane-clip-art-8.png'),
(20, 'London', '', 'England', 'London City Airport', '10:00:00', '', 'MA', 'USA', 'Boston Intl.', '14:00:00', '04:00:00', 100, 15, 450, 700, '1', 'http://bestclipartblog.com/clipart-pics/airplane-clip-art-8.png'),
(21, 'Chicago', 'IL', 'USA', 'O Hare', '10:00:00', 'London', '', 'England', 'London City Airport', '15:00:00', '05:00:00', 100, 15, 430, 750, '1', 'http://bestclipartblog.com/clipart-pics/airplane-clip-art-8.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
