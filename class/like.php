<?php
	
	require('singleton.php');
	
	class like{
		
		private $co = null;
		
		function __construct(){
			
			$this->co = singleton::getInstance();
			
		}
		
        function Like($Id_User, $Id_Photo){

			//on prépare la requête
			$Query = $this->co->prepare('CALL Like(:IDU, :IDP)');

			//on choisi les paramètres
			$Query->bindParam(':IDU', $Id_User);
			$Query->bindParam(':IDP', $Id_Photo);

			//on execute
			$Query->execute();

			//fin de la fonction
			$Query->closeCursor();
		}
		
		function GetUserLike($Id_User){

			//on prépare la requête
			$Query = $this->co->prepare('CALL GetUserLike(:VID)');

			//on choisi les paramètres
			$Query->bindParam(':VID', $Id_User);
            
			//on execute
			$Query->execute();
   			$array = $Query->fetchAll();

			//fin de la fonction
			$Query->closeCursor();
		}
		
		
		function CountLike($Id_Photo){
			//on prépare la requête
			$Query = $this->co->prepare('CALL Login(:Id_Photo)');

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