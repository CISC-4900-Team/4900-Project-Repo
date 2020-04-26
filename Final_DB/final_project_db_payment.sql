-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: final_project_db
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment` (
  `payment_id` int NOT NULL,
  `Stored_Payment` varchar(255) DEFAULT NULL,
  `payment_Add` varchar(255) DEFAULT NULL,
  `payment_exp` varchar(255) DEFAULT NULL,
  `patient_id` int DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (26178580,'xxxx-xxxx-xxxx-9991','48 Valley View Dr, Bronx, NY 10456','0.360000000',38586612),(30440025,'xxxx-xxxx-xxxx-0001','422 East Oak Road, Manahawkin, NJ 08050','0.500000000',76375993),(33055866,'xxxx-xxxx-xxxx-0026','23 Walnut Ave, Huntington, NY 11743','0.318181818',97001671),(47366647,'xxxx-xxxx-xxxx-2266','8600 Deerfield St, Westbury, NY 11590','0.500000000',73932087),(52330018,'xxxx-xxxx-xxxx-0954','9053 E. South Ave, Brooklyn, NY 11229','02/22',22495825),(53286890,'xxxx-xxxx-xxxx-9972','89 Birch Hill Ave, Brooklyn, NY 11213','0.272727272',55565439),(81469262,'xxxx-xxxx-xxxx-1112','512 Armstrong Road, Brooklyn, NY 11204','0.600000000',63866618),(90002562,'xxxx-xxxx-xxxx-7716','8780 S. Lakewood Ave, Bronx, NY 11423','0.400000000',76606518),(92891931,'xxxx-xxxx-xxxx-6666','337 Strawberry Drive, Woodside, NY 11377','0.041666666',59244347),(98584002,'xxxx-xxxx-xxxx-2511','594 Linden Lane, Brooklyn, NY 11209','0.304347826',21677050);
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-26 14:36:18
