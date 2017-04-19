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

		function AddCommentaire($Comm, $DateC, $IDU, $IDP){
			//on prépare la requête
			$Query = $this->co->prepare('CALL AddCommentaire(:Comm, :DateC, :IDU, :IDP)');
			
			//On choisit les paramètres
			$Query->bindparam(':Comm', $Comm);
			$Query->bindparam(':DateC', $DateC);
			$Query->bindparam(':IDU', $IDU);
			$Query->bindparam(':IDP', $IDP);

			//on execute
			$Query->execute();

			//fin de la fonction
			$Query->closeCursor();
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

		function GetUserVote($ida, $idu){
			//on prépare la requête
			$Query = $this->co->prepare('CALL GetUserVote(:IDA, :IDU)');
			
			//On choisit les paramètres
			$Query->bindparam(':IDA', $ida);
			$Query->bindparam(':IDU', $idu);

			//on execute
			$Query->execute();
            $array = $Query->fetchAll();

			//fin de la fonction
			$Query->closeCursor();
            return $array;	
		}

		function VoteA($ida, $idu){
			//on prépare la requête
			$Query = $this->co->prepare('CALL VoteA(:IDA, :IDU)');
			
			//On choisit les paramètres
			$Query->bindparam(':IDA', $ida);
			$Query->bindparam(':IDU', $idu);

			try{
				//on execute
				$Query->execute();
			}
			catch (PDOException $e){ 
				echo 'Erreur SQL dans VoteA : '. $e->getMessage().'<br/>'; die(); 
			}
			//fin de la fonction
			$Query->closeCursor();
		}

		function VoteD($idd, $idu){
			//on prépare la requête
			$Query = $this->co->prepare('CALL VoteD(:IDD, :IDU)');
			
			//On choisit les paramètres
			$Query->bindparam(':IDD', $idd);
			$Query->bindparam(':IDU', $idu);

			try{
				//on execute
				$Query->execute();
			}
			catch (PDOException $e){ 
				echo 'Erreur SQL dans VoteD : '. $e->getMessage().'<br/>'; die(); 
			}

			//fin de la fonction
			$Query->closeCursor();
		}

		function GetInscription($ida, $idu){
			//on prépare la requête
			$Query = $this->co->prepare('CALL GetInscriptionActi(:IDA, :IDU)');
			
			//On choisit les paramètres
			$Query->bindparam(':IDA', $ida);
			$Query->bindparam(':IDU', $idu);

			//on execute
			$Query->execute();
            $array = $Query->fetchAll();			

			//fin de la fonction
			$Query->closeCursor();
			return $array;
		}

		function InscriptionActi($paye, $ida, $idu){
			//on prépare la requête
			$Query = $this->co->prepare('CALL InscriptionActi(:Paye, :IDA, :IDU)');
			
			//On choisit les paramètres
			$Query->bindparam(':Paye', $paye);			
			$Query->bindparam(':IDA', $ida);
			$Query->bindparam(':IDU', $idu);

			//on execute
			$Query->execute();

			//fin de la fonction
			$Query->closeCursor();
		}

		function GetIDDateVote($date){
			//on prépare la requête
			$Query = $this->co->prepare('CALL GetIDDateVote(:date)');
			
			//On choisit les paramètres
			$Query->bindparam(':date', $date);

			//on execute
			$Query->execute();
            $array = $Query->fetchAll();			

			//fin de la fonction
			$Query->closeCursor();
			return $array;
		}

		function AjoutPhoto($img, $mod, $ida){
			//on prépare la requête
			$Query = $this->co->prepare('CALL AjoutPhoto(:img, :mod, :ida)');
			
			//On choisit les paramètres
			$Query->bindparam(':img', $img);
			$Query->bindparam(':mod', $mod);
			$Query->bindparam(':ida', $ida);			

			//on execute
			$Query->execute();		

			//fin de la fonction
			$Query->closeCursor();
		}
	}
?>