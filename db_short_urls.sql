-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 05, 2018 at 07:54 PM
-- Server version: 5.5.58-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_short_urls`
--

-- --------------------------------------------------------

--
-- Table structure for table `hits`
--

CREATE TABLE IF NOT EXISTS `hits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` int(10) unsigned NOT NULL,
  `ip` varchar(39) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `hits`
--

INSERT INTO `hits` (`id`, `url`, `ip`, `time`) VALUES
(20, 2, '127.0.0.1', '2018-02-05 08:41:36'),
(21, 3, '127.0.0.1', '2018-02-05 08:44:43'),
(22, 2, '127.0.0.1', '2018-02-05 08:50:29'),
(23, 3, '127.0.0.1', '2018-02-05 09:05:18'),
(24, 4, '127.0.0.1', '2018-02-05 09:08:47');

-- --------------------------------------------------------

--
-- Table structure for table `urls`
--

CREATE TABLE IF NOT EXISTS `urls` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `ip` varchar(66) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `urls`
--

INSERT INTO `urls` (`id`, `url`, `ip`, `time`) VALUES
(1, 'google.com', '127.0.0.1', '2018-01-31 15:04:19'),
(2, 'stackoverflow.com', '127.0.0.1', '2018-01-30 15:04:19'),
(3, 'gtmetrix.com', '127.0.0.1', '2018-02-05 08:44:05'),
(4, 'ceicommerce.com', '127.0.0.1', '2018-02-05 09:08:40');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
