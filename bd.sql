-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-02-2013 a las 16:27:23
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario`
--

CREATE TABLE IF NOT EXISTS `calendario` (
  `id_cal` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `titulo` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  UNIQUE KEY `fecha` (`fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcar la base de datos para la tabla `calendario`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE IF NOT EXISTS `documento` (
  `cota_doc` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_doc` text COLLATE utf8_spanish2_ci NOT NULL,
  `area` text COLLATE utf8_spanish2_ci NOT NULL,
  KEY `cota_doc` (`cota_doc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcar la base de datos para la tabla `documento`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE IF NOT EXISTS `estudiante` (
  `ci_est` int(11) NOT NULL,
  `grado` int(11) NOT NULL,
  `seccion` char(2) COLLATE utf8_spanish2_ci NOT NULL,
  KEY `ci_est` (`ci_est`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcar la base de datos para la tabla `estudiante`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `weight` int(25) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `images`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE IF NOT EXISTS `libro` (
  `cota_lib` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `autor` text COLLATE utf8_spanish2_ci NOT NULL,
  `editorial` text COLLATE utf8_spanish2_ci NOT NULL,
  `asignatura` text COLLATE utf8_spanish2_ci NOT NULL,
  `anio_edicion` int(11) NOT NULL,
  `paginas` int(11) NOT NULL,
  `grado` int(11) NOT NULL,
  KEY `cota_lib` (`cota_lib`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcar la base de datos para la tabla `libro`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lib_doc`
--

CREATE TABLE IF NOT EXISTS `lib_doc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cota` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish2_ci NOT NULL,
  `status` enum('DISPONIBLE','NO DISPONIBLE') COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` enum('LIBRO','DOCUMENTO') COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cota` (`cota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `lib_doc`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `ci` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_area` varchar(4) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(7) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_movil` varchar(4) COLLATE utf8_spanish2_ci NOT NULL,
  `movil` varchar(7) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` enum('ESTUDIANTE','DOCENTE') COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`ci`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcar la base de datos para la tabla `persona`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE IF NOT EXISTS `prestamo` (
  `id_p` int(11) NOT NULL AUTO_INCREMENT,
  `ci` int(11) NOT NULL,
  `fecha_actual` date NOT NULL,
  `fecha_devolucion` date NOT NULL,
  `observaciones` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_p`),
  KEY `ci` (`ci`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `prestamo`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacion`
--

CREATE TABLE IF NOT EXISTS `relacion` (
  `id_p` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `fecha_real` date NOT NULL,
  KEY `id_p` (`id_p`,`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcar la base de datos para la tabla `relacion`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subir_imagenes`
--

CREATE TABLE IF NOT EXISTS `subir_imagenes` (
  `nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` int(11) NOT NULL,
  `imagen` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `subir_imagenes`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `cedulauser` int(11) NOT NULL,
  `nombreuser` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidouser` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_area` varchar(4) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(7) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_movil` varchar(4) COLLATE utf8_spanish2_ci NOT NULL,
  `movil` varchar(7) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish2_ci NOT NULL,
  `usuario` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(8) COLLATE utf8_spanish2_ci NOT NULL,
  `nivel` enum('1','2') COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`cedulauser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cedulauser`, `nombreuser`, `apellidouser`, `cod_area`, `telefono`, `cod_movil`, `movil`, `direccion`, `usuario`, `clave`, `nivel`) VALUES
(20769430, 'Angie', 'Morales', '', '', '', '', '', 'admin', '1234', '1');

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `documento`
--
ALTER TABLE `documento`
  ADD CONSTRAINT `documento_ibfk_1` FOREIGN KEY (`cota_doc`) REFERENCES `lib_doc` (`cota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`ci_est`) REFERENCES `persona` (`ci`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`cota_lib`) REFERENCES `lib_doc` (`cota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `persona` (`ci`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `relacion`
--
ALTER TABLE `relacion`
  ADD CONSTRAINT `relacion_ibfk_1` FOREIGN KEY (`id_p`) REFERENCES `prestamo` (`id_p`),
  ADD CONSTRAINT `relacion_ibfk_2` FOREIGN KEY (`id`) REFERENCES `lib_doc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
