<?php
	
	require_once('singleton.php');
	
	class users{
		
		private $co = null;
		
		function __construct(){
			
			$this->co = singleton::getInstance();
			
		}
		
		
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
	}
?>