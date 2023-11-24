-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: universidad
-- ------------------------------------------------------
-- Server version	8.0.34

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
-- Table structure for table `calificaciones`
--

DROP TABLE IF EXISTS `calificaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `calificaciones` (
  `calificacion` int DEFAULT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `mensajes` varchar(150) DEFAULT NULL,
  `id_usuario` int DEFAULT NULL,
  `id_materia` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `calificaciones_FK` (`id_usuario`),
  KEY `calificaciones_FK_1` (`id_materia`),
  CONSTRAINT `calificaciones_FK` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  CONSTRAINT `calificaciones_FK_1` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calificaciones`
--

LOCK TABLES `calificaciones` WRITE;
/*!40000 ALTER TABLE `calificaciones` DISABLE KEYS */;
INSERT INTO `calificaciones` VALUES (99,1,'Excelente',7,NULL),(76,2,'Medio',25,NULL),(94,9,' Excelent',6,NULL),(65,14,'Medio',25,NULL),(75,16,' Bien hecho pero puede ser mejor',27,1);
/*!40000 ALTER TABLE `calificaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clases`
--

DROP TABLE IF EXISTS `clases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clases` (
  `id_clases` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int DEFAULT NULL,
  `id_materia` int NOT NULL,
  PRIMARY KEY (`id_clases`),
  KEY `clases_FK` (`id_materia`),
  KEY `clases_FK_1` (`id_usuario`),
  CONSTRAINT `clases_FK` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `clases_FK_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clases`
--

LOCK TABLES `clases` WRITE;
/*!40000 ALTER TABLE `clases` DISABLE KEYS */;
INSERT INTO `clases` VALUES (1,7,1),(3,24,2),(4,18,3),(5,6,1),(6,25,1),(7,25,3),(8,NULL,5),(9,18,6),(12,11,7),(14,6,7),(15,26,7),(16,26,11),(17,27,1),(19,27,7),(20,27,4),(22,27,2),(23,27,3),(25,27,6),(29,27,11);
/*!40000 ALTER TABLE `clases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materias`
--

DROP TABLE IF EXISTS `materias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `materia` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materias`
--

LOCK TABLES `materias` WRITE;
/*!40000 ALTER TABLE `materias` DISABLE KEYS */;
INSERT INTO `materias` VALUES (1,'Matematica'),(2,'Biologia'),(3,'Geometria'),(4,'Astronomia'),(5,'Astronomia'),(6,'Fisica'),(7,'Contaduria'),(8,'Radio'),(9,'Rayo'),(10,'Testeo'),(11,'Economia');
/*!40000 ALTER TABLE `materias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `rol` tinyint DEFAULT NULL,
  `DNI` varchar(20) DEFAULT NULL,
  `adress` varchar(100) DEFAULT NULL,
  `born_date` date DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (5,'admin','admin@admin',1,'45678913654','C Uruguay #512','1998-12-02','$2y$10$uPRKM7XugTLj6RNAAjy1wO0C7kbCE2tdWCDGUGKpWiMSXiyE0D5GC'),(6,'Roberto','rio@rio',3,'45698713546','C Jacinto Diaz','1994-03-04','$2y$10$YQJ/jlCQiXubBqddvYgAa.h3Sfl9OLjpr9xJ.t/HZ9o0gHREXaSEq'),(7,'maestro','maestro@maestro',2,'45612389756','C. Diaz Romero','1987-05-22','$2y$10$T.eIOH8Lwg35O.8p1EYBi.zjx1.Mpyvx7/mTGyoagWLPs92j5j.SG'),(11,'Matias Clavijo','demo@demo.com',2,NULL,'Av. Mario Mercado','1999-06-24','$2y$10$bt/GA.0t6j1RPHuu2gDhi.EL88y7reFM70Xbgh2P88meCtVNeDxJ.'),(18,'Daniela Rios','hhumby1@example.com',2,NULL,'Zona COtahuma','2000-09-13','$2y$10$fzKWTyKOW3XDrCDN3Z81kOztL9t9W0UvS8P.Vsmgdn2U7vuzp7GUu'),(24,'Eduardo Cancelo','phuffman@vt.edu',2,NULL,'Rio Seco #2','1998-02-19','$2y$10$STKsSTiqVj1ALhbPk4IYfO9wttMfvMZkA8ubGAF8tdVf0LrC2MVde'),(25,'Marcelo Gaucho','correo@correo1',3,'45698713545','Brasil, C. sao polo','2016-06-08','$2y$10$8qJ/mM4uWI.P7xGdPzD/7.k1AdDopcxoTMnZp.uU2N5H1mwWD2ebO'),(26,'Joaquin Alvarez Chacon','alvarezchacon@gmail.com',2,NULL,'Av. 20 de Octubre','1983-07-12','$2y$10$ILG1VdTpV5HgF8bapbLkJOle4HGyCU8Hi0HDDjKM9NWUBXQWNhpc2'),(27,'alumno','alumno@alumno',3,'21648798456','C. Asunto Diaz','2007-02-19','$2y$10$RDkBlt7..O7AcTIoJG4p8u8d4mXwsX79US.LjFHEz/1EOWSVyZKZ.');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'universidad'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-24 15:27:42
