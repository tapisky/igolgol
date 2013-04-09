-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2013 at 08:23 AM
-- Server version: 5.5.30
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `igolgolc_goals`
--
CREATE DATABASE `igolgolc_goals` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `igolgolc_goals`;

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

DROP TABLE IF EXISTS `clubs`;
CREATE TABLE IF NOT EXISTS `clubs` (
  `idclubs` int(11) NOT NULL AUTO_INCREMENT,
  `club_name` varchar(45) CHARACTER SET latin1 NOT NULL,
  `logo` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `website` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `address` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idclubs`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`idclubs`, `club_name`, `logo`, `website`, `active`, `address`) VALUES
(1, 'De Meer n', 'de meer.jpg', 'http://www.demeertennis.nl/', 1, 'Drie Burgpad 9, Amsterdam'),
(2, 'Swift 9 ', NULL, NULL, 1, NULL),
(3, 'Weesp 4', NULL, NULL, 1, NULL),
(4, 'Victoria 3', NULL, NULL, 1, NULL),
(5, 'ZRC/H 2', NULL, NULL, 1, NULL),
(6, 'SDZ 5', NULL, NULL, 1, 'Transformatorweg 10, Amsterdam'),
(7, '''t Gooi 5', NULL, NULL, 1, NULL),
(8, 'Waterwijk 4', NULL, NULL, 1, NULL),
(9, 'Volewijckers 3', NULL, NULL, 1, NULL),
(10, 'NVC 4', NULL, NULL, 1, NULL),
(11, 'Slotern/Rivalen 3', NULL, NULL, 1, NULL),
(12, 'BVV ''31 4', NULL, NULL, 1, NULL),
(13, 'Arsenal 6', NULL, NULL, 1, NULL),
(14, 'De Meer 5', 'de meer.jpg', 'http://www.svdemeer.nl/voetbal/', 1, 'Drie Burgpad 9, Amsterdam'),
(15, 'Arsenal ASV 6', NULL, NULL, 1, ' IJsbaanpad 50, Amsterdam'),
(16, 'GeuzenMmeer 3', NULL, NULL, 1, 'Voorlandpad 15, Amsterdam'),
(17, 'IVV 3', NULL, NULL, 1, NULL),
(18, 'JOS Watergraafsmeer 5', NULL, NULL, 1, 'Drie Burgpad 3, Amsterdam'),
(19, 'Overamstel 3', NULL, NULL, 1, 'Radioweg 65, Amsterdam'),
(20, 'SDZ 4', NULL, NULL, 1, NULL),
(21, 'Swift 8', NULL, NULL, 1, NULL),
(22, 'Tos Actief 3', NULL, NULL, 1, 'Radioweg 63, Amsterdam'),
(23, 'Eendracht 82 4', NULL, NULL, 1, 'Bok de Korverweg 1, Amsterdam'),
(25, 'Weesp FC 4', NULL, NULL, 1, NULL),
(28, 'Geinburgia 3', NULL, NULL, 1, 'Dotterbloemstraat 1, Nieuw-Vennep, Nederland'),
(29, 'Germaan De 3', NULL, NULL, 1, 'Bok de Korverweg 1, Amsterdam'),
(30, 'GeuzenMmeer 2', NULL, NULL, 1, 'Voorlandpad 15, Amsterdam');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `idcountries` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(45) NOT NULL,
  PRIMARY KEY (`idcountries`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`idcountries`, `country_name`) VALUES
(1, 'España'),
(2, 'Nederlands');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

DROP TABLE IF EXISTS `divisions`;
CREATE TABLE IF NOT EXISTS `divisions` (
  `iddivisions` int(11) NOT NULL AUTO_INCREMENT,
  `division_name` varchar(45) NOT NULL,
  `regionid` int(11) NOT NULL,
  `countryid` int(11) NOT NULL,
  PRIMARY KEY (`iddivisions`,`regionid`,`countryid`),
  KEY `fk_divisions_regions` (`regionid`,`countryid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`iddivisions`, `division_name`, `regionid`, `countryid`) VALUES
