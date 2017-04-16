-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 14 Avril 2017 à 21:51
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bde`
--

-- --------------------------------------------------------

--
-- Structure de la table `activites`
--

CREATE TABLE `activites` (
  `Id_Activite` int(11) NOT NULL,
  `Nom_Activite` char(25) NOT NULL,
  `Date_Activite` date NOT NULL,
  `Description_A` varchar(1000) NOT NULL,
  `Prix_Activites` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `Id_Article` int(11) NOT NULL,
  `Nom_Article` varchar(50) NOT NULL,
  `Description_Article` varchar(1000) NOT NULL,
  `Prix_Article` int(11) NOT NULL,
  `Id_Type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`Id_Article`, `Nom_Article`, `Description_Article`, `Prix_Article`, `Id_Type`) VALUES
(1, 'Images/sweat.png', 'sweat aux couleurs de l\'école soyez fier de la représenter', 30, 1),
(2, 'Images/housse.jpg', 'housse d\'ordinateur exia', 36, 2),
(3, 'Images/Logo.png', 'sticker exia', 2, 2),
(4, 'Images/snapback.jpg', 'snapback accompagnée de son logo exia', 20, 1),
(5, 'images/Spinner2.png', 'spinner 2 branches fabriqué au sein de l\'école', 5, 2),
(6, 'Images/Spinner3.png', 'spinner 3 branches fabriqué au sein de l\'école', 7, 2),
(7, 'Images/mugGeek.jpg', 'Mug fun Exia', 7, 2),
(8, 'Images/tshirt.jpg', 't-shirt aux couleurs du CESI', 10, 1),
(9, 'Images/gourde.jpg', 'gourde d\'une contenance d\'1L', 15, 2),
(10, 'Images/goodKey.jpg', 'Clé USB d\'une capacité de 32gba aux couleurs de l\'école', 15, 2),
(11, 'Images/beerTable', 'Vous voulez vous divertir après une bonne partie de jeux vidéos entre amis ? Nous avons l\'objet idéal : cette table de beer pong façon geek', 60, 2);

-- --------------------------------------------------------

--
-- Structure de la table `coloris`
--

