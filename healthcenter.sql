-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 11, 2020 at 07:19 AM
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
-- Table structure for table `announcement`
--

DROP TABLE IF EXISTS `announcement`;
CREATE TABLE IF NOT EXISTS `announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `body` text NOT NULL,
  `Title` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `created`, `modified`, `body`, `Title`) VALUES
(1, '2020-02-04 23:37:54', '2020-02-04 23:37:54', '<p>Next month we weill be having a test to every one.</p>', 'Test Announcement');

-- --------------------------------------------------------

--
-- Table structure for table `check_up`
--

DROP TABLE IF EXISTS `check_up`;
CREATE TABLE IF NOT EXISTS `check_up` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_no` varchar(500) NOT NULL,
  `Weight` varchar(500) NOT NULL,
  `Height` varchar(500) NOT NULL,
  `blood_p` varchar(500) NOT NULL,
  `findings` text NOT NULL,
  `doctor` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `is_deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `check_up`
--

INSERT INTO `check_up` (`id`, `patient_no`, `Weight`, `Height`, `blood_p`, `findings`, `doctor`, `created`, `modified`, `is_deleted`) VALUES
(1, '86924573', '45kg', '5\'2', '20/60', '<p>dfgdgsdfsdfk sdbfkjsd bfkjsdbf bskdfsd skjdf skjdbf sfkjb</p>', 0, '2020-01-13 17:59:02', '2020-01-13 17:59:02', 0),
(2, '86924573', '45kg', '5\'2', '20/60', '<p>sdfsdf sfshfjhsdkfhk dfawehf dkfnophf asdhfiewh isdfn is wn dfhei ksjfkgh ksdhkfewkjn&nbsp; bsdjhfb w\' jdfbkw&nbsp;</p><p>&nbsp;sdjofjefio sdkfwlef dj w</p>', 0, '2020-01-13 17:59:46', '2020-01-13 17:59:46', 0),
(3, '75438062', '45kg', '5\'2', '20/60', '<p>asdve n sbfbsd fksbfbefbksdbfkjsdbfk bksbdf skdfnskdjfb sdf</p><p>sdf sdf</p><p>sdf</p><p>s&nbsp;</p><p>sdf</p><p>sd fsdf slkfoisdh hogdseflewnflksd nflkn wkefsf&nbsp;</p><p>sdfsdf kjsdbs f\'s df</p><p>efsdkfewfl sdsdf</p><p>fjsdl f;we&nbsp;</p><p>s f</p><p>sdfwe;jf s djfs\'ef&nbsp;</p><p>sd fe;fj; f</p><p>sd fw efsd f;ojwrgs&nbsp;</p><p>e</p>', 0, '2020-01-13 18:00:32', '2020-01-13 18:00:32', 0),
(4, '28160439', '45kg', '5\'2', '20/60', '<p>this patiet is&nbsp; <b>egdrrtwert </b>rt er</p>', 0, '2020-01-18 10:51:36', '2020-01-18 10:51:36', 0),
(5, '50178269', '', '', '20/60', '<p>fsdfsdfsdfs</p>', 0, '2020-02-01 01:04:43', '2020-02-01 01:04:43', 0),
(6, '12537980', '', '', '', '<p>kkadjadhadgs</p>', 0, '2020-02-02 16:07:23', '2020-02-02 16:07:23', 0),
(7, '12537980', '', '', '', '<p>nasdhsadjek</p>', 0, '2020-02-02 16:07:45', '2020-02-02 16:07:45', 0),
(8, '17354608', '45kg', '5\'2', '20/60', '<p>This iss&nbsp; a critical test</p><p><br></p>', 0, '2020-02-09 00:36:03', '2020-02-09 00:36:03', 0),
(9, '28435019', '', '', '', '<p>fsdfsdfsd</p>', 0, '2020-02-17 22:07:25', '2020-02-17 22:07:25', 0);

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
('9vtk5m2dji395kl4eupnn70ar6pvpv2q', '::1', 1582290793, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323239303530333b),
('b4lle65spu4ognoajcrlrbgoq751tihp', '::1', 1582291011, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323239303935333b),
('qoqsiauthviunc7j8cn6u92ipcbfsa48', '::1', 1582292462, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323239323332333b),
('pgkjd8mf4kq9bt3qp7fok0bpp9oa7ss3', '::1', 1582293385, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323239333230323b),
('kdersp253gbg0dnpanp3n3ef7nms4p41', '::1', 1582293700, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323239333539303b),
('ck2anti5nimtnq3647npk5e1bou5v4te', '::1', 1582294153, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323239333933323b),
('ophlqdahvvd0tkcm0jfqvve3f9glbiag', '::1', 1582294316, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323239343237303b),
('285l8grh5nmqk1pfbvj3e87o9h9opqc9', '::1', 1582295372, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323239353231333b),
('adh7um6k00lphj3r74dic706ir3ec5q3', '::1', 1582295698, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323239353430333b),
('0a69dq6rrnr5t6quh82bdedmsdvle9pv', '::1', 1582296133, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323239353837313b),
('ho5el9edvt70v5k5tq09ocsfqlhpi03c', '::1', 1582296500, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323239363331343b),
('kfntibocijmdp80mv7ckb5413seelkrv', '::1', 1582296873, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323239363539383b),
('d081q13grm1av8jfqiv5mr0rugf0qtjg', '::1', 1582296973, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323239363936323b),
('m24la4jdi0sb2jr513hmdj3uhkqmtj1s', '::1', 1582297272, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323239363939333b),
('gjtimt8d7jg07q03pje4tcmjvlogd7ci', '::1', 1582297569, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323239373237393b),
('3ni6t2f9tg571eerkh0va7304ks391av', '::1', 1582297956, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323239373639383b),
('c9oq1ant5mqrnm8r5gf0aptmtr715fh1', '::1', 1582298261, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323239383031383b),
('kflr20sublke9blmgdua7p5092g5uije', '::1', 1582298658, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323239383338383b),
('j60vhjh9valeqt8rmsptej0entktm871', '::1', 1582298960, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323239383730363b),
('32eplnkinouoba1vuqa2qgl0e3erobpr', '::1', 1582299538, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323239393233393b),
('t8aoj7adkc2ldl6u1ucn6a8m3tqfq22s', '::1', 1582299701, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323239393535323b),
('f73g85mutplvda6jroiqlqq2cql4vv75', '::1', 1582299972, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323239393935323b),
('v3pk25p1i5p49l5lbqvfb8kh88025jn5', '::1', 1582300341, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323330303036353b),
('rrebbcvi44igijrnqa139q05jj8nd0ki', '::1', 1582300638, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323330303339353b),
('ioplh399p6hmp7clruujkv2bnir4vlic', '::1', 1582301345, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323330313034383b),
('ulegvkippadtc169vmddj3nse05245qh', '::1', 1582301474, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323330313335333b),
('kl8hvet2ac71v4thltcg1era5ve18j2h', '::1', 1582302387, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323330323333303b),
('l6ov2514rujq16mu3ott2vp0rbh5t0nd', '::1', 1582302661, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323330323635353b),
('0lg1jtkt9pt83vtravc8b3c0ujlu1fq3', '::1', 1582303427, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323330333432343b),
('vp16btp6ocj647h88q6hsh3193an3cvl', '::1', 1582303735, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323330333434363b),
('r02m9i7ll6s4g6tr5bnvl00noqkc58ah', '::1', 1582303882, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323330333831373b),
('jq04arsq82kl4dk1q0nmtkm894klcs7f', '::1', 1582304211, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323330343139343b757365725f69647c733a313a2239223b6e616d657c733a31363a2244617665204d61726b2043616e646172223b66697273745f6e616d657c733a393a2244617665204d61726b223b6c6173745f6e616d657c733a363a2243616e646172223b757365726e616d657c733a383a22646176656d61726b223b656d61696c7c733a303a22223b636f6e746163745f6e6f7c733a31313a223132333435363738393030223b6163636f756e745f747970657c733a353a2261646d696e223b6163636f756e745f6e6f7c733a383a223830373234393135223b67656e6465727c733a303a22223b616464726573737c733a35363a2238382053616d706167756974612053742e2056696c6c61204573706572616e7a61204d6f6c696e6f2032204261636f6f7220436176697465223b69735f61646d696e7c623a313b69735f6c6f676765645f696e7c623a313b637265617465647c733a31393a22323032302d30312d32352031333a31353a3536223b73657373696f6e5f636f64657c733a33303a2244484b46395234695a6f55784e50426c3579776e4330714975416b677445223b),
('1rb4esndaclt2j346dr43isg7eijkl4v', '::1', 1582339217, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323333393034333b757365725f69647c733a313a2239223b6e616d657c733a31363a2244617665204d61726b2043616e646172223b66697273745f6e616d657c733a393a2244617665204d61726b223b6c6173745f6e616d657c733a363a2243616e646172223b757365726e616d657c733a383a22646176656d61726b223b656d61696c7c733a303a22223b636f6e746163745f6e6f7c733a31313a223132333435363738393030223b6163636f756e745f747970657c733a353a2261646d696e223b6163636f756e745f6e6f7c733a383a223830373234393135223b67656e6465727c733a303a22223b616464726573737c733a35363a2238382053616d706167756974612053742e2056696c6c61204573706572616e7a61204d6f6c696e6f2032204261636f6f7220436176697465223b69735f61646d696e7c623a313b69735f6c6f676765645f696e7c623a313b637265617465647c733a31393a22323032302d30312d32352031333a31353a3536223b73657373696f6e5f636f64657c733a33303a2262784e59777134476665485a79415474396732456d4d76643746634f6e4a223b),
('n5ohegep3sa2jd58rnh6hmktnspk1igk', '::1', 1582339690, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323333393638343b757365725f69647c733a313a2239223b6e616d657c733a31363a2244617665204d61726b2043616e646172223b66697273745f6e616d657c733a393a2244617665204d61726b223b6c6173745f6e616d657c733a363a2243616e646172223b757365726e616d657c733a383a22646176656d61726b223b656d61696c7c733a303a22223b636f6e746163745f6e6f7c733a31313a223132333435363738393030223b6163636f756e745f747970657c733a353a2261646d696e223b6163636f756e745f6e6f7c733a383a223830373234393135223b67656e6465727c733a303a22223b616464726573737c733a35363a2238382053616d706167756974612053742e2056696c6c61204573706572616e7a61204d6f6c696e6f2032204261636f6f7220436176697465223b69735f61646d696e7c623a313b69735f6c6f676765645f696e7c623a313b637265617465647c733a31393a22323032302d30312d32352031333a31353a3536223b73657373696f6e5f636f64657c733a33303a2262784e59777134476665485a79415474396732456d4d76643746634f6e4a223b),
('85368ddk3fa5u07tn3nblrmmtk1847hs', '::1', 1582340323, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323334303232303b),
('jpvvhmtvg5t7ts6c637kbri95gdbk7fq', '::1', 1582340532, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323334303532343b),
('p6k68oaq7eo7f7l9iftm3dukf25dtdar', '::1', 1582352730, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323335323732363b),
('2ohn6f7q2nuo4n4ft97e8ql3srcl5mpg', '::1', 1586589530, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538363538393436343b757365725f69647c733a313a2239223b6e616d657c733a393a22526f6e612049455449223b66697273745f6e616d657c733a343a22526f6e61223b6c6173745f6e616d657c733a343a2249455449223b757365726e616d657c733a353a2241444d494e223b656d61696c7c733a303a22223b636f6e746163745f6e6f7c733a31313a223132333435363738393030223b6163636f756e745f747970657c733a353a2261646d696e223b6163636f756e745f6e6f7c733a383a223830373234393135223b67656e6465727c733a303a22223b616464726573737c733a35363a2238382053616d706167756974612053742e2056696c6c61204573706572616e7a61204d6f6c696e6f2032204261636f6f7220436176697465223b69735f61646d696e7c623a313b69735f6c6f676765645f696e7c623a313b637265617465647c733a31393a22323032302d30312d32352031333a31353a3536223b73657373696f6e5f636f64657c733a33303a224c4457334d395464484a3843666b31346c6f4f53725846776255326a357a223b);

-- --------------------------------------------------------

--
-- Table structure for table `familynumbers`
--

DROP TABLE IF EXISTS `familynumbers`;
CREATE TABLE IF NOT EXISTS `familynumbers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `modified_by` int(11) NOT NULL,
  `family_number` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `familynumbers`
