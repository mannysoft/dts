-- phpMyAdmin SQL Dump
-- version 3.5.2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 24, 2012 at 03:54 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dts`
--

-- --------------------------------------------------------

--
-- Table structure for table `dts_actions`
--

CREATE TABLE IF NOT EXISTS `dts_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(64) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `dts_actions`
--

INSERT INTO `dts_actions` (`id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'For signature', 'active', '2012-08-21 09:01:57', '2012-08-19 15:00:50'),
(2, 'Appropriate Action', 'active', '2012-08-21 09:01:17', '0000-00-00 00:00:00'),
(3, 'Follow up', 'active', '2012-08-21 09:01:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `dts_attachments`
--

CREATE TABLE IF NOT EXISTS `dts_attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tracking_no` varchar(30) NOT NULL,
  `office_id` int(11) NOT NULL,
  `doc_type_id` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `filename` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dts_attachments`
--

INSERT INTO `dts_attachments` (`id`, `tracking_no`, `office_id`, `doc_type_id`, `description`, `filename`) VALUES
(1, '4806511898046', 19, 0, 'This are some very very very very very long attachments', ''),
(2, '4806511898046', 19, 0, 'Another attachments', '');

-- --------------------------------------------------------

--
-- Table structure for table `dts_docs`
--

CREATE TABLE IF NOT EXISTS `dts_docs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tracking_no` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'should be user id',
  `office_id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `doc_type_id` int(11) NOT NULL,
  `actions_needed` varchar(128) NOT NULL COMMENT 'like follow up, appropriate actions',
  `action_taken` varchar(32) NOT NULL,
  `remarks` varchar(256) NOT NULL,
  `allow_track` enum('yes','no') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_register` varchar(20) NOT NULL,
  `finish` tinyint(1) NOT NULL COMMENT 'tell if the documents is finish',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `dts_docs`
--

INSERT INTO `dts_docs` (`id`, `tracking_no`, `user_id`, `office_id`, `title`, `doc_type_id`, `actions_needed`, `action_taken`, `remarks`, `allow_track`, `created_at`, `updated_at`, `date_register`, `finish`) VALUES
(1, '1', 1, 1, 'tawa ka ng tawaaaaa', 1, '1', '', 'for signature', 'yes', '2012-08-22 03:06:29', '2012-08-19 14:56:15', '', 0),
(9, '2', 1, 1, 'Site Slogan', 0, '', '', '', 'yes', '2012-08-22 03:06:29', '0000-00-00 00:00:00', '', 0),
(10, '1234', 1, 1, 'payroll', 1, '["1","2","3"]', '', 'haha', 'yes', '2012-08-22 05:09:25', '2012-08-21 21:09:25', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dts_doctypes`
--

CREATE TABLE IF NOT EXISTS `dts_doctypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `dts_doctypes`
--

INSERT INTO `dts_doctypes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Memorandum Order', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Purchase Request', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Procurement Request', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Payroll', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Request Letter', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Voucher', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Cash Advance', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `dts_histories`
--

CREATE TABLE IF NOT EXISTS `dts_histories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_id` varchar(40) NOT NULL,
  `office_id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` enum('created','received','released') NOT NULL DEFAULT 'created',
  `date_time` datetime NOT NULL,
  `time_in` varchar(40) NOT NULL,
  `time_out` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_received` int(11) NOT NULL,
  `user_release` int(11) NOT NULL,
  `remarks` varchar(256) NOT NULL,
  `release_to` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `dts_histories`
--

INSERT INTO `dts_histories` (`id`, `doc_id`, `office_id`, `station_id`, `user_id`, `action`, `date_time`, `time_in`, `time_out`, `created_at`, `updated_at`, `user_received`, `user_release`, `remarks`, `release_to`) VALUES
(35, '10', 19, 0, 1, 'released', '2012-08-21 02:08:25', '', '', '2012-08-21 21:09:25', '2012-08-21 21:09:25', 0, 0, 'haha', 'mcdo'),
(34, '10', 19, 0, 1, 'released', '2012-08-21 01:08:28', '', '', '2012-08-21 20:58:28', '2012-08-21 20:58:28', 0, 0, '', ''),
(33, '10', 19, 0, 1, 'released', '2012-08-21 01:08:15', '', '', '2012-08-21 20:56:15', '2012-08-21 20:56:15', 0, 0, '', ''),
(32, '10', 19, 0, 1, 'released', '2012-08-21 01:08:18', '', '', '2012-08-21 20:51:18', '2012-08-21 20:51:18', 0, 0, 'awaw', ''),
(31, '10', 19, 0, 1, 'released', '2012-08-21 01:08:45', '', '', '2012-08-21 20:50:45', '2012-08-21 20:50:45', 0, 0, '', ''),
(30, '10', 19, 0, 1, 'released', '2012-08-21 01:08:35', '', '', '2012-08-21 20:49:35', '2012-08-21 20:49:35', 0, 0, 'gbjgjgl', 'ffjhj'),
(29, '10', 19, 0, 1, 'released', '2012-08-21 01:08:22', '', '', '2012-08-21 20:49:22', '2012-08-21 20:49:22', 0, 0, '', ''),
(28, '10', 19, 0, 1, 'released', '2012-08-21 01:08:08', '', '', '2012-08-21 20:47:08', '2012-08-21 20:47:08', 0, 0, 'remarks ng bigayan', 'sa knya lang nbgay eh'),
(25, '10', 19, 0, 1, 'released', '2012-08-21 01:08:03', '', '', '2012-08-21 20:38:03', '2012-08-21 20:38:03', 0, 0, '', ''),
(24, '10', 19, 0, 1, 'released', '2012-08-21 01:08:42', '', '', '2012-08-21 20:35:42', '2012-08-21 20:35:42', 0, 0, '', ''),
(23, '10', 19, 0, 1, 'released', '2012-08-21 01:08:25', '', '', '2012-08-21 20:35:25', '2012-08-21 20:35:25', 0, 0, '', ''),
(22, '10', 19, 0, 1, 'released', '2012-08-21 01:08:20', '', '', '2012-08-21 20:35:20', '2012-08-21 20:35:20', 0, 0, '', ''),
(21, '10', 19, 0, 1, 'released', '2012-08-21 01:08:25', '', '', '2012-08-21 20:34:25', '2012-08-21 20:34:25', 0, 0, '', ''),
(26, '10', 19, 0, 1, 'released', '2012-08-21 01:08:03', '', '', '2012-08-21 20:40:03', '2012-08-21 20:40:03', 0, 0, 'remarks haha', 'baho itlog'),
(27, '10', 19, 0, 1, 'released', '2012-08-21 01:08:15', '', '', '2012-08-21 20:43:15', '2012-08-21 20:43:15', 0, 0, 'remarks ni manok', 'manoklito');

-- --------------------------------------------------------

--
-- Table structure for table `dts_logs`
--

CREATE TABLE IF NOT EXISTS `dts_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `sql_command` varchar(200) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dts_offices`
--

CREATE TABLE IF NOT EXISTS `dts_offices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `office_code` varchar(10) NOT NULL DEFAULT '',
  `office_name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `dts_offices`
--

INSERT INTO `dts_offices` (`id`, `office_code`, `office_name`) VALUES
(1, 'PAO', 'Provincial Attorneys Office'),
(2, 'BSO', 'Board Secretary Office'),
(3, 'ENRO', 'Environment & Natural Resources Office'),
(4, 'FAEO', 'Office of the Provincial Agriculturist (FAES)'),
(5, 'FAITH', 'Food Always In The Home'),
(6, 'GCMH', 'General Cailles Memorial Hospital'),
(7, 'GO', 'Office of the Governor'),
(8, 'GSO', 'General Services Office'),
(9, 'HACO', 'History Arts and Culture Office'),
(10, 'HRMO', 'Human Resource Management Office'),
(11, 'IRTO', 'International Relations and Trade Office'),
(12, 'JPMH', 'JP Rizal Memorial Hospital'),
(13, 'LCC', 'Laguna Chest Center'),
(14, 'LDH', 'Luisiana District Hospital'),
(15, 'LPJ', 'Laguna Provincial Jail'),
(16, 'LSO', 'Legal Services Office'),
(17, 'LTMO', 'Laguna Traffic Management Office'),
(18, 'MDPWD', 'Moral Development Program & Womens Desk'),
(19, 'MISO', 'Management Information System Office'),
(20, 'MMH', 'Majayjay Medicare Hospital'),
(21, 'NDH', 'Nagcarlan District Hospital'),
(22, 'OPA', 'Office of the Provincial Administrator'),
(23, 'PACCO', 'Provincial Accounting Office'),
(24, 'PASSO', 'Provincial Assessors Office'),
(25, 'PBO', 'Provincial Budget Office'),
(26, 'PDCO', 'Planning & Development Coordinating Office'),
(27, 'PEO', 'Provincial Engineering Office'),
(28, 'PHO', 'Provincial Health Office'),
(29, 'PIO', 'Provincial Information Office'),
(30, 'PLib', 'Provincial Library'),
(31, 'PNO', 'Provincial Nutrition Office'),
(32, 'PPAOO', 'Provincial Peace and Order Office'),
(33, 'PPOC', 'Provincial Population Office (Clinical)'),
(34, 'PPOO', 'Provincial Population Office (Outreach)'),
(35, 'PSWDO', 'Provincial Social Welfare & Development Office'),
(36, 'PTO', 'Provincial Treasurers Office'),
(37, 'PTRO', 'Provincial Tourism Office'),
(38, 'PVO', 'Provincial Veterenarians Office'),
(39, 'PWO', 'Provincial Waterworks Office'),
(40, 'SCO', 'Sectoral Concern Office'),
(41, 'SGDO', 'Sports and Games Development Office'),
(42, 'SLO', 'Special Livelihood Office'),
(43, 'SPMH', 'San Pedro Municipal Hospital'),
(44, 'UDHO', 'Urban Development and Housing Office'),
(45, 'VGO', 'Vice-Governor Office'),
(46, 'YDAO', 'Youth Development Affairs Office'),
(47, 'PUDHAO', 'Provincial Urban Development and Housing Office'),
(48, 'PPLBAY', 'Pagamutang Pangmasa ng Laguna - Bay'),
(49, 'PPLSPC', 'Panlalawigang Pagamutan ng Laguna - SPC');

-- --------------------------------------------------------

--
-- Table structure for table `dts_remarks`
--

CREATE TABLE IF NOT EXISTS `dts_remarks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `office_id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `message` varchar(512) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dts_sessions`
--

CREATE TABLE IF NOT EXISTS `dts_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dts_sessions`
--

INSERT INTO `dts_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('1112d96ebc08f01dcfe87dcbbedddd31', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KH', 1329102849, ''),
('2d7c65bce6a0f7c0a31dc8370717b5de', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KH', 1329102786, ''),
('2f0b7797903a6f67b1e0453b004c444f', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.1 (KH', 1345300085, ''),
('389740dc9a073556b5e57b52c3251e31', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KH', 1329102863, 'a:1:{s:12:"tracking_nos";a:1:{i:0;s:13:"4800024570024";}}'),
('4217b7371d3380396d4335360e16fcf4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KH', 1329102853, ''),
('492f4db675ce956576f8b7865282fcff', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.1 (KH', 1345300093, 'a:3:{s:8:"username";s:4:"0001";s:9:"office_id";s:2:"19";s:10:"station_id";s:1:"1";}'),
('4a6f53a4842152163077fccb5c79e514', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.1 (KH', 1345300094, ''),
('5122f04d2f78b577a1a17e1ab61d96a0', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.1 (KH', 1345300118, ''),
('7382ff228f30bbd8365f079b29cb52d8', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KH', 1329102783, ''),
('9363242c70b6ed09235b28735ede5d14', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KH', 1329102798, ''),
('b84d856dcddd1fa4e06b46dcc83d7e50', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.1 (KH', 1345300085, ''),
('d6797857e7ba53232870264829dd2c96', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KH', 1329102785, 'a:3:{s:8:"username";s:4:"0001";s:9:"office_id";s:2:"19";s:10:"station_id";s:1:"1";}'),
('dc9a83c589bca9bf4fa2949400c64e0c', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KH', 1329102855, ''),
('e545eb683d797c50c0172f01d1046679', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KH', 1329102782, '');

-- --------------------------------------------------------

--
-- Table structure for table `dts_settings`
--

CREATE TABLE IF NOT EXISTS `dts_settings` (
  `settings_id` int(11) NOT NULL AUTO_INCREMENT,
  `config_name` varchar(64) NOT NULL,
  `values` varchar(128) NOT NULL,
  PRIMARY KEY (`settings_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `dts_settings`
--

INSERT INTO `dts_settings` (`settings_id`, `config_name`, `values`) VALUES
(1, 'system_name', 'Document Tracking System'),
(2, 'hours_add (below is ', '0.00001,0.000001, (13,10 if on the server)'),
(3, 'Leave credit earn', '1.25');

-- --------------------------------------------------------

--
-- Table structure for table `dts_station`
--

CREATE TABLE IF NOT EXISTS `dts_station` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `office_id` int(11) NOT NULL,
  `description` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `dts_station`
--

INSERT INTO `dts_station` (`id`, `name`, `office_id`, `description`) VALUES
(1, 'Admin Section', 19, 'Admin Section'),
(2, 'Receiving', 25, 'Receiving'),
(3, 'Record/Encode', 25, 'Record/Encode'),
(4, 'Review/Initial', 25, 'Review/Initial'),
(5, 'Budget Officer', 25, 'Budget Officer'),
(6, 'Receiving', 8, 'Receiving'),
(7, 'Recording/ Window', 8, 'Recording/ Window'),
(8, 'Canvasser', 8, 'Canvasser'),
(9, 'Procurement Head', 8, 'Procurement Head'),
(10, 'Asst. GSO', 8, 'Asst. GSO'),
(11, 'GSO Chief', 8, 'GSO Chief'),
(12, 'Receiving ', 23, ' Receiving '),
(13, 'Recording', 23, 'Recording'),
(14, 'Index', 23, 'Index'),
(15, 'Analyst', 23, 'Analyst'),
(16, 'Head Analyst', 23, 'Head Analyst'),
(17, 'Prov''l Accountant', 23, 'Prov''l Accountant'),
(18, 'Receiving', 7, 'Receiving'),
(19, 'Recording', 7, 'Recording'),
(20, 'Encode', 7, 'Encode'),
(21, 'Admin. Head', 7, 'Admin. Head'),
(22, 'Administrator', 7, 'Administrator'),
(23, 'Local Chief Executive', 7, 'Local Chief Executive'),
(24, 'Receiving', 36, ' Receiving '),
(25, 'Recording', 36, 'Recording'),
(26, 'Encode', 36, 'Encode'),
(27, 'Asst. P.T', 36, 'Asst. P.T'),
(28, 'Prov''l Treasurer', 36, 'Prov''l Treasurer');

-- --------------------------------------------------------

--
-- Table structure for table `dts_users`
--

CREATE TABLE IF NOT EXISTS `dts_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `fname` varchar(50) NOT NULL DEFAULT '',
  `mname` varchar(50) NOT NULL DEFAULT '',
  `lname` varchar(50) NOT NULL DEFAULT '',
  `station_id` int(11) NOT NULL,
  `office_id` int(11) NOT NULL,
  `user_type` varchar(30) NOT NULL DEFAULT '',
  `type_user` tinyint(4) NOT NULL DEFAULT '3' COMMENT '1 = super admin, 2 = administrator, 3 = timekeeper',
  `stat` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_tbl_user_1` (`station_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `dts_users`
--

INSERT INTO `dts_users` (`id`, `username`, `password`, `fname`, `mname`, `lname`, `station_id`, `office_id`, `user_type`, `type_user`, `stat`) VALUES
(1, 'mannysoft', '$2a$08$OG5kSlV3V2R0bDZmWkNKVOzlNH0zZ7jxC3XsNt4CPkBr72SufNKGG', 'Manny', 'H', 'Isles', 1, 19, 'administrator', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dts_user_type`
--

CREATE TABLE IF NOT EXISTS `dts_user_type` (
  `id` int(11) NOT NULL,
  `rank` tinyint(4) NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dts_user_type`
--

INSERT INTO `dts_user_type` (`id`, `rank`, `name`) VALUES
(1, 1, 'Super System Administrator'),
(2, 2, 'System Administrator'),
(3, 3, 'Timekeeper');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
