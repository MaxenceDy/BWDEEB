<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <title>BDE Exia Reims : connexion</title>
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/form.css">
  </head>

  <body>

  <?php include('header.php'); ?>
    
	<div id=wrapper>
	
	
		<!-- GESTION DE L'AVATAR -->
		<div id="gest-avatar">
			<form method="POST" action="upload.php" enctype="multipart/form-data">
				<div class="form">
					
					<!-- On limite le fichier à 100Ko -->
					<input type="hidden" name="MAX_FILE_SIZE" value="100000">
					
					<br /><label for="email">Fichier : </label> <br />
					<input type="file" name="avatar"> <br />
					
					<input type="submit" name="envoyer" value="Envoyer le fichier">
				</div>
			</form>
			
		</div>
		
		<!-- GESTION DES INFO PERSO -->
		<div id="gest-perso">
			<form id="gest-perso" method="POST" action="#">
			<div class="form">
				
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
		
		
  </div>

  <?php include 'footer.php'; ?>
	
  </body>
</html>