-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: school
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `cours`
--

DROP TABLE IF EXISTS `cours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `language` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cours`
--

LOCK TABLES `cours` WRITE;
/*!40000 ALTER TABLE `cours` DISABLE KEYS */;
INSERT INTO `cours` VALUES (1,'1525','Test class','Python'),(2,'1020','La force','Java'),(3,'1000','Padawan','C++');
/*!40000 ALTER TABLE `cours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etudiant`
--

LOCK TABLES `etudiant` WRITE;
/*!40000 ALTER TABLE `etudiant` DISABLE KEYS */;
INSERT INTO `etudiant` VALUES (1,'Alain','Soral','alain.robert@gmail.com','abcdef'),(2,'','','',''),(6,'Bob','Soral','alain.rabert@gmail.com','ba7816bf8f01cfea414140de5dae2223b00361a396177a9cb4'),(7,'ABVC','azeaeaz','root','fb8e20fc2e4c3f248c60c39bd652f3c1347298bb977b8b4d59'),(8,'Eraaa','Soral','soral','a52d159f262b2c6ddb724a61840befc36eb30c88877a4030b65cbe86298449c9'),(9,'Eraaa','Soral','soral','a52d159f262b2c6ddb724a61840befc36eb30c88877a4030b65cbe86298449c9'),(10,'','','','e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855'),(11,'','','','e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855'),(12,'','','','e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855'),(13,'','','','e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855'),(14,'','','','e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855'),(15,'','','','e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855'),(16,'','','','e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855'),(17,'','','','e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855'),(18,'','','','e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855'),(19,'','','','e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855'),(20,'','','','e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855');
/*!40000 ALTER TABLE `etudiant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inscription` (
  `id_cours` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  PRIMARY KEY (`id_cours`,`id_etudiant`),
  KEY `inscription_etudiant0_FK` (`id_etudiant`),
  CONSTRAINT `inscription_cours_FK` FOREIGN KEY (`id_cours`) REFERENCES `cours` (`id`),
  CONSTRAINT `inscription_etudiant0_FK` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscription`
--

LOCK TABLES `inscription` WRITE;
/*!40000 ALTER TABLE `inscription` DISABLE KEYS */;
INSERT INTO `inscription` VALUES (1,1),(1,2),(1,8),(2,2),(2,8),(3,2),(3,8);
/*!40000 ALTER TABLE `inscription` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-25 11:15:49
