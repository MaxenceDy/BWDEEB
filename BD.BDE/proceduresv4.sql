DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddArticle`(IN `ID` INT(50), IN `Nom` VARCHAR(50), IN `Descr` VARCHAR(50), IN `Prix` INT(50), IN `IdT` INT(50), IN `Den` VARCHAR(50))
    MODIFIES SQL DATA
INSERT INTO article (Id_Article, Nom_Article, Description_Article, Prix_Article, Id_Type, Denomination) VALUES (ID, Nom, Descr, Prix, IdT, Den)$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteArticle`(IN `ID` INT)
    MODIFIES SQL DATA
DELETE FROM article WHERE Id_Article = ID$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddCommentaire`(IN `Comm` VARCHAR(1000), IN `DateC` DATETIME, IN `IDU` INT, IN `IDP` INT)
    MODIFIES SQL DATA
INSERT INTO commentaire_photo (Commentaire_P, Date_Commentaire_Photo, Id_utilisateur, Id_Photo) VALUES (Comm, DateC, IDU, IDP)$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AjoutPhoto`(IN `Image` VARCHAR(60), IN `Moder` INT, IN `IDA` INT)
    MODIFIES SQL DATA
INSERT INTO photo (Nom_Photo, Moderation, Id_Activite) VALUES (Image, Moder, IDA)$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddSuggestion`(IN `Sugg` VARCHAR(500), IN `IDU` INT)
    MODIFIES SQL DATA
INSERT INTO suggestion (Suggestion, Id_utilisateur) VALUES (Sugg, IDU)$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddPhoto`(IN `Nom` VARCHAR(50), IN `ID` INT)
    MODIFIES SQL DATA
INSERT INTO photo (Nom_Photo, Moderation, Id_Activite) VALUES (Nom, 0, ID)$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetActiviteValidite`(IN `ID` INT)
    READS SQL DATA
SELECT Valide FROM activites WHERE Id_Activite = ID$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetActivites`()
    READS SQL DATA
SELECT Id_Activite AS ID, Nom_Activite AS Nom, Date_Activite AS DateA, photo_Activites AS Image FROM activites WHERE Valide = 2$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllUser`()
SELECT Nom_Utilisateur AS Nom, Prenom_Utilisateur AS Prenom, Id_utilisateur AS ID
FROM utilisateur
DELIMITER$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllUserInfo`()
    READS SQL DATA
SELECT Nom_Utilisateur AS Nom, Prenom_Utilisateur AS Prenom, Mail, fonction.Nom_Fonction AS funct 
FROM utilisateur, fonction 
WHERE fonction.Id_Fonction=utilisateur.Id_Fonction
AND utilisateur.Id_Fonction <> 3$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetArtAdmin`()
    READS SQL DATA
SELECT Nom_Article AS Image, Denomination AS Nom, Prix_Article AS Article, Id_Article AS ID FROM article$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetArticles`()
    READS SQL DATA
SELECT Nom_Article AS Image, Denomination AS Nom, Id_Article AS ID FROM article$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAvatar`()
    READS SQL DATA
SELECT Nom_Utilisateur AS Nom, Prenom_Utilisateur AS Prenom, Avatar, Id_utilisateur AS ID FROM utilisateur WHERE Avatar <> 'Images/avatar.jpg' ORDER BY utilisateur.Id_utilisateur DESC$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetCommentaires`(IN `VID` INT)
    READS SQL DATA
SELECT Commentaire_P AS Commentaire, Date_Commentaire_Photo AS DateC, Nom_Utilisateur AS Nom, Prenom_Utilisateur AS Prenom FROM commentaire_photo INNER JOIN utilisateur ON commentaire_photo.Id_utilisateur = utilisateur.Id_utilisateur WHERE Id_Photo = VID ORDER BY DateC DESC$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetCurrentAvatar`(IN `Vmail` VARCHAR(50))
    READS SQL DATA
SELECT Avatar FROM utilisateur WHERE Mail = Vmail$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetDetailA`(IN `VID` INT)
    READS SQL DATA
SELECT Id_Activite AS ID, Nom_Activite AS Nom, Date_Activite AS DateA, Description_A AS Description, Prix_Activites AS Prix, photo_Activites AS Image, Valide FROM activites WHERE Id_Activite = VID$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetDetailP`(IN `VID` INT)
    READS SQL DATA
SELECT Denomination AS Nom, Description_Article AS Description, Prix_Article AS Prix, Nom_Article AS Image FROM article WHERE Id_Article = VID$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetDetailPhoto`(IN `VID` INT)
    READS SQL DATA
SELECT Nom_Photo AS Image FROM photo WHERE Id_Photo = VID$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetFonction`()
SELECT Nom_Fonction AS Funct FROM fonction 
ORDER BY Id_Fonction$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetIActivites`()
    READS SQL DATA
SELECT Id_Activite AS ID, Nom_Activite AS Nom, Date_Activite AS DateA, photo_Activites AS Image FROM activites WHERE Valide = 0$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetIDDateVote`(IN `Vdate` DATETIME)
    READS SQL DATA
SELECT Id_Date AS ID FROM proposition_date_i_a WHERE Date_I_A = Vdate$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetInsActivite`()
    READS SQL DATA
SELECT Id_Activite AS ID, Nom_Activite AS Nom, Date_Activite AS DateA, photo_Activites AS Image FROM activites WHERE Valide = 1$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetInscriptionActi`(IN `IDA` INT, IN `IDU` INT)
    READS SQL DATA
SELECT Id_Payement_A AS ID FROM liste_participant WHERE Id_Activite = IDA AND Id_utilisateur = IDU$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetLikes`(IN `VID` INT)
    READS SQL DATA
