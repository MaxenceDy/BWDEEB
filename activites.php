<?php   
  require('class/votesActis.php');
  include('verification.php'); 

  $actis = new votesActis();

  $listeActis = $actis->ListeActivites();
  $listeInsActis = $actis->ListeInsActis();
  $listeIdees = $actis->ListeIdees();

?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/activites.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">    
    <title>BDE Exia Reims : Activités</title>
  </head>

  <body>

  <?php include('header.php'); ?>
    
	<div id="wrapper">
    <h1>Activités à venir</h1>

    <div id="activiteFutures">
      <!--CONTAINER MODELE
      <div class="container">
        <a href="detailActi.php"><img src="Images/foret.png"></a>
        <h2>Voyage en pleine nature</h2>
        <p>12h</p>
      </div>
      -->
      <?php 

        foreach($listeInsActis as $e){?>
          <div class="container">
            <a href=<?php echo 'detailActi.php/',htmlspecialchars($e['ID'])?>><img src=<?php echo htmlspecialchars($e['Image'])?>></a>
            <h2><?php echo htmlspecialchars($e['Nom'])?></h2>
          </div>
        <?php }
        
        foreach($listeIdees as $e){?>
          <div class="container">
            <a href=<?php echo 'detailActi.php/',htmlspecialchars($e['ID'])?>><img src=<?php echo htmlspecialchars($e['Image'])?>></a>
            <h2><?php echo htmlspecialchars($e['Nom'])?></h2>
          </div>
        <?php }
      ?>

    </div>

    <h1>Toutes nos activités</h1>
    <div id="activites">
      <!--CONTAINER MODELE
      <div class="container">
        <a href="detailActi.php"><img src="Images/foret.png"></a>
        <h2>Voyage en pleine nature</h2>
        <p>21 Janvier 2017</p>
      </div>
      -->

      <?php 
        foreach($listeActis as $e){?>
          <div class="container">
            <a href=<?php echo 'detailActi.php/',htmlspecialchars($e['ID'])?>><img src=<?php echo htmlspecialchars($e['Image'])?>></a>
            <h2><?php echo htmlspecialchars($e['Nom'])?></h2>
            <p><?php echo htmlspecialchars($e['DateA'])?></p>
          </div>
        <?php }
      ?>

    </div>
  </div>

  <?php include 'footer.php'; ?>
	
  </body>
</html>