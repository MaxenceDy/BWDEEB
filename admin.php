<?php include('verification.php'); ?>

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
					
					<br /><label for="nom">Nom</label> <br />
					<input type="text" name="nom" id="nom" /> <br />
					
					<label for="prenom">Prénom</label> <br />
					<input type="text" name="prenom" id="prenom" /> <br />
					
					<label for="dateN">Date de naissance</label> <br />
					<input type="date" name="dateN" id="dateN" /> <br />
					
					<br /><label for="ville">Ville</label> <br />
					<input type="text" name="ville" id="ville" /> <br />
					
					<label for="adresse">Adresse</label> <br />
					<input type="text" name="adresse" id="adresse" /> <br />
					
					<label for="code">Code postal</label> <br />
					<input type="text" name="code" id="code" /> <br />
					
					<input type="submit" value="enregistrer" />
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
							<select name="choix">
								<option value="choix1">Choix 1</option>
								<option value="choix2">Choix 2</option>
								<option value="choix3">Choix 3</option>
								<option value="choix4">Choix 4</option>
							</select>
							<table>
								<tr id="hidden">
									<td>Carmen</td>
									<td>33 ans</td>
									<td>Espagne</td>
								</tr>
								<tr id="hidden">
									<td>Michelle</td>
									<td>26 ans</td>
									<td>États-Unis</td>
								</tr>
								<tr id="hidden">
									<td>Carmen</td>
									<td>33 ans</td>
									<td>Espagne</td>
								</tr>
								<tr id="hidden">
									<td>Michelle</td>
									<td>26 ans</td>
									<td>États-Unis</td>
								</tr>
								<tr id="hidden">
									<td>Carmen</td>
									<td>33 ans</td>
									<td>Espagne</td>
								</tr>
								<tr id="hidden">
									<td>Michelle</td>
									<td>26 ans</td>
									<td>États-Unis</td>
								</tr>
								<tr id="hidden">
									<td>Carmen</td>
									<td>33 ans</td>
									<td>Espagne</td>
								</tr>
								<tr id="hidden">
									<td>Michelle</td>
									<td>26 ans</td>
									<td>États-Unis</td>
								</tr>
								<tr id="hidden">
									<td>Carmen</td>
									<td>33 ans</td>
									<td>Espagne</td>
								</tr>
								<tr id="hidden">
									<td>Michelle</td>
									<td>26 ans</td>
									<td>États-Unis</td>
								</tr>
								<tr id="hidden">
									<td>Carmen</td>
									<td>33 ans</td>
									<td>Espagne</td>
								</tr>
								<tr id="hidden">
									<td>Michelle</td>
									<td>26 ans</td>
									<td>États-Unis</td>
								</tr>
								<tr id="hidden">
									<td>Carmen</td>
									<td>33 ans</td>
									<td>Espagne</td>
								</tr>
								<tr id="hidden">
									<td>Michelle</td>
									<td>26 ans</td>
									<td>États-Unis</td>
								</tr>
								<tr id="hidden">
									<td>Carmen</td>
									<td>33 ans</td>
									<td>Espagne</td>
								</tr>
								<tr id="hidden">
									<td>Michelle</td>
									<td>26 ans</td>
									<td>États-Unis</td>
								</tr>
								<tr id="hidden">
									<td>Carmen</td>
									<td>33 ans</td>
									<td>Espagne</td>
								</tr>
								<tr id="hidden">
									<td>Michelle</td>
									<td>26 ans</td>
									<td>États-Unis</td>
								</tr>
								<tr id="show">
									<td>Carmen</td>
									<td>33 ans</td>
									<td>Espagne</td>
								</tr>
								<tr id="hidden">
									<td>Michelle</td>
									<td>26 ans</td>
									<td>États-Unis</td>
								</tr>
								<tr id="hidden">
									<td>Carmen</td>
									<td>33 ans</td>
									<td>Espagne</td>
								</tr>
								<tr id="hidden">
									<td>Michelle</td>
									<td>26 ans</td>
									<td>États-Unis</td>
								</tr>
							</table>
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