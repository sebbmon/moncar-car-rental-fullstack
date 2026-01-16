-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 16 Sty 2026, 13:03
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `projektup`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `image` varchar(50) NOT NULL,
  `catch_phrase` varchar(50) DEFAULT NULL,
  `horsepower` int(11) DEFAULT NULL,
  `petrol` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `year_of_production` varchar(4) DEFAULT NULL,
  `hero` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `cars`
--

INSERT INTO `cars` (`id`, `name`, `image`, `catch_phrase`, `horsepower`, `petrol`, `price`, `year_of_production`, `hero`) VALUES
(1, 'Nissan Skyline', 'static/images/skyline.jpg', '276 Koni prosto z Japonii', 276, 12, 1099, '1997', 0),
(2, 'Golf R', 'static/images/golfr.jpg', 'Niemiecka precyzja', 280, 11, 700, '2020', 0),
(3, 'Lamborghini Urus', 'static/images/urus.jpg', 'Włoska ekskluzywność', 650, 18, 2400, '2022', 0),
(4, 'Mercedes-Benz AMG GT', 'static/images/amggt.jpg', 'Luksusowa elegancja', 640, 14, 2200, '2019', 1),
(5, 'Bentley Continental ', 'static/images/continental.jpg', 'Najwyższy poziom luksusu', 635, 22, 4500, '2019', 0),
(6, 'BMW M2 Competition', 'static/images/m2.jpg', 'Niezwykła wydajność', 410, 12, 1800, '2019', 0),
(7, 'Fiat 126p', 'static/images/fiat126p.jpg', 'Nostalgiczny, kultowy fiat', 24, 6, 300, '1993', 0),
(8, 'Fiat Multipla', 'static/images/multipla.jpg', 'Przestronny, wygodny Fiat Multipla', 103, 8, 400, '2001', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `counter`
--

CREATE TABLE `counter` (
  `id` int(11) NOT NULL,
  `count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `counter`
--

INSERT INTO `counter` (`id`, `count`) VALUES
(1, 1346);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `messages`
--

CREATE TABLE `messages` (
  `ID` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `messages`
--

INSERT INTO `messages` (`ID`, `email`, `message`) VALUES
(1, 'test@gmail.com', 'Wiadomość'),
(2, 'TEST@GMAIL.COM', 'TEST ZAPISU');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `opinions`
--

CREATE TABLE `opinions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `stars` int(11) DEFAULT NULL,
  `opinion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `opinions`
--

INSERT INTO `opinions` (`id`, `user_id`, `stars`, `opinion`) VALUES
(1, 1, 4, 'Świetna wypożyczalnia samochodowa'),
(2, 1, 3, 'Średnia wypożyczalnia'),
(3, 1, 5, 'Super jest'),
(4, 1, 4, 'OK'),
(12, 1, 5, 'Polecam każdemu!'),
(13, 1, 5, 'Polecam i pozdrawiam');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'jakub', '$2y$10$.Wp2YrtHCzda8SqJ2y0xEusiM/vnu1xM0OpI/myOgxlIVRebs9q1y'),
(4, 'sebastian', '$2y$10$5cvCwghP9VhVkg1hK7zipuC4v5vIYnzp0HKkP6TZRsb/e0ocAD5Jy'),
(5, 'seba', 'seba'),
(7, 'sebb', '$2y$10$lvTTjUvYCw/dxIqcJMlbEOnp7r3PXqCptRMXFHr6RhjAlsL3MMdh.'),
(8, 'seba1', '$2y$10$nKiRBOvBdkuYUX15P4Hhu.dJKlQOvj2HAlJt6zj2oRwqrOLS88wty'),
(9, 'aaaaaaa', '$2y$10$18K67K2kJ4JKq/8owgr6he.2z8IbzdSXx1TWggR2.W4ILUToY3RLy'),
(10, 'pow123', '$2y$10$CgM1tMsmBPC9vg9.UAr6dujKGs4CxmIFDKjrppH3F/JSCdP0BK7oG'),
(11, 'pow1234', '$2y$10$U77Qq4dTUeesZJawrhEifePUzVUd..5oF9nXmWc71WjBHL.itSE3i');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `opinions`
--
ALTER TABLE `opinions`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `opinions`
--
ALTER TABLE `opinions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
