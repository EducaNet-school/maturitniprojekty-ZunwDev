CREATE TABLE `film` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazev` varchar(80) NOT NULL,
  `popis` varchar(255) DEFAULT NULL,
  `datumVydani` date DEFAULT NULL,
  `delka` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)

CREATE TABLE `herec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jmeno` varchar(30) DEFAULT NULL,
  `prijmeni` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)

CREATE TABLE `kategorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazev` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)

CREATE TABLE `oceneni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazev` varchar(50) DEFAULT NULL,
  `popis` varchar(255) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `misto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)