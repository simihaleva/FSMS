-- MariaDB dump 10.17  Distrib 10.4.8-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: fsms
-- ------------------------------------------------------
-- Server version	10.4.8-MariaDB

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
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `building` varchar(99) NOT NULL,
  `floor` int(11) NOT NULL,
  `room` varchar(99) NOT NULL,
  `capacity` int(11) NOT NULL,
  `is_computer` tinyint(1) NOT NULL DEFAULT 0,
  `description` varchar(99) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room`
--

LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
INSERT INTO `room` VALUES (1,'FMI',2,'200',0,0,'');
/*!40000 ALTER TABLE `room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_room` int(11) NOT NULL,
  `date` date NOT NULL,
  `day_of_week` varchar(99) NOT NULL,
  `start_hour` int(11) NOT NULL,
  `subject` varchar(99) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `is_lecture` tinyint(1) NOT NULL DEFAULT 0,
  `specialty` varchar(99) NOT NULL,
  `course` varchar(99) NOT NULL,
  `group` int(11) DEFAULT NULL,
  `duration` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule`
--

LOCK TABLES `schedule` WRITE;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
INSERT INTO `schedule` VALUES (1,0,'2020-02-19','Wednesday',8,'fgfgfg',35,1,'ff','2',0,3),(2,1,'2020-02-20','Thursday',8,'SDP',34,1,'SI','2',NULL,4),(3,1,'2020-01-29','Wednesday',7,'Algebra',35,0,'КН','1.1',1,3),(4,1,'2020-02-01','Saturday',10,'DIS',39,1,'Компютърни науки','1,1',NULL,5),(5,1,'2020-02-19','Wednesday',12,'SDP',43,0,'SI','2',3,2),(6,8,'2020-02-12','Monday',12,'DIS,upr',35,0,'KN','3',2,3),(7,10,'2020-02-13','Thursday',16,'DSTR',35,1,'fh','2',0,5),(8,1,'2020-06-09','Tuesday',9,'Algebra',35,1,'Компютърни науки','2.2',NULL,4);
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fn` int(11) DEFAULT NULL,
  `username` varchar(99) NOT NULL,
  `password` varchar(99) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `first_name` varchar(99) NOT NULL,
  `last_name` varchar(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `authority` varchar(99) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `fn` (`fn`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (34,81528,'h','$2y$10$p2zX41W6pPRq3/b.VJM3g.IZ7KSFBXdjy88OzAQsDDSEuc4RGFeVu','2020-02-06 17:16:24','h','h','h@abv.bg','Студент'),(35,0,'test','$2y$10$bsbRgZyElusD9fyxzgExp.MCJGO/58KL6xTDZtaaI9RyFtlv/pGYK','2020-02-06 17:22:32','G','B','test@abv.bg','Преподавател'),(36,52025,'g','$2y$10$TGIZ3UaeTrlzQhhGkiaCJ.WbcrVIuqT9ojpFxQSN1h0Jtz9Gos9VO','2020-02-07 00:04:36','P','K','gt@h.h','Асистент'),(39,6,'j','$2y$10$ugBXHn4.M53W3nRWsAwK3.eKB8SVZueEKJBkaSwDfKspWeWWmfWam','2020-02-07 00:19:58','h','h','j@k.k','Асистент'),(41,76576,'k','$2y$10$0J2kM2kij1xL2Sno.QnZ/OMpOY0xblAQsJ5FgzJE.Y.nU3yw9UPs.','2020-02-07 00:23:01','k','k','k@k.k','Студент'),(42,6543,'ge','$2y$10$MiB2fgk3/43or0yuKz7hiubY6wABGwXDH/ZtDKOtlVsyl5V6fQTlS','2020-02-07 00:41:14','GB','GB','gg@k.k','Асистент'),(43,6443,'ger','$2y$10$nNuxfTLKqQc5XS75t7U97.XghGQuuSHDcFWVL4/3mSVMWFoLtzBUq','2020-02-07 01:16:55','g','g','gf@h.h','Асистент');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-08 18:47:06
