<?php
	require('class/users.php');
	include('verification.php'); 
	
	$inscription = new users();
	$renvoie;
	?>

	<?php 

  //si il est déjà connecté
  if(isset($_SESSION['connecte']))
  {
    header('Location: index.php');
		echo '<script>alert("déjà connecté et inscrit")</script>';
    exit();
  }
	elseif(isset($_POST['email'])  && isset($_POST['nom']) && isset($_POST['prenom'])  && isset($_POST['password']) && isset($_POST['repassword']))
  {
		if ($_POST['password']==$_POST['repassword']) {
			if (preg_match('#^[\w.-]+@viacesi.fr$#', $_POST['email']) || preg_match('#^[\w.-]+@cesi.fr$#', $_POST['email'])){
				try{
					$inscription->SignUp($_POST['email'], $_POST['nom'], $_POST['prenom'], $_POST['password']);
				}catch (PDOException $e) {
					 $sqlCestChiant = $e->getMessage();
					 if($sqlCestChiant == "SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicata du champ '".$_POST['email']."' pour la clef 'Mail'"){
						$err = "ce mail est déjà pris";
					 }
					 else{
						 $err = "problème durant l'envoie du formulaire";
					 }
				}
			}
			else{
				$err = 'mail non autorisé seul les membre de CESI ont accès à l\'inscription et la totalité du site';
			}
			
			if(empty($err)){
						 
						 $valide = 'inscription effectué';
						 
			}		
		}
		else{
			$err = "non correspondance entre les 2 mot de passe";
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
				
				<br /><label for="email">Email</label> <br />
				<input type="email" name="email" id="email" <?php if(isset($_POST['email'])) echo 'value="'.$_POST['email'].'"'; ?> /> <br />
				
				<label for="text">Nom</label> <br />
				<input type="text" name="nom" id="pass" <?php if(isset($_POST['email'])) echo 'value="'.$_POST['nom'].'"'; ?> /> <br />

				<label for="texte">Prénom</label> <br />
				<input type="text" name="prenom" id="pass" <?php if(isset($_POST['email'])) echo 'value="'.$_POST['prenom'].'"'; ?> /> <br />
				
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