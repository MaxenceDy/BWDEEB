<?php
	require('class/users.php');
	include('verification.php'); 
	
	$incription = new users();
	$renvoie;
	?>

	<?php 

  //si il est déjà connecté
  if(isset($_SESSION['connecte']))
  {
    header('Location: index.php');
		<script>alert("déjà connecté et inscrit")</script>
    exit();
  }
	elseif(isset($_POST['email'])  && isset($_POST['nom']) && isset($_POST['prenom'])  && isset($_POST['password']) && isset($_POST['repassword']))
  {
		elseif $_POST['password']==$_POST['repassword']{
			$inscript = $inscription->($_POST['email'], $_POST['nom'], $_POST['prenom'], $_POST['password']);
					if(count($inscript) == 1){
						//a voir pour remplir avec les erreur possible en bd car mail = unique
						//et peut pas test car pas de procédure ><
		}
	}
	?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <title>BDE Exia Reims : Inscription</title>
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/form.css">
  </head>

  <body>

  <?php include('header.php'); ?>
    
	<div id=wrapper>
		<form id="LOGIN" method="POST" action="#">
			<div class="form">
				<img src="Images/Logo.png" alt="logo" id="LogoLogin">
				
				<br /><label for="email">Email</label> <br />
				<input type="email" name="email" id="email" /> <br />
				
				<label for="text">Nom</label> <br />
				<input type="text" name="nom" id="pass" /> <br />

				<label for="texte">Prénom</label> <br />
				<input type="text" name="prenom" id="pass" /> <br />
				
				<label for="password">Password</label> <br />
				<input type="password" name="password" id="pass" /> <br />
				
				<label for="password">Retapez votre password</label> <br />
				<input type="password" name="repassword" id="pass" /> <br />
				
				<input type="submit" value="s'inscrire" />
			</div>
		</form>
  </div>

  <?php include 'footer.php'; ?>
	
  </body>
</html>