SELECT COUNT(Id_like) AS Likes FROM like_photo WHERE Id_Photo = VID$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetModerationActivites`()
    READS SQL DATA
SELECT Id_Activite AS ID, Nom_Activite AS Nom, Date_Activite AS DateA, photo_Activites AS Image, Valide FROM activites ORDER BY Valide$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetModerationPhotos`()
    READS SQL DATA
SELECT Nom_Photo AS Image, Moderation, Id_Photo AS IDv, Id_Photo AS IDs FROM photo ORDER BY Moderation$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetParticipants`(IN `ID` INT)
    READS SQL DATA
SELECT Nom_Utilisateur AS Nom, Prenom_Utilisateur AS Prenom FROM utilisateur INNER JOIN liste_participant ON utilisateur.Id_utilisateur = liste_participant.Id_utilisateur WHERE Id_Activite = ID$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetPhotos`(IN `IDA` INT)
    READS SQL DATA
SELECT Nom_Photo AS Image, Id_Photo as ID FROM photo WHERE Id_Activite = IDA AND Moderation = 1$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetPropDate`(IN `ID` INT)
    READS SQL DATA
SELECT Date_I_A AS DateA FROM proposition_date_i_a WHERE Id_Activite = ID$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetStock`(IN `VID` INT)
    READS SQL DATA
SELECT Taille, Nom_Coloris, Stock FROM (stock_article INNER JOIN taille_article ON stock_article.Id_Taille = taille_article.Id_Taille) INNER JOIN coloris ON coloris.Id_Colors = stock_article.Id_Colors WHERE Id_Article = VID$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetUserAllInfo`(IN `Vmail` VARCHAR(50))
    READS SQL DATA
SELECT Nom_Utilisateur AS Nom, Prenom_Utilisateur As Prenom, Date_Naissance AS DateN, Adresse_Postale AS Adresse, Code_Postal As CodeP, Ville FROM utilisateur WHERE Mail = Vmail$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetUserFonction`(IN `Vmail` VARCHAR(50))
    READS SQL DATA
SELECT Id_Fonction AS Funct FROM utilisateur WHERE Mail = Vmail$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetUserID`(IN `Vmail` VARCHAR(50))
    READS SQL DATA
SELECT Id_utilisateur AS ID FROM utilisateur WHERE Mail = Vmail$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetUserInfo`(IN `Vmail` VARCHAR(50))
    READS SQL DATA
SELECT Nom_Utilisateur AS Nom, Prenom_Utilisateur AS Prenom, Avatar FROM utilisateur WHERE Mail = Vmail$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetUserLike`(IN `Vmail` VARCHAR(50), IN `ID` INT)
    READS SQL DATA
SELECT Id_like FROM like_photo INNER JOIN utilisateur ON utilisateur.Id_utilisateur = like_photo.Id_utilisateur WHERE utilisateur.Mail = Vmail AND Id_Photo = ID$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetUserVote`(IN `IDA` INT, IN `IDU` INT)
    READS SQL DATA
SELECT Id_utilisateur FROM vote_activite WHERE Id_Activite = IDA AND Id_utilisateur = IDU$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Inscription`(IN `mdp` VARCHAR(50), IN `nom` TEXT, IN `prenom` TEXT, IN `mail` VARCHAR(50), IN `fonction` INT(5) UNSIGNED)
    MODIFIES SQL DATA
INSERT INTO utilisateur (Mdp, Nom_Utilisateur, Prenom_Utilisateur, Mail, Id_Fonction) VALUES (SHA1(mdp), nom, prenom, mail, fonction)$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `InscriptionActi`(IN `Payer` INT, IN `IDA` INT, IN `IDU` INT)
    MODIFIES SQL DATA
INSERT INTO liste_participant (Payer_A, Id_Activite, Id_utilisateur) VALUES (Payer, IDA, IDU)$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `LikeP`(IN `IDU` INT, IN `IDP` INT)
    MODIFIES SQL DATA
INSERT INTO like_photo (Id_utilisateur, Id_Photo) VALUES (IDU, IDP)$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Login`(IN `Vmdp` VARCHAR(50), IN `Vmail` VARCHAR(50))
    READS SQL DATA
SELECT Id_utilisateur FROM utilisateur WHERE Mdp = SHA1(Vmdp) AND Mail = Vmail$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SetAvatar`(IN `Image` VARCHAR(50), IN `Vmail` VARCHAR(50))
    MODIFIES SQL DATA
UPDATE utilisateur
SET Avatar = Image
WHERE Mail = Vmail$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateInfos`(IN `nom` TEXT, IN `prenom` TEXT, IN `dateN` VARCHAR(50), IN `adresse` VARCHAR(50), IN `codeP` INT, IN `ValVille` VARCHAR(50), IN `Vmail` VARCHAR(50))
    MODIFIES SQL DATA
UPDATE utilisateur
SET Nom_Utilisateur = nom, Prenom_Utilisateur = prenom, Date_Naissance = dateN, Adresse_Postale = adresse, Code_Postal = codeP, Ville = ValVille
WHERE Mail = Vmail$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `VoteA`(IN `IDA` INT, IN `IDU` INT)
    MODIFIES SQL DATA
INSERT INTO vote_activite (Id_Activite, Id_utilisateur) VALUES (IDA, IDU)$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `VoteD`(IN `IDD` INT, IN `IDU` INT)
    MODIFIES SQL DATA
INSERT INTO vote_date (Id_Date, Id_utilisateur) VALUES (IDD, IDU)$$
DELIMITER ;
