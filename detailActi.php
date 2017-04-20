<?php
  require_once('class/votesActis.php');
  require_once('class/users.php');
  include('verification.php'); 

  $user = new users();
  $actis = new votesActis();

  $details = $actis->DetailActi($_GET['id']);
  $photos = $actis->PhotosActis($_GET['id']);
  $validite = $actis->Validite($_GET['id']);

  $message;

  if(isset($_SESSION['email'])){
    $id = $user->GetUserID($_SESSION['email']);
  }

  //si passée
  if(isset($details[0]['DateA'])){
    $date = $details[0]['DateA'];
  }

  //Si vote
  if(isset($_POST['date'])){
    $avote = $actis->GetUserVote($_GET['id'], $id[0]['ID']);
    //Si il a déjà voté
    if(!$avote == null){
      $message = '<script>alert("vous avez déjà voté ! ")</script>';
    }
    //Si il n'a pas voté
    else{
      $idDate = $actis->GetIDDateVote($_POST['date']);
      $actis->VoteA($_GET['id'], $id[0]['ID']);
      $actis->VoteD($idDate[0]['ID'], $id[0]['ID']);
      $message = '<script>alert("vous avez voté ! ")</script>';
    }
  }

  //Si s'inscrit
  if(isset($_GET['ins'])){
    if($_GET['ins'] == true){
      $estInscrit = $actis->GetInscription($_GET['id'], $id[0]['ID']);
      if(!$estInscrit == null)
      {
          $message = '<script>alert("vous êtes déjà inscrit ! ")</script>';
      }
      else{
        $actis->InscriptionActi(0, $_GET['id'], $id[0]['ID']);
        $message = '<script>alert("vous êtes bien inscrit ! ")</script>';        
      }
    }
  }
?>

<?php
// Constantes
define('TARGET', 'Images/Activites/');  // Repertoire cible
define('MAX_SIZE', 500000);    // Taille max en octets du fichier
define('WIDTH_MAX', 3300);    // Largeur max de l'image en pixels
define('HEIGHT_MAX', 3300);    // Hauteur max de l'image en pixels
 
// Tableaux de donnees
$tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisees
$infosImg = array();
 
// Variables
$extension = '';
$err = '';
$valide = '';
$nomImage = '';
 

/************************************************************
 * Script d'upload
 *************************************************************/
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
            //enregistrement du chemin de l'image dans la BDD
            var_dump(TARGET.$nomImage);
			$mod = 0;
            $actis->AjoutPhoto(TARGET.$nomImage, $mod, $_GET['id']);
            
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
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <title>BDE Exia Reims : <?php echo $details[0]['Nom'] ?></title>
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/detailActi.css">
  </head>

  <body>

  <?php include('header.php'); ?>

  <div id="wrapper">

    <section id=containerActi>

      <div id="containerImg">
        <img src=<?php echo '"',$details[0]['Image'],'"' ?>>
      </div>

      <aside id="containerDsc">
        <h1>
        <?php 
          echo $details[0]['Nom'];
          if(isset($date)){
            echo ' - ', $date;
          }
        ?>
        </h1>

        <p id="description">
          Description :<br><br>
          <?php echo $details[0]['Description'] ?>
        </p>
        <p id="prix">Prix de l'activité : <?php echo $details[0]['Prix'] ?>€
        <?php 

          //Si on doit choisir une date
          if($validite[0]['Valide'] == 0){
            $listeDates = $actis->GetPropDate($_GET['id']);
            foreach($listeDates as $e){
              echo '<form method="POST" action="detailActi.php?id=', $_GET['id'], '">';
              echo '<input type="radio" name="date" value="', $e['DateA'],'">', $e['DateA'],'</input>';
            }
            echo '<input type="submit" name="vote" id="bouton" value="Je vote pour l\'activité"></input>';
            echo '</form>';
          }

          //Si on doit s'inscrire
          elseif($validite[0]['Valide'] == 1){
            echo '<a id="inscription" href="detailActi.php?id=', $_GET['id'], '&ins=true">Je m\'inscris à l\'activité</a>';
          }

          if(isset($message)){
            echo $message;
          }
        ?>
        </p>
      </aside>

    </section>

    <section id="inscrit">
      <h1>Liste des inscrits : </h1>
      <?php 
        $listeParticipants = $actis->GetParticipants($_GET['id']);
        foreach($listeParticipants as $e){
          echo $e['Prenom'], ' ', $e['Nom'], '<br>';
        }
      ?>
    </section>

    <hr>
    
    <section id="containerPhotos">
      <h1>Photos</h1>

      <?php 

        if(!empty($valide)){
          echo $valide;
        }
        elseif(!empty($err)){
          echo $err;
        }

        if(!isset($_SESSION['connecte'])){?>
          <p id="avertissement">
          <a href="login.php">Connectez-vous</a> pour voir ces photos ou pour vous inscrire à des activités !
          </p>
        <?php }
        else{?>
          <div id="photosDate">
            <?php 
              foreach($photos as $e){?>
                <a href=<?php echo 'commentaire-photo.php?id=', $e['ID']?>><img src=<?php echo $e['Image']?>></a>
              <?php }?>
          </div>
        <?php 
          if($validite[0]['Valide'] == 2){
            echo '<h2>Importer une nouvelle photo</h2>';?>
            <form method="POST" action=<?php echo '"detailActi.php?id=', $_GET['id'], '"' ?>enctype="multipart/form-data">
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
          <?php }
        }
      ?>

    </section>
  </div>

  <?php include 'footer.php'; ?>
	
  </body>
</html>