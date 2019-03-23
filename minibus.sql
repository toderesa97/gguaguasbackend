-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-03-2019 a las 22:52:26
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `minibus`
--

CREATE TABLE `minibus` (
  `id` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `destiny` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `origin` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `seats` int(50) NOT NULL,
  `company` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `directionCompany` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `transferDate` date NOT NULL,
  `transferTime` date NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `minibus`
--

INSERT INTO `minibus` (`id`, `name`, `destiny`, `origin`, `seats`, `company`, `directionCompany`, `transferDate`, `transferTime`, `description`) VALUES
(1, 'pepe', 'Teror', 'Las Palmas', 5, 'rentCar', 'Vecindario', '2019-03-21', '2019-03-21', 'Este es un servicio de prueba'),
(2, 'Carla', 'Maspalomas', 'La Aldea', 10, 'rentCar', 'Vecindario', '2019-03-24', '2019-03-25', 'Carla no sabe donde se mete. La pobre...'),
(3, 'Juan', 'San Mateo', 'Gando', 8, 'PepesCar', 'Vegueta', '2019-11-20', '2019-11-22', 'Lorem Ipsum'),
(4, 'Maria', 'San Bartolomé', 'Roque Nublo', 18, 'JunitosCar', 'Guanarteme', '2019-11-14', '2019-11-17', 'Lorem Ipsum');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `minibus`
--
ALTER TABLE `minibus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `minibus`
--
ALTER TABLE `minibus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
