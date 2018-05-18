-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2018 at 08:40 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecabgine`
--

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

DROP TABLE IF EXISTS `collection`;
CREATE TABLE IF NOT EXISTS `collection` (
  `id_collection` int(12) NOT NULL AUTO_INCREMENT,
  `id_invoice` int(12) NOT NULL,
  `date` datetime NOT NULL,
  `total_amount` double(9,2) NOT NULL,
  PRIMARY KEY (`id_collection`),
  KEY `id_invoice` (`id_invoice`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `id_invoice` int(12) NOT NULL AUTO_INCREMENT,
  `invoice_number` int(12) NOT NULL,
  `id_user` int(12) NOT NULL,
  `id_medical_record` int(12) NOT NULL,
  `id_medical_check_up` int(12) NOT NULL,
  `date` date NOT NULL,
  `series` int(11) NOT NULL,
  PRIMARY KEY (`id_invoice`),
  KEY `id_user` (`id_user`),
  KEY `id_medical_record` (`id_medical_record`),
  KEY `id_medical_check_up` (`id_medical_check_up`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medical_check_up`
--

DROP TABLE IF EXISTS `medical_check_up`;
CREATE TABLE IF NOT EXISTS `medical_check_up` (
  `id_medical_check_up` int(12) NOT NULL AUTO_INCREMENT,
  `type_of_medical_check_up` varchar(255) NOT NULL,
  `id_medical_record` int(12) NOT NULL,
  `recommanded_laboratory_test` varchar(255) NOT NULL,
  PRIMARY KEY (`id_medical_check_up`),
  KEY `id_medical_record` (`id_medical_record`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medical_letter`
--

DROP TABLE IF EXISTS `medical_letter`;
CREATE TABLE IF NOT EXISTS `medical_letter` (
  `id_medical_letter` int(12) NOT NULL AUTO_INCREMENT,
  `id_medical_record` int(12) NOT NULL,
  `medical_letter` varchar(255) NOT NULL,
  `id_name_of_medical_check_up` int(12) NOT NULL,
  PRIMARY KEY (`id_medical_letter`),
  KEY `id_medical_record` (`id_medical_record`),
  KEY `id_name_of_medical_check_up` (`id_name_of_medical_check_up`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medical_practice`
--

DROP TABLE IF EXISTS `medical_practice`;
CREATE TABLE IF NOT EXISTS `medical_practice` (
  `id_medical_practice` int(12) NOT NULL AUTO_INCREMENT,
  `id_medical_record` int(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `logo` blob NOT NULL,
  `cif` varchar(50) NOT NULL,
  `reg_com` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `iban` varchar(50) NOT NULL,
  `invoice_date` datetime NOT NULL,
  PRIMARY KEY (`id_medical_practice`),
  KEY `id_medical_record` (`id_medical_record`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medical_record`
--

DROP TABLE IF EXISTS `medical_record`;
CREATE TABLE IF NOT EXISTS `medical_record` (
  `id_medical_record` int(12) NOT NULL AUTO_INCREMENT,
  `id_user` int(12) NOT NULL,
  `id_patient` int(12) NOT NULL,
  `date` date NOT NULL,
  `case_history` varchar(255) NOT NULL,
  `last_period` date NOT NULL,
  `climax` varchar(50) NOT NULL,
  `period` varchar(255) NOT NULL,
  `deliverance` varchar(50) NOT NULL,
  `abortions` varchar(50) NOT NULL,
  `individual_medical_history` varchar(255) NOT NULL,
  `reason_of_examination` varchar(255) NOT NULL,
  `observation` varchar(255) NOT NULL,
  `diagnosis` varchar(255) NOT NULL,
  `medical_advice` varchar(255) NOT NULL,
  `prescription` varchar(255) NOT NULL,
  PRIMARY KEY (`id_medical_record`),
  KEY `id_user` (`id_user`),
  KEY `id_patient` (`id_patient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `name_of_medical_check_up`
--

DROP TABLE IF EXISTS `name_of_medical_check_up`;
CREATE TABLE IF NOT EXISTS `name_of_medical_check_up` (
  `id_name_of_medical_check_up` int(12) NOT NULL AUTO_INCREMENT,
  `id_medical_check_up` int(12) NOT NULL,
  `name_of_medical_check_up` varchar(255) NOT NULL,
  `price` double(9,2) NOT NULL,
  `laboratory_test` varchar(255) NOT NULL,
  PRIMARY KEY (`id_name_of_medical_check_up`),
  KEY `name_of_medical_check_up` (`name_of_medical_check_up`),
  KEY `id_medical_check_up` (`id_medical_check_up`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `id_patient` int(12) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `county` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `job` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `CNP` bigint(13) NOT NULL,
  `marital_status` varchar(50) NOT NULL,
  PRIMARY KEY (`id_patient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

DROP TABLE IF EXISTS `position`;
CREATE TABLE IF NOT EXISTS `position` (
  `id_position` int(12) NOT NULL AUTO_INCREMENT,
  `position1` varchar(50) NOT NULL,
  `position2` varchar(50) NOT NULL,
  `position3` varchar(50) NOT NULL,
  PRIMARY KEY (`id_position`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(12) NOT NULL AUTO_INCREMENT,
  `id_position` int(12) NOT NULL,
  `user` varchar(50) NOT NULL,
  `active_user` varchar(50) NOT NULL,
  `locked_user` varchar(50) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_position` (`id_position`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `collection`
--
ALTER TABLE `collection`
  ADD CONSTRAINT `collection_ibfk_1` FOREIGN KEY (`id_invoice`) REFERENCES `invoice` (`id_invoice`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`id_medical_record`) REFERENCES `medical_record` (`id_medical_record`),
  ADD CONSTRAINT `invoice_ibfk_3` FOREIGN KEY (`id_medical_check_up`) REFERENCES `medical_check_up` (`id_medical_check_up`);

--
-- Constraints for table `medical_check_up`
--
ALTER TABLE `medical_check_up`
  ADD CONSTRAINT `medical_check_up_ibfk_1` FOREIGN KEY (`id_medical_record`) REFERENCES `medical_record` (`id_medical_record`);

--
-- Constraints for table `medical_letter`
--
ALTER TABLE `medical_letter`
  ADD CONSTRAINT `medical_letter_ibfk_1` FOREIGN KEY (`id_medical_record`) REFERENCES `medical_record` (`id_medical_record`),
  ADD CONSTRAINT `medical_letter_ibfk_2` FOREIGN KEY (`id_name_of_medical_check_up`) REFERENCES `name_of_medical_check_up` (`id_name_of_medical_check_up`);

--
-- Constraints for table `medical_practice`
--
ALTER TABLE `medical_practice`
  ADD CONSTRAINT `medical_practice_ibfk_1` FOREIGN KEY (`id_medical_record`) REFERENCES `medical_record` (`id_medical_record`);

--
-- Constraints for table `medical_record`
--
ALTER TABLE `medical_record`
  ADD CONSTRAINT `medical_record_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id_patient`),
  ADD CONSTRAINT `medical_record_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `name_of_medical_check_up`
--
ALTER TABLE `name_of_medical_check_up`
  ADD CONSTRAINT `name_of_medical_check_up_ibfk_1` FOREIGN KEY (`id_medical_check_up`) REFERENCES `medical_check_up` (`id_medical_check_up`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_position`) REFERENCES `position` (`id_position`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
