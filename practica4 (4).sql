-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2019 a las 21:09:23
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

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
(1, 1, 2, 1),
(2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `horario_id` int(11) NOT NULL,
  `dias` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `hora` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`horario_id`, `dias`, `hora`) VALUES
(1, 'LUNES-MIERCOLES', '7:00-9:00'),
(2, 'LUNES-MIERCOLES', '9:00-11:00'),
(3, 'LUNES-MIERCOLES', '11:00-13:00'),
(4, 'LUNES-MIERCOLES', '13:00-15:00'),
(5, 'LUNES-MIERCOLES', '15:00-17:00'),
(6, 'LUNES-MIERCOLES', '17:00-19:00'),
(7, 'LUNES-MIERCOLES', '19:00-21:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `NRC` int(11) NOT NULL,
  `nombremat` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `creditos` int(11) NOT NULL,
  `cupos` int(11) NOT NULL,
  `aula` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`NRC`, `nombremat`, `clave`, `creditos`, `cupos`, `aula`) VALUES
(1, 'CLASIFICACION INTELIGENTE DE DATOS', 'UZSfZ', 6, 21, 'X023'),
(2, 'MINERIA DE DATOS', 'hEE1f', 7, 30, 'X001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioclase`
--

CREATE TABLE `usuarioclase` (
  `id_claseusuario` int(11) NOT NULL,
  `clase_ide` int(11) NOT NULL,
  `usuario_ide` int(11) NOT NULL,
  `calificacion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarioclase`
--

INSERT INTO `usuarioclase` (`id_claseusuario`, `clase_ide`, `usuario_ide`, `calificacion`) VALUES
(1, 1, 3, 'Reprobado'),
(2, 2, 3, 'Reprobado'),
(3, 1, 4, '75'),
(9, 2, 4, '');

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
(1, 'Luis Antonio', 'Marquez Lopez', 'luma@gmail.com', '3354365676', 'masculino', '34', 'Jalisco', 1, 'adm', 'adm'),
(2, 'Andres Ivan', 'Martinez Perez', 'andres_mtz@outlook.com', '3357868792', 'masculino', '24', 'jhkh', 2, 'mtro', 'mtro'),
(3, 'Roberto ', 'Torres Jimenez', 'rober_tor@kjgfkd.com', '3353698690', 'masculino', '24', 'jodif', 3, 'alum', 'alum'),
(4, 'Luis ', 'Rodriguez', 'luis_rod@alumnos.udg.mx', '3357632798', 'masculino', '25', 'jalisco', 3, 'alum1', 'alum1');

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
  ADD PRIMARY KEY (`horario_id`) USING BTREE;

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
  ADD KEY `FK_clase` (`clase_ide`) USING BTREE,
  ADD KEY `FK_usuario` (`usuario_ide`);

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
  MODIFY `clase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `horario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `NRC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarioclase`
--
ALTER TABLE `usuarioclase`
  MODIFY `id_claseusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clases`
--
ALTER TABLE `clases`
  ADD CONSTRAINT `clases_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`NRC`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clases_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`usu_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clases_ibfk_3` FOREIGN KEY (`id_horario`) REFERENCES `horario` (`horario_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarioclase`
--
ALTER TABLE `usuarioclase`
  ADD CONSTRAINT `usuarioclase_ibfk_1` FOREIGN KEY (`clase_ide`) REFERENCES `clases` (`clase_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarioclase_ibfk_2` FOREIGN KEY (`usuario_ide`) REFERENCES `usuarios` (`usu_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
