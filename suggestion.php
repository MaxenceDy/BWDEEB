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
    
	<div id="wrapper">
		<form id="SUGG" method="POST" action="#">
			<div class="login">
				<img src="Images/Logo.png" alt="logo" id="LogoLogin">
				
				<br /><label for="suggestion">Ma suggestion</label> <br />
				<textarea name="suggestion" id="suggestion" rows="10" cols="40"></textarea><br>
				
				<input type="submit" value="Envoyer" />
			</div>
		</form>
  </div>

  <?php include 'footer.php'; ?>
	
  </body>
</html>