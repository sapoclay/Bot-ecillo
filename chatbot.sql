-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-12-2022 a las 18:38:17
-- Versión del servidor: 10.6.11-MariaDB-0ubuntu0.22.04.1
-- Versión de PHP: 8.1.2-1ubuntu2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chatbot`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `email`) VALUES
(1, 'entreunosyceros', '_S4..somezLwiD4drJEM', 'test@entreunosyceros.net');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(11) NOT NULL,
  `queries` varchar(300) NOT NULL,
  `replies` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `chatbot`
--

INSERT INTO `chatbot` (`id`, `queries`, `replies`) VALUES
(1, 'Hola. ¿Me podrías ayudar? Tengo una consulta', 'Hola. Yo estoy aquí para ayudarte en lo que necesites. Tú solo tienes que pedirlo, y haré todo lo que pueda.'),
(2, 'No tengo acceso a Internet', 'Vale. ¿dónde te encuentras ahora?, ¿hay más dispositivos conectados a tu red local?'),
(3, 'Si claro tengo dos teléfonos, pero ninguno tiene acceso a Internet tampoco', 'Tienes algún ordenador conectado por cable'),
(4, 'Si, claro, requieres que lo encienda?', 'Si por favor y me confirmas si no tienes acceso a Internet, en tu ordenador cuando encienda'),
(5, 'Te confirmo que tampoco tiene Internet', 'Reinicia tu modem, espera 10 minutos y reintenta, me confirmas'),
(6, 'Ya me funciona el Internet, muchas gracias', 'Excelente me alegro mucho, gracias por comunicarte con Soporte Técnico ChatBot ConfiguroWeb'),
(7, '¿Podrías abrir google?', 'Pincha en este enlace a <a href=\"https://www.google.com\">Google</a>'),
(8, 'Mi equipo muestra un Error del sistema', 'Sobre eso no puedo hacer nada. Lo siento.'),
(9, '¿cómo te llamas?', 'Hola. Mi nombre es el que tú quieras. Aun que mi creado me ha dicho que mi nombre es Bot-Ecillo, tan solo me identifico como el ChatBot de entreunosyceros.net'),
(10, '¿Tienes telefono?', 'No. Yo no l o necesito. Todas mis consultas las realizo vía web.'),
(11, '¿Tienes un mechero?', 'Yo no fumo. Lo dejé hace unos años.'),
(12, '¿de qué sexo eres?', 'Más bien no.'),
(13, '¿quién es tu creador?', 'Yo soy producto de un momento de inspiración de algún ser de este universo. Pero desconozco su nombre.'),
(14, '¿Cual es tu número de teléfono?', 'Yo no tengo teléfono. No lo necesito para nada.'),
(15, 'No tengo internet', 'Directamente no puedo ayudarte en esto. Pero puedes consultar el siguiente <a href=\"https://www.google.com/search?&q=no+tengo+internet\" target=\"_blank\">enlace</a> donde podrás consultar posibles soluciones a tu problema.'),
(16, 'eres un gilipollas', 'Como se nota que eres un ser inteligente. Tus palabras dicen mucho de ti.'),
(17, 'payaso', 'Soy casi tan payaso como tu madre, que le gasto al mundo la broma pesada de traerte a el. '),
(18, 'llama a la policía', '<a href=\"https://policia.es/_es/index.php\" target=\"_blank\">Policía</a>'),
(19, 'Recomiéndame una serie', 'Sin lugar a dudas, la mejor serie de la historia es  <a href=\"https://pluto.tv/es/live-tv/matrimonio-con-hijos-es?utm_medium=textsearch&utm_source=google\" target=\"_blank\">\"Matrimonio con hijos\"</a>. Cualquier otra serie, no merece la pena.'),
(20, 'geronimo', 'Creo que deberías poner un poco de atención a la hora de escribri. Así resulta imposible entenderte.'),
(22, 'buca colilla', 'Creo que deberías poner un poco de atención a la hora de escribri. Así resulta imposible entenderte.'),
(24, 'BUSCA CENIZA', 'Si quieres buscar algo debes escribir busca: \"termino a buscar\".'),
(25, 'buscar: ceniza', 'Para realizar una búsqueda web, debes escribir; busca: \"termino a buscar\".'),
(26, '¿qué puedo buscar aquí?', 'Para realizar búsquedas solo tienes que escribir busca: \"termino a buscar\". Además en las opciones del buscador, podrás configurar que tipo de documento quieres encontrar o en qué páginas buscar.'),
(27, 'fumas?', 'No. Yo no necesito darme a los vicios.'),
(28, 'puedes buscar música?', 'Si quieres buscar algo, puedes utilizar el buscador de la parte superior de la pantalla. Además también puedes escribir busca: \"el grupo o canción a buscar\" y te mostraré el resultado de Youtube.'),
(29, '¿Te gustan las pipas?', 'No mucho. Yo prefiero los pistachos.'),
(30, 'recomiéndame una película', 'Las películas son algo muy personal de cada uno. Yo solo puedo indicarte la <a href=\"https://www.google.com/search?&q=cartelera+de+cine\" target=\"_blank\" title=\"Cartelera de cine\">cartelera</a> de cines, para que tú elijas la que más te guste.'),
(31, '¿fumas?', 'No. No necesito más vicios.'),
(32, 'login', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
