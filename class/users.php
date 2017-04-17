<?php
	
	require('singleton.php');
	
	class users{
		
		private $co = null;
		
		function __construct(){
			
			$this->co = singleton::getInstance();
			
		}
		
		
		function SignUp($mail, $nom, $prenom, $password){
			//on prépare la requête
			$Query = $this->co->prepare('CALL Inscription(:mdp, :nom, :prenom, :mail)');

			//on choisi les paramètres
			$Query->bindParam(':mail', $mail);			
			$Query->bindParam(':nom', $nom);
			$Query->bindParam(':prenom', $prenom);
			$Query->bindParam(':mdp', $password);

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
		
		
		
		
		
		/*
		function getCategorie(){
			
			return $this->co->query("select * from categorie")->fetchAll();
			
		}
		
		function delCategorie($ID){
			
			return $this->co->exec("DELETE FROM categorie WHERE id=".$ID);
			
		}
		
		function addCategorie($nom){
			
			return $this->co->exec("INSERT INTO `categorie` (`id`, `nom`) VALUES (NULL, '".$nom."')");
			
		}*/
		
		
		
	}
?>