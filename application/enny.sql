-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-05-2013 a las 12:48:58
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `enny`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE IF NOT EXISTS `actividades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_id` int(11) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `descripcion` text NOT NULL,
  `active` binary(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id`, `area_id`, `nombre`, `descripcion`, `active`, `created`) VALUES
(1, 1, 'Creacion de materias', 'Materias organicas', '1', '2013-04-16 05:40:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `descripcion` text NOT NULL,
  `tipo` varchar(35) NOT NULL,
  `active` binary(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `nombre`, `descripcion`, `tipo`, `active`, `created`) VALUES
(1, 'Laboratorio', 'Laboratorio de Quimica', 'Laboratorio', '1', '2013-04-16 05:25:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aspectos`
--

CREATE TABLE IF NOT EXISTS `aspectos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(35) NOT NULL,
  `descripcion` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipo_id` int(11) NOT NULL,
  `active` binary(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(35) NOT NULL,
  `descripcion` text NOT NULL,
  `active` binary(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `active`) VALUES
(5, 'Integrante SGA', 'Parte del SGA', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `checklist`
--

CREATE TABLE IF NOT EXISTS `checklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cuerpo` text NOT NULL,
  `status` int(11) NOT NULL,
  `widgetobj_id` int(11) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Volcado de datos para la tabla `checklist`
--

INSERT INTO `checklist` (`id`, `cuerpo`, `status`, `widgetobj_id`, `creado`) VALUES
(1, 'uno', 0, 18, '2013-04-14 15:34:03'),
(2, 'dos', 0, 18, '2013-04-14 15:34:03'),
(3, 'tres', 0, 18, '2013-04-14 15:34:03'),
(4, 'cuetro', 0, 18, '2013-04-14 15:34:03'),
(5, 'holistica', 0, 19, '2013-04-14 16:28:16'),
(6, 'uno', 1, 20, '2013-04-14 16:35:11'),
(7, 'sdf', 1, 21, '2013-04-14 16:38:41'),
(8, 'sdf', 0, 21, '2013-04-14 16:38:41'),
(9, 'one', 1, 22, '2013-04-14 16:50:53'),
(10, 'two', 1, 22, '2013-04-14 16:50:53'),
(11, 'Apropiada a la naturaleza de sus actividades, productos y servicios.', 1, 23, '2013-04-14 16:53:01'),
(17, 'Apropiada a la magnitud de sus actividades, productos y servicios.', 1, 23, '2013-04-14 20:52:26'),
(18, 'Apropiada a los impactos ambientales de sus actividades productos y servios.', 1, 23, '2013-04-14 21:14:44'),
(19, 'Incluye un compromiso de mejora continua y prevención de la contaminación.', 1, 23, '2013-04-14 21:14:44'),
(20, 'Incluye el compromiso de cumplir con los requisitos legales aplicables y con otros requisitos que la organización suscriba relacionados con sus aspectos ambientales.', 0, 23, '2013-04-14 21:17:03'),
(21, 'Proporcionar el marco de referencia para establecer y revisar los objetivos y las metas ambientales.', 1, 23, '2013-04-14 21:17:38'),
(22, 'fg', 1, 28, '2013-05-18 12:47:29'),
(23, 'fg', 0, 28, '2013-05-18 12:47:29'),
(24, 'fg', 0, 28, '2013-05-18 12:47:29'),
(25, 'fg', 0, 28, '2013-05-18 12:47:29'),
(26, '1', 0, 32, '2013-05-18 23:40:18'),
(27, '2', 0, 32, '2013-05-18 23:40:18'),
(28, '3', 0, 32, '2013-05-18 23:40:18'),
(29, '4', 0, 32, '2013-05-18 23:40:18'),
(30, '1', 1, 33, '2013-05-18 23:41:11'),
(31, '2', 0, 33, '2013-05-18 23:41:11'),
(32, '3', 0, 33, '2013-05-18 23:41:11'),
(33, '4', 0, 33, '2013-05-18 23:41:11'),
(34, '5', 1, 33, '2013-05-18 23:41:11'),
(35, 'edf', 0, 34, '2013-05-18 23:43:18'),
(36, 'ddd', 0, 34, '2013-05-18 23:43:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cuerpo` text NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `widgetobj_id` int(11) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `cuerpo`, `usuario_id`, `widgetobj_id`, `creado`) VALUES
(29, 'coment', 0, 1, '2013-02-26 22:38:12'),
(30, 'coment 2', 0, 1, '2013-02-26 22:38:17'),
(31, 'coment 2', 0, 1, '2013-02-26 22:38:35'),
(32, 'holis', 0, 1, '2013-02-26 22:38:43'),
(33, 'que buen post', 0, 3, '2013-02-26 22:39:09'),
(34, 'Comentario en el tec', 0, 3, '2013-02-27 00:23:11'),
(35, 'sdfsdf', 0, 25, '2013-04-15 05:38:17'),
(36, 'sdfsdf', 4, 26, '2013-04-15 05:42:03'),
(37, 'Tengo una mejora que puede funcionar, enfatizar en la docencia', 4, 27, '2013-04-15 05:50:42'),
(40, 'Se me ocurrió una mejora a la Política Ambiental', 0, 27, '2013-04-17 14:26:47'),
(41, 'asfasd', 0, 27, '2013-04-17 14:27:08'),
(43, 'Mejorar la PA', 4, 28, '2013-04-17 16:55:02'),
(44, 'Mejorar la PA', 4, 29, '2013-04-17 18:13:45'),
(45, 'Reunión de enny', 4, 27, '2013-04-21 23:32:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `legislaciones`
--

CREATE TABLE IF NOT EXISTS `legislaciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` text NOT NULL,
  `nivel_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` binary(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metas`
--

CREATE TABLE IF NOT EXISTS `metas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `widgetobj_id` int(11) NOT NULL,
  `nombre` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `edo_actual` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `edo_inicial` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `edo_lograr` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `metrica` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_meta` date NOT NULL,
  `cuantificable` tinyint(1) NOT NULL,
  `tipo` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `metas`
--

INSERT INTO `metas` (`id`, `widgetobj_id`, `nombre`, `descripcion`, `edo_actual`, `edo_inicial`, `edo_lograr`, `metrica`, `fecha_inicio`, `fecha_meta`, `cuantificable`, `tipo`, `creado`) VALUES
(2, 0, 'ko', 'ko', '78', '78', '908', 'Ha', '2013-12-02', '2013-12-11', 1, 'Mantener', '2013-05-19 02:59:24'),
(3, 0, 'ko', 'ko', '8', '8', '888', 'Ha', '2013-05-18', '2013-12-11', 1, 'Incrementar', '2013-05-19 03:01:25'),
(7, 36, 'Lograr requisitos de PA', 'Alcanzar la totalidad de los requisitos para establecer una PA', '2', '2', '8', 'Ha', '2013-05-02', '2013-12-11', 1, 'Incrementar', '2013-05-20 01:26:19'),
(6, 36, 'Capacitación de personal', 'Que todo el personal conozca el SGA.', '10', '10', '150', 'Personas', '2013-12-02', '2013-12-11', 1, 'Incrementar', '2013-05-20 01:24:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE IF NOT EXISTS `niveles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `descripcion` text NOT NULL,
  `active` binary(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetivos`
--

CREATE TABLE IF NOT EXISTS `objetivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) NOT NULL,
  `descripcion` text NOT NULL,
  `programa_id` int(11) NOT NULL,
  `imagen` varchar(120) NOT NULL,
  `active` binary(1) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `objetivos`
--

INSERT INTO `objetivos` (`id`, `nombre`, `descripcion`, `programa_id`, `imagen`, `active`, `creado`) VALUES
(1, 'Objetivo 1', '', 0, '', '\0', '2013-04-06 00:43:44'),
(3, 'Crear comité', 'Crear comité', 1, 'imagen_objetivo_5.jpg', '1', '2013-04-17 15:12:20'),
(4, 'objetivo 2', '', 0, '', '\0', '2013-04-14 07:55:59'),
(5, 'Definición de política ambiental', 'Definición de política ambiental', 1, '', '1', '2013-05-20 00:39:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(140) NOT NULL,
  `cuerpo` text NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `titulo`, `cuerpo`, `usuario_id`, `categoria_id`, `creado`) VALUES
(1, 'hola', 'mama', 0, 0, '2013-02-21 00:58:39'),
(2, 'post number two', '', 0, 0, '2013-02-21 01:02:25'),
(3, 'Soy Post', 'Cuerpo de este post', 0, 0, '2013-02-21 01:02:39'),
(4, 'Otro Post', 'Cuerpo de este post', 0, 0, '2013-02-21 01:02:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE IF NOT EXISTS `programas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(120) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`id`, `nombre`, `descripcion`, `imagen`, `activo`, `created`) VALUES
(1, 'creación de Política Ambiental', 'creación de Política Ambiental', 'ambiental.png', 1, '2013-04-17 15:05:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsabilidades`
--

CREATE TABLE IF NOT EXISTS `responsabilidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `responsable` varchar(50) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `responsabilidad` varchar(50) NOT NULL,
  `autoridad` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `text`
--

CREATE TABLE IF NOT EXISTS `text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `widgetobj_id` int(11) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `text`
--

INSERT INTO `text` (`id`, `descripcion`, `widgetobj_id`, `creado`) VALUES
(7, 'El SNEST establece el compromiso de orientar todas sus actividades del Proceso Educativo, hacia el respeto del medio ambiente; cumplir la legislación ambiental aplicable y otros requisitos ambientales que se suscriban, promover en su personal, clientes y partes interesadas la prevención de la contaminación y el uso racional de los recursos, mediante la implementación, operación y mejora continua de un Sistema de Gestión Ambiental, conforme a la norma ISO 14001:2004/NMX-SAA-14001-IMNC-2004.--', 3, '2013-04-06 22:47:49'),
(9, 'f', 4, '2013-04-06 22:47:50'),
(10, 'k', 5, '2013-04-07 00:34:02'),
(19, '999', 4, '2013-04-07 21:46:07'),
(21, 'tres', 10, '2013-04-14 04:01:03'),
(22, 'Cosa jon', 11, '2013-04-14 05:27:55'),
(23, 'dos', 12, '2013-04-14 05:52:40'),
(24, 'mama', 13, '2013-04-14 06:27:45'),
(25, 'luna', 14, '2013-04-14 06:34:59'),
(26, 'poliglota', 15, '2013-04-14 06:42:57'),
(27, 'Redacta tu política ambiental de acuerdo a los requisitos mostrados.\r\n\r\nRecuerda que la creación de tu política es un proceso iterativo.', 16, '2013-04-14 06:54:11'),
(28, 'ghj', 30, '2013-05-18 16:33:52'),
(29, 'qwety', 31, '2013-05-18 16:41:54'),
(30, 'Estoy en desacuerdo >:V', 37, '2013-05-19 15:38:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE IF NOT EXISTS `tipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `active` binary(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `name`, `lastname`, `email`, `password`, `created`) VALUES
(1, 'david3', 'David', 'Nunez', 'davidnhz@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2013-02-27 23:08:54'),
(2, 'asdasdasd', 'asdasd', 'asdasd', 'davidnhz@gmail.com', 'a3dcb4d229de6fde0db5686dee47145d', '2013-02-27 23:25:46'),
(3, 'chitobiz', 'Chita', 'Tec', 'chita@tec.edu.mx', 'e10adc3949ba59abbe56e057f20f883e', '2013-02-28 01:50:40'),
(4, 'alaz26', '', '', '', 'e10adc3949ba59abbe56e057f20f883e', '2013-03-04 02:03:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_a`
--

CREATE TABLE IF NOT EXISTS `usuarios_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `active` binary(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `widget_obj`
--

CREATE TABLE IF NOT EXISTS `widget_obj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(120) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `config` text NOT NULL,
  `objetivo_id` int(11) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Volcado de datos para la tabla `widget_obj`
--

INSERT INTO `widget_obj` (`id`, `tipo`, `nombre`, `config`, `objetivo_id`, `creado`) VALUES
(3, 'text', 'Poltica Ambiental', '', 3, '2013-04-06 22:47:49'),
(16, 'text', 'Instrucciones', '', 3, '2013-04-14 06:54:11'),
(23, 'check', 'Requisitos de PA', '', 3, '2013-04-14 16:53:01'),
(27, 'comentario', 'Comentarios', '', 3, '2013-04-15 05:50:42'),
(36, 'meta', 'Metas', '', 3, '2013-05-19 01:22:28'),
(37, 'text', 'Desacuerdos', '', 3, '2013-05-19 15:38:06');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
