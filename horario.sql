-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-10-2019 a las 22:59:10
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.2.0

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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`horario_id`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `horario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
