-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 04, 2019 at 10:49 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `labm4`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`ID`, `username`, `avatar`, `comment`) VALUES
(14, 'SDN79', 'uploads/furry 7_1559685778.png', 's				'),
(13, 'SDN79', 'uploads/furry 7_1559685778.png', '		f		'),
(12, 'SDN79', 'uploads/furry 7_1559685778.png', 'mana			'),
(11, 'SDN79', 'uploads/furry 7_1559685778.png', 'no\r\n				'),
(10, 'SDN79', 'uploads/furry 7_1559685778.png', 'Hi\r\n				'),
(9, 'SDN79', 'uploads/furry 7_1559685778.png', 'dvsdfvbsdv				'),
(15, 'SDN79', 'uploads/furry 7_1559685778.png', 'no				'),
(16, 'SDN79', 'uploads/furry 7_1559685778.png', 'man				'),
(17, 'SDN79', 'uploads/furry 7_1559685778.png', '				x'),
(18, 'SDN79', 'uploads/furry 7_1559685778.png', '			x	');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `valid` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `email`, `avatar`, `status`, `valid`) VALUES
(27, 'SDN79', 'e10adc3949ba59abbe56e057f20f883e', 'sdn079@gmail.com', 'uploads/furry 7_1559685778.png', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
