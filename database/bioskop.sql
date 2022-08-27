-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2022 at 04:59 PM
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
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `naziv` varchar(45) DEFAULT NULL,
  `zanr` varchar(45) DEFAULT NULL,
  `trajanje` int(11) DEFAULT NULL,
  `ocjena` double DEFAULT NULL,
  `slika` text DEFAULT NULL,
  `opis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gledalac`
--

CREATE TABLE `gledalac` (
  `id` int(11) NOT NULL,
  `ime` varchar(45) DEFAULT NULL,
  `prezime` varchar(45) DEFAULT NULL,
  `datum_rodjenja` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gledalac_rezervacija`
--

CREATE TABLE `gledalac_rezervacija` (
  `id` int(11) NOT NULL,
  `gledalac_id` int(11) NOT NULL DEFAULT 0,
  `rezervacija_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `karta`
--

CREATE TABLE `karta` (
  `id` int(11) NOT NULL,
  `cijena` int(11) DEFAULT NULL,
  `nacin_placanja` varchar(25) DEFAULT NULL,
  `sala_id` int(11) DEFAULT NULL,
  `film_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `projekcija_filma`
--

CREATE TABLE `projekcija_filma` (
  `id` int(11) NOT NULL,
  `datum` date DEFAULT NULL,
  `vrijeme_projekcije` time DEFAULT NULL,
  `karta_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

CREATE TABLE `rezervacija` (
  `id` int(11) NOT NULL,
  `broj_karata` int(11) DEFAULT NULL,
  `nacin_placanja` text DEFAULT NULL,
  `projekcija_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sala`
--

CREATE TABLE `sala` (
  `id` int(11) NOT NULL,
  `naziv` varchar(50) DEFAULT NULL,
  `broj_mjesta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sala`
--

INSERT INTO `sala` (`id`, `naziv`, `broj_mjesta`) VALUES
(1, 'Sala1', NULL),
(5, 'Sala2', NULL);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `gledalac_rezervacija`
--
ALTER TABLE `gledalac_rezervacija`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gledalac_fk` (`gledalac_id`),
  ADD KEY `rezervacija_fk` (`rezervacija_id`);

--
-- Indexes for table `karta`
--
ALTER TABLE `karta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `karta_sjediste_fk` (`sala_id`) USING BTREE,
  ADD KEY `karta_film_fk` (`film_id`);

--
-- Indexes for table `projekcija_filma`
--
ALTER TABLE `projekcija_filma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projekcija_sala_fk` (`karta_id`) USING BTREE;

--
-- Indexes for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rezervacija_projekcija_fk` (`projekcija_id`);

--
-- Indexes for table `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

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
-- AUTO_INCREMENT for table `gledalac_rezervacija`
--
ALTER TABLE `gledalac_rezervacija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `karta`
--
ALTER TABLE `karta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projekcija_filma`
--
ALTER TABLE `projekcija_filma`
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
-- Constraints for dumped tables
--

--
-- Constraints for table `gledalac_rezervacija`
--
ALTER TABLE `gledalac_rezervacija`
  ADD CONSTRAINT `gledalac_fk` FOREIGN KEY (`gledalac_id`) REFERENCES `gledalac` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rezervacija_fk` FOREIGN KEY (`rezervacija_id`) REFERENCES `rezervacija` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `karta`
--
ALTER TABLE `karta`
  ADD CONSTRAINT `karta_film_fk` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `karta_sala_fk` FOREIGN KEY (`sala_id`) REFERENCES `sala` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `projekcija_filma`
--
ALTER TABLE `projekcija_filma`
  ADD CONSTRAINT `projekcija_karta_fk` FOREIGN KEY (`karta_id`) REFERENCES `karta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD CONSTRAINT `rezervacija_projekcija_fk` FOREIGN KEY (`projekcija_id`) REFERENCES `projekcija_filma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
