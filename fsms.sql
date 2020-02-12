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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room`
--

LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
INSERT INTO `room` VALUES (9,'Ректорат',3,'21',70,0,'Аудитория'),(10,'Ректорат',3,'41',70,0,'Аудитория'),(11,'Ректорат',3,'61',24,0,'Учебна зала'),(12,'Ректорат',3,'63А',15,0,'Учебна зала'),(13,'Ректорат',3,'65',600,0,'Аудитория'),(14,'Ректорат',3,'83Б',18,0,'Учебна зала'),(15,'Блок 2',2,'231',38,0,'Учебна зала'),(16,'Блок 2',2,'233',20,0,'Учебна зала'),(17,'Блок 2',2,'234',107,0,'Аудитория'),(18,'Блок 2',4,'401',77,0,'Аудитория'),(19,'Блок 2',4,'402',18,0,'Учебна зала'),(20,'Блок 2',4,'404',15,1,'Компютърна зала'),(21,'Блок 2',4,'405',25,0,'Учебна зала'),(22,'Блок 2',4,'406',75,0,'Аудитория'),(23,'ФМИ',0,'04',28,0,'Учебна зала'),(25,'ФМИ',0,'02',100,0,'Аудитория'),(26,'ФМИ',0,'03',28,0,'Учебна зала'),(27,'ФМИ',0,'01',100,0,'Аудитория'),(28,'ФМИ',0,'013',20,1,'Компютърна зала'),(29,'ФМИ',0,'018',20,1,'Компютърна зала'),(30,'ФМИ',0,'014',20,1,'Компютърна зала'),(31,'ФМИ',0,'019',20,1,'Компютърна зала'),(32,'ФМИ',1,'101',100,0,'Аудитория'),(33,'ФМИ',1,'120',20,1,'Компютърна зала'),(34,'ФМИ',1,'107',20,1,'Компютърна зала'),(35,'ФМИ',1,'121',20,1,'Компютърна зала'),(36,'ФМИ',2,'200',150,0,'Аудитория'),(37,'ФМИ',2,'216',20,1,'Компютърна зала'),(38,'ФМИ',2,'229',100,0,'Аудитория'),(39,'ФМИ',3,'325',150,0,'Аудитория'),(40,'ФМИ',3,'326',100,0,'Аудитория'),(41,'ФМИ',3,'318',20,1,'Компютърна зала'),(42,'ФМИ',3,'320',20,1,'Компютърна зала'),(43,'ФМИ',3,'308',28,0,'Учебна зала'),(44,'ФМИ',3,'309',28,0,'Учебна зала'),(45,'ФМИ',3,'315',28,0,'Учебна зала'),(46,'ФМИ',3,'314',28,0,'Учебна зала'),(47,'ФМИ',5,'513',28,0,'Учебна зала'),(48,'ФМИ',5,'500',100,0,'Аудитория'),(49,'ФМИ',5,'514',28,0,'Учебна зала'),(50,'ФМИ',4,'400',20,1,'Компютърна зала'),(51,'ФМИ',4,'401',20,1,'Компютърна зала'),(52,'ФМИ',4,'402',28,0,'Учебна зала'),(53,'ФМИ',4,'403',28,0,'Учебна зала'),(54,'ФМИ',4,'404',28,0,'Учебна зала'),(55,'ФМИ',4,'405',28,0,'Учебна зала');
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
  `start_hour` int(11) NOT NULL,
  `subject` varchar(99) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `is_lecture` tinyint(1) NOT NULL DEFAULT 0,
  `specialty` varchar(99) NOT NULL,
  `course` varchar(99) NOT NULL,
  `group` int(11) DEFAULT NULL,
  `duration` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule`
--

