-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Erstellungszeit: 19. Jul 2021 um 13:08
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
(1, 'Cause it is pretty', 0, 2),
(2, '8,849 meters', 1, 1),
(4, 'Very tall', 0, 3),
(6, 'Because it doubles as a hysteria controller', 0, 2),
(7, 'because it was designed that way by the creator', 1, 2),
(8, '8, 329 meters', 0, 1),
(9, '8, 900 meters', 0, 1),
(10, 'not very tall', 0, 3),
(11, 'taller than your mother', 1, 3),
(12, '4', 1, 5),
(13, '6', 0, 5),
(26, 'Antarctica', 1, 4),
(27, 'Africa', 0, 4),
(28, 'Asia', 0, 4),
(29, 'America', 0, 4);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Introduction`
--

CREATE TABLE `Introduction` (
  `introID` int NOT NULL,
  `Title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nextAction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nextQuestionID` int NOT NULL,
  `quizID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `Introduction`
--

INSERT INTO `Introduction` (`introID`, `Title`, `Text`, `nextAction`, `nextQuestionID`, `quizID`) VALUES
(1, 'Average quiz for average people', 'Are you looking to kill some time and sharpen your memory? Come waste a bit of time with us; Perhaps you will enjoy it.', 'question.php', 1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Question`
--

CREATE TABLE `Question` (
  `quesID` int NOT NULL,
  `Text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quizID` int NOT NULL,
  `nextAction` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nextQuestionID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `Question`
--

INSERT INTO `Question` (`quesID`, `Text`, `quizID`, `nextAction`, `nextQuestionID`) VALUES
(1, 'How tall is Mount Everest', 1, 'question.php', 2),
(2, 'Why is banana bent?', 1, 'question.php', 3),
(3, 'How tall is Franco?', 1, 'question.php', 4),
(4, 'Where is the lowest point on land located?', 1, 'question.php', 5),
(5, 'How many wings does a bumblebee possess?', 1, 'report.php', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Quiz`
--

CREATE TABLE `Quiz` (
  `quizID` int NOT NULL,
  `Title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `Quiz`
--

INSERT INTO `Quiz` (`quizID`, `Title`) VALUES
(1, 'Quiz for Dummies');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Report`
--

CREATE TABLE `Report` (
  `repID` int NOT NULL,
  `Title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback_40` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback_60` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback_80` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quizID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `Report`
--

INSERT INTO `Report` (`repID`, `Title`, `Text`, `feedback_40`, `feedback_60`, `feedback_80`, `quizID`) VALUES
(1, 'Well done!', 'This is where you find out how clever you are.', 'You suck', 'Neither dumb nor smart', 'Einstein', 1);

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
-- Indizes für die Tabelle `Introduction`
--
ALTER TABLE `Introduction`
  ADD PRIMARY KEY (`introID`),
  ADD KEY `nextQuestionID` (`nextQuestionID`),
  ADD KEY `quizID` (`introID`),
  ADD KEY `nextQuestionID_2` (`nextQuestionID`);

--
-- Indizes für die Tabelle `Question`
--
ALTER TABLE `Question`
  ADD PRIMARY KEY (`quesID`),
  ADD KEY `quizID` (`quizID`);

--
-- Indizes für die Tabelle `Quiz`
--
ALTER TABLE `Quiz`
  ADD PRIMARY KEY (`quizID`);

--
-- Indizes für die Tabelle `Report`
--
ALTER TABLE `Report`
  ADD PRIMARY KEY (`repID`);
ALTER TABLE `Report` ADD FULLTEXT KEY `feedback_40` (`feedback_40`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `Answer`
--
ALTER TABLE `Answer`
  MODIFY `ansID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT für Tabelle `Introduction`
--
ALTER TABLE `Introduction`
  MODIFY `introID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `Question`
--
ALTER TABLE `Question`
  MODIFY `quesID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `Quiz`
--
ALTER TABLE `Quiz`
  MODIFY `quizID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `Report`
--
ALTER TABLE `Report`
  MODIFY `repID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `Introduction`
--
ALTER TABLE `Introduction`
  ADD CONSTRAINT `Introquiz-Quesquiz` FOREIGN KEY (`introID`) REFERENCES `Question` (`quizID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
