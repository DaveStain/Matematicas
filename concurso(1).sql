-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-10-2015 a las 00:35:38
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `concurso`
--

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE `sp_Mat_Calificar`$$
CREATE  PROCEDURE `sp_Mat_Calificar`(IN `equipo` VARCHAR(16))
    NO SQL
BEGIN
	IF(equipo <> 0) THEN
	BEGIN
    	SELECT count(*) FROM preguntas WHERE Penalizada=1 AND idEquipo=equipo INTO @penalizadas;
		SELECT	
			count(*) 
		FROM
			 preguntas eq
		INNER JOIN (SELECT	*
					FROM preguntas
					WHERE idEquipo = 0) Correctas
			ON Correctas.idPregunta = eq.idPregunta
		WHERE
		eq.idEquipo = equipo
		AND Correctas.Respuesta = eq.Respuesta
		INTO @puntos;
		set @puntos = (@puntos -  @penalizadas) * 100 / 30 - @penalizadas*.20;
		UPDATE equipos set Puntos = @puntos WHERE idEquipo = equipo;
	END;
	END IF;
END$$
