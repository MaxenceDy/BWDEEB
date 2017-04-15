<?php 
  //on démarre la session
  session_start();

  //si il est déjà connecté
  if(isset($_SESSION['email']) && isset($_SESSION['password']))
  {
    header('Location: http://localhost/BWDEEB/index.php');
    exit();
  }
  //si les données ont été envoyées
  elseif(isset($_POST['email'])  && isset($_POST['password']))
  {
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];
    header('Location: http://localhost/BWDEEB/index.php');
  }
?>

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
    
	<div id="wrapper">
		<form id="LOGIN" method="POST" action="login.php">
			<div class="form">
				<img src="Images/Logo.png" alt="logo" id="LogoLogin">
				
				<br /><label for="email">Email</label> <br />
				<input type="email" name="email" id="email" /> <br />
				
				<label for="password">Password</label> <br />
				<input type="password" name="password" id="pass" /> <br />
				
				<input type="submit" value="Login" />
			</div>
		</form>
  </div>

  <?php include 'footer.php'; ?>
	
  </body>
</html>