--

INSERT INTO `familynumbers` (`id`, `family_name`, `created`, `modified`, `is_deleted`, `modified_by`, `family_number`) VALUES
(3, 'tufyty vuv', '2020-01-26 19:13:54', '2020-01-26 19:13:54', 0, 0, 1),
(2, 'Candar', '2020-01-26 18:44:08', '2020-01-26 18:44:08', 0, 0, 2),
(4, 'asd', '2020-01-30 22:12:43', '2020-01-30 22:12:43', 0, 0, 3),
(5, 'baladjay', '2020-02-02 15:58:40', '2020-02-02 15:58:40', 0, 0, 1001);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(500) NOT NULL DEFAULT '',
  `patient_no` varchar(11) NOT NULL DEFAULT '',
  `last_name` varchar(500) NOT NULL,
  `middle_name` varchar(500) NOT NULL,
  `nickname` varchar(500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `birthday` datetime NOT NULL,
  `age` int(11) NOT NULL,
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
  `session_code` varchar(255) NOT NULL,
  `bp` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `first_name`, `patient_no`, `last_name`, `middle_name`, `nickname`, `gender`, `birthday`, `age`, `address`, `contact_no`, `email`, `username`, `password`, `created`, `modified`, `status`, `is_deleted`, `modified_by`, `family_number`, `account_type`, `author_id`, `picture`, `session_code`, `bp`, `weight`, `height`) VALUES
