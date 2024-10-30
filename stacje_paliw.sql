-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Paź 30, 2024 at 10:08 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stacja`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stacje paliw`
--

CREATE TABLE `stacje paliw` (
  `id` bigint(11) NOT NULL,
  `nazwa` varchar(50) NOT NULL,
  `adres` bigint(20) NOT NULL,
  `cena_paliw` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stacje paliw`
--

INSERT INTO `stacje paliw` (`id`, `nazwa`, `adres`, `cena_paliw`) VALUES
(14, 'circle', 4, 7.00),
(15, 'circle', 2, 7.00),
(16, 'Lotos', 5, 6.10),
(17, 'Moya', 1, 5.90);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `stacje paliw`
--
ALTER TABLE `stacje paliw`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_adresy` (`adres`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stacje paliw`
--
ALTER TABLE `stacje paliw`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stacje paliw`
--
ALTER TABLE `stacje paliw`
  ADD CONSTRAINT `fk_adresy` FOREIGN KEY (`adres`) REFERENCES `adresy` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
