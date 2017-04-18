<?php
	
	require_once('singleton.php');
	
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

		function DetailActi($id){
			//on prépare la requête
			$Query = $this->co->prepare('CALL GetDetailA(:ID)');
			
			//On choisit les paramètres
			$Query->bindparam(':ID', $id);

			//on execute
			$Query->execute();
            $array = $Query->fetchAll();

			//fin de la fonction
			$Query->closeCursor();
            return $array;
		}

		function PhotosActis($id){
			//on prépare la requête
			$Query = $this->co->prepare('CALL GetPhotos(:ID)');
			
			//On choisit les paramètres
			$Query->bindparam(':ID', $id);

			//on execute
			$Query->execute();
            $array = $Query->fetchAll();

			//fin de la fonction
			$Query->closeCursor();
            return $array;
		}

		function Commentaires($id){
			//on prépare la requête
			$Query = $this->co->prepare('CALL GetCommentaires(:ID)');
			
			//On choisit les paramètres
			$Query->bindparam(':ID', $id);

			//on execute
			$Query->execute();
            $array = $Query->fetchAll();

			//fin de la fonction
			$Query->closeCursor();
            return $array;
		}

		
	}
?>