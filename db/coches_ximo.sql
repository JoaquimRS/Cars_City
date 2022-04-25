-- MySQL dump 10.13  Distrib 8.0.28, for Linux (x86_64)
--
-- Host: localhost    Database: coches_ximo
-- ------------------------------------------------------
-- Server version	8.0.28-0ubuntu0.20.04.3

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
-- Temporary view structure for view `all_info_cars`
--

DROP TABLE IF EXISTS `all_info_cars`;
/*!50001 DROP VIEW IF EXISTS `all_info_cars`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `all_info_cars` AS SELECT 
 1 AS `id_coche`,
 1 AS `IMG`,
 1 AS `bastidor`,
 1 AS `matricula`,
 1 AS `id_modelo`,
 1 AS `kms`,
 1 AS `color`,
 1 AS `puertas`,
 1 AS `plazas`,
 1 AS `motor`,
 1 AS `id_combustible`,
 1 AS `fecha`,
 1 AS `id_categoria`,
 1 AS `cambio`,
 1 AS `precio`,
 1 AS `ciudad`,
 1 AS `lat`,
 1 AS `lng`,
 1 AS `descripcion`,
 1 AS `nombre_marca`,
 1 AS `nombre_modelo`,
 1 AS `nombre_combustible`,
 1 AS `nombre_categoria`,
 1 AS `n_visitas`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `id_categoria` int NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `url_img` varchar(255) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Monovolumen','Los monovolúmenes son un tipo de coche según su carrocería. El espacio interior integra en un solo volumen el compartimento de equipajes, el de pasajeros y el del motor.','minivan.png'),(2,'Berlina','Las berlinas son los mejores coches para viajar en familia: espacio y comodidad.','sedan.png'),(3,'Cupe','Los turismos cupé se caracterizan por contar con dos puertas laterales.','coupe.png'),(4,'Hatchback','Es el tradicional coche compacto. El término en inglés ”hatchback” significa “escotilla trasera” y se refiere a la “puerta trasera” de acceso al maletero.','hatchback.png'),(5,'Roadster','Los roadster son un tipo de coche deportivo biplaza con carrocería descapotable y ligera.','roadster.png'),(6,'Todoterreno','Es un tipo de vehículo pensado, en origen, para la circulación por terrenos difíciles: superficies de tierra, piedras, pendientes pronunciadas, con tracción a dos o más ejes.','all_terrain.png'),(7,'Crossover','Con una apariencia similar a los todoterreno, los crossover son los reyes del asfalto. Incluyen características como barras frontales de protección o suspensión alta, propias de un todoterreno, que combinan con una estética más compacta.','crossover.png'),(8,'SUV','Los SUV son tendencia. Desde el 2006 sus ventas han experimentado un gran incremento. Se trata de un tipo de coche cuyo concepto deriva del todoterreno con el que comparte estética, altura de carrocería.','suv.png'),(9,'Deportivo','Motores potentes, mayor velocidad máxima, mejor aceleración y adherencia. Los deportivos y superdeportivos son otro tipo de vehículo y el sueño de muchos. Suelen ser cupé o descapotable, además de biplazas.','sport.png'),(10,'Pick-up','Las pick up se han colado entre los tipos de vehículos más vendidos del pasado año. Es un tipo de camioneta​​ empleado generalmente para el transporte de mercancías.','pickup.png');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coches`
--

DROP TABLE IF EXISTS `coches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coches` (
  `id_coche` int NOT NULL AUTO_INCREMENT,
  `IMG` varchar(200) NOT NULL,
  `bastidor` varchar(17) NOT NULL,
  `matricula` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_modelo` int NOT NULL,
  `kms` int NOT NULL,
  `color` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `puertas` int NOT NULL,
  `plazas` int NOT NULL,
  `motor` varchar(100) NOT NULL,
  `id_combustible` int NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `id_categoria` int NOT NULL,
  `cambio` varchar(30) NOT NULL,
  `precio` int NOT NULL,
  `ciudad` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`id_coche`),
  UNIQUE KEY `bastidor` (`bastidor`,`matricula`),
  KEY `coches_ibfk_1` (`id_modelo`),
  KEY `coches_ibfk_3` (`id_combustible`),
  KEY `coches_ibfk_4` (`id_categoria`),
  CONSTRAINT `coches_ibfk_1` FOREIGN KEY (`id_modelo`) REFERENCES `modelos` (`id_modelo`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `coches_ibfk_3` FOREIGN KEY (`id_combustible`) REFERENCES `combustible` (`id_combustible`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `coches_ibfk_4` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coches`
--

LOCK TABLES `coches` WRITE;
/*!40000 ALTER TABLE `coches` DISABLE KEYS */;
INSERT INTO `coches` VALUES (1,'KIA_Rio_1.jpg','38CJDH3Y5N0KS63NC','2146ZYL',21,1000,'Rojo',5,5,'V8',2,'03/11/2012',1,'Manual',200000,'Barcelona','41.55784009806303','2.1347489996406996','Solo sirve para ir marcha tras'),(2,'PEUGEOT_3008_1.jpg','8JNG4FD36HB7H9K0L','3493DKF',28,300000,'Blanco',5,5,'V16',4,'03/07/2018',2,'Manual',50000,'Valencia','39.4759046683393','-0.37490274901368864',''),(3,'DACIA_Sandero_1.jpg','EJOAJIU30923J90FU','1234ABC',7,50000,'Azul',5,5,'V8',2,'12/01/2017',3,'Automatico',107140,'Fontanars dels Alforins','38.78299954999104','-0.7851720943375659',''),(4,'HYUNDAI_Genesis_1.jpg','JASFJ0OI23I40942J','3494FJK',16,51531,'Blanco',5,5,'V8',2,'20/01/2021',4,'Manual',66562,'Bocairent','38.77026175606965','-0.6132792853461626','Coche de pruebas'),(6,'BMW_i8_1.jpg','HALZJVOPQRRTHYIZM','7248LZO',6,200,'Rojo',5,5,'V8',1,'21/01/2022',5,'Manual',8917,'Ontinyent','38.82348325930414','-0.6062252036716587','Rapido, una locura de coche, un cazanenas, que va de locos vamos.'),(7,'LAND_ROVER_Discovery_1.jpg','DER45JY82XTPO6AJV','1630AXM',23,0,'Blanco',5,5,'V16',2,'25/01/2022',6,'Manual',40091,'Alacant','38.368168753598326','-0.4864799433403636','Coche en perfecto estado, con 0 kms sin estrenar'),(8,'JAGUAR_XF_1.jpg','HYUT87BJFYR65P98Y','9087QWE',17,5000,'ROJO',5,5,'V8',4,'17/11/2021',7,'Automatico',111673,'Madrid','40.4389149910023','-3.6973967579167057','Coche deportivo en perfecto estado, rápido y elegante.'),(9,'Mercedes_Clase_A_1.jpg','JUHGY5454CUJYGOFY','6543ASD',25,40900,'BLANCO',5,5,'V8',2,'08/02/2022',8,'Manual',98508,'Vallada','38.900321330906074','-0.6886487187549398','Bueno, bonito, barato ;)'),(10,'','345DFJ345I5JEIJFJ','4356DAW',8,15000,'Naranja butano',5,5,'V16',2,'05/03/2008',5,'Manual',19400,'Murcia','37.99459777920876','-1.130437410374607','Buen coche, buen rendimiento y en perfectas condiciones.');
/*!40000 ALTER TABLE `coches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coches_img`
--

DROP TABLE IF EXISTS `coches_img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coches_img` (
  `id_coche` int NOT NULL,
  `id_img` int NOT NULL AUTO_INCREMENT,
  `url_img` varchar(255) NOT NULL,
  `etiquetas` varchar(255) NOT NULL,
  PRIMARY KEY (`id_img`,`id_coche`),
  KEY `coches_img_ibfk_1` (`id_coche`),
  CONSTRAINT `coches_img_ibfk_1` FOREIGN KEY (`id_coche`) REFERENCES `coches` (`id_coche`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coches_img`
--

LOCK TABLES `coches_img` WRITE;
/*!40000 ALTER TABLE `coches_img` DISABLE KEYS */;
INSERT INTO `coches_img` VALUES (1,1,'KIA_Rio_1.jpg',''),(1,2,'KIA_Rio_2.jpg',''),(2,3,'PEUGEOT_3008_1.jpg',''),(2,4,'PEUGEOT_3008_2.jpg',''),(3,5,'DACIA_Sandero_1.jpg',''),(3,6,'DACIA_Sandero_2.jpg',''),(4,7,'HYUNDAI_Genesis_1.jpg',''),(4,8,'HYUNDAI_Genesis_2.jpg',''),(6,9,'BMW_i8_1.jpg',''),(6,10,'BMW_i8_2.jpg',''),(7,11,'LAND_ROVER_Discovery_2.jpg',''),(7,12,'LAND_ROVER_Discovery_1.jpg',''),(1,13,'KIA_Rio_3.jpg',''),(1,14,'KIA_Rio_4.jpg',''),(1,15,'KIA_Rio_5.jpg',''),(3,16,'DACIA_Sandero_3.jpg',''),(3,17,'DACIA_Sandero_4.jpg',''),(3,18,'DACIA_Sandero_5.jpg',''),(2,19,'PEUGEOT_3008_3.jpg',''),(2,20,'PEUGEOT_3008_4.jpg',''),(2,21,'PEUGEOT_3008_5.jpg',''),(4,22,'HYUNDAI_Genesis_3.jpg',''),(7,23,'LAND_ROVER_Discovery_3.jpg\r\n',''),(7,24,'LAND_ROVER_Discovery_4.jpg\r\n',''),(6,25,'BMW_i8_3.jpg',''),(6,26,'BMW_i8_4.jpg',''),(8,27,'JAGUAR_XF_1.jpg',''),(8,28,'JAGUAR_XF_2.jpg',''),(8,29,'JAGUAR_XF_3.jpg',''),(9,30,'Mercedes_Clase_A_1.jpg',''),(9,31,'Mercedes_Clase_A_2.jpg',''),(9,32,'Mercedes_Clase_A_3.jpg',''),(9,33,'Mercedes_Clase_A_4.jpg','');
/*!40000 ALTER TABLE `coches_img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `combustible`
--

DROP TABLE IF EXISTS `combustible`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `combustible` (
  `id_combustible` int NOT NULL AUTO_INCREMENT,
  `nombre_combustible` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `url_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_combustible`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `combustible`
--

LOCK TABLES `combustible` WRITE;
/*!40000 ALTER TABLE `combustible` DISABLE KEYS */;
INSERT INTO `combustible` VALUES (1,'Electrico','Estos tipos de vehículos usarán uno o varios motores, utilizando la energía almacenada en baterías recargables.','electric.png'),(2,'Gasolina','Es un combustible derivado del petróleo por destilación fraccionada y se usan para vehículos con motores de combustión interna que utilizan la explosión de la gasolina.','gasoline.png'),(3,'Hibrido','Es aquel en el que se utilizan sistemas de propulsión híbridos, entre ellos autobuses, automóviles, camiones, bicicletas, barcos, aviones y trenes.','hybrid.png'),(4,'Diesel','Se utiliza para motores de combustión interna alternativa que produce la ignición del combustible en temperaturas altas por su comprensión. El diesel es un hidrocarburo, es decir, carbono e hidrógeno, y añadido parafinas.','diesel.png'),(5,'Etanol','Por su parte se obtiene de la fermentación de azucares de distintas plantas, como pueden ser la cebada, el maiz… y puede ser mezclado con gasolina.','ethanol.png'),(6,'Hidrógeno','Puede ser usado en motores de combustión interna de forma alternativa. El hidrógeno puede utilizarse en su versión de combustión o por su conversión en pila de combustible.','hydrogen.png'),(7,'Biodiesel','Es un combustible que es obtenido por lípidos naturales que pueden ser aceites vegetales o incluso grasas animales. Los lípidos son moleculas orgánicas constituidas por carbono e hidrógeno.','biodiesel.png'),(8,'Metanol','Es alcohol destilado en seco de la madera, que se puede mezclar con la gasolina.','methanol.png'),(9,'Gas natural','Es un combustible formado por mezcla de gases naturales.','natural gas.png'),(10,'GLP','Es un gas licuado de petróleo conformado por gases como el propano y butano. En este caso, pueden usarse en motores de combustión interna.','glp.png'),(11,'Otros','Otro tipo de combustibles','others.png');
/*!40000 ALTER TABLE `combustible` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `favoritos`
--

DROP TABLE IF EXISTS `favoritos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `favoritos` (
  `id_usuario` int NOT NULL,
  `id_coche` int NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_coche`),
  KEY `favoritos_ibfk_1` (`id_coche`),
  CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`id_coche`) REFERENCES `coches` (`id_coche`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favoritos`
--

LOCK TABLES `favoritos` WRITE;
/*!40000 ALTER TABLE `favoritos` DISABLE KEYS */;
INSERT INTO `favoritos` VALUES (23,3,'2022-04-25 19:38:46'),(23,6,'2022-04-25 19:38:49'),(23,8,'2022-04-25 19:38:50'),(26,1,'2022-04-25 19:39:12'),(26,4,'2022-04-25 19:39:11');
/*!40000 ALTER TABLE `favoritos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marcas`
--

DROP TABLE IF EXISTS `marcas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `marcas` (
  `id_marca` int NOT NULL AUTO_INCREMENT,
  `nombre_marca` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ano_fundacion` int NOT NULL,
  `url_img` varchar(255) NOT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marcas`
--

LOCK TABLES `marcas` WRITE;
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;
INSERT INTO `marcas` VALUES (1,'SEAT',1949,'seat.png'),(2,'Audi',1909,'audi.png'),(3,'BMW',1916,'bmw.png'),(4,'DACIA',1966,'dacia.png'),(5,'FIAT',1899,'fiat.png'),(6,'FORD',1903,'ford.png'),(7,'HONDA',1946,'honda.png'),(8,'HYUNDAI',1947,'hyundai.png'),(9,'JAGUAR',1922,'jaguar.png'),(10,'Jeep',1941,'jeep.png'),(11,'KIA',1944,'kia.png'),(12,'LAND ROVER',1948,'land rover.png'),(13,'Mercedes',1886,'mercedes.png'),(14,'PEUGEOT',1896,'peugeot.png'),(15,'TESLA',2003,'tesla.png'),(16,'VOLVO',1927,'volvo.png'),(17,'Mini',2001,'mini.png'),(18,'Opel',1862,'opel.png'),(19,'Volkswagen',1937,'volkswagen.png');
/*!40000 ALTER TABLE `marcas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modelos`
--

DROP TABLE IF EXISTS `modelos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modelos` (
  `id_modelo` int NOT NULL AUTO_INCREMENT,
  `nombre_modelo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_marca` int NOT NULL,
  PRIMARY KEY (`id_modelo`),
  KEY `id_marca` (`id_marca`),
  CONSTRAINT `modelos_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modelos`
--

LOCK TABLES `modelos` WRITE;
/*!40000 ALTER TABLE `modelos` DISABLE KEYS */;
INSERT INTO `modelos` VALUES (1,'Ibiza',1),(2,'León',1),(3,'A5',2),(4,'Q3',2),(5,'X5',3),(6,'i8',3),(7,'Sandero',4),(8,'Duster',4),(9,'Punto',5),(10,'Scudo',5),(11,'Focus',6),(12,'Fiesta',6),(13,'CR-V',7),(14,'HR-V',7),(15,'Bayon',8),(16,'Genesis',8),(17,'XF',9),(18,'E-Pace',9),(19,'Wrangler',10),(20,'Gladiator',10),(21,'Rio',11),(22,'Soul',11),(23,'Discovery',12),(24,'Defender',12),(25,'Clase A',13),(26,'Clase E',13),(27,'2008',14),(28,'3008',14),(29,'Model X',15),(30,'Model S',15),(31,'C30',16),(32,'V90',16),(33,'KA',6),(34,'Cooper',17),(35,'Astra',18),(36,'Corsa',18),(37,'Countryman',17);
/*!40000 ALTER TABLE `modelos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `n_visitas_coche`
--

DROP TABLE IF EXISTS `n_visitas_coche`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `n_visitas_coche` (
  `id_coche` int NOT NULL,
  `n_visitas` int NOT NULL,
  PRIMARY KEY (`id_coche`),
  CONSTRAINT `n_visitas_coche_ibfk_1` FOREIGN KEY (`id_coche`) REFERENCES `coches` (`id_coche`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `n_visitas_coche`
--

LOCK TABLES `n_visitas_coche` WRITE;
/*!40000 ALTER TABLE `n_visitas_coche` DISABLE KEYS */;
INSERT INTO `n_visitas_coche` VALUES (1,1),(2,0),(3,9),(4,1),(6,1),(7,1),(8,1),(9,0),(10,0);
/*!40000 ALTER TABLE `n_visitas_coche` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (9,'Angela','$2y$10$vKXZlsf2IckEjQNLMhHS5.N1llp0BArAuJZNHzNYRQAwq755wxjwi','angelavidallinares@gmail.com','client',''),(22,'ximo1','$2y$10$yX4B27cEG3lTkXCGWIgFbOcLhIQJW3b0ghaMobkKkx0cBfwVe5HPq','ximo@gmail.com','client','https://avatars.dicebear.com/api/avataaars/ximo1.svg?b=%23c2c2c2&r=50'),(23,'Ximo','$2y$10$35ad1yjmKWZDvifS3CftlOpVbUUcPTqIyJVA4Q1wlFhts7qfFFVMa','xriberasoriano003@gmail.com','client','https://avatars.dicebear.com/api/avataaars/Ximo.svg?b=%23c2c2c2&r=50'),(24,'bioscaChupaRico','$2y$10$IhUMmV9J/WNN5vEQgBQW4uB8da2xxuEE4DudPVLp9t1E1lMi2iGKy','ximoXimet@gmail.com','client','https://avatars.dicebear.com/api/avataaars/bioscaChupaRico.svg?b=%23c2c2c2&r=50'),(25,'estonodeberiadepasarlavalidacion','$2y$10$sy.yYULibtFHiSSOXMQEFOTS/8j3QqagTVR4FMKLgNzqht1Ul4TfW','pepe@gmail.com','client','https://avatars.dicebear.com/api/avataaars/estonodeberiadepasarlavalidacion.svg?b=%23c2c2c2&r=50'),(26,'Pepe1963','$2y$10$WmG7jNQZImqhBCdqrOaOy.R0JuX0uiiJ6RVmTL2FWBpuRHJTSPnRm','pepevillanuevacastillo@gmail.com','client','https://avatars.dicebear.com/api/avataaars/Pepe1963.svg?b=%23c2c2c2&r=50');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'coches_ximo'
--
/*!50003 DROP PROCEDURE IF EXISTS `likes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`ximo`@`localhost` PROCEDURE `likes`(IN `p_usuario` INT, IN `p_coche` INT)
    NO SQL
BEGIN
	IF EXISTS (SELECT * FROM favoritos WHERE id_usuario=p_usuario AND id_coche=p_coche)
    THEN
    	DELETE FROM favoritos WHERE id_usuario=p_usuario AND id_coche=p_coche;
        SELECT TRUE AS RESULT, "DELETE" AS DESCRIPTION;
    ELSE
    	INSERT INTO favoritos VALUES (p_usuario,p_coche,NOW());
        SELECT FALSE AS RESULT, "ADD" AS DESCRIPTION;
    END IF;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `all_info_cars`
--

/*!50001 DROP VIEW IF EXISTS `all_info_cars`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ximo`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `all_info_cars` AS select `c`.`id_coche` AS `id_coche`,`c`.`IMG` AS `IMG`,`c`.`bastidor` AS `bastidor`,`c`.`matricula` AS `matricula`,`c`.`id_modelo` AS `id_modelo`,`c`.`kms` AS `kms`,`c`.`color` AS `color`,`c`.`puertas` AS `puertas`,`c`.`plazas` AS `plazas`,`c`.`motor` AS `motor`,`c`.`id_combustible` AS `id_combustible`,`c`.`fecha` AS `fecha`,`c`.`id_categoria` AS `id_categoria`,`c`.`cambio` AS `cambio`,`c`.`precio` AS `precio`,`c`.`ciudad` AS `ciudad`,`c`.`lat` AS `lat`,`c`.`lng` AS `lng`,`c`.`descripcion` AS `descripcion`,`a`.`nombre_marca` AS `nombre_marca`,`m`.`nombre_modelo` AS `nombre_modelo`,`o`.`nombre_combustible` AS `nombre_combustible`,`t`.`nombre_categoria` AS `nombre_categoria`,`n`.`n_visitas` AS `n_visitas` from (((((`coches` `c` left join `modelos` `m` on((`m`.`id_modelo` = `c`.`id_modelo`))) join `marcas` `a` on((`a`.`id_marca` = `m`.`id_marca`))) join `combustible` `o` on((`o`.`id_combustible` = `c`.`id_combustible`))) join `categoria` `t` on((`t`.`id_categoria` = `c`.`id_categoria`))) left join `n_visitas_coche` `n` on((`c`.`id_coche` = `n`.`id_coche`))) order by `n`.`n_visitas` desc,`a`.`nombre_marca` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-25 19:39:21
