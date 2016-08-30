-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2015 a las 05:13:08
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
CREATE PROCEDURE `sp_EvaluarPreguntas`()
    NO SQL
SELECT
	idPregunta  
    ,((SELECT COUNT(*) 
     	FROM Preguntas Eq
     	WHERE Eq.idEquipo != 0
     		AND Eq.idPregunta = C.idPregunta
     		AND Eq.Respuesta = C.Respuesta)/(SELECT COUNT(*) FROM equipos WHERE idEquipo <> 0) * 100) AS 'Percent'
FROM
	preguntas C
WHERE
	idEquipo = 0

LIMIT 30$$

CREATE PROCEDURE `sp_Mat_Calificar`(IN `equipo` VARCHAR(16))
    NO SQL
BEGIN
	IF(equipo <> 0) THEN
	BEGIN
		SELECT	
			count(*) * 100 / 30 - (SELECT count(*)*.20 FROM preguntas WHERE Penalizada=1 AND idEquipo=equipo) as puntos
		FROM
			 preguntas eq
		INNER JOIN (SELECT	*
					FROM preguntas
					WHERE idEquipo = 0) Correctas
			ON Correctas.idPregunta = eq.idPregunta
		WHERE
		eq.idEquipo = equipo
		AND eq.Penalizada = 0
		AND Correctas.Respuesta = eq.Respuesta
		INTO @puntos;
		UPDATE equipos set Puntos = @puntos WHERE idEquipo = equipo;
	END;
	END IF;
END$$

CREATE PROCEDURE `sp_Mat_CapturaAsesores`(IN `numero` INT, IN `escuela` INT, IN `nom` VARCHAR(50), IN `con` VARCHAR(50))
    NO SQL
BEGIN	
	IF EXISTS(SELECT Nombre FROM asesores WHERE NumAsesor=numero AND idEscuela=escuela)THEN
	BEGIN
			UPDATE asesores SET
						   Nombre = nom,
						   Contacto = con
			WHERE idEscuela = escuela and NumAsesor=numero;
	END;
	ELSE
	BEGIN	
			
		INSERT INTO asesores(idEscuela,NumAsesor,Nombre,Contacto)
	    			VALUES(escuela,numero,nom,con);
	END;
END IF;
END$$

CREATE PROCEDURE `sp_Mat_Detalles`(IN `op` INT)
    NO SQL
IF op=1 THEN

	UPDATE detalles SET Estatus = 1 WHERE Descripcion = 'Concurso';

ELSEIF op = 2 THEN

	UPDATE detalles SET Estatus = 0 WHERE Descripcion = 'Concurso';
ELSEIF op = 3 THEN

	UPDATE detalles SET Estatus = 1 WHERE Descripcion = 'Inscripciones';
ELSEIF op = 4 THEN

	UPDATE detalles SET Estatus = 0 WHERE Descripcion = 'Inscripciones';

END IF$$

CREATE PROCEDURE `sp_Mat_InfoEquipos`(IN `esc` INT)
    NO SQL
BEGIN
	SELECT DISTINCT A.Nombre,A.NumAsesor,Integrante1, Integrante2, Integrante3 
    FROM equipos E 
    INNER JOIN asesores A on E.idEscuela = A.idEscuela 
    WHERE E.idEscuela =  esc AND E.idEscuela > 0  
    ORDER BY A.NumAsesor;
END$$

CREATE PROCEDURE `sp_Mat_InsertaEquipo`(IN `ideq` INT, IN `idesc` INT, IN `integ1` VARCHAR(50), IN `integ2` VARCHAR(50), IN `integ3` VARCHAR(50))
BEGIN	
	IF EXISTS(SELECT idEquipo FROM Equipos WHERE idEquipo=ideq)THEN
	BEGIN
			UPDATE Equipos SET
						   Integrante1 = integ1,
						   Integrante2 = integ2,
						   Integrante3 = integ3
			WHERE idEquipo = ideq;
	END;
	ELSE
	BEGIN
		CALL sp_Mat_Mesa(ideq,@mesa); 
		SELECT CONCAT('Eq',ideq,CONCAT('mat',substring(curdate() FROM 1 For 4))) INTO @usr;
		SELECT LEFT(UUID(), 8) INTO @pass;
			IF EXISTS(SELECT Modificar FROM Equipos WHERE Modificar <> '' AND idEscuela=idesc)THEN
				SELECT Modificar FROM Equipos WHERE idEquipo=ideq AND Modificar <> '' INTO @mod;                
			ELSE
				SELECT UPPER(LEFT(UUID(), 6)) INTO @mod;
			END IF;
		INSERT INTO Equipos(idEquipo,
                            idEscuela,
                            Integrante1,
                            Integrante2,
                            Integrante3,
                            Usuario,
                            Contrasena,
							Modificar,
                            Mesa)
	    			VALUES(	ideq,
               				idesc,
              				integ1,
              				integ2,
              				integ3,
                          	@usr,
                            @pass,
							@mod,
                          	@mesa);
	END;
