-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2015 at 04:19 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rcadedb2`
--
CREATE DATABASE IF NOT EXISTS `rcadedb2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rcadedb2`;

-- --------------------------------------------------------

--
-- Table structure for table `courseassignment`
--

CREATE TABLE IF NOT EXISTS `courseassignment` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `courseID` int(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;


--
-- Table structure for table `coursetable`
--

CREATE TABLE IF NOT EXISTS `coursetable` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `overview` text NOT NULL,
  `reviewref` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--

--
-- Table structure for table `informationitems`
--

CREATE TABLE IF NOT EXISTS `informationitems` (
  `infoItemID` int(10) NOT NULL AUTO_INCREMENT,
  `itemTitle` text NOT NULL,
  `itemContent` text NOT NULL,
  `infoId` int(10) NOT NULL,
  PRIMARY KEY (`infoItemID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- --------------------------------------------------------

--
-- Table structure for table `informationtable`
--

CREATE TABLE IF NOT EXISTS `informationtable` (
  `infoId` int(10) NOT NULL AUTO_INCREMENT,
  `problemId` int(10) NOT NULL,
  `infocatagory` text NOT NULL,
  PRIMARY KEY (`infoId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--

--
-- Table structure for table `mediaareadefs`
--

CREATE TABLE IF NOT EXISTS `mediaareadefs` (
  `moduleDefId` int(10) NOT NULL AUTO_INCREMENT,
  `moduleDef` varchar(255) NOT NULL,
  PRIMARY KEY (`moduleDefId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--

-- --------------------------------------------------------

--
-- Table structure for table `mediatable`
--

CREATE TABLE IF NOT EXISTS `mediatable` (
  `mediaId` int(10) NOT NULL AUTO_INCREMENT,
  `problemId` int(10) NOT NULL,
  `moduleId` int(10) NOT NULL,
  `mediaTitle` varchar(255) NOT NULL,
  `mediaDesc` text NOT NULL,
  `mediaFileName` varchar(255) NOT NULL,
  `mediaFileType` varchar(4) NOT NULL,
  `mediaFileSize` varchar(9) NOT NULL,
  PRIMARY KEY (`mediaId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--

--
-- Table structure for table `notestable`
--

CREATE TABLE IF NOT EXISTS `notestable` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `userId` int(9) NOT NULL,
  `problemId` int(9) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- --------------------------------------------------------

--
-- Table structure for table `problemstatus`
--

CREATE TABLE IF NOT EXISTS `problemstatus` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `userId` int(9) NOT NULL,
  `problemId` int(9) NOT NULL,
  `problemStat` int(9) NOT NULL DEFAULT '0',
  `courseID` int(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
----

--
-- Table structure for table `problemtable`
--

CREATE TABLE IF NOT EXISTS `problemtable` (
  `problemId` int(10) NOT NULL AUTO_INCREMENT,
  `problemTitle` varchar(255) NOT NULL,
  `courseId` int(10) NOT NULL,
  PRIMARY KEY (`problemId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--


--
-- Table structure for table `reflectionprompttable`
--

CREATE TABLE IF NOT EXISTS `reflectionprompttable` (
  `reflectId` int(10) NOT NULL AUTO_INCREMENT,
  `problemId` int(10) NOT NULL,
  `relfectionPrompt` text NOT NULL,
  PRIMARY KEY (`reflectId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--

--
-- Table structure for table `summarytable`
--

CREATE TABLE IF NOT EXISTS `summarytable` (
  `summaryId` int(10) NOT NULL AUTO_INCREMENT,
  `problemId` int(10) NOT NULL,
  `sumaryTextLong` text NOT NULL,
  `sumaryTextShort` text NOT NULL,
  PRIMARY KEY (`summaryId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--


--
-- Table structure for table `surveyitems`
--

CREATE TABLE IF NOT EXISTS `surveyitems` (
  `id` int(10) NOT NULL,
  `itemName` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--


--
-- Table structure for table `testanswers`
--

CREATE TABLE IF NOT EXISTS `testanswers` (
  `testAnswersId` int(10) NOT NULL AUTO_INCREMENT,
  `testQuestId` int(10) NOT NULL,
  `multipleChoiceSelections` text NOT NULL,
  `value` int(9) NOT NULL,
  PRIMARY KEY (`testAnswersId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=187 ;

--
-- --------------------------------------------------------

--
-- Table structure for table `testquestionstable`
--

CREATE TABLE IF NOT EXISTS `testquestionstable` (
  `testQuestId` int(10) NOT NULL AUTO_INCREMENT,
  `problemId` int(10) NOT NULL,
  `testQuestion` text NOT NULL,
  `questionFormat` varchar(255) NOT NULL,
  `questionAnswer` text NOT NULL,
  PRIMARY KEY (`testQuestId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--


--
-- Table structure for table `useragreement`
--

CREATE TABLE IF NOT EXISTS `useragreement` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `statement` int(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
--
-- Table structure for table `useridtable`
--

CREATE TABLE IF NOT EXISTS `useridtable` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--

--
-- Table structure for table `userreflection`
--

CREATE TABLE IF NOT EXISTS `userreflection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `problemid` int(10) NOT NULL,
  `reflectiontext` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--

-- --------------------------------------------------------

--
-- Table structure for table `usersolution`
--

CREATE TABLE IF NOT EXISTS `usersolution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `problemid` int(10) NOT NULL,
  `solutionText` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--

-- --------------------------------------------------------

--
-- Table structure for table `usertestanswers`
--

CREATE TABLE IF NOT EXISTS `usertestanswers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `problemid` int(10) NOT NULL,
  `score` int(10) NOT NULL,
  `answerset` text NOT NULL,
  `timestamp` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- --------------------------------------------------------

--
-- Table structure for table `usertimetable`
--

CREATE TABLE IF NOT EXISTS `usertimetable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `courseid` int(10) NOT NULL,
  `placement` varchar(255) NOT NULL,
  `timestamp` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=874 ;

--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