(40, 'dave Mark', '28160439', 'Candar', 'H.', '', 'Male', '1994-12-31 00:00:00', 20, '....', '12345678900', '', 'davedave', '817fa7a2451196f7599ae8bb594743129848cfd1649a5a4c71303bd322fd9d7e8e9866688373280fde643fa8d2c36d5dbe02fb2ab62f7db05b547737083d3f66q5uBSZEUaKHJtO1x84Cy0WTbNd+FexEAPi6Zl1f3KnQ=', '2020-01-18 10:50:57', '2020-02-01 01:51:05', '', 0, 0, 4, '...', 0, '', '', '60/60', '45klg', '5\'6'),
(47, 'angel', '12537980', 'baladjay', 'p', '', 'Female', '1994-11-08 00:00:00', 25, 'san pedro', '02932948374', '', 'angelbaladjay', 'f10b815e45f32f2ee949fd3a1a0f8149fdf1e67a6d5e4eb4654d6ef8fedd9ad5645af8a58bc28b858f723c1d3db744167f9204446e69c13f8b478f6d7511fd91zFCzv0Y19XmWsFwwEP3z+EgNK7jEhym/NPNsQEKdUWA=', '2020-02-02 15:57:08', '2020-02-17 23:49:08', '', 0, 0, 0, '', 0, '', '', '80/120', '60', '5\'5'),
(48, 'Someone', '17354608', 'test', 'H', '', 'Female', '2020-02-07 00:00:00', 20, '88 Sampaguita St. Villa Esperanza Molino 2 Bacoor Cavite', '12345678900', '', 'Someonetest', '3d07d8bbe8d6ccc7f87f5f9d20e1f323676569857da485a6aad72bfb8b8019c2837d79089bdeb10c84f9d2eccded578c031fb80874e294321f11431cb1a007fa', '2020-02-05 23:25:46', '2020-02-05 23:25:46', '', 0, 0, 0, '', 0, '', '', '20/60', '45kg', '5\'2'),
(41, 'Dave Mark', '50178269', 'candar', 'H', '', 'Male', '1994-12-31 00:00:00', 25, '88 Sampaguita St. Villa Esperanza Molino 2 Bacoor Cavite', '09569024355', '', 'davemark', 'a1c12befca111b6623fbd949187888566589c55ba614120fa24c5d0a78b522ecd45d17a7396794b00260f979ab8d7ea1e5e1dadf3426a19145062832b455d258BrTcGxfq5XHhpgE/mTXACMvNELnwVBFvCpGsk6mnTMA=', '2020-01-25 09:41:21', '2020-02-01 01:58:22', '', 0, 0, 3, '', 0, '', '', '20/60', '45kg', '5\'2'),
(42, 'Mark davic', '86490213', 'candar', 'H.', '', 'Female', '2020-01-15 00:00:00', 23, '88 Sampaguita St. Villa Esperanza Molino 2 Bacoor Cavite', '09569024355', '', 'Markdaviccandar', '8a9e7f1ec773a125e82214f1f1add1f5e557a0fd2c836299ff4683cabf3c277d3a807b73bfef8110d9833b1b6afea46cf891184a275ed890f4d5998d7613adeaPNKl5g8eJDt2leNMqHt5h2m3XqQv21wYz7HRydvU1Sg=', '2020-01-29 19:39:41', '2020-02-01 01:57:56', '', 0, 0, 3, '', 0, '', '', '20/60', '45kg', '5\'2'),
(43, 'hdjfgk', '69785203', 'candar', '', '', 'Male', '2020-01-10 00:00:00', 20, '88 Sampaguita St. Villa Esperanza Molino 2 Bacoor Cavite', '09569024355', '', 'hdjfgkcandar', '4a1ee1c8d2834048257abc3152d5a45dce61319079bd999333d43fc484006bffebb4a019b60e655d42bcb3f7c90f5a7225aa8a5ca98f0873d5d368858b51f339sYhd4f70Cb2tTwnQp2NbTAjjVntMSmJbJ+6UIb+3G+E=', '2020-01-29 19:40:12', '2020-02-01 01:55:49', '', 0, 0, 3, '', 0, '', '', '20/60', '45kg', '5\'2'),
(44, 'daf', '28435019', 'asdaas', 'a', '', 'Male', '2020-01-09 00:00:00', 20, '88 Sampaguita St. Villa Esperanza Molino 2 Bacoor Cavite', '09569024355', '', 'dafasdaas', '5eacbfae6122d12c3185842f9b0f4af5c72945c71bb46dbeb2d730d28ad81fb2a375a9fe43eb13c2074f444ff1d668ffd9cef03a7b5034882200a9fd64175ef2XrFheFenXuJXCP5Yp+D5lDk1JhEgcjNJ9qW6ffwxkdE=', '2020-01-30 21:57:33', '2020-02-02 15:57:58', '', 1, 0, 3, '', 0, '', '', '20/60', '45kg', '5\'6');

