-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 20 fév. 2024 à 16:17
-- Version du serveur : 10.5.23-MariaDB-0+deb11u1
-- Version de PHP : 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gamma-software`
--

-- --------------------------------------------------------

--
-- Structure de la table `band`
--

CREATE TABLE `band` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `origin` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `start_year` varchar(255) DEFAULT NULL,
  `separation_year` varchar(255) DEFAULT NULL,
  `founders` varchar(255) DEFAULT NULL,
  `members` int(11) DEFAULT NULL,
  `musical_style` varchar(255) DEFAULT NULL,
  `introduction` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `band`
--

INSERT INTO `band` (`id`, `name`, `origin`, `city`, `start_year`, `separation_year`, `founders`, `members`, `musical_style`, `introduction`) VALUES
(1, 'The Beatles', 'Royaume-Uni ', 'Liverpool', '1960', '1970', 'John Lennon', 4, NULL, 'The Beatles [ðə ˈbiːtəlz] est un quatuor musical britannique originaire de Liverpool, en Angleterre. Le noyau du groupe se forme avec les Quarrymen fondés ...'),
(2, 'Indochine', 'France', 'paris', '1981', NULL, 'Nicola Sirkis et Dominique Nicolas', 5, 'pop rock', 'Indochine est un groupe de pop rock français originaire de Paris, formé par Nicola Sirkis et Dominique Nicolas en 1981. Le groupe est issu du courant new wave'),
(3, 'Noir Désir', 'France', 'bordeaux', '1980', '2010', 'Bertrand Cantat', 4, 'rock', 'Noir Désir est un groupe de rock français, originaire de Bordeaux, en Gironde. Formé dans les années 1980, et dissout en 2010, il se compose de Bertrand Cantat, Denis Barthe, Serge Teyssot-Gay et Frédéric Vidalenc remplacé par Jean-Paul Roy à partir de 1996'),
(4, 'Nirvana', 'Etats-unis', 'Aberdeen', '1987', '1994', 'Kurt Cobain', 3, 'grunge', 'Nirvana est un groupe de grunge américain, originaire d\'Aberdeen, dans l\'État de Washington, formé en 1987 par le chanteur-guitariste Kurt Cobain et le bassiste Krist Novoselic'),
(5, 'Led Zeppelin', 'Royaume-Uni ', 'Londres', '1968', '1980', 'Jimmy Page', NULL, 'rock', 'Led Zeppelin [lɛd ˈzɛpələn] est un groupe britannique de rock, originaire de Londres, en Angleterre. Il est fondé en 1968 par Jimmy Page, avec Robert Plant, John Paul Jones et John Bonham, et dissout à la suite de la mort de ce dernier, en 1980'),
(6, 'Depeche Mode', 'Royaume-Uni ', 'Basildon', '1980', NULL, NULL, 3, 'rock', 'Depeche Mode est un groupe britannique de new wave et rock alternatif, originaire de Basildon, dans l\'Essex, en Angleterre. Formé en 1980, le groupe apparait au sein du courant de la synthpop et devient rapidement influent et populaire sur la scène internationale. Son nom provient d\'un magazine français, Dépêche Mode'),
(7, 'Téléphone', 'France', 'Paris', '1976', '1986', NULL, 4, 'rock', 'Téléphone est un groupe de rock français. Il est formé le 12 novembre 1976 et séparé le 21 avril 1986. Composé de Jean-Louis Aubert, Louis Bertignac, Corine Marienneau et Richard Kolinka, il connaît un énorme succès dès ses débuts avec plusieurs tubes et des tournées très populaires'),
(8, 'Massive Attack', 'Royaume-Uni ', 'bristol', '1987', NULL, NULL, NULL, 'Trip hop', 'Massive Attack est un groupe musical britannique, originaire de Bristol, précurseur de la musique trip hop. Il se compose, à l\'origine, de Robert Del Naja, Grant Marshall et Andrew Vowles'),
(9, 'Pink Floyd', 'Royaume-Uni ', 'Londres', '1964', '2014', 'Syd Barrett,', 3, 'rock', 'Pink Floyd [pɪŋk flɔɪd] est un groupe britannique de rock originaire de Londres. Le groupe débute avec un premier album de musique psychédélique pour ensuite bifurquer vers le rock progressif. Formé en 1965, il est considéré comme un pionnier et représentant majeur de ces styles musicaux.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `band`
--
ALTER TABLE `band`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `band`
--
ALTER TABLE `band`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
