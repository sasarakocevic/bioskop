-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2022 at 11:35 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bioskop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pass` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ime` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prezime` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefon` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datum_kreiranja` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bioskop`
--

CREATE TABLE `bioskop` (
  `id` int(11) NOT NULL,
  `naziv` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bioskop_sale` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `naziv` varchar(45) DEFAULT NULL,
  `zanr` varchar(45) DEFAULT NULL,
  `trajanje` datetime DEFAULT NULL,
  `datum_izlaska` datetime DEFAULT NULL,
  `slika` varchar(512) DEFAULT NULL,
  `opis` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gledalac`
--

CREATE TABLE `gledalac` (
  `id` int(11) NOT NULL,
  `username` varchar(64) DEFAULT NULL,
  `pass` varchar(64) DEFAULT NULL,
  `ime` varchar(64) DEFAULT NULL,
  `prezime` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `telefon` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `placanje`
--

CREATE TABLE `placanje` (
  `id` int(11) NOT NULL,
  `iznos` double UNSIGNED DEFAULT NULL,
  `vrijeme` datetime DEFAULT NULL,
  `kupon` int(11) DEFAULT NULL,
  `nacin_placanja` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rezervacija_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projekcija`
--

CREATE TABLE `projekcija` (
  `id` int(11) NOT NULL,
  `datum` date DEFAULT NULL,
  `pocetak` datetime DEFAULT NULL,
  `kraj` datetime DEFAULT NULL,
  `film_id` int(11) DEFAULT NULL,
  `sala_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `projekcija_sjediste`
--

CREATE TABLE `projekcija_sjediste` (
  `id` int(11) NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cijena` double DEFAULT NULL,
  `sjediste_id` int(11) DEFAULT NULL,
  `projekcija_id` int(11) DEFAULT NULL,
  `rezervacija_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

CREATE TABLE `rezervacija` (
  `id` int(11) NOT NULL,
  `broj_sjedista` int(64) DEFAULT NULL,
  `vrijeme` datetime DEFAULT NULL,
  `status` enum('Y','N') DEFAULT NULL,
  `gledalac_id` int(11) DEFAULT NULL,
  `projekcija_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sala`
--

CREATE TABLE `sala` (
  `id` int(11) NOT NULL,
  `naziv` varchar(64) DEFAULT NULL,
  `broj_mjesta` int(64) DEFAULT NULL,
  `bioskop_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sala`
--

INSERT INTO `sala` (`id`, `naziv`, `broj_mjesta`, `bioskop_id`) VALUES
(1, 'Sala1', NULL, NULL),
(5, 'Sala2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sjediste`
--

CREATE TABLE `sjediste` (
  `id` int(11) NOT NULL,
  `broj_sjedista` int(11) DEFAULT 0,
  `tip_sjedista` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sala_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bioskop`
--
ALTER TABLE `bioskop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gledalac`
--
ALTER TABLE `gledalac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `placanje`
--
ALTER TABLE `placanje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `placanje_rezervacija_fk` (`rezervacija_id`);

--
-- Indexes for table `projekcija`
--
ALTER TABLE `projekcija`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projekcija_film_fk` (`film_id`),
  ADD KEY `projekcija_sala_fk` (`sala_id`);

--
-- Indexes for table `projekcija_sjediste`
--
ALTER TABLE `projekcija_sjediste`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projekcija_sjediste_fk` (`sjediste_id`),
  ADD KEY `projekcija_fk` (`projekcija_id`),
  ADD KEY `projekcija_rezervacija_fk` (`rezervacija_id`);

--
-- Indexes for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rezervacija_gledalac_fk` (`gledalac_id`),
  ADD KEY `rezervacija_projekcija_fk` (`projekcija_id`);

--
-- Indexes for table `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sala_bioskop_fk` (`bioskop_id`);

--
-- Indexes for table `sjediste`
--
ALTER TABLE `sjediste`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sjediste_sala_fk` (`sala_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bioskop`
--
ALTER TABLE `bioskop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gledalac`
--
ALTER TABLE `gledalac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `placanje`
--
ALTER TABLE `placanje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projekcija`
--
ALTER TABLE `projekcija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projekcija_sjediste`
--
ALTER TABLE `projekcija_sjediste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rezervacija`
--
ALTER TABLE `rezervacija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sala`
--
ALTER TABLE `sala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sjediste`
--
ALTER TABLE `sjediste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `placanje`
--
ALTER TABLE `placanje`
  ADD CONSTRAINT `placanje_rezervacija_fk` FOREIGN KEY (`rezervacija_id`) REFERENCES `rezervacija` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `projekcija`
--
ALTER TABLE `projekcija`
  ADD CONSTRAINT `projekcija_film_fk` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `projekcija_sala_fk` FOREIGN KEY (`sala_id`) REFERENCES `sala` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `projekcija_sjediste`
--
ALTER TABLE `projekcija_sjediste`
  ADD CONSTRAINT `projekcija_fk` FOREIGN KEY (`projekcija_id`) REFERENCES `projekcija` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `projekcija_rezervacija_fk` FOREIGN KEY (`rezervacija_id`) REFERENCES `rezervacija` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `projekcija_sjediste_fk` FOREIGN KEY (`sjediste_id`) REFERENCES `sjediste` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD CONSTRAINT `rezervacija_gledalac_fk` FOREIGN KEY (`gledalac_id`) REFERENCES `gledalac` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rezervacija_projekcija_fk` FOREIGN KEY (`projekcija_id`) REFERENCES `projekcija` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sala`
--
ALTER TABLE `sala`
  ADD CONSTRAINT `sala_bioskop_fk` FOREIGN KEY (`bioskop_id`) REFERENCES `bioskop` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sjediste`
--
ALTER TABLE `sjediste`
  ADD CONSTRAINT `sjediste_sala_fk` FOREIGN KEY (`sala_id`) REFERENCES `sala` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
