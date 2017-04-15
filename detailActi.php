<?php include('verification.php'); ?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <title>BDE Exia Reims : Balade</title>
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/detailActi.css">
  </head>

  <body>

  <?php include('header.php'); ?>

  <div id="wrapper">

    <section id=containerActi>

      <div id="containerImg">
        <img src="Images/foret.png">
      </div>

      <aside id="containerDsc">
        <h1>Voyage en plein air</h1>        
        <p id="description">
          Description :<br><br>
          Balade dans la foret.
        </p>
        <p id="prix">Prix de l'activité : 10€
        <input type="button" onclick="#" id="bouton" value="Je vote pour l'activité">
        </p>
      </aside>

    </section>

    <hr>
    
    <section id="containerPhotos">
      <h1>Photos</h1>
      <!--
      <p id="avertissement">
        <a href="login.php">Connectez-vous</a> pour voir ces photos ou pour vous inscrire à des activités !
      </p>
      -->
      <h2>1er Janvier 2017</h2>
      <div id="photosDate">
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
      </div>

      <h2>21 Mars 2016</h2>
      <div id="photosDate">
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
        <a href="#"><img src="Images/foret.png"></a>
      </div>
    </section>
  </div>

  <?php include 'footer.php'; ?>
	
  </body>
</html>