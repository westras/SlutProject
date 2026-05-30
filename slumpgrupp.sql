-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 30 maj 2026 kl 07:48
-- Serverversion: 10.4.32-MariaDB
-- PHP-version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `slumpgrupp`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `classes`
--

INSERT INTO `classes` (`id`, `user_id`, `class_name`) VALUES
(6, 4, 'JallaTest'),
(7, 5, 'AP'),
(31, 2, 'te23');

-- --------------------------------------------------------

--
-- Tabellstruktur `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `students`
--

INSERT INTO `students` (`id`, `class_id`, `name`) VALUES
(39, 6, 'gargamel'),
(40, 6, 'Jesus'),
(41, 6, 'Abraham'),
(42, 6, 'Niel'),
(43, 6, 'Colin'),
(44, 6, 'Larsson'),
(45, 6, 'Colin larsson'),
(46, 6, 'Colin andreas larsson'),
(49, 7, 'a'),
(50, 7, 'a'),
(51, 7, 'a'),
(52, 7, 'a'),
(53, 7, 'a'),
(54, 7, 'a'),
(55, 7, 'a'),
(56, 7, 'aa'),
(57, 7, 'a'),
(58, 7, 'a'),
(59, 7, 'a'),
(60, 7, 'a'),
(61, 7, 'a'),
(62, 7, 'a'),
(63, 7, 'a'),
(64, 7, 'a'),
(65, 7, 'a'),
(66, 7, 'a'),
(67, 7, 'a'),
(68, 7, 'a'),
(69, 7, 'aa'),
(70, 7, 'a'),
(71, 7, 'a'),
(72, 7, 'a'),
(73, 7, 'a'),
(74, 7, 'a'),
(75, 7, 'a'),
(76, 7, 'a'),
(77, 7, 'a'),
(78, 7, 'a'),
(79, 7, 'a'),
(80, 7, 'aa'),
(81, 7, 'a'),
(82, 7, 'a'),
(83, 7, 'a'),
(84, 7, 'a'),
(85, 7, 'a'),
(86, 7, 'a'),
(87, 7, 'a'),
(88, 7, 'a'),
(89, 7, 'a'),
(90, 7, 'a'),
(91, 7, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(92, 7, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(93, 7, 'a'),
(94, 7, 'a'),
(95, 7, 'a'),
(96, 7, 'a'),
(97, 7, 'a'),
(98, 7, 'a'),
(99, 7, 'a'),
(100, 7, 'a'),
(101, 7, 'a'),
(102, 7, 'a'),
(103, 7, 'a'),
(104, 7, 'a'),
(105, 7, 'a'),
(106, 7, 'a'),
(107, 7, 'a'),
(108, 7, 'a'),
(109, 7, 'a'),
(110, 7, 'a'),
(111, 7, 'a'),
(112, 7, 'a'),
(113, 7, 'a'),
(114, 7, 'a'),
(115, 7, 'a'),
(116, 7, 'a'),
(117, 7, 'a'),
(118, 7, 'a'),
(119, 7, 'a'),
(120, 7, 'a'),
(121, 7, 'a'),
(122, 7, 'a'),
(123, 7, 'a'),
(124, 7, 'a'),
(125, 7, 'a'),
(126, 7, 'a'),
(127, 7, 'a'),
(128, 7, 'a'),
(129, 7, 'a'),
(130, 7, 'a'),
(131, 7, 'a'),
(132, 7, 'a'),
(133, 7, 'a'),
(134, 7, 'a'),
(135, 7, 'a'),
(136, 7, '67'),
(137, 7, '67'),
(138, 7, '67'),
(139, 7, '67'),
(140, 7, '67'),
(141, 7, '67'),
(142, 7, '67'),
(143, 7, '67'),
(144, 7, '67'),
(145, 7, '67'),
(146, 7, '67'),
(147, 7, '67'),
(148, 7, '67'),
(149, 7, '67'),
(150, 7, '67'),
(151, 7, '67'),
(152, 7, '67'),
(153, 7, '67'),
(154, 7, '67'),
(186, 31, 'Rasmus'),
(187, 31, 'Erik'),
(188, 31, 'Hampu'),
(189, 31, 'e');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'root@localhost', '*E6CC90B878B948C35E92B003C792C46C58C4AF40'),
(2, 'teacher1', '1234'),
(3, 'teacher2', '1234'),
(4, 'teacher3', '1234'),
(5, 'teacher4', '1234');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT för tabell `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
