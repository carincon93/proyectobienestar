-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-04-2017 a las 19:38:42
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_bienestar_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET latin1 NOT NULL,
  `apellido` varchar(50) CHARACTER SET latin1 NOT NULL,
  `correo` varchar(50) CHARACTER SET latin1 NOT NULL,
  `clave` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `nombre`, `apellido`, `correo`, `clave`) VALUES
(1, 'angela', 'algo', 'angela@hotmail.com', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprendices`
--

CREATE TABLE `aprendices` (
  `id_aprendices` int(11) NOT NULL,
  `nombre_completo` varchar(50) COLLATE utf8_bin NOT NULL,
  `tipo_documento` varchar(50) COLLATE utf8_bin NOT NULL,
  `numero_documento` int(11) NOT NULL,
  `direccion` varchar(100) COLLATE utf8_bin NOT NULL,
  `barrio` varchar(100) COLLATE utf8_bin NOT NULL,
  `estrato` int(11) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `programa_formacion` varchar(100) COLLATE utf8_bin NOT NULL,
  `numero_ficha` int(11) NOT NULL,
  `jornada` varchar(100) COLLATE utf8_bin NOT NULL,
  `dep1` varchar(100) COLLATE utf8_bin NOT NULL,
  `dep2` varchar(100) COLLATE utf8_bin NOT NULL,
  `dep3` varchar(100) COLLATE utf8_bin NOT NULL,
  `apoyo` varchar(100) COLLATE utf8_bin NOT NULL,
  `compromiso` text COLLATE utf8_bin NOT NULL,
  `especificacion_suplemento` varchar(800) COLLATE utf8_bin NOT NULL,
  `cod_aprendiz` varchar(64) COLLATE utf8_bin NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `aprendices`
--

INSERT INTO `aprendices` (`id_aprendices`, `nombre_completo`, `tipo_documento`, `numero_documento`, `direccion`, `barrio`, `estrato`, `telefono`, `email`, `programa_formacion`, `numero_ficha`, `jornada`, `dep1`, `dep2`, `dep3`, `apoyo`, `compromiso`, `especificacion_suplemento`, `cod_aprendiz`, `estado`) VALUES
(2, 'Maicol Stiven Mancera', 'CEDULA', 1053864341, 'cra 13a', 'villahermosa', 2, 8767455, 'maicol11ce@live.com', 'adsi', 1132816, 'maÃ±ana', 'madre', 'operaria', 'no', 'NINGUNO', 'Se compromete a informar en la oficina de Bienestar al Aprendiz el momento en que usted reciba contrato de aprendizaje, consiguiÃ³ empleo, o cualquier otro beneficio del Gobierno o del SENA (Monitorias, FIC, Apoyos de sostenimiento, entre otros), Se compromete acatar las normas sobre el manejo adecuado del suplemento.', 'dasdasd', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `nombres` varchar(32) COLLATE utf8_bin NOT NULL,
  `apellidos` varchar(32) COLLATE utf8_bin NOT NULL,
  `especialidad` varchar(32) COLLATE utf8_bin NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `aprendiz_cod` varchar(64) COLLATE utf8_bin NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aprendices`
--
ALTER TABLE `aprendices`
  ADD PRIMARY KEY (`id_aprendices`),
  ADD KEY `cod_aprendiz` (`cod_aprendiz`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aprendiz_cod` (`aprendiz_cod`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `aprendices`
--
ALTER TABLE `aprendices`
  MODIFY `id_aprendices` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`aprendiz_cod`) REFERENCES `aprendices` (`cod_aprendiz`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
