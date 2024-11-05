-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: bdproyectov2
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
-- Table structure for table `cargos`
--

DROP TABLE IF EXISTS `cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cargos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombreCargo` varchar(100) NOT NULL,
  `descripcion` text,
  `fechaCreacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombreCargo` (`nombreCargo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargos`
--

LOCK TABLES `cargos` WRITE;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
INSERT INTO `cargos` VALUES (1,'ADMINISTRADOR','Este usuario se encarga de administrar todo el sitema, quien tiene acceso a todas las listas y solicitudes.','2024-10-17 20:54:34','2024-10-17 20:54:34'),(2,'EMPLEADO','Este usuario se encarga de resepcionar llamadas y monitorear a los conductores','2024-10-17 20:54:34','2024-10-27 03:16:36'),(3,'EMPLEADORESERVA','Lafuncion de este usuario sera resepcionar la solisitudes cuando un empleado suele estar de baja','2024-10-17 20:54:34','2024-10-27 03:16:36');
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `idCliente` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `habilitado` tinyint(1) NOT NULL DEFAULT '1',
  `fechaUltimaActualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idUsuario` smallint NOT NULL,
  PRIMARY KEY (`idCliente`),
  UNIQUE KEY `telefono` (`telefono`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'MANUEL','74664399','CALL.JORDAN Y CALL. 25 DE MAYO',0,'2024-10-29 02:22:16','2024-10-18 02:58:23',0),(2,'PEDRO','74643933','CALL.AMIRAYA Y HEROINAS',0,'2024-10-29 02:22:21','2024-10-18 02:59:10',0),(3,'MAMANI','73563565','CALLE JORDAN 123',1,'2024-10-18 21:40:28','2024-10-18 21:40:28',0),(4,'DAVID','76675675','CALL.JORDAN Y CALL. 25 DE MAYO',1,'2024-10-28 04:59:36','2024-10-28 04:59:36',8),(6,'DANIEL','76213675','CALL.AROMA Y JUNIN',1,'2024-10-28 21:32:28','2024-10-28 21:32:28',8);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conductores`
--

DROP TABLE IF EXISTS `conductores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `conductores` (
  `idConductor` int NOT NULL AUTO_INCREMENT,
  `foto` varchar(250) DEFAULT NULL,
  `cuenta` varchar(100) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `primerApellido` varchar(100) NOT NULL,
  `segundoApellido` varchar(100) DEFAULT NULL,
  `licencia` varchar(56) NOT NULL,
  `detalleChofProp` enum('chofer','propietario') NOT NULL DEFAULT 'propietario',
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `fechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idUsuario` smallint NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `domicilio` varchar(250) NOT NULL,
  PRIMARY KEY (`idConductor`),
  KEY `usuario_id` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conductores`
--

LOCK TABLES `conductores` WRITE;
/*!40000 ALTER TABLE `conductores` DISABLE KEYS */;
INSERT INTO `conductores` VALUES (2,'','jesus.43@gmail.com','ab3b3e6556b4a9e7033c','JESUS','MEDRANO','MENDES','241535','chofer',1,'2024-10-28 01:35:30','2024-10-28 01:35:30',0,'76675675','calle suipacha n123'),(3,'','manuel.baldes@gmail.com','e88febd1ea904f224c3a','MANUEL','BALDES','APAZA','7846322','propietario',1,'2024-10-28 02:53:30','2024-10-28 02:53:30',8,'64938953','av. heroina entre junin'),(4,'','pedro@gmail.com','d3ce9efea6244baa7bf7','PEDRO','MARTINES','APAZA','24153233','chofer',1,'2024-10-28 03:39:12','2024-10-28 03:39:12',8,'79358393','calle caracoles num45'),(5,'','andres.73@gmail.com','f70a50b47e0f2c5a597c','ANDRES','QUINTEROS','','24153233','chofer',1,'2024-10-28 04:30:02','2024-10-28 04:30:02',8,'73953095','calle amiraya y heroinas'),(6,'','gerson.29@gmail.com','95217a49393bad363701','GERSON','QUISPE','GUZMAN','4526852','propietario',1,'2024-10-28 04:48:09','2024-10-28 04:48:09',8,'68394303','calle amiraya y heroinas');
/*!40000 ALTER TABLE `conductores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagos`
--

DROP TABLE IF EXISTS `pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pagos` (
  `idPago` int NOT NULL AUTO_INCREMENT,
  `solicitud_id` int NOT NULL,
  `nombreCliente` varchar(100) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `numConductor` varchar(45) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `metodoPago` enum('efectivo','tarjeta','transferenciaQR','tigo money') NOT NULL,
  `transaccion_id` varchar(255) DEFAULT NULL,
  `fechaPago` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estadoPago` enum('pendiente','completado','fallido') NOT NULL DEFAULT 'pendiente',
  `ultimaActualisacion` timestamp NULL DEFAULT NULL,
  `idUsuario` varchar(45) NOT NULL,
  PRIMARY KEY (`idPago`),
  UNIQUE KEY `transaccion_id` (`transaccion_id`),
  KEY `idx_pago_solicitud` (`solicitud_id`),
  CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`solicitud_id`) REFERENCES `solicitudes` (`idSolicitud`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos`
--

LOCK TABLES `pagos` WRITE;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parqueos`
--

DROP TABLE IF EXISTS `parqueos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parqueos` (
  `idParqueo` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `latitud` decimal(10,8) NOT NULL,
  `longitud` decimal(11,8) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idUsuario` varchar(45) NOT NULL,
  PRIMARY KEY (`idParqueo`),
  KEY `idx_parqueo_nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parqueos`
--

LOCK TABLES `parqueos` WRITE;
/*!40000 ALTER TABLE `parqueos` DISABLE KEYS */;
/*!40000 ALTER TABLE `parqueos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `propietariovehiculo`
--

DROP TABLE IF EXISTS `propietariovehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `propietariovehiculo` (
  `idPropietario` int NOT NULL AUTO_INCREMENT,
  `ciNit` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `primerApellido` varchar(100) NOT NULL,
  `segundoApellido` varchar(100) DEFAULT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idUsuario` varchar(45) NOT NULL,
  PRIMARY KEY (`idPropietario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propietariovehiculo`
--

LOCK TABLES `propietariovehiculo` WRITE;
/*!40000 ALTER TABLE `propietariovehiculo` DISABLE KEYS */;
INSERT INTO `propietariovehiculo` VALUES (1,'452513','DANIEL','BALDES','APAZA','68438933','av.Blanco galindo km7',1,'2024-10-28 02:11:04','2024-10-28 02:11:04','8'),(2,'452513','DANIEL','BALDES','APAZA','68438933','av.Blanco galindo km7',1,'2024-10-28 02:11:19','2024-10-28 02:11:19','8'),(3,'8456766','JUAN','MARTINES','APAZA','64938953','calle juares n3435',1,'2024-10-28 03:40:03','2024-10-28 03:40:03','8'),(4,'3489334','PEDRO','MARTINES','PEREZ','79330333','calle juares n3435',1,'2024-10-28 04:31:22','2024-10-28 04:31:22','8');
/*!40000 ALTER TABLE `propietariovehiculo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reclamos`
--

DROP TABLE IF EXISTS `reclamos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reclamos` (
  `idReclamo` int NOT NULL AUTO_INCREMENT,
  `cliente_id` int NOT NULL,
  `nombreCliente` varchar(100) NOT NULL,
  `telefonoCliente` varchar(45) NOT NULL,
  `mensaje` text NOT NULL,
  `numConductor` varchar(45) NOT NULL,
  `placaVehiculo` varchar(45) NOT NULL,
  `estado` enum('pendiente','resuelto','serrado') NOT NULL DEFAULT 'pendiente',
  `fechaReclamo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaResolucion` datetime DEFAULT NULL,
  `fechaActualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idUsuario` varchar(45) NOT NULL,
  PRIMARY KEY (`idReclamo`),
  KEY `idx_reclamo_cliente` (`cliente_id`),
  CONSTRAINT `reclamos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`idCliente`) ON DELETE CASCADE
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
-- Table structure for table `registro`
--

DROP TABLE IF EXISTS `registro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registro` (
  `idRegistro` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `cargo_id` int NOT NULL,
  `fechaAsignacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idRegistro`),
  UNIQUE KEY `usuario_id` (`usuario_id`,`cargo_id`),
  KEY `cargo_id` (`cargo_id`),
  CONSTRAINT `registro_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE,
  CONSTRAINT `registro_ibfk_2` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro`
--

LOCK TABLES `registro` WRITE;
/*!40000 ALTER TABLE `registro` DISABLE KEYS */;
INSERT INTO `registro` VALUES (1,1,1,'2024-10-17 21:00:38'),(2,3,1,'2024-10-17 21:02:54'),(3,4,3,'2024-10-17 21:04:54'),(4,8,1,'2024-10-18 01:32:25');
/*!40000 ALTER TABLE `registro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reportes`
--

DROP TABLE IF EXISTS `reportes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reportes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `solicitud_id` int NOT NULL,
  `mensaje` text NOT NULL,
  `fechaReporte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idUsuario` varchar(45) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `solicitud_id` (`solicitud_id`),
  CONSTRAINT `reportes_ibfk_1` FOREIGN KEY (`solicitud_id`) REFERENCES `solicitudes` (`idSolicitud`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reportes`
--

LOCK TABLES `reportes` WRITE;
/*!40000 ALTER TABLE `reportes` DISABLE KEYS */;
/*!40000 ALTER TABLE `reportes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservas`
--

DROP TABLE IF EXISTS `reservas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservas` (
  `idReserva` int NOT NULL AUTO_INCREMENT,
  `cliente_id` int NOT NULL,
  `nombreCliente` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `tipoServicio` enum('taxi','vagoneta','taxi_familiar','mudanza') NOT NULL,
  `fechaSolicitud` datetime DEFAULT CURRENT_TIMESTAMP,
  `fechaReserva` datetime NOT NULL,
  `fechaActualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` enum('pendiente','activo','confirmado','cancelado') NOT NULL DEFAULT 'pendiente',
  `idUsuario` varchar(45) NOT NULL,
  PRIMARY KEY (`idReserva`),
  KEY `idx_reserva_cliente` (`cliente_id`),
  CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`idCliente`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservas`
--

LOCK TABLES `reservas` WRITE;
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
INSERT INTO `reservas` VALUES (1,1,'','','taxi_familiar','2024-10-18 16:53:43','2024-10-19 20:55:00','2024-10-29 03:28:47','',''),(2,2,'','','vagoneta','2024-10-18 17:04:09','2024-11-10 22:03:00','2024-10-29 03:29:06','',''),(3,1,'','','taxi','2024-10-18 17:04:41','2024-11-07 21:04:00','2024-10-29 03:46:57','',''),(4,2,'','','taxi','2024-10-18 17:38:28','2024-10-23 18:38:00','2024-10-18 21:38:28','pendiente',''),(5,6,'','','taxi_familiar','2024-10-28 20:47:53','2024-10-11 23:37:00','2024-10-29 00:47:53','pendiente','8'),(6,1,'MANUEL','74664399','taxi','2024-10-28 20:48:35','2024-11-02 22:51:00','2024-10-29 00:48:35','pendiente','8'),(7,4,'DAVID','76675675','vagoneta','2024-10-28 21:57:05','2024-11-07 03:01:00','2024-10-29 01:57:05','pendiente','8'),(8,4,'DAVID','76675675','mudanza','2024-10-30 19:20:42','2024-11-08 21:26:00','2024-10-30 23:20:42','pendiente','8'),(9,2,'PEDRO','74643933','taxi','2024-10-30 19:25:15','2024-10-17 19:25:00','2024-10-30 23:25:15','pendiente','8');
/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seguimiento`
--

DROP TABLE IF EXISTS `seguimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seguimiento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `conductor_id` int NOT NULL,
  `numConductor` varchar(45) NOT NULL,
  `latitud` decimal(10,8) NOT NULL,
  `longitud` decimal(11,8) NOT NULL,
  `fechaUbicacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `idUsuario` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_seguimiento_conductor` (`conductor_id`),
  CONSTRAINT `seguimiento_ibfk_1` FOREIGN KEY (`conductor_id`) REFERENCES `conductores` (`idConductor`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seguimiento`
--

LOCK TABLES `seguimiento` WRITE;
/*!40000 ALTER TABLE `seguimiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `seguimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitudes`
--

DROP TABLE IF EXISTS `solicitudes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitudes` (
  `idSolicitud` int NOT NULL AUTO_INCREMENT,
  `cliente_id` int NOT NULL,
  `nombreCliente` varchar(100) NOT NULL,
  `telefonoCliente` varchar(45) NOT NULL,
  `reserva_id` int DEFAULT NULL,
  `tipoServicio` enum('taxi','vagoneta','taxifamiliar','mudanza') NOT NULL,
  `numConductor` varchar(45) NOT NULL,
  `nombreParqueo` varchar(100) NOT NULL,
  `estado` enum('pendiente','asignado','completado','cancelado') NOT NULL DEFAULT 'pendiente',
  `fechaSolicitud` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `conductor_id` int DEFAULT NULL,
  `parqueo_id` int DEFAULT NULL,
  `fechaAsignacion` timestamp NULL DEFAULT NULL,
  `idUsuario` varchar(45) NOT NULL,
  PRIMARY KEY (`idSolicitud`),
  KEY `reserva_id` (`reserva_id`),
  KEY `conductor_id` (`conductor_id`),
  KEY `parqueo_id` (`parqueo_id`),
  KEY `idx_solicitud_cliente_nueva` (`cliente_id`),
  CONSTRAINT `solicitudes_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`idCliente`) ON DELETE CASCADE,
  CONSTRAINT `solicitudes_ibfk_2` FOREIGN KEY (`reserva_id`) REFERENCES `reservas` (`idReserva`) ON DELETE SET NULL,
  CONSTRAINT `solicitudes_ibfk_3` FOREIGN KEY (`conductor_id`) REFERENCES `conductores` (`idConductor`) ON DELETE SET NULL,
  CONSTRAINT `solicitudes_ibfk_4` FOREIGN KEY (`parqueo_id`) REFERENCES `parqueos` (`idParqueo`) ON DELETE SET NULL
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
  `idUsuario` int NOT NULL AUTO_INCREMENT,
  `foto` varchar(250) DEFAULT NULL,
  `ciNit` varchar(100) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `primerApellido` varchar(100) NOT NULL,
  `segundoApellido` varchar(100) DEFAULT NULL,
  `cuenta` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `turno` enum('mañana','tarde','noche') NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `fechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `ciNit` (`ciNit`),
  UNIQUE KEY `cuenta_UNIQUE` (`cuenta`),
  UNIQUE KEY `contrasena_UNIQUE` (`contrasena`),
  UNIQUE KEY `foto` (`foto`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,NULL,'8456766','Mario','Medrano','Apaza','mario.21@gmail.com','$2y$10$ZYwNbbkk6t/lf6qCJ9moN.efBqOmhekCDCCN5S45xPOAKFGrB4s8u','mañana',1,'2024-10-17 21:00:38','2024-10-17 21:00:38'),(3,NULL,'452513','Juan','martines','Apaza','judas@gmail.com','$2y$10$0uCXeI4/XNegS2.t7F4YY.QZjd05k23d5MvJThCKY.5yn.oAOOrTi','tarde',1,'2024-10-17 21:02:54','2024-10-17 21:02:54'),(4,NULL,'87733334','Manuel','baldes','Juarez','pedro@gmail.com','$2y$10$Jn2AL1AeHG7eyPrLSqj8J.GKeZAMo3SbdYz59CydIezXLTJnTcGOG','tarde',1,'2024-10-17 21:04:54','2024-10-17 21:04:54'),(8,NULL,'76483865','JHON','PEREZ','DORADO','jhonpd@gmail.com','4d2ff2f945883e090ac4de4fb9e23fab','tarde',1,'2024-10-18 01:32:25','2024-10-18 01:32:25');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculo_propietario`
--

DROP TABLE IF EXISTS `vehiculo_propietario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehiculo_propietario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `vehiculo_id` int NOT NULL,
  `propietario_id` int NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idUsuario` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vehiculo_id` (`vehiculo_id`,`propietario_id`),
  KEY `propietario_id` (`propietario_id`),
  KEY `idx_vehiculo_propietario` (`vehiculo_id`,`propietario_id`),
  CONSTRAINT `vehiculo_propietario_ibfk_1` FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculos` (`idVehiculo`) ON DELETE CASCADE,
  CONSTRAINT `vehiculo_propietario_ibfk_2` FOREIGN KEY (`propietario_id`) REFERENCES `propietariovehiculo` (`idPropietario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculo_propietario`
--

LOCK TABLES `vehiculo_propietario` WRITE;
/*!40000 ALTER TABLE `vehiculo_propietario` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehiculo_propietario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculos`
--

DROP TABLE IF EXISTS `vehiculos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehiculos` (
  `idVehiculo` int NOT NULL AUTO_INCREMENT,
  `conductor_id` int NOT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `numMovil` varchar(45) NOT NULL,
  `numChasis` varchar(20) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `color` varchar(30) DEFAULT NULL,
  `placa` varchar(10) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idUsuario` varchar(45) NOT NULL,
  `tipo` enum('Taxi','Vagoneta','VagonetaParrilla','TaxiFamiliar','Mudanza') NOT NULL,
  PRIMARY KEY (`idVehiculo`),
  UNIQUE KEY `conductor_id` (`conductor_id`),
  UNIQUE KEY `identificador` (`numChasis`),
  UNIQUE KEY `placa` (`placa`),
  KEY `idx_vehiculo_conductor` (`conductor_id`),
  CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`conductor_id`) REFERENCES `conductores` (`idConductor`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculos`
--

LOCK TABLES `vehiculos` WRITE;
/*!40000 ALTER TABLE `vehiculos` DISABLE KEYS */;
INSERT INTO `vehiculos` VALUES (10,5,'','25','AF-23435436','TOYOTA','1899','NEGRO','7554JHK',1,'2024-10-28 04:44:53','2024-10-28 04:44:53','8','TaxiFamiliar'),(12,6,'','45','AF-23435978','TOYOTA','2004','NEGRO','4582DAG',1,'2024-10-28 04:56:47','2024-10-28 04:56:47','8','Taxi');
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

-- Dump completed on 2024-10-30 19:30:50
