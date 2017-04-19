<?php
  require('class/votesActis.php');
  include('verification.php'); 

  $actis = new votesActis();

  $details = $actis->DetailActi($_GET['id']);
  $photos = $actis->PhotosActis($_GET['id']);
  $validite = $actis->Validite($_GET['id']);

  //si passée
  if(isset($details[0]['DateA'])){
    $date = $details[0]['DateA'];
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
          
          //Si on doit s'inscrire'
          elseif($validite[0]['Valide'] == 1){
            echo '<a href=detailActi.php?id=', $_GET['id'], '&ins=true</a>';
            echo '<input type="button" onclick="#" id="bouton" value="Je m\'inscris à l\'activité">Inscrit</input>';
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
        <?php }
      ?>

    </section>
  </div>

  <?php include 'footer.php'; ?>
	
  </body>
</html>