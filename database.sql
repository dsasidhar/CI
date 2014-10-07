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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table visualtracker.projects: ~2 rows (approximately)
DELETE FROM `projects`;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` (`id`, `name`, `description`, `releaseid`, `startdate`, `enddate`) VALUES
	(1, 'sample1', 'sample', '123', '2014-12-12 00:00:00', '2015-12-12 00:00:00'),
	(2, 'sample2', 'sample2', '1234', '2014-12-12 00:00:00', '2015-12-12 00:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Dumping data for table visualtracker.requirementgroup: ~11 rows (approximately)
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
	(8, 1, 'Database Req', 3),
	(12, 1, 'Limiting Req', 8),
	(13, 1, 'My Req', 8),
	(14, 1, 'Internal Networking Requirements', 5);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table visualtracker.requirements: ~3 rows (approximately)
DELETE FROM `requirements`;
/*!40000 ALTER TABLE `requirements` DISABLE KEYS */;
INSERT INTO `requirements` (`id`, `rgid`, `name`, `description`, `type`, `priority`) VALUES
	(1, 8, 'SQL Intrusion', 'Prevention against  SQL intrusion', '1', '2'),
	(4, 4, 'Company Logo', 'Display LOGO ..', '1', '3'),
	(5, 8, 'Trial Req', 'asdf', '0', '1');
/*!40000 ALTER TABLE `requirements` ENABLE KEYS */;


-- Dumping structure for table visualtracker.sprint
DROP TABLE IF EXISTS `sprint`;
CREATE TABLE IF NOT EXISTS `sprint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `name` varchar(225) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `startdate` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sprint_project_idx` (`pid`),
  CONSTRAINT `fk_pid_sprint` FOREIGN KEY (`pid`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table visualtracker.sprint: ~5 rows (approximately)
DELETE FROM `sprint`;
/*!40000 ALTER TABLE `sprint` DISABLE KEYS */;
INSERT INTO `sprint` (`id`, `pid`, `name`, `description`, `startdate`, `enddate`) VALUES
	(1, 1, 's1', 's1', '1212-12-12 00:00:00', '1213-12-12 00:00:00'),
	(2, 1, 'samples', 'asd', '1212-02-12 00:00:00', '1212-12-12 00:00:00'),
	(3, 2, 'S1', 'asd', '1212-12-12 00:00:00', '1212-12-12 00:00:00'),
	(4, 2, 'asd', 'asd', '1212-12-12 00:00:00', '1212-12-12 00:00:00'),
	(5, 2, 'dsa', 'dsa', '1212-12-12 00:00:00', '1212-12-12 00:00:00');
/*!40000 ALTER TABLE `sprint` ENABLE KEYS */;


-- Dumping structure for table visualtracker.testcase
DROP TABLE IF EXISTS `testcase`;
CREATE TABLE IF NOT EXISTS `testcase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `expectedinput` varchar(1000) DEFAULT NULL,
  `expectedoutput` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table visualtracker.testcase: ~2 rows (approximately)
DELETE FROM `testcase`;
/*!40000 ALTER TABLE `testcase` DISABLE KEYS */;
INSERT INTO `testcase` (`id`, `name`, `description`, `expectedinput`, `expectedoutput`) VALUES
	(1, 'Test1', 'some descirption', 'input1', 'output1'),
	(2, 'Test 2', 'other description', 'input11', 'output22');
/*!40000 ALTER TABLE `testcase` ENABLE KEYS */;


