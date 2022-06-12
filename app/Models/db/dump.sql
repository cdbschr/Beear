-- --------------------------------------------------------
-- Hôte:                         localhost
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour beear
DROP DATABASE IF EXISTS `beear`;
CREATE DATABASE IF NOT EXISTS `beear` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `beear`;

-- Listage de la structure de la table beear. beers
DROP TABLE IF EXISTS `beers`;
CREATE TABLE IF NOT EXISTS `beers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `img` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Listage des données de la table beear.beers : ~2 rows (environ)
/*!40000 ALTER TABLE `beers` DISABLE KEYS */;
INSERT INTO `beers` (`id`, `idname`, `name`, `hook`, `alcdegree`, `desc`, `ibu`, `temp`, `voyez`, `sentez`, `goutez`, `img`, `created_at`, `modified_at`) VALUES
	(1, 'bblonde', 'Beear Blonde', 'L\'ours sympa', 8, 'Les bières de la lignée des Beear sont nées de la pureté de l’eau et de la puissance du feu. Derrière sa robe couleur jaune flamme, BEEAR Blonde cache un bouquet d’épices et de céréales. En fin de bouche, c’est toute l’agréable amertume du houblon qui surgit au galop, rappelant à qui sait les boire que les Beear sont des bières uniques au caractère tonique.', 18, '7-13', 'Une mousse généreuse, persistante et compacte, blanche à fines bulles. Couleur blond soutenu, limpide et brillante.', 'Au nez, une complexe palette aromatique mêlant épices et céréales.', 'Un bel équilibre entre corps, chaleur (alcool) et amertume. Persistance des notes épicées et du caractère alcoolisé.On retrouve à la dégustation des notes de céréales presque biscuitées. Une belle présence en bouche.', '/public/frontend/img/verres/Verre-de-bière-bblonde.png', '2022-05-28 16:53:16', '2022-06-12 18:50:41'),
	(2, 'bbrune', 'Beear Brune', 'L\'ours robuste', 11, 'Véritable cadeau du brasseur, Beear Bune est une bière brune à la mousse abondante et à la douce amertume. Ronde et légèrement épicée, elle révèle une saveur typique de caramel et se ponctue sur une note délicatement sucrée. Servie dans son fameux verre, vous y découvrirez la parfaite réunion sucrée-amer.', 27, '7-13', 'Robe blonde cuivrée. Mousse épaisse blanche.', 'Odeur maltée de céréales, pargum de résine et d\'écorce. Légère note de pelures d\'oranges.', 'Corps rond et puissant, saveurs de malts grillés. houblon franc aux notes fruitées et à l\'amertume marquée.', '/public/frontend/img/verres/Verre-de-bière-bbrune.png', '2022-05-28 16:53:17', '2022-06-12 18:51:10'),
	(3, 'bblanche', 'Beear Blanche', 'L\'ours tout doux', 5, 'Beear Blanche saura vous surprendre. Sa complexité aromatique en fait une bière unique en son genre. Elle présente la particularité de mettre en avant une douce acidité, un fruité riche sur fond de céréales et est particulièrement désaltérante. Une personnalité audacieuse et originale pour cette bière mystérieuse, élégante et tout en finesse.', 7, '6-8', 'Très beau col de mousse blanche crémeuse, bulles régulières, de la tenue. Une couleur blond vénitien orangé, profonde et homogène.', 'Bouquet fruité très doux, acidulé et très légèrement sucré : baies rouges, pêche, pêche de vignes, grains de raisins et mangue. Notes de céréales, puis banane et zestes de citron.', 'L’attaque est tonique : une acidité tendre interpelle les papilles et rend cette bière immédiatement rafraîchissante. Finement pétillante, texture fluide et douce chaleur en fond de bouche. Au fil de sa dégustation, elle dévoile progressivement des arômes de baies rouges qui se prolongent sous forme de zestes de citron. La finale est riche et agréable. Elle présente une étonnante et belle longueur sans être supportée par une amertume marquée.', '/public/frontend/img/verres/Verre-de-bière-bblanche.png', '2022-05-28 16:53:17', '2022-06-12 18:51:21');
/*!40000 ALTER TABLE `beers` ENABLE KEYS */;

-- Listage de la structure de la table beear. contact
DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Listage des données de la table beear.contact : ~1 rows (environ)
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` (`id`, `lastname`, `firstname`, `mail`, `phone`, `content`, `created_at`) VALUES
	(1, 'NomTest', 'PrenomTest', 'test@test.fr', '', 'Je suis un test qui certifie que le formulaire fonctionne.', '2022-05-27 14:19:40');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;

-- Listage de la structure de la table beear. user-roles
DROP TABLE IF EXISTS `user-roles`;
CREATE TABLE IF NOT EXISTS `user-roles` (
  `id_role` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  PRIMARY KEY (`id_role`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Listage des données de la table beear.user-roles : ~3 rows (environ)
/*!40000 ALTER TABLE `user-roles` DISABLE KEYS */;
INSERT INTO `user-roles` (`id_role`, `name`) VALUES
	(1, 'admin'),
	(2, 'editor'),
	(3, 'members');
/*!40000 ALTER TABLE `user-roles` ENABLE KEYS */;

-- Listage de la structure de la table beear. users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `id_roles` int(1) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_users_user-roles` (`id_roles`),
  CONSTRAINT `FK_users_user-roles` FOREIGN KEY (`id_roles`) REFERENCES `user-roles` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Listage des données de la table beear.users : ~3 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `pseudo`, `mail`, `password`, `id_roles`, `created_at`) VALUES
	(1, 'admin', 'admin@admin.fr', '$2y$10$zcyWePnlVfQ7mRCCrYwFq.hNfMNmReVdtRLTzSI.ctCbW0QMX5Y7i', 1, '2022-06-05 12:34:50'),
	(2, 'editor', 'editor@editor.fr', '$2y$10$W3/9y/IqKz6LkwzdwF7Zhuv/srvPUYACx9RWMCVmtZVrIYd6cNxHq', 2, '2022-06-05 15:54:53'),
	(3, 'user', 'user@user.fr', '$2y$10$cqArYiiD6xvVJ6vJUkvjWO2hrt6vuYOiE8KgCf.E22oTggh5et1Be', 3, '2022-06-06 14:14:04');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
