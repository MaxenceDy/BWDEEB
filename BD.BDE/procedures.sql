DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetActivites`()
    READS SQL DATA
SELECT Id_Activite AS ID, Nom_Activite AS Nom, Date_Activite AS DateA, photo_Activites AS Image FROM activites$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetArticles`()
    READS SQL DATA
SELECT Nom_Article AS Nom, Image_Article AS Image, Id_Article AS ID FROM article$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetDetailPhoto`(IN `VID` INT)
    READS SQL DATA
SELECT Nom_Photo AS Image FROM photo WHERE Id_Photo = VID$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetCommentaires`(IN `VID` INT)
    READS SQL DATA
SELECT Commentaire_P AS Commentaire, Date_Commentaire_Photo AS DateC, Nom_Utilisateur AS Nom, Prenom_Utilisateur AS Prenom FROM commentaire_photo INNER JOIN utilisateur ON commentaire_photo.Id_utilisateur = utilisateur.Id_utilisateur WHERE Id_Photo = VID$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetDetailP`(IN `VID` INT)
    READS SQL DATA
SELECT Nom_Article AS Nom, Description_Article AS Description, Prix_Article AS Prix,  Image_Article AS Image FROM article WHERE Id_Article = VID$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetDetailA`(IN `VID` INT)
    READS SQL DATA
SELECT Id_Activite AS ID, Nom_Activite AS Nom, Date_Activite AS DateA, Description_A AS Description, Prix_Activites AS Prix, photo_Activites AS Image FROM activites WHERE Id_Activite = VID$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetIActivites`()
    READS SQL DATA
SELECT Id_Idee_Activite AS ID, Nom_Idee_Activite AS Nom, Images_I_A AS Image FROM idees_activites$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetLikes`(IN `VID` INT)
    READS SQL DATA
SELECT COUNT(Id_like) AS Likes FROM like_photo WHERE Id_Photo = VID$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetPhotos`()
    READS SQL DATA
SELECT Nom_Photo AS Image FROM photo WHERE Id_Activite = IDA AND Moderation = 1$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetStock`(IN `VID` INT)
    READS SQL DATA
SELECT Taille, Nom_Coloris, Stock FROM (stock_article INNER JOIN taille_article ON stock_article.Id_Taille = taille_article.Id_Taille) INNER JOIN coloris ON coloris.Id_Colors = stock_article.Id_Colors WHERE Id_Article = VID$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetUserLike`(IN `VID` INT)
    READS SQL DATA
SELECT Id_like FROM like_photo INNER JOIN utilisateur ON utilisateur.Id_utilisateur = like_photo.Id_utilisateur WHERE utilisateur.Id_utilisateur = VID$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Inscription`(IN `mdp` VARCHAR(50), IN `nom` TEXT, IN `prenom` TEXT, IN `mail` VARCHAR(50), IN `Avatar` VARCHAR(50), IN `fonction` INT(5) UNSIGNED)
    MODIFIES SQL DATA
INSERT INTO utilisateur (Mdp, Nom_Utilisateur, Prenom_Utilisateur, Mail, Avatar, Id_Fonction) VALUES (mdp, nom, prenom, mail, Images/avatar.jpg, 3)$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Like`(IN `IDU` INT, IN `IDP` INT)
    MODIFIES SQL DATA
INSERT INTO like_photo (Id_utilisateur, Id_Photo) VALUES (IDU, IDP)$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Login`(IN `Vmdp` VARCHAR(50), IN `Vmail` VARCHAR(50))
    READS SQL DATA
SELECT Id_utilisateur FROM utilisateur WHERE Mdp = SHA1(Vmdp) AND Mail = Vmail$$
DELIMITER ;