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
INSERT INTO `cargos` VALUES (1,'ADMINISTRADOR','Este usuario se encarga de administrar todo el sitema, quien tiene acceso a todas las listas y solicitudes.','2024-10-17 20:54:34','2024-10-17 20:54:34'),(2,'OPERADOR','Este usuario se encarga de resepcionar llamadas y monitorear a los conductores','2024-10-17 20:54:34','2024-10-17 20:54:34'),(3,'CONDUCTOR','Este usuario es quien se encarga del servicio a los clientes','2024-10-17 20:54:34','2024-10-17 20:54:34');
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
  `habilitado` tinyint(1) DEFAULT '1',
  `direccion` varchar(255) DEFAULT NULL,
  `fechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaUltimaActualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idCliente`),
  UNIQUE KEY `telefono` (`telefono`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'MANUEL','74664399',1,'CALL.JORDAN Y CALL. 25 DE MAYO','2024-10-18 02:58:23','2024-10-18 03:54:01'),(2,'PEDRO','74643933',1,'CALL.AMIRAYA Y HEROINAS','2024-10-18 02:59:10','2024-10-18 03:54:05'),(3,'MAMANI','73563565',1,'CALLE JORDAN 123','2024-10-18 21:40:28','2024-10-18 21:40:28');
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
  `usuario_id` int NOT NULL,
  `numConductor` varchar(15) NOT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `detalleConductor` enum('conductor','propietario') NOT NULL DEFAULT 'propietario',
  `estado` tinyint(1) DEFAULT '1',
  `fechaCreacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idConductor`),
  UNIQUE KEY `numConductor` (`numConductor`),
  UNIQUE KEY `foto` (`foto`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `conductores_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conductores`
--

LOCK TABLES `conductores` WRITE;
/*!40000 ALTER TABLE `conductores` DISABLE KEYS */;
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
  `monto` decimal(10,2) NOT NULL,
  `metodoPago` enum('efectivo','tarjeta','transferenciaQR','tigo money') NOT NULL,
  `fechaPago` datetime DEFAULT CURRENT_TIMESTAMP,
  `transaccion_id` varchar(255) DEFAULT NULL,
  `estadoPago` enum('pendiente','completado','fallido') NOT NULL DEFAULT 'pendiente',
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
  `capacidad` int NOT NULL,
  `disponibilidad` int NOT NULL,
  `latitud` decimal(10,8) NOT NULL,
  `longitud` decimal(11,8) NOT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `fechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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
  `estado` tinyint(1) DEFAULT '1',
  `fechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idPropietario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propietariovehiculo`
--

LOCK TABLES `propietariovehiculo` WRITE;
/*!40000 ALTER TABLE `propietariovehiculo` DISABLE KEYS */;
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
  `mensaje` text NOT NULL,
  `estado` enum('pendiente','resuelto','cerrado') NOT NULL DEFAULT 'pendiente',
  `habilitado` tinyint(1) DEFAULT '1',
  `fechaReclamo` datetime DEFAULT CURRENT_TIMESTAMP,
  `fechaResolucion` datetime DEFAULT NULL,
  `fechaActualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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
  `fechaAsignacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
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
  `fechaReporte` datetime DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `tipoServicio` enum('taxi','vagoneta','taxi_familiar','mudanza') NOT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `fechaSolicitud` datetime DEFAULT CURRENT_TIMESTAMP,
  `fechaReserva` datetime NOT NULL,
  `fechaActualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` enum('pendiente','activo','confirmado','cancelado') NOT NULL DEFAULT 'pendiente',
  PRIMARY KEY (`idReserva`),
  KEY `idx_reserva_cliente` (`cliente_id`),
  CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`idCliente`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservas`
--

LOCK TABLES `reservas` WRITE;
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
INSERT INTO `reservas` VALUES (1,1,'','','taxi_familiar',1,'2024-10-18 16:53:43','2024-10-19 20:55:00','2024-10-18 20:53:43','pendiente'),(2,2,'','','vagoneta',1,'2024-10-18 17:04:09','2024-11-10 22:03:00','2024-10-18 21:04:09','pendiente'),(3,1,'','','taxi',1,'2024-10-18 17:04:41','2024-11-07 21:04:00','2024-10-18 21:04:41','pendiente'),(4,2,'','','taxi',1,'2024-10-18 17:38:28','2024-10-23 18:38:00','2024-10-18 21:38:28','pendiente');
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
  `latitud` decimal(10,8) NOT NULL,
  `longitud` decimal(11,8) NOT NULL,
  `fechaUbicacion` datetime DEFAULT CURRENT_TIMESTAMP,
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
  `reserva_id` int DEFAULT NULL,
  `tipoServicio` enum('taxi','vagoneta','taxi_familiar','mudanza') NOT NULL,
  `estado` enum('pendiente','asignado','en_curso','completado','cancelado') NOT NULL DEFAULT 'pendiente',
  `fechaSolicitud` datetime DEFAULT CURRENT_TIMESTAMP,
  `conductor_id` int DEFAULT NULL,
  `parqueo_id` int DEFAULT NULL,
  `fechaAsignacion` datetime DEFAULT NULL,
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
  `cuenta` varchar(100) DEFAULT NULL,
  `contrasena` varchar(255) NOT NULL,
  `turno` enum('mañana','tarde','noche','relevo') NOT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `fechaCreacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `ciNit` (`ciNit`),
  UNIQUE KEY `foto` (`foto`),
  UNIQUE KEY `cuenta` (`cuenta`)
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
  `identificador` varchar(20) NOT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `anio` int NOT NULL,
  `color` varchar(30) DEFAULT NULL,
  `placa` varchar(10) NOT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `fechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idVehiculo`),
  UNIQUE KEY `conductor_id` (`conductor_id`),
  UNIQUE KEY `identificador` (`identificador`),
  UNIQUE KEY `placa` (`placa`),
  UNIQUE KEY `foto` (`foto`),
  KEY `idx_vehiculo_conductor` (`conductor_id`),
  CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`conductor_id`) REFERENCES `conductores` (`idConductor`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculos`
--

LOCK TABLES `vehiculos` WRITE;
/*!40000 ALTER TABLE `vehiculos` DISABLE KEYS */;
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

-- Dump completed on 2024-10-18 19:07:55
