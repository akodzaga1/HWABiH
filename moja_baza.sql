-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2017 at 10:32 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moja_baza`
--

-- --------------------------------------------------------

--
-- Table structure for table `autizam`
--

CREATE TABLE `autizam` (
  `ID` int(11) NOT NULL,
  `prezime` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `ime` varchar(20) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `autizam`
--

INSERT INTO `autizam` (`ID`, `prezime`, `ime`) VALUES
(92, 'Klapuh', 'Amer'),
(91, 'Bakija', 'Benjamin'),
(90, 'Tiro', 'Hana'),
(89, 'Selimovic', 'Merima'),
(88, 'Seferagic', 'Raisa'),
(87, 'Cengic', 'Lejla'),
(86, 'Grbo', 'Hajrija'),
(85, 'Ahatovic', 'Emira'),
(84, 'Kodzaga', 'Amna'),
(83, 'Cengic', 'Faris'),
(82, 'Barucija', 'Haris'),
(81, 'Ganovic', 'Dzenan'),
(80, 'Pasovic', 'Nedim'),
(79, 'Hasovic', 'Nedim'),
(78, 'Skopljak', 'Lejla'),
(77, 'Gafic', 'Ada'),
(76, 'Zuko', 'Lejla'),
(75, 'Colpa', 'Lamija'),
(74, 'Karisik', 'Amra'),
(73, 'Babic', 'Alma'),
(72, 'Masic', 'Davor'),
(71, 'Loncarevic', 'Faris'),
(70, 'Celik', 'Samra'),
(69, 'Avdic', 'Amila'),
(68, 'Karacic', 'Alma'),
(67, 'Ahmespahic', 'Anela'),
(66, 'Serdarevic', 'Mensur'),
(65, 'Pesto', 'Nihad'),
(64, 'Jasarevic', 'Hedija'),
(63, 'Hadzic', 'Dijana'),
(62, 'Muratovic', 'Emina'),
(61, 'Mehmedovic', 'Ajla'),
(60, 'Alibasic', 'Emira'),
(59, 'Dommar', 'Avina'),
(58, 'Basic', 'Majda'),
(57, 'Aljukic', 'Amina'),
(56, 'Lika', 'Esma'),
(55, 'Gackic', 'Emir'),
(54, 'Gajic', 'Tijana'),
(53, 'Kodzaga', 'Amer'),
(93, 'Karic', 'Mirza'),
(94, 'Ibrahimovic', 'Kenan'),
(95, 'Mioc', 'Andi'),
(96, 'Begic', 'Amina'),
(97, 'Maglajlija', 'Amila'),
(98, 'Selimovic', 'Edna'),
(99, 'Basic', 'Naida'),
(100, 'Sultanic', 'Amra'),
(101, 'Prevljak', 'Amra'),
(102, 'Omerovic', 'Lejla'),
(103, 'Sahadzic', 'Emir'),
(104, 'Ibrahimovic', 'Azra'),
(105, 'Milosevic', 'Milos');

-- --------------------------------------------------------

--
-- Table structure for table `gradovi`
--

CREATE TABLE `gradovi` (
  `ID` int(11) NOT NULL,
  `naziv` varchar(50) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `gradovi`
--

INSERT INTO `gradovi` (`ID`, `naziv`) VALUES
(1, 'Sarajevo'),
(2, 'Tuzla');

-- --------------------------------------------------------

--
-- Table structure for table `ugrozeni`
--

CREATE TABLE `ugrozeni` (
  `ID` int(11) NOT NULL,
  `prezime` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `broj_clanova` int(11) NOT NULL,
  `uslovi` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `adresa` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `fotografija` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `grad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `ugrozeni`
--

INSERT INTO `ugrozeni` (`ID`, `prezime`, `broj_clanova`, `uslovi`, `adresa`, `fotografija`, `grad`) VALUES
(20, 'Mujic', 5, 'lose', 'Spasilacka 17', 'Mujic.jpg', 2),
(21, 'Spahic', 3, 'lose', 'Zambijska 79', 'Spahic.jpg', 2),
(22, 'Kadric', 1, 'lose', 'Sinana Sakica 33', 'Kadric.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `volonteri`
--

CREATE TABLE `volonteri` (
  `ID` int(11) NOT NULL,
  `prezime` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `ime` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `datum_rodjenja` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `adresa` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `fotografija` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `grad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `volonteri`
--

INSERT INTO `volonteri` (`ID`, `prezime`, `ime`, `datum_rodjenja`, `adresa`, `fotografija`, `grad`) VALUES
(555, 'Klapuh', 'Amer', '1995-04-26', 'Grbavicka 8', 'Klapuh.jpg', 1),
(556, 'Karic', 'Mirza', '1995-04-21', 'Dzemala Bijedica 19', 'Karic.jpg', 1),
(557, 'Ibrahimovic', 'Kenan', '1995-08-06', 'Bistrik basamaci 21', 'Ibrahimovic.jpg', 1),
(558, 'Gackic', 'Emir', '1971-08-08', 'Kosevo 5', 'Gackic.jpg', 1),
(559, 'Aljukic', 'Amina', '1994-08-18', 'Trg prijateljstva 99', 'Aljukic.jpg', 1),
(560, 'Serdarevic', 'Mensur', '1988-05-05', 'Tuzlanska 62', 'Serdarevic.jpg', 1),
(561, 'Ahmespahic', 'Anela', '1994-10-26', 'Grbavicka 59', 'Ahmespahic.jpg', 1),
(562, 'Avdic', 'Amila', '1994-11-05', 'Topal Osman Pase 10', 'Avdic.jpg', 1),
(563, 'Babic', 'Alma', '1999-05-05', 'Carsijska 17', 'Babic.jpg', 1),
(564, 'Zuko', 'Lejla', '1995-11-01', 'Hotonj 75', 'Zuko.jpg', 1),
(565, 'Pasovic', 'Nedim', '1994-09-26', 'Hrasno brdo 153', 'Pasovic.jpg', 1),
(566, 'Zvrkic', 'Zvrk', '1982-09-09', 'Trg zvrkova 100', 'Zvrk.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autizam`
--
ALTER TABLE `autizam`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `gradovi`
--
ALTER TABLE `gradovi`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ugrozeni`
--
ALTER TABLE `ugrozeni`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `grad` (`grad`);

--
-- Indexes for table `volonteri`
--
ALTER TABLE `volonteri`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `grad` (`grad`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autizam`
--
ALTER TABLE `autizam`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT for table `gradovi`
--
ALTER TABLE `gradovi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ugrozeni`
--
ALTER TABLE `ugrozeni`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `volonteri`
--
ALTER TABLE `volonteri`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=567;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ugrozeni`
--
ALTER TABLE `ugrozeni`
  ADD CONSTRAINT `ugrozeni_ibfk_1` FOREIGN KEY (`grad`) REFERENCES `gradovi` (`ID`);

--
-- Constraints for table `volonteri`
--
ALTER TABLE `volonteri`
  ADD CONSTRAINT `volonteri_ibfk_1` FOREIGN KEY (`grad`) REFERENCES `gradovi` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