(1, 'Primera de Aficionados', 1, 1),
(2, 'Segunda de Aficionados', 1, 1),
(3, 'Tercera de Aficionados', 1, 1),
(4, 'Reserve 5e Klasse', 2, 2),
(5, 'Zondag Reserve 5e Klasse', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `divisions_have_groups`
--

DROP TABLE IF EXISTS `divisions_have_groups`;
CREATE TABLE IF NOT EXISTS `divisions_have_groups` (
  `divisionid` int(11) NOT NULL,
  `regionid` int(11) NOT NULL,
  `countryid` int(11) NOT NULL,
  `groupid` int(11) NOT NULL,
  `clubid` int(11) NOT NULL,
  PRIMARY KEY (`divisionid`,`regionid`,`countryid`,`groupid`,`clubid`),
  KEY `fk_divisions_has_groups_divisions` (`divisionid`,`regionid`,`countryid`),
  KEY `fk_divisions_has_groups_groups` (`groupid`),
  KEY `fk_divisions_has_groups_clubs` (`clubid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisions_have_groups`
--

INSERT INTO `divisions_have_groups` (`divisionid`, `regionid`, `countryid`, `groupid`, `clubid`) VALUES
(4, 2, 2, 12, 1),
(4, 2, 2, 12, 2),
(4, 2, 2, 12, 3),
(4, 2, 2, 12, 4),
(4, 2, 2, 12, 5),
(4, 2, 2, 12, 7),
(4, 2, 2, 12, 8),
(4, 2, 2, 12, 9),
(4, 2, 2, 12, 10),
(4, 2, 2, 12, 11),
(4, 2, 2, 12, 12),
(4, 2, 2, 12, 13),
(5, 2, 2, 13, 6),
(5, 2, 2, 13, 14),
(5, 2, 2, 13, 15),
(5, 2, 2, 13, 18),
(5, 2, 2, 13, 19),
(5, 2, 2, 13, 22),
(5, 2, 2, 13, 23),
(5, 2, 2, 13, 28),
(5, 2, 2, 13, 29),
(5, 2, 2, 13, 30);

-- --------------------------------------------------------

--
-- Table structure for table `fixtures`
--

DROP TABLE IF EXISTS `fixtures`;
CREATE TABLE IF NOT EXISTS `fixtures` (
  `fix_number` int(11) NOT NULL,
  `fix_season` varchar(9) NOT NULL,
  `fix_date` date NOT NULL,
  `fix_time` varchar(5) NOT NULL,
  `fix_club_home` int(11) NOT NULL,
  `fix_club_away` int(11) NOT NULL,
  `fix_country` int(11) NOT NULL,
  `fix_region` int(11) NOT NULL,
  `fix_division` int(11) NOT NULL,
  `fix_group` int(11) NOT NULL,
  `fix_goals_home` int(11) DEFAULT NULL,
  `fix_goals_away` int(11) DEFAULT NULL,
  PRIMARY KEY (`fix_number`,`fix_season`,`fix_date`,`fix_time`,`fix_club_home`,`fix_club_away`,`fix_country`,`fix_region`,`fix_division`,`fix_group`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fixtures`
--

INSERT INTO `fixtures` (`fix_number`, `fix_season`, `fix_date`, `fix_time`, `fix_club_home`, `fix_club_away`, `fix_country`, `fix_region`, `fix_division`, `fix_group`, `fix_goals_home`, `fix_goals_away`) VALUES
(2, '2011/2012', '2011-09-25', '10:00', 6, 14, 2, 2, 5, 13, 5, 2),
(3, '2011/2012', '2011-10-02', '11:30', 30, 14, 2, 2, 5, 13, 0, 3),
(4, '2011/2012', '2011-10-09', '12:00', 14, 15, 2, 2, 5, 13, 1, 3),
(5, '2011/2012', '2011-10-16', '12:00', 19, 14, 2, 2, 5, 13, 6, 1),
(6, '2011/2012', '2011-10-30', '13:00', 14, 28, 2, 2, 5, 13, 1, 5),
(7, '2011/2012', '2011-11-20', '11:30', 14, 23, 2, 2, 5, 13, 2, 2),
(8, '2011/2012', '2011-11-27', '12:00', 22, 14, 2, 2, 5, 13, 6, 3),
(9, '2011/2012', '2011-12-04', '12:00', 14, 6, 2, 2, 5, 13, 6, 0),
(10, '2011/2012', '2011-12-11', '14:30', 23, 14, 2, 2, 5, 13, 6, 1),
(11, '2011/2012', '2012-01-29', '12:00', 14, 30, 2, 2, 5, 13, 1, 3),
(12, '2011/2012', '2012-02-26', '12:00', 14, 19, 2, 2, 5, 13, 0, 3),
(13, '2011/2012', '2012-03-18', '12:00', 14, 22, 2, 2, 5, 13, 2, 5),
(14, '2011/2012', '2012-03-25', '14:30', 28, 14, 2, 2, 5, 13, 3, 0),
(15, '2011/2012', '2012-04-01', '12:00', 15, 14, 2, 2, 5, 13, 2, 1),
(17, '2011/2012', '2012-04-22', '12:00', 14, 15, 2, 2, 5, 13, 3, 4),
(18, '2011/2012', '2012-04-29', '12:00', 14, 22, 2, 2, 5, 13, 1, 6),
(19, '2011/2012', '2012-05-06', '14:30', 23, 14, 2, 2, 5, 13, 2, 0),
(20, '2011/2012', '2012-05-13', '14:30', 28, 14, 2, 2, 5, 13, 0, 0),
(1, '2012/2013', '2012-09-23', '9:30', 14, 18, 2, 2, 5, 13, 1, 6),
(2, '2012/2013', '2012-09-30', '14:30', 30, 14, 2, 2, 5, 13, 2, 6),
(3, '2012/2013', '2012-10-07', '13:00', 14, 6, 2, 2, 5, 13, 2, 3),
(4, '2012/2013', '2012-10-14', '12:00', 23, 14, 2, 2, 5, 13, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

DROP TABLE IF EXISTS `goals`;
CREATE TABLE IF NOT EXISTS `goals` (
  `idgoals` int(11) NOT NULL AUTO_INCREMENT,
  `season` varchar(45) NOT NULL,
  `fixture_num` int(11) DEFAULT NULL,
  `goal_date` date NOT NULL,
  `goal_type` varchar(45) NOT NULL,
  `video_link` varchar(100) DEFAULT NULL,
  `num_hits` int(11) DEFAULT NULL,
  `rate` float DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `goals_home` smallint(6) DEFAULT NULL,
  `goals_away` smallint(6) DEFAULT NULL,
  `num_rate` int(11) DEFAULT NULL,
  `scorerid` int(11) NOT NULL,
  `scorer_clubid` int(11) NOT NULL,
  `assisterid` int(11) NOT NULL,
  `away_clubid` int(11) DEFAULT NULL,
  `home_clubid` int(11) DEFAULT NULL,
  `minute` int(11) NOT NULL DEFAULT '0',
  `country` int(11) NOT NULL,
  `region` int(11) NOT NULL,
  `division` int(11) NOT NULL,
  `groupid` int(11) NOT NULL,
  PRIMARY KEY (`idgoals`,`userid`,`scorerid`,`assisterid`),
  KEY `fk_goals_users` (`userid`),
  KEY `fk_goals_players` (`scorerid`),
  KEY `fk_goals_players1` (`assisterid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`idgoals`, `season`, `fixture_num`, `goal_date`, `goal_type`, `video_link`, `num_hits`, `rate`, `userid`, `goals_home`, `goals_away`, `num_rate`, `scorerid`, `scorer_clubid`, `assisterid`, `away_clubid`, `home_clubid`, `minute`, `country`, `region`, `division`, `groupid`) VALUES
(1, '2009/2010', 1, '2009-09-13', 'left_foot', '', 1, NULL, 1, 1, 0, NULL, 43, 1, 30, 5, 1, 11, 2, 2, 4, 12),
(2, '2009/2010', 1, '2009-09-13', 'volley', '', 1, NULL, 1, 2, 0, NULL, 42, 1, 30, 5, 1, 19, 2, 2, 4, 12),
(3, '2009/2010', 1, '2009-09-13', 'right_foot', '', 1, NULL, 1, 3, 0, NULL, 42, 1, 37, 5, 1, 40, 2, 2, 4, 12),
(4, '2009/2010', 1, '2009-09-13', 'right_foot', '', 1, NULL, 1, 4, 0, NULL, 37, 1, 30, 5, 1, 55, 2, 2, 4, 12),
(5, '2009/2010', 1, '2009-09-13', 'header', '', 1, NULL, 1, 5, 3, NULL, 44, 1, 37, 5, 1, 83, 2, 2, 4, 12),
(6, '2009/2010', 2, '2009-09-20', 'header', '', 1, NULL, 1, 0, 1, NULL, 37, 1, 38, 1, 4, 5, 2, 2, 4, 12),
(7, '2009/2010', 2, '2009-09-20', 'header', '', 1, NULL, 1, 7, 3, NULL, 37, 1, 38, 1, 4, 85, 2, 2, 4, 12),
(8, '2009/2010', 2, '2009-09-20', 'right_foot', '', 1, NULL, 1, 5, 2, NULL, 50, 1, 37, 1, 4, 50, 2, 2, 4, 12),
(9, '2009/2010', 3, '2009-09-27', 'header', '', 1, NULL, 1, 1, 1, NULL, 37, 1, 30, 10, 1, 15, 2, 2, 4, 12),
(10, '2009/2010', 3, '2009-02-27', 'right_foot', '', 1, NULL, 1, 3, 1, NULL, 44, 1, 50, 10, 1, 30, 2, 2, 4, 12),
(11, '2009/2010', 3, '2009-09-27', 'right_foot', '', 1, NULL, 1, 4, 1, NULL, 50, 1, 30, 10, 1, 40, 2, 2, 4, 12),
(12, '2009/2010', 3, '2009-09-27', 'right_foot', '', 1, NULL, 1, 5, 4, NULL, 37, 1, 30, 10, 1, 77, 2, 2, 4, 12),
(13, '2009/2010', 3, '2009-09-27', 'left_foot', '', 1, NULL, 1, 2, 1, NULL, 44, 1, 42, 10, 1, 21, 2, 2, 4, 12),
(14, '2009/2010', 4, '2009-10-04', 'right_foot', '', 1, NULL, 1, 0, 1, NULL, 44, 1, 37, 1, 9, 10, 2, 2, 4, 12),
(15, '2009/2010', 4, '2009-10-04', 'right_foot', '', 1, NULL, 1, 0, 2, NULL, 37, 1, 44, 1, 9, 15, 2, 2, 4, 12),
(16, '2009/2010', 4, '2009-10-04', 'right_foot', '', 1, NULL, 1, 2, 3, NULL, 37, 1, 30, 1, 9, 82, 2, 2, 4, 12),
(17, '2009/2010', 5, '2009-10-11', 'left_foot', '', 1, NULL, 1, 2, 1, NULL, 37, 1, 30, 2, 1, 30, 2, 2, 4, 12),
(18, '2009/2010', 6, '2009-10-18', 'right_foot', '', 1, NULL, 1, 0, 1, NULL, 37, 1, 48, 1, 11, 10, 2, 2, 4, 12),
(19, '2009/2010', 6, '2009-10-18', 'right_foot', '', 1, NULL, 1, 0, 2, NULL, 37, 1, 30, 1, 11, 55, 2, 2, 4, 12),
(20, '2009/2010', 6, '2009-10-18', 'right_foot', '', 1, NULL, 1, 0, 3, NULL, 37, 1, 48, 1, 11, 70, 2, 2, 4, 12),
(21, '2009/2010', 5, '2009-10-11', 'right_foot', '', 1, NULL, 1, 2, 0, NULL, 48, 1, 30, 2, 1, 43, 2, 2, 4, 12),
(22, '2009/2010', 7, '2009-11-01', 'knee', '', 1, NULL, 1, 1, 0, NULL, 38, 1, 30, 10, 1, 20, 2, 2, 4, 12),
(23, '2009/2010', 7, '2009-11-01', 'right_foot', '', 1, NULL, 1, 2, 2, NULL, 37, 1, 30, 10, 1, 50, 2, 2, 4, 12),
(24, '2009/2010', 7, '2009-11-01', 'right_foot', '', 1, NULL, 1, 3, 2, NULL, 37, 1, 35, 10, 1, 64, 2, 2, 4, 12),
(25, '2009/2010', 7, '2009-11-01', 'left_foot', '', 1, NULL, 1, 4, 4, NULL, 37, 1, 35, 10, 1, 89, 2, 2, 4, 12),
(26, '2009/2010', 8, '2009-11-08', 'right_foot', '', 1, NULL, 1, 2, 1, NULL, 32, 1, 38, 1, 3, 52, 2, 2, 4, 12),
(27, '2009/2010', 9, '2009-11-15', 'right_foot', '', 1, NULL, 1, 1, 0, NULL, 37, 1, 41, 9, 1, 9, 2, 2, 4, 12),
(28, '2009/2010', 9, '2009-11-15', 'right_foot', '', 1, NULL, 1, 2, 0, NULL, 37, 1, 30, 9, 1, 12, 2, 2, 4, 12),
(29, '2009/2010', 9, '2009-11-15', 'right_foot', '', 1, NULL, 1, 3, 0, NULL, 37, 1, 42, 9, 1, 30, 2, 2, 4, 12),
(30, '2009/2010', 9, '2009-11-15', 'right_foot', '', 1, NULL, 1, 4, 0, NULL, 42, 1, 44, 9, 1, 41, 2, 2, 4, 12),
(31, '2009/2010', 9, '2009-11-15', 'right_foot', '', 1, NULL, 1, 5, 0, NULL, 42, 1, 30, 9, 1, 65, 2, 2, 4, 12),
(32, '2009/2010', 9, '2009-11-15', 'right_foot', '', 1, NULL, 1, 7, 0, NULL, 41, 1, 37, 9, 1, 85, 2, 2, 4, 12),
(33, '2009/2010', 10, '2009-11-22', 'right_foot', '', 1, NULL, 1, 1, 0, NULL, 37, 1, 41, 1, 6, 6, 2, 2, 4, 12),
(34, '2009/2010', 10, '2009-11-22', 'right_foot', '', 1, NULL, 1, 0, 2, NULL, 37, 1, 30, 1, 6, 15, 2, 2, 4, 12),
(35, '2009/2010', 10, '2009-11-22', 'right_foot', '', 1, NULL, 1, 0, 3, NULL, 41, 1, 37, 1, 6, 53, 2, 2, 4, 12),
(36, '2009/2010', 11, '2009-11-29', 'right_foot', '', 1, NULL, 1, 1, 2, NULL, 37, 1, 44, 13, 1, 58, 2, 2, 4, 12),
(37, '2009/2010', 10, '2009-11-22', 'right_foot', '', 1, NULL, 1, 0, 3, NULL, 44, 1, 30, 1, 6, 55, 2, 2, 4, 12),
(38, '2009/2010', 10, '2009-11-22', 'left_foot', '', 1, NULL, 1, 0, 4, NULL, 44, 1, 30, 1, 6, 60, 2, 2, 4, 12),
(39, '2009/2010', 12, '2009-12-06', 'right_foot', '', 1, NULL, 1, 0, 1, NULL, 37, 1, 51, 1, 13, 15, 2, 2, 4, 12),
(40, '2009/2010', 12, '2009-12-06', 'right_foot', '', 1, NULL, 1, 0, 2, NULL, 41, 1, 30, 1, 13, 28, 2, 2, 4, 12),
(41, '2009/2010', 12, '2009-12-06', 'right_foot', '', 1, NULL, 1, 0, 3, NULL, 51, 1, 30, 1, 13, 41, 2, 2, 4, 12),
(42, '2009/2010', 12, '2009-12-06', 'right_foot', '', 1, NULL, 1, 1, 4, NULL, 37, 1, 52, 1, 13, 70, 2, 2, 4, 12),
(43, '2009/2010', 12, '2009-12-06', 'right_foot', '', 1, NULL, 1, 2, 5, NULL, 44, 1, 37, 1, 13, 83, 2, 2, 4, 12),
(44, '2009/2010', 13, '2009-12-13', 'right_foot', '', 1, NULL, 1, 1, 1, NULL, 37, 1, 48, 8, 1, 60, 2, 2, 4, 12),
(45, '2009/2010', 14, '2010-02-28', 'right_foot', '', 2, NULL, 1, 2, 1, NULL, 50, 1, 30, 1, 10, 30, 2, 2, 4, 12),
(46, '2009/2010', 14, '2010-02-28', 'right_foot', '', 1, NULL, 1, 4, 2, NULL, 37, 1, 39, 1, 10, 77, 2, 2, 4, 12),
(47, '2009/2010', 15, '2010-03-07', 'right_foot', '', 1, NULL, 1, 1, 0, NULL, 42, 1, 41, 13, 1, 10, 2, 2, 4, 12),
(48, '2009/2010', 15, '2010-03-07', 'right_foot', '', 1, NULL, 1, 2, 1, NULL, 52, 1, 30, 13, 1, 68, 2, 2, 4, 12),
(49, '2009/2010', 15, '2010-03-07', 'fk', '', 1, NULL, 1, 3, 1, NULL, 37, 1, 30, 13, 1, 85, 2, 2, 4, 12),
(50, '2009/2010', 16, '2010-03-14', 'right_foot', '', 1, NULL, 1, 0, 1, NULL, 41, 1, 30, 1, 12, 20, 2, 2, 4, 12),
(51, '2009/2010', 16, '2010-03-14', 'right_foot', '', 1, NULL, 1, 0, 2, NULL, 37, 1, 41, 1, 12, 36, 2, 2, 4, 12),
(52, '2009/2010', 16, '2010-03-14', 'right_foot', '', 1, NULL, 1, 2, 3, NULL, 41, 1, 30, 1, 12, 55, 2, 2, 4, 12),
(53, '2009/2010', 17, '2010-03-21', 'right_foot', '', 1, NULL, 1, 0, 1, NULL, 41, 1, 42, 1, 2, 28, 2, 2, 4, 12),
(54, '2009/2010', 17, '2010-03-21', 'right_foot', '', 1, NULL, 1, 0, 2, NULL, 37, 1, 34, 1, 2, 43, 2, 2, 4, 12),
(55, '2009/2010', 17, '2010-03-21', 'right_foot', '', 1, NULL, 1, 0, 3, NULL, 42, 1, 37, 1, 2, 75, 2, 2, 4, 12),
(56, '2009/2010', 17, '2010-03-21', 'right_foot', NULL, NULL, NULL, 1, 0, 4, NULL, 41, 1, 30, 9, 1, 45, 2, 2, 4, 12),
(57, '2009/2010', 17, '2010-03-21', 'right_foot', NULL, NULL, NULL, 1, 0, 5, NULL, 41, 1, 30, 9, 1, 60, 2, 2, 4, 12),
(58, '2010/2011', 1, '2010-09-12', 'right_foot', '', 1, NULL, 1, 3, 2, NULL, 37, 14, 31, 14, 16, 67, 2, 2, 5, 13),
(59, '2010/2011', 2, '2010-09-19', 'right_foot', '', 1, NULL, 1, 2, 1, NULL, 57, 14, 30, 14, 15, 35, 2, 2, 5, 13),
(60, '2010/2011', 3, '2010-09-26', 'right_foot', '', 1, NULL, 1, 3, 0, NULL, 55, 14, 38, 22, 14, 74, 2, 2, 5, 13),
(61, '2010/2011', 4, '2010-10-03', 'right_foot', '', 1, NULL, 1, 1, 2, NULL, 31, 14, 31, 14, 22, 30, 2, 2, 5, 13),
(62, '2010/2011', 5, '2010-10-10', 'left_foot', '', 1, NULL, 1, 1, 1, NULL, 38, 14, 30, 20, 14, 30, 2, 2, 5, 13),
(63, '2010/2011', 5, '2010-10-10', 'right_foot', '', 1, NULL, 1, 2, 1, NULL, 44, 14, 42, 20, 14, 55, 2, 2, 5, 13),
(64, '2010/2011', 7, '2010-10-31', 'right_foot', '', 1, NULL, 1, 1, 0, NULL, 44, 14, 30, 25, 14, 75, 2, 2, 5, 13),
(65, '2010/2011', 11, '2010-11-21', 'right_foot', '', 1, NULL, 1, 1, 1, NULL, 37, 14, 30, 14, 18, 37, 2, 2, 5, 13),
(66, '2010/2011', 11, '2010-11-21', 'right_foot', '', 1, NULL, 1, 1, 2, NULL, 50, 14, 42, 14, 18, 70, 2, 2, 5, 13),
(67, '2010/2011', 12, '2011-01-16', 'right_foot', '', 1, NULL, 1, 1, 1, NULL, 56, 14, 30, 14, 21, 10, 2, 2, 5, 13),
(68, '2010/2011', 12, '2011-01-16', 'left_foot', '', 1, NULL, 1, 4, 2, NULL, 55, 14, 37, 14, 21, 40, 2, 2, 5, 13),
(69, '2010/2011', 23, '2011-01-23', 'right_foot', '', 1, NULL, 1, 1, 0, NULL, 31, 14, 57, 19, 14, 10, 2, 2, 5, 13),
(70, '2010/2011', 13, '2011-01-23', 'right_foot', '', 1, NULL, 1, 2, 3, NULL, 42, 14, 38, 19, 14, 54, 2, 2, 5, 13),
(71, '2010/2011', 13, '2011-01-23', 'pk', '', 1, NULL, 1, 3, 3, NULL, 42, 14, 30, 19, 14, 70, 2, 2, 5, 13),
(72, '2010/2011', 13, '2011-01-23', 'left_foot', '', 1, NULL, 1, 4, 3, NULL, 42, 14, 30, 19, 14, 75, 2, 2, 5, 13),
(73, '2010/2011', 14, '2011-02-06', 'left_foot', '', 1, NULL, 1, 0, 1, NULL, 38, 14, 30, 14, 15, 20, 2, 2, 5, 13),
(74, '2010/2011', 14, '2011-02-06', 'right_foot', '', 1, NULL, 1, 1, 2, NULL, 38, 14, 30, 14, 15, 80, 2, 2, 5, 13),
(75, '2010/2011', 17, '2011-02-20', 'right_foot', '', 1, NULL, 1, 1, 0, NULL, 42, 14, 30, 22, 14, 37, 2, 2, 5, 13),
(76, '2010/2011', 20, '2011-05-01', 'right_foot', '', 1, NULL, 1, 6, 1, NULL, 55, 14, 30, 14, 19, 90, 2, 2, 5, 13),
(77, '2011/2012', 2, '2011-09-25', 'right_foot', '', 0, NULL, 1, 0, 0, NULL, 60, 14, 30, 14, 6, 0, 2, 2, 5, 13),
(78, '2011/2012', 2, '2011-09-25', 'right_foot', '', 0, NULL, 1, 0, 0, NULL, 37, 14, 30, 14, 6, 0, 2, 2, 5, 13),
(79, '2011/2012', 4, '2011-10-09', 'right_foot', '', 0, NULL, 1, 0, 0, NULL, 55, 14, 38, 15, 14, 0, 2, 2, 5, 13),
(80, '2011/2012', 5, '2011-10-16', 'right_foot', '', 0, NULL, 1, 0, 0, NULL, 62, 14, 38, 14, 19, 0, 2, 2, 5, 13),
(82, '2011/2012', 6, '2011-10-30', 'right_foot', '', 0, NULL, 1, 0, 0, NULL, 62, 14, 38, 28, 14, 0, 2, 2, 5, 13),
(83, '2011/2012', 7, '2011-11-20', 'right_foot', '', 0, NULL, 1, 0, 0, NULL, 72, 14, 30, 23, 14, 0, 2, 2, 5, 13),
(84, '2011/2012', 7, '2011-11-20', 'pk', '', 0, NULL, 1, 0, 0, NULL, 72, 14, 30, 23, 14, 0, 2, 2, 5, 13),
(85, '2011/2012', 8, '2011-11-27', 'right_foot', '', 0, NULL, 1, 0, 0, NULL, 73, 14, 50, 14, 22, 0, 2, 2, 5, 13),
(86, '2011/2012', 8, '2011-11-27', 'right_foot', '', 0, NULL, 1, 0, 0, NULL, 37, 14, 73, 14, 22, 0, 2, 2, 5, 13),
(87, '2011/2012', 8, '2011-11-27', 'right_foot', '', 0, NULL, 1, 0, 0, NULL, 73, 14, 37, 14, 22, 0, 2, 2, 5, 13),
(88, '2011/2012', 9, '2011-12-04', 'right_foot', '', 0, NULL, 1, 0, 0, NULL, 73, 14, 56, 6, 14, 0, 2, 2, 5, 13),
(89, '2011/2012', 9, '2011-12-04', 'right_foot', '', 0, NULL, 1, 0, 0, NULL, 73, 14, 30, 6, 14, 0, 2, 2, 5, 13),
(90, '2011/2012', 9, '2011-12-04', 'right_foot', '', 0, NULL, 1, 0, 0, NULL, 38, 14, 50, 6, 14, 0, 2, 2, 5, 13),
(91, '2011/2012', 9, '2011-12-04', 'right_foot', '', 0, NULL, 1, 0, 0, NULL, 62, 14, 31, 6, 14, 0, 2, 2, 5, 13),
(92, '2011/2012', 9, '2011-12-04', 'right_foot', '', 0, NULL, 1, 0, 0, NULL, 62, 14, 50, 6, 14, 0, 2, 2, 5, 13),
(93, '2011/2012', 9, '2011-12-04', 'right_foot', '', 0, NULL, 1, 0, 0, NULL, 62, 14, 56, 6, 14, 0, 2, 2, 5, 13),
(94, '2011/2012', 10, '2011-12-11', 'right_foot', '', 0, NULL, 1, 0, 0, NULL, 57, 14, 56, 14, 23, 0, 2, 2, 5, 13),
(95, '2011/2012', 11, '2012-01-29', 'left_foot', '', 0, NULL, 1, 0, 0, NULL, 59, 14, 50, 30, 14, 0, 2, 2, 5, 13),
(96, '2011/2012', 13, '2012-03-18', 'header', '', 0, NULL, 1, 0, 0, NULL, 41, 14, 30, 22, 14, 0, 2, 2, 5, 13),
(97, '2011/2012', 15, '2012-04-01', 'header', '', 0, NULL, 1, 0, 0, NULL, 57, 14, 30, 14, 15, 0, 2, 2, 5, 13),
(98, '2011/2012', 17, '2012-04-22', 'right_foot', '', 0, NULL, 1, 0, 0, NULL, 73, 14, 69, 15, 14, 0, 2, 2, 5, 13),
(99, '2011/2012', 18, '2012-04-29', 'right_foot', '', 0, NULL, 1, 0, 0, NULL, 68, 14, 31, 22, 14, 0, 2, 2, 5, 13),
(100, '2012/2013', 1, '2012-09-23', 'right_foot', '', 0, NULL, 1, 0, 0, NULL, 79, 14, 30, 18, 14, 0, 2, 2, 5, 13),
(101, '2012/2013', 3, '2012-10-07', 'left_foot', '', 0, NULL, 1, 0, 0, NULL, 57, 14, 30, 6, 14, 0, 2, 2, 5, 13);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `idgroups` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idgroups`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`idgroups`, `group_name`) VALUES
(1, 'Grupo 1'),
(2, 'Grupo 2'),
(3, 'Grupo 3'),
(4, 'Grupo 4'),
(5, 'Grupo 5'),
(6, 'Grupo 6'),
(7, 'Grupo 7'),
(8, 'Grupo 8'),
(9, 'Grupo 9'),
(10, 'Grupo 10'),
(11, 'Grupo 11'),
(12, 'West1'),
(13, '08');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `idplayers` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `last_name` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `gender` varchar(1) CHARACTER SET latin1 NOT NULL,
  `nationality` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `birth_date` date NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `stronger_foot` varchar(3) CHARACTER SET latin1 NOT NULL,
  `position` varchar(50) CHARACTER SET latin1 NOT NULL,
  `picture` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `clubid` int(11) DEFAULT NULL,
  PRIMARY KEY (`idplayers`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=86 ;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`idplayers`, `first_name`, `last_name`, `gender`, `nationality`, `birth_date`, `height`, `weight`, `stronger_foot`, `position`, `picture`, `clubid`) VALUES
(30, 'empty', 'empty', 'M', 'España', '2009-09-15', 170, 65, 'r', 'gk', NULL, NULL),
(31, 'Jose Carlos', 'Tapiador', 'M', 'España', '1979-10-01', 173, 69, 'lr', 'dm', '14-1317429233-31.jpg', 14),
(32, 'Ruben', 'Presencio', 'M', 'España', '1980-01-01', 180, 74, 'r', 'df', 'rubenp.jpg', 14),
(33, 'Ruben', 'Benito', 'M', 'España', '1982-01-01', 176, 90, 'r', 'gk', '', NULL),
(34, 'Taoufiq', 'Qyes', 'M', 'Morocco', '1978-01-01', 175, 75, 'r', 'cb', 'taoufiq.jpg', 14),
(35, 'Pablo', 'Willems Ramirez', 'M', 'Netherlands', '1975-01-01', 180, 78, 'r', 'df', 'pablo.jpg', NULL),
(36, 'Marcel', 'Griffioen', 'M', 'Netherlands', '1976-01-01', 178, 75, 'r', 'rb', 'marcel.jpg', NULL),
(37, 'Paulo', 'Fernando', 'M', 'Brazil', '1982-02-22', 178, 82, 'lr', 'at', 'paulo.jpg', 14),
(38, 'Carlos', 'Almanza', 'M', 'Bolivia', '1983-01-01', 166, 68, 'r', 'cm', '14-1319756834-38.jpg', 14),
(39, 'Diego', 'Labajos', 'M', 'España', '1979-12-15', 173, 70, 'r', 'cm', 'diego_Labajos.jpg', NULL),
(40, 'Carlos', 'Gonzalez', 'M', 'España', '1978-01-01', 178, 70, 'r', 'cb', 'carlosg.jpg', 14),
(41, 'Richard', 'Cordiner', 'M', 'Scotland', '1980-01-01', 174, 72, 'r', 'lm', '14-1317291770-41.jpg', 14),
(42, 'Jean Michel', 'Miolard', 'M', 'France', '1982-01-01', 175, 75, 'r', 'am', 'jeanmichel.jpg', 0),
(43, 'Miguel', 'Ferreira', 'M', 'Portugal', '1978-01-01', 182, 72, 'r', 'lw', 'miguel.jpg', NULL),
(44, 'Kweku', 'Blay', 'M', 'Ghana', '1976-09-14', 175, 68, 'r', 'rw', 'kweku.jpg', NULL),
(45, 'Luciano', 'Mazzeo', 'M', 'Argentina', '1977-01-01', 167, 73, 'r', 'lb', '', NULL),
(46, 'Alvaro', 'Lema', 'M', 'Ecuador', '1980-01-01', 175, 72, 'r', 'am', '', NULL),
(47, 'Andrea', 'Desole', 'M', 'Italy', '1973-01-01', 180, 83, 'r', 'cm', '', NULL),
(48, 'Jair', 'van Kruijsdijk', 'M', 'Netherlands', '1980-01-01', 177, 75, 'r', 'cm', '', NULL),
(49, 'Koen', 'Withagen', 'M', 'Netherlands', '1980-01-01', 175, 75, 'r', 'cm', '', NULL),
(50, 'Emre', 'Tan', 'M', 'Turkey', '1980-09-10', 171, 69, 'l', 'cm', 'emre.jpg', 14),
(51, 'Hoessein', 'Ait Balla', 'M', 'Morocco', '1980-01-01', 170, 75, 'r', 'rm', 'hoessein.jpg', NULL),
(52, 'Sadik', 'Tetouan', 'M', 'Morocco', '1980-01-01', 170, 78, 'r', 'dm', 'sadik.jpg', NULL),
(53, 'Hakim', 'Amrani', 'M', 'Morocco', '1980-01-01', 168, 70, 'lr', 'lb', NULL, NULL),
(54, 'Mark', 'Barriscale', 'M', 'Ireland', '1977-03-09', 185, 80, 'r', 'gk', '14-1317291127-54.jpg', 14),
(55, 'Lawrence', 'Jennings', 'M', 'England', '1985-08-21', 182, 70, 'r', 'rm', '14-1316644191-55.jpg', 14),
(56, 'Jerome', 'Bigio', 'M', 'France', '1978-03-18', 180, 72, 'r', 'dm', '14-1317291296-56.jpg', 14),
(57, 'Marc', 'Zech', 'M', 'Germany', '1980-08-21', 185, 85, 'r', 'am', '14-1317291673-57.jpg', 14),
(58, 'Colm', 'De Barra', 'M', 'England', '1985-08-21', 169, 72, 'r', 'rb', NULL, NULL),
(59, 'Felix', 'Cabrera', 'M', 'Bolivia', '1982-08-01', 175, 65, 'l', 'cm', NULL, 0),
(60, 'Rodolfo', 'Fuentes', 'M', 'Bolivia', '1985-08-21', 178, 80, 'r', 'at', NULL, 0),
(61, 'Miguel', 'Hernandez', 'M', 'Bolivia', '1985-08-21', 175, 77, 'r', 'rb', NULL, 0),
(62, 'Stefano', 'Bongiorno', 'M', 'Italy', '1987-10-17', 177, 75, 'r', 'am', '14-1322403365-62.jpg', 0),
(63, 'Stephane', 'Hareau', 'M', 'France', '1985-08-21', 175, 70, 'r', 'cm', NULL, 0),
(64, 'Matthew', 'Cordiner', 'M', 'Scotland', '1982-01-01', 175, 73, 'lr', 'lb', '14-1321817175-64.jpg', 14),
(66, 'Thomas', 'Paterson', 'M', 'Scotland', '1988-02-24', 180, 85, 'r', 'df', '14-1316643983-66.jpg', 0),
(67, 'German', 'Costa', 'M', 'España', '1982-01-01', 168, 73, 'r', 'df', '14-1316642983-67.jpg', 0),
(68, 'Girts', 'Aleksans', 'M', 'Latvia', '1984-10-10', 176, 70, 'r', 'am', '14-1317289474-68.jpg', 0),
(69, 'Stefano', 'Petracca', 'M', 'Italy', '1983-01-01', 170, 74, 'r', 'dm', '14-1318606148-69.jpg', 0),
(70, 'Alessandro', 'Petracca', 'M', 'Italy', '1980-01-01', 175, 73, 'r', 'df', '14-1318606133-70.jpg', 0),
(71, 'Mick', 'Walsh', 'M', 'England', '1983-07-06', 182, 76, 'r', 'df', '14-1321817190-71.jpg', 14),
(72, 'James', 'Clark', 'M', 'England', '1985-07-09', 172, 70, 'r', 'cm', '14-1321817159-72.jpg', 14),
(73, 'Alberto', 'Jose', 'M', 'España', '1988-11-15', 169, 69, 'r', 'am', '14-1322940030-73.jpg', 14),
(74, 'Thomas', 'Howze', 'M', 'United States', '1975-01-01', 177, 75, 'r', 'gk', '14-1323253046-74.jpg', 0),
(75, 'Darren', 'McKoy', 'M', 'England', '1985-01-01', 180, 75, 'r', 'cm', '', 14),
(76, 'Leo', 'van der Weijden', 'M', 'Netherlands', '1982-01-01', 182, 77, 'r', 'cm', '', 14),
(77, 'Friso', 'Copier', 'M', 'Netherlands', '1978-01-01', 185, 84, 'r', 'at', '', 14),
(78, 'Luca', 'Caris', 'M', 'Netherlands', '1980-01-01', 180, 77, 'r', 'cm', '', 14),
(79, 'Dirk', 'van der Straaten', 'M', 'Netherlands', '1979-01-01', 178, 75, 'r', 'cm', '', 14),
(80, 'Thijs', 'van der Wal', 'M', 'Netherlands', '1980-01-01', 179, 75, 'l', 'cm', '', 14),
(81, 'Ruud', 'Groot', 'M', 'Netherlands', '1981-01-01', 179, 74, 'r', 'cm', '', 14),
(82, 'Paul', 'Martin', 'M', 'Canada', '1983-01-01', 176, 70, 'r', 'rb', '', 14),
(83, 'Mark', 'Compier', 'M', 'Nehterlands', '1979-01-01', 178, 74, 'r', 'cm', '', 14),
(84, 'Patrick', 'Pillar', 'M', 'England', '1986-01-01', 178, 70, 'r', 'cm', '', 14),
(85, 'Paul', 'Harrison', 'M', 'United Kingdom', '1982-01-01', 185, 85, 'r', 'rb', '', 14);

-- --------------------------------------------------------

--
-- Table structure for table `players_have_clean_sheet`
--

DROP TABLE IF EXISTS `players_have_clean_sheet`;
CREATE TABLE IF NOT EXISTS `players_have_clean_sheet` (
  `player_id` int(11) NOT NULL,
  `clubid` int(11) NOT NULL,
  `season` varchar(9) NOT NULL,
  `fixture_num` int(11) NOT NULL,
  PRIMARY KEY (`player_id`,`season`,`clubid`,`fixture_num`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players_have_clean_sheet`
--

INSERT INTO `players_have_clean_sheet` (`player_id`, `clubid`, `season`, `fixture_num`) VALUES
(31, 14, '2011/2012', 9),
(31, 14, '2011/2012', 20),
(40, 14, '2011/2012', 9),
(40, 14, '2011/2012', 20),
(55, 14, '2011/2012', 9),
(56, 14, '2011/2012', 9),
(64, 14, '2011/2012', 20),
(66, 14, '2011/2012', 9),
(71, 14, '2011/2012', 9),
(74, 14, '2011/2012', 9);

-- --------------------------------------------------------

--
-- Table structure for table `players_have_played_games`
--

DROP TABLE IF EXISTS `players_have_played_games`;
CREATE TABLE IF NOT EXISTS `players_have_played_games` (
  `player_id` int(11) NOT NULL,
  `clubid` int(11) NOT NULL,
  `season` varchar(9) NOT NULL,
  `fixture_num` int(11) NOT NULL,
  PRIMARY KEY (`player_id`,`season`,`clubid`,`fixture_num`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players_have_played_games`
--

INSERT INTO `players_have_played_games` (`player_id`, `clubid`, `season`, `fixture_num`) VALUES
(31, 14, '2011/2012', 3),
(31, 14, '2011/2012', 4),
(31, 14, '2011/2012', 5),
(31, 14, '2011/2012', 6),
(31, 14, '2011/2012', 7),
(31, 14, '2011/2012', 8),
(31, 14, '2011/2012', 9),
(31, 14, '2011/2012', 11),
(31, 14, '2011/2012', 12),
(31, 14, '2011/2012', 13),
(31, 14, '2011/2012', 17),
(31, 14, '2011/2012', 18),
(31, 14, '2011/2012', 19),
(31, 14, '2011/2012', 20),
(34, 14, '2011/2012', 7),
(34, 14, '2011/2012', 18),
(34, 14, '2011/2012', 19),
(34, 14, '2012/2013', 1),
(37, 14, '2011/2012', 2),
(37, 14, '2011/2012', 3),
(37, 14, '2011/2012', 7),
(37, 14, '2011/2012', 8),
(38, 14, '2011/2012', 2),
(38, 14, '2011/2012', 3),
(38, 14, '2011/2012', 4),
(38, 14, '2011/2012', 5),
(38, 14, '2011/2012', 6),
(38, 14, '2011/2012', 7),
(38, 14, '2011/2012', 8),
(38, 14, '2011/2012', 9),
(38, 14, '2011/2012', 11),
(38, 14, '2011/2012', 12),
(38, 14, '2011/2012', 13),
(38, 14, '2011/2012', 15),
(38, 14, '2011/2012', 17),
(38, 14, '2011/2012', 18),
(38, 14, '2011/2012', 19),
(38, 14, '2011/2012', 20),
(40, 14, '2011/2012', 3),
(40, 14, '2011/2012', 4),
(40, 14, '2011/2012', 6),
(40, 14, '2011/2012', 7),
(40, 14, '2011/2012', 8),
(40, 14, '2011/2012', 9),
(40, 14, '2011/2012', 11),
(40, 14, '2011/2012', 12),
(40, 14, '2011/2012', 13),
(40, 14, '2011/2012', 17),
(40, 14, '2011/2012', 18),
(40, 14, '2011/2012', 19),
(40, 14, '2011/2012', 20),
(41, 14, '2011/2012', 2),
(41, 14, '2011/2012', 3),
(41, 14, '2011/2012', 4),
(41, 14, '2011/2012', 5),
(41, 14, '2011/2012', 6),
(41, 14, '2011/2012', 7),
(41, 14, '2011/2012', 8),
(41, 14, '2011/2012', 10),
(41, 14, '2011/2012', 11),
(41, 14, '2011/2012', 12),
(41, 14, '2011/2012', 13),
(41, 14, '2011/2012', 15),
(41, 14, '2011/2012', 17),
(41, 14, '2011/2012', 19),
(50, 14, '2011/2012', 2),
(50, 14, '2011/2012', 3),
(50, 14, '2011/2012', 5),
(50, 14, '2011/2012', 6),
(50, 14, '2011/2012', 8),
(50, 14, '2011/2012', 9),
(50, 14, '2011/2012', 10),
(50, 14, '2011/2012', 11),
(50, 14, '2011/2012', 12),
(50, 14, '2011/2012', 13),
(50, 14, '2011/2012', 15),
(50, 14, '2011/2012', 18),
(50, 14, '2011/2012', 19),
(54, 14, '2011/2012', 2),
(54, 14, '2011/2012', 3),
(54, 14, '2011/2012', 4),
(54, 14, '2011/2012', 6),
(54, 14, '2011/2012', 7),
(54, 14, '2011/2012', 10),
(54, 14, '2011/2012', 11),
(54, 14, '2011/2012', 12),
(54, 14, '2011/2012', 15),
(54, 14, '2011/2012', 17),
(54, 14, '2011/2012', 18),
(54, 14, '2011/2012', 19),
(55, 14, '2011/2012', 3),
(55, 14, '2011/2012', 4),
(55, 14, '2011/2012', 5),
(55, 14, '2011/2012', 6),
(55, 14, '2011/2012', 7),
(55, 14, '2011/2012', 8),
(55, 14, '2011/2012', 9),
(55, 14, '2011/2012', 10),
(55, 14, '2011/2012', 11),
(55, 14, '2011/2012', 12),
(55, 14, '2011/2012', 13),
(55, 14, '2011/2012', 15),
(55, 14, '2011/2012', 19),
(56, 14, '2011/2012', 2),
(56, 14, '2011/2012', 5),
(56, 14, '2011/2012', 6),
(56, 14, '2011/2012', 8),
(56, 14, '2011/2012', 9),
(56, 14, '2011/2012', 10),
(56, 14, '2011/2012', 11),
(56, 14, '2011/2012', 12),
(56, 14, '2011/2012', 17),
(56, 14, '2011/2012', 19),
(57, 14, '2011/2012', 2),
(57, 14, '2011/2012', 3),
(57, 14, '2011/2012', 4),
(57, 14, '2011/2012', 5),
(57, 14, '2011/2012', 6),
(57, 14, '2011/2012', 7),
(57, 14, '2011/2012', 8),
(57, 14, '2011/2012', 9),
(57, 14, '2011/2012', 10),
(57, 14, '2011/2012', 12),
(57, 14, '2011/2012', 15),
(57, 14, '2011/2012', 17),
(57, 14, '2011/2012', 18),
(57, 14, '2011/2012', 19),
(57, 14, '2012/2013', 1),
(59, 14, '2011/2012', 2),
(59, 14, '2011/2012', 3),
(59, 14, '2011/2012', 4),
(60, 14, '2011/2012', 2),
(60, 14, '2011/2012', 3),
(60, 14, '2011/2012', 4),
(60, 14, '2011/2012', 6),
(62, 14, '2011/2012', 2),
(62, 14, '2011/2012', 3),
(62, 14, '2011/2012', 4),
(62, 14, '2011/2012', 5),
(62, 14, '2011/2012', 6),
(62, 14, '2011/2012', 8),
(62, 14, '2011/2012', 9),
(62, 14, '2011/2012', 10),
(62, 14, '2011/2012', 11),
(64, 14, '2011/2012', 2),
(64, 14, '2011/2012', 4),
(64, 14, '2011/2012', 5),
(64, 14, '2011/2012', 6),
(64, 14, '2011/2012', 7),
(64, 14, '2011/2012', 8),
(64, 14, '2011/2012', 10),
(64, 14, '2011/2012', 11),
(64, 14, '2011/2012', 12),
(64, 14, '2011/2012', 15),
(64, 14, '2011/2012', 19),
(64, 14, '2011/2012', 20),
(66, 14, '2011/2012', 2),
(66, 14, '2011/2012', 3),
(66, 14, '2011/2012', 4),
(66, 14, '2011/2012', 5),
(66, 14, '2011/2012', 6),
(66, 14, '2011/2012', 8),
(66, 14, '2011/2012', 9),
(66, 14, '2011/2012', 10),
(67, 14, '2011/2012', 2),
(67, 14, '2011/2012', 4),
(69, 14, '2011/2012', 3),
(69, 14, '2011/2012', 5),
(69, 14, '2011/2012', 6),
(69, 14, '2011/2012', 10),
(69, 14, '2011/2012', 11),
(69, 14, '2011/2012', 12),
(69, 14, '2011/2012', 13),
(69, 14, '2011/2012', 17),
(69, 14, '2011/2012', 18),
(69, 14, '2011/2012', 19),
(69, 14, '2011/2012', 20),
(70, 14, '2011/2012', 3),
(70, 14, '2011/2012', 6),
(70, 14, '2011/2012', 7),
(70, 14, '2011/2012', 10),
(70, 14, '2011/2012', 11),
(70, 14, '2011/2012', 13),
(70, 14, '2011/2012', 19),
(70, 14, '2011/2012', 20),
(71, 14, '2011/2012', 7),
(71, 14, '2011/2012', 9),
(71, 14, '2011/2012', 10),
(71, 14, '2011/2012', 13),
(72, 14, '2011/2012', 7),
(72, 14, '2011/2012', 10),
(73, 14, '2011/2012', 6),
(73, 14, '2011/2012', 8),
(73, 14, '2011/2012', 9),
(73, 14, '2011/2012', 10),
(73, 14, '2011/2012', 17),
(74, 14, '2011/2012', 8),
(74, 14, '2011/2012', 9),
(75, 14, '2012/2013', 1),
(76, 14, '2012/2013', 1),
(78, 14, '2012/2013', 1),
(79, 14, '2012/2013', 1),
(80, 14, '2012/2013', 1),
(82, 14, '2012/2013', 1),
(85, 14, '2012/2013', 1);

-- --------------------------------------------------------

--
-- Table structure for table `players_have_tr_att`
--

DROP TABLE IF EXISTS `players_have_tr_att`;
CREATE TABLE IF NOT EXISTS `players_have_tr_att` (
  `player_id` int(11) NOT NULL,
  `season` varchar(9) NOT NULL,
  `attendance` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`player_id`,`season`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players_have_tr_att`
--

INSERT INTO `players_have_tr_att` (`player_id`, `season`, `attendance`) VALUES
(31, '2010/2011', 37),
(54, '2010/2011', 20),
(40, '2010/2011', 17),
(53, '2010/2011', 0),
(55, '2010/2011', 42),
(58, '2010/2011', 4),
(32, '2010/2011', 10),
(38, '2010/2011', 21),
(39, '2010/2011', 11),
(41, '2010/2011', 34),
(42, '2010/2011', 11),
(50, '2010/2011', 37),
(52, '2010/2011', 1),
(56, '2010/2011', 26),
(57, '2010/2011', 42),
(37, '2010/2011', 6),
(43, '2010/2011', 0),
(44, '2010/2011', 3),
(54, '2011/2012', 12),
(31, '2011/2012', 24),
(40, '2011/2012', 9),
(53, '2011/2012', 0),
(55, '2011/2012', 26),
(58, '2011/2012', 0),
(32, '2011/2012', 0),
(38, '2011/2012', 4),
(39, '2011/2012', 0),
(41, '2011/2012', 21),
(42, '2011/2012', 1),
(50, '2011/2012', 22),
(52, '2011/2012', 0),
(56, '2011/2012', 14),
(57, '2011/2012', 27),
(37, '2011/2012', 1),
(44, '2011/2012', 0),
(34, '2011/2012', 15),
(61, '2011/2012', 3),
(59, '2011/2012', 4),
(62, '2011/2012', 14),
(63, '2011/2012', 1),
(60, '2011/2012', 8),
(64, '2011/2012', 18),
(65, '2011/2012', 0),
(68, '2011/2012', 4),
(66, '2011/2012', 9),
(67, '2011/2012', 8),
(70, '2011/2012', 15),
(69, '2011/2012', 12),
(71, '2011/2012', 6),
(72, '2011/2012', 5),
(73, '2011/2012', 12),
(74, '2011/2012', 1),
(54, '2012/2013', 0),
(74, '2012/2013', 0),
(34, '2012/2013', 1),
(40, '2012/2013', 0),
(61, '2012/2013', 0),
(64, '2012/2013', 0),
(66, '2012/2013', 0),
(67, '2012/2013', 0),
(70, '2012/2013', 0),
(71, '2012/2013', 0),
(31, '2012/2013', 0),
(38, '2012/2013', 0),
(41, '2012/2013', 1),
(50, '2012/2013', 1),
(55, '2012/2013', 0),
(56, '2012/2013', 1),
(57, '2012/2013', 1),
(59, '2012/2013', 0),
(62, '2012/2013', 0),
(68, '2012/2013', 0),
(69, '2012/2013', 0),
(72, '2012/2013', 0),
(73, '2012/2013', 0),
(37, '2012/2013', 0),
(60, '2012/2013', 0),
(32, '2012/2013', 0),
(82, '2012/2013', 1),
(75, '2012/2013', 0),
(76, '2012/2013', 0),
(78, '2012/2013', 1),
(79, '2012/2013', 0),
(80, '2012/2013', 1),
(81, '2012/2013', 0),
(83, '2012/2013', 0),
(77, '2012/2013', 0),
(84, '2012/2013', 0),
(85, '2012/2013', 1);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
CREATE TABLE IF NOT EXISTS `regions` (
  `idregion` int(11) NOT NULL AUTO_INCREMENT,
  `region_name` varchar(45) NOT NULL,
  `countryid` int(11) NOT NULL,
  PRIMARY KEY (`idregion`,`countryid`),
  KEY `fk_regions_countries` (`countryid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`idregion`, `region_name`, `countryid`) VALUES
(1, 'FF de Madrid', 1),
(2, 'Amsterdam', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idusers` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL,
  `email` varchar(60) NOT NULL,
  `type` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `clubid` int(11) NOT NULL,
  PRIMARY KEY (`idusers`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idusers`, `username`, `password`, `email`, `type`, `active`, `clubid`) VALUES
(1, 'tapi', 'Tomtom01', 'a@b.c', 2, 1, 0),
(2, 'bochelord', 'Tomtom01', 'bochelord@hotmail.com', 1, 1, 14),
(3, 'demeer', 'Demeer01', '', 1, 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `users_have_clubs`
--

DROP TABLE IF EXISTS `users_have_clubs`;
CREATE TABLE IF NOT EXISTS `users_have_clubs` (
  `userid` int(11) NOT NULL,
  `clubid` int(11) NOT NULL,
  PRIMARY KEY (`userid`,`clubid`),
  KEY `fk_users_has_clubs_users` (`userid`),
  KEY `fk_users_has_clubs_clubs` (`clubid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_have_players`
--

DROP TABLE IF EXISTS `users_have_players`;
CREATE TABLE IF NOT EXISTS `users_have_players` (
  `userid` int(11) NOT NULL,
  `playerid` int(11) NOT NULL,
  PRIMARY KEY (`userid`,`playerid`),
  KEY `fk_users_has_players_users` (`userid`),
  KEY `fk_users_has_players_players` (`playerid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_have_players`
--

INSERT INTO `users_have_players` (`userid`, `playerid`) VALUES
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 42),
(2, 43),
(2, 44),
(2, 45),
(2, 46),
(2, 47),
(2, 48),
(2, 49);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `divisions`
--
ALTER TABLE `divisions`
  ADD CONSTRAINT `fk_divisions_regions` FOREIGN KEY (`regionid`, `countryid`) REFERENCES `regions` (`idregion`, `countryid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `goals`
--
ALTER TABLE `goals`
  ADD CONSTRAINT `fk_goals_players` FOREIGN KEY (`scorerid`) REFERENCES `players` (`idplayers`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_goals_players1` FOREIGN KEY (`assisterid`) REFERENCES `players` (`idplayers`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_goals_users` FOREIGN KEY (`userid`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `fk_regions_countries` FOREIGN KEY (`countryid`) REFERENCES `countries` (`idcountries`) ON DELETE NO ACTION ON UPDATE NO ACTION;