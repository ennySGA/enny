-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 16-05-2013 a las 20:59:21
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `enny`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `actividades`
-- 

CREATE TABLE `actividades` (
  `id` int(11) NOT NULL auto_increment,
  `area_id` int(11) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `descripcion` text NOT NULL,
  `active` binary(1) NOT NULL,
  `created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `actividades`
-- 

INSERT INTO `actividades` VALUES (1, 1, 'Creacion de materias', 'Materias organicas', 0x31, '2013-04-16 00:40:24');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `areas`
-- 

CREATE TABLE `areas` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(25) NOT NULL,
  `descripcion` text NOT NULL,
  `tipo` varchar(35) NOT NULL,
  `active` binary(1) NOT NULL,
  `created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `areas`
-- 

INSERT INTO `areas` VALUES (1, 'Laboratorio', 'Laboratorio de Quimica', 'Laboratorio', 0x31, '2013-04-16 00:25:35');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `aspectos`
-- 

CREATE TABLE `aspectos` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(35) NOT NULL,
  `descripcion` text NOT NULL,
  `created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `tipo_id` int(11) NOT NULL,
  `active` binary(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `aspectos`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `categorias`
-- 

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(35) NOT NULL,
  `descripcion` text NOT NULL,
  `active` binary(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- Volcar la base de datos para la tabla `categorias`
-- 

INSERT INTO `categorias` VALUES (5, 'Integrante SGA', 'Parte del SGA', 0x31);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `checklist`
-- 

CREATE TABLE `checklist` (
  `id` int(11) NOT NULL auto_increment,
  `cuerpo` text NOT NULL,
  `status` int(11) NOT NULL,
  `widgetobj_id` int(11) NOT NULL,
  `creado` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

-- 
-- Volcar la base de datos para la tabla `checklist`
-- 

INSERT INTO `checklist` VALUES (1, 'uno', 0, 18, '2013-04-14 10:34:03');
INSERT INTO `checklist` VALUES (2, 'dos', 0, 18, '2013-04-14 10:34:03');
INSERT INTO `checklist` VALUES (3, 'tres', 0, 18, '2013-04-14 10:34:03');
INSERT INTO `checklist` VALUES (4, 'cuetro', 0, 18, '2013-04-14 10:34:03');
INSERT INTO `checklist` VALUES (5, 'holistica', 0, 19, '2013-04-14 11:28:16');
INSERT INTO `checklist` VALUES (6, 'uno', 1, 20, '2013-04-14 11:35:11');
INSERT INTO `checklist` VALUES (7, 'sdf', 1, 21, '2013-04-14 11:38:41');
INSERT INTO `checklist` VALUES (8, 'sdf', 0, 21, '2013-04-14 11:38:41');
INSERT INTO `checklist` VALUES (9, 'one', 1, 22, '2013-04-14 11:50:53');
INSERT INTO `checklist` VALUES (10, 'two', 1, 22, '2013-04-14 11:50:53');
INSERT INTO `checklist` VALUES (11, 'Apropiada a la naturaleza de sus actividades, productos y servicios.', 1, 23, '2013-04-14 11:53:01');
INSERT INTO `checklist` VALUES (17, 'Apropiada a la magnitud de sus actividades, productos y servicios.', 1, 23, '2013-04-14 15:52:26');
INSERT INTO `checklist` VALUES (18, 'Apropiada a los impactos ambientales de sus actividades productos y servios.', 0, 23, '2013-04-14 16:14:44');
INSERT INTO `checklist` VALUES (19, 'Incluye un compromiso de mejora continua y prevención de la contaminación.', 1, 23, '2013-04-14 16:14:44');
INSERT INTO `checklist` VALUES (20, 'Incluye el compromiso de cumplir con los requisitos legales aplicables y con otros requisitos que la organización suscriba relacionados con sus aspectos ambientales.', 0, 23, '2013-04-14 16:17:03');
INSERT INTO `checklist` VALUES (21, 'Proporcionar el marco de referencia para establecer y revisar los objetivos y las metas ambientales.', 1, 23, '2013-04-14 16:17:38');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `comentarios`
-- 

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL auto_increment,
  `cuerpo` text NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `widgetobj_id` int(11) NOT NULL,
  `creado` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

-- 
-- Volcar la base de datos para la tabla `comentarios`
-- 

INSERT INTO `comentarios` VALUES (29, 'coment', 0, 1, '2013-02-26 16:38:12');
INSERT INTO `comentarios` VALUES (30, 'coment 2', 0, 1, '2013-02-26 16:38:17');
INSERT INTO `comentarios` VALUES (31, 'coment 2', 0, 1, '2013-02-26 16:38:35');
INSERT INTO `comentarios` VALUES (32, 'holis', 0, 1, '2013-02-26 16:38:43');
INSERT INTO `comentarios` VALUES (33, 'que buen post', 0, 3, '2013-02-26 16:39:09');
INSERT INTO `comentarios` VALUES (34, 'Comentario en el tec', 0, 3, '2013-02-26 18:23:11');
INSERT INTO `comentarios` VALUES (35, 'sdfsdf', 0, 25, '2013-04-15 00:38:17');
INSERT INTO `comentarios` VALUES (36, 'sdfsdf', 4, 26, '2013-04-15 00:42:03');
INSERT INTO `comentarios` VALUES (37, 'Tengo una mejora que puede funcionar, enfatizar en la docencia', 4, 27, '2013-04-15 00:50:42');
INSERT INTO `comentarios` VALUES (40, 'Se me ocurrió una mejora a la Política Ambiental', 0, 27, '2013-04-17 09:26:47');
INSERT INTO `comentarios` VALUES (41, 'asfasd', 0, 27, '2013-04-17 09:27:08');
INSERT INTO `comentarios` VALUES (42, 'les parece si agendamos reunión para actualizar la PA?', 4, 27, '2013-04-17 09:31:14');
INSERT INTO `comentarios` VALUES (43, 'Mejorar la PA', 4, 28, '2013-04-17 11:55:02');
INSERT INTO `comentarios` VALUES (44, 'Mejorar la PA', 4, 29, '2013-04-17 13:13:45');
INSERT INTO `comentarios` VALUES (45, 'Reunión de enny', 4, 27, '2013-04-21 18:32:44');
INSERT INTO `comentarios` VALUES (46, 'Estaria bueno que el nombre del objetivo apareciera en la vista del objetivo que estanmos viendo.', 1, 27, '2013-05-14 19:55:59');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `eventos`
-- 

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL auto_increment,
  `objetivo_id` int(11) NOT NULL,
  `nombre` varchar(120) collate utf8_spanish_ci NOT NULL,
  `descripcion` varchar(120) collate utf8_spanish_ci NOT NULL,
  `fecha_evento` date NOT NULL,
  `publico` varchar(120) collate utf8_spanish_ci NOT NULL,
  `publicar` tinyint(1) NOT NULL,
  `interno` tinyint(1) NOT NULL,
  `responsable` varchar(120) collate utf8_spanish_ci NOT NULL,
  `lugar` varchar(120) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `eventos`
-- 

INSERT INTO `eventos` VALUES (1, 3, 'Probando evento', 'descripcion', '2013-12-19', 'todos', 1, 1, 'yo', 'tu casa');
INSERT INTO `eventos` VALUES (2, 3, 'Evento nuevo', 'descripcion', '2013-07-11', 'ejecutivos', 0, 1, 'yo mama', 'prr prr');
INSERT INTO `eventos` VALUES (3, 3, 'Nombre_evento', '', '2013-05-31', 'todos', 0, 0, '', '');
INSERT INTO `eventos` VALUES (4, 3, 'tirilirili', 'blblb', '2013-06-01', 'todos', 0, 0, '', '');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `legislaciones`
-- 

CREATE TABLE `legislaciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` text NOT NULL,
  `nivel_id` int(11) NOT NULL,
  `created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `active` binary(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `legislaciones`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `metas`
-- 

CREATE TABLE `metas` (
  `id` int(11) NOT NULL auto_increment,
  `objetivo_id` int(11) NOT NULL,
  `nombre` varchar(120) collate utf8_spanish_ci NOT NULL,
  `descripcion` varchar(120) collate utf8_spanish_ci NOT NULL,
  `edo_actual` varchar(120) collate utf8_spanish_ci NOT NULL,
  `edo_inicial` varchar(120) collate utf8_spanish_ci NOT NULL,
  `edo_lograr` varchar(120) collate utf8_spanish_ci NOT NULL,
  `metrica` varchar(120) collate utf8_spanish_ci NOT NULL,
  `fecha_meta` date NOT NULL,
  `cuantificable` tinyint(1) NOT NULL,
  `tipo` varchar(120) collate utf8_spanish_ci NOT NULL,
  `promover` tinyint(1) NOT NULL,
  `usar_menos` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `metas`
-- 

INSERT INTO `metas` VALUES (1, 3, 'Aumentar el ahorro de agua al 200%', 'El agua es el liquido vital que blabla..', '20', '20', '200', 'Kg', '2013-08-15', 1, 'Incrementar', 1, 1);
INSERT INTO `metas` VALUES (2, 3, 'Disminuir emisiones de CO2', 'lorem', '150', '150', '20', 'Kg', '2013-10-18', 1, 'Reducir', 1, 1);
INSERT INTO `metas` VALUES (3, 3, 'Meta feliz', 'blblbl', '20', '20', '180', 'Kg', '2013-08-31', 1, 'Incrementar', 1, 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `niveles`
-- 

CREATE TABLE `niveles` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(25) NOT NULL,
  `descripcion` text NOT NULL,
  `active` binary(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `niveles`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `objetivos`
-- 

CREATE TABLE `objetivos` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(120) NOT NULL,
  `descripcion` text NOT NULL,
  `programa_id` int(11) NOT NULL,
  `imagen` varchar(120) NOT NULL,
  `active` binary(1) NOT NULL,
  `creado` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `objetivos`
-- 

INSERT INTO `objetivos` VALUES (1, 'Objetivo 1', '', 0, '', 0x00, '2013-04-05 18:43:44');
INSERT INTO `objetivos` VALUES (3, 'Crear comité', 'Crear comité', 1, 'imagen_objetivo_5.jpg', 0x31, '2013-04-17 10:12:20');
INSERT INTO `objetivos` VALUES (4, 'objetivo 2', '', 0, '', 0x00, '2013-04-14 02:55:59');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `posts`
-- 

CREATE TABLE `posts` (
  `id` int(11) NOT NULL auto_increment,
  `titulo` varchar(140) NOT NULL,
  `cuerpo` text NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `creado` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `posts`
-- 

INSERT INTO `posts` VALUES (1, 'hola', 'mama', 0, 0, '2013-02-20 18:58:39');
INSERT INTO `posts` VALUES (2, 'post number two', '', 0, 0, '2013-02-20 19:02:25');
INSERT INTO `posts` VALUES (3, 'Soy Post', 'Cuerpo de este post', 0, 0, '2013-02-20 19:02:39');
INSERT INTO `posts` VALUES (4, 'Otro Post', 'Cuerpo de este post', 0, 0, '2013-02-20 19:02:39');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `programas`
-- 

CREATE TABLE `programas` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(120) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `programas`
-- 

INSERT INTO `programas` VALUES (1, 'creación de Política Ambiental', 'creación de Política Ambiental', 'ambiental.png', 1, '2013-04-17 10:05:12');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `responsabilidades`
-- 

CREATE TABLE `responsabilidades` (
  `id` int(11) NOT NULL auto_increment,
  `responsable` varchar(50) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `responsabilidad` varchar(50) NOT NULL,
  `autoridad` varchar(50) NOT NULL,
  `created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `responsabilidades`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `text`
-- 

CREATE TABLE `text` (
  `id` int(11) NOT NULL auto_increment,
  `descripcion` text NOT NULL,
  `widgetobj_id` int(11) NOT NULL,
  `creado` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

-- 
-- Volcar la base de datos para la tabla `text`
-- 

INSERT INTO `text` VALUES (7, 'El SNEST establece el compromiso de orientar todas sus actividades del Proceso Educativo, hacia el respeto del medio ambiente; cumplir la legislación ambiental aplicable y otros requisitos ambientales que se suscriban, promover en su personal, clientes y partes interesadas la prevención de la contaminación y el uso racional de los recursos, mediante la implementación, operación y mejora continua de un Sistema de Gestión Ambiental, conforme a la norma ISO 14001:2004/NMX-SAA-14001-IMNC-2004.--', 3, '2013-04-06 16:47:49');
INSERT INTO `text` VALUES (9, 'f', 4, '2013-04-06 16:47:50');
INSERT INTO `text` VALUES (10, 'k', 5, '2013-04-06 18:34:02');
INSERT INTO `text` VALUES (19, '999', 4, '2013-04-07 16:46:07');
INSERT INTO `text` VALUES (21, 'tres', 10, '2013-04-13 23:01:03');
INSERT INTO `text` VALUES (22, 'Cosa jon', 11, '2013-04-14 00:27:55');
INSERT INTO `text` VALUES (23, 'dos', 12, '2013-04-14 00:52:40');
INSERT INTO `text` VALUES (24, 'mama', 13, '2013-04-14 01:27:45');
INSERT INTO `text` VALUES (25, 'luna', 14, '2013-04-14 01:34:59');
INSERT INTO `text` VALUES (26, 'poliglota', 15, '2013-04-14 01:42:57');
INSERT INTO `text` VALUES (27, 'Redacta tu política ambiental de acuerdo a los requisitos mostrados.\r\n\r\nRecuerda que la creación de tu política es un proceso iterativo.', 16, '2013-04-14 01:54:11');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tipos`
-- 

CREATE TABLE `tipos` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` text NOT NULL,
  `active` binary(1) NOT NULL,
  `created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `descripcion` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `tipos`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuarios`
-- 

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `usuarios`
-- 

INSERT INTO `usuarios` VALUES (1, 'david3', 'David', 'Nunez', 'davidnhz@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2013-02-27 17:08:54');
INSERT INTO `usuarios` VALUES (2, 'asdasdasd', 'asdasd', 'asdasd', 'davidnhz@gmail.com', 'a3dcb4d229de6fde0db5686dee47145d', '2013-02-27 17:25:46');
INSERT INTO `usuarios` VALUES (3, 'chitobiz', 'Chita', 'Tec', 'chita@tec.edu.mx', 'e10adc3949ba59abbe56e057f20f883e', '2013-02-27 19:50:40');
INSERT INTO `usuarios` VALUES (4, 'alaz26', '', '', '', 'e10adc3949ba59abbe56e057f20f883e', '2013-03-03 20:03:39');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuarios_a`
-- 

CREATE TABLE `usuarios_a` (
  `id` int(11) NOT NULL auto_increment,
  `created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `active` binary(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- Volcar la base de datos para la tabla `usuarios_a`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `widget_obj`
-- 

CREATE TABLE `widget_obj` (
  `id` int(11) NOT NULL auto_increment,
  `tipo` varchar(120) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `config` text NOT NULL,
  `objetivo_id` int(11) NOT NULL,
  `creado` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

-- 
-- Volcar la base de datos para la tabla `widget_obj`
-- 

INSERT INTO `widget_obj` VALUES (16, 'text', 'Instrucciones', '', 3, '2013-04-14 01:54:11');
INSERT INTO `widget_obj` VALUES (23, 'check', 'Requisitos de PA', '', 3, '2013-04-14 11:53:01');
INSERT INTO `widget_obj` VALUES (27, 'comentario', 'Comentarios', '', 3, '2013-04-15 00:50:42');
