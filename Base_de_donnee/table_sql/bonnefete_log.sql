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
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log` (
  `id_log` int NOT NULL AUTO_INCREMENT,
  `action` varchar(100) NOT NULL,
  `id_profil` int NOT NULL,
  `idpost` int DEFAULT NULL,
  `date_action` datetime DEFAULT NULL,
  PRIMARY KEY (`id_log`),
  KEY `id_profil` (`id_profil`),
  KEY `log_ibfk_2` (`idpost`),
  CONSTRAINT `log_ibfk_1` FOREIGN KEY (`id_profil`) REFERENCES `profil` (`id_profil`),
  CONSTRAINT `log_ibfk_2` FOREIGN KEY (`idpost`) REFERENCES `post` (`idpost`)
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (2,'a créé un post',21,NULL,NULL),(3,'a créé un post',38,NULL,NULL),(8,'s\'est connecté',21,NULL,NULL),(9,'a modifié un post',38,NULL,NULL),(10,'a modifié un post',21,NULL,NULL),(14,'s\'est connecté',21,NULL,NULL),(15,'a créé un post',21,NULL,NULL),(16,'a supprimer un post',21,NULL,NULL),(17,'a commenté un post',21,NULL,NULL),(18,'s\'est connecté',38,NULL,NULL),(19,'a commenté un post',38,NULL,NULL),(20,'s\'est connecté',21,NULL,NULL),(23,'s\'est connecté',21,NULL,NULL),(24,'s\'est connecté',21,NULL,NULL),(25,'s est déconnecté',21,NULL,NULL),(26,'s\'est connecté',21,NULL,NULL),(29,'s\'est connecté',21,NULL,NULL),(30,'a modifié un post',21,NULL,NULL),(31,'a supprimer un post',21,NULL,NULL),(32,'a supprimer un post',21,NULL,NULL),(33,'a créé un post',21,NULL,NULL),(34,'a créé un post',21,NULL,NULL),(35,'a supprimer un post',21,NULL,NULL),(36,'a commenté un post',21,NULL,NULL),(37,'s\'est connecté',38,NULL,NULL),(38,'s\'est connecté',21,NULL,NULL),(42,'s\'est connecté',21,NULL,NULL),(45,'s\'est connecté',21,NULL,NULL),(47,'s\'est connecté',21,NULL,NULL),(50,'s\'est connecté',21,NULL,NULL),(54,'s\'est connecté',21,NULL,NULL),(63,'s\'est connecté',21,NULL,NULL),(68,'a rétrograder un modo',21,NULL,NULL),(69,'a rétrograder un modo',21,NULL,NULL),(70,'a rétrograder un modo',21,NULL,NULL),(71,'a promu un utilisateur au rang de modérateur',21,NULL,NULL),(72,'a rétrograder un modo',21,NULL,NULL),(73,'a promu 22 au rang de modérateur',21,NULL,NULL),(74,'a rétrograder un modo',21,NULL,NULL),(75,'a promu 22 au rang de modérateur',21,NULL,NULL),(76,'s\'est connecté',21,NULL,NULL),(77,'s\'est connecté',21,NULL,NULL),(78,'s\'est connecté',21,NULL,NULL),(79,'a promu un utilisateur au rang de modérateur',21,NULL,NULL),(80,'s\'est connecté',21,NULL,NULL),(81,'a rétrograder un modo',21,NULL,NULL),(82,'s\'est connecté',21,NULL,NULL),(83,'a promu un utilisateur au rang de modérateur',21,NULL,NULL),(85,'s\'est connecté',21,NULL,NULL),(86,'a rétrograder un modo',21,NULL,NULL),(87,'a promu  au rang de modérateur',21,NULL,NULL),(88,'a promu  au rang de modérateur',21,NULL,NULL),(89,'a rétrograder un modo',21,NULL,NULL),(90,'a rétrograder un modo',21,NULL,NULL),(91,'a promu  au rang de modérateur',21,NULL,NULL),(92,'a rétrograder un modo',21,NULL,NULL),(93,'a promu  au rang de modérateur',21,NULL,NULL),(94,'a rétrograder un modo',21,NULL,NULL),(95,'a promu MARC au rang de modérateur',21,NULL,NULL),(96,'a rétrogradé MARC au rang de modérateur',21,NULL,NULL),(97,'a promu Polo au rang de modérateur',21,NULL,NULL),(98,'a rétrogradé Polo au rang de modérateur',21,NULL,NULL),(99,'s\'est connecté',21,NULL,NULL),(100,'s\'est connecté',21,NULL,NULL),(101,'s\'est connecté',21,NULL,NULL),(102,'a créé un post',21,NULL,NULL),(103,'a modifié un post',21,NULL,NULL),(104,'a commenté un post',21,NULL,NULL),(105,'a supprimer un post',21,NULL,NULL),(106,'a promu MARC au rang de modérateur',21,NULL,NULL),(107,'a rétrogradé MARC au rang de modérateur',21,NULL,NULL),(108,'a promu MARC au rang de modérateur',21,NULL,NULL),(123,'s\'est connecté',21,NULL,NULL),(128,'s\'est connecté',21,NULL,NULL),(133,'s\'est connecté',21,NULL,NULL),(134,'a créé un post',21,NULL,NULL),(135,'a commenté un post',21,NULL,NULL),(136,'a modifié son profil',21,NULL,NULL),(137,'a supprimer un post',21,NULL,NULL),(138,'a supprimer un post',21,NULL,NULL),(139,'a modifié un post',21,NULL,NULL),(140,'a modifié un post',21,NULL,NULL),(144,'s\'est connecté',21,NULL,NULL),(145,'a promu MARC au rang de modérateur',21,NULL,NULL),(146,'a rétrogradé MARC au rang de modérateur',21,NULL,NULL),(147,'a promu MARC au rang de modérateur',21,NULL,NULL),(148,'a promu MARCO au rang de modérateur',21,NULL,NULL),(149,'a rétrogradé MARCO au rang de modérateur',21,NULL,NULL),(150,'a promu Polo au rang de modérateur',21,NULL,NULL),(151,'a rétrogradé Polo au rang de modérateur',21,NULL,NULL),(152,'s\'est connecté',38,NULL,NULL),(153,'a créé un post',38,NULL,NULL),(154,'a modifié un post',38,NULL,NULL),(155,'a supprimer un post',38,NULL,NULL),(156,'s\'est connecté',21,NULL,NULL),(157,'s\'est connecté',21,NULL,NULL),(158,'a créé un post',21,NULL,NULL),(159,'a supprimer un post',21,NULL,NULL),(160,'a supprimer un post',21,NULL,NULL),(162,'s\'est connecté',21,NULL,NULL),(163,'s\'est connecté',21,NULL,NULL),(165,'s\'est connecté',21,NULL,NULL),(166,'s\'est connecté',21,NULL,NULL),(167,'s\'est connecté',21,NULL,NULL),(168,'s\'est connecté',21,NULL,NULL),(169,'s\'est connecté',21,NULL,NULL);
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-06 11:36:19
