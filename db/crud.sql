-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2014 at 05:59 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
  `arid` int(11) NOT NULL AUTO_INCREMENT,
  `ar_title` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ar_content` text CHARACTER SET utf8 NOT NULL,
  `ar_expired` enum('y','n') CHARACTER SET utf8 NOT NULL,
  `ar_exp_date` date NOT NULL,
  PRIMARY KEY (`arid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`arid`, `ar_title`, `ar_content`, `ar_expired`, `ar_exp_date`) VALUES
(1, 'tes', '', 'y', '0000-00-00'),
(2, 'coba', '', 'y', '2014-06-25'),
(3, 'dsadsadsa', 'fnfhroweroiwrojiw<br>', 'n', '0000-00-00'),
(4, 'dsadsadsa', 'fnfhroweroiwrojiw<br>', 'n', '0000-00-00'),
(5, '', '<br>', 'n', '0000-00-00'),
(6, '', '', 'y', '2014-06-17'),
(7, '65464', '', 'y', '2014-06-10'),
(8, 'df', '', 'n', '0000-00-00'),
(9, '', 'sdada<br>', 'n', '0000-00-00'),
(10, 'dsada', 'sdadada<br>', 'n', '0000-00-00'),
(11, '', '', 'n', '0000-00-00'),
(12, '', '', 'n', '0000-00-00'),
(13, 'sdadad', 'sadadsa<br>', 'n', '0000-00-00'),
(14, 'dsda', 'dsadadadasdasd<br>', 'y', '2014-06-26'),
(15, 'dsada', 'dsadsadad<br>', 'y', '2014-06-26'),
(16, 'gambar', 'dsadada<img src="http://i.imgur.com/akuymhV.png" width="392"><br>', 'n', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `numerator`
--

CREATE TABLE IF NOT EXISTS `numerator` (
  `code` varchar(5) NOT NULL,
  `value` varchar(10) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `numerator`
--

INSERT INTO `numerator` (`code`, `value`) VALUES
('FO', '002');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(30) NOT NULL,
  `level` char(1) NOT NULL,
  PRIMARY KEY (`userid`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `photo`, `level`) VALUES
(1, 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'user.png', 'M'),
(2, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'user2.png', 'A');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
