-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2019 a las 17:51:10
-- Versión del servidor: 8.0.13
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_proyecto01`
--
CREATE DATABASE `bd_proyecto01`;
USE bd_proyecto01;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_incidencia`
--

CREATE TABLE `tbl_incidencia` (
  `id_in` int(11) NOT NULL,
  `desc_in` text NOT NULL,
  `fecha_in` date NOT NULL,
  `id_reserva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Volcado de datos para la tabla `tbl_incidencia`
--

INSERT INTO `tbl_incidencia` (`id_in`, `desc_in`, `fecha_in`, `id_reserva`) VALUES
(1, 'Se ha roto el fluorescente de la sala', '2019-11-02', 1),
(2, 'Se ha roto el cable del enchufe del proyector', '2019-11-04', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_recursos`
--

CREATE TABLE `tbl_recursos` (
  `id_recurs` int(11) NOT NULL,
  `nom_recurs` varchar(25) NOT NULL,
  `tipo_recurs` enum('MATERIAL INFORMATICO','MATERIAL DEPORTIVO','MATERIAL EDUCATIVO','MATERIAL DE SOPORTE VISUAL') NOT NULL,
  `desc_recurs` text NOT NULL,
  `disponibilidad` enum('DISPONIBLE','OCUPADO') NOT NULL DEFAULT 'DISPONIBLE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_recursos`
--

INSERT INTO `tbl_recursos` (`id_recurs`, `nom_recurs`, `tipo_recurs`, `desc_recurs`, `disponibilidad`) VALUES
(1, 'portatil_01', 'MATERIAL INFORMATICO', '', 'OCUPADO'),
(2, 'portatil_02', 'MATERIAL INFORMATICO', '', 'OCUPADO'),
(3, 'proyector_01', 'MATERIAL DE SOPORTE VISUAL', '', 'OCUPADO'),
(4, 'proyector_02', 'MATERIAL DE SOPORTE VISUAL', '', 'OCUPADO'),
(5, 'portatil_03', 'MATERIAL INFORMATICO', '', 'DISPONIBLE'),
(6, 'mobil_01', 'MATERIAL INFORMATICO', '', 'DISPONIBLE'),
(7, 'mobil_02', 'MATERIAL INFORMATICO', '', 'DISPONIBLE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reserva`
--

CREATE TABLE `tbl_reserva` (
  `id_reserva` int(11) NOT NULL,
  `fecha_ini_res` date NOT NULL,
  `fecha_fin_res` date NOT NULL,
  `id_recurs` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_sala` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_reserva`
--

INSERT INTO `tbl_reserva` (`id_reserva`, `fecha_ini_res`, `fecha_fin_res`, `id_recurs`, `id_user`, `id_sala`) VALUES
(1, '2019-10-30', '2019-11-08', NULL, 1, 1),
(2, '2019-10-15', '2019-11-04', NULL, 2, 7),
(3, '2019-11-01', '2019-11-05', 1, 4, NULL),
(4, '2019-11-04', '2019-11-07', 3, 2, NULL),
(5, '2019-10-15', '2019-11-27', NULL, 4, 7),
(6, '2019-11-09', '2019-11-10', 1, 4, 1),
(7, '2019-11-08', '2019-11-09', 2, 2, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_salas`
--

CREATE TABLE `tbl_salas` (
  `id_sala` int(11) NOT NULL,
  `nom_sala` varchar(25) NOT NULL,
  `tlf_sala` char(9) NOT NULL,
  `edificio_sala` varchar(40) NOT NULL,
  `desc_sala` text NOT NULL,
  `disponibilidad` enum('DISPONIBLE','OCUPADA') NOT NULL DEFAULT 'DISPONIBLE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Volcado de datos para la tabla `tbl_salas`
--

INSERT INTO `tbl_salas` (`id_sala`, `nom_sala`, `tlf_sala`, `edificio_sala`, `desc_sala`, `disponibilidad`) VALUES
(1, 'sala_polivalent', '601301001', 'edifici 1', 'sala polivalent d\'us comu', 'OCUPADA'),
(3, 'sala_ioga', '601301002', 'edifici 2', 'sala per a fer classes de ioga', 'OCUPADA'),
(7, 'sala_reforç', '601301003', 'edifici 3', 'sala per a classes de reforç a alumnes', 'OCUPADA'),
(9, 'sala_ball', '672635198', 'edifici 3', 'Sala per a classes de ball', 'DISPONIBLE'),
(10, 'sala_presentacions', '652871925', 'edifici 1', 'Sala per a fer presentacions', 'DISPONIBLE'),
(11, 'sala_informatica01', '625839156', 'edifici 2', 'Sala d\'us comú d\'informàtica', 'DISPONIBLE'),
(12, 'sala_informatica02', '672541789', 'edifici 2', 'Sala per a classes d\'informàtica', 'DISPONIBLE'),
(13, 'despatx_01', '635287156', 'edifici 3', 'Despatx per a reunions', 'DISPONIBLE'),
(14, 'despatx_02', '635287156', 'edifici 3', 'Despatx per a reunions', 'DISPONIBLE'),
(15, 'salo_de_actes', '625189352', 'edifici 1', '', 'DISPONIBLE'),
(16, 'taller_cuina', '642517892', 'edifici 1', 'Taller per a classes de cuina', 'DISPONIBLE'),
(17, 'Sala_de_reunions', '642517826', 'edifici 3', '', 'DISPONIBLE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom_us` varchar(25) NOT NULL,
  `cognom_us` varchar(25) NOT NULL,
  `email_us` varchar(60) NOT NULL,
  `data_naix_us` date NOT NULL,
  `dni_us` char(9) NOT NULL,
  `tlf_us` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id_user`, `username`, `password`, `nom_us`, `cognom_us`, `email_us`, `data_naix_us`, `dni_us`, `tlf_us`) VALUES
(1, 'diego', '81dc9bdb52d04dc20036dbd8313ed055', 'diego', 'carballido', 'diego.carballido@icloud.com', '2000-05-17', '48063010W', '619500622'),
(2, 'edgar', '81dc9bdb52d04dc20036dbd8313ed055', 'edgar', 'godoy', 'edgar.godoy@hotmail.com', '2000-01-01', '38559257X', '615083610'),
(4, 'raul', '81dc9bdb52d04dc20036dbd8313ed055', 'raul', 'vazquez', 'raul.vazquez@yahoo.com', '1975-01-01', '48063018X', '657829345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_incidencia`
--
ALTER TABLE `tbl_incidencia`
  ADD PRIMARY KEY (`id_in`),
  ADD KEY `fk_id_reserva` (`id_reserva`);

--
-- Indices de la tabla `tbl_recursos`
--
ALTER TABLE `tbl_recursos`
  ADD PRIMARY KEY (`id_recurs`);

--
-- Indices de la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `fk_id_user` (`id_user`),
  ADD KEY `fk_id_sala` (`id_sala`),
  ADD KEY `fk_id_recurs` (`id_recurs`);

--
-- Indices de la tabla `tbl_salas`
--
ALTER TABLE `tbl_salas`
  ADD PRIMARY KEY (`id_sala`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_incidencia`
--
ALTER TABLE `tbl_incidencia`
  MODIFY `id_in` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_recursos`
--
ALTER TABLE `tbl_recursos`
  MODIFY `id_recurs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_salas`
--
ALTER TABLE `tbl_salas`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_incidencia`
--
ALTER TABLE `tbl_incidencia`
  ADD CONSTRAINT `fk_id_reserva` FOREIGN KEY (`id_reserva`) REFERENCES `tbl_reserva` (`id_reserva`);

--
-- Filtros para la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  ADD CONSTRAINT `fk_id_recurs` FOREIGN KEY (`id_recurs`) REFERENCES `tbl_recursos` (`id_recurs`),
  ADD CONSTRAINT `fk_id_sala` FOREIGN KEY (`id_sala`) REFERENCES `tbl_salas` (`id_sala`),
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `tbl_usuario` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
