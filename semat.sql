-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2021 a las 01:27:48
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `semat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `id_r` varchar(20) NOT NULL,
  `Res` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `user` varchar(30) NOT NULL,
  `pass` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nom`, `correo`, `user`, `pass`) VALUES
(4, 'EUge', 'eugenioand18@gmail.com', 'eugenioand18', '123'),
(5, 'euge', 'euge', '123', '123'),
(6, '1234', '1234', '1234', 'd404559f602eab6fd602'),
(7, '12345', 'ola', 'olas', '$2y$10$8MOip7jH83Aq7'),
(8, 'olass', 'olasa', 'ola', '$2y$10$m.8wMxdLiPX/T'),
(9, '12345', 'prueba', 'prueba', '$2y$10$4JjR7siGbXRcc'),
(10, 'Nombre final', 'prueba2', 'prueba2', '$2y$10$1BJSHltPOXwOe4ukeFjDYe/mo3hJI1N78Julh9xOXMmsdmZllCdd.'),
(11, 'prueba3', 'prueba3', 'prueba3', '$2y$10$qfnfWzPKQl.2qEEDjuicve1swA4qhnuNWqBZRyd6kit4Z08Yge6Ee'),
(12, 'Prueba Numero Cuatro', 'prueba4', 'prueba4', '$2y$10$KKBoosxO2j.j5VZ7p3GV3ectF5HRSfID27CxW.bxuE29GwY6fiPm.'),
(13, 'Prueba de nombre', 'prueba@mail.com', 'pruebausuario', '$2y$10$Iwt23B6K0u8oNTSZFxyhserqGuArx7XfzI8AMKoi.QKQK.JYzPJV2'),
(14, 'Nombre de usuario', 'usuario@mail.com', 'Usuario123', '$2y$10$tY5iWPohxw/YHfrpTOdR9efCGSXTt.i9s5InVL7WyFUQWebs2GcBy'),
(15, 'Nombre de usuario', 'usuario1@mail.com', 'usuario1234', '$2y$10$pD33x0abWy6GEphjlK.s/ObUkwjRRkQhsALrjHLbITMcHFXLrydf6'),
(16, 'Prueba Numero Cuatro', 'prueba4@mail.com', 'prueba44', '$2y$10$UYUdhmGBuTv9MqhEFk1VyOUbbJIDh8O0lBZ8EuEMrM4pDl0Wk8GwK'),
(17, 'Juan', 'juan@mail.com', 'juan123', '$2y$10$7wGMJwAzkEQ3rlSCdd739ugnW3fMR81sc6uNo09q844exxJ0Hlgf6'),
(18, 'Usuario', 'usuario2@mail.com', 'Usuario12333', '$2y$10$01rc8DQ3eb2qkuB1xud.Y.MebWzgWN33z/rabpuS.FYpFt3dlNqIm'),
(19, 'fdsfsdf', 'fghghfgh@mail.com', 'asdas', '$2y$10$ZldEBM.h00NKQGpJmEBCeem3zua37nYoiLk6jyIUrwbVaMPfq/j1u'),
(20, 'sadasda', 'asdasd@mail.com', 'dasd', '$2y$10$DF1K2OYuhP0iD06K2MdLxeJberJkqYjv3Z3lilIgdqqwIuP5qVW/e');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`id_r`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
