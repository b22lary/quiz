-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 14. Jun 2023 um 09:18
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `quiz`
CREATE DATABASE quiz;
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `quizdaten`
--

CREATE TABLE quiz.`quizdaten` (
  `benutzername` varchar(50) NOT NULL,
  `frage1` tinyint(1) DEFAULT NULL,
  `frage2` tinyint(1) DEFAULT NULL,
  `frage3` tinyint(1) DEFAULT NULL,
  `frage4` tinyint(1) DEFAULT NULL,
  `frage5` tinyint(1) DEFAULT NULL,
  `frage6` tinyint(1) DEFAULT NULL,
  `frage7` tinyint(1) DEFAULT NULL,
  `frage8` tinyint(1) DEFAULT NULL,
  `endergebnis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `quizdaten`
--

INSERT INTO quiz.`quizdaten` (`benutzername`, `frage1`, `frage2`, `frage3`, `frage4`, `frage5`, `frage6`, `frage7`, `frage8`, `endergebnis`) VALUES
('Barbara', 1, 1, 1, 1, 1, 1, 1, 1, 8),
('Luca', 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Susanne', 1, 1, 1, 1, 0, 0, 0, 0, 4);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `quizdaten`
--
ALTER TABLE quiz.`quizdaten`
  ADD PRIMARY KEY (`benutzername`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
