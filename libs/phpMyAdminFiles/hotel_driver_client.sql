-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-04-2019 a las 18:28:03
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
-- Base de datos: `gguaguas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `cif` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `clientName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`cif`, `clientName`, `email`, `nickname`) VALUES
('54555634N', 'Paco', 'jkh@hotmail.com', 'kjh'),
('54789556B', 'Ana', 'maria@gmail.com', 'Maria'),
('54789556T', 'Lucia', 'lucia@gmail.com', 'lucia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `socialSecurityNumber` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `surname`, `socialSecurityNumber`, `email`) VALUES
(2, 'Juan', 'Caballero', '456asda665', 'juan@hotmail.com'),
(24, 'Paco', 'Ramirez', 'asd546asd', 'pa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotels`
--

CREATE TABLE `hotels` (
  `hotelCif` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cif` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hotelName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hotelEmail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `hotels`
--

INSERT INTO `hotels` (`hotelCif`, `cif`, `hotelName`, `hotelEmail`, `nickname`) VALUES
('5455asdas', '54555634N', 'elegance', 'elegance@hotmail.com', 'eleg'),
('5464867879V546', '54789556T', 'Star', 'star@gmail.com', 'asdasdas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercedes`
--

CREATE TABLE `mercedes` (
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
-- Volcado de datos para la tabla `mercedes`
--

INSERT INTO `mercedes` (`id`, `name`, `destiny`, `origin`, `seats`, `company`, `directionCompany`, `transferDate`, `transferTime`, `description`) VALUES
(1, 'pepe mercedes', 'Teror', 'Las Palmas', 5, 'rentCar', 'Vecindario', '2019-03-21', '2019-03-21', 'Este es un servicio de prueba'),
(2, 'Carla mercedes', 'Maspalomas', 'La Aldea', 10, 'rentCar', 'Vecindario', '2019-03-24', '2019-03-25', 'Carla no sabe donde se mete. La pobre...'),
(3, 'Juan mercedes', 'San Mateo', 'Gando', 8, 'PepesCar', 'Vegueta', '2019-11-20', '2019-11-22', 'Lorem Ipsum'),
(4, 'Maria mercedes', 'San Bartolomé', 'Roque Nublo', 18, 'JunitosCar', 'Guanarteme', '2019-11-14', '2019-11-17', 'Lorem Ipsum');

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
(1, 'pepe minibus', 'Teror', 'Las Palmas', 5, 'rentCar', 'Vecindario', '2019-03-21', '2019-03-21', 'Este es un servicio de prueba'),
(2, 'Carla minibus', 'Maspalomas', 'La Aldea', 10, 'rentCar', 'Vecindario', '2019-03-24', '2019-03-25', 'Carla no sabe donde se mete. La pobre...'),
(3, 'Juan minibus', 'San Mateo', 'Gando', 8, 'PepesCar', 'Vegueta', '2019-11-20', '2019-11-22', 'Lorem Ipsum'),
(4, 'Maria minibus', 'San Bartolomé', 'Roque Nublo', 18, 'JunitosCar', 'Guanarteme', '2019-11-14', '2019-11-17', 'Lorem Ipsum');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `token` text COLLATE utf8_unicode_ci NOT NULL,
  `userSalt` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`username`, `password`, `role`, `token`, `userSalt`) VALUES
('amisadai', '0f62a48135beb288bebeda656f54c1904afbd67abc590dbf53e64add526077e5', 'manager', '', '36tBPegFIZxJo5NCaX5pMj20oRfzRd'),
('juan', '8d19bce286481a20915ffa109f9e2dcde25c03663906c72a3635e9f61f8bd20a', 'manager', 'zeEY98lyMKflqER2D7MNYgxXPscHUfo1NYsvMIqakliuQXfwkNbcqX3vCxWt8tIDAc1x0bM3U80uqKcojRd8zMiXjuYWuBypoBD16ylIcjrTHLDFfpl5ONdBIneSYXq8KrdRsT4mjtalVKV301qw63kAM36JSNs4nr3f54hVAYGmUW54oXx7121hf7NosIVdJOULKOxr', 'X23PYCeEub5Zhheb2paSDgCZeIqUt3'),
('orbedi', '5787d98d4648d1744a9475ee1cce94c8bba88c5b2f350e7d2ab11bd5d26be79d', 'manager', '', 'lMjKxSl3v4phioXi0RRPaRCxWMDMAe'),
('pepe', '520e137d758b64d06dd3964cd8cac63d9a7078a91e82c0ec1bd75973bb4b55cd', 'driver', '', 'B5SGY2oTXqecO6g5Xmv5EIGLGJ8GIn'),
('root', 'bb41a4511416bcca366e66c92a097b192946b66f2ab2f6d6447beba275215630', 'root', 'd0RJw2dp3LaRwXJ8h7bHe0ba7xBtmf3LwyiZtfuZdgTX6dWmGmKErWDIGvgoPe2Gwkxh28ZBrtcUK5yj79Jmr5bMYgjg1htGSLns5NUcnWgKPKxmeXw3GHnBTOqyHK2QEXbsJwxoJ9Pa76gu3uHzYSj3fXBkei9EuYqRn94GF4sNkDmTTkpxZcdITMTOr181HUGHkt9p', '9alop7gt4fv7fDR0K35F6hBIO0fDhg'),
('tomas', '151e36eab1a821da1923846dfea87f543084497747b99ddb944fd2b24e98814f', 'manager', '', 'AnmFl9v63TwdBVnar0txT3aPztiPlq');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicles`
--

CREATE TABLE `vehicles` (
  `licensePlate` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `seats` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vehicles`
--

INSERT INTO `vehicles` (`licensePlate`, `brand`, `seats`) VALUES
('1234-JJJ', 'TOYOTA', 5),
('1234-JJL', 'TOYOTA', 6),
('4434-DBT', 'FIAT', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vtc`
--

CREATE TABLE `vtc` (
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
-- Volcado de datos para la tabla `vtc`
--

INSERT INTO `vtc` (`id`, `name`, `destiny`, `origin`, `seats`, `company`, `directionCompany`, `transferDate`, `transferTime`, `description`) VALUES
(1, 'pepe vtc', 'Teror', 'Las Palmas', 5, 'rentCar', 'Vecindario', '2019-03-21', '2019-03-21', 'Este es un servicio de prueba'),
(2, 'Carla vtc', 'Maspalomas', 'La Aldea', 10, 'rentCar', 'Vecindario', '2019-03-24', '2019-03-25', 'Carla no sabe donde se mete. La pobre...'),
(3, 'Juan vtc', 'San Mateo', 'Gando', 8, 'PepesCar', 'Vegueta', '2019-11-20', '2019-11-22', 'Lorem Ipsum'),
(4, 'Maria vtc', 'San Bartolomé', 'Roque Nublo', 18, 'JunitosCar', 'Guanarteme', '2019-11-14', '2019-11-17', 'Lorem Ipsum'),
(5, 'Andrea vtc', 'aliseos', 'siete palmas', 6, 'trayectocortito', 'sietepalmas', '2019-03-25', '2019-03-25', 'Trayecto muy cortito');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`cif`);

--
-- Indices de la tabla `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotelCif`),
  ADD KEY `cif` (`cif`);

--
-- Indices de la tabla `mercedes`
--
ALTER TABLE `mercedes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `minibus`
--
ALTER TABLE `minibus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`licensePlate`);

--
-- Indices de la tabla `vtc`
--
ALTER TABLE `vtc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `mercedes`
--
ALTER TABLE `mercedes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `minibus`
--
ALTER TABLE `minibus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `vtc`
--
ALTER TABLE `vtc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_ibfk_1` FOREIGN KEY (`cif`) REFERENCES `clients` (`cif`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
