CREATE DATABASE `m307_php_form`;
USE `m307_php_form`;
CREATE TABLE `person` (
  `person_ID` int(11) NOT NULL AUTO_INCREMENT,
  `anrede` char(1) DEFAULT NULL,
  `vorname` varchar(255) DEFAULT NULL,
  `nachname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`person_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
