-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 04 Décembre 2018 à 14:41
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gpe`
--
CREATE DATABASE IF NOT EXISTS `gpe` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gpe`;

-- --------------------------------------------------------

--
-- Structure de la table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `n_people` int(11) NOT NULL,
  `date` date NOT NULL,
  `hour` int(11) NOT NULL,
  `minute` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `n_people`, `date`, `hour`, `minute`, `activity_id`) VALUES
(1, 1, 2, '2018-11-14', 0, 0, 1),
(2, 1, 5, '2018-11-13', 0, 0, 2),
(5, 1, 15, '2018-11-14', 10, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `has_tags`
--

CREATE TABLE `has_tags` (
  `id_tag` int(11) NOT NULL,
  `id_hobbyactivity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `has_tags`
--

INSERT INTO `has_tags` (`id_tag`, `id_hobbyactivity`) VALUES
(1, 1),
(4, 1),
(1, 2),
(3, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `hobbyactivity`
--

CREATE TABLE `hobbyactivity` (
  `id` int(11) NOT NULL,
  `label` text,
  `description` text,
  `web_site` text,
  `minimum_older` int(11) DEFAULT NULL,
  `street` text,
  `zip_code` varchar(5) DEFAULT NULL,
  `city` text,
  `cover` text NOT NULL,
  `slogan` varchar(150) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `max_n_people` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `hobbyactivity`
--

INSERT INTO `hobbyactivity` (`id`, `label`, `description`, `web_site`, `minimum_older`, `street`, `zip_code`, `city`, `cover`, `slogan`, `price`, `max_n_people`) VALUES
(1, 'Paintball', '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc congue sapien in nulla pharetra convallis. Integer et erat tellus. Duis in erat pulvinar, vulputate massa ac, semper mauris. Aenean mauris elit, pellentesque accumsan nibh non, suscipit pellentesque nibh. Praesent nec tortor eget nulla gravida egestas. Proin cursus turpis ac lacus accumsan, eu dictum arcu elementum. Nam elementum ligula elit. Maecenas nec iaculis quam. Fusce ut nisi eu sem posuere egestas ac id metus. Integer posuere.', 'www.paintball.fr', 14, '42 rue lorem ipsum', '75000', 'Lorem Ipsum', 'ressources/img/background2.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin molestie odio in euismod dapibus. Duis cursus ipsum at sem ultricies, sed lobortis sed.', '0', 0),
(2, 'Karting', '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc congue sapien in nulla pharetra convallis. Integer et erat tellus. Duis in erat pulvinar, vulputate massa ac, semper mauris. Aenean mauris elit, pellentesque accumsan nibh non, suscipit pellentesque nibh. Praesent nec tortor eget nulla gravida egestas. Proin cursus turpis ac lacus accumsan, eu dictum arcu elementum. Nam elementum ligula elit. Maecenas nec iaculis quam. Fusce ut nisi eu sem posuere egestas ac id metus. Integer posuere.', 'www.karting.fr', 16, '1 rue lorem ispum', '75000', 'Lorem Ipsum', 'ressources/img/background3.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin molestie odio in euismod dapibus. Duis cursus ipsum at sem ultricies, sed lobortis sed.', '0', 0),
(3, 'Bowling', '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc congue sapien in nulla pharetra convallis. Integer et erat tellus. Duis in erat pulvinar, vulputate massa ac, semper mauris. Aenean mauris elit, pellentesque accumsan nibh non, suscipit pellentesque nibh. Praesent nec tortor eget nulla gravida egestas. Proin cursus turpis ac lacus accumsan, eu dictum arcu elementum. Nam elementum ligula elit. Maecenas nec iaculis quam. Fusce ut nisi eu sem posuere egestas ac id metus. Integer posuere.', 'www.bowling.fr', 5, '3 rue lorem ipsum', '75000', 'Lorem Ipsum', 'ressources/img/banc-bowling.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin molestie odio in euismod dapibus. Duis cursus ipsum at sem ultricies, sed lobortis sed.', '0', 0);

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `title` text,
  `path` text,
  `description` text,
  `id_hobbyactivity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `photo`
--

INSERT INTO `photo` (`id`, `title`, `path`, `description`, `id_hobbyactivity`) VALUES
(1, 'paintball_presentation', 'ressources/img/background2.png', 'Lorem ipsum dolor sit amet', 1),
(2, 'bowling_presentation', 'ressources/img/banc-bowling.png', 'Lorem ipsum dolor sit amet', 3),
(3, 'karting_presentation', 'ressources/img/background3.png', 'Lorem ipsum dolor sit amet', 2),
(4, NULL, 'ressources/img/background3.png', NULL, 2),
(5, NULL, 'ressources/img/background3.png', NULL, 2),
(6, NULL, 'ressources/img/background3.png', NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `content` text,
  `grade` float DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_hobbyactivity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `label` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id`, `label`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `label` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tag`
--

INSERT INTO `tag` (`id`, `label`) VALUES
(1, 'extérieur'),
(2, 'intérieur'),
(3, 'seul'),
(4, 'équipe');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `lastName` text,
  `firstname` text,
  `birthday` date DEFAULT NULL,
  `email` text,
  `password` text,
  `street` text,
  `zip_code` int(11) DEFAULT NULL,
  `city` text,
  `id_role` int(11) DEFAULT NULL,
  `photo` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `lastName`, `firstname`, `birthday`, `email`, `password`, `street`, `zip_code`, `city`, `id_role`, `photo`) VALUES
(1, 'bonin', 'dylan', '1993-11-01', 'dylan.bonin@free.fr', 'password', '4 rue pasteur', 91260, 'juvisy-sur-orge', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `rate`
--

CREATE TABLE `rate` (
  `id` int(11) NOT NULL,
  `label` text,
  `id_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_id` (`user_id`),
  ADD KEY `FK_activity_id` (`activity_id`);

--
-- Index pour la table `has_tags`
--
ALTER TABLE `has_tags`
  ADD PRIMARY KEY (`id_tag`,`id_hobbyactivity`),
  ADD KEY `FK_has_tags_id_HobbyActivity` (`id_hobbyactivity`);

--
-- Index pour la table `hobbyactivity`
--
ALTER TABLE `hobbyactivity`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_photo_hobbyactivity_id_hobbyactivity` (`id_hobbyactivity`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_post_id_Utilisateur` (`id_user`),
  ADD KEY `FK_post_id_HobbyActivity` (`id_hobbyactivity`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_id_role` (`id_role`);

--
-- Index pour la table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_activity_id` (`id_activity`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `has_tags`
--
ALTER TABLE `has_tags`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `hobbyactivity`
--
ALTER TABLE `hobbyactivity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `FK_activity_id` FOREIGN KEY (`activity_id`) REFERENCES `hobbyactivity` (`id`),
  ADD CONSTRAINT `FK_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `has_tags`
--
ALTER TABLE `has_tags`
  ADD CONSTRAINT `FK_has_tags_id_HobbyActivity` FOREIGN KEY (`id_hobbyactivity`) REFERENCES `hobbyactivity` (`id`),
  ADD CONSTRAINT `FK_has_tags_id_TAG` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id`);

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `FK_photo_hobbyactivity_id_hobbyactivity` FOREIGN KEY (`id_hobbyactivity`) REFERENCES `hobbyactivity` (`id`);

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_post_id_HobbyActivity` FOREIGN KEY (`id_hobbyactivity`) REFERENCES `hobbyactivity` (`id`),
  ADD CONSTRAINT `FK_post_id_Utilisateur` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_user_id_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`);

--
-- Contraintes pour la table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `FK_rate_activity_id` FOREIGN KEY (`id_activity`) REFERENCES `hobbyactivity` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
