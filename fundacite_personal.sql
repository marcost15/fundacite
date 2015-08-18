-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Aug 17, 2015 at 12:50 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `fundacite_personal`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `asig_deducciones`
-- 

CREATE TABLE `asig_deducciones` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  `tipo` enum('A','D') collate utf8_spanish_ci NOT NULL,
  `tipo_calc` enum('M','P','F') collate utf8_spanish_ci NOT NULL,
  `porc` varchar(255) collate utf8_spanish_ci NOT NULL,
  `monto` varchar(254) collate utf8_spanish_ci NOT NULL,
  `formula` varchar(255) collate utf8_spanish_ci NOT NULL,
  `sso` enum('S','N') collate utf8_spanish_ci NOT NULL,
  `lph` enum('S','N') collate utf8_spanish_ci NOT NULL,
  `lpf` enum('S','N') collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `asig_deducciones`
-- 

INSERT INTO `asig_deducciones` VALUES (1, 'PRIMA DE PROFESIONAL', 'A', 'P', '12', '', '', 'S', 'S', 'S');
INSERT INTO `asig_deducciones` VALUES (2, 'PRIMA DE  RESPONSABILIDAD', 'A', 'M', '', '2000', '', 'S', 'S', 'S');
INSERT INTO `asig_deducciones` VALUES (3, 'PRIMA JERARQUIA', 'A', 'M', '', '1600', '', 'S', 'S', 'S');
INSERT INTO `asig_deducciones` VALUES (4, 'FONDO DE JUBILACION', 'D', 'F', '', '', '*0,03', 'N', 'N', 'N');
INSERT INTO `asig_deducciones` VALUES (5, 'CAJA DE AHORRO', 'D', 'F', '', '', '*0,1+3', 'N', 'N', 'N');

-- --------------------------------------------------------

-- 
-- Table structure for table `cargos`
-- 

CREATE TABLE `cargos` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `cargos`
-- 

INSERT INTO `cargos` VALUES (1, 'ASESOR');
INSERT INTO `cargos` VALUES (2, 'GERENTE');

-- --------------------------------------------------------

-- 
-- Table structure for table `clasificaciones`
-- 

CREATE TABLE `clasificaciones` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  `grado` varchar(255) collate utf8_spanish_ci NOT NULL,
  `complemento` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `clasificaciones`
-- 

INSERT INTO `clasificaciones` VALUES (1, 'BACHILLER I', '1', '0');
INSERT INTO `clasificaciones` VALUES (2, 'BACHILLER II', '1', '160');
INSERT INTO `clasificaciones` VALUES (3, 'BACHILLER III', '1', '291');

-- --------------------------------------------------------

-- 
-- Table structure for table `clasificacion_asig_deduccion`
-- 

