-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-02-2019 a las 01:51:19
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_hotel`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `editarnivel` (IN `n_numero` INT(10), IN `estado` VARCHAR(150), IN `in_id` INT(10))  BEGIN
UPDATE niveles set numero_nivel=n_numero,estado_nivel=estado WHERE id_niveles=in_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registrarHabitacion` (IN `nu_habitacion` INT(50), IN `nu_camas` INT(50), IN `nu_sillas` INT(50), IN `esta_habitacion` VARCHAR(150), IN `precio_habi` DOUBLE(15,2), IN `codigo_habita` VARCHAR(150), IN `categoria` INT(10), IN `nivel` INT(10), IN `descripcion_habitacion` VARCHAR(50))  BEGIN
INSERT INTO habitacion(
    numero_habitacion,
    numero_camas,
    numero_sillas,
    estado_habitacion,
    precio_habitacion,
    codigo_habitacion,
    categorias_idcategorias,
    id_niveles,
    descripcion
    
) VALUES(nu_habitacion,nu_camas,nu_sillas,esta_habitacion,precio_habi,codigo_habita,categoria,nivel,descripcion_habitacion);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registrar_niveles` (IN `numero` VARCHAR(150), IN `estado` VARCHAR(150))  BEGIN
INSERT INTO niveles(numero_nivel,estado_nivel) VALUES(numero,estado);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idcategorias` int(11) NOT NULL,
  `nomcre_Cate` varchar(45) DEFAULT NULL,
  `estado_Catel` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcategorias`, `nomcre_Cate`, `estado_Catel`) VALUES
(1, 'departament', NULL),
(2, 'casado', NULL),
(3, 'divorciado', 'Activo'),
(4, 'parejas', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `estado_cliente` varchar(45) DEFAULT NULL,
  `persona_idpersona` int(11) NOT NULL,
  `gmail` varchar(160) NOT NULL DEFAULT 'gmail@.com'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `estado_cliente`, `persona_idpersona`, `gmail`) VALUES
(54, 'Desactivo', 58, 'anibal@gmail.com'),
(55, 'Activo', 59, 'anubala@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `idcontrato` int(11) NOT NULL,
  `fecha_inicio_contrato` date DEFAULT NULL,
  `fecha_fin_contrato` date DEFAULT NULL,
  `con_observacion` varchar(45) DEFAULT NULL,
  `estado_contrato` varchar(45) DEFAULT NULL,
  `garantia` double(15,2) DEFAULT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  `habitacion_idhabitacion` int(11) NOT NULL,
  `con_deuda` double(15,2) NOT NULL,
  `efectivo` double(15,2) DEFAULT NULL,
  `con_credito` double(15,2) DEFAULT NULL,
  `con_nu_personas` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `idhabitacion` int(11) NOT NULL,
  `numero_habitacion` int(50) DEFAULT NULL,
  `numero_camas` int(50) DEFAULT NULL,
  `numero_sillas` int(50) DEFAULT NULL,
  `estado_habitacion` varchar(45) DEFAULT NULL,
  `precio_habitacion` double(15,2) DEFAULT NULL,
  `codigo_habitacion` varchar(120) DEFAULT NULL,
  `categorias_idcategorias` int(11) NOT NULL,
  `id_niveles` int(11) NOT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`idhabitacion`, `numero_habitacion`, `numero_camas`, `numero_sillas`, `estado_habitacion`, `precio_habitacion`, `codigo_habitacion`, `categorias_idcategorias`, `id_niveles`, `descripcion`) VALUES
(3, 5, 4, 6, 'Libre', 190.00, 'kskdsk', 2, 2, 'dsdsdsdsds'),
(4, 5, 2, 2, 'Libre', 180.00, 'ksssjsj', 3, 2, 'esta muy buena la habitacion'),
(5, 206, 4, 10, 'Libre', 300.00, 'absdc', 4, 1, 'holaaaa'),
(6, 406, 4, 3, 'Libre', 270.00, 'jsdjshsd', 1, 1, 'esta limpio todo loco'),
(9, 308, 4, 20, 'Libre', 300.00, 'sjsjsjs', 1, 2, 'sasasa'),
(10, 12, 495, 48, 'Reservado', 239.00, 'sjdsdjsj', 1, 1, 'sasasasa'),
(11, 12, 405, 37, 'Reservado', 304.00, 'jjsjsdj', 1, 2, 'ssasasa'),
(12, 3, 4, 2, 'Ocupado', 300.00, 'djdjsjdsj', 1, 1, 'asasasa'),
(13, 2, 4, 93, 'Ocupado', 304.00, 'jjssj', 1, 2, 'sasasa'),
(14, 2121, 93, 94, 'Ocupado', 234.00, '9393', 1, 1, 'sasasasasasa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE `niveles` (
  `id_niveles` int(11) NOT NULL,
  `numero_nivel` varchar(150) NOT NULL,
  `estado_nivel` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`id_niveles`, `numero_nivel`, `estado_nivel`) VALUES
(1, 'piso 1', 'Activo'),
(2, 'piso 2', 'Activo'),
(3, 'piso 3', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido_mater` varchar(45) DEFAULT NULL,
  `apellido_pater` varchar(45) DEFAULT NULL,
  `telefono` int(10) DEFAULT NULL,
  `Fecha_nacimiento` varchar(45) DEFAULT NULL,
  `direccion` varchar(160) NOT NULL DEFAULT 'Sin direccion',
  `numero_referencia` int(150) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `tipo_documento` varchar(150) NOT NULL,
  `numero_documento` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `nombre`, `apellido_mater`, `apellido_pater`, `telefono`, `Fecha_nacimiento`, `direccion`, `numero_referencia`, `edad`, `tipo_documento`, `numero_documento`) VALUES
