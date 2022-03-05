-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-03-2022 a las 00:54:12
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `superheroes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudadanos`
--

CREATE TABLE `ciudadanos` (
  `id` int(3) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `idUsuario` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ciudadanos`
--

INSERT INTO `ciudadanos` (`id`, `nombre`, `email`, `idUsuario`, `created_at`, `updated_at`) VALUES
(1, 'Pepe', 'pepe@pepe.com', 4, '2022-02-22 10:08:10', '2022-02-22 10:08:10'),
(2, 'Jaimison', 'jimmy@jimmy.com', 5, '2022-02-22 10:08:40', '2022-02-22 10:08:40'),
(4, 'Antonio', 'antonio@antonio.com', 7, '2022-03-04 22:22:42', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evolucion`
--

CREATE TABLE `evolucion` (
  `evolucion` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `evolucion`
--

INSERT INTO `evolucion` (`evolucion`) VALUES
('experto'),
('principiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habilidades`
--

CREATE TABLE `habilidades` (
  `id` int(3) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `habilidades`
--

INSERT INTO `habilidades` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'SuperFuerza', '2022-02-22 09:58:39', '2022-02-22 09:58:39'),
(2, 'Elasticidad', '2022-02-22 09:58:39', '2022-02-22 09:58:39'),
(3, 'SuperVelocidad', '2022-02-22 09:58:39', '2022-02-22 09:58:39'),
(4, 'Invisibilidad', '2022-02-22 09:58:39', '2022-02-22 09:58:39'),
(5, 'Controlar Agua', '2022-02-22 09:58:39', '2022-02-22 09:58:39'),
(6, 'Controlar Fuego', '2022-02-22 09:58:39', '2022-02-22 09:58:39'),
(7, 'Teletransportacion', '2022-02-22 09:58:39', '2022-02-22 09:58:39'),
(8, 'Vision Laser', '2022-02-22 09:58:39', '2022-02-22 09:58:39'),
(9, 'Volar', '2022-02-22 09:58:39', '2022-02-22 09:58:39'),
(10, 'Control Electricidad', '2022-02-22 09:58:39', '2022-02-22 09:58:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peticiones`
--

CREATE TABLE `peticiones` (
  `id` int(3) NOT NULL,
  `titulo` varchar(25) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `realizada` varchar(2) NOT NULL,
  `idSuperheroe` int(3) NOT NULL,
  `idCiudadano` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `superheroes`
--

CREATE TABLE `superheroes` (
  `id` int(3) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `evolucion` varchar(12) NOT NULL,
  `idUsuario` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `superheroes`
--

INSERT INTO `superheroes` (`id`, `nombre`, `imagen`, `evolucion`, `idUsuario`, `created_at`, `updated_at`) VALUES
(1, 'SpiderMan', '', 'principiante', 1, '2022-02-22 10:05:52', '2022-02-22 10:05:52'),
(2, 'IronMan', '', 'experto', 2, '2022-02-22 10:06:55', '2022-02-22 10:06:55'),
(3, 'La Perra Fantastica', '', 'principiante', 3, '2022-02-22 10:07:21', '2022-02-22 10:07:21'),
(5, 'Mister Tim', NULL, 'principiante', 11, '2022-03-05 00:02:14', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `superheroes_habilidades`
--

CREATE TABLE `superheroes_habilidades` (
  `id` int(3) NOT NULL,
  `idSuperheroe` int(3) NOT NULL,
  `idHabilidad` int(3) NOT NULL,
  `valor` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `superheroes_habilidades`
--

INSERT INTO `superheroes_habilidades` (`id`, `idSuperheroe`, `idHabilidad`, `valor`) VALUES
(1, 1, 1, 70),
(2, 2, 3, 70),
(3, 3, 7, 99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(3) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `psw` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `psw`, `created_at`, `updated_at`) VALUES
(1, 'ruben', '1234', '2022-02-22 09:52:04', '2022-02-22 09:52:04'),
(2, 'lulu', '1234', '2022-02-22 09:52:18', '2022-02-22 09:52:18'),
(3, 'mia', '1234', '2022-02-22 09:52:34', '2022-02-22 09:52:34'),
(4, 'pepe', '1234', '2022-02-22 09:52:47', '2022-02-22 09:52:47'),
(5, 'jimmy', '1234', '2022-02-22 09:53:01', '2022-02-22 09:53:01'),
(7, 'antonio', '1234', '2022-03-04 22:22:42', NULL),
(11, 'fliflu', '1234', '2022-03-05 00:02:14', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudadanos`
--
ALTER TABLE `ciudadanos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `evolucion`
--
ALTER TABLE `evolucion`
  ADD PRIMARY KEY (`evolucion`);

--
-- Indices de la tabla `habilidades`
--
ALTER TABLE `habilidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `peticiones`
--
ALTER TABLE `peticiones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSuperheroe` (`idSuperheroe`),
  ADD KEY `idCiudadano` (`idCiudadano`);

--
-- Indices de la tabla `superheroes`
--
ALTER TABLE `superheroes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `superheroes_evo_1` (`evolucion`);

--
-- Indices de la tabla `superheroes_habilidades`
--
ALTER TABLE `superheroes_habilidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSuperheroe` (`idSuperheroe`),
  ADD KEY `idHabilidad` (`idHabilidad`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudadanos`
--
ALTER TABLE `ciudadanos`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `habilidades`
--
ALTER TABLE `habilidades`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `peticiones`
--
ALTER TABLE `peticiones`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `superheroes`
--
ALTER TABLE `superheroes`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `superheroes_habilidades`
--
ALTER TABLE `superheroes_habilidades`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudadanos`
--
ALTER TABLE `ciudadanos`
  ADD CONSTRAINT `ciudadanos_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `peticiones`
--
ALTER TABLE `peticiones`
  ADD CONSTRAINT `peticiones_ibfk_1` FOREIGN KEY (`idSuperheroe`) REFERENCES `superheroes` (`id`),
  ADD CONSTRAINT `peticiones_ibfk_2` FOREIGN KEY (`idCiudadano`) REFERENCES `ciudadanos` (`id`);

--
-- Filtros para la tabla `superheroes`
--
ALTER TABLE `superheroes`
  ADD CONSTRAINT `superheroes_evo_1` FOREIGN KEY (`evolucion`) REFERENCES `evolucion` (`evolucion`),
  ADD CONSTRAINT `superheroes_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `superheroes_habilidades`
--
ALTER TABLE `superheroes_habilidades`
  ADD CONSTRAINT `superheroes_habilidades_ibfk_1` FOREIGN KEY (`idSuperheroe`) REFERENCES `superheroes` (`id`),
  ADD CONSTRAINT `superheroes_habilidades_ibfk_2` FOREIGN KEY (`idHabilidad`) REFERENCES `habilidades` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
