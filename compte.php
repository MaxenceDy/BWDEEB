<?php 
	require('class/users.php');
	include('verification.php'); 
	
	$user = new users();
?>


<?php
 var_dump($_POST);
// Constantes
define('TARGET', 'Images/avatar/');  // Repertoire cible
define('MAX_SIZE', 100000);    // Taille max en octets du fichier
define('WIDTH_MAX', 800);    // Largeur max de l'image en pixels
define('HEIGHT_MAX', 800);    // Hauteur max de l'image en pixels
 
// Tableaux de donnees
$tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisees
$infosImg = array();
 
// Variables
$extension = '';
$message = '';
$nomImage = '';
 

/************************************************************
 * Script d'upload
 *************************************************************/
if(!empty($_POST))
{
  // On verifie si le champ est rempli
  if( !empty($_FILES['fichier']['name']) )
  {
    // Recuperation de l'extension du fichier
    $extension  = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);
 
    // On verifie l'extension du fichier
    if(in_array(strtolower($extension),$tabExt))
    {
      // On recupere les dimensions du fichier
      $infosImg = getimagesize($_FILES['fichier']['tmp_name']);
 
      // On verifie le type de l'image
      if($infosImg[2] >= 1 && $infosImg[2] <= 14)
      {
        // On verifie les dimensions et taille de l'image
        if(($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['fichier']['tmp_name']) <= MAX_SIZE))
        {
          // Parcours du tableau d'erreurs
          if(isset($_FILES['fichier']['error']) 
            && UPLOAD_ERR_OK === $_FILES['fichier']['error'])
          {
            // On renomme le fichier
            $nomImage = md5(uniqid()) .'.'. $extension;
 
            // Si c'est OK, on teste l'upload
            if(move_uploaded_file($_FILES['fichier']['tmp_name'], TARGET.$nomImage))
            {
              //suppression de l'ancienne avatar sur le serveur
			  $CurrAvatar = $user->GetCurrAvatar($_SESSION['email']);
			   if($CurrAvatar[0]['Avatar'] != "Images/avatar.jpg"){
					unlink($CurrAvatar[0]['Avatar']);
				}
				
			  //enregistrement du chemin de l'avatar dans la BDD
			  $user->SetAvatar(TARGET.$nomImage, $_SESSION['email']);
			  
			  //message de confirmation
			  $valide = 'Upload réussi !';
            }
            else
            {
              // Sinon on affiche une erreur systeme
              $err = 'Problème lors de l\'upload !';
            }
          }
          else
          {
            $err = 'Une erreur interne a empêché l\'uplaod de l\'image';
          }
        }
        else
        {
          // Sinon erreur sur les dimensions et taille de l'image
          $err = 'Erreur dans les dimensions de l\'image !';
        }
      }
      else
      {
        // Sinon erreur sur le type de l'image
        $err = 'Le fichier à uploader n\'est pas une image !';
      }
    }
    else
    {
      // Sinon on affiche une erreur pour l'extension
      $err = 'L\'extension du fichier est incorrecte !';
    }
  }
  else
  {
    // Sinon on affiche une erreur pour le champ vide
    $err = 'Veuillez remplir le formulaire svp !';
  }
  // enregistrement des info dans le second formulaire
  if(isset($_POST['nom']) && isset($_POST['prenom']))
  {
	  $user->UpdateInfo($_POST['nom'], $_POST['prenom'], $_POST['dateN'], $_POST['adresse'], $_POST['code'], $_POST['ville'], $_SESSION['email']);
	  $message = 'enregistrement des info réussi';
	  
  }
  
}
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <title>BDE Exia Reims : Mon compte</title>
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/form.css">
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
						<li><a href="#" id="bt_avatar">Avatar</a></li>
						<li><a href="#" id="bt_info">info perso</a></li>        
					</ul>        
				</nav>
				
				<center>
					<?php 
						if( !empty($valide) ) 
						{
							echo '<p id="valide">';
							echo "\t\t<strong>", htmlspecialchars($valide) ,"</strong>\n";
							echo "\t</p>\n\n";
						}
						if( !empty($err) ) 
						{
							echo '<p id="err">';
							echo "\t\t<strong>", htmlspecialchars($err) ,"</strong>\n";
							echo "\t</p>\n\n";
						}
					?>
				</center>
				
			</div>
			
			<!-- GESTION DE L'AVATAR -->
			<div id="gest-avatar">
			
				<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
					<fieldset>
						<div class="form">
							
						<p>
							<label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">Envoyer le fichier :</label>

							<input name="fichier" type="file" id="fichier_a_uploader" value="" /> </br>
							<input type="submit" name="submit" value="Uploader" />
						</p>

						</div>
						
					</fieldset>
				</form>
				
			</div>
			
			<!-- GESTION DES INFO PERSO -->
			<div id="gest-perso">
			
				<?php
					$CurrInfo = $user->GetUserAllInfo($_SESSION['email']);
				?>
			
				<form id="gest-perso" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
				<div class="form">
					
					<br /><label for="nom">Nom</label> <br />
					<input type="text" name="nom" id="nom" value="<?php echo $CurrInfo[0]['Nom'];?>"/> <br />
					
					<label for="prenom">Prénom</label> <br />
					<input type="text" name="prenom" id="prenom" value="<?php echo $CurrInfo[0]['Prenom'];?>"/> <br />
					
					<label for="dateN">Date de naissance</label> <br />
					<input type="date" name="dateN" id="dateN" value="<?php echo $CurrInfo[0]['DateN'];?>"/> <br />
					
					<br /><label for="ville">Ville</label> <br />
					<input type="text" name="ville" id="ville" value="<?php echo $CurrInfo[0]['Ville'];?>"/> <br />
					
					<label for="adresse">Adresse</label> <br />
					<input type="text" name="adresse" id="adresse" value="<?php echo $CurrInfo[0]['Adresse'];?>"/> <br />
					
					<label for="code">Code postal</label> <br />
					<input type="text" name="code" id="code" value="<?php echo $CurrInfo[0]['CodeP'];?>"/> <br />
					
					<input type="submit" value="enregistrer" />
					
				</div>
			</form>
				
			</div>
			
			
	  </div>
  </div>

  <?php include 'footer.php'; ?>
	
  </body>
</html>