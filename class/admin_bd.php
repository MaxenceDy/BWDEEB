<?php
	
	require_once('singleton.php');
	
	class Administration{
		
		private $co = null;
		
		function __construct(){
			
			$this->co = singleton::getInstance();
			
		}
        
		function GetModerationPhotos(){
			try {
				$Query = $this->co->prepare('CALL GetModerationPhotos()');

				$Query->execute();
				$rowAll = $Query->fetchAll();
				
				return $rowAll;
			} 
			catch (PDOException $e){ 
				echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); 
			}
		}

        function GetAvatar(){
			try {
				$Query = $this->co->prepare('CALL GetAvatar()');

				$Query->execute();
				$rowAll = $Query->fetchAll();
				
				return $rowAll;
			} 
			catch (PDOException $e){ 
				echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); 
			}
		}
		
		function GetArtAdmin(){
			try {
				$Query = $this->co->prepare('CALL GetArtAdmin()');

				$Query->execute();
				$rowAll = $Query->fetchAll();
				
				return $rowAll;
			} 
			catch (PDOException $e){ 
				echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); 
			}
		}


		function GetModerationActivites(){
			try {
				$Query = $this->co->prepare('CALL GetModerationActivites()');

				$Query->execute();
				$rowAll = $Query->fetchAll();
				
				return $rowAll;
			} 
			catch (PDOException $e){ 
				echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); 
			}
		}

		function DeleteImage($id){
			//on prépare la requête
			$Query = $this->co->prepare('CALL DeleteImage(:ID)');
			
			//On choisit les paramètres
			$Query->bindparam(':ID', $id);

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
		
		function DeleteArticle($id){
			//on prépare la requête
			$Query = $this->co->prepare('CALL DeleteArticle(:ID)');
			
			//On choisit les paramètres
			$Query->bindparam(':ID', $id);

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
		
		function ValideImage($id){
			//on prépare la requête
			$Query = $this->co->prepare('CALL ValideImage(:ID)');
			
			//On choisit les paramètres
			$Query->bindparam(':ID', $id);

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
		
		function ModificationFonction($idf, $idu){
			//on prépare la requête
			$Query = $this->co->prepare('CALL ModificationFonction(:IDf, IDu)');
			
			//On choisit les paramètres
			$Query->bindparam(':IDf', $idf);
			$Query->bindparam(':IDu', $idu);

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
