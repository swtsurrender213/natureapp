-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2015 at 05:45 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `natureapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE IF NOT EXISTS `owners` (
  `ownerId` int(11) NOT NULL AUTO_INCREMENT,
  `ownerName` varchar(50) NOT NULL,
  PRIMARY KEY (`ownerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`ownerId`, `ownerName`) VALUES
(1, 'Krystie Black'),
(2, 'Kevin Lee'),
(3, 'Eric Song'),
(4, 'Sarah Nguyen'),
(5, 'julie'),
(6, 'Tasha');

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE IF NOT EXISTS `pets` (
  `petId` int(11) NOT NULL AUTO_INCREMENT,
  `ownerId` int(11) NOT NULL,
  `petsname` varchar(50) NOT NULL,
  `petType` varchar(50) NOT NULL,
  `petage` int(11) NOT NULL,
  PRIMARY KEY (`petId`),
  KEY `pet_constraint` (`ownerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`petId`, `ownerId`, `petsname`, `petType`, `petage`) VALUES
(1, 1, 'Willy ', 'dog poodle', 6),
(3, 1, 'hector', 'dog-husky', 8),
(5, 2, 'song', 'dog- Beagle', 3),
(6, 3, 'don', 'dog- Collie', 8),
(7, 4, 'bob', 'dog-Newfoundland', 5),
(21, 2, 'samsung', 'husky', 8),
(23, 5, 'Lannie', 'Boston Terrier', 8);

-- --------------------------------------------------------

--
-- Table structure for table `petsvisit`
--

CREATE TABLE IF NOT EXISTS `petsvisit` (
  `visitId` int(11) NOT NULL AUTO_INCREMENT,
  `proId` int(11) NOT NULL,
  `petId` int(11) NOT NULL,
  `visitdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`visitId`),
  KEY `pet_constraints` (`proId`),
  KEY `pet_constraint2` (`petId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `petsvisit`
--

INSERT INTO `petsvisit` (`visitId`, `proId`, `petId`, `visitdate`) VALUES
(5, 1, 1, '2015-06-23 17:38:01'),
(6, 2, 3, '2015-06-23 17:38:17'),
(9, 3, 7, '2015-07-02 18:31:16'),
(10, 1, 7, '2015-07-02 18:31:45'),
(17, 4, 5, '2015-07-09 18:50:40'),
(24, 3, 7, '2015-07-09 19:07:34'),
(25, 4, 23, '2015-07-09 19:54:40');

-- --------------------------------------------------------

--
-- Table structure for table `procedures`
--

CREATE TABLE IF NOT EXISTS `procedures` (
  `proId` int(11) NOT NULL AUTO_INCREMENT,
  `proced` varchar(50) NOT NULL,
  PRIMARY KEY (`proId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `procedures`
--

INSERT INTO `procedures` (`proId`, `proced`) VALUES
(1, 'blood diagnostic'),
(2, 'heartworm diagnostic'),
(3, 'Tetanus Vaccnation'),
(4, 'Annual Check Up');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `photo` varchar(50) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `password`, `photo`) VALUES
(2, 'janka', '204ba15c73c616a3a26ab1e367acfeb70540ccb8', 'images.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pet_constraint` FOREIGN KEY (`ownerId`) REFERENCES `owners` (`ownerId`);

--
-- Constraints for table `petsvisit`
--
ALTER TABLE `petsvisit`
  ADD CONSTRAINT `pet_constraint2` FOREIGN KEY (`petId`) REFERENCES `pets` (`petId`) ON DELETE CASCADE,
  ADD CONSTRAINT `pet_constraints` FOREIGN KEY (`proId`) REFERENCES `procedures` (`proId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
