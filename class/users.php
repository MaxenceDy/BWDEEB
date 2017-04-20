<?php
	
	require_once('singleton.php');
	
	class users{
		
		private $co = null;
		
		function __construct(){
			
			$this->co = singleton::getInstance();
			
		}
		
		
		//enregistre l'utilisateur en BDD
		function SignUp($mail, $nom, $prenom, $password){
			//on prépare la requête
			$Query = $this->co->prepare('CALL Inscription(:mdp, :nom, :prenom, :mail, :fonction)');

			//on choisi les paramètres
			$Query->bindParam(':mail', $mail);			
			$Query->bindParam(':nom', $nom);
			$Query->bindParam(':prenom', $prenom);
			$Query->bindParam(':mdp', $password);
			$Query->bindValue(':fonction', '3');

			//on execute
			$Query->execute();

			//fin de la fonction
			$Query->closeCursor();
		}
		
		
		//vérifie que l'utilisateur est bien inscrit dans la BDD avant de le connecté
		function SignIn($password, $mail){
			//on prépare la requête
			$Query = $this->co->prepare('CALL Login(:password, :mail)');

			//on choisi les paramètres
			$Query->bindParam(':password', $password);
			$Query->bindParam(':mail', $mail);

			//on execute
			$Query->execute();
			$array = $Query->fetchAll();
			//fin de la fonction
			 
			$Query->closeCursor();
			return $array;
		}
		
		
		//enregistre la suggestion de l'utilisateur en BDD pour traitement futur par un admin/BDE, etc
		function Suggestion($sugg, $id){
			//on prépare la requête
			$Query = $this->co->prepare('CALL AddSuggestion(:sugg, :id)');

			//on choisi les paramètres
			$Query->bindParam(':sugg', $sugg);
			$Query->bindParam(':id', $id);
			
			try{
				//on execute
				$Query->execute();
			}
			catch (PDOException $e){ 
				echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); 
			}
			//fin de la fonction
			$Query->closeCursor();
		}
		
		
		//récupère la liste des fonction existante
		function GetFonction(){
			try {
				$Query = $this->co->prepare('CALL GetFonction()');

				$Query->execute();
				$rowAll = $Query->fetchAll();
				
				return $rowAll;
			} 
			catch (PDOException $e){ 
				echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); 
			}
		}
		
		
		//récupère la liste de tous les utilisateur inscrit
		function getAllUser(){
			try {
				$Query = $this->co->prepare('CALL getAllUser()');

				$Query->execute();
				$rowAll = $Query->fetchAll();
				
				return $rowAll;
			} 
			catch (PDOException $e){ 
				echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); 
			}
		}
		
		
		//même chose que GetAllUser mais avec des info en plus
		function GetAllUserInfo(){
			try {
				$Query = $this->co->prepare('CALL GetAllUserInfo()');

				$Query->execute();
				$rowAll = $Query->fetchAll();
				
				return $rowAll;
			} 
			catch (PDOException $e){ 
				echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); 
			}
		}
		
		
		//récupère des info de l'utilisateur connecté pour header (nom, prénom, avatar)
		function GetUserInfo($mail){
			//on prépare la requête
			$Query = $this->co->prepare('CALL GetUserInfo(:mail)');

			//on choisi les paramètres
			$Query->bindParam(':mail', $mail);

			//on execute
			$Query->execute();
			$array = $Query->fetchAll();
			//fin de la fonction
			 
			$Query->closeCursor();
			return $array;
		}
		
		
		//récupère les info de l'utilisateur connecté pour la page compte.php pour modification des info perso
		function GetUserAllInfo($mail){
			//on prépare la requête
			$Query = $this->co->prepare('CALL GetUserAllInfo(:mail)');

			//on choisi les paramètres
			$Query->bindParam(':mail', $mail);

			//on execute
			$Query->execute();
			$array = $Query->fetchAll();
			//fin de la fonction
			 
			$Query->closeCursor();
			return $array;
		}
		
		
		//récupère l'ID de l'utilisateur connecté
		function GetUserID($mail){
			//on prépare la requête
			$Query = $this->co->prepare('CALL GetUserID(:mail)');

			//on choisi les paramètres
			$Query->bindParam(':mail', $mail);

			//on execute
			$Query->execute();
			$array = $Query->fetchAll();
			//fin de la fonction
			 
			$Query->closeCursor();
			return $array;
		}
		
		
		//récupère la fonction de l'utilisateur connecté
		function GetUserFonction($mail){
			
			//on prépare la requête
			$Query = $this->co->prepare('CALL GetUserFonction(:mail)');

			//on choisi les paramètres
			$Query->bindParam(':mail', $mail);

			//on execute
			$Query->execute();
			$array = $Query->fetchAll();
			//fin de la fonction
			 
			$Query->closeCursor();
			return $array;
			
		}
		
		
		//enregistre le nouvel avatar de l'utilisateur
		function SetAvatar($avatar, $mail){
			//on prépare la requête
			$Query = $this->co->prepare('CALL SetAvatar(:avatar, :mail)');

			//on choisi les paramètres
			$Query->bindParam(':avatar', $avatar);
			$Query->bindParam(':mail', $mail);
			
			try{
				//on execute
				$Query->execute();
			}
			catch (PDOException $e){ 
				echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); 
			}
			//fin de la fonction
			$Query->closeCursor();
		}

		
		//récupère l'avatar actuel de l'utilisateur
		function GetCurrAvatar($mail){
			//on prépare la requête
			$Query = $this->co->prepare('CALL GetCurrentAvatar(:mail)');

			//on choisi les paramètres
			$Query->bindParam(':mail', $mail);
			
			try{
				//on execute
				$Query->execute();
			}
			catch (PDOException $e){ 
				echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); 
			}
			//fin de la fonction
			$array = $Query->fetchAll();
			$Query->closeCursor();

			return $array;
		}
		
		
		//enregistre la modification des info de l'utilisateur
		function UpdateInfo($nom, $prenom, $date, $adresse, $code, $ville, $mail){
			//on prépare la requête
			$Query = $this->co->prepare('CALL UpdateInfos(:nom, :prenom, :date, :adresse, :code, :ville, :Vmail)');

			//on choisi les paramètres
			$Query->bindParam(':nom', $nom);
			$Query->bindParam(':prenom', $prenom);
			$Query->bindParam(':Vmail', $mail);
			
			//verif valeur date
			if($date == '') {
				$Query->bindValue(':date', NULL, PDO::PARAM_NULL);
			}
			else{
				$Query->bindParam(':date', $date);
			}
			
			//verif valeur adresse
			if($adresse == '') {
				$Query->bindValue(':adresse', NULL, PDO::PARAM_NULL);
			}
			else{
				$Query->bindParam(':adresse', $adresse);
			}
			
			//verif valeur code
			if($code == '') {
				$Query->bindValue(':code', NULL, PDO::PARAM_NULL);
			}
			else{
				$Query->bindParam(':code', $code);
			}
			
			// verif valeur ville
			if($ville == '') {
				$Query->bindValue(':ville', NULL, PDO::PARAM_NULL);
			}
			else{
				$Query->bindParam(':ville', $ville);
			}
			
			
			try{
				//on execute
				$Query->execute();
			}
			catch (PDOException $e){ 
				echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); 
			}
			//fin de la fonction
			$Query->closeCursor();
		}
	}
?>