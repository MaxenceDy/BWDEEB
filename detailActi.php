<?php
  require('class/votesActis.php');
  include('verification.php'); 

  $actis = new votesActis();

  $details = $actis->DetailActi($_GET['id']);
  $photos = $actis->PhotosActis($_GET['id']);
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <title>BDE Exia Reims : <?php echo $details[0]['Nom'] ?></title>
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/detailActi.css">
  </head>

  <body>

  <?php include('header.php'); ?>

  <div id="wrapper">

    <section id=containerActi>

      <div id="containerImg">
        <img src=<?php echo '"../',$details[0]['Image'],'"' ?>>
      </div>

      <aside id="containerDsc">
        <h1><?php echo $details[0]['Nom'],' - ', $details[0]['DateA']?></h1>        
        <p id="description">
          Description :<br><br>
          <?php echo $details[0]['Description'] ?>
        </p>
        <p id="prix">Prix de l'activité : <?php echo $details[0]['Prix'] ?>€
        <input type="button" onclick="#" id="bouton" value="Je vote pour l'activité">
        </p>
      </aside>

    </section>

    <hr>
    
    <section id="containerPhotos">
      <h1>Photos</h1>

      <?php 
        if(!isset($_SESSION['connecte'])){?>
          <p id="avertissement">
          <a href="login.php">Connectez-vous</a> pour voir ces photos ou pour vous inscrire à des activités !
          </p>
        <?php }
        else{?>
          <div id="photosDate">
            <?php 
              foreach($photos as $e){?>
                <a href=<?php echo '../commentaire-photo.php?id=', $e['ID']?>><img src=<?php echo '../', $e['Image']?>></a>
              <?php }?>
          </div>
        <?php }
      ?>

    </section>
  </div>

  <?php include 'footer.php'; ?>
	
  </body>
</html>