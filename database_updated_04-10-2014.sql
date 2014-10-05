CREATE DATABASE  IF NOT EXISTS `visualtracker` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `visualtracker`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: visualtracker
-- ------------------------------------------------------
-- Server version	5.6.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bug`
--

DROP TABLE IF EXISTS `bug`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bug` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `testcaseid` int(11) DEFAULT NULL,
  `name` varchar(95) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `status` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bug_tcid_idx` (`testcaseid`),
  CONSTRAINT `fk_bug_tcid` FOREIGN KEY (`testcaseid`) REFERENCES `testcase` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bug`
--

LOCK TABLES `bug` WRITE;
/*!40000 ALTER TABLE `bug` DISABLE KEYS */;
/*!40000 ALTER TABLE `bug` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `releaseid` varchar(45) DEFAULT NULL,
  `startdate` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'sample1','sample','123','2014-12-12 00:00:00','2015-12-12 00:00:00'),(2,'sample2','sample2','1234','2014-12-12 00:00:00','2015-12-12 00:00:00');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requirementgroup`
--

DROP TABLE IF EXISTS `requirementgroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requirementgroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `parentid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_rg_project_idx` (`pid`),
  CONSTRAINT `fk_rg_project` FOREIGN KEY (`pid`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requirementgroup`
--

LOCK TABLES `requirementgroup` WRITE;
/*!40000 ALTER TABLE `requirementgroup` DISABLE KEYS */;
INSERT INTO `requirementgroup` VALUES (1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `requirementgroup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requirements`
--

DROP TABLE IF EXISTS `requirements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requirements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rgid` int(11) DEFAULT NULL,
  `name` varchar(225) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `type` varchar(75) DEFAULT NULL,
  `priority` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_r_rg_idx` (`rgid`),
  CONSTRAINT `fk_r_rg` FOREIGN KEY (`rgid`) REFERENCES `requirementgroup` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requirements`
--

LOCK TABLES `requirements` WRITE;
/*!40000 ALTER TABLE `requirements` DISABLE KEYS */;
/*!40000 ALTER TABLE `requirements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sprint`
--

DROP TABLE IF EXISTS `sprint`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sprint` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sprint`
--

LOCK TABLES `sprint` WRITE;
/*!40000 ALTER TABLE `sprint` DISABLE KEYS */;
INSERT INTO `sprint` VALUES (1,1,'s1','s1','1212-12-12 00:00:00','1213-12-12 00:00:00'),(2,1,'samples','asd','1212-02-12 00:00:00','1212-12-12 00:00:00'),(3,2,'S1','asd','1212-12-12 00:00:00','1212-12-12 00:00:00'),(4,2,'asd','asd','1212-12-12 00:00:00','1212-12-12 00:00:00'),(5,2,'dsa','dsa','1212-12-12 00:00:00','1212-12-12 00:00:00');
/*!40000 ALTER TABLE `sprint` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testcase`
--

DROP TABLE IF EXISTS `testcase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testcase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `expectedinput` varchar(1000) DEFAULT NULL,
  `expectedoutput` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testcase`
--

LOCK TABLES `testcase` WRITE;
/*!40000 ALTER TABLE `testcase` DISABLE KEYS */;
/*!40000 ALTER TABLE `testcase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testcase_rid`
--

DROP TABLE IF EXISTS `testcase_rid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testcase_rid` (
  `id_rid` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL,
  `observedoutput` varchar(100) DEFAULT NULL,
  `runby` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_rid`),
  KEY `fk_tid_tcri_idx` (`tid`),
  KEY `fk_rid_tcri_idx` (`rid`),
  CONSTRAINT `fk_tid_tcri` FOREIGN KEY (`tid`) REFERENCES `testcase` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_rid_tcri` FOREIGN KEY (`rid`) REFERENCES `requirements` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testcase_rid`
--

LOCK TABLES `testcase_rid` WRITE;
/*!40000 ALTER TABLE `testcase_rid` DISABLE KEYS */;
/*!40000 ALTER TABLE `testcase_rid` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(95) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `usertype` varchar(95) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Username_UNIQUE` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'root','root','admin'),(2,'user','user','tester'),(3,'sasi','sasi','admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `version`
--

DROP TABLE IF EXISTS `version`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `version` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `version`
--

LOCK TABLES `version` WRITE;
/*!40000 ALTER TABLE `version` DISABLE KEYS */;
INSERT INTO `version` VALUES (5,1,'v1','v1','123','1212-12-12 00:00:00','1231-12-12 00:00:00'),(6,1,'v2','v2','123','1212-12-12 00:00:00','1231-12-12 00:00:00'),(7,1,'V3',NULL,'123','1212-12-12 00:00:00','1212-12-12 00:00:00'),(8,1,'v4',NULL,'123','1212-12-12 00:00:00','1212-12-12 00:00:00'),(9,1,'v5',NULL,'123','1212-12-12 00:00:00','1212-12-12 00:00:00'),(10,1,'v6',NULL,'123','1212-12-12 00:00:00','1212-12-12 00:00:00'),(11,1,'v6',NULL,'123','1212-12-12 00:00:00','1212-12-12 00:00:00'),(12,1,'v7',NULL,'123','1212-12-12 00:00:00','1212-12-12 00:00:00'),(13,1,'v8',NULL,'123','1212-12-12 00:00:00','1212-12-12 00:00:00'),(14,1,'v9',NULL,'123','1212-12-12 00:00:00','1212-12-12 00:00:00'),(15,1,'v10',NULL,'123','1212-12-12 00:00:00','1212-12-12 00:00:00'),(16,1,'v11',NULL,'123','1212-12-12 00:00:00','1212-12-12 00:00:00'),(17,1,'v11',NULL,'123','1212-12-12 00:00:00','1212-12-12 00:00:00'),(18,1,'sa',NULL,'12','1212-12-12 00:00:00','1212-12-12 00:00:00'),(19,1,'asd',NULL,'112','1212-12-12 00:00:00','1212-12-12 00:00:00'),(20,1,'sammple',NULL,'123','1212-12-12 00:00:00','1212-12-12 00:00:00'),(21,1,'sample',NULL,'123','1212-12-12 00:00:00','1212-12-12 00:00:00'),(22,1,'v12',NULL,'123','1212-12-12 00:00:00','1212-12-12 00:00:00'),(23,1,'v13',NULL,'123','1212-12-12 00:00:00','1212-12-12 00:00:00'),(24,1,'v13',NULL,'123','1212-12-12 00:00:00','1212-12-12 00:00:00'),(25,1,'samep',NULL,'123','1212-12-12 00:00:00','1212-12-12 00:00:00'),(26,1,'as',NULL,'123','1212-12-12 00:00:00','1212-12-12 00:00:00'),(27,2,'v1','','123','1212-12-12 00:00:00','1212-12-12 00:00:00'),(28,2,'v2','v2','123','1212-12-12 00:00:00','1212-12-12 00:00:00');
/*!40000 ALTER TABLE `version` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-10-04 10:31:53
