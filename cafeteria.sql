-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2024 a las 01:15:20
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cafeteria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones`
--

CREATE TABLE `reservaciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `personas` int(11) NOT NULL,
  `comentario` text DEFAULT NULL,
  `fecha_reserva` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservaciones`
--

INSERT INTO `reservaciones` (`id`, `nombre`, `email`, `telefono`, `fecha`, `hora`, `personas`, `comentario`, `fecha_reserva`) VALUES
(5, 'leonardo', 'leo@gmail.com', '5555555', '2024-09-19', '02:11:00', 6, '0', '2024-09-16 20:08:08'),
(6, 'negro', 'soynegro@gmail.com', '5555555', '2024-09-28', '10:45:00', 4, '0', '2024-09-17 16:41:57');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
