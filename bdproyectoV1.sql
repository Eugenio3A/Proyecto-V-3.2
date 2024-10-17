-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: bdproyectov1
-- ------------------------------------------------------
-- Server version	8.0.39

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
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrador` (
  `idAdmin` int NOT NULL AUTO_INCREMENT,
  `ciNit` varchar(255) NOT NULL DEFAULT '',
  `nombre` varchar(100) NOT NULL,
  `primerApellido` varchar(100) NOT NULL,
  `segundoApellido` varchar(100) NOT NULL,
  `login` varchar(255) NOT NULL DEFAULT '',
  `codigo` varchar(255) NOT NULL DEFAULT '',
  `cargo` varchar(255) NOT NULL DEFAULT '',
  `activo` tinyint(1) DEFAULT '1',
  `fechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  `id_usuario` smallint DEFAULT NULL,
  PRIMARY KEY (`idAdmin`),
  KEY `id_usuario` (`id_usuario`),
  KEY `idx_administrador_login` (`login`),
  CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES (1,'2546213','Daniel','castro','dorado','daniel','b5ea8985533defbf1d08d5ed2ac8fe9b','Tarde',1,'2024-09-02 00:45:01',NULL,NULL);
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conductores`
--

DROP TABLE IF EXISTS `conductores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `conductores` (
  `id_conductor` smallint NOT NULL AUTO_INCREMENT,
  `foto` varchar(45) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `primerApellido` varchar(100) NOT NULL,
  `segundoApellido` varchar(100) NOT NULL,
  `licencia` varchar(50) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `domicilio` varchar(255) DEFAULT NULL,
  `antecedentes` text,
  `disponible` tinyint(1) DEFAULT '1',
  `detalle` tinyint(1) DEFAULT '1',
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  `idUsuario` smallint NOT NULL,
  `id_vehiculo` smallint DEFAULT NULL,
  PRIMARY KEY (`id_conductor`),
  UNIQUE KEY `licencia` (`licencia`),
  KEY `id_vehiculo` (`id_vehiculo`),
  KEY `idx_conductores_licencia` (`licencia`),
  CONSTRAINT `conductores_ibfk_1` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id_vehiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conductores`
--

LOCK TABLES `conductores` WRITE;
/*!40000 ALTER TABLE `conductores` DISABLE KEYS */;
INSERT INTO `conductores` VALUES (1,'2.jpg','PEDRO','MARTINES','JUAREZ','241535','6586223','av.blanco galindo Km7',NULL,1,1,'2024-09-02 02:03:46',NULL,0,NULL),(2,'','MANUEL','MEDRANO','APAZA','12546332','75643565','calle las flores n 5325',NULL,1,1,'2024-10-02 04:20:04',NULL,0,NULL),(3,'','JUAN','CASTRO','MEDRANO','5435663','64349394','av.Blanco galindo km7',NULL,1,1,'2024-10-02 05:41:42',NULL,0,NULL),(4,'','MARIO','MAMANI','MENDES','4526852','78524634','calle amiraya y heroinas',NULL,1,1,'2024-10-02 05:45:45',NULL,0,NULL);
/*!40000 ALTER TABLE `conductores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gerente`
--

DROP TABLE IF EXISTS `gerente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gerente` (
  `idGerente` int NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL DEFAULT '',
  `codigo` varchar(255) NOT NULL DEFAULT '',
  `tipo` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`idGerente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gerente`
--

LOCK TABLES `gerente` WRITE;
/*!40000 ALTER TABLE `gerente` DISABLE KEYS */;
INSERT INTO `gerente` VALUES (1,'eugenio','c0ecb37749cbe64e5c8ac4d35eec3e54','admin'),(2,'karen','c0ecb37749cbe64e5c8ac4d35eec3e54','invitado');
/*!40000 ALTER TABLE `gerente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagos`
--

DROP TABLE IF EXISTS `pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pagos` (
  `id_pago` int NOT NULL AUTO_INCREMENT,
  `monto` decimal(10,2) NOT NULL,
  `metodo` enum('transferencia_QR','tigo_money','tarjeta_debito') DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `fecha_pago` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  `idUsuario` smallint NOT NULL,
  `id_reserva` smallint DEFAULT NULL,
  PRIMARY KEY (`id_pago`),
  KEY `id_reserva` (`id_reserva`),
  KEY `idx_pagos_fecha_pago` (`fecha_pago`),
  CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_reserva`) REFERENCES `reservas` (`id_reserva`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos`
--

LOCK TABLES `pagos` WRITE;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
INSERT INTO `pagos` VALUES (1,10.45,'transferencia_QR',1,'2024-10-05 03:58:33',NULL,2,1),(2,7.15,'transferencia_QR',1,'2024-10-05 04:01:36',NULL,1,4);
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `propietarios`
--

DROP TABLE IF EXISTS `propietarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `propietarios` (
  `id_propietario` smallint NOT NULL AUTO_INCREMENT,
  `ciNit` varchar(255) NOT NULL DEFAULT '',
  `nombre` varchar(100) NOT NULL,
  `primerApellido` varchar(100) NOT NULL,
  `segundoApellido` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `domicilio` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idUsuario` smallint NOT NULL,
  PRIMARY KEY (`id_propietario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propietarios`
--

LOCK TABLES `propietarios` WRITE;
/*!40000 ALTER TABLE `propietarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `propietarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publicidad`
--

DROP TABLE IF EXISTS `publicidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `publicidad` (
  `id_publicidad` int NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `tipo` enum('banner','popup','video') NOT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `fecha_inicio` timestamp NOT NULL,
  `fecha_fin` timestamp NOT NULL,
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  `idUsuario` smallint NOT NULL,
  PRIMARY KEY (`id_publicidad`),
  KEY `idx_publicidad_fecha_inicio` (`fecha_inicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicidad`
--

LOCK TABLES `publicidad` WRITE;
/*!40000 ALTER TABLE `publicidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `publicidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puestosparqueo`
--

DROP TABLE IF EXISTS `puestosparqueo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `puestosparqueo` (
  `idPuesto` smallint NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `descripcion` varchar(250) NOT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `fechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  `idUsuario` smallint NOT NULL,
  PRIMARY KEY (`idPuesto`),
  KEY `idx_puestosParqueo_nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puestosparqueo`
--

LOCK TABLES `puestosparqueo` WRITE;
/*!40000 ALTER TABLE `puestosparqueo` DISABLE KEYS */;
/*!40000 ALTER TABLE `puestosparqueo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reclamos`
--

DROP TABLE IF EXISTS `reclamos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reclamos` (
  `id_reclamo` smallint NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `estado` enum('pendiente','resuelto','cerrado') DEFAULT 'pendiente',
  `fechaReclamo` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NOT NULL,
  `idUsuario` smallint NOT NULL,
  `id_usuario` smallint DEFAULT NULL,
  PRIMARY KEY (`id_reclamo`),
  KEY `id_usuario` (`id_usuario`),
  KEY `idx_reclamos_fechaReclamo` (`fechaReclamo`),
  CONSTRAINT `reclamos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reclamos`
--

LOCK TABLES `reclamos` WRITE;
/*!40000 ALTER TABLE `reclamos` DISABLE KEYS */;
/*!40000 ALTER TABLE `reclamos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservas`
--

DROP TABLE IF EXISTS `reservas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservas` (
  `id_reserva` smallint NOT NULL AUTO_INCREMENT,
  `fechaReserva` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaServicio` timestamp NOT NULL,
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  `estado` enum('pendiente','confirmada','completada','cancelada') DEFAULT 'pendiente',
  `idUsuario` smallint NOT NULL,
  `origen` varchar(255) NOT NULL,
  `destino` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `id_usuario` smallint DEFAULT NULL,
  `id_vehiculo` smallint DEFAULT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_vehiculo` (`id_vehiculo`),
  KEY `idx_reservas_fechaServicio` (`fechaServicio`),
  CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id_vehiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservas`
--

LOCK TABLES `reservas` WRITE;
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
INSERT INTO `reservas` VALUES (1,'2024-09-02 14:26:47','0000-00-00 00:00:00',NULL,'pendiente',0,'','',0.00,NULL,2),(2,'2024-09-02 14:29:54','0000-00-00 00:00:00',NULL,'pendiente',0,'','',0.00,NULL,2),(3,'2024-09-02 14:40:46','0000-00-00 00:00:00',NULL,'pendiente',0,'','',0.00,NULL,2),(4,'2024-09-02 14:45:02','0000-00-00 00:00:00',NULL,'pendiente',0,'','',0.00,NULL,2),(5,'2024-09-02 14:48:48','0000-00-00 00:00:00',NULL,'pendiente',0,'','',0.00,NULL,1),(6,'2024-09-02 14:51:48','0000-00-00 00:00:00',NULL,'pendiente',0,'','',0.00,NULL,3),(7,'2024-09-02 14:58:08','0000-00-00 00:00:00',NULL,'pendiente',0,'','',0.00,NULL,1),(8,'2024-09-02 15:01:16','0000-00-00 00:00:00',NULL,'pendiente',0,'','',0.00,9,3),(9,'2024-09-02 15:02:43','0000-00-00 00:00:00',NULL,'pendiente',0,'','',0.00,10,2),(10,'2024-09-02 17:00:25','0000-00-00 00:00:00',NULL,'pendiente',0,'','',0.00,13,2),(11,'2024-09-02 17:02:05','0000-00-00 00:00:00',NULL,'pendiente',0,'','',0.00,14,3),(12,'2024-09-02 17:07:47','0000-00-00 00:00:00',NULL,'pendiente',0,'','',0.00,16,1),(13,'2024-09-02 19:44:48','0000-00-00 00:00:00',NULL,'pendiente',0,'CALLE LAS FLORES N1432','AV. BLANCO GALINDO KM8',25.00,NULL,NULL),(14,'2024-09-02 19:44:48','0000-00-00 00:00:00',NULL,'pendiente',0,'','',0.00,13,1),(17,'2024-09-02 20:06:29','0000-00-00 00:00:00',NULL,'pendiente',0,'','',0.00,17,1),(18,'2024-09-02 20:06:55','0000-00-00 00:00:00',NULL,'pendiente',0,'','',0.00,18,1),(19,'2024-09-02 20:27:56','0000-00-00 00:00:00',NULL,'pendiente',0,'CALLE LAS FLORES N1432','AV. BLANCO GALINDO KM8',25.00,NULL,NULL),(20,'2024-09-02 20:27:56','0000-00-00 00:00:00',NULL,'pendiente',0,'','',0.00,NULL,1),(21,'2024-09-02 20:28:14','0000-00-00 00:00:00',NULL,'pendiente',0,'CALLE LAS FLORES N1432','AV. BLANCO GALINDO KM8',25.00,NULL,NULL),(22,'2024-09-02 20:28:14','0000-00-00 00:00:00',NULL,'pendiente',0,'','',0.00,NULL,1),(23,'2024-09-02 20:30:27','0000-00-00 00:00:00',NULL,'pendiente',0,'CALLE LAS FLORES N1489','AV. BLANCO GALINDO KM8',30.00,NULL,NULL),(24,'2024-09-02 20:30:27','0000-00-00 00:00:00',NULL,'pendiente',0,'','',0.00,NULL,3),(25,'2024-09-02 20:34:54','0000-00-00 00:00:00',NULL,'pendiente',0,'','',0.00,19,3),(26,'2024-09-02 20:44:18','0000-00-00 00:00:00',NULL,'pendiente',0,'','',0.00,22,1);
/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id_rol` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text,
  PRIMARY KEY (`id_rol`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitudes`
--

DROP TABLE IF EXISTS `solicitudes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitudes` (
  `idsolicitudes` int NOT NULL,
  `familia` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `numMovil` varchar(10) NOT NULL,
  `tipoMovil` varchar(25) NOT NULL,
  `fotoMovil` varchar(45) NOT NULL,
  `nombreConductor` varchar(45) NOT NULL,
  `nombreParqueo` varchar(45) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NOT NULL,
  PRIMARY KEY (`idsolicitudes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitudes`
--

LOCK TABLES `solicitudes` WRITE;
/*!40000 ALTER TABLE `solicitudes` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitudes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id_usuario` smallint NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `familia` varchar(150) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `id_rol` int DEFAULT NULL,
  `fechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  `idUsuario` smallint NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_rol` (`id_rol`),
  KEY `idx_usuarios_telefono` (`telefono`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'ZAHIR','MORALES','6586223','CALL.AROMA Y JUNIN',1,NULL,'2024-09-02 02:57:04',NULL,0),(2,'PEDRO','MORALES','6586223','CALL.JORDAN Y CALL. 25 DE MAYO',1,NULL,'2024-09-02 14:26:47',NULL,0),(3,'PEDRO','MMANI','75566522','CALL.AROMA Y JUNIN',1,NULL,'2024-09-02 14:29:54',NULL,0),(4,'DANIEL','MORALES','79886736','CALL. LA PAZ Y AV. AYACUCHO',1,NULL,'2024-09-02 14:40:46',NULL,0),(5,'MARIO','MORALES','78653456','AV,BLANCOGALINDO KM7',1,NULL,'2024-09-02 14:45:02',NULL,0),(8,'RAMIRO ','MENDES','7654392','CALL. LA PAZ Y AV. AYACUCHO',1,NULL,'2024-09-02 14:58:08',NULL,0),(9,'JUAN','NOGALES','65383522','CALL. LA PAZ Y AV. AYACUCHO',1,NULL,'2024-09-02 15:01:16',NULL,0),(10,'MANUEL','MMANI','76453451','CALL. LA PAZ Y AV. AYACUCHO',1,NULL,'2024-09-02 15:02:43',NULL,0),(11,'NOARA','QUINTEROS','67525326','CALL.AMIRAYA Y HEROINAS',1,NULL,'2024-09-02 16:57:18',NULL,0),(12,'DONATO','QUIROS','65542356','CALL.JORDAN Y CALL. 25 DE MAYO',1,NULL,'2024-09-02 16:59:14',NULL,0),(13,'JUAN','MORALES','73822362','AV,BLANCOGALINDO KM7',1,NULL,'2024-09-02 17:00:25',NULL,0),(14,'MANUEL','MORALES','79298323','CALL.AMIRAYA Y HEROINAS',1,NULL,'2024-09-02 17:02:05',NULL,0),(16,'MANUEL','MORALES','34533252','AV,BLANCOGALINDO KM7',1,NULL,'2024-09-02 17:07:47',NULL,0),(17,'','',NULL,'',1,NULL,'2024-09-02 20:06:29',NULL,0),(18,'MARIO','MORALES','76645484','CALL.JORDAN Y CALL. 25 DE MAYO',1,NULL,'2024-09-02 20:06:55',NULL,0),(19,'MANUEL','QUINTEROS','64838223','CALL.JORDAN Y CALL. 25 DE MAYO',1,NULL,'2024-09-02 20:34:54',NULL,0),(22,'MARIO','MORALES','67388821','AV,BLANCOGALINDO KM7',1,NULL,'2024-09-02 20:44:18',NULL,0);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculos`
--

DROP TABLE IF EXISTS `vehiculos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehiculos` (
  `id_vehiculo` smallint NOT NULL AUTO_INCREMENT,
  `numMovil` varchar(255) NOT NULL DEFAULT '',
  `modelo` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `placa` varchar(20) NOT NULL,
  `tipo` enum('taxi','vagoneta','taxi_familiar','mudanza') NOT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `fechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  `idUsuario` smallint NOT NULL,
  `idPuesto` smallint DEFAULT NULL,
  `id_propietario` smallint DEFAULT NULL,
  `foto` varchar(45) NOT NULL,
  PRIMARY KEY (`id_vehiculo`),
  UNIQUE KEY `placa` (`placa`),
  KEY `idPuesto` (`idPuesto`),
  KEY `id_propietario` (`id_propietario`),
  KEY `idx_vehiculos_placa` (`placa`),
  CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`idPuesto`) REFERENCES `puestosparqueo` (`idPuesto`),
  CONSTRAINT `vehiculos_ibfk_2` FOREIGN KEY (`id_propietario`) REFERENCES `propietarios` (`id_propietario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculos`
--

LOCK TABLES `vehiculos` WRITE;
/*!40000 ALTER TABLE `vehiculos` DISABLE KEYS */;
INSERT INTO `vehiculos` VALUES (1,'45','1899','TOYOTA','1452BES','taxi',1,'2024-09-02 01:25:52',NULL,0,NULL,NULL,'5.jpg'),(2,'20','1999','TOYOTA','7554JHK','vagoneta',1,'2024-09-02 14:05:22',NULL,0,NULL,NULL,'2.jpg'),(3,'85','2010','TOYOTA','4582DER','taxi',1,'2024-09-02 14:22:31',NULL,0,NULL,NULL,'5.jpg');
/*!40000 ALTER TABLE `vehiculos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-05 23:46:05
