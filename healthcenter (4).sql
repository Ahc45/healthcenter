-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 01, 2019 at 11:26 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthcenter`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('ts1ra6hpasfilcob590rp7jhkmlsjn51', '::1', 1567318931, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536373331383633363b),
('j42ju42r7fap0tolhafkufkafs7hjdhu', '::1', 1567319353, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536373331393234303b),
('b4figspoant7fjc3o5qcnc4eifmht7h5', '::1', 1567319782, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536373331393535363b),
('giabfhrf7sunrjjaaugcti2eb7le7ej8', '::1', 1567335893, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536373333353633353b),
('ssaqvnh8lnhk4bqcqpl1guijbrnt7kdr', '::1', 1567336636, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536373333363530353b);

-- --------------------------------------------------------

--
-- Table structure for table `familynumbers`
--

DROP TABLE IF EXISTS `familynumbers`;
CREATE TABLE IF NOT EXISTS `familynumbers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `famiy_name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(500) NOT NULL DEFAULT '',
  `last_name` varchar(500) NOT NULL,
  `middle_name` varchar(500) NOT NULL,
  `nickname` varchar(500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `birthday` date NOT NULL,
  `address` mediumtext NOT NULL,
  `contact_no` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL DEFAULT '',
  `password` varchar(200) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `family_number` int(11) NOT NULL,
  `account_type` varchar(100) NOT NULL DEFAULT '',
  `author_id` int(11) NOT NULL,
  `picture` varchar(500) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
