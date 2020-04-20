-- MariaDB dump 10.17  Distrib 10.4.11-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: hikingandtrails
-- ------------------------------------------------------
-- Server version	10.4.11-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `features`
--

DROP TABLE IF EXISTS `features`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `features` (
  `FeatureID` smallint(6) NOT NULL AUTO_INCREMENT,
  `PavedTrail` tinyint(1) DEFAULT NULL,
  `Waterfall` tinyint(1) DEFAULT NULL,
  `ScenicLookout` tinyint(1) DEFAULT NULL,
  `Cave` tinyint(1) DEFAULT NULL,
  `Lake` tinyint(1) DEFAULT NULL,
  `River` tinyint(1) DEFAULT NULL,
  `LocationNotes` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`FeatureID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `features`
--

LOCK TABLES `features` WRITE;
/*!40000 ALTER TABLE `features` DISABLE KEYS */;
INSERT INTO `features` VALUES (1,1,1,0,1,1,0,'none'),(2,1,0,0,1,0,0,NULL),(3,0,0,0,1,0,0,NULL),(4,0,0,0,0,0,0,NULL),(5,0,0,0,0,0,0,NULL),(6,0,0,0,0,0,0,NULL),(7,0,0,0,0,0,0,NULL),(8,0,0,0,0,0,0,NULL),(9,0,0,0,0,0,0,NULL),(10,0,0,0,0,0,0,NULL),(11,0,0,0,0,0,0,NULL),(12,1,0,0,0,0,1,NULL),(13,1,0,0,0,1,0,NULL),(14,0,0,1,0,1,1,NULL),(15,0,0,1,0,1,1,NULL),(16,0,0,1,0,1,1,NULL),(17,0,0,1,0,1,1,NULL),(18,0,0,0,1,0,0,NULL),(19,1,1,1,1,0,0,NULL),(20,1,0,0,0,0,0,NULL),(21,1,0,0,0,0,0,NULL);
/*!40000 ALTER TABLE `features` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hikes`
--

DROP TABLE IF EXISTS `hikes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hikes` (
  `HikeID` smallint(6) NOT NULL AUTO_INCREMENT,
  `DescriptiveName` varchar(250) DEFAULT NULL,
  `DifficultyLevel` char(1) DEFAULT NULL,
  `LocationID` smallint(6) DEFAULT NULL,
  `FeatureID` smallint(6) DEFAULT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `HikeApprovalStatus` varchar(8) DEFAULT NULL,
  `HikeNotes` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`HikeID`),
  KEY `FK` (`LocationID`,`FeatureID`,`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hikes`
--

LOCK TABLES `hikes` WRITE;
/*!40000 ALTER TABLE `hikes` DISABLE KEYS */;
INSERT INTO `hikes` VALUES (1,'Silver Lake','E',1,1,'user@user.com','approved',NULL),(2,'Test Hike','E',1,1,'user@user.com','approved',NULL),(4,'Deer Creek',NULL,37,14,'user@user.com','pending',NULL),(5,'Deer Creek',NULL,38,15,'user@user.com','pending',NULL),(6,'Deer Creek',NULL,39,16,'user@user.com','pending',NULL),(7,'Deer Creek','M',40,17,'user@user.com','approved',NULL),(8,'Mountain Ridge','H',41,18,'person@person.com','approved',NULL),(9,'Zions','M',42,19,'user@user.com','pending',NULL),(10,'Boring Hike','E',43,20,'user@user.com','pending',NULL),(11,'Boring Hike','E',44,21,'user@user.com','pending',NULL);
/*!40000 ALTER TABLE `hikes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `location` (
  `LocationID` smallint(6) NOT NULL AUTO_INCREMENT,
  `ZipCode` char(5) DEFAULT NULL,
  `City` varchar(25) DEFAULT NULL,
  `State` char(2) DEFAULT NULL,
  `LocationNotes` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`LocationID`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` VALUES (1,'84081','Some City','Ut','None'),(2,'1111','South Jordan','Ut',NULL),(3,NULL,NULL,NULL,NULL),(4,NULL,NULL,NULL,NULL),(5,'11111',NULL,'va',NULL),(6,'11111',NULL,'va',NULL),(7,'22222','another city','va',NULL),(8,'11111','some city','va',NULL),(9,'0','','',NULL),(10,'0','','',NULL),(11,'0','','',NULL),(12,'0','','',NULL),(13,'0','','',NULL),(14,'0','','',NULL),(15,'0','','',NULL),(16,'0','','',NULL),(17,'0','','',NULL),(18,'0','','',NULL),(19,'0','','',NULL),(20,'0','','',NULL),(21,'0','','',NULL),(22,'0','','',NULL),(23,'0','','',NULL),(24,'0','','',NULL),(25,'0','','',NULL),(26,'0','','',NULL),(27,'0','','',NULL),(28,'0','','',NULL),(29,'0','','',NULL),(30,'0','','',NULL),(31,'0','','',NULL),(32,'0','','',NULL),(33,'0','','',NULL),(34,'0','','',NULL),(35,'11111','Park City','UT',NULL),(36,'11111','some city','UT',NULL),(37,'84068','Park City','UT',NULL),(38,'84068','Park City','UT',NULL),(39,'84068','Park City','UT',NULL),(40,'84068','Park City','UT',NULL),(41,'84068','Park City','UT',NULL),(42,'84767','Moab','UT',NULL),(43,'84081','West Jordan','UT',NULL),(44,'84081','West Jordan','UT',NULL);
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `UserID` smallint(6) NOT NULL AUTO_INCREMENT,
  `Username` varchar(20) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Admin` tinyint(1) DEFAULT NULL,
  `Suspended` tinyint(1) DEFAULT NULL,
  `UserNotes` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin@admin.com','hikingandtrails','admin@admin.com',1,0,NULL),(2,'user@user.com','hikingandtrails','user@user.com',0,0,NULL),(3,'bob@user.com','bob','bob@user.com',0,0,NULL),(4,'jill','','jill',0,0,NULL),(5,'joey@joey.com','joey','joey@joey.com',0,0,NULL),(6,'joey@joey.com','','joey@joey.com',0,0,NULL),(7,'jill@jill.com','jill','jill@jill.com',0,0,NULL),(8,'joey@gmail.com','joey','joey@gmail.com',0,0,NULL),(9,'joey@gmail.com','','joey@gmail.com',0,0,NULL),(10,'bla@bla.com','bla','bla@bla.com',0,0,NULL),(11,'billy@billy.com','billy','billy@billy.com',0,0,NULL),(12,'kate@kate.com','kate','kate@kate.com',0,0,NULL),(13,'bdof@daogi.com','password','bdof@daogi.com',0,0,NULL),(14,'bob@bob.com','test','bob@bob.com',0,0,NULL),(15,'j@j.com','password','j@j.com',0,0,NULL),(16,'user@user.com','user','user@user.com',0,0,NULL),(17,'person@person.com','person','person@person.com',0,0,NULL),(18,'user@user.com','hikingandtrails','user@user.com',0,0,NULL),(19,'myself@myself.com','hikingandtrails','myself@myself.com',0,0,NULL),(20,'joey@joey.com','j','joey@joey.com',0,0,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-07 16:06:38
