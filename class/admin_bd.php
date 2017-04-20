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
			$Query3 = $this->co->prepare('CALL DeleteLike(:ID)');			
			$Query2 = $this->co->prepare('CALL DeleteCom(:ID)');
			$Query = $this->co->prepare('CALL DeleteImage(:ID)');
			//On choisit les paramètres
			$Query->bindparam(':ID', $id);
			$Query2->bindparam(':ID', $id);
			$Query3->bindparam(':ID', $id);			
			try{
				//on execute
				$Query3->execute();				
				$Query2->execute();
				$Query->execute();

			}
			catch (PDOException $e){ 
				echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); 
			}
			//fin de la fonction
			$Query->closeCursor();
			$Query2->closeCursor();
			$Query3->closeCursor();
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
		
		function DeleteAvatar($id){
			//on prépare la requête
			$Query = $this->co->prepare('CALL DeleteAvatar(:ID)');
			
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

		function AddActivite($nom, $des, $prix, $photo, $val){
			//on prépare la requête
			$Query = $this->co->prepare('CALL AddActivite(:nom, :des, :prix, :photo, :val)');
			
			//On choisit les paramètres
			$Query->bindparam(':nom', $nom);
			$Query->bindparam(':des', $des);
			$Query->bindparam(':prix', $prix);
			$Query->bindparam(':photo', $photo);
			$Query->bindparam(':val', $val);
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

		function AddPropDate($date, $id){
			//on prépare la requête
			$Query = $this->co->prepare('CALL AddPropDate(:date, :id)');
			
			//On choisit les paramètres
			$Query->bindparam(':date', $date);
			$Query->bindparam(':id', $id);
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

		function GetActiID($nom){
			//on prépare la requête
			$Query = $this->co->prepare('CALL GetActiID(:nom)');
			
			//On choisit les paramètres
			$Query->bindparam(':nom', $nom);
			try{
				//on execute
				$Query->execute();
			}
			catch (PDOException $e){ 
				echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); 
			}

			$array = $Query->fetchAll();
			//fin de la fonction
			$Query->closeCursor();
			return $array;
		}
		 
	}
?>
