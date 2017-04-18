<?php include('verification.php'); 
	require('class/users.php');
	$users = new users();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <title>BDE Exia Reims : Mon compte</title>
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">	
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
						<li><a href="#avatar" id="bt_avatar">AVATAR</a></li>
						<li><a href="#photo" id="bt_info">PHOTO</a></li>        
						<li><a href="#boutique" id="bt_boutique">BOUTIQUE</a></li>
						<li><a href="#gestion_droit" id="bt_gestion_droit">GESTION DE DROITS</a></li>      
					</ul>        
				</nav>
			</div>
			
			<!-- MODERATION DES AVATAR -->
			<div id="gest-avatar">
				<form method="POST" action="upload.php" enctype="multipart/form-data">
					<div class="form" action="#avatar">
						
						<!-- On limite le fichier à 100Ko -->
						<input type="hidden" name="MAX_FILE_SIZE" value="100000">
						
						<br /><label for="email">Fichier : </label> <br />
						<input type="file" name="avatar"> <br />
						
						<input type="submit" name="envoyer" value="Envoyer le fichier">
					</div>
				</form>
			</div>
			
			<!-- MODERATION DES PHOTOS -->
			<div id="gest-perso">
				<form id="gest-perso" method="POST" action="#">
				<div class="form" action="#photo">
					<div class="tableau_fonction">		
								<table border="1">
									<tr><th>Photo</th><th>Etat</th><th>Valider</th><th>Supprimer</th></tr>
									<?php
										$rowPhoto = $users->GetModerationPhotos();
										foreach($rowPhoto as $rowP) {
											echo ('<tr>' . '<td>' . $row['Nom'] . '</td>' . '<td>' . $row['Prenom'] . '</td>' . '<td>' . $row['Mail'] . '</td>' . '<td>' . $row['funct'] . '</td>' . '</tr>');
											echo ('<option value="' . $rowU['Nom'] . '">' . $rowU['Nom'] . ' ' . $rowU['Prenom'] . '</option>');
										}
									?>
								</table>
							</div>
				</div>
			</form>
				
			</div>
			
			<!-- MODERATION DE LA BOUTIQUE -->
			<div id="gest-boutique">
				<form method="POST" action="upload.php" enctype="multipart/form-data">
					<div class="form" action="#boutique">
						
						<!-- On limite le fichier à 100Ko -->
						<input type="hidden" name="MAX_FILE_SIZE" value="100000">
						
						<br /><label for="email">Fichier : </label> <br />
						<input type="file" name="avatar"> <br />
						
						<input type="submit" name="envoyer" value="Envoyer le fichier">
					</div>
				</form>
				
			</div>

			<!-- MODERATION DE DROIT -->
			<div id="gest_droit">
					<div class="form" action="#gestion_droit">
						<!--<FORM>-->
							<div class="tableau_fonction">		
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
										<input type="radio" name="fonction" value="<?php echo $fonctionAll[1]['f'];?>" id="radio_fonction"> <?php echo $fonctionAll[1]['f'];?> <!--etudiant-->
										<input type="radio" name="fonction" value="<?php echo $fonctionAll[0]['f'];?>" id="radio_fonction"> <?php echo $fonctionAll[0]['f'];?><!--staffexia-->
										<input type="radio" name="fonction" value="<?php echo $fonctionAll[2]['f'];?>" id="radio_fonction"> <?php echo $fonctionAll[2]['f'];?><!--président-->
										<input type="radio" name="fonction" value="<?php echo $fonctionAll[3]['f'];?>" id="radio_fonction"> <?php echo $fonctionAll[3]['f'];?><!--vice-president-->
										<input type="radio" name="fonction" value="<?php echo $fonctionAll[4]['f'];?>" id="radio_fonction"> <?php echo $fonctionAll[4]['f'];?><!--tresorier-->
										<input type="radio" name="fonction" value="<?php echo $fonctionAll[5]['f'];?>" id="radio_fonction"> <?php echo $fonctionAll[5]['f'];?><!--vice-tresorier-->
										<input type="radio" name="fonction" value="<?php echo $fonctionAll[6]['f'];?>" id="radio_fonction"> <?php echo $fonctionAll[6]['f'];?><!--communication-->
										<input type="radio" name="fonction" value="<?php echo $fonctionAll[7]['f'];?>" id="radio_fonction"> <?php echo $fonctionAll[7]['f'];?><!--chargé d'evenement-->
										
								</div>
								<!--<input type="submit">-->
							</div>
						<!--</FORM>-->
						
						<input type="submit" name="envoyer" value="Valider le changement de droit">
					</div>
				</form>
				
			</div>
			
	  </div>
  </div>

  <?php include 'footer.php'; ?>
	
  </body>
</html>



								<!--	<table border="1">
										<tr>
											<td>Michelle</td>
											<td>26 ans</td>
											<td>États-Unis</td>
										</tr>
										<tr>
											<td>Carmen</td>
											<td>33 ans</td>
											<td>Espagne</td>
										</tr>
										<tr>
											<td>Michelle</td>
											<td>26 ans</td>
											<td>États-Unis</td>
										</tr>
										<tr>
											<td>Carmen</td>
											<td>33 ans</td>
											<td>Espagne</td>
										</tr>
										<tr>
											<td>Michelle</td>
											<td>26 ans</td>
											<td>États-Unis</td>
										</tr>
										<tr>
											<td>Carmen</td>
											<td>33 ans</td>
											<td>Espagne</td>
										</tr>
										<tr>
											<td>Michelle</td>
											<td>26 ans</td>
											<td>États-Unis</td>
										</tr>
										<tr>
											<td>Carmen</td>
											<td>33 ans</td>
											<td>Espagne</td>
										</tr>
									</table>-->