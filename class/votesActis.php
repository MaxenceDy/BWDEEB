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

		function ListeInsActis(){
			//on prépare la requête
			$Query = $this->co->prepare('CALL GetInsActivite()');
			
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

		function DetailPhoto($id){
			//on prépare la requête
			$Query = $this->co->prepare('CALL GetDetailPhoto(:ID)');
			
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

		function Validite($id){
			//on prépare la requête
			$Query = $this->co->prepare('CALL GetActiviteValidite(:ID)');
			
			//On choisit les paramètres
			$Query->bindparam(':ID', $id);

			//on execute
			$Query->execute();
            $array = $Query->fetchAll();

			//fin de la fonction
			$Query->closeCursor();
            return $array;
		}
		
		function GetPropDate($id){
			//on prépare la requête
			$Query = $this->co->prepare('CALL GetPropDate(:ID)');
			
			//On choisit les paramètres
			$Query->bindparam(':ID', $id);

			//on execute
			$Query->execute();
            $array = $Query->fetchAll();

			//fin de la fonction
			$Query->closeCursor();
            return $array;
		}

		function GetParticipants($id){
			//on prépare la requête
			$Query = $this->co->prepare('CALL GetParticipants(:ID)');
			
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