(5, 'zully', 'ordones', 'corrales', 73733737, '2019-02-21', '', 123456789, 0, '', 0),
(58, 'deyvisss', 'garcia', 'cercad', 917613942, NULL, 'betaniaa', NULL, NULL, 'dni', 48762828),
(59, 'anibales', 'garcia', 'cercado', 48762828, NULL, 'urrunaga', NULL, NULL, 'carne', 12345678);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

CREATE TABLE `reservacion` (
  `idreservacion` int(11) NOT NULL,
  `fecha_inicio_reser` varchar(45) DEFAULT NULL,
  `fecha_fin_reser` varchar(45) DEFAULT NULL,
  `reservacioncol` varchar(45) DEFAULT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  `habitacion_idhabitacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `nombre_rol` varchar(45) DEFAULT NULL,
  `estado_rol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `nombre_rol`, `estado_rol`) VALUES
(1, 'admin', 'Activo'),
(2, 'usuario', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuarios` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `estado_user` varchar(45) DEFAULT NULL,
  `remember_token` varchar(200) DEFAULT NULL,
  `persona_idpersona` int(11) NOT NULL,
  `rol_idrol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuarios`, `username`, `email`, `imagen`, `password`, `estado_user`, `remember_token`, `persona_idpersona`, `rol_idrol`) VALUES
(1, 'zully', 'zully@gmail.com', '10373680_489816981148567_6230558091611155994_n.jpg', '$2y$10$vw.ajLt0Jup2wOSYVJJasuLYevmAte4uJx0hz6YSApKpk74ReiGg2', 'Activo', 'Z61eoXODrMHQnVhzqdqv65WRfdOGZn9ZIPynE0RkwsLS4eE3UptvXQNzSar2', 5, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcategorias`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`),
  ADD KEY `fk_cliente_persona1_idx` (`persona_idpersona`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`idcontrato`),
  ADD KEY `fk_contrato_cliente1_idx` (`cliente_idcliente`),
  ADD KEY `fk_contrato_habitacion1_idx` (`habitacion_idhabitacion`);

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`idhabitacion`),
  ADD KEY `fk_habitacion_categorias1_idx` (`categorias_idcategorias`),
  ADD KEY `id_niveles` (`id_niveles`);

--
-- Indices de la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`id_niveles`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`);

--
-- Indices de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD PRIMARY KEY (`idreservacion`),
  ADD KEY `fk_reservacion_cliente1_idx` (`cliente_idcliente`),
  ADD KEY `fk_reservacion_habitacion1_idx` (`habitacion_idhabitacion`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuarios`),
  ADD KEY `fk_usuarios_persona_idx` (`persona_idpersona`),
  ADD KEY `fk_usuarios_rol1_idx` (`rol_idrol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idcategorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `idcontrato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  MODIFY `idhabitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `id_niveles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  MODIFY `idreservacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_persona1` FOREIGN KEY (`persona_idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `fk_contrato_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contrato_habitacion1` FOREIGN KEY (`habitacion_idhabitacion`) REFERENCES `habitacion` (`idhabitacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD CONSTRAINT `fk_habitacion_categorias1` FOREIGN KEY (`categorias_idcategorias`) REFERENCES `categorias` (`idcategorias`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_niveles` FOREIGN KEY (`id_niveles`) REFERENCES `niveles` (`id_niveles`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD CONSTRAINT `fk_reservacion_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reservacion_habitacion1` FOREIGN KEY (`habitacion_idhabitacion`) REFERENCES `habitacion` (`idhabitacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_persona` FOREIGN KEY (`persona_idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_rol1` FOREIGN KEY (`rol_idrol`) REFERENCES `rol` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
