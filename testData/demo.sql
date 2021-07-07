-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Erstellungszeit: 06. Jul 2021 um 08:56
-- Server-Version: 8.0.25
-- PHP-Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `demo`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Answer`
--

CREATE TABLE `Answer` (
  `ansID` int NOT NULL,
  `Text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Iscorrect` tinyint(1) NOT NULL,
  `questionID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `Answer`
--

INSERT INTO `Answer` (`ansID`, `Text`, `Iscorrect`, `questionID`) VALUES
(1, 'Cause it is pretty', 0, 4),
(2, '8,849 meters', 1, 2),
(4, 'Very tall', 0, 5),
(6, 'Because it doubles as a hysteria controller', 0, 4),
(7, 'because it was designed that way by the creator', 1, 4),
(8, '8, 329 meters', 0, 2),
(9, '8, 900 meters', 0, 2),
(10, 'not very tall', 0, 5),
(11, 'taller than your mother', 1, 5),
(12, '4', 1, 8),
(13, '6', 0, 8),
(26, 'Antarctica', 1, 7),
(27, 'Africa', 0, 7),
(28, 'Asia', 0, 7),
(29, 'America', 0, 7);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Question`
--

CREATE TABLE `Question` (
  `Id` int NOT NULL,
  `Text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `Question`
--

INSERT INTO `Question` (`Id`, `Text`) VALUES
(2, 'How tall is Mount Everest'),
(4, 'Why is banana bent?'),
(5, 'How tall is Franco?'),
(7, 'Where is the lowest point on land located?'),
(8, 'How many wings does a bumblebee possess?');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `Answer`
--
ALTER TABLE `Answer`
  ADD PRIMARY KEY (`ansID`),
  ADD KEY `answer2_question` (`questionID`);

--
-- Indizes für die Tabelle `Question`
--
ALTER TABLE `Question`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `Answer`
--
ALTER TABLE `Answer`
  MODIFY `ansID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT für Tabelle `Question`
--
ALTER TABLE `Question`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `Answer`
--
ALTER TABLE `Answer`
  ADD CONSTRAINT `answer2_question` FOREIGN KEY (`questionID`) REFERENCES `Question` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
