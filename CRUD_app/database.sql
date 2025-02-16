-- MySQL dump 10.13  Distrib 8.3.0, for Win64 (x86_64)
--
-- Host: localhost    Database: testproject2
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.27-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `custo`
--

DROP TABLE IF EXISTS `custo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `custo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `custo`
--

LOCK TABLES `custo` WRITE;
/*!40000 ALTER TABLE `custo` DISABLE KEYS */;
INSERT INTO `custo` VALUES (1,'Atharva Borlepwar','atharva@gmail.com','1234567890','LOS ANGELES, USA','2024-01-19 13:27:05'),(2,'Akshata Suradkar','akshata@gmail.com','1234567123','FRANCE, UK','2024-01-19 13:27:05'),(4,'Salmaan Khan2','parag@gmail.com','1234437890','TEXAS, USA','2024-01-19 13:27:05'),(6,'Ranveer Rajput','Ranveer@gmail.com','1234467890','BOSTON, USA','2024-01-19 13:27:05'),(7,'Ketki Kulkarni','Ketki@gmail.com','1234588890','LAS VEGAS, USA','2024-01-19 13:27:05'),(15,'amitabh bachhan2','amitabh@gmail.com','123456','CALIFORNIA, USA','2024-01-22 11:01:52'),(16,'Kishor Kumar2','kishor@gmail.com','674930','NEW YORK, USA','2024-01-22 11:03:47'),(17,'yatin2229','yatin@gmaikl.com','asdfj','adsf','2024-01-22 11:34:27'),(18,'Aishwarya Suradkar','aishsuradkar03@gmail.com','09764208954','1st floor, S.B. Boys Hostel, Nirala Bazar Road','2024-01-22 16:41:14');
/*!40000 ALTER TABLE `custo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history_table`
--

DROP TABLE IF EXISTS `history_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `history_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `record_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history_table`
--

LOCK TABLES `history_table` WRITE;
/*!40000 ALTER TABLE `history_table` DISABLE KEYS */;
INSERT INTO `history_table` VALUES (1,4,'Parag Deshpande','parag@gmail.com','1234437890','TEXAS, USA','2024-01-19 14:06:42'),(2,4,'Parag Deshpande 2','parag@gmail.com','1234437890','TEXAS, USA','2024-01-19 14:06:47'),(3,4,'','parag@gmail.com','1234437890','TEXAS, USA','2024-01-19 14:07:06'),(4,17,'yatin','yatin@gmaikl.com','asdf','adsf','2024-01-22 06:05:22'),(5,17,'yatin222','yatin@gmaikl.com','asdf','adsf','2024-01-22 08:40:44'),(6,4,'Salmaan Khan','parag@gmail.com','1234437890','TEXAS, USA','2024-01-22 11:04:06'),(7,4,'Salmaan Khan','parag@gmail.com','1234437890','TEXAS, USA','2024-01-22 11:06:02'),(8,4,'Salmaan Khan','parag@gmail.com','1234437890','TEXAS, USA','2024-01-22 11:06:13'),(9,4,'Salmaan Khan2','parag@gmail.com','1234437890','TEXAS, USA','2024-01-22 11:06:58'),(10,17,'yatin222','yatin@gmaikl.com','asdf','adsf','2024-01-22 11:07:08'),(11,17,'yatin2229','yatin@gmaikl.com','asdf','adsf','2024-01-22 11:08:01'),(12,17,'yatin2229','yatin@gmaikl.com','asdf','adsf','2024-01-22 11:08:07'),(13,17,'yatin2229','yatin@gmaikl.com','asdf','adsf','2024-01-22 11:09:53'),(14,17,'yatin2229','yatin@gmaikl.com','asdfj','adsf','2024-01-22 11:11:05'),(15,1,'Atharva Borlepwar','atharva@gmail.com','1234567890','LOS ANGELES, USA','2024-01-22 11:11:22');
/*!40000 ALTER TABLE `history_table` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-24 12:13:29