CREATE TABLE `clasificacion_asig_deduccion` (
  `id` int(6) NOT NULL auto_increment,
  `clasificacion_id` int(6) NOT NULL,
  `asig_ded_id` int(6) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `clasificacion_asig_deduccion`
-- 

INSERT INTO `clasificacion_asig_deduccion` VALUES (1, 3, 1);
INSERT INTO `clasificacion_asig_deduccion` VALUES (2, 3, 2);
INSERT INTO `clasificacion_asig_deduccion` VALUES (3, 3, 3);
INSERT INTO `clasificacion_asig_deduccion` VALUES (4, 3, 4);
INSERT INTO `clasificacion_asig_deduccion` VALUES (5, 3, 5);

-- --------------------------------------------------------

-- 
-- Table structure for table `departamentos`
-- 

CREATE TABLE `departamentos` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `departamentos`
-- 

INSERT INTO `departamentos` VALUES (1, 'GERENCIA DE PROYECTOS');
INSERT INTO `departamentos` VALUES (2, 'ADMINISTRACION');
INSERT INTO `departamentos` VALUES (3, 'CONTABILIDAD');

-- --------------------------------------------------------

-- 
-- Table structure for table `grado_instruccion`
-- 

CREATE TABLE `grado_instruccion` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `grado_instruccion`
-- 

INSERT INTO `grado_instruccion` VALUES (1, 'TSU');
INSERT INTO `grado_instruccion` VALUES (2, 'ING');
INSERT INTO `grado_instruccion` VALUES (3, 'LIC');
INSERT INTO `grado_instruccion` VALUES (4, 'BACHILLER');

-- --------------------------------------------------------

-- 
-- Table structure for table `niveles`
-- 

CREATE TABLE `niveles` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='niveles de usuario o administrador' AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `niveles`
-- 

INSERT INTO `niveles` VALUES (1, 'ADMINISTRADOR');

-- --------------------------------------------------------

-- 
-- Table structure for table `pagos`
-- 

CREATE TABLE `pagos` (
  `id` int(6) NOT NULL auto_increment,
  `personal_id` int(6) NOT NULL,
  `clasificacion_id` int(6) NOT NULL,
  `quincena` enum('1ERA','2DA') collate utf8_spanish_ci NOT NULL,
  `fecha_desde` date NOT NULL,
  `fecha_hasta` date NOT NULL,
  `salario` varchar(255) collate utf8_spanish_ci NOT NULL,
  `total_asig` varchar(255) collate utf8_spanish_ci NOT NULL,
  `total_deducciones` varchar(255) collate utf8_spanish_ci NOT NULL,
  `neto` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `pagos`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `pagos_asig_ded`
-- 

CREATE TABLE `pagos_asig_ded` (
  `id` int(6) NOT NULL auto_increment,
  `pago_id` int(6) NOT NULL,
  `asig_nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  `tipo` enum('A','D') collate utf8_spanish_ci NOT NULL,
  `monto` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `pagos_asig_ded`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `personal`
-- 

CREATE TABLE `personal` (
  `id` int(6) NOT NULL auto_increment,
  `nac` enum('V','E') collate utf8_spanish_ci NOT NULL,
  `cedula` int(11) NOT NULL,
  `nombre` varchar(35) collate utf8_spanish_ci NOT NULL,
  `apellido` varchar(35) collate utf8_spanish_ci NOT NULL,
  `login` varchar(30) collate utf8_spanish_ci default NULL,
  `clave` varchar(32) collate utf8_spanish_ci default NULL,
  `nivel_id` int(6) NOT NULL,
  `estado` enum('ACTIVO','INACTIVO') collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `personal`
-- 

INSERT INTO `personal` VALUES (1, 'V', 1, 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'ACTIVO');
INSERT INTO `personal` VALUES (2, 'V', 17604411, 'MARCOS', 'TORREALBA', 'marcos', '33a55ce3bd6606437c71a69a15cee2c6', 1, 'ACTIVO');

-- --------------------------------------------------------

-- 
-- Table structure for table `personal_datos`
-- 

CREATE TABLE `personal_datos` (
  `personal_id` int(6) NOT NULL auto_increment,
  `direccion` varchar(255) collate utf8_spanish_ci NOT NULL,
  `tlf_fijo` varchar(11) collate utf8_spanish_ci default NULL,
  `tlf_movil` varchar(11) collate utf8_spanish_ci default NULL,
  `correo` varchar(50) collate utf8_spanish_ci default NULL,
  `fecha_ing` date NOT NULL,
  `foto` varchar(255) collate utf8_spanish_ci default NULL,
  `cargo_id` int(10) NOT NULL,
  `departamento_id` int(6) NOT NULL,
  `salario` varchar(255) collate utf8_spanish_ci NOT NULL,
  `profesion_id` int(6) NOT NULL,
  `grado_instruccion_id` int(6) NOT NULL,
  `clasificacion_id` int(6) NOT NULL,
  PRIMARY KEY  (`personal_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `personal_datos`
-- 

INSERT INTO `personal_datos` VALUES (1, 'admin', NULL, NULL, NULL, '2015-08-10', NULL, 1, 0, '1', 1, 1, 1);
INSERT INTO `personal_datos` VALUES (2, 'CARVAJAL', '22222222', '3333333333', 'aaaa@aaa.aaa', '2015-08-16', '', 1, 1, '6600', 1, 1, 3);

-- --------------------------------------------------------

-- 
-- Table structure for table `privilegios`
-- 

CREATE TABLE `privilegios` (
  `id` int(6) NOT NULL auto_increment,
  `pagina` varchar(255) collate utf8_spanish_ci NOT NULL,
  `nivel_id` int(6) NOT NULL,
  `acceso` enum('CONCEDER','DENEGAR') collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=22 ;

-- 
-- Dumping data for table `privilegios`
-- 

INSERT INTO `privilegios` VALUES (1, 'cambiar_clave.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (2, 'cargos.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (3, 'clasificaciones.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (4, 'consmod_personal.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (5, 'ficha_personal.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (6, 'grado_instruccion.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (7, 'index.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (8, 'modificar_personal.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (9, 'negacion_usuario.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (10, 'niveles.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (11, 'privilegios.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (12, 'profesiones.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (13, 'registrar_personal.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (14, 'retirar_personal.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (15, 'retirar_personal2.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (16, 'rp_cons_trabajo.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (17, 'departamentos.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (18, 'asigna_deduce.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (19, 'asig_asociadas.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (20, 'pagos.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (21, 'calculo_pago.php', 1, 'CONCEDER');

-- --------------------------------------------------------

-- 
-- Table structure for table `profesiones`
-- 

CREATE TABLE `profesiones` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `profesiones`
-- 

INSERT INTO `profesiones` VALUES (1, 'ING INFORMATICA');
INSERT INTO `profesiones` VALUES (2, 'LIC ADMINISTRACION');
