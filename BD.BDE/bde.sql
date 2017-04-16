-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 16 Avril 2017 à 09:46
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

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
  `Prix_Activites` int(11) NOT NULL,
  `photo_Activites` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `activites`
--

INSERT INTO `activites` (`Id_Activite`, `Nom_Activite`, `Date_Activite`, `Description_A`, `Prix_Activites`, `photo_Activites`) VALUES
(1, 'Geekobowling 18 01 2017', '2017-01-18', 'Venez affronter d\'autre promo d\'informatique à une super soirée bowling, color-bowl de Reims. Venez nombreux', 15, 'Images/Activites/geekobowling.01.2017.png'),
(2, 'LAN#7 7-8 04 2017', '2017-04-07', 'EXIA LAN#7, Venez vous affontez sur nos tournois pour rencontrés des teams de votre niveaux sur Counter Strike : Global Offensive, ou League Of Legend, ou encore Overwatch et tenter de remporter les différents lots :\r\nCS:GO	LOL	OW\r\n750	500	240\r\n500	350	180\r\n300 	150	60', 15, 'Images/Activites/LAN.04.2017.jpg');

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

--
-- Contenu de la table `coloris`
--

INSERT INTO `coloris` (`Id_Colors`, `Nom_Coloris`) VALUES
(1, 'Gris/Noir'),
(2, 'Rouge/Noir'),
(3, 'Unique'),
(4, 'Noir'),
(5, 'Blanc'),
(6, 'Gris');

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

--
-- Contenu de la table `commentaire_activite`
--

INSERT INTO `commentaire_activite` (`Id_Commentaire_A`, `Commentaire_A`, `Date_Commentaire_Activite`, `Id_Activite`, `Id_utilisateur`) VALUES
(1, 'Trop cool cet soirée, bowling même nul on s\'éclate! A refaire!', '2017-01-20', 1, 2);

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

--
-- Contenu de la table `commentaire_photo`
--

INSERT INTO `commentaire_photo` (`Id_Commentaire_P`, `Commentaire_P`, `Date_Commentaire_Photo`, `Id_utilisateur`, `Id_Photo`) VALUES
(1, 'Super belle ces piste!!!', '2017-01-25', 4, 3),
(2, 'Qui lance sur la photo?', '2017-01-19', 3, 4);

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

--
-- Contenu de la table `idees_activites`
--

INSERT INTO `idees_activites` (`Id_Idee_Activite`, `Nom_Idee_Activite`, `Valide`, `Description_I_A`, `Prix_Idees_Activites`) VALUES
(1, 'LAN#8 25-26 11 2017', 0, 'La plus grosse LAN de la region', 150),
(2, 'Ping pong', 0, 'Ping pong a lexia', 1);

-- --------------------------------------------------------

--
-- Structure de la table `like_photo`
--

