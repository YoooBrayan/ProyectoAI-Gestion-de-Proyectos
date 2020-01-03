
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
DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrador` (
  `idAdministrador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  PRIMARY KEY (`idAdministrador`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES (1,'Juan','Perez','Juan@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'Creado por Estudiante');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `estudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudiante` (
  `codigo` bigint(20) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `proyecto` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `correo` (`correo`),
  KEY `proyecto` (`proyecto`),
  CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`proyecto`) REFERENCES `proyecto` (`idProyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `estudiante` WRITE;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` VALUES (1000,'Pepe','Perez','pepe@p.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef',437),(2000,'Yooo','Yo','Yo1@yo.com','123',NULL),(3000,'Juan ','Guevara','guevara@gmail.com','123',NULL),(20162578005,'Brayan','Moreno Cupitra','brayanguitar000@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef',438);
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `profesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profesor` (
  `idProfesor` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  PRIMARY KEY (`idProfesor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `profesor` WRITE;
/*!40000 ALTER TABLE `profesor` DISABLE KEYS */;
INSERT INTO `profesor` VALUES (500,'asdsa','asdas','q@q.com','123'),(1000,'Hector','Florez','hector@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef'),(2000,'Sonia','mmm','Sonia@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef'),(3000,'Juan','Guevara','guevara@gmail.com','123'),(4000,'sfsdf','sfsdf','sdfs@fdsf.com','123'),(5000,'asdsa','sdas','qq@ww.com','123'),(6000,'sdfksdf','dkfkdsf','6000@6.com','123');
/*!40000 ALTER TABLE `profesor` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyecto` (
  `idProyecto` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text NOT NULL,
  `Plantamiento` text,
  `objetivoGeneral` text,
  `objetivosEspecificos` text,
  `solucionTecnologica` text,
  `documento` varchar(100) NOT NULL,
  `tutor` int(11) DEFAULT NULL,
  `jurado` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `random` bigint(20) NOT NULL,
  PRIMARY KEY (`idProyecto`),
  KEY `tutor` (`tutor`),
  KEY `jurado` (`jurado`),
  KEY `estado` (`estado`),
  CONSTRAINT `proyecto_ibfk_1` FOREIGN KEY (`tutor`) REFERENCES `profesor` (`idProfesor`),
  CONSTRAINT `proyecto_ibfk_2` FOREIGN KEY (`jurado`) REFERENCES `profesor` (`idProfesor`),
  CONSTRAINT `proyecto_ibfk_3` FOREIGN KEY (`estado`) REFERENCES `estado` (`idEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=439 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `proyecto` WRITE;
/*!40000 ALTER TABLE `proyecto` DISABLE KEYS */;
INSERT INTO `proyecto` VALUES (434,'Proyecto 1','asdasdasd','Objetivo 1','objetivo 2 y 3','Aplicacion web','proyecto.pdf',1000,NULL,1,1),(435,'asdasdasd','<p>asdajsdasdasd</p>','<p>asdasdsad</p>','<p>njasodasd</p>','<p>asdasdasdasd</p>','Parcial 1 Apl Int.pdf',NULL,NULL,1,112020042408),(436,'iolhnjk','<p>hjiol</p>','<p>rfgjfdjgdofg</p>','<p>njoldsa</p>','<p>asdasdsadsad</p>','Parcial 1 Apl Int.pdf',NULL,NULL,1,112020064101),(437,'pepe','<p>pepe&nbsp;&nbsp;&nbsp;&nbsp;</p>','<p>pepe</p>','<p>pepe</p>','<p>pepe</p>','Parcial 1 Apl Int.pdf',NULL,NULL,1,112020071810),(438,' ANALISIS, DISEÑO Y DESARROLLO DE UN SISTEMA ERP MULTIPLATAFORMA PARA LA GESTIÓN DE UNA EMPRESA TEXTIL','<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left: 53.4pt; text-indent: -18pt; line-height: 32px;\"><span style=\"font-size: 12pt; line-height: 32px; font-family: &quot;Times New Roman&quot;, serif;\">1.1.</span><span style=\"font-size: 12pt; line-height: 32px; font-family: &quot;Times New Roman&quot;, serif;\">&nbsp;OBJETIVOS ESPECÍFICOS<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 86.2pt; text-indent: -18pt; line-height: 32px;\"><span style=\"font-size: 12pt; line-height: 32px; font-family: Symbol;\">·<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; line-height: 32px; font-family: &quot;Times New Roman&quot;, serif;\">Analizar los requerimientos funcionales y no funcionales.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 86.2pt; text-indent: -18pt; line-height: 32px;\"><span style=\"font-size: 12pt; line-height: 32px; font-family: Symbol;\">·<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; line-height: 32px; font-family: &quot;Times New Roman&quot;, serif;\">Diseñar y desarrollar las distintas vistas del sistema para cada plataforma del aplicativo, con una interfaz gráfica funcional para cada usuario.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 86.2pt; text-indent: -18pt; line-height: 32px;\"><span style=\"font-size: 12pt; line-height: 32px; font-family: Symbol;\">·<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; line-height: 32px; font-family: &quot;Times New Roman&quot;, serif;\">Desarrollar módulos que permitan guardar y analizar los datos existentes en el sistema, para procesar reportes informativos.<o:p></o:p></span></p><p></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left: 86.2pt; text-indent: -18pt; line-height: 32px;\"><span style=\"font-size: 12pt; line-height: 32px; font-family: Symbol;\">·<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; line-height: 32px; font-family: &quot;Times New Roman&quot;, serif;\">Desarrollar módulos que permitan la comunicación entre las distintas plataformas del sistema.</span></p>','<p class=\"MsoListParagraph\" style=\"margin-left:53.4pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;line-height:200%;mso-list:l0 level2 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:200%;font-family:&quot;Times New Roman&quot;,serif;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;\">1.1.</span><!--[endif]--><span style=\"font-size:12.0pt;line-height:200%;font-family:&quot;Times New Roman&quot;,serif\">\r\nOBJETIVO GENERAL<o:p></o:p></span></p><p>\r\n\r\n</p><p class=\"MsoNormal\" style=\"margin-left:35.4pt;line-height:200%\"><span style=\"font-size:12.0pt;line-height:200%;font-family:&quot;Times New Roman&quot;,serif\">Realizar\r\nel análisis, diseño y desarrollo de<span style=\"color:red\"> </span>un sistema\r\nERP multiplataforma que gestione la administración de una empresa de\r\nconfecciones.<o:p></o:p></span></p>','<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:53.4pt;mso-add-space:\r\nauto;text-indent:-18.0pt;line-height:200%;mso-list:l0 level2 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:200%;font-family:&quot;Times New Roman&quot;,serif;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;\">1.1.</span><!--[endif]--><span style=\"font-size:12.0pt;line-height:200%;font-family:&quot;Times New Roman&quot;,serif\">\r\nOBJETIVOS ESPECÍFICOS<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:86.2pt;mso-add-space:\r\nauto;text-indent:-18.0pt;line-height:200%;mso-list:l1 level1 lfo2;tab-stops:\r\n176.65pt\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:200%;\r\nfont-family:Symbol;mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol\">·<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:200%;\r\nfont-family:&quot;Times New Roman&quot;,serif\">Analizar los requerimientos funcionales y\r\nno funcionales.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:86.2pt;mso-add-space:\r\nauto;text-indent:-18.0pt;line-height:200%;mso-list:l1 level1 lfo2;tab-stops:\r\n176.65pt\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:200%;\r\nfont-family:Symbol;mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol\">·<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:200%;\r\nfont-family:&quot;Times New Roman&quot;,serif\">Diseñar y desarrollar las distintas vistas\r\ndel sistema para cada plataforma del aplicativo, con una interfaz gráfica\r\nfuncional para cada usuario.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:86.2pt;mso-add-space:\r\nauto;text-indent:-18.0pt;line-height:200%;mso-list:l1 level1 lfo2;tab-stops:\r\n176.65pt\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:200%;\r\nfont-family:Symbol;mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol\">·<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:200%;\r\nfont-family:&quot;Times New Roman&quot;,serif\">Desarrollar módulos que permitan guardar y\r\nanalizar los datos existentes en el sistema, para procesar reportes\r\ninformativos.<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left:86.2pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;line-height:200%;mso-list:l1 level1 lfo2;tab-stops:176.65pt\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:200%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol\">·<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:200%;\r\nfont-family:&quot;Times New Roman&quot;,serif\">Desarrollar módulos que permitan la\r\ncomunicación entre las distintas plataformas del sistema.<o:p></o:p></span></p>','<p>fsdfsdf</p>','Parcial 1 Apl Int.pdf',NULL,NULL,1,112020102423);
/*!40000 ALTER TABLE `proyecto` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

