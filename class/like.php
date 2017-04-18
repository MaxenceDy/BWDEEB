<?php
	
	require_once('singleton.php');
	
	class like{
		
		private $co = null;
		
		function __construct(){
			
			$this->co = singleton::getInstance();
			
		}
		
        function Like($id, $Id_Photo){

			//on prépare la requête
			$Query = $this->co->prepare('CALL LikeP(:id, :IDP)');

			//on choisi les paramètres
			$Query->bindParam(':id', $id);
			$Query->bindParam(':IDP', $Id_Photo);

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