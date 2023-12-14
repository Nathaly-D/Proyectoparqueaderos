-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2023 a las 04:12:56
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parqueaderobd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `documento` varchar(250) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `clave` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `nombre`, `apellido`, `documento`, `usuario`, `clave`) VALUES
(1561358, 'Daniel', 'Leones', '1561358', 'Dleones', '75');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `documento` varchar(250) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `clave` varchar(250) NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `documento`, `usuario`, `clave`, `telefono`) VALUES
(1234562, 'Daniel', 'Leones', '1234562', 'Dleones', '12', 45661323),
(1000064551, 'Efrain', 'Avila', '1000064551', 'Esavila', '15', 2147483647);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parqueaderos`
--

CREATE TABLE `parqueaderos` (
  `id` int(11) NOT NULL,
  `nombre_parqueadero` varchar(250) NOT NULL,
  `ubicacion_parqueadero` varchar(250) NOT NULL,
  `cupos_parqueadero` int(11) NOT NULL,
  `horario_parqueadero` varchar(250) NOT NULL,
  `id_administrador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `parqueaderos`
--

INSERT INTO `parqueaderos` (`id`, `nombre_parqueadero`, `ubicacion_parqueadero`, `cupos_parqueadero`, `horario_parqueadero`, `id_administrador`) VALUES
(3, 'Millos', 'calle 68 a sur', 20, '7 a 8', 1561358),
(4, 'Millos', 'calle 68 a sur', 20, '7 a 8', 1561358);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parqueos`
--

CREATE TABLE `parqueos` (
  `id` int(11) NOT NULL,
  `tarifa` varchar(250) DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `salida` time DEFAULT NULL,
  `id_reserva` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `entrada` time DEFAULT NULL,
  `salida` time DEFAULT NULL,
  `id_vehiculo` int(11) DEFAULT NULL,
  `id_parqueadero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `fecha`, `hora`, `entrada`, `salida`, `id_vehiculo`, `id_parqueadero`) VALUES
(1, '2023-11-13', '13:58:00', '21:58:00', '01:58:00', 5, 3),
(2, '2023-11-13', '13:58:00', '21:58:00', '01:58:00', 5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipovehiculos`
--

CREATE TABLE `tipovehiculos` (
  `id` int(11) NOT NULL,
  `vehiculoT` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipovehiculos`
--

INSERT INTO `tipovehiculos` (`id`, `vehiculoT`) VALUES
(1, 'Moto'),
(2, 'Carro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `placa` varchar(250) DEFAULT NULL,
  `marca` varchar(250) DEFAULT NULL,
  `modelo` varchar(250) DEFAULT NULL,
  `altura` varchar(250) DEFAULT NULL,
  `ancho` varchar(250) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_tipoVehiculo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `placa`, `marca`, `modelo`, `altura`, `ancho`, `id_cliente`, `id_tipoVehiculo`) VALUES
(5, 'ERF', 'Ferrari', '2022', '1.25', '456', 1000064551, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `parqueaderos`
--
ALTER TABLE `parqueaderos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_administrador` (`id_administrador`);

--
-- Indices de la tabla `parqueos`
--
ALTER TABLE `parqueos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_reserva` (`id_reserva`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vehiculo` (`id_vehiculo`),
  ADD KEY `id_parqueadero` (`id_parqueadero`);

--
-- Indices de la tabla `tipovehiculos`
--
ALTER TABLE `tipovehiculos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_tipoVehiculo` (`id_tipoVehiculo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1561359;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000064552;

--
-- AUTO_INCREMENT de la tabla `parqueaderos`
--
ALTER TABLE `parqueaderos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `parqueos`
--
ALTER TABLE `parqueos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipovehiculos`
--
ALTER TABLE `tipovehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `parqueaderos`
--
ALTER TABLE `parqueaderos`
  ADD CONSTRAINT `parqueaderos_ibfk_1` FOREIGN KEY (`id_administrador`) REFERENCES `administradores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `parqueos`
--
ALTER TABLE `parqueos`
  ADD CONSTRAINT `parqueos_ibfk_1` FOREIGN KEY (`id_reserva`) REFERENCES `reservas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`id_parqueadero`) REFERENCES `parqueaderos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehiculos_ibfk_2` FOREIGN KEY (`id_tipoVehiculo`) REFERENCES `tipovehiculos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
