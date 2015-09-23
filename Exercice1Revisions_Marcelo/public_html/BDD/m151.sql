-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 23 Septembre 2015 à 12:54
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `m151`
--

-- --------------------------------------------------------

--
-- Structure de la table `formulaire`
--

CREATE TABLE IF NOT EXISTS `formulaire` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Pseudo` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Description` text,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Pseudo` (`Pseudo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `formulaire`
--

INSERT INTO `formulaire` (`ID`, `Nom`, `Prenom`, `Date`, `Pseudo`, `Password`, `Email`, `Description`) VALUES
(1, 'Elie', 'Copter', '2015-09-02', 'Elie', '123', 'elie@copter.com', 'test'),
(2, 'Favre', 'alan', '1995-10-07', 'StalkerAlan', '1234567890', 'alan.favre@stalker.com', 'Je suis un stalker.'),
(3, 'Test', 'Test', '2015-09-11', 'test', 'test', 'test@test.com', ''),
(4, 'Leroy', 'Sacha', '2015-09-01', 'StalkerSacha', 'sacha', 'sacha@stalker.com', 'Je suis un stalker pro.'),
(5, 'Alex', 'TÃ©rieur', '2013-02-06', 'AT', 'jesaispas', 'alex@terieur.com', ''),
(8, 'John', 'Jan', '2015-09-16', 'joahn', '8cb2237d0679ca88db6464eac', 'john@jan.com', ''),
(9, 'marcelo', 'raeven', '1996-07-26', 'rvm', '2d15385eba2ef169b4cb5dcd8', 'raeven.marcelo.26@gmail.com', ''),
(10, 'asdf', 'aldf', '2015-09-08', 'asdf', '19791d9c7d235a1353531b6a9', 'sadf@asdf.com', ''),
(11, 'qewr', 'qwer', '2015-09-05', 'qwer', '1161e6ffd3637b302a5cd7407', 'qwer@qwer.com', ''),
(12, 'uiop', 'uiop', '2015-09-10', 'uoip', '3334ae6608f4ed4b9da5a946a', 'iuop@tzru.com', 'asdfsadf'),
(13, 'qwer', 'qwer', '2015-09-11', 'wqer', '2700d2dd985a29af2cc784e52', 'qewr@qwer.com', 'qewr');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