END IF;
END$$

CREATE PROCEDURE `sp_Mat_InsertaEscuela`(IN `name` VARCHAR(100), IN `dir` VARCHAR(250), IN `tel` INT)
    NO SQL
BEGIN
	IF EXISTS(SELECT idEscuela FROM escuelas WHERE Nombre like name)THEN
    BEGIN
    	
    END;
    ELSE
    BEGIN
    	SELECT IFNULL(MAX(idEscuela),0)+1 INTO @id FROM escuelas;
    	INSERT INTO escuelas(Direccion,idEscuela,Nombre)VALUES(dir,@id,name);
    END;
    END IF;
END$$

CREATE PROCEDURE `sp_Mat_InsertaRespuesta`(IN `respuesta` VARCHAR(5), IN `pregunta` INT, IN `penalizada` TINYINT(1), IN `team` VARCHAR(16))
    NO SQL
BEGIN
	
	IF(SELECT idEquipo FROM preguntas WHERE idEquipo = team AND idPregunta=pregunta)THEN
	BEGIN
		UPDATE preguntas SET Respuesta=respuesta,
							 Penalizada=penalizada
		WHERE idEquipo=team AND idPregunta=pregunta;
	END;
    ELSE
	BEGIN
		INSERT INTO preguntas(idEquipo,idPregunta,Respuesta,Penalizada) 
			   VALUES(team,pregunta,respuesta,penalizada);
	END;
	END IF;
END$$

CREATE PROCEDURE `sp_Mat_Mesa`(IN `idEq` INT, OUT `mesa` INT)
    NO SQL
BEGIN
	IF idEq BETWEEN 100 and 199 THEN
    BEGIN
    	SELECT IFNULL(MAX(Mesa),0)+1 INTO mesa
        FROM equipos WHERE idEquipo BETWEEN 100 and 199;
    END;
    ELSEIF idEq BETWEEN 200 and 299 THEN
    BEGIN
    	SELECT IFNULL(MAX(Mesa),20)+1 INTO mesa
        FROM equipos WHERE idEquipo BETWEEN 200 and 299;
    END;
    ELSEIF idEq BETWEEN 300 and 399 THEN
    BEGIN
    	SELECT IFNULL(MAX(Mesa),40)+1 INTO mesa
        FROM equipos WHERE idEquipo BETWEEN 300 and 399;
    END;
    ELSEIF idEq BETWEEN 400 and 499 THEN
    BEGIN
    	SELECT IFNULL(MAX(Mesa),30)+1 INTO mesa
        FROM equipos WHERE idEquipo BETWEEN 400 and 499;
    END;
    ELSEIF idEq BETWEEN 500 and 599 THEN
    BEGIN
    	SELECT IFNULL(MAX(Mesa),50)+1 INTO mesa 
        FROM equipos WHERE idEquipo BETWEEN 500 and 599;
    END;
    END IF;
END$$

