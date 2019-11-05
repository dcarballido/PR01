-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 02-11-2019 a las 16:52:03
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `bd_proyecto01`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_incidencia`
--

CREATE TABLE `tbl_incidencia` (
  `id_in` int(11) NOT NULL,
  `desc_in` text NOT NULL,
  `fecha_in` date NOT NULL,
  `id_reserva` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `tipo_recurs` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_recursos`
--

INSERT INTO `tbl_recursos` (`id_recurs`, `nom_recurs`, `tipo_recurs`) VALUES
(1, 'portatil_01', 'ordenador portatil'),
(2, 'portatil_02', 'ordenador portatil'),
(3, 'proyector_01', 'proyector de pared portatil'),
(4, 'proyector_02', 'proyector de pared portatil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reserva`
--

CREATE TABLE `tbl_reserva` (
  `id_reserva` int(11) NOT NULL,
  `fecha_ini_res` date NOT NULL,
  `Fecha_fin_res` date NOT NULL,
  `id_recurs` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_sala` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_reserva`
--

INSERT INTO `tbl_reserva` (`id_reserva`, `fecha_ini_res`, `Fecha_fin_res`, `id_recurs`, `id_user`, `id_sala`) VALUES
(1, '2019-10-30', '2019-11-08', NULL, 1, 1),
(2, '2019-10-15', '2019-11-04', NULL, 2, 7),
(3, '2019-11-01', '2019-11-05', 1, 4, NULL),
(4, '2019-11-04', '2019-11-07', 3, 2, NULL),
(5, '2019-10-15', '2019-11-27', NULL, 4, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_salas`
--

CREATE TABLE `tbl_salas` (
  `id_sala` int(11) NOT NULL,
  `nom_sala` varchar(25) NOT NULL,
  `tlf_sala` char(9) NOT NULL,
  `edificio_sala` varchar(40) NOT NULL,
  `desc_sala` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_salas`
--

INSERT INTO `tbl_salas` (`id_sala`, `nom_sala`, `tlf_sala`, `edificio_sala`, `desc_sala`) VALUES
(1, 'sala polivalent', '601301001', 'edifici 1', 'sala polivalent d\'us comu'),
(3, 'sala de yoga', '601301002', 'edifici 2', 'sala per a fer classes de yoga'),
(7, 'sala de reforç', '601301003', 'edifici 3', 'sala per a classes de reforç a alumnes');

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
  MODIFY `id_recurs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_salas`
--
ALTER TABLE `tbl_salas`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
