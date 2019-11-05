-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 02-11-2019 a las 16:22:29
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `bd_proyecto01`
--
CREATE DATABASE IF NOT EXISTS `bd_proyecto01` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_proyecto01`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_incidencia`
--

DROP TABLE IF EXISTS `tbl_incidencia`;
CREATE TABLE `tbl_incidencia` (
  `id_in` int(11) NOT NULL,
  `desc_in` text NOT NULL,
  `fecha_in` date NOT NULL,
  `id_reserva` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_recursos`
--

DROP TABLE IF EXISTS `tbl_recursos`;
CREATE TABLE `tbl_recursos` (
  `id_recurs` int(11) NOT NULL,
  `nom_recurs` varchar(25) NOT NULL,
  `tipo_recurs` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reserva`
--

DROP TABLE IF EXISTS `tbl_reserva`;
CREATE TABLE `tbl_reserva` (
  `id_reserva` int(11) NOT NULL,
  `fecha_ini_res` date NOT NULL,
  `Fecha_fin_res` date NOT NULL,
  `id_recurs` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sala` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_salas`
--

DROP TABLE IF EXISTS `tbl_salas`;
CREATE TABLE `tbl_salas` (
  `id_sala` int(11) NOT NULL,
  `nom_sala` varchar(25) NOT NULL,
  `tlf_sala` char(9) NOT NULL,
  `edificio_sala` varchar(40) NOT NULL,
  `desc_sala` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

DROP TABLE IF EXISTS `tbl_usuario`;
CREATE TABLE `tbl_usuario` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nom_us` varchar(25) NOT NULL,
  `cognom_us` varchar(25) NOT NULL,
  `email_us` varchar(60) NOT NULL,
  `data_naix_us` date NOT NULL,
  `dni_us` char(9) NOT NULL,
  `tlf_us` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id_in` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_recursos`
--
ALTER TABLE `tbl_recursos`
  MODIFY `id_recurs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_salas`
--
ALTER TABLE `tbl_salas`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

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
