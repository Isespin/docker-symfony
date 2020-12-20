-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2020 a las 14:49:19
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `symfonytest`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `administrador` tinyint(1) NOT NULL,
  `lector` tinyint(1) NOT NULL,
  `cliente` tinyint(1) NOT NULL,
  `redactor` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `administrador`, `lector`, `cliente`, `redactor`) VALUES
(5, 'admin', '[]', '$argon2id$v=19$m=65536,t=4,p=1$MHhBdGlobW1DSzN5c3UveQ$httd9aAXBS56U3uqPe2E+r0aAGccoQOlFflP+Hr0Kh4', 1, 0, 0, 0),
(6, 'lector', '[]', '$argon2id$v=19$m=65536,t=4,p=1$dEt1ZzhtR1BHMFpKTzB4eg$DVhRT1p5iOj0mildiPkOYZRqLOUBk1MaXlrfECfpuFs', 0, 1, 0, 0),
(7, 'cliente', '[]', '$argon2id$v=19$m=65536,t=4,p=1$UVNSblE5VHRERzJ6UWhPSg$fuh6r3uuZXtWNpNwlFu1T+jsS+v0DBdh99rG0vklHpQ', 0, 0, 1, 0),
(8, 'redactor', '[]', '$argon2id$v=19$m=65536,t=4,p=1$NWpwMGlxNVJzSDcxVkFYeA$+kgt8DOOfQ4WTviMgfXIuO4Cr1nekuHSPY6zHsrIiCM', 0, 0, 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
