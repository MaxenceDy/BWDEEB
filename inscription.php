<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <title>BDE Exia Reims : connexion</title>
    <link rel="stylesheet" type="text/css" href="header.css">
    <link rel="stylesheet" type="text/css" href="login.css">
  </head>

  <body>

    <?php include('header.php'); ?>
    
	<center>
		<form id="LOGIN" method="POST" action="#">
			<div class="login">
				<img src="Images/Logo.png" alt="logo" id="LogoLogin">
				
				<br /><label for="email">Email</label> <br />
				<input type="email" name="email" id="email" /> <br />
				
				<label for="password">Utilisateur</label> <br />
				<input type="password" name="password" id="pass" /> <br />
				
				<br /><label for="email">Password</label> <br />
				<input type="email" name="email" id="email" /> <br />
				
				<label for="password">Retaper votre password</label> <br />
				<input type="password" name="password" id="pass" /> <br />
				
				<input type="submit" value="s'inscrire" />
			</div>
		</form>
    </center>

    <?php include 'footer.php'; ?>
	
  </body>
</html>