CREATE PROCEDURE `sp_Mat_numEq`(IN `type` INT, IN `escuela` INT, OUT `id` INT)
BEGIN
	IF(type=1)THEN
	BEGIN
		IF(SELECT idEquipo FROM equipos WHERE idEscuela = escuela AND idEquipo = 100 + escuela)THEN
		BEGIN	
			SELECT idEquipo FROM equipos WHERE idEscuela = escuela AND idEquipo = 100 + escuela into id;
		END;
		ELSE
		BEGIN
			SELECT 100 + escuela into id;
		END; 
		END IF;
	END;
	ELSEIF(type=2)THEN
	BEGIN
		IF(SELECT idEquipo FROM equipos WHERE idEscuela = escuela AND idEquipo = 200 + escuela)THEN
		BEGIN	
			SELECT idEquipo FROM equipos WHERE idEscuela = escuela AND idEquipo = 200 + escuela into id;
		END;
		ELSE
		BEGIN
			SELECT 200 + escuela into id;
		END; 
		END IF;
	END;
	ELSEIF(type=3)THEN
	BEGIN
		IF(SELECT idEquipo FROM equipos WHERE idEscuela = escuela AND idEquipo = 300 + escuela)THEN
		BEGIN	
			SELECT idEquipo FROM equipos WHERE idEscuela = escuela AND idEquipo = 300 + escuela into id;
		END;
		ELSE
		BEGIN
			SELECT 300 + escuela into id;
		END; 
		END IF;
	END;
    ELSEIF(type=4)THEN
	BEGIN
		IF(SELECT idEquipo FROM equipos WHERE idEscuela = escuela AND idEquipo = 400 + escuela)THEN
		BEGIN	
			SELECT idEquipo FROM equipos WHERE idEscuela = escuela AND idEquipo = 400 + escuela into id;
		END;
		ELSE
		BEGIN
			SELECT 400 + escuela into id;
		END; 
		END IF;
	END;
	
    ELSEIF(type=5)THEN
	BEGIN
		IF(SELECT idEquipo FROM equipos WHERE idEscuela = escuela AND idEquipo = 500 + escuela)THEN
		BEGIN	
			SELECT idEquipo FROM equipos WHERE idEscuela = escuela AND idEquipo = 500 + escuela into id;
		END;
		ELSE
		BEGIN
			SELECT 500 + escuela into id;
		END; 
		END IF;
	END;
	END IF;
END$$

CREATE PROCEDURE `sp_Mat_NumeroEquipo`(IN `equipo` INT, OUT `id` INT, IN `escuela` INT)
    NO SQL
BEGIN
	IF (equipo=1)THEN
	BEGIN
		IF(SELECT idEquipo
                  FROM equipos 
        		  WHERE idEscuela = escuela 
                  AND idEquipo BETWEEN 1 AND 40)THEN
		
        	SELECT idEquipo INTO id 
            FROM equipos 
        	WHERE idEscuela = escuela 
            AND idEquipo BETWEEN 1 AND 40;
		
		ELSE
		
        	SELECT IFNULL(MAX(idEquipo),0)+1 INTO id 
        	FROM equipos 
        	WHERE idEquipo BETWEEN 1 AND 40 LIMIT 1;      	     
		
		END IF;
	END;
    ELSEIF (equipo=2)THEN
    BEGIN 
		IF(SELECT idEquipo
                  FROM equipos 
        		  WHERE idEscuela = escuela 
                  AND idEquipo BETWEEN 41 AND 80)THEN
		
		SELECT idEquipo INTO id 
        FROM equipos 
        WHERE idEscuela = escuela 
        AND idEquipo BETWEEN 41 AND 80;
		
		ELSE		
        SELECT IFNULL(MAX(idEquipo),40)+1 INTO id 
        FROM equipos 
        WHERE idEquipo BETWEEN 41 AND 80 LIMIT 1;      			
		
		END IF;
    END;
    ELSEIF (equipo=3)THEN
    BEGIN 
		IF(SELECT idEquipo
                  FROM equipos 
        		  WHERE idEscuela = escuela 
                  AND idEquipo BETWEEN 81 AND 120)THEN
		
		SELECT idEquipo INTO id 
        FROM equipos 
        WHERE idEscuela = escuela 
        AND idEquipo BETWEEN 81 AND 120;
		
		ELSE		
        SELECT IFNULL(MAX(idEquipo),80)+1 INTO id 
        FROM equipos 
        WHERE idEquipo BETWEEN 81 AND 120 LIMIT 1;      			
		
		END IF;
    END;
	END IF;
END$$

CREATE PROCEDURE `sp_Mat_rand`(IN `ran` int,out `num` INT)
BEGIN
	SELECT FLOOR(RAND() * 40)+ran into num;
	IF(SELECT num IN(SELECT idEquipo From equipos))THEN
	BEGIN
		CALL sp_Mat_rand(ran,@id);
		SELECT @id into num;
	END;
	END IF;
END$$

CREATE PROCEDURE `sp_ReporteEquipos`()
    NO SQL
