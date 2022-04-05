-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 05 avr. 2022 à 10:37
-- Version du serveur :  10.5.15-MariaDB
-- Version de PHP : 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `umdj4280_beear`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `beers`
--

CREATE TABLE `beers` (
  `id` int(11) NOT NULL,
  `idname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `hook` varchar(255) NOT NULL,
  `alcdegree` int(11) NOT NULL,
  `desc` mediumtext NOT NULL,
  `ibu` int(11) NOT NULL,
  `temp` varchar(255) NOT NULL,
  `voyez` mediumtext NOT NULL,
  `sentez` mediumtext NOT NULL,
  `goutez` mediumtext NOT NULL,
  `img` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `beers`
--

INSERT INTO `beers` (`id`, `idname`, `name`, `hook`, `alcdegree`, `desc`, `ibu`, `temp`, `voyez`, `sentez`, `goutez`, `img`) VALUES
(1, 'bblonde', 'Beear Blonde', 'L\'ours sympa', 8, 'Les bières de la lignée des Beear sont nées de la pureté de l’eau et de la puissance du feu. Derrière sa robe couleur jaune flamme, BEEAR Blonde cache un bouquet d’épices et de céréales. En fin de bouche, c’est toute l’agréable amertume du houblon qui surgit au galop, rappelant à qui sait les boire que les Beear sont des bières uniques au caractère tonique.', 18, '7-13', 'Une mousse généreuse, persistante et compacte, blanche à fines bulles. Couleur blond soutenu, limpide et brillante.', 'Au nez, une complexe palette aromatique mêlant épices et céréales.', 'Un bel équilibre entre corps, chaleur (alcool) et amertume. Persistance des notes épicées et du caractère alcoolisé.On retrouve à la dégustation des notes de céréales presque biscuitées. Une belle présence en bouche.', NULL),
(2, 'bbrune', 'Beear Brune', 'L\'ours robuste', 11, 'Véritable cadeau du brasseur, Beear Bune est une bière brune à la mousse abondante et à la douce amertume. Ronde et légèrement épicée, elle révèle une saveur typique de caramel et se ponctue sur une note délicatement sucrée. Servie dans son fameux verre, vous y découvrirez la parfaite réunion sucrée-amer.', 27, '7-13', 'Robe blonde cuivrée. Mousse épaisse blanche.', 'Odeur maltée de céréales, pargum de résine et d\'écorce. Légère note de pelures d\'oranges.', 'Corps rond et puissant, saveurs de malts grillés. houblon franc aux notes fruitées et à l\'amertume marquée.', NULL),
(3, 'bblanche', 'Beear Blanche', 'L\'ours tout doux', 5, 'Beear Blanche saura vous surprendre. Sa complexité aromatique en fait une bière unique en son genre. Elle présente la particularité de mettre en avant une douce acidité, un fruité riche sur fond de céréales et est particulièrement désaltérante. Une personnalité audacieuse et originale pour cette bière mystérieuse, élégante et tout en finesse.', 7, '6-8', 'Très beau col de mousse blanche crémeuse, bulles régulières, de la tenue. Une couleur blond vénitien orangé, profonde et homogène.', 'Bouquet fruité très doux, acidulé et très légèrement sucré : baies rouges, pêche, pêche de vignes, grains de raisins et mangue. Notes de céréales, puis banane et zestes de citron.', 'L’attaque est tonique : une acidité tendre interpelle les papilles et rend cette bière immédiatement rafraîchissante. Finement pétillante, texture fluide et douce chaleur en fond de bouche. Au fil de sa dégustation, elle dévoile progressivement des arômes de baies rouges qui se prolongent sous forme de zestes de citron. La finale est riche et agréable. Elle présente une étonnante et belle longueur sans être supportée par une amertume marquée.', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user-roles`
--

CREATE TABLE `user-roles` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user-roles`
--

INSERT INTO `user-roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'editor'),
(3, 'members'),
(4, 'users');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `beers`
--
ALTER TABLE `beers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user-roles`
--
ALTER TABLE `user-roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `beers`
--
ALTER TABLE `beers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user-roles`
--
ALTER TABLE `user-roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
