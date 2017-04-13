<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <title>BDE Exia Reims : connexion</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>

  <body>

    <?php include('header.php'); ?>
    
    <div class= "login">
	
		<img src="Images/Logo.png" alt="logo" id="logoLogin">
		
		<form id="LOGIN" method="POST">
			<input type="text" name="login" placeholder="utilisateur ou mail" value="<?php if (isset($_POST['login'])) echo($_POST['login']); ?>"/><br><br>
			<input name="passwd" type="password" placeholder="mot de passe" value="<?phpif (isset($_POST['passwd'])) echo($_POST['passwd']); ?>"  /><br><br>
			<input id="button" type="submit" name"submit" value="connexion" />
		</form>
		
	
    </div>
    

    <?php include 'footer.php'; ?>
	
  </body>
</html>