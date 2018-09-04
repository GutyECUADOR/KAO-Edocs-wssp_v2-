-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 04-09-2018 a las 12:46:33
-- Versión del servidor: 5.5.60-cll
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ksc_sckinsman`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cliente`
--

CREATE TABLE `tbl_cliente` (
  `cliente` int(11) NOT NULL,
  `ruc` varchar(15) NOT NULL,
  `nombre` varchar(90) NOT NULL,
  `email` varchar(180) NOT NULL,
  `password` varchar(15) NOT NULL,
  `estado` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_transaccion`
--

CREATE TABLE `tbl_transaccion` (
  `transaccion` int(11) NOT NULL,
  `ruc` varchar(15) DEFAULT NULL,
  `fecha` date NOT NULL,
  `tipo` varchar(2) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `valor` decimal(18,4) NOT NULL,
  `claveacceso` varchar(90) NOT NULL,
  `autorizacion` varchar(45) NOT NULL,
  `archivopdf` varchar(180) NOT NULL,
  `archivoxml` varchar(180) NOT NULL,
  `id` varchar(45) NOT NULL,
  `fechahora` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  ADD PRIMARY KEY (`cliente`),
  ADD UNIQUE KEY `ruc_UNIQUE` (`ruc`);

--
-- Indices de la tabla `tbl_transaccion`
--
ALTER TABLE `tbl_transaccion`
  ADD PRIMARY KEY (`transaccion`),
  ADD UNIQUE KEY `claveacceso` (`claveacceso`),
  ADD KEY `ruc_idx` (`ruc`),
  ADD KEY `valor` (`valor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  MODIFY `cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1317;

--
-- AUTO_INCREMENT de la tabla `tbl_transaccion`
--
ALTER TABLE `tbl_transaccion`
  MODIFY `transaccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2122;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_transaccion`
--
ALTER TABLE `tbl_transaccion`
  ADD CONSTRAINT `ruc` FOREIGN KEY (`ruc`) REFERENCES `tbl_cliente` (`ruc`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