LOCK TABLES `schedule` WRITE;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
INSERT INTO `schedule` VALUES (1,46,'2020-02-18',19,'ИИ',42,0,'Компютърни науки','4.2',5,2),(2,41,'2020-02-19',8,'WEB',19,0,'Компютърни науки','4.2',6,2),(3,40,'2020-02-19',11,'WEB',19,1,'Компютърни науки','4.2',NULL,2),(4,33,'2020-02-20',8,'WEB',19,0,'Компютърни науки','4.2',5,2),(5,46,'2020-02-20',19,'ИИ',37,0,'Компютърни науки','4.2',6,2),(6,44,'2020-02-21',8,'WEB',19,0,'Компютърни науки','4.2',7,2),(7,27,'2020-02-21',15,'СА',3,1,'Компютърни науки','4.2',NULL,2),(8,39,'2020-02-22',9,'ИИ',16,1,'Компютърни науки','4.2',NULL,3),(9,44,'2020-02-22',12,'ИИ',37,0,'Компютърни науки','4.2',7,2),(10,30,'2020-02-17',17,'ИИ',29,0,'Компютърни науки','4.1',1,2),(11,28,'2020-02-17',19,'ИИ',29,0,'Компютърни науки','4.1',2,2),(12,44,'2020-02-18',17,'WEB',19,0,'Компютърни науки','4.1',2,2),(13,42,'2020-02-18',17,'ИИ',42,0,'Компютърни науки','4.1',3,2),(14,40,'2020-02-19',9,'WEB',19,1,'Компютърни науки','4.1',NULL,2),(15,42,'2020-02-20',8,'WEB',19,0,'Компютърни науки','4.1',1,2),(16,31,'2020-02-20',9,'WEB',19,0,'Компютърни науки','4.1',4,2),(17,27,'2020-02-21',13,'СА',3,1,'Компютърни науки','',NULL,2),(18,39,'2020-02-22',9,'ИИ',16,1,'Компютърни науки','4.1',NULL,3),(19,38,'2020-02-17',9,'ЛП',5,1,'Компютърни науки','3.2',NULL,3),(20,32,'2020-02-17',12,'СП',41,1,'Компютърни науки','3.2',NULL,2),(21,38,'2020-02-18',14,'ЧА',15,1,'Компютърни науки','3.2',NULL,3),(22,42,'2020-02-18',20,'МПР',25,0,'Компютърни науки','3.2',5,2),(23,33,'2020-02-19',8,'СП',26,0,'Компютърни науки','3.2',5,2),(24,42,'2020-02-19',8,'МПР',25,0,'Компютърни науки','3.2',6,2),(25,33,'2020-02-19',10,'СП',26,0,'Компютърни науки','3.2',6,2),(26,18,'2020-02-19',10,'СП',26,0,'Компютърни науки','3.2',7,2),(27,27,'2020-02-20',8,'ЛП',27,0,'Компютърни науки','3.2',5,2),(28,46,'2020-02-20',10,'ЧА',4,0,'Компютърни науки','3.2',5,2),(29,46,'2020-02-20',8,'ЧА',4,0,'Компютърни науки','3.2',6,2),(30,44,'2020-02-20',12,'ЛП',5,0,'Компютърни науки','3.2',6,2),(31,44,'2020-02-20',10,'ЛП',5,0,'Компютърни науки','3.2',7,2),(32,33,'2020-02-20',12,'ЧА',4,0,'Компютърни науки','3.2',7,2),(33,40,'2020-02-20',14,'МПР',19,1,'Компютърни науки','3.2',NULL,3),(34,39,'2020-02-21',8,'СПА',39,1,'Компютърни науки','3.2',NULL,2),(35,41,'2020-02-17',18,'ИС',37,0,'Софтуерно инженерство','4',1,2),(36,25,'2020-02-20',9,'УПР',36,1,'Софтуерно инженерство','4',NULL,3),(37,46,'2020-02-20',17,'ИС',37,0,'Софтуерно инженерство','4',2,2),(38,44,'2020-02-22',10,'ИС',37,0,'Софтуерно инженерство','4',3,2),(39,39,'2020-02-22',12,'ИС',16,1,'Софтуерно инженерство','4',NULL,2),(40,44,'2020-02-22',14,'ИС',37,0,'Софтуерно инженерство','4',4,2),(41,44,'2020-02-22',16,'ИС',37,0,'Софтуерно инженерство','4',5,2),(42,39,'2020-02-17',13,'УСИ',3,1,'Софтуерно инженерство','2',NULL,2),(43,36,'2020-02-18',17,'СДА',24,1,'Софтуерно инженерство','2',NULL,2),(44,46,'2020-06-29',9,'WEB Технологии',19,1,'Компютърни науки','4.2',NULL,5),(45,42,'2020-07-02',9,'WEB Технологии',19,1,'Компютърни науки','4.2',NULL,5),(46,32,'2020-06-20',8,'Изкуствен интелект',16,1,'Компютърни науки','4.2',NULL,5),(47,46,'2020-06-21',8,'Изкуствен интелект',16,1,'Компютърни науки','4.2',NULL,5),(48,34,'2020-06-13',10,'Софтуерни архитектури',3,1,'Компютърни науки','4.2',NULL,2),(49,46,'2020-06-29',9,'WEB Технологии',19,1,'Компютърни науки','4.1',NULL,5),(50,42,'2020-07-02',9,'WEB Технологии',19,1,'Компютърни науки','4.1',NULL,5),(51,34,'2020-06-20',8,'Изкуствен интелект',16,1,'Компютърни науки','4.1',NULL,5),(52,40,'2020-06-21',8,'Изкуствен интелект',16,1,'Компютърни науки','4.1',NULL,5),(53,33,'2020-06-13',10,'Софтуерни архитектури',3,1,'Компютърни науки','4.1',NULL,2),(54,36,'2020-06-10',9,'Логическо програмиране',5,1,'Компютърни науки','3.2',NULL,3),(55,36,'2020-06-15',9,'Логическо програмиране',5,1,'Компютърни науки','3.2',NULL,3),(56,39,'2020-06-16',14,'Логическо програмиране',5,1,'Компютърни науки','3.2',NULL,5),(57,36,'2020-06-12',9,'Мрежово програмиране',19,1,'Компютърни науки','3.2',NULL,2),(58,36,'2020-06-21',10,'Системно програмиране',41,1,'Компютърни науки','3.2',NULL,2),(59,39,'2020-06-25',9,'Системно програмиране',41,1,'Компютърни науки','3.2',NULL,2),(60,36,'2020-06-12',14,'Социално-правни аспекти на СИ',39,1,'Компютърни науки','3.2',NULL,2),(61,39,'2020-06-30',10,'Числен анализ',30,1,'Компютърни науки','3.2',NULL,3),(62,43,'2020-07-02',9,'Числен анализ',30,1,'Компютърни науки','3.2',NULL,3),(63,32,'2020-06-27',8,'Интелигентни системи',16,1,'Софтуерно инженерство','4',NULL,5),(64,32,'2020-06-28',8,'Интелигентни системи',16,1,'Софтуерно инженерство','4',NULL,5),(65,39,'2020-06-17',11,'Проектиране и интегриране на софтуерни системи',3,1,'Софтуерно инженерство','4',NULL,2),(66,39,'2020-06-10',18,'Управление на проекти',36,1,'Софтуерно инженерство','4',NULL,3),(68,48,'2020-02-17',8,'СПА',39,1,'Софтуерно инженерство','3',NULL,2),(69,15,'2020-02-18',17,'УК',36,0,'Софтуерно инженерство','3',4,2),(70,15,'2020-02-18',15,'УК',36,0,'Софтуерно инженерство','3',5,2),(71,15,'2020-02-19',8,'УК',36,0,'Софтуерно инженерство','3',1,2),(72,15,'2020-02-19',10,'УК',36,0,'Софтуерно инженерство','3',2,2),(73,15,'2020-02-19',12,'УК',36,0,'Софтуерно инженерство','3',3,2),(74,39,'2020-02-20',15,'XML',3,1,'Софтуерно инженерство','3',NULL,3),(75,36,'2020-02-20',18,'XML',3,1,'Софтуерно инженерство','3',NULL,1),(76,13,'2020-02-20',13,'СЕМ',13,1,'Софтуерно инженерство','3',NULL,2),(77,41,'2020-02-22',9,'СЕМ',38,0,'Софтуерно инженерство','3',1,2),(78,41,'2020-02-22',11,'СЕМ',38,0,'Софтуерно инженерство','3',3,2),(79,41,'2020-02-22',13,'СЕМ',38,0,'Софтуерно инженерство','3',5,2),(80,18,'2020-06-09',9,'XML технологии за семантичен уеб',3,1,'Софтуерно инженерство','3',NULL,2),(81,22,'2020-06-09',9,'XML технологии за семантичен уеб',3,1,'Софтуерно инженерство','3',NULL,2),(82,32,'2020-06-14',10,'Социално-правни аспекти на СИ',39,1,'Софтуерно инженерство','3',NULL,2),(83,39,'2020-06-15',14,'Статистика и емпирични методи',13,1,'Софтуерно инженерство','3',NULL,3),(84,13,'2020-06-18',14,'Статистика и емпирични методи',13,1,'Софтуерно инженерство','3',NULL,3),(85,13,'2020-06-22',16,'Статистика и емпирични методи',13,1,'Софтуерно инженерство','3',NULL,5),(86,36,'2020-06-27',10,'Управление на качеството',36,1,'Софтуерно инженерство','3',NULL,2);
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
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,0,'kasparia','$2y$10$pLQsxhrilBt4zvRh2sjcbOSZ68/1Pj5o2o85ZMN5FRGH34iRdb4ka','2020-02-09 01:43:49','Азнив','Каспарян','kasparia@fmi.uni-sofia.bg','Преподавател'),(2,0,'asoskova','$2y$10$gkydj93ljiStmhwTCImwKe7CJRshb5YMjGgHTYj5FoHvx23Zk0QNC','2020-02-09 01:44:26','Александра','Соскова','asoskova@fmi.uni-sofia.bg','Преподавател'),(3,0,'aldi','$2y$10$f4OHOy.T9ovB.j2WDKKHDON19OacldTnqukG/ajLGEFx79y63DcIa','2020-02-09 01:45:08','Александър','Димов','aldi@fmi.uni-sofia.bg','Преподавател'),(4,0,'aavdzhieva','$2y$10$sCK10oEIJZQT4ecJtjA6XucDgtUBAAbhOVIdOavPi1sAq5gstrtHe','2020-02-09 01:45:49','Ана','Авджиева','aavdzhieva@fmi.uni-sofia.bg','Асистент'),(5,0,'anton','$2y$10$9O58HDAmDyWewWuE1DCvAeTjm.Y1cHhUZZ8rGPqwdbQzkK4L.kZQe','2020-02-09 01:46:47','Антон','Зиновиев','anton@lml.bas.bg','Преподавател'),(6,0,'bojilov','$2y$10$aFeHUB.zcH22NtjmjHk8Gu6Tocfld3ESbYrVN07GgSlH7/2U2U8oG','2020-02-09 01:47:20','Асен','Божилов','bojilov@fmi.uni-sofia.bg','Преподавател'),(7,0,'asemerdzhiev','$2y$10$9uzkzb4zjHNJ6ywyQynkU.4XmEQFqSs32dg2652gali6KAtLTLRje','2020-02-09 01:47:51','Атанас','Семерджиев','asemerdzhiev@fmi.uni-sofia.bg','Преподавател'),(8,0,'v.georgiev','$2y$10$E6DjemDQu6C53MjtyeInb.7610tLQcRCPDmFd4yF946svazjytjli','2020-02-09 01:48:33','Васил','Цунижев','v.georgiev@fmi.uni-sofia.bg','Преподавател'),(9,0,'skelet','$2y$10$5RyZDgCZLahWT7lRKSRGyuCKFew9lb9ZYqgBlzJvvpC5xEcifx6Ya','2020-02-09 01:49:45','Георги','Георгиев','skelet@fmi.uni-sofia.bg','Преподавател'),(10,0,'deyan','$2y$10$y0yze3L8ZCvXSP.zEPWQ1eFAVzlickICo6VmLQ3WkXoV7bTnke5Dy','2020-02-09 01:50:25','Деян','Джундреков','deyan@fmi.uni-sofia.bg','Асистент'),(11,0,'shoo','$2y$10$brTG3Y5SPz596GK2fFXOeew5RZVI.czFu/HazAP9gto12bH62uYbe','2020-02-09 01:52:24','Димитър','Шиячки','shoo@fmi.uni-sofia.bg','Асистент'),(12,0,'kralchev','$2y$10$XgJRCEzTPI41ybfGPXXmpOG98FMPOTQUMy7UF5aU0F2DDKMZWL2zS','2020-02-09 01:53:02','Добромир','Кралчев','kralchev@fmi.uni-sofia.bg','Преподавател'),(13,0,'d.donchev','$2y$10$HZJqGl6PWRmhBcJjVWdZW.REzLzP31pN364w9ytCtVCBONrpl9l/O','2020-02-09 01:53:34','Дончо','Дончев','d.donchev@fmi.uni-sofia.bg','Преподавател'),(14,0,'nedialkov','$2y$10$NBo0RcosWJ7YL3THDdU9A.BvT.Wvo1kgJHc9bXet8rYui335PTniW','2020-02-09 01:54:01','Евгени','Недялков','nedialkov@fmi.uni-sofia.bg','Асистент'),(15,0,'velikova','$2y$10$EVTc5i9xsx9.fjmrOE9LEeMW40.nIQb5/aBHNhtoi.8R79LiLZTZu','2020-02-09 01:54:33','Евгения','Великова','velikova@fmi.uni-sofia.bg','Преподавател'),(16,0,'ivan.koychev','$2y$10$XZbAG/e29T1CCpNu0LNxc.uC.YWHBWhHMt4yJCi5DciOXMefYsbIG','2020-02-09 01:55:35','Иван','Койчев','ivan.koychev@fmi.uni-sofia.bg','Преподавател'),(17,0,'kalin.georgiev','$2y$10$pnqxu4SqAFcjq7v0Hur5Yuty9WmgaRIYyhzVeQANVdJZK9o5tw7F2','2020-02-09 01:56:19','Калин','Николов','kalin.georgiev@fmi.uni-sofia.bg','Преподавател'),(18,0,'kkaloyanova','$2y$10$eY1MQzoMKZ818oSmtH331eMAnPlA0cbd7SEDQj4JBGgUevnAgrpVy','2020-02-09 01:56:48','Калинка ','Калоянова','kkaloyanova@fmi.uni-sofia.bg','Преподавател'),(19,0,'milenp','$2y$10$7lHdId6/X8l04KKQWSdvfOwl8Wrxs3zcXP.4yok./h4dCZl.xanNC','2020-02-09 01:57:46','Милен','Петров','milenp@fmi.uni-sofia.bg','Преподавател'),(20,0,'minkom','$2y$10$DqGw4/mR/moC6ZnEUJwfd.AHeSO3thwC7brVdzfjvj9y3y22Dv5VG','2020-02-09 01:59:25','Минко','Марков','minkom@fmi.uni-sofia.bg','Преподавател'),(21,0,'ribarska','$2y$10$YPun0A3XlGQymfjWc/6VEuhRIMHOouuBFdNoXeWZIanq0DRZ0rKnm','2020-02-09 02:00:08','Надежда','Рибарска','ribarska@fmi.uni-sofia.bg','Преподавател'),(22,0,'bivas','$2y$10$c./I8lSgz5Uw8ukkgBCir.dQimog4AK1s7c3zkX5Po6YCe1.iBN3y','2020-02-09 02:00:34','Мира','Бивас','bivas@fmi.uni-sofia.bg','Асистент'),(23,0,'nevyanag','$2y$10$l68shjoLqlv6bWxzK7103exLkv1Sglw/p14ZUJMeFx15uxyK99RWy','2020-02-09 02:01:05','Невяна','Георгиева','nevyanag@fmi.uni-sofia.bg','Асистент'),(24,0,'noraa','$2y$10$G72XvPR6xBj49cqMiz8tNuFv3zlTCpUwFNpffKQsZ3/rZFlXs9t/u','2020-02-09 02:01:42','Нора','Ангелова','noraa@fmi.uni-sofia.bg','Преподавател'),(25,0,'pmitankin','$2y$10$VkHYouraYcdlFRpnaFV5vuglx4NRNqvsdF8Q30RRLM6gOGDsM0JBm','2020-02-09 02:02:30','Петър','Митанкин','pmitankin@fmi.uni-sofia.bg','Асистент'),(26,0,'sabina','$2y$10$qR.xD1kWqbeXX.v1AhoZve5zCdRXAxqjQ3brqG9jTSV.cANnsbr8W','2020-02-09 02:03:11','Сабина','Бочева','sabina@fmi.uni-sofia.bg','Асистент'),(27,0,'stefangerdzhikov','$2y$10$UHvutLC0UdWaenKOKaIyMeHkfc5NSeAlen.c3lFKrPQM8vaJ92Pba','2020-02-09 02:04:01','Стефан','Герджиков','stefangerdzhikov@fmi.uni-sofia.bg','Преподавател'),(28,0,'stefanv','$2y$10$gbYh4/pqybQmviCiHitYleGnssmHgx8.uSm335jCl7cCaCI5do8XW','2020-02-09 02:04:29','Стефан','Вътев','stefanv@fmi.uni-sofia.bg','Преподавател'),(29,0,'todor.georgiev','$2y$10$RbLrambfAwTpcXRjzDK8GOJsWixt08lVhSGJAEQE40iYJGyt3Gn8e','2020-02-09 02:05:07','Тодор','Георгиев','todor.georgiev@fmi.uni-sofia.bg','Асистент'),(30,0,'ucankov','$2y$10$iTVjrXaeO6ffuAEkp.OAC.ksLXQ5fRYsb4t.9NbD/DzrFjuCkaFr.','2020-02-09 02:05:50','Юлиан','Цанков','ucankov@fmi.uni-sofia.bg','Преподавател'),(31,81528,'gbonev','$2y$10$emCgOBTxlO14Q.9qwbZnhOPAmv/njiXlBgYhtRZLUW691HmEKzn4m','2020-02-09 13:30:10','Георги','Бонев','gbonev@gmail.com','Студент'),(32,81486,'smihaleva','$2y$10$GRIcCLKT4qzDrNFXqdZA8eukzWsEwfgJvkNaDYzA5o1nyWpq9EXUa','2020-02-09 13:31:29','София','Михалева','smihaleva@gmail.com','Студент'),(33,81547,'dyordanova','$2y$10$VA45WW76/PkDG6FCJqBcYewafcYTf6r9OgFZTQ6BGCqrDRm2t0Ziu','2020-02-09 13:32:38','Дияна','Йорданова','d.yordanova@gmail.com','Студент'),(34,81527,'pkoleva','$2y$10$fAJnriTSpIF7AwPUsayQ9eNi5uUvEZzFVhcpDUTN.KHiezoeCvjOW','2020-02-09 13:33:08','Павлина','Колева','p.koleva@gmail.com','Студент'),(35,81548,'atodorova','$2y$10$A7AaJLut9Jl2oJ7AZhzBF.wpUtYcGKdy3JQKCuvVPD8SD7SMraXo6','2020-02-09 13:33:36','Антония','Тодорова','a.todorova@gmail.com','Студент'),(36,0,'egurova','$2y$10$.znBYuPRpPIt.xM45hZaUukOGCIatu0MLmVR26pDoOJ587gSiR.Ba','2020-02-09 22:26:02','Елисавета','Гурова','egurova@gmail.com','Преподавател'),(37,0,'bvelichkov','$2y$10$JjwS7Dxq0eEaAsaHtnZauOktYXS6w4buFmFzCI3GoczA9uGGVWj6q','2020-02-09 22:26:45','Борис','Величков','bvelichkov@gmail.com','Асистент'),(38,0,'mkandilarov','$2y$10$pbF3oLAekQbH21zIm.XkH.hOzwnQHnw5Ws/.KZygDyK4UkKtPECiG','2020-02-09 22:27:24','Михаил ','Кандиларов','mkandilarov@gmail.com','Асистент'),(39,0,'kgeorgieva','$2y$10$oJq61zvVfPwdIFnUw6Ht5upuJPvH.v7P2WXfSwdvsKMnzCsB1ggDu','2020-02-09 22:28:03','Кристин','Георгиева','kgeorgieva@gmail.com','Преподавател'),(40,0,'asariev','$2y$10$hMssjXQGYNzsD9nea93re./MmC7SzpQHd9vJLSyCzf64L4uwTtdtG','2020-02-09 22:28:37','Ангел','Сариев','asariev@gmail.com','Асистент'),(41,0,'mfilipova','$2y$10$cZeq/FotVF7DLxDROhX6FumaEjkythTZmcMD75xdaFR.yftQ61XnW','2020-02-09 22:30:01','Моника','Филипова','mfilipova@gmail.com','Преподавател'),(42,0,'glazarova','$2y$10$L/aUTJJ8wpoPPjuo9eOE2egM/7ibTQ/L.6/OX3vubEPCnf5Y.fmmu','2020-02-09 22:31:07','Гергана','Лазарова','glazarova@gmail.com','Асистент');
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

-- Dump completed on 2020-02-12 20:13:07