CREATE TABLE `coloris` (
  `Id_Colors` int(11) NOT NULL,
  `Nom_Coloris` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `Id_Commande` int(11) NOT NULL,
  `Id_utilisateur` int(11) NOT NULL,
  `Id_Transaction` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire_activite`
--

CREATE TABLE `commentaire_activite` (
  `Id_Commentaire_A` int(11) NOT NULL,
  `Commentaire_A` varchar(1000) NOT NULL,
  `Date_Commentaire_Activite` date NOT NULL,
  `Id_Activite` int(11) NOT NULL,
  `Id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire_photo`
--

CREATE TABLE `commentaire_photo` (
  `Id_Commentaire_P` int(11) NOT NULL,
  `Commentaire_P` varchar(1000) NOT NULL,
  `Date_Commentaire_Photo` date NOT NULL,
  `Id_utilisateur` int(11) NOT NULL,
  `Id_Photo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contenu`
--

CREATE TABLE `contenu` (
  `Id_Commande` int(11) NOT NULL,
  `Id_Article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

CREATE TABLE `fonction` (
  `Id_Fonction` int(11) NOT NULL,
  `Nom_Fonction` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fonction`
--

INSERT INTO `fonction` (`Id_Fonction`, `Nom_Fonction`) VALUES
(9, 'chargé-évenements'),
(8, 'communication'),
(3, 'étudiants'),
(4, 'président'),
(1, 'staff Cesi'),
(6, 'trésorier'),
(5, 'vice-président'),
(7, 'vice-trésorier');

-- --------------------------------------------------------

--
-- Structure de la table `idees_activites`
--

CREATE TABLE `idees_activites` (
  `Id_Idee_Activite` int(11) NOT NULL,
  `Nom_Idee_Activite` varchar(25) NOT NULL,
  `Valide` tinyint(1) DEFAULT NULL,
  `Description_I_A` varchar(1000) NOT NULL,
  `Prix_Idees_Activites` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `like_photo`
--

CREATE TABLE `like_photo` (
  `Id_like` int(11) NOT NULL,
  `Id_utilisateur` int(11) NOT NULL,
  `Id_Photo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `liste_participant`
--

CREATE TABLE `liste_participant` (
  `Id_Payement_A` int(11) NOT NULL,
  `Payer_A` tinyint(1) NOT NULL,
  `Id_Activite` int(11) NOT NULL,
  `Id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `Id_Photo` int(11) NOT NULL,
  `Nom_Photo` char(25) NOT NULL,
  `Moderation` tinyint(1) NOT NULL,
  `Id_Activite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `proposition_date_i_a`
--

CREATE TABLE `proposition_date_i_a` (
  `Id_Date` int(11) NOT NULL,
  `Date_I_A` date DEFAULT NULL,
  `Id_Idee_Activite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `stock_article`
--

CREATE TABLE `stock_article` (
  `Stock` int(11) NOT NULL,
  `Id_Taille` int(11) NOT NULL,
  `Id_Colors` int(11) NOT NULL,
  `Id_Article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `taille_article`
--

CREATE TABLE `taille_article` (
  `Id_Taille` int(11) NOT NULL,
  `Taille` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `transaction`
--

CREATE TABLE `transaction` (
  `Id_Transaction` int(11) NOT NULL,
  `Montant` int(11) NOT NULL,
  `Type_Transaction` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_article`
--

CREATE TABLE `type_article` (
  `Id_Type` int(11) NOT NULL,
  `Type_Article` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_article`
--

INSERT INTO `type_article` (`Id_Type`, `Type_Article`) VALUES
(1, 'vêtement'),
(2, 'goodies'),
(3, 'snack');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `Id_utilisateur` int(11) NOT NULL,
  `Mdp` varchar(50) NOT NULL,
  `Nom_Utilisateur` varchar(30) DEFAULT NULL,
  `Prenom_Utilisateur` char(30) DEFAULT NULL,
  `Mail` varchar(50) NOT NULL,
  `Date_Naissance` date DEFAULT NULL,
  `Adresse_Postale` varchar(25) DEFAULT NULL,
  `Code_Postal` tinyint(4) DEFAULT NULL,
  `Ville` varchar(50) DEFAULT NULL,
  `Avatar` varchar(25) DEFAULT NULL,
  `Id_Fonction` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`Id_utilisateur`, `Mdp`, `Nom_Utilisateur`, `Prenom_Utilisateur`, `Mail`, `Date_Naissance`, `Adresse_Postale`, `Code_Postal`, `Ville`, `Avatar`, `Id_Fonction`) VALUES
(1, '79e2475f81a6317276bf7cbb3958b20d289b78df', 'rebus', 'gregory', 'gregory.rebus@viacesi.fr', NULL, NULL, NULL, NULL, NULL, 1),
(2, '0706025b2bbcec1ed8d64822f4eccd96314938d0', 'dufrenoy', 'maxence', 'maxence.dufrenoy@viacesi.fr', NULL, NULL, NULL, NULL, NULL, 1),
(3, 'c028c213ed5efcf30c3f4fc7361dbde0c893c5b7', 'liaud', 'joshua', 'joshua.liaud@viacesi.fr', NULL, NULL, NULL, NULL, 'Images/josh.jpg', 5),
(4, '01d22012aa39d30e36a6d8fc0253ce5edf084423', 'chalot', 'gaelle', 'gaelle.chalot@viacesi.fr', NULL, NULL, NULL, NULL, NULL, 1),
(5, '0bbf31d9da625147cbe69f7b1f5af704a8105f12', 'etudiant', 'etudiant', 'etudiant@viacesi.fr', NULL, NULL, NULL, NULL, NULL, 3),
(7, '1fa2ef4755a9226cb9a0a4840bd89b158ac71391', 'boxho', 'matthieu', 'matthieu.boxho@viacesi.fr', NULL, NULL, NULL, NULL, 'Images/matthieu.png', 4),
(8, 'cce3b81ce1c05726331254f5d3dba8d589a4bfa8', 'deruelle', 'baptiste', 'baptiste.deruelle@viacesi.fr', NULL, NULL, NULL, NULL, 'Images/baptiste.png', 6),
(9, 'fbe2b1ad416b7e3251086de11ad56d27ec6f72a3', 'laurent', 'lou-théo', 'lou-theo.laurent@viacesi.fr', NULL, NULL, NULL, NULL, 'Images/loutheo.png', 7),
(10, 'd82ece8d514aca7e24d3fc11fbb8dada57f2966c', 'woutelet', 'louis', 'louis.woutelet@viacesi.fr', NULL, NULL, NULL, NULL, 'Images/louisW.jpg', 7),
(11, 'bf5cf299ce6ad0978a1465386899de8d6e61819d', 'dejoncheere', 'stephane', 'stephane.dejoncheere@viacesi.fr', NULL, NULL, NULL, NULL, 'Images/stephane1.png', 9),
(12, '75b1383a6f80bf121b182167edba49b84ea9a811', 'broutin', 'dorian', 'dorian.broutin@viacesi.fr', NULL, NULL, NULL, NULL, 'Images/dorian.png', 9),
(13, 'd82ece8d514aca7e24d3fc11fbb8dada57f2966c', 'hans', 'louis', 'louis.hans@viacesi.fr', NULL, NULL, NULL, NULL, 'Images/louiH.jpg', 8);

-- --------------------------------------------------------

--
-- Structure de la table `vote_activite`
--

CREATE TABLE `vote_activite` (
  `Id_Vote_Activite` int(11) NOT NULL,
  `Id_Idee_Activite` int(11) NOT NULL,
  `Id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `vote_date`
--

CREATE TABLE `vote_date` (
  `Id_Vote_Date` int(11) NOT NULL,
  `Id_utilisateur` int(11) NOT NULL,
  `Id_Date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `activites`
--
ALTER TABLE `activites`
  ADD PRIMARY KEY (`Id_Activite`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`Id_Article`),
  ADD UNIQUE KEY `Nom_Article` (`Nom_Article`),
  ADD KEY `FK_Article_Id_Type` (`Id_Type`);

--
-- Index pour la table `coloris`
--
ALTER TABLE `coloris`
  ADD PRIMARY KEY (`Id_Colors`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`Id_Commande`),
  ADD KEY `FK_Commande_Id_utilisateur` (`Id_utilisateur`),
  ADD KEY `FK_Commande_Id_Transaction` (`Id_Transaction`);

--
-- Index pour la table `commentaire_activite`
--
ALTER TABLE `commentaire_activite`
  ADD PRIMARY KEY (`Id_Commentaire_A`),
  ADD KEY `FK_Commentaire_Activite_Id_Activite` (`Id_Activite`),
  ADD KEY `FK_Commentaire_Activite_Id_utilisateur` (`Id_utilisateur`);

--
-- Index pour la table `commentaire_photo`
--
ALTER TABLE `commentaire_photo`
  ADD PRIMARY KEY (`Id_Commentaire_P`),
  ADD KEY `FK_Commentaire_Photo_Id_utilisateur` (`Id_utilisateur`),
  ADD KEY `FK_Commentaire_Photo_Id_Photo` (`Id_Photo`);

--
-- Index pour la table `contenu`
--
ALTER TABLE `contenu`
  ADD PRIMARY KEY (`Id_Commande`,`Id_Article`),
  ADD KEY `FK_Contenu_Id_Article` (`Id_Article`);

--
-- Index pour la table `fonction`
--
ALTER TABLE `fonction`
  ADD PRIMARY KEY (`Id_Fonction`),
  ADD UNIQUE KEY `Nom_Fonction` (`Nom_Fonction`);

--
-- Index pour la table `idees_activites`
--
ALTER TABLE `idees_activites`
  ADD PRIMARY KEY (`Id_Idee_Activite`);

--
-- Index pour la table `like_photo`
--
ALTER TABLE `like_photo`
  ADD PRIMARY KEY (`Id_like`),
  ADD KEY `FK_Like_Photo_Id_utilisateur` (`Id_utilisateur`),
  ADD KEY `FK_Like_Photo_Id_Photo` (`Id_Photo`);

--
-- Index pour la table `liste_participant`
--
ALTER TABLE `liste_participant`
  ADD PRIMARY KEY (`Id_Payement_A`),
  ADD KEY `FK_Liste_Participant_Id_Activite` (`Id_Activite`),
  ADD KEY `FK_Liste_Participant_Id_utilisateur` (`Id_utilisateur`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`Id_Photo`),
  ADD UNIQUE KEY `Nom_Photo` (`Nom_Photo`),
  ADD KEY `FK_Photo_Id_Activite` (`Id_Activite`);

--
-- Index pour la table `proposition_date_i_a`
--
ALTER TABLE `proposition_date_i_a`
  ADD PRIMARY KEY (`Id_Date`),
  ADD KEY `FK_Proposition_Date_I_A_Id_Idee_Activite` (`Id_Idee_Activite`);

--
-- Index pour la table `stock_article`
--
ALTER TABLE `stock_article`
  ADD PRIMARY KEY (`Id_Taille`,`Id_Colors`,`Id_Article`);

--
-- Index pour la table `taille_article`
--
ALTER TABLE `taille_article`
  ADD PRIMARY KEY (`Id_Taille`);

--
-- Index pour la table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`Id_Transaction`),
  ADD UNIQUE KEY `Type_Transaction` (`Type_Transaction`);

--
-- Index pour la table `type_article`
--
ALTER TABLE `type_article`
  ADD PRIMARY KEY (`Id_Type`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`Id_utilisateur`),
  ADD UNIQUE KEY `Mail` (`Mail`,`Ville`),
  ADD KEY `FK_Utilisateur_Id_Fonction` (`Id_Fonction`);

--
-- Index pour la table `vote_activite`
--
ALTER TABLE `vote_activite`
  ADD PRIMARY KEY (`Id_Vote_Activite`),
  ADD KEY `FK_Vote_Acitivite_Id_Idee_Activite` (`Id_Idee_Activite`),
  ADD KEY `FK_Vote_Acitivite_Id_utilisateur` (`Id_utilisateur`);

--
-- Index pour la table `vote_date`
--
ALTER TABLE `vote_date`
  ADD PRIMARY KEY (`Id_Vote_Date`),
  ADD KEY `FK_Vote_Date_Id_utilisateur` (`Id_utilisateur`),
  ADD KEY `FK_Vote_Date_Id_Date` (`Id_Date`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `activites`
--
ALTER TABLE `activites`
  MODIFY `Id_Activite` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `Id_Article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `coloris`
--
ALTER TABLE `coloris`
  MODIFY `Id_Colors` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `Id_Commande` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commentaire_activite`
--
ALTER TABLE `commentaire_activite`
  MODIFY `Id_Commentaire_A` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commentaire_photo`
--
ALTER TABLE `commentaire_photo`
  MODIFY `Id_Commentaire_P` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `fonction`
--
ALTER TABLE `fonction`
  MODIFY `Id_Fonction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `idees_activites`
--
ALTER TABLE `idees_activites`
  MODIFY `Id_Idee_Activite` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `like_photo`
--
ALTER TABLE `like_photo`
  MODIFY `Id_like` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `liste_participant`
--
ALTER TABLE `liste_participant`
  MODIFY `Id_Payement_A` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `Id_Photo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `proposition_date_i_a`
--
ALTER TABLE `proposition_date_i_a`
  MODIFY `Id_Date` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `taille_article`
--
ALTER TABLE `taille_article`
  MODIFY `Id_Taille` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `Id_Transaction` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type_article`
--
ALTER TABLE `type_article`
  MODIFY `Id_Type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `Id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `vote_activite`
--
ALTER TABLE `vote_activite`
  MODIFY `Id_Vote_Activite` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `vote_date`
--
ALTER TABLE `vote_date`
  MODIFY `Id_Vote_Date` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_Article_Id_Type` FOREIGN KEY (`Id_Type`) REFERENCES `type_article` (`Id_Type`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_Commande_Id_Transaction` FOREIGN KEY (`Id_Transaction`) REFERENCES `transaction` (`Id_Transaction`),
  ADD CONSTRAINT `FK_Commande_Id_utilisateur` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`Id_utilisateur`);

--
-- Contraintes pour la table `commentaire_activite`
--
ALTER TABLE `commentaire_activite`
  ADD CONSTRAINT `FK_Commentaire_Activite_Id_Activite` FOREIGN KEY (`Id_Activite`) REFERENCES `activites` (`Id_Activite`),
  ADD CONSTRAINT `FK_Commentaire_Activite_Id_utilisateur` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`Id_utilisateur`);

--
-- Contraintes pour la table `commentaire_photo`
--
ALTER TABLE `commentaire_photo`
  ADD CONSTRAINT `FK_Commentaire_Photo_Id_Photo` FOREIGN KEY (`Id_Photo`) REFERENCES `photo` (`Id_Photo`),
  ADD CONSTRAINT `FK_Commentaire_Photo_Id_utilisateur` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`Id_utilisateur`);

--
-- Contraintes pour la table `contenu`
--
ALTER TABLE `contenu`
  ADD CONSTRAINT `FK_Contenu_Id_Article` FOREIGN KEY (`Id_Article`) REFERENCES `article` (`Id_Article`),
  ADD CONSTRAINT `FK_Contenu_Id_Commande` FOREIGN KEY (`Id_Commande`) REFERENCES `commande` (`Id_Commande`);

--
-- Contraintes pour la table `like_photo`
--
ALTER TABLE `like_photo`
  ADD CONSTRAINT `FK_Like_Photo_Id_Photo` FOREIGN KEY (`Id_Photo`) REFERENCES `photo` (`Id_Photo`),
  ADD CONSTRAINT `FK_Like_Photo_Id_utilisateur` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`Id_utilisateur`);

--
-- Contraintes pour la table `liste_participant`
--
ALTER TABLE `liste_participant`
  ADD CONSTRAINT `FK_Liste_Participant_Id_Activite` FOREIGN KEY (`Id_Activite`) REFERENCES `activites` (`Id_Activite`),
  ADD CONSTRAINT `FK_Liste_Participant_Id_utilisateur` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`Id_utilisateur`);

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `FK_Photo_Id_Activite` FOREIGN KEY (`Id_Activite`) REFERENCES `activites` (`Id_Activite`);

--
-- Contraintes pour la table `proposition_date_i_a`
--
ALTER TABLE `proposition_date_i_a`
  ADD CONSTRAINT `FK_Proposition_Date_I_A_Id_Idee_Activite` FOREIGN KEY (`Id_Idee_Activite`) REFERENCES `idees_activites` (`Id_Idee_Activite`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_Utilisateur_Id_Fonction` FOREIGN KEY (`Id_Fonction`) REFERENCES `fonction` (`Id_Fonction`);

--
-- Contraintes pour la table `vote_activite`
--
ALTER TABLE `vote_activite`
  ADD CONSTRAINT `FK_Vote_Acitivite_Id_Idee_Activite` FOREIGN KEY (`Id_Idee_Activite`) REFERENCES `idees_activites` (`Id_Idee_Activite`),
  ADD CONSTRAINT `FK_Vote_Acitivite_Id_utilisateur` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`Id_utilisateur`);

--
-- Contraintes pour la table `vote_date`
--
ALTER TABLE `vote_date`
  ADD CONSTRAINT `FK_Vote_Date_Id_Date` FOREIGN KEY (`Id_Date`) REFERENCES `proposition_date_i_a` (`Id_Date`),
  ADD CONSTRAINT `FK_Vote_Date_Id_utilisateur` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`Id_utilisateur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

