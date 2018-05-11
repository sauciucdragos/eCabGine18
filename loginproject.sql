-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 11, 2018 at 08:18 AM
-- Server version: 5.7.21
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabinet`
--

DROP TABLE IF EXISTS `cabinet`;
CREATE TABLE IF NOT EXISTS `cabinet` (
  `id_cabinet` int(4) NOT NULL AUTO_INCREMENT,
  `nume_cab` varchar(30) COLLATE utf8_bin NOT NULL,
  `logo` varchar(30) COLLATE utf8_bin NOT NULL,
  `adresa` varchar(30) COLLATE utf8_bin NOT NULL,
  `id_fisa` int(4) NOT NULL,
  PRIMARY KEY (`id_cabinet`),
  KEY `id_fisa` (`id_fisa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cabinet`
--

INSERT INTO `cabinet` (`id_cabinet`, `nume_cab`, `logo`, `adresa`, `id_fisa`) VALUES
(1, 'cab1', 'logo cab1', 'adresa  cab1 , nr100, cluj', 1),
(2, 'cab2', 'logo cab2', 'adresa cab2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `examinare`
--

DROP TABLE IF EXISTS `examinare`;
CREATE TABLE IF NOT EXISTS `examinare` (
  `id_examinare` int(4) NOT NULL AUTO_INCREMENT,
  `id_cabinet` int(4) NOT NULL,
  `id_fisa` int(4) NOT NULL,
  `data` date NOT NULL,
  `denumire_analiza` varchar(20) COLLATE utf8_bin NOT NULL,
  `fisier` text COLLATE utf8_bin NOT NULL,
  `pret` double(6,2) NOT NULL,
  PRIMARY KEY (`id_examinare`),
  KEY `id_fisa` (`id_fisa`),
  KEY `denumire_analiza` (`denumire_analiza`),
  KEY `id_cabinet` (`id_cabinet`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `examinare`
--

INSERT INTO `examinare` (`id_examinare`, `id_cabinet`, `id_fisa`, `data`, `denumire_analiza`, `fisier`, `pret`) VALUES
(1, 1, 1, '2018-04-01', 'analiza 1', 'fisier 1 \r\n- treb schimbat  pt, incarcare', 25.55),
(2, 2, 2, '2018-02-15', 'analiza 2', 'fisier  2  de incarcat  - pdf  si  img\r\n( aici treb schimbat ceva) ', 100.45);

-- --------------------------------------------------------

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE IF NOT EXISTS `factura` (
  `id_factura` int(4) NOT NULL AUTO_INCREMENT,
  `nr_factura` int(20) NOT NULL,
  `data` datetime NOT NULL,
  `id_pacient` int(4) NOT NULL,
  `id_cabinet` int(4) NOT NULL,
  `id_examinare` int(4) NOT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `id_pacient` (`id_pacient`),
  KEY `id_cabinet` (`id_cabinet`),
  KEY `id_examinare` (`id_examinare`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `factura`
--

INSERT INTO `factura` (`id_factura`, `nr_factura`, `data`, `id_pacient`, `id_cabinet`, `id_examinare`) VALUES
(1, 123456, '2018-05-11 10:45:00', 1, 1, 1),
(2, 45678, '2018-05-10 11:14:00', 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `fisa_consult`
--

DROP TABLE IF EXISTS `fisa_consult`;
CREATE TABLE IF NOT EXISTS `fisa_consult` (
  `id_fisa` int(4) NOT NULL AUTO_INCREMENT,
  `id_pacient` int(4) NOT NULL,
  `antec_pers_fiz` text COLLATE utf8_bin NOT NULL,
  `ultima_mens` text COLLATE utf8_bin NOT NULL,
  `climax` varchar(30) COLLATE utf8_bin NOT NULL,
  `ciclu_mens` text COLLATE utf8_bin NOT NULL,
  `nasteri` text COLLATE utf8_bin NOT NULL,
  `avorturi` text COLLATE utf8_bin NOT NULL,
  `antec_pers` text COLLATE utf8_bin NOT NULL,
  `motiv_consult` text COLLATE utf8_bin NOT NULL,
  `observatii` text COLLATE utf8_bin NOT NULL,
  `diagnostic` text COLLATE utf8_bin NOT NULL,
  `recomandari` text COLLATE utf8_bin NOT NULL,
  `tratament` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_fisa`),
  KEY `id_pacient` (`id_pacient`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `fisa_consult`
--

INSERT INTO `fisa_consult` (`id_fisa`, `id_pacient`, `antec_pers_fiz`, `ultima_mens`, `climax`, `ciclu_mens`, `nasteri`, `avorturi`, `antec_pers`, `motiv_consult`, `observatii`, `diagnostic`, `recomandari`, `tratament`) VALUES
(1, 1, 'atecedente  1  vechi, dureri , etc;', 'cred ca treb data -aici - \r\n data mens1', 'aici treb checkbox1', ' aici treb textare1\r\n  data ( 10-08-1900)ciclu 1 ', 'aici textare2   , nastere 1', 'aici textare 3, textare; - avort1 ', 'aici textare1- antecedente1', '  motiv 1 consult- textare2, textare 2', '  observatii 1   textare3', '  diagnostic 1 textare4', 'recomand 1 textare 5', 'tratament 1 - textare  6'),
(2, 2, 'antecedente 2 vechi, dureri mari', '25-02-2018', 'checkbox 2  ??', 'data 2', ' da  2', 'nu ', 'antecedente 2', 'motiv consult 2 ', 'observatii 2 ', 'diagnostic 2 ', 'recomandare 2', 'tratament  2');

-- --------------------------------------------------------

--
-- Table structure for table `incasare`
--

DROP TABLE IF EXISTS `incasare`;
CREATE TABLE IF NOT EXISTS `incasare` (
  `id_incasare` int(4) NOT NULL AUTO_INCREMENT,
  `id_factura` int(4) NOT NULL,
  `data` datetime NOT NULL,
  `suma` double(6,2) NOT NULL,
  PRIMARY KEY (`id_incasare`),
  KEY `id_factura` (`id_factura`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `incasare`
--

INSERT INTO `incasare` (`id_incasare`, `id_factura`, `data`, `suma`) VALUES
(1, 1, '2018-05-11 11:00:00', 25.55),
(2, 2, '2018-05-11 11:32:00', 100.45);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id_utilizator` int(4) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) COLLATE utf8_bin NOT NULL,
  `nume` varchar(30) COLLATE utf8_bin NOT NULL,
  `prenume` varchar(30) COLLATE utf8_bin NOT NULL,
  `parola` varchar(30) COLLATE utf8_bin NOT NULL,
  `functia` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_utilizator`),
  KEY `user` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_utilizator`, `user`, `nume`, `prenume`, `parola`, `functia`) VALUES
(1, 'admin1', 'pop', 'ioana', '1234', 'doc 1'),
(2, 'admin2', 'ionescu', 'alina', 'alina2', 'doc 2');

-- --------------------------------------------------------

--
-- Table structure for table `pacienti`
--

DROP TABLE IF EXISTS `pacienti`;
CREATE TABLE IF NOT EXISTS `pacienti` (
  `id_pacient` int(4) NOT NULL AUTO_INCREMENT,
  `nr_pacient` int(4) NOT NULL,
  `id_utilizator` int(4) NOT NULL,
  `nume` varchar(30) COLLATE utf8_bin NOT NULL,
  `prenume` varchar(30) COLLATE utf8_bin NOT NULL,
  `data_nasterii` date NOT NULL,
  `judet` varchar(30) COLLATE utf8_bin NOT NULL,
  `localitate` varchar(30) COLLATE utf8_bin NOT NULL,
  `adresa` varchar(30) COLLATE utf8_bin NOT NULL,
  `ocupatia` varchar(30) COLLATE utf8_bin NOT NULL,
  `loc_munca` varchar(30) COLLATE utf8_bin NOT NULL,
  `telefon` varchar(30) COLLATE utf8_bin NOT NULL,
  `email` varchar(30) COLLATE utf8_bin NOT NULL,
  `CNP` bigint(13) NOT NULL,
  `stare_civila` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_pacient`),
  KEY `nume` (`nume`),
  KEY `id_utilizator` (`id_utilizator`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `pacienti`
--

INSERT INTO `pacienti` (`id_pacient`, `nr_pacient`, `id_utilizator`, `nume`, `prenume`, `data_nasterii`, `judet`, `localitate`, `adresa`, `ocupatia`, `loc_munca`, `telefon`, `email`, `CNP`, `stare_civila`) VALUES
(1, 11, 1, 'pacient1', 'prenPac1', '2018-04-02', 'cluj', 'cluj-napoca', 'adresa1    nr.1', 'ocupatia1', 'loc munca1, loc 1', '0744009988', 'email1@yahoo.com', 1234567890123456, 'casatorit'),
(2, 12, 2, 'pac 2', 'prenume pac 2', '1960-04-10', 'judet2', 'loc2', 'adresa 2, nr 2 ', 'ocupatie 2', 'loc munca 2', '1234567890', 'email2@yahoo.com', 9876543210123, 'necasat');

-- --------------------------------------------------------

--
-- Table structure for table `scrisoare_medicala`
--

DROP TABLE IF EXISTS `scrisoare_medicala`;
CREATE TABLE IF NOT EXISTS `scrisoare_medicala` (
  `id_scrisoare` int(4) NOT NULL AUTO_INCREMENT,
  `id_examinare` int(4) NOT NULL,
  `id_fisa` int(4) NOT NULL,
  PRIMARY KEY (`id_scrisoare`),
  KEY `id_fisa` (`id_fisa`),
  KEY `id_examinare` (`id_examinare`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `scrisoare_medicala`
--

INSERT INTO `scrisoare_medicala` (`id_scrisoare`, `id_examinare`, `id_fisa`) VALUES
(1, 1, 1),
(2, 2, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cabinet`
--
ALTER TABLE `cabinet`
  ADD CONSTRAINT `cabinet_ibfk_2` FOREIGN KEY (`id_fisa`) REFERENCES `fisa_consult` (`id_fisa`);

--
-- Constraints for table `examinare`
--
ALTER TABLE `examinare`
  ADD CONSTRAINT `examinare_ibfk_2` FOREIGN KEY (`id_fisa`) REFERENCES `fisa_consult` (`id_fisa`),
  ADD CONSTRAINT `examinare_ibfk_3` FOREIGN KEY (`id_cabinet`) REFERENCES `cabinet` (`id_cabinet`);

--
-- Constraints for table `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`id_cabinet`) REFERENCES `cabinet` (`id_cabinet`),
  ADD CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`id_pacient`) REFERENCES `pacienti` (`id_pacient`),
  ADD CONSTRAINT `factura_ibfk_4` FOREIGN KEY (`id_examinare`) REFERENCES `examinare` (`id_examinare`);

--
-- Constraints for table `fisa_consult`
--
ALTER TABLE `fisa_consult`
  ADD CONSTRAINT `fisa_consult_ibfk_2` FOREIGN KEY (`id_pacient`) REFERENCES `pacienti` (`id_pacient`);

--
-- Constraints for table `incasare`
--
ALTER TABLE `incasare`
  ADD CONSTRAINT `incasare_ibfk_1` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id_factura`);

--
-- Constraints for table `pacienti`
--
ALTER TABLE `pacienti`
  ADD CONSTRAINT `pacienti_ibfk_1` FOREIGN KEY (`id_utilizator`) REFERENCES `login` (`id_utilizator`);

--
-- Constraints for table `scrisoare_medicala`
--
ALTER TABLE `scrisoare_medicala`
  ADD CONSTRAINT `scrisoare_medicala_ibfk_1` FOREIGN KEY (`id_examinare`) REFERENCES `examinare` (`id_examinare`),
  ADD CONSTRAINT `scrisoare_medicala_ibfk_2` FOREIGN KEY (`id_fisa`) REFERENCES `fisa_consult` (`id_fisa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