SELECT count(P.penalizada) as Penalizadas,E.Puntos,P.idEquipo FROM `preguntas` P INNER JOIN `equipos` E on E.idEquipo = P.idEquipo WHERE P.idEquipo <> 0 and Penalizada = 1 GROUP BY idEquipo$$

CREATE PROCEDURE `sp_ReultadosEquipo`(IN `equipo` VARCHAR(30))
    NO SQL
SELECT 	eq.idEquipo
		,eq.idPregunta
        ,eq.respuesta
        ,Correctas.respuesta AS correcta
        ,CASE WHEN eq.penalizada=1 
        THEN 'Si' ELSE 'No' END AS penalizada 
FROM preguntas eq 
INNER JOIN (SELECT * 
            FROM preguntas 
            WHERE idEquipo = 0) 
            Correctas ON Correctas.idPregunta = eq.idPregunta
            WHERE eq.idEquipo = equipo$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesores`
--

CREATE TABLE IF NOT EXISTS `asesores` (
  `idEscuela` int(11) NOT NULL,
  `NumAsesor` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Contacto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles`
--

CREATE TABLE IF NOT EXISTS `detalles` (
  `Descripcion` varchar(50) NOT NULL,
  `Estatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalles`
--

INSERT INTO `detalles` (`Descripcion`, `Estatus`) VALUES
('Concurso', 0),
('Inscripciones', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE IF NOT EXISTS `equipos` (
  `idEquipo` varchar(16) NOT NULL,
  `idEscuela` int(11) NOT NULL,
  `Integrante1` varchar(50) NOT NULL,
  `Integrante2` varchar(50) NOT NULL,
  `Integrante3` varchar(50) NOT NULL,
  `Puntos` int(11) DEFAULT NULL,
  `Usuario` varchar(16) NOT NULL,
  `Contrasena` varchar(16) NOT NULL,
  `Modificar` varchar(16) NOT NULL,
  `Mesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`idEquipo`, `idEscuela`, `Integrante1`, `Integrante2`, `Integrante3`, `Puntos`, `Usuario`, `Contrasena`, `Modificar`, `Mesa`) VALUES
('0', 0, 'NA', 'NA', 'NA', 0, 'admin', 'adminuniva', 'NA', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuelas`
--

CREATE TABLE IF NOT EXISTS `escuelas` (
  `idEscuela` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Direccion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `escuelas`
--

INSERT INTO `escuelas` (`idEscuela`, `Nombre`, `Direccion`) VALUES
(1, 'AMERICAN SCHOOL FOUNDATION OF GUADALAJARA', NULL),
(2, 'BACHILLERATO CERVANTES LOMA BONITA', NULL),
(3, 'C. E. U. ADOLFO LOPEZ MATEOS', NULL),
(4, 'CBTIS 226 (CIUDAD GUZMAN)', NULL),
(5, 'CENTRO DE DESARROLLO INTEGRAL ABOLEDAS (CEDI)', NULL),
(6, 'CENTRO DE ENSEÑANZA TECNICA INDUSTRIAL (CETI COLOM', NULL),
(7, 'CENTRO DE ESTUDIOS ADMINISTRATIVOS DE OCCDENTE', NULL),
(8, 'CENTRO DE ESTUDIOS PROFESIONALES AC', NULL),
(9, 'CETIS 162', NULL),
(10, 'COBAEJ # 11 LAZARO CARDENAS DEL RIO', NULL),
(11, 'COBAEJ # 13 GABINO BARREDA', NULL),
(12, 'COBAEJ # 2 PLANTEL MIRAMAR', NULL),
(13, 'COBAEJ # 20 TALPA DE ALLENDE', NULL),
(14, 'COBAEJ # 5 NUEVA SANTA MARIA', NULL),
(15, 'COBAEJ # 9 PORTEZUELO', NULL),
(16, 'COBAEJ 19 CUAUTLA', NULL),
(17, 'COBAEJ PLANTEL # 10 SAN SEBASTIAN EL GRANDE', NULL),
(18, 'COBAEJ PLANTEL # 15 SAN GONZALO', NULL),
(19, 'COBAEJ PLANTEL #12 ARROYO HONDO', NULL),
(20, 'COBAEJ PLANTEL #21 SN MIGUEL COYUTLAN', NULL),
(21, 'COBAEJ PLANTEL 3 GOMEZ FARIAS', NULL),
(22, 'COBAEL PLANTEL No. 5', NULL),
(23, 'COLEGIO CERVANTES COSTA RICA', NULL),
(24, 'COLEGIO DE BACHILLERES PLANTEL 16', NULL),
(25, 'COLEGIO DE BACHILLERES PLANTEL 18 ATEMAJAC DE B', NULL),
(26, 'COLEGIO DE BACHILLERES PLANTEL 6 ATENGO', NULL),
(27, 'COLEGIO FRAY PEDRO GANTE', NULL),
(28, 'COLEGIO INGLES HIDALGO', NULL),
(29, 'COLEGIO LA PAZ', NULL),
(30, 'COLEGIO MEXICO NUEVO CAMPUS LA CALMA', NULL),
(31, 'COLEGIO REFORMA', NULL),
(32, 'COLEGIO SALESIANO ANAHUAC GARIBALDI', NULL),
(33, 'CONALEP II', NULL),
(34, 'CONALEP III', NULL),
(35, 'EMSAD 36 OJOS DE AGUA DE LATILLAS (TEPATITLAN)', NULL),
(36, 'EMSAD 61 SAN JOSE DE LOS GUAJES', NULL),
(37, 'EMSAD 62 SAN CRISTOBAL DE LA BARRANCA', NULL),
(38, 'EMSAD 66 QUILA', NULL),
(39, 'ESCUELA PREPARATORIA No 11 (U de G)', NULL),
(40, 'ESCUELA PREPARATORIA No 13 (U de G)', NULL),
(41, 'ESCUELA PREPARATORIA No 14 (U de G)', NULL),
(42, 'ESCUELA PREPARATORIA No 18 (U de G)', NULL),
(43, 'ESCUELA PREPARATORIA No 19 (U de G)', NULL),
(44, 'ESCUELA PREPARATORIA No 2 (U de G)', NULL),
(45, 'ESCUELA PREPARATORIA No 20 (U de G)', NULL),
(46, 'ESCUELA PREPARATORIA No 3 (U de G)', NULL),
(47, 'ESCUELA PREPARATORIA No 5 (U de G)', NULL),
(48, 'ESCUELA PREPARATORIA No 6 (U de G)', NULL),
(49, 'ESCUELA PREPARATORIA No 7 (U de G)', NULL),
(50, 'ESCUELA PREPARATORIA REGIONAL DE AMECA', NULL),
(51, 'ESCUELA PREPARATORIA REGIONAL DE ATOTONILCO', NULL),
(52, 'ESCUELA PREPARATORIA REGIONAL DE AUTLAN', NULL),
(53, 'ESCUELA PREPARATORIA REGIONAL DE CHAPALA ', NULL),
(54, 'ESCUELA PREPARATORIA REGIONAL DE LA BARCA', NULL),
(55, 'ESCUELA PREPARATORIA REGIONAL SAN MARTIN HIDALGO', NULL),
(56, 'ESCUELA PREPARTORIA DE TONALA', NULL),
(57, 'ESCUELA TÉCNICA PALMARES', NULL),
(58, 'ESCUELA VOCACIONAL', NULL),
(59, 'INSTITUTO COLUMBIA', NULL),
(60, 'INSTITUTO CUMBRES SAN JAVIER', NULL),
(61, 'INSTITUTO DE CIENCIAS', NULL),
(62, 'INSTITUTO DE LA VERA CRUZ', NULL),
(63, 'LICEO DEL BOSQUE', NULL),
(64, 'LICEO DEL VALLE', NULL),
(65, 'PREPARATORIA DEL TEC DE MONTERREY', NULL),
(66, 'PREPARATORIA UNIVA', NULL),
(67, 'UNIVERSIDAD DE ESPECIALIDADES (UNE)', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE IF NOT EXISTS `preguntas` (
  `idPregunta` int(11) NOT NULL,
  `idEquipo` varchar(16) NOT NULL,
  `Respuesta` varchar(8) NOT NULL,
  `Penalizada` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asesores`
--
ALTER TABLE `asesores`
 ADD PRIMARY KEY (`NumAsesor`,`idEscuela`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
 ADD PRIMARY KEY (`idEquipo`);

--
-- Indices de la tabla `escuelas`
--
ALTER TABLE `escuelas`
 ADD PRIMARY KEY (`idEscuela`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
