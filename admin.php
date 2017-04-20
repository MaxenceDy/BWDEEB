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

	/*
	if(isset($_POST['Valider'])){
		foreach($_POST['Telecharger']  as $key => $value)
		{
			
		}
	}
	*/

	if(isset($_POST['SupprimerA'])){
		foreach($_POST['SupprimerA'] as $key => $value)
		{
			$Administration->DeleteAvatar($value);
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

  <?php include('header.php'); 
  /*var_dump($fonction[0]['Funct']);*/?>
    
		
		
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
				<form id="gest-perso" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
				<div class="form" action="#photo">
					<div class="tableau_fonction custom-scroll-bar">		
						<table border="1">
							<tr><th>Photo</th><th>Etat</th><th>Valider</th><th>Supprimer</th><th>A Télecharger</th></tr>
							<?php
								$rowPhoto = $Administration->GetModerationPhotos();
								foreach($rowPhoto as $rowP) {
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



									echo ('<tr><td align="center"><img src="' . $rowP['Image'] . '" id="Image_tableau"></td> <td>' . $rowP['Moderation'] . '</td><td align="center">' . $rowP['IDv'] . '</td><td align="center"><input type="checkbox" name="Supprimer[]" value="' . $rowP['IDs'] . '"></td><td align="center"> <input type="checkbox" name="Telecharger[]" value="' . $rowP['IDs'] . '"></td>');
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
				<?php var_dump($_POST);?>
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


