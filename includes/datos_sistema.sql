-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-11-2018 a las 06:27:29
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `datos_sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `telefono` decimal(10,0) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `dni` int(8) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `apellido`, `telefono`, `direccion`, `dni`) VALUES
(2, 'rodrigo', 'reynoso', 156851253, 'rawson 389', 40266980);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `fecha_factura` date NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_factura`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `id_cliente`, `fecha_factura`, `descripcion`) VALUES
(2, 2, '2018-11-07', 'asdasd'),
(3, 2, '2018-11-07', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_producto`
--

CREATE TABLE IF NOT EXISTS `pedido_producto` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `id_provedor` int(11) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pedido`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcar la base de datos para la tabla `pedido_producto`
--

INSERT INTO `pedido_producto` (`id_pedido`, `id_producto`, `id_provedor`, `fecha_pedido`, `descripcion`) VALUES
(1, 0, 0, '2018-09-03', ''),
(2, 0, 0, '2018-09-03', ''),
(3, 0, 1, '2018-09-03', ''),
(4, 3, 13, '2018-09-03', ''),
(5, 10, 1, '2018-09-03', ''),
(6, 10, 1, '2018-09-03', ''),
(7, 10, 1, '2018-11-07', ''),
(8, 11, 2, '2018-11-07', ''),
(9, 11, 2, '2018-11-07', ''),
(10, 11, 2, '2018-11-07', ''),
(11, 13, 3, '2018-11-07', ''),
(12, 13, 3, '2018-11-07', ''),
(13, 13, 3, '2018-11-07', ''),
(14, 13, 3, '2018-11-07', ''),
(15, 13, 3, '2018-11-08', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto`
--

CREATE TABLE IF NOT EXISTS `presupuesto` (
  `id_presupuesto` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha_presupuesto` date NOT NULL,
  PRIMARY KEY (`id_presupuesto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Volcar la base de datos para la tabla `presupuesto`
--

INSERT INTO `presupuesto` (`id_presupuesto`, `id_cliente`, `descripcion`, `fecha_presupuesto`) VALUES
(1, 2, '', '2018-11-07'),
(2, 2, '', '2018-11-07'),
(3, 2, '', '2018-11-07'),
(4, 2, '', '2018-11-07'),
(5, 2, '', '2018-11-07'),
(11, 2, '', '2018-11-07'),
(15, 2, '', '2018-11-07'),
(16, 2, '', '2018-11-07'),
(17, 2, '', '2018-11-07'),
(19, 2, '', '2018-11-08'),
(20, 2, '', '2018-11-08'),
(21, 2, '', '2018-11-08'),
(22, 2, '', '2018-11-08'),
(23, 2, '', '2018-11-08'),
(24, 2, '', '2018-11-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(50) NOT NULL,
  `tipo_producto` varchar(40) NOT NULL,
  `stock` int(10) unsigned NOT NULL,
  `precioneto` double NOT NULL,
  `id_provedor` int(11) NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `tipo_producto`, `stock`, `precioneto`, `id_provedor`) VALUES
(3, 'chapa', 'asd', 400, 185, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_factura`
--

CREATE TABLE IF NOT EXISTS `producto_factura` (
  `id_producto_factura` int(11) NOT NULL AUTO_INCREMENT,
  `id_factura` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `tipo_producto` varchar(50) NOT NULL,
  `cantidad_producto` int(11) NOT NULL,
  `metros_producto` decimal(10,0) NOT NULL,
  `precio_producto` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id_producto_factura`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcar la base de datos para la tabla `producto_factura`
--

INSERT INTO `producto_factura` (`id_producto_factura`, `id_factura`, `id_producto`, `tipo_producto`, `cantidad_producto`, `metros_producto`, `precio_producto`, `total`) VALUES
(1, 1, 0, 'techo', 43, 4, 4, 172),
(2, 1, 0, 'techo', 4, 3, 3, 12),
(3, 1, 0, 'e4', 4, 44, 4, 16),
(4, 2, 0, 'techo', 4, 4, 4, 16),
(5, 0, 4, '5dasda', 5, 5, 5, 25),
(6, 0, 8, 'dasda', 0, 0, 0, 0),
(10, 3, 2, '3123', 4, 11, 1, 4),
(11, 3, 3, 'asda', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_pedido`
--

CREATE TABLE IF NOT EXISTS `producto_pedido` (
  `id_producto_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  PRIMARY KEY (`id_producto_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `producto_pedido`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_presupuesto`
--

CREATE TABLE IF NOT EXISTS `producto_presupuesto` (
  `id_producto_presupuesto` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `id_presupuesto` int(11) NOT NULL,
  `tipo_producto` varchar(50) NOT NULL,
  `cantidad_producto` int(11) NOT NULL,
  `metros_producto` decimal(10,0) NOT NULL,
  `precio_producto` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id_producto_presupuesto`),
  KEY `id_presupuesto` (`id_presupuesto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Volcar la base de datos para la tabla `producto_presupuesto`
--

INSERT INTO `producto_presupuesto` (`id_producto_presupuesto`, `id_producto`, `id_presupuesto`, `tipo_producto`, `cantidad_producto`, `metros_producto`, `precio_producto`, `total`) VALUES
(1, 0, 1, '', 0, 0, 0, 0),
(2, 0, 1, 'asdasd', 2, 2, 2, 4),
(3, 0, 2, '', 0, 0, 0, 0),
(4, 0, 2, '', 0, 0, 0, 0),
(5, 0, 3, '', 0, 0, 0, 0),
(6, 0, 3, 'techo', 5, 5, 5, 25),
(7, 0, 4, '', 0, 0, 0, 0),
(8, 0, 4, 'adasd', 3, 3, 3, 9),
(9, 0, 5, 'sadasd', 3, 3, 3, 9),
(10, 3, 6, 'asdsad', 3, 3, 3, 9),
(11, 3, 7, 'asdsa', 3, 3, 3, 9),
(12, 3, 8, 'asd', 2, 2, 2, 4),
(13, 0, 9, '', 0, 0, 0, 0),
(14, 3, 9, 'asdasd', 5, 5, 5, 25),
(15, 0, 10, '', 0, 0, 0, 0),
(16, 3, 10, 'asd', 5, 5, 5, 25),
(17, 3, 10, 'asd', 5, 5, 5, 25),
(18, 0, 11, '', 0, 0, 0, 0),
(19, 0, 11, 'asdas', 5, 5, 5, 25),
(20, 0, 12, '', 0, 0, 0, 0),
(21, 3, 12, 'asdas', 3, 3, 3, 9),
(22, 0, 13, '', 0, 0, 0, 0),
(23, 3, 13, 'asdsa', 3, 3, 3, 9),
(24, 3, 13, 'asda', 2, 2, 2, 4),
(25, 3, 14, 'dasd', 3, 3, 43, 129),
(26, 3, 15, 'techo', 2, 20, 31232, 62464),
(27, 0, 16, '', 0, 0, 0, 0),
(28, 3, 16, 'TECHO', 2, 2, 2, 4),
(29, 3, 16, 'ferrret', 3, 3, 3, 9),
(30, 3, 17, 'asd', 1, 1, 1, 1),
(31, 3, 19, '', 0, 0, 0, 0),
(32, 3, 20, 'sadasd2', 2, 2, 2, 8),
(33, 3, 20, 'dasdsa', 2, 2, 2, 8),
(34, 0, 20, 'sadasd', 2, 2, 2, 8),
(35, 0, 21, 'sdasd', 2, 2, 2, 8),
(36, 0, 21, 'sadsad', 2, 2, 2, 8),
(37, 0, 22, 'sads', 0, 0, 0, 0),
(38, 0, 23, 'techo', 4, 4, 4, 64),
(39, 0, 24, 'SADSA', 2, 2, 2, 8),
(40, 0, 24, 'asdasd', 2, 2, 2, 8),
(41, 0, 24, 'dasda', 3, 3, 3, 27),
(42, 0, 24, 'sdasda', 1, 4, 2, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provedores`
--

CREATE TABLE IF NOT EXISTS `provedores` (
  `id_provedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_provedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=14 ;

--
-- Volcar la base de datos para la tabla `provedores`
--

INSERT INTO `provedores` (`id_provedor`, `nombre`, `telefono`, `direccion`) VALUES
(13, 'rodrigo', 1213221, 'asda123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `Usuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'usuario',
  `Password` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'contraseña',
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data' AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `Usuario`, `Password`) VALUES
(1, 'abel', '123456');
