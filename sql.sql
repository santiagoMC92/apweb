-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: apweb
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.16-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `agente`
--

DROP TABLE IF EXISTS `agente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agente` (
  `idagente` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idagente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agente`
--

LOCK TABLES `agente` WRITE;
/*!40000 ALTER TABLE `agente` DISABLE KEYS */;
/*!40000 ALTER TABLE `agente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido_pat` varchar(50) DEFAULT NULL,
  `apellido_mat` varchar(45) DEFAULT NULL,
  `rfc` varchar(13) DEFAULT NULL,
  `curp` varchar(45) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `celular` varchar(13) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `teloficina` varchar(10) DEFAULT NULL,
  `extencion` char(6) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `otro` varchar(50) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  `empresa` varchar(100) DEFAULT NULL,
  `puesto` varchar(100) DEFAULT NULL,
  `gestor` int(11) DEFAULT NULL,
  `filiacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcliente`),
  KEY `fk_cliente_1_idx` (`gestor`),
  CONSTRAINT `fk_cliente_1` FOREIGN KEY (`gestor`) REFERENCES `empleado` (`idempleado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'FRANCISCO JULIAN','CAMPOS ','PARRA','CAPF560712','CAPF560712HYNMRR13','C. 91 No. 487 x 44 y 44 A','9994183166','','9994183166','','jmanzur_26@hotmail.com','',1,'TIENDA','DUEÑO',13,NULL),(2,'INOCENCIO','AMAYA','CHALE','AACI730824','AACI730824HYNMHN01','C. 31 SN KOMCHEN','9997472368','','9997472368','','jmanzur_26@hotmail.com','',1,'combi komchen','chofer',14,NULL),(3,'EMMA ROSA ','AMBROSIO','CETINA','AOCE720723','AOCE720723MYNMTM00','C. 46 A No. 577 A POR 93 Y 95 COL. SANTA ROSA','9991217551','','9991217551','','jmanzur_26@hotmail.com','',1,'ZAPATERIA','DUEÑA',14,NULL),(4,'NAZARIA','ARTEAGA','GARCIA','AEGN610612','AEGN610612MOCRRZ07','C. 62 B No. 517 x C. 67 D COL. MULCHECHEN','9994101919','','9994101919','','jmanzur_26@hotmail.com','',1,'TIANGUISTA','DUEÑA',13,NULL),(5,'JOSE DANIEL','AYALA','CHULIM','AACD770823','AACD770823HYNYHN08','79 A LOTE 2 58 C MULCHECHEN ','9999090487','','9999090487','','jmanzur_26@hotmail.com','',1,'PIÑATERO','DUEÑO',13,NULL);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comision`
--

DROP TABLE IF EXISTS `comision`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comision` (
  `idcomision` int(11) NOT NULL AUTO_INCREMENT,
  `montoComision` decimal(18,4) DEFAULT NULL,
  `porcentaje` decimal(18,4) DEFAULT NULL,
  `Estatus` varchar(45) DEFAULT NULL,
  `nocredito` int(11) NOT NULL,
  `idempleado` int(11) NOT NULL,
  PRIMARY KEY (`idcomision`),
  KEY `fk_comision_credito1_idx` (`nocredito`),
  KEY `fk_comision_empleado1_idx` (`idempleado`),
  CONSTRAINT `fk_comision_credito1` FOREIGN KEY (`nocredito`) REFERENCES `credito` (`nocredito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_comision_empleado1` FOREIGN KEY (`idempleado`) REFERENCES `empleado` (`idempleado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comision`
--

LOCK TABLES `comision` WRITE;
/*!40000 ALTER TABLE `comision` DISABLE KEYS */;
/*!40000 ALTER TABLE `comision` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `credito`
--

DROP TABLE IF EXISTS `credito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `credito` (
  `nocredito` int(11) NOT NULL AUTO_INCREMENT,
  `fapertura` datetime DEFAULT CURRENT_TIMESTAMP,
  `ftermino` date DEFAULT NULL,
  `fprimerpago` date DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  `monto` decimal(18,4) DEFAULT '0.0000',
  `tipoPagos` int(11) DEFAULT NULL,
  `idsubcuenta` int(11) DEFAULT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `porcentaje_interes` decimal(18,4) DEFAULT '0.0000',
  `comision` decimal(18,4) DEFAULT '0.0000',
  `comisionEstatus` int(11) DEFAULT '0',
  `tiempoPago` int(11) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`nocredito`),
  KEY `fk_credito_1_idx` (`idsubcuenta`),
  KEY `fk_credito_3_idx` (`idcliente`),
  KEY `idusurio_idx` (`idusuario`),
  CONSTRAINT `fk_credito_1` FOREIGN KEY (`idsubcuenta`) REFERENCES `subcuenta` (`idsubcuenta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_credito_3` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idusurio` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `credito`
--

LOCK TABLES `credito` WRITE;
/*!40000 ALTER TABLE `credito` DISABLE KEYS */;
/*!40000 ALTER TABLE `credito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `idempleado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido_pat` varchar(50) DEFAULT NULL,
  `apellido_mat` varchar(50) DEFAULT NULL,
  `direccion` varchar(75) DEFAULT NULL,
  `celular` varchar(13) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `correo` varchar(75) DEFAULT NULL,
  `otro` varchar(75) DEFAULT NULL,
  `porcentaje_comision` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`idempleado`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES (13,'Jose Alejandro','Lara','Lopez','Calle 61 numero 477 por 54 y 56','9993314367','9231060','alexllz@hotmail.com','alejandro.lara@creditoglobal.mx',20.00),(14,'jose alberto','manzur ','castillo','calle 37 numero 744 a por 90 y 92 boulevares de caucel','9992665422','9231060','jose.manzur@creditoglobal.mx','',20.00);
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fondeador`
--

DROP TABLE IF EXISTS `fondeador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fondeador` (
  `idfondeador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `cantinvert` double DEFAULT '0',
  `comision` double DEFAULT '0',
  PRIMARY KEY (`idfondeador`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fondeador`
--

LOCK TABLES `fondeador` WRITE;
/*!40000 ALTER TABLE `fondeador` DISABLE KEYS */;
INSERT INTO `fondeador` VALUES (1,'PD','PD',100000,0),(2,'PD1','PD1',50000,0);
/*!40000 ALTER TABLE `fondeador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagenes`
--

DROP TABLE IF EXISTS `imagenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagenes` (
  `idimagenes` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `ruta` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `idcliente` int(11) NOT NULL,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idimagenes`),
  KEY `idcliente_idx` (`idcliente`),
  CONSTRAINT `idcliente` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagenes`
--

LOCK TABLES `imagenes` WRITE;
/*!40000 ALTER TABLE `imagenes` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagenes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagos`
--

DROP TABLE IF EXISTS `pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagos` (
  `idpagos` int(11) NOT NULL AUTO_INCREMENT,
  `NumPago` int(11) DEFAULT NULL,
  `fechaDePago` date DEFAULT NULL,
  `montoSinInteres` decimal(18,4) DEFAULT NULL,
  `montoInteres` decimal(18,4) DEFAULT NULL,
  `montoTotal` decimal(18,4) DEFAULT NULL,
  `estatus` int(11) DEFAULT '0',
  `fechaPagado` date DEFAULT NULL,
  `idcredito` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpagos`),
  KEY `idcredito_idx` (`idcredito`),
  CONSTRAINT `idcredito` FOREIGN KEY (`idcredito`) REFERENCES `credito` (`nocredito`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos`
--

LOCK TABLES `pagos` WRITE;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permiso`
--

DROP TABLE IF EXISTS `permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL AUTO_INCREMENT,
  `modulo` varchar(45) DEFAULT NULL,
  `seccion` varchar(45) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpermiso`),
  KEY `idusuario_idx` (`idusuario`),
  CONSTRAINT `idusuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permiso`
--

LOCK TABLES `permiso` WRITE;
/*!40000 ALTER TABLE `permiso` DISABLE KEYS */;
INSERT INTO `permiso` VALUES (1,'user','user',0,11),(2,'user','update',1,11),(3,'user','add',1,11),(4,'clientes','clientes',0,11),(5,'clientes','add',1,11),(6,'credito','credito',0,11),(8,'subcuenta','add',1,11),(9,'subcuenta','update',1,11),(12,'fondeador','add',1,11),(13,'fondeador','update',1,11),(15,'subcuenta','subcuenta',0,11),(16,'fondeador','fondeador',0,11),(17,'clientes','update',1,11),(18,'credito','add',1,11),(19,'credito','update',1,11);
/*!40000 ALTER TABLE `permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcuenta`
--

DROP TABLE IF EXISTS `subcuenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subcuenta` (
  `idsubcuenta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `porcentajeint` varchar(45) DEFAULT NULL,
  `idfondeador` int(11) NOT NULL,
  PRIMARY KEY (`idsubcuenta`),
  KEY `fk_subcuenta_fondeador1_idx` (`idfondeador`),
  CONSTRAINT `fk_subcuenta_fondeador1` FOREIGN KEY (`idfondeador`) REFERENCES `fondeador` (`idfondeador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcuenta`
--

LOCK TABLES `subcuenta` WRITE;
/*!40000 ALTER TABLE `subcuenta` DISABLE KEYS */;
INSERT INTO `subcuenta` VALUES (1,'PD','10',1),(2,'PD1','5',2);
/*!40000 ALTER TABLE `subcuenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `Usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  `idempleado` int(11) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `fk_Usuario_empleado1_idx` (`idempleado`),
  CONSTRAINT `fk_Usuario_empleado1` FOREIGN KEY (`idempleado`) REFERENCES `empleado` (`idempleado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `Usuario` WRITE;
/*!40000 ALTER TABLE `Usuario` DISABLE KEYS */;
INSERT INTO `Usuario` VALUES (11,'alejandro.lara','4cf9a73ca1d20a5f765539aca86f93b8',1,1,13),(12,'jose.manzur','f851e9336c42556ab67f7f6e7d9b9e0e',1,1,14);
/*!40000 ALTER TABLE `Usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-15 16:28:18
