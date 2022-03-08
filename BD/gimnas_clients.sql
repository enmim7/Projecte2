-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: gimnas
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `activitats`
--

DROP TABLE IF EXISTS `activitats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activitats` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_sala` int NOT NULL,
  `nom` text NOT NULL,
  `descripcio` text NOT NULL,
  `hora_inici` time DEFAULT NULL,
  `hora_fi` time DEFAULT NULL,
  `img` text NOT NULL,
  `color` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_sala` (`id_sala`),
  CONSTRAINT `activitats_ibfk_1` FOREIGN KEY (`id_sala`) REFERENCES `sales` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activitats`
--

LOCK TABLES `activitats` WRITE;
/*!40000 ALTER TABLE `activitats` DISABLE KEYS */;
INSERT INTO `activitats` VALUES (1,2,'Body balance','Si lo que buscáis es fortalecer músculos y relajaros del estrés de la vida diaria, esta es una de las actividades dirigidas que os permitirán conseguirlo.','19:30:00','19:30:00','img/body_balance.jpg','#A52A2A'),(2,1,'Body Combat','Esta clase de ejercicio cardiovascular es perfecta para soltar adrenalina y liberar las tensiones del día a día.','20:00:00','21:00:00','img/body_combat.jpg','#7FFF00'),(3,3,'Body Pump','Una clase muy divertida que tiene el objetivo de tonificar la musculación.','13:00:00','14:00:00','img/body_pump.jpg','#6495ED'),(4,4,'HIIT','Una clase muy divertida que tiene el objetivo de tonificar la musculación.','12:00:00','13:00:00','img/HIIT.jpg','#B8860B'),(5,5,'Zumba','esta clase es para vosotros. Baile, diversión y ejercicio. Todo en uno. ','19:00:00','20:00:00','img/zumba.jpg','#006400'),(6,6,'Ciclo indoor','O lo que se conoce como spinning. Son clases colectivas ante una gran pantalla que nos muestra un paisaje virtual por el que realizaremos nuestro recorrido.  ','19:00:00','20:00:00','img/zumba.jpg','#0000CD'),(7,7,'Yoga',' Y si quieres ir al gym con amigos pero algún día no te apetece sudar la gota gorda, haced un poco de yoga para liberar tensiones del cuerpo y de la mente.','19:00:00','20:00:00','img/yoga.jpg','#FF8C00'),(8,8,'Pilates',' Aunque el pilates parezca una clase relajada, para nada lo es.','12:00:00','13:00:00','img/pilates.jpg','#FFD700');
/*!40000 ALTER TABLE `activitats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alt_baix`
--

DROP TABLE IF EXISTS `alt_baix`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alt_baix` (
  `id` int NOT NULL,
  `dni` varchar(255) NOT NULL,
  `data_alta` date DEFAULT NULL,
  `data_baix` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dni` (`dni`),
  CONSTRAINT `alt_baix_ibfk_1` FOREIGN KEY (`id`) REFERENCES `historial` (`id`),
  CONSTRAINT `alt_baix_ibfk_2` FOREIGN KEY (`dni`) REFERENCES `clients` (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alt_baix`
--

LOCK TABLES `alt_baix` WRITE;
/*!40000 ALTER TABLE `alt_baix` DISABLE KEYS */;
/*!40000 ALTER TABLE `alt_baix` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `dni` varchar(255) NOT NULL,
  `nom` text NOT NULL,
  `cognom` text NOT NULL,
  `data_naix` date NOT NULL,
  `telefon` int NOT NULL,
  `condicio` text,
  `correu` text,
  `IBAN` text NOT NULL,
  `login` text NOT NULL,
  `sexe` text NOT NULL,
  `comunicacio` varchar(45) NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES ('19089019K','Laura','Garcia','1991-08-08',650950179,'no','laura@gmail.com','ES6000491500051234567892','laura','F','si'),('30050072P','Ramon','Ruiz','1990-01-01',660686765,'lesio ma','ramon@gmail.com','ES9420805801101234567891','ramon@gmail.com','M','no'),('35526997R','nasd','asd','2002-02-22',654545454,NULL,'n@g.com','ES2114693860786047203030','DAM2','F','Si'),('45065019L','Marc','Marti','2003-07-08',696969695,'no','marc@gmail.com','ES9420805801000434567891','marc','M','si'),('45096018G','Joan','Puix','2000-04-01',698333838,'no','joan@gmail.com','ES7100302053091234567895','joan','M','no'),('50086519R','Maria','Prats','2001-07-02',699689689,'no','maria@gmail.com','ES1720852066623456789011	','maria','F','si'),('56076019J','Marti','Pol','1999-04-02',654555654,'lesio peu','marti@gmail.com','ES9000246999501234567891','marti','M','no'),('56078019H','Josep','Pla','1994-06-01',660677765,'no','josep@gmail.com','ES7100302053091234567895','josep','M','si'),('78097017L','David','Gf','1998-01-01',682756867,'si','david@gmail.com','ES1000492352082414205416','david','M','no'),('78097019J','Prova','Adeu','1990-02-01',682758500,NULL,'prova@gmail.com','ES8401826429178542255122','prova','M','No'),('87095019K','Alba','Martinez','2001-07-02',682543212,'no','alba@gmail.com','ES1720852066623456755412	','alba','F','no'),('89045018L','Nazar','Yakovyna','2001-05-07',625433232,'no','nazar@gmail.com','ES9000246912501234567891','nazar','M','no');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colectives`
--

DROP TABLE IF EXISTS `colectives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `colectives` (
  `id` int NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `colectives_ibfk_1` FOREIGN KEY (`id`) REFERENCES `activitats` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colectives`
--

LOCK TABLES `colectives` WRITE;
/*!40000 ALTER TABLE `colectives` DISABLE KEYS */;
INSERT INTO `colectives` VALUES (1),(2),(3),(4);
/*!40000 ALTER TABLE `colectives` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curses`
--

DROP TABLE IF EXISTS `curses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `curses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `data_cursa` date NOT NULL,
  `hora` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curses`
--

LOCK TABLES `curses` WRITE;
/*!40000 ALTER TABLE `curses` DISABLE KEYS */;
/*!40000 ALTER TABLE `curses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dies`
--

DROP TABLE IF EXISTS `dies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_dia` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dies`
--

LOCK TABLES `dies` WRITE;
/*!40000 ALTER TABLE `dies` DISABLE KEYS */;
INSERT INTO `dies` VALUES (1,'Diumenge'),(2,'Dilluns'),(3,'Dimarts'),(4,'Dimecres'),(5,'Dijous'),(6,'Divendres'),(7,'Dissabte');
/*!40000 ALTER TABLE `dies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `es_fa`
--

DROP TABLE IF EXISTS `es_fa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `es_fa` (
  `id_activitat` int NOT NULL,
  `id_dia` int NOT NULL,
  PRIMARY KEY (`id_activitat`,`id_dia`),
  KEY `id_dia` (`id_dia`),
  CONSTRAINT `es_fa_ibfk_1` FOREIGN KEY (`id_activitat`) REFERENCES `activitats` (`id`),
  CONSTRAINT `es_fa_ibfk_2` FOREIGN KEY (`id_dia`) REFERENCES `dies` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `es_fa`
--

LOCK TABLES `es_fa` WRITE;
/*!40000 ALTER TABLE `es_fa` DISABLE KEYS */;
INSERT INTO `es_fa` VALUES (1,2),(2,2),(5,2),(3,3),(6,3),(7,3),(4,5),(8,5);
/*!40000 ALTER TABLE `es_fa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historial`
--

DROP TABLE IF EXISTS `historial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historial` (
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial`
--

LOCK TABLES `historial` WRITE;
/*!40000 ALTER TABLE `historial` DISABLE KEYS */;
INSERT INTO `historial` VALUES (1),(2),(3),(4);
/*!40000 ALTER TABLE `historial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `individuals`
--

DROP TABLE IF EXISTS `individuals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `individuals` (
  `id` int NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `individuals_ibfk_1` FOREIGN KEY (`id`) REFERENCES `activitats` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `individuals`
--

LOCK TABLES `individuals` WRITE;
/*!40000 ALTER TABLE `individuals` DISABLE KEYS */;
INSERT INTO `individuals` VALUES (5),(6),(7),(8);
/*!40000 ALTER TABLE `individuals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monitors`
--

DROP TABLE IF EXISTS `monitors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `monitors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_sala` int NOT NULL,
  `nom` text NOT NULL,
  `cognom` text NOT NULL,
  `data_naix` date NOT NULL,
  `telefon` int NOT NULL,
  `salari` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_sala` (`id_sala`),
  CONSTRAINT `monitors_ibfk_1` FOREIGN KEY (`id_sala`) REFERENCES `sales` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monitors`
--

LOCK TABLES `monitors` WRITE;
/*!40000 ALTER TABLE `monitors` DISABLE KEYS */;
INSERT INTO `monitors` VALUES (1,1,'Amaya','Giron','2002-10-10',545545545,1000),(2,2,'Nagore ','Cañadas','2002-10-10',545545545,1000),(3,3,'Sagrario','Seco','2002-10-10',545545545,1000),(4,4,'Domingo','Barcelo','2002-10-10',545545545,1000),(5,5,'Antoni','Redondo','2002-10-10',545545545,1000),(6,6,'Julen','Colomer','2002-10-10',545545545,1000),(7,7,'Iryna','Arcos','2002-10-10',545545545,1000),(8,8,'Jimena','Bermejo','2002-10-10',545545545,1000);
/*!40000 ALTER TABLE `monitors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registren`
--

DROP TABLE IF EXISTS `registren`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registren` (
  `id` int NOT NULL,
  `dni` varchar(255) NOT NULL,
  `Data_registre` date NOT NULL,
  PRIMARY KEY (`dni`,`id`),
  KEY `id` (`id`),
  CONSTRAINT `registren_ibfk_1` FOREIGN KEY (`id`) REFERENCES `curses` (`id`),
  CONSTRAINT `registren_ibfk_2` FOREIGN KEY (`dni`) REFERENCES `clients` (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registren`
--

LOCK TABLES `registren` WRITE;
/*!40000 ALTER TABLE `registren` DISABLE KEYS */;
/*!40000 ALTER TABLE `registren` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registrencolect`
--

DROP TABLE IF EXISTS `registrencolect`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registrencolect` (
  `dni` varchar(255) NOT NULL,
  `id_activitat` int NOT NULL,
  `data_act` date DEFAULT NULL,
  `data_reg` date NOT NULL,
  PRIMARY KEY (`id_activitat`,`dni`,`data_reg`),
  KEY `dni` (`dni`),
  CONSTRAINT `registrencolect_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `clients` (`dni`),
  CONSTRAINT `registrencolect_ibfk_2` FOREIGN KEY (`id_activitat`) REFERENCES `colectives` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registrencolect`
--

LOCK TABLES `registrencolect` WRITE;
/*!40000 ALTER TABLE `registrencolect` DISABLE KEYS */;
INSERT INTO `registrencolect` VALUES ('78097017L',3,'2022-03-08','2022-03-08');
/*!40000 ALTER TABLE `registrencolect` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registrenindv`
--

DROP TABLE IF EXISTS `registrenindv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registrenindv` (
  `dni` varchar(255) NOT NULL,
  `id_activitat` int NOT NULL,
  `data_act` date DEFAULT NULL,
  `data_reg` date NOT NULL,
  PRIMARY KEY (`id_activitat`,`dni`,`data_reg`),
  KEY `dni` (`dni`),
  CONSTRAINT `registrenindv_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `clients` (`dni`),
  CONSTRAINT `registrenindv_ibfk_2` FOREIGN KEY (`id_activitat`) REFERENCES `individuals` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registrenindv`
--

LOCK TABLES `registrenindv` WRITE;
/*!40000 ALTER TABLE `registrenindv` DISABLE KEYS */;
/*!40000 ALTER TABLE `registrenindv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcio` text,
  `aforament` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (1,'Sala1',30),(2,'Sala2',20),(3,'Sala3',30),(4,'Sala4',20),(5,'Sala5',30),(6,'Sala6',20),(7,'Sala7',30),(8,'Sala8',20);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-08  8:06:10