-- Dumping structure for table visualtracker.testcase_rid
DROP TABLE IF EXISTS `testcase_rid`;
CREATE TABLE IF NOT EXISTS `testcase_rid` (
  `id_rid` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL,
  `observedoutput` varchar(100) DEFAULT NULL,
  `runby` int(11) DEFAULT NULL,
  `assignedto` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT '-1',
  PRIMARY KEY (`id_rid`),
  KEY `fk_tid_tcri_idx` (`tid`),
  KEY `fk_rid_tcri_idx` (`rid`),
  CONSTRAINT `fk_rid_tcri` FOREIGN KEY (`rid`) REFERENCES `requirements` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tid_tcri` FOREIGN KEY (`tid`) REFERENCES `testcase` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table visualtracker.testcase_rid: ~4 rows (approximately)
DELETE FROM `testcase_rid`;
/*!40000 ALTER TABLE `testcase_rid` DISABLE KEYS */;
INSERT INTO `testcase_rid` (`id_rid`, `rid`, `tid`, `observedoutput`, `runby`, `assignedto`, `status`) VALUES
	(1, 1, 1, 'output1', 3, '1,2', 1),
	(2, 1, 2, NULL, NULL, '1,2', -1),
	(3, 4, 1, NULL, NULL, '1,2', -1),
	(4, 4, 2, NULL, NULL, '1,2', -1);
/*!40000 ALTER TABLE `testcase_rid` ENABLE KEYS */;


-- Dumping structure for table visualtracker.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(95) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `usertype` varchar(95) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Username_UNIQUE` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table visualtracker.user: ~3 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `Username`, `password`, `usertype`) VALUES
	(1, 'root', 'root', 'admin'),
	(2, 'user', 'user', 'tester'),
	(3, 'sasi', 'sasi', 'admin');
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- Dumping data for table visualtracker.version: ~24 rows (approximately)
DELETE FROM `version`;
/*!40000 ALTER TABLE `version` DISABLE KEYS */;
INSERT INTO `version` (`id`, `pid`, `name`, `description`, `releaseId`, `startdate`, `enddate`) VALUES
	(5, 1, 'v1', 'v1', '123', '1212-12-12 00:00:00', '1231-12-12 00:00:00'),
	(6, 1, 'v2', 'v2', '123', '1212-12-12 00:00:00', '1231-12-12 00:00:00'),
	(7, 1, 'V3', NULL, '123', '1212-12-12 00:00:00', '1212-12-12 00:00:00'),
	(8, 1, 'v4', NULL, '123', '1212-12-12 00:00:00', '1212-12-12 00:00:00'),
	(9, 1, 'v5', NULL, '123', '1212-12-12 00:00:00', '1212-12-12 00:00:00'),
	(10, 1, 'v6', NULL, '123', '1212-12-12 00:00:00', '1212-12-12 00:00:00'),
	(11, 1, 'v6', NULL, '123', '1212-12-12 00:00:00', '1212-12-12 00:00:00'),
	(12, 1, 'v7', NULL, '123', '1212-12-12 00:00:00', '1212-12-12 00:00:00'),
	(13, 1, 'v8', NULL, '123', '1212-12-12 00:00:00', '1212-12-12 00:00:00'),
	(14, 1, 'v9', NULL, '123', '1212-12-12 00:00:00', '1212-12-12 00:00:00'),
	(15, 1, 'v10', NULL, '123', '1212-12-12 00:00:00', '1212-12-12 00:00:00'),
	(16, 1, 'v11', NULL, '123', '1212-12-12 00:00:00', '1212-12-12 00:00:00'),
	(17, 1, 'v11', NULL, '123', '1212-12-12 00:00:00', '1212-12-12 00:00:00'),
	(18, 1, 'sa', NULL, '12', '1212-12-12 00:00:00', '1212-12-12 00:00:00'),
	(19, 1, 'asd', NULL, '112', '1212-12-12 00:00:00', '1212-12-12 00:00:00'),
	(20, 1, 'sammple', NULL, '123', '1212-12-12 00:00:00', '1212-12-12 00:00:00'),
	(21, 1, 'sample', NULL, '123', '1212-12-12 00:00:00', '1212-12-12 00:00:00'),
	(22, 1, 'v12', NULL, '123', '1212-12-12 00:00:00', '1212-12-12 00:00:00'),
	(23, 1, 'v13', NULL, '123', '1212-12-12 00:00:00', '1212-12-12 00:00:00'),
	(24, 1, 'v13', NULL, '123', '1212-12-12 00:00:00', '1212-12-12 00:00:00'),
	(25, 1, 'samep', NULL, '123', '1212-12-12 00:00:00', '1212-12-12 00:00:00'),
	(26, 1, 'as', NULL, '123', '1212-12-12 00:00:00', '1212-12-12 00:00:00'),
	(27, 2, 'v1', '', '123', '1212-12-12 00:00:00', '1212-12-12 00:00:00'),
	(28, 2, 'v2', 'v2', '123', '1212-12-12 00:00:00', '1212-12-12 00:00:00');
/*!40000 ALTER TABLE `version` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
