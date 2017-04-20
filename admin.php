<?php include('verification.php');
	require('class/users.php');
	require('class/admin_bd.php');
	$Administration = new Administration();
	$users = new users();

	if(!isset($_SESSION['email'])){
		header('Location:erreur.php');
	}
	else{
		$fonction = $users->GetUserFonction($_SESSION['email']);
		if($fonction[0]['Funct'] == 3){
			header('Location:erreur.php');			
		}
	}

?>

<?php 

	if(isset($_POST['Valider'])){
		foreach($_POST['Valider'] as $key => $value)
		{
		
			$Administration->ValideImage($value);
		
		}
	}

	if(isset($_POST['Supprimer'])){
		foreach($_POST['Supprimer'] as $key => $value)
		{

			$Administration->DeleteImage($value);

		}
	}

	
	if(isset($_POST['Telecharger'])){
		
		$ZipName = 'PhotoBDE.zip';
		$zip = new ZipArchive();
		$zip->open($ZipName, ZipArchive::CREATE);
		
		foreach($_POST['Telecharger'] as $key => $value)
		{
			$zip->addFile($value);
		}
		
		$zip->close();
		
		header('Content-Type: application/octet-stream');
		header('Content-disposition: filename="'.basename($ZipName).'"');
		header('Content-Length: ' . filesize($ZipName));
		readfile($ZipName);
		exit;
	}
	

	if(isset($_POST['SupprimerA'])){
		foreach($_POST['SupprimerA'] as $key => $value)
		{
			$Administration->DeleteAvatar($value);
		}
	}

	//AJOUT ACTIVITE

	// Constantes
	define('TARGET', 'Images/Activites/');  // Repertoire cible
	define('MAX_SIZE', 500000);    // Taille max en octets du fichier
	define('WIDTH_MAX', 3300);    // Largeur max de l'image en pixels
	define('HEIGHT_MAX', 3300);    // Hauteur max de l'image en pixels
	
	// Tableaux de donnees
	$tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisees
	$infosImg = array();
	
	// Variables
	$extension = '';
	$err = '';
	$valide = '';
	$nomImage = '';

	if(isset($_POST['nom']) &&  isset($_POST['desc']) &&  isset($_POST['prix']) && !empty($_FILES['photo']['name'])){
		//Si aucune date n'est rentrée
		if(empty($_POST['date1']) &&  empty($_POST['date2']) &&  empty($_POST['date3']) &&  empty($_POST['date4'])){
			$err = "Entrez au moins une date !";
		}
		//Si au moins une date est rentrée
		else{
			//On ajoute l'image
			/************************************************************
			* Script d'upload
			*************************************************************/
			// On verifie si le champ est rempli
			if( !empty($_FILES['photo']['name']) )
			{
				// Recuperation de l'extension du fichier
				$extension  = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
			
				// On verifie l'extension du fichier
				if(in_array(strtolower($extension),$tabExt))
				{
				// On recupere les dimensions du fichier
				$infosImg = getimagesize($_FILES['photo']['tmp_name']);
			
				// On verifie le type de l'image
				if($infosImg[2] >= 1 && $infosImg[2] <= 14)
				{
					// On verifie les dimensions et taille de l'image
					if(($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['photo']['tmp_name']) <= MAX_SIZE))
					{
						// Parcours du tableau d'erreurs
						if(isset($_FILES['photo']['error']) 
							&& UPLOAD_ERR_OK === $_FILES['photo']['error'])
						{
							// On renomme le fichier
							$nomImage = md5(uniqid()) .'.'. $extension;
				
							// Si c'est OK, on teste l'upload
							if(move_uploaded_file($_FILES['photo']['tmp_name'], TARGET.$nomImage))
							{
								//on ajoute l'activité en BDD
								$Administration->AddActivite($_POST['nom'], $_POST['desc'], $_POST['prix'], TARGET.$nomImage, 0);
								
								//message de confirmation
								$valide = 'Activité envoyée !';
							}
							else
							{
							// Sinon on affiche une erreur systeme
							$err = 'Problème lors de l\'upload !';
							}
						}
						else
						{
							$err = 'Une erreur interne a empêché l\'uplaod de l\'image';
						}
					}
					else
					{
					// Sinon erreur sur les dimensions et taille de l'image
					$err = 'Erreur dans les dimensions de l\'image !';
					}
				}
				else
				{
					// Sinon erreur sur le type de l'image
					$err = 'Le fichier à uploader n\'est pas une image !';
				}
				}
				else
				{
				// Sinon on affiche une erreur pour l'extension
				$err = 'L\'extension du fichier est incorrecte !';
				}
			}

			//On ajoute les propositions de date
			$ActiId = $Administration->GetActiID($_POST['nom']);
			if(!empty($_POST['date1'])){

				$Administration->AddPropDate($_POST['date1'], $ActiId[0]['ID']);
			}
			if(!empty($_POST['date2'])){

				$Administration->AddPropDate($_POST['date2'], $ActiId[0]['ID']);
			}
			if(!empty($_POST['date3'])){

				$Administration->AddPropDate($_POST['date3'], $ActiId[0]['ID']);
			}
			if(!empty($_POST['date4'])){

				$Administration->AddPropDate($_POST['date4'], $ActiId[0]['ID']);
			}
		}
	}

