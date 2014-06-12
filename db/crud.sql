-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2014 at 04:24 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

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
  `ar_title` varchar(50) NOT NULL,
  `ar_content` text NOT NULL,
  `ar_expired` enum('y','n') NOT NULL,
  `ar_exp_date` date NOT NULL,
  PRIMARY KEY (`arid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`arid`, `ar_title`, `ar_content`, `ar_expired`, `ar_exp_date`) VALUES
(0, 'Special Offers', '<div align="left"><img src="http://localhost/freelance/form_crud/upload/media/16439Capture.PNG" width="392"><p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus \r\nmollis interdum.\r\n                    Morbi leo risus, porta ac consectetur ac, vestibulum\r\n at eros. Cras mattis consectetur purus sit amet fermentum.\r\n                </p>\r\n                <p>Donec id elit non mi porta gravida at eget metus. \r\nMaecenas faucibus mollis interdum.\r\n                    Morbi leo risus, porta ac consectetur ac, vestibulum\r\n at eros. Cras mattis consectetur purus sit amet fermentum.\r\n                </p><br></div>', 'y', '2014-06-12'),
(1, 'The right guide, for the right person', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque\r\n ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at,\r\n tempus viverra turpis.', 'n', '0000-00-00');

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
