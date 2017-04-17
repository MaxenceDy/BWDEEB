<?php
	
	require('singleton.php');
	
	class articles{
		
		private $co = null;
		
		function __construct(){
			
			$this->co = singleton::getInstance();
			
		}
        
		function ListeArticles(){
			//on prépare la requête
			$Query = $this->co->prepare('CALL GetArticles()');

			//on execute
			$Query->execute();
            $array = $Query->fetchAll();

			//fin de la fonction
			$Query->closeCursor();
            return $array;
		}
		
	}
?>