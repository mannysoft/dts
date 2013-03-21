-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2013 at 11:05 AM
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
-- Table structure for table `dts_documents`
--

CREATE TABLE IF NOT EXISTS `dts_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tracking_no` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'should be user id',
  `office_id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `doctype_id` int(11) NOT NULL,
  `actions_needed` varchar(128) NOT NULL COMMENT 'like follow up, appropriate actions',
  `remarks` varchar(64) NOT NULL,
  `allow_track` enum('yes','no') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `finish` tinyint(1) NOT NULL COMMENT 'tell if the documents is finish',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dts_documents`
--

INSERT INTO `dts_documents` (`id`, `tracking_no`, `user_id`, `office_id`, `title`, `doctype_id`, `actions_needed`, `remarks`, `allow_track`, `created_at`, `updated_at`, `finish`) VALUES
(1, 'fdfd', 1, 19, 'fdfd', 7, '["1"]', 'fdfdfd', 'yes', '2013-03-21 01:01:43', '2013-03-21 01:01:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dts_doc_types`
--

CREATE TABLE IF NOT EXISTS `dts_doc_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `dts_doc_types`
--

INSERT INTO `dts_doc_types` (`id`, `name`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Memorandum Order', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(2, 'Purchase Request', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(3, 'Procurement Request', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(4, 'Payroll', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(5, 'Request Letter', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(6, 'Voucher', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(7, 'Cash Advance', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active');

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
  `time_out` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_received` int(11) NOT NULL,
  `user_release` int(11) NOT NULL,
  `remarks` varchar(256) NOT NULL,
  `release_to` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dts_histories`
--

INSERT INTO `dts_histories` (`id`, `doc_id`, `office_id`, `station_id`, `user_id`, `action`, `date_time`, `time_out`, `created_at`, `updated_at`, `user_received`, `user_release`, `remarks`, `release_to`) VALUES
(1, '1', 19, 1, 1, 'created', '2013-03-21 09:03:43', NULL, '2013-03-21 01:01:43', '2013-03-21 01:01:43', 0, 0, '', '');

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
  `name` varchar(128) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `dts_offices`
--

INSERT INTO `dts_offices` (`id`, `name`, `status`) VALUES
(1, 'Provincial Attorneys Office', 'active'),
(2, 'Board Secretary Office', 'active'),
(3, 'Environment & Natural Resources Office', 'active'),
(4, 'Office of the Provincial Agriculturist (FAES)', 'active'),
(5, 'Food Always In The Home', 'active'),
(6, 'General Cailles Memorial Hospital', 'active'),
(7, 'Office of the Governor', 'active'),
(8, 'General Services Office', 'active'),
(9, 'History Arts and Culture Office', 'active'),
(10, 'Human Resource Management Office', 'active'),
(11, 'International Relations and Trade Office', 'active'),
(12, 'JP Rizal Memorial Hospital', 'active'),
(13, 'Laguna Chest Center', 'active'),
(14, 'Luisiana District Hospital', 'active'),
(15, 'Laguna Provincial Jail', 'active'),
(16, 'Legal Services Office', 'active'),
(17, 'Laguna Traffic Management Office', 'active'),
(18, 'Moral Development Program & Womens Desk', 'active'),
(19, 'Management Information System Office', 'active'),
(20, 'Majayjay Medicare Hospital', 'active'),
(21, 'Nagcarlan District Hospital', 'active'),
(22, 'Office of the Provincial Administrator', 'active'),
(23, 'Provincial Accounting Office', 'active'),
(24, 'Provincial Assessors Office', 'active'),
(25, 'Provincial Budget Office', 'active'),
(26, 'Planning & Development Coordinating Office', 'active'),
(27, 'Provincial Engineering Office', 'active'),
(28, 'Provincial Health Office', 'active'),
(29, 'Provincial Information Office', 'active'),
(30, 'Provincial Library', 'active'),
(31, 'Provincial Nutrition Office', 'active'),
(32, 'Provincial Peace and Order Office', 'active'),
(33, 'Provincial Population Office (Clinical)', 'active'),
(34, 'Provincial Population Office (Outreach)', 'active'),
(35, 'Provincial Social Welfare & Development Office', 'active'),
(36, 'Provincial Treasurers Office', 'active'),
(37, 'Provincial Tourism Office', 'active'),
(38, 'Provincial Veterenarians Office', 'active'),
(39, 'Provincial Waterworks Office', 'active'),
(40, 'Sectoral Concern Office', 'active'),
(41, 'Sports and Games Development Office', 'active'),
(42, 'Special Livelihood Office', 'active'),
(43, 'San Pedro Municipal Hospital', 'active'),
(44, 'Urban Development and Housing Office', 'active'),
(45, 'Vice-Governor Office', 'active'),
(46, 'Youth Development Affairs Office', 'active'),
(47, 'Provincial Urban Development and Housing Office', 'active'),
(48, 'Pagamutang Pangmasa ng Laguna - Bay', 'active'),
(49, 'Panlalawigang Pagamutan ng Laguna - SPC', 'active');

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
-- Table structure for table `dts_stations`
--

CREATE TABLE IF NOT EXISTS `dts_stations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `office_id` int(11) DEFAULT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(256) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `dts_stations`
--

INSERT INTO `dts_stations` (`id`, `office_id`, `name`, `description`, `status`) VALUES
(1, 19, 'Admin Section', 'Admin Section', 'active'),
(2, 25, 'Receiving', 'Receiving', 'active'),
(3, 25, 'Record/Encode', 'Record/Encode', 'active'),
(4, 25, 'Review/Initial', 'Review/Initial', 'active'),
(5, 25, 'Budget Officer', 'Budget Officer', 'active'),
(6, 8, 'Receiving', 'Receiving', 'active'),
(7, 8, 'Recording/ Window', 'Recording/ Window', 'active'),
(8, 8, 'Canvasser', 'Canvasser', 'active'),
(9, 8, 'Procurement Head', 'Procurement Head', 'active'),
(10, 8, 'Asst. GSO', 'Asst. GSO', 'active'),
(11, 8, 'GSO Chief', 'GSO Chief', 'active'),
(12, 23, 'Receiving ', ' Receiving ', 'active'),
(13, 23, 'Recording', 'Recording', 'active'),
(14, 23, 'Index', 'Index', 'active'),
(15, 23, 'Analyst', 'Analyst', 'active'),
(16, 23, 'Head Analyst', 'Head Analyst', 'active'),
(17, 23, 'Prov''l Accountant', 'Prov''l Accountant', 'active'),
(18, 7, 'Receiving', 'Receiving', 'active'),
(19, 7, 'Recording', 'Recording', 'active'),
(20, 7, 'Encode', 'Encode', 'active'),
(21, 7, 'Admin. Head', 'Admin. Head', 'active'),
(22, 7, 'Administrator', 'Administrator', 'active'),
(23, 7, 'Local Chief Executive', 'Local Chief Executive', 'active'),
(24, 36, 'Receiving', ' Receiving ', 'active'),
(25, 36, 'Recording', 'Recording', 'active'),
(26, 36, 'Encode', 'Encode', 'active'),
(27, 36, 'Asst. P.T', 'Asst. P.T', 'active'),
(28, 36, 'Prov''l Treasurer', 'Prov''l Treasurer', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `dts_time_alloted`
--

CREATE TABLE IF NOT EXISTS `dts_time_alloted` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `station_id` int(11) NOT NULL,
  `doctype_id` int(11) NOT NULL,
  `minutes` double NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dts_time_alloted`
--

INSERT INTO `dts_time_alloted` (`id`, `station_id`, `doctype_id`, `minutes`, `status`) VALUES
(1, 19, 1, 15, 'active');

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
  `group_id` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `FK_tbl_user_1` (`station_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `dts_users`
--

INSERT INTO `dts_users` (`id`, `username`, `password`, `fname`, `mname`, `lname`, `station_id`, `office_id`, `group_id`, `status`) VALUES
(1, 'mannysoft', '$2a$08$OG5kSlV3V2R0bDZmWkNKVOzlNH0zZ7jxC3XsNt4CPkBr72SufNKGG', 'Manny', 'H', 'Isles', 1, 19, 1, 'active'),
(5, 'chat', '$2a$08$OG5kSlV3V2R0bDZmWkNKVOzlNH0zZ7jxC3XsNt4CPkBr72SufNKGG', 'chat', 'l', 'perez', 1, 8, 1, 'active');

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
