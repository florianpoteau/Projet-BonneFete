-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bonnefete
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `profil`
--

DROP TABLE IF EXISTS `profil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profil` (
  `id_profil` int NOT NULL AUTO_INCREMENT,
  `email_profil` varchar(100) NOT NULL,
  `mdp_profil` varchar(100) DEFAULT NULL,
  `nom_profil` varchar(30) NOT NULL,
  `id_role` int NOT NULL,
  `idpost` int DEFAULT NULL,
  PRIMARY KEY (`id_profil`),
  KEY `id_role_idx` (`id_role`),
  KEY `idpost` (`idpost`),
  CONSTRAINT `fk_idpost` FOREIGN KEY (`idpost`) REFERENCES `post` (`idpost`),
  CONSTRAINT `id_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`),
  CONSTRAINT `idpost` FOREIGN KEY (`idpost`) REFERENCES `post` (`idpost`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profil`
--

LOCK TABLES `profil` WRITE;
/*!40000 ALTER TABLE `profil` DISABLE KEYS */;
INSERT INTO `profil` VALUES (21,'florianpoteau59@gmail.com','$2y$10$AE2HhP7RULK71sI4d5Z5VOPXbAtXsTl7YNgY7nb9.911pxiW2FWGW','FLORIAN',3,NULL),(22,'florianpoteau1@gmail.com','$2y$10$pvEmlyBt7JrIjedjHY9jjeKHtBQJFLtbEJ2Ij9HK2O5l3tk.A0uH6','MARC',2,NULL),(25,'polo@gmail.com','$2y$10$0HL7LW0vaxP.rVxwxxlIsOxQapA07IebrsofA8dhmEQtO5AAtygly','Polo',1,NULL),(27,'HELLO@hello.com','$2y$10$AdOMB.vxY95WNqVYxW..keJvN/CvSymUab/br0VGLCu34OJ1UxhU2','HELLO',1,NULL),(30,'HOLA@HOLA.com','$2y$10$3qcT6nAETkcXXWctwbtHHejiHXRjEgwIu4E2vttSdvfVACprmbeYK','HOLA',1,NULL),(31,'florian5@gmail.com','$2y$10$f9g9lQpQopa37tQZCfTk3OYADpb/Qez6ZJFKNLP/ZHdWf2ZdmDgwC','FLO',2,NULL),(35,'user@user.com','$2y$10$GtT6WIZiUZSDI4MbFJUEX.q7kYBnddqcGU1V3I98BTiN.gB7U.gAu','user10',1,NULL),(36,'flor@flor.com','$2y$10$8fWxS20L4lY/2h6tlEUH6.MunjS5DnhBOmbVUlUx9p6BnxNR8M4IK','florian',1,NULL),(38,'marcANT@gmail.com','$2y$10$n0vAPIHnOoZCIpKGyeACSOTgmyjWBJXSWT7QSsAha/X5vw5uKSHZK','MARCO',1,NULL),(39,'googlechrome@gmail.com','$2y$10$1WxSgLr1uHZaSurgDJ33K.Ku05AriokVUKzzKhpGX6tPyBGZfGI/W','googlechrome',1,NULL);
/*!40000 ALTER TABLE `profil` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-04 11:47:58
