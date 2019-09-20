-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2019 a las 20:57:24
-- Versión del servidor: 10.3.15-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practica4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `clase_id` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`clase_id`, `id_materia`, `id_usuario`, `id_horario`) VALUES
(38, 5, 2, 2),
(58, 6, 2, 2),
(59, 6, 2, 1),
(61, 7, 2, 1),
(62, 5, 2, 1),
(63, 8, 2, 15),
(64, 9, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_horario` int(11) NOT NULL,
  `dias` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `hora` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id_horario`, `dias`, `hora`) VALUES
(1, 'LUNES - MIERCOLES', '7:00 - 9:00'),
(2, 'LUNES - MIERCOLES', '9:00 - 11:00 '),
(3, 'LUNES - MIERCOLES', '11:00 - 13:00'),
(4, 'LUNES - MIERCOLES', '13:00 - 15:00'),
(5, 'LUNES - MIERCOLES', '15:00 - 17:00'),
(6, 'LUNES - MIERCOLES', '17:00 - 19:00'),
(7, 'LUNES - MIERCOLES', '19:00 - 21:00'),
(8, 'MARTES - JUEVES', '7:00 - 9:00'),
(9, 'MARTES - JUEVES', '9:00 - 11-00'),
(10, 'MARTES - JUEVES', '11:00 - 13:00'),
(11, 'MARTES - JUEVES', '13:00 - 15:00'),
(12, 'MARTES - JUEVES', '15:00 - 17:00'),
(13, 'MARTES - JUEVES', '17:00 - 19:00'),
(14, 'MARTES - JUEVES', '19:00 - 21:00'),
(15, 'MIERCOLES - VIERNES', '7:00 - 9:00'),
(16, 'MIERCOLES - VIERNES', '9:00 - 11-00'),
(17, 'MIERCOLES - VIERNES', '11:00 - 13:00'),
(18, 'MIERCOLES - VIERNES', '13:00 - 15:00'),
(19, 'MIERCOLES - VIERNES', '15:00 - 17:00'),
(20, 'MIERCOLES - VIERNES', '17:00 - 19:00'),
(21, 'MIERCOLES - VIERNES', '19:00 - 21:00'),
(22, 'JUEVES - SABADO', '7:00 - 9:00'),
(23, 'JUEVES - SABADO', '9:00 - 11-00'),
(24, 'JUEVES - SABADO', '11:00 - 13:00'),
(25, 'JUEVES - SABADO', '13:00 - 15:00'),
(26, 'JUEVES - SABADO', '15:00 - 17:00'),
(27, 'JUEVES - SABADO', '17:00 - 19:00'),
(28, 'JUEVES - SABADO', '19:00 - 21:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `NRC` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `creditos` int(11) NOT NULL,
  `cupos` int(11) NOT NULL,
  `aula` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`NRC`, `nombre`, `clave`, `creditos`, `cupos`, `aula`) VALUES
(1, 'MINERIA DE DATOS', '', 0, 0, ''),
(2, 'ADMINISTRACION DE SERVIDORES', 'ta02i', 6, 40, 'X01'),
(3, 'DATA WAREHOUSE', 'RNvQj', 0, 0, ''),
(4, 'DATA WAREHOUSE', 'zFiTZ', 7, 25, 'X03'),
(5, 'BASE DE DATOS', 'Ge8Dv', 8, 40, 'L001'),
(6, 'BASE DE DATOS', '7dSLh', 8, 40, 'L002'),
(7, 'BASE DE DATOS', 'KTugw', 8, 30, 'L003'),
(8, 'BASE DE DATOS', 'uOfDF', 8, 30, 'L001'),
(9, 'BASE DE DATOS', '2CJry', 8, 25, 'L008');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioclase`
--

CREATE TABLE `usuarioclase` (
  `id_claseusuario` int(11) NOT NULL,
  `clase_ide` int(11) NOT NULL,
  `usuario_ide` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usu_id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `edad` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `rol` int(11) NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `nombre`, `apellidos`, `correo`, `telefono`, `sexo`, `edad`, `estado`, `rol`, `usuario`, `password`) VALUES
(1, 'jose', 'lopez perez', 'j_lopez@gmail.com', '3347248957', 'masculino', '26', 'jalisco', 1, 'adm', 'adm'),
(2, 'joaquin', 'gomez', 'kljlgfd@kjgfkd.com', '8798787680', 'masculino', '54', 'jodif', 2, 'mtro1', 'mtro1'),
(3, 'matias', 'sanchez', 'fdhguk@jhtr.com', '2465680406', 'femenino', '54', 'fgiuery', 3, 'alum', 'alum');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`clase_id`),
  ADD KEY `FK_materias` (`id_materia`) USING BTREE,
  ADD KEY `FK_usuarios` (`id_usuario`),
  ADD KEY `FK_horario` (`id_horario`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_horario`) USING BTREE;

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`NRC`);

--
-- Indices de la tabla `usuarioclase`
--
ALTER TABLE `usuarioclase`
  ADD PRIMARY KEY (`id_claseusuario`),
  ADD KEY `clase_ide` (`clase_ide`),
  ADD KEY `usuario_ide` (`usuario_ide`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `clase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `NRC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarioclase`
--
ALTER TABLE `usuarioclase`
  MODIFY `id_claseusuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clases`
--
ALTER TABLE `clases`
  ADD CONSTRAINT `clases_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`NRC`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clases_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`usu_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clases_ibfk_3` FOREIGN KEY (`id_horario`) REFERENCES `horario` (`id_horario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
