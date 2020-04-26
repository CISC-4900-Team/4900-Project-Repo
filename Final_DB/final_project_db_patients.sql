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
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patients` (
  `patient_id` int NOT NULL,
  `patient_Name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dOB` date NOT NULL,
  `phone_Number` varchar(255) DEFAULT NULL,
  `sEX` varchar(255) DEFAULT NULL,
  `allergies` varchar(255) DEFAULT NULL,
  `medication_id` int DEFAULT NULL,
  `insurance_id` int DEFAULT NULL,
  `pharm_id` int DEFAULT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patients`
--

LOCK TABLES `patients` WRITE;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `patients` VALUES (21677050,'Lucas Faulkner','594 Linden Lane, Brooklyn, NY 11209','1990-04-20','(520) 435-8466','M','Sulfites',69103,44653,356831288),(22495825,'Saul Castaneda','9053 E. South Ave, Brooklyn, NY 11229','1986-10-31','(626) 771-2375','M','Aspirin',29140,81092,356831288),(24387788,'Lillie McKinney','30 Richardson Ave, Austin, NY 55912 ','1989-09-27','(793) 764-3149 ','F','None',99147,82771,809859023),(38452212,'Jaheim Lim ','18 Henry Street, Circle Pines, NY 55014','1979-12-10','(756) 248-4856 ','M','Penicillin',36679,54614,845046734),(38586612,'Lilly Carson','48 Valley View Dr, Bronx, NY 10456','1986-02-08','(953) 277-5231','F','Penicillin',93617,89369,855771843),(55565439,'Wayne Fitzpatrick','89 Birch Hill Ave, Brooklyn, NY 11213','1978-08-29','(619) 839-4896 ','M','None',20126,68096,356831288),(59244347,'Susannah Good','337 Strawberry Drive, Woodside, NY 11377','1987-09-11','(636) 670-8901','F','None',26866,58371,356831288),(63812412,'David Robinson','115 Howard Street, Livingston, NY 07039','1952-02-05','(564) 831-1322','M','Aspirin',57108,3237,845046734),(63866618,'Zane Allison','512 Armstrong Road, Brooklyn, NY 11204','1975-09-09','(381) 832-1055','M','None',43848,18657,845046734),(73932087,'Christopher Burrows','8600 Deerfield St, Westbury, NY 11590','1990-02-03','(519) 334-2303','M','None',42843,72780,855771843),(76375993,'Lucia Gibbs','422 East Oak Road, Manahawkin, NJ 08050','1988-08-16','(847) 616-2002 ','F','Aspirin',85653,73138,855771843),(76606518,'Esther Wiley','8780 S. Lakewood Ave, Bronx, NY 11423','2004-10-27','(272) 645-2989','F','Salicylate',15073,94818,855771843),(94659360,'Youssef Dawe','258 Greenrose Ave, Bowie, NY 20715','1986-02-08','(242) 569-6172','M','None',15976,30796,809859023),(97001671,'Carolyn Holder','23 Walnut Ave, Huntington, NY 11743','1980-02-04','(980) 516-0606','F','Sulfite',80943,21557,845046734),(97390777,'Forest Grant','1212 Seagate St, Jamaica, NY 11422','1993-12-23','(718) 772-4438','M','Salicylate',18784,21884,809859023),(97390839,'Sahara Brady','926 SE. Hillside St, Lockport, NY 14094','1988-04-15','(442) 940-6324','F','Salicylate',10135,84850,809859023);
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;
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
