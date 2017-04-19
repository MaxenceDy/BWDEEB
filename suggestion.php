<?php 
  require_once('class/users.php');
  include('verification.php'); 
  $user = new users();

  $id = $user->GetUserID($_SESSION['email']);
  $message;
?>

<?php
  //Si on est pas connecté
  if(!isset($_SESSION['connecte'])){
    header('Location:erreur.php');
  }

  //Si on a envoyé une suggestion
  if(isset($_POST['suggestion'])){
    $user->Suggestion($_POST['suggestion'], $id[0]['ID']);
    $message = 'Votre suggestion a été envoyée !';
  }

?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <title>BDE Exia Reims : Suggestions</title>
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/form.css">
  </head>

  <body>

  <?php include('header.php'); ?>

	<div id="wrapper">
		<form id="SUGG" method="POST" action="suggestion.php">
			<div class="form">
				<img src="Images/Logo.png" alt="logo" id="LogoLogin">
				
        <?php 
          if(isset($message)){
            echo '<p>',$message,'</p>';
          }
        ?>

				<br /><label for="suggestion">Ma suggestion</label> <br />
				<textarea name="suggestion" id="suggestion" rows="10" cols="40"></textarea><br>
				
				<input type="submit" value="Envoyer" />
			</div>
		</form>
  </div>

  <?php include 'footer.php'; ?>
	
  </body>
</html>