-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2021 a las 08:05:32
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bubble_travel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alojamiento`
--

CREATE TABLE `alojamiento` (
  `id` int(11) NOT NULL,
  `id_viaje` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `destino` varchar(20) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alojamiento`
--

INSERT INTO `alojamiento` (`id`, `id_viaje`, `id_usuario`, `nombre`, `fecha_inicio`, `fecha_fin`, `destino`, `valor`) VALUES
(3, 1, 6, 'Hostel en Paris', '2021-06-19', '2021-06-25', 'Paris', 501);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinos`
--

CREATE TABLE `destinos` (
  `id` int(11) NOT NULL,
  `id_viaje` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `destinos`
--

INSERT INTO `destinos` (`id`, `id_viaje`, `id_usuario`, `nombre`, `fecha_inicio`, `fecha_fin`) VALUES
(3, 1, 6, 'Madrid', '2021-06-27', '2021-06-30'),
(4, 5, 6, 'Buzios', '2021-06-09', '2021-06-17'),
(5, 5, 6, 'Rio de Janeiro', '2021-06-18', '2021-06-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `excursiones`
--

CREATE TABLE `excursiones` (
  `id` int(11) NOT NULL,
  `id_viaje` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `excursiones`
--

INSERT INTO `excursiones` (`id`, `id_viaje`, `id_usuario`, `nombre`, `fecha`, `valor`) VALUES
(1, 4, 6, 'Maracaná', '2021-06-26', 500),
(2, 1, 6, 'City Tour Madrid Full Day', '2021-06-21', 3001),
(4, 1, 6, 'Paris Terrible', '2021-06-19', 800),
(5, 3, 7, 'Mediterráneo', '2021-06-26', 800),
(6, 3, 7, 'Lisboa Fantástica', '2021-06-19', 700),
(7, 5, 6, 'Maracaná', '2021-06-24', 500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte`
--

CREATE TABLE `transporte` (
  `id` int(11) NOT NULL,
  `id_viaje` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `lugar_origen` varchar(20) NOT NULL,
  `lugar_fin` varchar(20) NOT NULL,
  `medio` varchar(20) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `transporte`
--

INSERT INTO `transporte` (`id`, `id_viaje`, `id_usuario`, `nombre`, `fecha_inicio`, `fecha_fin`, `lugar_origen`, `lugar_fin`, `medio`, `valor`) VALUES
(1, 1, 6, 'Ida', '2021-06-21', '2021-06-22', 'Ezeiza', 'Madrid', 'Avión', 900),
(2, 1, 6, 'Vuelta', '2021-06-29', '2021-06-30', 'Madrid', 'Ezeiza', 'Avión', 800);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `mail` varchar(20) NOT NULL,
  `nick` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `mail`, `nick`, `pass`) VALUES
(6, 'Luciano Ezequiel', 'Kavcic', 'lek.correo@gmail.com', 'Lucho', '123456'),
(7, 'Luciano Ezequiel', 'Kavcic', 'lkavcic@uade.edu.ar', 'Lucho Dos', '123'),
(8, 'Federico', 'Rey', 'fefu@hotmail.com', 'Fefu', '678');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `presupuesto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`id`, `id_usuario`, `nombre`, `presupuesto`) VALUES
(1, 6, 'Europa 2022', 150000),
(3, 7, 'EUROPA 2023', 250000),
(5, 6, 'Brasil 2024', 100000),
(6, 8, 'Japón 2025', 500000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajeros`
--

CREATE TABLE `viajeros` (
  `id` int(11) NOT NULL,
  `id_viaje` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `presupuesto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `viajeros`
--

INSERT INTO `viajeros` (`id`, `id_viaje`, `id_usuario`, `nombre`, `presupuesto`) VALUES
(2, 5, 6, 'Gerónimo', 6000),
(3, 1, 6, 'Alejandra', 900),
(4, 1, 6, 'Alejandro', 4333);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alojamiento`
--
ALTER TABLE `alojamiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `destinos`
--
ALTER TABLE `destinos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `excursiones`
--
ALTER TABLE `excursiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transporte`
--
ALTER TABLE `transporte`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `viajeros`
--
ALTER TABLE `viajeros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alojamiento`
--
ALTER TABLE `alojamiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `destinos`
--
ALTER TABLE `destinos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `excursiones`
--
ALTER TABLE `excursiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `transporte`
--
ALTER TABLE `transporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `viajeros`
--
ALTER TABLE `viajeros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
