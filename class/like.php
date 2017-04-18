<?php
	
	require_once('singleton.php');
	
	class like{
		
		private $co = null;
		
		function __construct(){
			
			$this->co = singleton::getInstance();
			
		}
		
        function Like($Mail, $Id_Photo){

			//on prépare la requête
			$Query = $this->co->prepare('CALL Like(:Mail, :IDP)');

			//on choisi les paramètres
			$Query->bindParam(':Mail', $Mail);
			$Query->bindParam(':IDP', $Id_Photo);

			//on execute
			$Query->execute();

			//fin de la fonction
			$Query->closeCursor();
		}
		
		function GetUserLike($mail, $id){

			//on prépare la requête
			$Query = $this->co->prepare('CALL GetUserLike(:mail, :id)');

			//on choisi les paramètres
			$Query->bindParam(':mail', $mail);
			$Query->bindParam(':id', $id);
            
			//on execute
			$Query->execute();
   			$array = $Query->fetchAll();

			//fin de la fonction
			$Query->closeCursor();
			return $array;
		}
		
		
		function CountLike($Id_Photo){
			//on prépare la requête
			$Query = $this->co->prepare('CALL GetLikes(:Id_Photo)');

			//on choisi les paramètres
			$Query->bindParam(':Id_Photo', $Id_Photo);

			//on execute
			$Query->execute();
			$array = $Query->fetchAll();
			//fin de la fonction
			 
			$Query->closeCursor();
			return $array;
		}
	}
?>