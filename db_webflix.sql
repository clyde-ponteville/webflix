-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 01 nov. 2018 à 19:59
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_webflix`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'action'),
(2, 'science-fiction'),
(3, 'fantastique'),
(4, 'policier'),
(5, 'animation'),
(6, 'horreur');

-- --------------------------------------------------------

--
-- Structure de la table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `video_link` varchar(255) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `released_at` date DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `movie`
--

INSERT INTO `movie` (`id`, `title`, `description`, `video_link`, `cover`, `released_at`, `category_id`) VALUES
(1, 'venom', 'Des symbiotes débarquent sur la Terre, parmi eux, Venom, qui va s\'allier avec Eddie Brock. De son côté, un puissant scientifique tente de faire évoluer l\'humanité avec les symbiotes, le duo d\'anti-héros va devoir tout faire pour l\'arrêter !', 'embed/nr_q2rhxQ_M', 'venom.jpg', '2018-10-18', 6),
(2, 'Halloween', 'Laurie Strode est de retour pour un affrontement final avec Michael Myers, le personnage masqué qui la hante depuis qu’elle a échappé de justesse à sa folie meurtrière le soir d’Halloween 40 ans plus tôt.', 'embed/L8NT3aTsNUU', 'eb6ea73ec1ba9f883878bc856633cd82.jpg', '2018-10-24', 6),
(3, 'Les Indestructibles 2', 'Notre famille de super-héros préférée est de retour! Cette fois c’est Hélène qui se retrouve sur le devant de la scène laissant à Bob le soin de mener à bien les mille et une missions de la vie quotidienne et de s’occuper de Violette, Flèche et de bébé Jack-Jack. C’est un changement de rythme difficile pour la famille d’autant que personne ne mesure réellement l’étendue des incroyables pouvoirs du petit dernier… Lorsqu’un nouvel ennemi fait surface, la famille et Frozone vont devoir s’allier comme jamais pour déjouer son plan machiavélique.', 'embed/KUa_1HGRqLw', 'les-indestructibles-2.jpg', '2018-07-04', 5),
(5, 'Avengers : Infinity War', 'Les Avengers et leurs alliés devront être prêts à tout sacrifier pour neutraliser le redoutable Thanos avant que son attaque éclair ne conduise à la destruction complète de l’univers.', 'embed/DjYBTqgj8uE', 'd9e529c65e25130bf20e40b635c276de.jpg', '2018-04-25', 2),
(6, 'Deadpool 2', 'Deadpool se voit contraint de rejoindre les X-Men : après une tentative ratée de sauver un jeune mutant au pouvoir destructeur, il est jeté en prison anti-mutants. Arrive Cable, un soldat venant du futur et ayant pour cible le jeune mutant, en quête de vengeance. Deadpool décide de le combattre. Peu convaincu par les règles des X-Men, il crée sa propre équipe, la « X-Force ». Mais cette mission lui réservera de grosses surprises, des ennemis de taille et des alliés indispensables.', 'embed/2rJNGSRVq2w', '0116bfff4fb2f927bef4805e1dace8c2.jpg', '2018-05-16', 1),
(7, 'Coco', 'Malgré la décevante absence totale de musique dans sa famille depuis des générations, Miguel rêve de devenir un grand musicien comme son idole Ernesto de la Cruz. Désespéré de pouvoir un jour montrer ses talents, il se retrouve à la suite d\'un mystérieux enchaînement d\'évènements dans l\'incroyavle et coloré Royaume des Morts. Sur sa route, il rencontre l\'escroc charmeur Hector et ensemble, ils partent pour un voyage extraordinaire pour découvrir la véritable histoire cachée de la famille de Miguel.', 'embed/I-exOWXm434', '/sZqcEV3KhDITHlUBmyj1a3RRvT9.jpg', '2017-10-27', 5),
(8, 'Deadpool', 'Deadpool, est l\'anti-héros le plus atypique de l\'univers Marvel. À l\'origine, il s\'appelle Wade Wilson : un ancien militaire des Forces Spéciales devenu mercenaire. Après avoir subi une expérimentation hors norme qui va accélérer ses pouvoirs de guérison, il va devenir Deadpool. Armé de ses nouvelles capacités et d\'un humour noir survolté, Deadpool va traquer l\'homme qui a bien failli anéantir sa vie.', 'embed/XWtH7anz7io', '/eJyRzC5uFjQryu8Hm61yqtrzj4S.jpg', '2016-02-09', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `token_expiration` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `token`, `token_expiration`) VALUES
(1, 'toto', 'bla@bla.fr', '$2y$10$oSmS5.nsyKO0jUGcJzvAseDFsPSPDtmiaezazHYDxDq6Fd6gj52ma', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
