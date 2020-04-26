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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-26 14:36:15
