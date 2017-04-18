<?php
	
	require_once('singleton.php');
	
	class Photo{
		
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
	}
?>