-- --------------------------------------------------------

--
-- Table structure for table `prenatal`
--

DROP TABLE IF EXISTS `prenatal`;
CREATE TABLE IF NOT EXISTS `prenatal` (
  `patient_no` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_deleted` int(11) NOT NULL,
  `ob_history` varchar(255) NOT NULL,
  `lmp` varchar(255) NOT NULL,
  `edc` varchar(255) NOT NULL,
  `aog` varchar(255) NOT NULL,
  `fht` varchar(255) NOT NULL,
  `fhb` varchar(255) NOT NULL,
  `pos` varchar(255) NOT NULL,
  `pres` varchar(255) NOT NULL,
  `tt_record` varchar(255) NOT NULL,
  `hr_code` varchar(255) NOT NULL,
  `last_delivery` datetime DEFAULT NULL,
  `place_last_delivery` varchar(255) NOT NULL,
  `attent_by` varchar(255) NOT NULL,
  `typeofdelivery` varchar(255) NOT NULL,
  `blood_type` varchar(255) NOT NULL,
  `micoronutients_given` varchar(255) NOT NULL,
  `mg_date_given` datetime DEFAULT NULL,
  `food_suplement` varchar(255) NOT NULL,
  `fs_date_given` datetime DEFAULT NULL,
  `dental_checkup` varchar(255) NOT NULL,
  `treatment_given` varchar(255) NOT NULL,
  `date_of_visit` datetime DEFAULT NULL,
  `FSN` varchar(255) DEFAULT NULL,
  `ap_no` varchar(255) NOT NULL,
  `prenatal_note` text NOT NULL,
  `hgb` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prenatal`
--

INSERT INTO `prenatal` (`patient_no`, `created`, `modified`, `id`, `is_deleted`, `ob_history`, `lmp`, `edc`, `aog`, `fht`, `fhb`, `pos`, `pres`, `tt_record`, `hr_code`, `last_delivery`, `place_last_delivery`, `attent_by`, `typeofdelivery`, `blood_type`, `micoronutients_given`, `mg_date_given`, `food_suplement`, `fs_date_given`, `dental_checkup`, `treatment_given`, `date_of_visit`, `FSN`, `ap_no`, `prenatal_note`, `hgb`) VALUES
(17354608, '2020-02-09 20:39:06', '2020-02-09 20:39:06', 10, 0, 'tetst', 'test', 'test', 'test', 'tset', 'ttest', 'tset', 'test', 'test', 'test', '2020-02-06 00:00:00', 'test test test', 'etst', 'TEST', 'test', '2020-02-07', '0000-00-00 00:00:00', '2020-02-07', '0000-00-00 00:00:00', 'Yes', '', '2020-01-30 00:00:00', 'etst', 'test', '<p>asdfad sdfasert dfgsert sdfg&nbsp;</p>', 'test'),
(12537980, '2020-02-17 22:39:51', '2020-02-17 22:39:51', 11, 0, 'tetst', 'test', 'test', 'test', 'tset', 'ttest', 'tset', 'test', 'test', 'test', '2020-02-08 00:00:00', 'test test test', 'etst', 'TEST', 'test', 'food', '2020-02-13 00:00:00', 'food', '2020-02-06 00:00:00', 'Yes', '', '2020-02-06 00:00:00', 'etst', 'test', '<p>test test test</p>', 'test'),
(17354608, '2020-02-17 23:03:12', '2020-02-17 23:03:12', 12, 0, 'tetst', 'test', 'test', 'test', 'tset', 'ttest', 'tset', 'test', 'test', 'test', '2020-02-06 00:00:00', 'test test test', 'etst', 'TEST', 'test', '2020-02-07', '1970-01-01 00:00:00', '2020-02-07', '1970-01-01 00:00:00', 'Yes', '', '2020-01-30 00:00:00', 'etst', 'test', '<p>Test testong</p>', 'test'),
(17354608, '2020-02-17 23:07:56', '2020-02-17 23:07:56', 13, 0, 'tetst', 'test', 'test', 'test', 'tset', 'ttest', 'tset', 'test', 'test', 'test', '2020-02-06 00:00:00', 'test test test', 'etst', 'TEST', 'test', '2020-02-07', '1970-01-01 00:00:00', '2020-02-07', '1970-01-01 00:00:00', 'Yes', '', '2020-01-30 00:00:00', 'etst', 'test', '', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_no` varchar(100) NOT NULL,
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
  `session_code` varchar(255) NOT NULL,
  `bp` varchar(255) NOT NULL,
  `height` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `account_no`, `first_name`, `last_name`, `middle_name`, `nickname`, `gender`, `birthday`, `address`, `contact_no`, `email`, `username`, `password`, `created`, `modified`, `status`, `is_deleted`, `modified_by`, `family_number`, `account_type`, `author_id`, `picture`, `session_code`, `bp`, `height`) VALUES
(8, '68054312', 'Rona', 'Candar', 'H.', '', '', '2020-01-08', '...', '12345678900', '', 'ronaCandar', 'b34396a9c1f84f8124a3fcd7d32359a26bdd2fc563df0641ce51654132218c885656e6cfdc4b659ce1d9b3fdfd1005d424c84075308c31cd03b26c041d12588d', '2020-01-18 10:48:05', '2020-02-16 18:28:20', '', 1, 0, 0, 'DOCTOR', 0, '', 'PzohuqSf0bnmUZNRQYAp7vFVc4dDrg', '', ''),
(9, '80724915', 'Rona', 'IETI', 'H.', '', '', '2020-01-01', '88 Sampaguita St. Villa Esperanza Molino 2 Bacoor Cavite', '12345678900', '', 'ADMIN', 'f70330bc4e7d8a4438081bae34e188a24478c9614d87ec6d26751bc20f1adad1d177a97e1e752ba2e494dfb88716e69a57518eda70012300628e0be1f45a92f1', '2020-01-25 13:15:56', '2020-04-11 15:18:37', '', 0, 0, 0, 'admin', 0, '', 'LDW3M9TdHJ8Cfk14loOSrXFwbU2j5z', '', ''),
(11, '08795612', 'Dave Mark', 'Candar', 'p', '', '', '2020-02-03', '88 Sampaguita St. Villa Esperanza Molino 2 Bacoor Cavite', '09569024355', '', 'ADMIN', 'eae23801e59074eba0f2e368f8642854afc29e64656379174186412abad7c8223d2ce67edabed635e5c5a5093c453db000e06e8ccdc3ee60e8a634e2ec551d96', '2020-02-02 16:06:23', '2020-02-19 23:08:19', '', 0, 0, 0, 'Admin', 0, '', 'cAoT3rEge8kbBCD6LaxOw7zVfFYJWv', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

DROP TABLE IF EXISTS `vaccine`;
CREATE TABLE IF NOT EXISTS `vaccine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `birthday` datetime NOT NULL,
  `mother` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `birth_history` varchar(255) NOT NULL,
  `feeding_history` text NOT NULL,
  `sex` varchar(255) NOT NULL,
  `birth_wt` varchar(255) NOT NULL,
  `tt_satatus` varchar(255) NOT NULL,
  `contact_no` int(20) NOT NULL,
  `date_refer` datetime NOT NULL,
  `time_initiated` datetime NOT NULL,
  `fh_no` varchar(255) NOT NULL,
  `ufh_no` varchar(255) NOT NULL,
  `ept_no` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `is_deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`id`, `name`, `birthday`, `mother`, `address`, `birth_history`, `feeding_history`, `sex`, `birth_wt`, `tt_satatus`, `contact_no`, `date_refer`, `time_initiated`, `fh_no`, `ufh_no`, `ept_no`, `created`, `modified`, `is_deleted`) VALUES
(14, 'testing', '2020-01-30 00:00:00', 'Dasdasda', '88 Sampaguita St. Villa Esperanza Molino 2 Bacoor Cavite', '.asdasdasd', '..', 'Male', '..', '..', 2147483647, '2020-02-05 00:00:00', '0000-00-00 00:00:00', '..', '..', '..', '2020-02-08 00:24:18', '2020-02-17 22:35:36', 1),
(15, 'asdasd', '2020-01-28 00:00:00', 'asd', '88 Sampaguita St. Villa Esperanza Molino 2 Bacoor Cavite', '..', '..', 'Male', '..', '..', 2147483647, '2020-02-07 00:00:00', '0000-00-00 00:00:00', '..', '..', '..', '2020-02-13 01:25:16', '2020-02-17 22:35:40', 1),
(16, 'sdasd', '2020-01-30 00:00:00', 'asd', '88 Sampaguita St. Villa Esperanza Molino 2 Bacoor Cavite', '..', '..', 'Male', '..', '..', 2147483647, '2020-02-06 00:00:00', '0000-00-00 00:00:00', '..', '..', '..', '2020-02-17 22:22:05', '2020-02-17 22:22:05', 0),
(17, 'asdas', '2020-02-05 00:00:00', 'asd', '88 Sampaguita St. Villa Esperanza Molino 2 Bacoor Cavite', '.asdasdasd', '..', 'Male', '..', '..', 2147483647, '2020-02-14 00:00:00', '0000-00-00 00:00:00', '..', '..', '..', '2020-02-17 22:36:40', '2020-02-17 22:36:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_history`
--

DROP TABLE IF EXISTS `vaccine_history`;
CREATE TABLE IF NOT EXISTS `vaccine_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `immunation` varchar(255) NOT NULL,
  `assesment` text NOT NULL,
  `follow_up` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `vaccine_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vaccine_history`
--

INSERT INTO `vaccine_history` (`id`, `immunation`, `assesment`, `follow_up`, `created`, `modified`, `vaccine_id`) VALUES
(1, 'asd', 'asdasdasd asd asd asd asdasd', '2020-01-10 00:00:00', '2020-01-25 16:55:59', '2020-01-25 16:55:59', 11),
(2, 'asd', 'asd asd asdas dasdasdas asd asasd asd asda asd asd asd asd asd asd adas asd wdwdasdcw asdwdas w', '2020-01-27 00:00:00', '2020-01-25 17:17:46', '2020-01-25 17:17:46', 11),
(3, 'asdasdas', 'asda asdasasdasdaadasasasdasdassd asd asd', '2020-01-08 00:00:00', '2020-01-25 17:18:04', '2020-01-25 17:18:04', 11),
(4, 'asd', 'GRSTYDH HFHJ', '2020-01-16 00:00:00', '2020-01-25 19:00:57', '2020-01-25 19:00:57', 8),
(5, 'sadasdsad', 'asd sda asd asd asd asd asd', '2020-01-14 00:00:00', '2020-01-25 22:32:59', '2020-01-25 22:32:59', 12),
(6, 'sadasdsad', 'asd sda asd asd asd asd asd', '2020-01-14 00:00:00', '2020-01-25 22:32:59', '2020-01-25 22:32:59', 12),
(7, 'asdasdasd', 'asdasda', '2019-12-30 00:00:00', '2020-01-25 23:20:17', '2020-01-25 23:20:17', 7),
(8, 'asdasdasd', 'asdasda', '2019-12-30 00:00:00', '2020-01-25 23:20:17', '2020-01-25 23:20:17', 7),
(9, 'dasd', 'dasd', '2020-01-02 00:00:00', '2020-01-25 23:20:32', '2020-01-25 23:20:32', 7),
(10, 'dasd', 'dasd', '2020-01-02 00:00:00', '2020-01-25 23:20:32', '2020-01-25 23:20:32', 7),
(11, 'asda', 'asdsa asdasd', '2020-01-28 00:00:00', '2020-01-25 23:21:21', '2020-01-25 23:21:21', 8),
(12, 'asda', 'asdsa asdasd', '2020-01-28 00:00:00', '2020-01-25 23:21:21', '2020-01-25 23:21:21', 8),
(13, 'd', 'asda', '2020-01-01 00:00:00', '2020-01-25 23:21:48', '2020-01-25 23:21:48', 8),
(14, 'd', 'asda', '2020-01-01 00:00:00', '2020-01-25 23:21:48', '2020-01-25 23:21:48', 8),
(15, 'asd', 'asdasd', '2020-01-15 00:00:00', '2020-01-25 23:23:19', '2020-01-25 23:23:19', 8),
(16, 'asd', 'asdasd', '2020-01-15 00:00:00', '2020-01-25 23:23:19', '2020-01-25 23:23:19', 8),
(17, 'asdas', 'asd', '2020-01-02 00:00:00', '2020-01-25 23:24:34', '2020-01-25 23:24:34', 11),
(18, 'asdas', 'asd', '2020-01-02 00:00:00', '2020-01-25 23:24:34', '2020-01-25 23:24:34', 11),
(19, 'asd', 'asda', '2020-01-02 00:00:00', '2020-01-25 23:26:34', '2020-01-25 23:26:34', 13),
(20, 'asd', 'asda', '2020-01-03 00:00:00', '2020-01-25 23:26:55', '2020-01-25 23:26:55', 12),
(21, 'aser asdf asd', 'sdas asdasdqwad as', '2020-01-12 00:00:00', '2020-01-26 22:19:03', '2020-01-26 22:19:03', 13),
(22, 'asd', 'dadasda asdasd', '2020-02-07 00:00:00', '2020-02-08 00:24:28', '2020-02-08 00:24:28', 14),
(23, 'asdasdfasdf', 'asdfasdf', '2020-02-13 00:00:00', '2020-02-09 21:39:27', '2020-02-09 21:39:27', 14),
(24, 'asd', 'asdasd', '0000-00-00 00:00:00', '2020-02-17 21:33:23', '2020-02-17 21:33:23', 14),
(25, 'asdasd', 'asdasd', '2020-01-30 00:00:00', '2020-02-17 21:51:44', '2020-02-17 21:51:44', 14),
(26, 'asdasd', 'dasdasda asda sdasd', '2020-02-14 00:00:00', '2020-02-17 22:07:41', '2020-02-17 22:07:41', 14),
(27, 'asdasd', 'asd', '2020-02-06 00:00:00', '2020-02-17 22:12:54', '2020-02-17 22:12:54', 14),
(28, 'asdasd', 'asda', '2020-02-22 00:00:00', '2020-02-17 22:15:05', '2020-02-17 22:15:05', 14),
(29, 'asdasd', 'asd', '2020-02-13 00:00:00', '2020-02-17 22:22:54', '2020-02-17 22:22:54', 16);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
