-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2021 a las 21:39:51
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
(3, 1, 6, 'Hostal en Paris', '2021-06-19', '2021-06-26', 'Paris', 501);

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
(3, 1, 6, 'Madrid', '2021-06-27', '2021-07-10'),
(4, 5, 6, 'Buzios', '2021-06-09', '2021-06-17'),
(5, 1, 6, 'Barcelona', '2021-07-04', '2021-07-17'),
(6, 9, 6, 'Casablanca', '2021-07-09', '2021-07-17'),
(7, 1, 6, 'Paris', '2021-07-10', '2021-07-24'),
(8, 5, 6, 'Rio de Janeiro', '2021-07-16', '2021-07-16');

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
(2, 1, 6, 'City Tour Madrid', '2021-06-21', 3001),
(4, 1, 6, 'Paris City Tour', '2021-06-19', 800),
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
(1, 1, 6, 'Ida desde Bs.As.', '2021-06-21', '2021-06-22', 'Ezeiza', 'Madrid', 'Avión', 900),
(2, 1, 6, 'Vuelta', '2021-06-29', '2021-06-30', 'Madrid', 'Ezeiza', 'Avión', 800),
(3, 5, 6, 'Crucero a Brasil', '2021-06-20', '2021-06-25', 'Buenos Aires', 'Rio de Janeiro', 'Crucero', 9000);

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
(1, 6, 'Europa A full 2023', 0),
(3, 7, 'EUROPA 2023', 250000),
(5, 6, 'Brasil 2024', 100000),
(6, 8, 'Japón 2025', 500000),
(9, 6, 'Marruecos 2024', 0);

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
(3, 1, 6, 'Alejandra', 3),
(4, 1, 6, 'Alejandro', 9),
(5, 9, 6, 'Pepe', 6500),
(6, 1, 6, 'Alejandre', 80000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votos`
--

CREATE TABLE `votos` (
  `id` int(11) NOT NULL,
  `id_viaje` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `destino` varchar(20) NOT NULL,
  `viajero` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `votos`
--

INSERT INTO `votos` (`id`, `id_viaje`, `id_usuario`, `destino`, `viajero`) VALUES
(1, 1, 6, 'Madrid', 'Alejandra'),
(2, 5, 6, 'Buzios', 'Gerónimo'),
(3, 1, 6, 'Barcelona', 'Alejandra'),
(4, 1, 6, 'Barcelona', 'Alejandro'),
(5, 9, 6, 'Casablanca', 'Pepe'),
(6, 1, 6, 'Paris', 'Alejandra'),
(7, 1, 6, 'Paris', 'Alejandro'),
(8, 1, 6, 'Paris', 'Alejandre'),
(9, 5, 6, 'Rio de Janeiro', 'Gerónimo');

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
-- Indices de la tabla `votos`
--
ALTER TABLE `votos`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `viajeros`
--
ALTER TABLE `viajeros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `votos`
--
ALTER TABLE `votos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
