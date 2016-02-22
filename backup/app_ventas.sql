-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-02-2016 a las 10:12:04
-- Versión del servidor: 5.5.44-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `app_ventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `dni` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellidos`, `dni`, `estado`) VALUES
(1, 'Pepito', 'Alondra', '41265686', 1),
(2, 'Hellen', 'Sanchez', '41265856', 99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Contactos`
--

CREATE TABLE IF NOT EXISTS `Contactos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `mensaje` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `Contactos`
--

INSERT INTO `Contactos` (`id`, `nombres`, `apellidos`, `telefono`, `email`, `mensaje`, `fecha_add`, `ip`, `estado`) VALUES
(1, 'Hellen', 'Sanchez', '946852356', 'Hellen@gmail.com', 'Santo', '2016-02-17 15:59:36', '10.128.1.253', 1),
(2, 'Aguchito', 'Sanchez', '985645217', 'Aguchito@gmail.com', 'te mima no me mimamote', '2016-02-17 15:55:56', '10.128.1.255', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curriculum`
--

CREATE TABLE IF NOT EXISTS `curriculum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `dni` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nac` datetime NOT NULL,
  `distrito` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Juegos`
--

CREATE TABLE IF NOT EXISTS `Juegos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `año_creacion` year(4) NOT NULL,
  `creador` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `Juegos`
--

INSERT INTO `Juegos` (`id`, `nombre`, `descripcion`, `año_creacion`, `creador`, `add_date`, `estado`) VALUES
(1, 'Pepe', 'tonto', 2016, 'jony', '2016-02-03 15:50:11', 1),
(2, 'tito', 'nadie sabe', 2016, 'pilon', '2016-02-03 16:08:32', 1),
(3, 'pepe', 'nadie todavia', 2016, 'piticlin', '2016-02-03 16:12:16', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Platos`
--

CREATE TABLE IF NOT EXISTS `Platos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `precio` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `Platos`
--

INSERT INTO `Platos` (`id`, `nombre`, `descripcion`, `precio`, `stock`, `fecha`, `estado`) VALUES
(1, 'Arroz con pollo', 'muy delicioso', 100, 100, '2016-02-03 17:26:18', 1),
(2, 'chaufa', 'puro chinos', 200, 50, '2016-02-03 17:26:18', 1),
(3, 'ceviche', 'muy delicioso', 100, 100, '2016-02-03 17:33:38', 1),
(4, 'tipakay', 'puro chinos', 200, 50, '2016-02-05 14:01:13', 1),
(5, 'modongito', 'muy delicioso', 100, 100, '2016-02-03 17:33:38', 1),
(6, 'calu wantan', 'puro chinos', 200, 50, '2016-02-05 14:01:34', 1),
(7, 'tallarines', 'muy delicioso', 100, 100, '2016-02-03 17:33:38', 1),
(8, 'chaufa', 'puro chinos', 200, 50, '2016-02-03 17:33:38', 1),
(9, 'locro', 'muy delicioso', 100, 100, '2016-02-03 17:33:38', 1),
(10, 'menestron', 'puro chinos', 200, 50, '2016-02-05 14:02:09', 1),
(11, 'sopa a la minuta', 'muy delicioso', 100, 100, '2016-02-03 17:33:38', 1),
(12, 'tacutacu', 'puro chinos', 200, 50, '2016-02-05 14:02:56', 1),
(13, 'escabeche', 'muy delicioso', 100, 100, '2016-02-03 17:33:38', 1),
(14, 'picante de carne', 'puro chinos', 200, 50, '2016-02-05 14:03:12', 1),
(15, 'pato al jugo', 'muy delicioso', 100, 100, '2016-02-03 17:33:38', 1),
(16, 'aguadito', 'puro chinos', 200, 50, '2016-02-05 14:03:27', 1),
(17, 'aeropuerto', 'muy delicioso', 100, 100, '2016-02-03 17:33:38', 1),
(18, 'mani con pollo', 'puro chinos', 200, 50, '2016-02-05 14:03:39', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
