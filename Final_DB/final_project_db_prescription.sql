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
-- Table structure for table `prescription`
--

DROP TABLE IF EXISTS `prescription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prescription` (
  `prescription_id` int NOT NULL,
  `doctor_Name` varchar(255) DEFAULT NULL,
  `doctor_Phone_Number` varchar(255) DEFAULT NULL,
  `doctor_Office_Address` varchar(255) DEFAULT NULL,
  `refill_Count` int DEFAULT NULL,
  `date_Issued` varchar(255) DEFAULT NULL,
  `patient_id` int DEFAULT NULL,
  `medication_id` int DEFAULT NULL,
  PRIMARY KEY (`prescription_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prescription`
--

LOCK TABLES `prescription` WRITE;
/*!40000 ALTER TABLE `prescription` DISABLE KEYS */;
INSERT INTO `prescription` VALUES (129524323,'Dr. Alison Amirian','212-555-0192','49 Meadowbrook Drive Yonkers, NY 10701',4,'2019-06-15',63812412,57108),(157202787,'Dr. Tristen Fongvongsa','212-555-0185','35 Bayport St. Brooklyn, NY 11218',2,'2019-01-28',76606518,15073),(186591131,'Dr. Alfred Amorin','202-555-0102','9846 Lawrence St. Webster, NY 14580',120,'2019-01-01',22495825,29140),(213893226,'Dr. Darius Meinerding','212-555-0163','4 Kent Dr.Spring Valley, NY 10977',7,'2019-07-01',73932087,42843),(242704594,'Dr. Amari Littrell','212-555-0139','537 Wilson Road. Huntington Station, NY 11746',6,'2019-07-04',76375993,85653),(275487307,'Dr. Francis Colomy','212-555-0170','8236 Bayberry Lane. Rego Park, NY 11374',5,'2019-05-21',21677050,69103),(281158686,'Dr. Landon Eighmy','212-555-0110','38 Walt Whitman Lane. Brooklyn, NY 11235',4,'2019-03-01',55565439,20126),(380053651,'Dr. Dillon Sidhu','212-555-0163','9781 Primrose Drive North Tonawanda, NY 14120',5,'2019-10-05',38586612,93617),(487316448,'Dr. Jakob Dangel','404-733-3352','9037 W. Hillside Lane South Ozone Park, NY 11420',8,'2020-02-20',97390839,10135),(489060801,'Dr. Leo Verdone','212-478-4553','7882A Sherman St.Spring Valley, NY 10977',6,'2020-02-15',24387788,99147),(565396362,'Dr. Philip Steinbacher','212-555-0130','7352 S. Golf Street New York, NY 10003',3,'2019-03-10',97001671,80943),(709460491,'Dr. Avery Lizaola','212-555-0168','213 Galvin St.Brooklyn, NY 11230',5,'2019-08-13',38452212,36679),(749650790,'Dr. Douglas Klun','648-948-6950','17 Wild Horse Street Bronx, NY 10465',5,'2020-06-18',97390777,18784),(775933568,'Dr. Dillon Bodman','212-555-0101','9026 Leatherwood St. New York, NY 10028',3,'2019-08-14',59244347,26866),(792551553,'Dr. Stephen Tandon','212-555-0102','5 Creek Street Bronx, NY 10472',2,'2019-05-22',63866618,43848),(868936443,'Dr. Tyson Wigdor','212-200-1511','60 Lyme Drive New York, NY 10011',10,'2020-03-14',94659360,15976);
/*!40000 ALTER TABLE `prescription` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-26 14:36:16
