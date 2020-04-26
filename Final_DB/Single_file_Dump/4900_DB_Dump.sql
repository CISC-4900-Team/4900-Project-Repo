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
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee` (
  `emp_id` int NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `emp_address` varchar(255) NOT NULL,
  `emp_city` varchar(255) NOT NULL,
  `emp_state` varchar(255) NOT NULL,
  `emp_zip` int NOT NULL,
  `emp_num` varchar(255) NOT NULL,
  `emp_emergency_num` varchar(255) NOT NULL,
  `emp_license` int NOT NULL,
  `emp_email` varchar(255) NOT NULL,
  `pharm_id` int NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (639083579,'Jimmy Johnson','3363 76TH ST','BROOKLYN','IA',11214,'(347)571-1620','(718)998-6543',342928,'JimmyJ55@YMAIL.COM',845046734),(826850588,'Andy Henry','145-67 127Ave','Cambria Heights','NY',11592,'(929)226-2231','(718)554-2354',723678,'Ahenry1115325540@gmail.com',356831288),(881404202,'HAMMAD MAQSOOD','1864 85TH ST','BROOKLYN','IA',11214,'(347)571-1620','(718)998-6543',342928,'HAMMAD165@YMAIL.COM',356831288);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_info`
--

DROP TABLE IF EXISTS `employee_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee_info` (
  `first_login` varchar(255) NOT NULL,
  `last_login` varchar(255) DEFAULT NULL,
  `pharm_id` int DEFAULT NULL,
  `emp_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_info`
--

LOCK TABLES `employee_info` WRITE;
/*!40000 ALTER TABLE `employee_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance`
--

DROP TABLE IF EXISTS `insurance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `insurance` (
  `insurance_id` int NOT NULL,
  `Insurance_Name` varchar(255) DEFAULT NULL,
  `Policy_Number` int DEFAULT NULL,
  `Deductible` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`insurance_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance`
--

LOCK TABLES `insurance` WRITE;
/*!40000 ALTER TABLE `insurance` DISABLE KEYS */;
INSERT INTO `insurance` VALUES (13237,'BlueCross BlueShield',16565307,'$70.00'),(18657,'United Health',1082926765,'$100.00'),(21557,'Fidelis Healthcare',98078738,'$65.00'),(21884,'Fidelis Healthcare',98078432,'$44.00'),(30796,'UnitedHealth',68134063,'$120.00'),(44653,'Healthfirst',18610488,'$75.00'),(54614,'Emblem Health',19738226,'$43.00'),(58373,'Healthfirst',45640096,'$25.00'),(68096,'Centene Corp',63194356,'$15.00'),(72780,'Healthfirst',28658123,'$60.00'),(73138,'WellCare',14592007,'$18.00'),(81092,'Kaiser Foundation',77912897,'$50.00'),(82771,'Emblem Health',12868767,'$25.00'),(84850,'BlueCross BlueShield',79555838,'$180.00'),(89369,'BlueCross BlueShield',54366394,'$45.00'),(94818,'Cigna Health',91956592,'$35.00');
/*!40000 ALTER TABLE `insurance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventory` (
  `inv_id` int NOT NULL,
  `Total_Stock` varchar(255) DEFAULT NULL,
  `Last_Ord_Date` date DEFAULT NULL,
  `Order_Invoice` varchar(255) DEFAULT NULL,
  `medication_id` int DEFAULT NULL,
  PRIMARY KEY (`inv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medication`
--

DROP TABLE IF EXISTS `medication`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medication` (
  `medication_id` int NOT NULL,
  `medication_Name` varchar(255) DEFAULT NULL,
  `company_Name` varchar(255) DEFAULT NULL,
  `company_Address` varchar(255) DEFAULT NULL,
  `company_Phone_Number` varchar(255) DEFAULT NULL,
  `mSRP` varchar(255) DEFAULT NULL,
  `potency` varchar(255) DEFAULT NULL,
  `side_Effects` varchar(255) DEFAULT NULL,
  `descriptions` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`medication_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medication`
--

LOCK TABLES `medication` WRITE;
/*!40000 ALTER TABLE `medication` DISABLE KEYS */;
INSERT INTO `medication` VALUES (10135,'Lyrica','Bristol-Myers Squibb Company','430 E. 29th Street, 14th Floor, New York, NY 10016 ','(800)-332-2056 ','$35.00','300mg','tightness in the chest','Lyrica is used to treat pain caused by fibromyalgia, or nerve pain in people with diabetes (diabetic neuropathy), herpes zoster (post-herpetic neuralgia), or spinal cord injury.   '),(15073,'Ibuprofen','Tris Pharma, Inc. ','Brunswick Business Park, 2033 Route 130, Suite D, Monmouth Junction, NJ 08852 ','(732) 940-2800','$73.00','220mg ','pale skin','Ibuprofen is used to reduce fever and treat pain or inflammation caused by many conditions such as headache, toothache, back pain, arthritis, menstrual cramps, or minor injury. '),(15976,'Xanax','PaxVax Inc. ','900 Veterans Blvd., Ste. 500, Redwood City, CA 94063','(650) 847-1075 ','$20.00','40mg ','feeling sad or empty ','Xanax is used to treat anxiety disorders, panic disorders, and anxiety caused by depression.  '),(18784,'Fypreium','NetSys','9131 Harvard Drive, Mechanicsburg, PA 17050','(959) 387-5333','$37.00','400mg','Stomach Cramps','Trazodone is an antidepressant .It affects chemicals in the brain that may be unbalanced in people with depression.'),(20126,'Doxycycline','Heritage Pharmaceuticals Inc. ','105 Fieldcrest Avenue, Suite 100, Edison, New Jersey 08837','(732) 429-1000  ','$53.00','180mg ','hives or welts, itching, or rash','Doxycycline is a tetracycline antibiotic that fights bacteria in the body. '),(26866,'Lexapro','Hope Pharmaceuticals ','16416 N. 92nd Street #125, Scottsdale, AZ 85260 ','(800) 755-9595','$42.00','15mg ','shortness of breath  ','Lexapro is used to treat anxiety in adults  '),(29140,'Amoxicillin','Eagle Pharmaceuticals, Inc. ','50 Tice Blvd, Suite 315, Woodcliff Lake, N.J. 07677','(201) 326-5300  ','$52.00','32mg ','Inflammation of the joints ','Amoxicillin is used to treat many different types of infection caused by bacteria, such as tonsillitis, bronchitis, pneumonia, and infections of the ear, nose, throat, skin, or urinary tract.  '),(36679,'Meloxicam','Acella Pharmaceuticals, LLC','1880 McFarland Parkway Suite 110-B, Alpharetta, GA 30005','(678) 325-5189 ','$58.00','15mg ','Dark Urine','Meloxicam is a nonsteroidal anti-inflammatory drug (NSAID). It works by reducing hormones that cause inflammation and pain in the body. '),(42843,'Lorazepam','IIex Consumer Products Group, Inc','323 West Camden Street, Suite 700, Baltimore, MD 21201 ','(410) 897-0701 ','$55.00','120mg ','Dry Mouth','Lorazepam is used to treat anxiety disorders and seizure disorders.  '),(43848,'Viagra','Vyera Pharmaceuticals, LLC ','600 Third Avenue, 10th Floor, New York, NY 10016 ','(646) 356-5577  ','$38.00','100mg','burning feeling in the chest or stomach  ','Viagra (sildenafil) relaxes muscles found in the walls of blood vessels and increases blood flow to particular areas of the body '),(57108,'Hydrochlorothiazide','Validus Pharmaceuticals LLC','119 Cherry Hill Road – Suite 310, Parsippany, NJ 07054  ','(866)-999-2343  ','$47.00','25mg ','Chest Pain','HCTZ (hydrochlorothiazide) is a thiazide diuretic (water pill) that helps prevent your body from absorbing too much salt, which can cause fluid retention.. '),(69103,'Oxycodone','Heron Therapeutics, Inc.  ','123 Saginaw Drive, Redwood City, CA 94063 ','(650) 366-2626 ','$23.00','150mg ','unusual tiredness or weakness  ','Oxycodone is used to treat moderate to severe pain..  '),(80943,'Cyclobenzaprine','Braintree Laboratories Inc. ','60 Columbian Street West, Braintree, MA 02185','(800) 874-6756 ','$55.00','300mg','unusual thoughts or dreams ','Cyclobenzaprine is a muscle relaxant. It works by blocking nerve impulses (or pain sensations) that are sent to your brain. '),(85653,'Metoprolol','Grifols USA, LLC','2410 Lillyvale Ave, Los Angeles, CA 90032','(888)-666 1782 ','$62.00','170mg ','short-term memory loss','Metoprolol is used to treat angina (chest pain) and hypertension (high blood pressure). '),(93617,'Naproxen','Ironwood Pharmaceuticals, Inc. ','301 Binney Street, Cambridge, MA 02142','(617) 621-7722 ','$30.00','100mg ','vomiting of material that looks like coffee grounds','Naproxen is a nonsteroidal anti-inflammatory drug (NSAID). It works by reducing hormones that cause inflammation and pain in the body.'),(99147,'Zoloft','Neos Therapeutics, Inc.','2940 N. Hwy 360, Suite 400, Grand Prairie, TX 75050 ','(972) 408-1300 ','$40.00','50–200mg  ','breast tenderness or enlargement ','Zoloft is used to treat depression, obsessive-compulsive disorder, panic disorder, anxiety disorders, post-traumatic stress disorder (PTSD), and premenstrual dysphoric disorder (PMDD) ');
/*!40000 ALTER TABLE `medication` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `pharmacies`
--

DROP TABLE IF EXISTS `pharmacies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pharmacies` (
  `pharm_id` int NOT NULL,
  `pharm_name` varchar(255) NOT NULL,
  `pharm_addr` varchar(255) NOT NULL,
  `pharm_city` varchar(255) NOT NULL,
  `pharm_state` char(255) NOT NULL,
  `pharm_zip` varchar(255) NOT NULL,
  `pharm_phone_number1` varchar(255) NOT NULL,
  `store_phone_number2` varchar(255) DEFAULT NULL,
  `pharm_email` varchar(255) NOT NULL,
  PRIMARY KEY (`pharm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pharmacies`
--

LOCK TABLES `pharmacies` WRITE;
/*!40000 ALTER TABLE `pharmacies` DISABLE KEYS */;
INSERT INTO `pharmacies` VALUES (356831288,'Walgreens','11902 Rockaway Blvd','South Ozone Park,','NY','11305','(718)529-9503','(718)225-9856','Walgreens1288@gmail.com'),(809859023,'Walgreens','334-66 Empire Blvd','Brooklyn,','NY','11233','(718) 666-0713','(718)991-9991','Walgreens9023@gmail.com'),(845046734,'Walgreens','13599 Clition Street','Fresh Meadows,','NY','88263','(718) 895-0213','(718)632-9912','Walgreens6734@gmail.com'),(855771843,'Walgreens','18802 Beach Drive','Far Rockaway,','NY','99274','(718) 888-9323','(718)452-0012','Walgreens1843@gmail.com');
/*!40000 ALTER TABLE `pharmacies` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `transactions_invoice`
--

DROP TABLE IF EXISTS `transactions_invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transactions_invoice` (
  `trans_id` int NOT NULL,
  `total_cost` varchar(255) DEFAULT NULL,
  `Trans_date` varchar(255) DEFAULT NULL,
  `patient_id` int DEFAULT NULL,
  `payment_id` int DEFAULT NULL,
  `medication_id` int DEFAULT NULL,
  `prescription_id` int DEFAULT NULL,
  `emp_id` int DEFAULT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions_invoice`
--

LOCK TABLES `transactions_invoice` WRITE;
/*!40000 ALTER TABLE `transactions_invoice` DISABLE KEYS */;
/*!40000 ALTER TABLE `transactions_invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'final_project_db'
--

--
-- Dumping routines for database 'final_project_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-26 15:16:02
