-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2022 a las 03:52:24
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tu_manga`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `descuento` tinyint(4) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `tipo`, `descripcion`, `precio`, `descuento`, `id_categoria`, `activo`) VALUES
(1, 'One Piece', 'Volumen Compilatorio', 'La serie narra la historia de un joven llamado Monkey D. Luffy, que inspirado por su amigo pirata Shanks, comienza un viaje para alcanzar su sueño, ser el Rey de los piratas, para lo cual deberá encontrar el tesoro One Piece dejado por el anterior rey de los piratas Gol D. Roger', '500', 0, 1, 1),
(2, 'One punch man', 'Seinen', 'La historia se centra en Saitama, un superhéroe calvo y extremadamente\r\nfuerte que se muestra abrumado por la ausencia de un verdadero desafío, y\r\nque continuamente busca a un oponente digno de su poder.', '100', 0, 1, 1),
(3, 'Naruto', 'Shounen', 'Cuenta la historia de un joven ninja hiperactivo llamado Naruto Uzumaki que\r\nhará todo lo posible por ascender al máximo grado ninja de su aldea con el\r\npropósito de ser reconocido como alguien importante dentro de su aldea.', '100', 0, 1, 1),
(4, 'Boku no Hero', 'Shounen', 'La historia tiene lugar en un mundo donde el 80% de la población ha\r\ndesarrollado dones, surgiendo así héroes y villanos. Entre el 20% de\r\npersonas sin dones, se encuentra Izuku Midoriya, cuyo mayor deseo es\r\npoder estudiar en la U.A. y convertirse en un héroe como su ídolo All Might.', '109', 0, 1, 1),
(5, 'Berserk\r\n', 'Seinen\r\n', 'Nos cuenta la historia de Guts, un antihéroe mercenario que vaga por el\r\nmundo en solitario en búsqueda de Apóstoles, unos seres demoníacos que\r\nantaño fueron humanos pero que sacrificaron una parte importante de sus\r\nvidas para conseguir poderes que les permitieran alcanzar sus más oscuros\r\ndeseos.', '100', 5, 1, 1),
(6, 'Goblin Slayer ', 'Seinen', 'Una sacerdotisa inexperta se une a su primer grupo de aventuras, pero entra\r\nen peligro después de que su primer contrato de aventurero con goblins\r\nfracasa. Después de que el resto de su grupo es eliminado, ella es salvada\r\npor un hombre conocido como Goblin Slayer, un aventurero cuyo único\r\npropósito es la erradicación de los goblins con un prejuicio extremo.', '129', 0, 1, 1),
(7, 'Dragon Ball ', 'Shounen', 'Su trama describe las aventuras de Gokū, un guerrero saiyajin, experto en\r\nartes marciales que en su infancia inicia sus viajes y aventuras en las que\r\npone a prueba y mejora sus habilidades de pelea, además de defenderla\r\nTierra de números enemigos.', '129', 0, 1, 1),
(8, 'Rent a Girlfriend', 'Shounen', 'Kazuya Kinoshita es un estudiante universitario de 20 años que tiene una\r\nnovia maravillosa: la brillante Mami Nanami. Pero de repente, ya no. Sin\r\nprevio aviso, Mami rompe con él, dejándolo con el corazón roto y en\r\nsoledad. Buscando aliviar su dolor, contrata a una novia de alquiler a través\r\nde una aplicación en línea.', '120', 0, 1, 1),
(9, 'Steel Ball Run\r\n', 'Seinen', 'Ambientada en 1890, está protagonizada por Gyro Zeppeli, un antiguo\r\nverdugo deshonrado, y Johnny Joestar, un ex jockey que recibió un disparo y\r\nperdió el uso de sus piernas, así como su fama y fortuna. Ellos, junto con\r\notros, compiten en una carrera a través de todo Estados Unidos por 50\r\nmillones de dólares.\r\n', '160', 10, 1, 1),
(10, 'Komi-san\r\n', 'Shounen\r\n', 'En un instituto lleno de personajes peculiares, Tadano trata de ayudar a su\r\ntímida y asocial compañera de clase Komi a lograr su objetivo: hacerse amiga\r\nde 100 personas.', '140', 0, 1, 1),
(11, 'Tokyo Ghoul\r\n', 'Seinen\r\n', 'En Tokio hay varias muertes, cometidas por Ghouls, seres desconocidos que\r\nsobreviven a base de carne humana. Un día Ken Kaneki, un joven de 18 años\r\nconoce a una chica llamada Rize en una cafetería y la invita a salir. Tras una\r\ncita aparentemente normal, se ofrece a acompañarla a su casa sin saber que\r\nsu vida cambiaria.', '100', 0, 1, 1),
(12, 'Guantelete del infinito ', 'Teen\r\n', 'Para Thanos, el Guantelete del Infinito es el Santo Grial, el premio definitivo\r\npor su adoración hacia la muerte. Con él, lo controla todo. Liderados por Adam Warlock, los superhéroes de la Tierra representan la última esperanza\r\ndel Universo.', '469', 2, 1, 1),
(13, 'The Batman Who Laughs', 'Teen+15', 'El Batman que ríe es Bruce Wayne proveniente de la Tierra -22 del\r\nMultiverso Oscuro, es un psicópata convertido en el nuevo Joker de su\r\nmundo tras ser infectado por su toxina al matarlo, él vive con el propósito de\r\nconquistar y propagar el caos para prolongar su diversión.', '400', 0, 1, 1),
(14, 'FlashPoint', 'Teen+15', 'La trama presenta una realidad alternativa después de que Barry Allen utilice\r\nsu supervelocidad para viajar atrás en el tiempo hasta el momento en el que\r\nsu madre fue asesinada y evitar su muerte.', '200', 0, 1, 1),
(15, 'Crisis en Tierras Infinitas ', 'Teen', 'Los universos del Multiverso están despareciendo y nadie es consciente de la\r\namenaza hasta que es demasiado tarde. Para hacer frente a este problema\r\nmultiversal, El Monitor une a numerosos superhéroes de diferentes tierras\r\nparalelas para hacer frente al Anti-Monitor, un ser lleno de ira y destrucción,\r\nque está decidido a acabar con toda la existencia.', '450', 0, 1, 1),
(16, 'Batman: la broma asesina ', 'Mature\r\n', 'La broma asesina es una historia centrada en el Joker, la antítesis de Batman\r\npor definición, y en la relación que éste y Batman han llegado a desarrollar a\r\nlo largo de los años. El relato comienza cuando se fuga por enésima vez del\r\nmanicomio de Arkham. A partir de ahí, asistiremos a dos historias paralelas.', '500', 0, 1, 1),
(17, 'Secret Wars ', 'Teen', 'La historia trata de una entidad cósmica, el Beyonder, que secuestra a un\r\ngran número de héroes y villanos y los enfrenta en un planeta artificial\r\nllamado Battleworld.', '400', 10, 1, 1),
(18, 'The Boys', 'Mature\r\n', 'Cuando los superhéroes abusan de sus superpoderes en lugar de usarlos\r\npara el bien, unos muchachos se embarcan en una búsqueda heroica para\r\nexponer sus secretos.', '380', 30, 1, 1),
(19, 'Invincible', 'Mature', 'Mark Grayson era un chico normal y corriente de instituto, la única\r\ndiferencia respecto a los demás es que su padre, Nolan Grayson, es OmniMan, uno de los superhéroes más poderosos de la Tierra y perteneciente al\r\nsupergrupo The Guardians of the Globe.\r\n', '200', 10, 1, 1),
(20, 'Detective Conan', 'Kodomo', 'Shinichi Kudo es un joven detective que consigue esclarecer cualquier\r\nmisterio, por difícil que sea. Un día, nuestro protagonista descubre los\r\nmaléficos planes de una peligrosa organización criminal y es envenenado. Sin\r\nembargo, el veneno no lo mata, sino que, por accidente, lo encoge y lo\r\nconvierte en un niño de apenas 6 años.', '177', 0, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
