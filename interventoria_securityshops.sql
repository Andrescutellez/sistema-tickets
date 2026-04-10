-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-04-2026 a las 04:01:23
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
-- Base de datos: `interventoria_securityshops`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `td_proyectdetalle`
--

CREATE TABLE `td_proyectdetalle` (
  `proyectd_id` int(11) NOT NULL,
  `proyect_id` int(11) DEFAULT NULL,
  `usu_id` int(11) DEFAULT NULL,
  `proyectd_desc` text DEFAULT NULL,
  `fech_crea` datetime DEFAULT current_timestamp(),
  `est` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `td_proyectdetalle`
--

INSERT INTO `td_proyectdetalle` (`proyectd_id`, `proyect_id`, `usu_id`, `proyectd_desc`, `fech_crea`, `est`) VALUES
(1, 14, 1, 'Proceder', '2026-04-02 14:15:40', 1),
(2, 14, 2, 'Proyecto cerrado.', '2026-04-02 14:27:35', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_categoria`
--

CREATE TABLE `tm_categoria` (
  `cat_id` int(11) NOT NULL,
  `cat_nom` varchar(100) DEFAULT NULL,
  `est_categoria` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tm_categoria`
--

INSERT INTO `tm_categoria` (`cat_id`, `cat_nom`, `est_categoria`) VALUES
(1, 'Sistema de alarma', 1),
(2, 'CCTV', 1),
(3, 'Obsolecencia', 1),
(4, 'Renovación Tecnológica', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_proyecto`
--

CREATE TABLE `tm_proyecto` (
  `proyect_id` int(11) NOT NULL,
  `usu_id` int(11) DEFAULT NULL,
  `titulo_id` varchar(255) DEFAULT NULL,
  `cliente` varchar(255) DEFAULT NULL,
  `sucursal` varchar(255) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `prioridad` varchar(50) DEFAULT NULL,
  `proyect_desc` text DEFAULT NULL,
  `proyect_estado` enum('Abierto','Cerrado') DEFAULT 'Abierto',
  `fech_crea` datetime DEFAULT current_timestamp(),
  `usu_asig` int(11) DEFAULT NULL,
  `fech_asig` datetime DEFAULT NULL,
  `estado` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tm_proyecto`
--

INSERT INTO `tm_proyecto` (`proyect_id`, `usu_id`, `titulo_id`, `cliente`, `sucursal`, `cat_id`, `prioridad`, `proyect_desc`, `proyect_estado`, `fech_crea`, `usu_asig`, `fech_asig`, `estado`) VALUES
(14, 1, 'Migracion Pacom', 'Banco Bogota', 'Altavista', 1, 'Media', 'Pedir equipos y proceder', 'Cerrado', '2026-04-02 14:15:00', 2, '2026-04-02 14:16:41', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_usuario`
--

CREATE TABLE `tm_usuario` (
  `usu_id` int(11) NOT NULL,
  `usu_nom` varchar(100) DEFAULT NULL,
  `usu_ape` varchar(100) DEFAULT NULL,
  `usu_correo` varchar(150) DEFAULT NULL,
  `usu_pass` varchar(255) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `fech_crea` datetime DEFAULT current_timestamp(),
  `fech_modi` datetime DEFAULT NULL,
  `fech_elim` datetime DEFAULT NULL,
  `estado` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tm_usuario`
--

INSERT INTO `tm_usuario` (`usu_id`, `usu_nom`, `usu_ape`, `usu_correo`, `usu_pass`, `rol_id`, `fech_crea`, `fech_modi`, `fech_elim`, `estado`) VALUES
(1, 'Leonardo', 'Cuadros', 'leonardo.cuadros@interventoriasecurityshops.com', '123456', 2, '2026-04-02 13:34:04', NULL, NULL, 1),
(2, 'Angy', 'Amezquita', 'angy.amezquita@interventoriasecurityshops.com.co', '123456', 1, '2026-04-02 14:16:19', NULL, NULL, 1),
(3, 'demo', 'demo', 'admin@correo.com', '123456', 2, '2026-04-09 20:52:15', NULL, NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `td_proyectdetalle`
--
ALTER TABLE `td_proyectdetalle`
  ADD PRIMARY KEY (`proyectd_id`),
  ADD KEY `proyect_id` (`proyect_id`),
  ADD KEY `usu_id` (`usu_id`);

--
-- Indices de la tabla `tm_categoria`
--
ALTER TABLE `tm_categoria`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indices de la tabla `tm_proyecto`
--
ALTER TABLE `tm_proyecto`
  ADD PRIMARY KEY (`proyect_id`),
  ADD KEY `usu_id` (`usu_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indices de la tabla `tm_usuario`
--
ALTER TABLE `tm_usuario`
  ADD PRIMARY KEY (`usu_id`),
  ADD UNIQUE KEY `usu_correo` (`usu_correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `td_proyectdetalle`
--
ALTER TABLE `td_proyectdetalle`
  MODIFY `proyectd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tm_categoria`
--
ALTER TABLE `tm_categoria`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tm_proyecto`
--
ALTER TABLE `tm_proyecto`
  MODIFY `proyect_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tm_usuario`
--
ALTER TABLE `tm_usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `td_proyectdetalle`
--
ALTER TABLE `td_proyectdetalle`
  ADD CONSTRAINT `td_proyectdetalle_ibfk_1` FOREIGN KEY (`proyect_id`) REFERENCES `tm_proyecto` (`proyect_id`),
  ADD CONSTRAINT `td_proyectdetalle_ibfk_2` FOREIGN KEY (`usu_id`) REFERENCES `tm_usuario` (`usu_id`);

--
-- Filtros para la tabla `tm_proyecto`
--
ALTER TABLE `tm_proyecto`
  ADD CONSTRAINT `tm_proyecto_ibfk_1` FOREIGN KEY (`usu_id`) REFERENCES `tm_usuario` (`usu_id`),
  ADD CONSTRAINT `tm_proyecto_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `tm_categoria` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
