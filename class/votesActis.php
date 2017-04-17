<?php
	
	require('singleton.php');
	
	class votesActis{
		
		private $co = null;
		
		function __construct(){
			
			$this->co = singleton::getInstance();
			
		}
        
		function ListeActivites(){
			//on prépare la requête
			$Query = $this->co->prepare('CALL GetActivites()');

			//on execute
			$Query->execute();
            $array = $Query->fetchAll();

			//fin de la fonction
			$Query->closeCursor();
            return $array;
		}
		
		function ListeIdees(){
			//on prépare la requête
			$Query = $this->co->prepare('CALL GetIActivites()');

			//on execute
			$Query->execute();
            $array = $Query->fetchAll();

			//fin de la fonction
			$Query->closeCursor();
            return $array;
        }

	}
?>