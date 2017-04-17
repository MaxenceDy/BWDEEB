<?php 
	require('class/users.php');
	include('verification.php'); 

	$users = new users();
	$message;
	
?>

<?php 

  //si il est déjà connecté
  if(isset($_SESSION['connecte']))
  {
    header('Location: index.php');
    exit();
  }
  //si les données ont été envoyées
  elseif(isset($_POST['email'])  && isset($_POST['password']))
  {
		$log = $users->SignIn($_POST['password'], $_POST['email']);
		
		if(count($log) == 1){
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['password'] = $_POST['password'];
			$_SESSION['connecte'] = true;
			$_SESSION['LAST_ACTIVITY'] = time(); // set activity time stamp
			header('Location: index.php');
		}
		else{
			$message = "MAUVAIS LOGIN";
		}
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

				<?php 
					if(isset($message)){
						echo '<p id="err">';
						echo "\t\t<strong>", $message ,"</strong>\n";
						echo "\t</p>\n\n";
					}
				?>
				
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