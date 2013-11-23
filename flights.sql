-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 23, 2013 at 09:31 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `snagaflight`
--

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`flight_num`, `depart_city`, `depart_st`, `depart_country`, `depart_airport`, `depart_time`, `arrival_city`, `arrival_st`, `arrival_country`, `arrival_airport`, `arrival_time`, `flight_duration`, `coach_seats`, `fc_seats`, `coach_price`, `fc_price`, `international`) VALUES
(1, 'Phoenix', 'AZ', '', '', '00:00:00', '', '', '', '', '00:00:00', '00:00:00', 0, 15, 225, 400, '0'),
(2, 'Scottsdale', 'AZ', '', 'Scottsdale Airport', '06:45:00', '', '', '', '', '00:00:00', '00:00:00', 0, 15, 225, 400, '0'),
(3, 'Phoenix', 'AZ', '', 'Sky Harbor', '12:00:00', 'Chicago', 'IL', '', 'O''Hare Intl.', '13:30:00', '02:30:00', 14, 15, 225, 400, '0'),
(4, 'Chicago', 'IL', 'USA', 'O Hare', '10:00:00', 'Boston', 'MA', 'USA', 'Boston Intl.', '12:00:00', '02:00:00', 100, 15, 225, 400, '0'),
(5, 'Chicago', 'IL', 'USA', 'O Hare', '15:00:00', 'San Diego', 'CA', 'USA', 'San Diego International Airport', '17:00:00', '02:00:00', 100, 15, 225, 400, '0'),
(6, 'San Diego', 'CA', 'USA', 'San Diego International Airport', '12:00:00', 'Boston', 'MA', 'USA', 'Boston Intl.', '12:00:00', '02:00:00', 100, 15, 225, 400, '0'),
(7, 'Miami', 'FL', 'USA', 'Miami International', '05:00:00', 'Boston', 'MA', 'USA', 'Boston Intl.', '06:00:00', '01:00:00', 150, 10, 125, 275, '0'),
(8, 'Miami', 'FL', 'USA', 'Miami International', '05:00:00', 'Chicago', 'IL', 'USA', 'O Hare', '10:00:00', '02:00:00', 100, 15, 225, 400, '0'),
(9, 'Chicago', 'IL', 'USA', 'O Hare', '10:00:00', 'Miami', 'FL', 'USA', 'Miami International', '05:00:00', '02:00:00', 100, 15, 225, 400, '0'),
(10,'Boston', 'MA', 'USA', 'Boston Intl.', '12:00:00', 'Chicago', 'IL', 'USA', 'O Hare', '10:00:00', '02:00:00', 100, 15, 225, 400, '0'),
(11, 'London', '', 'England', 'London City Airport', '10:00:00', 'Boston', 'MA', 'USA', 'Boston Intl.', '14:00:00', '04:00:00', 100, 15, 450, 700, '1'),
(12, 'Boston', 'MA', 'USA', 'Boston Intl.', '14:00:00', 'London', '', 'England', 'London City Airport', '10:00:00', '04:00:00', 100, 15, 450, 700, '1'),
(13, 'London', '', 'England', 'London City Airport', '10:00:00', 'Chicago', 'IL', 'USA', 'O Hare', '15:00:00', '05:00:00', 100, 15, 520, 730, '1'),
(14, 'London', '', 'England', 'London City Airport', '11:00:00', 'Miami', 'FL', 'USA', 'Miami International', '15:00:00', '04:00:00', 100, 15, 450, 700, '1'),
(15, 'Miami', 'FL', 'USA', 'Miami International', '07:00:00', 'London', '', 'England', 'London City Airport', '11:00:00', '04:00:00', 100, 15, 550, 800, '1'),
(16, 'London', '', 'England', 'London City Airport', '05:00:00', 'San Diego', 'CA', 'USA', 'San Diego International Airport', '11:00:00', '06:00:00', 100, 15, 650, 800, '1'),
(17, 'San Diego', 'CA', 'USA', 'San Diego International Airport', '12:00:00', 'London', '', 'England', 'London City Airport', '18:00:00', '06:00:00', 110, 20, 650, 800, '1'),
(18, 'London', '', 'England', 'London City Airport', '10:00:00', 'Denver', 'CO', 'USA', 'Denver International Airport', '17:00:00', 100, 15, 550, 800, '1'),
(19, 'London', '', 'England', 'London City Airport', '10:00:00', '', 'MA', 'USA', 'Boston Intl.', '14:00:00', '04:00:00', 100, 15, 450, 700, '1'),
(20, 'Chicago', 'IL', 'USA', 'O Hare', '10:00:00', 'London', '', 'England', 'London City Airport', '15:00:00' '05:00:00', 100, 15, 430, 750, '1');