CREATE TABLE `like_photo` (
  `Id_like` int(11) NOT NULL,
  `Id_utilisateur` int(11) NOT NULL,
  `Id_Photo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `like_photo`
--

INSERT INTO `like_photo` (`Id_like`, `Id_utilisateur`, `Id_Photo`) VALUES
(1, 3, 4),
(2, 4, 3);

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

--
-- Contenu de la table `liste_participant`
--

INSERT INTO `liste_participant` (`Id_Payement_A`, `Payer_A`, `Id_Activite`, `Id_utilisateur`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 2),
(3, 1, 1, 4),
(4, 1, 2, 9),
(5, 1, 2, 10),
(6, 1, 2, 8),
(7, 1, 2, 11);

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `Id_Photo` int(11) NOT NULL,
  `Nom_Photo` char(50) NOT NULL,
  `Moderation` tinyint(1) NOT NULL,
  `Id_Activite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `photo`
--

INSERT INTO `photo` (`Id_Photo`, `Nom_Photo`, `Moderation`, `Id_Activite`) VALUES
(1, 'Images/Activites/DCM1000.jpg', 1, 1),
(2, 'Images/Activites/DCM1001.jpg', 1, 1),
(3, 'Images/Activites/DCM1002.jpg', 1, 1),
(4, 'Images/Activites/DCM1003.jpg', 1, 1),
(5, 'Images/Activites/DCM1004.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `proposition_date_i_a`
--

CREATE TABLE `proposition_date_i_a` (
  `Id_Date` int(11) NOT NULL,
  `Date_I_A` date DEFAULT NULL,
  `Id_Idee_Activite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `proposition_date_i_a`
--

INSERT INTO `proposition_date_i_a` (`Id_Date`, `Date_I_A`, `Id_Idee_Activite`) VALUES
(1, '2017-04-20', 2),
(2, '2017-04-27', 2),
(3, '2017-05-04', 2),
(4, '2017-05-11', 2);

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

--
-- Contenu de la table `stock_article`
--

INSERT INTO `stock_article` (`Stock`, `Id_Taille`, `Id_Colors`, `Id_Article`) VALUES
(1, 1, 3, 2),
(5, 1, 3, 4),
(5, 1, 3, 7),
(5, 1, 3, 8),
(5, 1, 3, 9),
(15, 1, 3, 10),
(2, 1, 3, 11),
(5, 1, 4, 5),
(5, 1, 4, 6),
(5, 1, 5, 5),
(5, 1, 5, 6),
(5, 1, 6, 5),
(5, 1, 6, 6),
(1, 2, 1, 1),
(1, 2, 2, 1),
(1, 3, 1, 1),
(1, 3, 2, 1),
(26, 3, 3, 3),
(5, 4, 1, 1),
(5, 4, 2, 1),
(10, 5, 1, 1),
(10, 5, 2, 1),
(6, 6, 1, 1),
(6, 6, 2, 1),
(0, 6, 3, 3),
(2, 7, 1, 1),
(2, 7, 2, 1),
(1, 8, 1, 1),
(1, 8, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `taille_article`
--

CREATE TABLE `taille_article` (
  `Id_Taille` int(11) NOT NULL,
  `Taille` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `taille_article`
--

INSERT INTO `taille_article` (`Id_Taille`, `Taille`) VALUES
(1, 'Unique'),
(2, 'XS'),
(3, 'S'),
(4, 'M'),
(5, 'L'),
(6, 'XL'),
(7, 'XXL'),
(8, 'XXXL');

-- --------------------------------------------------------

--
-- Structure de la table `transaction`
--

CREATE TABLE `transaction` (
  `Id_Transaction` int(11) NOT NULL,
  `Montant` int(11) NOT NULL,
  `Type_Transaction` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `transaction`
--

INSERT INTO `transaction` (`Id_Transaction`, `Montant`, `Type_Transaction`) VALUES
(1, 30, 'Espèces'),
(2, 30, 'Carte'),
(3, 36, 'Espèces'),
(4, 36, 'Carte'),
(5, 2, 'Espèces'),
(6, 2, 'Carte'),
(7, 20, 'Espèces'),
(8, 20, 'Carte'),
(9, 5, 'Espèces'),
(10, 5, 'Carte'),
(11, 7, 'Espèces'),
(12, 7, 'Carte'),
(13, 10, 'Espèces'),
(14, 10, 'Carte'),
(15, 15, 'Espèces'),
(16, 15, 'Carte'),
(17, 60, 'Espèces'),
(18, 60, 'Carte');

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

--
-- Contenu de la table `vote_activite`
--

INSERT INTO `vote_activite` (`Id_Vote_Activite`, `Id_Idee_Activite`, `Id_utilisateur`) VALUES
(1, 1, 1),
(2, 1, 2),
(12, 1, 3),
(13, 1, 4),
(14, 1, 5),
(15, 1, 7),
(16, 1, 8),
(17, 1, 9),
(18, 2, 3),
(19, 2, 7),
(20, 2, 9),
(21, 2, 10);

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
-- Contenu de la table `vote_date`
--

INSERT INTO `vote_date` (`Id_Vote_Date`, `Id_utilisateur`, `Id_Date`) VALUES
(1, 1, 2),
(2, 4, 3),
(3, 7, 4),
(4, 10, 4);

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
  ADD PRIMARY KEY (`Id_Transaction`);

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
  MODIFY `Id_Activite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `Id_Article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `coloris`
--
ALTER TABLE `coloris`
  MODIFY `Id_Colors` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `Id_Commande` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commentaire_activite`
--
ALTER TABLE `commentaire_activite`
  MODIFY `Id_Commentaire_A` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `commentaire_photo`
--
ALTER TABLE `commentaire_photo`
  MODIFY `Id_Commentaire_P` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `fonction`
--
ALTER TABLE `fonction`
  MODIFY `Id_Fonction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `idees_activites`
--
ALTER TABLE `idees_activites`
  MODIFY `Id_Idee_Activite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `like_photo`
--
ALTER TABLE `like_photo`
  MODIFY `Id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `liste_participant`
--
ALTER TABLE `liste_participant`
  MODIFY `Id_Payement_A` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `Id_Photo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `proposition_date_i_a`
--
ALTER TABLE `proposition_date_i_a`
  MODIFY `Id_Date` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `taille_article`
--
ALTER TABLE `taille_article`
  MODIFY `Id_Taille` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `Id_Transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
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
  MODIFY `Id_Vote_Activite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `vote_date`
--
ALTER TABLE `vote_date`
  MODIFY `Id_Vote_Date` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