?>



<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <title>BDE Exia Reims : Mon compte</title>
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
	<link rel="stylesheet" type="text/css" href="script/malihu-custom-scrollbar/jquery.mCustomScrollbar.min.css">
	
	<script src="script/form.js"></script>
  </head>

  <body>

  <?php include('header.php'); ?>		
		
	<div id=wrapper>
	<div id=wrapper2>
		
		<!-- NAVIGATION -->
			<div id="nav">
				<nav id="compte">
					<ul>
						<li class="link_admin"><a href="#avatar" id="bt_avatar">AVATAR</a></li>
						<li class="link_admin"><a href="#photo" id="bt_info">PHOTO</a></li>        
						<li class="link_admin"><a href="#boutique" id="bt_boutique">BOUTIQUE</a></li>
						<li class="link_admin"><a href="#gestion_droit" id="bt_gestion_droit">GESTION DE DROITS</a></li>
						<li class="link_admin"><a href="#gestion_activites" id="bt_gestion_activites">GESTION DES ACTIVITES</a></li> 
					</ul>        
				</nav>
			</div>
			
			<!-- MODERATION DES AVATAR -->
			<div id="gest-avatar">
				<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
					<div class="form" action="#avatar">
						<div class="tableau_fonction custom-scroll-bar">		
							<table border="1">
								<tr><th>Photo</th><th>Supprimer</th></tr>
								<?php
									$rowAvatar = $Administration->GetAvatar();
									foreach($rowAvatar as $rowA) {
										echo ('<tr>' . '<td align="center">' . '<img src="' . $rowA['Avatar'] . '" id="Image_tableau">' . '</td>' . ' <td align="center"> <input type="checkbox" name="SupprimerA[]" value="' . $rowA['ID'] . '"> </td>');
									}
								?>
							</table>
						</div>
					<input id="BSA" type="submit" name="envoyer" value="Supprimer les avatars selectionnés">
					</div>
				</form>
			</div>
			
			<!-- MODERATION DES PHOTOS -->
			<div id="gest-perso">
				<!--TABLEAU DE PHOTOS -->
				<form id="gest-perso" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
					<div class="form" action="#photo">
						<div class="tableau_fonction custom-scroll-bar">		
							<table border="1">
								<tr><th>Photo</th><th>Etat</th><th>Valider</th><th>Supprimer</th><th>A Télecharger</th></tr>
								<?php
									$rowPhoto = $Administration->GetModerationPhotos();
									foreach($rowPhoto as $rowP) {
										$nom = $rowP['Image'];
										if ($rowP['Moderation'] == 1){
											$rowP['Moderation'] = 'Validée';
											$rowP['IDv'] = ' ';
											$idv = ' ';
										}
										else {
											$rowP['Moderation'] = 'En Attente';
											$rowP['IDv'] = '<input type="checkbox" name="Valider[]" value="' . $rowP['IDs'] . '">'/* </td><td align="center">'*/;
											//var_dump($rowP['Image']);
											//var_dump($rowP['IDv']);
										}



										echo ('<tr><td align="center"><img src="' . $rowP['Image'] . '" id="Image_tableau"></td> <td>' . $rowP['Moderation'] . '</td><td align="center">' . $rowP['IDv'] . '</td><td align="center"><input type="checkbox" name="Supprimer[]" value="' . $rowP['IDs'] . '"></td><td align="center"> <input type="checkbox" name="Telecharger[]" value="' . $nom . '"></td>');
									}
								?>
								
							</table>
						</div>
						<input id="BSA" type="submit" name="envoyer" value="Supprimer les avatars selectionnés">
					</div>
				</form>
			</div>
			
			<!-- MODERATION DE LA BOUTIQUE -->
			<div id="gest-boutique">
				<form id="gest-boutique" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
					<div class="form" action="#boutique">
						<div class="tableau_fonction custom-scroll-bar">		
							<table border="1">
								<tr><th>Photo</th><th>Nom</th><th>Prix</th><th>Supprimer</th></tr>
								<?php
									$rowArticles = $Administration->GetArtAdmin();
									foreach($rowArticles as $rowArt) {
										echo ('<tr>' . '<td align="center">' . '<img src="' . $rowArt['Image'] . '" id="Image_tableau">' . '</td>' . '<td>' . $rowArt['Nom'] . '</td>' . '<td width=80>' . $rowArt['Article'] . '€</td>'  . '<td align="center"> <input type="checkbox" name="Supprimer[]" value="' . $rowArt['ID'] . '"> </td>');
									}
								?>
							</table>
						</div>
					<input id="BSA" type="submit" name="envoyer" value="Valider la Suppression">
					</div>
				</form>
				
			</div>

			<!-- MODERATION DE DROIT -->
			<div id="gest_droit">
					<div class="form" action="#gestion_droit">
						<!--<FORM>-->
						<div class="droit_admin">
							<div class="tableau_fonction custom-scroll-bar">		
								<table border="1">
								<?php
									$rowAll = $users->GetAllUserInfo();
									foreach($rowAll as $row) {
										echo ('<tr>' . '<td>' . $row['Nom'] . '</td>' . '<td>' . $row['Prenom'] . '</td>' . '<td>' . $row['Mail'] . '</td>' . '<td>' . $row['funct'] . '</td>' . '</tr>');
									}
								?>
								</table>
							</div>
							<div id="droit">
								<div id="selection">
									<?php
										$fonctionAllUser = $users->getAllUser();
									?>	
									<select name="choix" id="s">
									<?php
										foreach($fonctionAllUser as $rowU) {
											echo ('<option value="' . $rowU['Nom'] . '">' . $rowU['Nom'] . ' ' . $rowU['Prenom'] . '</option>');
										}
									?>
									</select>
								</div>
								<?php
									
								?>
								<div id="check_box">
									<?php
										$fonctionAll = $users->GetFonction();
									?>	
										<input type="radio" name="fonction" value="<?php echo $fonctionAll[1]['Funct'];?>" id="radio_fonction"> <?php echo $fonctionAll[1]['Funct'];?> <!--etudiant-->
										<input type="radio" name="fonction" value="<?php echo $fonctionAll[2]['Funct'];?>" id="radio_fonction"> <?php echo $fonctionAll[2]['Funct'];?><!--président-->
										<input type="radio" name="fonction" value="<?php echo $fonctionAll[0]['Funct'];?>" id="radio_fonction"> <?php echo $fonctionAll[0]['Funct'];?><!--staffexia-->
										<input type="radio" name="fonction" value="<?php echo $fonctionAll[3]['Funct'];?>" id="radio_fonction"> <?php echo $fonctionAll[3]['Funct'];?><!--vice-president-->
										<input type="radio" name="fonction" value="<?php echo $fonctionAll[4]['Funct'];?>" id="radio_fonction"> <?php echo $fonctionAll[4]['Funct'];?><!--tresorier-->
										<input type="radio" name="fonction" value="<?php echo $fonctionAll[5]['Funct'];?>" id="radio_fonction"> <?php echo $fonctionAll[5]['Funct'];?><!--vice-tresorier-->
										<input type="radio" name="fonction" value="<?php echo $fonctionAll[6]['Funct'];?>" id="radio_fonction"> <?php echo $fonctionAll[6]['Funct'];?><!--communication-->
										<input type="radio" name="fonction" value="<?php echo $fonctionAll[7]['Funct'];?>" id="radio_fonction"> <?php echo $fonctionAll[7]['Funct'];?><!--chargé d'evenement-->
										
								</div>
								<!--<input type="submit">-->
							</div>
							<input id="BCGTD" type="submit" name="envoyer" value="Valider le changement de droit">
						</div>
						<!--</FORM>-->
						
						
					</div>
				</form>
			</div>
			
			<!-- MODERATION D ACTIVITES -->
			<div id="gest-actis">
				<form id="gest-actis" method="POST" action="#">
					<div class="form" action="#photo">
						<div class="tableau_fonction custom-scroll-bar">		
							<table border="1">
								<tr><th>Photo</th><th>Nom</th><th>DateA</th><th>Valider</th><th>Supprimer</th></tr>
								<?php
									$rowActivites = $Administration->GetModerationActivites();
									foreach($rowActivites as $rowA) {
										if ($rowA['Valide'] == 1){
											$rowA['Valide'] = 'Validée';
											$Valid = ' ';
										}
										else {
											$rowA['Valide'] = 'En Attente';
											$Valid = '<input type="checkbox" name="Valider[]" value="' . $rowA['ID'] . '> </td><td align="center">';
										}
										echo ('<tr><td align="center"><img src="' . $rowA['Image'] . '" id="Image_tableau"></td><td>' . $rowA['Nom'] . '</td><td width=80px>' . $rowA['DateA'] . '</td><td align="center">' . $Valid . '</td><td align="center"><input type="checkbox" name="Supprimer[]" value="' . $rowA['ID'] . '"> </td></tr>');
									}
								?>
								
							</table>
						</div>
						<input id="BSA" type="submit" name="envoyer" value="Valider la Sélection">
						<?php //var_dump($_POST);?>
					</div>
				</form>

				<!-- AJOUT ACTIVITE -->
				<form id="add-actis" method="POST" action="admin.php" enctype="multipart/form-data">
					<div class="form" id="formacti">
						<?php  
							if(!empty($valide)){
								echo '<p id="valide">';
								echo "\t\t<strong>", $valide ,"</strong>\n";
								echo "\t</p>\n\n";
							}
							if(!empty($err)){
								echo '<p id="err">';
								echo "\t\t<strong>",$err ,"</strong>\n";
								echo "\t</p>\n\n";
							}
						?>

						<h2>Ajouter une activité</h2>
						
						<div class="flexinput">
							<label for="nom">Nom de l'activité</label> <br>
							<input type="text" name="nom" id="nom"> <br>
						</div>

						<div class="flexinput">						
							<label for="desc">Description</label> <br>
							<input type="text" name="desc" id="desc"> <br>
						</div>

						<div class="flexinput">						
							<label for="prix">Prix</label> <br>
							<input type="text" name="prix" id="prix"> <br>
						</div>
						
						<div class="flexinput">						
							<label for="photo">Image de l'activité</label> <br>
							<input name="photo" type="file" id="fichier_a_uploader"> <br>
						</div>

						<h3>Dates proposées</h3>

						<div class="flexinput">											
							<label for="date1">Date 1</label> <br>
							<input type="datetime" name="date1" id="date"> <br>
						</div>

						<div class="flexinput">											
							<label for="date2">Date 2</label> <br>
							<input type="datetime" name="date2" id="date"> <br>
						</div>

						<div class="flexinput">											
							<label for="date3">Date 3</label> <br>
							<input type="datetime" name="date3" id="date"> <br>
						</div>

						<div class="flexinput">											
							<label for="date4">Date 4</label> <br>
							<input type="datetime" name="date4" id="date"> <br>
						</div>

						<input type="submit" value="Créer l'activité">
					
					</div>
				</form>
				
			</div>
			
	  	</div>
  	</div>

	<script src="script/jquery-3.2.1.js"></script>
	<script src="script/malihu-custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="script/custom.js"></script>

  <?php include 'footer.php'; ?>
	
  </body>
</html>


