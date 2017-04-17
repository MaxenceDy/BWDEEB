<?php 
class procedures
{
    function inscription($password, $nom, $prenom, $mail, $co){
        //on prépare la requête
        $Query = $co->prepare('CALL Inscription(:password, :nom, :prenom, :mail, 1)');

        //on choisi les paramètres
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':mail', $mail);

        //on execute
        $Query->execute();

        //fin de la fonction
        $Query->closeCursor();
        return $array;
    }

    function activites($co){
        //on prépare la requête
        $Query = $co->prepare('SELECT Nom_Idee_Activite AS Nom, Description_I_A AS Description, Prix_Idees_Activites AS Prix FROM idees_activites');

        //on execute
        $Query->execute();

        $array = $Query->fetchAll();     

        //fin de la fonction
        $Query->closeCursor();    
        return $array;
    }
    

}
?>