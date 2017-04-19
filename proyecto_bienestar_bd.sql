-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-04-2017 a las 04:01:01
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

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
  `nombres` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_bin NOT NULL,
  `correo` varchar(50) COLLATE utf8_bin NOT NULL,
  `contrasena` varchar(100) COLLATE utf8_bin NOT NULL,
  `rol` varchar(16) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `nombres`, `apellidos`, `correo`, `contrasena`, `rol`) VALUES
(1, 'angela', 'algo', 'angela@hotmail.com', 'admin', 'administrador'),
(2, 'lore', '', '', 'mn', 'admin'),
(3, 'mile', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprendices`
--

CREATE TABLE `aprendices` (
  `id_aprendiz` int(11) NOT NULL,
  `nombre_completo` varchar(64) COLLATE utf8_bin NOT NULL,
  `tipo_documento` varchar(16) COLLATE utf8_bin NOT NULL,
  `numero_documento` bigint(20) NOT NULL,
  `direccion` varchar(32) COLLATE utf8_bin NOT NULL,
  `barrio` varchar(32) COLLATE utf8_bin NOT NULL,
  `estrato` tinyint(4) NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `email` varchar(64) COLLATE utf8_bin NOT NULL,
  `programa_formacion` varchar(64) COLLATE utf8_bin NOT NULL,
  `numero_ficha` bigint(20) NOT NULL,
  `jornada` varchar(16) COLLATE utf8_bin NOT NULL,
  `pregunta1` text COLLATE utf8_bin NOT NULL,
  `pregunta2` text COLLATE utf8_bin NOT NULL,
  `pregunta3` text COLLATE utf8_bin NOT NULL,
  `otro_apoyo` varchar(32) COLLATE utf8_bin NOT NULL,
  `compromiso_informar` text COLLATE utf8_bin NOT NULL,
  `compromiso_normas` text COLLATE utf8_bin NOT NULL,
  `justificacion_suplemento` varchar(128) COLLATE utf8_bin NOT NULL,
  `cod_aprendiz` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `aprendices`
--

INSERT INTO `aprendices` (`id_aprendiz`, `nombre_completo`, `tipo_documento`, `numero_documento`, `direccion`, `barrio`, `estrato`, `telefono`, `email`, `programa_formacion`, `numero_ficha`, `jornada`, `pregunta1`, `pregunta2`, `pregunta3`, `otro_apoyo`, `compromiso_informar`, `compromiso_normas`, `justificacion_suplemento`, `cod_aprendiz`, `estado`) VALUES
(5, 'luis alonso', 'ti', 10211, 'cl21', 'villa', 2, 43, 'l@mail.com', 'mecanica', 120, 'mixta', 'asd', 'sdas', 'qasda', 'monitoria', 'si', '', '', NULL, 1),
(7, '', '', 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', '', 'sdadas', 'NULL', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `aprendiz_cod` varchar(64) COLLATE utf8_bin NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_actual` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

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
  ADD PRIMARY KEY (`id_aprendiz`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `numero_documento` (`numero_documento`),
  ADD UNIQUE KEY `cod_aprendiz_2` (`cod_aprendiz`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `aprendices`
--
ALTER TABLE `aprendices`
  MODIFY `id_aprendiz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
