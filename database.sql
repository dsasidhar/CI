-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.17 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for visualtracker
DROP DATABASE IF EXISTS `visualtracker`;
CREATE DATABASE IF NOT EXISTS `visualtracker` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `visualtracker`;


-- Dumping structure for table visualtracker.bug
DROP TABLE IF EXISTS `bug`;
CREATE TABLE IF NOT EXISTS `bug` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `testcaseid` int(11) DEFAULT NULL,
  `name` varchar(95) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `status` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bug_tcid_idx` (`testcaseid`),
  CONSTRAINT `fk_bug_tcid` FOREIGN KEY (`testcaseid`) REFERENCES `testcase` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visualtracker.bug: ~0 rows (approximately)
DELETE FROM `bug`;
/*!40000 ALTER TABLE `bug` DISABLE KEYS */;
/*!40000 ALTER TABLE `bug` ENABLE KEYS */;


-- Dumping structure for table visualtracker.projects
DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `releaseid` varchar(45) DEFAULT NULL,
  `startdate` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table visualtracker.projects: ~1 rows (approximately)
DELETE FROM `projects`;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` (`id`, `name`, `description`, `releaseid`, `startdate`, `enddate`) VALUES
	(1, 'Project1', 'some description', '1212', '2014-02-10 00:00:00', '2014-02-12 00:00:00');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;


-- Dumping structure for table visualtracker.requirementgroup
DROP TABLE IF EXISTS `requirementgroup`;
CREATE TABLE IF NOT EXISTS `requirementgroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `parentid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_rg_project_idx` (`pid`),
  CONSTRAINT `fk_rg_project` FOREIGN KEY (`pid`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table visualtracker.requirementgroup: ~0 rows (approximately)
DELETE FROM `requirementgroup`;
/*!40000 ALTER TABLE `requirementgroup` DISABLE KEYS */;
INSERT INTO `requirementgroup` (`id`, `pid`, `name`, `parentid`) VALUES
	(1, 1, 'Functional Requirements', 0),
	(2, 1, 'Non Functional Req', 0),
	(3, 1, 'Security Req', 1),
	(4, 1, 'Styling Req', 1),
	(5, 1, 'Networking Req', 1),
	(6, 1, 'User Experience Req', 2),
	(7, 1, 'Cross browser req', 2),
	(8, 1, 'Database Req', 3);
/*!40000 ALTER TABLE `requirementgroup` ENABLE KEYS */;


-- Dumping structure for table visualtracker.requirements
DROP TABLE IF EXISTS `requirements`;
CREATE TABLE IF NOT EXISTS `requirements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rgid` int(11) DEFAULT NULL,
  `name` varchar(225) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `type` varchar(75) DEFAULT NULL,
  `priority` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_r_rg_idx` (`rgid`),
  CONSTRAINT `fk_r_rg` FOREIGN KEY (`rgid`) REFERENCES `requirementgroup` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table visualtracker.requirements: ~0 rows (approximately)
DELETE FROM `requirements`;
/*!40000 ALTER TABLE `requirements` DISABLE KEYS */;
INSERT INTO `requirements` (`id`, `rgid`, `name`, `description`, `type`, `priority`) VALUES
	(1, 8, 'SQL Intrusion', 'Prevention against  SQL intrusion', '1', 'high');
/*!40000 ALTER TABLE `requirements` ENABLE KEYS */;


-- Dumping structure for table visualtracker.sprint
DROP TABLE IF EXISTS `sprint`;
CREATE TABLE IF NOT EXISTS `sprint` (
  `id` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `name` varchar(225) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `startdate` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sprint_project_idx` (`pid`),
  CONSTRAINT `fk_pid_sprint` FOREIGN KEY (`pid`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visualtracker.sprint: ~0 rows (approximately)
DELETE FROM `sprint`;
/*!40000 ALTER TABLE `sprint` DISABLE KEYS */;
/*!40000 ALTER TABLE `sprint` ENABLE KEYS */;


-- Dumping structure for table visualtracker.testcase
DROP TABLE IF EXISTS `testcase`;
CREATE TABLE IF NOT EXISTS `testcase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) DEFAULT NULL,
  `name` varchar(225) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `expectedinput` varchar(1000) DEFAULT NULL,
  `expectedoutput` varchar(1000) DEFAULT NULL,
  `observedoutput` varchar(1000) DEFAULT NULL,
  `runby` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_testccase_idx` (`runby`),
  KEY `fk_rid_testcase_idx` (`rid`),
  CONSTRAINT `fk_rid_testcase` FOREIGN KEY (`rid`) REFERENCES `requirements` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_testccase` FOREIGN KEY (`runby`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visualtracker.testcase: ~0 rows (approximately)
DELETE FROM `testcase`;
/*!40000 ALTER TABLE `testcase` DISABLE KEYS */;
/*!40000 ALTER TABLE `testcase` ENABLE KEYS */;


-- Dumping structure for table visualtracker.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(95) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `usertype` varchar(95) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Username_UNIQUE` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table visualtracker.user: ~0 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `Username`, `password`, `usertype`) VALUES
	(1, 'sasi', 'sasi', 'admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Dumping structure for table visualtracker.version
DROP TABLE IF EXISTS `version`;
CREATE TABLE IF NOT EXISTS `version` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `name` varchar(225) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `releaseId` varchar(45) DEFAULT NULL,
  `startdate` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_version_project_idx` (`pid`),
  CONSTRAINT `fk_version_project` FOREIGN KEY (`pid`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visualtracker.version: ~0 rows (approximately)
DELETE FROM `version`;
/*!40000 ALTER TABLE `version` DISABLE KEYS */;
/*!40000 ALTER TABLE `version` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
