<?php include('verification.php'); ?>

<?php
 
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
              $message = 'Upload réussi !';
            }
            else
            {
              // Sinon on affiche une erreur systeme
              $message = 'Problème lors de l\'upload !';
            }
          }
          else
          {
            $message = 'Une erreur interne a empêché l\'uplaod de l\'image';
          }
        }
        else
        {
          // Sinon erreur sur les dimensions et taille de l'image
          $message = 'Erreur dans les dimensions de l\'image !';
        }
      }
      else
      {
        // Sinon erreur sur le type de l'image
        $message = 'Le fichier à uploader n\'est pas une image !';
      }
    }
    else
    {
      // Sinon on affiche une erreur pour l'extension
      $message = 'L\'extension du fichier est incorrecte !';
    }
  }
  else
  {
    // Sinon on affiche une erreur pour le champ vide
    $message = 'Veuillez remplir le formulaire svp !';
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
              <?php 
              	if( !empty($message) ) 
                {
                  echo '<p id="img">';
                  echo "\t\t<strong>", htmlspecialchars($message) ,"</strong>\n";
                  echo "\t</p>\n\n";
                }?>
						</p>

						</div>
						
					</fieldset>
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
  </div>

  <?php include 'footer.php'; ?>
	
  </body>
</html>